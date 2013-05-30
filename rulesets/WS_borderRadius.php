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

<<<<<<< HEAD:rulesets/WS_borderradius.php
} ?>
=======
}
?>
>>>>>>> ce8e37dd4841c00c7bbc3d885b9246359618a012:rulesets/WS_borderRadius.php
