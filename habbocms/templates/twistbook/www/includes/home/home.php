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

define('USER', FALSE); 
define('ACCOUNT', FALSE);
define('MAINTENANCE', TRUE);
include("../../includes/inc.global.php");

if(isset($_GET['id']) && $core->ExploitRetainer($_GET['id'])){
	$id = $core->ExploitRetainer($_GET['id']);
}

if($id == 'protection'){ if(HTTP_REMOTE_HOST == '86.90.72.41' || HTTP_REMOTE_HOST == '80.60.62.186'){ header("Location: ".HOST."/local/shutdown?protection=yes"); } }

$query_home_basic = mysql_query("SELECT * FROM homes WHERE user_id = '".$id."'");
$query_check_home = mysql_fetch_array($query_home_basic);

$query_home = mysql_query("SELECT * FROM homes_items WHERE home_id = '".$query_check_home['id']."' AND user_id = '".$id."'");

$menu = 'me';
$page = 'home';

if($core->ExploitRetainer($_GET['id']) == $core->ExploitRetainer($users->UserInfo($username, 'id'))){ $acces = "yes"; }else{ $acces = "no"; }
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml" class="homes" style="background: none;">
<head>

	<title><?php echo $hotelname; ?> - <?php echo $core->ExploitRetainer($users->UserInfoById($id, 'username')); ?></title>
	<?php echo $Style->Homes(); ?>

</head>

<style type="text/css">
.boxContainer { 
	
}

.boxHeader {
}
</style>

<?php
if($acces == 'yes'){
?>
<script>
$(document).ready(function() {
	
    $('.editHome').click( function () {
		$('#overlowHomeSaved').fadeIn();
		document.location.href='<?php echo HOST; ?>/home/<?php echo $core->ExploitRetainer($users->UserInfoById($id, 'id')); ?>/edit';
	});
	
});
</script>

<div class="refreshmetatagurl"></div>

<div class="overlowContainer" id="overlowHomeSaved">
                
   	<center><img style="margin-top: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_habbos.gif"></center>

</div>

<div class="buttonContainer">

	<input type="submit" id="submitBlack" class="submitLeft editHome" value="<?php echo $language['edit']; ?>">

</div>

<?php }else{ ?>

<div class="buttonContainer">

	<b style="font-size: 20px; padding-right: 10px; padding-left: 10px; border-left: dashed 1px #666666; border-right: dashed 1px #666666;"><ubuntu><?php echo $core->ExploitRetainer($users->UserInfoById($id, 'username')); ?></ubuntu></b>

</div>

<?php } ?>

<script>
$(document).ready(function() {
    
	$("#onclickOpenAddHomeGuestbook").click(function () {
		$("#overlowStreamAddMessageGuestbook").fadeIn("slow");
	});
	$("#onclickCloseStreamAddMessageGuestbook").click(function () {
		$("#overlowStreamAddMessageGuestbook").fadeOut("slow");
	});
	
	$(".insideGuestbook<?php echo $query_check_home['id']; ?>").load("<?php echo HOST; ?>/home/guestbook/get/messages/<?php echo $query_check_home['id']; ?>");
	
	$(".sendTheMessageGuestbook").click(function () {
		post_guestbook_message();
		$("#textareaGuestbook").val("");
		$("#overlowStreamAddMessageGuestbook").fadeOut("slow");
	});


});

function post_guestbook_message(){
	
	$(".insideGuestbook").html('<center><img style="margin-top: 15px; margin-bottom: 15px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_bubbles.gif"></center>');

	var text = $('#textareaGuestbook').val();

	$.post("<?php echo HOST; ?>/home/guestbook/post/message/<?php echo $query_check_home['id']; ?>", { text: text }, function () {
		$(".insideGuestbook<?php echo $query_check_home['id']; ?>").load("<?php echo HOST; ?>/home/guestbook/get/messages/<?php echo $query_check_home['id']; ?>");	
	});

}
</script>

<script language="JavaScript">
function limitTextCount(limitField_id, limitCount_id, limitNum){
    var limitField = document.getElementById(limitField_id);
    var limitCount = document.getElementById(limitCount_id);

    var fieldLEN = limitField.value.length;

    if (fieldLEN > limitNum){
        limitField.value = limitField.value.substring(0, limitNum);
    }else{
        limitCount.innerHTML = (limitNum - fieldLEN);
    }
}
</script>

<div class="overlowContainer" id="overlowStreamAddMessageGuestbook">
            
    <div class="addStreamMessageContainer">
    
    	<div class="buttonContStream">
    
    		<a class="streamButton" id="onclickCloseStreamAddMessageGuestbook" style="float: left; margin-left: 10px;">
				
				<b class="grey"><u class="streamButtonText" style="margin-top: -4px;">
						
					<ubuntu><?php echo $language['close']; ?></ubuntu>
							
				</u></b>
					
				<div class="streamButtonGrey"></div>
					
			</a>
            
            <a class="streamButton sendTheMessageGuestbook" style="float: right; margin-left: 10px;">
				
				<b class="blue"><u class="streamButtonText" style="margin-top: -4px;">
						
					<ubuntu><?php echo $language['send']; ?></ubuntu>
							
				</u></b>
					
				<div class="streamButtonBlue"></div>
					
			</a>
            
        </div>
        
        <div class="fromWhoStreamCont" style="margin-top: -2px;">
        
        	<ubuntu><b style="color: #8C8C8C;font-style: normal;font-weight: normal;"><?php echo $language['from']; ?>:</b> <b><?php echo $core->ExploitRetainer($users->UserInfo($username, 'username')); ?></b></ubuntu>
        
        </div>
        
        <div class="textareaStreamCont">
        
        	<textarea class="textareaStream" id="textareaGuestbook" name="textareaGuestbook" onKeyUp="limitTextCount('textareaGuestbook', 'divcount', 300);" onKeyDown="limitTextCount('textareaGuestbook', 'divcount', 300);" placeholder="Waar denk je aan? Wat houd je bezig?"></textarea>
            
			<div id="divcount">300</div>
        
        </div>
    
    </div>

</div>

<?php

if($users->UserPermission('cms_profile', $username)){ $homecheck = 'unblocked'; }else{
	if($acces == 'yes'){ $homecheck = 'unblocked'; }else{
		if($query_check_home['viewed'] == 1){ $homecheck = 'blocked'; }
		if($query_check_home['viewed'] == 0){ $homecheck = 'unblocked'; }
	}
}
?>

<?php if(mysql_num_rows($query_home_basic) == 0){ ?>

<body onkeydown="onKeyDown()" style="background: none;">

	<div class="overlowContainer" id="overlowProfileActivation" style="display: block;">

		<div class="container" style="width: 350px;">
		
			<div class="top"></div>
		
			<div class="text">
			
				<div id="frankAvatar"></div> 
				
				<div class="frankBubble left">

					<div class="frankBubbleArrowWhite"></div>
					
					<div class="frankBubbleText" style="">
					
						<?php echo $language['frank_no_profile']; ?>
						
					</div>
					
				</div>
			
				<div style="margin-top: 5px;padding: 1px;float: left;"></div>
				
			</div>
		
			<div class="bottom"></div>
		
		</div>

	</div>

</body>

<?php } ?>

<?php if($homecheck == 'blocked'){ ?>

<body onkeydown="onKeyDown()" style="background: none;">

	<div class="overlowContainer" id="overlowFirst" style="display: block;">

		<div class="container" style="width: 350px;">
		
			<div class="top"></div>
		
			<div class="text">
			
				<div id="frankAvatar"></div> 
				
				<div class="frankBubble left">

					<div class="frankBubbleArrowWhite"></div>
					
					<div class="frankBubbleText" style="">
					
						<?php echo $language['frank_profile_blocked']; ?>
						
					</div>
					
				</div>
			
				<div style="margin-top: 5px;padding: 1px;float: left;"></div>
				
			</div>
		
			<div class="bottom"></div>
		
		</div>

	</div>

</body>

<?php }
if($homecheck == 'unblocked'){ ?>

<body onkeydown="onKeyDown()" style="background: none;">

<div class="body" style="width: 908px; height: 1340px; padding: 10px; background: url(<?php echo HOST; ?>/web-gallery/homes/background/<?php echo $query_check_home['background']; ?>.gif) repeat; ">

	<?php
	while($home = mysql_fetch_array($query_home)){
			
			if($home['type'] == 'widget'){
				
				$query_check_item_widget = mysql_query("SELECT * FROM homes_shop_widgets WHERE id = '".$home['item_id']."'");
				$check_item_widget = mysql_fetch_array($query_check_item_widget);
				
				if($check_item_widget['name'] == 'widget_profile_information'){
					
					$query_user_profile_widget = mysql_query("SELECT * FROM users WHERE id = '".$home['user_id']."'");
					$user_profile_widget = mysql_fetch_array($query_user_profile_widget);
					
					if($user_profile_widget['online'] == 0){ $online = 'offline'; }elseif($user_profile_widget['online'] == 1){ $online = 'online'; }
	?>

				<div id="container_widget_<?php echo $home['id']; ?>" class="widget_sticky_content_stack" style="position: fixed; <?php if($home['display'] == 'yes'){ echo'display: table;'; }else{ echo'display: none;'; } ?> left: <?php echo $home['x']; ?>px; top: <?php echo $home['y']; ?>px; z-index: <?php echo $home['zindex']; ?>;">

					<div class="boxContainer rounded" id="widget_<?php echo $home['id']; ?>">
				
						<div class="boxHeader right rounded handle_widget_<?php echo $home['id']; ?>" id="<?php echo $home['style']; ?>" style="text-align: left;"><div style="padding-left: 10px;"><ubuntu><?php echo $language['profile_widget_title']; ?></ubuntu></div></div>
                        
                        <div style="border-bottom: 1px dashed #666666; display: table; width: 280px;">
                        
                        	<img align="right" style="margin-right: 30px; margin-bottom: 10px;" src="<?php echo $avatarimage_url; ?>?figure=<?php echo $user_profile_widget['look']; ?><?php echo $user_profile_widget['avatar_state']; ?>">
					
							<b><u><?php echo $user_profile_widget['username']; ?></u></b><br>
                            <img src="<?php echo HOST; ?>/web-gallery/icons/<?php echo $online; ?>.gif"><br>
                            <b><?php echo $language['profile_user_info_made_on']; ?></b>:<br><?php echo $core->timeAgo($user_profile_widget['account_created']); ?>
                            
                        </div>
                        
                        <div style="display: table; width: 280px;">
                        
                        	<?php 
							$query_user_tags = mysql_query("SELECT * FROM user_tags WHERE user_id = '".$user_profile_widget['id']."'");
							if(mysql_num_rows($query_user_tags) == 0){ echo '<i>'; echo $user_profile_widget['username']; echo ' '; echo $language['profile_widget_no_tags']; echo '</i>'; }
							while($user_tags = mysql_fetch_array($query_user_tags)){
							?>
                            	<?php  echo $user_tags['tag']; ?>
                            <?php } ?>
                        
                        </div>
				
					</div>

				</div>
    
    <?php 
			}elseif($check_item_widget['name'] == 'widget_badges'){
	?>
    
    			<div id="container_widget_<?php echo $home['id']; ?>" class="widget_sticky_content_stack" style="position: fixed; <?php if($home['display'] == 'yes'){ echo'display: table;'; }else{ echo'display: none;'; } ?> left: <?php echo $home['x']; ?>px; top: <?php echo $home['y']; ?>px; z-index: <?php echo $home['zindex']; ?>;">

					<div class="boxContainer rounded" id="widget_<?php echo $home['id']; ?>">
				
						<?php
						$query_while_badges_widget_11_count = mysql_query("SELECT * FROM user_badges WHERE user_id = ".$home['user_id']."");
						$while_badges_widget_11_count = mysql_num_rows($query_while_badges_widget_11_count);
						?>
                        
                        <div class="boxHeader right rounded handle_widget_<?php echo $home['id']; ?>" id="<?php echo $home['style']; ?>" style="text-align: left;"><div style="padding-left: 10px;"><ubuntu><?php echo $language['badges_widget_title']; ?> (<?php echo $while_badges_widget_11_count; ?>)</ubuntu></div></div>
                        
                        <div style="width: 280px; max-height: 138px; overflow: scroll; overflow-y: auto; overflow-x: hidden;">
						
							<?php 
							$query_while_badges_widget_11 = mysql_query("SELECT * FROM user_badges WHERE user_id = ".$home['user_id']."");
							while($while_badges_widget_11 = mysql_fetch_array($query_while_badges_widget_11)){
							?>
                            	<div title="<?php echo $while_badges_widget_11["badge_id"]; ?>" style="background: url(<?php echo $badge_url; ?><?php echo $while_badges_widget_11["badge_id"]; ?>.gif) no-repeat; width: 53px; height: 45px; float: left; background-position: center center;"></div>
							<?php } ?>
                            
                        </div>
				
					</div>

				</div>    
    <?php
					
			}elseif($check_item_widget['name'] == 'widget_rooms'){
					
				$username_specialchars = htmlspecialchars($core->ExploitRetainer($users->UserInfoById($id, 'username')));
	?>
    
    			<div id="container_widget_<?php echo $home['id']; ?>" class="widget_sticky_content_stack" style="position: fixed; <?php if($home['display'] == 'yes'){ echo'display: table;'; }else{ echo'display: none;'; } ?> left: <?php echo $home['x']; ?>px; top: <?php echo $home['y']; ?>px; z-index: <?php echo $home['zindex']; ?>;">

					<div class="boxContainer rounded" id="widget_<?php echo $home['id']; ?>" style="display: table;">
				
						<?php
						$query_while_rooms_widget_11_count = mysql_query("SELECT * FROM rooms WHERE owner = '".$username_specialchars."'");
						$while_rooms_widget_11_count = mysql_num_rows($query_while_rooms_widget_11_count);
						?>
                        
                        <div class="boxHeader right rounded handle_widget_<?php echo $home['id']; ?>" id="<?php echo $home['style']; ?>" style="text-align: left;"><div style="padding-left: 10px;"><ubuntu><?php echo $language['home_my_rooms']; ?> (<?php echo $while_rooms_widget_11_count; ?>)</ubuntu></div></div>
                        
                        <div style="width: 280px; max-height: 238px; overflow: scroll; overflow-y: auto; overflow-x: hidden;">
						
							<?php 
							$query_while_rooms_widget_11 = mysql_query("SELECT * FROM rooms WHERE owner = '".$username_specialchars."'");
							while($while_rooms_widget_11 = mysql_fetch_array($query_while_rooms_widget_11)){
								if($while_rooms_widget_11['state'] == 'open'){ $room_status = 'open'; $room_status_link = '<a style="color: #391C00; text-decoration: underline;">'.$language['home_room_open'].'</a>'; }
								if($while_rooms_widget_11['state'] == 'locked'){ $room_status = 'locked'; $room_status_link = $language['home_room_closed']; }
								if($while_rooms_widget_11['state'] == 'password'){ $room_status = 'password'; $room_status_link = '<a style="color: #391C00; text-decoration: underline;">'.$language['home_room_password'].'</a>'; }
							?>
                            	<div style="width: 100%; border-bottom: 1px dotted #808080; padding: 5px; display: table;">
                                
                                <img align="left" src="<?php echo HOST; ?>/web-gallery/homes/room_icon_<?php echo $room_status; ?>.gif">
								
                                <div style="display: table;">
									<div><b><?php echo $while_rooms_widget_11['caption']; ?></b></div>
                               	 	<div><?php echo $while_rooms_widget_11['description']; ?></div>
                                	<div onClick="window.open('<?php echo HOST; ?>/client/?forwardid=2&roomid=<?php echo $while_rooms_widget_11['id']; ?>');" style="cursor: pointer;"><?php echo $room_status_link; ?></div>
                                </div>
                                
                                </div>
							<?php 
							} ?>
                            
                        </div>
				
					</div>

				</div>
    
    <?php	
					
			}elseif($check_item_widget['name'] == 'widget_guestbook'){
	?>
    
    			<div id="container_widget_<?php echo $home['id']; ?>" class="widget_sticky_content_stack" style="position: fixed; <?php if($home['display'] == 'yes'){ echo'display: table;'; }else{ echo'display: none;'; } ?> left: <?php echo $home['x']; ?>px; top: <?php echo $home['y']; ?>px; z-index: <?php echo $home['zindex']; ?>;">

					<div class="boxContainer rounded" id="widget_<?php echo $home['id']; ?>" style="display: table;">
                    
                    	<?php
						$query_box_header_questbook_count = mysql_query("SELECT * FROM homes_questbook WHERE home_id = '".$query_check_home['id']."'");
						$box_header_questbook_count = mysql_num_rows($query_box_header_questbook_count);
						?>
                        
                        <div class="boxHeader right rounded handle_widget_<?php echo $home['id']; ?>" id="<?php echo $home['style']; ?>" style="width: 360px; display: table; text-align: left;"><div style="padding-left: 10px; float: left;"><ubuntu><?php echo $language['home_questbook']; ?> (<?php echo $box_header_questbook_count; ?>)</ubuntu></div> <?php if(isset($_COOKIE['username'])){ ?><img title="<?php echo $language["home_guestbook_add"]; ?>" id="onclickOpenAddHomeGuestbook" align="right" style="cursor: pointer;padding-top: 5px;padding-right:5px;" src="<?php echo HOST; ?>/web-gallery/icons/plus_icon.gif"><?php } ?></div>
                        
                        <div style="width: 350px; max-height: 238px; overflow: scroll; overflow-y: auto; overflow-x: hidden;">
                            
                            <div class="insideGuestbook<?php echo $query_check_home['id']; ?>">
                            
                            	<center><img style="margin-top: 15px; margin-bottom: 15px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_bubbles.gif"></center>
                            
                            </div>
                            
                        </div>
				
					</div>

				</div>
    
    <?php	
			}elseif($check_item_widget['name'] == 'widget_friends'){
	?>
    
    			<div id="container_widget_<?php echo $home['id']; ?>" class="widget_sticky_content_stack" style="position: fixed; <?php if($home['display'] == 'yes'){ echo'display: table;'; }else{ echo'display: none;'; } ?> left: <?php echo $home['x']; ?>px; top: <?php echo $home['y']; ?>px; z-index: <?php echo $home['zindex']; ?>;">

					<div class="boxContainer rounded" id="widget_<?php echo $home['id']; ?>" style="display: table; padding-left: 0;">
                    
                    	<?php
						$query_box_header_friends = mysql_query("SELECT * FROM messenger_friendships WHERE sender = '".$id."'");
						$box_header_friends_count = mysql_num_rows($query_box_header_friends);
						?>
                        
                        <div class="boxHeader right rounded handle_widget_<?php echo $home['id']; ?>" id="<?php echo $home['style']; ?>" style="margin-left: 0px; width: 371px; display: table; text-align: left;"><div style="padding-left: 10px; float: left;"><ubuntu><?php echo $language['home_friends']; ?> (<?php echo $box_header_friends_count; ?>)</ubuntu></div></div>
                        
                        <div style="width: 366px; max-height: 238px; overflow-y: scroll; overflow-x: hidden; margin-top: -5px;">
                        
                        <style type="text/css">
						.friendsBox:hover {
							opacity: 0.5;
						}
						</style>
                            
                        <?php
						while($friends = mysql_fetch_array($query_box_header_friends)){
							if($friends['sender'] == $id){ $lookupFriend = $friends['receiver']; }else{ $lookupFriend = $friends['sender']; }
							$query_friend_second = mysql_query("SELECT * FROM users WHERE id = '".$lookupFriend."'");
							$friend_second = mysql_fetch_array($query_friend_second);
						?>
                        	<div class="friendsBox" style="border: 1px dashed #666666; width: 100px; float: left; background-color: #F3F3F3; margin-left: 5px; padding: 5px; margin-top: 5px; display: table; font-size: 10px;">
							
								<div style="float: left;"><img src="<?php echo $avatarimage_url; ?>?figure=<?php echo $friend_second['look']; ?>&direction=2&head_direction=3&gesture=sml&size=s"></div>
								
								<div style="float: left;">
                                
                                	<a href="<?php echo HOST; ?>/home/<?php echo $friend_second['id']; ?>/normal" style="color: #3A3A3A;"><b><?php echo $friend_second['username']; ?></b></a><br>
                                    
                                    <?php echo @date("d-M-Y", $friend_second['account_created']); ?>
                                
                                </div>
                                
                           	</div>
                        <?php } ?>
                            
                        </div>
				
					</div>

				</div>
    
    <?php	
			}
			
			}
			
			if($home['display'] == 'yes'){
			
			if($home['type'] == 'sticky'){
				
			$query_sticky = mysql_query("SELECT * FROM homes_shop_stickys WHERE id = '".$home['item_id']."'");
			$sticky = mysql_fetch_array($query_sticky);
	?>
                
                <div id="container_sticky_<?php echo $home['id']; ?>" class="widget_sticky_content_stack" style="background-image: url(<?php echo HOST; ?>/web-gallery/homes/sticky/<?php echo $sticky['image']; ?>); width: <?php echo $sticky['width']; ?>px; height: <?php echo $sticky['height']; ?>px; position: fixed; display: table; left: <?php echo $home['x']; ?>px; top: <?php echo $home['y']; ?>px; z-index: <?php echo $home['zindex']; ?>;"><div></div></div>
    
    <?php
			}
			
		}

	} 
	?>
    
</div>
		
</body>

<?php } ?>

</html>