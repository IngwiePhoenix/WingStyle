<?php class WingStyleBase extends WingStyleManager {

	// SingletonSyntax: The static class instance.
	public static $INSTANCE=false;
	static function instance($s=null) { 
		if(!self::$INSTANCE) self::$INSTANCE = new WingStyle(); 
		if(self::$INSTANCE->selector == -1) self::$INSTANCE->selector=$s;
		return self::$INSTANCE->start(); 
	}
	public $me;
	private function __construct() {
		if(defined("WS_DEBUG")) $this->debug = WS_DEBUG;
		$this->addDefs(array(
			"none"=>"none",
			"auto"=>"auto",
			"hidden"=>"hidden",
			"inherit"=>"inherit"
		));
	}
	
	public function addDefs(array $defs) {
		foreach($defs as $n=>$v) {
			if(!defined($n)) {
				define($n, $v);
			}
		}
	}
	public function addRule($obj) {
		$rn = $obj->rule;
		$this->rules[]=$obj;
	}

	// Shall the output be beautyful?
	public $beauty=true;
	
	// if above is false, how would you like the strings seperated?
	public $seperator=" ";

	/*
		This keeps a list of the current assigned propertories. will be flusned with the end-call.
		array( WS_Rule::$rule=>WS_Rule )
	*/
	public $rules=array();
	
	// Default unit for int-values
	public $defaultUnit="px";
	
	// just adds a text entry.
	public function addTxt($t) { $this->rules[] = new WingStyleText($t); return $this; }
	
	// Holds the current selector. IF IT IS NULL we won't print a starting and end bracket!
	public $selector=-1;
	
	// Start the chain. Returned by WS()
	public function start($s=null) { return $this; }
			
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
			if($this->beauty) {
				$out = $selector." {\n";
				foreach($rules as $rule) {
					$out .= $rule->toBString()."\n";
				}
				$out .= "}\n";
			} else {
				$rs = array($selector,"{");
				foreach($rules as $rule) {
					$rs[] = $rule->toString();
				}
				$rs[] = "}";
				$out = implode(" ", $rs)."\n";
			}
			return $out;
		}
	}
	
	// debug yes or no?
	static $debug=false;
	public function getDebug() { return self::$debug; }
	public function setDebug($d) { self::$debug=$d; }
	
	/*
		What to debug?
		If this is an array, only the functions listed here are shown in the debug.
		I.e.: WS()->debugFunc=array("__autoload"); #This will now ONLY show output from the autoload function.
	*/
	public static $debugFunc = null;
	
	public static function debug($msg, $data=array()) {
		#var_dump(self::$debug); return;
		if(self::$debug) {
			// prepair debug backtrace
			$bt = debug_backtrace();
			$func = $bt[1]["function"];
			$line = $bt[1]["line"];
			$class = (isset($bt[1]["class"]) ? $bt[1]["class"]."->" : "MAIN>> ");
		
			// stop this if we dont want output here.
			if(is_array(self::$debugFunc) && !in_array($func, self::$debugFunc)) return;

			foreach($data as $i=>$d) {
				$_v=$d;
				if(is_object($d)) $_v = "[Object: ".get_class($d)."]";
				if(is_array($d)) $_v = "(".implode(",",$d).")";
				$data[$i]=$_v;
			}
			if(!empty($data)) $dataStr = " ".implode(", ",$data); else $dataStr = null; 
			$str = $class.$func."(".$line."): ".$msg.$dataStr;
			if(php_sapi_name() == "cli") $str .= "\n"; else $str .= "<br>\n";
			echo $str;
		}
	}
} ?>