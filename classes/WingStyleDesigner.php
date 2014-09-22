<?php class WingStyleDesigner extends WingStyleManager {

	public $brands;

    public function __construct() {
    	$this->brands = WS()->brands;
    	$class = self::whoAmI();
    	$class_file = $this->file;
    	$path = substr($class_file, 0, strlen($class_file)-4); #and gone be the .php xD
    	$icp =  $path.PATH_SEPARATOR.get_include_path();
    	if(file_exists($path) && is_dir($path)) set_include_path($icp);
    }

	public function addRule($obj) { return WS()->addRule($obj); }
	public static function format($args) {
		if(!is_array($args)) $args=array($args);
		foreach($args as $i=>$v) {
			if(defined($v)) { $args[$i]=constant($v); }
			if(is_numeric($v) && !is_string($v)) { $args[$i]=$v.WS()->defaultUnit; }
			if($v === 0) $args[$i]=$v;
		}
		return implode(" ", $args);
	}

	public function preInit() {
		// This method only works correctly if getFile is defined.
		if(!method_exists($this, "getFile")) return;

		$me = get_class($this);
		$subdir = dirname($this->getFile())."/".get_class($this);
		WS()->debug("Registering: $subdir");
		$clist = glob($subdir."/*.php");
		foreach($clist as $bfile) {
			$file = basename($bfile);
			$rfile = substr($file, 0, strlen($file)-4);
			WS()->debug("Testing for: $rfile ($bfile)");
			// Testing if the class name extends upon this one.
			if(strpos($rfile, $me) !== FALSE && substr($rfile, 0, strlen($me)) == $me) {
				$prop = substr($rfile, strlen($me)+1);
				WS()->debug("$rfile matched with $me. Adding: $prop");
				$icp = $subdir.PATH_SEPARATOR.get_include_path();
				set_include_path($icp);
				include_once($bfile);
				$this->$prop = new $rfile();
			}
		}
	}


} ?>
