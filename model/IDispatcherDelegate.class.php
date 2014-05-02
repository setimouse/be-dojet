<?php
/**
 *
 * @author setimouse@gmail.com
 * @since 2014 5 2
 */
interface IDispatcherDelegate {

    public function dispatcher();
    public function getDispatchConf();
    public function dispatchFinished();
    public function getActionPath();
    public function requestUriWillDispatch($requestUri);

}