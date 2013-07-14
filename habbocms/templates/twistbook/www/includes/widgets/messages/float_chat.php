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

$page = 'chat_messages';
?>

<script>
$(document).ready(function() {
	
	$("#onclickCloseMessages").click(function () {
		$("#overlowMessages").fadeOut("slow");
	});
	
	$('#onclickBackToMessages').click(function() { 
		LoadBackToMessages();
		$('.disepearOpenChat').hide();
	});
	
	$('#onclickOpenDeleteChat').click(function() { 
		$('.DeleteChatOnlickFunction').animate({
		opacity: 1,
		marginTop: '-63px',
		}, 2000);
	});
	
	$('.onclickMoveDeleteChat').click(function() { 
		$('.DeleteChatOnlickFunction').animate({
		opacity: 0.1,
		marginTop: '-300px',
		}, 2000);
	});
	
	$('.onclickDeleteChat<?php echo $core->ExploitRetainer($_GET['chatId']); ?>').click(function() { 
		DeleteChat<?php echo $core->ExploitRetainer($_GET['chatId']); ?>();
		LoadBackToMessages();
	});
	
	function DeleteChat<?php echo $core->ExploitRetainer($_GET['chatId']); ?>() {
		$.ajax({
			type: "POST",
			url: '<?php echo HOST; ?>/chat/delete/<?php echo $core->ExploitRetainer($_GET['chatId']); ?>',
			data: "id=" + $('.chatId').val(),
		});
	}

	function LoadBackToMessages() {
		$('.textdisepearOpenMessages').html('<img style="margin-left: 60px; margin-top:140px; margin-bottom: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif">');
		$.ajax({
			cache: false,
			type: "POST",
			url: '<?php echo HOST; ?>/messages',
			data: "searchUser=" + $('#searchUser').val(),
			success: function(php){
				$('.textdisepearOpenMessages').html(php);
			}
		});
	}
	
	$(".chatMessageEditor").keypress(function(event){
 
		var keycode = (event.keyCode ? event.keyCode : event.which);
		if(keycode == '13'){
			LoadMessageForChat();
			eraseText();	
		}	
 
	});

	function LoadMessageForChat() {
		$.ajax({
			cache: false,
			type: "POST",
			url: '<?php echo HOST; ?>/submit/chat/message',
			data: "chatId=" + $('.chatId').val() + "&message=" + $('.chatMessageEditor').val(),
		});
	}
	
	function playSound() {
		$('#playSoundFunction').html("<embed src='<?php echo HOST; ?>/web-gallery/general/messages/message_sound.mp3' hidden='true' autostart='true' loop='false'>");
	}

});
</script>

<div class="textdisepearOpenMessages">
		
	<div class="disepearOpenChat">
    
    	<script src="<?php echo HOST; ?>/web-gallery/styles/js/cufon-yui.js" type="text/javascript"></script>
		<script src="<?php echo HOST; ?>/web-gallery/styles/js/ubuntu.font.js" type="text/javascript"></script>
			
		<script type="text/javascript">Cufon.replace("ubuntu");</script>
	
		<div class="errorMessageOverlow DeleteChatOnlickFunction" style="opacity: 0.1; margin-top: -300px; margin-left: -21px; width: 371px; position: fixed;">
		
			<div style="width: 200px; float: left;"><?php echo $language['sure_delete_chat']; ?></div>
			
			<div style="margin-top: 10px;">
			
				<a class="overlowButton onclickDeleteChat<?php echo $core->ExploitRetainer($_GET['chatId']); ?>" style="float: right; text-shadow: none;">
				
					<b><u class="overlowButtonText" style="margin-top: -0px;">
					
						<i><ubuntu><?php echo $language['yes']; ?></ubuntu></i>
					
					</u></b>
						
					<div></div>
					
				</a>
			
				<a class="overlowButton onclickMoveDeleteChat" style="float: right; margin-right: 10px; text-shadow: none;">
				
					<b><u class="overlowButtonText" style="margin-top: -0px;">
					
						<i><ubuntu><?php echo $language['no']; ?></ubuntu></i>
					
					</u></b>
						
					<div></div>
					
				</a>
			
			</div>
			
		</div>
	
		<a class="overlowButton" style="float: right;margin-top: -50px;margin-right: 5px;">
				
			<b><u>
					
				<div id="onclickBackToMessages" class="overlowIcon minimize" onmouseover="tooltip.show('<?php echo $language["go_back"]; ?>');" onmouseout="tooltip.hide();"></div> 
					
				<div class="overlowIconLine"></div> 
				
				<div id="onclickOpenDeleteChat" class="overlowIcon close" onmouseover="tooltip.show('<?php echo $language["delete"]; ?>');" onmouseout="tooltip.hide();"></div> 
                
                <div class="overlowIconLine"></div> 
				
				<div id="onclickCloseMessages" class="overlowIcon closeDown"></div> 
					
			</u></b>
						
			<div></div>
					
		</a>
		
		<div id="chatMessages">
			
			<script> 
			$(document).ready(function() {
			
				$('.chatMessagesLoading<?php echo $core->ExploitRetainer($_GET['chatId']); ?>').html('<img style="margin-left: 160px; margin-top:40px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif">');
			
				setInterval(function() {
				
				var oldscrollHeight = $(".chatMessagesLoading<?php echo $core->ExploitRetainer($_GET['chatId']); ?>")[0].scrollHeight;

				$.ajax({
					url: "<?php echo HOST; ?>/chat/messages/<?php echo $core->ExploitRetainer($_GET['chatId']); ?>",
					success: function(data) { 
						
						$('.chatMessagesLoading<?php echo $core->ExploitRetainer($_GET['chatId']); ?>').html(data);

                        var newscrollHeight = $(".chatMessagesLoading<?php echo $core->ExploitRetainer($_GET['chatId']); ?>")[0].scrollHeight;

                        if(newscrollHeight > oldscrollHeight){
							$(".chatMessagesLoading<?php echo $core->ExploitRetainer($_GET['chatId']); ?>").scrollTop($(".chatMessagesLoading<?php echo $core->ExploitRetainer($_GET['chatId']); ?>")[0].scrollHeight);
							$('#playSoundFunction').html("<embed src='<?php echo HOST; ?>/web-gallery/general/messages/message_sound.mp3' hidden='true' autostart='true' loop='false'>");
                        }
								
					},
					
				});
				
				}, 2400);
				
			});
			</script>
            
            <?php
			$lookup_chat = mysql_fetch_array(mysql_query("SELECT * FROM cms_messages_chat WHERE id = '".$core->ExploitRetainer($_GET['chatId'])."'"));
			if($lookup_chat['userOne'] == $core->ExploitRetainer($users->UserInfo($username, 'id'))){ $lookupUserOne = $lookup_chat['userOne']; $lookupUserTwo = $lookup_chat['userTwo']; }else{ $lookupUserOne = $lookup_chat['userTwo']; $lookupUserTwo = $lookup_chat['userOne']; }
			?>
            
            <div style="display: table; width: 360px;">
            
            	<script>
				$(document).ready(function(){
					$('.openProfileFromChatInMessages').click(function(){
						$("#overlowQuickProfile").fadeIn("slow", function(){
							loadQuickProfileOfFriendsMessages('<?php echo $core->ExploitRetainer($users->UserInfoByID($lookupUserTwo, 'username')); ?>');
	                    });
					});
				});
				
				function loadQuickProfileOfFriendsMessages(id_user){							
					$('.loadUserDataToQuickProfile').html('<center class="loaderFromTheQuickProfile"><img style="margin-top: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_habbos.gif"></center>');
					var id = id_user;
					$.post("<?php echo HOST; ?>/quickprofile/second/" + id_user, { id: id }, function(result){ 
						$('.loaderFromTheQuickProfile').fadeOut();
						$('.loadUserDataToQuickProfile').html(result);
					});
				}
				</script>
            
            	<div class="openProfileFromChatInMessages" style="background-image: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfoByID($lookupUserTwo, 'look')); ?>&direction=2&head_direction=2); background-position: 0px 0px; height: 70px; width: 60px; float: left; cursor: pointer;"></div>
            
            	<div style="background-image: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfoByID($lookupUserOne, 'look')); ?>&direction=4&head_direction=2); background-position: 0px 0px; height: 70px; width: 60px; float: right;"></div>
                
            </div>
            
            <div style="border-top: 1px solid #CCCCCC; border-bottom: 1px solid #FFFFFF; width: 360px"></div>
                        
			<div class="chatMessagesLoading<?php echo $core->ExploitRetainer($_GET['chatId']); ?>" style="overflow-x: hidden; overlow-y: scroll; width: 365px; height: 240px; margin-top: 5px; padding-right: 10px;"></div>
			
			<script type="text/javascript">
			function submitenter(myfield,e){
				var keycode;
				if (window.event) keycode = window.event.keyCode;
				else if (e) keycode = e.which;
				else return true;

				if (keycode == 13){
					myfield.form.submit();
					return false;
				}
				else
				return true;
			}
			</script>
			
<style type="text/css">
.chatMessageEditor {
	position: relative;
	font-size: 10px;
	border: 1px solid #808080 !important;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	margin-top: 3px;
	background-color: #EFEFEF !important;
	-webkit-box-shadow: inset 0 2px 2px rgba(255, 255, 255, .4),0 1px 1px rgba(0, 0, 0, .05);
	-moz-box-shadow: inset 0 2px 2px rgba(255,255,255,.4),0 1px 1px rgba(0,0,0,.05);
	box-shadow: inset 0 2px 2px rgba(255, 255, 255, .4),0 1px 1px rgba(0, 0, 0, .05);
	padding: 7px !important;
	font-family: Ubuntu !important;
	color: #808080;
}

.chatMessageEditor:focus{
	background-color: #F7F7F7;
	-webkit-box-shadow: inset 0 2px 2px rgba(255, 255, 255, .4),0 1px 1px rgba(0, 0, 0, .05) !important;
	-moz-box-shadow: inset 0 2px 2px rgba(255,255,255,.4),0 1px 1px rgba(0,0,0,.05) !important;
	box-shadow: inset 0 2px 2px rgba(255, 255, 255, .4),0 1px 1px rgba(0, 0, 0, .05) !important;
}
</style>

			<div style="border-top: 1px solid #CCCCCC; border-bottom: 1px solid #FFFFFF; width: 360px; margin-bottom: 15px; margin-top: 15px;"></div>
			
			<input type="text" style="width: 358px;" name="addMessageChat" placeholder="<?php echo $language['what_message']; ?>" class="chatMessageEditor" id="ereaseTextTextareaMessages" maxlength="400">
				
			<input type="hidden" class="chatId" value="<?php echo $core->ExploitRetainer($_GET['chatId']); ?>">
			
		</div>

	</div>
	
</div>

<div id="playSoundFunction"></div>

<script type = "text/javascript">
function eraseText() {
	document.getElementById("ereaseTextTextareaMessages").value = "";
}
</script>