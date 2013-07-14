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

	if($core->ExploitRetainer($users->UserPermission('cms_manager_hotel', $username)) == 1){

		$page = 'edit_hotel';
		
		if(isset($_POST['type']) && $core->ExploitRetainer($_POST['type']) == 'general'){
			
			if(isset($_POST['cms_name']) && isset($_POST['cms_url']) && isset($_POST['cms_maintenance']) && isset($_POST['client_status']) && isset($_POST['cms_announcement']) && isset($_POST['cms_sollicitation']) && isset($_POST['cms_theme'])){
				
				$query = mysql_query("UPDATE cms_settings SET value = '".$core->ExploitRetainer($_POST['cms_name'])."' WHERE variable = 'cms_name'");
				$query = mysql_query("UPDATE cms_settings SET value = '".$core->ExploitRetainer($_POST['cms_url'])."' WHERE variable = 'cms_url'");
				$query = mysql_query("UPDATE cms_settings SET value = '".$core->ExploitRetainer($_POST['cms_maintenance'])."' WHERE variable = 'cms_maintenance'");
				$query = mysql_query("UPDATE cms_settings SET value = '".$core->ExploitRetainer($_POST['client_status'])."' WHERE variable = 'client_status'");
				$query = mysql_query("UPDATE cms_settings SET value = '".$core->ExploitRetainer($_POST['cms_announcement'])."' WHERE variable = 'cms_announcement'");
				$query = mysql_query("UPDATE cms_settings SET value = '".$core->ExploitRetainer($_POST['cms_sollicitation'])."' WHERE variable = 'cms_sollicitation'");
				$query = mysql_query("UPDATE cms_settings SET value = '".$core->ExploitRetainer($_POST['cms_theme'])."' WHERE variable = 'cms_theme'");
				
				echo 1;
			}else{ echo 0; }
			
		}
		
		if(isset($_POST['type']) && $core->ExploitRetainer($_POST['type']) == 'client'){
			
			if(isset($_POST['client_port']) && isset($_POST['client_mus']) && isset($_POST['client_ip']) && isset($_POST['client_variables']) && isset($_POST['client_texts']) && isset($_POST['client_swf']) && isset($_POST['client_habbo_swf'])){
				
				$query = mysql_query("UPDATE cms_settings SET value = '".$core->ExploitRetainer($_POST['client_port'])."' WHERE variable = 'client_port'");
				$query = mysql_query("UPDATE cms_settings SET value = '".$core->ExploitRetainer($_POST['client_mus'])."' WHERE variable = 'client_mus'");
				$query = mysql_query("UPDATE cms_settings SET value = '".$core->ExploitRetainer($_POST['client_ip'])."' WHERE variable = 'client_ip'");
				$query = mysql_query("UPDATE cms_settings SET value = '".$core->ExploitRetainer($_POST['client_variables'])."' WHERE variable = 'client_variables'");
				$query = mysql_query("UPDATE cms_settings SET value = '".$core->ExploitRetainer($_POST['client_texts'])."' WHERE variable = 'client_texts'");
				$query = mysql_query("UPDATE cms_settings SET value = '".$core->ExploitRetainer($_POST['client_swf'])."' WHERE variable = 'client_swf'");
				$query = mysql_query("UPDATE cms_settings SET value = '".$core->ExploitRetainer($_POST['client_habbo_swf'])."' WHERE variable = 'client_habbo_swf'");
					
				echo 1;
			}else{ echo 0; }
			
		}
		
	}else{ echo 0; }
	
}else{ echo 0; }
?>