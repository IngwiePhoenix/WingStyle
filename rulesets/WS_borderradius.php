<?php class WS_borderRadius extends WingStyleDesigner {

	// enable sub-level chaining. I.e.: WS(...)->borderRadius->topLeft(...)->end
	public function getFile() {return __FILE__;}

	public function main() {
		$string = implode(" ", func_get_args());
		$brands = $this->brands;
		foreach($brands as $b) {
			$this->addRule(new WingStyleRule($b."border-radius",$string));
		}
		return $this->WS();
	}

} ?>