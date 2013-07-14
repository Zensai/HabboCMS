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

<script>
$(document).ready(function() {

	$("#onclickCloseWelcome").click(function () {
		$("#overlowWelcome").fadeOut("slow");
	});
	$("#onclickOpenProfileWelcome").click(function () {
		$("#overlowLookAround").fadeIn("slow");
	});

});
</script>

<?php
$query_validateWelcome = mysql_query("UPDATE users SET welcome_message = '0' WHERE id = ".$core->ExploitRetainer($users->UserInfo($username, 'id')).""); 

?>

<div class="overlowContainer" id="overlowWelcome" style="display: block;">

	<div class="container" style="width: 340px;">
		
		<div class="top"></div>
		
		<a id="onclickOpenProfileWelcome"><div id="onclickCloseWelcome" class="closeButton"></div></a>
		
		<div class="text">
		
			<div id="frankAvatar"></div>
			
			<div class="frankBubble" style="margin-left: 10px;">

				<div class="frankBubbleArrowWhite"></div>
					
				<div class="frankBubbleText">
					
					<?php echo $language['frank_welcome_message']; ?>
						
				</div>
					
			</div>
			
			<div id="welcomeContainer">
			
				<img src="<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&direction=3&head_direction=3&gesture=srp">
			
			</div>
			
			<div id="welcomeTitleName">
			
				<?php echo $core->ExploitRetainer($users->UserInfo($username, 'username')); ?>
				
			</div>
			
		</div>
		
		<div class="bottom"></div>
		
	</div>

</div>