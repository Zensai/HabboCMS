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
$page = 'rules';
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

	<title><?php echo $hotelname; ?> - <?php echo $language['menu_safety_rules']; ?></title>
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
				
			<div id="containerSpace"></div>

			<div class="boxContainer rounded">
					
				<div class="boxHeader big rounded blue"><ubuntu><?php echo $language['menu_safety_rules']; ?></ubuntu></div>
                
                <div style="margin-top: -20px;"></div>
                
                <div class="rulesBox">
                
                	<div class="rightRulesBox">
                    
                    	<div class="right"><?php echo $language['rules_0_correct']; ?></div><br>
                        
                        <?php echo $language['rules_0_correct_second']; ?>
                    
                    </div>
                
                	<div class="imgRulesCenter"><img src="<?php echo HOST; ?>/web-gallery/general/rules/page_0.gif"></div>
                    
                    <div class="wrongRulesBox">
                    
                    	<div class="wrong"><?php echo $language['rules_0_wrong']; ?></div><br>
                        
                       	<?php echo $language['rules_0_wrong_second']; ?>
                    
                    </div>
                    
                    <div class="rulesBox">
                
                	<div class="rightRulesBox">
                    
                    	<div class="right"><?php echo $language['rules_1_correct']; ?></div><br>
                        
                        <?php echo $language['rules_1_correct_second']; ?>
                    
                    </div>
                
                	<div class="imgRulesCenter"><img src="<?php echo HOST; ?>/web-gallery/general/rules/page_1.gif"></div>
                    
                    <div class="wrongRulesBox">
                    
                    	<div class="wrong"><?php echo $language['rules_1_wrong']; ?></div><br>
                        
                       	<?php echo $language['rules_1_wrong_second']; ?>
                    
                    </div>
                    
                    <div class="rulesBox">
                
                	<div class="rightRulesBox">
                    
                    	<div class="right"><?php echo $language['rules_2_correct']; ?></div><br>
                        
                        <?php echo $language['rules_2_correct_second']; ?>
                    
                    </div>
                
                	<div class="imgRulesCenter"><img src="<?php echo HOST; ?>/web-gallery/general/rules/page_2.gif"></div>
                    
                    <div class="wrongRulesBox">
                    
                    	<div class="wrong"><?php echo $language['rules_2_wrong']; ?></div><br>
                        
                       	<?php echo $language['rules_2_wrong_second']; ?>
                    
                    </div>
                    
                    <div class="rulesBox">
                
                	<div class="rightRulesBox">
                    
                    	<div class="right"><?php echo $language['rules_3_correct']; ?></div><br>
                        
                        <?php echo $language['rules_3_correct_second']; ?>
                    
                    </div>
                
                	<div class="imgRulesCenter"><img src="<?php echo HOST; ?>/web-gallery/general/rules/page_3.gif"></div>
                    
                    <div class="wrongRulesBox">
                    
                    	<div class="wrong"><?php echo $language['rules_3_wrong']; ?></div><br>
                        
                       	<?php echo $language['rules_3_wrong_second']; ?>
                    
                    </div>
                    
                    <div class="rulesBox">
                
                	<div class="rightRulesBox">
                    
                    	<div class="right"><?php echo $language['rules_4_correct']; ?></div><br>
                        
                        <?php echo $language['rules_4_correct_second']; ?>
                        
                    </div>
                
                	<div class="imgRulesCenter"><img src="<?php echo HOST; ?>/web-gallery/general/rules/page_4.gif"></div>
                    
                    <div class="wrongRulesBox">
                    
                    	<div class="wrong"><?php echo $language['rules_4_wrong']; ?></div><br>
                        
                       	<?php echo $language['rules_4_wrong_second']; ?>
                    
                    </div>
                
                </div>

			</div>

		</div>
	
	</div>

</div>

</body>
</html>