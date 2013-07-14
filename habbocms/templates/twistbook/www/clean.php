<?php
	echo "hi";
	session_destroy();
	unset($_COOKIE);
	redirect('/index');
?>