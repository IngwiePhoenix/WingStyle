<?php class WS_text extends WingStyleDesigner {

	public function align($a) {
		$this->addRule(new WingStyleRule("text-align", $this->format($a)));
		return WS();
	}
	
	public function decoration($d) {
		$this->addRule(new WingStyleRule("text-decoration", $this->format($d)));
		return WS();
	}
	
	public function shadow() {
  		$this->addRule(new WingStyleRule("text-shadow",$this->format(func_get_args())));
  		return WS();
	}

} ?>