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

$page = 'forum_insert_post';

if(isset($_POST['message']) && isset($_POST['parent_id']) && isset($_POST['name'])){
	
			$id = rand(100000, 999999);
			$query = mysql_query("INSERT INTO forum_topics (id, name, description, parent_id, user_id, published, views, message, last_post, edited, edited_date, prefix, closed, screen) VALUES (
			'".$id."',
			'".$core->ExploitRetainer($_POST['name'])."', 
			'".$core->ExploitRetainer($_POST['description'])."',
			'".$core->ExploitRetainer($_POST['parent_id'])."',
			'".$core->ExploitRetainer($users->UserInfo($username, 'id'))."',
			UNIX_TIMESTAMP(),
			'0',
			'".$core->ExploitRetainer($_POST['message'])."',
			UNIX_TIMESTAMP(),
			'0',
			'0',
			'".$core->ExploitRetainer($_POST['prefix'])."',
			'0',
			'0'
			)");
		
			echo $id;
	
}
?>

