<?php class WingStyleBase {

	// SingletonSyntax: The static class instance.
	public static $INSTANCE=false;
	static function instance($s=null) { 
		if(!self::$INSTANCE) self::$INSTANCE = new WingStyle(); 
		if(self::$INSTANCE->selector == -1) self::$INSTANCE->selector=$s;
		return self::$INSTANCE->start(); 
	}
	public $me;
	private function __construct() {
		// Get root path.
		$me = realpath(dirname(__FILE__));
		
		// collect class files:
		$files = scandir("$me/classes");
		// strip some files...
		$files = array_diff($files, array(".",".."));
		
		// re-build file list into classes - strip wrong file names if needed.
		foreach($files as $f) {
			if(substr(basename($f),0) == ".") continue;
			if(substr(basename($f),0,2) == "WS" && !is_dir("$me/classes/$f")) {
				$name = pathinfo($f,PATHINFO_FILENAME);
				$Mname = str_replace("WS_","",$name);
				include_once "$me/classes/$f";
				$this->$Mname = new $name;
			}
		}
		unset($files); $this->me=$me; unset($me);
	}	

	// Shall the output be beautyful?
	public $beauty=true;
	
	// if above is false, how would you like the strings seperated?
	public $seperator=" ";

	/*
		This keeps a list of the current assigned propertories. will be flusned with the end-call.
		array( n=>WS_Propertory )
	*/
	public $rules=array();
	
	// Holds the current selector. IF IT IS NULL we won't print a starting and end bracket!
	public $selector=-1;
	
	public function start($s=null) {
		#$this->selector=$s; 
		return $this;
	}
		
	public function __get($var) {
		if($var == "end") return $this->end();
		else return $this->$var;
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