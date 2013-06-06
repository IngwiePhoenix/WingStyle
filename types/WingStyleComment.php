<?php class WingStyleComment {

	public $rule=null;
	public $txt;
	public $string=false;
	
	public function __construct($t,$string) { $this->txt=$t; $this->string = $string; }
	
	public function toString() { return "/* ".$this->txt." */"; }
	public function toBString() { if($this->string) return "\t".$this->toString(); else return "\t/*\n\t\t".$this->txt."\n\t*/"; }

} ?>