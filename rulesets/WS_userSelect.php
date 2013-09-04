<?php class WS_userSelect extends WingStyleDesigner {

	public function init() {
		WS()->addDefs("text");
	}

	public function main($t) {
		$this->addRule(new WingStyleRule("-webkit-user-select",$this->format($t)));
		return WS();
	}

} ?>