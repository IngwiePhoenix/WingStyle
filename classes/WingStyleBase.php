<?php class WingStyleBase extends WingStyleManager {

	// SingletonSyntax: The static class instance.
	public static $INSTANCE=false;
	static function instance($s=null) {
		if(is_numeric($s)) $s = $s."%";
		if(is_array($s)) $s = implode((WS()->beauty==true?", ":","), $s);
		if(!self::$INSTANCE) self::$INSTANCE = new WingStyle(); 
		if(self::$INSTANCE->selector == -1) self::$INSTANCE->selector=$s;
		return self::$INSTANCE->start(); 
	}
	public $me;
	private function __construct() {
		$this->debug("Wellcome to WingStyle! Debugger is started and running.");
		$this->addDefs(array(
			"none"=>"none",
			"auto"=>"auto",
			"hidden"=>"hidden",
			"inherit"=>"inherit"
		));
	}
	
	public function load(/*name, name, name, name...*/) {
		$list = func_get_args();
		foreach($list as $l) $this->__get($l);
	}
	
	public function addDefs() {
		$defs = func_get_args();
		// new def method!
		foreach($defs as $d) {
			$this->debug("Working:",array($d));
			if(is_string($d)) { 
				$this->debug("Verbalizing:",array($d)); defined($d) or define($d, $d); 
			}
			if(is_array($d)) { 
				foreach($d as $i=>$v) { 
					if(!is_string($i)) {
						$this->debug("Oops, converting index to string to match value",array($i));
						$i=$v;
					}
					$this->debug("foreach, defining:",array($i, $v));
					defined($i) or define($i, $v); 
				} 
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
		
	public function __return() {
		$this->debug("Saving old beauty state: ",array($this->beauty));
		$ob = $this->beauty; # save
		$this->beauty=false; # change
		$rt = $this->__end();  # retrieve
		$this->beauty=$ob;   # reset
		return $rt;			 # return
	}	
	public function __end() {
		$rules = $this->rules; 
		$selector = $this->selector;
		$this->__reset();
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
				$out = implode(" ", $rs);
			}
			return $out;
		}
	}
	
	public function __reset() { $this->selector=-1; $this->rules=array(); }
	
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
	public function getDebugFunc() { return self::$debugFunc; }
	public function setDebugFunc($d) { self::$debugFunc=$d; }
	
	public static function debug($msg, $data=array()) {
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
			if(php_sapi_name() == "cli") $str .= "\n"; else $str = "/* ".$str." */\n";
			echo $str;
		}
	}
	
	public function keyframes() {
		$args = func_get_args();
		$name = $args[0];
		unset($args[0]);
		$kfs = array($name=>$args);
		$this->__reset();
		$res = array();
		foreach($kfs as $n=>$k) {
			WS("@keyframes $n");
			foreach($k as $f) WS()->addTxt($f);
			$res[] = WS()->end;
		}
		return implode("\n", $res);
	}
} ?>