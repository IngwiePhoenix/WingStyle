<?php class WS_border extends WingStyleDesigner {

	public function init() {
		WS()->addDefs(
			"dotted", "dashed", "solid", "double",
			"groove", "ridge", "inset", "outset"
		);
	}

	public function color($c) {
		$this->addRule(new WingStyleRule("border-color",$c));
		return WS();
	}

	public function style($c) {
		$this->addRule(new WingStyleRule("border-style", $this->format($c)));
		return WS();
	}

	public function main() {
		$props = func_get_args();
		$this->addRule(new WingStyleRule("border",implode(" ",$props)));
		return WS();
	}

} ?>
