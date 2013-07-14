<?php
    $html->setKey(array(
        'errorcontainer' => '',

    ));
    
    if(LOGGEDIN) {
        header("Location: " . WWW . "/me");
        exit;
    }

    $lang->addTranslation('frontpage');

    if(!empty($_SESSION['login_error_msg'])) {
            $error = true;
            echo '<div id="login-errors">' . $_SESSION["login_error_msg"] . '</div>';
            unset($_SESSION['login_error_msg']);
    }
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>{sitename} - {$lang->frontpage.pagetitle}</title>
    <meta name="viewport" content="width=device-width">

    <script>
        var andSoItBegins = (new Date()).getTime();
        var habboPageInitQueue = [];
        var habboStaticFilePath = "{webgallery}";
    </script>

    <link rel="shortcut icon" href="{webgallery}v2/favicon.ico" type="image/vnd.microsoft.icon" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu:400,700,400italic,700italic">
    <link rel="stylesheet" href="{webgallery}static/styles/v3_landing.css" type="text/css" />
    <script src="{webgallery}static/js/v3_landing_top.js" type="text/javascript"></script>

    <meta name="description" content="Check into the world's largest virtual hotel for FREE! Meet and make friends, play games, chat with others, create your avatar, design rooms and more..." />
    <meta name="keywords" content="habbo hotel, virtual, world, social network, free, community, avatar, chat, online, teen, roleplaying, join, social, groups, forums, safe, play, games, online, friends, teens, rares, rare furni, collecting, create, collect, connect, furni, furniture, pets, room design, sharing, expression, badges, hangout, music, celebrity, celebrity visits, celebrities, mmo, mmorpg, massively multiplayer" />

    <meta name="build" content="63-BUILD-FOR-PATCH-1591a - 04.03.2013 12:03 - com" />
    <meta name="csrf-token" content="b6f5d32861"/>
</head>

<body>
<div id="overlay"></div>
<div id="change-password-form" class="overlay-dialog" style="display: none;">
    <div id="change-password-form-container" class="clearfix form-container">
        <h2 id="change-password-form-title">Sorry this function is not working atm.</h2>
        <a href="#" id="change-password-cancel-link">Cancel</a>
    </div>
    <div id="change-password-form-container-bottom" class="form-container-bottom"></div>
</div>

<script type="text/javascript">
    function initChangePasswordForm() {
        ChangePassword.init();
    }

    if(window.HabboView) {
        HabboView.add(initChangePasswordForm);
    } else if (window.habboPageInitQueue) {
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
                <input tabindex="2" type="text" name="credentials.username" id="credentials-email">
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
                <a href="#" tabindex="4" class="button" id="credentials-submit"><b></b><span>Login</span></a>
            </div>

             <div id="login-column-4">
<div id="fb-root"></div>
<script type="text/javascript">
    window.fbAsyncInit = function() {
        Cookie.erase("fbsr_173267902705");
        FB.init({appId: '173267902705', status: true, cookie: true, xfbml: true});
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
        
        Cookie.erase("fbsr_173267902705");
        FBobject.init({appId: '173267902705', status: true, cookie: true, xfbml: true});

        permissions = 'user_birthday,email';
        defaultAction = function(response) {

            if (response.authResponse) {
                fbConnectUrl = "/facebook?connect=true";
                Cookie.erase("fbhb_val_173267902705");
                Cookie.set("fbhb_val_173267902705", response.authResponse.accessToken);
                Cookie.erase("fbhb_expr_173267902705");
                Cookie.set("fbhb_expr_173267902705", response.authResponse.expiresIn);
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
        <span class="fb_button_text">Login med Facebook</span>
    </span>
</a>


<div id="rpx-signin">
    <a class="rpxnow" onclick="return false;" href="https://login.habbo.com/openid/v2/signin?token_url=http%3A%2F%2Fwww.habbo.dk/rpx">Flere måder at logge ind</a>
</div>        </div>


        </div>
    </form>
</div>

<script>
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
    if (cookiesEnabled) {
        var date = new Date();
        date.setTime(date.getTime()-24*60*60*1000);
        document.cookie="habbotestcookie=supported; expires="+date.toGMTString();
    } else {
        if (window.habboPageInitQueue) {
            // jquery might not be loaded yet
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


<div id="content"<?php if(isset($error)) echo ' class="login-error"'; ?>>
    <ul>
        <li id="home-anchor">
            <div id="welcome">
                <a href="#registration" class="button large" id="join-now-button"><b></b><span>Join today</span><span class="sub">(It's free)</span></a>
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
                <div id="geotargeting">{$lang->frontpage.users_online}</div>
            <div id="floaters"></div>
        </li>

        <li id="registration-anchor">
<div id="registration-form">
    <div id="registration-form-header">
        <h2>{$lang->frontpage.register_userid}</h2>
        <p>{$lang->frontpage.register_userid_fill}</p>
    </div>
    <div id="registration-form-main">
        <form action="{www}/registration/submit" id="register-new-user" autocomplete="off">

        <div id="registration-form-main-left">
            <label for="registration-birthday">{$lang->frontpage.register_birthdate}</label>
            <label for="registration-birthday" class="details">{$lang->frontpage.register_birthdate_desc}</label>
            <div id="registration-birthday">
<select name="registrationBean.month" id="registrationBean_month" class="dateselector"><option value="">{$lang->frontpage.register_month}</option><option value="1">{$lang->frontpage.register_month_jan}</option><option value="2">{$lang->frontpage.register_month_feb}</option><option value="3">{$lang->frontpage.register_month_mar}</option><option value="4">April</option><option value="5">{$lang->frontpage.register_month_may}</option><option value="6">{$lang->frontpage.register_month_jun}</option><option value="7">{$lang->frontpage.register_month_jul}</option><option value="8">{$lang->frontpage.register_month_aug}</option><option value="9">{$lang->frontpage.register_month_sep}</option><option value="10">{$lang->frontpage.register_month_oct}</option><option value="11">{$lang->frontpage.register_month_nov}</option><option value="12">{$lang->frontpage.register_month_dec}</option></select> <select name="registrationBean.day" id="registrationBean_day" class="dateselector"><option value="">{$lang->frontpage.register_day}</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select> <select name="registrationBean.year" id="registrationBean_year" class="dateselector"><option value="">{$lang->frontpage.register_year}</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option><option value="1904">1904</option><option value="1903">1903</option><option value="1902">1902</option><option value="1901">1901</option><option value="1900">1900</option></select>             </div>
            <label for="registration-email">{$lang->frontpage.register_email}</label>
            <label for="registration-email" class="details">{$lang->frontpage.register_email_desc}</label>
            <input type="email" name="registrationBean.email" id="registration-email" value="">

            <label for="registration-password">{$lang->frontpage.register_password}</label>
            <label for="registration-password" class="details">{$lang->frontpage.register_password_desc}</label>
            <input type="password" name="registrationBean.password" id="registration-password" maxlength="32" value="">
        </div>
        <div id="registration-form-main-right">
            <div id="captcha-container">

                <label for="recaptcha_response_field">{$lang->frontpage.register_captcha}</label>
                <label for="recaptcha_response_field" class="details">{$lang->frontpage.register_captcha_desc}</label>

                    <script src="https://www.google.com/recaptcha/api/js/recaptcha_ajax.js"></script>
                    <script>
                        habboPageInitQueue.push(function() {
                            RecaptchaUtil.showRecaptcha("captcha-container", "<?php echo $core->settings->recaptcha; ?>")
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
                    {$lang->frontpage.register_tos} <a href="{www}/help/index?topic=2" target="_blank" onclick="window.open('{www}/help/index?topic=2'); return false;">{$lang->frontpage.register_tos2}</a> {$lang->frontpage.register_tos3}
                </label>
            </p>
            <p class="checkbox-container">

                <input type="checkbox" id="registration-marketing" value="true" name="registrationBean.marketing">
                <label for="registration-marketing" class="details checkbox">{$lang->frontpage.register_newsletter}</label>
            </p>
            <div class="submit-button-wrapper">
                <a href="#" class="button large not-so-large register-submit"><b></b><span>{$lang->frontpage.register_done}</span></a>
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

    <div id="footer-content">
        <?php
            $footer = array();
            $result = $sql->query("SELECT * FROM habbocms_navi WHERE active = '4' ORDER BY position");
            while($row = $sql->fetch($result)) {
                $footer[] = '<a href="' . $row["link"] . '" target="' . $row["target"] . '">' . $row["value"] . '</a>';
            }
        ?>
        <div id="footer"><?php echo implode(' l ', $footer); ?></div>
        <div id="copyright">{$lang->general.footer}</div>
    </div>
    <div id="sulake-logo"><a href="http://www.sulake.com"></a></div>
</footer>


<script src="{webgallery}static/js/v3_landing_bottom.js" type="text/javascript"></script>
<!--[if IE]><script src="{webgallery}static/js/v3_ie_fixes.js" type="text/javascript"></script>
<![endif]-->

</body>
</html>