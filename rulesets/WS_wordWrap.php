<?php class WS_wordWrap extends WingStyleDesigner {

    public function getFile() {return __FILE__;}

    public function init() {
        WS()->addDefs(
            "normal", "initial", "inherit",
            array("breakWord"=>"break-word")
        );
    }

    public function main($c) {
        $this->addRule(new WingStyleRule("word-wrap",$c));
        return WS();
    }
}
