<?php class WingStyleManager {

	public static function whoAmI() { return get_called_class(); }
	public $useMain=true;

	public function __get($n) {
		WS()->debug("Args: $n");

		// Big exception - if we have WingStyle(Base) and we're asked for the variable end, we call the method end()!!
		WS()->debug("Testing for ->end OR ->return call.");
		$we = get_class($this);
		if($we == "WingStyle" || $we == "WingStyleBase") {
			switch($n) {
				case "end": return WS()->__end(); break;
				case "return": return WS()->__return(); break;
			}
		}

		// the default
		WS()->debug("Testing for default");
		if(isset($this->$n)) return $this->$n;

		// getter
		WS()->debug("Trying to activate the get-method.");
		$get = "get".ucfirst($n);
		if(method_exists($this, $get)) return call_user_func(array($this, $get), array());

		// auto-include
		$class = "WS_".$n;
		WS()->debug("Attempting to auto-include and attach new class/object: $class");
		if(!isset($this->$n) && class_usable($class)) {
			$this->$n = new $class();
			if(method_exists($this->$n, "init")) {
				$this->$n->preInit();
				$this->$n->init();
			}
			return $this->$n;
		}

		WS()->debug("Nothing helped, returning NULL.");
		return null;
	}

	public function __set($n,$v) {
		WS()->debug("Args:", array($n, $v));
		WS()->debug("Trying the set-method or just normally applying the change.");
		$mth = "set".ucfirst($n);
		$p = array($v);
		if(method_exists($this, $mth)) return call_user_func_array(array($this, $mth), $p);
		else $this->$n=$v;
	}

	public function __call($n,$p) {
		$debugMsg = "Args: $n and (";
		$debugArray = array();
		foreach($p as $p_a) {
			if(!is_array($p_a))
				$debugArray[] = $p_a;
			else {
				$tarr = array();
				foreach($p_a as $i=>$v) {
					$tarr[] = $i.' => '.$v;
				}
				$debugArray[] = "[".implode(",",$tarr)."]";
			}
		}
		$debugMsg.= implode(",", $debugArray).")";

		// directly call the method - default
		WS()->debug("Trying to call the method the default way.");
		if(method_exists($this, $n)) return call_user_func_array(array($this,$n),$p);

		// access main()
		WS()->debug("Trying to call the main-method of the requested class.");
		if($this->useMain && method_exists($this->$n, "main")) return call_user_func_array(array($this->$n, "main"), $p);
		elseif(method_exists($this, "addRule")) {
			$nn = strtolower(preg_replace("/([A-Z])/",'-$1', $n));
			WS()->debug("Error, sorta. Acting like we know the rule although we dont. Method: $n as $nn");
			WS()->addRule(new WingStyleRule($nn,WingStyleDesigner::format($p)));
			return WS();
		} else die("Can't work method $n on class ".get_class($this)."!\n");
	}

} ?>
