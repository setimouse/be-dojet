<?php
interface IAutoloader {

    public function getAutoloadPath();

    public function getAutoloadCachePath();

    public function getAutoloadCacheIdentify();

}