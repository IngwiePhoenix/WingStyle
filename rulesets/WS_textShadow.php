<?php class WS_textShadow extends WingStyleDesigner {

	public function main() { // args: $hshadow, $vshadow, $blur, $color
  		$this->addRule(new WingStyleRule("text-shadow",implode(" ",func_get_args())));
  		return WS();
 	}

} ?>
