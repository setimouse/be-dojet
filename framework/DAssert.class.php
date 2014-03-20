<?php
class DAssert {

	/**
     * 封装断言
     *
     * @param bool $condition
     * @param string $message
     * @param string $file
     * @param string $line
     */
    public static function assert($condition, $message = null, $file = null, $line = null) {

        if ($condition) {
            return ;
        }

        Trace::fatal('assert failed. '.$message.', '.$file.', '.$line);

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
        DAssert::assert(is_numeric($var), 'nan, '.var_export($var, true), $file, $line);
    }

    /**
     * 数字数组断言
     *
     * @param mix $var
     * @param string $file
     * @param string $line
     */
    public static function assertNumericArray($array, $file = null, $line = null) {
        DAssert::assert(is_array($array), 'not an array', $file, $line);

        foreach ($array as $val) {
            DAssert::assertIntNumeric($val, $file, $line);
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
        DAssert::assertNumericArray($array, $file, $line);
        DAssert::assert(!empty($array), 'array should not be empty', $file, $line);
    }

}