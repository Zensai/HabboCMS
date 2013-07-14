<?php	
	if(LOGGEDIN) {
		header("Location: " . WWW . "/me");
		exit;
	}

	if($identity->maxClones()) {
		header("Location: " . WWW . "/index?maxclones");
		exit;
	}

	$goto = explode('/', PAGE)[2];

	if($goto == 'first' && isset($_SESSION['register.dob_day'], $_SESSION['register.dob_month'], $_SESSION['register.dob_year'], $_SESSION['register.gender'])) {
		unset($_SESSION['register.dob_day'], $_SESSION['register.dob_month'], $_SESSION['register.dob_year'], $_SESSION['register.gender']);
		header("Location: " . WWW . "/quickregister/first");
		exit;
	} elseif($goto == 'second' && isset($_SESSION['register.dob_day'], $_SESSION['register.dob_month'], $_SESSION['register.dob_year'], $_SESSION['register.gender'], $_SESSION['register.email'], $_SESSION['register.password'])) {
		unset($_SESSION['register.email'], $_SESSION['register.password']);
		header("Location: " . WWW . "/quickregister/second");
		exit;
	} else {
		die("You're not authorized to do this action.");
	}
?>