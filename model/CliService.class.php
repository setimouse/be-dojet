<?php
/**
 * @author liyan
 * @since 2014 5 1
 */
abstract class CliService extends Service implements IDojetDelegate {

    function __construct() {
        parent::__construct();
        $this->setDojetDelegate($this);
    }

    public function dojetDidStart() {

    }

}