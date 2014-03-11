<?php
/**
 *
 */
abstract class BaseWebService extends BaseService{

    public function dispatchFinished() {}

    public function getActionPath() {
        return '';
    }

}