<?php
$__c = &$GLOBALS['config']['memcache'];

$__connect = &$__c['server'];

$__connect[C_RUNTIME_DEV][] = array(
    'host' => '127.0.0.1',
    'port' => '11211',
);

$__connect[C_RUNTIME_LOCAL][] = array(
    'host' => '192.168.1.200',
    'port' => '11211',
);

$__connect[C_RUNTIME_QA][] = array(
    'host' => '127.0.0.1',
    'port' => '11211',
);

$__connect[C_RUNTIME_EDIT][] = array(
    'host' => '127.0.0.1',
    'port' => '11211',
);

$__connect[C_RUNTIME_ONLINE][] = array(
    'host' => '127.0.0.1',
    'port' => '11211',
);

$__connect[C_RUNTIME_IMPORT_ONLINE][] = array(
    'host' => '127.0.0.1',
    'port' => '11211',
);

unset($__c);