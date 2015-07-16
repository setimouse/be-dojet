<?php
/**
 * @author     Leeyan <setimouse@gmail.com>
 * @copyright  2009-2015 Leeyan.
 * @license    http://www.opensource.org/licenses/mit-license.php  MIT License
 * @version    0.1
 */
class Dojet {

    /**
     * @var Service
     **/
    protected $service;

    protected $arrAutoloaders = array();

    protected static $dojet;

    function __construct() {
        spl_autoload_register(array($this, 'autoload'));
    }

    public static function getInstance() {
        if (!self::$dojet) {
            self::$dojet = new Dojet();
        }
        return self::$dojet;
    }

    public function start(Service $service) {

        DAssert::assert($service instanceof Service, 'service must be Service');

        $this->service = $service;

        $service->dojetDidStart();
    }

    public function addAutoloader(IAutoloader $autoloader) {
        $key = md5(serialize($autoloader));
        $this->arrAutoloaders[$key] = $autoloader;
    }

    public function autoload($className) {
        foreach ($this->arrAutoloaders as $autoloader) {
            if ($autoloader->autoload($className)) {
                return true;
            }
        }

        $includePath = array(FRAMEWORK, DLIB, DMODEL, DUTIL);
        foreach ($includePath as $path) {
            $filepath = $path.$className.'.class.php';
            if (file_exists($filepath)) {
                require_once($filepath);
                return true;
            }
        }

        trigger_error("class $className not found!\n");
    }

}
