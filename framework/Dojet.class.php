<?php
/**
 * @author     Leeyan <setimouse@gmail.com>
 * @copyright  2009-2014 Leeyan.
 * @license    http://www.opensource.org/licenses/mit-license.php  MIT License
 * @version    0.1
 */
class Dojet {

    /**
     * @var BaseService
     **/
    protected $service;

    public function load(BaseService $service) {

        DAssert::assert($service instanceof BaseService, 'service must be BaseService');

        $this->service = $service;

        //  include configs
        $this->load_all_configs();
    }

    public function dispatch() {
        $requestUri = substr($_SERVER['REQUEST_URI'], 1);
        $dispatcher = new Dispatcher($this->service);
        $dispatcher->dispatch($requestUri);
    }

    private function load_all_configs() {
        $arrConfigPath = $this->service->getConfigPath();

        foreach ($arrConfigPath as $configPath) {
            $this->load_config($configPath);
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

}