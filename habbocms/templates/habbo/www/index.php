<?php
	if(LOGGEDIN) {
		header("Location: " . WWW . "/me");
		exit;
	}

	$language = 'frontpage';
	$errorclass = false;
	$errorcontainer = '';
	if(!empty($_SESSION['login_error_msg'])) {
		$language .= ',loginerrors';
		$errorclass = true;
		$errorcontainer = '<div id="login-errors">' . $_SESSION["login_error_msg"] . '</div>';
		unset($_SESSION['login_error_msg']);

		if(!empty($_SESSION['login_banned'])) {
			$html->setKey(array(
				'banned_reason' => $_SESSION['login_banned']['reason'],
				'banned_timeleft' => $_SESSION['login_banned']['expire'],
				'banned_expire_time' => $_SESSION['login_banned']['expire'],
			));
		}
	}

	$html->setKey(array(
		'errorcontainer' => $errorcontainer,
		'errorclass' => ($errorclass)?' class="login-error"':'',
	));

	$lang->addTranslation($language);
	//{$lang->}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>	  <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>		 <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>		 <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>{sitename}: {$lang->frontpage.pagetitle}</title>

	<script type="text/javascript">
		var andSoItBegins = (new Date()).getTime();
		var habboPageInitQueue = [];
		var habboStaticFilePath = "{webgallery}";
	</script>

	<link rel="shortcut icon" href="{webgallery}v2/favicon.ico" type="image/vnd.microsoft.icon" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu:400,700,400italic,700italic">
	<link rel="stylesheet" href="{webgallery}static/styles/v3_landing.css" type="text/css" />
	<script src="{webgallery}static/js/v3_landing_top.js" type="text/javascript"></script>
	<meta name="description" content="{description}" />
	<meta name="keywords" content="{keywords}" />
	<meta name="build" content="HabboCMS {build}" />
</head>
<body>

	<div id="overlay"></div>

	<div id="change-password-form" class="overlay-dialog" style="display: none;">
		<div id="change-password-form-container" class="clearfix form-container">
			<h2 id="change-password-form-title" class="bottom-border">{$lang->frontpage.lostpw_header}</h2>
			<div id="change-password-form-content" style="display: none;">
				<form method="post" action="{www}/account/password/identityResetForm" id="forgotten-pw-form">
					<input type="hidden" name="page" value="/?changePwd=true" />
					<span>{$lang->frontpage.lostpw_entermail}</span>
					<div id="email" class="center bottom-border">
						<input type="text" id="change-password-email-address" name="emailAddress" value="" class="email-address" maxlength="48"/>
						<div id="change-password-error-container" class="error" style="display: none;">{$lang->frontpage.lostpw_entervalidmail}</div>
					</div>
				</form>
				<div class="change-password-buttons">
					<a href="#" id="change-password-cancel-link">{$lang->frontpage.lostpw_cancel}</a>
					<a href="#" id="change-password-submit-button" class="new-button"><b>{$lang->frontpage.lostpw_sendmail}</b><i></i></a>
				</div>
			</div>
			<div id="change-password-email-sent-notice" style="display: none;">
				<div class="bottom-border">
					<span>{$lang->frontpage.lostpw_sent}</span>
					<div id="email-sent-container"></div>
				</div>
				<div class="change-password-buttons">
					<a href="#" id="change-password-change-link">{$lang->frontpage.lostpw_back}</a>
					<a href="#" id="change-password-success-button" class="new-button"><b>{$lang->frontpage.lostpw_close}</b><i></i></a>
				</div>
			</div>
		</div>
		<div id="change-password-form-container-bottom" class="form-container-bottom"></div>
	</div>

	<script type="text/javascript">
		function initChangePasswordForm() {
			ChangePassword.init();
		}

		if(window.HabboView) {
			HabboView.add(initChangePasswordForm);
		} else if(window.habboPageInitQueue) {
			habboPageInitQueue.push(initChangePasswordForm);
		}
	</script>

	<header>
		<div id="border-left"></div>
		<div id="border-right"></div>
		{errorcontainer}

		<div id="login-form-container">
			<a href="#home" id="habbo-logo"></a>

			<form action="{www}/account/submit" method="post">
				<div id="login-columns">
					<div id="login-column-1">
						<label for="credentials-email">{$lang->frontpage.email}</label>
						<input tabindex="2" type="text" name="credentials.username" id="credentials-email" value="">
						<input tabindex="5" type="checkbox" name="_login_remember_me" id="credentials-remember-me">
						<label for="credentials-remember-me" class="sub-label">{$lang->frontpage.keeplogged}</label>
					</div>

					<div id="login-column-2">
						<label for="credentials-password">{$lang->frontpage.password}</label>
						<input tabindex="3" type="password" name="credentials.password" id="credentials-password">
						<a href="#" id="forgot-password" class="sub-label">{$lang->frontpage.forgot}</a>
					</div>

					<div id="login-column-3">
						<input type="submit" value="Login" style="margin: -10000px; position: absolute;">
						<a href="#" tabindex="4" class="button" id="credentials-submit"><b></b><span>{$lang->frontpage.login}</span></a>
					</div>

					<div id="login-column-4">
						<div id="fb-root"></div>
						<script type="text/javascript">
							window.fbAsyncInit = function() {
								Cookie.erase("fbsr_{facebook_appid}");
								FB.init({appId: '{facebook_appid}', status: true, cookie: true, xfbml: true});
								if (window.habboPageInitQueue) {
									// jquery might not be loaded yet
									habboPageInitQueue.push(function() {
										$(document).trigger("fbevents:scriptLoaded");
									});
								} else {
									$(document).fire("fbevents:scriptLoaded");
								}

							};
							window.assistedLogin = function(FBobject, optresponse) {
								
								Cookie.erase("fbsr_{facebook_appid}");
								FBobject.init({appId: '{facebook_appid}', status: true, cookie: true, xfbml: true});

								permissions = 'user_birthday,email';
								defaultAction = function(response) {

									if (response.authResponse) {
										fbConnectUrl = "/facebook?connect=true";
										Cookie.erase("fbhb_val_{facebook_appid}");
										Cookie.set("fbhb_val_{facebook_appid}", response.authResponse.accessToken);
										Cookie.erase("fbhb_expr_{facebook_appid}");
										Cookie.set("fbhb_expr_{facebook_appid}", response.authResponse.expiresIn);
										window.location.replace(fbConnectUrl);
									}
								};

								if (typeof optresponse == 'undefined')
									FBobject.login(defaultAction, {scope:permissions});
								else
									FBobject.login(optresponse, {scope:permissions});

							};

							(function() {
								var e = document.createElement('script');
								e.async = true;
								e.src = document.location.protocol + '//connect.facebook.net/da_DK/all.js';
								document.getElementById('fb-root').appendChild(e);
							}());
						</script>

						<a class="fb_button fb_button_large" onclick="assistedLogin(FB); return false;">
							<span class="fb_button_border">
								<span class="fb_button_text">{$lang->frontpage.facebook_login}</span>
							</span>
						</a>

						<div id="rpx-signin">
							<a class="rpxnow" onclick="return false;" href="https://login.habbo.com/openid/v2/signin?token_url=http%3A%2F%2Fwww.habbo.dk/rpx">{$lang->frontpage.rpx_login}</a>
						</div>
					</div>
				</div>
			</form>
		</div>

		<script type="text/javascript">
			habboPageInitQueue.push(function() {
				if (!LandingPage.focusForced) {
					LandingPage.fieldFocus('credentials-email');
				}
			});
		</script>

		<div id="alerts">
			<noscript>
				<div id="alert-javascript-container">
					<div id="alert-javascript-title">
						{$lang->frontpage.missing_javascript}
					</div>
					<div id="alert-javascript-text">
						{$lang->frontpage.missing_javascript_message}
					</div>
				</div>
			</noscript>

			<div id="alert-cookies-container" style="display:none">
				<div id="alert-cookies-title">
					{$lang->frontpage.missing_cookies}
				</div>
				<div id="alert-cookies-text">
					{$lang->frontpage.missing_cookies_message}
				</div>
			</div>

			<script type="text/javascript">
				document.cookie = "habbotestcookie=supported";
				var cookiesEnabled = document.cookie.indexOf("habbotestcookie") != -1;
				if(cookiesEnabled) {
					var date = new Date();
					date.setTime(date.getTime()-24*60*60*1000);
					document.cookie="habbotestcookie=supported; expires="+date.toGMTString();
				} else {
					if(window.habboPageInitQueue) {
						habboPageInitQueue.push(function() {
							$('#alert-cookies-container').show();
						});
					} else {
						$('alert-cookies-container').show();
					}
				}
			</script>
		</div>

		<div id="top-bar-triangle"></div>
		<div id="top-bar-triangle-border"></div>
	</header>


	<div id="content"{errorclass}>
		<ul>
			<li id="home-anchor">
				<div id="welcome">
					<a href="#registration" class="button large" id="join-now-button"><b></b><span>{$lang->frontpage.register}</span><span class="sub">{$lang->frontpage.register_free}</span></a>
					<div id="slogan">
						<h1>{$lang->frontpage.welcome}</h1>
						<p>{$lang->frontpage.welcome_motto}</p>
						<p><a id="tell-me-more-link" href="#">{$lang->frontpage.tellmore}</a></p>
					</div>
				</div>
				<div id="carousel">
					<div id="image1"></div>
					<div id="image2"></div>
					<div id="image3"></div>
					<div id="tell-me-more">{$lang->frontpage.tellmore_text}</div>
				</div>
					<div id="geotargeting">{$lang->general.users_online}</div>
				<div id="floaters"></div>
			</li>

			<li id="registration-anchor">
				<div id="registration-form">
					<div id="registration-form-header">
						<h2>{$lang->frontpage.register_userid}</h2>
						<p>{$lang->frontpage.register_userid_fill}</p>
					</div>
					<div id="registration-form-main">
						<form id="register-new-user" autocomplete="off">
							<input type="hidden" name="next" value="">

							<div id="registration-form-main-left">
								<label for="registration-birthday">{$lang->frontpage.register_birthdate}</label>
								<label for="registration-birthday" class="details">{$lang->frontpage.register_birthdate_desc}</label>
								
								<div id="registration-birthday">
									<select name="registrationBean.day" id="registrationBean_day" class="dateselector"><option value="">{$lang->frontpage.register_day}</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select> 
									<select name="registrationBean.month" id="registrationBean_month" class="dateselector"><option value="">{$lang->frontpage.register_month}</option><option value="1">{$lang->frontpage.register_month_jan}</option><option value="2">{$lang->frontpage.register_month_feb}</option><option value="3">{$lang->frontpage.register_month_mar}</option><option value="4">{$lang->frontpage.register_month_apr}</option><option value="5">{$lang->frontpage.register_month_may}</option><option value="6">{$lang->frontpage.register_month_jun}</option><option value="7">{$lang->frontpage.register_month_jul}</option><option value="8">{$lang->frontpage.register_month_aug}</option><option value="9">{$lang->frontpage.register_month_sep}</option><option value="10">{$lang->frontpage.register_month_oct}</option><option value="11">{$lang->frontpage.register_month_nov}</option><option value="12">{$lang->frontpage.register_month_dec}</option></select>
									<select name="registrationBean.year" id="registrationBean_year" class="dateselector"><option value="">{$lang->frontpage.register_year}</option>
									<?php
										$i = date("Y");
										$x = $i - 100;
										while($i > 1900) {
											echo '<option value="' . $i .'">' . $i .'</option>';
											$i--;
										}
									?>
									</select>
								</div>

								<label for="registration-email">{$lang->frontpage.register_email}</label>
								<label for="registration-email" class="details">{$lang->frontpage.register_email_desc}</label>
								
								<input type="email" name="registrationBean.email" id="registration-email" value="">

								<span id="password-field-container">
									<label for="registration-password">{$lang->frontpage.register_password}</label>
									<label for="registration-password" class="details">{$lang->frontpage.register_password_desc}</label>
									
									<input type="password" name="registrationBean.password" id="registration-password" maxlength="32" value="">
								</span>
							</div>

							<div id="registration-form-main-right">
								<div id="captcha-container">
									<label for="recaptcha_response_field">{$lang->frontpage.register_captcha}</label>
									<label for="recaptcha_response_field" class="details">{$lang->frontpage.register_captcha_desc}</label>

									<script src="https://www.google.com/recaptcha/api/js/recaptcha_ajax.js"></script>
									<script type="text/javascript">
										habboPageInitQueue.push(function() {
											Registration.setRecaptchaKey("{recaptcha}");
										});
									</script>

									<div id="captcha-image-container">
										<div id="recaptcha_image"></div>
										<div id="captcha-overlay"></div>
									</div>

									<p id="captcha-new" class="details"><a class="recaptcha-reload" href="#">{$lang->frontpage.register_captcha_newcode}</a></p>
									<input type="text" name="recaptcha_response_field" id="recaptcha_response_field">
								</div>

								<p class="checkbox-container" id="registration-tos">
									<input type="checkbox" id="tos" name="registrationBean.termsOfServiceSelection" value="true">
									
									<label for="tos" class="details checkbox">
										{$lang->frontpage.register_tos} <a href="http://help.habbo.dk/entries/267574-Brugerbetingelser" target="_blank" onclick="window.open('http://help.habbo.dk/entries/267574-Brugerbetingelser'); return false;">{$lang->frontpage.register_tos2}</a>
									</label>
								</p>

								<p class="checkbox-container">
									<input type="checkbox" id="registration-marketing" value="true" name="registrationBean.marketing">
									<label for="registration-marketing" class="details checkbox">{$lang->frontpage.register_newsletter}</label>
								</p>

								<div class="submit-button-wrapper">
									<a href="#" class="button large not-so-large register-submit"><b></b><span>{$lang->frontpage.register_submit}</span></a>
								</div>
							</div>

							<div id="parent-email-container" style="display: none;">
								<label for="parent-email">{$lang->frontpage.register_parent_email}</label>
								<label for="parent-email" class="details">{$lang->frontpage.register_parent_email_desc}</label>
								<input type="email" id="parent-email" name="registrationBean.parentEmail" value="">
								<div class="submit-button-wrapper">
								<a href="#" class="button large not-so-large register-submit"><b></b><span>{$lang->frontpage.register_submit}</span></a>
								</div>
							</div>
						</form>
					</div>
				</div>

				<div id="magnifying-glass"></div>
				<div id="sail"></div>
			</li>
		</ul>
	</div>

	<footer>
		<div id="age-recommendation"></div>

		<div id="footer-content" class="partner-logo-present">
			<div id="footer">
				<?php
					echo implode(' / ', $skin->buildFooter());
				?>
			</div>
			<div id="copyright">{$lang->general.footer}</div>
		</div>
		
		<div id="sulake-logo"><a href="http://www.sulake.com"></a></div>
	</footer>


	<script src="{webgallery}static/js/v3_landing_bottom.js" type="text/javascript"></script>
	<!--[if IE]><script src="{webgallery}static/js/v3_ie_fixes.js" type="text/javascript"></script><![endif]-->

	<script type="text/javascript">
		var rpxJsHost = (("https:" == document.location.protocol) ? "https://" : "http://static.");
		document.write(unescape("%3Cscript src='" + rpxJsHost + "rpxnow.com/js/lib/rpx.js' type='text/javascript'%3E%3C/script%3E"));

		RPXNOW.overlay = false;
		RPXNOW.language_preference = 'da'; 
		RPXNOW.flags = 'show_provider_list';
	</script>  
</body>
</html>