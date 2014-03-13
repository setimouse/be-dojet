<?php
/**
 *
 */
abstract class BaseWebService extends BaseService{

    public function getDispatchConf() {
        return PRJ.'config/dispatch.conf.php';
    }

    public function dispatchFinished() {}

    public function getActionPath() {
        return '';
    }

}