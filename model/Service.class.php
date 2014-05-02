<?php
/**
 *
 * @author setimouse@gmail.com
 * @since 2014 5 2
 */
abstract class Service {

    private $dojetDelegate;
    private $configDelegate;

    function __construct() {

    }

    public function setDojetDelegate(IDojetDelegate $delegate) {
        DAssert::assert($delegate instanceof IDojetDelegate, 'illegal dojetDelegate');
        $this->dojetDelegate = $delegate;
    }

    public function setConfigDelegate(IConfigDelegate $delegate) {
        DAssert::assert($delegate instanceof IConfigDelegate, 'illegal configDelegate');
        $this->configDelegate = $delegate;
    }

    public function dojetDelegate() {
        return $this->dojetDelegate;
    }

    public function configDelegate() {
        return $this->configDelegate;
    }

}