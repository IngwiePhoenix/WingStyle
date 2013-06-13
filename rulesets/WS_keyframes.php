<?php class WS_keyframes extends WingStyleDesigner {
	// You don't need an ->end call after this one.
	public function main() {
		$args = func_get_args();
		$name = $args[0];
		unset($args[0]);
		WS()->__reset();
		WS("@keyframes $name");
		foreach($args as $WS) WS()->addTxt($WS);
		$res = WS()->end;
		return $res;
	}
} ?>