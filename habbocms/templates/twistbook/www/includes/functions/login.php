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
	
		if(isset($_GET['switchLogin']) && $core->ExploitRetainer($_GET['switchLogin'])){
			
			$username = $core->ExploitRetainer($_GET['username']);
			$password = $core->ExploitRetainer($_GET['password']); 
			
		}else{ 
		
			$username = $core->ExploitRetainer($_POST['username']);
			$password = encrypt($core->ExploitRetainer($_POST['password']));
			
		}
		
		$rand1 = rand(100000, 999999);
		$rand2 = rand(10000, 99999);
		$rand3 = rand(10000, 99999);
		$rand4 = rand(10000, 99999);
		$rand5 = rand(10000, 99999);
		$rand6 = rand(1, 9);
		$ticket = "ST-".$rand1."-".$rand2.$rand3."-".$rand4.$rand5."-twistbook-".$rand6;
		
		$query_usercheck = mysql_query("SELECT * FROM users WHERE username = '".$username."' ORDER BY last_online DESC");
		
		if(mysql_num_rows($query_usercheck) > 0){
		
			$query_user = mysql_query("SELECT * FROM users WHERE username = '".$username."' ORDER BY last_online DESC");
			$user = mysql_fetch_array($query_user);
			
			if($password == $user['password']){

				setcookie("username", $user['user_bind_id'], time()+10800);
				setcookie("account", $user['username'], time()+10800);
				setcookie("session", $ticket, time()+10800);
				
				$query = mysql_query("UPDATE users SET last_online = UNIX_TIMESTAMP(), ip_last = '".$users->getIp()."', session_ticket = '".$ticket."'  WHERE username = '".$user['username']."'");
				
				if(isset($_GET['switchLogin']) && $core->ExploitRetainer($_GET['switchLogin'])){
					
					header("Location: ".HOST."/me");
					
				}else{
					
					if(isset($_POST['register']) || $core->ExploitRetainer($_POST['register']) == 'yes'){ header("Location: ".HOST."/me"); }
				
					if(isset($_POST['destinationLink']) || $core->ExploitRetainer($_POST['destinationLink'])){ header("Location: ".$core->ExploitRetainer($_POST['destinationLink']).""); }
			
				}
				
				if(isset($_GET['switchLoginRedirect']) && $core->ExploitRetainer($_GET['switchLoginRedirect'])){ header("Location: ".HOST."/me"); }
				
			}
		
		}else{
		
			$query_userchecksecond = mysql_query("SELECT * FROM users WHERE mail = '".$username."' ORDER BY last_online DESC");
		
			if(mysql_num_rows($query_userchecksecond) > 0){
		
				$query_user = mysql_query("SELECT * FROM users WHERE mail = '".$username."' ORDER BY last_online DESC");
				$user = mysql_fetch_array($query_user);
			
				if($password == $user['password']){
			
					setcookie("username", $user['username'], time()+10800);
					setcookie("account", $user['mail'], time()+10800);
				
					$query = mysql_query("UPDATE users SET last_online = UNIX_TIMESTAMP(), ip_last = '".$users->getIp()."' WHERE username = '".$user['username']."'");
					
					if(isset($_GET['switchLogin']) && $core->ExploitRetainer($_GET['switchLogin'])){
					
						header("Location: ".HOST."/me");
					
					}else{
				
						if(isset($_POST['register']) || $core->ExploitRetainer($_POST['register']) == 'yes'){ header("Location: ".HOST."/me"); }
					
						if(isset($_POST['destinationLink']) || $core->ExploitRetainer($_POST['destinationLink'])){ header("Location: ".$core->ExploitRetainer($_POST['destinationLink']).""); }
						
					}
					
					if(isset($_GET['switchLoginRedirect']) && $core->ExploitRetainer($_GET['switchLoginRedirect'])){ header("Location: ".HOST."/me"); }
			
				}
			
			}else{

				if(isset($_GET['switchLogin']) && $core->ExploitRetainer($_GET['switchLogin'])){ 
					
					header("Location: ".HOST."/me");
					
				}else{
				
					if(isset($_POST['register']) || $core->ExploitRetainer($_POST['register']) == 'yes'){ header("Location: ".HOST.""); }
				
					if(isset($_POST['destinationLink']) || $core->ExploitRetainer($_POST['destinationLink'])){ header("Location: ".HOST.""); }
				
				}
				
				if(isset($_GET['switchLoginRedirect']) && $core->ExploitRetainer($_GET['switchLoginRedirect'])){ header("Location: ".HOST.""); }

			}
		
		}
	
	}
	
	if(isset($_GET['switchLogin']) && $core->ExploitRetainer($_GET['switchLogin'])){ 
					
		header("Location: ".HOST."/me");
					
	}else{
	
		if(isset($_POST['register']) || $core->ExploitRetainer($_POST['register']) == 'yes'){ header("Location: ".HOST.""); }
				
		if(isset($_POST['destinationLink']) || $core->ExploitRetainer($_POST['destinationLink'])){ header("Location: ".HOST.""); }
		
	}
	
	if(isset($_GET['switchLoginRedirect']) && $core->ExploitRetainer($_GET['switchLoginRedirect'])){ header("Location: ".HOST.""); }
	
}

if(isset($_GET['switchLogin']) && $core->ExploitRetainer($_GET['switchLogin'])){ header("Location: ".HOST."/me"); }else{ if(isset($_POST['username']) == NULL){ header("Location: ".HOST.""); } }

if(isset($_GET['switchLoginRedirect']) && $core->ExploitRetainer($_GET['switchLoginRedirect'])){ header("Location: ".HOST.""); }
?>