<?php
	defined('IN_INDEX') or die();
	class HabboUsers {
		public $isBanned = false;

		function __construct() {
			if(LOGGEDIN) {
				//var_dump($_SESSION['habbo_identity']);
				//exit;
				//check session timer
				//check for ban
			}
		}

		public function handleLogin($username, $password, $howlong) {
			global $server;
			$response = $server->validateLogin($username, $password);
			if($response) {
				$banned = $server->isBanned($response['username']);
				if(!$banned) {
					$this->createSession($response['id'], $howlong);

					$_SESSION['habbo_identity'] = $response;
					return true;
				} else {
					$this->isBanned = $banned;
				}
			}

			return false;
		}

		public function refreshIdentity() {
			global $server;
			$_SESSION['habbo_identity'] = $server->getUserData('*', $this->data('id'));
		}

		public function createSession($identity, $howlong) {
			global $core, $server;

			$token = $core->generateToken($identity);
			$session = array(
				'identity' => $identity,
				'token' => $token,
				'ip' => $_SERVER['REMOTE_ADDR'],
				'time' => time(),
				'last_activity_time' => time(),
				'duration' => $howlong
			);

			$_SESSION['habbo_session'] = $session;
		}

		public function readSession($what) {
			return $_SESSION['habbo_session'][$what];
		}

		public function updateSession() {

		}

		public function destroySession() {
			unset($_SESSION['habbo_identity'], $_SESSION['habbo_session']);
		}

		public function data($what, $id = false) {
			global $server;
			if(!$id) {
				if($what == '*') {
					return $_SESSION['habbo_identity'];
				} else {
					return $_SESSION['habbo_identity'][$what];
				}
			}

			$result = $server->getUserData($what, $id);

			if(count($result) == 1) {
				return $result[$id];
			}

			return $server->getUserData($what, $id);
		}

		public function updateSSO($id = 'n/a') {
			global $core, $sql;
			if($id == 'n/a') $id = IDENTITY;
			$ticket = $core->token($id);

			$result = $sql->query("UPDATE users SET auth_ticket = '" . $ticket . "' WHERE id = '" . $id . "'");
			if($result) return $ticket;

			$core->error('Error updating SSO.', 'E_FATAL');
		}

		public function update_last_ip($id = 'n/a', $ip = 'n/a') {
			global $core, $sql;
			if($id == 'n/a') $id = IDENTITY;
			if($ip == 'n/a') $ip = $_SERVER['REMOTE_ADDR'];

			$result = $sql->query("UPDATE users SET ip_last = '" . $ip . "' WHERE id = '" . $id . "'");
			if($result) return true;

			$core->error('Error updating last_ip.', 'E_FATAL');
		}

		public function findFacebookUser($facebook_id) {
			global $sql;
			$query = "SELECT user_id FROM habbocms_facebook WHERE facebook_id = '" . $facebook_id . "' LIMIT 1";
			if($sql->count($query) == 1) return $sql->result($query);
			return false;			
		}

		public function avatarimage($structure = array(), $identity = false, $figure = false) {
			unset($structure['figure'], $structure['user']);
			if(!$figure) {
				$figure = $this->data('look', $identity);
			}

			$structure['figure'] = $figure;
			$path = 'http://api.perk.pw/imaging/avatarimage?'.http_build_query($structure);
			return $path;
		}
	}

	$users = new HabboUsers;