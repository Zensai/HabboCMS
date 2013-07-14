<?php
	define('ASE', WWW . '/ASE/');
	define('MEDIA', 'http://images.habmi.com/wideadmin/');
	$array = explode('/', PAGE);
	if($array[0] == 'ASE' && LOGGEDIN && $core->permission('ase_access')) {
		unset($array[0]);
		$page = implode('/', $array);
		if($page == '') $page = 'dash';
		define('ASEPAGE', $page);
		require P . 'plugins/habboase/index.php';
		exit;
	}
?>
