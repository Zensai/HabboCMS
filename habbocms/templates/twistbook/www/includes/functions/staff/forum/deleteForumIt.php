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

$page = 'delete_forum_item';

if(isset($_GET['type']) == 'forumCat'){
	
	if(isset($_POST['id'])){
	
		$query_forum_cat = mysql_query("SELECT * FROM forums WHERE count_id = '1' AND id = '".$core->ExploitRetainer($_POST['id'])."'");
		$forum_cat = mysql_fetch_array($query_forum_cat);
		
		$query_forum = mysql_query("SELECT * FROM forums WHERE count_id = '2' AND parent_id = '".$forum_cat['id']."'");
		while($forum = mysql_fetch_array($query_forum)){
			
			$query_forum_topics = mysql_query("SELECT * FROM forum_topics WHERE parent_id = '".$forum['id']."'");
			while($forum_topics = mysql_fetch_array($query_forum_topics)){
				
				$query = mysql_query("DELETE FROM forum_topics WHERE parent_id = '".$forum['id']."'");
				
				$query = mysql_query("DELETE FROM forum_reactions WHERE parent_id = '".$forum_topics['id']."'");
				
			}
			
			$query_subforum = mysql_query("SELECT * FROM forums WHERE count_id = '3' AND parent_id = '".$forum['id']."'");
			while($subforum = mysql_fetch_array($query_subforum)){
				
				$query_subforum_topics = mysql_query("SELECT * FROM forum_topics WHERE parent_id = '".$subforum['id']."'");
				while($subforum_topics = mysql_fetch_array($query_subforum_topics)){
				
					$query = mysql_query("DELETE FROM forum_reactions WHERE parent_id = '".$subforum_topics['id']."'");
					
				}
				
				$query = mysql_query("DELETE FROM forum_topics WHERE parent_id = '".$subforum['id']."'");
				
			}
			
			$query = mysql_query("DELETE FROM forums WHERE count_id = '3' AND parent_id = '".$forum['id']."'");
			
		}
		
		$query = mysql_query("DELETE FROM forums WHERE count_id = '2' AND parent_id = '".$forum_cat['id']."'");
		
		$query = mysql_query("DELETE FROM forums WHERE count_id = '1' AND id = '".$core->ExploitRetainer($_POST['id'])."'");
	
	}
	
}

if(isset($_GET['type']) == 'forum'){
	
	if(isset($_POST['id'])){
		
		$query_forum = mysql_query("SELECT * FROM forums WHERE count_id = '2' AND id = '".$core->ExploitRetainer($_POST['id'])."'");
		$forum = mysql_fetch_array($query_forum);
		
		$query_forum_topics = mysql_query("SELECT * FROM forum_topics WHERE parent_id = '".$forum['id']."'");
		while($forum_topics = mysql_fetch_array($query_forum_topics)){
			
			$query = mysql_query("DELETE FROM forum_reactions WHERE parent_id = '".$forum_topics['id']."'");
			
			$query = mysql_query("DELETE FROM forum_topics WHERE parent_id = '".$forum['id']."'");
			
		}
		
		$query_subforum = mysql_query("SELECT * FROM forums WHERE count_id = '3' AND parent_id = '".$forum['id']."'");
		while($subforum = mysql_fetch_array($query_subforum)){
			
			$query_subforum_topics = mysql_query("SELECT * FROM forum_topics WHERE parent_id = '".$subforum['id']."'");
			while($subforum_topics = mysql_fetch_array($query_subforum_topics)){
				
				$query = mysql_query("DELETE FROM forum_reactions WHERE parent_id = '".$subforum_topics['id']."'");
					
			}
				
			$query = mysql_query("DELETE FROM forum_topics WHERE parent_id = '".$subforum['id']."'");
			
		}
		
		$query = mysql_query("DELETE FROM forums WHERE count_id = '3' AND parent_id = '".$core->ExploitRetainer($_POST['id'])."'");
		
		$query = mysql_query("DELETE FROM forums WHERE count_id = '2' AND id = '".$core->ExploitRetainer($_POST['id'])."'");
		
	}
	
}

if(isset($_GET['type']) == 'subforum'){
	
	if(isset($_POST['id'])){
	
		$query_subforum = mysql_query("SELECT * FROM forums WHERE count_id = '3' AND id = '".$core->ExploitRetainer($_POST['id'])."'");
		$subforum = mysql_fetch_array($query_subforum);
			
			$query_subforum_topics = mysql_query("SELECT * FROM forum_topics WHERE parent_id = '".$subforum['id']."'");
			while($subforum_topics = mysql_fetch_array($query_subforum_topics)){
				
				$query = mysql_query("DELETE FROM forum_reactions WHERE parent_id = '".$subforum_topics['id']."'");
					
			}
				
			$query = mysql_query("DELETE FROM forum_topics WHERE parent_id = '".$subforum['id']."'");
			
		}
		
		$query = mysql_query("DELETE FROM forums WHERE count_id = '3' AND id = '".$core->ExploitRetainer($_POST['id'])."'");
	
}
?>