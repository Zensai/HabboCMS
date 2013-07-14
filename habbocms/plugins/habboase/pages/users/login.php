<?php
	$id = false;
	if(isset($_POST['username'])) {
		$username = usernameFilter($_POST['username']);
		$id = $users->username2id($username);
		if(!$id) echo '<div class="message error close"><h2>Oops!</h2><p>That user does not exists.</p></div>';
	}

 	if($id) {
 		$core->createLog('Logged in as ' . $username, '', 3);
	 	$sso = $users->updateSSO($id);
		$users->update_last_ip($id, $_SERVER['REMOTE_ADDR']);
		echo '<div class="message success close"><h2>Success!</h2><p>That user does not exists.</p></div>';
		echo "<a href='" . WWW . "/client?loginas=" . $sso . "' target='_new'>Click here to login as " . $username . " (new window)</a><br><br>";
 	}
?>
<h1>Login as user</h1>
<form action="" method="POST">
Username: <input type="text" name="username"> <input type="submit" value="Create session">
</form>