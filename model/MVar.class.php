<?php
/**
 * Model
 *
 * Var
 *
 * @author liyan
 * @since Mon Apr 22 03:44:28 GMT 2013
 */
class MVar {

    /**
     * 判断变量是否为数字
     *
     * @param mix $var
     * @return boold
     */
    public static function is_digital($var) {
        if (is_array($var) || is_object($var) || is_null($var)) {
            return false;
        }

        $var = strval($var);
        $len = strlen($var);
        $o0 = ord('0');
        $o9 = ord('9');
        for ($i = 0; $i < $len; $i++) {
            $c = ord($var{$i});
            if ($c > $o9 || $c < $o0) {
                return false;
            }
        }
        return true;
    }
}