<?php class WS_borderRadius_top extends WingStyleDesigner {

	public function left($rad) {
		$rules = array( "-webkit-border-top-left-radius", "-moz-border-radius-topleft", "border-top-left-radius" );
		foreach($rules as $r) $this->addRule(new WingStyleRule($r,$rad));
		return $this->WS();
	}
	public function right() {
		$rules = array( "-webkit-border-top-right-radius", "-moz-border-radius-topright", "border-top-right-radius" );
		foreach($rules as $r) $this->addRule(new WingStyleRule($r,$rad));
		return $this->WS();
	}

} ?>