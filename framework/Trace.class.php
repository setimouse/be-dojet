<?php

class Trace
{
	private static $instance;

	public static $DEBUG = 0x00000001;
	public static $NOTICE= 0x00000010;
	public static $WARN  = 0x00000100;
	public static $ERROR = 0x00001000;

	public static $TRACE_ALL = 0x11111111;
	public static $TRACE_OFF = 0x0;

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
		$traceObj->_trace($msg, self::$DEBUG, $file, $line);
	}

	public static function notice($msg, $file = null, $line = null)
	{
		$traceObj = self::getInstance();
		$traceObj->_trace($msg, self::$NOTICE, $file, $line);
	}

	public static function warn($msg, $file = null, $line = null)
	{
		$traceObj = self::getInstance();
		$traceObj->_trace($msg, self::$WARN, $file, $line);
	}

	public static function fatal($msg, $file = null, $line = null)
	{
		$traceObj = self::getInstance();
		$traceObj->_trace($msg, self::$ERROR, $file, $line);
	}

	protected function _trace($msg, $level = DEBUG, $file = '', $line = '')
	{
		if ( !in_array($level, array(self::$TRACE_ALL, self::$DEBUG, self::$ERROR, self::$NOTICE, self::$TRACE_OFF, self::$WARN))
			|| 0 === ($level & $GLOBALS['config']['global']['traceLevel']) )
		{
			return;
		}

		$tracefile = self::get_logfile($level);

		$path = Trace::getLogPath();

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

		if (is_null($path) || !is_string($path)) {
		    $path = LOG;
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

	protected function get_logfile($level)
	{
		$strLogfile = date("Ymd", time());
		switch ($level)
		{
			case self::$DEBUG:
				$strLogfile = 'debug.'.$strLogfile;
				break;
			case self::$ERROR:
				$strLogfile = 'error.'.$strLogfile;
				break;
			case self::$WARN:
				$strLogfile = 'warn.'.$strLogfile;
				break;
			case self::$NOTICE:
				$strLogfile = 'notice.'.$strLogfile;
				break;
		}

		$strLogfile = 'dojet.'.$strLogfile.'.log';
		return $strLogfile;
	}
}

