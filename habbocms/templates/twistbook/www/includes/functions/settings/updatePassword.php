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

$page = 'settings_general';

if(isset($_POST['oldww']) && isset($_POST['newww']) && isset($_POST['newwwconf'])){

	$oldpassword = encrypt($core->ExploitRetainer($_POST['oldww']));
	
	if($oldpassword == $core->ExploitRetainer($users->UserInfo($username, 'password'))){
		
		$newpassword = encrypt($core->ExploitRetainer($_POST['newww']));
		$newpasswordconf = encrypt($core->ExploitRetainer($_POST['newwwconf']));
		
		if($newpassword == $newpasswordconf){
			
			$query = mysql_query("UPDATE users SET password = '".$newpasswordconf."' WHERE id = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."'");
			
			echo 1;
			
		}else{ echo 0; }
		
	}else{ echo 0; }
	
}else{ echo 0; }
?>