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

    public function start(Service $service) {

        DAssert::assert($service instanceof Service, 'service must be Service');

        $this->service = $service;

        //  include configs
        $this->load_all_configs();

        $service->dojetDidStart();
    }

    private function load_all_configs() {
        $arrConfigs = $this->service->configDelegate()->getConfigFiles();

        foreach ($arrConfigs as $confFile) {
            Config::loadConfig($confFile);
        }
    }

}
