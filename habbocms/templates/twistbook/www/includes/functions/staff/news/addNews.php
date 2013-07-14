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

if($users->UserPermission('cms_news', $username) == 0){ header("Location: ".HOST."/news/failed"); }

$page = 'add_news';

if($users->UserPermission('cms_news', $username)){

if(isset($_POST['title']) && isset($_POST['shortStory']) && isset($_POST['longStory']) && isset($_POST['topstoryImage'])){

	$query = mysql_query("INSERT INTO cms_news (id, title, shortstory, longstory, published, image, author) VALUES (NULL, '".$core->ExploitRetainer($_POST['title'])."', '".$core->ExploitRetainer($_POST['shortStory'])."', '".$core->ExploitRetainer($_POST['longStory'])."', UNIX_TIMESTAMP(), '".$core->ExploitRetainer($_POST['topstoryImage'])."', '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."')");
	
	$searchNewsQuery = mysql_query("SELECT * FROM cms_news ORDER BY id DESC");
	$searchNews = mysql_fetch_array($searchNewsQuery);
?>
<meta http-equiv="refresh" content="0;url=<?php echo HOST; ?>/news/succes/go-to/<?php echo $searchNews['id']; ?>" />
<?php
}

}
?>