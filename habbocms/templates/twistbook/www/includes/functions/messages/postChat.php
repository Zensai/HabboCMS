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

$page = 'post_message';

if(isset($_POST['user']) && isset($_POST['message'])){

	$queryFindUserId = mysql_query("SELECT * FROM users WHERE username = '".$core->ExploitRetainer($_POST['user'])."'");
	$foundedUserId = mysql_fetch_array($queryFindUserId);

	$queryCheckChatExist = mysql_query("SELECT * FROM cms_messages_chat WHERE userOne = '".$foundedUserId['id']."' AND userTwo = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."'");
	$queryCheckChatExistS = mysql_query("SELECT * FROM cms_messages_chat WHERE userOne = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."' AND userTwo = '".$foundedUserId['id']."'");
	$queryCheckIfUserExist = mysql_query("SELECT * FROM users WHERE username = '".$foundedUserId['username']."'");
	$queryCheckIfFriendshipExist = mysql_query("SELECT * FROM messenger_friendships WHERE sender = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."' AND receiver = '".$foundedUserId['id']."'");
	$countChecks = mysql_num_rows($queryCheckChatExist);
	$countChecksS = mysql_num_rows($queryCheckChatExistS);
	$countUserExist = mysql_num_rows($queryCheckIfUserExist);
	$countFriendshipExist = mysql_num_rows($queryCheckIfFriendshipExist);
	
	if($countChecks == 1){
		$query_select_TOSET = mysql_fetch_array(mysql_query("SELECT * FROM cms_messages_chat WHERE userOne = '".$foundedUserId['id']."' AND userTwo = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."'"));
		$query = mysql_query("UPDATE cms_messages_chat SET chat_delete_one = 0 WHERE id = '".$query_select_TOSET['id']."'");
	}elseif($countChecks == 1){
		$query_select_TOSET = mysql_fetch_array(mysql_query("SELECT * FROM cms_messages_chat WHERE userOne = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."' AND userTwo = '".$foundedUserId['id']."'"));
		$query = mysql_query("UPDATE cms_messages_chat SET chat_delete_one = 0 WHERE id = '".$query_select_TOSET['id']."'");
	}
	
	if($countChecks == 1){
		$query_select_TOSET_redi = mysql_fetch_array(mysql_query("SELECT * FROM cms_messages_chat WHERE userOne = '".$foundedUserId['id']."' AND userTwo = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."'"));
		$query = mysql_query("UPDATE cms_messages_chat SET chat_delete_one = 0 WHERE id = '".$query_select_TOSET_redi['id']."'");
		$query = mysql_query("INSERT INTO cms_chat_messages (chatId, userId, message, posted) VALUES ('".$query_select_TOSET_redi['id']."', '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."', '".$core->ExploitRetainer($_POST['message'])."', UNIX_TIMESTAMP())");
	?>
    	<script>
		$(document).ready(function(){
			$('.textdisepearOpenChat').html('<img style="margin-left: 60px; margin-top:140px; margin-bottom: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif">');
			$.ajax({
				cache: false,
				type: "POST",
				url: '<?php echo HOST; ?>/chatContainer/<?php echo $query_select_TOSET_redi['id']; ?>',
				data: "chatId=" + $('.chatId').val(),
				success: function(php){
					$('.textdisepearOpenChat').html(php);
				}
			});
			$('.disepearOpenChat').hide();
		});
		</script>
	<?php
	}
	
	if($countChecksS == 1){
		$query_select_TOSET_redi = mysql_fetch_array(mysql_query("SELECT * FROM cms_messages_chat WHERE userOne = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."' AND userTwo = '".$foundedUserId['id']."'"));
		$query = mysql_query("UPDATE cms_messages_chat SET chat_delete_one = 0 WHERE id = '".$query_select_TOSET_redi['id']."'");
		$query = mysql_query("INSERT INTO cms_chat_messages (chatId, userId, message, posted) VALUES ('".$query_select_TOSET_redi['id']."', '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."', '".$core->ExploitRetainer($_POST['message'])."', UNIX_TIMESTAMP())");
	?>
    	<script>
		$(document).ready(function(){
			$('.textdisepearOpenChat').html('<img style="margin-left: 60px; margin-top:140px; margin-bottom: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif">');
			$.ajax({
				cache: false,
				type: "POST",
				url: '<?php echo HOST; ?>/chatContainer/<?php echo $query_select_TOSET_redi['id']; ?>',
				data: "chatId=" + $('.chatId').val(),
				success: function(php){
					$('.textdisepearOpenChat').html(php);
				}
			});
			$('.disepearOpenChat').hide();
		});
		</script>
	<?php
	}
	
	if($foundedUserId['id'] == "".$core->ExploitRetainer($users->UserInfo($username, 'id')).""){ $withMyselfCheck = '1'; }else{ $withMyselfCheck = '0'; }
	
	if($core->ExploitRetainer($users->UserInfo($foundedUserId['username'], 'vip')) == 1){ $userIsVip = 1; }else{ $userIsVip = 0; }

	if($countChecks == 1 || $countChecksS == 1 || $countUserExist == 0 || $withMyselfCheck == 1 || $countFriendshipExist == 0 || $userIsVip == 0){
	?>
	
		<div class="errorMessageOverlow" style="width: 303px; margin: 10px 10px 0px 10px;">
	
			<?php if($countChecks == 1 || $countChecksS == 1){ echo $language['add_chat_exitst']; ?>
			<?php }elseif($countUserExist == 0){ echo $language['add_chat_user_doesnt_exist']; ?>
			<?php }elseif($withMyselfCheck == 1){ echo $language['add_chat_no_chat_with_yourself']; ?>
            <?php }elseif($countFriendshipExist == 0){ echo $language['add_chat_no_friendship']; } ?>
			<?php }elseif($userIsVip == 0){ echo $language['add_chat_user_no_vip']; } ?>
		
		</div>
	
	<?php
	}else{
	?>
		
		<?php
		srand((double) microtime()*1000000);
		$randomChatId = rand();
	
		$query = mysql_query("INSERT INTO cms_messages_chat (id, userOne, userTwo, lastPost) VALUES ('".$randomChatId."', '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."', '".$foundedUserId['id']."', UNIX_TIMESTAMP())");
		$query = mysql_query("INSERT INTO cms_chat_messages (chatId, userId, message, posted) VALUES ('".$randomChatId."', '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."', '".$core->ExploitRetainer($_POST['message'])."', UNIX_TIMESTAMP())");
		
		$queryCheckUser = mysql_query("SELECT * FROM cms_messages_chat WHERE id = '".$randomChatId."'"); 
		$checkUser = mysql_fetch_array($queryCheckUser);
		if($checkUser['userOne'] == $core->ExploitRetainer($users->UserInfo($username, 'id'))){ $userPlacementCheck = $checkUser['userTwo']; }else{ $userPlacementCheck = $checkUser['userOne']; }
	
		$query = mysql_query("UPDATE cms_messages_chat SET lastPost = UNIX_TIMESTAMP(), alert = '".$userPlacementCheck."' WHERE id = '".$randomChatId."'");
		?>
		
		<script>
		$(document).ready(function() {
		
			$('.textdisepearOpenChat').html('<img style="margin-left: 60px; margin-top:140px; margin-bottom: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif">');

			LoadChatMessagesPosted();
			$('.disepearOpenChat').hide();

			function LoadChatMessagesPosted(value) {
				$.ajax({
					type: "POST",
					url: "<?php echo HOST; ?>/chatContainer/<?php echo $randomChatId; ?>",
					data: "chatId=" + $('.chatId').val(),
					success: function(php){
						$('.textdisepearOpenChat').html(php);
					}
				});
			}

		});
		</script>
		
<?php
	}
	

?>