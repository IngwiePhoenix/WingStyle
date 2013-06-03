<?php class WS_background extends WingStyleDesigner {

	public function getFile() {return __FILE__;}

	public function color($c) {
		$this->addRule(new WingStyleRule("background-color",$c));
		return $this->WS();
	}
	
	public function main() {
		$props = func_get_args();
		$this->addRule(new WingStyleRule("background",implode(" ",$props)));
		return $this->WS();
	}

} ?>