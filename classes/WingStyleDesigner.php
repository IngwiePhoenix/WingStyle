<?php class WingStyleDesigner {
	
	public function WS() { return WingStyle::instance(); }
	public function addRule($obj) { $this->WS()->rules[]=$obj; }

} ?>