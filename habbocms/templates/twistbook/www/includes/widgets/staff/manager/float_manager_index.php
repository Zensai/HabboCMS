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

?>

<?php if($users->UserPermission('cms_manager_login', $username)){ ?>

<script>
$(document).ready(function() {
    
	$("#onclickOpenManager").click(function () {
		$("#overlowManager").fadeIn("slow");
	});
	$("#onclickCloseManager").click(function () {
		$("#overlowManager").fadeOut("slow");
	});

});
</script>

<style type="text/css">
.managerMenu.space {
	margin-left: 10px;
	margin-right: 0px;
	margin-bottom: 10px;
}

.managerMenu.bottomTab {
	margin-bottom: 0px;
}

#overlowManager > .overlowManagerIndex > .text {
	width: 100% !important;
}
</style>

<div class="overlowContainer" id="overlowManager">

	<div class="container overlowManagerIndex" style="width: 530px;display: table;">
		
		<div class="top"></div>
		
		<div class="localOverlowTitleSettings"><ubuntu><b><?php echo $language['menu_manager']; ?></b> - <?php echo $language['manager_index_index']; ?></ubuntu></div>
		
		<div id="onclickCloseManager" class="closeButton"></div>
		
		<div class="text" style="width: 478px; margin-left: -10px;">
			
			<?php if($users->UserPermission('cms_manager_hotel', $username)){ ?>
			
				<div class="managerMenu space">
					
					<div id="onclickOpenManagerHotel" class="tab"><div class="managerArrow"></div><ubuntu><?php echo $language['manager_menu_hotel_settings']; ?></ubuntu></div>
					
				</div>
			
			<?php } ?>
			
			<?php if($users->UserPermission('cms_manager_maintenance', $username)){ ?>
			
				<div class="managerMenu space">

					<div id="onclickOpenManagerMaintenance" class="tab"><div class="managerArrow"></div><ubuntu><?php echo $language['manager_menu_maintenancepage_settings']; ?></ubuntu></div>
					
				</div>
			
			<?php } ?>
			
			<?php if($users->UserPermission('cms_manager_users', $username)){ ?>
			
				<div class="managerMenu space">
			
					<div id="onclickOpenManagerUsers" class="tab"><div class="managerArrow"></div><ubuntu><?php echo $language['manager_menu_users']; ?></ubuntu></div>
			
				</div>
			
			<?php } ?>
			
			<?php if($users->UserPermission('cms_manager_poll', $username)){ ?>
			
				<div class="managerMenu space">

					<div id="onclickOpenManagerPoll" class="tab"><div class="managerArrow"></div><ubuntu><?php echo $language['manager_menu_poll_settings']; ?></ubuntu></div>
					
				</div>
			
			<?php } ?>
            
            <?php if($users->UserPermission('cms_manager_of_the_week', $username)){ ?>
			
				<div class="managerMenu space">

					<div id="onclickOpenManagerOfTHeWeek" class="tab"><div class="managerArrow"></div><ubuntu><?php echo $language['manager_menu_of_the_week_settings']; ?></ubuntu></div>
					
				</div>
			
			<?php } ?>
            
            <?php if($users->UserPermission('cms_manager_rank', $username)){ ?>
			
				<div class="managerMenu space">

					<div id="onclickOpenManagerRank" class="tab"><div class="managerArrow"></div><ubuntu><?php echo $language['manager_menu_rank_settings']; ?></ubuntu></div>
					
				</div>
			
			<?php } ?>
            
            <?php if($users->UserPermission('cms_manager_badge', $username)){ ?>
			
				<div class="managerMenu space">

					<div id="onclickOpenManagerBadge" class="tab"><div class="managerArrow"></div><ubuntu><?php echo $language['manager_menu_badge_settings']; ?></ubuntu></div>
					
				</div>
			
			<?php } ?>
            
            <?php if($users->UserPermission('cms_manager_ban', $username)){ ?>
			
				<div class="managerMenu space">

					<div id="onclickOpenManagerBan" class="tab"><div class="managerArrow"></div><ubuntu><?php echo $language['manager_menu_ban_settings']; ?></ubuntu></div>
					
				</div>
			
			<?php } ?>
            
            <?php if($users->UserPermission('cms_manager_give', $username)){ ?>
			
				<div class="managerMenu space">

					<div id="onclickOpenManagerGive" class="tab"><div class="managerArrow"></div><ubuntu><?php echo $language['manager_menu_give']; ?></ubuntu></div>
					
				</div>
			
			<?php } ?>
            
            <?php if($users->UserPermission('cms_manager_alert', $username)){ ?>
			
				<div class="managerMenu space">

					<div id="onclickOpenManagerAlert" class="tab"><div class="managerArrow"></div><ubuntu><?php echo $language['manager_menu_alert']; ?></ubuntu></div>
					
				</div>
			
			<?php } ?>
            
            <?php if($users->UserPermission('cms_manager_bots', $username)){ ?>
			
				<div class="managerMenu space bottomTab">

					<div id="onclickOpenManagerBots" class="tab"><div class="managerArrow"></div><ubuntu><?php echo $language['manager_menu_bots']; ?></ubuntu></div>
					
				</div>
			
			<?php } ?>
            
            <?php if($users->UserPermission('cms_manager_payments_logbook', $username)){ ?>
			
				<div class="managerMenu space bottomTab">

					<div id="onclickOpenManagerPaymentsLogbook" class="tab"><div class="managerArrow"></div><ubuntu><?php echo $language['manager_menu_payments_logbook']; ?></ubuntu></div>
					
				</div>
			
			<?php } ?>
				
		</div>
		
		<div class="bottom"></div>
		
	</div>

</div>

<?php } ?>