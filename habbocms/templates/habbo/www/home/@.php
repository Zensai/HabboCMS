<?php
	$core->requireLogin();
	$view = usernameFilter(explode('/', PAGE)[1]);
	define('PARENT', '1');
	define('CHILD', '7');	

	$lang->addTranslation('me');

	$html->setKey(array(
		'body_extra' => ' id="viewmode" class=" "',
		'extra' => '<style type="text/css">

    #playground, #playground-outer {
	    width: 752px;
	    height: 1360px;
    }

</style>',
	));

	$skin->install('{$lang->me.pagetitle}', 'homes', true);
?>

<div id="container">
	<div id="content" style="position: relative" class="clearfix">
    <div id="mypage-wrapper" class="cbb blue">
<div class="box-tabs-container box-tabs-left clearfix">
	<a href="/myhabbo/startSession/2004800" id="edit-button" class="new-button dark-button edit-icon" style="float:left"><b><span></span>Forandre</b><i></i></a>
	<div class="myhabbo-view-tools">
	</div>
    <h2 class="page-owner">Faire</h2>
    <ul class="box-tabs"></ul>
</div>
	<div id="mypage-content">
			<div id="mypage-bg" class="b_background_no_for_alle">
				<div id="playground">
    <div class="movable sticker s_roligans3" style="left: 550px; top: 25px; z-index: 22" id="sticker-3408324">
    </div>
    <div class="movable sticker s_sticker_arrow_down" style="left: 57px; top: 632px; z-index: 12" id="sticker-1962814">
    </div>
    <div class="movable sticker s_roligans4" style="left: 580px; top: 283px; z-index: 25" id="sticker-3408326">
    </div>
    <div class="movable sticker s_bling_i" style="left: 334px; top: 11px; z-index: 7" id="sticker-1962825">
    </div>
    <div class="movable sticker s_no_sticker_soler_shorts" style="left: 481px; top: 1279px; z-index: 36" id="sticker-3408385">
    </div>
    <div class="movable sticker s_no_sticker_babe" style="left: 295px; top: 601px; z-index: 38" id="sticker-3408387">
    </div>
    <div class="movable sticker s_hw_romeriksbunad" style="left: 20px; top: 30px; z-index: 17" id="sticker-3477100">
    </div>
    <div class="movable sticker s_watchingfootball" style="left: 578px; top: 161px; z-index: 23" id="sticker-3408329">
    </div>
    <div class="movable sticker s_hw_gauldal_bunad" style="left: 640px; top: 698px; z-index: 45" id="sticker-3477096">
    </div>
    <div class="movable sticker s_roligans5" style="left: 262px; top: 62px; z-index: 41" id="sticker-3408327">
    </div>
    <div class="movable sticker s_bunad_petterolson" style="left: 568px; top: 698px; z-index: 44" id="sticker-3477070">
    </div>
    <div class="movable sticker s_bling_f" style="left: 242px; top: 10px; z-index: 5" id="sticker-1962823">
    </div>
    <div class="movable sticker s_no_sticker_kjekkas" style="left: 231px; top: 123px; z-index: 42" id="sticker-3408344">
    </div>
    <div class="movable sticker s_fhilip" style="left: 468px; top: 906px; z-index: 37" id="sticker-3408336">
    </div>
    <div class="movable sticker s_bling_r" style="left: 365px; top: 12px; z-index: 8" id="sticker-1962826">
    </div>
    <div class="movable sticker s_fhilip2" style="left: 610px; top: 1220px; z-index: 33" id="sticker-3408337">
    </div>
    <div class="movable sticker s_habboneurostickerwm103rpnv1" style="left: 422px; top: 332px; z-index: 27" id="sticker-3408333">
    </div>
    <div class="movable sticker s_webman" style="left: 591px; top: 1056px; z-index: 40" id="sticker-3408340">
    </div>
    <div class="movable sticker s_no_sticker_varmluftsballong" style="left: 315px; top: 282px; z-index: 28" id="sticker-3408384">
    </div>
    <div class="movable sticker s_limo_doorpiece" style="left: 441px; top: 888px; z-index: 15" id="sticker-2145826">
    </div>
    <div class="movable sticker s_bling_e" style="left: 408px; top: 13px; z-index: 9" id="sticker-1962827">
    </div>
    <div class="movable sticker s_roligans6" style="left: 608px; top: 438px; z-index: 29" id="sticker-3408328">
    </div>
    <div class="movable sticker s_no_sticker_ls_missc" style="left: 162px; top: 289px; z-index: 24" id="sticker-3408345">
    </div>
    <div class="movable sticker s_no_sticker_chillegjengen" style="left: 18px; top: 960px; z-index: 32" id="sticker-3408386">
    </div>
    <div class="movable sticker s_cheerleaders" style="left: 570px; top: 569px; z-index: 31" id="sticker-3408331">
    </div>
    <div class="movable sticker s_limo_back" style="left: 491px; top: 872px; z-index: 16" id="sticker-2145825">
    </div>
    <div class="movable sticker s_hw_sticker_birthday1" style="left: 9px; top: 161px; z-index: 39" id="sticker-3477008">
    </div>
    <div class="movable sticker s_limo_windowpiece" style="left: 389px; top: 914px; z-index: 13" id="sticker-2145828">
    </div>
    <div class="movable sticker s_limo_front" style="left: 318px; top: 940px; z-index: 14" id="sticker-2145827">
    </div>
    <div class="movable sticker s_nail2" style="left: 98px; top: 19px; z-index: 11" id="sticker-1962816">
    </div>
    <div class="movable sticker s_bling_a" style="left: 285px; top: 11px; z-index: 6" id="sticker-1962824">
    </div>
    <div class="movable sticker s_no_sticker_solbrent" style="left: 74px; top: 284px; z-index: 35" id="sticker-3408382">
    </div>
    <div class="movable sticker s_roligans8" style="left: 663px; top: 270px; z-index: 26" id="sticker-3408325">
    </div>
    <div class="movable sticker s_chossy" style="left: 631px; top: 353px; z-index: 30" id="sticker-3408334">
    </div>
    <div class="movable sticker s_no_sticker_dame" style="left: 16px; top: 282px; z-index: 34" id="sticker-3408341">
    </div>
    <div class="movable sticker s_hw_sticker_birthday" style="left: 61px; top: 195px; z-index: 43" id="sticker-3477015">
    </div>



<div class="movable widget RoomsWidget" id="widget-1672434" style=" left: 324px; top: 545px; z-index: 3;">
<div class="w_skin_speechbubbleskin">
	<div class="widget-corner" id="widget-1672434-handle">
		<div class="widget-headline"><h3><span class="header-left">&nbsp;</span><span class="header-middle">MINE ROM</span><span class="header-right">&nbsp;</span></h3>
		</div>	
	</div>
	<div class="widget-body">
		<div class="widget-content">

<div id="room_wrapper">
<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td valign="top" class="dotted-line">
		<div class="room_image">
				<img src="http://images-eu.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1831/web-gallery/images/myhabbo/rooms/room_icon_open.gif" alt="" align="middle"/>
		</div>
</td>
<td class="dotted-line">
        	<div class="room_info">
        		<div class="room_name">
        			<img src="http://images-eu.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1831/web-gallery/images/fonts/volter/165.gif" class="vchar" /> Andre Etasje <img src="http://images-eu.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1831/web-gallery/images/fonts/volter/165.gif" class="vchar" />
        		</div>
					<img id="room-4295600-report" class="report-button report-r"
						alt="report"
						src="http://images-eu.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1831/web-gallery/images/myhabbo/buttons/report_button.gif"
						style="display: none;" />
				<div class="clear"></div>
        		<div>
        		</div>
					<a href="http://www.habbo.no/client?forwardId=2&amp;roomId=4295600"
					   target="9be647d18d414b7f6884fc74b36e9f598b819e90"
					   id="room-navigation-link_4295600"
					   onclick="HabboClient.roomForward(this, '4295600', 'private', true); return false;">
					 Ta heis
					 </a>
        	</div>
		<br class="clear" />

</td>
</tr>
<tr>
<td valign="top" class="dotted-line">
		<div class="room_image">
				<img src="http://images-eu.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1831/web-gallery/images/myhabbo/rooms/room_icon_open.gif" alt="" align="middle"/>
		</div>
</td>
<td class="dotted-line">
        	<div class="room_info">
        		<div class="room_name">
        			Faire er tilbake! Gir ut møbler GRATIS
        		</div>
					<img id="room-4545875-report" class="report-button report-r"
						alt="report"
						src="http://images-eu.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1831/web-gallery/images/myhabbo/buttons/report_button.gif"
						style="display: none;" />
				<div class="clear"></div>
        		<div>Faire's nye bytterom!                                Husk og trykk på • Eller <img src="http://images-eu.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1831/web-gallery/images/fonts/volter/247.gif" class="vchar" />                                  Og Trykk På ƒ                                             Tusen takk :-)
        		</div>
					<a href="http://www.habbo.no/client?forwardId=2&amp;roomId=4545875"
					   target="9be647d18d414b7f6884fc74b36e9f598b819e90"
					   id="room-navigation-link_4545875"
					   onclick="HabboClient.roomForward(this, '4545875', 'private', true); return false;">
					 Ta heis
					 </a>
        	</div>
		<br class="clear" />

</td>
</tr>
<tr>
<td valign="top" class="dotted-line">
		<div class="room_image">
				<img src="http://images-eu.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1831/web-gallery/images/myhabbo/rooms/room_icon_locked.gif" alt="" align="middle"/>
		</div>
</td>
<td class="dotted-line">
        	<div class="room_info">
        		<div class="room_name">
        			<img src="http://images-eu.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1831/web-gallery/images/fonts/volter/165.gif" class="vchar" /> Bygger VIP Entrence <img src="http://images-eu.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1831/web-gallery/images/fonts/volter/165.gif" class="vchar" />
        		</div>
					<img id="room-4919696-report" class="report-button report-r"
						alt="report"
						src="http://images-eu.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1831/web-gallery/images/myhabbo/buttons/report_button.gif"
						style="display: none;" />
				<div class="clear"></div>
        		<div>
        		</div>
        			Låst
        	</div>
		<br class="clear" />

</td>
</tr>
<tr>
<td valign="top" class="dotted-line">
		<div class="room_image">
				<img src="http://images-eu.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1831/web-gallery/images/myhabbo/rooms/room_icon_locked.gif" alt="" align="middle"/>
		</div>
</td>
<td class="dotted-line">
        	<div class="room_info">
        		<div class="room_name">
        			<img src="http://images-eu.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1831/web-gallery/images/fonts/volter/247.gif" class="vchar" /> Rødtrom [Tomt]
        		</div>
					<img id="room-6928024-report" class="report-button report-r"
						alt="report"
						src="http://images-eu.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1831/web-gallery/images/myhabbo/buttons/report_button.gif"
						style="display: none;" />
				<div class="clear"></div>
        		<div>:(
        		</div>
        			Låst
        	</div>
		<br class="clear" />

</td>
</tr>
<tr>
<td valign="top" class="dotted-line">
		<div class="room_image">
				<img src="http://images-eu.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1831/web-gallery/images/myhabbo/rooms/room_icon_open.gif" alt="" align="middle"/>
		</div>
</td>
<td class="dotted-line">
        	<div class="room_info">
        		<div class="room_name">
        			<img src="http://images-eu.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1831/web-gallery/images/fonts/volter/165.gif" class="vchar" /> Dumpe Ball <img src="http://images-eu.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1831/web-gallery/images/fonts/volter/165.gif" class="vchar" /> [BB]
        		</div>
					<img id="room-6994634-report" class="report-button report-r"
						alt="report"
						src="http://images-eu.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1831/web-gallery/images/myhabbo/buttons/report_button.gif"
						style="display: none;" />
				<div class="clear"></div>
        		<div>Kom Og bobba Super Bytteopplevelse
        		</div>
					<a href="http://www.habbo.no/client?forwardId=2&amp;roomId=6994634"
					   target="9be647d18d414b7f6884fc74b36e9f598b819e90"
					   id="room-navigation-link_6994634"
					   onclick="HabboClient.roomForward(this, '6994634', 'private', true); return false;">
					 Ta heis
					 </a>
        	</div>
		<br class="clear" />

</td>
</tr>
<tr>
<td valign="top" class="dotted-line">
		<div class="room_image">
				<img src="http://images-eu.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1831/web-gallery/images/myhabbo/rooms/room_icon_open.gif" alt="" align="middle"/>
		</div>
</td>
<td class="dotted-line">
        	<div class="room_info">
        		<div class="room_name">
        			Pell deg bobba!
        		</div>
					<img id="room-7001417-report" class="report-button report-r"
						alt="report"
						src="http://images-eu.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1831/web-gallery/images/myhabbo/buttons/report_button.gif"
						style="display: none;" />
				<div class="clear"></div>
        		<div>Vinn bobba og få høyere status! vinn og spill og få møbler og andre premier
        		</div>
					<a href="http://www.habbo.no/client?forwardId=2&amp;roomId=7001417"
					   target="9be647d18d414b7f6884fc74b36e9f598b819e90"
					   id="room-navigation-link_7001417"
					   onclick="HabboClient.roomForward(this, '7001417', 'private', true); return false;">
					 Ta heis
					 </a>
        	</div>
		<br class="clear" />

</td>
</tr>
<tr>
<td valign="top" >
		<div class="room_image">
				<img src="http://images-eu.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1831/web-gallery/images/myhabbo/rooms/room_icon_open.gif" alt="" align="middle"/>
		</div>
</td>
<td >
        	<div class="room_info">
        		<div class="room_name">
        			1mynt pr møbel [les nede]
        		</div>
					<img id="room-8030280-report" class="report-button report-r"
						alt="report"
						src="http://images-eu.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1831/web-gallery/images/myhabbo/buttons/report_button.gif"
						style="display: none;" />
				<div class="clear"></div>
        		<div>1 - 0.5 mynt pr møbel eller 3 møbler for en annen. vent på tur
        		</div>
					<a href="http://www.habbo.no/client?forwardId=2&amp;roomId=8030280"
					   target="9be647d18d414b7f6884fc74b36e9f598b819e90"
					   id="room-navigation-link_8030280"
					   onclick="HabboClient.roomForward(this, '8030280', 'private', true); return false;">
					 Ta heis
					 </a>
        	</div>
		<br class="clear" />

</td>
</tr>
</table>
</div>
		<div class="clear"></div>
		</div>
	</div>
</div>
</div>


<div class="movable widget FriendsWidget" id="widget-1672432" style=" left: 16px; top: 670px; z-index: 4;">
<div class="w_skin_speechbubbleskin">
	<div class="widget-corner" id="widget-1672432-handle">
		<div class="widget-headline"><h3><span class="header-left">&nbsp;</span><span class="header-middle">Mine Venner (<span id="avatar-list-size">0</span>)</span><span class="header-right">&nbsp;</span></h3>
		</div>	
	</div>
	<div class="widget-body">
		<div class="widget-content">

<div id="avatar-list-search">
<input type="text" style="float:left;" id="avatarlist-search-string"/>
<a class="new-button" style="float:left;" id="avatarlist-search-button"><b>Søk</b><i></i></a>
</div>
<br clear="all"/>

<div id="avatarlist-content">

<div class="avatar-widget-list-container">
Du har ingen venner :(

<div id="avatar-list-info" class="avatar-list-info">
<div class="avatar-list-info-close-container"><a href="#" class="avatar-list-info-close"></a></div>
<div class="avatar-list-info-container"></div>
</div>

</div>

<div id="avatar-list-paging">
    0 - 0
<input type="hidden" id="pageNumber" value="0"/>
<input type="hidden" id="totalPages" value="0"/>
</div>

<script type="text/javascript">
document.observe("dom:loaded", function() {
	window.widget1672432 = new FriendsWidget('2004800', '1672432');
});
</script>

</div>
		<div class="clear"></div>
		</div>
	</div>
</div>
</div>


<div class="movable widget RatingWidget" id="widget-1070903" style=" left: 324px; top: 780px; z-index: 21;">
<div class="w_skin_speechbubbleskin">
	<div class="widget-corner" id="widget-1070903-handle">
		<div class="widget-headline"><h3><span class="header-left">&nbsp;</span><span class="header-middle">RatingWidget</span><span class="header-right">&nbsp;</span></h3>
		</div>	
	</div>
	<div class="widget-body">
		<div class="widget-content">
	<div id="rating-main">
<script type="text/javascript">	
	var ratingWidget;
	document.observe("dom:loaded", function() { 
		ratingWidget = new RatingWidget('1070903', '2004800', 22368);
	}); 
</script><div class="rating-average">
		<b>Score: 4</b><br/>
	<div id="rating-stars" class="rating-stars" >
				<ul id="rating-unit_ul1" class="rating-unit-rating">
				<li class="rating-current-rating" style="width:120px;" />
	
			</ul>	
	</div>
	44 stemmer totalt
	
	<br/>
	(33 Habboer stemte 4 eller bedre)
</div>

	</div>
		<div class="clear"></div>
		</div>
	</div>
</div>
</div>



<div class="movable widget ProfileWidget" id="widget-1054330" style=" left: 88px; top: 72px; z-index: 1;">
<div class="w_skin_speechbubbleskin">
	<div class="widget-corner" id="widget-1054330-handle">
		<div class="widget-headline"><h3><span class="header-left">&nbsp;</span><span class="header-middle">MIN PROFIL</span><span class="header-right">&nbsp;</span></h3>
		</div>	
	</div>
	<div class="widget-body">
		<div class="widget-content">
	<div class="profile-info">
		<div class="name" style="float: left">
		<span class="name-text">Faire</span>
			<img id="name-2004800-report" class="report-button report-n"
				alt="report"
				src="http://images-eu.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1831/web-gallery/images/myhabbo/buttons/report_button.gif"
				style="display: none;" />
		</div>

		<br class="clear" />

			<img alt="online" src="http://images-eu.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1831/web-gallery/images/myhabbo/profile/habbo_online_anim.gif" />
		<div class="birthday text">
			Habboen ble laget:
		</div>
		<div class="birthday date">
			12.nov.2008
		</div>
		<div>
        	<a href="/groups/Scam" title="Kill Scammers"><img src="http://www.habbo.no/habbo-imaging/badge/s06124615c94e2ae0ba2b964d6f8e3f60a99d3.gif" /></a>
            <img src="//habboo-a.akamaihd.net/c_images/album1584/ACH_RegistrationDuration19.gif" />
        </div>
	</div>
	<div class="profile-figure">
			<img alt="Faire" src="http://www.habbo.no/habbo-imaging/avatar/hr-125-47.hd-180-8.ch-215-1315.lg-3116-70-62,s-0.g-0.d-4.h-4.a-0,ce94e1f8d2a648376e0b8ac96064d476.gif" />
	</div>
	<div class="profile-motto">
		lol
			<img id="motto-2004800-report" class="report-button report-m"
				alt="report"
				src="http://images-eu.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1831/web-gallery/images/myhabbo/buttons/report_button.gif"
				style="display: none;" />
		<div class="clear"></div>
	</div>
    <script type="text/javascript">
		document.observe("dom:loaded", function() {
			new ProfileWidget('2004800', '2004800', {
				headerText: "Er du sikker?",
				messageText: "Er du sikker på at du vil spørre om <strong\>Faire</strong\> vil være vennen din? Tenk deg om før du klikker OK!",
				loginText: "Du må logge inn for å sende venneinvitasjoner.",
				buttonText: "OK",
				cancelButtonText: "Avbryt"
			});
		});
	</script>
		<div class="clear"></div>
		</div>
	</div>
</div>
</div>


<div class="movable widget GroupsWidget" id="widget-1672433" style=" left: 324px; top: 71px; z-index: 2;">
<div class="w_skin_speechbubbleskin">
	<div class="widget-corner" id="widget-1672433-handle">
		<div class="widget-headline"><h3><span class="header-left">&nbsp;</span><span class="header-middle">Mine grupper (<span id="groups-list-size">10</span>)</span><span class="header-right">&nbsp;</span></h3>
		</div>	
	</div>
	<div class="widget-body">
		<div class="widget-content">

<div class="groups-list-container">
<ul class="groups-list">
	<li title="Facebook fans" id="groups-list-1672433-30170">
		<div class="groups-list-icon"><a href="/groups/30170/id"><img src="http://www.habbo.no/habbo-imaging/badge/b0511Xs6006424a3851b3d3fe73062808386d668a6af.gif"/></a></div>
		<div class="groups-list-open"></div>
		<h4>
		<a href="/groups/30170/id">Facebook fans</a>
		</h4>
		<p>
		Gruppen ble opprettet:<br /> 
		<b>29.sep.2010</b>
		</p>
		<div class="clear"></div>
	</li>
	<li title="Habbo Bursdag" id="groups-list-1672433-29553">
		<div class="groups-list-icon"><a href="/groups/29553/id"><img src="http://www.habbo.no/habbo-imaging/badge/s09047s081042245da9818580434acfc792e814c07e8.gif"/></a></div>
		<div class="groups-list-open"></div>
		<h4>
		<a href="/groups/29553/id">Habbo Bursdag</a>
		</h4>
		<p>
		Gruppen ble opprettet:<br /> 
		<b>29.jun.2010</b>
		</p>
		<div class="clear"></div>
	</li>
	<li title="Habbo Nytt" id="groups-list-1672433-20788">
		<div class="groups-list-icon"><a href="/groups/habbonytt"><img src="http://www.habbo.no/habbo-imaging/badge/s01012s19144s031405e2f71c54b359ba003ceb2688889f238.gif"/></a></div>
		<div class="groups-list-open"></div>
		<h4>
		<a href="/groups/habbonytt">Habbo Nytt</a>
		</h4>
		<p>
		Gruppen ble opprettet:<br /> 
		<b>04.jul.2008</b>
		</p>
		<div class="clear"></div>
	</li>
	<li title="Habbovandrer" id="groups-list-1672433-29695">
		<div class="groups-list-icon"><a href="/groups/29695/id"><img src="http://www.habbo.no/habbo-imaging/badge/s64138s64106s64130s6410228b277c01724a9b30d4be41ab54168b1.gif"/></a></div>
		<div class="groups-list-open"></div>
		<h4>
		<a href="/groups/29695/id">Habbovandrer</a>
		</h4>
		<p>
		Gruppen ble opprettet:<br /> 
		<b>18.jul.2010</b>
		</p>
		<div class="clear"></div>
	</li>
	<li title="Kill Scammers" id="groups-list-1672433-23447">
		<div class="groups-list-icon"><a href="/groups/Scam"><img src="http://www.habbo.no/habbo-imaging/badge/s06124615c94e2ae0ba2b964d6f8e3f60a99d3.gif"/></a></div>
		<div class="groups-list-open"></div>
		<h4>
		<a href="/groups/Scam">Kill Scammers</a>
		</h4>
		<p>
		Gruppen ble opprettet:<br /> 
		<img src="http://images-eu.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1831/web-gallery/images/groups/owner_icon.gif" width="15" height="15" class="groups-list-icon" alt="Eier" title="Eier" />
		<b>13.jan.2009</b>
		</p>
		<div class="clear"></div>
	</li>
	<li title="Konkurranser" id="groups-list-1672433-30151">
		<div class="groups-list-icon"><a href="/groups/Nidelva"><img src="http://www.habbo.no/habbo-imaging/badge/b2212Xs23134s09127s08104964247b0ad1374f437cf60ed6ada4f14.gif"/></a></div>
		<div class="groups-list-open"></div>
		<h4>
		<a href="/groups/Nidelva">Konkurranser</a>
		</h4>
		<p>
		Gruppen ble opprettet:<br /> 
		<b>24.sep.2010</b>
		</p>
		<div class="clear"></div>
	</li>
	<li title="MTV EMA 2010" id="groups-list-1672433-30152">
		<div class="groups-list-icon"><a href="/groups/mtvema2010"><img src="http://www.habbo.no/habbo-imaging/badge/b0512Xs321347329c33edc96088ed4f45867c899755d.gif"/></a></div>
		<div class="groups-list-open"></div>
		<h4>
		<a href="/groups/mtvema2010">MTV EMA 2010</a>
		</h4>
		<p>
		Gruppen ble opprettet:<br /> 
		<b>24.sep.2010</b>
		</p>
		<div class="clear"></div>
	</li>
	<li title="No Bobba" id="groups-list-1672433-23389">
		<div class="groups-list-icon"><a href="/groups/23389/id"><img src="http://www.habbo.no/habbo-imaging/badge/b2311Xs43034s19014f5da82f616a27a0b71d6b673d65f7802.gif"/></a></div>
		<div class="groups-list-open"></div>
		<h4>
		<a href="/groups/23389/id">No Bobba</a>
		</h4>
		<p>
		Gruppen ble opprettet:<br /> 
		<b>09.jan.2009</b>
		</p>
		<div class="clear"></div>
	</li>
	<li title="Sommer i Norge" id="groups-list-1672433-29623">
		<div class="groups-list-icon"><a href="/groups/29623/id"><img src="http://www.habbo.no/habbo-imaging/badge/s01014s04014s54118efa91c7f5f0ec5ddee311266dd6c3a5b.gif"/></a></div>
		<div class="groups-list-open"></div>
		<h4>
		<a href="/groups/29623/id">Sommer i Norge</a>
		</h4>
		<p>
		Gruppen ble opprettet:<br /> 
		<b>07.jul.2010</b>
		</p>
		<div class="clear"></div>
	</li>
	<li title="Vinterland 08" id="groups-list-1672433-22800">
		<div class="groups-list-icon"><a href="/groups/julen08"><img src="http://www.habbo.no/habbo-imaging/badge/b2305Xs02055s01114050e0639f632123f50d39750e7fa0b45.gif"/></a></div>
		<div class="groups-list-open"></div>
		<h4>
		<a href="/groups/julen08">Vinterland 08</a>
		</h4>
		<p>
		Gruppen ble opprettet:<br /> 
		<b>01.des.2008</b>
		</p>
		<div class="clear"></div>
	</li>
</ul></div>

<div class="groups-list-loading"><div><a href="#" class="groups-loading-close"></a></div><div class="clear"></div><p style="text-align:center"><img src="http://images-eu.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1831/web-gallery/images/progress_bubbles.gif" alt="" width="29" height="6" /></p></div>
<div class="groups-list-info"></div>

		<div class="clear"></div>
		</div>
	</div>
</div>
</div>

<script type="text/javascript">	
document.observe("dom:loaded", function() {
	new GroupsWidget('2004800', '1672433');
});
</script>					
				</div>
				<div id="mypage-ad">
    <div class="habblet ">
<div class="ad-container">
<!--JavaScript Tag // Tag for network 957: Sulake // Website: HabboHotel_NO // Page: MyPage // Placement: MyPage_Skyscraper (2196401) // created at: Nov 4, 2009 6:21:57 PM-->
<script language="javascript">
<!--
if (window.adgroupid == undefined) {
    window.adgroupid = Math.round(Math.random() * 1000);
}
if (window.adkeywords == undefined) {
    if (typeof(ad_keywords) == 'undefined') {
        window.adkeywords = '';
    } else {
        window.adkeywords = ad_keywords.split(',').join('+');
    }
}
document.write('<scr'+'ipt language="javascript1.1" src="http://adtech.habbo.com/addyn|3.0|957.1|2196401|0|154|ADTECH;cookie=info;alias=;loc=100;target=_blank;key='+window.adkeywords+';grp='+window.adgroupid+';misc='+new Date().getTime()+'"></scri'+'pt>');
//-->
</script><noscript><a href="http://adtech.habbo.com/adlink|3.0|957.1|12196401|0|154|ADTECH;loc=300;alias=;cookie=info;" target="_blank" target="_blank"><img src="http://adtech.habbo.com/adserv|3.0|957.1|2196401|0|154|ADTECH;loc=300;alias=##alias##;cookie=info;" border="0"></a></noscript>
<!-- End of JavaScript Tag -->

</div>
    
    </div>
				</div>
			</div>
	</div>
</div>

<script type="text/javascript">
	Event.observe(window, "load", observeAnim);
	document.observe("dom:loaded", function() {
		initDraggableDialogs();
        repositionInvalidItems();
	});
</script>
    </div>
<div id="footer">
	<p class="footer-links"><a href="https://help.habbo.no" target="_new">Kontakt oss</a> | <a href="https://help.habbo.no/forums/226964-foreldre-informasjon" target="_new">Foreldreguiden</a> | <a href="http://www.sulake.com" target="_new">Sulake</a> | <a href="https://help.habbo.no/entries/21736498-brukervilkar" target="_new">Brukervilkår</a> | <a href="https://help.habbo.no/entries/20782791-retningslinjer-for-personvern" target="_new">Fortrolighetspolitikk</a> | <a href="http://www.habbo.no/groups/adsales">Annonsering</a> | <a href="http://www.habbo.no/safety/safety_tips">Sikkerhet</a></p>
	<p class="copyright">© 2008 - 2013 Sulake Norge AS. HABBO er et registrert varemerke til Sulake Norge AS i den Europeiske Union, USA, Japan, Kina og i diverse andre jurisdiksjoner. Alle rettigheter er forbeholdt.</p>
</div></div>

</div>

	 
<div class="cbb topdialog" id="guestbook-form-dialog">
	<h2 class="title dialog-handle">Endre</h2>
	
	<a class="topdialog-exit" href="#" id="guestbook-form-dialog-exit">X</a>
	<div class="topdialog-body" id="guestbook-form-dialog-body">
<div id="guestbook-form-tab">
<form method="post" id="guestbook-form">
    <p>
        Merk: meldinger kan ikke inneholde mer enn 200 tegn
        <input type="hidden" name="ownerId" value="197079" />
	</p>
	<div>
	    <textarea cols="15" rows="5" name="message" id="guestbook-message"></textarea>
    <script type="text/javascript">
        bbcodeToolbar = new Control.TextArea.ToolBar.BBCode("guestbook-message");
        bbcodeToolbar.toolbar.toolbar.id = "bbcode_toolbar";
        var colors = { "red" : ["#d80000", "Rød"],
            "orange" : ["#fe6301", "Orange"],
            "yellow" : ["#ffce00", "Gul"],
            "green" : ["#6cc800", "Grønn"],
            "cyan" : ["#00c6c4", "Turkis"],
            "blue" : ["#0070d7", "Blå"],
            "gray" : ["#828282", "Grå"],
            "black" : ["#000000", "Svart"]
        };
        bbcodeToolbar.addColorSelect("Farge", colors, true);
    </script>
<div id="linktool">
    <div id="linktool-scope">
        <label for="linktool-query-input">Lag link:</label>
        <input type="radio" name="scope" class="linktool-scope" value="1" checked="checked"/>Habboer
        <input type="radio" name="scope" class="linktool-scope" value="2"/>Rom
        <input type="radio" name="scope" class="linktool-scope" value="3"/>Grupper
    </div>
    <input id="linktool-query" type="text" name="query" value=""/>
    <a href="#" class="new-button" id="linktool-find"><b>Finn</b><i></i></a>
    <div class="clear" style="height: 0;"><!-- --></div>
    <div id="linktool-results" style="display: none">
    </div>
    <script type="text/javascript">
        linkTool = new LinkTool(bbcodeToolbar.textarea);
    </script>
</div>
    </div>

	<div class="guestbook-toolbar clearfix">
		<a href="#" class="new-button" id="guestbook-form-cancel"><b>Avbryt</b><i></i></a>
		<a href="#" class="new-button" id="guestbook-form-preview"><b>Forhåndsvis</b><i></i></a>	
	</div>
</form>
</div>
<div id="guestbook-preview-tab">&nbsp;</div>
	</div>
</div>	
<div class="cbb topdialog" id="guestbook-delete-dialog">
	<h2 class="title dialog-handle">Slett hilsen</h2>
	
	<a class="topdialog-exit" href="#" id="guestbook-delete-dialog-exit">X</a>
	<div class="topdialog-body" id="guestbook-delete-dialog-body">
<form method="post" id="guestbook-delete-form">
	<input type="hidden" name="entryId" id="guestbook-delete-id" value="" />
	<p>Er du sikker på at du vil slette denne hilsen?</p>
	<p>
		<a href="#" id="guestbook-delete-cancel" class="new-button"><b>Avbryt</b><i></i></a>
		<a href="#" id="guestbook-delete" class="new-button"><b>Fjern</b><i></i></a>
	</p>
</form>
	</div>
</div>	
					
<script type="text/javascript">
if (typeof HabboView != "undefined") {
	HabboView.run();
}
</script>


<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-448325-14']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>    
    <!-- Start Quantcast tag -->
<script type="text/javascript">
_qoptions={
qacct:"p-b5UDx6EsiRfMI"
};
</script>
<script type="text/javascript" src="http://edge.quantserve.com/quant.js"></script>
<noscript>
<img src="http://pixel.quantserve.com/pixel/p-b5UDx6EsiRfMI.gif" style="display: none;" border="0" height="1" width="1" alt="Quantcast"/>
</noscript>
<!-- End Quantcast tag -->

<!-- HL-30554 -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1044053460;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "nmR6CJii1QIQ1Pvr8QM";
var google_conversion_value = 0;
/* ]]> */
</script>
<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/1044053460/?label=nmR6CJii1QIQ1Pvr8QM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
    
    
        


</body>
</html>