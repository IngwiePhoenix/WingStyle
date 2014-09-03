<?php class WS_whiteSpace extends WingStyleDesigner {

    public function getFile() {return __FILE__;}

    public function init() {
        WS()->addDefs(
            "normal", "pre", "nowrap",
            array("preWrap"=>"pre-wrap"),
            array("preLine"=>"pre-line")
        );
    }

    public function main($c) {
        $this->addRule(new WingStyleRule("white-space",$c));
        return WS();
    }
}
