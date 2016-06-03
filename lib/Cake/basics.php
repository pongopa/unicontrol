<?php

/**
 * Basic Cake functionality.
 *
 * Core functions for including other source files, loading models and so forth.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Basic defines for timing functions.
 */
	define('SECOND', 1);
	define('MINUTE', 60);
	define('HOUR', 3600);
	define('DAY', 86400);
	define('WEEK', 604800);
	define('MONTH', 2592000);
	define('YEAR', 31536000);

/**
 * Loads configuration files. Receives a set of configuration files
 * to load.
 * Example:
 *
 * `config('config1', 'config2');`
 *
 * @return boolean Success
 * @link http://book.cakephp.org/2.0/en/core-libraries/global-constants-and-functions.html#config
 */
function config() {
	$args = func_get_args();
	foreach ($args as $arg) {
		if ($arg === 'database' && file_exists(APP . 'Config' . DS . 'database.php')) {
			include_once(APP . 'Config' . DS . $arg . '.php');
		} elseif (file_exists(APP . 'Config' . DS . $arg . '.php')) {
			include_once(APP . 'Config' . DS . $arg . '.php');

			if (count($args) == 1) {
				return true;
			}
		} else {
			if (count($args) == 1) {
				return false;
			}
		}
	}
	return true;
}

/**
 * Prints out debug information about given variable.
 *
 * Only runs if debug level is greater than zero.
 *
 * @param boolean $var Variable to show debug information for.
 * @param boolean $showHtml If set to true, the method prints the debug data in a browser-friendly way.
 * @param boolean $showFrom If set to true, the method prints from where the function was called.
 * @link http://book.cakephp.org/2.0/en/development/debugging.html#basic-debugging
 * @link http://book.cakephp.org/2.0/en/core-libraries/global-constants-and-functions.html#debug
 */
function debug($var = false, $showHtml = null, $showFrom = true) {
	if (Configure::read('debug') > 0) {
		$file = '';
		$line = '';
		if ($showFrom) {
			$calledFrom = debug_backtrace();
			$file = substr(str_replace(ROOT, '', $calledFrom[0]['file']), 1);
			$line = $calledFrom[0]['line'];
		}
		$html = <<<HTML
<div class="cake-debug-output">
<span><strong>%s</strong> (line <strong>%s</strong>)</span>
<pre class="cake-debug">
%s
</pre>
</div>
HTML;
			$text = <<<TEXT

%s (line %s)
########## DEBUG ##########
%s
###########################

TEXT;
		$template = $html;
		if (php_sapi_name() == 'cli') {
			$template = $text;
		}
		if ($showHtml === null && $template !== $text) {
			$showHtml = true;
		}
		$var = print_r($var, true);
		if ($showHtml) {
			$var = h($var);
		}
		printf($template, $file, $line, $var);
	}
}

if (!function_exists('sortByKey')) {

	/**
	 * Sorts given $array by key $sortby.
	 *
	 * @param array $array Array to sort
	 * @param string $sortby Sort by this key
	 * @param string $order  Sort order asc/desc (ascending or descending).
	 * @param integer $type Type of sorting to perform
	 * @return mixed Sorted array
	 */
	function sortByKey(&$array, $sortby, $order = 'asc', $type = SORT_NUMERIC) {
		if (!is_array($array)) {
			return null;
		}

		foreach ($array as $key => $val) {
			$sa[$key] = $val[$sortby];
		}

		if ($order == 'asc') {
			asort($sa, $type);
		} else {
			arsort($sa, $type);
		}

		foreach ($sa as $key => $val) {
			$out[] = $array[$key];
		}
		return $out;
	}
}

/**
 * Convenience method for htmlspecialchars.
 *
 * @param mixed $text Text to wrap through htmlspecialchars.  Also works with arrays, and objects.
 *    Arrays will be mapped and have all their elements escaped.  Objects will be string cast if they
 *    implement a `__toString` method.  Otherwise the class name will be used.
 * @param boolean $double Encode existing html entities
 * @param string $charset Character set to use when escaping.  Defaults to config value in 'App.encoding' or 'UTF-8'
 * @return string Wrapped text
 * @link http://book.cakephp.org/2.0/en/core-libraries/global-constants-and-functions.html#h
 */
function h($text, $double = true, $charset = null) {
	if (is_array($text)) {
		$texts = array();
		foreach ($text as $k => $t) {
			$texts[$k] = h($t, $double, $charset);
		}
		return $texts;
	} elseif (is_object($text)) {
		if (method_exists($text, '__toString')) {
			$text = (string) $text;
		} else {
			$text = '(object)' . get_class($text);
		}
	}

	static $defaultCharset = false;
	if ($defaultCharset === false) {
		$defaultCharset = Configure::read('App.encoding');
		if ($defaultCharset === null) {
			$defaultCharset = 'UTF-8';
		}
	}
	if (is_string($double)) {
		$charset = $double;
	}
	return htmlspecialchars($text, ENT_QUOTES, ($charset) ? $charset : $defaultCharset, $double);
}

/**
 * Splits a dot syntax plugin name into its plugin and classname.
 * If $name does not have a dot, then index 0 will be null.
 *
 * Commonly used like `list($plugin, $name) = pluginSplit($name);`
 *
 * @param string $name The name you want to plugin split.
 * @param boolean $dotAppend Set to true if you want the plugin to have a '.' appended to it.
 * @param string $plugin Optional default plugin to use if no plugin is found. Defaults to null.
 * @return array Array with 2 indexes.  0 => plugin name, 1 => classname
 */
function pluginSplit($name, $dotAppend = false, $plugin = null) {
	if (strpos($name, '.') !== false) {
		$parts = explode('.', $name, 2);
		if ($dotAppend) {
			$parts[0] .= '.';
		}
		return $parts;
	}
	return array($plugin, $name);
}

/**
 * Print_r convenience function, which prints out <PRE> tags around
 * the output of given array. Similar to debug().
 *
 * @see	debug()
 * @param array $var Variable to print out
 * @link http://book.cakephp.org/2.0/en/core-libraries/global-constants-and-functions.html#pr
 */
function pr($var) {
	if (Configure::read('debug') > 0) {
		echo '<pre>';
		print_r($var);
		echo '</pre>';
	}
}

/**
 * Merge a group of arrays
 *
 * @param array First array
 * @param array Second array
 * @param array Third array
 * @param array Etc...
 * @return array All array parameters merged into one
 * @link http://book.cakephp.org/2.0/en/development/debugging.html#am
 */
function am() {
	$r = array();
	$args = func_get_args();
	foreach ($args as $a) {
		if (!is_array($a)) {
			$a = array($a);
		}
		$r = array_merge($r, $a);
	}
	return $r;
}

/**
 * Gets an environment variable from available sources, and provides emulation
 * for unsupported or inconsistent environment variables (i.e. DOCUMENT_ROOT on
 * IIS, or SCRIPT_NAME in CGI mode).  Also exposes some additional custom
 * environment information.
 *
 * @param  string $key Environment variable name.
 * @return string Environment variable setting.
 * @link http://book.cakephp.org/2.0/en/core-libraries/global-constants-and-functions.html#env
 */
function env($key) {
	if ($key === 'HTTPS') {
		if (isset($_SERVER['HTTPS'])) {
			return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');
		}
		return (strpos(env('SCRIPT_URI'), 'https://') === 0);
	}

	if ($key === 'SCRIPT_NAME') {
		if (env('CGI_MODE') && isset($_ENV['SCRIPT_URL'])) {
			$key = 'SCRIPT_URL';
		}
	}

	$val = null;
	if (isset($_SERVER[$key])) {
		$val = $_SERVER[$key];
	} elseif (isset($_ENV[$key])) {
		$val = $_ENV[$key];
	} elseif (getenv($key) !== false) {
		$val = getenv($key);
	}

	if ($key === 'REMOTE_ADDR' && $val === env('SERVER_ADDR')) {
		$addr = env('HTTP_PC_REMOTE_ADDR');
		if ($addr !== null) {
			$val = $addr;
		}
	}

	if ($val !== null) {
		return $val;
	}

	switch ($key) {
		case 'SCRIPT_FILENAME':
			if (defined('SERVER_IIS') && SERVER_IIS === true) {
				return str_replace('\\\\', '\\', env('PATH_TRANSLATED'));
			}
			break;
		case 'DOCUMENT_ROOT':
			$name = env('SCRIPT_NAME');
			$filename = env('SCRIPT_FILENAME');
			$offset = 0;
			if (!strpos($name, '.php')) {
				$offset = 4;
			}
			return substr($filename, 0, strlen($filename) - (strlen($name) + $offset));
			break;
		case 'PHP_SELF':
			return str_replace(env('DOCUMENT_ROOT'), '', env('SCRIPT_FILENAME'));
			break;
		case 'CGI_MODE':
			return (PHP_SAPI === 'cgi');
			break;
		case 'HTTP_BASE':
			$host = env('HTTP_HOST');
			$parts = explode('.', $host);
			$count = count($parts);

			if ($count === 1) {
				return '.' . $host;
			} elseif ($count === 2) {
				return '.' . $host;
			} elseif ($count === 3) {
				$gTLD = array(
					'aero',
					'asia',
					'biz',
					'cat',
					'com',
					'coop',
					'edu',
					'gov',
					'info',
					'int',
					'jobs',
					'mil',
					'mobi',
					'museum',
					'name',
					'net',
					'org',
					'pro',
					'tel',
					'travel',
					'xxx'
				);
				if (in_array($parts[1], $gTLD)) {
					return '.' . $host;
				}
			}
			array_shift($parts);
			return '.' . implode('.', $parts);
			break;
	}
	return null;
}

/**
 * Reads/writes temporary data to cache files or session.
 *
 * @param  string $path	File path within /tmp to save the file.
 * @param  mixed  $data	The data to save to the temporary file.
 * @param  mixed  $expires A valid strtotime string when the data expires.
 * @param  string $target  The target of the cached data; either 'cache' or 'public'.
 * @return mixed  The contents of the temporary file.
 * @deprecated Please use Cache::write() instead
 */
function cache($path, $data = null, $expires = '+1 day', $target = 'cache') {
	if (Configure::read('Cache.disable')) {
		return null;
	}
	$now = time();

	if (!is_numeric($expires)) {
		$expires = strtotime($expires, $now);
	}

	switch (strtolower($target)) {
		case 'cache':
			$filename = CACHE . $path;
		break;
		case 'public':
			$filename = WWW_ROOT . $path;
		break;
		case 'tmp':
			$filename = TMP . $path;
		break;
	}
	$timediff = $expires - $now;
	$filetime = false;

	if (file_exists($filename)) {
		$filetime = @filemtime($filename);
	}

	if ($data === null) {
		if (file_exists($filename) && $filetime !== false) {
			if ($filetime + $timediff < $now) {
				@unlink($filename);
			} else {
				$data = @file_get_contents($filename);
			}
		}
	} elseif (is_writable(dirname($filename))) {
		@file_put_contents($filename, $data);
	}
	return $data;
}

/**
 * Used to delete files in the cache directories, or clear contents of cache directories
 *
 * @param mixed $params As String name to be searched for deletion, if name is a directory all files in
 *   directory will be deleted. If array, names to be searched for deletion. If clearCache() without params,
 *   all files in app/tmp/cache/views will be deleted
 * @param string $type Directory in tmp/cache defaults to view directory
 * @param string $ext The file extension you are deleting
 * @return true if files found and deleted false otherwise
 */
function clearCache($params = null, $type = 'views', $ext = '.php') {
	if (is_string($params) || $params === null) {
		$params = preg_replace('/\/\//', '/', $params);
		$cache = CACHE . $type . DS . $params;

		if (is_file($cache . $ext)) {
			@unlink($cache . $ext);
			return true;
		} elseif (is_dir($cache)) {
			$files = glob($cache . '*');

			if ($files === false) {
				return false;
			}

			foreach ($files as $file) {
				if (is_file($file) && strrpos($file, DS . 'empty') !== strlen($file) - 6) {
					@unlink($file);
				}
			}
			return true;
		} else {
			$cache = array(
				CACHE . $type . DS . '*' . $params . $ext,
				CACHE . $type . DS . '*' . $params . '_*' . $ext
			);
			$files = array();
			while ($search = array_shift($cache)) {
				$results = glob($search);
				if ($results !== false) {
					$files = array_merge($files, $results);
				}
			}
			if (empty($files)) {
				return false;
			}
			foreach ($files as $file) {
				if (is_file($file) && strrpos($file, DS . 'empty') !== strlen($file) - 6) {
					@unlink($file);
				}
			}
			return true;
		}
	} elseif (is_array($params)) {
		foreach ($params as $file) {
			clearCache($file, $type, $ext);
		}
		return true;
	}
	return false;
}

/**
 * Recursively strips slashes from all values in an array
 *
 * @param array $values Array of values to strip slashes
 * @return mixed What is returned from calling stripslashes
 * @link http://book.cakephp.org/2.0/en/core-libraries/global-constants-and-functions.html#stripslashes_deep
 */
function stripslashes_deep($values) {
	if (is_array($values)) {
		foreach ($values as $key => $value) {
			$values[$key] = stripslashes_deep($value);
		}
	} else {
		$values = stripslashes($values);
	}
	return $values;
}

/**
 * Returns a translated string if one is found; Otherwise, the submitted message.
 *
 * @param string $singular Text to translate
 * @param mixed $args Array with arguments or multiple arguments in function
 * @return mixed translated string
 * @link http://book.cakephp.org/2.0/en/core-libraries/global-constants-and-functions.html#__
 */
function __($singular, $args = null) {
	if (!$singular) {
		return;
	}

	App::uses('I18n', 'I18n');
	$translated = I18n::translate($singular);
	if ($args === null) {
		return $translated;
	} elseif (!is_array($args)) {
		$args = array_slice(func_get_args(), 1);
	}
	return vsprintf($translated, $args);
}

/**
 * Returns correct plural form of message identified by $singular and $plural for count $count.
 * Some languages have more than one form for plural messages dependent on the count.
 *
 * @param string $singular Singular text to translate
 * @param string $plural Plural text
 * @param integer $count Count
 * @param mixed $args Array with arguments or multiple arguments in function
 * @return mixed plural form of translated string
 */
function __n($singular, $plural, $count, $args = null) {
	if (!$singular) {
		return;
	}

	App::uses('I18n', 'I18n');
	$translated = I18n::translate($singular, $plural, null, 6, $count);
	if ($args === null) {
		return $translated;
	} elseif (!is_array($args)) {
		$args = array_slice(func_get_args(), 3);
	}
	return vsprintf($translated, $args);
}

/**
 * Allows you to override the current domain for a single message lookup.
 *
 * @param string $domain Domain
 * @param string $msg String to translate
 * @param mixed $args Array with arguments or multiple arguments in function
 * @return translated string
 */
function __d($domain, $msg, $args = null) {
	if (!$msg) {
		return;
	}
	App::uses('I18n', 'I18n');
	$translated = I18n::translate($msg, null, $domain);
	if ($args === null) {
		return $translated;
	} elseif (!is_array($args)) {
		$args = array_slice(func_get_args(), 2);
	}
	return vsprintf($translated, $args);
}

/**
 * Allows you to override the current domain for a single plural message lookup.
 * Returns correct plural form of message identified by $singular and $plural for count $count
 * from domain $domain.
 *
 * @param string $domain Domain
 * @param string $singular Singular string to translate
 * @param string $plural Plural
 * @param integer $count Count
 * @param mixed $args Array with arguments or multiple arguments in function
 * @return plural form of translated string
 */
function __dn($domain, $singular, $plural, $count, $args = null) {
	if (!$singular) {
		return;
	}
	App::uses('I18n', 'I18n');
	$translated = I18n::translate($singular, $plural, $domain, 6, $count);
	if ($args === null) {
		return $translated;
	} elseif (!is_array($args)) {
		$args = array_slice(func_get_args(), 4);
	}
	return vsprintf($translated, $args);
}

/**
 * Allows you to override the current domain for a single message lookup.
 * It also allows you to specify a category.
 *
 * The category argument allows a specific category of the locale settings to be used for fetching a message.
 * Valid categories are: LC_CTYPE, LC_NUMERIC, LC_TIME, LC_COLLATE, LC_MONETARY, LC_MESSAGES and LC_ALL.
 *
 * Note that the category must be specified with a numeric value, instead of the constant name.  The values are:
 *
 * - LC_ALL       0
 * - LC_COLLATE   1
 * - LC_CTYPE     2
 * - LC_MONETARY  3
 * - LC_NUMERIC   4
 * - LC_TIME      5
 * - LC_MESSAGES  6
 *
 * @param string $domain Domain
 * @param string $msg Message to translate
 * @param integer $category Category
 * @param mixed $args Array with arguments or multiple arguments in function
 * @return translated string
 */
function __dc($domain, $msg, $category, $args = null) {
	if (!$msg) {
		return;
	}
	App::uses('I18n', 'I18n');
	$translated = I18n::translate($msg, null, $domain, $category);
	if ($args === null) {
		return $translated;
	} elseif (!is_array($args)) {
		$args = array_slice(func_get_args(), 3);
	}
	return vsprintf($translated, $args);
}

/**
 * Allows you to override the current domain for a single plural message lookup.
 * It also allows you to specify a category.
 * Returns correct plural form of message identified by $singular and $plural for count $count
 * from domain $domain.
 *
 * The category argument allows a specific category of the locale settings to be used for fetching a message.
 * Valid categories are: LC_CTYPE, LC_NUMERIC, LC_TIME, LC_COLLATE, LC_MONETARY, LC_MESSAGES and LC_ALL.
 *
 * Note that the category must be specified with a numeric value, instead of the constant name.  The values are:
 *
 * - LC_ALL       0
 * - LC_COLLATE   1
 * - LC_CTYPE     2
 * - LC_MONETARY  3
 * - LC_NUMERIC   4
 * - LC_TIME      5
 * - LC_MESSAGES  6
 *
 * @param string $domain Domain
 * @param string $singular Singular string to translate
 * @param string $plural Plural
 * @param integer $count Count
 * @param integer $category Category
 * @param mixed $args Array with arguments or multiple arguments in function
 * @return plural form of translated string
 */
function __dcn($domain, $singular, $plural, $count, $category, $args = null) {
	if (!$singular) {
		return;
	}
	App::uses('I18n', 'I18n');
	$translated = I18n::translate($singular, $plural, $domain, $category, $count);
	if ($args === null) {
		return $translated;
	} elseif (!is_array($args)) {
		$args = array_slice(func_get_args(), 5);
	}
	return vsprintf($translated, $args);
}

/**
 * The category argument allows a specific category of the locale settings to be used for fetching a message.
 * Valid categories are: LC_CTYPE, LC_NUMERIC, LC_TIME, LC_COLLATE, LC_MONETARY, LC_MESSAGES and LC_ALL.
 *
 * Note that the category must be specified with a numeric value, instead of the constant name.  The values are:
 *
 * - LC_ALL       0
 * - LC_COLLATE   1
 * - LC_CTYPE     2
 * - LC_MONETARY  3
 * - LC_NUMERIC   4
 * - LC_TIME      5
 * - LC_MESSAGES  6
 *
 * @param string $msg String to translate
 * @param integer $category Category
 * @param mixed $args Array with arguments or multiple arguments in function
 * @return translated string
 */
function __c($msg, $category, $args = null) {
	if (!$msg) {
		return;
	}
	App::uses('I18n', 'I18n');
	$translated = I18n::translate($msg, null, null, $category);
	if ($args === null) {
		return $translated;
	} elseif (!is_array($args)) {
		$args = array_slice(func_get_args(), 2);
	}
	return vsprintf($translated, $args);
}

/**
 * Shortcut to Log::write.
 *
 * @param string $message Message to write to log
 */
function LogError($message) {
	App::uses('CakeLog', 'Log');
	$bad = array("\n", "\r", "\t");
	$good = ' ';
	CakeLog::write('error', str_replace($bad, $good, $message));
}

/**
 * Searches include path for files.
 *
 * @param string $file File to look for
 * @return Full path to file if exists, otherwise false
 * @link http://book.cakephp.org/2.0/en/core-libraries/global-constants-and-functions.html#fileExistsInPath
 */
function fileExistsInPath($file) {
	$paths = explode(PATH_SEPARATOR, ini_get('include_path'));
	foreach ($paths as $path) {
		$fullPath = $path . DS . $file;

		if (file_exists($fullPath)) {
			return $fullPath;
		} elseif (file_exists($file)) {
			return $file;
		}
	}
	return false;
}

/**
 * Convert forward slashes to underscores and removes first and last underscores in a string
 *
 * @param string String to convert
 * @return string with underscore remove from start and end of string
 * @link http://book.cakephp.org/2.0/en/core-libraries/global-constants-and-functions.html#convertSlash
 */
function convertSlash($string) {
	$string = trim($string, '/');
	$string = preg_replace('/\/\//', '/', $string);
	$string = str_replace('/', '_', $string);
	return $string;
}

function up($str) {
	   if(!is_array($str)){
		   $str = strtoupper($str);
	       $str = str_replace("ñ","Ñ",           $str);
	       $str = str_replace("á","Á",           $str);
	       $str = str_replace("é","É",           $str);
	       $str = str_replace("í","Í",           $str);
	       $str = str_replace("ó","Ó",           $str);
	       $str = str_replace("ú","Ú",           $str);
	       $str = str_replace("à","Á",           $str);
	       $str = str_replace("è","É",           $str);
	       $str = str_replace("ì","Í",           $str);
	       $str = str_replace("ò","Ó",           $str);
	       $str = str_replace("ù","Ú",           $str);
	   }
	   return $str;
	}

function mascara($numero=0,$cantidad_relleno=1){
        return str_pad($numero, $cantidad_relleno , "0", STR_PAD_LEFT);
}

function cambiar($cadena) {
  	 $cadena = str_replace("&AACUTE;","&Aacute;", $cadena);
     $cadena = str_replace("&EACUTE;","&Eacute;", $cadena);
     $cadena = str_replace("&IACUTE;","&Iacute;", $cadena);
     $cadena = str_replace("&OACUTE;","&Oacute;", $cadena);
     $cadena = str_replace("&UACUTE;","&Uacute;", $cadena);
     $cadena = str_replace("à","&aacute;", $cadena);
     $cadena = str_replace("è","&eacute;", $cadena);
     $cadena = str_replace("ì","&iacute;", $cadena);
     $cadena = str_replace("ò","&oacute;", $cadena);
     $cadena = str_replace("ù","&uacute;", $cadena);
     $cadena = str_replace("À","&Aacute;", $cadena);
     $cadena = str_replace("È","&Eacute;", $cadena);
     $cadena = str_replace("Ì","&Iacute;", $cadena);
     $cadena = str_replace("Ò","&Oacute;", $cadena);
     $cadena = str_replace("Ù","&Uacute;", $cadena);
     return $cadena;
}

function msj ($var_msj=null,$tipo='exito') {
		    echo '<script> ';
            if($tipo=='error'){
				echo "error('$var_msj');";
            }else if($tipo=='alerta'){
				echo "alerta('$var_msj');";
            }else if($tipo=='info'){
				echo "info('$var_msj');";
            }else{
				echo "exito('$var_msj');";
            }
            echo ' </script>';
	}

	function array_meses () {
		            $data[''] = '--Seleccione--';
		            $data['01'] = 'Enero';
					$data['02'] = 'Febrero';
					$data['03'] = 'Marzo';
					$data['04'] = 'Abril';
					$data['05'] = 'Mayo';
					$data['06'] = 'Junio';
					$data['07'] = 'Julio';
					$data['08'] = 'Agosto';
					$data['09'] = 'Septiembre';
					$data['10'] = 'Octubre';
					$data['11'] = 'Noviembre';
					$data['12'] = 'Deciembre';
					return $data;
	}

	function meses ($var) {
		if($var!=null){
			$var = (int) $var;
		}
		            $data[''] = '--Seleccione--';
		            $data[1] = 'Enero';
					$data[2] = 'Febrero';
					$data[3] = 'Marzo';
					$data[4] = 'Abril';
					$data[5] = 'Mayo';
					$data[6] = 'Junio';
					$data[7] = 'Julio';
					$data[8] = 'Agosto';
					$data[9] = 'Septiembre';
					$data[10] = 'Octubre';
					$data[11] = 'Noviembre';
					$data[12] = 'Deciembre';
					return $data[$var];
	}

	function dia(){
		for($i=1; $i<=31; $i++){
			$data[$i] = $i;
		}
		return $data;
	}

    /**
     *
     *@param $monto  monto el cual se va a dar formato
     *@param $tipo  1=para guardar en base de datos, 2=mostrar al usuario
     */
    function Formato($monto=null, $tipo=2, $decimales=2) {

    	//TIPO 1 ES SOLO CON SEPARADOR DECIMAL EL PUNTO
    	//TIPO 2 ES SOLO CON SEPARADOR DECIMAL ES LA COMA

		if($decimales==2){
		    	if($tipo==1){
			    		$aux = $monto.'';
					    for($i=0; $i<strlen($aux); $i++){if($aux[$i]==','){if(isset($aux[$i+3])){ if($aux[$i+3]=='5'){$monto += 0.001; break;}}}}//fin
					    $monto = preg_replace("/[^0-9\.]/", "", str_replace(',','.',$monto));
					    if (substr($monto,-3,1)=='.') {
					        $sents = '.'.substr($monto,-2);
					        $monto = substr($monto,0,strlen($monto)-3);
					    } elseif (substr($monto,-2,1)=='.') {
					        $sents = '.'.substr($monto,-1);
					        $monto = substr($monto,0,strlen($monto)-2);
					    } else {
					    	   $sents = '.00';
					    }
					    $monto = preg_replace("/[^0-9]/", "", $monto);
					    $var = number_format($monto.$sents,2,'.','');
		    	}else{
			    		$aux = $monto.'';
				        $monto =  sprintf("%01.3f",$monto);
				        for($i=0; $i<strlen($aux); $i++){
				        	  if($aux[$i]=='.'){
				        	  	 if(isset($aux[$i+3])){
				        	  	 	if($aux[$i+3]=='5'){$monto += 0.001; break;}
				        	  	 	}
				        	  	 }
				        	  }//fin for
				    	$var = number_format($monto,2,",",".");
		    	}//fin else
		}else{
                 if($tipo==1){
			                 	$monto = preg_replace("/[^0-9\.]/", "", str_replace(',','.',$monto));
							    if (substr($monto,-4,1)=='.') {
							        $sents = '.'.substr($monto,-3);
							        $monto = substr($monto,0,strlen($monto)-4);
							    } elseif (substr($monto,-3,1)=='.') {
							        $sents = '.'.substr($monto,-1);
							        $monto = substr($monto,0,strlen($monto)-4);
							    } else {
							    	   $sents = '.000';
							    }
							    $monto = preg_replace("/[^0-9]/", "", $monto);
							    $var = number_format($monto.$sents,3,'.','');
		    	}else{
					    		$monto = preg_replace("/[^0-9\.]/", "", str_replace(',','.',$monto));
							    if (substr($monto,-4,1)=='.') {
							        $sents = '.'.substr($monto,-3);
							        $monto = substr($monto,0,strlen($monto)-4);
							    } elseif (substr($monto,-3,1)=='.') {
							        $sents = '.'.substr($monto,-1);
							        $monto = substr($monto,0,strlen($monto)-3);
							    } else {
							        $sents = '.000';
							    }
							   if($sents==".000"){
							   	   	$var = number_format($monto,3,',','.');
							   }else{
							     $monto = preg_replace("/[^0-9]/", "", $monto);
							     $var   = number_format($monto.$sents,3,',','.');
				               }//fin else
		    	}//fin else
		}//fin else
       return $var;
    }//fin function
function crear_busqueda_index($inicio=null, $data=array(), $campos_like=array(), $campo_radio=null, $validacion_fija=array()){
       if($inicio==1){
        $_SESSION["BusquedaLike1"] = " 1=1 ";
	 	$_SESSION["BusquedaLike2"] = " 1=1 ";
	 	$_SESSION["BusquedaLike3"] = " 1=1 ";
	 	$_SESSION["BusquedaPista"] = "";
	 	$_SESSION["BusquedaRadio"] = "";
	 	foreach($validacion_fija as $a => $b ){
			$_SESSION["BusquedaLike3"] .= " and ".$a." = '".$b."' ";
		}
 }else if($inicio==2 && !empty($data)){
	 	$_SESSION["BusquedaLike1"] = " 1=1 ";
	 	$_SESSION["BusquedaLike2"] = " 1=1 ";
	 	$_SESSION["BusquedaLike3"] = " 1=1 ";
	 	$_SESSION["BusquedaPista"] = "";
	 	$_SESSION["BusquedaRadio"] = "";
	 	if(!empty($data["pista"])){
			$_SESSION["BusquedaLike1"]  = busca_separado($campos_like, $data["pista"]);
			$_SESSION["BusquedaPista"]  = $data["pista"];
	 	}
	 	if(!empty($data["radio"]) && $data["radio"]!=strtoupper("TODO")){
			$_SESSION["BusquedaLike2"]  = $campo_radio." = '".$data["radio"]."' ";
			$_SESSION["BusquedaRadio"]  = strtoupper($data["radio"]);
	 	}else if(!empty($data["radio"])){
	 	   if($data["radio"]==strtoupper("TODO")){
	 		$_SESSION["BusquedaRadio"]  = strtoupper($data["radio"]);
	 	   }
	 	}
	 	foreach($validacion_fija as $a => $b ){
			$_SESSION["BusquedaLike3"] .= " and ".$a." = '".$b."' ";
		}
    }

           $condicion[] = $_SESSION["BusquedaLike1"]." and ".$_SESSION["BusquedaLike2"]." and ".$_SESSION["BusquedaLike3"];
    return $condicion;
 }
function retornar_errores_ventana ($erroresx,$camposx) {
	            $errores = $erroresx;
            	$campo_titulos = $camposx;
            	//pr($campo_titulos);
            	$contenido = "";
            	if(is_array($errores)){
            	$contenido = '<div class="error_msj_campos" id="div_errores_id"><ul>';
	            	foreach($errores as $err=>$err_msj){
	                      if(isset($campo_titulos[$err])){
	                      	    foreach($campo_titulos[$err] as $campo_titulosk[$err]=>$campo_titulosv[$err]){
	                      	    	if(isset($campo_titulosv[$err]['titulo'])){
	                      	    		//pr($campo_titulosv[$err]);
										$contenido .='<li class="alerta_campo_li">'.$campo_titulosv[$err]['titulo'] .": <span>".$err_msj."</span></li>";
		                      	    }else{
		                      	    	$contenido .='<li class="alerta_campo_li">'.$err .": <span>".$err_msj[0]."</span></li>";
		                      	    }
	                      	    }
	                      }
	            	}

            	$contenido .="</ul></div>";
            	}
		        //pr($errores);
		        return $contenido;
}


function cambiar_formato_fecha($fecha){
               $f1=explode('-',$fecha);//2008-01-01
               $f2=explode('/',$fecha);//01/01/2008
               if(count($f1)==3){
                   return "".$f1[2]."/".$f1[1]."/".$f1[0];
               }else if(count($f2)==3){
                   return "".$f2[2]."-".$f2[1]."-".$f2[0];
               }else{
                   return null;
               }
      }//fin funcion


function busca_separado($var1=array(), $var2=null){
	$var_like_array = explode(" ", $var2);
	$sql_like   = "";
	$sql_like2  = "";
	foreach($var1 as $ve1){
	   $i=0;
	   foreach($var_like_array as $ve2 ){
	   	    $ve2          = quitar_acentos(mayus_acentos($ve2));
	   	    $sql_like[$i] = " $ve1 LIKE '%$ve2%' ";
	   	    $i++;
	   }//fin foreach 2
	   $sql_like2[]  = "(".implode(" OR ", $sql_like).") ";
	}//fin foreach 1
return "(".implode(" or ", $sql_like2).") ";
}//fin function



function mayus_acentos($cadena) {
		     $cadena = str_replace("à","Á", $cadena);
		     $cadena = str_replace("è","É", $cadena);
		     $cadena = str_replace("ì","Í", $cadena);
		     $cadena = str_replace("ò","Ó", $cadena);
		     $cadena = str_replace("ù","Ú", $cadena);
		     $cadena = str_replace("á","Á", $cadena);
		     $cadena = str_replace("é","É", $cadena);
		     $cadena = str_replace("í","Í", $cadena);
		     $cadena = str_replace("ó","Ó", $cadena);
		     $cadena = str_replace("ú","Ú", $cadena);
		     $cadena = str_replace("ñ","Ñ", $cadena);
	  return strtoupper($cadena);
}//fin function

function quitar_acentos($cadena) {
	         $cadena = strtolower($cadena);
		     $cadena = str_replace("à","a", $cadena);
		     $cadena = str_replace("è","e", $cadena);
		     $cadena = str_replace("ì","i", $cadena);
		     $cadena = str_replace("ò","o", $cadena);
		     $cadena = str_replace("ù","u", $cadena);
		     $cadena = str_replace("á","a", $cadena);
		     $cadena = str_replace("é","e", $cadena);
		     $cadena = str_replace("í","i", $cadena);
		     $cadena = str_replace("ó","o", $cadena);
		     $cadena = str_replace("ú","u", $cadena);

		     $cadena = str_replace("Á","a", $cadena);
		     $cadena = str_replace("É","e", $cadena);
		     $cadena = str_replace("Í","i", $cadena);
		     $cadena = str_replace("Ó","o", $cadena);
		     $cadena = str_replace("Ú","u", $cadena);
		     $cadena = str_replace("À","a", $cadena);
		     $cadena = str_replace("È","e", $cadena);
		     $cadena = str_replace("Ì","i", $cadena);
		     $cadena = str_replace("Ò","o", $cadena);
		     $cadena = str_replace("Ù","u", $cadena);
	  return strtoupper($cadena);
}//fin function


function redondear_formato($monto){
	$monto = Formato($monto,2);
	return   Formato($monto,1);
}//fin function



function Formato_cantidad($monto=null, $op=null) {
if($op==1){
	$monto = preg_replace("/[^0-9\.]/", "", str_replace(',','.',$monto));
    $decimales = 2;
      if (substr($monto,-10,1)=='.') {
        $sents = '.'.substr($monto,-9);
        $monto = substr($monto,0,strlen($monto)-10);
        $decimales = 9;
    } else if (substr($monto,-9,1)=='.') {
        $sents = '.'.substr($monto,-8);
        $monto = substr($monto,0,strlen($monto)-9);
        $decimales = 8;
    } else if (substr($monto,-8,1)=='.') {
        $sents = '.'.substr($monto,-7);
        $monto = substr($monto,0,strlen($monto)-8);
        $decimales = 7;
    } else if (substr($monto,-7,1)=='.') {
        $sents = '.'.substr($monto,-6);
        $monto = substr($monto,0,strlen($monto)-7);
        $decimales = 6;
    } else if (substr($monto,-6,1)=='.') {
        $sents = '.'.substr($monto,-5);
        $monto = substr($monto,0,strlen($monto)-6);
        $decimales = 5;
    } else if (substr($monto,-5,1)=='.') {
        $sents = '.'.substr($monto,-4);
        $monto = substr($monto,0,strlen($monto)-5);
        $decimales = 4;
    } else  if (substr($monto,-4,1)=='.') {
        $sents = '.'.substr($monto,-3);
        $monto = substr($monto,0,strlen($monto)-4);
        $decimales = 3;
    } else if (substr($monto,-3,1)=='.') {
        $sents = '.'.substr($monto,-2);
        $monto = substr($monto,0,strlen($monto)-3);
        $decimales = 2;
    } elseif (substr($monto,-2,1)=='.') {
        $sents = '.'.substr($monto,-1);
        $monto = substr($monto,0,strlen($monto)-2);
        $decimales = 1;
    } else {
        $sents = '.00';
    }//fin else
    $monto = preg_replace("/[^0-9]/", "", $monto);
    return number_format($monto.$sents,$decimales,'.','');
}else{
        $decimales = 2;
           if(substr($monto,-10,1)=='.'){
        $sents = '.'.substr($monto,-9);
         $monto = substr($monto,0,strlen($monto)-10);
        $decimales = 9;
    } else if(substr($monto,-9,1)=='.'){
    	$sents = '.'.substr($monto,-8);
    	$monto = substr($monto,0,strlen($monto)-9);
        $decimales = 8;
    } else if(substr($monto,-8,1)=='.'){
    	$sents = '.'.substr($monto,-7);
    	$monto = substr($monto,0,strlen($monto)-8);
        $decimales = 7;
    } else if(substr($monto,-7,1)=='.'){
    	$sents = '.'.substr($monto,-6);
    	$monto = substr($monto,0,strlen($monto)-7);
        $decimales = 6;
    } else if(substr($monto,-6,1)=='.'){
    	$sents = '.'.substr($monto,-5);
    	$monto = substr($monto,0,strlen($monto)-6);
        $decimales = 5;
    } else if(substr($monto,-5,1)=='.'){
    	$sents = '.'.substr($monto,-4);
    	$monto = substr($monto,0,strlen($monto)-5);
        $decimales = 4;
    } else if(substr($monto,-4,1)=='.'){
    	$sents = '.'.substr($monto,-3);
    	$monto = substr($monto,0,strlen($monto)-4);
        $decimales = 3;
    } else if(substr($monto,-3,1)=='.'){
    	$sents = '.'.substr($monto,-2);
    	$monto = substr($monto,0,strlen($monto)-3);
        $decimales = 2;
    } else if(substr($monto,-2,1)=='.'){
        $sents = '.'.substr($monto,-1);
        $monto = substr($monto,0,strlen($monto)-2);
        $decimales = 1;
    } else {
        $sents = '.00';
    }//fin else
          if($sents==".000000"){
      return $monto;
    }else if($sents==".00000"){
      return $monto;
    }else if($sents==".0000"){
      return $monto;
    }else if($sents==".000"){
      return $monto;
    }else if($sents==".00"){
      return $monto;
    }else{
      return number_format($monto.$sents,$decimales,",",".");
    }

}//fin else

}//fin function