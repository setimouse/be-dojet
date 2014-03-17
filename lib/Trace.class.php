<?php

class Trace
{
    private static $instance;

    const DEBUG = 0x1;
    const NOTICE= 0x2;
    const WARN  = 0x4;
    const ERROR = 0x8;

    const TRACE_ALL = 0xff;
    const TRACE_OFF = 0x0;

    /**
     * @return Trace
     */
    protected static function getInstance()
    {
        if (!(self::$instance instanceof Trace))
        {
            self::$instance = new Trace();
        }

        return self::$instance;
    }

    public static function debug($msg, $file = null, $line = null)
    {
        $traceObj = self::getInstance();
        $traceObj->_trace($msg, self::DEBUG, $file, $line);
    }

    public static function notice($msg, $file = null, $line = null)
    {
        $traceObj = self::getInstance();
        $traceObj->_trace($msg, self::NOTICE, $file, $line);
    }

    public static function warn($msg, $file = null, $line = null)
    {
        $traceObj = self::getInstance();
        $traceObj->_trace($msg, self::WARN, $file, $line);
    }

    public static function fatal($msg, $file = null, $line = null)
    {
        $traceObj = self::getInstance();
        $traceObj->_trace($msg, self::ERROR, $file, $line);
    }

    protected function _trace($msg, $level, $file = '', $line = '')
    {
        if ( !in_array($level, array(self::TRACE_ALL, self::DEBUG, self::ERROR, self::NOTICE, self::TRACE_OFF, self::WARN))
            || 0 === ($level & Config::runtimeConfigForKeyPath('global.traceLevel')) )
        {
            return;
        }

        $path = self::getLogPath();
        if (!$path) {
            return;
        }

        $tracefile = self::get_logfile($level);

        $filePath = realpath($path).DIRECTORY_SEPARATOR.$tracefile;

        if ( is_array($msg) || is_object($msg) )
        {
            $msg = print_r($msg, true);
        }

        $pid = self::getpid();
        $ip = getUserClientIp();

        $trace = "[".date("y-m-d H:i:s")."][$pid][$ip] $msg";

        if ( !empty($file) )
        {
            $trace.= "\t[$file]";
        }

        if ( !empty($line) )
        {
            $trace.= "\t[$line]";
        }

        $trace.= "\n";
        if ( $fp = @fopen($filePath, 'a') )
        {
            @fwrite($fp, $trace);
            @fclose($fp);
        }
    }

    public static function getLogPath() {
        $path = Config::runtimeConfigForKeyPath('global.log_path');
        return $path;
    }

    protected function getpid()
    {
        if ( 'WIN' === substr(PHP_OS, 0, 3) )
        {
            return 0;
        }

        return posix_getpid();
    }

    protected function get_logfile($level)
    {
        $strLogfile = date("Ymd", time());
        switch ($level)
        {
            case self::DEBUG:
                $strLogfile = 'debug.'.$strLogfile;
                break;
            case self::ERROR:
                $strLogfile = 'error.'.$strLogfile;
                break;
            case self::WARN:
                $strLogfile = 'warn.'.$strLogfile;
                break;
            case self::NOTICE:
                $strLogfile = 'notice.'.$strLogfile;
                break;
        }

        $strLogfile = 'dojet.'.$strLogfile.'.log';
        return $strLogfile;
    }
}

