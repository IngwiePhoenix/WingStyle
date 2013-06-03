<?php class WS_display extends WingStyleDesigner {
	
	public function main($d) {
		$this->addRule(new WingStyleRule("display",$d));
		return $this->WS();
	}

} ?>