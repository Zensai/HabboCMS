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
$page = 'terms_of_use';
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

	<title><?php echo $hotelname; ?> - Terms and Conditions</title>
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

					<div class="boxHeader big rounded blue"><ubuntu>Terms & Conditions</ubuntu></div>
                    
                    <b>THESE TERMS AND CONDITIONS APPLY TO THE ENTIRE HOTEL. FAILING TO FOLLOW THESE TERMS AND CONDITIONS WILL LEAD TO CONSEQUENCES</b><br><br>
                    <b>1. USE OF THE WEBSITE</b><br>
                    Once you've registered to the hotel, you sign an invisible contract that you're not a member of <b>TTG Sulake B.V.</b> or <b>Habbo Hotel incorporated</b>, you'll also agree to not take or copy any of the content without the permission of the webmaster.<br><br>
                    <b>2. USERS OF THE WEBSITE</b><br>
                    2.1 You'll behave appropriately on the hotel and on the website as everyone else would. Failing to do so will lead to consequences of which will be decided by an appropriate staff member.<br>
                    2.2 You'll not ask if there are any vacancies open for the hotel or anything related to the hotel itself. You will be notified if we're seeking for any employees.<br>
                    2.3 You'll not hack/or attempt to hack anything associated with the hotel under any circonstances or break/attempt to break any rules on purpose.<br>
                    2.4 All our rights are reserved and we have every reason to punish you depending on our decisions.<br>
                    2.5 The hotel is copyright protected and breaching the copyright may lead to a court prosecution.<br>
                    2.6 We keep try to keep our content clean and so should you. You'll not forward your rude opinions or reactions towards the hotel/or anything associated with it.<br>
                    <br>
                    <b>3.DIAMONDS, SHELLS, FURNITURE AND FREE CREDITS</b><br>
                    We may give away free diamonds, shells, furniture and credits during events and no charge of fee. However, we do charge for purchases of diamonds (this excludes events). Credits and Shells will also be issued upon timely basis. Furniture may be purchased via the catalogue or traded with other users of the Habmi hotel.<br>
                    <br>
                    <b>4. PAYMENTS</b><br>
                    4.1 General: By making a payment towards Habmi, you agree that you’ve got permission from the bill payer to use the payment card or third-party application to pay for the goods or services provided by Habmi.<br>
					4.2 Refunds: We offer no refunds on the donations that you’ve made. When making a payment to Habmi, you accept the terms that you’ve got an understanding that no refunds will be issued under your decision and refunds may only be issued on the decision of an appropriate staff member.<br>
					4.3 Chargebacks: By donating to Habmi you agree that no charge back or similar action as such will be made and if so, the third-party webmasters will have the right to proceed the charged back money back to Habmis vault. Chargeback of a payment go against the Habmi policy and such action will lead with well-chosen consequences (most likely an IP ban). <br>
                    <br>
                    <b>5. JOBS AND /OR APPLICATIONS</b><br>
                    When we're looking for employees, we'll usually make sure everyone is notified that we've got a free vacancy. However, this doesn't mean that everyone will get a position, as you've got to kepe in mind that we're limited. If you application isn't successful, don't complain as no seconds thoughts will be made (and you may not be notified).<br>
                    <br>
                    <b>6. PERSONAL INFORMATION</b><br>
                    Most of the personal data that is filled in upon registration is esured to be safe, however it's not our responsibility for your personal datas leakage on the hotel. It's your responsibility to protect your data and not hand it out. For more information visit the <a href="<?php echo HOST; ?>/safety" style="color: #000000;">Safety</a> page. The page explains how to protect your data and any other secret information regarding to you.<br>
                    <br>
                    <b>7. BEHAVIOUR IN THE HOTEL</b><br>
                    7.1 No hotel advertising. This includes typing a hotels URL into any sentance.<br>
					7.2 No name calling is allowed.<br>
					7.3 No racism or cyber-bullying is allowed.<br>
					7.4 No hotel or user threats are allowed.<br>
					7.5 No exploiting the hotel is allowed.<br>
					7.6 No scamming and/or hacking is allowed.<br>
					7.7 No inappropriate words within your username.<br>
					7.8 No username which start within staff position (admin, moderator, expert).<br>
					7.9 No declaring yourself as a staff member (if you're not one).<br>
                    <br>
                    <b>8. THE FORUM</b><br>
                    8.1 It's prohibited to advertise your own site/or hotel or place any metatags related to your website/hotel.<br>
                    8.2 Deal with the forums yourself and the way you want to. However, don't double post on the same topic.<br>
                    8.3 Rude behavior in the forum is prohibited. For that, you'll get warned, if not banned.<br>
                    <br>
                    <b>9. COOKIES</b><br>
                    Our site uses cookies. These cookies are stored on your computer, because they contain information that is used throughout the website and are only accessible by you. We use cookies to increase our security on the website. We guarantee that the cookies won't harm you, your computer or any of the information which is stored on your computer.<br>
                    <br>
                    <b>11. VIP</b><br>
                    Misuse of any of the VIP features may lead to VIP removal. If your VIP is removed for misuse, it will be removed permanently with no questions asked. No diamonds will be refunded as you're responsible for your actions on this hotel. Depending on how serious the misuse is, it may also lead to a hotel punishment such as a ban. If you've got furthur question regarding to this, please contact a staff member for more detailed explanation.
					<br>
                    <b>12. STAFF MISUSE, ABUSE AND UNFAIRNESS</b><br>
                    If you believe a staff member is misusing, abussing any of their features or being unfair, please email an Administrator via the email or speak to an Administrator on the hotel in private. <i><b>Email: admin@habmi.com</b></i>. Your report will be kept confidential between you and the Administrators.

				</div>
				
			</div>

		</div>
	
	</div>

</div>

</body>
</html>

	