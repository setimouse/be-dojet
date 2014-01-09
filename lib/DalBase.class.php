<?php
abstract class DalBase {
    /**
     * @var DBProxy
     */
    public $dbProxy;

    /**
     * @var array
     */
    private static $_instancePool = null;

    /**
     * @param string $dbname
     * @return DalBase
     */
    public static function getInstance($dbname = null) {
        $className = get_called_class();

        $instance = SingletonFactory::getInstance($className);

        $instance->dbProxy = DBProxy::getInstance();
        if (!is_null($dbname)) {
            $instance->dbProxy->connectDB($dbname);
        }
        return $instance;
    }

    /**
     * @param string $dbname
     * @return DBProxy
     */
    public static function getDBProxy($dbname = null) {
        if (is_null($dbname)) {
            $dbname = Config::configForKeyPath('global.use_db');
        }

        if (is_null($dbname)) {
            return null;
        }

        $dal = self::getInstance($dbname);
        $dbProxy = $dal->dbProxy;
        return $dbProxy;
    }

    /**
     * 同self::result
     *
     * @param mix $ret
     * @return MResult
     */
    public static function getResult($ret) {
        return self::result($ret);
    }

    /**
     * 返回query结果
     *
     * @param mix $ret
     * @return MResult
     */
    public static function result($ret, $cacheKey = null) {
        if (false === $ret) {
            return MResult::result(MResult::FAIL, array('errno' => mysql_errno(), 'error' => mysql_error()));
        }

        $info = $ret;
        if ($cacheKey) {
            ZQCache::set($cacheKey, $ret, 0, 3600);
        }

        return MResult::result(MResult::SUCCESS, $info);
    }

    public static function rs2array($sql, $dbname = null) {
        $dbProxy = static::getDBProxy($dbname);
        $ret = $dbProxy->rs2array($sql);
        return self::result($ret);
    }

    public static function rs2keyarray($sql, $key, $dbname = null) {
        $dbProxy = static::getDBProxy($dbname);
        $ret = $dbProxy->rs2keyarray($sql, $key);
        return self::result($ret);
    }

    public static function rs2rowline($sql, $dbname = null) {
        $dbProxy = static::getDBProxy($dbname);
        $ret = $dbProxy->rs2rowline($sql);
        return self::result($ret);
    }

    public static function rs2rowcount($sql, $dbname = null) {
        $dbProxy = static::getDBProxy($dbname);
        $ret = $dbProxy->rs2rowcount($sql);
        return self::result($ret);
    }

    public static function rs2oneColumnArray($sql, $dbname = null) {
        $dbProxy = static::getDBProxy($dbname);
        $ret = $dbProxy->rs2oneColumnArray($sql);
        return self::result($ret);
    }

    public static function doUpdate($sql, $dbname = null) {
        $dbProxy = self::getDBProxy($dbname);
        $ret = $dbProxy->doUpdate($sql);
        return self::result($ret);
    }

    public static function doDelete($sql, $dbname = null) {
        $dbProxy = self::getDBProxy($dbname);
        $ret = $dbProxy->doDelete($sql);
        return self::result($ret);
    }

    protected static function doInsert($sql, $dbname = null) {
        $dbProxy = self::getDBProxy($dbname);
        $ret = $dbProxy->doInsert($sql);
        return self::result($ret);
    }

    public static function mongoResult($ret) {
        if (false === $ret) {
            return MResult::result(MResult::FAIL, $ret);
        }

        $info = $ret;

        return MResult::result(MResult::SUCCESS, $info);
    }
    /**
     * 开始事务
     *
     * @param string $dbName
     */
    public static function beginTransaction($dbName) {
        $dal = self::getInstance($dbName);
        $dbProxy = $dal->dbProxy;

        $dbProxy->beginTransaction();
    }

    /**
     * 结束事务
     *
     * @param string $dbName
     */
    public static function endTransaction($dbName) {
        $dal = self::getInstance($dbName);
        $dbProxy = $dal->dbProxy;

        $dbProxy->endTransaction();
    }

    /**
     * 提交事务
     *
     * @param string $dbName
     */
    public static function commit($dbName) {
        $dal = self::getInstance($dbName);
        $dbProxy = $dal->dbProxy;

        $dbProxy->commit();
    }

    /**
     * 回滚事务
     *
     * @param string $dbName
     */
    public static function rollback($dbName) {
        $dal = self::getInstance($dbName);
        $dbProxy = $dal->dbProxy;

        $dbProxy->rollback();
    }

    /**
     * 获取mongodb
     *
     * @param string $dbname
     * @return ZQDBMongoProxy
     */
    public static function getMongoDB($dbname) {
        $dbMongo = ZQDBMongoProxy::getInstance();
        $dbMongo->connectDB($dbname);

        return $dbMongo;
    }

    /**
     * 获取Collection
     *
     * @param string $dbname
     * @param string $collection
     * @return ZQMongoCollection
     */
    public static function getMongoCollection($dbname, $collection) {
        $dbMongo = self::getMongoDB($dbname);
        $mongoCollection = $dbMongo->getCollection($collection);
        $zqCollection = new ZQMongoCollection($mongoCollection);
        return $zqCollection;
    }

    /**
     * 获取真正的线上数据库
     *
     * @param string $dbname
     * @return DBProxy
     */
    public static function getRealOnlineDBProxy($dbname) {
        $runtime = MRuntime::getInstance();
        $currentRuntime = $runtime->currentRuntime();
        if ($runtime->currentRuntime() === C_RUNTIME_ONLINE) {
            $runtime->switchRuntime(C_RUNTIME_ONLINE);
        } else {
            $runtime->switchRuntime(C_RUNTIME_IMPORT_ONLINE);
        }

        $dbProxy = self::getDBProxy($dbname);

        $runtime->restoreRuntime();

        return $dbProxy;
    }

    public static function getSolrProxy($core = null) {
        if (is_null($core)) {
            return null;
        }

        $solrProxy = SolrProxy::getInstance();
        $solrProxy->connectByRuntime($core);

        return $solrProxy;
    }

    protected static function isEmptyNumericArray($array) {
        Dojet::assertNumericArray($array, __FILE__, __LINE__);
        return empty($array);
    }
}