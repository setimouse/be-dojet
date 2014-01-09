<?php
/**
 * Model
 *
 * Runtime
 *
 * @author liyan
 * @since Sat Mar 23 02:43:18 GMT 2013
 */
class MRuntime {

    protected $runtime;
    protected $stack;

    /**
     * @return MRuntime
     */
    public static function getInstance() {
        $className = get_called_class();

    	return SingletonFactory::getInstance($className);
    }

    function __construct() {
        $this->runtime = $GLOBALS['config']['global']['runtime'];
        $this->stack = array();
    }

    /**
     * 获取runtime
     *
     * @param string $runtimeKeyPath
     * @return string
     */
    public function currentRuntime($runtimeKeyPath = 'global.runtime') {
    	return Config::configForKeyPath($runtimeKeyPath);
    }

    public function setRuntime($newRuntime) {
        Trace::debug('set runtime:'.$newRuntime, __FILE__, __LINE__);
    	$currentRuntime = &Config::configRefForKeyPath('global.runtime');
    	$currentRuntime = $newRuntime;
    }

    public function switchRuntime($newRuntime) {
        $currentRuntime = self::currentRuntime();
        array_push($this->stack, $currentRuntime);
        $this->setRuntime($newRuntime);
    }

    public function restoreRuntime() {
        $lastRuntime = array_pop($this->stack);
        if (is_null($lastRuntime)) {
            return ;
        }
        $this->setRuntime($lastRuntime);
    }
}