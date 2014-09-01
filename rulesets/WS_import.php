<?php class WS_import extends WingStyleDesigner {
	public function main($cssFile) {
		return '@import url("'.$cssFile.'");';
	}
} ?>
