<?php class WS_commentString extends WingStyleDesigner {

	public function main($txt) { 
		#$this->addComment($txt);
		$this->addRule(new WingStyleComment($txt,true));
		return $this->WS();
	}

} ?>