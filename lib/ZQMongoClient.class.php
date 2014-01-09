<?php
class ZQMongoClient {

	private $client = null;

    function __construct($mongoClient) {
        $this->client = $mongoClient;
    }

    /**
     * 工厂方法
     *
     * @param string $server
     * @param array $options
     * @return ZQMongoClient
     */
    public static function newInstance($server, $options = array('connect' => true)) {
        $mongoClient = new MongoClient($server, $options);
        return new ZQMongoClient($mongoClient);
    }

    public function selectDB($name) {
        $mongoDB = $this->client->selectDB($name);
        return new ZQMongoDB($mongoDB);
    }

    public function connect() {
    	$this->client->connect();
    }

    public function __toString() {
    	return $this->client->__toString();
    }

    public function getMongoClient() {
    	return $this->client;
    }

}