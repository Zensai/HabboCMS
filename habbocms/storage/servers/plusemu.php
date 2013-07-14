<?php
	class PlusEmuMUS {
		public static function users_online() {

		}
	}

	class PlusEmu extends HabboMySQL {
		public static $errors = array();

		/* General */
		public function usersOnline($identity_type = 1) {

		}

		public function countUsersOnline() {
			return 0;
			//return $this->result("SELECT users_online FROM server_status");
		}

		/* Users */
		public function doesIdentityExists($identity) {

			$result = $this->count("SELECT COUNT(*) FROM users WHERE id = '" . $identity . "' LIMIT 1");
			if($result) {
				return true;
			}

			return false;
		}

		public function identifyUser($identity) {
			$result = $this->query("SELECT id FROM users WHERE username = '" . usernameFilter($identity) . "' OR mail = '" . emailFilter($identity) . "'");
			if($this->count($result, false)) {
				return $this->result($result, false);
			} 

			return false;
		}

		public function getUserData($what, $identites) {
			$reponse = array();
			$rows = array();
			$allowed_rows = array(
				'id' => 'id',
				'username' => 'username',
				'password' => 'password',
				'real_name' => 'real_name',
				'mail' => 'mail',
				'sso_ticket' => 'auth_ticket',
				'rank' => 'rank',
				'credits' => 'credits',
				'points' => 'vip_points',
				'pixels' => 'activity_points',
				'look' => 'look',
				'gender' => 'gender',
				'motto' => 'motto',
				'last_online' => 'last_online',
				'account_created' => 'account_created',
				'online' => 'online',
				'ip_last' => 'ip_last',
				'ip_reg' => 'ip_reg',
				'home_room' => 'home_room',
				'respect' => 'respect',
				'respect_left' => 'daily_respect_points',
				'petrespect_left' => 'daily_pet_respect_points',
				'newbie_status' => 'newbie_status',
				'muted' => 'is_muted',
				'blocking_requests' => 'block_newfriends',
				'hide_online' => 'hide_online',
				'hide_inroom' => 'hide_inroom',
				'vip' => 'vip',
				'is_expert' => 'is_guide'
			);

			if($what == '*') {
				$rows = array_keys(array_flip($allowed_rows));
			} else {
				$array = explode(',', $what);
				foreach($array as $value) {
					if(!isset($allowed_rows[$value])) {
						error('Did not find translation row for ' . $value . ' in server function getUserData', 'E_WARNING');
						self::$errors[] = 'Did not find translation row for ' . $value . ' in server function getUserData';
						return false;
					} else {
						$rows[] = $allowed_rows[$value];
					}
				}
			}

			$rows = implode(',', $rows);
			if(!is_array($identites)) $identites = explode(',', $identites);
			foreach($identites as $identity) {
				if(!$this->doesIdentityExists($identity)) {
					error('Called for information about a user but it does not exists.', 'E_WARNING');
					self::$errors[] = 'Called for information about a user but the user does not exists.';
					return false;
				}

				$result = $this->fetch("SELECT " . $rows . " FROM users WHERE id = '" . $identity . "' LIMIT 1", true);
				if(count($result) > 1) {
					$return = array();
					$flipped_rows = array_flip($allowed_rows);
					foreach($result as $key => $value) {
						$return[$flipped_rows[$key]] = $value;
					}

					$response[$identity] = $return;
				} else {
					$response[$identity] = $result[$rows];
				}
			}

			return $response;
		}

		public function validateLogin($identity, $password) {
			$userid = $this->identifyUser($identity);
			if($userid) {
				$userinfo = $this->getUserData('*', $userid)[$userid];
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

		public function createUser($username, $password, $mail, $rank, $credits, $vip_points, $activity_points, $look, $motto, $ip_last, $ip_reg, $home_room, $newbie_status) {
			$result = $this->query("INSERT INTO users (username,password,mail,rank,credits,vip_points,activity_points,look,motto,account_created,last_online,ip_last,ip_reg,home_room,newbie_status) VALUES ('" . $username . "', '" . $password . "', '" . $mail . "', '" . $rank . "', '" . $credits . "', '" . $vip_points . "', '" . $activity_points . "', '" . $look . "', '" . $motto . "', '" . time() . "', '" . time() . "', '" . $ip_last . "', '" . $ip_reg . "', '" . $home_room . "', '" . $home_room . "')");
			if(!$result) {
				error('Failed to insert row into users table in server function createUser().', 'E_WARNING');
				self::$errors[] = 'Failed to insert row into users table in createUser(). MySQL error message: ' . mysql_error();
				return false;
			}

			$userid = mysql_insert_id();
			$result = $this->query("INSERT INTO user_info (user_id,reg_timestamp,login_timestamp) VALUES ('" . $userid . "', '" . time() . "', '" . time() . "')");
			if(!$result) {
				error('Failed to insert row into user_info table in server function createUser().', 'E_WARNING');
				self::$errors[] = 'Failed to insert row into user_info table in createUser(). MySQL error message: ' . mysql_error();
				return false;
			}

			$result = $this->query("INSERT INTO user_stats (id) VALUES ('" . $userid . "')");
			if(!$result) {
				error('Failed to insert row into user_stats table in server function createUser()', 'E_WARNING');
				self::$errors[] = 'Failed to insert row into user_stats table in createUser(). MySQL error message: ' . mysql_error();
				return false;
			}

			return $userid;
		}

		public function randomUsers($limit) {
			global $core;
			$users = array();
			$result = $this->query("SELECT id FROM users WHERE look != '" . $core->settings->start_figure . "' ORDER BY RAND() LIMIT " . intval($limit));
			while($row = $this->fetch($result)) {
				$users[] = $row['id'];
			}

			return $this->getUserData('username,motto,account_created,last_online,look,hide_online,online', $users);
		}

		public function getClones($ip = false) {
			global $sql;
			if(!$ip) $ip = $_SERVER['REMOTE_ADDR'];
			$clones = array();

			$result = $sql->query("SELECT id FROM users WHERE ip_last = '" . $ip . "' OR ip_reg = '" . $ip . "'");
			while($row = $sql->fetch($result)) {
				$clones = $row['id'];
			}

			return $this->getUserData('*', $clones);
		}

		public function countClones($ip = false) {
			global $sql;
			if(!$ip) $ip = $_SERVER['REMOTE_ADDR'];

			return $sql->count("SELECT COUNT(*) FROM users WHERE ip_last = '" . $ip . "' OR ip_reg = '" . $ip . "'");			
		}
	}

	$server = new PlusEmu;
?>