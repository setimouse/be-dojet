<?php
define('DGLOBAL', dirname(__FILE__).'/');

define('DOJET', realpath(DGLOBAL.'..').'/');
define('FRAMEWORK', DOJET.'framework/');

define('DUTIL',     DOJET.'util/');
define('DLIB',      DOJET.'lib/');
define('DMODEL',    DOJET.'model/');
define('DCONFIG',   DOJET.'config/');

if (defined('PRJ')) {
    define('CONFIG',    PRJ.'config/');
    define('WEBROOT',   PRJ.'webroot/');
    define('TEMPLATE',  PRJ.'template/');
    define('MODEL',     PRJ.'model/');
    define('DATA',      PRJ.'data/');
    define('LIB',       PRJ.'lib/');
    define('UI',        PRJ.'ui/');
    define('DAL',       PRJ.'dal/');
    define('UTIL',      PRJ.'util/');
    define('SCRIPT',    PRJ.'script/');

    define('STATIC_ROOT', WEBROOT.'static/');
}

date_default_timezone_set('Asia/Chongqing');

// 激活断言，并设置它为 quiet
assert_options(ASSERT_ACTIVE, 1);
assert_options(ASSERT_WARNING, 0);
assert_options(ASSERT_QUIET_EVAL, 1);
assert_options(ASSERT_BAIL, 1);
assert_options(ASSERT_CALLBACK, "assert_handler");

include(DLIB.'function.inc.php');
include(FRAMEWORK.'DAutoloader.class.php');

DAutoloader::register();

////////////////////////////////////////

// 断言处理函数
function assert_handler($file, $line, $code, $desc = null) {
    Trace::fatal("assert failed: $desc [$file][$line][$code]");
}

