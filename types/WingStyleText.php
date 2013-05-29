<?php class WingStyleText {

	public $rule=null;
	public $txt;
	
	public function __construct($t) { $this->txt=$t; }
	
	public function toString() { return $this->txt; }
	public function toBString() { return $this->toString(); }

} ?>