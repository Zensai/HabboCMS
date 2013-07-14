<?php
	$ignoreheader = false;
	$return = WWW . '/' . ((!empty($_POST['page']))?$_POST['page']:'me');

	if(!empty($_POST['credentials_username']) && !empty($_POST['credentials_password'])) {
		$response = $users->handleLogin($_POST['credentials_username'], $core->hash($_POST['credentials_password'], ((isset($_POST['_login_remember_me']))?2678400:3600)));
		if($response) {
			$ignoreheader = true;
			$html->setKey('page', $return);
			require $skin->widget('redirect');
		} else {
			if($users->isBanned) {
				$_SESSION['login_banned'] = $users->isBanned;
				$_SESSION['login_error_msg'] = '{$lang->loginerrors.banned}';
			} else {
				$_SESSION['login_error_msg'] = '{$lang->loginerrors.wrong_password}';
			}
		}
	}

	if(!$ignoreheader) {
		header("Location: " . WWW);
		exit;
	}
	
?>