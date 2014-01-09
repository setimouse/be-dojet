<?php
/**
 * 通知中心
 *
 * @author liyan
 * @since 2013 11 4
 */
class NotificationCenter {

    protected static $hooks = array();

    public static function addObserver($notify, $callback) {
        Dojet::assert(is_callable($callback), 'callback must be callable');
        if (!key_exists($notify, self::$hooks)) {
            self::$hooks[$notify] = array();
        }
        array_push(self::$hooks[$notify], $callback);
    }

    public static function removeObserver($notify, $callback) {
        if (!key_exists($notify, self::$hooks)) {
            return ;
        }
        self::$hooks[$notify] = array_diff(self::$hooks[$notify], array($callback));
    }

    public static function postNotify($notify) {
        if (!isset(self::$hooks[$notify])) {
            return ;
        }

        $args = func_get_args();
		array_shift($args);

        foreach (self::$hooks[$notify] as $callback) {
            call_user_func_array($callback, $args);
        }
    }
}