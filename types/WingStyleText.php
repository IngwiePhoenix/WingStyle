<?php class WingStyleText {

	public $txt;
	
	public function __construct($t) { $this->txt=$t; }
	
	public function toString() { return $this->txt; }
	public function toBString() { return "\t".$this->toString(); }

} ?>