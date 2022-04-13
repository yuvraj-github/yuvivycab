<?php
/**
 * Name : Load
 * @todo This is a system file to load files,controllers,common pages.
 * @author Abhishek Verma
 */
class Ion_load {
	public static $current;
	public static $currentFunction;
	public static $req;
	public static $url;
	/**
	 * Load file
	 */
	public static function file($path = ''){
		$path = $path.'.php';
		if(file_exists($path)){
			require_once(ROOT.$path);
		}
		else{
			die('Failed to load '.ROOT.$path);
		}
	}
	/**
	 * Load current controller
	 * E.g account/save,account/delete
	 */
	public static function controller(){
		$dir = preg_quote(trim(DIR, '/'));
		$request = preg_replace('/.*(\/'.$dir.')(index.php){0,}\/?/', '', $_SERVER['REQUEST_URI']);
		$request = preg_replace('/[?].*/', '', $request);
		if(empty($request)){
			if(DEFAULT_CONTROLLER == ''){
				return self::page_404();
			}
			else{
				$request[0] = DEFAULT_CONTROLLER;
				$request[1] = 'index';
				$c = 2;
			}
		}
		else{
			$request = explode('/', trim($request, '/'));
		}
		self::$url = DEFAULT_CONTROLLER;
		self::$req = $request;
		$c = count($request);
		$method = $class = '';
		$path = '';
		foreach($request as $req){
			if(self::__isDir($path.$req)){
				$path .= $req.'/';
			}
			else{
				$class = $req;
				break;
			}
		}
		$method = $c > 1 ? $request[$c - 1] : 'index';
		if(empty($class)){
			return self::page_404();
		}
		self::file('application/controller/'.$path.$class);
		if($class != ''){
			self::$url = $class;
			self::$current = strtolower($class);
			$genObj = new $class();
			$method = $method !== '' ? $method : 'index';
			self::$currentFunction = strtolower($method);
			if(is_callable(array($genObj, $method))){
				$genObj->$method();
			}
			else{
				return self::page_404();
			}
		}
	}
	/**
	 * @param type $dir
	 * @return check given paran if directory or file
	 */
	private static function __isDir($dir){
		if(file_exists(ROOT.'application/controller/'.$dir.'.php')){
			return false;
		}
		else{
			return true;
		}
	}
	/**
	 * @param type $model
	 * @return loaded model Object
	 */
	public static function model($model){
		self::file('application/model/'.$model);
		$class = ucwords($model);
		return new $class();
	}
	/**
	 * Load page not found page
	 */
	public static function page_404(){
		self::file('system/pages/404');
		return false;
	}
	/**
	 * Load View with data
	 */
	public static function view($view, $data = array(), $return = false){
		extract($data);
//		ob_start('minify_output');
//		ob_start();
		require(ROOT.'application/view/'.$view.'.php');
		if($return == true){
			$buffer = ob_get_contents();
			@ob_end_clean();
			return $buffer;
		}
	}
	/**
	 * Load language
	 */
	public static function language($language){
		include(ROOT.'application/language/'.SYSTEM_LANGUAGE.'/'.$language.'.php');
		return $lang;
	}
	/**
	 * Load Lib
	 */
	public static function lib($lib){
		if(file_exists(ROOT.'application/libraries/'.$lib.'.php')){
			self::file('application/libraries/'.$lib);
		}
		else{
			self::file('system/libraries/'.$lib);
		}
	}
	/**
	 * Load helper
	 */
	public static function helper($helper){
		if(file_exists(ROOT.'application/helper/'.$helper.'.php')){
			self::file('application/helper/'.$helper);
		}
		else{
			self::file('system/helper/'.$lib);
		}
	}
	/**
	 * Load Common array file
	 */
	public static function data($file){
		include(ROOT.'application/helper/'.$file.'.php');
		return get_defined_vars();
	}
}