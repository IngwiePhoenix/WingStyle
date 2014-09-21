<?php class WS_border_top extends WingStyleDesigner {

    public function getFile() {return __FILE__;}

    public function color($c) {
        $this->addRule(new WingStyleRule("border-top-color",$c));
        return WS();
    }

    public function style($c) {
        $this->addRule(new WingStyleRule("border-top-style", $this->format($c)));
        return WS();
    }

    public function main() {
        $props = $this->format(func_get_args());
        $this->addRule(new WingStyleRule("border-top",$props));
        return WS();
    }
} ?>
