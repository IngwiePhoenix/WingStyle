<?php class WingStyleDesigner {
	
	public function __get($name) {
		$mName = "get".ucfirst($name);
		if(method_exists($this,$mName)) return call_user_func_array(array($this,$mName));
		else return $this->$name;
	}

	public function getRule() { return null; }
	
	public function WS() { return WingStyle::instance(); }
	public function addRule($obj) {
		$rn = $obj->rule;
		if(!is_null($rn)) $this->WS()->rules[$obj->rule]=$obj;
		else $this->WS()->rules[]=$obj;
	}

} ?>