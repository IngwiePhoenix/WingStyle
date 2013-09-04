<?php class WS_background extends WingStyleDesigner {

	public function getFile() {return __FILE__;}
	
	public function init() {
		WS()->addDefs(
			"repeat",
			array("noRepeat"=>"no-repeat"),
			array("repeat_y"=>"repeat-y"),
			array("repeat_x"=>"repeat-x")
		);
	}

	public function color($c) {
		$this->addRule(new WingStyleRule("background-color",$c));
		return WS();
	}
	
	public function main() {
		$props = $this->format(func_get_args());
		$this->addRule(new WingStyleRule("background",$props));
		return WS();
	}

	public function rgba($r, $g, $b, $o) {
		$props = array($r, $g, $b, $o);
		$this->addRule(new WingStyleRule("background","rgba(".implode(",",$props).")"));
		return WS();
	}

} ?>