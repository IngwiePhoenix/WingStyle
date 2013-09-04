<?php class WS_zIndex extends WingStyleDesigner {

	public function main($i) {
		$this->addRule(new WingStyleRule("z-index",$i));
		return WS();
	}

} ?>