<?php class WS_boxShadow extends WingStyleDesigner {
	
	public function main() {
		$props = $this->format(func_get_args());
		$brands = $this->brands;
		foreach($brands as $b) {
			$this->addRule(new WingStyleRule($b."box-shadow",$props));			
		}
		$this->addRule(new WingStyleRule("box-shadow",$props));			
		return WS();
	}

} ?>