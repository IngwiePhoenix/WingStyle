<?php class WS_transition extends WingStyleDesigner {
	
	public function main() {
		$props = func_get_args();
		$this->addRule(new WingStyleRule("transition",$this->format($props)));
		$this->addRule(new WingStyleRule("-webkit-transition",$this->format($props)));
		return WS();
	}

} ?>