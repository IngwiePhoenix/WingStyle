<?php class WS_listStyle extends WingStyleDesigner {

	public function init() {
		WS()->addDefs(array(
			"armenian"				=>"armenian",
			"circle"				=>"circle",
			"cjk_ideographic"		=>"cjk-ideographic",
			"decimal"				=>"decimal",
			"decimal_leading_zero"	=>"decimal-leading-zero",
			"disc"					=>"disc",
			"georgian"				=>"georgian",
			"hebrew"				=>"hebrew",
			"hiragana"				=>"hiragana",
			"hiragana_iroha"		=>"hiragana-iroha",
			"katakana"				=>"katakana",
			"katakana_iroha"		=>"katakana-iroha",
			"lower_alpha"			=>"lower-alpha",
			"lower_greek"			=>"lower-greek",
			"lower_latin"			=>"lower-latin",
			"lower_roman"			=>"lower-roman",
			"square"				=>"square",
			"upper_alpha"			=>"upper-alpha",
			"upper_latin"			=>"upper-latin",
			"upper_roman"			=>"upper-roman"
		));
	}

	public function main() {
		$this->addRule(new WingStyleRule( "list-style", $this->format(func_get_args()) ));
  		return WS();
 	}

	private function _ls($p, $t) {
		$this->addRule(new WingStyleRule( "list-style-".$p, $t ));
  		return WS();
 	}
 	
 	public function type($p) { return $this->_ls("type", $p); }
 	public function position($p) { return $this->_ls("position", $p); }
 	public function image($p) { return $this->_ls("image", 'url("'.$p.'")'); }

} ?>
