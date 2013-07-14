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
    
	$("#onclickOpenProfile").click(function () {
		$("#overlowProfile").fadeIn("slow");
	});
	$("#onclickCloseProfile").click(function () {
		$("#overlowProfile").fadeOut("slow");
	});

});
</script>

<div class="overlowContainer" id="overlowProfile">

	<div class="container">
	
		<div class="profileLeftB">
		
			<div class="left"></div>
		
			<div class="containerText">
			
				<a id="onclickCloseProfile" class="overlowButton" style="float: right; margin-bottom: 5px; margin-right: 0px;">
				
					<b><u>
						
						<div class="overlowIcon closeDown"></div> 
							
					</u></b>
					
					<div></div>
					
				</a>
				
				<div class="topLine">
				
					<div class="line" style="width:100%;float: right;"></div>
					
					<div id="lineSpacer">
				
						<div class="line" style="width: 5px;"></div>
						
						<?php
						$query_friends = mysql_query("SELECT * FROM messenger_friendships WHERE sender = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."'");
						$friends = mysql_num_rows($query_friends);
						?>
					
						<div class="title"><ubuntu><?php echo $language['profile_friends']; ?> (<?php echo $friends; ?>)</ubuntu><div></div></div>
					
						<div class="line" style="width: 54px;"></div>
					
						<div class="title"><ubuntu><?php echo $language['profile_information']; ?></ubuntu><div></div></div>
					
					</div>
					
				</div>
				
				<div class="right">
					
					<div class="usernameTitle">
						
						
                        <b><ubuntu><?php echo $core->ExploitRetainer($users->UserInfo($username, 'username')); ?>'s</ubuntu></b>
					
						 <ubuntu><?php echo $language['profile_user_info']; ?></ubuntu>
						
					</div>
					
					<div class="infoText" style="margin-bottom: -40px;">
					
						<div class="field"><ubuntu><b><?php echo $language['profile_user_info_last_login']; ?></b>: <?php echo $core->timeAgo($core->ExploitRetainer($users->UserInfo($username, 'last_online'))); ?></ubuntu></div>
						
						<div class="field space"><ubuntu><b><?php echo $language['profile_user_info_made_on']; ?></b>: <?php echo $core->timeAgo($core->ExploitRetainer($users->UserInfo($username, 'account_created'))); ?></ubuntu></div>
												
						<div class="field"><ubuntu><b><?php echo $language['profile_user_info_rank']; ?></b>: <?php echo stripslashes($core->ExploitRetainer($users->Rank($users->UserInfo($username, 'rank')))); ?></ubuntu></div>
						
						<div class="field space"><ubuntu><b><?php echo $language['profile_user_info_real_name']; ?></b>: <?php echo $core->ExploitRetainer($users->UserInfo($username, 'real_name')); ?></ubuntu></div>
					
					</div>
					
					<div class="topLine">
				
						<div class="line" style="width:100%;float: right;"></div>
					
						<div id="lineSpacer">
					
							<div class="title" style="font-size: 9px;"><ubuntu><?php echo $language['profile_badges']; ?></ubuntu><div></div></div>
					
						</div>
					
					</div>
                    
                    	<marquee>
                        
                        <?php 
						$query_badge = mysql_query("SELECT * FROM user_badges WHERE user_id = ".$core->ExploitRetainer($users->UserInfo($username, 'id'))."");
						while($badge = mysql_fetch_array($query_badge)){
						?>
                            
                            <!-- <div class="<?php echo $badge['badge_id']; ?>_quickprofile" style="float: left; background: url(<?php echo $badge_url; ?><?php echo $badge['badge_id']; ?>.gif) no-repeat; width: 50px; height: 50px;"></div> -->
                            
                            <img src="<?php echo $badge_url; ?><?php echo $badge['badge_id']; ?>.gif">
                        
                        <?php } ?>
                        
                        </marquee>
						
				</div>
				
			</div>
		
		</div>
		
		<div class="top"></div>
		
		<div class="text profile">
		
			<div id="overlowProfileTitle">
			
				<div style="float: right;">
				
					<div id="coins">
                        
						<div id="text"><ubuntu><?php echo $core->ExploitRetainer($users->UserInfo($username, 'credits')); ?></ubuntu></div><img align="right" style="margin-bottom:-4px;margin-left: 4px;" src="<?php echo HOST; ?>/web-gallery/icons/coin.png" />

					</div>

					<div id="pixels">
                        
						<div id="text"><ubuntu><?php echo $core->ExploitRetainer($users->UserInfo($username, 'activity_points')); ?></ubuntu></div><img align="right" style="margin-bottom:-4px;margin-left: 4px;" src="<?php echo HOST; ?>/web-gallery/icons/pixel.png" />

					</div>
					
				</div>
			
				<div id="motto">
				
					<b><u>
						
						<ubuntu><?php echo htmlspecialchars_decode($core->ExploitRetainer($users->UserInfo($username, 'motto'))); ?></ubuntu>
							
					</u></b>
					
					<div></div>
					
				</div>
	
				<img style="float: left;" src="<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?><?php echo $core->ExploitRetainer($core->avatar($users->UserInfo($username, 'avatar_state'))); ?>">
				
				<div style="float: left;">
				
					<div id="nameIs"><ubuntu><?php echo $language['profile_my_name_is']; ?></ubuntu></div>
				
					<div id="name"><ubuntu><?php echo $core->ExploitRetainer($users->UserInfo($username, 'username')); ?></ubuntu></div>
					
				</div>
		
			</div>
			
		</div>
		
		<div class="bottom"></div>
		
	</div>

</div>