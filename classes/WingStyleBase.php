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
		array( n=>WS_Propertory )
	*/
	public $rules=array();
	public function addTxt($t) { $this->rules[] = new WingStyleText($t); return $this; }
	
	// Holds the current selector. IF IT IS NULL we won't print a starting and end bracket!
	public $selector=-1;
	
	public function start($s=null) {
		#$this->selector=$s; 
		return $this;
	}
		
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
		if(method_exists($this,$n)) $this->__get($n);
		return call_user_func_array(array($this->$n,"main"), $p);
	}
	
	public function end() {
		$rules = $this->rules; $this->rules=array();
		$selector = $this->selector; $this->selector=null;
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
} ?>