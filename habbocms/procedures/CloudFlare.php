<?php
	if(isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
		$cloudflare = $_SERVER["REMOTE_ADDR"];
		$_SERVER["REMOTE_ADDR"] = $_SERVER["HTTP_CF_CONNECTING_IP"];
	}

	define('CLOUDFLARE', (isset($cloudflare))?$ip:false);