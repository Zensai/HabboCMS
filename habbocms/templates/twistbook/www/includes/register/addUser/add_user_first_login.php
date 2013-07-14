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
include('../../../includes/inc.global.php');

if(isset($_GET['username']))
{
	if(isset($_GET['password']))
	{
		$username = $core->ExploitRetainer($_GET['username']);
		$password = $core->ExploitRetainer($_GET['password']);
		$userq = mysql_query("SELECT * FROM users WHERE username ='".$username."' LIMIT 1;");
		if(mysql_num_rows($userq) > 0)
		{
			if($users->CheckBan($username))
			{
				header($users->BanInfo($username));
				die;
			}
			
			$userq = mysql_query("SELECT * FROM users WHERE username = '".$username."' LIMIT 1;");
			$user = mysql_fetch_array($userq);
			
			if($password == strtolower($user['password']))
			{
				
				setcookie("username", $user['user_bind_id'], time()+7200);
				setcookie("account", $user['username'], time()+7200);
				
				$query = mysql_query("UPDATE users SET last_online = UNIX_TIMESTAMP(), ip_last = '".$_SERVER['REMOTE_ADDR']."' WHERE username = '".$username."';");
				
				$query_ips = mysql_num_rows(mysql_query("SELECT * FROM users WHERE ip_reg = '".$_SERVER['REMOTE_ADDR']."'"));
				if($query_ips >= $limit_ip_users){ header("Location: ".HOST."/index/second/error/ip/overated"); }else{ header("Location: ".HOST."/me"); }
				
				return;
			}
			
		}
		else
		{
			$user = mysql_query("SELECT * FROM users WHERE mail ='".$username."'");
			if(mysql_num_rows($user) > 0)
			{
				$user = mysql_fetch_array($user);
				if($password == strtolower($user['password']))
				{
					setcookie("username", $user['username'], time()+7200);
					setcookie("account", $user['mail'], time()+7200);
					$query = mysql_query("UPDATE users SET last_online = UNIX_TIMESTAMP(), ip_last = '".$_SERVER['REMOTE_ADDR']."' WHERE username = '".$username."';");
					
					$query_ips = mysql_num_rows(mysql_query("SELECT * FROM users WHERE ip_reg = '".$_SERVER['REMOTE_ADDR']."'"));
					if($query_ips >= $limit_ip_users){ header("Location: ".HOST."/index/second/error/ip/overated"); }else{ header("Location: ".HOST."/me"); }
					
					return;
				}
			}
			else
			{
				header("Location: ".HOST."/index/error/username");
				return;
			}
		}
	}
	
	header("Location: ".HOST."/index/error/password");
	return;
}

header("Location: ".HOST."/index/error/username");
?>