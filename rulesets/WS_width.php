<?php class WS_width extends WingStyleDesigner {

	public function main($w) { WS()->debug("Testing.");
		$this->addRule(new WingStyleRule("width", $this->format($w)));
  		return WS();
 	}

} ?>
