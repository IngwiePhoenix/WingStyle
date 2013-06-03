<?php class WS_display extends WingStyleDesigner {
	
	public function __construct() {
		WS()->addDefs(array(
			"inline" => "inline",
			"block" => "block",
			"inlineBlock" => "inline-block",
		));
	}

	public function main($d) {
		$this->addRule(new WingStyleRule("display",$d));
		return $this->WS();
	}

} ?>