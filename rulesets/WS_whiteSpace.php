<?php class WS_whiteSpace extends WingStyleDesigner {
	
	public function main() {
		$props = func_get_args();
		$this->addRule(new WingStyleRule("whitespace",$this->format($props)));
		return WS();
	}

} ?>