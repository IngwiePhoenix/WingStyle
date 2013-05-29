<?php class WingStyleDesigner {
	
	public static function whoAmI() { return get_called_class(); }

    public function __construct() {
    	$class = self::whoAmI();
    	$path = dirname(__FILE__)."/".$class;
    	if(file_exists($path) && is_dir($path)) set_include_path( get_include_path().PATH_SEPARATOR.realpath($path) );
    }
	public function __get($name) {
		$mName = "get".ucfirst($name);
		if(method_exists($this,$mName)) return call_user_func_array(array($this,$mName));
		else if(!isset($this->$var)) {
			$n = "WS_$name";
			$this->$name = new $n;
			return $this->$name;
		} else return $this->$var;
	}
	public function __set($name,$val) {
		$mName = "set".ucfirst($name);
		if(method_exists($this,$mName)) call_user_func_array(array($this,$mName),array($val));
		else $this->$name=$val;
	}
	public function __call($n,$p) {
		if(method_exists($this,$n)) $this->__get($n);
		return call_user_func_array(array($this->$n,"main"), $p);
	}

	public function WS() { return WingStyle::instance(); }
	public function addRule($obj) {
		$rn = $obj->rule;
		if(!is_null($rn)) $this->WS()->rules[$obj->rule]=$obj;
		else $this->WS()->rules[]=$obj;
	}
	

} ?>