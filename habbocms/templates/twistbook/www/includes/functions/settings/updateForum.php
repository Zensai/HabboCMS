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

$page = 'settings_forum';

if(isset($_POST['avatar']) && isset($_POST['signature'])){
	
	$vSomeSpecialChars = array("<script", "script>", "<meta", "<a", "a>");
  	$vReplacementChars = array("", "", "", "", "");
	$signature_m = html_entity_decode(mysql_real_escape_string($_POST['signature']));
	$signature = str_replace($vSomeSpecialChars, $vReplacementChars, $signature_m);
	$query = mysql_query("UPDATE users SET forum_avatar_url = '".$core->ExploitRetainer($_POST['avatar'])."', signature = '".$signature."' WHERE id = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."'");
	
	echo $core->ExploitRetainer($_POST['avatar']);

}else{
	
	echo 0;
	
}
?>