<?php class WS_width extends WingStyleDesigner {

	private function _($c, $m) {
		$this->addRule(new WingStyleRule($m."-width", $this->format($c)));
		return WS();
	}

	public function min($c) { return $this->_($c, "min"); }
	public function max($c) { return $this->_($c, "max"); }

} ?>