<?php

$__c = &Config::configRefForKeyPath('kafka');

$__c[C_RUNTIME_DEV] = array(
    'producer' => array(
        'host' => '192.168.1.200',
        'port' => 9092,
    ),
    'consumer' => array(
        'host' => '192.168.1.200',
        'port' => 9092,
        'timeout' => 2,
        'maxsize' => 99999999,
    ),
);

$__c[C_RUNTIME_LOCAL] = array(
    'producer' => array(
        'host' => '192.168.1.200',
        'port' => 9092,
    ),
    'consumer' => array(
        'host' => '192.168.1.200',
        'port' => 9092,
        'timeout' => 2,
        'maxsize' => 99999999,
    ),
);

$__c[C_RUNTIME_EDIT] = array(
    'producer' => array(
        'host' => '192.168.1.3',
        'port' => 9092,
    ),
    'consumer' => array(
        'host' => '192.168.1.3',
        'port' => 9092,
        'timeout' => 2,
        'maxsize' => 99999999,
    ),
);

$__c[C_RUNTIME_QA] = array(
    'producer' => array(
        'host' => '192.168.1.81',
        'port' => 9092,
    ),
    'consumer' => array(
        'host' => '192.168.1.81',
        'port' => 9092,
        'timeout' => 2,
        'maxsize' => 99999999,
    ),
);

$__c[C_RUNTIME_ONLINE] = array(
    'producer' => array(
        'host' => '192.168.1.3',
        'port' => 9092,
    ),
    'consumer' => array(
        'host' => '192.168.1.3',
        'port' => 9092,
        'timeout' => 2,
        'maxsize' => 99999999,
    ),
);

$__c[C_RUNTIME_OFFLINE] = array(
    'producer' => array(
        'host' => '192.168.1.3',
        'port' => 9092,
    ),
    'consumer' => array(
        'host' => '192.168.1.3',
        'port' => 9092,
        'timeout' => 2,
        'maxsize' => 99999999,
    ),
);


unset($__c);
