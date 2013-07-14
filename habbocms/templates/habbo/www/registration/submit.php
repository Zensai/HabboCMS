<?php
	$lang->addTranslation('registererrors');
	header("Content-type: application/json");
	define('IGNORE_EXECUTEMSG', true);
	if(LOGGEDIN) die();
	
	if(isset($_POST['registrationBean_month'], $_POST['registrationBean_day'], $_POST['registrationBean_year'], $_POST['registrationBean_email'], $_POST['registrationBean_password'], $_POST['recaptcha_challenge_field'], $_POST['recaptcha_response_field'])) {
		
		require P . "thirdparty/recaptcha/recaptchalib.php";

		$banned = $server->isBanned();
		if($banned) {
			$_SESSION['login_banned'] = $banned;
			$_SESSION['login_error_msg'] = '{$lang->loginerrors.banned}';

			$redirect = str_replace('/', '\/', WWW . '/');
			echo '{"registrationCompletionRedirectUrl":"' . $redirect . '"}';
			exit;
		}

		$error = array();
		$month = $_POST['registrationBean_month'];
		$day = $_POST['registrationBean_day'];
		$year = $_POST['registrationBean_year'];
		$email = $_POST['registrationBean_email'];
		$password = $_POST['registrationBean_password'];
		$verify = recaptcha_check_answer($core->settings->recaptcha_secret, $_SERVER['REMOTE_ADDR'], $_POST['recaptcha_challenge_field'], $_POST['recaptcha_response_field']);

		if(!is_numeric($month) || !is_numeric($day) || !is_numeric($year) || !isWithin($month, 1, 12) || !isWithin($day, 1, 31) || !isWithin($year, 1900, date("Y"))) $error['registration_birthday_format'] = '{$lang->registererrors.enter_birthday}';
		if(!validEmail($email)) $error['registration_email'] = '{$lang->registererrors.email_invalid}'; elseif($sql->count("SELECT * FROM users WHERE mail = '" . emailFilter($email) . "' LIMIT 1") == 1) $error['registration_email'] = '{$lang->registererrors.email_allready_inuse}';
		if($password == '') $error['registration_password'] = '{$lang->registererrors.enter_password}';
		if(!isWithin(strlen($password), 6, 32)) $error['registration_password'] = '{$lang->registererrors.password_wronglength}';
		if(!isset($_POST['registrationBean_termsOfServiceSelection'])) $error['registration_termsofservice'] = '{$lang->registererrors.tos}';
		if(!$verify->is_valid) $error['registration_captcha'] = '{$lang->registererrors.captcha}';
		if(empty($error)) {
			/*Find avaible username*/
			$i = 1;
			$username = strstr($email, '@', true);
			while($server->identifyUser($username)) {
				$username = strstr($email, '@', true) . $i;
				$i++;
			}

			$result = $server->createUser($username, $core->hash($password), $email, $core->settings->start_rank, $core->settings->start_credits, $core->settings->start_points, $core->settings->start_pixels, $core->settings->start_figure, $core->settings->start_motto, $_SERVER['REMOTE_ADDR'], $_SERVER['REMOTE_ADDR'], $core->settings->start_homeroom, 0);
			if(!$result) {
				$debug = debug($server->errors);
				error('Erroring creating new user. DEBUG: ' . $debug, 'E_FATAL');
			}

			$session = $users->createSession($result);

			$_SESSION['habbo_identity'] = $result;
			$_SESSION['habbo_session_token'] = $session;

			$redirect = str_replace('/', '\/', WWW . '/client');
			echo '{"registrationCompletionRedirectUrl":"' . $redirect . '"}';
			exit;
		}

		
		echo '{"registrationErrors":' . json_encode($error) . '}';
	} else {
		echo '{"registrationErrors":{}}';
	}
?>