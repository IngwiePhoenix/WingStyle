<?php class WS_color extends WingStyleDesigner {

    public function getFile() {return __FILE__;}

    public function rgba($c) {
        $this->addRule(new WingStyleRule("color","rgba(".$this->format($c).")"));
        return WS();
    }

    public function main($c) {
        $this->addRule(new WingStyleRule("color",$c));
        return WS();
    }
}
