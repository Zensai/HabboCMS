<?php
	if(LOGGEDIN) {
		header("Location: " . WWW . "/me");
		exit;
	}

	if($identity->maxClones()) {
		header("Location: " . WWW . "/index?maxclones");
		exit;
	}

	if(!isset($_SESSION['register.dob_day'], $_SESSION['register.dob_month'], $_SESSION['register.dob_year'], $_SESSION['register.gender'], $_SESSION['register.email'], $_SESSION['register.password'])) {
		header("Location: " . WWW . "/quickregister/second");
		exit;
	}

	new HabboTranslator('register3');
	$skin->styleset('register');
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
	<title>{sitename} - {$lang->register3.pagetitle}</title>
	{styleset}	
</head>

<script>
$(document).ready(function() {
	
	$('.submitThirdStep').click(function() { 
		submitThirdStep('{www}/quickregister/check/third');
	});
	
	function submitThirdStep(pageName) {
		$('.errorContainer').html('<div style="width: 43px; height: 11px; margin: auto; margin-top: 25px;"><img src="{webgallery}icons/ajax-loader-second.gif"></div>');
		$.ajax({
			type: "POST",
			url: pageName,
			data: "bean.look=" + $('#lookChooser').val() + "&bean.username=" + $('.username').val() + "&bean.tos=" + $('.tos:checked').val(),
			success: function(php){
				$('.errorContainer').html(php);
			}
		});
	}
	
	$('.backtosecondDiv').click(function() {
		$('.overlowLoadingContainer').html('<div class="overlowLoading"><div class="progressContainer"><div class="progress"></div><div class="loading">{$lang->general.page_loading}</div></div></div>');
		setTimeout('window.location.replace("{www}/quickregister/goto/second")', 1000);
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
	
		<div class="headerTitle">{$lang->register3.step_inside}</div>
		
		<div id="container">
		
			<div class="title">{$lang->register3.choose_outfit}:</div>
			
			<div class="genderChooserContainer" style="width: 406px;">
			
			<?php if($_SESSION['register.gender'] == 'M'){ ?>
			
				<div class="genderChooser" id="lookChooserBoyOne" style="margin-right: 20px;">
				
					<input type="hidden" class="lookChooserBoyOne" value="hr-165-45.hd-190-3.ch-255-73.lg-280-62.sh-295-62">
			
					<div class="inside">
			
						<div class="bgTop"></div>
						<div class="bgBottom"></div>
					
						<div class="gender-choice">
                            
							<img style="margin-top: -25px;" src="<?php echo $identity->avatarimage(array('figure' => 'hr-165-45.hd-190-3.ch-255-73.lg-280-62.sh-295-62', 'direction' => 4, 'gesture' => 'sml'), 'n/a'); ?>">
                   
						</div>
					
					</div>
			
				</div>
			
				<div class="genderChooser" id="lookChooserBoyTwo" style="margin-right: 20px;">
				
					<input type="hidden" class="lookChooserBoyTwo" value="hr-115-42.hd-195-3.ch-3030-62.lg-275-62.sh-295-66.ha-1005-66.ea-1406.fa-1204.wa-2001">
						
					<div class="inside">
			
						<div class="bgTop"></div>
						<div class="bgBottom"></div>
					
						<div class="gender-choice">
                            
							<img style="margin-top: -25px;" src="<?php echo $identity->avatarimage(array('figure' => 'hr-115-42.hd-195-3.ch-3030-62.lg-275-62.sh-295-66.ha-1005-66.ea-1406.fa-1204.wa-2001', 'direction' => 4, 'gesture' => 'sml'), 'n/a'); ?>">
                   
						</div>
					
					</div>
				
				</div>
				
				<div class="genderChooser" id="lookChooserBoyThree">
				
					<input type="hidden" class="lookChooserBoyThree" value="hr-165-33.hd-180-4.ch-3110-64-62.lg-281-64.sh-295-64.ea-1401-64.fa-1204">
						
					<div class="inside">
			
						<div class="bgTop"></div>
						<div class="bgBottom"></div>
					
						<div class="gender-choice">
                            
							<img style="margin-top: -25px;" src="<?php echo $identity->avatarimage(array('figure' => 'hr-165-33.hd-180-4.ch-3110-64-62.lg-281-64.sh-295-64.ea-1401-64.fa-1204', 'direction' => 4, 'gesture' => 'sml'), 'n/a'); ?>">
                   
						</div>
					
					</div>
				
				</div>
			
			<?php }elseif($_SESSION['register.gender'] == 'F'){ ?>
		
				<div class="genderChooser" id="lookChooserGirlOne" style="margin-right: 20px;">
				
					<input type="hidden" class="lookChooserGirlOne" value="hr-545-45.hd-600-4.ch-630-80.lg-3116-91-62.sh-730-62">
			
					<div class="inside">
			
						<div class="bgTop"></div>
						<div class="bgBottom"></div>
					
						<div class="gender-choice">
                            
							<img style="margin-top: -25px;" src="<?php echo $identity->avatarimage(array('figure' => 'hr-545-45.hd-600-4.ch-630-80.lg-3116-91-62.sh-730-62', 'direction' => 4, 'gesture' => 'sml'), 'n/a'); ?>">
                   
						</div>
					
					</div>
			
				</div>
			
				<div class="genderChooser" id="lookChooserGirlTwo" style="margin-right: 20px;">
				
					<input type="hidden" class="lookChooserGirlTwo" value="hr-540-45.hd-620-2.ch-630-73.lg-720-83.sh-725-62.fa-1211">
						
					<div class="inside">
			
						<div class="bgTop"></div>
						<div class="bgBottom"></div>
					
						<div class="gender-choice">
                            
							<img style="margin-top: -25px;" src="<?php echo $identity->avatarimage(array('figure' => 'hr-540-45.hd-620-2.ch-630-73.lg-720-83.sh-725-62.fa-1211', 'direction' => 4, 'gesture' => 'sml'), 'n/a'); ?>">
                   
						</div>
					
					</div>
				
				</div>
				
				<div class="genderChooser" id="lookChooserGirlThree">
				
					<input type="hidden" class="lookChooserGirlThree" value="hr-545-45.hd-620-4.ch-630-71.lg-715-76.sh-725-62">
						
					<div class="inside">
			
						<div class="bgTop"></div>
						<div class="bgBottom"></div>
					
						<div class="gender-choice">
							<img style="margin-top: -25px;" src="<?php echo $identity->avatarimage(array('figure' => 'hr-545-45.hd-620-4.ch-630-71.lg-715-76.sh-725-62', 'direction' => 4, 'gesture' => 'sml'), 'n/a'); ?>">
						</div>
					
					</div>
				
				</div>
			
			<?php } ?>
			
				<input type="hidden" id="lookChooser" name="look" value="" />
			
			</div>
		
		</div>
		
		<div id="line"></div>
		
		<div id="container">
		
			<div class="title left">{$lang->register3.username}:</div>
			
			<input type="text" name="username" class="username" value="<?php if(!empty($_SESSION['register.username'])) echo $_SESSION['register.username']; ?>" maxlength="15">
			
			<div class="description">{$lang->register3.username_desc}</div>

			<div class="left" style="margin-top: 12px"><input type="checkbox" name="tos" class="tos"> {$lang->register3.tos} <b><a target='new' style='color: #000000;' href='{www}/terms/of/use'>{$lang->register3.tos_terms}</a></b></div>
		
		</div>
		
		<div id="buttonContainer">
		
			<form method="post" id="backtosecondform" name="backtosecondform" action="{www}/quickregister/second">
			
				<div id="submitBlack" class="submitLeft backtosecondDiv">{$lang->register3.previous}</div>
				
				<input type="submit" hidden="hidden" name="backtosecondButton" style="margin-top: -10000px;">
				
			<form>
		
			<div id="submitDarkBlue" class="submitRight submitThirdStep">{$lang->register3.next}</div>
		
		</div>
		
	</div>

</div>

</body>

</html>