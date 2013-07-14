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
    
	$("#onclickOpenManagerPoll").click(function () {
		$("#overlowManagerPoll").show("slide", { direction: "up" }, 1000);
		$(".overlowManagerIndex").fadeOut();
	});
	$("#onclickCloseManagerPoll").click(function () {
		$("#overlowManagerPoll").hide("slide", { direction: "down" }, 1000, function(){
			$(".overlowManagerIndex").fadeIn();
		});
	});
	
	$('.postItPollSettingsWithReset').click(function() { 
		SubmitFormPollWithReset();
		$(".loadingPollSettings").show();
		$(".disepearthisPollSettings").hide();
	});
	
	function SubmitFormPollWithReset() {
		$.ajax({
			type: "POST",
			url: "<?php echo HOST; ?>/manager/poll/update/withReset",
			data: "question=" + $('#pollQuestion').val() + "&answerOne=" + $('#pollAnswerOne').val() + "&answerTwo=" + $('#pollAnswerTwo').val(),
			success: function(){
				$("#overlowManagerPoll").hide("slide", { direction: "left" }, 1000, function(){
					$(".overlowManagerIndex").fadeIn();
				});
				$(".loadingPollSettings").hide();
				$(".disepearthisPollSettings").show();
			}
		});
	}
	
	$('.postItPollSettingsWithoutReset').click(function() { 
		SubmitFormPollWithoutReset();
		$(".loadingPollSettings").show();
		$(".disepearthisPollSettings").hide();
	});
	
	function SubmitFormPollWithoutReset() {
		$.ajax({
			type: "POST",
			url: "<?php echo HOST; ?>/manager/poll/update/withoutReset",
			data: "question=" + $('#pollQuestion').val() + "&answerOne=" + $('#pollAnswerOne').val() + "&answerTwo=" + $('#pollAnswerTwo').val(),
			success: function(){
				$("#overlowManagerPoll").hide("slide", { direction: "left" }, 1000, function(){
					$(".overlowManagerIndex").fadeIn();
				});
				$(".loadingPollSettings").hide();
				$(".disepearthisPollSettings").show();
			}
		});
	}

});
</script>

<div class="overlowContainer nobackground" id="overlowManagerPoll">

	<div class="container scroll">
		
		<div class="top"></div>
		
		<div class="localOverlowTitleSettings"><b><ubuntu><?php echo $language['manager_menu_poll_settings']; ?></ubuntu></b></div>
		
		<div id="onclickCloseManagerPoll" class="closeButton"></div>
		
		<div class="text" style="width: 740px;">
		
			<div class="loadingPollSettings" style="display: none;"><img style="margin-left: 360px; margin-top:80px; margin-bottom: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></div>
		
			<div class="disepearthisPollSettings">
		
				<div class="insideContainer">
			
					<label><ubuntu><?php echo $language['manager_poll_settings_question']; ?></ubuntu></label>
				
					<br>
		
					<input type="text" name="pollQuestion" id="pollQuestion" value="<?php echo $core->Poll('question'); ?>">
				
				</div>
			
				<div class="insideContainer space">
			
					<label><ubuntu><?php echo $language['manager_poll_settings_answerOne']; ?></ubuntu></label>
				
					<br>
		
					<input type="text" name="pollAnswerOne" id="pollAnswerOne" value="<?php echo $core->Poll('answerOne'); ?>">
				
					<label><ubuntu><?php echo $language['manager_poll_settings_answerTwo']; ?></ubuntu></label>
				
					<br>
		
					<input type="text" name="pollAnswerTwo" id="pollAnswerTwo" value="<?php echo $core->Poll('answerTwo'); ?>">
				
				</div>

				<a class="overlowButton postItPollSettingsWithReset" style="text-shadow: none; margin-top: 20px; margin-left: 20px; float: right;">
														
					<b><u class="overlowButtonText" style="">
															
						<i><ubuntu><?php echo $language['manager_poll_settings_submit_with_reset']; ?></ubuntu></i>
															
					</u></b>
																
					<div></div>
															
				</a> 
				
				<a class="overlowButton postItPollSettingsWithoutReset" style="text-shadow: none; margin-top: 20px; margin-left: 0px; float: right;">
										
					<b><u class="overlowButtonText" style="">
															
						<i><ubuntu><?php echo $language['manager_poll_settings_submit_without_reset']; ?></ubuntu></i>
															
					</u></b>
																
					<div></div>
															
				</a> 
				
			</div>
		
		</div>
		
		<div class="bottom"></div>
		
	</div>

</div>

<?php } ?>