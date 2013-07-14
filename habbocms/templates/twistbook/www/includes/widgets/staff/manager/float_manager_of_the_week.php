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

<?php if($users->UserPermission('cms_manager_of_the_week', $username)){ ?>

<script>
$(document).ready(function() {
    
	$("#onclickOpenManagerOfTHeWeek").click(function () {
		$("#overlowManagerOfTHeWeek").show("slide", { direction: "up" }, 1000);
		$(".overlowManagerIndex").fadeOut();
	});
	$("#onclickCloseManagerOfTHeWeek").click(function () {
		$("#overlowManagerOfTHeWeek").hide("slide", { direction: "down" }, 1000, function(){
			$(".overlowManagerIndex").fadeIn();
		});
	});
	
	$('.postItOfTHeWeekSettings').click(function() { 
		SubmitFormOfTheWeek();
		$(".loadingOfTHeWeekSettings").show();
		$(".disepearthisOfTHeWeekSettings").hide();
	});
	
	function SubmitFormOfTheWeek() {
		$.ajax({
			type: "POST",
			url: "<?php echo HOST; ?>/manager/ofTheWeek/update",
			data: "music_of_the_week=" + $('#music_of_the_week').val() + "&video_of_the_week=" + $('#video_of_the_week').val(),
			success: function(){
				$("#overlowManagerOfTHeWeek").hide("slide", { direction: "left" }, 1000, function(){
					$(".overlowManagerIndex").fadeIn();
				});
				$(".loadingOfTheWeekSettings").hide();
				$(".disepearthisOfTheWeekSettings").show();
			}
		});
	}

});
</script>

<div class="overlowContainer nobackground" id="overlowManagerOfTHeWeek">

	<div class="container scroll">
		
		<div class="top"></div>
		
		<div class="localOverlowTitleSettings"><b><ubuntu><?php echo $language['manager_menu_of_the_week_settings']; ?></ubuntu></b></div>
		
		<div id="onclickCloseManagerOfTHeWeek" class="closeButton"></div>
		
		<div class="text" style="width: 740px;">
		
		<div class="loadingOfTHeWeekSettings" style="display: none;"><img style="margin-left: 360px; margin-top:80px; margin-bottom: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></div>
		
		<div class="disepearthisOfTHeWeekSettings">
		
			<div class="insideContainer">
			
				<div class="localOverlowTitleSecond"><ubuntu><?php echo $language['manager_of_the_week_settings_music']; ?></ubuntu></div>
				
				<br><br>
				
				<label><ubuntu><?php echo $language['manager_of_the_week_settings_youtube_link']; ?></ubuntu></label>
				
				<br>
		
				<input type="text" name="music_of_the_week" id="music_of_the_week" value="<?php echo $core->CmsSetting('music_of_the_week'); ?>">
				
			</div>
            
            <div class="insideContainer space">
			
				<div class="localOverlowTitleSecond"><ubuntu><?php echo $language['manager_of_the_week_settings_video']; ?></ubuntu></div>
				
				<br><br>
				
				<label><ubuntu><?php echo $language['manager_of_the_week_settings_youtube_link']; ?></ubuntu></label>
				
				<br>
		
				<input type="text" name="video_of_the_week" id="video_of_the_week" value="<?php echo $core->CmsSetting('video_of_the_week'); ?>">
				
			</div>
			
			<a class="overlowButton postItOfTheWeekSettings" style="text-shadow: none; margin-top: 20px; margin-left: 0px; float: right;">
										
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