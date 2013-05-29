<?php class WS_background extends WingStyleDesigner {

	public function getRule() { return "background"; }

	public function color($c) {
		$this->addRule(new WingStyleRule("background-color",$c));
		return $this->WS(); #Return the main instance - very important!!!
	}
	
	public function main($color, $url=null, $repeat=null) {
		$props = array($color);
		if(!is_null($url)) $props[] = 'url("'.$url.'")';
		if(!is_null($repeat)) $props[] = $repeat;
		$this->addRule(new WingStyleRule("background",implode(" ",$props)));
		return $this->WS();
	}

} ?>