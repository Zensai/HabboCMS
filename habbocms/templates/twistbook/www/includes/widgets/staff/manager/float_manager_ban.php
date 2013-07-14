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

<?php if($users->UserPermission('cms_manager_ban', $username)){ ?>

<script>
$(document).ready(function() {
    
	$("#onclickOpenManagerBan").click(function () {
		$("#overlowManagerBan").show("slide", { direction: "up" }, 1000);
		$(".overlowManagerIndex").fadeOut();
	});
	$("#onclickCloseManagerBan").click(function () {
		$("#overlowManagerBan").hide("slide", { direction: "down" }, 1000, function(){
			$(".overlowManagerIndex").fadeIn();
		});
	});
	
	$('.submitBanIP').click(function() { 
		SubmitBanIP();
		$(".loadingBanSettings").show();
		$(".disepearthisBanSettings").hide();
	});
	
	function SubmitBanIP() {
		$.ajax({
			type: "POST",
			url: "<?php echo HOST; ?>/manager/ban/add",
			data: "value=" + $('#manager_ban_value_ip').val() + "&reason=" + $('#manager_ban_reason_ip').val() + "&length=" + $('#manager_ban_length_ip').val() + "&type=" + $('#manager_ban_type_ip').val(),
			success: function(){
				$(".loadingBanSettings").hide();
				$('.banIP').hide();
				$('.banGlobals').load('<?php echo HOST; ?>/manager/ban/global');
				$("#manager_ban_value_ip").val("");
				$("#manager_ban_reason_ip").val("");
				$(".disepearthisBanSettings").show();
			}
		});
	}
	
	$('.submitBanUser').click(function() { 
		SubmitBanUser();
		$(".loadingBanSettings").show();
		$(".disepearthisBanSettings").hide();
	});
	
	function SubmitBanUser() {
		$.ajax({
			type: "POST",
			url: "<?php echo HOST; ?>/manager/ban/add",
			data: "value=" + $('#manager_ban_value_user').val() + "&reason=" + $('#manager_ban_reason_user').val() + "&length=" + $('#manager_ban_length_user').val() + "&type=" + $('#manager_ban_type_user').val(),
			success: function(){
				$(".loadingBanSettings").hide();
				$('.banUser').hide();
				$('.banGlobals').load('<?php echo HOST; ?>/manager/ban/global');
				$("#manager_ban_value_user").val("");
				$("#manager_ban_reason_user").val("");
				$(".disepearthisBanSettings").show();
			}
		});
	}
	
	$('.showBanIP').click(function() { 
		$('.banUser').hide();
		$('.banIP').fadeIn();
	});
	
	$('.showBanUser').click(function() { 
		$('.banIP').hide();
		$('.banUser').fadeIn();
	});
	
	$('.stopBanIP').click(function() { 
		$('.banIP').fadeOut();
	});
	
	$('.stopBanUser').click(function() { 
		$('.banUser').fadeOut();
	});

});
</script>

<div class="overlowContainer nobackground" id="overlowManagerBan">

	<div class="container scroll" style="width: 560px;">
		
		<div class="top"></div>
		
		<div class="localOverlowTitleSettings"><b><ubuntu><?php echo $language['manager_menu_ban_settings']; ?></ubuntu></b></div>
		
		<div id="onclickCloseManagerBan" class="closeButton"></div>
		
		<div class="text" style="width: 500px;">
		
			<div class="loadingBanSettings" style="display: none;"><img style="margin-left: 360px; margin-top:80px; margin-bottom: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></div>
            
            <div class="disepearthisBanSettings">
		
			<div class="insideContainer banIP" style="display: none;">
            
            	<input type="hidden" name="manager_ban_type_ip" id="manager_ban_type_ip" value="ip" />
            
            	<label><ubuntu><?php echo $language['manager_ban_settings_ip']; ?></ubuntu></label>
            
            	<br>
            
            	<input type="text" name="manager_ban_value_ip" id="manager_ban_value_ip" />
            
    			<label><ubuntu><?php echo $language['manager_ban_settings_reason']; ?></ubuntu></label>
            
            	<br>
            
            	<input type="text" name="manager_ban_reason_ip" id="manager_ban_reason_ip" />
        
				<label><ubuntu><?php echo $language['manager_ban_settings_length']; ?></ubuntu></label>
            
           	 	<br>
            
            	<select name="manager_ban_length_ip" id="manager_ban_length_ip" class="select" style="width: 100%;">
            
            		<option value="1800">30 Minuten</option>
                	<option value="3600">1 Uur</option>
               	 	<option value="10800">3 Uur</option>
                	<option value="43200">12 Uur</option>
                	<option value="86400">1 Dag</option>
                	<option value="259200">3 Dagen</option>
                	<option value="604800">1 Week</option>
                	<option value="1209600">2 Weken</option>
                	<option value="2592000">1 Maand</option>
                	<option value="7776000">3 Maanden</option>
                	<option value="31104000">1 Jaar</option>
                	<option value="62208000">2 Jaar</option>
                	<option value="360000000">Permanente ban</option>
                
            	</select>
				
				<a class="overlowButton stopBanIP" style="text-shadow: none; margin-top: 10px; margin-left: 0px; float: left;">
										
					<b><u class="overlowButtonText" style="">
															
						<i><ubuntu><?php echo $language['stop']; ?></ubuntu></i>
															
					</u></b>
																
					<div></div>
															
				</a> 
				
				<a class="overlowButton submitBanIP" style="text-shadow: none; margin-top: 10px; margin-left: 0px; float: right;">
										
					<b><u class="overlowButtonText" style="">
															
						<i><ubuntu><?php echo $language['submit']; ?></ubuntu></i>
															
					</u></b>
																
					<div></div>
															
				</a> 
				
			</div>
            
            <div class="insideContainer banUser" style="display: none;">
            
            	<?php 
				$queryAutoCompleteUserBan = mysql_query("SELECT * FROM users ORDER BY username DESC LIMIT 100000");
				?>

				<script>
				$(document).ready(function() {

				$("input.inputUserBan").autocomplete({
						source: [<?php while($autoCompleteUserBan = mysql_fetch_array($queryAutoCompleteUserBan)){ ?> "<?php echo $autoCompleteUserBan['username']; ?>",<?php } ?>]
					});

				});
				</script>
            
            	<input type="hidden" name="manager_ban_type_user" id="manager_ban_type_user" value="user" />
            
            	<label><ubuntu><?php echo $language['manager_ban_settings_username']; ?></ubuntu></label>
            
            	<br>
            
            	<input type="text" name="manager_ban_value_user" class="inputUserBan" id="manager_ban_value_user" />
            
    			<label><ubuntu><?php echo $language['manager_ban_settings_reason']; ?></ubuntu></label>
            
            	<br>
            
            	<input type="text" name="manager_ban_reason_user" id="manager_ban_reason_user" />
        
				<label><ubuntu><?php echo $language['manager_ban_settings_length']; ?></ubuntu></label>
            
           	 	<br>
            
            	<select name="manager_ban_length_user" id="manager_ban_length_user" class="select" style="width: 100%;">
            
            		<option value="1800">30 Minuten</option>
                	<option value="3600">1 Uur</option>
               	 	<option value="10800">3 Uur</option>
                	<option value="43200">12 Uur</option>
                	<option value="86400">1 Dag</option>
                	<option value="259200">3 Dagen</option>
                	<option value="604800">1 Week</option>
                	<option value="1209600">2 Weken</option>
                	<option value="2592000">1 Maand</option>
                	<option value="7776000">3 Maanden</option>
                	<option value="31104000">1 Jaar</option>
                	<option value="62208000">2 Jaar</option>
                	<option value="360000000">Permanente ban</option>
                
            	</select>
				
				<a class="overlowButton stopBanUser" style="text-shadow: none; margin-top: 10px; margin-left: 0px; float: left;">
										
					<b><u class="overlowButtonText" style="">
															
						<i><ubuntu><?php echo $language['stop']; ?></ubuntu></i>
															
					</u></b>
																
					<div></div>
															
				</a> 
				
				<a class="overlowButton submitBanUser" style="text-shadow: none; margin-top: 10px; margin-left: 0px; float: right;">
										
					<b><u class="overlowButtonText" style="">
															
						<i><ubuntu><?php echo $language['submit']; ?></ubuntu></i>
															
					</u></b>
																
					<div></div>
															
				</a> 
				
			</div>
            
            <div class="insideContainer space">
			
				<a class="overlowButton showBanIP" style="text-shadow: none; margin-top: 0px; margin-left: 0px; float: right;">
										
					<b><u class="overlowButtonText" style="">
															
						<i><ubuntu><?php echo $language['manager_ban_settings_ban_ip']; ?></ubuntu></i>
															
					</u></b>
																
					<div></div>
															
				</a> 

				<a class="overlowButton showBanUser" style="text-shadow: none; margin-top: 0px; margin-right: 10px; float: right;">
										
					<b><u class="overlowButtonText" style="">
															
						<i><ubuntu><?php echo $language['manager_ban_settings_ban_user']; ?></ubuntu></i>
															
					</u></b>
																
					<div></div>
															
				</a> 
            
            </div>
            
            <script>
			$(document).ready(function() {
                $('.banGlobals').load('<?php echo HOST; ?>/manager/ban/global');
            });
			</script>
            
            <div class="banGlobals">
            
            	<div class="insideContainer space">
                
                	<center><img style="margin-top:50px; margin-bottom: 50px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></center>
                
                </div>
            
            </div>
            
            </div>
        
        </div>
		
		<div class="bottom"></div>
		
	</div>

</div>

<?php } ?>