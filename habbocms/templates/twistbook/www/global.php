<?php
	if(PAGE == 'global') die();

	new HabboTranslator('general,footer,stream,navigator');

	class TwistBook {
		function __construct() {
			global $html;

			$html->addKey(array(
				'styleset' => ''
			));
		}

		public function styleset($style) {
			global $html;
			switch($style) {
				case 'register':
					$html->addKey('styleset', '<meta name="copyright" content="Twistbook PHP"><link rel="shortcut icon" href="' . WEBGALLERY . 'general/favicon.ico" type="image/vnd.microsoft.icon"><link rel="stylesheet" href="' . WEBGALLERY . 'styles/css/style.php?type=register" type="text/css"><script class="noDelete" type="text/javascript" src="' . WEBGALLERY . 'styles/js/js.php?type=register"></script><script class="noDelete" type="text/javascript">function onKeyDown() { var pressedKey = String.fromCharCode(event.keyCode).toLowerCase(); if (event.ctrlKey && (pressedKey == "u" || pressedKey == "s")) { event.returnValue = false; } } $(document).bind("contextmenu",function(e){ return false; }); </script>');
				break;

				default:
					$html->addKey('styleset', '<meta name="copyright" content="Twistbook PHP"><link rel="shortcut icon" href="' . WEBGALLERY . 'general/favicon.ico" type="image/vnd.microsoft.icon"><link rel="stylesheet" href="' . WEBGALLERY . 'styles/css/style.php?type=general" type="text/css"><script class="noDelete" type="text/javascript" src="' . WEBGALLERY . 'ckeditor/ckeditor.js"></script><script class="noDelete" type="text/javascript" src="' . WEBGALLERY . 'styles/js/js.php?type=general"></script><script class="noDelete" src="' . WEBGALLERY . 'styles/js/cufon-yui.js" type="text/javascript"></script><script class="noDelete" src="' . WEBGALLERY . 'styles/js/ubuntu.font.js" type="text/javascript"></script><script class="noDelete" type="text/javascript">Cufon.replace("ubuntu"); function onKeyDown() { var pressedKey = String.fromCharCode(event.keyCode).toLowerCase(); if (event.ctrlKey && (pressedKey == "u" || pressedKey == "s")) { event.returnValue = false; } } $(document).bind("contextmenu",function(e){ return false; }); </script>');
				break;
			}

			if(!defined('IGNORE_THEME')) $html->addKey('styleset', '<style type=\'text/css\' class=\'themeSwitcher\'> html { background: url(' . WEBGALLERY . 'themes/' . THEME . '/second_background.gif) #D9D9D9 repeat fixed; } body { background-image: url(' . WEBGALLERY . 'themes/' . THEME . '/background.png); } </style>', true);
		}

		public function install($pagetitle, $styleset, $navigator = false) {
			$this->add_key('pagetitle', $pagetitle);
			$this->styleset($styleset);
			$this->widget('header');
			if($navigator) $this->widget(((!LOGGEDIN)?'off_':'') . 'navigator');
		}

		public function includes($file, $include = false) {
			$path = P . 'www/includes/' . $file;
			if(file_exists($path)) {
				if($include) {
					include $path;
				} else return $path;
			} else error('Called file from includes folder (' . $file . ') but the file does not exists.', 'E_WARNING');
		}
	}

	$skin = new TwistBook;
?>