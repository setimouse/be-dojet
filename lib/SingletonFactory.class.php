<?php

class SingletonFactory {

    private static $_instances;
    
	public static function getInstance($className) {
	    if (!isset(self::$_instances[$className])) {
	    	self::$_instances[$className] = new $className();
	    }
	    return self::$_instances[$className];
	}
}