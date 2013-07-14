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
include("includes/inc.global.php");

$menu = 'manager';
$page = 'manager';

if($core->ExploitRetainer($users->UserPermission('cms_manager_login', $username))){
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $hotelname; ?> - Manager</title>
    <?php echo $Style->Manager(); ?>

</head>

<script>
$(document).ready(function(){
	
	resizeContainer('Home');
	switchMenu();
	openHeaderMenu();
	
	if ($.browser.msie && $.browser.version.substr(0,1)<7){            
      	$('.tooltip').mouseover(function(){              
            $(this).children('span').show();                
        }).mouseout(function(){
            $(this).children('span').hide();
        })
    }
	
});

function resizeContainer(id){
	
	var container = $(window).width() - 275;
	$('.container' + id).animate({
		width: container + 'px'
	}, 1);
	
	$(window).resize(function(){
		var container = $(window).width() - 275;
		$('.container' + id).animate({
			width: container + 'px',
		}, 1);
	});
	
}

function switchMenu(){
	
	$('.tab').click(function(){
		var id = $(this).attr('id');
		$('.tab.selected').toggleClass('selected');
		$('.menu' + id).toggleClass('selected');
		
		$(".container:visible").hide("slide", { direction: 'right' }, 800);
		resizeContainer(id);
		setTimeout(function(){ $('.container' + id).show("slide", { direction: "up" }, 800); }, 1000);
	});
	
}

function openHeaderMenu(){
	
	$('.dropDownMenuHeader').click(function(){
		$(this).toggleClass('selected');
		if($('.menuHeader').is(":hidden")){
			$('.menuHeader').slideDown();
		}else{
			$('.menuHeader').slideUp();
		}
	});
	
}

function buttonText(type, name, text){
	
	if(type == 'class'){
		$('.' + name).val(text);
	}
	
	if(type == 'id'){
		$('#' + name).val(text);
	}
	
}
</script>

<style type="text/css">
.input {
	height: 34px;
}
</style>
    
    <div class="body">
    
    	<div class="header">
        
        	<div class="userOnline"><?php if($userCounter == 0){ echo $language['useronline_0']; }elseif($userCounter == 1){ echo $language['useronline_1']; }elseif($userCounter > 1){ echo $language['useronline_+2'];} ?></div>
        
        	<div class="dropDownMenuHeader">
        
        		<div class="arrow"></div>
            
            	<div class="name"><?php echo $core->ExploitRetainer($users->UserInfo($username, 'username')); ?></div>
            
            	<div class="avatar" style="background-image: url(http://www.habbo.com/habbo-imaging/avatarimage?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>.gif);"></div>
            
            </div>
            
            <div class="menuHeader">
            
            	<div class="arrow"></div>
                
                <a href="<?php echo HOST; ?>"><div class="menuHeaderTab" style="border-bottom: 1px solid #e5e5e5;"><div class="icon home" style="margin-top: 2px;"></div> <?php echo $language["manager_general_goback"]; ?></div></a>
                <a href="<?php echo HOST; ?>/client"><div class="menuHeaderTab" style="border-bottom: 1px solid #e5e5e5;"><div class="icon bullet" style="margin-top: 3px;"></div> <?php echo $language["manager_general_enterhotel"]; ?></div></a>
            	<a href="<?php echo HOST; ?>/logout"><div class="menuHeaderTab"><div class="icon key"></div> <?php echo $language["manager_general_signout"]; ?></div></a>
            
            </div>
        
        </div>
    
    	<div class="inside">
    
            <div class="menu">
            
                <div class="tab selected menuHome" id="Home"><div class="icon arrowRight"></div><div class="text"><?php echo $language["manager_menu_dashboard"]; ?></div><div class="selected"></div></div>
                
                <div class="slice"></div>
                
                <?php if($core->ExploitRetainer($users->UserPermission('cms_manager_hotel', $username))){ ?>
                
                <div class="tab menuHotelSettings" id="HotelSettings"><div class="icon arrowRight"></div><div class="text"><?php echo $language["manager_menu_hotelsettings"]; ?></div><div class="selected"></div></div>
                
                <div class="slice"></div>
                
                <?php } ?>
                
                <?php if($core->ExploitRetainer($users->UserPermission('cms_manager_maintenance', $username))){ ?>
                
                <div class="tab menuMaintenanceSettings" id="MaintenanceSettings"><div class="icon arrowRight"></div><div class="text"><?php echo $language["manager_menu_maintenance"]; ?></div><div class="selected"></div></div>
                
                <div class="slice"></div>
                
                <?php } ?>
				
				<?php if($core->ExploitRetainer($users->UserPermission('cms_news', $username))){ ?>
                
                <div class="tab menuNews" id="News"><div class="icon arrowRight"></div><div class="text"><?php echo $language["manager_menu_news"]; ?></div><div class="selected"></div></div>
                
                <div class="slice"></div>
                
                <?php } ?>
                
                <?php if($core->ExploitRetainer($users->UserPermission('cms_manager_poll', $username))){ ?>
                
                <div class="tab menuPollSettings" id="PollSettings"><div class="icon arrowRight"></div><div class="text"><?php echo $language["manager_menu_poll"]; ?></div><div class="selected"></div></div>
                
                <div class="slice"></div>
                
                <?php } ?>
                
                <?php if($core->ExploitRetainer($users->UserPermission('cms_manager_rank', $username))){ ?>
                
                <div class="tab menuRangSettings" id="RangSettings"><div class="icon arrowRight"></div><div class="text"><?php echo $language["manager_menu_rank"]; ?></div><div class="selected"></div></div>
                
                <div class="slice"></div>
                
                <?php } ?>
                
                <?php if($core->ExploitRetainer($users->UserPermission('cms_manager_of_the_week', $username))){ ?>
                
                <div class="tab menuOfTheWeekSettings" id="OfTheWeekSettings"><div class="icon arrowRight"></div><div class="text"><?php echo $language["manager_menu_weekly"]; ?></div><div class="selected"></div></div>
                
                <div class="slice"></div>
                
                <?php } ?>
                
                <?php if($core->ExploitRetainer($users->UserPermission('cms_manager_users', $username))){ ?>
                
                <div class="tab menuUsers" id="Users"><div class="icon arrowRight"></div><div class="text"><?php echo $language["manager_menu_users"]; ?></div><div class="selected"></div></div>
                
                <div class="slice"></div>
                
                <?php } ?>
                
                <?php if($core->ExploitRetainer($users->UserPermission('cms_manager_badge', $username))){ ?>
                
                <div class="tab menuBadges" id="Badges"><div class="icon arrowRight"></div><div class="text"><?php echo $language["manager_menu_badges"]; ?></div><div class="selected"></div></div>
                
                <div class="slice"></div>
                
                <?php } ?>
                
                <?php if($core->ExploitRetainer($users->UserPermission('cms_manager_ban', $username))){ ?>
                
                <div class="tab menuBan" id="Ban"><div class="icon arrowRight"></div><div class="text"><?php echo $language["manager_menu_ban"]; ?></div><div class="selected"></div></div>
                
                <div class="slice"></div>
                
                <?php } ?>
                
                <?php if($core->ExploitRetainer($users->UserPermission('cms_manager_give', $username))){ ?>
                
                <div class="tab menuGive" id="Give"><div class="icon arrowRight"></div><div class="text"><?php echo $language["manager_menu_give"]; ?></div><div class="selected"></div></div>
                
                <div class="slice"></div>
                
                <?php } ?>
                
                <?php if($core->ExploitRetainer($users->UserPermission('cms_manager_alert', $username))){ ?>
                
                <div class="tab menuAlert" id="Alert"><div class="icon arrowRight"></div><div class="text"><?php echo $language["manager_menu_alert"]; ?></div><div class="selected"></div></div>
                
                <div class="slice"></div>
                
                <?php } ?>
                
                <?php if($core->ExploitRetainer($users->UserPermission('cms_manager_bots', $username))){ ?>
                
                <div class="tab menuBots" id="Bots"><div class="icon arrowRight"></div><div class="text"><?php echo $language["manager_menu_bots"]; ?></div><div class="selected"></div></div>
                
                <div class="slice"></div>
                
                <?php } ?>
                
                <?php if($core->ExploitRetainer($users->UserPermission('cms_manager_payments_logbook', $username))){ ?>
                
                <div class="tab menuPaymentsLogbook" id="PaymentsLogbook"><div class="icon arrowRight"></div><div class="text"><?php echo $language["manager_menu_payments"]; ?></div><div class="selected"></div></div>
                
                <div class="slice"></div>
                
                <?php } ?>
                
                <?php if($core->ExploitRetainer($users->UserPermission('cms_manager_dj_panel', $username))){ ?>
                
                <div class="tab menuDjPanel" id="DjPanel"><div class="icon arrowRight"></div><div class="text"><?php echo $language["manager_menu_djpanel"]; ?></div><div class="selected"></div></div>
				
				<div class="slice"></div>
                
                <?php } ?>
				
				<?php if($core->ExploitRetainer($users->UserPermission('phpmyadmin_acces', $username))){ ?>
				
				<script>
				$(document).ready(function(){
					$('.menuPhpMyAdmin').click(function(){
						var win=window.open('<?php echo HOST; ?>/database', '_blank');
						win.focus();
					});
				});
				</script>
                
                <div class="tab menuPhpMyAdmin" id="PhpMyAdmin" onclick><div class="icon arrowRight"></div><div class="text"><?php echo $language["manager_menu_pma"]; ?></div><div class="selected"></div></div>
                
                <?php } ?>
            
            </div>
            
            <?php
			
			if($core->ExploitRetainer($users->UserPermission('cms_manager_login', $username))){
				
				include("apps/manager/startpage.php");
				
				if($core->ExploitRetainer($users->UserPermission('cms_manager_hotel', $username))){ include("apps/manager/hotel_settings.php"); }
				
				if($core->ExploitRetainer($users->UserPermission('cms_manager_maintenance', $username))){ include("apps/manager/maintenance_settings.php"); }
				
				if($core->ExploitRetainer($users->UserPermission('cms_news', $username))){ include("apps/manager/news.php"); }
				
				if($core->ExploitRetainer($users->UserPermission('cms_manager_poll', $username))){ include("apps/manager/poll_settings.php"); }
				
				if($core->ExploitRetainer($users->UserPermission('cms_manager_rank', $username))){ include("apps/manager/rank_settings.php"); }
				
				if($core->ExploitRetainer($users->UserPermission('cms_manager_of_the_week', $username))){ include("apps/manager/of_the_week_settings.php"); }
				
				if($core->ExploitRetainer($users->UserPermission('cms_manager_users', $username))){ include("apps/manager/users.php"); }
				
				if($core->ExploitRetainer($users->UserPermission('cms_manager_badge', $username))){ include("apps/manager/badge.php"); }
				
				if($core->ExploitRetainer($users->UserPermission('cms_manager_ban', $username))){ include("apps/manager/ban.php"); }
				
				if($core->ExploitRetainer($users->UserPermission('cms_manager_give', $username))){ include("apps/manager/give.php"); }
				
				if($core->ExploitRetainer($users->UserPermission('cms_manager_alert', $username))){ include("apps/manager/alert.php"); }
				
				if($core->ExploitRetainer($users->UserPermission('cms_manager_bots', $username))){ include("apps/manager/bots.php"); }
				
				if($core->ExploitRetainer($users->UserPermission('cms_manager_payments_logbook', $username))){ include("apps/manager/payments_logbook.php"); }
				
				if($core->ExploitRetainer($users->UserPermission('cms_manager_dj_panel', $username))){ include("apps/manager/dj_panel.php"); }
				
				if($core->ExploitRetainer($users->UserPermission('phpmyadmin_acces', $username))){ include("apps/manager/phpmyadmin.php"); }
				
			}
			
			?>
			
        </div>
        
    </div>

</body>
</html>

<?php }else{ header("Location: ".HOST.""); } ?>