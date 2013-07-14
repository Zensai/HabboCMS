<?php
	session_destroy();
	header("Location: " . WWW . "/index");
	exit;
?>