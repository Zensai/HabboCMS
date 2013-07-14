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

$menu = 'about';
$page = 'about';
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

	<title><?php echo $hotelname; ?> - About us</title>
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

					<div class="boxHeader big rounded green"><ubuntu>About us</ubuntu></div>
                    
                    <b>How it all began</b><br>
					Once upon a time there was a guy called Ole. Ole had alot of experiance in coding various languages. He one day decided to make 
					something awesome (Habmi Hotel), he began developing a hotel. His objective was to create a successful hotel where everyone is 
					welcome and where everyone can have a great time relaxing with their friends and having fun playing the classical games. However, 
					he needed someone to look after the hotel and support him with ideas, along side various other things. So he hired someone with a 
					knowledgeable brain. As months flew by, Habmi began to gain player. However, back then Habmi was an English hotel. After good old 
					5 months or so, Habmi was re-created in a different language (Danish). The reason being is that we wanted to bring a unique and 
					high quality based hotel to another variety of people. Till what Habmi's now.<br>
					<br>
					<b>But what is Habmi?</b><br>
					Habmi is a virtual hotel where people all over the internet get along and have fun together. By enjoying relaxing with their friends to playing
					awesome games together. It's a friendly place where people can be creative and build what ever comes into their heads first. From houses to airport.
					We offer all members free credits, so they can enjoy creating their dreams, with their friends for free. <br>
					<br>
					<b>And the payment, why not just credits?</b><br>
					Habmi offers variety of currencies and one currency which you have to pay real money for, which is diamonds. We offer this currency 
					to keep the hotel safe and online. We're in need of support from you to keep the hotel up and running. The hotel runs under a server
					which costs monthly money and we need YOUR support to keep that server up. You may wonder how will you donating increase the safety? The 
					safety is increased as we rent another service which prevents the hotel from being attacked by people or bots as such. The service supports us by blocking
					any incoming connections which send too much data to our hotel. This is known as DDoS attacks and many hotels experiance down time problems 
					without this fortunate protection.<br>
					
				</div>
				
			</div>

		</div>
	
	</div>

</div>

</body>
</html>

	