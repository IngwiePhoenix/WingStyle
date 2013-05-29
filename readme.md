# Well, hey there.

WingStyle is a PHP/CSS-Framework ind evelopment. It's syntax is fairly easy:

```PHP
<?php include "WingStyle/WingStyle.php"; ?>
<?=WS("html")
	->background->color("#ffffff")
->end?>
```

Yes, it's a singleton based code. Call WS and supply a selector. If you supply null, it won't do any pretty printing - instead it'll give you the raw CSS - so you can just add a rule on-the-fly if you're using hard-coded CSS till now.

To make your own CSS rule class (don't worry, I'll ad a load more later on - and even a fall-back mode if the class wasnt found!) follow this syntax:

```PHP
<?php class WS_box_shadow extends WingStyleDesigner {

	public function main() {
		$this->addRule(new WingStyleRule("-webkit-box-shadow",implode(" ",func_get_args())));
	}
	
	// Since there are more versions than one of this rule, here is an idea how to do multi-browser rules.

	public function main() {
		$prefixes = array("-webkit-","-moz-","-o-");
		$string = implode(" ", func_get_args()); // This way you get all the args. Its faster than writing the vars yourself =)
		foreach($prefixes as $pf) {
			$rule = $pf."box-shadow";
			$this->addRule(new WingStyleRule($rule,$string));			
		}
	}

} ?>
```

Then place the file into the classes folder of WingStyle. Take note of the name - it **MUST** be prefixed with WS_ and end with .php!
After that, you can then access your class like:
```PHP
<?=WS("#content")->box_shadow(...)->end?>
```
...Now really - isn't that much smaller than writing:
```CSS
#content {
	-webkit-box-shadow: ...;
	-moz-box-shadow: ...;
	-o-box-shadow: ...;
	box-shadow: ...;
}
```
Thus, you can use variables.

Oh yeah, variables...

You can change a special set of variables to influence how WS outputs the code:

_string_ WS()->seperator

-> If you dont supply a selector, you can choose how the produced CSS is seperated. Defaults to a space.

_string_ WS()->selector

-> Maybe you will want to modify this yourself, who knows.

_bool_ WS()->beauty

-> If the code should be tabbed or not.


Check out the source code and the provided classes - there are a lot more options that I am just too lazy to describe. Once I am not lazy, you'll see a Wiki. For questions, you can use the issues tab or email me :3