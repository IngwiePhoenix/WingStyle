<?php class WS_borderRadius_bottom extends WingStyleDesigner {

	public function left($rad) {
		$rules = array( "-webkit-border-bottom-left-radius", "-moz-border-radius-bottomleft", "border-bottom-left-radius" );
		foreach($rules as $r) $this->addRule(new WingStyleRule($r,$rad));
		return $this->WS();
	}
	public function right() {
		$rules = array( "-webkit-border-bottom-right-radius", "-moz-border-radius-bottomright", "border-bottom-right-radius" );
		foreach($rules as $r) $this->addRule(new WingStyleRule($r,$rad));
		return $this->WS();
	}

} ?>