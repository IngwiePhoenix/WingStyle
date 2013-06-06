<?php class WingStyleManager {

	public static function whoAmI() { return get_called_class(); }
	public $useMain=true;

	public function __get($n) {
		// Big exception - if we have WingStyle(Base) and we're asked for the variable end, we call the method end()!!
		$we = get_class($this);
		if(($we == "WingStyle" || $we == "WingStyleBase") && $n == "end") return WS()->end();
	
		// the default
		if(isset($this->$n)) return $this->$n;

		// getter
		$get = "get".ucfirst($n);
		if(method_exists($this, $get)) return call_user_func(array($this, $get), array());
		
		// auto-include
		$class = "WS_".$n;
		if(!isset($this->$n) && class_usable($class)) {
			$this->$n = new $class();
			if(method_exists($this->$n, "init")) $this->$n->init();
			return $this->$n;
		}
		
		return null;
	}
	
	public function __set($n,$v) {
		$mth = "set".ucfirst($n);
		$p = array($v);
		if(method_exists($this, $mth)) return call_user_func_array(array($this->$mth),$p);
		else $this->$n=$v;
	}

	public function __call($n,$p) {
		// directly call the method - default
		if(method_exists($this, $n)) return call_user_func_array(array($this,$n),$p);
		
		// access main()
		if($this->useMain && method_exists($this->$n, "main")) return call_user_func_array(array($this->$n, "main"), $p);
		elseif(method_exists($this, "addRule")) {
			WS()->addRule(new WingStyleComment('ERROR: Can not find method/rule "'.$n.'". Applying "false" CSS rule.', true));
			WS()->addRule(new WingStyleRule($n,implode(" ", $p)));
			return WingStyle::instance(); 
		} else die("Can't work method $n on class ".get_class($this)."!\n");
	}
	
} ?>