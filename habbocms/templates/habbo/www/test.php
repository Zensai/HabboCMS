<?php
	$userid = 1;
	$userinfo = $server->getUserData('*', $userid)[$userid];

	var_dump($userinfo);
?>