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

$page = 'add_badge';

if($core->ExploitRetainer($users->UserPermission('cms_shop', $username))){ 

	if(isset($_GET['badge_id']) && isset($_GET['badge_name']) && isset($_GET['rank_id']) && isset($_GET['value'])){
		
		$checkit = mysql_query("SELECT * FROM shop_badges ORDER BY id DESC LIMIT 1");
		$checkitnumber = mysql_fetch_array($checkit);
		
		$newidnr = $checkitnumber['id'] +1;

		$query = mysql_query("INSERT INTO shop_badges (id, badge_id, badge_name, rank_id, value) VALUES ('".$newidnr."', '".$core->ExploitRetainer($_GET['badge_id'])."', '".$core->ExploitRetainer($_GET['badge_name'])."', '".$core->ExploitRetainer($_GET['rank_id'])."', '".$core->ExploitRetainer($_GET['value'])."')");
		
		header("Location: ".HOST."/shop/badges");
	
	}

}else{
	
	header("Location: ".HOST."/shop/badges");
	
}
?>