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
include('../../../includes/inc.global.php');

$query_ips = mysql_num_rows(mysql_query("SELECT * FROM users WHERE ip_reg = '".$users->getIp()."'"));
if($query_ips >= $limit_ip_users){ }else{

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['mail']) && isset($_POST['date_day']) && isset($_POST['date_month']) && isset($_POST['date_year']) && isset($_POST['gender']) && isset($_POST['look'])){

	$random1 = rand(100000, 999999);
	$random2 = rand(10000, 99999);
	$random3 = rand(10000, 99999);
	$random4 = rand(10000, 99999);
	$user_bind_id = "".$random1."-".$random2."-".$random3."-".$random4."";
	
	$id = rand(100000, 999999);
	$id_home = rand(100000, 999999);
	
	$query_old_referral_count = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id = '".$core->ExploitRetainer($_POST['referral'])."'"));
	if($query_old_referral_count['ip_reg'] == $users->getIp()){
		$referral_user_id = 0;
		$query = mysql_query("UPDATE users SET referral_count = '".($query_old_referral_count['referral_count'] - 1)."' WHERE id = '".$core->ExploitRetainer($_POST['referral'])."'");
	}else{
		if(isset($_POST['referral']) && $core->ExploitRetainer($_POST['referral'])){
			$referral_user_id = $core->ExploitRetainer($_POST['referral']);
			$query = mysql_query("UPDATE users SET credits = '".($query_old_referral_count['credits'] + $referral_credits)."', activity_points = '".($query_old_referral_count['activity_points'] + $referral_pixels)."', crystals = '".($query_old_referral_count['crystals'] + $referral_crystals)."', vip_points = '".($query_old_referral_count['vip_points'] + $referral_eventpoints)."', referral_count = '".($query_old_referral_count['referral_count'] + 1)."' WHERE id = '".$core->ExploitRetainer($_POST['referral'])."'");
		}else{
			$referral_user_id = 0;
		}
	}
	
	$date = $core->ExploitRetainer($_POST['date_day'])."-".$core->ExploitRetainer($_POST['date_month'])."-".$core->ExploitRetainer($_POST['date_year']);
	
	$query = mysql_query("INSERT INTO users (id, username,  password,  mail,  credits,  activity_points,  look,  gender, motto,  account_created,  last_online,  ip_last,  ip_reg,  home_room, date, user_bind_id, referral_user_id ) VALUES ( ".$id.", '".$core->ExploitRetainer($_POST['username'])."', '".$core->ExploitRetainer(encrypt($_POST['password']))."', '".$core->ExploitRetainer($_POST['mail'])."', '".$register_start_credits."', '".$register_start_pixels."',  '".$core->ExploitRetainer($_POST['look'])."', '".$core->ExploitRetainer($_POST['gender'])."', '".$register_motto."', UNIX_TIMESTAMP(),  UNIX_TIMESTAMP(),  '".$users->getIp()."',  '".$users->getIp()."',  '".$register_homeroom."', '".$date."', '".$user_bind_id."', '".$referral_user_id."')");
	$query = mysql_query("INSERT INTO stream (text, published, author) VALUES ('".$core->ExploitRetainer($_POST['username'])." heeft zich zojuist geregistreerd!', UNIX_TIMESTAMP(), '".$id."')");	
	$query = mysql_query("INSERT INTO user_info (user_id, bans, cautions, reg_timestamp, login_timestamp, cfhs, cfhs_abusive, id) VALUES (".$id.", 0, 0, UNIX_TIMESTAMP(), UNIX_TIMESTAMP(), 0, 0, 0)");	
	$query = mysql_query("INSERT INTO user_stats (id, RoomVisits, OnlineTime, Respect, RespectGiven, GiftsGiven, GiftsReceived, DailyRespectPoints, DailyPetRespectPoints, AchievementScore, quest_id, quest_progress, lev_builder, lev_social, lev_identity, lev_explore, groupid) VALUES (".$id.", 0, 0, 0, 0, 0, 0, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0)");
	
	echo 0;
}

}
?>