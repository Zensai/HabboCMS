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

	if($core->ExploitRetainer($users->UserPermission('cms_manager_users', $username)) == 1){

		$page = 'edit_user';

		if(isset($_POST['id'], $_POST['motto'], $_POST['mail'], $_POST['vip'], $_POST['rank'],$_POST['credits'],$_POST['pixels'],$_POST['vip_points'])){

			$query = mysql_query("UPDATE users SET motto = '".$core->ExploitRetainer($_POST['motto'])."', mail = '".$core->ExploitRetainer($_POST['mail'])."', vip = '".$core->ExploitRetainer($_POST['vip'])."', rank = '".$core->ExploitRetainer($_POST['rank'])."', credits = '".$core->ExploitRetainer($_POST['credits'])."', activity_points = '".$core->ExploitRetainer($_POST['pixels'])."', vip_points = '".$core->ExploitRetainer($_POST['vip_points'])."' WHERE id = '".$core->ExploitRetainer($_POST['id'])."'");
			
			echo 1;
	
		}else{ echo 0; }
		
	}else{ echo 0; }
	
}else{ echo 0; }
?>