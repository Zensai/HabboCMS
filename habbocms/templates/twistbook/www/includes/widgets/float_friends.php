<script>
$(document).ready(function(e) {
	
	$('#onclickOpenFriends').click(function(){
		$('.friendsContainer').fadeIn();
	});
	
	$('.closeOverlowFriends').click(function(){
		$('.friendsContainer').fadeOut();
	});
	
    $('.insideFriendsContainer').draggable({
		containment: "body",
		handle: ".friendsContainerTop",
		cursor: "pointer"
	});
	
	$('.barFriends').click(function(){
		if($('.barFriendsContainer').is(":hidden")){
			$('.barFriendsContainer').slideDown();
			$('.barFriends .blackArrowTop').hide();
			$('.barFriends .blackArrowDown').show();
		}else{
			$('.barFriendsContainer').slideUp();
			$('.barFriends .blackArrowDown').hide();
			$('.barFriends .blackArrowTop').show();
		}
		if($('.barSearchContainer').is(":visible")){
			$('.barSearch .whiteArrowDown').hide();
			$('.barSearch .whiteArrowTop').show();
			$('.barSearchContainer').slideUp();
			$('.barFriendsContainer').slideDown();
		}
	});
	
	$('.barSearch').click(function(){
		if($('.barSearchContainer').is(":hidden")){
			$('.barSearchContainer').slideDown();
			$('.barSearch .whiteArrowTop').hide();
			$('.barSearch .whiteArrowDown').show();
		}else{
			$('.barSearchContainer').slideUp();
			$('.barSearch .whiteArrowDown').hide();
			$('.barSearch .whiteArrowTop').show();
		}
		if($('.barFriendsContainer').is(":visible")){
			$('.barFriends .blackArrowDown').hide();
			$('.barFriends .blackArrowTop').show();
			$('.barFriendsContainer').slideUp();
			$('.barSearchContainer').slideDown();
		}
	});
	
	$('.searchThisUsernameFriend').keypress(function(e) {
		if(e.which == 13) {
    		$('.searchResultsFriends').html('<center><img style="margin-top:80px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_bubbles.gif"></center>');
			var username = $('.searchThisUsernameFriend').val();
			$.post("<?php echo HOST; ?>/friends/search/result/" + username, { username: username, id: '<?php echo $core->ExploitRetainer($users->UserInfo($username, 'id')); ?>' }, function(php){
				$('.searchResultsFriends').html(php);
			});
		}
	});
	
	$('.submitSearchFriend').click(function(){
		$('.searchResultsFriends').html('<center><img style="margin-top:80px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_bubbles.gif"></center>');
		var username = $('.searchThisUsernameFriend').val();
		$.post("<?php echo HOST; ?>/friends/search/result/" + username, { username: username, id: '<?php echo $core->ExploitRetainer($users->UserInfo($username, 'id')); ?>' }, function(php){
			$('.searchResultsFriends').html(php);
		});
	});
	
});

function LoadChatMessagesFriends(value) {
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

function loadQuickProfileOfFriends(id_user){							
	$('.loadUserDataToQuickProfile').html('<center class="loaderFromTheQuickProfile"><img style="margin-top: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_habbos.gif"></center>');
	var id = id_user;
	$.post("<?php echo HOST; ?>/quickprofile/second/" + id_user, { id: id }, function(result){ 
		$('.loaderFromTheQuickProfile').fadeOut();
		$('.loadUserDataToQuickProfile').html(result);
	});
}

function LoadChatSubmit(user, message) {
	$('.includePostingChatData').html('<img style="margin-left: 170px; margin-top:20px; margin-bottom: 10px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif">');
	$.ajax({
		cache: false,
		type: "POST",
		url: '<?php echo HOST; ?>/submit/chat',
		data: "user=" + user + "&message=" + message,
		success: function(php){
			$('.includePostingChatData').html(php);
		}
	});
}
</script>

<div class="friendsContainer">

	<div class="insideFriendsContainer">
    
    	<div class="friendsContainerTop">
        
        	<b><div class="friendsContainerTopTitle"></div></b>
            
            <u class="closeOverlowFriends"></u>
            
        </div>
        
        <div class="friendsContainerMiddle">
        
        	<div class="barFriends">
            	<div style="float: left">Vrienden</div>
                <div class="blackArrowDown nextToText"></div>
                <div class="blackArrowTop nextToText" style="display: none;"></div>
            </div>
            
            <div class="barFriendsContainer">
            
            	<?php 
				$query_friends = mysql_query("SELECT * FROM messenger_friendships WHERE sender = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."' OR receiver = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."'");
				$color = 'odd';
				while($friends = mysql_fetch_array($query_friends)){
				if($friends['sender'] == $core->ExploitRetainer($users->UserInfo($username, 'id'))){ $friend = $friends['receiver']; }else{ $friend = $friends['sender']; }
				?>
                
                	<script>
                    $(document).ready(function() {
						
						<?php if($core->ExploitRetainer($users->UserInfoByID($friend, 'online')) == 1){ ?>
							$('.friendsOnlineContainer').append('<div class="barFriendContainerInsider <?php echo $color ?>"><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfoByID($friend, 'look')); ?>&size=s); height: 31px; width: 27px; float: left; margin-top: -9px;"></div><div class="eye onclickLoadQuickProfileOfFriends<?php echo $friend; ?>"></div><div style="float: left; font-family: Volter; color: #000000; font-size: 9px; padding-top: 6px; padding-left: 5px;"><?php echo $core->ExploitRetainer($users->UserInfoByID($friend, 'username')); ?></div><div class="chat onclickLoadChatWith<?php echo $friend; ?>"></div></div>');
						<?php }else{ ?>
							$('.friendsOfflineContainer').append('<div class="barFriendContainerInsider <?php echo $color ?>"><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfoByID($friend, 'look')); ?>&size=s); height: 31px; width: 27px; float: left; margin-top: -9px;"></div><div class="eye onclickLoadQuickProfileOfFriends<?php echo $friend; ?>"></div><div style="float: left; font-family: Volter; color: #000000; font-size: 9px; padding-top: 6px; padding-left: 5px;"><?php echo $core->ExploitRetainer($users->UserInfoByID($friend, 'username')); ?></div><div class="chat onclickLoadChatWith<?php echo $friend; ?>"></div></div>');
						<?php } ?>
	
	                   	$('.onclickLoadQuickProfileOfFriends<?php echo $friend; ?>').click(function() { 
							$("#overlowQuickProfile").fadeIn("slow", function(){
								loadQuickProfileOfFriends('<?php echo $core->ExploitRetainer($users->UserInfoByID($friend, 'username')); ?>');
							});
	                    });
								
						<?php
						$query_friends_chat = mysql_query("SELECT * FROM cms_messages_chat WHERE userOne = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."' OR userTwo = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."' LIMIT 1");
						$friends_chat = mysql_fetch_array($query_friends_chat);
								
						if($friends_chat['userOne'] == $core->ExploitRetainer($users->UserInfo($username, 'id'))){ 
							$userOneFriend = $core->ExploitRetainer($users->UserInfo($username, 'id'));
							$userTwoFriend = $friend;
						}else{
							$userOneFriend = $friend;
							$userTwoFriend = $core->ExploitRetainer($users->UserInfo($username, 'id'));
						}
								
						$query_friends_chat_s = mysql_query("SELECT * FROM cms_messages_chat WHERE userOne = '".$userOneFriend."' AND userTwo = '".$userTwoFriend."' LIMIT 1");
						$friends_chat_s = mysql_fetch_array($query_friends_chat_s);
						if(mysql_num_rows($query_friends_chat_s) == 0){
						?>
								
						$('.onclickLoadChatWith<?php echo $friend; ?>').click(function() { 
							$("#overlowMessages").fadeIn("slow", function(){ 
								LoadChatSubmit('<?php echo $core->ExploitRetainer($users->UserInfoByID($friend, 'username')); ?>', '<?php echo $core->ExploitRetainer($users->UserInfo($username, 'username')); ?> heeft een chat met <?php echo $core->ExploitRetainer($users->UserInfoByID($friend, 'username')); ?> gestart.');
							});
	                    });
								
						<?php }else{ ?>
								
						$('.onclickLoadChatWith<?php echo $friend; ?>').click(function() { 
							$("#overlowMessages").fadeIn("slow", function(){ 
								LoadChatMessagesFriends('<?php echo $friends_chat_s['id']; ?>');
							});
	                    });
								
						<?php } ?>
						
					});
					</script>
                   
                <?php 
				if($color == 'odd'){ $color = 'even'; }else{ $color = 'odd'; }
				} 
				?>
                
                <script>
				$(document).ready(function(e) {
					
                    $('.friendsOnlineBar').append('<div style="float: left; padding-left: 3px;">(' + $('.friendsOnlineContainer .barFriendContainerInsider').size() + ')</div><div class="blackArrowDown nextToText"></div><div class="blackArrowTop nextToText" style="display: none;"></div>');
					$('.friendsOfflineBar').append('<div style="float: left; padding-left: 3px;">(' + $('.friendsOfflineContainer .barFriendContainerInsider').size() + ')</div><div class="blackArrowDown nextToText" style="display: none;"></div><div class="blackArrowTop nextToText"></div>');
					
					if($('.friendsOnlineContainer .barFriendContainerInsider').size() == 0){
						$('.friendsOnlineContainer').append('<div class="errorMessageFriends">Je hebt geen vrienden online</div>');
						$('.friendsOnlineContainer').hide();
						$('.friendsOfflineContainer').show();
					}
					
					if($('.friendsOfflineContainer .barFriendContainerInsider').size() == 0){
						$('.friendsOfflineContainer').append('<div class="errorMessageFriends">Je hebt geen vrienden offline</div>');
						$('.friendsOfflineContainer').hide();
						$('.friendsOnlineContainer').show();
					}
					
					$('.friendsOnlineBar').click(function(){
						slideDownFriends('Online');
					});

					$('.friendsOfflineBar').click(function(){
						slideDownFriends('Offline');
					});
					
                });
				
				function slideDownFriends(status){
					if($('.friends' + status + 'Container').is(":hidden")){
						$('.friends' + status + 'Container').slideDown();
						$('.friends' + status + 'Bar .blackArrowTop').hide();
						$('.friends' + status + 'Bar .blackArrowDown').show();
					}else{
						$('.friends' + status + 'Container').slideUp();
						$('.friends' + status + 'Bar .blackArrowDown').hide();
						$('.friends' + status + 'Bar .blackArrowTop').show();
					}
				}
				</script>
                
                <div class="friendsOnlineBar"><div style="float: left;">Vrienden</div></div>
                
                <div class="friendsOnlineContainer"></div>
                
                <div class="friendsOfflineBar"><div style="float: left;">Offline vrienden</div></div>
                
                <div class="friendsOfflineContainer" style="display: none;"></div>
                
            </div>
            
            <div class="barSearch">
            	<div style="float: left">Zoeken</div>
                <div class="whiteArrowDown nextToText" style="display: none;"></div>
                <div class="whiteArrowTop nextToText"></div>
            </div>
            
            <div class="barSearchContainer">
            
            	<div class="searchResultsFriends"></div>
                
                <div class="searchBoxInput">
                
                	<input type="text" class="inputSearchFriend searchThisUsernameFriend" placeholder="Gebruikersnaam" />
                    
                    <div class="submitSearchFriend">Zoek</div>
                
                </div>
            
            </div>
            
        </div>
        
        <div class="friendsContainerBottom">
        
        	<b></b>
            
            <u></u>
            
        </div>
        
    </div>

</div>