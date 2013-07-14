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

$menu = 'safety';
$page = 'safety';
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

	<title><?php echo $hotelname; ?> - <?php echo $language['menu_safety']; ?></title>
	<?php echo $Style->General(); ?>

	<?php echo $themeswitcher; ?>

</head>

<!--- <?php echo $language['']; ?> --->

<body onkeydown="onKeyDown()">

<?php include("apps/float_includes.php"); ?>
<?php include("apps/system/float_includes.php"); ?>

<?php include("apps/system/header_top.php"); ?>

<div id="container">
	
	<div id="middleContainer">
	
		<?php include("apps/system/container_header.php"); ?>

		<div id="containerMiddle">
				
			<div id="containerSpace"></div>

			<div class="boxContainer rounded">
					
				<div class="boxHeader big rounded blue"><ubuntu><?php echo $language['menu_safety']; ?></ubuntu></div>
						
				<b><?php echo $language['why_safety']; ?></b><br>
                <?php echo $language['why_safety_second']; ?><br><br>
                
                <div class="safetyBox">
                
                	<img align="left" style="margin-right: 15px;" src="<?php echo HOST; ?>/web-gallery/general/safety/page_0.gif">
                    
                    <div class="safetyBoxText">
                
                		<b><?php echo $language['safety_why_0']; ?></b><br>
                		<?php echo $language['safety_why_0_second']; ?>
                    
                    </div>
                
                </div>
                
                <div class="safetyBox space">
                
                	<img align="left" style="margin-right: 15px;" src="<?php echo HOST; ?>/web-gallery/general/safety/page_1.gif">
                    
                    <div class="safetyBoxText">
                
                		<b><?php echo $language['safety_why_1']; ?></b><br>
                		<?php echo $language['safety_why_1_second']; ?>
                    
                    </div>
                
                </div>
                
                <div class="safetyBox">
                
                	<img align="left" style="margin-right: 15px;" src="<?php echo HOST; ?>/web-gallery/general/safety/page_2.gif">
                    
                    <div class="safetyBoxText">
                
                		<b><?php echo $language['safety_why_2']; ?></b><br>
                		<?php echo $language['safety_why_2_second']; ?>
                    
                    </div>
                
                </div>
                
                <div class="safetyBox space">
                
                	<img align="left" style="margin-right: 15px;" src="<?php echo HOST; ?>/web-gallery/general/safety/page_3.gif">
                    
                    <div class="safetyBoxText">
                
                		<b><?php echo $language['safety_why_3']; ?></b><br>
                		<?php echo $language['safety_why_3_second']; ?>
                    
                    </div>
                
                </div>
                
                <div class="safetyBox">
                
                	<img align="left" style="margin-right: 15px;" src="<?php echo HOST; ?>/web-gallery/general/safety/page_4.gif">
                    
                    <div class="safetyBoxText">
                
                		<b><?php echo $language['safety_why_4']; ?></b><br>
                		<?php echo $language['safety_why_4_second']; ?>
                    
                    </div>
                
                </div>
                
                <div class="safetyBox space">
                
                	<img align="left" style="margin-right: 15px;" src="<?php echo HOST; ?>/web-gallery/general/safety/page_5.gif">
                    
                    <div class="safetyBoxText">
                
                		<b><?php echo $language['safety_why_5']; ?></b><br>
                		<?php echo $language['safety_why_5_second']; ?>
                    
                    </div>
                
                </div>
                
                <div class="safetyBox space">
                
                	<img align="left" style="margin-right: 15px;" src="<?php echo HOST; ?>/web-gallery/general/safety/page_6.gif">
                    
                    <div class="safetyBoxText">
                
                		<b><?php echo $language['safety_why_6']; ?></b><br>
                		<?php echo $language['safety_why_6_second']; ?>
                    
                    </div>
                
                </div>

			</div>

		</div>
	
	</div>

</div>

</body>
</html>