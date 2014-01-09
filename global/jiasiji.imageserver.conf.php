<?php

/*
 这个文件负责图片服务器的配置和Hash策略封装，add by luxuhui
*/

//imageServer

//thumb type
define('TYPE_NO_DEFORM', 1);
define('TYPE_NO_BLANK', 2);
define('TYPE_FIX_WIDTH', 3);
define('TYPE_SPECIAL', 4);

define('C_IMAGESERVER_FOLDER_HOME', 'home');

//path
define('RAW_FOLDER', 'raw/');
define('WATER_FOLDER', 'water/');
define('PRERAW_FOLDER', 'preraw/');
define('THUMB_FOLDER', 'thb/');
define('THUMB_NO_DEFORM_FOLDER', 'thb/');
define('THUMB_NO_BLANK_FOLDER', 'thb2/');
define('THUMB_FIX_WIDTH_FOLDER', 'thb3/');
define('TYPE_SPECIAL_FOLDER', 'thb4/');
define('IMAGE_FOLDER', 'static/images/');
define('IMG_ROOT', WEBROOT.IMAGE_FOLDER);//for imageserver

$__c = &Config::configRefForKeyPath('imageserver');

$mp1 = array(
    	'rUrl' => 'http://mp1.in.zhuqu.com/'.IMAGE_FOLDER,
    	'wUrl' => 'http://mp1.in.zhuqu.com/',
		'pwUrl' => 'http://mp1.in.zhuqu.com/',//需要权限的写入接口
    );

$__c[C_RUNTIME_EDIT] = array(
    '0' => $mp1,
	'1' => $mp1,
	'2' => $mp1,
	'3' => $mp1,
	'4' => $mp1,
	'5' => $mp1,
	'6' => $mp1,
	'7' => $mp1,
	'8' => $mp1,
	'9' => $mp1,
	'a' => $mp1,
	'b' => $mp1,
	'c' => $mp1,
	'd' => $mp1,
	'e' => $mp1,
	'f' => $mp1
);

$lmp1 = array(
		'rUrl' => 'http://mp1.dev.com/'.IMAGE_FOLDER,
		'wUrl' => 'http://mp1.dev.com/',
		'pwUrl' => 'http://mp1.dev.com/',
);
$__c[C_RUNTIME_LOCAL] = array(
    '0' => $lmp1,
	'1' => $lmp1,
	'2' => $lmp1,
	'3' => $lmp1,
	'4' => $lmp1,
	'5' => $lmp1,
	'6' => $lmp1,
	'7' => $lmp1,
	'8' => $lmp1,
	'9' => $lmp1,
	'a' => $lmp1,
	'b' => $lmp1,
	'c' => $lmp1,
	'd' => $lmp1,
	'e' => $lmp1,
	'f' => $lmp1
);


$dmp1 = array(
		'rUrl' => 'http://mp1.dev.com/'.IMAGE_FOLDER,
		'wUrl' => 'http://mp1.dev.com/',
		'pwUrl' => 'http://mp1.dev.com/',//需要权限的写入接口
);
$dmp2 = array(
		'rUrl' => 'http://mp2.dev.com/'.IMAGE_FOLDER,
		'wUrl' => 'http://mp1.dev.com/',
		'pwUrl' => 'http://mp1.dev.com/',//需要权限的写入接口
);
$dmp3 = array(
		'rUrl' => 'http://mp3.dev.com/'.IMAGE_FOLDER,
		'wUrl' => 'http://mp1.dev.com/',
		'pwUrl' => 'http://mp1.dev.com/',//需要权限的写入接口
);
$dmp4 = array(
		'rUrl' => 'http://mp4.dev.com/'.IMAGE_FOLDER,
		'wUrl' => 'http://mp1.dev.com/',
		'pwUrl' => 'http://mp1.dev.com/',//需要权限的写入接口
);
$dmp5 = array(
		'rUrl' => 'http://mp5.dev.com/'.IMAGE_FOLDER,
		'wUrl' => 'http://mp1.dev.com/',
		'pwUrl' => 'http://mp1.dev.com/',//需要权限的写入接口
);

$__c[C_RUNTIME_DEV] = array(
		'0' => $dmp1,
		'1' => $dmp1,
		'2' => $dmp1,
		'3' => $dmp1,
		'4' => $dmp2,
		'5' => $dmp2,
		'6' => $dmp2,
		'7' => $dmp3,
		'8' => $dmp3,
		'9' => $dmp3,
		'a' => $dmp4,
		'b' => $dmp4,
		'c' => $dmp4,
		'd' => $dmp5,
		'e' => $dmp5,
		'f' => $dmp5
);
$qmp1 = array(
		'rUrl' => 'http://mp1.qa.com/'.IMAGE_FOLDER,
		'wUrl' => 'http://mp1.qa.com/',
		'pwUrl' => 'http://mp1.qa.com/',//需要权限的写入接口
);

$__c[C_RUNTIME_QA] = array(
		'0' => $qmp1,
		'1' => $qmp1,
		'2' => $qmp1,
		'3' => $qmp1,
		'4' => $qmp1,
		'5' => $qmp1,
		'6' => $qmp1,
		'7' => $qmp1,
		'8' => $qmp1,
		'9' => $qmp1,
		'a' => $qmp1,
		'b' => $qmp1,
		'c' => $qmp1,
		'd' => $qmp1,
		'e' => $qmp1,
		'f' => $qmp1
);

$omp1 = array(
		'rUrl' => 'http://mp1.zhuqu.com/'.IMAGE_FOLDER,
		'wUrl' => 'http://mp1.zhuqu.com/',
		'pwUrl' => 'http://mp1.zhuqu.com/',//需要权限的写入接口
);
$omp2 = array(
		'rUrl' => 'http://mp2.zhuqu.com/'.IMAGE_FOLDER,
		'wUrl' => 'http://mp1.zhuqu.com/',
		'pwUrl' => 'http://mp1.zhuqu.com/',//需要权限的写入接口
);
$omp3 = array(
		'rUrl' => 'http://mp3.zhuqu.com/'.IMAGE_FOLDER,
		'wUrl' => 'http://mp1.zhuqu.com/',
		'pwUrl' => 'http://mp1.zhuqu.com/',//需要权限的写入接口
);
$omp4 = array(
		'rUrl' => 'http://mp4.zhuqu.com/'.IMAGE_FOLDER,
		'wUrl' => 'http://mp1.zhuqu.com/',
		'pwUrl' => 'http://mp1.zhuqu.com/',//需要权限的写入接口
);
$omp5 = array(
		'rUrl' => 'http://mp5.zhuqu.com/'.IMAGE_FOLDER,
		'wUrl' => 'http://mp1.zhuqu.com/',
		'pwUrl' => 'http://mp1.zhuqu.com/',//需要权限的写入接口
);

$__c[C_RUNTIME_ONLINE] = array(
		'0' => $omp1,
		'1' => $omp1,
		'2' => $omp1,
		'3' => $omp1,
		'4' => $omp2,
		'5' => $omp2,
		'6' => $omp2,
		'7' => $omp3,
		'8' => $omp3,
		'9' => $omp3,
		'a' => $omp4,
		'b' => $omp4,
		'c' => $omp4,
		'd' => $omp5,
		'e' => $omp5,
		'f' => $omp5
);

$imp1 = array(
		'rUrl' => 'http://mp1.zhuqu.com/'.IMAGE_FOLDER,
		'wUrl' => 'http://mp1.zhuqu.com/',
		'pwUrl' => 'http://mp1.zhuqu.com/',//需要权限的写入接口
);
$__c[C_RUNTIME_IMPORT_ONLINE] =  array(
		'0' => $imp1,
		'1' => $imp1,
		'2' => $imp1,
		'3' => $imp1,
		'4' => $imp1,
		'5' => $imp1,
		'6' => $imp1,
		'7' => $imp1,
		'8' => $imp1,
		'9' => $imp1,
		'a' => $imp1,
		'b' => $imp1,
		'c' => $imp1,
		'd' => $imp1,
		'e' => $imp1,
		'f' => $imp1
);

$__c[C_RUNTIME_QA] = $__c[C_RUNTIME_IMPORT_ONLINE];

$__c[C_RUNTIME_OFFLINE] = array(
		'0' => $omp1,
		'1' => $omp1,
		'2' => $omp1,
		'3' => $omp1,
		'4' => $omp2,
		'5' => $omp2,
		'6' => $omp2,
		'7' => $omp3,
		'8' => $omp3,
		'9' => $omp3,
		'a' => $omp4,
		'b' => $omp4,
		'c' => $omp4,
		'd' => $omp5,
		'e' => $omp5,
		'f' => $omp5
);

unset($__c);
