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
    
	$("#onclickOpenManagerGive").click(function () {
		$("#overlowManagerGive").show("slide", { direction: "up" }, 1000);
		$(".overlowManagerIndex").fadeOut();
	});
	$("#onclickCloseManagerGive").click(function () {
		$("#overlowManagerGive").hide("slide", { direction: "down" }, 1000, function(){
			$(".overlowManagerIndex").fadeIn();
		});
	});
	
	// Pixels
	
	$('.managerGivePixels').click(function() {
		$('.managerGiveContainer').hide();
		$('.managerGivePixelsContainer').fadeIn();
	});
	
	$('#give_pixels_who').change(function(){		
		var who_pixels = $('#give_pixels_who').val();
		if(who_pixels == 'user'){
			$('#give_pixels_who_user').fadeIn();
		}else{
			$('#give_pixels_who_user').fadeOut();
		}
	});
	
	$('.managerGivePixelsPost').click(function() {
		managerGivePixels();
		$(".loadingGiveSettings").show();
		$(".disepearthisGiveSettings").hide();
	});
	
	function managerGivePixels() {
		var who = $('#give_pixels_who').val();
		var who_user = $('#give_pixels_who_user').val();
		var value = $('#give_pixels_value').val();
		$.post("<?php echo HOST; ?>/manager/give/pixels", { who: who, who_user: who_user, value: value }, function () {
			$("#overlowManagerGive").hide("slide", { direction: "left" }, 1000, function(){
				$(".overlowManagerIndex").fadeIn();
			});
			$(".loadingGiveSettings").hide();
			$(".disepearthisGiveSettings").show();
			$(".managerGivePixelsContainer").hide();
			$("#give_pixels_who_user").hide();
			$('#give_pixels_who').val('');
			$('#give_pixels_who_user').val('');
			$('#give_pixels_value').val('');
		});
	}
	
	// Credits
	
	$('.managerGiveCredits').click(function() {
		$('.managerGiveContainer').hide();
		$('.managerGiveCreditsContainer').fadeIn();
	});
	
	$('#give_credits_who').change(function(){		
		var who_credits = $('#give_credits_who').val();
		if(who_credits == 'user'){
			$('#give_credits_who_user').fadeIn();
		}else{
			$('#give_credits_who_user').fadeOut();
		}
	});
	
	$('.managerGiveCreditsPost').click(function() {
		managerGiveCredits();
		$(".loadingGiveSettings").show();
		$(".disepearthisGiveSettings").hide();
	});
	
	function managerGiveCredits() {
		var who = $('#give_credits_who').val();
		var who_user = $('#give_credits_who_user').val();
		var value = $('#give_credits_value').val();
		$.post("<?php echo HOST; ?>/manager/give/credits", { who: who, who_user: who_user, value: value }, function () {
			$("#overlowManagerGive").hide("slide", { direction: "left" }, 1000, function(){
				$(".overlowManagerIndex").fadeIn();
			});
			$(".loadingGiveSettings").hide();
			$(".disepearthisGiveSettings").show();
			$(".managerGiveCreditsContainer").hide();
			$("#give_credits_who_user").hide();
			$('#give_credits_who').val('');
			$('#give_credits_who_user').val('');
			$('#give_credits_value').val('');
		});
	}
	
	// Eventpoints
	
	$('.managerGiveEventpoints').click(function() {
		$('.managerGiveContainer').hide();
		$('.managerGiveEventpointsContainer').fadeIn();
	});
	
	$('#give_eventpoints_who').change(function(){		
		var who_eventpoints = $('#give_eventpoints_who').val();
		if(who_eventpoints == 'user'){
			$('#give_eventpoints_who_user').fadeIn();
		}else{
			$('#give_eventpoints_who_user').fadeOut();
		}
	});
	
	$('.managerGiveEventpointsPost').click(function() {
		managerGiveEventpoints();
		$(".loadingGiveSettings").show();
		$(".disepearthisGiveSettings").hide();
	});
	
	function managerGiveEventpoints() {
		var who = $('#give_eventpoints_who').val();
		var who_user = $('#give_eventpoints_who_user').val();
		var value = $('#give_eventpoints_value').val();
		$.post("<?php echo HOST; ?>/manager/give/eventpoints", { who: who, who_user: who_user, value: value }, function () {
			$("#overlowManagerGive").hide("slide", { direction: "left" }, 1000, function(){
				$(".overlowManagerIndex").fadeIn();
			});
			$(".loadingGiveSettings").hide();
			$(".disepearthisGiveSettings").show();
			$(".managerGiveEventpointsContainer").hide();
			$("#give_eventpoints_who_user").hide();
			$('#give_eventpoints_who').val('');
			$('#give_eventpoints_who_user').val('');
			$('#give_eventpoints_value').val('');
		});
	}
	
	// Belcredits
	
	$('.managerGiveBelcredits').click(function() {
		$('.managerGiveContainer').hide();
		$('.managerGiveBelcreditsContainer').fadeIn();
	});
	
	$('#give_belcredits_who').change(function(){		
		var who_belcredits = $('#give_belcredits_who').val();
		if(who_belcredits == 'user'){
			$('#give_belcredits_who_user').fadeIn();
		}else{
			$('#give_belcredits_who_user').fadeOut();
		}
	});
	
	$('.managerGiveBelcreditsPost').click(function() {
		managerGiveBelcredits();
		$(".loadingGiveSettings").show();
		$(".disepearthisGiveSettings").hide();
	});
	
	function managerGiveBelcredits() {
		var who = $('#give_belcredits_who').val();
		var who_user = $('#give_belcredits_who_user').val();
		var value = $('#give_belcredits_value').val();
		$.post("<?php echo HOST; ?>/manager/give/belcredits", { who: who, who_user: who_user, value: value }, function () {
			$("#overlowManagerGive").hide("slide", { direction: "left" }, 1000, function(){
				$(".overlowManagerIndex").fadeIn();
			});
			$(".loadingGiveSettings").hide();
			$(".disepearthisGiveSettings").show();
			$(".managerGiveBelcreditsContainer").hide();
			$("#give_belcredits_who_user").hide();
			$('#give_belcredits_who').val('');
			$('#give_belcredits_who_user').val('');
			$('#give_belcredits_value').val('');
		});
	}

});
</script>

<?php 
$queryAutoCompleteUserGive = mysql_query("SELECT * FROM users ORDER BY username DESC LIMIT 100000");
?>

<script>
$(document).ready(function() {

$("input.managerGiveAutoInputUser").autocomplete({
	source: [<?php while($autoCompleteUserGive = mysql_fetch_array($queryAutoCompleteUserGive)){ ?> "<?php echo $autoCompleteUserGive['username']; ?>",<?php } ?>]
});

});
</script>

<div class="overlowContainer nobackground" id="overlowManagerGive">

	<div class="container scroll">
		
		<div class="top"></div>
		
		<div class="localOverlowTitleSettings"><b><ubuntu><?php echo $language['manager_menu_give']; ?></ubuntu></b></div>
		
		<div id="onclickCloseManagerGive" class="closeButton"></div>
		
		<div class="text" style="width: 740px;">
		
		<div class="loadingGiveSettings" style="display: none;"><img style="margin-left: 360px; margin-top:80px; margin-bottom: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></div>
		
		<div class="disepearthisGiveSettings">
        
        	<div class="insideContainer managerGiveContainer managerGivePixelsContainer" style="display: none;">
            
            	<div class="localOverlowTitleSecond"><ubuntu><?php echo $language['manager_give_pixels']; ?></ubuntu></div>
				
				<br><br>

				<label><ubuntu><?php echo $language['manager_give_to_who']; ?></ubuntu></label>
				
				<br>
				
				<select class="select" name="give_pixels_who" style="background-color: #FFFFFF; width: 100%;" id="give_pixels_who">
					
					<option value="everyone"><?php echo $language['manager_give_everyone']; ?></option>
                    <option value="vips"><?php echo $language['manager_give_vips']; ?></option>
                    <option value="user_online"><?php echo $language['manager_give_user_online']; ?></option>
                    <option value="user"><?php echo $language['manager_give_user']; ?></option>
				
				</select>
                
                <input type="text" style="display: none; margin-top: 10px;" name="give_pixels_who_user" class="managerGiveAutoInputUser" id="give_pixels_who_user" value="" placeholder="<?php echo $language['index_mail']; ?>">
				
				<label><ubuntu><?php echo $language['manager_give_how_much']; ?></ubuntu></label>
				
				<br>
				
				<input type="text" name="give_pixels_value" id="give_pixels_value" value="">
				
				<a class="overlowButton managerGivePixelsPost" style="text-shadow: none; margin-top: 10px; margin-left: 0px; float: right;">
										
					<b><u class="overlowButtonText" style="">
															
						<i><ubuntu><?php echo $language['submit']; ?></ubuntu></i>
															
					</u></b>
																
					<div></div>
															
				</a> 
				
			</div>
            
            <div class="insideContainer managerGiveContainer managerGiveCreditsContainer" style="display: none;">
            
            	<div class="localOverlowTitleSecond"><ubuntu><?php echo $language['manager_give_credits']; ?></ubuntu></div>
				
				<br><br>

				<label><ubuntu><?php echo $language['manager_give_to_who']; ?></ubuntu></label>
				
				<br>
				
				<select class="select" name="give_credits_who" style="background-color: #FFFFFF; width: 100%;" id="give_credits_who">
					
					<option value="everyone"><?php echo $language['manager_give_everyone']; ?></option>
                    <option value="vips"><?php echo $language['manager_give_vips']; ?></option>
                    <option value="user_online"><?php echo $language['manager_give_user_online']; ?></option>
                    <option value="user"><?php echo $language['manager_give_user']; ?></option>
				
				</select>
                
                <input type="text" style="display: none; margin-top: 10px;" name="give_credits_who_user" class="managerGiveAutoInputUser" id="give_credits_who_user" value="" placeholder="<?php echo $language['index_mail']; ?>">
				
				<label><ubuntu><?php echo $language['manager_give_how_much']; ?></ubuntu></label>
				
				<br>
				
				<input type="text" name="give_credits_value" id="give_credits_value" value="">
                
                <a class="overlowButton managerGiveCreditsPost" style="text-shadow: none; margin-top: 10px; margin-left: 0px; float: right;">
										
					<b><u class="overlowButtonText" style="">
															
						<i><ubuntu><?php echo $language['submit']; ?></ubuntu></i>
															
					</u></b>
																
					<div></div>
															
				</a> 
				
			</div>
            
            <div class="insideContainer managerGiveContainer managerGiveEventpointsContainer" style="display: none;">
            
            	<div class="localOverlowTitleSecond"><ubuntu><?php echo $language['manager_give_eventpoints']; ?></ubuntu></div>
				
				<br><br>

				<label><ubuntu><?php echo $language['manager_give_to_who']; ?></ubuntu></label>
				
				<br>
				
				<select class="select" name="give_eventpoints_who" style="background-color: #FFFFFF; width: 100%;" id="give_eventpoints_who">
					
					<option value="everyone"><?php echo $language['manager_give_everyone']; ?></option>
                    <option value="vips"><?php echo $language['manager_give_vips']; ?></option>
                    <option value="user_online"><?php echo $language['manager_give_user_online']; ?></option>
                    <option value="user"><?php echo $language['manager_give_user']; ?></option>
				
				</select>
                
                <input type="text" style="display: none; margin-top: 10px;" name="give_eventpoints_who_user" class="managerGiveAutoInputUser" id="give_eventpoints_who_user" value="" placeholder="<?php echo $language['index_mail']; ?>">
				
				<label><ubuntu><?php echo $language['manager_give_how_much']; ?></ubuntu></label>
				
				<br>
				
				<input type="text" name="give_eventpoints_value" id="give_eventpoints_value" value="">
                
                <a class="overlowButton managerGiveEventpointsPost" style="text-shadow: none; margin-top: 10px; margin-left: 0px; float: right;">
										
					<b><u class="overlowButtonText" style="">
															
						<i><ubuntu><?php echo $language['submit']; ?></ubuntu></i>
															
					</u></b>
																
					<div></div>
															
				</a> 
				
			</div>
            
            <div class="insideContainer managerGiveContainer managerGiveBelcreditsContainer" style="display: none;">
            
            	<div class="localOverlowTitleSecond"><ubuntu><?php echo $language['manager_give_belcredits']; ?></ubuntu></div>
				
				<br><br>

				<label><ubuntu><?php echo $language['manager_give_to_who']; ?></ubuntu></label>
				
				<br>
				
				<select class="select" name="give_belcredits_who" style="background-color: #FFFFFF; width: 100%;" id="give_belcredits_who">
					
					<option value="everyone"><?php echo $language['manager_give_everyone']; ?></option>
                    <option value="vips"><?php echo $language['manager_give_vips']; ?></option>
                    <option value="user_online"><?php echo $language['manager_give_user_online']; ?></option>
                    <option value="user"><?php echo $language['manager_give_user']; ?></option>
				
				</select>
                
                <input type="text" style="display: none; margin-top: 10px;" name="give_belcredits_who_user" class="managerGiveAutoInputUser" id="give_belcredits_who_user" value="" placeholder="<?php echo $language['index_mail']; ?>">
				
				<label><ubuntu><?php echo $language['manager_give_how_much']; ?></ubuntu></label>
				
				<br>
				
				<input type="text" name="give_belcredits_value" id="give_belcredits_value" value="">
                
                <a class="overlowButton managerGiveBelcreditsPost" style="text-shadow: none; margin-top: 10px; margin-left: 0px; float: right;">
										
					<b><u class="overlowButtonText" style="">
															
						<i><ubuntu><?php echo $language['submit']; ?></ubuntu></i>
															
					</u></b>
																
					<div></div>
															
				</a> 
				
			</div>
        
        	<div class="insideContainer space">
				
				<a class="overlowButton managerGivePixels" style="text-shadow: none; margin-top: 0px; margin-left: 10px; float: right;">
										
					<b><u class="overlowButtonText" style="">
															
						<i><ubuntu><?php echo $language['manager_give_pixels']; ?></ubuntu></i>
															
					</u></b>
																
					<div></div>
															
				</a> 
				
				<a class="overlowButton managerGiveCredits" style="text-shadow: none; margin-top: 0px; margin-left: 10px; float: right;">
										
					<b><u class="overlowButtonText" style="">
															
						<i><ubuntu><?php echo $language['manager_give_credits']; ?></ubuntu></i>
															
					</u></b>
																
					<div></div>
															
				</a>
				
				<a class="overlowButton managerGiveBelcredits" style="text-shadow: none; margin-top: 0px; margin-left: 10px; float: right;">
										
					<b><u class="overlowButtonText" style="">
															
						<i><ubuntu><?php echo $language['manager_give_belcredits']; ?></ubuntu></i>
															
					</u></b>
																
					<div></div>
															
				</a> 
				
				<a class="overlowButton managerGiveEventpoints" style="text-shadow: none; margin-top: 0px; margin-left: 0px; float: right;">
										
					<b><u class="overlowButtonText" style="">
															
						<i><ubuntu><?php echo $language['manager_give_eventpoints']; ?></ubuntu></i>
															
					</u></b>
																
					<div></div>
															
				</a> 
            
            </div>
				
		</div>
		
		</div>
		
		<div class="bottom"></div>
		
	</div>

</div>

<?php } ?>