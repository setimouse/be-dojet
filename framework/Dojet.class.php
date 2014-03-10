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
        $this->arrPlugins[] = $plugin;
    }

    private function init() {
        //  include configs
        $this->load_all_configs();

        ini_set('display_errors', Config::configForKeyPath('global.display_errors'));
    }

    private function load_all_configs() {
        $dir = opendir(CONFIG);
        while (false !== ($confFile = readdir($dir))) {
            if ('.' === $confFile || '..' === $confFile || substr($confFile, -9) !== '.conf.php' || $confFile=='package.conf.php') {
                continue;
            }

            include_once(CONFIG.$confFile);
        }
    }

    private function load_all_packages() {
        if (!file_exists(CONFIG."package.conf.php")) {
            return;
        }
        include(CONFIG."package.conf.php");
        $packages = Config::configForKeyPath('package');
        foreach ((array)$packages as $thePackage) {
            $confFile = DGLOBAL.$thePackage.'.conf.php';
            assert(file_exists($confFile));
            include_once($confFile);
        }
    }

}