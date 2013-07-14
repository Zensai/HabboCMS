<?php

/*

	##############################################################################################################################
	#	     	                                                                                                          	     #
	#		01010101010101                                                                                                       #
	#		10101010101010                                                                                                       #
	#	    	 1010                                                                                                            #
	#	     	 0101 1010   0101   1010 0101  010101010  10101010101010 01010101010    101010101   101010101  010    101        #
	#	     	 1010 0101   1010   0101 1010 01010101010 01010101010101 101010101010  10101010101 10101010101 101   101         #
	#	      	 0101 1010   0101   1010      1010             0101      0101     1010 0101   1010 0101   1010 010  101          #
	#	     	 1010 0101   1010   0101 1010  101010101       1010      101010101010  1010   0101 1010   0101 1010101           #
	#	     	 0101  0101  0101  0101  0101   010101010      0101      01010101010   0101   1010 0101   1010 0101010           #
	#	     	 1010   01010101010101   1010        0101      1010      1010     0101 1010   0101 1010   0101 101  010          #
	#	    	 0101    010101010101    0101  010101010       0101      0101010101010 01010101010 01010101010 010   010         #
	#	     	 1010     0101010101     1010 010101010        1010      101010101010   010101010   010101010  101    010        #
	#	                                           	                                                                    	     #
	#												 © TwistbookCMS Made by Tonny												 #
	#					     					This content is protected by Copyright										     #
	#	                                                                                                  	             	     #
	##############################################################################################################################

*/

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

}
?>