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
include("../../includes/inc.global.php");

$page = 'post_news_reaction';

if(isset($_POST['text']) && isset($_POST['newsID'])){

	$query = mysql_query("INSERT INTO cms_news_comments (id, news_id, user_id, message, published) VALUES (NULL, '".$core->ExploitRetainer($_POST['newsID'])."', '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."', '".$core->ExploitRetainer($_POST['text'])."', UNIX_TIMESTAMP())");
	
	$query_news = mysql_fetch_array(mysql_query("SELECT * FROM cms_news WHERE id = '".$core->ExploitRetainer($_POST['newsID'])."'"));
	
	$query = mysql_query("INSERT INTO stream (text, published, author) VALUES ('".$core->ExploitRetainer($users->UserInfo($username, 'username'))." heeft zojuist een reactie geplaats in het nieuws: ".$core->ExploitRetainer($query_news['title'])."', UNIX_TIMESTAMP(), '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."')");
	
}
?>