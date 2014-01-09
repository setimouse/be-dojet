<?php

class ZQMongoDB {

    private $db;

    function __construct($mongoDB) {
        $this->db = $mongoDB;
    }

    /**
     * 工厂方法
     *
     * @param ZQMongoClient $conn
     * @param string $name
     * @return ZQMongoDB
     */
    public static function newInstance($conn, $name) {
        $mongoClient = $conn->getMongoClient();
        return new ZQMongoDB($mongoClient);
    }

    public function createCollection($name, $options = array()) {
        $mongoCollection = $this->db->createCollection($name, $options);
        return new ZQMongoCollection($mongoCollection);
    }

    public function selectCollection($name) {
        $mongoCollection = $this->db->selectCollection($name);
        return new ZQMongoCollection($mongoCollection);
    }

    public function getMongoDB() {
    	return $this->db;
    }

}