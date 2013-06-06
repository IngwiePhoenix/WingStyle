<?php class WS_color extends WingStyleDesigner {

	public function main($c) {
		$this->addRule(new WingStyleRule("color",$c));
		return WS();
	}

} ?>