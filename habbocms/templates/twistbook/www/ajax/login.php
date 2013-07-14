<?php
	if(isset($_POST['username'], $_POST['password'])){
		$user = $identity->username2id(usernameFilter($_POST['username']));
		$password = $core->hash($_POST['password']);

		if($user) {
			$user_password = $identity->data('password', $user);
			if($user_password == $password) {
				$session = $identity->createSession($user, 3600);
				$_SESSION['habbo_identity'] = $user;
				$_SESSION['habbo_session_token'] = $session;

				die("0");
			}
		}
	}
?>