<?php
class DAutoloader {

    private static $instance;

    /**
     * @var IAutoloader
     **/
    private $delegate;

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

    public function setDelegate(IAutoloader $delegate) {
        DAssert::assert($delegate instanceof IAutoloader, 'autoloader must be IAutoloader');
        $this->delegate = $delegate;
    }

    protected function getClassCacheKey($className, IAutoloader $autoloader) {
        $id = $autoloader->getAutoloadCacheIdentify();
        return sha1($id.$className);
    }

    protected function cachedAutoload($className) {
        $delegate = $this->delegate;
        do {
            if (is_null($delegate)) {
                break;
            }

            $classKey = $this->getClassCacheKey($className, $delegate);
            $cachePath = $delegate->getAutoloadCachePath();
            if (empty($cachePath)) {
                break;
            }
            $cacheFilename = $cachePath.'/'.$classKey;
            if (!file_exists($cacheFilename)) {
                break;
            }
            $classFilename = file_get_contents($cacheFilename);
            if (!file_exists($classFilename)) {
                break;
            }
            require_once($classFilename);
            return;
        } while (0);

        return $this->autoload($className);
    }

    protected function autoload($className) {
        $include_path = array(
            DLIB,
            DMODEL,
            DUTIL,
            FRAMEWORK,
            DOJET_PATH,
        );

        if ($this->delegate) {
            $include_path = array_merge($include_path, $this->delegate->getAutoloadPath());
        }

        foreach ($include_path as $path) {
            $arrayClassFileNames = array($path.$className.'.class.php');
            foreach ($arrayClassFileNames as $filename) {
                if (file_exists($filename)) {
                    require_once($filename);
                    //  save cache
                    if ($this->delegate) {
                        $cachePath = $this->delegate->getAutoloadCachePath();
                        if (empty($cachePath)) {
                            continue;
                        }
                        $classKey = $this->getClassCacheKey($className, $this->delegate);
                        $filename = realpath($filename);
                        $cacheFilename = $cachePath.'/'.$classKey;
                        @file_put_contents($cacheFilename, $filename);
                    }
                    //  save cache
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
