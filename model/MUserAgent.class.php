<?php
class MUserAgent {

    /**
     * 是否是爬虫ua
     *
     * @param string $ua
     * @return bool
     */
    public static function isSpiderUA($ua) {
        if (self::isUAInWhiteList($ua)) {   //  在白名单里
            if (!self::isUAInBlackList($ua)) {  //  不在黑名单里
                return false;
            }
        }
        return true;
    }

    /**
     * 爬虫ua白名单过滤
     *
     * @param string $ua
     * @return bool
     */
    protected static function isUAInWhiteList($ua) {
        $list = array(
            'Mozilla', 'Opera',
        );

        foreach ($list as $word) {
            if (false !== stripos($ua, $word)) {
                return true;
            }
        }
        return false;
    }

    /**
     * 爬虫ua黑名单过滤
     *
     * @param string $ua
     * @return bool
     */
    protected static function isUAInBlackList($ua) {
        $list = array(
            'spider', 'bot',
//            'Googlebot', 'JianKongBao', 'bingbot', 'robot', 'msnbot',
            'code.google.com', 'Zend_Http_Client',
        );

        foreach ($list as $word) {
            if (false !== stripos($ua, $word)) {
                return true;
            }
        }
        return false;
    }
}