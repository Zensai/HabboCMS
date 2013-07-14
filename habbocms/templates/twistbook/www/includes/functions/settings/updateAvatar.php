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

$page = 'settings_avatar';

if($core->ExploitRetainer($users->UserInfo($username, 'vip')) == '1'){

	if(isset($_POST['gesture']) && isset($_POST['head_direction']) && isset($_POST['direction']) && isset($_POST['action']) && isset($_POST['second_action']) && isset($_POST['crr_action']) && isset($_POST['drk_action'])){
		
		$state = mysql_real_escape_string($_POST['gesture']).mysql_real_escape_string($_POST['head_direction']).mysql_real_escape_string($_POST['direction']).mysql_real_escape_string($_POST['action']).mysql_real_escape_string($_POST['second_action']).mysql_real_escape_string($_POST['crr_action']).mysql_real_escape_string($_POST['drk_action']);
	
		$query = mysql_query("UPDATE users SET avatar_state = '".$core->ExploitRetainer($state)."' WHERE id = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."'");
		
		echo $state;
		
	}else{
		
		echo 0;
		
	}

}
?>