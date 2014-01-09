<?php
/**
 * Model
 *
 * Math
 *
 * @author liyan
 * @since Thu Aug 01 10:55:09 GMT 2013
 */
class MMath {

    public static function add($a, $b) {
        $la = strlen($a);
        $lb = strlen($b);

        if ($la < $lb) {
            return self::add($b, $a);
        }

        $pre = 0; $i = 0;
        $a = strrev($a); $b = strrev($b);
        $ret = '';
        while ($i < $la || $pre == 1) {
            $pa = $pb = 0;
            ($i < $la) && $pa = $a{$i};
            ($i < $lb) && $pb = $b{$i};

            $sum = $pa + $pb + $pre;
            $pre = intval($sum / 10);
            $ret.= $sum % 10;

            $i++;
        }

        return strrev($ret);
    }

    public static function leftmove($x, $bits) {
        if ($bits == 0) {
            return $x;
        }
        $x = self::add($x, $x);
        return self::leftmove($x, $bits - 1);
    }
    
    //将超过31位的整形数据转化为负数
    public static function zhuquInt($num) {
    	$num = (float)$num;
    	if($num > 2147483647){
    		return -($num-2147483648 );
    	} else {
    		return (int)$num;
    	}
    }
    
    //将pro和value转化为唯一的id标识
   public static  function getTagMongoInt64($prop, $value){
    	$prop = self::zhuquInt($prop);
    	return (new MongoInt64( ($prop<<32) + $value ));
    }

}
