<?php class WingStyleBase {

	// SingletonSyntax: The static class instance.
	public static $INSTANCE=false;
	static function instance($s=null) { 
		if(!self::$INSTANCE) self::$INSTANCE = new WingStyle(); 
		if(self::$INSTANCE->selector == -1) self::$INSTANCE->selector=$s;
		return self::$INSTANCE->start(); 
	}
	public $me;
	private function __construct() {}	

	// Shall the output be beautyful?
	public $beauty=true;
	
	// if above is false, how would you like the strings seperated?
	public $seperator=" ";

	/*
		This keeps a list of the current assigned propertories. will be flusned with the end-call.
		array( WS_Rule::$rule=>WS_Rule )
	*/
	public $rules=array();
	
	// just adds a text entry.
	public function addTxt($t) { $this->rules[] = new WingStyleText($t); return $this; }
	
	// Holds the current selector. IF IT IS NULL we won't print a starting and end bracket!
	public $selector=-1;
	
	// Start the chain. Returned by WS()
	public function start($s=null) { return $this; }
		
	public function __get($var) {
		if($var == "end") return $this->end();
		else {
			if(!isset($this->$var)) {
				$n = "WS_$var";
				$this->$var = new $n;
			}
			return $this->$var;
		}
	}
	public function __call($n,$p) {
		if(method_exists($this,$n)) {
			return call_user_func_array(array($this,$n), $p);
		} else if(!isset($this->$n)) {
			$this->__get($n);
			return call_user_func_array(array($this->$n,"main"), $p);
		}
	}
	
	public function end() {
		$rules = $this->rules; $this->rules=array();
		$selector = $this->selector; $this->selector=-1;
		$data = array();
		
		if($selector == null) {
			foreach($rules as $rule) {
				$data[] = $rule->toString();
			}
			return implode($this->seperator,$data);
		} else {
			$out = $selector." {\n";
			foreach($rules as $rule) {
				$out .= ($this->beauty ? $rule->toBString() : $rule->toString())."\n";
			}
			$out .= "}";
			return $out;
		}
	}
	
	public static $debug=false; // Make true for a lot of debug info.
	public static function debug($fnc,$line,$msg) {
		$str = $fnc."(".$line."): ".$msg;
		if(php_sapi_name() == "cli") $str .= "\n"; else $str .= "<br>\n";
		echo $str;
	}
} ?>