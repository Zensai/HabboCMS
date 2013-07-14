<?php
	if(LOGGEDIN) {
		header("Location: " . WWW . "/me");
		exit;
	}

	if($identity->maxClones()) {
		header("Location: " . WWW . "/index?maxclones");
		exit;
	}

	define('IGNORE_LOADTIME', true);
	new HabboTranslator('register_error');

	if(isset($_POST['bean_look'], $_POST['bean_username'], $_POST['bean_tos'])) {
		$error = array();
		if(!empty($_POST['bean_look'])) {
			$allowed_looks = array('M' => array('hr-165-45.hd-190-3.ch-255-73.lg-280-62.sh-295-62', 'hr-115-42.hd-195-3.ch-3030-62.lg-275-62.sh-295-66.ha-1005-66.ea-1406.fa-1204.wa-2001', 'hr-165-33.hd-180-4.ch-3110-64-62.lg-281-64.sh-295-64.ea-1401-64.fa-1204'), 'F' => array('hr-545-45.hd-600-4.ch-630-80.lg-3116-91-62.sh-730-62', 'hr-540-45.hd-620-2.ch-630-73.lg-720-83.sh-725-62.fa-1211', 'hr-545-45.hd-620-4.ch-630-71.lg-715-76.sh-725-62'));
			$default = array('M' => 'hr-165-45.hd-190-3.ch-255-73.lg-280-62.sh-295-62', 'F' => 'hr-545-45.hd-600-4.ch-630-80.lg-3116-91-62.sh-730-62');
			$look = $_POST['bean_look'];
			if(!in_array($look, $allowed_looks[$_SESSION['register.gender']])) {
				$look = $default[$_SESSION['register.gender']];
			}

			$_SESSION['register.look'] = $look;
		} else $error[] = 'look';

		if(!empty($_POST['bean_username'])) {
			if(isWithin(strlen($_POST['bean_username']), 2, 15)) {
				if(validUsername($_POST['bean_username'])) {
					if(!$identity->username2id($_POST['bean_username'])) {
						$_SESSION['register.username'] = $_POST['bean_username'];
					} else $error[] = 'username_allready_taken';
				} else $error[] = 'username_invalid';
			} else $error[] = 'username_wrong_length';
		} else $error[] = 'username_enter';

		if($_POST['bean_tos'] != 'on') $error[] = 'tos';

		if(empty($error)) {
			/*Do checks*/
			$dob = intval($_SESSION['register.dob_day']) . '.' . intval($_SESSION['register.dob_month']) . '.' . $_SESSION['register.dob_year'];
			$gender = ($_SESSION['register.gender'] == 'M')?'M':'F';
			$look = sqlFilter($_SESSION['register.look']);
			$password = sqlFilter($_SESSION['register.password']);
			$username = usernameFilter($_SESSION['register.username']);
			if($sql->count("SELECT * FROM users WHERE mail = '" . emailFilter($_SESSION['register.email']) . "'") > 0) {
				$mail = false;
				$error[] = 'mail_allready_taken';
			} else $mail = emailFilter($_SESSION['register.email']);

			if(!empty($error)) {
				unset($_SESSION['register.dob_day'], $_SESSION['register.dob_month'], $_SESSION['register.dob_year'], $_SESSION['register.gender'], $_SESSION['register.email'], $_SESSION['register.password'], $_SESSION['register.look'], $_SESSION['register.username']);
				die("<script type='text/javascript'> error('An error occured while checking all fields. Please try to register agian or contact the system administrator if this problem continue.', '" . addslashes(debug($error, false)) . "'); setTimeout('window.location.replace(\"" . WWW . "/quickregister/first\")', 500); </script>");	
			}

			$result = $sql->query("INSERT INTO users (username, password, mail, rank, credits, vip_points, activity_points, look, motto, account_created, last_online, ip_last, ip_reg, home_room, newbie_status) VALUES ('" . $username . "', '" . $password . "', '" . $mail . "', '1', '" . $core->settings->start_credits . "', '" . $core->settings->start_points . "', '" . $core->settings->start_pixels . "', '" . $look . "', '" . $core->settings->start_motto . "', '" . time() . "', '" . time() . "', '" . $_SERVER['REMOTE_ADDR'] . "', '" . $_SERVER['REMOTE_ADDR'] . "', '" . $core->settings->start_homeroom . "', '2')");
			if(!$result) die("<script type='text/javascript'> error('An error occured while we were trying to registering your user into our database, please contact the system administrator if this problem continues.', '" . addslashes(mysql_error()) . "');</script>");	

			$user_id = mysql_insert_id();
			$result = $sql->query("INSERT INTO user_info (user_id) VALUES ('" . $user_id  . "')");
			if(!$result) die("<script type='text/javascript'> error('An error occured while we were trying to registering your user into our database, please contact the system administrator if this problem continues.', '" . addslashes(mysql_error()) . "');</script>");	

			$session = $identity->createSession($user_id, 1800);
			$_SESSION['habbo_identity'] = $user_id;
			$_SESSION['habbo_session_token'] = $session;

			echo '<script type=\'text/javascript\'> $(document).ready(function() { $(\'.overlowLoadingContainer\').html(\'<div class="overlowLoading"><div class="progressContainer"><div class="progress"></div><div class="loading">{$lang->registererror.loggingin}</div></div></div>\'); setTimeout(\'window.location.replace("' . WWW . '/me")\', 1000); }); </script>';
		} else {
			echo '<div class="error">';
			foreach($error as $value) {
				echo '{$lang->registererror.' . $value . '}<br />';
			}
			echo '</div>';
		}
	} else die("<script type='text/javascript'> alert('Internal POST error in regstration step 3. Please contact the system administrator if this problem continue.'); </script>");
	
/*
define('USER', FALSE); 
define('ACCOUNT', FALSE);
define('MAINTENANCE', TRUE);
include("../../../includes/inc.global.php");

if(isset($_COOKIE['username'])){ header("Location: me"); }

$query_ips = mysql_num_rows(mysql_query("SELECT * FROM users WHERE ip_reg = '".$users->getIp()."'"));
if($query_ips >= $limit_ip_users){
	header("Location: ".HOST."/index/second/error/ip/overated");
}

$page = 'register_check';

if(isset($_POST['look']) && isset($_POST['username'])){

	$random1 = rand(100000, 999999);
	$random2 = rand(10000, 99999);
	$random3 = rand(10000, 99999);
	$random4 = rand(10000, 99999);
	$user_bind_id = "".$random1."-".$random2."-".$random3."-".$random4."";

	$userchecker = mysql_query("SELECT username FROM users WHERE username = '".$core->ExploitRetainer($_POST['username'])."'");

	$usercounter = mysql_num_rows($userchecker);

	if($core->ExploitRetainer($_POST['look']) == NULL || $core->ExploitRetainer($_POST['username']) == NULL || preg_match('/^[a-zA-Z0-9]+$/i', $core->ExploitRetainer($_POST['username'])) == 0 || $usercounter > 0){ 

		echo '<div class="error">';

		if($core->ExploitRetainer($_POST['look']) == NULL){ echo $language['index_register_error_no_look']; 
		}elseif($core->ExploitRetainer($_POST['username']) == NULL){ echo $language['index_register_error_no_username']; 
		}elseif(preg_match('/^[a-zA-Z0-9]+$/i', $core->ExploitRetainer($_POST['username'])) == 0){ echo $language['index_register_error_signs_username'];
		}elseif($usercounter > 0){ echo $language['index_register_error_taken_username']; }

		echo '</div>';
	
	}else{
?>

		<script>
		$(document).ready(function() {

			$('.overlowLoadingContainer').html('<div class="overlowLoading"><div class="progressContainer"><div class="progress"></div><div class="loading"><?php echo $language['loading_add_user']; ?><br><?php echo $language['loading_login']; ?></div></div></div>');
		
			setTimeout('document.loginform.mySubmit.click()',1000);
		
		});
		</script>
		
		<?php
		$id = rand(100000, 999999);
		$id_home = rand(100000, 999999);
	
		$query = mysql_query("INSERT INTO users ( id, username,  password,  mail,  credits,  activity_points,  look,  gender, motto,  account_created,  last_online,  ip_last,  ip_reg,  home_room,  date, user_bind_id ) VALUES ( ".$id.", '".$core->ExploitRetainer($_POST['username'])."', '".$core->ExploitRetainer(encrypt($_POST['password']))."', '".$core->ExploitRetainer($_POST['email'])."', '".$register_start_credits."', '".$register_start_pixels."',  '".$core->ExploitRetainer($_POST['look'])."', '".$core->ExploitRetainer($_POST['gender'])."', '".$register_motto."', UNIX_TIMESTAMP(),  UNIX_TIMESTAMP(),  '".$users->getIp()."',  '".$users->getIp()."',  '".$register_homeroom."', '".$core->ExploitRetainer($_POST['birthday-day'])."-".$core->ExploitRetainer($_POST['birthday-month'])."-".$core->ExploitRetainer($_POST['birthday-year'])."', '".$user_bind_id."' ) ");
	
		$query = mysql_query("INSERT INTO stream (text, published, author) VALUES ('" . str_replace('{username}', $core->ExploitRetainer($_POST['username']), $language["stream_register"]) . "', UNIX_TIMESTAMP(), '".$id."')");
		
		$query = mysql_query("INSERT INTO user_info (user_id, bans, cautions, reg_timestamp, login_timestamp, cfhs, cfhs_abusive, id) VALUES (".$id.", 0, 0, UNIX_TIMESTAMP(), UNIX_TIMESTAMP(), 0, 0, 0)");
	
		$query = mysql_query("INSERT INTO user_stats (id, RoomVisits, OnlineTime, Respect, RespectGiven, GiftsGiven, GiftsReceived, DailyRespectPoints, DailyPetRespectPoints, AchievementScore, quest_id, quest_progress, lev_builder, lev_social, lev_identity, lev_explore, groupid) VALUES (".$id.", 0, 0, 0, 0, 0, 0, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0)");
		?>
		
		<form method="post" id="loginform" name="loginform" action="<?php echo HOST; ?>/login">
		
			<input type="hidden" name="username" value="<?php echo $core->ExploitRetainer($_POST['username']); ?>">
			<input type="hidden" name="password" value="<?php echo $core->ExploitRetainer($_POST['password']); ?>">
			<input type="hidden" name="register" value="yes">
			
			<input type="submit" hidden="hidden" name="mySubmit" style="margin-top: -9999999999px;">
			
		</form>

<?php
	}

}*/
?>