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

$menu = 'conditions';
$page = 'disclaimer';
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

	<title><?php echo $hotelname; ?> - Algemene voorwaarden</title>
	<?php echo $Style->General(); ?>

	<?php echo $themeswitcher; ?>

</head>

<body onkeydown="onKeyDown()">

<div class="overlowLoadingContainer loginSwitchOpenLoad" style="display: none;"><div class="overlowLoading"><div class="progressContainer"><div class="progress"></div><div class="loading"><?php echo $language['loading_login']; ?></div></div></div></div>

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

					<div class="boxHeader big rounded blue"><ubuntu>Disclaimer</ubuntu></div>
					<b>1. DONATIONS</b><br>
					<b>1.1 General</b>:
					By making a payment towards Habmi, you agree that you've got permission from the bill payer to use the payment card or third-party application to pay for the goods or services provided by Habmi.
					<br><br>
					<b>1.2 Refunds</b>:
					We offer no refunds on the donations that you've made. When making a payment to Habmi, you accept the terms that you've got an understanding that no refunds will be issued under your decision and refunds may only be issued on the decision of an appropriate staff member.
					<br><br>
					<b>1.3 Chargeback</b>:
					By donating to Habmi you agree that no charge back or similar action as such will be made and if so, the third-party webmasters will have the right to proceed the charged back money back to Habmis vault. Chargeback of a payment go against the Habmi policy and such action will lead with well-chosen consequences (most likely an IP ban).
				</div>
				
			</div>

		</div>
	
	</div>

</div>

</body>
</html>

	