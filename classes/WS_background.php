<?php class WS_background extends WingStyleDesigner {

	public function color($c) {
		$this->addRule(new WingStyleRule("background-color",$c));
		return $this->WS(); #Return the main instance - very important!!!
	}

} ?>