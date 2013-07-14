<?php
	defined('IN_INDEX') or die();
	class HabboTemplate {
		public $path = false;
		public $file = false;
		public $settings = false;
		protected $keys = array(
			'www' => WWW,
			'build' => VERSION,
			'sitename' => SITENAME,
			'fullname' => FULLNAME,
			'gordon' => GORDON,
			'cache_token' => CACHE_TOKEN
		);

		function __construct() {
			global $core, $cache, $users;

			$this->path = P . 'templates/' . SKIN . '/';

			$settings = @file_get_contents($this->path . 'settings.json');
			if(!$settings) error('Could not get skin settings for the template <b>' . SKIN . '</b> <i>(' . $this->path . 'settings.json)</i> please make sure that it exists and HabboCMS has permission to read it.', 'E_FATAL');
			$settings = readJSON($settings, true);

			/*Read MySQL settings for theme*/
			$skinsettings = readJSON($cache->openCache('habbocms_skinsettings.json'), true);
			if(!$skinsettings) {
				$skinsettings = $cache->cacheSkinSettings();
			}

			$this->settings = (object) array_merge($settings, $skinsettings);
			$this->setKey(array(
				'username' => (LOGGEDIN)?$users->data('username'):'null',
				'onlinecnt' => $core->usersOnline(),
				'hotel_twitter' => $core->settings->twitter,
				'recaptcha' => $core->settings->recaptcha,
				'session_token' => (LOGGEDIN)?$users->readSession('token'):'0'
			));
		}

		public function setKey($key, $value = false, $continue = false) {
			if(is_array($key)) {
				$this->keys = array_merge($this->keys,$key);
				return;
			}

			if($continue && isset($this->keys[$key])) $this->keys[$key] .= $value; else $this->keys[$key] = $value;
		}

		public function filterString($str) {
			$keys = array();
			$values = array();

			foreach($this->keys as $key => $value) {
				$keys[] = '{' . $key . '}';
				$values[] = $value;
			}

			return str_replace($keys, $values, $str);
		}
	}

	$html = new HabboTemplate;