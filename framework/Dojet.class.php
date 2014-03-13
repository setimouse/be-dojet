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
        DAssert::assert($this->service instanceof BaseWebService, 'dispatch service must be BaseWebService');
        $dispatcher = new Dispatcher($this->service);
        $dispatcher->dispatch($requestUri);
    }

    private function load_all_configs() {
        $arrConfigs = $this->service->getConfigs();

        foreach ($arrConfigs as $confFile) {
            Config::loadConfig($confFile);
        }
    }

}