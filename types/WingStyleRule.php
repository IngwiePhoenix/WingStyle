<?php class WingStyleRule {

	public $rule;
	public $value;

	public function __construct($r,$v) { $this->rule=$r; $this->value=$v; }

	public function toString($b=false) { return ($b==true?"    ":"").$this->rule.": ".$this->value.";"; }
	public function toBString() { return $this->toString(true); }

} ?>
