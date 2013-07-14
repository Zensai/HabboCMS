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

$page = 'add_furniture';

if(isset($_POST['item_ids']) && isset($_POST['user_id']) && isset($_POST['value'])){

	$query = mysql_query("INSERT INTO items_users (item_id, user_id) VALUES ('".$core->ExploitRetainer($_POST['item_ids'])."', '".$core->ExploitRetainer($_POST['user_id'])."')");
	
	$new_crystals = $core->ExploitRetainer($users->UserInfo($username, 'crystals')) -$core->ExploitRetainer($_POST['value']);
	
	$query = mysql_query("UPDATE users SET crystals = '".$new_crystals."' WHERE id = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."'");
	
}
?>