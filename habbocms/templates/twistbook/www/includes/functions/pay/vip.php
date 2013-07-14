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

if(isset($_POST['payed']) && isset($_POST['value'])){
	
	if($core->ExploitRetainer($_POST['payed']) == 'done'){
		
		if($core->ExploitRetainer($_POST['value']) == '6'){
			$new_vip_value = time()+15552000;
			if(mysql_num_rows(mysql_query("SELECT * FROM user_subscriptions_vip WHERE user_id = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."'")) == 0){
				$query = mysql_query("INSERT INTO user_subscriptions_vip (user_id, timestamp_activated, timestamp_expire) VALUES ('".$core->ExploitRetainer($users->UserInfo($username, 'id'))."', UNIX_TIMESTAMP(), '".$new_vip_value."')");
			}else{
				$query = mysql_query("UPDATE user_subscriptions_vip SET timestamp_activated = UNIX_TIMESTAMP(), timestamp_expire = '".$new_vip_value."' WHERE user_id = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."'");
			}
		}
		
		if($core->ExploitRetainer($_POST['value']) == '12'){
			
		}
		
		if($core->ExploitRetainer($_POST['value']) == 'permanent'){
			
		}
		
	}
	
}
?>
