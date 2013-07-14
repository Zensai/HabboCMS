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

$menu = 'credits';
$page = 'credits';
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

	<title><?php echo $hotelname; ?> - <?php echo $language['menu_credits']; ?></title>
	<?php echo $Style->General(); ?>

	<?php echo $themeswitcher; ?>

</head>

<body onkeydown="onKeyDown()">

<?php include("apps/float_includes.php"); ?>
<?php include("apps/system/float_includes.php"); ?>

<?php include("apps/system/header_top.php"); ?>

<div id="container">
	
	<div id="middleContainer">
	
		<?php include("apps/system/container_header.php"); ?>

		<div id="containerMiddle">
			
			<?php if(isset($_COOKIE['username'])){ ?>
			
				<div id="containerSpace"></div>
		
				<div class="creditsInfoBoxGrey">
			
					<div class="inside">
				
						<div class="countBox">
					
							<div class="textCountBox">
						
								<b><?php echo $core->ExploitRetainer($users->UserInfo($username, 'username')); ?></b><br>
								<?php echo $language['balance']; ?>
							
							</div>
					
							<center>
							
								<div class="credit"></div>
						
								<div class="nextCredit"><?php echo $core->ExploitRetainer($users->UserInfo($username, 'credits')); ?></div>
					
							</center>
							
						</div>
				
					</div>
				
				</div>
			
			<?php } ?>

			<div id="containerLeft">
				
				<div id="containerSpace"></div>

				<div class="boxContainer rounded">
					
					<div class="boxHeader left rounded orange"><ubuntu><?php echo $language['menu_credits']; ?></ubuntu></div>
						
					<div class="creditsInfoBackground">
					
						<div class="textCont">
							<div class="top"><div style="padding-top: 35px;"><?php echo $language["credits_title"]; ?></div></div>
							<div class="bottom"><?php echo $language["credits_title"]; ?></div>
						</div>
					
					</div>

				</div>
				
			</div>

			<div id="containerRight">
				
				<div id="containerSpace"></div>
				
				<div class="boxContainer rounded">
				
					<div class="boxHeader right rounded green"><ubuntu><?php echo $language['credits_what_title']; ?></ubuntu></div>
					
					<?php echo $language['credits_what_text']; ?>
				
				</div>

			</div>

		</div>
	
	</div>

</div>

</body>
</html>