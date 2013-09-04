<?php class WS_font extends WingStyleDesigner {

	public function init() {
		WS()->addDefs("normal",	"italic", "oblique");
	}

	private function _ft($t, $ft) {
		$this->addRule(new WingStyleRule("font-".$t, $this->format($ft)));
		return WS();
	}
	
	public function size($s) { return $this->_ft("size", $s); }
	public function style($s) { return $this->_ft("style", $s); }
	public function weight($w) { return $this->_ft("weight", $w); }
	public function family() {
		$fts = func_get_args();
		foreach($fts as $i=>$f) $fts[$i] = '"'.$f.'"';
		$fts = implode(", ", $fts);
		$this->addRule(new WingStyleRule("font-family", $fts));
		return WS();
	}

} ?>