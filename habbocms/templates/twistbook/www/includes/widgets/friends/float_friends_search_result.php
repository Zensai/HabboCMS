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

$page = 'search_result_friends';

$user = $core->ExploitRetainer($_POST['username']);

$user_parent_id = $core->ExploitRetainer($_POST['id'])
?>

<?php
$query_search_result = mysql_query("SELECT * FROM users WHERE username LIKE '%".$user."%'");
$color = 'odd';
while($search_result = mysql_fetch_array($query_search_result)){
	$query_friends_check_first = mysql_query("SELECT * FROM messenger_friendships WHERE sender = '".$user_parent_id."' AND receiver = '".$search_result['id']."'");
	$friends_check_first = mysql_num_rows($query_friends_check_first);
	$query_friends_check_second = mysql_query("SELECT * FROM messenger_friendships WHERE sender = '".$search_result['id']."' AND receiver = '".$user_parent_id."'");
	$friends_check_second = mysql_num_rows($query_friends_check_second);
?>

	<script>
	$(document).ready(function(e) {
		
		<?php if($friends_check_first == 1 || $friends_check_second == 1){ ?>
        	$('.searchResultsFriendsContainer').append('<div class="barFriendContainerInsider <?php echo $color ?>"><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfoByID($search_result['id'], 'look')); ?>&size=s); height: 31px; width: 27px; float: left; margin-top: -9px;"></div><div class="eye onclickLoadQuickProfileOfFriends<?php echo $search_result['id']; ?>"></div><div style="float: left; font-family: Volter; color: #000000; font-size: 9px; padding-top: 6px; padding-left: 5px;"><?php echo $core->ExploitRetainer($users->UserInfoByID($search_result['id'], 'username')); ?></div><div class="chat onclickLoadChatWith<?php echo $search_result['id']; ?>"></div></div>');
   		<?php }else{ ?>
			<?php 
			if($search_result['id'] == $user_parent_id){ }else{ 
			$query_check_requests = mysql_num_rows(mysql_query("SELECT * FROM messenger_requests WHERE sender = '".$user_parent_id."' AND receiver = '".$search_result['id']."'"));
			?>
			
            $('.searchResultsOthersContainer').append('<div class="barFriendContainerInsider <?php echo $color ?>"><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfoByID($search_result['id'], 'look')); ?>&size=s); height: 31px; width: 27px; float: left; margin-top: -9px;"></div><div class="eye onclickLoadQuickProfileOfFriends<?php echo $search_result['id']; ?>"></div><div style="float: left; font-family: Volter; color: #000000; font-size: 9px; padding-top: 6px; padding-left: 5px;"><?php echo $core->ExploitRetainer($users->UserInfoByID($search_result['id'], 'username')); ?></div><?php if($query_check_requests == 0 && $core->ExploitRetainer($users->UserInfoByID($search_result['id'], 'block_newfriends')) == 0){ ?><div class="add addFriend<?php echo $search_result['id']; ?>"></div><?php } ?></div>');
			
			$('.addFriend<?php echo $search_result['id']; ?>').click(function(){
				$(this).fadeOut();
				$.post("<?php echo HOST; ?>/friends/send/request", { friend_id: '<?php echo $search_result['id']; ?>', sender_id: '<?php echo $user_parent_id; ?>' });
			});
    	<?php } } ?>
		
		$('.onclickLoadQuickProfileOfFriends<?php echo $search_result['id']; ?>').click(function() { 
			$("#overlowQuickProfile").fadeIn("slow", function(){
				loadQuickProfileOfFriends('<?php echo $core->ExploitRetainer($users->UserInfoByID($search_result['id'], 'username')); ?>');
			});
	    });
		
		<?php
		$query_friends_chat = mysql_query("SELECT * FROM cms_messages_chat WHERE userOne = '".$user_parent_id."' OR userTwo = '".$user_parent_id."' LIMIT 1");
		$friends_chat = mysql_fetch_array($query_friends_chat);

		if($friends_chat['userOne'] == $user_parent_id){ 
			$userOneFriend = $user_parent_id;
			$userTwoFriend = $search_result['id'];
		}else{
			$userOneFriend = $search_result['id'];
			$userTwoFriend = $user_parent_id;
		}

		$query_friends_chat_s = mysql_query("SELECT * FROM cms_messages_chat WHERE userOne = '".$userOneFriend."' AND userTwo = '".$userTwoFriend."' LIMIT 1");
		$friends_chat_s = mysql_fetch_array($query_friends_chat_s);
		if(mysql_num_rows($query_friends_chat_s) == 0){
		?>

		$('.onclickLoadChatWith<?php echo $search_result['id']; ?>').click(function() { 
			$("#overlowMessages").fadeIn("slow", function(){ 
				LoadChatSubmit('<?php echo $core->ExploitRetainer($users->UserInfoByID($search_result['id'], 'username')); ?>', '<?php echo $user_parent_id; ?> heeft een chat met <?php echo $core->ExploitRetainer($users->UserInfoByID($search_result['id'], 'username')); ?> gestart.');
			});
	    });

		<?php }else{ ?>

		$('.onclickLoadChatWith<?php echo $search_result['id']; ?>').click(function() { 
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
					
	$('.searchResultsFriendsBar').append('<div style="float: left; padding-left: 3px;">(' + $('.searchResultsFriendsContainer .barFriendContainerInsider').size() + ')</div><div class="blackArrowDown nextToText"></div><div class="blackArrowTop nextToText" style="display: none;"></div>');
	$('.searchResultsOthersBar').append('<div style="float: left; padding-left: 3px;">(' + $('.searchResultsOthersContainer .barFriendContainerInsider').size() + ')</div><div class="blackArrowDown nextToText"></div><div class="blackArrowTop nextToText" style="display: none;"></div>');
	
	if($('.searchResultsFriendsContainer .barFriendContainerInsider').size() == 0){
		$('.searchResultsFriendsContainer').append('<div class="errorMessageFriends">Geen vrienden gevonden</div>');
		$('.searchResultsFriendsContainer').hide();
		$('.searchResultsOthersContainer').show();
	}
	
	if($('.searchResultsOthersContainer .barFriendContainerInsider').size() == 0){
		$('.searchResultsOthersContainer').append("<div class='errorMessageFriends'>Geen febbo's gevonden</div>");
		$('.searchResultsOthersContainer').hide();
		$('.searchResultsFriendsContainer').show();
	}
	
	$('.searchResultsFriendsBar').click(function(){
		slideDownFriendsSearchResults('Friends');
	});

	$('.searchResultsOthersBar').click(function(){
		slideDownFriendsSearchResults('Others');
	});
	
});

function slideDownFriendsSearchResults(status){
	if($('.searchResults' + status + 'Container').is(":hidden")){
		$('.searchResults' + status + 'Container').slideDown();
		$('.searchResults' + status + 'Bar .blackArrowTop').hide();
		$('.searchResults' + status + 'Bar .blackArrowDown').show();
	}else{
		$('.searchResults' + status + 'Container').slideUp();
		$('.searchResults' + status + 'Bar .blackArrowDown').hide();
		$('.searchResults' + status + 'Bar .blackArrowTop').show();
	}
}
</script>

<div class="searchResultsFriendsBar"><div style="float: left;">Vrienden</div></div>
                
<div class="searchResultsFriendsContainer"></div>
                
<div class="searchResultsOthersBar"><div style="float: left;">Andere febbo's</div></div>

<div class="searchResultsOthersContainer"></div>