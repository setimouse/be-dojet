<?php
interface DJBasePlugin {

    public static function loadConfig($dirname);

    public static function autoload($className);

}