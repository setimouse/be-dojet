<?php
/**
 *
 */
abstract class BaseWebService extends BaseService {

    public function getDispatchConf() {
        return '';
    }

    public function dispatchFinished() {}

    public function getActionPath() {
        return '';
    }

}