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

	if($core->ExploitRetainer($users->UserPermission('cms_manager_give', $username)) == 1){

		$page = 'give';
		
		if($core->ExploitRetainer($_GET['type']) == 'Pixels'){
			
			if(isset($_POST['who']) && isset($_POST['value'])){
				
				if($core->ExploitRetainer($_POST['who']) == 'everyone'){
					
					$query_search_everyone_users = mysql_query("SELECT * FROM users");
					while($searched_everyone_users = mysql_fetch_array($query_search_everyone_users)){

						$new_pixels_everyone = $searched_everyone_users['activity_points'] + $core->ExploitRetainer($_POST['value']);
						$query_update_user_everyone = mysql_query("UPDATE users SET activity_points = '".$new_pixels_everyone."' WHERE id = '".$searched_everyone_users['id']."'");
						
					}
					echo 1;
					
				}
				
				if($core->ExploitRetainer($_POST['who']) == 'vips'){
					
					$query_search_vip_users = mysql_query("SELECT * FROM users WHERE vip = '1'");
					while($searched_vip_users = mysql_fetch_array($query_search_vip_users)){

						$new_pixels_vips = $searched_vip_users['activity_points'] + $core->ExploitRetainer($_POST['value']);
						$query_update_user_vip = mysql_query("UPDATE users SET activity_points = '".$new_pixels_vips."' WHERE id = '".$searched_vip_users['id']."'");
						
					}echo 1;
					
				}
				
				if($core->ExploitRetainer($_POST['who']) == 'user_online'){
					
					$query_search_online_users = mysql_query("SELECT * FROM users WHERE online = '1'");
					while($searched_online_users = mysql_fetch_array($query_search_online_users)){

						$new_pixels_online = $searched_online_users['activity_points'] + $core->ExploitRetainer($_POST['value']);
						$query_update_user_online = mysql_query("UPDATE users SET activity_points = '".$new_pixels_online."' WHERE id = '".$searched_online_users['id']."'");
						
					}echo 1;
					
				}
				
				if($core->ExploitRetainer($_POST['who']) == 'user'){
					
					$query_search_user = mysql_query("SELECT * FROM users WHERE username = '".$core->ExploitRetainer($_POST['who_user'])."' LIMIT 1");
					$searched_user = mysql_fetch_array($query_search_user);
					$new_pixels = $searched_user['activity_points'] + $core->ExploitRetainer($_POST['value']);
					$query_update_user = mysql_query("UPDATE users SET activity_points = '".$new_pixels."' WHERE id = '".$searched_user['id']."'");
					echo 1;
					
				}
	
			}else{ echo 0; }
		
		}
		
		if($core->ExploitRetainer($_GET['type']) == 'Credits'){
			
			if(isset($_POST['who']) && isset($_POST['value'])){
				
				if($core->ExploitRetainer($_POST['who']) == 'everyone'){
					
					$query_search_everyone_users = mysql_query("SELECT * FROM users");
					while($searched_everyone_users = mysql_fetch_array($query_search_everyone_users)){

						$new_credits_everyone = $searched_everyone_users['credits'] + $core->ExploitRetainer($_POST['value']);
						$query_update_user_everyone = mysql_query("UPDATE users SET credits = '".$new_credits_everyone."' WHERE id = '".$searched_everyone_users['id']."'");
						
					}echo 1;
					
				}
				
				if($core->ExploitRetainer($_POST['who']) == 'vips'){
					
					$query_search_vip_users = mysql_query("SELECT * FROM users WHERE vip = '1'");
					while($searched_vip_users = mysql_fetch_array($query_search_vip_users)){

						$new_credits_vips = $searched_vip_users['credits'] + $core->ExploitRetainer($_POST['value']);
						$query_update_user_vip = mysql_query("UPDATE users SET credits = '".$new_credits_vips."' WHERE id = '".$searched_vip_users['id']."'");
						
					}echo 1;
					
				}
				
				if($core->ExploitRetainer($_POST['who']) == 'user_online'){
					
					$query_search_online_users = mysql_query("SELECT * FROM users WHERE online = '1'");
					while($searched_online_users = mysql_fetch_array($query_search_online_users)){

						$new_credits_online = $searched_online_users['credits'] + $core->ExploitRetainer($_POST['value']);
						$query_update_user_online = mysql_query("UPDATE users SET credits = '".$new_credits_online."' WHERE id = '".$searched_online_users['id']."'");
						
					}echo 1;
					
				}
				
				if($core->ExploitRetainer($_POST['who']) == 'user'){
					
					$query_search_user = mysql_query("SELECT * FROM users WHERE username = '".$core->ExploitRetainer($_POST['who_user'])."' LIMIT 1");
					$searched_user = mysql_fetch_array($query_search_user);
					$new_credits = $searched_user['credits'] + $core->ExploitRetainer($_POST['value']);
					$query_update_user = mysql_query("UPDATE users SET credits = '".$new_credits."' WHERE id = '".$searched_user['id']."'");
					echo 1;
					
				}
	
			}else{ echo 0; }
		
		}
		
		if($core->ExploitRetainer($_GET['type']) == 'Eventpoints'){
			
			if(isset($_POST['who']) && isset($_POST['value'])){
				
				if($core->ExploitRetainer($_POST['who']) == 'everyone'){
					
					$query_search_everyone_users = mysql_query("SELECT * FROM users");
					while($searched_everyone_users = mysql_fetch_array($query_search_everyone_users)){

						$new_eventpoints_everyone = $searched_everyone_users['vip_points'] + $core->ExploitRetainer($_POST['value']);
						$query_update_user_everyone = mysql_query("UPDATE users SET vip_points = '".$new_eventpoints_everyone."' WHERE id = '".$searched_everyone_users['id']."'");
						
					}echo 1;
					
				}
				
				if($core->ExploitRetainer($_POST['who']) == 'vips'){
					
					$query_search_vip_users = mysql_query("SELECT * FROM users WHERE vip = '1'");
					while($searched_vip_users = mysql_fetch_array($query_search_vip_users)){

						$new_eventpoints_vips = $searched_vip_users['vip_points'] + $core->ExploitRetainer($_POST['value']);
						$query_update_user_vip = mysql_query("UPDATE users SET vip_points = '".$new_eventpoints_vips."' WHERE id = '".$searched_vip_users['id']."'");
						
					}echo 1;
					
				}
				
				if($core->ExploitRetainer($_POST['who']) == 'user_online'){
					
					$query_search_online_users = mysql_query("SELECT * FROM users WHERE online = '1'");
					while($searched_online_users = mysql_fetch_array($query_search_online_users)){

						$new_eventpoints_online = $searched_online_users['vip_points'] + $core->ExploitRetainer($_POST['value']);
						$query_update_user_online = mysql_query("UPDATE users SET vip_points = '".$new_eventpoints_online."' WHERE id = '".$searched_online_users['id']."'");
						
					}echo 1;
					
				}
				
				if($core->ExploitRetainer($_POST['who']) == 'user'){
					
					$query_search_user = mysql_query("SELECT * FROM users WHERE username = '".$core->ExploitRetainer($_POST['who_user'])."' LIMIT 1");
					$searched_user = mysql_fetch_array($query_search_user);
					$new_eventpoints = $searched_user['vip_points'] + $core->ExploitRetainer($_POST['value']);
					$query_update_user = mysql_query("UPDATE users SET vip_points = '".$new_eventpoints."' WHERE id = '".$searched_user['id']."'");
					echo 1;
					
				}
	
			}else{ echo 0; }
		
		}
		
		if($core->ExploitRetainer($_GET['type']) == 'Crystals'){
			
			if(isset($_POST['who']) && isset($_POST['value'])){
				
				if($core->ExploitRetainer($_POST['who']) == 'everyone'){
					
					$query_search_everyone_users = mysql_query("SELECT * FROM users");
					while($searched_everyone_users = mysql_fetch_array($query_search_everyone_users)){

						$new_crystals_everyone = $searched_everyone_users['crystals'] + $core->ExploitRetainer($_POST['value']);
						$query_update_user_everyone = mysql_query("UPDATE users SET crystals = '".$new_crystals_everyone."' WHERE id = '".$searched_everyone_users['id']."'");
						
					}echo 1;
					
				}
				
				if($core->ExploitRetainer($_POST['who']) == 'vips'){
					
					$query_search_vip_users = mysql_query("SELECT * FROM users WHERE vip = '1'");
					while($searched_vip_users = mysql_fetch_array($query_search_vip_users)){

						$new_crystals_vips = $searched_vip_users['crystals'] + $core->ExploitRetainer($_POST['value']);
						$query_update_user_vip = mysql_query("UPDATE users SET crystals = '".$new_crystals_vips."' WHERE id = '".$searched_vip_users['id']."'");
						
					}echo 1;
					
				}
				
				if($core->ExploitRetainer($_POST['who']) == 'user_online'){
					
					$query_search_online_users = mysql_query("SELECT * FROM users WHERE online = '1'");
					while($searched_online_users = mysql_fetch_array($query_search_online_users)){

						$new_crystals_online = $searched_online_users['crystals'] + $core->ExploitRetainer($_POST['value']);
						$query_update_user_online = mysql_query("UPDATE users SET crystals = '".$new_crystals_online."' WHERE id = '".$searched_online_users['id']."'");
						
					}echo 1;
					
				}
				
				if($core->ExploitRetainer($_POST['who']) == 'user'){
					
					$query_search_user = mysql_query("SELECT * FROM users WHERE username = '".$core->ExploitRetainer($_POST['who_user'])."' LIMIT 1");
					$searched_user = mysql_fetch_array($query_search_user);
					$new_crystals = $searched_user['crystals'] + $core->ExploitRetainer($_POST['value']);
					$query_update_user = mysql_query("UPDATE users SET crystals = '".$new_crystals."' WHERE id = '".$searched_user['id']."'");
					echo 1;
					
				}
	
			}else{ echo 0; }
		
		}
		
	}else{ echo 0; }
	
}else{ echo 0; }
?>