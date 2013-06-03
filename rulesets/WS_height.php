<?php class WS_height extends WingStyleDesigner {

	public function main($h) {
		$this->addRule(new WingStyleRule("height", $this->format($h)));
  		return $this->WS();
 	}

} ?>
