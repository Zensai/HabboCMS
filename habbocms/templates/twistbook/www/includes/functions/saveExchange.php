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

$page = 'save_exchange';

if(isset($_POST['value'])){

	if($core->ExploitRetainer($users->UserInfo($username, 'vip_points')) < $core->ExploitRetainer($_POST['value'])){
		echo 1;
	}else{
		
		$calculated = floor($core->ExploitRetainer($_POST['value']) * 0.39821);
		$new_eventpoints = $core->ExploitRetainer($users->UserInfo($username, 'vip_points')) - $core->ExploitRetainer($_POST['value']);
		$new_diamonds = $core->ExploitRetainer($users->UserInfo($username, 'crystals')) + $calculated;
		$query = mysql_query("UPDATE users SET vip_points = '".$new_eventpoints."', crystals = '".$new_diamonds."' WHERE id = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."'");
		
		echo 2;
		
	}
	
}else{

echo 3; 

}
?>