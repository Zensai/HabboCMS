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
include("../includes/inc.global.php");

$query = mysql_query("UPDATE users SET online = '0' WHERE id = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."'");
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

	<title><?php echo $hotelname; ?> - <?php echo $language['disconnected_client']; ?></title>
	<?php echo $Style->newIndex(); ?>

</head>

<body onkeydown="onKeyDown()">

<?php if(isset($_GET['id']) == 'disconnected' && $core->ExploitRetainer($_GET['id']) == 'disconnected'){ ?>

<div class="registerContainer" style="display: block; margin-top: 50px;">

	<div class="registerBox" style="margin-top: 100px;">
	
		<div class="topTitle">
		
			<div class="first"><ubuntu><?php echo $language['index_lobby_age_problem_title']; ?></ubuntu></div>
			
			<div class="second"><ubuntu><?php echo $language['disconnected_client_title']; ?></ubuntu></div>
			
		</div>
		
		<div class="containerRegister">
			
			<div class="middle">
			
				<div class="boldTitle"><ubuntu><?php echo $language['index_lobby_age_problem_text_title']; ?></ubuntu></div>
				
				<div class="textText"><?php echo $language['disconnected_client_title_second']; ?></div>
			
			</div>
		
		</div>
		
	</div>

</div>

<?php } ?>

<?php if(isset($_GET['id']) == 'closed' && $core->ExploitRetainer($_GET['id']) == 'closed'){ ?>

<div class="registerContainer" style="display: block;">

	<div class="registerBox" style="margin-top: 100px;">
	
		<div class="topTitle">
		
			<div class="first"><ubuntu><?php echo $language['index_lobby_age_problem_title']; ?></ubuntu></div>
			
			<div class="second"><ubuntu><?php echo $language['disconnected_client_closed_title']; ?></ubuntu></div>
			
		</div>
		
		<div class="containerRegister">
			
			<div class="middle">
			
				<div class="boldTitle"><ubuntu><?php echo $language['index_lobby_age_problem_text_title']; ?></ubuntu></div>
				
				<div class="textText"><?php echo $language['disconnected_client_closed_title_second']; ?></div>
			
			</div>
		
		</div>
		
	</div>

</div>

<?php } ?>

<?php if(isset($_GET['id']) == 'logout' && $core->ExploitRetainer($_GET['id']) == 'logout'){ ?>

<div class="registerContainer" style="display: block;">

	<div class="registerBox" style="margin-top: 100px;">
	
		<div class="topTitle">
		
			<div class="first"><ubuntu><?php echo $language['index_lobby_age_problem_title']; ?></ubuntu></div>
			
			<div class="second"><ubuntu><?php echo $language['disconnected_client_logout_title']; ?></ubuntu></div>
			
		</div>
		
		<div class="containerRegister">
			
			<div class="middle">
			
				<div class="boldTitle"><ubuntu><?php echo $language['index_lobby_age_problem_text_title']; ?></ubuntu></div>
				
				<div class="textText"><?php echo $language['disconnected_client_logout_title_second']; ?></div>
			
			</div>
		
		</div>
		
	</div>

</div>

<?php } ?>

<?php if(isset($_GET['id']) == 'no_connection' && $core->ExploitRetainer($_GET['id']) == 'no_connection'){ ?>

<div class="registerContainer" style="display: block;">

	<div class="registerBox" style="margin-top: 100px;">
	
		<div class="topTitle">
		
			<div class="first"><ubuntu><?php echo $language['index_lobby_age_problem_title']; ?></ubuntu></div>
			
			<div class="second"><ubuntu><?php echo $language['disconnected_client_no_connection_title']; ?></ubuntu></div>
			
		</div>
		
		<div class="containerRegister">
			
			<div class="middle">
			
				<div class="boldTitle"><ubuntu><?php echo $language['index_lobby_age_problem_text_title']; ?></ubuntu></div>
				
				<div class="textText"><?php echo $language['disconnected_client_no_connection_title_second']; ?></div>
			
			</div>
		
		</div>
		
	</div>

</div>

<?php } ?>

<?php if(isset($_GET['id']) == 'error' && $core->ExploitRetainer($_GET['id']) == 'error'){ ?>

<div class="registerContainer" style="display: block;">

	<div class="registerBox" style="margin-top: 100px;">
	
		<div class="topTitle">
		
			<div class="first"><ubuntu><?php echo $language['index_lobby_age_problem_title']; ?></ubuntu></div>
			
			<div class="second"><ubuntu><?php echo $language['disconnected_client_error_title']; ?></ubuntu></div>
			
		</div>
		
		<div class="containerRegister">
			
			<div class="middle">
			
				<div class="boldTitle"><ubuntu><?php echo $language['index_lobby_age_problem_text_title']; ?></ubuntu></div>
				
				<div class="textText"><?php echo $language['disconnected_client_error_title_second']; ?></div>
			
			</div>
		
		</div>
		
	</div>

</div>

<?php } ?>

<div class="container"></div>

</body>
</html>