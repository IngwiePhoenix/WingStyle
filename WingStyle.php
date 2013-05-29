<?php

	// Tell the damn client we're CSS!
	header("Content-type: text/css");
	
	// set includes.
	set_include_path(
		get_include_path()
		.PATH_SEPARATOR
		.realpath(__DIR__)
		.PATH_SEPARATOR
		.realpath(__DIR__)."/classes/"
	);

	// prep the auto loader!
	function __autoload($cname) { include_once $cname.".php"; }
	
	// give the user the base class...
	class WingStyle extends WingStyleBase {}
	
	// Singleton syntax!
	function WS($s=null) { return WingStyle::instance($s); }
	
?>