<?php
	if(LOGGEDIN) {
		header("Location: " . WWW . "/me");
		exit;
	}

	define('IGNORE_LOADTIME', true);
	new HabboTranslator('register_error');
	
	if(isset($_POST['bean_dob_day'], $_POST['bean_dob_month'], $_POST['bean_dob_year'], $_POST['bean_gender'])) {
		$error = array();
		if(is_numeric($_POST['bean_dob_day']) && isWithin($_POST['bean_dob_day'], 1, 31)) $_SESSION['register.dob_day'] = $_POST['bean_dob_day']; else $error[] = 'dob';
		if(is_numeric($_POST['bean_dob_month']) && isWithin($_POST['bean_dob_month'], 1, 12)) $_SESSION['register.dob_month'] = $_POST['bean_dob_month']; elseif(!in_array('dob', $error)) $error[] = 'dob';
		if(is_numeric($_POST['bean_dob_year']) && isWithin($_POST['bean_dob_year'], 1900, 2020)) $_SESSION['register.dob_year'] = $_POST['bean_dob_year']; elseif(!in_array('dob', $error)) $error[] = 'dob';
		if($_POST['bean_gender'] == 'M' || $_POST['bean_gender'] == 'F') $_SESSION['register.gender'] = $_POST['bean_gender']; else $error[] = 'gender';

		if(empty($error)) {
			echo '<script type=\'text/javascript\'> $(document).ready(function() { $(\'.overlowLoadingContainer\').html(\'<div class="overlowLoading"><div class="progressContainer"><div class="progress"></div><div class="loading">{$lang->general.page_loading}</div></div></div>\'); setTimeout(\'window.location.replace("{www}/quickregister/second")\', 1000); }); </script>';
		} else {
			echo '<div class="error">';
			foreach($error as $value) {
				echo '{$lang->registererror.' . $value . '}<br />';
			}
			echo '</div>';
		}
	} else die("<script type='text/javascript'> alert('Internal POST error in registration step 1. Please contact system administrator if this problem continue.'); </script>");
?>