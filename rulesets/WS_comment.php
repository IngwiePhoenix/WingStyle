<?php class WS_comment extends WingStyleDesigner {

	public function main($txt) { 
		#$this->addComment($txt);
		$this->addRule(new WingStyleComment($txt));
		return $this->WS();
	}

} ?>