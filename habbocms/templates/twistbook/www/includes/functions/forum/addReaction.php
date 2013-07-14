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

if(isset($_POST['message']) && isset($_POST['parent_id'])){
	
	if(isset($_POST['quote'])){
		
		$query_search_last_post = mysql_fetch_array(mysql_query("SELECT * FROM forum_reactions WHERE parent_id = '".$core->ExploitRetainer($_POST['parent_id'])."' ORDER BY published DESC LIMIT 1"));
		if($query_search_last_post['user_id'] == $core->ExploitRetainer($users->UserInfo($username, 'id'))){
			
			$message = $query_search_last_post['message'].'<br><br>'.$core->ExploitRetainer($_POST['message']);
			
			$query = mysql_query("UPDATE forum_reactions SET message = '".$message."', edited = '1', edited_date = UNIX_TIMESTAMP() WHERE id = '".$query_search_last_post['id']."'");
			
			$query = mysql_query("UPDATE forum_topics SET last_post = UNIX_TIMESTAMP() WHERE id = '".$core->ExploitRetainer($_POST['parent_id'])."'");
		
			echo $query_search_last_post['id'];
			
		}else{
			
			$id = rand(100000, 999999);
			$query = mysql_query("INSERT INTO forum_reactions (id, user_id, message, parent_id, published, quote) VALUES ('".$id."', '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."', '".$core->ExploitRetainer($_POST['message'])."', '".$core->ExploitRetainer($_POST['parent_id'])."', UNIX_TIMESTAMP(), '".$core->ExploitRetainer($_POST['quote'])."')");
			
			$query = mysql_query("UPDATE forum_topics SET last_post = UNIX_TIMESTAMP() WHERE id = '".$core->ExploitRetainer($_POST['parent_id'])."'");
		
			echo $id;
		
		}
		
	}else{
		
		$query_search_last_post = mysql_fetch_array(mysql_query("SELECT * FROM forum_reactions WHERE parent_id = '".$core->ExploitRetainer($_POST['parent_id'])."' ORDER BY published DESC LIMIT 1"));
		if($query_search_last_post['user_id'] == $core->ExploitRetainer($users->UserInfo($username, 'id'))){
			
			$message = $query_search_last_post['message'].'<br><br>'.$core->ExploitRetainer($_POST['message']);
			
			$query = mysql_query("UPDATE forum_reactions SET message = '".$message."', edited = '1', edited_date = UNIX_TIMESTAMP() WHERE id = '".$query_search_last_post['id']."'");
			
			$query = mysql_query("UPDATE forum_topics SET last_post = UNIX_TIMESTAMP() WHERE id = '".$core->ExploitRetainer($_POST['parent_id'])."'");
		
			echo $query_search_last_post['id'];
			
		}else{
	
			$id = rand(100000, 999999);
			$query = mysql_query("INSERT INTO forum_reactions (id, user_id, message, parent_id, published) VALUES ('".$id."', '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."', '".$core->ExploitRetainer($_POST['message'])."', '".$core->ExploitRetainer($_POST['parent_id'])."', UNIX_TIMESTAMP())");
			
			$query = mysql_query("UPDATE forum_topics SET last_post = UNIX_TIMESTAMP() WHERE id = '".$core->ExploitRetainer($_POST['parent_id'])."'");
		
			echo $id;
		
		}
		
	}
	
}
?>

