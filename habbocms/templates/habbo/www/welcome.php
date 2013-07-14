<?php
	$core->requireLogin();
	if($users->data('newbie_status') != '1') {
		header("Location: " . WWW . "/client");
		exit;
	}
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
	<title>{sitename} - Welcome</title>
			<meta name="copyright" content="Twistbook PHP">
			<link rel="shortcut icon" href="http://www.febbo.nl/web-gallery/general/favicon.ico" type="image/vnd.microsoft.icon">
			<link rel="stylesheet" href="http://www.febbo.nl/web-gallery/styles/css/index.css" type="text/css">
			<link rel="stylesheet" href="http://www.febbo.nl/web-gallery/styles/css/buttons.css" type="text/css">
			<link rel="stylesheet" href="http://www.febbo.nl/web-gallery/styles/css/arrows.css" type="text/css">
			<link rel="stylesheet" href="http://www.febbo.nl/web-gallery/styles/css/float.css" type="text/css">
			<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
			<script src="http://www.febbo.nl/web-gallery/styles/js/cufon-yui.js" type="text/javascript"></script>
			<script src="http://www.febbo.nl/web-gallery/styles/js/ubuntu.font.js" type="text/javascript"></script>
			<script type="text/javascript">
				Cufon.replace("ubuntu");
			</script>		
			<style type="text/css">
				#registerUsername {
					background: url();
					background-repeat: no-repeat;
					background-position: right center; 
				}
			</style>
</head>
<body>
<script type="text/javascript">
$(document).ready(function() {
	setTimeout(function() { $(".indexWalkOver").fadeIn(300); }, 1000);
	
	$(".tile").click(function () {
		$('.avatar').css('background-image', 'url({webgallery}v2/images/welcome/walking_avatar.gif)');
		$('.avatar').animate({
			marginLeft: '427px',
			marginTop: '420px'
		}, 3000, function() {
			$('.avatar').css('width', '56px');
			$('.avatar').css('height', '94px');
			$('.avatar').css('background-image', 'url({webgallery}v2/images/welcome/avatar1.png)');
			$(".indexWalkOver").fadeOut("slow");
			$(".loginBoxQuestion").fadeIn("slow");
		});
		$('.tile').animate({
			opacity: '0',
			cursor: 'normal'
		}, 3000);
		$(".walkToTile").fadeOut("slow");
	});
	
	$(".onclickRegisterYes").click(function () {
		$(".loginBoxQuestion").fadeOut("slow");
		setTimeout(function() { 
			$(".registerBoxContainer").fadeIn("slow");
			check_name(); 
		}, 400);
	});
	
	$('#genderChooserBoy').click(function() {
        $('#genderChooser').val("M");
		$('#registerLook').val("hr-165-45.hd-190-3.ch-255-73.lg-280-62.sh-295-62");
		$(this).addClass('selected');
		$('#genderChooserGirl').removeClass('selected');
    });

    $('#genderChooserGirl').click(function() {
        $('#genderChooser').val("F");
		$('#registerLook').val("hr-545-45.hd-600-4.ch-630-80.lg-3116-91-62.sh-730-62");
		$(this).addClass('selected');
		$('#genderChooserBoy').removeClass('selected');
    });
	
	$(".onclickRegisterToFinish").click(function () {
		var min_chars = 3;
		var max_chars = 20;
		if($('#registerUsername').val().length < min_chars){
			$('#registerUsername').css('background-image', 'url({webgallery}v2/images/welcome/error.png)');
			$('.registerUsernameErrorNoValue').fadeIn("slow");
			setTimeout(function() { $('.registerUsernameErrorNoValue').fadeOut("slow"); }, 2500);
		}else{			
			if($('#registerUsername').val().length > max_chars){
				$('#registerUsername').css('background-image', 'url({webgallery}v2/images/welcome/error.png)');
				$('.registerUsernameErrorMaxValue').fadeIn("slow");
				setTimeout(function() { $('.registerUsernameErrorMaxValue').fadeOut("slow"); }, 2500);
			}else{
				check_username_available();
			}
		}
	});
		
});

function check_name() {
	var username = $('#registerUsername').val();
	if(username == '') {
		$('#registerUsername').css('background-image', 'url({webgallery}v2/images/welcome/error.png)');
		return false;
	}


	if(username.length < 3){
		$('#registerUsername').css('background-image', 'url({webgallery}v2/images/welcome/error.png)');
		return false;
	}else{			
		if(username.length > 15){
			$('#registerUsername').css('background-image', 'url({webgallery}v2/images/welcome/error.png)');
			$('.registerUsernameErrorMaxValue').fadeIn("slow");
			setTimeout(function() { $('.registerUsernameErrorMaxValue').fadeOut("slow"); }, 2500);
		}else{
			$('#registerUsername').css('background-image', 'url({webgallery}v2/images/welcome/loading.gif)');
			$.post("registration/usernamecheck", {username: username},
				function(result){
					if(result == 0){
						$('#registerUsername').css('background-image', 'url({webgallery}v2/images/welcome/ok.png)');
					}else{
						if(result == 0){
							$('#registerUsername').css('background-image', 'url({webgallery}v2/images/welcome/ok.png)');
						}else{
							if(result == 1){
								//signs							
								$('#registerUsername').css('background-image', 'url({webgallery}v2/images/welcome/error.png)');
								$('.registerUsernameErrorSigns').fadeIn('slow');
								setTimeout(function() { $('.registerUsernameErrorSigns').fadeOut('slow'); }, 2500);
							} else {
								if(result == 2) {
									//too short
									$('#registerUsername').css('background-image', 'url({webgallery}v2/images/welcome/error.png)');
									$('.registerUsernameErrorNoValue').fadeIn('slow');
									setTimeout(function() { $('.registerUsernameErrorNoValue').fadeOut('slow'); }, 2500);
								} else {
									if(result == 3) {
										//too long
										$('#registerUsername').css('background-image', 'url({webgallery}v2/images/welcome/error.png)');
										$('.registerUsernameErrorMaxValue').fadeIn('slow');
										setTimeout(function() { $('.registerUsernameErrorMaxValue').fadeOut('slow'); }, 2500);										
									} else {
										if(result == 4) {
											//allready exists
											$('#registerUsername').css('background-image', 'url({webgallery}v2/images/welcome/error.png)');
											$('.registerUsernameError').fadeIn('slow');
											setTimeout(function() { $('.registerUsernameError').fadeOut('slow'); }, 2500);
										} else {
											alert("Unexpected response:" + result);
										}
									}
								}
							}
						}
					}
			});			
		}
	}
}

function check_username_available(){
	var username = $('#registerUsername').val();
	if(username == '') {
		$('#registerUsername').css('background-image', 'url({webgallery}v2/images/welcome/error.png)');
		return false;
	}

	$.post("registration/usernamecheck", {username: username},
	function(result){
			if(result == 0){
				registration();
				$('.containerBoxRegisterStep1').fadeOut('slow');
			}else{
				if(result == 0){
					$('#registerUsername').css('background-image', 'url({webgallery}v2/images/welcome/ok.png)');
				}else{
					if(result == 1){
						//signs							
						$('#registerUsername').css('background-image', 'url({webgallery}v2/images/welcome/error.png)');
						$('.registerUsernameErrorSigns').fadeIn('slow');
						setTimeout(function() { $('.registerUsernameErrorSigns').fadeOut('slow'); }, 2500);
					} else {
						if(result == 2) {
							//too short
							$('#registerUsername').css('background-image', 'url({webgallery}v2/images/welcome/error.png)');
							$('.registerUsernameErrorNoValue').fadeIn('slow');
							setTimeout(function() { $('.registerUsernameErrorNoValue').fadeOut('slow'); }, 2500);
						} else {
							if(result == 3) {
								//too long
								$('#registerUsername').css('background-image', 'url({webgallery}v2/images/welcome/error.png)');
								$('.registerUsernameErrorMaxValue').fadeIn('slow');
								setTimeout(function() { $('.registerUsernameErrorMaxValue').fadeOut('slow'); }, 2500);										
							} else {
								if(result == 4) {
									//allready exists
									$('#registerUsername').css('background-image', 'url({webgallery}v2/images/welcome/error.png)');
									$('.registerUsernameError').fadeIn('slow');
									setTimeout(function() { $('.registerUsernameError').fadeOut('slow'); }, 2500);
								} else {
									alert("Unexpected response:" + result);
								}
							}
						}
					}
				}
			}
	});	
}

function registration(){
	var username = $('#registerUsername').val();
	
	$.post("registration/submit", {username: username},
		function(result){
			if(result == 0) {
				$('.registerBoxContainer').animate({
					opacity: 0
				}, 2000, function() {
					$(".greetings").fadeIn("fast");
					$(".avatar").fadeOut("slow");
					$(".avatarboy").fadeIn("slow");
					setTimeout(function() {
						$('.avatarboy').animate({ marginTop: '-200px', opacity: 0 }, 1500); 
						setTimeout(function() { document.location.href='{www}/client'; }, 1350);
					}, 4700);
				});
			} else {
				alert("Error changing your avatar name. Please try agian or click 'Skip this step'");
			}
			
	});

}
</script>

<!--<a class="overlowOutSideButton" style="margin-top: 10px; margin-left: 0px; font-size: 13px;" href="{www}/client?ignore" style=""><b><u><ubuntu>Klik ikke Her</ubuntu></u></b><div></div></a>-->

<div class="redirectClass"></div>

<div class="registerContainer registerBoxContainer">

	<div class="registerBox containerBoxRegisterStep1">
		<div class="floatBoxLoginGrey registerUsernameErrorNoValue" style="margin-left: -210px; margin-top: 215px; width: 190px;">		
			<div class="arrow"></div>
		
			<div class="text">				
				<div class="title"><ubuntu>Oops!</ubuntu></div>
				<div class="second"><ubuntu>Dit brugernavn er alt for kort.</ubuntu></div>				
			</div>		
		</div>
		
		<div class="floatBoxLoginGrey registerUsernameErrorMaxValue" style="margin-left: -210px; margin-top: 215px; width: 190px;">		
			<div class="arrow"></div>
		
			<div class="text">				
				<div class="title"><ubuntu>Oops!</ubuntu></div>
				<div class="second"><ubuntu>Dit brugernavn er alt for langt.</ubuntu></div>				
			</div>		
		</div>
		
		<div class="floatBoxLoginGrey registerUsernameError" style="margin-left: -210px; margin-top: 215px; width: 190px;">		
			<div class="arrow"></div>

			<div class="text">				
				<div class="title"><ubuntu>Oops!</ubuntu></div>
				<div class="second"><ubuntu>Det brugernavn findes allerede.</ubuntu></div>				
			</div>
		</div>
		
		<div class="floatBoxLoginGrey registerUsernameErrorSigns" style="margin-left: -210px; margin-top: 215px; width: 190px;">		
			<div class="arrow"></div>
		
			<div class="text">			
				<div class="title"><ubuntu>Oops!</ubuntu></div>
				<div class="second"><ubuntu>Dit burgernavn er ikke tilladt. Det m&aring; ikke starte med, mod-, adm- or bot-.</ubuntu></div>				
			</div>		
		</div>
	
		<div class="topTitle"><div class="second"><ubuntu>V&aelig;lg et navn nu</ubuntu></div></div>
		
		<div class="containerRegister">		
			<div class="bottlesBox">
				<div class="bottle selected"></div>
				<div class="space"></div>
				<div class="bottle"></div>
				<div class="space"></div>
				<div class="bottle"></div>
			</div>	
			<div class="line"></div>
			
			<div class="middle">			
				<div class="boldTitle"><ubuntu>Her under kan du &aelig;ndre dit brugernavn.</ubuntu></div>				
				<div class="textText">P&aring; {sitename}, har vi alle unikke navne, s&aring; skriv dit her. Der er ingen grund til at v&aelig;lge dit IRL navn - det g&oslash;r vi andre nemlig ikke.</div>				
				<input type="text" name="registerUsername" id="registerUsername" value="<?php echo $users->data('username'); ?>" onkeyup="check_name()">
				<div class="alertBox">				
					<div class="warnIcon"></div>
					<div class="warnText">
						<div class="warnText">N&aring;r du f&oslash;rst har valg navn vil du IKKE kunne skifte det tilbage.</div>				
					</div>					
				</div>			
			</div>
			<div class="line"></div>			
			<div class="buttonContainer"><center><a class="overlowButton onclickRegisterToFinish" style=""><b><u><ubuntu>Godkend og Forts&aelig;t</ubuntu></u></b><div></div></a></center></div>
		</div>		
	</div>
</div>

<div class="container">
	<div class="avatar"></div>   
    <div class="wood"></div>   
    <div class="wood2"></div>	
	<div class="avatarResult"></div>	
	<div class="avatarboy"></div>	
	<div class="avatargirl"></div>	
	<div class="tile"></div>    
    <div class="walkToTile"><ubuntu>Klik on den lysende flise ved disken.</ubuntu></div>    
    <div class="userCount" style="margin-left: 545px; margin-top: 50px; position: fixed;"><div class="text"><div class="second" style="font-size: 18px; margin: -8px -5px -5px -5px; color: #FFFFFF; font-weight: bold;"><ubuntu>{onlinecnt} {sitename}s online</ubuntu></div></div>		</div>
	
	<div class="floatBox indexWalkOver" style="margin-left: 390px; margin-top: 270px;">	
		<div class="text">		
			<div class="title"><ubuntu>HEJ DU!</ubuntu></div>
			<div class="second"><ubuntu>Kom herhen og min ven !</ubuntu></div>			
		</div>
		
		<div class="arrow"></div>		
	</div>

	<div class="floatBox loginBoxQuestion" style="margin-left: 308px; margin-top: 154px;">	
		<div class="text">
			<div class="title"><ubuntu>Godt arbejde!</ubuntu></div>
			<div class="second"><ubuntu>Velkommen til {fullname}. :)</ubuntu><br><br>Nu du er kommet helt hertil s&aring; lad os forts&aelig;tte.<br>N&aelig;ste step er ret sjovt og tager ingen tid<br> s&aring; skal vi ikke forts&aelig;tte.</div>			
			<a class="overlowButton onclickRegisterYes" style="margin-top: 15px;"><b><u><ubuntu>Forts&aelig;t videre!</ubuntu></u></b><div></div></a>
		</div>
		
		<div class="arrow"></div>
	</div>

	<div class="floatBox greetings" style="margin-left: 308px; margin-top: 154px;">	
		<div class="text">
			<div class="title"><ubuntu>Greetings!</ubuntu></div>
			<div class="second"><ubuntu>Velkommen til vores hotel, og nyder dit ophold hos os!</ubuntu><br><br>Kald p&aring; asistance hvis du har brug for det<br>Vi sender en der kan guide dig!</div>			
		</div>
		
		<div class="arrow"></div>
	</div>
</div>

</body>
</html>