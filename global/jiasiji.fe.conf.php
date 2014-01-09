<?php
$__c = &$GLOBALS['config']['fe'];

$__c[C_RUNTIME_LOCAL] = 'http://fe.dev.com';
$__c[C_RUNTIME_EDIT] = 'http://fe.in.zhuqu.com';
$__c[C_RUNTIME_DEV] = 'http://fe.dev.com';
$__c[C_RUNTIME_QA] = 'http://fe.qa.com';
$__c[C_RUNTIME_ONLINE] = 'http://fe.zhuqu.com';
$__c[C_RUNTIME_OFFLINE] = 'http://fe.offline.zhuqu.com';

unset($__c);

define('C_FE_BASEURL', Config::configForKeyPath('fe.'.Config::configForKeyPath('global.runtime')));



$__c = &$GLOBALS['config']['fe_img'];
$__c[C_RUNTIME_LOCAL] = 'http://img.dev.com';
$__c[C_RUNTIME_EDIT] = 'http://img.in.zhuqu.com';
$__c[C_RUNTIME_DEV] = 'http://img.dev.com';
$__c[C_RUNTIME_QA] = 'http://img.qa.com';
$__c[C_RUNTIME_ONLINE] = 'http://img.zhuqu.com';
$__c[C_RUNTIME_OFFLINE] = 'http://img.zhuqu.com';
unset($__c);

define('C_FE_IMGURL', Config::configForKeyPath('fe_img.'.Config::configForKeyPath('global.runtime')));
define('C_FE_DEFAULT_IMAGE', C_FE_IMGURL.'/fe-web/default.jpg');    //  默认图片
define('C_FE_GUEST_AVATAR', C_FE_IMGURL.'/fe-web/people_logo.png'); //  默认头像
define('C_FE_FOLDER_IMAGE_DEFAULT', C_FE_IMGURL.'/fe-web/page/defaultBk.jpg'); //  默认图册图片


