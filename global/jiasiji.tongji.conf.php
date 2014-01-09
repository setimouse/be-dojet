<?php
$__c = &$GLOBALS['config']['tongji'];

$__c['piwik'] = array(
    C_RUNTIME_LOCAL => 'http://tongji.local.com',
    C_RUNTIME_EDIT => 'http://tongji.in.zhuqu.com:5050',
    C_RUNTIME_DEV => 'http://tongji.dev.com:5050',
    C_RUNTIME_QA => 'http://tongji.qa.com',
    C_RUNTIME_ONLINE => 'http://tongji.zhuqu.com',
);

$__c['zq_tongji'] = array(
    C_RUNTIME_LOCAL => 'http://tj.local.com/stat',
    C_RUNTIME_EDIT => 'http://tj.in.zhuqu.com:5050/stat',
    C_RUNTIME_DEV => 'http://tj.dev.com/stat',
    C_RUNTIME_QA => 'http://tj.qa.com/stat',
    C_RUNTIME_ONLINE => 'http://tj.zhuqu.com/stat',
);

unset($__c);

//define('C_TONGJI_BASEURL', Config::configForKeyPath('tongji.'.Config::configForKeyPath('global.runtime')));
define('C_TONGJI_BASEURL', Config::runtimeConfigForKeyPath('tongji.piwik'));
define('C_ZQTONGJI_BASEURL', Config::runtimeConfigForKeyPath('tongji.zq_tongji'));
