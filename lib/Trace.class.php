<?php
/**
 * Trace
 *
 * @author liyan
 * @since 2009
 */
class Trace implements ITraceDelegate {

    private static $instance;

    const DEBUG = 0x1;
    const NOTICE= 0x2;
    const WARN  = 0x4;
    const ERROR = 0x8;
    const VERBOSE = 0x10;

    const TRACE_ALL = 0xffff;
    const TRACE_OFF = 0x0;

    private static $count = 0;

    private static $requestId; //  identify current request

    protected static $delegate = null;

    /**
     * @return Trace
     */
    protected static function getInstance()
    {
        if (!(self::$instance instanceof Trace))
        {
            self::$instance = new Trace();
            self::$requestId = crc32(uniqid().microtime(true));
        }

        return self::$instance;
    }

    public static function setDelegate(ITraceDelegate $delegate) {
        self::$delegate = $delegate;
    }

    public static function requestID() {
        return self::$requestId;
    }

    public static function debug($msg, $file = '', $line = '')
    {
        $traceObj = self::getInstance();
        $traceObj->_trace($msg, self::DEBUG, $file, $line);
    }

    public static function notice($msg, $file = '', $line = '')
    {
        $traceObj = self::getInstance();
        $traceObj->_trace($msg, self::NOTICE, $file, $line);
    }

    public static function verbose($msg, $file = '', $line = '')
    {
        $traceObj = self::getInstance();
        $traceObj->_trace($msg, self::VERBOSE, $file, $line);
    }

    public static function warn($msg, $file = '', $line = '')
    {
        $traceObj = self::getInstance();
        $traceObj->_trace($msg, self::WARN, $file, $line);
    }

    public static function fatal($msg, $file = '', $line = '')
    {
        $traceObj = self::getInstance();
        $traceObj->_trace($msg, self::ERROR, $file, $line);
    }

    protected function _trace($msg, $level, $file = '', $line = '')
    {
        $traceLevel = Config::runtimeConfigForKeyPath('global.traceLevel');
        if (0 === $level & $traceLevel) {
            return;
        }

        $delegate = self::$delegate instanceof ITraceDelegate ? self::$delegate : $this;
        $delegate->write($msg, $level, $file, $line);
    }

    public function write($msg, $level, $file = '', $line = '') {
        $path = self::getLogPath();
        if (!$path) {
            return;
        }

        $tracefile = self::getLogFile($level);
        $filePath = realpath($path).DIRECTORY_SEPARATOR.$tracefile;

        if (is_array($msg) || is_object($msg)) {
            $msg = print_r($msg, true);
        }

        $pid = self::getpid();
        $ip = getUserClientIp();

        $trace = sprintf("%s %ld %ld %s %d  %s",
                date("y-m-d H:i:s"),
                $pid,
                self::$requestId,
                $ip,
                self::$count++,
                $msg
            );

        if (!empty($file)) {
            $trace.= "\t[$file]";
        }

        if (!empty($line)) {
            $trace.= "\t[$line]";
        }

        $trace.= "\n";

        if ($fp = @fopen($filePath, 'a')) {
            @fwrite($fp, $trace);
            @fclose($fp);
        }
    }

    protected static function getLogPath() {
        $path = Config::runtimeConfigForKeyPath('global.log_path');
        if (empty($path)) {
            $path = sys_get_temp_dir().'/';
        }
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

    protected function getLogFile($level)
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
            case self::VERBOSE:
                $strLogfile = 'verbose.'.$strLogfile;
                break;
            case self::NOTICE:
                $strLogfile = 'notice.'.$strLogfile;
                break;
        }

        $strLogfile = 'dojet.'.$strLogfile.'.log';
        return $strLogfile;
    }
}

