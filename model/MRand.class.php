<?php
/**
 * Model
 *
 * Rand
 *
 * @author liyan
 * @since Sat Apr 13 03:06:10 GMT 2013
 */
class MRand {

    private $seed;
    private $lastRand;

    public static function getInstance() {
    	return SingletonFactory::getInstance(get_called_class());
    }

    function __construct() {
        $this->seed = time();
        $this->lastRand = 0;
    }

    public function srand($seed) {
    	$this->seed = $seed;
    }

    public function rand($min = 0, $max = 0xffffffff) {
        $min = max(0, $min);
        $max = min($max, 0xffffffff);
        if ($min >= $max) {
            return $max;
        }
        $rand = (($this->lastRand + $this->seed) * 29 + 37) % ($max - $min) + $min;
        $this->lastRand = $rand;
        return $rand;
    }

    public function shuffle($array) {
        $keys = array_keys($array);
        $count = count($keys);
        $result = array();
        for ($i = 0; $i < $count; $i++) {
            $rand = $this->rand($i, $count - 1);
            $tmp = $keys[$i];
            $keys[$i] = $keys[$rand];
            $keys[$rand] = $tmp;

            $result[] = $array[$keys[$i]];
        }
        return $result;
    }

    public function quickShuffle($array, $len) {
        $count = count($array);
        $len = min($count, $len);
        $cup = array();
        $ret = array();
        for ($i = 0; $i < $len; $i++) {
            $r = $this->rand($i, $len - 1);
            if (!isset($cup[$r])) {
                $cup[$r] = array_slice($array, $r, 1);
            }

            $tmp = $cup[$r];
            $cup[$r] = array_slice($array, $i, 1);
            $ret[] = $tmp;
        }

        return $ret;
    }

}