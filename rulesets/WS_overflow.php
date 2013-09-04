<?php class WS_overflow extends WingStyleDesigner {

	public function main() {
		$this->addRule(new WingStyleRule("overflow", $this->format(func_get_args())));
		return WS();
	}
	
	public function y($y) {
		$this->addRule(new WingStyleRule("overflow-y", $this->format($y)));
		return WS();
	}
	public function x($x) {
		$this->addRule(new WingStyleRule("overflow-x", $this->format($x)));
		return WS();
	}

} ?>