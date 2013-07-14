<?php
if(defined('IGNORE_NAVI')) echo "Ignore!";
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

?>

<script>
$(document).ready(function() {

	$('.navigationTopme').mouseover(  function() {
		$('.navigationDisepear').hide();
		$('.navigationme').fadeIn('slow');
	});

	$('.navigationTopcommunity').mouseover(  function() {
		$('.navigationDisepear').hide();
		$('.navigationcommunity').fadeIn('slow');
	});
	
	$('.navigationTopcredits').mouseover(  function() {
		$('.navigationDisepear').hide();
		$('.navigationcredits').fadeIn('slow');
	});
	
	$('.navigationTopsafety').mouseover(  function() {
		$('.navigationDisepear').hide();
		$('.navigationsafety').fadeIn('slow');
	});
	
	$('.navigationTopshop').mouseover(  function() {
		$('.navigationDisepear').hide();
		$('.navigationshop').fadeIn('slow');
	});
	
	$('.navigationTopforum').mouseover(  function() {
		$('.navigationDisepear').hide();
		$('.navigationforum').fadeIn('slow');
	});

});
</script>

<div class="containerMenu">

	<div onClick="location.href='<?php echo HOST; ?>/<?php if(isset($_COOKIE['username'])){ echo 'me'; }else{ echo 'quickregister/first'; } ?>'" class="topItem <?php if($menu == 'me'){ echo 'Selected'; } ?> navigationTopme" ><?php if(isset($_COOKIE['username'])){ echo $core->ExploitRetainer($users->UserInfo($username, 'username')); }else{ echo $language['me_nologin_register_free']; }?></div>

	<div onClick="location.href='<?php echo HOST; ?>/community'" class="topItem <?php if($menu == 'community'){ echo 'Selected'; } ?> navigationTopcommunity"><?php echo $language['menu_community']; ?></div>

	<div onClick="location.href='<?php echo HOST; ?>/credits'" class="topItem <?php if($menu == 'credits'){ echo 'Selected'; } ?> navigationTopcredits"><?php echo $language['menu_credits']; ?></div>

	<div onClick="location.href='<?php echo HOST; ?>/safety'" class="topItem <?php if($menu == 'safety'){ echo 'Selected'; } ?> navigationTopsafety"><?php echo $language['menu_safety']; ?></div>
    
    <?php if(isset($_COOKIE['username'])){ ?>
    
    	<div onClick="location.href='<?php echo HOST; ?>/shop'" class="topItem <?php if($menu == 'shop'){ echo 'Selected'; } ?> navigationTopshop"><?php echo $language['menu_shop']; ?></div>
        
        <div onClick="location.href='<?php echo HOST; ?>/forum'" class="topItem <?php if($menu == 'forum'){ echo 'Selected'; } ?> navigationTopforum"><?php echo $language['menu_forum']; ?></div>
    
    <?php } ?>

</div>

<div class="subMenu">

	<?php if(isset($_COOKIE['username'])){ ?>

		<div class="navigationDisepear navigationme" <?php if($menu == 'me'){ }else{ echo 'style="display: none;"'; } ?>>
	
			<div style="cursor: pointer;" onClick="location.href='<?php echo HOST; ?>/me'" class="menuItem <?php if($page == 'me'){ echo 'Selected'; } ?>"><?php echo $language['menu_me']; ?></div>
            
            <?php if(isset($page) == 'home' || $core->ExploitRetainer($_GET['id']) == $core->ExploitRetainer($users->UserInfo($username, 'id'))){ ?>
            
            <script>
			$(document).ready(function(){
				$('.menuWithSubMenuHome').mouseenter(function(){
					$('.menuItemSubMenuContainerHome').slideDown();
				});
				$('.menuWithSubMenuHome').mouseleave(function(){
					$('.menuItemSubMenuContainerHome').slideUp();
				});
			});
			</script>

			<div class="menuItem space itemSubMenu menuWithSubMenuHome">
			
				<div onClick="location.href='<?php echo HOST; ?>/home/<?php echo $core->ExploitRetainer($users->UserInfo($username, 'id')); ?>'" class="itemSubMenuItem <?php if($page == 'home'){ echo 'Selected'; } ?>"><?php echo $language['menu_me_mypage']; ?></div>
                
                <div class="menuItemSubMenuContainer menuItemSubMenuContainerHome">
                
                	<div class="fistSpaceMenu"></div>
                    <div onClick="location.href='<?php echo HOST; ?>/home/<?php echo $core->ExploitRetainer($users->UserInfo($username, 'id')); ?>/load-edit'" class="menuItemSubMenu <?php if($menu_sub_my == 'my_edit_page'){ echo 'selected'; } ?>"><?php echo $language['menu_me_mypage_edit']; ?></div>
                
                </div>
                
            </div>
            
            <?php }else{ ?>
            
            <script>
			$(document).ready(function(){
				$('.menuWithSubMenuHomeOther').mouseenter(function(){
					$('.menuItemSubMenuContainerHomeOther').slideDown();
				});
				$('.menuWithSubMenuHomeOther').mouseleave(function(){
					$('.menuItemSubMenuContainerHomeOther').slideUp();
				});
			});
			</script>
            
            <div class="menuItem space itemSubMenu menuWithSubMenuHomeOther">
            
            	<div onClick="location.href='<?php echo HOST; ?>/home/<?php echo $core->ExploitRetainer($_GET['id']); ?>'" class="itemSubMenuItem selected">Pagina van <?php echo $core->ExploitRetainer($users->UserInfoByID($core->ExploitRetainer($_GET['id']), 'username')); ?></div>
            
            	<div class="menuItemSubMenuContainer menuItemSubMenuContainerHomeOther">
                
                	<div class="fistSpaceMenu"></div>
                    
                    <div onClick="location.href='<?php echo HOST; ?>/home/<?php echo $core->ExploitRetainer($users->UserInfo($username, 'id')); ?>'" class="menuItemSubMenu <?php if($menu_sub == 'my_page'){ echo 'selected'; } ?>">Jou pagina</div>
                    
                    <div onClick="location.href='<?php echo HOST; ?>/home/<?php echo $core->ExploitRetainer($users->UserInfo($username, 'id')); ?>/load-edit'" class="menuItemSubMenu <?php if($menu_sub_my == 'my_edit_page'){ echo 'selected'; } ?>">Jou pagina wijzigen</div>
                
                </div>
            
            </div>
            
            <?php } ?>
            
            <script>
			$(document).ready(function(){
				$('.menuWithSubMenuSettings').mouseenter(function(){
					$('.menuItemSubMenuContainerSettings').slideDown();
				});
				$('.menuWithSubMenuSettings').mouseleave(function(){
					$('.menuItemSubMenuContainerSettings').slideUp();
				});
			});
			</script>
	
			<div class="menuItem space itemSubMenu menuWithSubMenuSettings">
			
				<div onClick="location.href='<?php echo HOST; ?>/settings'" class="itemSubMenuItem <?php if($page == 'settings'){ echo 'Selected'; } ?>"><?php echo $language['menu_me_settings']; ?></div>
                
                <div class="menuItemSubMenuContainer menuItemSubMenuContainerSettings">
                
                	<div class="fistSpaceMenu"></div>
                
                	<div onClick="location.href='<?php echo HOST; ?>/settings/general'" class="menuItemSubMenu <?php if($menu_sub == 'settings_general'){ echo 'selected'; } ?>"><?php echo $language['settings_title_general']; ?></div>
                    
                    <div onClick="location.href='<?php echo HOST; ?>/settings/friends'" class="menuItemSubMenu <?php if($menu_sub == 'settings_friends'){ echo 'selected'; } ?>"><?php echo $language['settings_title_friends']; ?></div>
                    
                    <div onClick="location.href='<?php echo HOST; ?>/settings/bots'" class="menuItemSubMenu <?php if($menu_sub == 'settings_bots'){ echo 'selected'; } ?>"><?php echo $language['settings_title_bots']; ?></div>
                    
                    <div onClick="location.href='<?php echo HOST; ?>/settings/forum'" class="menuItemSubMenu <?php if($menu_sub == 'settings_forum'){ echo 'selected'; } ?>"><?php echo $language['settings_title_forum']; ?></div>
                    
                    <?php if($core->ExploitRetainer($users->UserInfo($username, 'vip')) == '1'){ ?><div onClick="location.href='<?php echo HOST; ?>/settings/avatar'" class="menuItemSubMenu <?php if($menu_sub == 'settings_avatar'){ echo 'selected'; } ?>"><?php echo $language['settings_title_avatar']; ?></div><?php } ?>
                    
                    <div onClick="location.href='<?php echo HOST; ?>/settings/referral'" class="menuItemSubMenu <?php if($menu_sub == 'settings_referral'){ echo 'selected'; } ?>"><?php echo $language['settings_referral_title']; ?></div>
                
                </div>
                
            </div>
			
			<!-- <div style="cursor: pointer;" onClick="location.href='<?php echo HOST; ?>/exchange'" class="menuItem space <?php if($page == 'exchange'){ echo 'Selected'; } ?>"><?php echo $language['menu_exchange']; ?></div>  -->

		</div>
    
    <?php } ?>

	<div class="navigationDisepear navigationcommunity" <?php if($menu == 'community'){ }else{ echo 'style="display: none;"'; } ?>>
	
		<div style="cursor: pointer;" onClick="location.href='<?php echo HOST; ?>/community'" class="menuItem <?php if($page == 'community'){ echo 'Selected'; } ?>"><?php echo $language['menu_community']; ?></div>

		<div style="cursor: pointer;" onClick="location.href='<?php echo HOST; ?>/news/<?php echo $core->getNewestNews(); ?>'" class="menuItem space <?php if($page == 'news'){ echo 'Selected'; } ?>"><?php echo $language['menu_community_news']; ?></div>
        
        <div style="cursor: pointer;" onClick="location.href='<?php echo HOST; ?>/top/10'" class="menuItem space <?php if($page == 'top_10'){ echo 'Selected'; } ?>"><?php echo $language['menu_community_top_10']; ?></div>
        
        <script>
		$(document).ready(function(){
			$('.menuWithSubMenuStaff').mouseenter(function(){
				$('.menuItemSubMenuContainerStaff').slideDown();
			});
			$('.menuWithSubMenuStaff').mouseleave(function(){
				$('.menuItemSubMenuContainerStaff').slideUp();
			});
		});
		</script>
	
		<div class="menuItem space itemSubMenu menuWithSubMenuStaff">
			
			<div onClick="location.href='<?php echo HOST; ?>/staff'" class="itemSubMenuItem <?php if($page == 'staff'){ echo 'Selected'; } ?>"><?php echo $language['menu_community_staff']; ?></div>
                
      		<div class="menuItemSubMenuContainer menuItemSubMenuContainerStaff">
                
              	<div class="fistSpaceMenu"></div>
                
             	<div onClick="location.href='<?php echo HOST; ?>/staff'" class="menuItemSubMenu <?php if($menu_sub == 'staff'){ echo 'selected'; } ?>"><?php echo $language['menu_community_staff']; ?></div>
                    
                <div onClick="location.href='<?php echo HOST; ?>/dj'" class="menuItemSubMenu <?php if($menu_sub == 'dj'){ echo 'selected'; } ?>">DJ's</div>
                
                <div onClick="location.href='<?php echo HOST; ?>/spam/build'" class="menuItemSubMenu <?php if($menu_sub == 'spam_build'){ echo 'selected'; } ?>">Het Spam en Bouw Team</div>
                
            </div>
                
        </div>
		
	</div>

	<div class="navigationDisepear navigationcredits" <?php if($menu == 'credits'){ }else{ echo 'style="display: none;"'; } ?>>

		<div style="cursor: pointer;" onClick="location.href='<?php echo HOST; ?>/credits'" class="menuItem <?php if($page == 'credits'){ echo 'Selected'; } ?>"><?php echo $language['menu_credits']; ?></div>
	
		<div style="cursor: pointer;" onClick="location.href='<?php echo HOST; ?>/diamonds'" class="menuItem space <?php if($page == 'diamonds'){ echo 'Selected'; } ?>"><?php echo $language['menu_credits_pixels']; ?></div>

	</div>
	
	<div class="navigationDisepear navigationsafety" <?php if($menu == 'safety'){ }else{ echo 'style="display: none;"'; } ?>>
    
    	<div style="cursor: pointer;" onClick="location.href='<?php echo HOST; ?>/safety'" class="menuItem <?php if($page == 'safety'){ echo 'Selected'; } ?>"><?php echo $language['menu_safety']; ?></div>
        
        <div style="cursor: pointer;" onClick="location.href='<?php echo HOST; ?>/rules'" class="menuItem space <?php if($page == 'rules'){ echo 'Selected'; } ?>"><?php echo $language['menu_safety_rules']; ?></div>

	</div>
    
    <?php if(isset($_COOKIE['username'])){ ?>
    
    	<div class="navigationDisepear navigationshop" <?php if($menu == 'shop'){ }else{ echo 'style="display: none;"'; } ?>>
    
    		<div style="cursor: pointer;" onClick="location.href='<?php echo HOST; ?>/shop'" class="menuItem <?php if($page == 'shop'){ echo 'Selected'; } ?>"><?php echo $language['menu_shop']; ?></div>
    		
    		<div style="cursor: pointer;" onClick="location.href='<?php echo HOST; ?>/vip'" class="menuItem space <?php if($page == 'vip'){ echo 'Selected'; } ?>"><?php echo $language['menu_community_vip']; ?></div>
    
    		<div style="cursor: pointer;" onClick="location.href='<?php echo HOST; ?>/shop/badges'" class="menuItem space <?php if($page == 'shop_badges'){ echo 'Selected'; } ?>"><?php echo $language['menu_shop_badges']; ?></div>
        
        	<!-- <div style="cursor: pointer;" onClick="location.href='<?php echo HOST; ?>/shop/furniture'" class="menuItem space <?php if($page == 'shop_furniture'){ echo 'Selected'; } ?>"><?php echo $language['menu_shop_furniture']; ?></div> --->
        
        	<div style="cursor: pointer;" onClick="location.href='<?php echo HOST; ?>/shop/bots'" class="menuItem space <?php if($page == 'shop_bots'){ echo 'Selected'; } ?>"><?php echo $language['menu_shop_bots']; ?></div>
    
    	</div>
        
        <div class="navigationDisepear navigationforum" <?php if($menu == 'forum'){ }else{ echo 'style="display: none;"'; } ?>>
    
    		
    
    	</div>
    
    <?php } ?>
	
</div>