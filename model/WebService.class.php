<?php
/**
 *
 * @author setimouse@gmail.com
 * @since 2014 5 2
 */
abstract class WebService extends Service implements IDojetDelegate {

    private $dispatcherDelegate;

    function __construct() {
        parent::__construct();
        $this->setDojetDelegate($this);
    }

    public function setDispatcherDelegate(IDispatcherDelegate $delegate) {
        DAssert::assert($delegate instanceof IDispatcherDelegate, 'illegal DispatcherDelegate');
        $this->dispatcherDelegate = $delegate;
    }

    public function dispatcherDelegate() {
        return $this->dispatcherDelegate;
    }

    public function dojetDidStart() {
        $delegate = $this->dispatcherDelegate();

        $requestUri = substr($_SERVER['REQUEST_URI'], 1);
        $requestUri = $delegate->requestUriWillDispatch($requestUri);

        $dispatcher = $delegate->dispatcher();
        $dispatcher->dispatch($requestUri);
    }

}