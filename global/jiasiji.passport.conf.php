<?php
$__c = &$GLOBALS['config']['passport'];

$__c['passport_url_prefix'] = array(
    C_RUNTIME_LOCAL => 'http://passport.local.com',
    C_RUNTIME_EDIT  => 'http://passport.in.zhuqu.com',
    C_RUNTIME_DEV => 'http://passport.dev.com',
	C_RUNTIME_QA => 'http://passport.qa.com',
	C_RUNTIME_ONLINE => 'http://passport.zhuqu.com',
);

// 用户密码加盐MD5
$__c['salt'] = 'jiasiji@)!@';

//  AuthCode密钥
$__c['authkey'] = 'jiahewanshi@)!@';

//  根域名
$__c['domain_root'] = array(
    C_RUNTIME_LOCAL => '.local.com',
    C_RUNTIME_EDIT  => '.in.zhuqu.com',
    C_RUNTIME_DEV => '.dev.com',
	C_RUNTIME_QA => '.qa.com',
	C_RUNTIME_ONLINE => '.zhuqu.com',
);

unset($__c);
