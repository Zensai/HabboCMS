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
    
	$("#onclickOpenManagerAlert").click(function () {
		$("#overlowManagerAlert").show("slide", { direction: "up" }, 1000);
		$(".overlowManagerIndex").fadeOut();
	});
	$("#onclickCloseManagerAlert").click(function () {
		if($('.handleManagerAlertContainer').is(":visible")){
			
			$('.handleManagerAlertContainer').fadeOut(function(){
				$('.choosHandleManagerAlertContainer').animate({
					marginLeft: '225px'
				},function(){
					$("#overlowManagerAlert").hide("slide", { direction: "down" }, 1000, function(){
						$(".overlowManagerIndex").fadeIn();
					});
				});
			});
			
		}else{
		
			$("#overlowManagerAlert").hide("slide", { direction: "down" }, 1000, function(){
				$(".overlowManagerIndex").fadeIn();
			});
			
		} 
	});
	
	$('#onclickCloseManagerAlertHandeContainer').click(function(){
		$('.handleManagerAlertContainer').fadeOut(function(){
			$('.choosHandleManagerAlertContainer').animate({
				marginLeft: '225px'
			});
		});
	});
	
	// Site
	
	$('.managerAlertCms').click(function() {
		$('.managerAlertCont').hide();
		$('.manageAlertCmsCont').show();
		$('.choosHandleManagerAlertContainer').animate({
			marginLeft: '0px'
		}, function(){
			$('.handleManagerAlertContainer').fadeIn();
		});
	});
	
	$('#cms_alert_who').change(function(){		
		var who_pixels = $('#cms_alert_who').val();
		if(who_pixels == 'user'){
			$('#cms_alert_who_user').fadeIn();
		}else{
			$('#cms_alert_who_user').fadeOut();
		}
	});
	
	$('.managerAlertCmsPost').click(function() {
		managerAlertCms();
		$(".loadingAlertSettings").show();
		$(".disepearthisAlertSettings").hide();
	});
	
	function managerAlertCms() {
		$('.handleManagerAlertContainer').fadeOut(function(){
			$('.choosHandleManagerAlertContainer').animate({
				marginLeft: '225px'
			}, function(){
				$("#overlowManagerAlert").hide("slide", { direction: "left" }, 1000, function(){
					$(".overlowManagerIndex").fadeIn();
				});
			});
		});
		var who = $('#cms_alert_who').val();
		var who_user = $('#cms_alert_who_user').val();
		var message = $('#cms_alert_message').val();
		$.post("<?php echo HOST; ?>/manager/alert/cms", { who: who, who_user: who_user, message: message }, function () {
			$(".loadingAlertSettings").hide();
			$(".disepearthisAlertSettings").show();
			$(".manageAlertCmsCont").hide();
			$("#cms_alert_who_user").hide();
			$('#cms_alert_who').val('');
			$('#cms_alert_who_user').val('');
			$('#cms_alert_message').val('');
		});
	}
	
	// Hotel
	
	$('.managerAlertHotel').click(function() {
		$('.managerAlertCont').hide();
		$('.manageAlertHotelCont').show();
		$('.choosHandleManagerAlertContainer').animate({
			marginLeft: '0px'
		}, function(){
			$('.handleManagerAlertContainer').fadeIn();
		});
	});
	
	$('#hotel_alert_who').change(function(){		
		var who_pixels = $('#hotel_alert_who').val();
		if(who_pixels == 'user'){
			$('#hotel_alert_who_user').fadeIn();
		}else{
			$('#hotel_alert_who_user').fadeOut();
		}
	});
	
	$('.managerAlertHotelPost').click(function() {
		managerAlertHotel();
		$(".loadingAlertSettings").show();
		$(".disepearthisAlertSettings").hide();
	});
	
	function managerAlertHotel() {
		$('.handleManagerAlertContainer').fadeOut(function(){
			$('.choosHandleManagerAlertContainer').animate({
				marginLeft: '225px'
			}, function(){
				$("#overlowManagerAlert").hide("slide", { direction: "left" }, 1000, function(){
					$(".overlowManagerIndex").fadeIn();
				});
			});
		});
		var who = $('#hotel_alert_who').val();
		var who_user = $('#hotel_alert_who_user').val();
		var message = $('#hotel_alert_message').val();
		$.post("<?php echo HOST; ?>/manager/alert/hotel", { who: who, who_user: who_user, message: message }, function () {
			$(".loadingAlertSettings").hide();
			$(".disepearthisAlertSettings").show();
			$(".manageAlerthotelCont").hide();
			$("#hotel_alert_who_user").hide();
			$('#hotel_alert_who').val('');
			$('#hotel_alert_who_user').val('');
			$('#hotel_alert_message').val('');
		});
	}

});
</script>

<?php 
$queryAutoCompleteUserAlert = mysql_query("SELECT * FROM users ORDER BY username DESC LIMIT 100000");
?>

<script>
$(document).ready(function() {

$("input.managerAlertAutoInputUser").autocomplete({
	source: [<?php while($autoCompleteUserAlert = mysql_fetch_array($queryAutoCompleteUserAlert)){ ?> "<?php echo $autoCompleteUserAlert['username']; ?>",<?php } ?>]
});

});
</script>

<div class="overlowContainer nobackground" id="overlowManagerAlert">

	<div style="width: 930px; margin: auto; display: table;">

	<div class="container scroll choosHandleManagerAlertContainer" style="width: 450px; float: left; margin-left: 225px;">
		
		<div class="top"></div>
		
		<div class="localOverlowTitleSettings"><b><ubuntu><?php echo $language['manager_menu_alert']; ?></ubuntu></b></div>
		
		<div id="onclickCloseManagerAlert" class="closeButton"></div>
		
		<div class="text" style="width: 390px;">
		
		<div class="loadingAlertSettings" style="display: none;"><center><img style="margin-top:80px; margin-bottom: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></center></div>
		
		<div class="disepearthisAlertSettings">
            
            <div class="insideContainer">
				
				<a class="overlowButton managerAlertCms" style="text-shadow: none; margin-top: 0px; margin-left: 0px; float: right;">
										
					<b><u class="overlowButtonText" style="">
															
						<i><ubuntu><?php echo $language['manager_alert_on_cms']; ?></ubuntu></i>
															
					</u></b>
																
					<div></div>
															
				</a> 
				
				<a class="overlowButton managerAlertHotel" style="text-shadow: none; margin-top: 10px; margin-left: 0px; float: right;">
														
					<b><u class="overlowButtonText" style="">
															
						<i><ubuntu><?php echo $language['manager_alert_in_hotel']; ?></ubuntu></i>
															
					</u></b>
																
					<div></div>
															
				</a> 
            
            </div>
				
		</div>
		
		</div>
		
		<div class="bottom"></div>
		
	</div>
    
    <div class="container scroll handleManagerAlertContainer" style="width: 450px; float: right; margin-left: 20px; display: none;">
		
		<div class="top"></div>
		
		<div class="localOverlowTitleSettings"><b><ubuntu><?php echo $language['manager_menu_alert']; ?></ubuntu></b></div>
		
		<div id="onclickCloseManagerAlertHandeContainer" class="closeButton"></div>
		
		<div class="text" style="width: 390px;">
		
		<div class="loadingAlertSettings" style="display: none;"><center><img style="margin-top:80px; margin-bottom: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></center></div>
		
		<div class="disepearthisAlertSettings">
        
        	<div class="insideContainer manageAlertCmsCont managerAlertCont" style="display: none;">
            
            	<div class="localOverlowTitleSecond"><ubuntu><?php echo $language['manager_alert_cms']; ?></ubuntu></div>
				
				<br><br>

				<label><ubuntu><?php echo $language['manager_alert_to_who']; ?></ubuntu></label>
				
				<br>
				
				<select class="select" name="cms_alert_who" style="background-color: #FFFFFF; width: 100%;" id="cms_alert_who">
					
					<option value="everyone"><?php echo $language['manager_give_everyone']; ?></option>
                    <option value="vips"><?php echo $language['manager_give_vips']; ?></option>
                    <option value="user_online"><?php echo $language['manager_give_user_online']; ?></option>
                    <option value="user"><?php echo $language['manager_give_user']; ?></option>
				
				</select>
                
                <input type="text" style="display: none; margin-top: 10px;" name="cms_alert_who_user" class="managerGiveAutoInputUser" id="cms_alert_who_user" value="" placeholder="<?php echo $language['index_mail']; ?>">
				
				<label><ubuntu><?php echo $language['manager_alert_message']; ?></ubuntu></label>
				
				<br>
				
				<input type="text" name="cms_alert_message" id="cms_alert_message" value="">
				
				<a class="overlowButton managerAlertCmsPost" style="text-shadow: none; margin-top: 10px; margin-left: 0px; float: right;">
										
					<b><u class="overlowButtonText" style="">
															
						<i><ubuntu><?php echo $language['submit']; ?></ubuntu></i>
															
					</u></b>
																
					<div></div>
															
				</a> 
				
			</div>
            
            <div class="insideContainer manageAlertHotelCont managerAlertCont" style="display: none;">
            
            	<div class="localOverlowTitleSecond"><ubuntu><?php echo $language['manager_alert_hotel']; ?></ubuntu></div>
				
				<br><br>

				<label><ubuntu><?php echo $language['manager_alert_to_who']; ?></ubuntu></label>
				
				<br>
				
				<select class="select" name="hotel_alert_who" style="background-color: #FFFFFF; width: 100%;" id="hotel_alert_who">
					
					<option value="everyone"><?php echo $language['manager_alert_hotel_everyone']; ?></option>
                    <option value="user"><?php echo $language['manager_alert_hotel_user']; ?></option>
				
				</select>
                
                <input type="text" style="display: none; margin-top: 10px;" name="hotel_alert_who_user" class="managerGiveAutoInputUser" id="hotel_alert_who_user" value="" placeholder="<?php echo $language['index_mail']; ?>">
				
				<label><ubuntu><?php echo $language['manager_alert_message']; ?></ubuntu></label>
				
				<br>
				
				<input type="text" name="hotel_alert_message" id="hotel_alert_message" value="">
				
				<a class="overlowButton managerAlerthotelPost" style="text-shadow: none; margin-top: 10px; margin-left: 0px; float: right;">
										
					<b><u class="overlowButtonText" style="">
															
						<i><ubuntu><?php echo $language['submit']; ?></ubuntu></i>
															
					</u></b>
																
					<div></div>
															
				</a> 
				
			</div>
				
		</div>
		
		</div>
		
		<div class="bottom"></div>
		
	</div>
    
    </div>

</div>

<?php } ?>