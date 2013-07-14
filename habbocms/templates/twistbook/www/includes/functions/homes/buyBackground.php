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

$id = $core->ExploitRetainer($_POST['id']);
$id_item = rand(100000, 999999);

$query_check_home_id = mysql_query("SELECT * FROM homes WHERE user_id = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."'");
$check_home_id = mysql_fetch_array($query_check_home_id);

$query = mysql_query("INSERT INTO homes_items (
id,
user_id,
item_id,
home_id,
type
) VALUES (
".$id_item.",
".$core->ExploitRetainer($users->UserInfo($username, 'id')).",
".$id.",
".$check_home_id['id'].",
'background'
)
");

$query_check_item_id_background = mysql_query("SELECT * FROM homes_shop_backgrounds WHERE id = '".$id."'");
$check_item_id_background = mysql_fetch_array($query_check_item_id_background);
$newCount_background = $core->ExploitRetainer($users->UserInfo($username, 'credits')) - $check_item_id_background['value'];

$query = mysql_query("UPDATE users SET credits = '".$newCount_background."' WHERE id = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."'");

echo 1;
?>