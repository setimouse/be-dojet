<?php
define('DOJET', realpath(dirname(__FILE__)).'/');
define('FRAMEWORK', DOJET.'framework/');
define('DLIB',      DOJET.'lib/');
define('DMODEL',    DOJET.'model/');
define('DUTIL',     DOJET.'util/');

date_default_timezone_set('Asia/Chongqing');

include(DLIB.'function.inc.php');
include(FRAMEWORK.'DAutoloader.class.php');

DAutoloader::register();

////////////////////////////////////////

function startWebService(BaseWebService $webService) {

    $dojet = new Dojet();
    $dojet->load($webService);

    $webService->dojetLoaded();

    $dojet->dispatch();

    $webService->dispatchFinished();
}

