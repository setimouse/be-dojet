<?php
class MCookie {

    public static function setCookie($key, $value = null, $expire = null, $path = null,
            $domain = null, $secure = null, $httponly = null) {
        setcookie($key, $value, $expire, $path, $domain, $secure, $httponly);
        $_COOKIE[$key] = $value;
    }

    public static function getCookie($key) {
        if (key_exists($key, $_COOKIE)) {
        	return $_COOKIE[$key];
        }
        return null;
    }

    public static function removeCookie($key) {
        self::setCookie($key, null, 0, '/');
    }

    public static function getFirstCookieByPre($pre) {
    	foreach($_COOKIE as $name=>$value) {
    		if(strpos($name, $pre) === 0){
    			//Trace::debug('getFirstCookieByPre succcess, $value='.$value);
    			return $value;
    		}
    	}
    	return null;
    }
}