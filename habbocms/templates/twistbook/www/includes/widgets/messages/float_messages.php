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
    
	$("#onclickOpenMessages").click(function () {
		$("#overlowMessages").fadeIn("slow");
	});
	$("#onclickCloseMessages").click(function () {
		$("#overlowMessages").fadeOut("slow");
	});
	
	$('.messagesContainer').click(function() { 
		LoadChatMessages($(this).attr('id'));
		$('.disepearOpenChat').hide();
	});

	function LoadChatMessages(value) {
		$('.textdisepearOpenChat').html('<img style="margin-left: 60px; margin-top:140px; margin-bottom: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif">');
		$.ajax({
			cache: false,
			type: "POST",
			url: '<?php echo HOST; ?>/chatContainer/' + value,
			data: "chatId=" + $('.chatId').val(),
			success: function(php){
				$('.textdisepearOpenChat').html(php);
			}
		});
	}
	
	$('#onclickOpenAddMessage').click(function() {
		if ($(".openAddChat:first").is(":hidden")) {
			$(".openAddChat").show("slide", { direction: "up" }, 800);
		} else {
			$(".openAddChat").hide("slide", { direction: "up" }, 800);
		}
	});
	
	$('.submitPostChat').click(function() { 
		LoadChatSubmit();
	});

	function LoadChatSubmit(pageName) {
		$('.includePostingChatData').html('<img style="margin-left: 170px; margin-top:20px; margin-bottom: 10px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif">');
		$.ajax({
			cache: false,
			type: "POST",
			url: '<?php echo HOST; ?>/submit/chat',
			data: "user=" + $('.inputAddChatAutoUserComplete').val() + "&message=" + $('.chatMessageEditorAddMessage').val(),
			success: function(php){
				$('.includePostingChatData').html(php);
			}
		});
	}
	
	$('.stopPostChat').click(function() { 
		$(".openAddChat").hide("slide", { direction: "up" }, 800);
	});
		
	if($('.messagesContainer').size() == 0){			
		$('.zeroIsErrorMessageChats').html('<div class="errorMessageOverlow" style="width: 303px; margin: 10px 10px 10px 10px;">Er zijn geen chats gevonden</div>');
	}

});
</script>

<style type="text/css">
.chatMessageEditorAddMessage {
	border: 1px solid #EDEDED;
	font-family: Segoe UI;
	font-size: 13px;
	width: 100%;
	height: 60px;
	background-color: #EDEDED;
	float: left;
	padding: 10px;
}

.chatMessageEditorAddMessage:focus {
	-moz-box-shadow: 0px 0px 3px 3px rgba(96, 96, 96, 0.5);
	-webkit-box-shadow: 0px 0px 3px 3px rgba(96, 96, 96, 0.5);
	box-shadow: 0px 0px 3px 3px rgba(96, 96, 96, 0.5);
}
</style>

<?php
$queryMessagesCheck = mysql_query("SELECT * FROM cms_messages_chat WHERE alert = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."'");
$messagesCheck = mysql_fetch_array($queryMessagesCheck);
?>

<div class="overlowContainer" id="overlowMessages" <?php if($messagesCheck['alert'] == $core->ExploitRetainer($users->UserInfo($username, 'id'))){?>style="display: block;"<?php } ?>>

	<div class="container scroll" style="width: 400px; margin-top: 100px;">
		
		<div class="top"></div>
		
		<div class="localOverlowTitle" style="margin-top: 6px;"><ubuntu><b><?php echo $language['menu_messages']; ?></b></ubuntu></div>
		
		<div class="text textdisepearOpenChat">
		
			<div class="disepearOpenChat">
			
				<a class="overlowButton" style="float: right;margin-top: -50px;margin-right: -10px;">
				
					<b><u>
			
						<div id="onclickOpenAddMessage" class="overlowIcon"><img onmouseover="tooltip.show('<?php echo $language["add_message"]; ?>');" onmouseout="tooltip.hide();" style="cursor: pointer;margin-top: 9px;" src="<?php echo HOST; ?>/web-gallery/icons/plus_icon.gif"></div>
						
						<div class="overlowIconLine"></div> 
				
						<div id="onclickCloseMessages" class="overlowIcon closeDown"></div> 
							
					</u></b>
						
					<div></div>
					
				</a>
		
				<div class="dmMessageContainer openAddChat" style="display: none; margin-bottom: 20px;">
				
				<div class="includePostingChatData"></div>
				
				<?php 
				$queryAutoCompleteUserSearchAddChat = mysql_query("SELECT * FROM users ORDER BY username DESC LIMIT 100000");
				?>

				<script>
				$(document).ready(function() {

					$("input.inputAddChatAutoUserComplete").autocomplete({
						source: [<?php while($autoCompleteUserSearchAddChat = mysql_fetch_array($queryAutoCompleteUserSearchAddChat)){ ?> "<?php echo $autoCompleteUserSearchAddChat['username']; ?>",<?php } ?>]
					});

				});
				</script>
				
					<div style="padding:10px;">
					
						<input type="text" class="inputAddChatAutoUserComplete" placeholder="<?php echo $language['to_who']; ?>" value="">
					
						<textarea name="addMessageChat" placeholder="<?php echo $language['what_message']; ?>" class="chatMessageEditorAddMessage" id="ereaseTextTextareaMessages" maxlength="150"></textarea>
						
						<input type="submit" class="submitRight submitPostChat" id="submitDarkBlue" style="margin-top: 10px; margin-bottom: 10px;" value="<?php echo $language['post']; ?>">
					
						<input type="submit" class="submitLeft stopPostChat" id="submitBlue" style="margin-top: 10px; margin-bottom: 10px;" value="<?php echo $language['stop']; ?>">
					
					</div>
				
				</div>
					
				<div style="width: 360px; display: table;">
			
					<?php 
					$queryMessages = mysql_query("SELECT * FROM cms_messages_chat WHERE userOne = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."' OR userTwo = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."' ORDER BY lastPost DESC");
					while($messages = mysql_fetch_array($queryMessages)){
					if($core->ExploitRetainer($users->UserInfo($username, 'id')) == $messages['userOne']){ $user_blocked = $messages['userTwo']; }elseif($core->ExploitRetainer($users->UserInfo($username, 'id')) == $messages['userTwo']){ $user_blocked = $messages['userOne']; }
					if($messages['chat_delete_one'] == 0 || $messages['chat_delete_one'] == $user_blocked){
					if($messages['userOne'] == $core->ExploitRetainer($users->UserInfo($username, 'id'))){ $userPlacement = $messages['userTwo']; }else{ $userPlacement = $messages['userOne']; }
					$queryUserTwo = mysql_query("SELECT * FROM users WHERE id = '".$userPlacement."'");
					$userTwo = mysql_fetch_array($queryUserTwo);
					$queryMessagesCount = mysql_query("SELECT * FROM cms_chat_messages WHERE chatId = '".$messages['id']."'");
					$messagesCount = mysql_num_rows($queryMessagesCount);
					?>
						<div class="messagesContainer" style="display: table; cursor: pointer; width: 360px;" id="<?php echo $messages['id']; ?>">
					
							<div style="margin-right: 10px; background-position: -10px -10px; width: 50px; height: 60px; float: left; background-image: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $userTwo['look']; ?><?php if($messages['alert'] == $core->ExploitRetainer($users->UserInfo($username, 'id'))){?>&direction=4<?php }else{ ?>&direction=2<?php } ?><?php if($messages['alert'] == $core->ExploitRetainer($users->UserInfo($username, 'id'))){?>&head_direction=3<?php }else{ ?>&head_direction=2<?php } ?><?php if($messages['alert'] == $core->ExploitRetainer($users->UserInfo($username, 'id'))){?>&gesture=srp<?php }else{ ?>&gesture=sml<?php } ?><?php if($messages['alert'] == $core->ExploitRetainer($users->UserInfo($username, 'id'))){?>&action=wav<?php } ?>);" class="avatar"></div>
                    
                   			<div style="padding-top: 15px; display: table; width: 300px;">
						
								<div style="font-size: 18px; font-weight: bold; float: left;"><ubuntu><?php echo $userTwo['username']; ?></ubuntu></div>
								<div style="float: right; color: #666;"><ubuntu><b><?php echo $messagesCount; ?></b> <?php echo $language['menu_messages']; ?></ubuntu></div>
                        
                    		</div>
                    
                   		 	<div style="color: #999;"><ubuntu><?php echo $language['last_message']; ?>: <b><?php echo $core->timeAgo($messages['lastPost']); ?></b></ubuntu></div>
							
							<input type="hidden" name="chatId" class="chatId" value="<?php echo $messages['id']; ?>">
						
						</div>
                
               		 	<div style="border-top: 1px solid #CCCCCC; border-bottom: 1px solid #FFFFFF; width: 360px"></div>
					<?php 
					}
					} 
					?>
                    
                    <div class="zeroIsErrorMessageChats"></div>
			
				</div>
			
			</div>
			
		</div>
		
		<div class="bottom"></div>
		
	</div>

</div>