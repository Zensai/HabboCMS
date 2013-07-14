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
define('MAINTENANCE',FALSE);
include("../../includes/inc.global.php");
if($core->ExploitRetainer($core->CmsSetting('cms_maintenance')) == '0') {
	header("Location: /index");
	exit;
}
$page = 'maintenance';
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

	<title><?php echo $hotelname; ?> - <?php echo $language['maintenance']; ?></title>
	<?php echo $Style->Maintenance(); ?>

</head>

<body>

<script>
$(document).ready(function() {
    
	$(".onclickRedirect").click(function () {
		$("#overlowLoginContainer").fadeIn("slow");
	});
	
	$("#onclickCloseLoginContainer").click(function () {
		$("#overlowLoginContainer").fadeOut("slow");
	});

});
</script>

<div class="overlowContainer" id="overlowLoginContainer">

	<div class="container" style="width: 320px;">
		
		<div class="top"></div>
		
		<div id="onclickCloseLoginContainer" class="closeButton"></div>
		
		<div class="text">
		
			<form method="post" action="<?php echo HOST; ?>/login">
		
				<div class="containerFirst" style="margin-right: -30px;">
		
					<div class="insideContainer space">
			
						<label><ubuntu><?php echo $language['index_mail']; ?></ubuntu></label>
						<br>
						<input type="text" name="username" class="regField">
					
						<br>
						<br>
					
						<label><ubuntu><?php echo $language['index_password']; ?></ubuntu></label>
						<br>
						<input type="password" style="background-color: #FFFFFF;" name="password" class="regField">
						
						<input type="hidden" name="register" value="yes">
							
						<input style="margin-top: 10px;" type="submit" name="submit" class="submitRight" id="submitBlack" value="<?php echo $language['log_in']; ?>">
						
					</div>
			
				</div>
			
			</form>
				
		</div>
		
		<div class="bottom"></div>
		
	</div>

</div>

<div class="onclickRedirect left"></div>

<div class="overlow">

	<div class="inside">
		
		<img style="margin-top: 10px; margin-bottom: 10px;" src="<?php echo HOST; ?>/web-gallery/general/logo.gif">
		
		<div class="line"></div>
		
		<center><font style="font-weight: bold; font-size: 20px;"><?php echo $language['maintenance']; ?></font></center>
		
		<div style="padding-top: 10px;"></div>
		
		<font style="font-weight: bold; font-size: 16px;"><?php echo $language['maintenance_easy']; ?></font><br>
		<?php echo $core->CmsSetting('cms_maintenance_reason'); ?>
		

	</div>

</div>

</body>

</html>