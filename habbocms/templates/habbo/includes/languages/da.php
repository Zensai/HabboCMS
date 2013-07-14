<?php
    $general = array(
        'general.users_online' => '{onlinecnt} {sitename}er online nu!',
        'general.hey_there' => 'Hej {username}!',
        'general.footer' => '© 2004 - 2013 Sulake Corporation Oy. HABBO is a registered trademark of Sulake Corporation Oy in the European Union, the USA, Japan, the People\'s Republic of China and various other jurisdictions. All rights reserved.',
    );
            
    $frontpage = array(
        'frontpage.pagetitle' => 'Forside',

        'frontpage.lostpw_header' => 'Glemt Adgangskode?',
        'frontpage.lostpw_entermail' => 'Indtast email adressen til din {sitename} konto:',
        'frontpage.lostpw_entervalidmail' => 'Indtast en gyldig email adresse',
        'frontpage.lostpw_cancel' => 'Fortryd',
        'frontpage.lostpw_sendmail' => 'Send mig en email',
        'frontpage.lostpw_sent' => 'Vi har sendt dig en email med et link, som du skal klikke på for at skifte din adgangskode.<br><br>VIGTIGT! Husk at tjekke din "uønsket mail" også!',
        'frontpage.lostpw_back' => 'Tilbage',
        'frontpage.lostpw_close' => 'Luk',
        'frontpage.lostpw_' => '',

        'frontpage.email' => 'Brugernavn',
        'frontpage.password' => 'Adgangskode',
        'frontpage.keeplogged' => 'Forbliv logget ind',
        'frontpage.login' => 'Login',
        'frontpage.forgot' => 'Glemt adgangskode?',
        'frontpage.facebook_login' => 'Login med Facebook',
        'frontpage.rpx_login' => 'Flere måder at logge ind',

        'frontpage.missing_javascript' => 'Manglende JavaScript support',
        'frontpage.missing_javascript_message' => 'Javascript er slået fra i din browser. Du skal lige aktivere JavaScript eller opdatere til en Javascript-kompatibel browser for at bruge {sitename} :)',
        'frontpage.missing_cookies' => 'Problem med cookies',
        'frontpage.missing_cookies_message' => 'Cookies er slået fra i din browser. Du skal slå cookies til for at bruge {sitename}.',
        
        'frontpage.register' => 'TILMELD DIG I DAG',
        'frontpage.register_free' => '(Det er gratis)',
        
        
        'frontpage.welcome' => 'Velkommen til {sitename},',
        'frontpage.welcome_motto' => 'et underligt sted med skønne mennesker.',
        'frontpage.tellmore' => 'Fortæl mere...',
        'frontpage.tellmore_text' => '{fullname} er en virtuel verden for spillere i alderen 13 år og derover, hvor du kan skabe din helt egen {sitename}-figur, og designe dit rum præcist som du vil. Du kan også møde nye venner, chatte, planlægge fester, passe virtuelle kæledyr, skabe og spille spil og gennemføre quests. Klik på "Tilmeld her" for at komme i gang!',
        
        'frontpage.register_userid' => 'BRUGER-ID',
        'frontpage.register_userid_fill' => 'Udfyld disse oplysninger til at begynde med',
        'frontpage.register_birthdate' => 'Fødselsdato',
        'frontpage.register_birthdate_desc' => 'Vi vil bruge dette til at gendanne din konto, hvis du skulle miste adgang. Din fødselsdato vil aldrig blive delt offentligt.',
        'frontpage.register_day' => 'Dag',
        'frontpage.register_month' => 'Måned',
        'frontpage.register_month_jan' => 'Januar',
        'frontpage.register_month_feb' => 'Februar',
        'frontpage.register_month_mar' => 'Marts',
        'frontpage.register_month_apr' => 'April',
        'frontpage.register_month_may' => 'Maj',
        'frontpage.register_month_jun' => 'Juni',
        'frontpage.register_month_jul' => 'Juli',
        'frontpage.register_month_aug' => 'August',
        'frontpage.register_month_sep' => 'September',
        'frontpage.register_month_oct' => 'Oktober',
        'frontpage.register_month_nov' => 'November',
        'frontpage.register_month_dec' => 'Descember',
        'frontpage.register_year' => 'År',
        'frontpage.register_email' => 'Email',
        'frontpage.register_email_desc' => 'Du skal bruge denne <b>email adresse til at logge ind</b> på {sitename} fremover. Så sørg for at bruge en gyldig email.',
        'frontpage.register_password' => 'Adgangskode',
        'frontpage.register_password_desc' => 'Adgangskoden skal være mindst <b>6 tegn</b> lang og indeholde <b>bogstaver og tal</b>',
        'frontpage.register_captcha' => 'Captcha',
        'frontpage.register_captcha_desc' => 'Indtast de to ord (med mellemrum)',
        'frontpage.register_captcha_newcode' => 'Prøv med en ny kode',
        'frontpage.register_tos' => 'Jeg accepterer',
        'frontpage.register_tos2' => 'Brugerbetingelser',
        'frontpage.register_newsletter' => 'Send mig {sitename}s ugentlige nyhedsmail med konkurrencer og snigpremierer på nye ting.',
        'frontpage.register_parent_email' => 'Forældres email',
        'frontpage.register_parent_email_desc' => 'Siden du er under 15 år, er vi nødt til at informere dine forældre om, at du har oprettet dig på {sitename}.',
        'frontpage.register_submit' => 'Færdig',
    );

    $loginerrors = array(
        //'loginerrors.' => '',
        'loginerrors.missing_field' => 'Indtast din email og din adgangskode for at logge ind.',
        'loginerrors.wrong_password' => 'Forkert kode. Din e-mail eller din adgangskode er forkert. Har du glemt din adgangskode klik \'glemt adgangskode\'.',
        'loginerrors.banned' => 'Du er banned! Grunden til ban er "{banned_reason}" og vil udløbe: <span title="{banned_timeleft} tilbage">{banned_expire_time}</span>.',
        
        'loginerrors.' => '',
        'loginerrors.' => '',
        'loginerrors.' => '',
        'loginerrors.' => '',
    );

    $registererrors = array(
        //'registererrors.' => '',
        'registererrors.enter_birthday' => 'Angiv venligst en gyldig dato',
        'registererrors.email_invalid' => 'Indtast venligst en gyldig e-mailadresse',
        'registererrors.email_allready_inuse' => 'Emailen er allerede i brug. Hvis du vil oprette en Habbo, så <a href=\"\/\">log venligst ind<\/a> med dit Habbo ID og klik på \"Tilføj Habbo\". Hvis du har glemt din adgangskode, kan du <a href=\"#home\">nulstille den her.<\/a>',
        'registererrors.enter_password' => 'Indtast en kode',
        'registererrors.password_wronglength' => 'Din adgangskode skal være på mindst 6 tegn',
        'registererrors.tos' => 'Accepter venligst brugerbetingelserne',
        'registererrors.captcha' => 'Kontrolkoden var ugyldig. Forsøg venligst igen.',
    );
            
    $lostpw = array(
        'forgot_header' => 'Glemt adgangskode?',
        'forgot_field' => 'Skriv din {sitename} konto email adresse:',
        'forgot_invalid_name' => 'Skriv venligst din rigtige email adresse',
        'forgot_cancel' => 'Annuller',
        'forgot_request' => 'Anmod om ny',
        'forgot_sent' => 'Hey, vi har lige sendt dig en email med et link til at nulstille din kode.<br><br>NOTE! Husk at tjekke din "junk" mail ogs&aring;!',
        'forgot_back' => 'Tilbage',
        'forgot_ok' => 'OK',
    );
            
    $error = array(
        'error.page_name' => 'Fejl',
        'error.header' => 'Siden ikke fundet!',
        'error.top' => 'Sorry, men fandt ikke siden du ledte efter.',
        'error.content' => 'Pr&oslash;v at skrive URL igen. Hvis du stadig kommer hertil, s&aring; brug \'Back\' for at komme tilbage hvor du startede.',
    );
            
    $me = array(
        'me.pagetitle' => 'Hjem',
        'me.name' => 'Navn',
        'me.motto' => 'Motto',
        'me.last_online' => 'Sidste besøg',
        'me.enter' => 'Til hotellet',

    );
            
    $community = array(
        'community.page_name' => 'Community',
        'community.random_habbos' => 'Tilf&aelig;ldige {sitename}er',
        'community.member_since' => 'Medlem siden: {joindate}',
    );
            
    $social = array(
        'social.title' => 'Social media',
        'social.top' => 'Let\'s get social!',
        'social.text' => 'F&oslash;lg os @{hotel_twitter} p&aring; twitter.',
    );
            
    $staff = array(
        'staff.managers' => 'Events Manager',
        'staff.managers_desc' => 'Events Manager',
        'staff.moderators' => 'Event Staff',
        'staff.moderators_desc' => 'Event Staff',
        'staff.events' => 'Moderators',
        'staff.events_desc' => 'Moderators',
        'staff.none' => 'Der er ingen staff i denne kategori endnu.',
        'staff.about_title' => '{sitename} Staff',
        'staff.about_title_left' => 'Information',
        'staff.about_text' => 'Vi vil skrive p&aring; vores facebook side n&aring;r vi s&oslash;ger staff.',
    );
            
    $campains = array(
        'campains.enterhotel' => 'Enter {fullname} >>>',
    );
            
    $profile = array(
        'profile.pagetitle' => 'Mine indstilliger',
        'profile.header' => 'Konto indstillinger',
        'profile.preferences' => 'Min profil',
        'profile.personalfeeds' => 'Personlig besked',
        'profile.friendmanagement' => 'Venneindstillinger',
        'profile.identitysettings' => 'Min adgangskode',
        'profile.facebooksettings' => 'Facebook indstillinger',
        'profile.tabheader1' => 'Rediger din profil',
        'profile.tabheader2' => 'Personlig indstillinger',
        'profile.tabheader3' => 'Venneindstillinger',
        'profile.tabheader4' => 'Skift din adgangskode',
        'profile.tabheader5' => 'Facebook indstillinger',
    );
            
    $profiletab1 = array(
        'profile.update_success' => 'Profilopdatering lykkedes!',
        'profile.update_error' => 'Fejl updating din konto. Pr&oslash;v igen!',
        'profile.yourmotto' => 'Din status',
        'profile.motto_desc' => 'Din status er det som andre {sitename}er ser i dit {sitename} Home og under din {sitename} inde p&aring; Hotellet.',
        'profile.motto' => 'Status',
        'profile.friendrequests' => 'Venne anmodninger',
        'profile.friendrequests_enabled' => 'Venneanmodning aktivt',
        'profile.onlinestatus' => 'Online status',
        'profile.onlinestatus_desc' => 'V&aelig;lg hvem der kan se dig online',
        'profile.followme' => 'F&oslash;lg mig indstillinger',
        'profile.followme_desc' => 'V&aelig;lg hvem som kan f&oslash;lge dig fra rum til rum',
        'profile.nobody' => 'Ingen',
        'profile.everyone' => 'Alle',
        'profile.myfriends' => 'Mine venner',
        'profile.save' => 'Gem &aelig;ndringer',
    );
            
    $profiletab2 = array(
        'profile.commingsoon' => 'Personal Feeds are comming soon!',
    );
            
    $profiletab3 = array(
        'profile.commingsoon' => 'Friend Managment are comming soon!',
    );
            
    $profiletab4 = array(
        'profile.changepass' => 'Skift din adgangskode',
        'profile.changepass_desc' => 'For at sikre os du er den rigtige ejer s&aring; skriv lige dit gamle adgangskode og dern&aelig;st det nye.',
        'profile.currentpw' => 'Nuv&aelig;rende adgangskode',
        'profile.newpw' => 'Ny adgangskode',
        'profile.newrepw' => 'Ny adgangskode (igen)',
        'profile.save' => 'Skift',
        'profile.success' => 'Dit adgangskode er skiftet.',
        'profile.error_unknown' => 'Ukendt fejl ved skiftning af adgangskode.',
        'profile.error_wronglength' => 'Dit adgangskode skal v&aelig;re 6-20 tegn langt.',
        'profile.error_notmatching' => 'Din nye adgangskode passer ikke med den gentastede adgangskode.',
        'profile.error_wrongpw' => 'Forkert adgangskode.',
        'profile.error_missingfield' => 'Udfyld venligst alle felter.',
    );
            
    $shop = array(
        'shop.buydiamonds' => 'K&oslash;b Diamanter',
        'shop.continue' => 'Forts&aelig;t',
        'shop.signin' => 'Tilmeld dig f&oslash;rst',
        'shop.how_to_buy' => 'Hvordan k&oslash;ber man PaySafeCard',
        'shop.paysafecard_step1' => 'G&aring; til n&aelig;rmeste PaySafeCard forhandler',
        'shop.paysafecard_step1_locate' => 'Find dem her',
        'shop.paysafecard_step2' => 'Bed om et PaySafeCard p&aring; enten 100, 300, 500 eller 1000 DKK og Check ud.',
        'shop.paysafecard_step3' => 'Checkout as normal here on this page (the form over this box)',
        'shop.paysafecard_recommended' => 'Vi anbefaler at bruge PaySafeCard ved k&oslash;b af diamanter. Der skulle ikke v&aelig;re nogen problemer, og det er den hurtigste m&aring;de at st&oslash;tte os p&aring;. Plus det er 100% anonyment!',
        'shop.spendon' => 'Brug diamanter til?',
        'shop.spendon_1' => 'S&aelig;lg til andre for rares.',
        'shop.spendon_2' => 'Veksel dem til',
        'shop.spendon_2_vip' => 'VIP',
        'shop.spendon_2_end' => 'online.',
        'shop.spendon_3' => 'K&oslash;b rares eller specielle skilte',
        'shop.spendon_4' => 'K&oslash;b bots til dine rum.',
        'shop.spendon_5' => 'K&oslash;b tidsbegr&aelig;nset rares',
        'shop.problems' => 'Har du problemer med k&oslash;b/brug af Diamanter eller har sp&oslash;rgsm&aring;l? Brug ',
        'shop.problems_helptool' => 'Hj&aelig;lp',
        'shop.problems_end' => 'for at kontakte staff!',
        'shop.moreinfo' => 'Flere informationer om M&oslash;nter, Muslinger, Diamanter',
        'shop.permission_title' => 'Sp&oslash;rg altid dine for&aelig;ldre om lov f&oslash;r du k&oslash;ber Diamanter.',
        'shop.permission_desc' => 'Alle indbetalinger er til hotellet og der er <u>ingen fortrydelse</u>. Hvis du har nogen indvendinger s&aring; brug',
        'shop.permission_helptool' => 'Hj&aelig;lp muligheden.',
        'shop.vip_benefits' => 'K&oslash;b {sitename} VIP og f&aring; adgang til <b>Skift navn</b>,<br><b>:pull</b>,<br><b>:push</b>,<br><b>:moonwalk</b>,<br><b>:mimic</b>,<br><b>:follow</b>',
        'shop.supervip_benefits' => 'K&oslash;b {sitename} Super VIP og f&aring; samme som vip <b>VIP</b>,<br><b>2 Ugentlig rares</b>,<br><b>Enter full rooms</b>,<br><b>Super wired</b>,<br><b>Exclusize rooms</b>',
        'shop.badgeshop_price' => 'Pris',
        'shop.credits' => 'M&oslash;nter',
        'shop.pixels' => 'Pixels',
        'shop.vip_points' => 'Muslinger',
        'shop.botshop_title' => 'Bots kommer senere!',
        'shop.botshop_desc' => 'Sorry men BOTS er ikke aktiveret endnu. Pr&oslash;v igen senere!',
    );
            
    $navigator = array(
        'navigator.welcomemessage' => 'Hej, {username}!',
        'navigator.signout' => 'Log ud',
        'navigator.enter' => 'Tjek ind p&aring; {fullname}',
        'navigator.users_online' => '{onlinecnt} {sitename}er online nu!',
    );
            
    $shop_confirm = array(
        'shop_confirm.pagetitle' => 'Bekr&aelig;ft k&oslash;b',
        'shop_confirm.title' => 'Bekr&aelig;ft k&oslash;bs indstillinger',
        'shop_confirm.details' => 'K&oslash;bs indstillinger',
        'shop_confirm.product' => 'Vare',
        'shop_confirm.price' => 'Pris',
        'shop_confirm.name' => '{sitename} Navn',
        'shop_confirm.confirm_email' => '<b>{username}</b>, bekr&aelig;ft din email adresse.',
        'shop_confirm.pay_with' => 'Betal med',
        'shop_confirm.tos' => 'Fors&aelig;t og bekr&aelig;ft',
        'shop_confirm.tos2' => 'Vores regler og betingelser',
        'shop_confirm.back' => 'Tilabe til {sitename}',
        'shop_confirm.permission' => 'Important Message',
        'shop_confirm.permission_text' => 'Sp&oslash;rg ALTID om lov f&oslash;r du k&oslash;ber da vi ikke refundere dit k&oslash;b, og fors&oslash;ger du at tr&aelig;kke betalingen tilbage vil du blive banned.',
        'shop_confirm.permission_text2' => 'Alle k&oslash;b skal ske via vores side, og finder vi anden handel vil du blive banned.',
        'shop_confirm.paysafecard_enter' => '<b>{username}</b>, Skriv venligst din PaySafeCard kode',
        'shop_confirm.paysafecard_submit' => 'Bekr&aelig;ft dit k&oslash;b',
        'shop_confirm.paysafecard_invalid' => 'En af koderne er forkerte, Sikre dig du skriver - den rigtige kode.<br>Hvis du ikke har en anden kode, lad feltet v&aelig;re blank.',
        'shop_confirm.paysafecard_allreadyone' => 'Din kode har allerede v&aelig;ret brugt. Pr&oslash;v igen om 24 timer hvis du ikke har f&aring;et din varer.',
    );
            
    $logout = array(
        'logout.pagetitle' => 'Logud',
        'logout.success' => 'Du blev logget ud korrekt.',
        'logout.session_expired' => 'Siden udl&oslash;b. Du er logget ud grundet inaktivitet. Log venligst ind igen.',
        'logout.ok' => 'OK',
        'logout.users_online' => '{sitename}er online nu!',
    );
            
    $registerstep1 = array(
        'register.missing_javascript' => 'Missing JavaScript support',
        'register.missing_javascript_message' => 'Javascript is disabled on your browser. Please enable JavaScript or upgrade to a Javascript-capable browser to use Habbo :)',
        'register.missing_cookies' => 'Missing cookie support',
        'register.missing_cookies_message' => 'Cookies are disabled on your browser. Please enable cookies to use Habbo.',
        'register.birthdate' => 'F&oslash;dselsdag',
        'register.accountdetails' => 'Konto detaljer',
        'register.security_check' => 'Sikkerheds tjek',
        'register.error_invalid_birthdate' => 'Oplys din rigtige f&oslash;dselsdato',
        'register.enter_birthday' => 'Oplys din rigtige f&oslash;dselsdato',
        'register.month' => 'M&aring;ned',
        'register.day' => 'Dag',
        'register.year' => '&aring;r',
        'register.month_jan' => 'Januar',
        'register.month_feb' => 'Februar',
        'register.month_mar' => 'Marts',
        'register.month_apr' => 'April',
        'register.month_may' => 'Maj',
        'register.month_jun' => 'Juni',
        'register.month_jul' => 'Juli',
        'register.month_aug' => 'August',
        'register.month_sep' => 'September',
        'register.month_oct' => 'Oktober',
        'register.month_nov' => 'November',
        'register.month_dec' => 'December',
        'register.goback' => 'Tilbage',
        'register.nextstep' => 'N&aelig;ste',
    );
            
    $registerstep2 = array(
        'register.birthdate' => 'F&oslash;dselsdag',
        'register.accountdetails' => 'Konto detaljer',
        'register.security_check' => 'Sikkerheds Check',
        'register.error_missing_avatar' => 'Skriv venligst et brugernavn',
        'register.error_avatar_wronglength' => 'Dit brugernavn skal v&aelig;re 3-20 tegn langt.',
        'register.error_avatar_invalid' => 'Brugernavne m&aring; kun indeholde bogstaver og !?@.',
        'register.error_avatar_illegal' => 'Dit valgte brugernavn er ugyldigt.',
        'register.error_avatar_allreadytaken' => 'Sorry, det brugernavn er allerede optaget.',
        'register.error_missing_email' => 'Oplys venligst en gyldig email.',
        'register.error_email_invalid' => 'Oplys venligst en gyldig email',
        'register.error_missing_retypedEmail' => 'Gentag venligst din email adresse.',
        'register.error_email_notmatching' => 'Emails matcher ikke',
        'register.error_missing_password' => 'V&aelig;lg et godt adgangskode',
        'register.error_password_wronglength' => 'Dit adgangskode skal v&aelig;re 6-20 tegn langt.',
        'register.error_tos' => 'Acceter vores betingelser og regler',
        'register.avatarname' => 'Brugernavn',
        'register.avatarname_desc' => 'Hvad brugernavn &oslash;nsker du? Det m&aring; IKKE indholde <b>MOD-</b>, <b>ADM-</b> eller <b>BOT-</b>',
        'register.email' => 'Email',
        'register.email_desc' => 'Du beh&oslash;ver denne <b>email addresse for at logge ind</b> p&aring; {sitename} i fremtiden. Derfor brug en gyldig.',
        'register.reemail' => 'Gentag Email',
        'register.reemail_desc' => '...bare for at v&aelig;re sikker.',
        'register.password' => 'Adgangskode',
        'register.password_desc' => 'Adgangskode skal v&aelig;re minimum <b>6 tegn </b>langt og indeholde <b>bogstaver og tal</b>',
        'register.tos1' => 'Jeg godkender',
        'register.tos2' => 'Hotellets regler',
        'register.newsletter' => 'Hold mig opdatere n&aring;r {sitename} foretager noget nyt og vigtigt',
        'register.cancel' => 'Annuller',
        'register.nextstep' => 'N&aelig;ste',
    );

    $registerstep3 = array(
    );
?>
