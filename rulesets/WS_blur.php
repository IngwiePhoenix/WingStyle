<?php class WS_blur extends WingStyleDesigner {

    public function main($d) {
        foreach($this->brands as $brand)
            WS()->addRule(new WingStyleRule($brand."filter", "blur(".$this->format($d).")"));
        return WS();
    }

} ?>
