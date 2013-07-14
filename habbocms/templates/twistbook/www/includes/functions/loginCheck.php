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

define('USER', FALSE); 
define('ACCOUNT', FALSE);
define('MAINTENANCE', TRUE);

include('../../includes/inc.global.php');

if(isset($_POST['username'])){

	if(isset($_POST['password'])){
	
		$username = $core->ExploitRetainer($_POST['username']);
		$password = encrypt($core->ExploitRetainer($_POST['password']));
		
		$query_user = mysql_query("SELECT * FROM users WHERE username = '".$username."' OR mail = '".$username."' ORDER BY last_online DESC LIMIT 1");
		$user = mysql_fetch_array($query_user);
		
		if(mysql_num_rows($query_user) > 0){ $username_exists = 'yes'; }else{ $username_exists = 'no'; }
		
		if($username_exists == 'yes'){ $username_exists_check = 'yes'; }elseif($username_exists == 'no'){ echo 0; return; }
		
		if($password == $user['password']){ $password_correct = 'yes'; }else{ $password_correct = 'no'; }
		
		if($password_correct == 'yes'){ $password_correct_check = 'yes'; }elseif($password_correct == 'no'){ echo 1; return; }
		
		if($username_exists_check == 'yes' && $password_correct_check == 'yes'){ echo $user['look']; return; }
	
	}
	
}
?>