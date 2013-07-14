<?php
	if(!session_id()) session_start();

	if(isset($_SESSION['habbo_identity'], $_SESSION['habbo_session'])) {
		define('LOGGEDIN', true);
	} else {
		define('LOGGEDIN', false);
	}