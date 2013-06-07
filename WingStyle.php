<?php

	// Tell the damn client we're CSS!
	defined("WS_NO_HEADER") or header("Content-type: text/css");
	define("WS_ROOT",dirname(__FILE__));
	
	// first and important include:
	include_once "classes/WingStyleManager.php";
	include_once "classes/WingStyleBase.php";
	include_once "classes/WingStyleDesigner.php";
	if(!class_exists("WingStyleManager")) die("First include didnt work.\n");
	// give the user the base class...
	class WingStyle extends WingStyleBase {}

	function __cufa(/* mixed toCall, array args */) { return call_user_func_array("call_user_func_array", func_get_args()); }

	// helper functions
	function is_file_includable($find) {
		WingStyle::debug("Arg: $find");
		$paths = explode(PATH_SEPARATOR, get_include_path());
		$found = false;
		foreach($paths as $p) {
			WingStyle::debug("Foreach: Current path is $p");
			$fullname = $p.DIRECTORY_SEPARATOR.$find;
		  	if(is_file($fullname)) {
		  		WingStyle::debug("Found the file: $fullname");
		    	$found = $fullname;
		    	break;
		  	}
		}
		return $found;
	}
	
	function class_usable($cname) { WingStyle::debug("Testing for $cname"); return ( is_file_includable($cname.".php")!=false ? true:false ); }
		
	// prep the auto loader!
	function __autoload($cname) { 
		WingStyle::debug("Loading: ".$cname);
		$f = is_file_includable($cname.".php");
		if($f != false)	include_once $f;
		else WingStyle::debug("Can't find class $cname in include path (".get_include_path().")\n");
	}
	
	
	// set includes.
	set_include_path(
		get_include_path()
		.PATH_SEPARATOR
		.realpath(__DIR__)
		.PATH_SEPARATOR
		.realpath(__DIR__)."/rulesets/"
		.PATH_SEPARATOR
		.realpath(__DIR__)."/types/"
		.PATH_SEPARATOR
		.realpath(__DIR__)."/classes/"
	);	
	
	// Singleton syntax!
	function WS($s=-1) { return WingStyle::instance($s); }	
	
?>