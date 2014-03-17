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

    public function requestUriWillDispatch($requestUri) {
        $requestUri = substr($requestUri, 1);
        return $requestUri;
    }

}