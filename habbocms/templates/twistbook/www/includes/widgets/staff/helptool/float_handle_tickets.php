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

<?php if($users->UserPermission('cms_handle_tickets', $username)){ ?>

<script>
$(document).ready(function() {
    
	$("#onclickOpenHandleTickets").click(function () {
		$("#overlowHandleTickets").fadeIn();
	});
	$("#onclickCloseHandleTickets").click(function () {
		if($(".handleTicketTokenTickets").is(":visible")){
			$(".handleTicketTokenTickets").fadeOut(function(){
				$('.handleTicketNotTokenTickets').animate({
					marginLeft: "225px"
				}, function(){
					$("#overlowHandleTickets").fadeOut(function(){
						backToTickets();
					});
				});
			});
		}else{
			$("#overlowHandleTickets").fadeOut(function(){
				backToTickets();
			});
		}
	});
	$(".onclickCloseHandleMyTickets").click(function () {
		$(".handleTicketTokenTickets").fadeOut(function(){
			$('.handleTicketNotTokenTickets').animate({
				marginLeft: "225px"
			});
		});
	});
	$('.openMyTickets').click(function(){
		$('.disepearthisHandleMyTickets').hide();
		$('.loadingHandleMyTickets').show();
		$.post("<?php echo HOST; ?>/handle/my/tickets", function(php){
			$('.loadingHandleMyTickets').hide();
			$('.disepearthisHandleMyTickets').html(php);
			$('.disepearthisHandleMyTickets').show();
		});
		$('.handleTicketNotTokenTickets').animate({
			marginLeft: "0px"
		}, function(){
			$(".handleTicketTokenTickets").fadeIn();
		});
	});
	
	$('.helptoolTicketContainer').click(function(){
		loadTicket($(this).attr('id'));
	});

});

function loadTicket(id){
	$('.disepearthisHandleTickets').hide();
	$('.loadingHandleTickets').show();
	$.post("<?php echo HOST; ?>/handle/ticket/" + id, { id: id }, function(php){
		$('.loadingHandleTickets').hide();
		$('.disepearthisHandleTickets').html(php);
		$('.disepearthisHandleTickets').show();
	});
}

function backToTickets(){
	$('.disepearthisHandleTickets').hide();
	$('.loadingHandleTickets').show();
	$.post("<?php echo HOST; ?>/handle/second/tickets", function(php){
		$('.loadingHandleTickets').hide();
		$('.disepearthisHandleTickets').html(php);
		$('.disepearthisHandleTickets').show();
	});
}
</script>

<div class="overlowContainer" id="overlowHandleTickets">

	<div style="width: 930px; margin: auto; display: table;">

	<div class="container scroll handleTicketNotTokenTickets" style="width: 450px; float: left; margin-left: 225px;">
		
		<div class="top"></div>
		
		<div class="localOverlowTitleSettings"><b><ubuntu>Tickets</ubuntu></b></div>
		
		<div id="onclickCloseHandleTickets" class="closeButton"></div>
		
		<div class="text" style="width: 390px;">
		
            <div class="loadingHandleTickets" style="display: none;"><center><img style="margin-top:80px; margin-bottom: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></center></div>
            
            <div class="disepearthisHandleTickets">
            
            	<a class="overlowButton openMyTickets" style="float: right; text-shadow: none; text-align: center; margin-top: -30px; margin-right: -10px;">
                    
                	<b><u class="overlowButtonText" style="margin-top: -0px;">
                    
                    	<?php if(mysql_num_rows(mysql_query("SELECT * FROM helptool_messages WHERE token = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."'")) > 0){ ?>
                    
                    		<div style="border: 1px solid #000000; border-radius: 7px; border-bottom-width: 2px; display: table; margin-top: -20px; margin-left: -17px; margin-bottom: 1px; z-index: 999;">
                                
                                <div style="border: 1px solid #ED2823; border-radius: 5px; background-color: #AC1D19; padding: 1px 3px 1px 4px; color: #FFFFFF; display: table;">
                                    
                                    <ubuntu><?php echo mysql_num_rows(mysql_query("SELECT * FROM helptool_messages WHERE token = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."'")); ?></ubuntu>
                                
                                </div>
                                
                            </div>
                            
                        <?php } ?>
                        
                    	<i><ubuntu>Mijn tickets</ubuntu></i>
                        
                	</u></b>
                            
                	<div></div>
                        
            	</a>
                
                <?php if(mysql_num_rows(mysql_query("SELECT * FROM helptool_messages WHERE token = '0' ORDER BY published DESC")) == 0){ ?>
                
                	<div style="padding-top: 10px;"><div class="errorMessageOverlow" style="width: 380px;">Momenteel zijn er geen tickets meer.</div></div>
                
                <?php } ?>
            	
                <?php				
				$query_manager_all_helptooltickets = mysql_query("SELECT * FROM helptool_messages WHERE token = '0' ORDER BY published DESC");
				while($manager_all_helptooltickets = mysql_fetch_array($query_manager_all_helptooltickets)){
				?>
            
            	<div class="helptoolTicketContainer" style="display: table; cursor: pointer; width: 410px;" id="<?php echo $manager_all_helptooltickets['id']; ?>">
					
					<div style="margin-right: 10px; background-position: -10px -10px; width: 50px; height: 60px; float: left; background-image: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfoByID($manager_all_helptooltickets['user_id'], 'look')); ?>);" class="avatar"></div>
                    
                   	<div style="padding-top: 15px; display: table; width: 350px;">
						
						<div style="font-size: 18px; font-weight: bold; float: left;"><ubuntu><?php echo $core->ExploitRetainer($users->UserInfoByID($manager_all_helptooltickets['user_id'], 'username')); ?></ubuntu></div>
                        
                    </div>
                    
                   	<div style="color: #999; "><ubuntu><?php echo $language['posted_on']; ?>: <b><?php echo $core->timeAgo($manager_all_helptooltickets['published']); ?></b></ubuntu></div>
							
					<input type="hidden" name="ticketId" class="ticketId" value="<?php echo $manager_all_helptooltickets['id']; ?>">
						
				</div>
                
               	<div style="border-top: 1px solid #CCCCCC;  border-bottom: 1px solid #FFFFFF; width: 410px"></div>
                
                <?php } ?>
                    
            </div>
		
		</div>
		
		<div class="bottom"></div>
		
	</div>
    
    <div class="container scroll handleTicketTokenTickets" style="float: right; width: 450px; margin-left: 20px; display: none;">
		
		<div class="top"></div>
		
		<div class="localOverlowTitleSettings"><b><ubuntu>Mijn tickets</ubuntu></b></div>
		
		<div class="closeButton onclickCloseHandleMyTickets"></div>
		
		<div class="text" style="width: 390px;">
		
            <div class="loadingHandleMyTickets" style="display: none;"><center><img style="margin-top:80px; margin-bottom: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></center></div>
            
            <div class="disepearthisHandleMyTickets">
            	
                <?php
				$query_manager_all_helptooltickets = mysql_query("SELECT * FROM helptool_messages WHERE token = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."' ORDER BY published DESC");
				while($manager_all_helptooltickets = mysql_fetch_array($query_manager_all_helptooltickets)){
				?>
            
            	<div class="helptoolTicketContainer onclickCloseHandleMyTickets" style="display: table; cursor: pointer; width: 410px;" id="<?php echo $manager_all_helptooltickets['id']; ?>">
					
					<div style="margin-right: 10px; background-position: -10px -10px; width: 50px; height: 60px; float: left; background-image: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfoByID($manager_all_helptooltickets['user_id'], 'look')); ?>);" class="avatar"></div>
                    
                   	<div style="padding-top: 15px; display: table; width: 350px;">
						
						<div style="font-size: 18px; font-weight: bold; float: left;"><ubuntu><?php echo $core->ExploitRetainer($users->UserInfoByID($manager_all_helptooltickets['user_id'], 'username')); ?></ubuntu></div>
                        
                    </div>
                    
                   	<div style="color: #999; "><ubuntu><?php echo $language['posted_on']; ?>: <b><?php echo $core->timeAgo($manager_all_helptooltickets['published']); ?></b></ubuntu></div>
							
					<input type="hidden" name="ticketId" class="ticketId" value="<?php echo $manager_all_helptooltickets['id']; ?>">
						
				</div>
                
               	<div style="border-top: 1px solid #CCCCCC;  border-bottom: 1px solid #FFFFFF; width: 410px"></div>
                
                <?php } ?>
                    
            </div>
		
		</div>
		
		<div class="bottom"></div>
		
	</div>
    
    </div>

</div>

<?php } ?>