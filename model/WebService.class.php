<?php
/**
 *
 * @author setimouse@gmail.com
 * @since 2014 5 2
 */
abstract class WebService extends Service implements IDispatcherDelegate {

    public function dispatcherDelegate() {
        return $this;
    }

    //  dispatcher delegate
    public function dispatcher() {
        return new Dispatcher($this);
    }

    public function dispatchFinished() {

    }

    public function requestUriWillDispatch($requestUri) {
        $requestUri = substr($requestUri, 1);
        return $requestUri;
    }

    public function dojetDidStart() {
        $delegate = $this->dispatcherDelegate();

        $requestUri = $delegate->requestUriWillDispatch($_SERVER['REQUEST_URI']);

        $dispatcher = $delegate->dispatcher();
        $dispatcher->dispatch($requestUri);
    }

}