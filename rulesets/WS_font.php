<?php class WS_font extends WingStyleDesigner {

	public function __construct() {
		WS()->addDefs(array(
			"normal"=>"normal",
			"italic"=>"italic",
			"oblique"=>"oblique"
		));
	}

	private function _ft($t, $ft) {
		$this->addRule(new WingStyleRule("font-".$t, $this->format($ft)));
		return $this->WS();
	}
	
	public function size($s) { return $this->_ft("size", $s); }
	public function style($s) { return $this->_ft("style", $s); }
	public function family() {
		$fts = func_get_args();
		foreach($fts as $i=>$f) $fts[$i] = '"'.$f.'"';
		$fts = implode(", ", $fts);
		$this->addRule(new WingStyleRule("font-family", $fts));
		return $this->WS();
	}

} ?>