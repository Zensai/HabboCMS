<?php
	defined('IN_INDEX') or die();

	function sqlFilter($str) {
		return mysql_real_escape_string(stripslashes(htmlspecialchars($str)));
	}

	function usernameFilter($str) {
		return preg_replace("/[^A-Za-z0-9?!.\-=:_]+/", "", $str);
	}

	function validUsername($str) {
		return !preg_match('/[^A-Za-z0-9!?@.\-=:_]/', $str);
	}

	function emailFilter($str) {
		return preg_replace("/[^A-Za-z0-9@_\.-]+/", "", $str);
	}

	function validEmail($str) {
		return preg_match("/^[a-z0-9_\.-]+@([a-z0-9]+([\-]+[a-z0-9]+)*\.)+[a-z]{2,7}$/i", $str);
	}

	function sessionFilter($str) {
		return preg_replace("/[^A-Za-z0-9\-]+/", "", $str);
	}

	function strictFilter($str) {
		return preg_replace("/[^A-Za-z0-9]+/", "", $str);
	}

	function mottoFilter($str) {
		return preg_replace("/[^A-Za-z0-9?!.\-=:_ ]+/", "", $str);
	}

	function htmlFilter($str) {
		return htmlspecialchars($str, ENT_QUOTES);
	}

	function htmlFilterDecode($str) {
		return htmlspecialchars_decode($str, ENT_QUOTES);
	}

	function commonFilter($str) {
		return sqlFilter($str);
	}

	function nullOne($entry) {
		if($entry == 1) return 1;

		return 0;
	}

	function getBetween($start, $end, $content){
		$r = explode($start, $content);
		if(isset($r[1])){
			$r = explode($end, $r[1]);
			return $r[0];
		}
		
		return false;
	}

	function isWithin($length, $minlength, $maxlength) {
		if($length < $minlength || $length > $maxlength) return false;
		return true; 
	}

	function searchArray($search, $for) {
		if(is_array($search)) {
			foreach($search as $part) {
				if(in_array($part, $for)) return true;
			}
		} else return in_array($search, $for);
	}

	function inString($haystack, $needles=array()) {
		foreach($needles as $needle) {
			if(strpos($haystack, $needle) !== false) return true;
		}

		return false;
	}

	function debug($a) {
		ob_start();
			var_dump($a);
		return ob_get_clean();
	}

	function createLog($type, $message, $log_id = false) {
		if(!$log_id) $log_id = rand(0, 99999999);
		$fp = fopen(P . 'storage/logs/errors/' . $type . '/' . $log_id . '-' . time() . '.txt', 'w');
		if($fp) {
			fwrite($fp, $message);
			fclose($fp);

			if(DEBUG && !defined('IGNORE_DEBUGMSG')) echo "<!-- Logged an unexpected error. Log ID: " . $log_id . " -->";
			return true;
		}

		return false;
	}

	function error($message, $type, $debug = false) {
		$types = array(
			'E_NOTICE' => array('Notice', false),
			'E_WARNING' => array('Warning', false),
			'E_FATAL' => array('Fatal error', true),
			'E_JSON' => array('JSON error', true),
			'E_MYSQL/E_FATAL' => array('MySQL error', true),
			'E_MYSQL/E_WARNING' => array('MySQL warning', false),
			'E_MYSQL/E_NOTICE' => array('MySQL notice', false),
		);

		if(!$debug) $debug = debug_backtrace();
		$debug = debug($debug);
		if(!createLog($type, "Type: $type\nMessage: $message\nDebug:\n\n$debug")) echo "<br />\n<b>Warning</b>: Failed to create log report.<br><br>";

		if(DEBUG && !defined('IGNORE_DEBUGMSG')) echo "<br />\n<b>" . $types[$type][0] . "</b>: " . $message . "<br><br>";
		if($types[$type][1]) exit;
	}


	function readJSON($str, $array = false) {
		$decode = json_decode($str, $array);

		switch(json_last_error()) {
			case JSON_ERROR_NONE:
				return $decode;
			break;

			case JSON_ERROR_SYNTAX:
				error('Syntax error, malformed JSON', 'E_JSON');
			break;

			case JSON_ERROR_DEPTH:
				error('Maximum stack depth exceeded', 'E_JSON');
			break;

			case JSON_ERROR_STATE_MISMATCH:
				error('Underflow or the modes mismatch', 'E_JSON');
			break;
				case JSON_ERROR_CTRL_CHAR:
				error('Unexpected control character found', 'E_JSON');
			break;
			
			case JSON_ERROR_UTF8:
				error('Malformed UTF-8 characters, possibly incorrectly encoded', 'E_JSON');
			break;
			
			default:
				error('Unknown error', 'E_JSON');
			break;
		}

		error('There was a unknown error reading a JSON context, please make sure you have the JSON package installed.', 'E_JSON');
	}

	function redirect($page) {
		header("Location: " . $page);
		exit;
	}