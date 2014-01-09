<?php
class ZQDBMongoProxy {

    /**
     * @var ZQMongoClient
     */
    private $conn_r = null;

    /**
     * @var ZQMongoClient
     */
    private $conn_w = null;

    /**
     * @var ZQMongoDB
     */
    private $db_r;

    /**
     * @var ZQMongoDB
     */
    private $db_w;

    //  连接池
    protected static $conn_pool = array();

    /**
     * @return ZQDBMongoProxy
     */
    public static function getInstance() {
        return SingletonFactory::getInstance(__CLASS__);
    }

    public function __construct() {
        $this->db_r = $this->db_w = null;
        $this->conn_r = $this->conn_w = null;
    }

    /**
     * @param string $database
     * @return ZQMongoClient
     */
    public function connectDB($database) {
        $runtime = Config::configForKeyPath('global.runtime');
        $dbConfig = Config::configForKeyPath('mongodb.'.$runtime.'.'.$database);

        foreach (array('r', 'w') as $rw) {
            $conf = $dbConfig[$rw];
            $dbIndex = rand(0, count($conf['hosts']) - 1);
            $host = $conf['hosts'][$dbIndex];
            $username = $conf['username'];
            $password = $conf['password'];
            $dbname = $conf['dbname'];

            $client = $this->connect($host, $username, $password);

            //  conn
            $conn = 'conn_'.$rw;
            $this->$conn = $client;

            //  db
            $dbrw = 'db_'.$rw;
            $this->$dbrw = $client->selectDB($dbname);

            Trace::debug('connect Mongo DB host='.$host);
        }

    }

    /**
     *
     * @param str $host
     * @param str $username
     * @param str $password
     * @param str $dbname
     * @return ZQMongoClient
     */
    public function connect($host, $username, $password)
    {
        if(strlen($host) <= 0 ) {
            return false;
        }

        $connKey = crc32(serialize(array($host, $username, $password)));
        $conn = null;
        if (isset(self::$conn_pool[$connKey])) {
            $conn = self::$conn_pool[$connKey];
        } else {
            $linkstr = '';
            if(strlen($username) > 0) {
                $linkstr=$username;
                if(strlen($password) > 0) {
                    $linkstr.=':'.$password.'';
                }
                $linkstr.='@';
            }
            $linkstr='mongodb://'.$linkstr.$host;

            Trace::debug('connect '.$linkstr, __FILE__, __LINE__);

            $conn = ZQMongoClient::newInstance($linkstr);
            self::$conn_pool[$connKey] = $conn;
        }

        return $conn;
    }

/*
    public function selectDB($dbname, $rw = 'w') {
        $conn = $rw === 'r' ? $this->conn_r : $this->conn_w;
        if($conn === null){
            return false;
        }
        $db = $conn->selectDB($dbname);
        if($db === null){
            return false;
        }
        $dbrw = 'db_'.$rw;
        $this->$dbrw = $db;
        return true;
    }
//*/

    public function getClientR() {
        return $this->conn_r;
    }

    public function getClientW() {
        return $this->conn_w;
    }

    /*
    * 插入或更新
    *
    * lihao 2013.8.14
    *
    */
    public function doInsertAndUpdate($collection_name, $data_array, $query, $wholeUpdate = true) {
        $collection = $this->getCollection($collection_name, 'w');

        $count = 0;
        $ret = $collection->count($collection_name, $query);
        if (false === $ret) {
            return false;
        }
        $count = intval($ret);

        if ($count === 0) {
            $ret = $collection->insert($collection_name, $data_array);
        } elseif ($count > 0) {
            if ($wholeUpdate !== true) {
                $data_array = array(
                    '$set' => $data_array
                );
            }
            $ret = $collection->update($query, $data_array);
        } else {
            return false;
        }
        return $ret;
    }

    /*
    *   2013.10.11 由于mongodb分片导致的程序逻辑改动
    */
    public function rs2keyarray($key, $collection_name, $query, $fields = array()) {
        $rs = array();
        $collection = $this->getCollection($collection_name, 'w');
        $cursor = $collection->find($query, $fields);
        while ($cursor->hasNext()) {
            $rs[] = $cursor->getNext();
        }

        $rs2key = array();
        foreach ($rs as $r) {
            $temp_key = $r[$key];
            if (!array_key_exists($temp_key, $rs2key)) {
                $rs2key[$temp_key] = $r;
            }
        }

        return $rs2key;
    }

    /**
     * 获取集合
     *
     * @param string $collection_name
     * @return ZQMongoCollection
     */
    public function getCollection($collection_name, $rw = 'w') {
        $db = 'r' === $rw ? $this->db_r : $this->db_w;
        return $db->selectCollection($collection_name);
    }

}