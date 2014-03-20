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
            $func = array($autoloader, 'cachedAutoload');
        }

        spl_autoload_register($func);
    }

    public function addAutoloader(IAutoloader $autoloader) {
        DAssert::assert($autoloader instanceof IAutoloader, 'autoloader must be IAutoloader');
        $this->arrAutoloader[] = $autoloader;
    }

    protected function getClassCacheKey($className, IAutoloader $autoloader) {
        $id = $autoloader->getAutoloadCacheIdentify();
        return sha1($id.$className);
    }

    protected function cachedAutoload($className) {
        foreach ($this->arrAutoloader as $autoloader) {
            $classKey = $this->getClassCacheKey($className, $autoloader);
            $cachePath = $autoloader->getAutoloadCachePath();
            if (empty($cachePath)) {
                continue;
            }
            $cacheFilename = $cachePath.'/'.$classKey;
            if (!file_exists($cacheFilename)) {
                continue;
            }
            $classFilename = file_get_contents($cacheFilename);
            if (!file_exists($classFilename)) {
                continue;
            }
            require_once($classFilename);
            return;
        }

        return $this->autoload($className);
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
            $include_path = array_merge($include_path, $autoloader->getAutoloadPath());
        }

        foreach ($include_path as $path) {
            $arrayClassFileNames = array($path.$className.'.class.php', $path.$className.'.php');
            foreach ($arrayClassFileNames as $filename) {
                if (file_exists($filename)) {
                    require_once($filename);
                    //  save cache
                    foreach ($this->arrAutoloader as $autoloader) {
                        $cachePath = $autoloader->getAutoloadCachePath();
                        if (empty($cachePath)) {
                            continue;
                        }
                        $classKey = $this->getClassCacheKey($className, $autoloader);
                        $cacheFilename = $cachePath.'/'.$classKey;
                        @file_put_contents($cacheFilename, $filename);
                    }
                    return ;
                }
            }
        }

        trigger_error("class $className not found!\n");
    }

    public function loadClassRecursive($className, $path) {
        $filename = $path.'/'.$className.'.class.php';
        if (file_exists($filename)) {
            require_once($filename);
            return true;
        }

        $dir = opendir($path);
        while (false !== ($confFile = readdir($dir))) {
            if ('.' === $confFile || '..' === $confFile) {
                continue;
            }

            $dirname = $path.'/'.$confFile;
            if (is_dir($dirname)) {
                if ($this->loadClassRecursive($className, $dirname)) {
                    return true;
                }
            }
        }

        return false;
    }

}