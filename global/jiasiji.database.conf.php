<?php
//define('DBSPIDER',  'aitaobao');
define('DBSPIDER',  'renovation_spider');
define('DBEDIT',    'renovation_edit');
define('DBONLINE',  'renovation_online');
define('DBOFFLINE',  'renovation_offline');
define('DBPASSPORT','renovation_passport');
define('IMAGESERViCE','imageservice');
define('DBSHORTURL',  'short_url');
define('DBTONGJI',  'tongji');
define('DBSTATIS',  'statis');  //new tongji
define('DBZQTONGJI',  'renovation_tongji');

$__c = &Config::configRefForKeyPath('database');

$__online_password = 'zhuQuc113@dm!n';
$__qa_password = 'm0m1m2';

$__c[C_RUNTIME_EDIT] = array(
    DBSPIDER => array(
        'r' => array(
            'hosts' => array('192.168.1.81'),
            'username' => 'root',
            'password' => '3wcoffee',
            'dbname' => DBSPIDER,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.81'),
            'username' => 'root',
            'password' => '3wcoffee',
            'dbname' => DBSPIDER,
            'timeout' => 1, //sec
        ),
    ),
    DBEDIT => array(
        'r' => array(
            'hosts' => array('192.168.1.81'),
            'username' => 'root',
            'password' => '3wcoffee',
            'dbname' => DBEDIT,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.81'),
            'username' => 'root',
            'password' => '3wcoffee',
            'dbname' => DBEDIT,
            'timeout' => 1, //sec
        ),
    ),
    DBONLINE => array(
        'r' => array(
            'hosts' => array('192.168.1.81'),
            'username' => 'root',
            'password' => '3wcoffee',
            'dbname' => DBONLINE,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.81'),
            'username' => 'root',
            'password' => '3wcoffee',
            'dbname' => DBONLINE,
            'timeout' => 1, //sec
        ),
    ),
    DBPASSPORT => array(
        'r' => array(
            'hosts' => array('192.168.1.81'),
            'username' => 'root',
            'password' => '3wcoffee',
            'dbname' => DBPASSPORT,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.81'),
            'username' => 'root',
            'password' => '3wcoffee',
            'dbname' => DBPASSPORT,
            'timeout' => 1, //sec
        ),
    ),
    IMAGESERViCE => array(
        'r' => array(
            'hosts' => array('192.168.1.81'),
            'username' => 'root',
            'password' => '3wcoffee',
            'dbname' => IMAGESERViCE,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.81'),
            'username' => 'root',
            'password' => '3wcoffee',
            'dbname' => IMAGESERViCE,
            'timeout' => 1, //sec
        ),
    ),
    DBSHORTURL => array(
        'r' => array(
            'hosts' => array('192.168.1.81'),
            'username' => 'root',
            'password' => '3wcoffee',
            'dbname' => DBSHORTURL,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.81'),
            'username' => 'root',
            'password' => '3wcoffee',
            'dbname' => DBSHORTURL,
            'timeout' => 1, //sec
        ),
    ),
);

$__c[C_RUNTIME_DEV] = array(
    DBSPIDER => array(
        'r' => array(
            'hosts' => array('192.168.1.200'),
            'username' => 'root',
            'password' => 'm0m1m2',
            'dbname' => DBSPIDER,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.200'),
            'username' => 'root',
            'password' => 'm0m1m2',
            'dbname' => DBSPIDER,
            'timeout' => 1, //sec
        ),
    ),
    DBEDIT => array(
        'r' => array(
            'hosts' => array('192.168.1.200'),
            'username' => 'root',
            'password' => 'm0m1m2',
            'dbname' => DBEDIT,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.200'),
            'username' => 'root',
            'password' => 'm0m1m2',
            'dbname' => DBEDIT,
            'timeout' => 1, //sec
        ),
    ),
    DBONLINE => array(
        'r' => array(
            'hosts' => array('192.168.1.200'),
            'username' => 'root',
            'password' => 'm0m1m2',
            'dbname' => DBONLINE,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.200'),
            'username' => 'root',
            'password' => 'm0m1m2',
            'dbname' => DBONLINE,
            'timeout' => 1, //sec
        ),
    ),
    DBPASSPORT => array(
        'r' => array(
            'hosts' => array('192.168.1.200'),
            'username' => 'root',
            'password' => 'm0m1m2',
            'dbname' => DBPASSPORT,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.200'),
            'username' => 'root',
            'password' => 'm0m1m2',
            'dbname' => DBPASSPORT,
            'timeout' => 1, //sec
        ),
    ),
    IMAGESERViCE => array(
        'r' => array(
            'hosts' => array('192.168.1.200'),
            'username' => 'root',
            'password' => 'm0m1m2',
            'dbname' => IMAGESERViCE,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.200'),
            'username' => 'root',
            'password' => 'm0m1m2',
            'dbname' => IMAGESERViCE,
            'timeout' => 1, //sec
        ),
    ),
    DBSHORTURL => array(
        'r' => array(
            'hosts' => array('192.168.1.200'),
            'username' => 'root',
            'password' => 'm0m1m2',
            'dbname' => DBSHORTURL,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.200'),
            'username' => 'root',
            'password' => 'm0m1m2',
            'dbname' => DBSHORTURL,
            'timeout' => 1, //sec
        ),
    ),
    DBTONGJI => array(
        'r' => array(
        'hosts' => array('192.168.1.200'),
        'username' => 'root',
        'password' => 'm0m1m2',
        'dbname' => DBTONGJI,
        'timeout' => 1, //sec
        ),
        'w' => array(
        'hosts' => array('192.168.1.200'),
        'username' => 'root',
        'password' => 'm0m1m2',
        'dbname' => DBTONGJI,
        'timeout' => 1, //sec
        ),
    ),
    DBZQTONGJI => array(
        'r' => array(
        'hosts' => array('192.168.1.200'),
        'username' => 'root',
        'password' => 'm0m1m2',
        'dbname' => DBZQTONGJI,
        'timeout' => 1, //sec
        ),
        'w' => array(
        'hosts' => array('192.168.1.200'),
        'username' => 'root',
        'password' => 'm0m1m2',
        'dbname' => DBZQTONGJI,
        'timeout' => 1, //sec
        ),
    ),
    DBSTATIS => array(
        'r' => array(
            'hosts' => array('192.168.1.200'),
            'username' => 'root',
            'password' => 'm0m1m2',
            'dbname' => DBSTATIS,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.200'),
            'username' => 'root',
            'password' => 'm0m1m2',
            'dbname' => DBSTATIS,
            'timeout' => 1, //sec
        ),
    ),
);

$__c[C_RUNTIME_LOCAL] = $__c[C_RUNTIME_DEV];

$__c[C_RUNTIME_QA] = array(
    DBSPIDER => array(
        'r' => array(
            'hosts' => array('192.168.1.81'),
            'username' => 'root',
            'password' => $__qa_password,
            'dbname' => DBSPIDER,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.81'),
            'username' => 'root',
            'password' => $__qa_password,
            'dbname' => DBSPIDER,
            'timeout' => 1, //sec
        ),
    ),
    DBEDIT => array(
        'r' => array(
            'hosts' => array('192.168.1.81'),
            'username' => 'root',
            'password' => $__qa_password,
            'dbname' => DBEDIT,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.81'),
            'username' => 'root',
            'password' => $__qa_password,
            'dbname' => DBEDIT,
            'timeout' => 1, //sec
        ),
    ),
    DBONLINE => array(
        'r' => array(
            'hosts' => array('192.168.1.81'),
            'username' => 'root',
            'password' => $__qa_password,
            'dbname' => DBONLINE,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.81'),
            'username' => 'root',
            'password' => $__qa_password,
            'dbname' => DBONLINE,
            'timeout' => 1, //sec
        ),
    ),
    DBPASSPORT => array(
        'r' => array(
            'hosts' => array('192.168.1.81'),
            'username' => 'root',
            'password' => $__qa_password,
            'dbname' => DBPASSPORT,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.81'),
            'username' => 'root',
            'password' => $__qa_password,
            'dbname' => DBPASSPORT,
            'timeout' => 1, //sec
        ),
    ),
    IMAGESERViCE => array(
        'r' => array(
            'hosts' => array('192.168.1.81'),
            'username' => 'root',
            'password' => $__qa_password,
            'dbname' => IMAGESERViCE,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.81'),
            'username' => 'root',
            'password' => $__qa_password,
            'dbname' => IMAGESERViCE,
            'timeout' => 1, //sec
        ),
    ),
    DBSHORTURL => array(
        'r' => array(
            'hosts' => array('192.168.1.81'),
            'username' => 'root',
            'password' => $__qa_password,
            'dbname' => DBSHORTURL,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.81'),
            'username' => 'root',
            'password' => $__qa_password,
            'dbname' => DBSHORTURL,
            'timeout' => 1, //sec
        ),
    ),
);


$__c[C_RUNTIME_ONLINE] = array(
    DBEDIT => array(
        'r' => array(
            'hosts' => array('192.168.1.6'),
            'username' => 'root',
            'password' => $__online_password,
            'dbname' => DBEDIT,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.6'),
            'username' => 'root',
            'password' => $__online_password,
            'dbname' => DBEDIT,
            'timeout' => 1, //sec
        ),
    ),
    DBONLINE => array(
        'r' => array(
            'hosts' => array('192.168.1.6'),
            'username' => 'root',
            'password' => $__online_password,
            'dbname' => DBONLINE,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.6'),
            'username' => 'root',
            'password' => $__online_password,
            'dbname' => DBONLINE,
            'timeout' => 1, //sec
        ),
    ),
    DBPASSPORT => array(
        'r' => array(
            'hosts' => array('192.168.1.6'),
            'username' => 'root',
            'password' => $__online_password,
            'dbname' => DBPASSPORT,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.6'),
            'username' => 'root',
            'password' => $__online_password,
            'dbname' => DBPASSPORT,
            'timeout' => 1, //sec
        ),
    ),
    IMAGESERViCE => array(
        'r' => array(
            'hosts' => array('192.168.1.6'),
            'username' => 'root',
            'password' => $__online_password,
            'dbname' => IMAGESERViCE,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.6'),
            'username' => 'root',
            'password' => $__online_password,
            'dbname' => IMAGESERViCE,
            'timeout' => 1, //sec
        ),
    ),
    DBSHORTURL => array(
        'r' => array(
            'hosts' => array('192.168.1.6'),
            'username' => 'root',
            'password' => $__online_password,
            'dbname' => DBSHORTURL,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.6'),
            'username' => 'root',
            'password' => $__online_password,
            'dbname' => DBSHORTURL,
            'timeout' => 1, //sec
        ),
    ),
    DBTONGJI => array(
        'r' => array(
        'hosts' => array('192.168.1.6'),
        'username' => 'root',
        'password' => $__online_password,
        'dbname' => DBTONGJI,
        'timeout' => 1, //sec
        ),
        'w' => array(
        'hosts' => array('192.168.1.6'),
        'username' => 'root',
        'password' => $__online_password,
        'dbname' => DBTONGJI,
        'timeout' => 1, //sec
        ),
    ),
    DBZQTONGJI => array(
        'r' => array(
        'hosts' => array('192.168.1.6'),
        'username' => 'root',
        'password' => $__online_password,
        'dbname' => DBZQTONGJI,
        'timeout' => 1, //sec
        ),
        'w' => array(
        'hosts' => array('192.168.1.6'),
        'username' => 'root',
        'password' => $__online_password,
        'dbname' => DBZQTONGJI,
        'timeout' => 1, //sec
        ),
    ),
);

$__c[C_RUNTIME_OFFLINE] = array(
    DBONLINE => array(
        'r' => array(
            'hosts' => array('192.168.1.6'),
            'username' => 'root',
            'password' => $__online_password,
            'dbname' => DBONLINE,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.6'),
            'username' => 'root',
            'password' => $__online_password,
            'dbname' => DBONLINE,
            'timeout' => 1, //sec
        ),
    ),
	DBOFFLINE => array(
		'r' => array(
			'hosts' => array('192.168.1.81'),
			'username' => 'root',
			'password' => '3wcoffee',
			'dbname' => DBOFFLINE,
			'timeout' => 1, //sec
		),
		'w' => array(
			'hosts' => array('192.168.1.81'),
			'username' => 'root',
			'password' => '3wcoffee',
			'dbname' => DBOFFLINE,
			'timeout' => 1, //sec
		),
		),
    DBPASSPORT => array(
        'r' => array(
            'hosts' => array('192.168.1.6'),
            'username' => 'root',
            'password' => $__online_password,
            'dbname' => DBPASSPORT,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.6'),
            'username' => 'root',
            'password' => $__online_password,
            'dbname' => DBPASSPORT,
            'timeout' => 1, //sec
        ),
    ),
);


$__c[C_RUNTIME_IMPORT_ONLINE] = array(
    DBSPIDER => array(
        'r' => array(
            'hosts' => array('192.168.1.6'),
            'username' => 'root',
            'password' => $__online_password,
            'dbname' => DBSPIDER,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.6'),
            'username' => 'root',
            'password' => $__online_password,
            'dbname' => DBSPIDER,
            'timeout' => 1, //sec
        ),
    ),
    DBEDIT => array(
        'r' => array(
            'hosts' => array('192.168.1.6'),
            'username' => 'root',
            'password' => $__online_password,
            'dbname' => DBEDIT,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.6'),
            'username' => 'root',
            'password' => $__online_password,
            'dbname' => DBEDIT,
            'timeout' => 1, //sec
        ),
    ),
    DBONLINE => array(
        'r' => array(
            'hosts' => array('192.168.1.6'),
            'username' => 'root',
            'password' => $__online_password,
            'dbname' => DBONLINE,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.6'),
            'username' => 'root',
            'password' => $__online_password,
            'dbname' => DBONLINE,
            'timeout' => 1, //sec
        ),
    ),
    DBPASSPORT => array(
        'r' => array(
            'hosts' => array('192.168.1.6'),
            'username' => 'root',
            'password' => $__online_password,
            'dbname' => DBPASSPORT,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.6'),
            'username' => 'root',
            'password' => $__online_password,
            'dbname' => DBPASSPORT,
            'timeout' => 1, //sec
        ),
    ),
    IMAGESERViCE => array(
        'r' => array(
            'hosts' => array('192.168.1.6'),
            'username' => 'root',
            'password' => $__online_password,
            'dbname' => IMAGESERViCE,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.6'),
            'username' => 'root',
            'password' => $__online_password,
            'dbname' => IMAGESERViCE,
            'timeout' => 1, //sec
        ),
    ),
    DBSHORTURL => array(
        'r' => array(
            'hosts' => array('192.168.1.6'),
            'username' => 'root',
            'password' => $__online_password,
            'dbname' => DBSHORTURL,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.6'),
            'username' => 'root',
            'password' => $__online_password,
            'dbname' => DBSHORTURL,
            'timeout' => 1, //sec
        ),
    ),
    DBTONGJI => array(
        'r' => array(
            'hosts' => array('192.168.1.6'),
            'username' => 'root',
            'password' => $__online_password,
            'dbname' => DBTONGJI,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.6'),
            'username' => 'root',
            'password' => $__online_password,
            'dbname' => DBTONGJI,
            'timeout' => 1, //sec
        ),
    ),
    DBZQTONGJI => array(
        'r' => array(
            'hosts' => array('192.168.1.6'),
            'username' => 'root',
            'password' => $__online_password,
            'dbname' => DBZQTONGJI,
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array('192.168.1.6'),
            'username' => 'root',
            'password' => $__online_password,
            'dbname' => DBZQTONGJI,
            'timeout' => 1, //sec
        ),
    ),
);

//$__c[C_RUNTIME_QA] = $__c[C_RUNTIME_IMPORT_ONLINE];
//$__c[C_RUNTIME_LOCAL] = $__c[C_RUNTIME_QA];

unset($__c);
