<?php
	$page = substr(explode('?', $_SERVER["REQUEST_URI"])[0], 1);
	if($page == '') $page = 'index';
	define('PAGE', $page);