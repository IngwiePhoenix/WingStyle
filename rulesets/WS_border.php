<?php class WS_border extends WingStyleDesigner {

	public function getRule() { return "border"; }

	public function color($c) {
		$this->addRule(new WingStyleRule("border-color",$c));
		return $this->WS(); #Return the main instance - very important!!!
	}
	
	public function main($width, $color, $pattern) {
		$props = array($width, $color, $pattern);
		$this->addRule(new WingStyleRule("border",implode(" ",$props)));
		return $this->WS();
	}

} ?>