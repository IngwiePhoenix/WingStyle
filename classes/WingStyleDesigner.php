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
			if(is_int($v) && !is_string($v)) { $args[$i]=$v.WS()->defaultUnit; }
			if($v === 0) $args[$i]=$v;
		}
		return implode(" ", $args);
	}
	
} ?>