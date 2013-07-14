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

define('USER', TRUE); 
define('ACCOUNT', TRUE);
define('MAINTENANCE', TRUE);
include("../../../includes/inc.global.php");

$page = 'messages';
?>

<script>
$(document).ready(function() {
	
	$('.onclickBackToMessagess').click(function() { 
		LoadBackToMessagesChats();
		$('.disepearOpenChat').hide();
	});

	function LoadBackToMessagesChats(pageName) {
		$.ajax({
			cache: false,
			type: "POST",
			url: '<?php echo HOST; ?>/messages',
			data: "searchUser=" + $('#searchUser').val(),
			success: function(php){
				$('.textdisepearOpenChat').html(php);
			}
		});
	}

});
</script>

		
<div class="textdisepearOpenChat">
		
	<div class="disepearOpenChat">
	
		<div id="darkArrowLeft" class="onclickBackToMessagess" style="float: right; margin-top: -42px; margin-right: 20px; cursor: pointer;" onmouseover="tooltip.show('<?php echo $language["go_back"]; ?>');" onmouseout="tooltip.hide();"></div>
		
		<div class="dmMessageContainer">
			
			<?php 
			$queryMessages = mysql_query("SELECT * FROM cms_messages_chat WHERE userOne = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."' ORDER BY lastPost");
			while($messages = mysql_fetch_array($queryMessages)){
			$queryUserTwo = mysql_query("SELECT * FROM users WHERE id = '".$messages['userTwo']."'");
			$userTwo = mysql_fetch_array($queryUserTwo);
			$queryMessagesCount = mysql_query("SELECT * FROM cms_chat_messages WHERE chatId = '".$messages['id']."'");
			$messagesCount = mysql_num_rows($queryMessagesCount);
			?>
				<div class="messagesContainer" id="<?php echo $messages['id']; ?>">
					
					<div style="background-image: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $userTwo['look']; ?>&direction=2&head_direction=2&gesture=sml);" class="avatar"></div>
						
					<div class="name"><?php echo $userTwo['username']; ?></div><br>
					<div class="description"><b><?php echo $messagesCount; ?></b> <?php echo $language['menu_messages']; ?> <br> <?php echo $language['last_message']; ?>: <b><?php echo strftime("%A %d %B %Y", $messages['lastPost']); ?> <?php echo $language['at']; ?> <?php echo @date("H:i", $messages['lastPost']); ?></b></div>
							
					<input type="hidden" name="chatId" class="chatId" value="<?php echo $messages['id']; ?>">
						
				</div>
			<?php 
			} 
			?>
			
		</div>
			
	</div>
			
</div>