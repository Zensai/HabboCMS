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

	if($core->ExploitRetainer($users->UserPermission('cms_manager_rank', $username)) == 1){

		$page = 'edit_rank';
		
		$permissionq = mysql_query("SELECT * FROM permissions_ranks WHERE rank = '".$core->ExploitRetainer($_POST['id'])."' LIMIT 1");
		$columns = mysql_num_fields($permissionq);
		$permission = mysql_fetch_array($permissionq);
		$permissionqq = mysql_query("SELECT * FROM ranks WHERE id = '".$core->ExploitRetainer($_POST['id'])."' LIMIT 1");
		$permission_name = mysql_fetch_array($permissionqq);
		
		for($i = 0; $i < $columns; $i++) { if(mysql_field_name($permissionq,$i)<>"rank"){
			
			$permissions = mysql_query("UPDATE permissions_ranks SET ".mysql_field_name($permissionq,$i)." = '".$core->ExploitRetainer($_POST[mysql_field_name($permissionq,$i)])."' WHERE rank = '".$core->ExploitRetainer($_POST['id'])."'");
			
		} }
		
		$query_name = mysql_query("UPDATE ranks SET name = '".$core->ExploitRetainer($_POST['name'])."' WHERE id = '".$core->ExploitRetainer($_POST['id'])."'");
		$query_id = mysql_query("UPDATE ranks SET id = '".$core->ExploitRetainer($_POST['edit_id'])."' WHERE id = '".$core->ExploitRetainer($_POST['id'])."'");
		$query_badgeid = mysql_query("UPDATE ranks SET badgeid = '".$core->ExploitRetainer($_POST['badgeid'])."' WHERE id = '".$core->ExploitRetainer($_POST['id'])."'");
		
		echo 1;
		
	}else{ echo 0; }
	
}else{ echo 0; }
?>