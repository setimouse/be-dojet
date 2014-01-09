<?php
/**
 * 运行时环境
 */
$__c = &Config::configRefForKeyPath('global.runtime');

$__c = C_RUNTIME_LOCAL;

/*if (file_exists('/var/.iamtest')) {
	$__c = C_RUNTIME_EDIT;
} elseif (file_exists('/var/.iamdev')) {
    $__c = C_RUNTIME_DEV;
} elseif (file_exists('/var/.iamonline')) {
    $__c = C_RUNTIME_QA;
}*/

if (file_exists('/var/.iamedit')) {
	$__c = C_RUNTIME_EDIT;
} elseif (file_exists('/var/.iamdev')) {
	$__c = C_RUNTIME_DEV;
} elseif (file_exists('/var/.iamqa')) {
	$__c = C_RUNTIME_QA;
} elseif (file_exists('/var/.iamonline')) {
	$__c = C_RUNTIME_ONLINE;
} elseif (file_exists('/var/.iamoffline')) {
    $__c = C_RUNTIME_OFFLINE;
}

unset($__c);
