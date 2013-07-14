<?php
define('USER', FALSE); 
define('ACCOUNT', FALSE);
define('MAINTENANCE', TRUE);
include("includes/inc.global.php");

if(isset($_GET['accept_cookie']) && $core->ExploitRetainer($_GET['accept_cookie']) == 'yes'){
	setcookie("accept_cookie", "yes", time()+31104000);
}

if(isset($_COOKIE['username'])){ 
	header("Location: ".HOST."/me"); 
}

$page = 'index';
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

	<title><?php echo $hotelname; ?></title>
	<?php echo $Style->newIndex(); ?>

</head>

<body onkeydown="onKeyDown()" style="overflow: hidden;" id="body">

<script>
$(document).ready(function(){ 
	$('script:not(.noDelete)').remove(); 
});
</script>

<script>
$(document).ready(function() {

	jQuery.fn.center = function(parent) {
		if (parent) {
			parent = this.parent();
		} else {
			parent = window;
		}
		this.css({
			"position": "absolute",
			"top": ((($(parent).height() - this.outerHeight()) / 2) + $(parent).scrollTop() + "px"),
			"left": ((($(parent).width() - this.outerWidth()) / 2) + $(parent).scrollLeft() + "px")
		});
	return this;
	}
	
	$('.uberContainer').center();
	$(window).resize(function(){
		$('.uberContainer').center();
	});

	setTimeout(function(){ $('.uberContainer').fadeIn("slow"); }, 500);
	
	setTimeout(function() { $(".indexWalkOver").fadeIn("slow"); }, 1000);
	
	$(".tile_fade").click(function () {
		$(".avatar").css("background-image", "url(<?php echo HOST; ?>/web-gallery/index/walking_avatar.gif)");
		$(".avatar").animate({
			marginLeft: "420px",
			marginTop: "426px"
		}, 3500, function() {
			$(".avatar").css("width", "56px");
			$(".avatar").css("height", "94px");
			$(".avatar").css("background-image", "url(<?php echo HOST; ?>/web-gallery/index/avatar1.png)");
			$(".indexWalkOver").fadeOut("slow");
			$(".loginBoxQuestion").fadeIn("slow");
			$(".tile").fadeIn();
			$('.tile_fade').remove();
		});
		
		$(".walkToTile").fadeOut("slow");
	});
	
	$(".tile_fade").bind("fadeToggle",function(){
		$(this).fadeToggle("slow",function(){
			$(this).trigger("fadeToggle")
		})
	}).trigger("fadeToggle");
	
	$(".onclickLoginYes").click(function () {
		$(".loginBoxQuestion").fadeOut("slow");
		$(".loginBoxYes").fadeIn("slow");
		setTimeout(function() { 
			$(".loginBoxYes").fadeOut("slow");
			$(".loginBox").fadeIn("slow");
		}, 2000);
	});

	$("#check_username_availability").click(function(){		
		check_if_it_is_correct();
	});
	
	$("#loginPassword").keypress(function(e) {
    	if(e.which == 13) {
       	 	check_if_it_is_correct();
    	}
	});
	
	$(".onclickLoginNo").click(function () {
		$(".loginBoxQuestion").fadeOut("slow");
		$(".registerActionYes").fadeIn("slow");
		setTimeout(function() { 
			$(".registerActionYes").fadeOut("slow"); 
			$(".registerBoxContainer").fadeIn("slow"); 
		}, 2000);
	});
	
	$(".onclickLoginNoIpOverated").click(function () {
		$(".loginBoxQuestion").fadeOut("slow");
		$(".ipOverated").fadeIn("slow");
		setTimeout(function() { $(".ipOverated").fadeOut("slow"); }, 8500);
	});
	
	$(".onclickRegisterYes").click(function () {
		$(".loginBoxNo").fadeOut("slow");
		$(".registerActionYes").fadeIn("slow");
		setTimeout(function() { 
			$(".registerActionYes").fadeOut("slow"); 
			$(".registerBoxContainer").fadeIn("slow"); 
		}, 2000);
	});
	
	$(".onclickRegisterNo").click(function () {
		$(".loginBoxNo").fadeOut("slow");
		$(".registerNo").fadeIn("slow");
		setTimeout(function() { $(".registerNo").fadeOut("slow"); }, 3500);
	});
	
	/* register */
	
	$(".onclickRegisterToStep2").click(function () {
		var min_chars = 3;
		var max_chars = 20;
		if($("#registerUsername").val().length < min_chars){
			$(".registerUsernameErrorNoValue").fadeIn("slow");
			setTimeout(function() { $(".registerUsernameErrorNoValue").fadeOut("slow"); }, 2500);
		}else{			
			if($("#registerUsername").val().length > max_chars){
				$(".registerUsernameErrorMaxValue").fadeIn("slow");
				setTimeout(function() { $(".registerUsernameErrorMaxValue").fadeOut("slow"); }, 2500);
			}else{
				check_username_available();
			}
		}
	});
	
	$(".onclickRegisterToStep3").click(function () {
		var min_chars = 6;
		if($("#registerPassword").val().length < min_chars){
			$(".registerPasswordErrorNoValue").fadeIn("slow");
			setTimeout(function() { $(".registerPasswordErrorNoValue").fadeOut("slow"); }, 2500);
		}else{			
			check_password_available();
		}
	});
	
	$(".onclickRegisterToStep4").click(function () {
		var min_chars = 9;
		if($("#registerMail").val().length < min_chars){
			$(".registerMailErrorNoValue").fadeIn("slow");
			setTimeout(function() { $(".registerMailErrorNoValue").fadeOut("slow"); }, 2500);
		}else{			
			check_mail_available();
		}
	});
	
	$(".onclickRegisterToStep5").click(function () {
		check_date_available();
	});
	
	$("#genderChooserBoy").click(function() {
        $("#genderChooser").val("M");
		$("#registerLook").val("hr-165-45.hd-190-3.ch-255-73.lg-280-62.sh-295-62");
		$(this).addClass("selected");
		$("#genderChooserGirl").removeClass("selected");
    });

    $("#genderChooserGirl").click(function() {
        $("#genderChooser").val("F");
		$("#registerLook").val("hr-545-45.hd-600-4.ch-630-80.lg-3116-91-62.sh-730-62");
		$(this).addClass("selected");
		$("#genderChooserBoy").removeClass("selected");
    });
	
	$(".onclickRegisterToFinish").click(function () {
		finish();
	});
	
	$(".acceptCookiesButton").click(function(){
		$.post("<?php echo HOST; ?>/index?accept_cookie=yes", function(){
			$(".acceptCookies").fadeOut();
		});
	});
		
});

function check_if_it_is_correct(){

	var username = $("#loginUsername").val();
	var password = $("#loginPassword").val();

	$.post("<?php echo HOST; ?>/loginCheck", { username: username, password: password },
		function(result){
			if(result == 0){
				$(".loginBoxWrongUsername").fadeIn("slow");
				setTimeout(function() { $(".loginBoxWrongUsername").fadeOut("slow"); }, 2500);
			}else{
				if(result == 1){
					$(".loginBoxWrongPassword").fadeIn("slow");
					setTimeout(function() { $(".loginBoxWrongPassword").fadeOut("slow"); }, 2500);
				}else{
					if(result.length > 10){
						$(".loginBox").fadeOut("slow");
						$(".loginSuccesfull").fadeIn("slow");
						$(".avatar").fadeOut("slow");
						
						$(".avatarResult").css({"background-image": "url(<?php echo $avatarimage_url; ?>?figure="+ result +"&direction=3&head_direction=3&gesture=sml.gif)"});
						$(".avatarResult").fadeIn("slow");
						
						$.post("<?php echo HOST; ?>/login", { username: username, password: password }, function(){
							setTimeout(function(){ 
								$("body").fadeOut('slow', function(){
									setTimeout(function(){ document.location.href="<?php echo HOST; ?>/me"; }, 1000);
								});
							}, 1500);
						});
					}
				}
			}
	});

}

function check_username_available(){

	var username = $("#registerUsername").val();

	$.post("<?php echo HOST; ?>/register/usernameCheck", { username: username },
		function(result){
			if(result == 0){
				$(".registerUsernameError").fadeIn("slow");
				setTimeout(function() { $(".registerUsernameError").fadeOut("slow"); }, 2500);
			}else{
				if(result == 1){
					$(".registerUsernameErrorSigns").fadeIn("slow");
					setTimeout(function() { $(".registerUsernameErrorSigns").fadeOut("slow"); }, 2500);
				}else{
					if(result == 2){
						$(".containerBoxRegisterStep1").fadeOut("slow");
						$(".containerBoxRegisterStep2").fadeIn("slow");
					}
				}
			}
	});

}

function check_password_available(){

	var password = $("#registerPassword").val();

	$.post("<?php echo HOST; ?>/register/passwordCheck", { password: password },
		function(result){
			if(result == 0){
				$(".registerPasswordErrorSigns").fadeIn("slow");
				setTimeout(function() { $(".registerPasswordErrorSigns").fadeOut("slow"); }, 2500);
			}else{
				if(result == 1){
					$(".registerBox").fadeOut("slow");
					$(".containerBoxRegisterStep3").fadeIn("slow");
				}
			}
	});

}

function check_mail_available(){

	var mail = $("#registerMail").val();

	$.post("<?php echo HOST; ?>/register/mailCheck", { mail: mail },
		function(result){
			if(result == 0){
				$(".registerMailError").fadeIn("slow");
				setTimeout(function() { $(".registerMailError").fadeOut("slow"); }, 2500);
			}else{
				if(result == 1){
					$(".registerMailErrorSigns").fadeIn("slow");
					setTimeout(function() { $(".registerMailErrorSigns").fadeOut("slow"); }, 2500);
				}else{
					if(result == 2){
						$(".containerBoxRegisterStep3").fadeOut("slow");
						$(".containerBoxRegisterStep4").fadeIn("slow");
					}
				}
			}
	});

}

function check_date_available(){

	var date_day = $("#registerDateDay").val();
	var date_month = $("#registerDateMonth").val();
	var date_year = $("#registerDateYear").val();

	$.post("<?php echo HOST; ?>/register/dateCheck", { date_day: date_day, date_month: date_month, date_year: date_year },
		function(result){
			if(date_day == "NULL"){
				$(".registerDateDayErrorNoValue").fadeIn("slow");
				setTimeout(function() { $(".registerDateDayErrorNoValue").fadeOut("slow"); }, 2500);
			}else{
				if(date_month == "NULL"){
					$(".registerDateMonthErrorNoValue").fadeIn("slow");
					setTimeout(function() { $(".registerDateMonthErrorNoValue").fadeOut("slow"); }, 2500);
				}else{
					if(date_year == "NULL"){
						$(".registerDateYearErrorNoValue").fadeIn("slow");
						setTimeout(function() { $(".registerDateYearErrorNoValue").fadeOut("slow"); }, 2500);
					}else{
						if(result == 0){
							document.location.href="<?php echo HOST; ?>/index";
						}
						if(result == 1){
							$(".containerBoxRegisterStep4").fadeOut("slow");
							$(".containerBoxRegisterStep5").fadeIn("slow");
						}
					}
				}
			}
			
	});

}

function finish(){

	var gender = $("#genderChooser").val();
	var look = $("#registerLook").val();

	if(gender == "NULL"){
		$(".registerGenderNoValue").fadeIn("slow");
		setTimeout(function() { $(".registerGenderNoValue").fadeOut("slow"); }, 2500);
	}else{
		registration();
	}

}

function registration(){

	var username = $("#registerUsername").val();
	var password = $("#registerPassword").val();
	var mail = $("#registerMail").val();
	var date_day = $("#registerDateDay").val();
	var date_month = $("#registerDateMonth").val();
	var date_year = $("#registerDateYear").val();
	var gender = $("#genderChooser").val();
	var look = $("#registerLook").val();
	<?php if(isset($_GET["referral"]) && $core->ExploitRetainer($_GET["referral"])){ ?>
	var referral = "<?php echo $core->ExploitRetainer($_GET["referral"]); ?>";
	<?php } ?>
	
	$.post("<?php echo HOST; ?>/register/registration", { username: username, password: password, mail: mail, date_day: date_day, date_month: date_month, date_year: date_year, gender: gender, look: look <?php if(isset($_GET["referral"]) && $core->ExploitRetainer($_GET["referral"])){ ?>, referral: referral <?php } ?> },
		function(result){
			if(result == 0){
				$(".registerBoxContainer").animate({
					opacity: 0
				}, 2000, function() {
					$(".avatar").fadeOut("slow");
					if(look == "hr-165-45.hd-190-3.ch-255-73.lg-280-62.sh-295-62"){
						$(".avatarboy").fadeIn("slow");
					}
					if(look == "hr-545-45.hd-600-4.ch-630-80.lg-3116-91-62.sh-730-62"){
						$(".avatargirl").fadeIn("slow");
					}
					
					$.post("<?php echo HOST; ?>/login", { username: username, password: password }, function(){
						setTimeout(function(){ 
							$("body").fadeOut('slow', function(){
								setTimeout(function(){ document.location.href="<?php echo HOST; ?>/me"; }, 1000);
							});
						}, 1500);
					});
				});
			}
			
	});

}
</script>

<div class="redirectClass"></div>

<div class="registerContainer acceptCookies" style=" <?php if(isset($_COOKIE['accept_cookie']) && $core->ExploitRetainer($_COOKIE['accept_cookie']) == 'yes'){ echo 'display: none;'; }else{  echo 'display: block;'; } ?> margin-bottom: -50px; z-index: 5;">

	<div class="registerBox" style="margin-top: 100px;">
	
		<div class="topTitle">
		
			<div class="first"><ubuntu><?php echo $language['index_lobby_cookie_title']; ?></ubuntu></div>
			
			<div class="second"><ubuntu><?php echo $language['index_lobby_cookie_second']; ?></ubuntu></div>
			
		</div>
		
		<div class="containerRegister">
			
			<div class="middle">
			
				<div class="boldTitle"><ubuntu><?php echo $language['index_lobby_cookie_text_title']; ?></ubuntu></div>
				
				<div class="textText">
                
                	<?php echo $language['index_lobby_cookie_text_second']; ?>
                    
                    <br>
                    
                   <center><a class="overlowButton acceptCookiesButton" style="margin-top: 15px; font-size: 12px; margin-right: 15px;"><b><u><ubuntu>Cookies accepteren</ubuntu></u></b><div></div></a></center>
                
                </div>
			
			</div>
		
		</div>
		
	</div>

</div>

<div class="registerContainer registerAge" <?php if($core->ExploitRetainer($_SESSION['registerAge']) == 'block'){ ?>style="display: block;"<?php } ?>>

	<div class="registerBox" style="margin-top: 100px;">
	
		<div class="topTitle">
		
			<div class="first"><ubuntu><?php echo $language['index_lobby_age_problem_title']; ?></ubuntu></div>
			
			<div class="second"><ubuntu><?php echo $language['index_lobby_age_problem_second']; ?></ubuntu></div>
			
		</div>
		
		<div class="containerRegister">
			
			<div class="middle">
			
				<div class="boldTitle"><ubuntu><?php echo $language['index_lobby_age_problem_text_title']; ?></ubuntu></div>
				
				<div class="textText"><?php echo $language['index_lobby_age_problem_text_second']; ?></div>
			
			</div>
		
		</div>
		
	</div>

</div>

<div class="registerContainer registerBoxContainer">

	<a class="overlowOutSideButton" style="margin-top: 10px; margin-left: 0px; font-size: 13px;" href="<?php echo HOST; ?>/quickregister/first" style=""><b><u><ubuntu><?php echo $language['index_lobby_register_dont_work']; ?></ubuntu></u></b><div></div></a>

	<!-- Step 1 -->

	<div class="registerBox containerBoxRegisterStep1">
	
		<div class="floatBoxLoginGrey registerUsernameErrorNoValue" style="margin-left: -210px; margin-top: 215px; width: 190px;">
		
			<div class="arrow"></div>
		
			<div class="text">
				
				<div class="title"><ubuntu><?php echo $language['index_lobby_ai']; ?></ubuntu></div>
				<div class="second"><ubuntu><?php echo $language['index_lobby_register_name_to_little']; ?></ubuntu></div>
				
			</div>
		
		</div>
		
		<div class="floatBoxLoginGrey registerUsernameErrorMaxValue" style="margin-left: -210px; margin-top: 215px; width: 190px;">
		
			<div class="arrow"></div>
		
			<div class="text">
				
				<div class="title"><ubuntu><?php echo $language['index_lobby_ai']; ?></ubuntu></div>
				<div class="second"><ubuntu><?php echo $language['index_lobby_register_name_to_big']; ?></ubuntu></div>
				
			</div>
		
		</div>
		
		<div class="floatBoxLoginGrey registerUsernameError" style="margin-left: -210px; margin-top: 215px; width: 190px;">
		
			<div class="arrow"></div>
		
			<div class="text">
				
				<div class="title"><ubuntu><?php echo $language['index_lobby_ai']; ?></ubuntu></div>
				<div class="second"><ubuntu><?php echo $language['index_lobby_register_name_already_exists']; ?></ubuntu></div>
				
			</div>
		
		</div>
		
		<div class="floatBoxLoginGrey registerUsernameErrorSigns" style="margin-left: -210px; margin-top: 215px; width: 190px;">
		
			<div class="arrow"></div>
		
			<div class="text">
				
				<div class="title"><ubuntu><?php echo $language['index_lobby_ai']; ?></ubuntu></div>
				<div class="second"><ubuntu><?php echo $language['index_lobby_register_name_error_signs']; ?></ubuntu></div>
				
			</div>
		
		</div>
	
		<div class="topTitle">
		
			<div class="first"><ubuntu><?php echo $language['index_lobby_step_1']; ?></ubuntu></div>
			
			<div class="second"><ubuntu><?php echo $language['index_lobby_step_1_second']; ?></ubuntu></div>
			
		</div>
		
		<div class="containerRegister">
		
			<div class="bottlesBox">
			
				<div class="bottle selected"></div>
				
				<div class="space"></div>
				
				<div class="bottle"></div>
				
				<div class="space"></div>
				
				<div class="bottle"></div>
				
				<div class="space"></div>
				
				<div class="bottle"></div>
				
				<div class="space"></div>
				
				<div class="bottle"></div>
			
			</div>
		
			<div class="line"></div>
			
			<div class="middle">
			
				<div class="boldTitle"><ubuntu><?php echo $language['index_lobby_step_1_second_title']; ?></ubuntu></div>
				
				<div class="textText"><?php echo $language['index_lobby_step_1_second_second']; ?></div>
				
				<input type="text" name="registerUsername" id="registerUsername" placeholder="<?php echo $language['index_lobby_step_1_click_to_put_name_in']; ?>">
				
				<div class="alertBox">
				
					<div class="warnIcon"></div>
					
					<div class="warnText">
					
						<div class="warnTitle"><ubuntu><?php echo $language['index_lobby_the_catch_title']; ?>:</ubuntu></div>
						
						<div class="warnText"><?php echo $language['index_lobby_step_1_the_catch_second']; ?></div>
				
					</div>
					
				</div>
			
			</div>
			
			<div class="line"></div>
			
			<div class="buttonContainer">
			
				<center><a class="overlowButton onclickRegisterToStep2" style=""><b><u><ubuntu><?php echo $language['accept_and_continue']; ?></ubuntu></u></b><div></div></a></center>
			
			</div>
		
		</div>
		
	</div>
	
	<!-- Step 2 -->
	
	<div class="registerBox containerBoxRegisterStep2" style="display: none;">
	
		<div class="floatBoxLoginGrey registerPasswordErrorNoValue" style="margin-left: -210px; margin-top: 230px; width: 190px;">
		
			<div class="arrow"></div>
		
			<div class="text">
				
				<div class="title"><ubuntu><?php echo $language['index_lobby_ai']; ?></ubuntu></div>
				<div class="second"><ubuntu><?php echo $language['index_lobby_register_password_to_little']; ?></ubuntu></div>
				
			</div>
		
		</div>
		
		<div class="floatBoxLoginGrey registerPasswordErrorSigns" style="margin-left: -210px; margin-top: 230px; width: 190px;">
		
			<div class="arrow"></div>
		
			<div class="text">
				
				<div class="title"><ubuntu><?php echo $language['index_lobby_ai']; ?></ubuntu></div>
				<div class="second"><ubuntu><?php echo $language['index_lobby_register_password_error_signs']; ?></ubuntu></div>
				
			</div>
		
		</div>
	
		<div class="topTitle">
		
			<div class="first"><ubuntu><?php echo $language['index_lobby_step_2']; ?></ubuntu></div>
			
			<div class="second"><ubuntu><?php echo $language['index_lobby_step_2_second']; ?></ubuntu></div>
			
		</div>
		
		<div class="containerRegister">
		
			<div class="bottlesBox">
			
				<div class="bottle"></div>
				
				<div class="space"></div>
				
				<div class="bottle selected"></div>
				
				<div class="space"></div>
				
				<div class="bottle"></div>
				
				<div class="space"></div>
				
				<div class="bottle"></div>
				
				<div class="space"></div>
				
				<div class="bottle"></div>
			
			</div>
		
			<div class="line"></div>
			
			<div class="middle">
			
				<div class="boldTitle"><ubuntu><?php echo $language['index_lobby_step_2_second_title']; ?></ubuntu></div>
				
				<div class="textText"><?php echo $language['index_lobby_step_2_second_second']; ?></div>
				
				<input type="password" name="registerPassword" id="registerPassword" placeholder="<?php echo $language['index_lobby_step_2_click_to_put_password_in']; ?>">
				
				<div class="alertBox">
				
					<div class="warnIcon"></div>
					
					<div class="warnText">
					
						<div class="warnTitle"><ubuntu><?php echo $language['index_lobby_the_catch_title']; ?>:</ubuntu></div>
						
						<div class="warnText"><?php echo $language['index_lobby_step_2_the_catch_second']; ?></div>
				
					</div>
					
				</div>
			
			</div>
			
			<div class="line"></div>
			
			<div class="buttonContainer">
			
				<center><a class="overlowButton onclickRegisterToStep3" style=""><b><u><ubuntu><?php echo $language['accept_and_continue']; ?></ubuntu></u></b><div></div></a></center>
			
			</div>
		
		</div>
		
	</div>
	
	<!-- Step 3 -->
	
	<div class="registerBox containerBoxRegisterStep3" style="display: none;">
	
		<div class="floatBoxLoginGrey registerMailErrorNoValue" style="margin-left: -210px; margin-top: 230px; width: 190px;">
		
			<div class="arrow"></div>
		
			<div class="text">
				
				<div class="title"><ubuntu><?php echo $language['index_lobby_ai']; ?></ubuntu></div>
				<div class="second"><ubuntu><?php echo $language['index_lobby_register_mail_to_little']; ?></ubuntu></div>
				
			</div>
		
		</div>
		
		<div class="floatBoxLoginGrey registerMailError" style="margin-left: -210px; margin-top: 230px; width: 190px;">
		
			<div class="arrow"></div>
		
			<div class="text">
				
				<div class="title"><ubuntu><?php echo $language['index_lobby_ai']; ?></ubuntu></div>
				<div class="second"><ubuntu><?php echo $language['index_lobby_register_mail_already_exists']; ?></ubuntu></div>
				
			</div>
		
		</div>
		
		<div class="floatBoxLoginGrey registerMailErrorSigns" style="margin-left: -210px; margin-top: 230px; width: 190px;">
		
			<div class="arrow"></div>
		
			<div class="text">
				
				<div class="title"><ubuntu><?php echo $language['index_lobby_ai']; ?></ubuntu></div>
				<div class="second"><ubuntu><?php echo $language['index_lobby_register_mail_error_signs']; ?></ubuntu></div>
				
			</div>
		
		</div>
	
		<div class="topTitle">
		
			<div class="first"><ubuntu><?php echo $language['index_lobby_step_3']; ?></ubuntu></div>
			
			<div class="second"><ubuntu><?php echo $language['index_lobby_step_3_second']; ?></ubuntu></div>
			
		</div>
		
		<div class="containerRegister">
		
			<div class="bottlesBox">
			
				<div class="bottle"></div>
				
				<div class="space"></div>
				
				<div class="bottle"></div>
				
				<div class="space"></div>
				
				<div class="bottle selected"></div>
				
				<div class="space"></div>
				
				<div class="bottle"></div>
				
				<div class="space"></div>
				
				<div class="bottle"></div>
			
			</div>
		
			<div class="line"></div>
			
			<div class="middle">
			
				<div class="boldTitle"><ubuntu><?php echo $language['index_lobby_step_3_second_title']; ?></ubuntu></div>
				
				<div class="textText"><?php echo $language['index_lobby_step_3_second_second']; ?></div>
				
				<input type="text" name="registerMail" id="registerMail" placeholder="<?php echo $language['index_lobby_step_3_click_to_put_mail_in']; ?>">
				
				<div class="alertBox">
				
					<div class="warnIcon"></div>
					
					<div class="warnText">
					
						<div class="warnTitle"><ubuntu><?php echo $language['index_lobby_the_catch_title']; ?>:</ubuntu></div>
						
						<div class="warnText"><?php echo $language['index_lobby_step_3_the_catch_second']; ?></div>
				
					</div>
					
				</div>
			
			</div>
			
			<div class="line"></div>
			
			<div class="buttonContainer">
			
				<center><a class="overlowButton onclickRegisterToStep4" style=""><b><u><ubuntu><?php echo $language['accept_and_continue']; ?></ubuntu></u></b><div></div></a></center>
			
			</div>
		
		</div>
		
	</div>
	
	<!-- Step 4 -->
	
	<div class="registerBox containerBoxRegisterStep4" style="display: none;">
	
		<div class="floatBoxLoginGrey registerTooJung" style="margin-left: -210px; margin-top: 185px; width: 190px;">
		
			<div class="arrow"></div>
		
			<div class="text">
				
				<div class="title"><ubuntu><?php echo $language['index_lobby_ai']; ?></ubuntu></div>
				<div class="second"><ubuntu><?php echo $language['index_lobby_register_too_young']; ?></ubuntu></div>
				
			</div>
		
		</div>
	
		<div class="floatBoxLoginGrey registerDateDayErrorNoValue" style="margin-left: -210px; margin-top: 185px; width: 190px;">
		
			<div class="arrow"></div>
		
			<div class="text">
				
				<div class="title"><ubuntu><?php echo $language['index_lobby_ai']; ?></ubuntu></div>
				<div class="second"><ubuntu><?php echo $language['index_lobby_register_date_day_no_value']; ?></ubuntu></div>
				
			</div>
		
		</div>
		
		<div class="floatBoxLoginGrey registerDateMonthErrorNoValue" style="margin-left: -210px; margin-top: 230px; width: 190px;">
		
			<div class="arrow"></div>
		
			<div class="text">
				
				<div class="title"><?php echo $language['index_lobby_ai']; ?></div>
				<div class="second"><ubuntu><?php echo $language['index_lobby_register_date_month_no_value']; ?></ubuntu></div>
				
			</div>
		
		</div>
		
		<div class="floatBoxLoginGrey registerDateYearErrorNoValue" style="margin-left: -210px; margin-top: 270px; width: 190px;">
		
			<div class="arrow"></div>
		
			<div class="text">
				
				<div class="title"><ubuntu><?php echo $language['index_lobby_ai']; ?></ubuntu></div>
				<div class="second"><ubuntu><?php echo $language['index_lobby_register_date_year_no_value']; ?></ubuntu></div>
				
			</div>
		
		</div>
	
		<div class="topTitle">
		
			<div class="first"><ubuntu><?php echo $language['index_lobby_step_4']; ?></ubuntu></div>
			
			<div class="second"><ubuntu><?php echo $language['index_lobby_step_4_second']; ?></ubuntu></div>
			
		</div>
		
		<div class="containerRegister">
		
			<div class="bottlesBox">
			
				<div class="bottle"></div>
				
				<div class="space"></div>
				
				<div class="bottle"></div>
				
				<div class="space"></div>
				
				<div class="bottle"></div>
				
				<div class="space"></div>
				
				<div class="bottle selected"></div>
				
				<div class="space"></div>
				
				<div class="bottle"></div>
			
			</div>
		
			<div class="line"></div>
			
			<div class="middle">
			
				<div class="kut"></div>
			
				<div class="boldTitle"><ubuntu><?php echo $language['index_lobby_step_4_second_title']; ?></ubuntu></div>
				
				<div class="textText"><?php echo $language['index_lobby_step_4_second_second']; ?></div>
				
				<select name="registerDateDay" id="registerDateDay">
					<option value="NULL"><?php echo $language['index_register_day']; ?></option>
					<option value="01">1</option>
					<option value="02">2</option>
					<option value="03">3</option>
					<option value="04">4</option>
					<option value="05">5</option>
					<option value="06">6</option>
					<option value="07">7</option>
					<option value="08">8</option>
					<option value="09">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
				</select>
				
				<select name="registerDateMonth" id="registerDateMonth">
					<option value="NULL"><?php echo $language['index_register_month']; ?></option>
					<option value="01"><?php echo $language['index_register_january']; ?></option>
					<option value="02"><?php echo $language['index_register_february']; ?></option>
					<option value="03"><?php echo $language['index_register_march']; ?></option>
					<option value="04"><?php echo $language['index_register_april']; ?></option>
					<option value="05"><?php echo $language['index_register_may']; ?></option>
					<option value="06"><?php echo $language['index_register_june']; ?></option>
					<option value="07"><?php echo $language['index_register_july']; ?></option>
					<option value="08"><?php echo $language['index_register_august']; ?></option>
					<option value="09"><?php echo $language['index_register_september']; ?></option>
					<option value="10"><?php echo $language['index_register_october']; ?></option>
					<option value="11"><?php echo $language['index_register_november']; ?></option>
					<option value="12"><?php echo $language['index_register_december']; ?></option>
				</select>
				
				<select name="registerDateYear" id="registerDateYear">
					<option value="NULL"><?php echo $language['index_register_year']; ?></option>
                    <option value="2013">2013</option>
					<option value="2012">2012</option>
					<option value="2011">2011</option>
					<option value="2010">2010</option>
					<option value="2009">2009</option>
					<option value="2008">2008</option>
					<option value="2007">2007</option>
					<option value="2006">2006</option>
					<option value="2005">2005</option>
					<option value="2004">2004</option>
					<option value="2003">2003</option>
					<option value="2002">2002</option>
					<option value="2001">2001</option>
					<option value="2000">2000</option>
					<option value="1999">1999</option>
					<option value="1998">1998</option>
					<option value="1997">1997</option>
					<option value="1996">1996</option>
					<option value="1995">1995</option>
					<option value="1994">1994</option>
					<option value="1993">1993</option>
					<option value="1992">1992</option>
					<option value="1991">1991</option>
					<option value="1990">1990</option>
				</select>
				
				<div class="alertBox">
				
					<div class="warnIcon"></div>
					
					<div class="warnText">
					
						<div class="warnTitle"><ubuntu><?php echo $language['index_lobby_the_catch_title']; ?>:</ubuntu></div>
						
						<div class="warnText"><?php echo $language['index_lobby_step_4_the_catch_second']; ?></div>
				
					</div>
					
				</div>
			
			</div>
			
			<div class="line"></div>
			
			<div class="buttonContainer">
			
				<center><a class="overlowButton onclickRegisterToStep5" style=""><b><u><ubuntu><?php echo $language['accept_and_continue']; ?></ubuntu></u></b><div></div></a></center>
			
			</div>
		
		</div>
		
	</div>
	
	<!-- Step 5 -->
	
	<div class="registerBox containerBoxRegisterStep5" style="display: none;">
	
		<div class="floatBoxLoginGrey registerGenderNoValue" style="margin-left: -210px; margin-top: 250px; width: 190px;">
		
			<div class="arrow"></div>
		
			<div class="text">
				
				<div class="title"><ubuntu><?php echo $language['index_lobby_ai']; ?></ubuntu></div>
				<div class="second"><ubuntu><?php echo $language['index_lobby_register_no_gender']; ?></ubuntu></div>
				
			</div>
		
		</div>
	
		<div class="topTitle">
		
			<div class="first"><ubuntu><?php echo $language['index_lobby_step_5']; ?></ubuntu></div>
			
			<div class="second"><ubuntu><?php echo $language['index_lobby_step_5_second']; ?></ubuntu></div>
			
		</div>
		
		<div class="containerRegister">
		
			<div class="bottlesBox">
			
				<div class="bottle"></div>
				
				<div class="space"></div>
				
				<div class="bottle"></div>
				
				<div class="space"></div>
				
				<div class="bottle"></div>
				
				<div class="space"></div>
				
				<div class="bottle"></div>
				
				<div class="space"></div>
				
				<div class="bottle selected"></div>
			
			</div>
		
			<div class="line"></div>
			
			<div class="middle">
			
				<div class="kut"></div>
			
				<div class="boldTitle"><ubuntu><?php echo $language['index_lobby_step_5_second_title']; ?></ubuntu></div>
				
				<div class="textText"><?php echo $language['index_lobby_step_5_second_second']; ?></div>
				
				<div class="genderChooserContainer">
		
					<div class="genderChooser" id="genderChooserBoy" style="margin-right: 20px;">
			
						<div class="inside">
			
							<div class="bgTop"></div>
							<div class="bgBottom"></div>
					
							<div class="gender-choice">
                            
								<img src="<?php echo $avatarimage_url; ?>?figure=hr-165-45.hd-190-3.ch-255-73.lg-280-62.sh-295-62&direction=2&gesture=sml.gif">
				
							</div>
					
						</div>
			
					</div>
			
					<div class="genderChooser" id="genderChooserGirl">
						
						<div class="inside">
			
							<div class="bgTop"></div>
							<div class="bgBottom"></div>
					
							<div class="gender-choice">
                            
								<img src="<?php echo $avatarimage_url; ?>?figure=hr-545-45.hd-600-4.ch-630-80.lg-3116-91-62.sh-730-62&direction=4&gesture=sml.gif">
                   
							</div>
					
						</div>
				
					</div>
				
					<input type="hidden" id="genderChooser" name="genderChooser" value="NULL" />
					
					<input type="hidden" id="registerLook" name="registerLook" value="" />

				</div>
				
				<div class="alertBox">
				
					<div class="warnIcon"></div>
					
					<div class="warnText">
					
						<div class="warnTitle"><ubuntu><?php echo $language['index_lobby_step_5_the_catch_title']; ?>:</ubuntu></div>
						
						<div class="warnText"><?php echo $language['index_lobby_step_5_the_catch_second']; ?></div>
				
					</div>
					
				</div>
			
			</div>
			
			<div class="line"></div>
			
			<div class="buttonContainer">
			
				<center><a class="overlowButton onclickRegisterToFinish" style=""><b><u><ubuntu><?php echo $language['accept_and_continue']; ?></ubuntu></u></b><div></div></a></center>
			
			</div>
		
		</div>
		
	</div>

</div>

<div class="uberContainer">

<div class="container">

	<a class="overlowOutSideButton" style="margin-top: 10px; position: fixed; font-size: 13px;" href="<?php echo HOST; ?>/index/second" style=""><b><u><ubuntu><?php echo $language['index_lobby_dont_work']; ?></ubuntu></u></b><div></div></a>

	<img style="margin-top: 180px; margin-left: 50px; position: fixed;" src="<?php echo HOST; ?>/web-gallery/general/logo.gif">

	<div class="avatar"></div>
    
    <div class="wood"></div>
    
    <div class="wood2"></div>
	
	<div class="avatarResult"></div>
	
	<div class="avatarboy"></div>
	
	<div class="avatargirl"></div>
	
	<div class="tile" style="display: none;"></div>
	
	<div class="tile_fade"></div>
    
    <div class="walkToTile"><ubuntu>Klik op de lichtgevende tegel om naar het bureau te lopen.</ubuntu></div>
    
    <div class="userCount" style="margin-left: 545px; margin-top: 50px; position: fixed;">
    
    	<?php
    
    	if($userCounter == 0){ $userCounterIndex = "<ubuntu>".$language['index_lobby_no_users_online']."</ubuntu>";

		}elseif($userCounter == 1){ $userCounterIndex = "<ubuntu>".$language['index_lobby_1_users_online']."</ubuntu>";

		}elseif($userCounter > 1){ $userCounterIndex = "<ubuntu>".$language['index_lobby_more_users_online']."</ubuntu>";}
        
        ?>
	
		<div class="text">
		
			<div class="second" style="font-size: 18px; margin: -8px -5px -5px -5px; color: #FFFFFF; font-weight: bold;"><ubuntu><?php echo $userCounterIndex; ?></ubuntu></div>
			
		</div>
		
	</div>
	
	<div class="floatBox indexWalkOver" style="margin-left: 461px; margin-top: 266px;">
	
		<div class="text">
		
			<div class="title"><ubuntu><?php echo $language['index_lobby_start_hi_title']; ?></ubuntu></div>
			<div class="second"><ubuntu><?php echo $language['index_lobby_start_hi_second']; ?></ubuntu></div>
			
		</div>
		
		<div class="arrow" style="margin-left: 40px;"></div>
		
	</div>

	<div class="floatBox loginBoxQuestion" style="margin-left: 331px; margin-top: 174px;">
	
		<div class="text">
		
			<div class="title"><ubuntu><?php echo $language['index_lobby_good_job']; ?></ubuntu></div>
			<div class="second"><ubuntu><?php echo $language['index_lobby_good_job_second']; ?></ubuntu></div>
			<div class="third"><?php echo $language['index_lobby_ask_login']; ?></div>
			
			<a class="overlowButton onclickLoginYes" style="margin-top: 15px; float: left; margin-right: 15px;"><b><u><ubuntu><?php echo $language['log_in']; ?></ubuntu></u></b><div></div></a>
			
            <?php 
			$query_ips = mysql_num_rows(mysql_query("SELECT * FROM users WHERE ip_reg = '".$users->getIp()."'"));
			if($query_ips >= $limit_ip_users){
			?>
            <a class="overlowButton onclickLoginNoIpOverated" style="margin-top: 15px;"><b><u><ubuntu><?php echo $language['index_register_title']; ?></ubuntu></u></b><div></div></a>
            <?php }else{
			?>
			<a class="overlowButton onclickLoginNo" style="margin-top: 15px;"><b><u><ubuntu><?php echo $language['index_register_title']; ?></ubuntu></u></b><div></div></a>
            <?php } ?>
			
		</div>
		
		<div class="arrow"></div>
		
	</div>
	
	<div class="floatBox loginBoxYes" style="margin-left: 427px; margin-top: 267px;">
	
		<div class="text">
		
			<div class="title"><ubuntu><?php echo $language['index_lobby_okay']; ?></ubuntu></div>
			<div class="second"><ubuntu><?php echo $language['index_lobby_getting_started']; ?></ubuntu></div>
			
		</div>
		
		<div class="arrow"></div>
		
	</div>
	
	<div class="floatBox loginBoxNo" style="margin-left: 408px; margin-top: 215px;">
	
		<div class="text">
		
			<div class="title"><ubuntu><?php echo $language['index_lobby_okay']; ?></ubuntu></div>
			<div class="second"><ubuntu><?php echo $language['index_lobby_ask_register']; ?></ubuntu></div>
			
			<a class="overlowButton onclickRegisterYes" style="margin-top: 15px; float: left; margin-right: 15px;"><b><u><ubuntu><?php echo $language['yes']; ?></ubuntu></u></b><div></div></a>
			
			<a class="overlowButton onclickRegisterNo" style="margin-top: 15px;"><b><u><ubuntu><?php echo $language['no']; ?></ubuntu></u></b><div></div></a>
			
		</div>
		
		<div class="arrow"></div>
		
	</div>
	
	<div class="floatBox loginBox" style="margin-left: 358px; margin-top: 108px; width: 300px;">
	
		<div class="floatBoxLoginGrey loginBoxWrongUsername" style="margin-left: -210px; margin-top: 85px; width: 190px;">
		
			<div class="arrow"></div>
		
			<div class="text">
				
				<div class="title"><ubuntu><?php echo $language['index_lobby_ai']; ?></ubuntu></div>
				<div class="second"><ubuntu><?php echo $language['index_lobby_login_wrong_username']; ?></ubuntu></div>
				
			</div>
		
		</div>
		
		<div class="floatBoxLoginGrey loginBoxWrongPassword" style="margin-left: -210px; margin-top: 125px; width: 190px;">
		
			<div class="arrow"></div>
		
			<div class="text">
				
				<div class="title"><ubuntu><?php echo $language['index_lobby_ai']; ?></ubuntu></div>
				<div class="second"><ubuntu><?php echo $language['index_lobby_login_wrong_password']; ?></ubuntu></div>
				
			</div>
		
		</div>
	
		<div class="text">
		
			<div class="title"><ubuntu><?php echo $language['index_lobby_login_title']; ?></ubuntu></div>
			<div class="second" style="margin-bottom: 15px;"><ubuntu><?php echo $language['index_lobby_login_second']; ?></ubuntu></div>
			
			<input type="text" name="username" id="loginUsername" placeholder="<?php echo $language['index_lobby_login_mail_username']; ?>">
			
			<input type="password" name="password" id="loginPassword" placeholder="<?php echo $language['index_password']; ?>">
			
			<center><a class="overlowButton" id="check_username_availability" style="margin-top: 15px;"><b><u><ubuntu><?php echo $language['log_in']; ?></ubuntu></u></b><div></div></a></center>
			
		</div>
		
		<div class="arrow"></div>
		
	</div>
	
	<div class="floatBox loginSuccesfull" style="margin-left: 309px; margin-top: 267px;">
	
		<div class="text">
		
			<div class="title"><ubuntu><?php echo $language['index_lobby_welcome']; ?></ubuntu></div>
			<div class="second"><ubuntu><?php echo $language['index_lobby_welcome_second']; ?></ubuntu></div>
			
		</div>
		
		<div class="arrow"></div>
		
	</div>
    
    <?php if(isset($_GET['referral']) && $core->ExploitRetainer($_GET['referral'])){ ?>
	
        <div class="floatBox registerActionYes" style="margin-left: 361px; margin-top: 254px;">
        
            <div class="text">
            
                <div class="title"><ubuntu><?php echo $language['index_lobby_okay']; ?></ubuntu></div>
                <div class="second"><ubuntu><?php echo $language['index_lobby_getting_started']; ?> Je bent naar dit hotel <br>gehaald door <?php echo $core->ExploitRetainer($users->UserInfoByID($core->ExploitRetainer($_GET['referral']), 'username')); ?>.</ubuntu></div>
                
            </div>
            
            <div class="arrow"></div>
            
        </div>
    
    <?php }else{ ?>
    
        <div class="floatBox registerActionYes" style="margin-left: 427px; margin-top: 267px;">
        
            <div class="text">
            
                <div class="title"><ubuntu><?php echo $language['index_lobby_okay']; ?></ubuntu></div>
                <div class="second"><ubuntu><?php echo $language['index_lobby_getting_started']; ?></ubuntu></div>
                
            </div>
            
            <div class="arrow"></div>
            
        </div>
    
    <?php } ?>
	
	<div class="floatBox registerNo" style="margin-left: 371px; margin-top: 255px;">
	
		<div class="text">
		
			<div class="title"><ubuntu><?php echo $language['index_lobby_didnt_too']; ?></ubuntu></div>
			<div class="second"><ubuntu><?php echo $language['index_lobby_didnt_too_second']; ?></ubuntu></div>
			
		</div>
		
		<div class="arrow"></div>
		
	</div>
    
    <div class="floatBox ipOverated" style="margin-left: 301px; margin-top: 243px;">
	
		<div class="text">
		
			<div class="title"><ubuntu><?php echo $language['index_lobby_ip_overated_title']; ?></ubuntu></div>
			<div class="second"><ubuntu><?php echo $language['index_lobby_ip_overated_second']; ?></ubuntu></div>
			
		</div>
		
		<div class="arrow"></div>
		
	</div>

</div>

</div>

</body>

</html>