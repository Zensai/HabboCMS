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

	if($core->ExploitRetainer($users->UserPermission('cms_manager_alert', $username)) == 1){

		$page = 'alert';
		
		if($core->ExploitRetainer($_GET['type']) == 'Site'){
			
			if(isset($_POST['who']) && isset($_POST['message'])){
				
				if($core->ExploitRetainer($_POST['who']) == 'everyone'){
					
					$query_search_everyone_users = mysql_query("SELECT * FROM users");
					while($searched_everyone_users = mysql_fetch_array($query_search_everyone_users)){

						$query = mysql_query("INSERT INTO alerts (id, user_id, author_id, published, message) VALUES (NULL, '".$searched_everyone_users['id']."', '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."', UNIX_TIMESTAMP(), '".$core->ExploitRetainer($_POST['message'])."')");
						
					}echo 1;
					
				}
				
				if($core->ExploitRetainer($_POST['who']) == 'vips'){
					
					$query_search_vip_users = mysql_query("SELECT * FROM users WHERE vip = '1'");
					while($searched_vip_users = mysql_fetch_array($query_search_vip_users)){

						$query = mysql_query("INSERT INTO alerts (id, user_id, author_id, published, message) VALUES (NULL, '".$searched_vip_users['id']."', '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."', UNIX_TIMESTAMP(), '".$core->ExploitRetainer($_POST['message'])."')");
						
					}echo 1;
					
				}
				
				if($core->ExploitRetainer($_POST['who']) == 'user_online'){
					
					$query_search_online_users = mysql_query("SELECT * FROM users WHERE online = '1'");
					while($searched_online_users = mysql_fetch_array($query_search_online_users)){
						
						$query = mysql_query("INSERT INTO alerts (id, user_id, author_id, published, message) VALUES (NULL, '".$searched_online_users['id']."', '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."', UNIX_TIMESTAMP(), '".$core->ExploitRetainer($_POST['message'])."')");
						
					}echo 1;
					
				}
				
				if($core->ExploitRetainer($_POST['who']) == 'user'){
					
					$query_search_user = mysql_query("SELECT * FROM users WHERE username = '".$core->ExploitRetainer($_POST['who_user'])."' LIMIT 1");
					$searched_user = mysql_fetch_array($query_search_user);
					$query = mysql_query("INSERT INTO alerts (id, user_id, author_id, published, message) VALUES (NULL, '".$searched_user['id']."', '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."', UNIX_TIMESTAMP(), '".$core->ExploitRetainer($_POST['message'])."')");
					
				}echo 1;
	
			}else{ echo 0; }
		
		}
		
		if($core->ExploitRetainer($_GET['type']) == 'Hotel'){
			
			if(isset($_POST['who']) && isset($_POST['message'])){
				
				if($core->ExploitRetainer($_POST['who']) == 'everyone'){
					
					if($core->ExploitRetainer($users->UserPermission('cmd_ha', $username)) == 1){
						
						$core->ExploitRetainer($core->MUS('ha', $core->ExploitRetainer($_POST['message'])));
						echo 1;
						
					}else{ echo 0; }
					
				}
				
				if($core->ExploitRetainer($_POST['who']) == 'user'){
					
					if($core->ExploitRetainer($users->UserPermission('cmd_alert', $username)) == 1){
					
						$core->ExploitRetainer($core->MUS('alert', ''.$core->ExploitRetainer($_POST['who_user']).';'.$core->ExploitRetainer($_POST['message']).''));
						echo 1;
						
					}else{ echo 0; }
					
				}
				
			}else{ echo 0; }
			
		}
		
	}else{ echo 0; }
	
}else{ echo 0; }

?>