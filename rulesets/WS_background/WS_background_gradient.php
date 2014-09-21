<?php class WS_background_gradient extends WingStyleDesigner {

	public function linear($gstart, $gend) {
		$string[] = "-webkit-gradient(linear, left top, left bottom, from($gstart), to($gend))";
		$string[] = "-moz-linear-gradient(top, $gstart, $gend)";
		$IE = "progid:DXImageTransform.Microsoft.gradient(startColorstr='".$gstart."', endColorstr='".$gend."')";
		foreach($string as $s) $this->addRule(new WingStyleRule("background",$s));
		$this->addRule(new WingStyleRule("filter",$IE));
		return WS();
	}

} ?>
