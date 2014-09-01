<?php class WS_transition extends WingStyleDesigner {

	public function init() {
		WS()->addDefs("all", "ease");
	}

	public function main() {
		$props = func_get_args();
		foreach(WS()->brands as $brand) {
			$this->addRule(new WingStyleRule($brand."transition",$this->format($props)));
		}
		return WS();
	}

} ?>
