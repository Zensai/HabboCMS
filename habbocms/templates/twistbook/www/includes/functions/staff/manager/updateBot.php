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
include("../../../../includes/inc.global.php");

if($core->ExploitRetainer($users->UserPermission('cms_manager_login', $username)) == 1){

	if($core->ExploitRetainer($users->UserPermission('cms_manager_bots', $username)) == 1){
	
		if(isset($_POST['id']) && isset($_POST['room_id']) && isset($_POST['name']) && isset($_POST['motto']) && isset($_POST['look']) && isset($_POST['x']) && isset($_POST['y']) && isset($_POST['z']) && isset($_POST['rotation']) && isset($_POST['walk_mode'])){
		
			$query = mysql_query("UPDATE bots SET room_id = '".$core->ExploitRetainer($_POST['room_id'])."', name = '".$core->ExploitRetainer($_POST['name'])."', motto = '".$core->ExploitRetainer($_POST['motto'])."', look = '".$core->ExploitRetainer($_POST['look'])."', x = '".$core->ExploitRetainer($_POST['x'])."', y = '".$core->ExploitRetainer($_POST['y'])."', z = '".$core->ExploitRetainer($_POST['z'])."', rotation = '".$core->ExploitRetainer($_POST['rotation'])."', walk_mode = '".$core->ExploitRetainer($_POST['walk_mode'])."' WHERE id = '".$core->ExploitRetainer($_POST['id'])."'");
			
			
			echo 1;
		
		}else{ echo 0; }
	}else{ echo 0; }
}else{ echo 0; }
	
?>