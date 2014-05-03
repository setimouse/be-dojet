<?php
class AppHelper implements IConfigDelegate {

    private static $instance = null;

    public static function getInstance() {
        if (!self::$instance) {
            $class = get_called_class();
            self::$instance = new $class;
        }
        return self::$instance;
    }

    public function configs() {
        return array();
    }

}