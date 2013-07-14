<?php
	defined('IN_INDEX') or die();
	class HabboTranslator {
		public $loc = array();
		private $keys = array();

		public function addTranslation($page) {
			global $html, $core;
			$file = $html->path . 'includes/languages/' . $core->settings->language . '.php';
			$sections = explode(',', $page);
			
			require $file;
			foreach($sections as $value) {
				$this->loc = array_merge($this->loc,$$value);

				foreach($$value as $key => $value) {
					$this->keys['{$lang->' . $key . '}'] = $value;
				}
			}
		}

		public function translate($str) {
			return str_replace(array_keys($this->keys), array_values($this->keys), $str);
		}
	}

	$lang = new HabboTranslator;
?>