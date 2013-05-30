<?php

	// Tell the damn client we're CSS!
	header("Content-type: text/css");
	
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
	
	// helper functions
	function is_file_includable($find) {
		$paths = explode(PATH_SEPARATOR, get_include_path());
		$found = false;
		foreach($paths as $p) {
			$fullname = $p.DIRECTORY_SEPARATOR.$find;
		  	if(is_file($fullname)) {
		    	$found = $fullname;
		    	break;
		  	}
		}
		return $found;
	}

	// prep the auto loader!
	function __autoload($cname) {
		$f = is_file_includable($cname.".php");
		if($f != false)	include_once $f;
	}
	
	// give the user the base class...
	class WingStyle extends WingStyleBase {}
	
	// Singleton syntax!
	function WS($s=-1) { return WingStyle::instance($s); }
	
?>