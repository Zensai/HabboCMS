<?php
	defined('IN_INDEX') or die();
	class HabboCore {
		public $settings;
		private $permissions;

		function __construct() {
			global $cache;
			$settings = readJSON($cache->openCache('habbocms_settings.json'), true);
			if(!$settings) {
				$settings = $cache->cacheSettings();
			}

			$this->settings = (object) $settings;
			define('SKIN', $this->settings->skin);
			define('WWW', $this->settings->www);
			define('GORDON', $this->settings->gordon);
			define('SITENAME', $this->settings->shortname);
			define('FULLNAME', $this->settings->sitename);
			define('CACHE_TOKEN', $this->settings->cache_token);
		}
		
		public function usersOnline() {
			global $server;

			$users = round($server->countUsersOnline() * 1.5);
			if(!$users & 1 && $users != 0) $users++;
			return $users; 
		}

		public function hash($str) {
			return base64_encode(gzdeflate(strrev(str_replace('%str%', $str, $this->settings->salt))));
		}

		public function generateToken($identity) {
			$token = 'HabboCMS-';
			$token .= md5($this->hash($identity) . time() . rand(1, 9999)) . '-';
			$token .= rand(1, 99999);
			return $token;
		}

		public function timeToDate($timestamp = '', $custom = false) {
			if(!$timestamp) $timestamp = time(); else $timestamp = intval($timestamp);
			if(!$custom) $custom = $this->settings->time_layout;
			
			return date($custom, $timestamp);
		}

		public function timeAgo($timestamp) {
			if(empty($timestamp)) {
				return "N/A";
			}
			
			$periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
			
			$lengths = array("60","60","24","7","4.35","12","10");
			 
			$now = time();
			
			// is it future date or past date
			 
			if($now > $timestamp) {
			 
			$difference = $now - $timestamp;
			 
			$tense = "ago";
			 
			} else {
			 
			$difference = $timestamp - $now;
			$tense = "from now";}
			 
			for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
			 
			$difference /= $lengths[$j];
			 
			}
			 
			$difference = round($difference);
			 
			if($difference != 1) {
			 
			$periods[$j].= "s";
			 
			}
			 
			return "$difference $periods[$j] {$tense}";
		}

		public function timeLeft($timestamp) {
				// Common time periods as an array of arrays
				$periods = array(
						array(60 * 60 * 24 * 365 , 'year'),
						array(60 * 60 * 24 * 30 , 'month'),
						array(60 * 60 * 24 * 7, 'week'),
						array(60 * 60 * 24 , 'day'),
						array(60 * 60 , 'hour'),
						array(60 , 'minute'),
				);
			 
				$today = time();
				$since = $timestamp - $today; // Find the difference of time between now and the future
			 
				// Loop around the periods, starting with the biggest
				for ($i = 0, $j = count($periods); $i < $j; $i++)
						{
						$seconds = $periods[$i][0];
						$name = $periods[$i][1];
					 
						// Find the biggest whole period
						if (($count = floor($since / $seconds)) != 0)
										{
								break;
						}
				}
			 
				$print = ($count == 1) ? '1 '.$name : "$count {$name}s";
			 
				if ($i + 1 < $j)
						{
						// Retrieving the second relevant period
						$seconds2 = $periods[$i + 1][0];
						$name2 = $periods[$i + 1][1];
					 
						// Only show it if it's greater than 0
						if (($count2 = floor(($since - ($seconds * $count)) / $seconds2)) != 0)
										{
								$print .= ($count2 == 1) ? ', 1 '.$name2 : ", $count2 {$name2}s";
						}
				}
				return $print;
		}

		public function requireLogin($page = WWW) {
			if(!LOGGEDIN) {
				header("Location: " . $page);
				exit;
			} 
		}

		public function permission(&$what, $rank = false) {
			global $cache, $users;
			if(empty($what)) {
				error('Parameter $what cannot be empty in HabboCore::permission()', 'E_FATAL');
			}

			if(!LOGGEDIN && !$rank) {
				error('A not logged in guest tried to check if they had permission todo something.', 'E_FATAL');
			}

			if(!$this->permissions) {
				$this->permissions = readJSON($cache->openCache('habbocms_permissions.json'), true);
				if(!$this->permissions) {
					$this->permissions = $cache->cachePermissions();
				}
			}

			/* Set rank if not defined allready */
			if(!$rank) $rank = $users->data('rank');
			//var_dump($this->permissions[$rank]);
			//exit;

			$result = @$this->permissions[$rank][$what];
			if(!is_null($result)) {
				return (bool) $result;
			}

			if(empty($this->permissions[$rank])) error('Rank ' . $rank . ' does not exists.', 'E_FATAL');
			error('Did not find permission field ' . $what . ' with rank ' . $rank, 'E_FATAL');
		}

		public function getURL($url, $timeout = 2) {
			if(function_exists('curl_init')) {
				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
				return curl_exec($ch);
			}
		
			$context = stream_context_create(array('http' => array('timeout' => $timeout)));
			return file_get_contents($url, 0, $context);
		}

		public function installFacebook() {
			if($this->settings->facebook == '0') error("The hotel owner has disabled facebook login/registering.", "E_FATAL");
			require(P . 'thirdparty/Facebook/facebook.php');
			
			return new Facebook(array(
				'appId'	=> $this->settings->facebook,
				'secret' => $this->settings->facebook_secret,
			));
		}

		public function createLog($action, $information, $level = 1, $userid = false) {
			global $sql;
			if(!$userid) $userid = IDENTITY;
			$result = $sql->query("INSERT INTO habbocms_logs (user_id,action,information,time,level) VALUES ('" . intval($userid) . "','" . sqlFilter($action) . "','" . sqlFilter($information) . "','" . time() . "','" . intval($level) . "')");
			if(!$result) {
				error('Error inserting log report into MySQL DB.', 'E_MYSQL/E_WARNING');
				return false;
			}

			return true;
		}

		public function execute($str, $id = false) {
			global $identity, $sql;
			if(!$id) $id = IDENTITY;
			$array = explode(';', $str);
			foreach($array as $cnt => $value) {
				$command = trim(strstr($value, ':', true));
				$parameters = explode('=>', substr(strstr($value, ':', false), 1));

				switch($command) {
					case 'credits':
						$way = 'give';
						if($parameters[0] == 'take') $way = 'take';
						$amount = intval($parameters[1]);
						$balance = $users->data('credits', $id);
						if($way == 'give') $balance = $balance + $amount; elseif($way == 'take') $balance = $balance - $amount;

						$sql->query("UPDATE users SET credits = '" . $balance . "' WHERE id = '" . $id . "'");
						$this->mus('updatecredits', $id);
					break;

					case 'pixels':
						$way = 'give';
						if($parameters[0] == 'take') $way = 'take';
						$amount = intval($parameters[1]);
						$balance = $users->data('activity_points', $id);
						if($way == 'give') $balance = $balance + $amount; elseif($way == 'take') $balance = $balance - $amount;

						$sql->query("UPDATE users SET activity_points = '" . $balance . "' WHERE id = '" . $id . "'");
						$this->mus('updatepixels', $id);
					break;

					case 'points':
						$way = 'give';
						if($parameters[0] == 'take') $way = 'take';
						$amount = intval($parameters[1]);
						$balance = $users->data('vip_points', $id);
						if($way == 'give') $balance = $balance + $amount; elseif($way == 'take') $balance = $balance - $amount;

						$sql->query("UPDATE users SET vip_points = '" . $balance . "' WHERE id = '" . $id . "'");
						$this->mus('updatepoints', $id);
					break;

					case 'rank':
						$rank = intval($parameters[0]);

						$sql->query("UPDATE users SET rank = '" . $rank . "' WHERE id = '" . $id . " LIMIT 1'");
					break;

					case 'vip':
						$vip = $parameters[0];

						$sql->query("UPDATE users SET vip = '" . $vip . "' WHERE id = '" . $id . " LIMIT 1'");
						$this->mus('updatevip', $id);
					break;

					case 'gift':
						$item_id = $parameters[0];
						$amount = $parameters[1];
						$gift_desc = $parameters[2] . "\n\n-" . SITENAME;
						$base_item = $sql->result("SELECT item_ids FROM catalog_items WHERE id = '" . $item_id . "' LIMIT 1");
						$items_id = $sql->result("SELECT id FROM items WHERE id = (SELECT max(id) FROM items)") + 1;

						$sql->query("INSERT INTO items (id,user_id,base_item,extra_data) VALUES ('" . $items_id . "', '" . $id . "', '164', '!" . $gift_desc . "')");
						$sql->query("INSERT INTO user_presents (item_id,base_id,amount,extra_data) VALUES ('" . $items_id . "', '" . $base_item . "', '" . $amount . "', '')");
						$this->mus('update_items', '');
						$this->mus('alert', $id . ' You just recived a gift from Habmi! Please re-log to findout what it is.');
						
						/*if() {
							$this->mus('giveitem', $id . ' ' . $item_id . ' ' . $sql->result("SELECT page_id FROM catalog_items WHERE id = '" . $item_id . "' LIMIT 1") . ' ' . $gift_desc);
						} elseif() {

						}*/

						echo "Lets send a gift to user: $id! The gift will contain $amount x $item_id with the gift description '$gift_desc'\n";
					break;

					case 'createroom':
						$room_name = $parameters[0];
						$room_model = $parameters[1];

						echo "Lets create a room for user: $id! The room name will be '$room_name' and the model will be $room_model.\n";
					break;

					case 'daily_respect':
						$amount = $parameters[0];

						echo "Lets update user: $id's daily respect points to $amount\n";
					break;

					case 'daily_pet_respect':
						$amount = $parameters[0];

						echo "Lets update user: $id's daily pet respect points to $amount\n";
					break;

					case 'respect':
						$way = 'give';
						if($parameters[0] == 'take') $way = 'take';
						$amount = intval($parameters[1]);

						if($way == 'give') {
							echo "Lets give " . $amount . " respect to user: " . $id . "\n";
						} elseif($way == 'take') {
							echo "Lets take " . $amount . " respect from user: " . $id . "\n";
						}
					break;

					case 'achievement_score':
						$way = 'give';
						if($parameters[0] == 'take') $way = 'take';
						$amount = intval($parameters[1]);

						if($way == 'give') {
							echo "Lets give " . $amount . " achievement score to user: " . $id . "\n";
						} elseif($way == 'take') {
							echo "Lets take " . $amount . " achievement score from user: " . $id . "\n";
						}
					break;

					case 'alert':
						$message = trim($parameters[0]);

						$this->mus('alert', $id . ' ' . $message);
					break;

					case 'badge':
						$badge = '';

						echo "Lets give user: $id, the badge: $badge.\n";
					break;

					case 'tag':
						$tag = '';

						echo "Lets give user: $id, the tag: $tag.\n";
					break;

					case 'bots':
						$name = '';
						$motto = '';
						$look = '';

						echo "Lets create a bot for user: $id, with the name '$name', motto '$motto' and look $look\n";
					break;

					case 'bot_speech':
						$bot_id = '';
						$speech = '';

						echo "Lets add a speech to $id's bot: $bot_id saying '$speech'\n";
					break;

					case 'bot_response':
						$bot_id = '';
						$keywords = '';
						$response = '';

						echo "Lets add a response to $id's bot: $bot_id responding '$response' to '$keywords'\n";
					break;

					case 'bot_effect':
						$bot_id = '';
						$effect = '';

						echo "Lets update $id's bot: $bot_id with effect: $effect\n";
					break;

					case 'bot_giveitem':
						$bot_id = '';
						$handitem = '';

						echo "Lets update $id's bot: $bot_id with handitem: $handitem\n";
					break;
					
					default:break;
				}
			}
		}
	}

	$core = new HabboCore;

	/* Install emulator functions */
	if(!@include(P . 'storage/servers/' . $core->settings->server . '.php')) error('Could not read emulator query file <b>' . $core->settings->server . '</b> please make sure that it exists and that HabboCMS has permission to read it.', 'E_FATAL');
?>