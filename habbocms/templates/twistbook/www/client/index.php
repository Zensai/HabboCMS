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

define('USER', TRUE); 
define('ACCOUNT', TRUE);
define('MAINTENANCE', TRUE);
include("../includes/inc.global.php");
/*if(isset($_SESSION['client_vote']) && $core->ExploitRetainer($_SESSION['client_vote']) == '1'){
	$_SESSION['client_vote'] = 0;
}else{
	header("Location: ".HOST."/vote/client");
	$_SESSION['client_vote'] = 1;
}

include("../includes/inc.encoder.php");*/

if(!isset($_SESSION['js']) || $_SESSION['js'] == ""){
	echo "<noscript><meta http-equiv='refresh' content='0;url=".HOST."/client'></noscript>";
	$js = true;
}elseif(isset($_SESSION['js']) && $_SESSION['js'] == "0"){
	$js = false;
	$_SESSION['js'] = "";
}elseif(isset($_SESSION['js']) && $_SESSION['js'] == "1"){
	$js = true;
	$_SESSION['js'] = "";
}

if ($js) {

	$dbquery = mysql_query("UPDATE users SET ip_last = '".$users->getIp()."' WHERE id = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."'"); 

	$rand1 = rand(100000, 999999);
	$rand2 = rand(10000, 99999);
	$rand3 = rand(10000, 99999);
	$rand4 = rand(10000, 99999);
	$rand5 = rand(10000, 99999);
	$rand6 = rand(1, 9);
	$ticket = "ST-".$rand1."-".$rand2.$rand3."-".$rand4.$rand5."-otaku-".$rand6;
	$username = $core->ExploitRetainer($users->UserInfo($username, 'username'));
	if(isset($_GET['ticket']) && $core->ExploitRetainer($_GET['ticket'])){
		$ticket = $core->ExploitRetainer($_GET['ticket']);
	}

	if(isset($_GET['username']) && $core->ExploitRetainer($_GET['username'])){
		$username = $core->ExploitRetainer($_GET['username']);
	}

	$query = mysql_query("UPDATE users SET auth_ticket = '".$ticket."' WHERE id = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."'");


	if($core->ExploitRetainer($users->UserPermission('client_closed_login', $username))){ }else{
		
		if($core->CmsSetting('client_status') == 'closed'){ header("Location: ".HOST."/client/disconnected/closed"); }
		
	}

	$users->checkPayments($core->ExploitRetainer($users->UserInfo($username, 'id')));
?>

	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" style="padding: 0; margin: 0;">
		<head>
		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
		<title><?php echo $hotelname; ?> - Client</title>

		<script type="text/javascript" src="<?php echo HOST; ?>/web-gallery/styles/js/js.php?type=general"></script>

		<script>
		$(document).ready(function(){
		
			window.onbeforeunload = function(e) {
    return 'Dialog text here.';
};
		
			<?php $queryAutoCompleteUserSearch = mysql_query("SELECT * FROM users ORDER BY username DESC"); ?>
			$("input.searchUser").autocomplete({
				source: [<?php while($autoCompleteUserSearch = mysql_fetch_array($queryAutoCompleteUserSearch)){ ?> "<?php echo $autoCompleteUserSearch['username']; ?>",<?php } ?>]
			});
			
			$(".searchUser").keypress(function(e) {
				if(e.which == 13) {
					$("#overlowQuickProfile").fadeIn("slow", function(){
						loadQuickProfile($('.searchUser').val());
					});
				};
			});
		
			resizeWindow();
			
			$(window).resize(function(){
				resizeWindow();
			});
			
			//$('.flashvars').val('');
			
			openHeaderMenu();
			
		});
		
		function resizeWindow(){
			var container_width = $(window).width();
			var container_height = $(window).height() - 44;
			$('#flash-container').css("width", container_width + "px");
			$('#flash-container').css("height", container_height + "px");
		}
		
		function openHeaderMenu(){
		
			$('.headerMenuRight').click(function(){
				$(this).toggleClass('selected');
				if($('.menuHeader').is(":hidden")){
					$('.menuHeader').slideDown();
				}else{
					$('.menuHeader').slideUp();
				}
			});
			
		}
		
		function loadQuickProfile(id){
									
			$('.loadUserDataToQuickProfile').html('<center class="loaderFromTheQuickProfile"><img style="margin-top: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_habbos.gif"></center>');

		    $.post("<?php echo HOST; ?>/quickprofile/second/" + id, { id: id }, function(result){ 
				$('.loaderFromTheQuickProfile').fadeOut();
				$('.loadUserDataToQuickProfile').html(result);
				$('.searchUser').val('');
			});

	    }
		</script>

		<!--[if IE 8]>
		<link rel="stylesheet" href="http://images.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1562/web-gallery/static/styles/ie8.css" type="text/css" />
		<![endif]--> 
		<!--[if lt IE 8]>
		<link rel="stylesheet" href="http://images.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1562/web-gallery/static/styles/ie.css" type="text/css" />
		<![endif]--> 
		<!--[if lt IE 7]>
		<link rel="stylesheet" href="http://images.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1562/web-gallery/static/styles/ie6.css" type="text/css" />
		<script src="http://images.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1562/web-gallery/static/js/pngfix.js" type="text/javascript"></script>
		<script type="text/javascript">
		try { document.execCommand('BackgroundImageCache', false, true); } catch(e) {}
		</script>
		 
		<![endif]-->

		<?php echo $Style->General(); ?>

	</head>

	<?php include('../apps/float/float_profile.php'); ?>
	<?php include('../apps/float/float_quick_profile.php'); ?>

	<style type="text/css">
	@font-face{
	  font-family:'Ubuntu';
	  font-style: bold;
	  font-weight: bold;
	  src: url('<?php echo HOST; ?>/web-gallery/general/fonts/Ubuntu-R.ttf');
	}

	#client .headerMenu {
		width: 100%;
		height: 44px;
		position: fixed;
		background: url(<?php echo HOST; ?>/web-gallery/general/headertop/header_top.png) repeat-x;
	}

	#client .headerMenuRight {
		float: right;
		width: 97px;
		padding-top: 16px;
		cursor: pointer;
	}

	#client .headerMenuRight .avatar {
		height: 40px;
		width: 65px;
		background-position: -10px -20px;
		margin-top: -16px;
		float: left;
		margin-right: -15px;
	}

	#client .headerMenuRight .textl {
		float: left;
		padding: 0;
		font-family: Ubuntu;
		color: #FFFFFF;
		font-size: 11px;
		font-weight: bold;
		text-shadow:0px -1px #000000;
	}

	#client .headerMenuRight .arrow {
		background-image: url(<?php echo HOST; ?>/web-gallery/general/client/arrow.gif);
		width: 9px;
		height: 6px;
		float: left;
		margin-left: 7px;
		margin-top: 2px;
	}
	
	#client .inputHeaderBG {
		width: 267px;
		height: 30px;
		background-image: url(<?php echo HOST; ?>/web-gallery/general/client/input_bg.gif);
		float: right;
		margin: 6px 30px 0 0;
		background-color: none;
		border: 0;
		color: #ABABAB;
		font-family: Ubuntu;
		font-size: 10px;
	}
	
	#client .inputHeaderBG:focus {
		box-shadow: none;
	}

	#client .textl {
		float: left;
		padding-top: 16px;
		font-family: Ubuntu;
		color: #FFFFFF;
		font-size: 11px;
		font-weight: bold;
		text-shadow:0px -1px #000000;
		padding-left: 10px;
		paddin-right: 10px;
	}

	#client .spacel {
		border-left: 1px solid #030000;
		border-right: 1px solid #3C3835;
		height: 30px;
		margin-top: 7px;
	}

	#client .iconLogo {
		background-image: url(<?php echo HOST; ?>/web-gallery/general/client/logo.gif);
		width: 27px;
		height: 33px;
		margin-top: 5px;
		margin-left: 10px;
		margin-right: 10px;
		float: left;
	}

	#client .iconShop {
		background-image: url(<?php echo HOST; ?>/web-gallery/general/headertop/shop_icon.png);
		width: 33px;
		height: 35px;
		margin-top: 4px;
		margin-left: 10px;
		margin-right: 10px;
		float: left;
	}

	@font-face{
	  font-family:'Open Sans';
	  font-style: normal;
	  font-weight: normal;
	  src: url('<?php echo HOST; ?>/web-gallery/general/fonts/OpenSans-Regular.ttf');
	}

	#client .menuHeader {
		float: left;
		width: 160px;
		background-color: #FFFFFF;
		-webkit-box-shadow: 0 1px 8px rgba(0, 0, 0, 0.1);
		-moz-box-shadow: 0 1px 8px rgba(0, 0, 0, 0.1);
		box-shadow: 0 1px 8px rgba(0, 0, 0, 0.1);
		font-size: 14px;
		font-family: Helvetica,Arial,sans-serif;
		border: 1px solid #ddd;
		border: 1px solid #ddd;
		margin-top: 7px;
		margin-left: -70px;
		display: none;
	}

	#client .menuHeader > .arrow {
		background-image: url(<?php echo HOST; ?>/web-gallery/manager/header_arrow_menu_top.png);
		width: 14px;
		height: 7px;
		float: right; 
		margin-top: -7px;
		margin-right: 12px;
	}

	#client .menuHeader > a {
		text-decoration: none;
	}

	#client .menuHeader > a > .menuHeaderTab {
		padding: 6px 0 6px 13px;
		color: #333;
		text-decoration: none;
		display: block;
		clear: both;
		font-weight: normal;
		line-height: 18px;
		white-space: nowrap;
		cursor: pointer;
	}

	#client .menuHeader > a > .menuHeaderTab:hover, .menuHeaderTab:active {
		background-color: #EEEEEE;
	}

	#client .menuHeader > a > .menuHeaderTab > .icon {
		margin-top: 4px;
		margin-right: 5px;
	}
	</style>

	<body id="client" class="flashclient" style="padding: 0; margin: 0;">

		<div id="overlay"></div>
	 
		<div id="overlay"></div>
		
		<div class="headerMenu">
		
			<a href="<?php echo HOST; ?>" target="new"><div class="iconLogo"></div></a>
			
			<div class="spacel" style="float: left;"></div>
			
			<a href="<?php echo HOST; ?>/shop" target="new"><div class="iconShop"></div></a>
			
			<div class="spacel" style="float: left;"></div>
			
			<div class="textl"><ubuntu>
			
			<?php
			if($userCounter == 0){ echo '<ubuntu>'.$language['useronline_0'].'</ubuntu>';

			}elseif($userCounter == 1){ echo '<ubuntu>'.$language['useronline_1'].'</ubuntu>';

			}elseif($userCounter > 1){ echo '<ubuntu>'.$language['useronline_+2'].'</ubuntu>';}
			?>
			
			</ubuntu></div>
		
			<div class="headerMenuRight">
			
				<div class="spacel" style="float: left; margin-left: -14px; margin-top: -8px;"></div>
			
				<div class="avatar" style="background-image: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>.gif);"></div>
			
				<div class="textl"><ubuntu>Jij <?php echo $getbrowser['javascript']; ?></ubuntu></div>
				
				<div class="arrow"></div>
				
				<div class="menuHeader">
				
					<div class="arrow"></div>
						
					<a><div class="menuHeaderTab" id="onclickOpenProfile" style="border-bottom: 1px solid #e5e5e5;">Mijn profiel openen</div></a>
					<a href="<?php echo HOST; ?>/me"><div class="menuHeaderTab" style="border-bottom: 1px solid #e5e5e5;">Naar de site</div></a>
					<a href="<?php echo HOST; ?>/logout"><div class="menuHeaderTab">Log Uit</div></a>
					
				</div>
			
			</div>
			
			<ubuntu><input type="text" class="inputHeaderBG searchUser" placeholder="Zoek op alle febbo's"></ubuntu>
		
		</div>
		
		<?php
		// flashvars 
		$flashvars  = 'client.starting=Hallo '.$core->ExploitRetainer($users->UserInfo($username, 'username')).', je koffers worden naar je kamer gebracht...';
		$flashvars .= '&amp;client.allow.cross.domain=1';
		$flashvars .= '&amp;client.notify.cross.domain=1';
		$flashvars .= '&amp;client.hotel_view.show_on_startup=1';
		$flashvars .= '&amp;site.url='.$core->ExploitRetainer($core->CmsSetting('cms_url')).'';
		$flashvars .= '&amp;url.prefix='.$core->ExploitRetainer($core->CmsSetting('cms_url')).'';
		$flashvars .= '&amp;client.reload.url='.$core->ExploitRetainer($core->CmsSetting('cms_url')).'/client';
		$flashvars .= '&amp;client.fatal.error.url='.$core->ExploitRetainer($core->CmsSetting('cms_url')).'/client/disconnected/error';
		$flashvars .= '&amp;client.connection.failed.url='.$core->ExploitRetainer($core->CmsSetting('cms_url')).'/client/disconnected/no/connection';
		$flashvars .= '&amp;connection.info.host='.$core->ExploitRetainer($core->CmsSetting('client_ip')).'';
		$flashvars .= '&amp;connection.info.port='.$core->ExploitRetainer($core->CmsSetting('client_port')).'';
		$flashvars .= '&amp;external.variables.txt='.$core->ExploitRetainer($core->CmsSetting('client_variables')).'';
		$flashvars .= '&amp;external.texts.txt='.$core->ExploitRetainer($core->CmsSetting('client_texts')).'?username='.$core->ExploitRetainer($users->UserInfo($username, 'username')).'';
		$flashvars .= '&amp;productdata.load.url='.$core->ExploitRetainer($core->CmsSetting('client_swf')).'productdata.txt';
		$flashvars .= '&amp;furnidata.load.url='.$core->ExploitRetainer($core->CmsSetting('client_swf')).'furnidata.txt';
		$flashvars .= '&amp;use.sso.ticket=1';
		$flashvars .= '&amp;sso.ticket='.$ticket.'';
		$flashvars .= '&amp;processlog.enabled=1';
		$flashvars .= '&amp;flash.client.url='.$core->ExploitRetainer($core->CmsSetting('client_swf')).'';
		$flashvars .= '&amp;flash.client.origin=popup';
		?>

		<div id="client-ui">
			
			<object type="application/x-shockwave-flash" data="<?php echo $core->ExploitRetainer($core->CmsSetting('client_habbo_swf')); ?>" id="flash-container" style="visibility: visible; margin-top: 44px;">
				<param name="base" value="<?php echo $core->ExploitRetainer($core->CmsSetting('client_swf')); ?>">
				<param name="allowScriptAccess" value="always">
				<param name="menu" value="false">
				<param name="wmode" value="opaque">
				<param class="flashvars" name="flashvars" value="<?php echo $flashvars; ?>">
			</object>
			
		</div>
	 
	</body>
	</html>

<?php
}else{
	echo 'Javascript is disabled';
}
?>