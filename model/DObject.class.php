<?php
class DObject {

    private $observers = array();

    private $id;

    const VALUE_CHANGE = 1;

    private static $arrIdObjects = array();

    function __construct() {
        $this->id = uniqid();
        self::$arrIdObjects[$this->id] = $this;
    }

    function __destruct() {
        unset(self::$arrIdObjects[$this->id]);
    }

    public function id() {
        return $this->id;
    }

    public static function objectForId($id) {
        if (isset(self::$arrIdObjects[$id])) {
            return self::$arrIdObjects[$id];
        }
        return null;
    }

    public function addObserver(DObject $observer, $key, $options) {
        $id = $observer->id();
        $this->observers[$key][$id] = $options;
    }

    public function removeObserver(DObject $observer, $key) {
        $id = $observer->id();
        if (isset($this->observers[$key][$id])) {
            unset($this->observers[$key][$id]);
        }
    }

    public function __set($key, $value) {
        $this->$key = $value;
        if (isset($this->observers[$key])) {
            foreach ($this->observers[$key] as $id => $options) {
                $observer = self::objectForId($id);
                $observer->observeValueChangedForKey($key, $this, $value);
            }
        }
    }

    public function observeValueChangedForKey($key, $object, $newValue) {

    }

}