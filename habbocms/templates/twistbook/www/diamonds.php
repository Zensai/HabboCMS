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
$page = 'pixels';
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

	<title><?php echo $hotelname; ?> - <?php echo $language['menu_credits_pixels']; ?></title>
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

				<div class="boxContainer rounded" style="background-image: url(<?php echo HOST; ?>/web-gallery/general/pixels/background.gif);">
					
					<div class="boxHeader left rounded blue"><ubuntu><?php echo $language['menu_credits_pixels']; ?></ubuntu></div>
						
					<ubuntu>
                    
                    	<div style="padding: 15px;">
                        
                        	<b style="font-size: 17px;"><?php echo $language['how_get_pixels']; ?></b><br><br>
                            
                            <div style="color: #171717; padding-left: 15px;">
                            
                            	<b><?php echo $language['pixels_reason_1']; ?></b><br>
                                <?php echo $language['pixels_reason_1_second']; ?><br><br>
                                
                                <b><?php echo $language['pixels_reason_2']; ?></b><br>
                                <?php echo $language['pixels_reason_2_second']; ?><br><br>
                                
                                <b><?php echo $language['pixels_reason_3']; ?></b><br>
                                <?php echo $language['pixels_reason_3_second']; ?><br><br><br><br>
                            
                            </div>
                        
                        </div>
                    
                    </ubuntu>
					
				</div>
				
			</div>

			<div id="containerRight">
			
				<?php if(isset($_COOKIE['username'])){ ?>
				
					<div id="containerSpace"></div>
				
					<div class="creditsInfoBoxGrey" style="width: 281px;">
			
						<div class="inside">
				
							<div class="countBox" style="width: 243px;">
					
								<div class="textCountBox">
						
									<b><?php echo $core->ExploitRetainer($users->UserInfo($username, 'username')); ?></b><br>
									<?php echo $language['balance']; ?>
							
								</div>
					
								<center>
								
									<div class="pixel"></div>
						
									<div class="nextCredit"><?php echo $core->ExploitRetainer($users->UserInfo($username, 'activity_points')); ?></div>
								
								</center>
					
							</div>
				
						</div>
				
					</div>
					
				<?php } ?>
			
				<div id="containerSpace"></div>
				
				<div class="boxContainer rounded">
				
					<div class="boxHeader right rounded green"><ubuntu><?php echo $language['what_are_pixels']; ?></ubuntu></div>
					
					<?php echo $language['what_are_pixels_text']; ?>
				
				</div>

			</div>

		</div>
	
	</div>

</div>

</body>
</html>