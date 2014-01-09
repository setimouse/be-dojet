<?php
class DBProxy
{
    private static $queryNum = 0;
    private static $insertNum = 0;
    private static $updateNum = 0;
    private static $deleteNum = 0;
    private static $selectNum = 0;
    private static $readNum = 0;
    private static $writeNum = 0;
    private static $sqlLog = array();
    private static $timeSpan = 0;

    private $conn_r = null;
    private $conn_w = null;

    private static $conn_pool = array();

    private $host;
    private $dbname;

    private static $_instance;

    /**
     * @return DBProxy
     */
    public static function getInstance() {
        if (null === self::$_instance) {
            self::$_instance = new DBProxy();
        }
        return self::$_instance;
    }

    public function connect($host = null, $username = null, $password = null, $dbname = null)
    {
        $connKey = serialize($host);
        $conn = null;
        if (isset(self::$conn_pool[$connKey])) {
            $conn = self::$conn_pool[$connKey];
        } else {
            Trace::debug('connect db(host:'.$host.' username:'.$username.' password:'.$password.')', __FILE__, __LINE__);
            $conn = @mysql_connect($host, $username, $password);
            if ($conn) {
                self::$conn_pool[$connKey] = $conn;
            } else {
                Trace::fatal('mysql_connect failed', __FILE__, __LINE__);
            }
        }

        if (is_resource($conn)) {
            $this->selectDB($dbname, $conn);
        }

        return $conn;
    }

    public function connectDB($dbname) {
        $runtime = Config::configForKeyPath('global.runtime');
        $dbConfig = Config::configForKeyPath('database.'.$runtime.'.'.$dbname);

        foreach (array('r', 'w') as $rw) {
            $conf = $dbConfig[$rw];
            $dbIndex = rand(0, count($conf['hosts']) - 1);
            $host = $conf['hosts'][$dbIndex];
            $username = $conf['username'];
            $password = $conf['password'];
            $dbname = $conf['dbname'];

            $conn = 'conn_'.$rw;
            $this->$conn = $this->connect($host, $username, $password, $dbname);
        }

    }

    public function getConnection($rw = 'w') {
        Dojet::assert(in_array($rw, array('r', 'w')), 'illegal rw', __FILE__, __LINE__);
        $conn = 'conn_'.$rw;
        return $this->$conn;
    }

    public function selectDB($dbname, $conn) {
        Trace::debug('select db: '.$dbname, __FILE__, __LINE__);

        @mysql_select_db($dbname, $conn);
        $this->dbname = $dbname;
        @mysql_query('SET NAMES UTF8', $conn);
    }

    public function close()
    {
        @mysql_close($this->conn_r);
        @mysql_close($this->conn_w);
        $this->dbname = null;
        $this->conn_r = $this->conn_w = null;
    }

    public function beginTransaction() {
        self::_doQuery('BEGIN', 'w');
    }

    public function endTransaction() {
        self::_doQuery('END', 'w');
    }

    public function commit() {
        self::_doQuery('COMMIT', 'w');
    }

    public function rollback() {
        self::_doQuery('ROLLBACK', 'w');
    }

    protected function _doQuery($strSql, $rw)
    {
        self::$queryNum++;

        $startTime = microtime(true);
        $conn = $this->getConnection($rw);
        $ret = mysql_query($strSql, $conn);
        $endTime = microtime(true);

        if (MDict::D('is_debug')) {
            $timeSpan = $endTime - $startTime;
            self::$sqlLog[] = array('db' => $this, 'conn' => $conn, 'sql' => $strSql, 'span' => sprintf("%.3fms", $timeSpan * 1000));
            self::$timeSpan+= $timeSpan;
        }

        if (mysql_errno($conn) !== 0) {
            Trace::fatal('query failed. errno:'.mysql_errno().' error:'.mysql_error(), __FILE__, __LINE__);
        }
        return $ret;
    }

    public function doInsert($strSql)
    {
        self::$insertNum++;
        return $this->_doQuery($strSql, 'w');
    }

    public function doUpdate($strSql)
    {
        self::$updateNum++;
        return $this->_doQuery($strSql, 'w');
    }

    public function doDelete($strSql)
    {
        self::$deleteNum++;
        return $this->_doQuery($strSql, 'w');
    }

    public function doSelect($strSql)
    {
        self::$selectNum++;
        return $this->_doQuery($strSql, 'r');
    }

    public function doRead($sql) {
        self::$readNum++;
        return $this->_doQuery($sql, 'r');
    }

    public function doWrite($sql) {
        self::$writeNum++;
        return $this->_doQuery($sql, 'w');
    }

/*
    //  这个方法不再用，请用doRead, doWrite
    public function doQuery($sql) {
        return $this->_doQuery($sql);
    }
//*/

    public function affectedRows() {
        $conn = self::getConnection('w');
        return mysql_affected_rows($conn);
    }

    public function lastInsertID() {
        $ret = $this->doWrite("SELECT LAST_INSERT_ID()");
        $rs = mysql_fetch_array($ret);
        if (is_null($rs)) {
            return null;
        }
        return $rs[0];
    }

    public function lastError() {
        return mysql_error();
    }

    public function lastErrno() {
        return mysql_errno();
    }

    public function rs2array($strSql)
    {
        $rs = $this->doSelect($strSql);
        if (false === $rs) {
            return false;
        }
        $ret = array();
        if ($rs) {
            while ($row = @mysql_fetch_assoc($rs)) {
                $ret[] = $row;
            }
        }
        return  $ret;
    }

    public function rs2oneColumnArray($sql) {
        $rs = $this->doSelect($sql);
        if (false === $rs) {
            return false;
        }
        $ret = array();
        if ($rs) {
            while ($row = @mysql_fetch_row($rs)) {
                $ret[] = $row[0];
            }
        }
        return  $ret;
    }

    public function rs2keyarray($sql, $key) {
        $rs = $this->doSelect($sql);
        if (false === $rs) {
            return false;
        }
        $ret = array();
        if ($rs) {
            while ($row = @mysql_fetch_assoc($rs)) {
                $resultKey = $row[$key];
                $ret[$resultKey] = $row;
            }
        }
        return  $ret;
    }

    public function rs2rowline($strSql)
    {
        $rs = $this->doSelect($strSql);
        if (false === $rs) {
            return false;
        }
        $ret = @mysql_fetch_assoc($rs);
        if (false === $ret) {
            return null;
        }
        return  $ret;
    }

    public function rs2rowcount($strSql)
    {
        $ret = $this->rs2firstvalue($strSql);
        return $ret;
    }

    public function rs2firstvalue($strSql)
    {
        $row = $this->rs2rowline($strSql);
        if (false === $row) {
            return false;
        } elseif (null === $row) {
            return null;
        }

        if (!is_array($row)) {
            return false;
        }

        $ret = array_values($row);
        return $ret[0];
    }

    public function rs2foundrows()
    {
        return $this->rs2firstvalue("SELECT FOUND_ROWS()");
    }

    public static function realEscapeString($string)
    {
        return @mysql_real_escape_string($string);
    }

    public static function getQueryNum()
    {
        return self::$queryNum;
    }

    public static function getInsertNum()
    {
        return self::$insertNum;
    }

    public static function getDeleteNum()
    {
        return self::$deleteNum;
    }

    public static function getUpdateNum()
    {
        return self::$updateNum;
    }

    public static function getSelectNum()
    {
        return self::$selectNum;
    }

    public static function getSqlLog()
    {
        return self::$sqlLog;
    }

    public static function getTimeSpan() {
        return self::$timeSpan;
    }

    /**
     * make up insert statement
     *
     * @param string $table
     * @param string $fields_values
     * @param DBProxy $dbProxy
     */
    public static function insertStatement($table, $fields_values, $dbProxy = null) {
        $arrayFields = array();
        $arrayValues = array();
        foreach ($fields_values as $field => $value) {
            $arrayFields[] = '`'.$field.'`';
            $arrayValues[] = "'".DBProxy::realEscapeString($value)."'";
        }
        $strFields = join(', ', $arrayFields);
        $strValues = join(', ', $arrayValues);
        $sql = "INSERT INTO $table($strFields) VALUES($strValues)";
        return $sql;
    }

    /**
     * make up insert or update statement
     *
     * @param string $table
     * @param string $fields_values
     * @param string $updates
     * @param DBProxy $dbProxy
     */
    public static function insertOrUpdateStatement($table, $fields_values, $updates, $dbProxy = null) {
        $arrayFields = array();
        $arrayValues = array();
        foreach ($fields_values as $field => $value) {
            $arrayFields[] = '`'.$field.'`';
            $arrayValues[] = "'".DBProxy::realEscapeString($value)."'";
        }
        $strFields = join(', ', $arrayFields);
        $strValues = join(', ', $arrayValues);

        $arrayUpdates = array();
        foreach ($updates as $upKey => $upValue) {
            $arrayUpdates[] = "`".DBProxy::realEscapeString($upKey)."`='".DBProxy::realEscapeString($upValue)."'";
        }
        $strUpdates = join(', ', $arrayUpdates);

        $sql = "INSERT INTO $table($strFields)
                VALUES($strValues)
                ON DUPLICATE KEY UPDATE $strUpdates";

        return $sql;
    }

    public static function updateStatement($table, $updates, $where, $dbProxy, $limit = 0x7fffffff) {
        $arrayUpdates = array();
        foreach ($updates as $upKey => $upValue) {
            $arrayUpdates[] = "`".$dbProxy->realEscapeString($upKey)."`='".$dbProxy->realEscapeString($upValue)."'";
        }
        $strUpdates = join(', ', $arrayUpdates);

        $sql = "UPDATE $table
                SET $strUpdates
                WHERE $where
                LIMIT ".intval($limit);

        return $sql;
    }

    public function doDeleteWithAffectedRows($sql) {
        $result = MResult::result(MResult::FAIL);

        do {
            $ret = $this->doDelete($sql);
            if (false === $ret) {
                Trace::debug('delete failed', __FILE__, __LINE__);
                break;
            }

            $ret = $this->affectedRows();
            if (false === $ret) {
                Trace::debug('get affect rows failed', __FILE__, __LINE__);
            }
            $info = $ret;

            $result = MResult::result(MResult::SUCCESS, $info);

        } while (false);

        return $result;
    }

    public function doUpdateWithAffectedRows($sql) {
        $result = MResult::result(MResult::FAIL);

        do {
            $ret = $this->doUpdate($sql);
            if (false === $ret) {
                Trace::debug('update failed', __FILE__, __LINE__);
                $result = MResult::result(MResult::FAIL, mysql_error());
                break;
            }

            $ret = $this->affectedRows();
            if (false === $ret) {
                Trace::debug('get affect rows failed', __FILE__, __LINE__);
            }
            $info = $ret;

            $result = MResult::result(MResult::SUCCESS, $info);

        } while (false);

        return $result;
    }

    public function doInsertWithInsertedID($sql) {
        $result = MResult::result(MResult::FAIL);
        do {
            $ret = $this->doInsert($sql);
            if (false === $ret) {
                Trace::debug('insert failed', __FILE__, __LINE__);
                $result = MResult::result(MResult::FAIL, mysql_error());
                break;
            }

            $ret = $this->lastInsertID();
            if (false === $ret) {
                Trace::debug('get last insert id failed', __FILE__, __LINE__);
            }
            $insertID = $ret;

            $result = MResult::result(MResult::SUCCESS, $insertID);

        } while (false);

        return $result;
    }

    public function doSelectWithFoundRows($sql) {
        $result = MResult::result(MResult::FAIL);

        do {
            $ret = $this->rs2array($sql);
            if (false === $ret) {
                Trace::debug('select failed', __FILE__, __LINE__);
                $result = MResult::result(MResult::FAIL, mysql_error());
                break;
            }
            $recordset = $ret;

            $ret = $this->rs2foundrows();
            if (false === $ret) {
                Trace::debug('get foundrows failed', __FILE__, __LINE__);
                $result = MResult::result(MResult::FAIL, mysql_error());
                break;
            }
            $foundRows = $ret;

            $info = array(
                'recordset' => $recordset,
                'foundrows' => $foundRows,
            );
            $result = MResult::result(MResult::SUCCESS, $info);

        } while (false);

        return $result;
    }


}











