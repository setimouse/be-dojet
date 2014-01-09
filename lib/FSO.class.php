<?php
class FSO
{
	public static function mkdirEx($pathname) {
		if (file_exists($pathname))
		{
			if (is_dir($pathname))
			{
				return true;
			}
			else 
			{
				return false;
			}
		}
		
		$strParentDir = dirname($pathname);
		if ( $strParentDir === $pathname )
		{
			return false;
		}
		self::mkdirEx($strParentDir);
		$ret = @mkdir($pathname);
	
		return $ret;
	}

	public static function rmdirEx($dirname, $force = false) {
		if ( false === $force ) 
		{
			return @rmdir($dirname);
		}
		
		if ( $dh = @opendir($dirname) ) 
		{
			while ( $file = @readdir($dh) ) 
			{
				if ( '.' === $file || '..' === $file ) 
				{
					continue;
				}
				$strFile = $dirname.'/'.$file;
				if ( is_file($strFile) ) 
				{
					unlink($strFile);
				}
				elseif ( is_dir($strFile) ) 
				{
					$ret = self::rmdirEx($strFile, $force);
				}
				else 
				{
					return false;
				}
			}
			closedir($dh);
		}
		$ret = @rmdir($dirname);
		return $ret;
	}

}