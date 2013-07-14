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
include("../../includes/inc.global.php");

if(isset($_COOKIE['username'])){ header("Location: ".HOST."/me"); }

$query_ips = mysql_num_rows(mysql_query("SELECT * FROM users WHERE ip_reg = '".$_SERVER['REMOTE_ADDR']."'"));
if($query_ips >= $limit_ip_users){
	header("Location: ".HOST."/index/second/error/ip/overated");
}

$page = 'index';
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

	<title><?php echo $hotelname; ?></title>
	<?php echo $Style->Register(); ?>
	
</head>

<script>
$(document).ready(function() {
	
	$('.submitSecondStep').click(function() { 
		submitSecondStep('<?php echo HOST; ?>/quickregister/check/second');
	});
	
	function submitSecondStep(pageName) {
		$('.errorContainer').html('<div style="width: 43px; height: 11px; margin: auto; margin-top: 25px;"><img src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader-second.gif"></div>');
		$.ajax({
			type: "POST",
			url: "" + pageName,
			data: "birthday-day=" + $('#birthday-day').val() + "&birthday-month=" + $('#birthday-month').val() + "&birthday-year=" + $('#birthday-year').val() + "&gender=" + $('#gender').val() + "&email=" + $('.email').val() + "&password=" + $('.password').val() + "&passwordconf=" + $('.passwordconf').val() + "&look=" + $('#look').val() + "&username=" + $('#username').val(),
			success: function(php){
				$('.errorContainer').html(php);
			}
		});
	}
	
	$('.backtofirstDiv').click(function() {
		$('.overlowLoadingContainer').html('<div class="overlowLoading"><div class="progressContainer"><div class="progress"></div><div class="loading"><?php echo $language['loading_data']; ?></div></div></div>');
		setTimeout('document.backtofirstform.backtofirstButton.click()',1000);
		$('#loadEmailDetails').val($('.email').val());
		$('#loadPasswordDetails').val($('.password').val());
		$('#loadPasswordconfDetails').val($('.passwordconf').val());
	});
	
});
</script>

<body onkeydown="onKeyDown()">

<div class="overlowLoadingContainer"></div>

<div class="container">

	<div class="dotsContainer">

		<div class="dots default"></div>
	
		<div class="dots checked"></div>
	
		<div class="dots default"></div>
	
	</div>
	
	<div class="errorContainer"></div>
	
	<div class="inside">
	
		<div class="headerTitle"><?php echo $language['index_register_details']; ?></div>
		
		<div id="container">
		
			<div class="title left"><?php echo $language['index_register_mail']; ?></div>
			
			<input type="text" name="email" class="email" value="<?php if(isset($_POST['email']) && $core->ExploitRetainer($_POST['email'])){ echo $core->ExploitRetainer($_POST['email']); } ?>">
			
			<div class="description"><?php echo $language['index_register_mail_second']; ?></div>
			
			<div class="space"></div>
			
			<div class="title left"><?php echo $language['index_register_password']; ?></div>
			
			<input type="password" name="password" class="password" value="<?php if(isset($_POST['password']) && $core->ExploitRetainer($_POST['password'])){ echo $core->ExploitRetainer($_POST['password']); } ?>">
			
			<div class="description"><?php echo $language['index_register_password_second']; ?></div>
			
			<div class="space"></div>
			
			<div class="title left"><?php echo $language['index_register_passwordconf']; ?></div>
			
			<input type="password" name="passwordconf" class="passwordconf" value="<?php if(isset($_POST['passwordconf']) && $core->ExploitRetainer($_POST['passwordconf'])){ echo $core->ExploitRetainer($_POST['passwordconf']); } ?>">
			
			<div class="description"><?php echo $language['index_register_passwordconf_second']; ?></div>
		
		</div>
		
		<div id="buttonContainer">
		
			<form method="post" id="backtofirstform" name="backtofirstform" action="<?php echo HOST; ?>/quickregister/first">
			
				<input type="hidden" name="birthday-day" id="birthday-day" value="<?php echo $core->ExploitRetainer($_POST['birthday-day']); ?>">
				<input type="hidden" name="birthday-month" id="birthday-month" value="<?php echo $core->ExploitRetainer($_POST['birthday-month']); ?>">
				<input type="hidden" name="birthday-year" id="birthday-year" value="<?php echo $core->ExploitRetainer($_POST['birthday-year']); ?>">
				<input type="hidden" name="gender" id="gender" value="<?php echo $core->ExploitRetainer($_POST['gender']); ?>">
				<?php if(isset($_POST['email']) && $core->ExploitRetainer($_POST['email'])){ ?><input type="hidden" name="email" id="loadEmailDetails" value="<?php echo $core->ExploitRetainer($_POST['email']); ?>"><?php }else{ ?><input type="hidden" name="email" id="loadEmailDetails"><?php } ?>
				<?php if(isset($_POST['password']) && $core->ExploitRetainer($_POST['password'])){ ?><input type="hidden" name="password" id="loadPasswordDetails" value="<?php echo $core->ExploitRetainer($_POST['password']); ?>"><?php }else{ ?><input type="hidden" name="password" id="loadPasswordDetails"><?php } ?>
				<?php if(isset($_POST['passwordconf']) && $core->ExploitRetainer($_POST['passwordconf'])){ ?><input type="hidden" name="passwordconf" id="loadPasswordconfDetails" value="<?php echo $core->ExploitRetainer($_POST['passwordconf']); ?>"><?php }else{ ?><input type="hidden" name="passwordconf" id="loadPasswordconfDetails"><?php } ?>
				<?php if(isset($_POST['look']) && $core->ExploitRetainer($_POST['look'])){ ?><input type="hidden" name="look" id="look" value="<?php echo $core->ExploitRetainer($_POST['look']); ?>"><?php }else{ ?><input type="hidden" name="look" id="look"><?php } ?>
				<?php if(isset($_POST['username']) && $core->ExploitRetainer($_POST['username'])){ ?><input type="hidden" name="username" id="username" value="<?php echo $core->ExploitRetainer($_POST['username']); ?>"><?php }else{ ?><input type="hidden" name="username" id="username"><?php } ?>
		
				<div id="submitBlack" class="submitLeft backtofirstDiv"><?php echo $language['previous']; ?></div>
				
				<input type="submit" hidden="hidden" name="backtofirstButton" style="margin-top: -10000px;">
				
			<form>
		
			<div id="submitDarkBlue" class="submitRight submitSecondStep"><?php echo $language['next']; ?></div>
		
		</div>
		
	</div>

</div>

</body>

</html>