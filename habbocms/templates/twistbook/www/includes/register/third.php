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
	
	$('.submitThirdStep').click(function() { 
		submitThirdStep('<?php echo HOST; ?>/quickregister/check/third');
	});
	
	function submitThirdStep(pageName) {
		$('.errorContainer').html('<div style="width: 43px; height: 11px; margin: auto; margin-top: 25px;"><img src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader-second.gif"></div>');
		$.ajax({
			type: "POST",
			url: "" + pageName,
			data: "birthday-day=" + $('#birthday-day').val() + "&birthday-month=" + $('#birthday-month').val() + "&birthday-year=" + $('#birthday-year').val() + "&gender=" + $('#gender').val() + "&email=" + $('#email').val() + "&password=" + $('#password').val() + "&passwordconf=" + $('#passwordconf').val() + "&look=" + $('#lookChooser').val() + "&username=" + $('.username').val(),
			success: function(php){
				$('.errorContainer').html(php);
			}
		});
	}
	
	$('.backtosecondDiv').click(function() {
		$('.overlowLoadingContainer').html('<div class="overlowLoading"><div class="progressContainer"><div class="progress"></div><div class="loading"><?php echo $language['loading_data']; ?></div></div></div>');
		setTimeout('document.backtosecondform.backtosecondButton.click()',1000);
		$('#loadLookDetails').val($('#lookChooser').val());
		$('#loadUsernameDetails').val($('.username').val());
	});
	
	$('#lookChooserGirlOne').click(function() {
        $('#lookChooser').val($('.lookChooserGirlOne').val());
		$(this).addClass('selected');
		$('#lookChooserGirlTwo').removeClass('selected');
		$('#lookChooserGirlThree').removeClass('selected');
    });

    $('#lookChooserGirlTwo').click(function() {
        $('#lookChooser').val($('.lookChooserGirlTwo').val());
		$(this).addClass('selected');
		$('#lookChooserGirlOne').removeClass('selected');
		$('#lookChooserGirlThree').removeClass('selected');
    });
	
	$('#lookChooserGirlThree').click(function() {
        $('#lookChooser').val($('.lookChooserGirlThree').val());
		$(this).addClass('selected');
		$('#lookChooserGirlOne').removeClass('selected');
		$('#lookChooserGirlTwo').removeClass('selected');
    });
	
	$('#lookChooserBoyOne').click(function() {
        $('#lookChooser').val($('.lookChooserBoyOne').val());
		$(this).addClass('selected');
		$('#lookChooserBoyTwo').removeClass('selected');
		$('#lookChooserBoyThree').removeClass('selected');
    });

    $('#lookChooserBoyTwo').click(function() {
        $('#lookChooser').val($('.lookChooserBoyTwo').val());
		$(this).addClass('selected');
		$('#lookChooserBoyOne').removeClass('selected');
		$('#lookChooserBoyThree').removeClass('selected');
    });
	
	$('#lookChooserBoyThree').click(function() {
        $('#lookChooser').val($('.lookChooserBoyThree').val());
		$(this).addClass('selected');
		$('#lookChooserBoyOne').removeClass('selected');
		$('#lookChooserBoyTwo').removeClass('selected');
    });
	
});
</script>

<body onkeydown="onKeyDown()">

<div class="overlowLoadingContainer"></div>

<div class="container">

	<div class="dotsContainer">

		<div class="dots default"></div>
	
		<div class="dots default"></div>
	
		<div class="dots checked"></div>
	
	</div>
	
	<div class="errorContainer"></div>
	
	<div class="inside">
	
		<div class="headerTitle"><?php echo $language['index_register_goinsidehotel']; ?></div>
		
		<div id="container">
		
			<div class="title"><?php echo $language['index_register_choose_outfit']; ?>:</div>
			
			<div class="genderChooserContainer" style="width: 406px;">
			
			<?php if(isset($_POST['gender']) && $core->ExploitRetainer($_POST['gender']) == 'M'){ ?>
			
				<div class="genderChooser <?php if(isset($_POST['look']) && $core->ExploitRetainer($_POST['look']) == 'hr-165-45.hd-190-3.ch-255-73.lg-280-62.sh-295-62'){ echo 'selected'; } ?>" id="lookChooserBoyOne" style="margin-right: 20px;">
				
					<input type="hidden" class="lookChooserBoyOne" value="hr-165-45.hd-190-3.ch-255-73.lg-280-62.sh-295-62">
			
					<div class="inside">
			
						<div class="bgTop"></div>
						<div class="bgBottom"></div>
					
						<div class="gender-choice">
                            
							<img style="margin-top: -25px;" src="<?php echo $avatarimage_url; ?>?figure=hr-165-45.hd-190-3.ch-255-73.lg-280-62.sh-295-62&direction=4&gesture=sml">
                   
						</div>
					
					</div>
			
				</div>
			
				<div class="genderChooser <?php if(isset($_POST['look']) && $core->ExploitRetainer($_POST['look']) == 'hr-115-42.hd-195-3.ch-3030-62.lg-275-62.sh-295-66.ha-1005-66.ea-1406.fa-1204.wa-2001'){ echo 'selected'; } ?>" id="lookChooserBoyTwo" style="margin-right: 20px;">
				
					<input type="hidden" class="lookChooserBoyTwo" value="hr-115-42.hd-195-3.ch-3030-62.lg-275-62.sh-295-66.ha-1005-66.ea-1406.fa-1204.wa-2001">
						
					<div class="inside">
			
						<div class="bgTop"></div>
						<div class="bgBottom"></div>
					
						<div class="gender-choice">
                            
							<img style="margin-top: -25px;" src="<?php echo $avatarimage_url; ?>?figure=hr-115-42.hd-195-3.ch-3030-62.lg-275-62.sh-295-66.ha-1005-66.ea-1406.fa-1204.wa-2001&direction=4&gesture=sml">
                   
						</div>
					
					</div>
				
				</div>
				
				<div class="genderChooser <?php if(isset($_POST['look']) && $core->ExploitRetainer($_POST['look']) == 'hr-165-33.hd-180-4.ch-3110-64-62.lg-281-64.sh-295-64.ea-1401-64.fa-1204'){ echo 'selected'; } ?>" id="lookChooserBoyThree">
				
					<input type="hidden" class="lookChooserBoyThree" value="hr-165-33.hd-180-4.ch-3110-64-62.lg-281-64.sh-295-64.ea-1401-64.fa-1204">
						
					<div class="inside">
			
						<div class="bgTop"></div>
						<div class="bgBottom"></div>
					
						<div class="gender-choice">
                            
							<img style="margin-top: -25px;" src="<?php echo $avatarimage_url; ?>?figure=hr-165-33.hd-180-4.ch-3110-64-62.lg-281-64.sh-295-64.ea-1401-64.fa-1204&direction=4&gesture=sml">
                   
						</div>
					
					</div>
				
				</div>
			
			<?php }elseif(isset($_POST['gender']) && $core->ExploitRetainer($_POST['gender']) == 'F'){ ?>
		
				<div class="genderChooser <?php if(isset($_POST['look']) && $core->ExploitRetainer($_POST['look']) == 'hr-545-45.hd-600-4.ch-630-80.lg-3116-91-62.sh-730-62'){ echo 'selected'; } ?>" id="lookChooserGirlOne" style="margin-right: 20px;">
				
					<input type="hidden" class="lookChooserGirlOne" value="hr-545-45.hd-600-4.ch-630-80.lg-3116-91-62.sh-730-62">
			
					<div class="inside">
			
						<div class="bgTop"></div>
						<div class="bgBottom"></div>
					
						<div class="gender-choice">
                            
							<img style="margin-top: -25px;" src="<?php echo $avatarimage_url; ?>?figure=hr-545-45.hd-600-4.ch-630-80.lg-3116-91-62.sh-730-62&direction=4&gesture=sml">
                   
						</div>
					
					</div>
			
				</div>
			
				<div class="genderChooser <?php if(isset($_POST['look']) && $core->ExploitRetainer($_POST['look']) == 'hr-540-45.hd-620-2.ch-630-73.lg-720-83.sh-725-62.fa-1211'){ echo 'selected'; } ?>" id="lookChooserGirlTwo" style="margin-right: 20px;">
				
					<input type="hidden" class="lookChooserGirlTwo" value="hr-540-45.hd-620-2.ch-630-73.lg-720-83.sh-725-62.fa-1211">
						
					<div class="inside">
			
						<div class="bgTop"></div>
						<div class="bgBottom"></div>
					
						<div class="gender-choice">
                            
							<img style="margin-top: -25px;" src="<?php echo $avatarimage_url; ?>?figure=hr-540-45.hd-620-2.ch-630-73.lg-720-83.sh-725-62.fa-1211&direction=4&gesture=sml">
                   
						</div>
					
					</div>
				
				</div>
				
				<div class="genderChooser <?php if(isset($_POST['look']) && $core->ExploitRetainer($_POST['look']) == 'hr-545-45.hd-620-4.ch-630-71.lg-715-76.sh-725-62'){ echo 'selected'; } ?>" id="lookChooserGirlThree">
				
					<input type="hidden" class="lookChooserGirlThree" value="hr-545-45.hd-620-4.ch-630-71.lg-715-76.sh-725-62">
						
					<div class="inside">
			
						<div class="bgTop"></div>
						<div class="bgBottom"></div>
					
						<div class="gender-choice">
                            
							<img style="margin-top: -25px;" src="<?php echo $avatarimage_url; ?>?figure=hr-545-45.hd-620-4.ch-630-71.lg-715-76.sh-725-62&direction=4&gesture=sml">
                   
						</div>
					
					</div>
				
				</div>
			
			<?php } ?>
			
				<input type="hidden" id="lookChooser" name="look" value="<?php if(isset($_POST['look']) && $core->ExploitRetainer($_POST['look'])){ echo $core->ExploitRetainer($_POST['look']); } ?>" />
			
			</div>
		
		</div>
		
		<div id="line"></div>
		
		<div id="container">
		
			<div class="title left"><?php echo $language['index_register_username']; ?>:</div>
			
			<input type="text" name="username" class="username" value="<?php if(isset($_POST['username']) && $core->ExploitRetainer($_POST['username'])){ echo $core->ExploitRetainer($_POST['username']); } ?>">
			
			<div class="description"><?php echo $language['index_register_username_second']; ?></div>
		
		</div>
		
		<div id="buttonContainer">
		
			<form method="post" id="backtosecondform" name="backtosecondform" action="<?php echo HOST; ?>/quickregister/second">
			
				<input type="hidden" name="birthday-day" id="birthday-day" value="<?php echo $core->ExploitRetainer($_POST['birthday-day']); ?>">
				<input type="hidden" name="birthday-month" id="birthday-month" value="<?php echo $core->ExploitRetainer($_POST['birthday-month']); ?>">
				<input type="hidden" name="birthday-year" id="birthday-year" value="<?php echo $core->ExploitRetainer($_POST['birthday-year']); ?>">
				<input type="hidden" name="gender" id="gender" value="<?php echo $core->ExploitRetainer($_POST['gender']); ?>">
				<input type="hidden" name="email" id="email" value="<?php echo $core->ExploitRetainer($_POST['email']); ?>">
				<input type="hidden" name="password" id="password" value="<?php echo $core->ExploitRetainer($_POST['password']); ?>">
				<input type="hidden" name="passwordconf" id="passwordconf" value="<?php echo $core->ExploitRetainer($_POST['passwordconf']); ?>">
				<?php if(isset($_POST['look']) && $core->ExploitRetainer($_POST['look'])){ ?><input type="hidden" name="look" id="loadLookDetails" value="<?php echo $core->ExploitRetainer($_POST['look']); ?>"><?php }else{ ?><input type="hidden" name="look" id="loadLookDetails"><?php } ?>
				<?php if(isset($_POST['username']) && $core->ExploitRetainer($_POST['username'])){ ?><input type="hidden" name="username" id="loadUsernameDetails" value="<?php echo $core->ExploitRetainer($_POST['username']); ?>"><?php }else{ ?><input type="hidden" name="username" id="loadUsernameDetails"><?php } ?>
		
				<div id="submitBlack" class="submitLeft backtosecondDiv"><?php echo $language['previous']; ?></div>
				
				<input type="submit" hidden="hidden" name="backtosecondButton" style="margin-top: -10000px;">
				
			<form>
		
			<div id="submitDarkBlue" class="submitRight submitThirdStep"><?php echo $language['next']; ?></div>
		
		</div>
		
	</div>

</div>

</body>

</html>