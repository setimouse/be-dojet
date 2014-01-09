<?php

class ZQMongoCollection {

    private $collection;

    function __construct($mongoCollection) {
        $this->collection = $mongoCollection;
    }

    /**
     * 工厂方法
     *
     * @param ZQMongoDB $db
     * @param string $name
     * @return ZQMongoCollection
     */
    public static function newInstance($db, $name) {
        $mongoDB = $db->getMongoDB();
        $collection = new MongoCollection($mongoDB, $name);
        return new ZQMongoCollection($collection);
    }

    /**
     *
     * @param array $query
     * @param array $fields
     * @return ZQMongoCursor
     */
    public function find($query = array(), $fields = array()) {
        $mongoCursor = $this->collection->find($query, $fields);
        return new ZQMongoCursor($mongoCursor);
    }

    public function findOne($query = array(), $fields = array()) {
        return $this->collection->findOne($query, $fields);
    }

    public function insert($a, $options = array()) {
        return $this->collection->insert($a, $options);
    }

    public function remove($criteria = array(), $options = array()) {
        return $this->collection->remove($criteria, $options);
    }

    public function save($a, $options = array()) {
        return $this->collection->save($a, $options);
    }

    public function update($criteria, $new_object, $options = array()) {
        return $this->collection->update($criteria, $new_object, $options);
    }

    public function group($keys, $initial, $reduce, $options = array()) {
        return $this->collection->group($keys, $initial, $reduce, $options);
    }

    public function count($query = array()) {
        return $this->collection->count($query);
    }

    public function getMongoCollection() {
        return $this->collection;
    }

}