<?php class WS_cursor extends WingStyleDesigner {

	public function init() {
		WS()->addDefs(
			array("normal"=>"default"),
			array("_default_"=>"default")
		);
	}

	public function main($t) {
		WS()->addRule(new WingStyleRule("cursor",$this->format($t)));
		return WS();
	}

} ?>