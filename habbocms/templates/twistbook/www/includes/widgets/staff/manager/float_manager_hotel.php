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

<?php if($users->UserPermission('cms_manager_hotel', $username)){ ?>

<script>
$(document).ready(function() {
    
	$("#onclickOpenManagerHotel").click(function () {
		$("#overlowManagerHotel").show("slide", { direction: "up" }, 1000);
		$(".overlowManagerIndex").fadeOut();
	});
	$("#onclickCloseManagerHotel").click(function () {
		$("#overlowManagerHotel").hide("slide", { direction: "down" }, 1000, function(){
			$(".overlowManagerIndex").fadeIn();
		});
	});
	
	$('.postItHotelSettings').click(function() { 
		SubmitFormHotel();
		$(".loadingHotelSettings").show();
		$(".disepearthisHotelSettings").hide();
	});
	
	function SubmitFormHotel() {
		$.ajax({
			type: "POST",
			url: "<?php echo HOST; ?>/manager/hotel/update",
			data: "cms_name=" + $('#cms_name').val() + "&cms_url=" + $('#cms_url').val() + "&cms_maintenance=" + $('#cms_maintenance').val() + "&client_port=" + $('#client_port').val() + "&client_mus=" + $('#client_mus').val() + "&client_ip=" + $('#client_ip').val() + "&client_variables=" + $('#client_variables').val() + "&client_texts=" + $('#client_texts').val() + "&client_swf=" + $('#client_swf').val() + "&client_habbo_swf=" + $('#client_habbo_swf').val() + "&client_motd=" + $('#client_motd').val() + "&client_pay_timer=" + $('#client_pay_timer').val() + "&client_pay_timer_pixels=" + $('#client_pay_timer_pixels').val() + "&client_pay_timer_credits=" + $('#client_pay_timer_credits').val() + "&cms_language=" + $('#cms_language').val() + "&client_status=" + $('#client_status').val() + "&cms_announcement=" + $('#cms_announcement').val(),
			success: function(){
				$("#overlowManagerHotel").hide("slide", { direction: "left" }, 1000, function(){
					$(".overlowManagerIndex").fadeIn();
				});
				$(".loadingHotelSettings").hide();
				$(".disepearthisHotelSettings").show();
			}
		});
	}

});
</script>

<div class="overlowContainer nobackground" id="overlowManagerHotel">

	<div class="container scroll">
		
		<div class="top"></div>
		
		<div class="localOverlowTitleSettings"><b><ubuntu><?php echo $language['manager_menu_hotel_settings']; ?></ubuntu></b></div>
		
		<div id="onclickCloseManagerHotel" class="closeButton"></div>
		
		<div class="text" style="width: 740px;">
		
		<div class="loadingHotelSettings" style="display: none;"><img style="margin-left: 360px; margin-top:80px; margin-bottom: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></div>
		
		<div class="disepearthisHotelSettings">
		
			<div class="insideContainer">
			
				<div class="localOverlowTitleSecond"><ubuntu><?php echo $language['manager_hotel_settings_general']; ?></ubuntu></div>
				
				<br><br>
			
				<label><ubuntu><?php echo $language['manager_hotel_settings_general_hotelname']; ?></ubuntu></label>
				
				<br>
		
				<input type="text" name="cms_name" id="cms_name" value="<?php echo $core->CmsSetting('cms_name'); ?>">
				
				<label><ubuntu><?php echo $language['manager_hotel_settings_general_hotellink']; ?></ubuntu></label>
				
				<br>
		
				<input type="text" name="cms_url" id="cms_url" value="<?php echo $core->CmsSetting('cms_url'); ?>">
				
				<div style="width: 236px; float: left;">
				
					<label style="font-size: 15px;"><ubuntu><?php echo $language['manager_hotel_settings_general_maintenance']; ?></ubuntu></label>
					
					<br>
				
					<select id="cms_maintenance" name="cms_maintenance" class="select" style="width: 100%;">
				
                		<option></option>
						<option <?php if($core->CmsSetting('cms_maintenance') == '0'){ echo 'selected=selected'; } ?> value="0"><?php echo $language['no']; ?></option>
						<option <?php if($core->CmsSetting('cms_maintenance') == '1'){ echo 'selected=selected'; } ?> value="1"><?php echo $language['yes']; ?></option>
				
					</select>
				
				</div>
                
                <div style="width: 237px; float: left; margin-left: 8px">
				
					<label style="font-size: 15px;"><ubuntu><?php echo $language['manager_hotel_settings_client_status']; ?></ubuntu></label>
					
					<br>
				
					<select id="client_status" name="client_status" class="select" style="width: 100%;">
				
						<option <?php if($core->CmsSetting('client_status') == 'open'){ echo 'selected=selected'; } ?> value="open"><?php echo $language['manager_hotel_settings_client_open']; ?></option>
						<option <?php if($core->CmsSetting('client_status') == 'closed'){ echo 'selected=selected'; } ?> value="closed"><?php echo $language['manager_hotel_settings_client_closed']; ?></option>
				
					</select>
				
				</div>
				
				<div style="width: 236px; float: left; margin-left: 8px;">
				
					<label style="font-size: 15px;"><ubuntu><?php echo $language['manager_hotel_settings_general_language']; ?></ubuntu></label>
				
					<br>
				
					<select id="cms_language" name="cms_language" class="select" style="width: 100%;">
				
						<option <?php if($core->CmsSetting('cms_language') == 'nl'){ echo 'selected=selected'; } ?> value="nl">NL</option>
				
					</select>
				
				</div>
                
                <label><ubuntu><?php echo $language['manager_hotel_settings_general_hotel_cms_announcement']; ?></ubuntu></label>
				
				<br>
		
				<input type="text" name="cms_announcement" id="cms_announcement" value="<?php echo $core->CmsSetting('cms_announcement'); ?>">
				
			</div>
			
			<div class="insideContainer space">
			
				<div class="localOverlowTitleSecond"><ubuntu><?php echo $language['manager_hotel_settings_client']; ?></ubuntu></div>
				
				<br><br>
				
				<div style="width: 360px; float: left;">
			
					<label style="font-size: 15px;"><ubuntu><?php echo $language['manager_hotel_settings_client_port']; ?></ubuntu></label>
				
					<br>
		
					<input style="background-color: #FFFFFF;" type="text" name="client_port" id="client_port" value="<?php echo $core->CmsSetting('client_port'); ?>">
				
				</div>
				
				<div style="width: 360px; float: left; margin-left: 8px;">
				
					<label style="font-size: 15px;"><ubuntu><?php echo $language['manager_hotel_settings_client_mus']; ?></ubuntu></label>
				
					<br>
		
					<input style="background-color: #FFFFFF;" type="text" name="client_mus" id="client_mus" value="<?php echo $core->CmsSetting('client_mus'); ?>">
				
				</div>
				
				<label><ubuntu><?php echo $language['manager_hotel_settings_client_ip']; ?></ubuntu></label>
				
				<br>
				
				<input type="text" name="client_ip" id="client_ip" value="<?php echo $core->CmsSetting('client_ip'); ?>">
				
				<label><ubuntu><?php echo $language['manager_hotel_settings_client_variables']; ?></ubuntu></label>
				
				<br>
				
				<input type="text" name="client_variables" id="client_variables" value="<?php echo $core->CmsSetting('client_variables'); ?>">
				
				<label><ubuntu><?php echo $language['manager_hotel_settings_client_texts']; ?></ubuntu></label>
				
				<br>
				
				<input type="text" name="client_texts" id="client_texts" value="<?php echo $core->CmsSetting('client_texts'); ?>">
				
				<label><ubuntu><?php echo $language['manager_hotel_settings_client_swf']; ?></ubuntu></label>
				
				<br>
				
				<input type="text" name="client_swf" id="client_swf" value="<?php echo $core->CmsSetting('client_swf'); ?>">
				
				<label><ubuntu><?php echo $language['manager_hotel_settings_client_habbo_swf']; ?></ubuntu></label>
				
				<br>
				
				<input type="text" name="client_habbo_swf" id="client_habbo_swf" value="<?php echo $core->CmsSetting('client_habbo_swf'); ?>">
				
			</div>
			
			<!-- <div class="insideContainer space">
			
				<div class="localOverlowTitleSecond"><ubuntu><?php echo $language['manager_hotel_settings_general_client']; ?></ubuntu></div>
				
				<br><br>
				
				<label><ubuntu><?php echo $language['manager_hotel_settings_general_client_motd']; ?></ubuntu></label>
				
				<br>
				
				<input type="text" name="client_motd" id="client_motd" value="<?php echo $core->ServerSetting('motd'); ?>">
				
				<label><ubuntu><?php echo $language['manager_hotel_settings_general_client_pay_timer']; ?></ubuntu></label>
				
				<br>
				
				<input type="text" name="client_pay_timer" id="client_pay_timer" value="<?php echo $core->ServerSetting('timer'); ?>">
				
				<div style="width: 360px; float: left;">
			
					<label style="font-size: 15px;"><ubuntu><?php echo $language['manager_hotel_settings_general_client_pay_timer_pixels']; ?></ubuntu></label>
				
					<br>
		
					<input style="background-color: #FFFFFF;" type="text" name="client_pay_timer_pixels" id="client_pay_timer_pixels" value="<?php echo $core->ServerSetting('pixels'); ?>">
				
				</div>
				
				<div style="width: 360px; float: left; margin-left: 8px;">
				
					<label style="font-size: 15px;"><ubuntu><?php echo $language['manager_hotel_settings_general_client_pay_timer_credits']; ?></ubuntu></label>
				
					<br>
		
					<input style="background-color: #FFFFFF;" type="text" name="client_pay_timer_credits" id="client_pay_timer_credits" value="<?php echo $core->ServerSetting('credits'); ?>">
				
				</div>
				
			</div> -->
			
			<a class="overlowButton postItHotelSettings" style="text-shadow: none; margin-top: 20px; margin-left: 0px; float: right;">
										
				<b><u class="overlowButtonText" style="">
											
					<i><ubuntu><?php echo $language['submit']; ?></ubuntu></i>
											
				</u></b>
												
				<div></div>
											
			</a> 
				
		</div>
		
		</div>
		
		<div class="bottom"></div>
		
	</div>

</div>

<?php } ?>