<?php
/**
 *
 * @author setimouse@gmail.com
 * @since 2014 5 2
 */
abstract class WebService extends Service implements IDispatcherDelegate {

    private $dispatcherDelegate;

    function __construct() {
        parent::__construct();
        $this->setDispatcherDelegate($this);
    }

    public function setDispatcherDelegate(IDispatcherDelegate $delegate) {
        DAssert::assert($delegate instanceof IDispatcherDelegate, 'illegal DispatcherDelegate');
        $this->dispatcherDelegate = $delegate;
    }

    public function dispatcherDelegate() {
        return $this->dispatcherDelegate;
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