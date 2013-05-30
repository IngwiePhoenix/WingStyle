<?php class WS_boxShadow extends WingStyleDesigner {
	
	public function main() {
		$props = implode(" ", func_get_args());
		$brands = array( "moz", "o", "webkit", "khtml" );
		foreach($brands as $b) {
			$this->addRule(new WingStyleRule("-".$b."-box-shadow",$props));			
		}
		$this->addRule(new WingStyleRule("box-shadow",$props));			
		return $this->WS();
	}

} ?>