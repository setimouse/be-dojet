<?php

class Dojet {

    public function start() {
//        $this->init();
        $requestUri = substr($_SERVER['REQUEST_URI'], 1);
        $dispatcher = SingletonFactory::getInstance('Dispatcher');
        $dispatcher->dispatch($requestUri);
    }

    private function init() {
        //  include global packages
        $this->load_all_packages();

        //  include configs
        $this->load_all_configs();
    }

    private function load_all_configs() {
        $dir = opendir(CONFIG);
        while (false !== ($confFile = readdir($dir))) {
            if ('.' === $confFile || '..' === $confFile || substr($confFile, -9) !== '.conf.php' || $confFile=='package.conf.php') {
            	continue;
            }

            include_once(CONFIG.$confFile);
        }
    }

    private function load_all_packages() {
    	include(CONFIG."package.conf.php");
        $packages = Config::configForKeyPath('package');
        foreach ((array)$packages as $thePackage) {
        	$confFile = DGLOBAL.$thePackage.'.conf.php';
        	assert(file_exists($confFile));
        	include_once($confFile);
        }
    }


    /**
     * 封装断言
     *
     * @param bool $condition
     * @param string $message
     * @param string $file
     * @param string $line
     */
    public static function assert($condition, $message = null, $file = null, $line = null) {
        if (MRuntime::getInstance()->currentRuntime() === C_RUNTIME_ONLINE) {
            //  online, skip assert
            return ;
        }

        if ($condition) {
            return ;
        }

        Trace::fatal('assert failed. '.$message.', '.$file.', '.$line);
        if (MRuntime::getInstance()->currentRuntime() !== C_RUNTIME_ONLINE) {
            printbr($message.' '.$file.' '.$line);
        }
        assert($condition);
    }

    /**
     * 数字断言
     *
     * @param mix $var
     * @param string $file
     * @param string $line
     */
    public static function assertIntNumeric($var, $file = null, $line = null) {
        Dojet::assert(MVar::is_digital($var), 'nan, '.var_export($var, true), $file, $line);
    }

    /**
     * 数字数组断言
     *
     * @param mix $var
     * @param string $file
     * @param string $line
     */
    public static function assertNumericArray($array, $file = null, $line = null) {
        Dojet::assert(is_array($array), 'not an array', $file, $line);

        foreach ($array as $val) {
            Dojet::assertIntNumeric($val, $file, $line);
        }
    }

    /**
     * 非空数字数组断言
     *
     * @param mix $var
     * @param string $file
     * @param string $line
     */
    public static function assertNotEmptyNumericArray($array, $file = null, $line = null) {
        Dojet::assertNumericArray($array, $file, $line);
        Dojet::assert(!empty($array), 'array should not be empty', $file, $line);
    }
}