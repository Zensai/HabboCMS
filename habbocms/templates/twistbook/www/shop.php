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
include("includes/inc.global.php");

$menu = 'shop';
$page = 'shop';
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

	<title><?php echo $hotelname; ?> - <?php echo $language['menu_shop']; ?></title>
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

			<div id="containerLeft">
                
                <div id="containerSpace"></div>
				
				<div class="boxContainer rounded">

					<div class="boxHeader left rounded orange"><ubuntu><?php echo $language['shop_intro_title']; ?></ubuntu></div>
                    
                    <?php echo $language['shop_intor_title_second']; ?>
                    
                </div>

			</div>

			<div id="containerRight">
            
            	<div id="containerSpace"></div>
				
				<div class="creditsInfoBoxGrey" style="width: 281px;">
			
					<div class="inside">
				
						<div class="countBox" style="width: 243px;">
					
							<center>
								
								<div class="pixel"></div>
						
								<div class="nextCredit"><?php echo $core->ExploitRetainer($users->UserInfo($username, 'vip_points')); ?></div>
								
							</center>
					
						</div>
				
					</div>
				
				</div>

				<?php include("apps/widgets/buy_diamonds.php"); ?>
				
				<div id="containerSpace"></div>
				
				<div class="boxContainer rounded">

					<div class="boxHeader right rounded darkRed"><ubuntu><?php echo $language['poll_title']; ?></ubuntu></div>
				
					<?php include("apps/widgets/poll_widget.php"); ?>
				
				</div>

			</div>

		</div>
	
	</div>

</div>

</body>
</html>