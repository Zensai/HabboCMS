<?php
	//var_dump($server->getClones());
function foo() {
	foreach($GLOBALS as $key => $value) {
		if($key[0] == '_' || $key == 'GLOBALS') continue;
		global $$key;
	}

	echo $core->hash('password');
}

$bar = 'I\'m a bear!';
foo();

?>