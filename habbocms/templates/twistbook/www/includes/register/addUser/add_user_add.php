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

$query_ips = mysql_num_rows(mysql_query("SELECT * FROM users WHERE ip_reg = '".$users->getIp()."'"));
if($query_ips >= $limit_ip_users){ }else{

$page = 'get_add';

$user_id = rand(100000, 999999);
$home_id = rand(100000, 999999);

$query = mysql_query("INSERT INTO users ( id, username,  password,  mail,  credits,  activity_points,  look,  motto,  account_created,  last_online,  ip_last,  ip_reg,  home_room,  date, user_bind_id ) VALUES ( ".$user_id.", '".$core->ExploitRetainer($_GET['user'])."',  '".$core->ExploitRetainer($_GET['pass'])."',  '".$core->ExploitRetainer($_GET['mail'])."',  '".$register_start_credits."',  '".$register_start_pixels."',  '".$register_look."',  '".$register_motto."',  UNIX_TIMESTAMP(),  UNIX_TIMESTAMP(),  '".$users->getIp()."',  '".$users->getIp()."',  '".$register_homeroom."',   '".$core->ExploitRetainer($_GET['date'])."', '".$core->ExploitRetainer($_GET['user_bind_id'])."');")or die(mysql_error());
	
$query = mysql_query("INSERT INTO stream (text, published, author) VALUES ('".$core->ExploitRetainer($_GET['user'])." heeft zich zojuist geregistreerd!', UNIX_TIMESTAMP(), '".$user_id."')");

$query = mysql_query("INSERT INTO user_info (user_id, bans, cautions, reg_timestamp, login_timestamp, cfhs, cfhs_abusive, id) VALUES (".$user_id.", 0, 0, UNIX_TIMESTAMP(), UNIX_TIMESTAMP(), 0, 0, 0)");
	
$query = mysql_query("INSERT INTO user_stats (id, RoomVisits, OnlineTime, Respect, RespectGiven, GiftsGiven, GiftsReceived, DailyRespectPoints, DailyPetRespectPoints, AchievementScore, quest_id, quest_progress, lev_builder, lev_social, lev_identity, lev_explore, groupid) VALUES (".$user_id.", 0, 0, 0, 0, 0, 0, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0)");

header("Location: ".HOST."/login?switchLogin=yes&username=".$core->ExploitRetainer($_GET['user'])."&password=".$core->ExploitRetainer($_GET['pass'])."");

}
?>