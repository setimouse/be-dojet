<?php
/**
 * Model
 *
 * StopWatch
 *
 * @author liyan
 * @since Sun Jun 16 10:23:48 GMT 2013
 */
class MStopWatch {

    protected $watch = array();
    protected $start = array();

    /**
     * @return MStopWatch
     */
    public static function getInstance() {
    	return SingletonFactory::getInstance(get_called_class());
    }

    public static function begin($timer) {
        $stopwatch = self::getInstance();
        $stopwatch->_begin($timer);
    }

    public static function stop($timer, $reset = false) {
        $stopwatch = self::getInstance();
        return $stopwatch->_stop($timer, $reset);
    }

    public static function dump() {
        $stopwatch = self::getInstance();
        return $stopwatch->_dump();
    }

    public function _begin($timer) {
    	$this->start[$timer] = microtime(true);
    }

    public function _stop($timer, $reset = false) {
        $start = 0;
        if (isset($this->start[$timer])) {
            $start = $this->start[$timer];
        }
        $this->watch[$timer] = microtime(true) - $start;

        if ($reset) {
            $this->start[$timer] = microtime(true);
        }
        return $this->watch[$timer];
    }

    public function _dump() {
    	return $this->watch;
    }

}