<?php class WS_commentString extends WingStyleDesigner {

	public function main($txt) { 
		$this->addRule(new WingStyleComment($txt,true));
		return WS();
	}

} ?>