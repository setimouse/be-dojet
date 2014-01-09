<?php
define('MBSPIDER',  'renovation_spider');
define('MBEDIT',    'renovation_edit');
define('MBONLINE',  'renovation_online');
define('MBOPEN',  'renovation_open');
define('MBMALL',    'renovation_mall');

$__c = &Config::configRefForKeyPath('mongodb');

$__edit_mongo_host = '192.168.1.81:27017';

$__c[C_RUNTIME_EDIT] = array(
    MBSPIDER => array(
        'r' => array(
            'hosts' => array($__edit_mongo_host),
            'dbname' => MBSPIDER,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array($__edit_mongo_host),
            'dbname' => MBSPIDER,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
    ),
    MBEDIT => array(
        'r' => array(
            'hosts' => array($__edit_mongo_host),
            'dbname' => MBEDIT,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array($__edit_mongo_host),
            'dbname' => MBEDIT,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
    ),
    MBONLINE => array(
        'r' => array(
            'hosts' => array($__edit_mongo_host),
            'dbname' => MBONLINE,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array($__edit_mongo_host),
            'dbname' => MBONLINE,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
    ),
    MBMALL => array(
        'r' => array(
            'hosts' => array($__edit_mongo_host),
            'dbname' => MBMALL,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array($__edit_mongo_host),
            'dbname' => MBMALL,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
    ),
);

$__c[C_RUNTIME_DEV] = array(
    MBSPIDER => array(
        'r' => array(
            'hosts' => array('192.168.1.200:27017'),
            'dbname' => MBSPIDER,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.200:27017'),
            'dbname' => MBSPIDER,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
    ),
    MBEDIT => array(
        'r' => array(
            'hosts' => array('192.168.1.200:27017'),
            'dbname' => MBEDIT,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.200:27017'),
            'dbname' => MBEDIT,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
    ),
    MBONLINE => array(
        'r' => array(
            'hosts' => array('192.168.1.200:27017'),
            'dbname' => MBONLINE,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.200:27017'),
            'dbname' => MBONLINE,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
    ),
    MBOPEN => array(
        'r' => array(
            'hosts' => array('192.168.1.200:27017'),
            'dbname' => MBOPEN,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.200:27017'),
            'dbname' => MBOPEN,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
    ),
    MBMALL => array(
        'r' => array(
            'hosts' => array('192.168.1.200:27017'),
            'dbname' => MBMALL,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.200:27017'),
            'dbname' => MBMALL,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
    ),

);

$__c[C_RUNTIME_LOCAL] = $__c[C_RUNTIME_DEV];

/* $__c[C_RUNTIME_LOCAL][MBMALL] = array(
        'r' => array(
            'hosts' => array('localhost:27017'),
            'dbname' => MBMALL,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('localhost:27017'),
            'dbname' => MBMALL,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
    ); */

$__qa_mongo_host = '192.168.1.81:27017';

$__c[C_RUNTIME_QA] = array(
    MBOPEN => array(
        'r' => array(
            'hosts' => array(),
            'dbname' => MBOPEN,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array($__qa_mongo_host),
            'dbname' => MBOPEN,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
    ),
    MBSPIDER => array(
        'r' => array(
            'hosts' => array($__qa_mongo_host),
            'dbname' => MBSPIDER,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array($__qa_mongo_host),
            'dbname' => MBSPIDER,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
    ),
    MBEDIT => array(
        'r' => array(
            'hosts' => array($__qa_mongo_host),
            'dbname' => MBEDIT,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array($__qa_mongo_host),
            'dbname' => MBEDIT,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
    ),
    MBONLINE => array(
        'r' => array(
            'hosts' => array($__qa_mongo_host),
            'dbname' => MBONLINE,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array($__qa_mongo_host),
            'dbname' => MBONLINE,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
    ),
    MBMALL => array(
        'r' => array(
            'hosts' => array($__qa_mongo_host),
            'dbname' => MBMALL,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array($__qa_mongo_host),
            'dbname' => MBMALL,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
    ),
);

$__c[C_RUNTIME_ONLINE] = array(
    MBEDIT => array(
        'r' => array(
            'hosts' => array('192.168.1.30:25000'),
            'dbname' => MBEDIT,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.30:25000'),
            'dbname' => MBEDIT,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
    ),
    MBONLINE => array(
        'r' => array(
            'hosts' => array('192.168.1.30:25000'),
            'dbname' => MBONLINE,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.30:25000'),
            'dbname' => MBONLINE,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
    ),
    MBOPEN => array(
        'r' => array(
            'hosts' => array('192.168.1.30:25000'),
            'dbname' => MBOPEN,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.30:25000'),
            'dbname' => MBOPEN,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
    ),
    MBMALL => array(
        'r' => array(
            'hosts' => array('192.168.1.30:25000'),
            'dbname' => MBMALL,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.30:25000'),
            'dbname' => MBMALL,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
    ),
);

/*
* 离线环境配置
* be-editor 访问线上环境:mysql和mongodb的renovation_online
* be-mall 访问离线环境:mongodb的renovation_mall
*/
$__c[C_RUNTIME_OFFLINE] = array(
	MBSPIDER => array(
		'r' => array(
		'hosts' => array('192.168.1.3:30000'),
		'dbname' => MBSPIDER,
		'username' => '',
		'password' => '',
		'timeout' => 1, //sec
		),
		'w' => array(
		'hosts' => array('192.168.1.3:30000'),
		'dbname' => MBSPIDER,
		'username' => '',
		'password' => '',
		'timeout' => 1, //sec
		),
		),
    MBMALL => array(
        'r' => array(
            'hosts' => array('192.168.1.3:30000'),
            'dbname' => MBMALL,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.3:30000'),
            'dbname' => MBMALL,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
    ),
    MBONLINE => array(
        'r' => array(
            'hosts' => array('192.168.1.30:25000'),
            'dbname' => MBONLINE,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.30:25000'),
            'dbname' => MBONLINE,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
    ),
);

$__c[C_RUNTIME_IMPORT_ONLINE] = array(
    MBSPIDER => array(
        'r' => array(
            'hosts' => array('192.168.1.30:25000'),
            'dbname' => MBSPIDER,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.30:25000'),
            'dbname' => MBSPIDER,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
    ),
    MBEDIT => array(
        'r' => array(
            'hosts' => array('192.168.1.30:25000'),
            'dbname' => MBEDIT,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.30:25000'),
            'dbname' => MBEDIT,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
    ),
    MBONLINE => array(
        'r' => array(
            'hosts' => array('192.168.1.30:25000'),
            'dbname' => MBONLINE,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.30:25000'),
            'dbname' => MBONLINE,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
    ),
    MBOPEN => array(
        'r' => array(
            'hosts' => array('192.168.1.30:25000'),
            'dbname' => MBOPEN,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.30:25000'),
            'dbname' => MBOPEN,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
    ),
    MBMALL => array(
        'r' => array(
            'hosts' => array('192.168.1.30:25000'),
            'dbname' => MBMALL,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.30:25000'),
            'dbname' => MBMALL,
            'username' => '',
            'password' => '',
            'timeout' => 1, //sec
        ),
    ),
);
$__c[C_RUNTIME_IMPORT_OFFLINE] = array(
    MBSPIDER => array(
        'r' => array(
                'hosts' => array('192.168.1.3:30000'),
                'dbname' => MBSPIDER,
                'username' => '',
                'password' => '',
                'timeout' => 1, //sec
        ),
        'w' => array(
                'hosts' => array('192.168.1.3:30000'),
                'dbname' => MBSPIDER,
                'username' => '',
                'password' => '',
                'timeout' => 1, //sec
        ),
    ),
    MBEDIT => array(
        'r' => array(
                'hosts' => array('192.168.1.3:30000'),
                'dbname' => MBEDIT,
                'username' => '',
                'password' => '',
                'timeout' => 1, //sec
        ),
        'w' => array(
                'hosts' => array('192.168.1.3:30000'),
                'dbname' => MBEDIT,
                'username' => '',
                'password' => '',
                'timeout' => 1, //sec
        ),
    ),
    MBONLINE => array(
        'r' => array(
                'hosts' => array('192.168.1.3:30000'),
                'dbname' => MBONLINE,
                'username' => '',
                'password' => '',
                'timeout' => 1, //sec
        ),
        'w' => array(
                'hosts' => array('192.168.1.3:30000'),
                'dbname' => MBONLINE,
                'username' => '',
                'password' => '',
                'timeout' => 1, //sec
        ),
    ),
    MBOPEN => array(
        'r' => array(
                'hosts' => array('192.168.1.3:30000'),
                'dbname' => MBOPEN,
                'username' => '',
                'password' => '',
                'timeout' => 1, //sec
        ),
        'w' => array(
                'hosts' => array('192.168.1.3:30000'),
                'dbname' => MBOPEN,
                'username' => '',
                'password' => '',
                'timeout' => 1, //sec
        ),
    ),
    MBMALL => array(
        'r' => array(
                'hosts' => array('192.168.1.3:30000'),
                'dbname' => MBMALL,
                'username' => '',
                'password' => '',
                'timeout' => 1, //sec
        ),
        'w' => array(
                'hosts' => array('192.168.1.3:30000'),
                'dbname' => MBMALL,
                'username' => '',
                'password' => '',
                'timeout' => 1, //sec
        ),
    ),
);


//$__c[C_RUNTIME_QA] = $__c[C_RUNTIME_IMPORT_ONLINE];
//$__c[C_RUNTIME_LOCAL] = $__c[C_RUNTIME_QA];

unset($__c);
