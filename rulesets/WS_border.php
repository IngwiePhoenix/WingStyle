<?php class WS_border extends WingStyleDesigner {

	public function color($c) {
		$this->addRule(new WingStyleRule("border-color",$c));
		return WS();
	}
	
	public function main() {
		$props = func_get_args();
		$this->addRule(new WingStyleRule("border",implode(" ",$props)));
		return WS();
	}

} ?>