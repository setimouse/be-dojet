<?php
abstract class AppHelper implements IConfigDelegate, IAutoloader {

    private static $instance = null;

    public static function getInstance() {
        if (!self::$instance) {
            $class = get_called_class();
            self::$instance = new $class;
        }
        return self::$instance;
    }

    public function getConfigFiles() {
        return array();
    }

    public function getAutoloadPath() {
        return array();
    }

    public function getAutoloadCachePath() {
        return null;
    }

    public function getAutoloadCacheIdentify() {
        return '';
    }

}