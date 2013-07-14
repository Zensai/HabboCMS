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
include("includes/inc.global.php");

$query_ban = mysql_query("SELECT * FROM bans WHERE id = '".$core->ExploitRetainer($_GET['banned_id'])."'");
$ban_count = mysql_num_rows($query_ban);
$ban = mysql_fetch_array($query_ban);
if($ban_count == 0){ header("Location: ".HOST."/index"); }
if($ban['value'] == $users->getIp() || $ban['value'] == $username){ }else{ header("Location: ".HOST."/index"); }
$page = 'index';
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

	<title><?php echo $hotelname; ?></title>
	<?php echo $Style->newIndex(); ?>


</head>

<body onkeydown="onKeyDown()">

<a class="overlowOutSideButton" style="margin-top: 10px; margin-left: 0px; font-size: 13px;" href="<?php echo HOST; ?>/index/second" style=""><b><u><ubuntu><?php echo $language['index_lobby_dont_work']; ?></ubuntu></u></b><div></div></a>

<div class="redirectClass"></div>

<div class="registerContainer registerAge" style="display: block; z-index: 5;">

	<div class="registerBox" style="margin-top: 100px;">
	
		<div class="topTitle">
		
			<div class="first"><ubuntu><?php echo $language['index_lobby_ban_problem_title']; ?></ubuntu></div>
			
			<div class="second"><ubuntu><?php echo $language['index_lobby_ban_problem_second']; ?></ubuntu></div>
			
		</div>
		
		<div class="containerRegister">
			
			<div class="middle">
			
				<div class="boldTitle"><ubuntu><?php echo $language['index_lobby_ban_problem_text_title']; ?></ubuntu></div>
				
				<div class="textText">
                
                	<?php echo str_replace(array('{username}', '{added_by}', '{expire}', '{reason}'), array($ban['value'], $ban['added_by'], strftime("%A %d %B %Y", $ban['expire']), $ban['reason']), $language['index_lobby_ban_problem_text_second']); ?>
                	
                </div>
			
			</div>
		
		</div>
		
	</div>

</div>

<div class="uberContainer" style="display: block;">

<div class="container">

	<div class="avatar"></div>
    
    <div class="wood"></div>
    
    <div class="wood2"></div>
	
	<div class="avatarResult"></div>
	
	<div class="avatarboy"></div>
	
	<div class="avatargirl"></div>
	
	<div class="tile"></div>
    
    <div class="walkToTile"><ubuntu><?php echo $language["index_lobby_walk"]; ?></ubuntu></div>
    
    <div class="userCount" style="margin-left: 545px; margin-top: 50px; position: fixed;">
    
    	<?php
    
    	if($userCounter == 0){ $userCounterIndex = "<ubuntu>".$language['index_lobby_no_users_online']."</ubuntu>";

		}elseif($userCounter == 1){ $userCounterIndex = "<ubuntu>".$language['index_lobby_1_users_online']."</ubuntu>";

		}elseif($userCounter > 1){ $userCounterIndex = "<ubuntu>".$language['index_lobby_more_users_online']."</ubuntu>";}
        
        ?>
	
		<div class="text">
		
			<div class="second" style="font-size: 18px; margin: -8px -5px -5px -5px; color: #FFFFFF; font-weight: bold;"><ubuntu><?php echo $userCounterIndex; ?></ubuntu></div>
			
		</div>
		
	</div>

</div>

</div>

</body>

</html>