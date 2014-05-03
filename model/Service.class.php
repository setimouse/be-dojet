<?php
/**
 *
 * @author setimouse@gmail.com
 * @since 2014 5 2
 */
abstract class Service implements IDojetDelegate, IConfigDelegate {

    public function dojetDelegate() {
        return $this;
    }

    public function configDelegate() {
        return $this;
    }

    //  config delegate
    public function configs() {
        $configs = array();

        return $configs;
    }

    public function dojetDidStart() {

    }

}