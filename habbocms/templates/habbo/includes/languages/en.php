<?php
 switch($page) {

   case "general":
     $s['general.users_online'] = '{onlinecnt} {sitename}s online';
     $s['general.hey_there'] = 'Hey there {username}!';
     $s['general.footer'] = '{sitename} is a free version of <a href="http://www.{sitename}.com" target="_new" class="copyright">{sitename} Hotel</a> - Do not use or share your {sitename} information!<br>Most of the pictures belong and is copyrighted to Sulake Corporation Oy.';
     $s['general.footer_link_'] = ''; 
   break;

   case "frontpage":
     $s['frontpage.pagetitle'] = 'Frontpage';

     $s['frontpage.email'] = 'Username'; //Should be username, not email!!!
     $s['frontpage.password'] = 'Password';
     $s['frontpage.keeplogged'] = 'Keep me logged in';
     $s['frontpage.forgot'] = 'Forgot your password?';
     $s['frontpage.facebook_login'] = 'Login with Facebook';
     $s['frontpage.missing_javascript'] = 'Missing JavaScript support';
     $s['frontpage.missing_javascript_message'] = 'Javascript is disabled on your browser. Please enable JavaScript or upgrade to a Javascript-capable browser to use {sitename} :)';
     $s['register.missing_cookies'] = 'Missing cookie support';
     $s['register.missing_cookies_message'] = 'Cookies are disabled on your browser. Please enable cookies to use {sitename}.';
     
     
     $s['frontpage.welcome'] = 'Welcome to {sitename},';
     $s['frontpage.welcome_motto'] = 'a strange place with awesome people.';
     $s['frontpage.tellmore'] = 'Tell me more...';
     $s['frontpage.tellmore_text'] = '{fullname} is a virtual world for players 13 years and older, where you can create your very own {sitename} character and design your room the way you like. You\'ll meet new friends, chat, organize parties, look after virtual pets, create and play games and complete quests. Click \'Join Today\' to get started!';
     
     $s['frontpage.register'] = 'JOIN TODAY';
     $s['frontpage.register_free'] = '(It\'s free)';

     $s['frontpage.register_userid'] = 'USER ID';
     $s['frontpage.register_userid_fill'] = 'Fill in these details to begin:';
     $s['frontpage.register_birthdate'] = 'Birthdate';
     $s['frontpage.register_birthdate_desc'] = 'We will use this to restore your account if you ever lose access. Your birth date will never be shared publicly.';

     $s['frontpage.register_month'] = 'Month';
     $s['frontpage.register_month_jan'] = 'January';
     $s['frontpage.register_month_feb'] = 'February';
     $s['frontpage.register_month_mar'] = 'March';
     $s['frontpage.register_month_apr'] = 'April';
     $s['frontpage.register_month_may'] = 'May';
     $s['frontpage.register_month_jun'] = 'June';
     $s['frontpage.register_month_jul'] = 'July';
     $s['frontpage.register_month_aug'] = 'August';
     $s['frontpage.register_month_sep'] = 'September';
     $s['frontpage.register_month_oct'] = 'October';
     $s['frontpage.register_month_nov'] = 'November';
     $s['frontpage.register_month_dec'] = 'Descember';
     $s['frontpage.register_day'] = 'Day';
     $s['frontpage.register_year'] = 'Year';

     $s['frontpage.register_email'] = 'Email';
     $s['frontpage.register_email_desc'] = 'You\'ll need to use this <b>email address to log in</b> to {sitename} in the future. Please use a valid address.';
     $s['frontpage.register_password'] = 'Password';
     $s['frontpage.register_password_desc'] = 'Password must be at least <b>6 characters </b>long and include <b>letters and numbers</b>';
     $s['frontpage.register_captcha'] = 'Captcha';
     $s['frontpage.register_captcha_desc'] = 'Type in the two words (separated with a space):';
     $s['frontpage.register_captcha_newcode'] = 'Try new code';
     $s['frontpage.register_tos'] = 'I accept the';
     $s['frontpage.register_tos2'] = 'Terms Of Service';
     $s['frontpage.register_tos3'] = 'and Privacy Policy';
     $s['frontpage.register_newsletter'] = 'Keep me updated about the latest {sitename} happenings, news and gossip!';
     $s['frontpage.register_done'] = 'Done';
   break;

   case "lostpw":
     $s['forgot_header'] = 'Forgot Password?';
     $s['forgot_field'] = 'Type in your {sitename} account email address:';
     $s['forgot_invalid_name'] = 'Please enter a correct email address';
     $s['forgot_cancel'] = 'Cancel';
     $s['forgot_request'] = 'Request Reset';
     $s['forgot_sent'] = 'Hey, we just sent you an email with a link that lets you reset your password.<br><br>NOTE! Remember to check your "junk" folder too!';
     $s['forgot_back'] = 'Back';
     $s['forgot_ok'] = 'OK';
   break;

   case "error":
     $s['error.page_name'] = 'Error';
     $s['error.header'] = 'Page not found!';
     $s['error.top'] = 'Sorry, but we cant find the page you requested.';
     $s['error.content'] = 'Please try typing the URL again. If you end up back here, please use the \'Back\' button to get back to where you started.';
   break;

   case "me":
     $s['me.pagetitle'] = 'Me';
     $s['me.name'] = 'Name:';
     $s['me.motto'] = 'Motto:';
     $s['me.last_online'] = 'Last signed in:';
     $s['me.enter'] = 'Enter {fullname}';
   break;

   case "community":
     $s['community.page_name'] = 'Community';
     $s['community.random_{sitename}s'] = 'Random {sitename}s';
     $s['community.member_since'] = 'Member since: {joindate}';
   break;

   case "social":
     $s['social.title'] = 'Social media';
     $s['social.top'] = 'Let\'s get social!';
     $s['social.text'] = 'Follow @{hotel_twitter} at twitter.';
   break;

   case "staff":
     $s['staff.managers'] = 'Hotel Managers';
     $s['staff.managers_desc'] = 'Desc';
     $s['staff.moderators'] = 'Moderators';
     $s['staff.moderators_desc'] = 'desc';
     $s['staff.events'] = 'Event staff';
     $s['staff.events_desc'] = 'desc';
     $s['staff.none'] = 'There are currently no staff in this group.';
     $s['staff.about_title'] = '{sitename} Staff';
     $s['staff.about_title_left'] = 'Information';
     $s['staff.about_text'] = 'Write something about staff and what they do on your language here.';
   break;

   case "campains":
     $s['campains.enterhotel'] = 'Enter {fullname} >>>';
   break;

   case "security_check":
     $s['security_check.missing_field'] = 'Please enter your email and password to log in.';
     $s['security_check.wrong_password'] = 'Incorrect password. Forgotten your password?';
     $s['security_check.request_password'] = 'Request a new one.';
     $s['security_check.banned'] = 'You have been banned! The reason for the ban is "{banned_reason}" and will expire: <span title="{banned_timeleft} left">{banned_expire_time}</span>.';
   break;

   case "profile":
     $s['profile.pagetitle'] = 'Mine indstilliger';
     $s['profile.header'] = 'Konto indstillinger';
     $s['profile.preferences'] = 'Min ops&aelig;tning';
     $s['profile.personalfeeds'] = 'Personlig besked';
     $s['profile.friendmanagement'] = 'Venneindstillinger';
     $s['profile.identitysettings'] = 'Password indstillinger';
     $s['profile.facebooksettings'] = 'Facebook indstillinger';
     $s['profile.tabheader1'] = '&aelig;ndre din profil';
     $s['profile.tabheader2'] = 'Personlig indstillinger';
     $s['profile.tabheader3'] = 'Venneindstillinger';
     $s['profile.tabheader4'] = 'Skift dit password';
     $s['profile.tabheader4'] = 'Facebook settings';
   break;


   case "profiletab1":
     $s['profile.update_success'] = 'Profile update successful!';
     $s['profile.update_error'] = 'Error updating your account. Please try agian!';
     $s['profile.yourmotto'] = 'Your motto';
     $s['profile.motto_desc'] = 'Your motto is what other {sitename}s will see on your {sitename} Home page and when clicking your {sitename} in the Hotel.';
     $s['profile.motto'] = 'Motto';
     $s['profile.friendrequests'] = 'Friend Requests';
     $s['profile.friendrequests_enabled'] = 'Friend requests enabled';
     $s['profile.onlinestatus'] = 'Online status';
     $s['profile.onlinestatus_desc'] = 'Select who can see your online status:';
     $s['profile.followme'] = 'Follow Me Settings';
     $s['profile.followme_desc'] = 'Select who can follow you from room to room:';
     $s['profile.nobody'] = 'Nobody';
     $s['profile.everyone'] = 'Everybody';
     $s['profile.myfriends'] = 'My friends';
     $s['profile.save'] = 'Save changes';
   break;

   case "profiletab2":
     $s['profile.commingsoon'] = 'Personal Feeds are comming soon!';
   break;

   case "profiletab3":
     $s['profile.commingsoon'] = 'Friend Managment are comming soon!';
   break;

   case "profiletab4":
     $s['profile.changepass'] = 'Change your password';
     $s['profile.changepass_desc'] = 'To make sure you are the owner of the account please fill in your privious password first, then your new password.';
     $s['profile.currentpw'] = 'Current password';
     $s['profile.newpw'] = 'New password';
     $s['profile.newrepw'] = 'Confirm password';
     $s['profile.save'] = 'Save changes';
     $s['profile.success'] = 'Your password has been changed.';
     $s['profile.error_unknown'] = 'Unknown error while changing your password.';
     $s['profile.error_wronglength'] = 'Your password need to be 6-20 characters long.';
     $s['profile.error_notmatching'] = 'Passwords didn\'t match.';
     $s['profile.error_wrongpw'] = 'Wrong password.';
     $s['profile.error_missingfield'] = 'Please fill in all fields.';
   break;

   case "shop":
    $s['shop.buydiamonds'] = 'Buy Diamonds';
    $s['shop.continue'] = 'Continue';
    $s['shop.signin'] = 'Please sign in first';
    $s['shop.how_to_buy'] = 'How to buy a PaySafeCard';
    $s['shop.paysafecard_step1'] = 'Walk to your nearest PaySafeCard Merchant store';
    $s['shop.paysafecard_step1_locate'] = 'Find it here';
    $s['shop.paysafecard_step2'] = 'Ask to buy a PaySafeCard with value of 100, 300, 500 or 1000 {currency} and checkout.';
    $s['shop.paysafecard_step3'] = 'Checkout as normal here on this page (the form over this box)';
    $s['shop.paysafecard_recommended'] = 'We recommend using PaySafeCard when buying diamonds. If there should be any problem its quicker and easier for you to get support by us. Plus its 100% anonymous!';
    $s['shop.spendon'] = 'Spend diamonds on?';
    $s['shop.spendon_1'] = 'Sell to others in-game for rares.';
    $s['shop.spendon_2'] = 'Exchange for';
    $s['shop.spendon_2_vip'] = 'VIP';
    $s['shop.spendon_2_end'] = 'in-game.';
    $s['shop.spendon_3'] = 'Buy rares or exclusize badges';
    $s['shop.spendon_4'] = 'Buy bots in your room(s).';
    $s['shop.spendon_5'] = 'Buy limited edition rares';
    $s['shop.problems'] = 'Do you have a problem buying/using Diamonds or a question? Use the ';
    $s['shop.problems_helptool'] = 'Help tool';
    $s['shop.problems_end'] = 'to get in touch with us!';
    $s['shop.moreinfo'] = 'More information about Credits, Shells, Diamonds';
    $s['shop.permission_title'] = 'Always ask for bill-payer for permission before purchasing diamonds.';
    $s['shop.permission_desc'] = 'All payments are counted as a donation and there is <u>no refund</u>. If you have a issue or a question contact us via the';
    $s['shop.permission_helptool'] = 'Help Tool.';
    $s['shop.vip_benefits'] = 'Buy {sitename} VIP and get access to cool features like <b>Change name</b>,<br><b>:pull</b>,<br><b>:push</b>,<br><b>:moonwalk</b>,<br><b>:mimic</b>,<br><b>:follow</b>';
    $s['shop.supervip_benefits'] = 'Buy {sitename} Super VIP and get access to all features like <b>VIP</b>,<br><b>2 Weekly rares</b>,<br><b>Enter full rooms</b>,<br><b>Super wired</b>,<br><b>Exclusize rooms</b>';
    $s['shop.badgeshop_price'] = 'Price';
    $s['shop.credits'] = 'Credits';
    $s['shop.pixels'] = 'Pixels';
    $s['shop.vip_points'] = 'Shells';
    $s['shop.botshop_title'] = 'Bots are comming soon!';
    $s['shop.botshop_desc'] = 'Sorry but bots are not avaible to buy at this moment. Please check back later!';
   break;

   case "navigator":
    $s['navigator.welcomemessage'] = 'Hello there, {username}!';
    $s['navigator.signout'] = 'Sign out';
    $s['navigator.enter'] = 'Enter {fullname}';
    $s['navigator.users_online'] = '{onlinecnt} {sitename}s online';
   break;

   case "shop_confirm":
    $s['shop_confirm.pagetitle'] = 'Confirm payment';
    $s['shop_confirm.title'] = 'Confirm payment details';
    $s['shop_confirm.details'] = 'Payment details';
    $s['shop_confirm.product'] = 'Product';
    $s['shop_confirm.price'] = 'Price';
    $s['shop_confirm.name'] = '{sitename} Name';
    $s['shop_confirm.confirm_email'] = '<b>{username}</b>, confirm your email adress.';
    $s['shop_confirm.pay_with'] = 'Pay with';
    $s['shop_confirm.tos'] = 'By proceeding you accept our';
    $s['shop_confirm.tos2'] = 'Terms and Conditions';
    $s['shop_confirm.back'] = 'Back to {sitename}';
    $s['shop_confirm.permission'] = 'Important Message';
    $s['shop_confirm.permission_text'] = 'Always ask the bill-payer\'s permission first. If you don\'t and the payment is later canceled or declined, you\'ll be banned.';
    $s['shop_confirm.permission_text2'] = 'All legitimate ways to buy Credits are shown here. Buying them elsewhere may get you ripped off and banned.';
    $s['shop_confirm.paysafecard_enter'] = '<b>{username}</b>, please enter your PaySafeCard code(s)';
    $s['shop_confirm.paysafecard_submit'] = 'Complete payment';
    $s['shop_confirm.paysafecard_invalid'] = 'One of the codes was invalid, make sure to add the - and 5 digits in between.<br>If you dont have a secound code leave it blank.';
    $s['shop_confirm.paysafecard_allreadyone'] = 'There is a allready a pending order with one of your codes. Please try agian in 24hours if you con\'t get your goods.';
   break;

   case "logout":
    $s['logout.pagetitle'] = 'Logout';
    $s['logout.success'] = 'You have successfully signed out.';
    $s['logout.session_expired'] = 'Session expired. You have been signed out due to inactivity. Please sign in again.';
    $s['logout.ok'] = 'OK';
    $s['logout.users_online'] = '{sitename}s online';
   break;

   case "registererrors":
    $s['registererror.email'] = 'Please enter a valid email address';
    $s['registererror.enter_password'] = 'Please enter a password';
    $s['registererror.wrong_password_length'] = 'Your password needs be at least 6 characters long';
    $s['registererror.tos'] = 'Please accept the terms of service';
    $s['registererror.security_code'] = 'The security code was invalid, please try again.';
   break;
 }
?>