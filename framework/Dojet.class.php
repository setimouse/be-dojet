<?php
/**
 * @author     Leeyan <setimouse@gmail.com>
 * @copyright  2009-2014 Leeyan.
 * @license    http://www.opensource.org/licenses/mit-license.php  MIT License
 * @version    0.1
 */
class Dojet {

    private $arrPlugins;

    function __construct() {
        $this->arrPlugins = array();
    }

    public function start() {
        $this->init();
        $requestUri = substr($_SERVER['REQUEST_URI'], 1);
        $dispatcher = SingletonFactory::getInstance('Dispatcher');
        $dispatcher->dispatch($requestUri);
    }

    public function addPlugin(DJBasePlugin $plugin) {
        DAssert::assert($plugin instanceof DJBasePlugin, 'plugin must implement DJBasePlugin',
            __FILE__, __LINE__);
        $this->arrPlugins[] = $plugin;
    }

    private function init() {
        //  include configs
        $this->load_all_configs();

        ini_set('display_errors', Config::configForKeyPath('global.display_errors'));

        spl_autoload_register($this->autoload);
    }

    private function load_all_configs() {
        $this->load_config(CONFIG);
        foreach ($this->arrPlugins as $plugin) {
            $plugin->loadConfig();
        }
    }

    public function load_config($dirname) {
        $dir = opendir($dirname);
        while (false !== ($confFile = readdir($dir))) {
            if ('.' === $confFile || '..' === $confFile || substr($confFile, -9) !== '.conf.php') {
                continue;
            }

            if (file_exists($dirname.$confFile)) {
                include_once($dirname.$confFile);
            }
        }
    }

    public function autoload($className) {
        $include_path = array(
            DLIB,
            DDAL,
            DMODEL,
            FRAMEWORK,
            DUTIL,
        );

        foreach ($include_path as $path) {
            if ($this->loadClassRecursive($className, $path)) {
                return false;
            }
        }

        foreach ($this->arrPlugins as $plugin) {
            if($plugin->autoload($className)) {
                //  class found, return!
                return;
            }
        }

        trigger_error("class $className not found!\n");
    }


}