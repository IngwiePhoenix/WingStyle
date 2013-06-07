<?php class WS_display extends WingStyleDesigner {
	
	public function init() {
		WS()->addDefs(array(
			"inline" => "inline",
			"block" => "block",
			"inlineBlock" => "inline-block",
		));
	}
	
	public function main($d) {
		WS()->addRule(new WingStyleRule("display",$this->format($d)));
		return WS();
	}

} ?>