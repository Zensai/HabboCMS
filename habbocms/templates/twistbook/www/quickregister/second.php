<?php
	if(LOGGEDIN) {
		header("Location: " . WWW . "/me");
		exit;
	}

	if($identity->maxClones()) {
		header("Location: " . WWW . "/index?maxclones");
		exit;
	}

	if(!isset($_SESSION['register.dob_day'], $_SESSION['register.dob_month'], $_SESSION['register.dob_year'], $_SESSION['register.gender'])) {
		header("Location: " . WWW . "/quickregister/first");
		exit;
	}

	if(isset($_SESSION['register.email'], $_SESSION['register.password'])) {
		header("Location: " . WWW . "/quickregister/third");
		exit;
	}

	new HabboTranslator('register2');
	$skin->styleset('register');
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
	<title>{sitename} - {$lang->register2.pagetitle}</title>
	{styleset}
</head>

<script>
$(document).ready(function() {
	$('.submitSecondStep').click(function() { 
		submitSecondStep('{www}/quickregister/check/second');
	});
	
	function submitSecondStep(pageName) {
		$('.errorContainer').html('<div style="width: 43px; height: 11px; margin: auto; margin-top: 25px;"><img src="{webgallery}icons/ajax-loader-second.gif"></div>');
		$.ajax({
			type: "POST",
			url: "" + pageName,
			data: "bean.email=" + $('.email').val() + "&bean.password=" + $('.password').val() + "&bean.password_conf=" + $('.passwordconf').val(),
			success: function(php){
				$('.errorContainer').html(php);
			}
		});
	}
	
	$('.backtofirstDiv').click(function() {
		$('.overlowLoadingContainer').html('<div class="overlowLoading"><div class="progressContainer"><div class="progress"></div><div class="loading">{$lang->general.page_loading}</div></div></div>');
		setTimeout('window.location.replace("{www}/quickregister/goto/first")', 1000);
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
	
		<div class="headerTitle">{$lang->register2.details}</div>
		
		<div id="container">
		
			<div class="title left">{$lang->register2.mail}</div>
			
			<input type="text" name="email" class="email" value="<?php if(!empty($_SESSION['register.email'])) echo $_SESSION['register.email']; ?>">
			
			<div class="description">{$lang->register2.mail_desc}</div>
			
			<div class="space"></div>
			
			<div class="title left">{$lang->register2.password}</div>
			
			<input type="password" name="password" class="password" value="">
			
			<div class="description">{$lang->register2.password_desc}</div>
			
			<div class="space"></div>
			
			<div class="title left">{$lang->register2.password_conf}</div>
			
			<input type="password" name="passwordconf" class="passwordconf" value="">
			
			<div class="description">{$lang->register2.password_conf_desc}</div>
		
		</div>
		
		<div id="buttonContainer">
			<form method="post" id="backtofirstform" name="backtofirstform" action="{www}/quickregister/first">
				<div id="submitBlack" class="submitLeft backtofirstDiv">{$lang->register2.previous}</div>
				<input type="submit" hidden="hidden" name="backtofirstButton" style="margin-top: -10000px;">
			<form>
		
			<div id="submitDarkBlue" class="submitRight submitSecondStep">{$lang->register2.next}</div>
		</div>
	</div>
</div>

</body>

</html>