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

$page = 'delete_chat';

if(isset($_GET['id'])){
	
	$chat_select = mysql_fetch_array(mysql_query("SELECT * FROM chat_messages_chat WHERE id = '".$core->ExploitRetainer($_GET['id'])."'"));
	if($core->ExploitRetainer($users->UserInfo($username, 'id')) == $chat_select['userOne']){ $user_blocked = $chat_select['userTwo']; }elseif($core->ExploitRetainer($users->UserInfo($username, 'id')) == $chat_select['userTwo']){ $user_blocked = $chat_select['userOne']; }
	
	if($chat_select['chat_delete_one'] == 0){
		
		$query = mysql_query("UPDATE cms_messages_chat SET chat_delete_one = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."' WHERE id = '".$core->ExploitRetainer($_GET['id'])."'");

	}elseif($chat_select['chat_delete_one'] > $user_blocked){

		$query = mysql_query("DELETE FROM cms_messages_chat WHERE id = '".$core->ExploitRetainer($_GET['id'])."'");
		$query = mysql_query("DELETE FROM cms_chat_messages WHERE chatId = '".$core->ExploitRetainer($_GET['id'])."'");
	
	}

}
?>