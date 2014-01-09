<?php
class MDict {
    
    private static $_dict = array();
    
    public static function D($key, $value = null) {
    	if (null === $value) {
            if (!key_exists($key, self::$_dict)) {
                return null;
            }
    	    return self::$_dict[$key];
    	} else {
    	    self::$_dict[$key] = $value;
    	}
    }
    
    public static function remove($key) {
    	if (isset(self::$_dict[$key])) {
    	    unset(self::$_dict[$key]);
    	}
    }
    
}