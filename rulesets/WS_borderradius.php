
<?php class WS_borderRadius extends WingStyleDesigner {

 public function main($radius, $lefttop=null, $righttop=null, $leftbottom=null, $rightbottom=null) {
  $props = array($radius);
  if(!is_null($lefttop)) $props[] = $lefttop;
  if(!is_null($righttop)) $props[] = $righttop;
  if(!is_null($leftbottom)) $props[] = $leftbottom;
  if(!is_null($rightbottom)) $props[] = $rightbottom;
  if ($lefttop) {
   $brands = array( "-webkit-border-top-left-radius", "-moz-border-radius-topleft", "border-top-left-radius" );
   foreach($brands as $s) $this->addRule(new WingStyleRule($s,$props));
   $this->addRule(new WingStyleRule("border-radius"));
   return $this->WS(); #Return the main instance - very important!!!
  } elseif ($leftbottom) {
   $brands = array( "-webkit-border-bottom-left-radius", "-moz-border-radius-bottomleft", "border-bottom-left-radius" );
   foreach($brands as $s) $this->addRule(new WingStyleRule($s,$props));
   $this->addRule(new WingStyleRule("border-radius"));
   return $this->WS(); #Return the main instance - very important!!!
  } elseif ($righttop) {
   $brands = array( "-webkit-border-top-right-radius", "-moz-border-radius-topright", "border-top-right-radius" );
   foreach($brands as $s) $this->addRule(new WingStyleRule($s,$props));
   $this->addRule(new WingStyleRule("border-radius"));
   return $this->WS(); #Return the main instance - very important!!!
  } elseif ($rightbottom) {
   $brands = array( "-webkit-border-bottom-right-radius", "-moz-border-radius-bottomright", "border-bottom-right-radius" );
   foreach($brands as $s) $this->addRule(new WingStyleRule($s,$props));
   $this->addRule(new WingStyleRule("border-radius"));
   return $this->WS(); #Return the main instance - very important!!!
  } else {
   $brands = array( "border", "-moz-border", "-webkit-border" );
   foreach($brands as $b) {
    $this->addRule(new WingStyleRule($b."-radius",$props));
   }
   $this->addRule(new WingStyleRule("border-radius",$props));
  }

}

}
?>