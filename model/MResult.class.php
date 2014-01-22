<?php
class MResult {
    public $error;
    public $info;

    const SUCCESS = 0;
    const FAIL = 1;

    public static function result($error, $info = null) {
        return new MResult($error, $info);
    }

    public static function resultSuccess($info = null) {
        return self::result(MResult::SUCCESS, $info);
    }

    public static function resultFail($info = null) {
        return self::result(MResult::FAIL, $info);
    }

    /**
     * 深拷贝构造
     *
     * @param MResult $result
     * @return MResult
     */
    public static function resultWithResult($result) {
        $error = $result->error;
        $info = $result->info;

        return self::result($error, $info);
    }

    public function __construct($error, $info) {
        $this->error = $error;
        $this->info = $info;
    }

}