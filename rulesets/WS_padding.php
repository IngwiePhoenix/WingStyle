<?php class WS_padding extends WingStyleDesigner {

	public function main() {
		/*args: $top, $right, $bottom, $left */
		$args = $this->format(func_get_args());
		$this->addRule(new WingStyleRule("padding",$args));
		return WS();
	}
	
	public function _p($int, $d) {
		$int = $this->format($int);
		$this->addRule(new WingStyleRule("padding-".$d ,$int));
		return WS();
	}
	
	public function left($n) { return $this->_p($n,"left"); }
	public function top($n) { return $this->_p($n,"top"); }
	public function bottom($n) { return $this->_p($n,"bottom"); }
	public function right($n) { return $this->_p($n,"right"); }

} ?>