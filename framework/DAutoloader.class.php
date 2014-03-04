<?php
class DAutoloader {

    private static $instance;

    protected static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new DAutoloader();
        }
        return self::$instance;
    }

    public static function register($func = null) {
        if (!is_callable($func)) {
            $autoloader = self::getInstance();
            $func = array($autoloader, 'autoload');
        }

        spl_autoload_register($func);
    }

    protected function autoload($className) {
        $include_path = array(
            UI,
            LIB,
            DAL,
            DLIB,
            DDAL,
            MODEL,
            DMODEL,
            FRAMEWORK,
            DUTIL,
        );

        foreach ($include_path as $path) {
            $arrayClassFileNames = array($path.$className.'.class.php', $path.$className.'.php');
            foreach ($arrayClassFileNames as $filename) {
                if (file_exists($filename)) {
                    require_once($filename);
                    return ;
                }
            }
        }

        trigger_error("class $className not found!\n");
    }

}