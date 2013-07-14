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

if($core->ExploitRetainer($users->UserPermission('cms_manager_login', $username)) == 1){

	if($core->ExploitRetainer($users->UserPermission('cms_manager_poll', $username)) == 1){

		$page = 'edit_poll';
		
		if(isset($_GET['reset']) && $core->ExploitRetainer($_GET['reset']) == 'true'){

			if(isset($_POST['question']) && isset($_POST['answerOne']) && isset($_POST['answerTwo'])){

				$query = mysql_query("UPDATE cms_poll SET question = '".$core->ExploitRetainer($_POST['question'])."', answerOne = '".$core->ExploitRetainer($_POST['answerOne'])."', answerTwo = '".$core->ExploitRetainer($_POST['answerTwo'])."', voteOne = '0', voteTwo = '0'");
				$query = mysql_query("DELETE FROM cms_poll_ips");
				echo 1;
			}else{ echo 0; }
		
		}elseif(isset($_GET['reset']) && $core->ExploitRetainer($_GET['reset']) == 'false'){
		
			if(isset($_POST['question']) && isset($_POST['answerOne']) && isset($_POST['answerTwo'])){

				$query = mysql_query("UPDATE cms_poll SET question = '".$core->ExploitRetainer($_POST['question'])."', answerOne = '".$core->ExploitRetainer($_POST['answerOne'])."', answerTwo = '".$core->ExploitRetainer($_POST['answerTwo'])."'");
				echo 1;
			}else{ echo 0; }
		
		}
		
	}else{ echo 0; }
	
}else{ echo 0; }
?>