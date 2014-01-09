<?php
$__c = &$GLOBALS['config']['global'];

$__c['mobile_url'] = array(
    C_RUNTIME_LOCAL     => 'http://m.local.com',
    C_RUNTIME_DEV       => 'http://m.dev.com',
    C_RUNTIME_QA        => 'http://m.qa.com',
    C_RUNTIME_ONLINE    => 'http://m.zhuqu.com',
);

$__c['web_url'] = array(
    C_RUNTIME_LOCAL     => 'http://web.local.com',
    C_RUNTIME_DEV       => 'http://web.dev.com',
    C_RUNTIME_QA        => 'http://web.qa.com',
    C_RUNTIME_ONLINE    => 'http://www.zhuqu.com',
);

$__c['top_domain'] = array(
    C_RUNTIME_LOCAL     => 'local.com',
    C_RUNTIME_DEV       => 'dev.com',
    C_RUNTIME_QA        => 'qa.com',
    C_RUNTIME_ONLINE    => 'zhuqu.com',
);

$__c['sinaweibo_authcallback_url'] = array(
    C_RUNTIME_LOCAL     => 'http://m.local.com/sinaweibo/authcallback',
    C_RUNTIME_DEV       => 'http://m.dev.com/sinaweibo/authcallback',
    C_RUNTIME_QA        => 'http://m.qa.com/sinaweibo/authcallback',
    C_RUNTIME_ONLINE    => 'http://m.zhuqu.com/sinaweibo/authcallback',
);

$__c['sinaweibo_denycallback_url'] = array(
    C_RUNTIME_LOCAL     => 'http://m.local.com/sinaweibo/denycallback',
    C_RUNTIME_DEV       => 'http://m.dev.com/sinaweibo/denycallback',
    C_RUNTIME_QA        => 'http://m.qa.com/sinaweibo/denycallback',
    C_RUNTIME_ONLINE    => 'http://m.zhuqu.com/sinaweibo/denycallback',
);

$__c['qqweibo_authcallback_url'] = array(
    C_RUNTIME_LOCAL     => 'http://m.local.com/qqweibo/authcallback',
    C_RUNTIME_DEV       => 'http://m.dev.com/qqweibo/authcallback',
    C_RUNTIME_QA        => 'http://m.qa.com/qqweibo/authcallback',
    C_RUNTIME_ONLINE    => 'http://m.zhuqu.com/qqweibo/authcallback',
);

$__c['publish'][C_RUNTIME_ONLINE] = array(
    'src' => C_RUNTIME_ONLINE,
    'des' => C_RUNTIME_ONLINE,
);

unset($__c);
