<?php
//sleep(5);
header("Content-type: text/plain");
define('IGNORE_EXECUTEMSG', true);
echo '1';
exit;
	if(isset($_POST['username'], $_POST['password'])){
		$username = usernameFilter($_POST['username']);
		$password = $core->hash($_POST['password']);

		$user = $identity->username2id($username);
		if($user) {
			$user_password = $identity->data('password', $user);
			if($password == $user_password) {
				die("2");
			} else die("1");
		}

		die("0");
	}
?>