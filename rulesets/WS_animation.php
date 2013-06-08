<?php class WS_animation extends WingStyleDesigner {

	public function getFile() { return __FILE__; }

	public function init() {
		WS()->addDefs(
			"infinite", "ease", "linear",
			array("ease_in"=>"ease-in", "ease_out"=>"ease-out", "ease_in_out"=>"ease-in-out"),
			array("step_start"=>"step-start", "step_stop"=>"step-stop")
		);
	}

	public function main() {
		$args = func_get_args();
		if(!is_string($args[1])) $args[1] = $args[1]."s";
		$args = $this->format($args);
		$this->addRule(new WingStyleRule("animation",$args));
		return WS();
	}
	
	public function name($n) {
		foreach(array("-moz-", "-webkit-", null) as $b) $this->addRule(new WingStyleRule($b."animation-name", $n));
		return WS();
	}
	
	public function duration($d) {
		if(!is_string($d)) $d.="s";
		foreach(array("-moz-", "-webkit-", null) as $b) $this->addRule(new WingStyleRule($b."animation-duration", $d));
		return WS();
	}
	
	public function timing() {
		$args = $this->format(func_get_args());
		$this->addRule(new WingStyleRule("animation-timing-function",$args));
		return WS();
	}

} ?>