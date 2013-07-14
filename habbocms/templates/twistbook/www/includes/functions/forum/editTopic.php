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

define('USER', TRUE); 
define('ACCOUNT', TRUE);
define('MAINTENANCE', TRUE);
include("../../../includes/inc.global.php");

$page = 'forum_edit_topic';

if(isset($_POST['id']) && isset($_POST['message']) && isset($_POST['name']) && isset($_POST['description'])){
	
	$uqery_lookforinfo = mysql_fetch_array(mysql_query("SELECT * FROM forum_topics WHERE id = '".$core->ExploitRetainer($_POST['id'])."'"));
	
	if($uqery_lookforinfo['user_id'] == $core->ExploitRetainer($users->UserInfo($username, 'id')) || $core->ExploitRetainer($users->UserPermission('cms_forum_topic', $username))){

		$query = mysql_query("UPDATE forum_topics SET name = '".$core->ExploitRetainer($_POST['name'])."', description = '".$core->ExploitRetainer($_POST['description'])."', message = '".$core->ExploitRetainer($_POST['message'])."', edited = '1', edited_date = UNIX_TIMESTAMP(), prefix = '".$core->ExploitRetainer($_POST['prefix'])."' WHERE id = '".$core->ExploitRetainer($_POST['id'])."'");
	
	}
	
}
?>

