<?php class WS_float extends WingStyleDesigner {

    public function getFile() {return __FILE__;}

    public function init() {
        WS()->addDefs(
            "left", "right"
        );
    }

    public function main($pos) {
        $this->addRule(new WingStyleRule("float",$pos));
        return WS();
    }

} ?>
