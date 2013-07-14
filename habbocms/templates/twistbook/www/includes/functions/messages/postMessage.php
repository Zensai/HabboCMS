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

$page = 'post_message';

if(isset($_POST['chatId']) && isset($_POST['message'])){

	$query_latest = mysql_fetch_array(mysql_query("SELECT * FROM cms_chat_messages WHERE id = '".$core->ExploitRetainer($core->getLatestMessagePost($core->ExploitRetainer($_POST['chatId'])))."' ORDER BY posted DESC"));
	
	if($query_latest['userId'] == $core->ExploitRetainer($users->UserInfo($username, 'id'))){
	
		$message = $core->protectRedirect(html_entity_decode(htmlspecialchars_decode($query_latest['message'].'<br>'.$core->ExploitRetainer($_POST['message']))));
	
		$query = mysql_query("UPDATE cms_chat_messages SET message = '".$core->ExploitRetainer($message)."', posted = UNIX_TIMESTAMP() WHERE id = '".$query_latest['id']."'");
		
	}else{
		
		$query = mysql_query("INSERT INTO cms_chat_messages (chatId, userId, message, posted) VALUES ('".$core->ExploitRetainer($_POST['chatId'])."', '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."', '".$core->ExploitRetainer($_POST['message'])."', UNIX_TIMESTAMP())");
		
	}
	
	$queryCheckUser = mysql_query("SELECT * FROM cms_messages_chat WHERE id = '".$core->ExploitRetainer($_POST['chatId'])."'"); 
	$checkUser = mysql_fetch_array($queryCheckUser);
	if($checkUser['userOne'] == $core->ExploitRetainer($users->UserInfo($username, 'id'))){ $userPlacementCheck = $checkUser['userTwo']; }else{ $userPlacementCheck = $checkUser['userOne']; }
	
	$query = mysql_query("UPDATE cms_messages_chat SET lastPost = UNIX_TIMESTAMP(), alert = '".$userPlacementCheck."', chat_delete_one = '0' WHERE id = '".$core->ExploitRetainer($_POST['chatId'])."'");
	
}
?>