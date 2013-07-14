<?php
	function errorHandler($num, $str, $file, $line, $context = null) {
		exceptionHandler(new ErrorException($str, 0, $num, $file, $line));
	}

	function exceptionHandler(Exception $e) {
		ob_clean();

		require P . 'storage/templates/error.php';
		exit;
	}

	function fatalErrorHandler() {
		$errors = array(E_ERROR, E_PARSE);
		$error = error_get_last();
		if(in_array($error["type"], $errors)) {
			errorHandler($error["type"], $error["message"], $error["file"], $error["line"]);
		}

		if(!defined('IGNORE_EXECUTEMSG')) {
			$total_time = round(((microtime(true)) - START_LOAD), 4);
			echo "\n\n<!-- HabboCMS took " . $total_time . " seconds to load.-->";
		}
	}

	error_reporting(E_ALL);
	ini_set("display_errors", 0);
	register_shutdown_function("fatalErrorHandler");
	set_error_handler("errorHandler");
	set_exception_handler("exceptionHandler");