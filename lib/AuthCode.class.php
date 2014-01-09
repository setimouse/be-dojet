<?php
/**
 * 双向加密解密
 * 密钥在config的global.authkey
 *
 * @author liiyan
 * @version 2012.12.27
 *
 */
class AuthCode {

    public static function encode($string) {
        $key = self::authkey();
        return self::auth($string, 'ENCODE', $key);
    }

    public static function decode($string) {
        $key = self::authkey();
        return self::auth($string, 'DECODE', $key);
    }

	private static function authkey() {
        return Config::configForKeyPath('passport.authkey');
    }

    protected static function auth($string, $operation, $key = '')
	{
		$key = md5($key ? $key : md5($_SERVER['HTTP_USER_AGENT']));
		$key_length = strlen($key);

		$string = $operation == 'DECODE' ? base64_decode($string) : substr(md5($string.$key), 0, 8).$string;
		$string_length = strlen($string);

		$rndkey = $box = array();
		$result = '';

		for($i = 0; $i <= 255; $i++) {
			$rndkey[$i] = ord($key[$i % $key_length]);
			$box[$i] = $i;
		}

		for($j = $i = 0; $i < 256; $i++) {
			$j = ($j + $box[$i] + $rndkey[$i]) % 256;
			$tmp = $box[$i];
			$box[$i] = $box[$j];
			$box[$j] = $tmp;
		}

		for($a = $j = $i = 0; $i < $string_length; $i++) {
			$a = ($a + 1) % 256;
			$j = ($j + $box[$a]) % 256;
			$tmp = $box[$a];
			$box[$a] = $box[$j];
			$box[$j] = $tmp;
			$result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
		}

		if($operation == 'DECODE') {
			if(substr($result, 0, 8) == substr(md5(substr($result, 8).$key), 0, 8)) {
				return substr($result, 8);
			} else {
				return '';
			}
		} else {
			return str_replace('=', '', base64_encode($result));
		}
	}
}