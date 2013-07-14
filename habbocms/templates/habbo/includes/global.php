<?php
	class defaultTheme {
		function __construct() {
			global $html, $lang;
			define('WEBGALLERY', $html->settings->webgallery);

			$html->setKey(array(
				'webgallery' => WEBGALLERY,
				'extra' => '',
				'body_extra' => ''
			));

			$lang->addTranslation('general');
		}

		public function widget($widget) {
			global $html;

			return $html->path . 'includes/widgets/' . $widget . '.php';

			$widget_path = P . 'www/widgets/' . $widget . '.php';
			if(!file_exists($widget_path)) error('Skin widget <b>' . $widget . '</b> <i>(' . $widget_path . ')</i> was called but does not exists.', 'E_WARNING');
			
			ob_start();
				require $widget_path;
			$content = $this->filterKeys(ob_get_clean());

			echo $content;
		}

		public function styleset($stylesheet) {
			global $html;

			$this->add_style(WEBGALLERY . 'favicon.ico', 'fav');
			$html->setKey('pageset', "	<link rel='alternate' type='application/rss+xml' title='" . SITENAME . " Hotel - RSS' href='" . WWW . "/articles/rss.xml' />", true);
			$html->setKey('pageset', "\n\n\n", true);

			switch($stylesheet) {
				case "frontpage":
					$this->add_style(WEBGALLERY . 'static/styles/frontpage.css', 'css');
					$this->add_style(WEBGALLERY . 'static/js/libs2.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/landing.js', 'js');
				break;

				case "me":
					$this->add_style(WEBGALLERY . 'static/styles/common.css', 'css');
					$this->add_style(WEBGALLERY . 'static/js/libs2.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/visual.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/libs.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/common.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/fullcontent.js', 'js');
					//$this->add_style(WEBGALLERY . 'local/com.css', 'css');
					$this->add_style(WEBGALLERY . 'static/styles/lightweightmepage.css', 'css');
					$this->add_style(WEBGALLERY . 'static/js/lightweightmepage.js', 'js');
				break;
			 
				case "logout":
					$this->add_style(WEBGALLERY . 'static/styles/common.css', 'css');
					$this->add_style(WEBGALLERY . 'static/styles/process.css', 'css');
					$this->add_style(WEBGALLERY . 'static/js/libs2.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/visual.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/libs.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/common.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/fullcontent.js', 'js');
				break;
 
				case "credits":
					$this->add_style(WEBGALLERY . 'static/styles/common.css', 'css');
					$this->add_style(WEBGALLERY . 'static/js/libs2.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/visual.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/libs.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/common.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/fullcontent.js', 'js');
					//$this->add_style(WEBGALLERY . 'local/com.css', 'css');
					$this->add_style(WEBGALLERY . 'static/styles/cbs2credits.css', 'css');
					$this->add_style(WEBGALLERY . 'static/styles/newcredits.css', 'css');
					$this->add_style(WEBGALLERY . 'static/js/cbs2credits.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/newcredits.js', 'js');
				break;
			 
				case "freecredits":
					$this->add_style(WEBGALLERY . 'static/styles/common.css', 'css');
					$this->add_style(WEBGALLERY . 'static/js/libs2.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/visual.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/libs.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/common.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/fullcontent.js', 'js');
					//$this->add_style(WEBGALLERY . 'local/com.css', 'css');
					$this->add_style(WEBGALLERY . 'static/styles/cbs2credits.css', 'css');
				break;

				case "checkout":
					$this->add_style(WEBGALLERY . 'static/js/visual.js', 'js');
					$this->add_style(WEBGALLERY . 'static/styles/cbs2creditsflow.css', 'css');
				break;

				case "client":
				case "disconnected":
					$this->add_style(WEBGALLERY . 'static/styles/common.css', 'css');
					$this->add_style(WEBGALLERY . 'static/js/libs2.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/visual.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/libs.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/common.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/fullcontent.js', 'js');
					//$this->add_style(WEBGALLERY . 'local/com.css', 'css');
 
					$this->add_style(WEBGALLERY . 'static/styles/habboflashclient.css', 'css');
					$this->add_style(WEBGALLERY . 'static/js/habboflashclient.js', 'js');
				break;
			 
				case "login_popup":
					$this->add_style(WEBGALLERY . 'static/styles/common.css', 'css');
					$this->add_style(WEBGALLERY . 'static/styles/process.css', 'css');
					$this->add_style(WEBGALLERY . 'static/js/libs2.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/visual.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/libs.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/common.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/fullcontent.js', 'js');
					//$this->add_style(WEBGALLERY . 'local/com.css', 'css');
				break;

				case "register":
				default:
					$this->add_style(WEBGALLERY . 'static/styles/common.css', 'css');
					$this->add_style(WEBGALLERY . 'static/js/libs2.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/visual.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/libs.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/common.js', 'js');
 
					$this->add_style(WEBGALLERY . 'static/styles/quickregister.css', 'css');
					$this->add_style(WEBGALLERY . 'static/js/quickregister.js', 'js');
				break;

				case "faq":
					$this->add_style(WEBGALLERY . 'static/styles/common.css', 'css');
					$this->add_style(WEBGALLERY . 'static/js/visual.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/libs2.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/libs.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/common.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/fullcontent.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/faq.js', 'js');
				break;

				case "profile":
					$this->add_style(WEBGALLERY . 'static/styles/common.css', 'css');
					$this->add_style(WEBGALLERY . 'static/js/libs2.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/visual.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/libs.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/common.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/fullcontent.js', 'js');
					//$this->add_style(WEBGALLERY . 'local/com.css', 'css');
					$this->add_style(WEBGALLERY . 'static/styles/settings.css', 'css');
					$this->add_style(WEBGALLERY . 'static/js/settings.js', 'js');
				break;

				case "identity":
					$this->add_style(WEBGALLERY . 'static/styles/embed.css', 'css');
					$this->add_style(WEBGALLERY . 'static/js/embed.js', 'js');

					$this->add_style(WEBGALLERY . 'static/styles/common.css', 'css');
					$this->add_style(WEBGALLERY . 'static/styles/embeddedregistration.css', 'css');
					$this->add_style(WEBGALLERY . 'static/styles/identitysettings.css', 'css');
				break;

				case "avatars":
					$this->add_style(WEBGALLERY . 'static/styles/embed.css', 'css');
					$this->add_style(WEBGALLERY . 'static/js/embed.js', 'js');

					$this->add_style(WEBGALLERY . 'static/styles/common.css', 'css');
					$this->add_style(WEBGALLERY . 'static/styles/avatarselection.css', 'css');
				break;

				case "homes":
					$this->add_style(WEBGALLERY . 'static/styles/common.css', 'css');
					$this->add_style(WEBGALLERY . 'static/js/libs2.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/visual.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/libs.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/common.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/fullcontent.js', 'js');

					$this->add_style(WEBGALLERY . 'static/styles/home.css', 'css');
					$this->add_style(WEBGALLERY . 'myhabbo/styles/assets/other.css', 'css');
					$this->add_style(WEBGALLERY . 'myhabbo/styles/assets/backgrounds.css', 'css');
					$this->add_style(WEBGALLERY . 'myhabbo/styles/assets/stickers.css', 'css');

					$this->add_style(WEBGALLERY . 'static/js/homeview.js', 'js');
					$this->add_style(WEBGALLERY . 'static/styles/lightwindow.css', 'css');
					$this->add_style(WEBGALLERY . 'static/js/homeauth.js', 'js');
					$this->add_style(WEBGALLERY . 'static/styles/group.css', 'css');				
				break; 

				case "general":
				default:
					$this->add_style(WEBGALLERY . 'static/styles/common.css', 'css');
					$this->add_style(WEBGALLERY . 'static/js/libs2.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/visual.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/libs.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/common.js', 'js');
					$this->add_style(WEBGALLERY . 'static/js/fullcontent.js', 'js');
					//$this->add_style(WEBGALLERY . 'local/com.css', 'css');
				break;


			}
			//$this->add_style(WEBGALLERY . 'cdn.optimizely.com/js/13389159.js', 'js');
		}

		public function add_style($value, $type = "css") {
			global $html;
			switch($type) {
				case "fav":
					$html->setKey('pageset', "	<link rel='shortcut icon' href='" . $value . "' type='image/vnd.microsoft.icon' />\n", true); return true;
				break;

				case "js":
					$html->setKey('pageset', "	<script src='" . $value . "' type='text/javascript'></script>\n", true); return true;
				break;

				default:
					$html->setKey('pageset', "	<link rel='stylesheet' href='" . $value . "' type='text/css' />\n", true); return true;
				break;
			}
			return false;
		}

		public function install($pagetitle, $styleset, $navigator = false) {
			global $core, $html, $cache, $lang;
			$html->setKey('pagetitle', $pagetitle);
			$this->styleset($styleset);
			require $this->widget('header');
			if($navigator) require $this->widget(((!LOGGEDIN)?'off_':'') . 'navigator');
		}

		public function buildFooter() {
			global $cache;
			$footer = array();
			
			$navigator = readJSON($cache->openCache('habbocms_navi.json'), true);
			if(!$navigator) {
				$navigator = $cache->cacheNavigator();
			}
			
			$result = array_filter($navigator, function($v) { return $v['active'] == 4;});
			foreach($result as $array) {
				$footer[] = '<a href="' . $array["link"] . '"' . ((!empty($array['class_id']))?' id="' . $array['class_id'] . '"':'') . ((!empty($array['target']))?' target="' . $array['target'] . '"':'') . ((!empty($array['class']))?' class="' . $array['class'] . '"':'') . '>' . $array["value"] . '</a>';
			}

			return $footer;
		}
	}

	$skin = new defaultTheme;
?>