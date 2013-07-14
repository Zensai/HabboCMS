<?php
	$lang->addTranslation('general,footer,stream,navigator');

	class TwistBook {
		function __construct() {
			global $html;

			$html->setKey(array(
				'styleset' => '',
				'extra' => '',
				'body_extra' => '',
				'webgallery' => $html->settings->webgallery,
				'local_twistbook_webgallery' => $html->settings->local_twistbook_webgallery,
			));
		}

		public function widget($widget) {
			global $html;

			return $html->path . 'includes/widgets/' . $widget . '.php';
		}

		public function styleset($style) {
			global $html;
			switch($style) {
				case 'register':
					$html->setKey('styleset', '<meta name="copyright" content="Twistbook PHP"><link rel="shortcut icon" href="' . $html->settings->webgallery . 'general/favicon.ico" type="image/vnd.microsoft.icon"><link rel="stylesheet" href="' . $html->settings->webgallery . 'styles/css/style.php?type=register" type="text/css"><script class="noDelete" type="text/javascript" src="' . $html->settings->webgallery . 'styles/js/js.php?type=register"></script><script class="noDelete" type="text/javascript">function onKeyDown() { var pressedKey = String.fromCharCode(event.keyCode).toLowerCase(); if (event.ctrlKey && (pressedKey == "u" || pressedKey == "s")) { event.returnValue = false; } } $(document).bind("contextmenu",function(e){ return false; }); </script>');
				break;

				case 'general':
				default:
					$html->setKey('styleset', '<meta name="copyright" content="Twistbook PHP"><link rel="shortcut icon" href="' . $html->settings->webgallery . 'general/favicon.ico" type="image/vnd.microsoft.icon"><link rel="stylesheet" href="' . $html->settings->webgallery . 'styles/css/style.php?type=general" type="text/css"><script class="noDelete" type="text/javascript" src="' . $html->settings->webgallery . 'ckeditor/ckeditor.js"></script><script class="noDelete" type="text/javascript" src="' . $html->settings->webgallery . 'styles/js/js.php?type=general"></script><script class="noDelete" src="' . $html->settings->webgallery . 'styles/js/cufon-yui.js" type="text/javascript"></script><script class="noDelete" src="' . $html->settings->webgallery . 'styles/js/ubuntu.font.js" type="text/javascript"></script><script class="noDelete" type="text/javascript">Cufon.replace("ubuntu"); function onKeyDown() { var pressedKey = String.fromCharCode(event.keyCode).toLowerCase(); if (event.ctrlKey && (pressedKey == "u" || pressedKey == "s")) { event.returnValue = false; } } $(document).bind("contextmenu",function(e){ return false; }); </script>');
				break;
			}
		}

		public function install($pagetitle, $styleset, $navigator = true, $themeswitcher = true) {
			global $html;
			$html->setKey('pagetitle', $pagetitle);
			$this->styleset($styleset);
			if($themeswitcher) $html->setKey('styleset', '<style type=\'text/css\' class=\'themeSwitcher\'> html { background: url(' . $html->settings->webgallery . 'themes/' . $html->settings->theme . '/second_background.gif) #D9D9D9 repeat fixed; } body { background-image: url(' . $html->settings->webgallery . 'themes/' . $html->settings->theme . '/background.png); } </style>', true); 
			require $this->widget('header');
			//if($navigator) require $this->widget(((!LOGGEDIN)?'off_':'') . 'navigator');
		}
	}

	$skin = new TwistBook;
?>