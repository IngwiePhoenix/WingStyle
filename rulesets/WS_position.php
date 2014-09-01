<?php class WS_position extends WingStyleDesigner {

    public function init() {
        WS()->addDefs("relative", "absolute", "fixed");
    }

    public function main($pos) {
        $this->addRule(new WingStyleRule("position", $this->format($pos)));
        return WS();
    }

} ?>
