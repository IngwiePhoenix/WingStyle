<?php class WS_textshadow extends WingStyleDesigner {

 public function linear($hshadow, $vshadow, $blur, $color) {
  $this->addRule(new WingStyleRule("text-shadow",implode(" ",func_get_args())));
  return $this->WS(); #Return the main instance - very important!!!
 }

} ?>
