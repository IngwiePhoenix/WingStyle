<?php class WS_verticalAlign extends WingStyleDesigner {
	
	public function main() {
		$props = func_get_args();
		$this->addRule(new WingStyleRule("vertical-align",$this->format($props)));
		return WS();
	}

} ?>