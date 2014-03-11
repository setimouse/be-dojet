<?php
class DAutoloader {

    private static $instance;
    private $arrAutoloader;

    function __construct() {
        $this->arrAutoloader = array();
    }

    public static function getInstance() {
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

    public function addAutoloader(IAutoloader $autoloader) {
        DAssert::assert($autoloader instanceof IAutoloader, 'autoloader must be IAutoloader');
        $this->arrAutoloader[] = $autoloader;
    }

    protected function autoload($className) {
        $include_path = array(
            DLIB,
            DMODEL,
            DUTIL,
            FRAMEWORK,
            DOJET,
        );

        foreach ($this->arrAutoloader as $autoloader) {
            array_merge($include_path, $autoloader->getAutoloadPath());
        }

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