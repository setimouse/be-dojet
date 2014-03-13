<?php

class Config {

    public static function loadConfig($confFile) {
        require_once($confFile);
    }

    /**
     * 通过keypath获取value
     * keypath是以'.'分割的字符串
     *
     * @param string $keyPath
     * @return mix
     */
    public static function configForKeyPath($keyPath, $config = null) {
        $key = strtok($keyPath, '.');
        if (is_null($config)) {
            $config = $GLOBALS['config'];
        }
        while ($key && $config) {
            if (!key_exists($key, $config)) {
                return null;
            }
        	$config = $config[$key];
        	$key = strtok('.');
        }
        return $config;
    }

    public static function &configRefForKeyPath($keyPath) {
        $key = strtok($keyPath, '.');
        $value = &$GLOBALS['config'];
        while ($key) {
            if (!is_array($value)) {
            	$value = array();
            }

            if (!key_exists($key, $value)) {
            	$value[$key] = null;
            }
        	$value = &$value[$key];
        	$key = strtok('.');
        }
        return $value;
    }

    /**
     * 获取runtime下的配置项信息
     *
     * @param string $keyPath
     * @param string $runtime
     * @return mix
     */
    public static function runtimeConfigForKeyPath($keyPath, $runtime = null) {
        ($runtime !== null) or $runtime = Config::configForKeyPath('global.runtime');
        if (false !== strpos($keyPath, '.$.')) {
            $runtimeKeypath = str_replace('.$.', '.'.$runtime.'.', $keyPath);
        } else {
            $runtimeKeypath = $keyPath.'.'.$runtime;
        }
        return Config::configForKeyPath($runtimeKeypath);
    }
}












