<?php
	class Firewind extends HabboMySQL {
		/* Users */
		public function identifyUser($identity) {
			$result = $this->query("SELECT id FROM users WHERE username = '" . usernameFilter($identity) . "' OR mail = '" . emailFilter($identity) . "'");
			if($this->count($result, false)) {
				return $this->result($result, false);
			} else return false;
		}

		public function validateLogin($identity, $password) {
			$result = $this->query("SELECT id,username,password,mail,look,motto FROM users WHERE username = '" . usernameFilter($identity) . "' OR mail = '" . emailFilter($identity) . "'");
			if($this->count($result, false)) {
				$userinfo = $this->fetch($result);
				if($password == $userinfo['password']) {
					return $userinfo;
				} else return false;
			} else return false;
		}

		public function isBanned($identity = false, $ip = false) {
			if(!$ip) $ip = $_SERVER['REMOTE_ADDR'];
			$result = $this->query("SELECT reason,expire FROM bans WHERE expire > UNIX_TIMESTAMP() AND (value = '" . usernameFilter($identity) . "' OR value = '" . sqlFilter($ip) . "') ORDER BY id DESC LIMIT 1");
			if($this->count($result, false)) {
				return $this->fetch($result);
			} else return false;
		}
	}

	$server = new Firewind;
?>