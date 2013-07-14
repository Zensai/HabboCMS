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

$typePageID = 'logout';

define('USER', FALSE); 
define('ACCOUNT', FALSE);
define('MAINTENANCE', FALSE);
include("../../includes/inc.global.php");
$query = mysql_query("UPDATE users SET online = '0' WHERE id = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."'");
setcookie("username", "", time());
setcookie("account", "", time());
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

	<title><?php echo $hotelname; ?> - Uitloggen</title>
	<?php echo $Style->General(); ?>

</head>

<body class="logoutBackground">

<div class="logoutInside">

	<img src="<?php echo HOST; ?>/web-gallery/general/logo.gif" style="margin-top: 50px;">

	<div class="containerMessage green" style="margin-top: 20px;">

		<?php echo $language['logout_message']; ?>

	</div>

	<a href="<?php echo HOST; ?>/index"><input type="submit" id="submitBlack" style="float: left; margin-top: 20px; margin-left: 230px;" value="<?php echo $language['ok']; ?>"></a>

</div>

</body>
</html>