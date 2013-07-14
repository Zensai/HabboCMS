<?php
	$www = $html->path . 'www/';
	$file = $www . PAGE . '.php';
	if(!file_exists($file)) {
		$map = explode('/', PAGE);
		unset($map[count($map) - 1]);
		$paths = array();
		$temp = '';
		foreach($map as $key => $value) {
			$temp = $temp . $value . '/';
			$paths[] = $temp;
		}

		$paths = array_reverse($paths);
		$paths[] = '';

		foreach($paths as $value) {
			$value = $www . $value . '@.php';
			if(file_exists($value)) {
				$file = $value;
				break;
			}
		}
	}

	$html->file = $file;