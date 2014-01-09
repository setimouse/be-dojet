<?php

class ZQMongoCursor {

    private $cursor;

    function __construct($mongoCursor) {
        $this->cursor = $mongoCursor;
    }

    /**
     * 工厂方法
     *
     * @param ZQMongoClient $connection
     * @param string $ns
     * @param array $query
     * @param array $fields
     * @return ZQMongoCursor
     */
    public static function getInstance($connection, $ns, $query = array(), $fields = array()) {
        $mongoClient = $connection->getMongoClient();
        return new ZQMongoCursor($mongoClient, $ns, $query, $fields);
    }

    public function count($foundOnly = false) {
        return $this->cursor->count($foundOnly);
    }

    public function current() {
        return $this->cursor->current();
    }

    /**
     *
     * @param array $f
     * @return ZQMongoCursor
     */
    public function fields($f) {
        $mongoCursor = $this->cursor->fields($f);
        return new ZQMongoCursor($mongoCursor);
    }

    public function getNext() {
        return $this->cursor->getNext();
    }

    public function hasNext() {
        return $this->cursor->hasNext();
    }

    /**
     * @param int $num
     * @return ZQMongoCursor
     */
    public function limit($num) {
        $mongoCursor = $this->cursor->limit($num);
        return new ZQMongoCursor($mongoCursor);
    }

    /**
     * @param int $num
     * @return ZQMongoCursor
     */
    public function skip($num) {
        $mongoCursor = $this->cursor->skip($num);
        return new ZQMongoCursor($mongoCursor);
    }

    /**
     * @param array $fields
     * @return ZQMongoCursor
     */
    public function sort($fields) {
        $mongoCursor = $this->cursor->sort($fields);
        return new ZQMongoCursor($mongoCursor);
    }

    public function getMongoCursor() {
        return $this->cursor;
    }

    public function rs2array() {
        $arrResult = array();
        while ($this->hasNext()) {
            $arrResult[] = $this->getNext();
        }
        return $arrResult;
    }

}