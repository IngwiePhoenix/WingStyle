<?php class WingStyleDesigner {
	
	public static function whoAmI() { return get_called_class(); }

    public function __construct() {
    	$class = self::whoAmI();
    	$class_file = $this->file;
    	$path = substr($class_file, 0, strlen($class_file)-4); #and gone be the .php xD
    	$icp =  $path.PATH_SEPARATOR.get_include_path();
    	if(file_exists($path) && is_dir($path)) set_include_path($icp);
    }
	public function __get($name) {
		$mName = "get".ucfirst($name);
		$cName = "WS_$name";
		if(method_exists($this,$mName)) {
			return call_user_func_array(array($this,$mName),array());
		} else if(!isset($this->$name) && class_exists($cName)) {			
			$this->$name = new $cName;
			return $this->$name;
		} else return $this->$name;
	}
	public function __set($name,$val) {
		$mName = "set".ucfirst($name);
		if(method_exists($this,$mName)) call_user_func_array(array($this,$mName),array($val));
		else $this->$name=$val;
	}
	public function __call($n,$p) {
		if(!method_exists($this, $n)) {
			$this->__get($n);
			if(method_exists($this->$n, "main")) return call_user_func_array(array($this->$n,"main"), $p);
		} else call_user_func_array(array($this,$n), $p);
	}

	public $brands = array("-webkit-","-o-","-ms-","-Ms-","-khtml-",null);

	public function WS() { return WingStyle::instance(); }
	public function addRule($obj) {
		$rn = $obj->rule;
		$this->WS()->rules[]=$obj;
	}
	

} ?>