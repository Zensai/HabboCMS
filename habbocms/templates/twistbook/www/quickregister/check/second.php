<?php
	if(LOGGEDIN) {
		header("Location: " . WWW . "/me");
		exit;
	}

	define('IGNORE_LOADTIME', true);
	new HabboTranslator('register_error');

	if(isset($_POST['bean_email'], $_POST['bean_password'], $_POST['bean_password_conf'])) {
		$error = array();
		if(!empty($_POST['bean_email'])) {
			if(validEmail($_POST['bean_email'])) {
				if($sql->count("SELECT * FROM users WHERE mail = '" . $_POST['bean_email'] . "'") < 1) {
					$_SESSION['register.email'] = $_POST['bean_email']; 
				} else $error[] = 'mail_allready_inuse';
			} else $error[] = 'mail_invalid';
		} else $error[] = 'mail_enter';

		if(!empty($_POST['bean_password'])) {
			if(isWithin(strlen($_POST['bean_password']), 6, 30)) {
				if($_POST['bean_password'] == $_POST['bean_password_conf']) {
					$_SESSION['register.password'] = $core->hash($_POST['bean_password']);
				} else $error[] = 'password_not_matching';
			} else $error[] = 'password_wrong_length';
		} else $error[] = 'password_enter';

		if(empty($error)) {
			echo '<script> $(document).ready(function() { $(\'.overlowLoadingContainer\').html(\'<div class="overlowLoading"><div class="progressContainer"><div class="progress"></div><div class="loading">{$lang->general.page_loading}</div></div></div>\'); setTimeout(\'window.location.replace("{www}/quickregister/second")\', 1000); }); </script>';
		} else {
			echo '<div class="error">';
			foreach($error as $value) {
				echo '{$lang->registererror.' . $value . '}<br />';
			}
			echo '</div>';
		}
	} else die("<script type='text/javascript'> alert('Internal POST error in regstration step 2. Please contact system administrator if this problem continue.'); </script>");
?>