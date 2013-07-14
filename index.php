<?php
	/* Set when page started to load and tell the script we are inside index */
	define('START_LOAD', microtime(true)); 
	define('IN_INDEX', true);
	define('DEBUG', true);

	/* Internal Information (version etc) */
	define('VERSION', 00001);
	define('PRETTYVERSION', '0.0001');
	define('P', 'C:\\xampp\\htdocs\\habbocms\\');

	/*Install frameworks or other classes/scripts/procedures */
	require P . 'procedures/exceptionHandler.php';
	require P . 'procedures/CloudFlare.php';
	require P . 'procedures/sessionHandler.php';
	require P . 'procedures/installer.php';

	/*Install HabboCMS*/
	if(DEBUG) require P . "debug.php";
	require P . "functions.php";
	require P . "sql.php";
	require P . "cache.php";
	require P . "core.php";
	require P . "translate.php";
	require P . "users.php";
	require P . "plugins.php";
	require P . "template.php";
	if($html->settings->global) require $html->path . $html->settings->global;

	/*Prepare and print output*/
	require P . "procedures/fileDetector.php";
	require P . "procedures/printOutput.php";
?>