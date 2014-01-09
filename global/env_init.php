<?php
define('DGLOBAL', dirname(__FILE__).'/');

define('DOJET', realpath(DGLOBAL.'..').'/');
define('FRAMEWORK', DOJET.'framework/');

define('DUTIL',		DOJET.'util/');
define('DPROJECTS',	DOJET.'projects/');
define('DLOG',		DOJET.'log/');
define('DLIB',		DOJET.'lib/');
define('DDAL',		DOJET.'dal/');
define('DMODEL',	DOJET.'model/');

if (defined('PRJ')) {
    define('CONFIG',	PRJ.'config/');
    define('WEBROOT',	PRJ.'webroot/');
    define('LOG',		DOJET.'../../logs/');
    define('TEMPLATE',	PRJ.'template/');
    define('INC',		PRJ.'inc/');
    define('MODEL',		PRJ.'model/');
    define('DATA',		PRJ.'data/');
    define('LIB',       PRJ.'lib/');
    define('UI',        PRJ.'ui/');
    define('DAL',       PRJ.'dal/');
    define('UTIL',      PRJ.'util/');
    define('SCRIPT',    PRJ.'script/');

    define('STATIC_ROOT', WEBROOT.'static/');
}

include(DLIB.'function.inc.php');

date_default_timezone_set('Asia/Chongqing');
ini_set('mongo.native_long', 1);//解决mongodb将长整型转换为负数的问题

//  include global packages
load_all_packages();

//  include configs
load_all_configs();

// 激活断言，并设置它为 quiet
assert_options(ASSERT_ACTIVE, 1);
assert_options(ASSERT_WARNING, 0);
assert_options(ASSERT_QUIET_EVAL, 1);
assert_options(ASSERT_BAIL, 1);
assert_options(ASSERT_CALLBACK, "assert_handler");

ini_set('display_errors', Config::configForKeyPath('global.display_errors'));

// 断言处理函数
function assert_handler($file, $line, $code, $desc = null) {
    Trace::fatal("assert failed: $desc [$file][$line][$code]");
}

function __autoload($className)
{
    $md5Name = md5($className).'.php';

    if (_load_cache($md5Name)) {
        //  从cache载入成功
        return;
    }

    //kafka
    if(strpos($className, 'Kafka_') === 0){
    	return _kafka_load_class($className);
    }

    $include_path = array(
        UI,
        LIB,
        DAL,
        DLIB,
        DDAL,
        MODEL,
        DMODEL,
        FRAMEWORK,
        DUTIL,
        DUTIL.'taobaoSDK/',
        DUTIL.'taobaoSDK/top/',
        DUTIL.'taobaoSDK/top/request/',
        DUTIL.'taobaoSDK/lotusphp_runtime/',
        DLIB.'cache/',
    );

    foreach ($include_path as $path) {
        $arrayClassFileNames = array($path.$className.'.class.php', $path.$className.'.php');
        foreach ($arrayClassFileNames as $filename) {
            if (file_exists($filename)) {
                require_once($filename);
                _save_cache($md5Name, $filename);
                return ;
            }
        }
    }

    trigger_error("class $className not found!\n");
}

function _kafka_load_class($className){
	$classFile = str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
	if (function_exists('stream_resolve_include_path')) {
		$file = stream_resolve_include_path($classFile);
	} else {
		foreach (explode(PATH_SEPARATOR, get_include_path()) as $path) {
			if (file_exists($path . '/' . $classFile)) {
				$file = $path . '/' . $classFile;
				break;
			}
		}
	}
	/* If file is found, store it into the cache, classname <-> file association */
	if (($file !== false) && ($file !== null)) {
		include $file;
		return;
	}
	throw new RuntimeException($className. ' not found');
}

function _class_cache_path() {
    if (!isset($GLOBALS['config']['global'])) {
        return false;
    }
    $global = $GLOBALS['config']['global'];
    $runtime = $global['runtime'];
    if (!isset($global['class_cache_path'][$runtime])) {
        if (defined(PRJ)) {
            return PRJ.'cache';
        }
        return false;
    }

    return $global['class_cache_path'][$runtime];
}

function _save_cache($cacheFile, $classFile) {
    if (false === ($cachePath = _class_cache_path())) {
        return false;
    }

    if (!file_exists($cachePath)) {
        mkdirEx($cachePath);
    }

    $cache = "<?php \$cacheIncludeFilename = '$classFile';";

    $cacheFilename = $cachePath.DIRECTORY_SEPARATOR.$cacheFile;

    file_put_contents($cacheFilename, $cache);

    return true;
}

function _load_cache($cacheFile) {
    if (false === ($cachePath = _class_cache_path())) {
        return false;
    }

    $filename = $cachePath.DIRECTORY_SEPARATOR.$cacheFile;
    if (!file_exists($filename)) {
        return false;
    }

    include($filename);

    if (!isset($cacheIncludeFilename)) {
        return false;
    }

    include($cacheIncludeFilename);

    return true;
}

function load_all_configs() {
    $dir = opendir(CONFIG);
    while (false !== ($confFile = readdir($dir))) {
        if ('.' === $confFile || '..' === $confFile || substr($confFile, -9) !== '.conf.php' || $confFile=='package.conf.php') {
        	continue;
        }

        include_once(CONFIG.$confFile);
    }
}

function load_all_packages() {
	include(CONFIG."package.conf.php");
    $packages = Config::configForKeyPath('package');
    foreach ((array)$packages as $thePackage) {
    	$confFile = DGLOBAL.$thePackage.'.conf.php';
    	assert(file_exists($confFile));
    	include_once($confFile);
    }
}
