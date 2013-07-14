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
include("includes/inc.global.php");

$menu = 'me';
$page = 'settings';

if(isset($_GET['page']) && $core->ExploitRetainer($_GET['page']) == 'general'){ $menu_sub = 'settings_general'; }
if(isset($_GET['page']) && $core->ExploitRetainer($_GET['page']) == 'friends'){ $menu_sub = 'settings_friends'; }
if(isset($_GET['page']) && $core->ExploitRetainer($_GET['page']) == 'bots'){ $menu_sub = 'settings_bots'; }
if(isset($_GET['page']) && $core->ExploitRetainer($_GET['page']) == 'forum'){ $menu_sub = 'settings_forum'; }
if($core->ExploitRetainer($users->UserInfo($username, 'vip')) == '1'){ if(isset($_GET['page']) && $core->ExploitRetainer($_GET['page']) == 'avatar'){ $menu_sub = 'settings_avatar'; } }
if(isset($_GET['page']) && $core->ExploitRetainer($_GET['page']) == 'referral'){ $menu_sub = 'settings_referral'; }
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

	<title><?php echo $hotelname; ?> - <?php echo $language['menu_me_settings']; ?></title>
	<?php echo $Style->General(); ?>

	<?php echo $themeswitcher; ?>

</head>

<body onkeydown="onKeyDown()">

<div class="overlowContainer" id="overlowEditBots">
                
   	<center><img style="margin-top: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_habbos.gif"></center>

</div>

<?php include("apps/float_includes.php"); ?>
<?php include("apps/system/float_includes.php"); ?>

<?php include("apps/system/header_top.php"); ?>

<div id="container">
	
	<div id="middleContainer">
	
		<?php include("apps/system/container_header.php"); ?>

		<div id="containerMiddle">

			<div id="containerLeft">
				
				<div id="containerSpace"></div>
				
				<?php if(isset($_GET['action']) && $core->ExploitRetainer($_GET['action']) == 'succes'){ ?>
				
					<div class="boxContainer rounded" style="width: 575px;">
					
						<div class="messageSucces" style="margin: 0;">
						
							<div class="iconContainer succes"></div> <?php echo $language['message_succes_saved']; ?>
							
						</div>
						
					</div>
					
					<div id="containerSpace"></div>
					
				<?php } ?>
					
				<?php if(isset($_GET['action']) && $core->ExploitRetainer($_GET['action']) == 'failed'){ ?>
				
					<div class="boxContainer rounded" style="width: 575px;">
					
						<div class="messageFailed" style="margin: 0;">
						
							<div class="iconContainer failed"></div> <?php echo $language['message_failed_saved']; ?>
							
						</div>
							
					</div>
					
					<div id="containerSpace"></div>
					
				<?php } ?>
				
				<?php if(isset($_GET['page']) && $core->ExploitRetainer($_GET['page'])){ ?>
				
					<?php if(isset($_GET['page']) && $core->ExploitRetainer($_GET['page']) == 'general'){ ?>
                    
                    	<div class="saveSettingsGeneralSucces" style="display: none;">
                    
                    		<div class="boxContainer rounded" style="width: 575px;">
					
								<div class="messageSucces" style="margin: 0;">
						
									<div class="iconContainer succes"></div> <?php echo $language['message_succes_saved']; ?>
                                
                                </div>
							
							</div>
                            
                            <div id="containerSpace"></div>
							
						</div>
                        
                        <div class="saveSettingsGeneralFailed" style="display: none;">
                    
                    		<div class="boxContainer rounded" style="width: 575px;">
					
								<div class="messageFailed" style="margin: 0;">
						
									<div class="iconContainer failed"></div> <?php echo $language['message_failed_saved']; ?>
                                
                                </div>
							
							</div>
                            
                            <div id="containerSpace"></div>
							
						</div>
						
						<script>
						$(document).ready(function() {
							
							$(function () {
								$("#selectForThingsYeey").selectbox();
							});
							
							$('.saveGeneralSettings').click(function() {
								var motto = $('.motto').val();
								var realname = $('.realname').val();
								var profile_view = $(".profileView:checked").val();
								
								$.post("<?php echo HOST; ?>/settings/updateGeneral", { motto: motto, realname: realname, profile_view: profile_view }, function (data){
									if(data == 0){
										$('.saveSettingsGeneralFailed').fadeIn();
										setTimeout( function () { $('.saveSettingsGeneralFailed').fadeOut(); }, 3000);
									}
									if(data == 1){
										$('.saveSettingsGeneralSucces').fadeIn();
										setTimeout( function () { $('.saveSettingsGeneralSucces').fadeOut(); }, 3000);
									}
								});
							});
							
							$('.saveNewWW').click(function(){
								var oldww = $('.oldww').val();
								var newww = $('.newww').val();
								var newwwconf = $('.newwwconf').val();
								
								$.post("<?php echo HOST; ?>/settings/updatePassword", { oldww: oldww, newww: newww, newwwconf: newwwconf }, function (data){
									if(data == 0){
										$('.saveSettingsGeneralFailed').fadeIn();
										setTimeout( function () { $('.saveSettingsGeneralFailed').fadeOut(); }, 3000);
									}
									if(data == 1){
										$('.saveSettingsGeneralSucces').fadeIn();
										setTimeout( function () { $('.saveSettingsGeneralSucces').fadeOut(); }, 3000);
									}
								});
							});

						});
						</script>
						
						<div class="boxContainer rounded">
					
							<div class="boxHeader left rounded gray"><ubuntu><?php echo $language['settings_title_general']; ?></ubuntu></div>
						
							<div class="settingsOptionTitleLine"><?php echo $language['settings_general_accound']; ?></div>
						
							<b><?php echo $language['settings_motto']; ?></b>
							
							<input type="text" name="motto" class="motto" value="<?php echo htmlspecialchars_decode($core->ExploitRetainer($users->UserInfo($username, 'motto'))); ?>"><br><br>
                            
                            <b><?php echo $language['settings_general_realname']; ?></b>
							
							<input type="text" name="realname" class="realname" value="<?php echo $core->ExploitRetainer($users->UserInfo($username, 'real_name')); ?>">
                            
                            <br><br>
                            
                            <div class="settingsOptionTitleLine"><?php echo $language['settings_general_profile']; ?></div>
                            
                            <div id="littleSpace"></div>
                            
                            <b><?php echo $language['settings_general_profile_view_q']; ?></b>
							
							<div id="littleSpace"></div>
						
							<div class="optionOverlow"><input type="radio" <?php if($core->ExploitRetainer($users->ProfileInfoId($core->ExploitRetainer($users->UserInfo($username, 'id')), 'viewed')) == 0){ echo 'checked'; } ?> name="profileView" class="profileView" value="0"><div class="radioSpace"><?php echo $language['settings_general_profile_view_yes']; ?></div></div>
							
							<br>

							<div class="optionOverlow"><input type="radio" <?php if($core->ExploitRetainer($users->ProfileInfoId($core->ExploitRetainer($users->UserInfo($username, 'id')), 'viewed')) == 1){ echo 'checked'; } ?> name="profileView" class="profileView" value="1"><div class="radioSpace"><?php echo $language['settings_general_profile_view_no']; ?></div></div>
                            
                            <br><br>
                            
                            <input type="submit" id="submitBlue" class="submitRight saveGeneralSettings" value="<?php echo $language['submit']; ?>">
                            
                            <br><br>
                            
                            <div class="settingsOptionTitleLine">Wachtwoord</div>
                            
                            <b>Oud wachtwoord</b>
							
							<input type="password" name="oldww" class="oldww" value=""><br><br>
                            
                            <b>Nieuw wachtwoord</b>
							
							<input type="password" name="newww" class="newww" value=""><br><br>
                            
                            <b>Nieuw wachtwoord configuratie</b>
							
							<input type="password" name="newwwconf" class="newwwconf" value="">
                            
                            <br><br>
								
							<input type="submit" id="submitBlue" class="submitRight saveNewWW" value="Nieuw wachtwoord <?php echo $language['submit']; ?>">
						
						</div>
					
					<?php } if(isset($_GET['page']) && $core->ExploitRetainer($_GET['page']) == 'friends'){ ?>
                    
                    	<div class="saveSettingsFriendsSucces" style="display: none;">
                    
                    		<div class="boxContainer rounded" style="width: 575px;">
					
								<div class="messageSucces" style="margin: 0;">
						
									<div class="iconContainer succes"></div> <?php echo $language['message_succes_saved']; ?>
                                
                                </div>
							
							</div>
                            
                            <div id="containerSpace"></div>
							
						</div>
                        
                        <div class="saveSettingsFriendsFailed" style="display: none;">
                    
                    		<div class="boxContainer rounded" style="width: 575px;">
					
								<div class="messageFailed" style="margin: 0;">
						
									<div class="iconContainer failed"></div> <?php echo $language['message_failed_saved']; ?>
                                
                                </div>
							
							</div>
                            
                            <div id="containerSpace"></div>
							
						</div>
						
						<script>
						$(document).ready(function() {
							
							$(function () {
								$("#selectForThingsYeey").selectbox();
							});
							
							$('.saveFriendsSettings').click(function() {
								var friendsFollow = $(".friendsFollow:checked").val();
								var friendsRequest = $(".friendsRequest:checked").val();
								var online = $(".online:checked").val();
								
								$.post("<?php echo HOST; ?>/settings/updateFriends", { friendsFollow: friendsFollow, friendsRequest: friendsRequest, online: online }, function (data){
									if(data == 0){
										$('.saveSettingsFriendsFailed').fadeIn();
										setTimeout( function () { $('.saveSettingsFriendsFailed').fadeOut(); }, 3000);
									}
									if(data == 1){
										$('.saveSettingsFriendsSucces').fadeIn();
										setTimeout( function () { $('.saveSettingsFriendsSucces').fadeOut(); }, 3000);
									}
								});
							});

						});
						</script>
					
						<div class="boxContainer rounded">

							<div class="boxHeader left rounded gray"><ubuntu><?php echo $language['settings_title_friends']; ?></ubuntu></div>
						
							<div class="settingsOptionTitleLine"><?php echo $language['settings_friends']; ?></div>
						
							<b><?php echo $language['settings_friends_follow']; ?></b>
							
							<div id="littleSpace"></div>
						
							<div class="optionOverlow"><input type="radio" <?php if($core->ExploitRetainer($users->UserInfo($username, 'hide_inroom')) == 0){ echo 'checked'; } ?> name="friendsFollow" class="friendsFollow" value="0"><div class="radioSpace"><?php echo $language['settings_friends_follow_yes']; ?></div></div>
							
							<br>

							<div class="optionOverlow"><input type="radio" <?php if($core->ExploitRetainer($users->UserInfo($username, 'hide_inroom')) == 1){ echo 'checked'; } ?> name="friendsFollow" class="friendsFollow" value="1"><div class="radioSpace"><?php echo $language['settings_friends_follow_no']; ?></div></div>
							
							<br>
							
							<div id="littleSpace"></div>
							
							<b><?php echo $language['settings_friends_request']; ?></b>
							
							<div id="littleSpace"></div>
						
							<div class="optionOverlow"><input type="radio" <?php if($core->ExploitRetainer($users->UserInfo($username, 'block_newfriends')) == 0){ echo 'checked'; } ?> name="friendsRequest" class="friendsRequest" value="0"><div class="radioSpace"><?php echo $language['settings_friends_request_yes']; ?></div></div>
							
							<br>

							<div class="optionOverlow"><input type="radio" <?php if($core->ExploitRetainer($users->UserInfo($username, 'block_newfriends')) == 1){ echo 'checked'; } ?> name="friendsRequest" class="friendsRequest" value="1"><div class="radioSpace"><?php echo $language['settings_friends_request_no']; ?></div></div>
							
							<br>
								
							<div id="littleSpace"></div>
								
							<b><?php echo $language['settings_online']; ?></b>
								
							<div id="littleSpace"></div>
								
							<div class="optionOverlow"><input type="radio" <?php if($core->ExploitRetainer($users->UserInfo($username, 'hide_online')) == 0){ echo 'checked'; } ?> name="online" class="online" value="0"><div class="radioSpace"><?php echo $language['settings_online_yes']; ?></div></div>
								
							<br>

							<div class="optionOverlow"><input type="radio" <?php if($core->ExploitRetainer($users->UserInfo($username, 'hide_online')) == 1){ echo 'checked'; } ?> name="online" class="online" value="1"><div class="radioSpace"><?php echo $language['settings_online_no']; ?></div></div>
							
							<br>
								
							<input type="submit" id="submitBlue" class="submitRight saveFriendsSettings" value="<?php echo $language['submit']; ?>">
							
						</div>

					<?php } 
					
					if(isset($_GET['page']) && $core->ExploitRetainer($_GET['page']) == 'bots'){ ?>
                    
                    	<script>
						$(document).ready(function() {
                            $('#onclickOpenEditBot').click(function(){
								$('.allSettingsBotButtons').hide();
								$('.onclickEditBot').fadeIn();
							});
							
							$('#onclickOpenDeleteBot').click(function(){
								$('.allSettingsBotButtons').hide();
								$('.onclickDeleteBot').fadeIn();
							});
                        });
						
						function loadEditBot(id){
							$('#overlowEditBots').fadeIn(function(){
								$('#overlowEditBots').html('<center><img style="margin-top: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_habbos.gif"></center>');
								$.post("<?php echo HOST; ?>/settings/bots/show/edit/" + id, { id: id }, function(data){
									$('#overlowEditBots').html(data);
								});
							});
						}
						</script>
                        
                        <div class="boxContainer rounded staffBox" style="padding-left: 3px; padding-bottom: 9px;">
                        
                        	<div class="boxHeader left rounded red"><ubuntu><?php echo $language['settings_cant_see_bots']; ?></ubuntu></div>
                            
                            <?php echo $language['settings_cant_see_bots_second']; ?>
                        
                        </div>
                        
                        <div id="containerSpace"></div>
                    
                    	<div class="boxContainer rounded staffBox" style="padding-left: 3px; padding-bottom: 9px;">
                        
                        	<div id="greyBox" style="width: 555px; margin-left: 2px;">
							
								<a class="overlowButton" style="float: left;">
				
									<b><u>
						
										<div id="onclickOpenEditBot" title="<?php echo $language["shop_show_edit"]; ?>" class="overlowIcon edit"></div> 
						
										<div class="overlowIconLine"></div> 
						
										<div id="onclickOpenDeleteBot" title="<?php echo $language["shop_show_delete"]; ?>" class="overlowIcon close"></div>
                                    
                                    	<div class="overlowIconLine"></div> 
                                    
                                    	<div class="overlowIcon"><img onClick="window.location.href='<?php echo HOST; ?>/shop/bots'" title="<?php echo $language["settings_bot_add"]; ?>" style="cursor: pointer;margin-top: 9px;" src="<?php echo HOST; ?>/web-gallery/icons/plus_icon.gif"></div>
							
									</u></b>
					
									<div></div>
					
								</a>
							
							</div>
                            
                            <?php 
							$query_bots = mysql_query("SELECT * FROM bots WHERE user_id = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."'");
							$bots_count = mysql_num_rows($query_bots);
							?>

							<div class="boxHeader left rounded gray"><ubuntu><?php echo $language['settings_title_bots']; ?> (<?php echo $bots_count; ?>)</ubuntu></div>
                            
                            <?php
							if($bots_count == 0){
								echo '<div class="errorMessageOverlow" style="width: 542px;margin-left: 2px;margin-bottom: -4px;">'.$language['settings_no_bots'].'</div>';
							}
							$color = 'dark';
							while($bots = mysql_fetch_array($query_bots)){
							?>
                            	<div class="box <?php echo $color; ?> bot<?php echo $bots['id']; ?>" style="float: left; display: table; width: auto; margin-left: 6px; padding: 10px;">
                                
                                	<center><ubuntu><?php echo $bots['name']; ?></ubuntu></center><br>
                                    
                                    <center><img style="margin-left: 49px; margin-right: 49px;" src="<?php echo $avatarimage_url; ?>?figure=<?php echo $bots['look']; ?>&direction=2&head_direction=3&gesture=sml"></center><br>
                                    
                                    <script>
									$(document).ready(function() {
                                        $('.onclickEditBot<?php echo $bots['id']; ?>').click(function(){
											loadEditBot('<?php echo $bots['id']; ?>');
										});
                                    });
									</script>
                                    
                                    <center><input style="float:none;" type="submit" id="submitBlack" class="allSettingsBotButtons onclickEditBot onclickEditBot<?php echo $bots['id']; ?>" value="<?php echo $language['edit']; ?>"></center>
                                    
                                    <script>
									$(document).ready(function() {
                                        $('.onclickDeleteBot<?php echo $bots['id']; ?>').click(function(){
											var delete_id = '<?php echo $bots['id']; ?>';
											$.post("<?php echo HOST; ?>/settings/bots/delete/<?php echo $bots['id']; ?>", { id: delete_id }, function () {
												$('.bot<?php echo $bots['id']; ?>').fadeOut();
											});
										});
                                    });
									</script>
                                    
                                    <center><input style="display: none; float:none;" type="submit" id="submitRed" class="allSettingsBotButtons onclickDeleteBot onclickDeleteBot<?php echo $bots['id']; ?>" value="<?php echo $language['delete']; ?>"></center>
                                
                                </div>
                            <?php if($color == 'dark') $color='light'; else $color='dark'; 
							} ?>
                            
                        </div>
                    
                    <?php } if(isset($_GET['page']) && $core->ExploitRetainer($_GET['page']) == 'forum'){ ?>
                    
                    	<div class="saveSettingsForumSucces" style="display: none;">
                    
                    		<div class="boxContainer rounded" style="width: 575px;">
					
								<div class="messageSucces" style="margin: 0;">
						
									<div class="iconContainer succes"></div> <?php echo $language['message_succes_saved']; ?>
                                
                                </div>
							
							</div>
                            
                            <div id="containerSpace"></div>
							
						</div>
                        
                        <div class="saveSettingsForumFailed" style="display: none;">
                    
                    		<div class="boxContainer rounded" style="width: 575px;">
					
								<div class="messageFailed" style="margin: 0;">
						
									<div class="iconContainer failed"></div> <?php echo $language['message_failed_saved']; ?>
                                
                                </div>
							
							</div>
                            
                            <div id="containerSpace"></div>
							
						</div>
                    
                    	<script>
						$(document).ready(function() {
							
							$('.saveForumSettings').click(function() {
								var avatar = $('.forum_avatar').val();
								<?php if($core->ExploitRetainer($users->UserInfo($username, 'vip')) == '1'){ ?>
									var signature = CKEDITOR.instances.editSignatureForum.getData();
								<?php }else{ ?>
									var signature = '<?php echo $core->ExploitRetainer($users->UserInfo($username, 'signature')); ?>';
								<?php } ?>
								
								$.post("<?php echo HOST; ?>/settings/updateForum", { avatar: avatar, signature: signature }, function (data){
									if(data == 0){
										$('.saveSettingsForumFailed').fadeIn();
										setTimeout( function () { $('.saveSettingsForumFailed').fadeOut(); }, 3000);
									}else{
										$('.saveSettingsForumSucces').fadeIn();
										setTimeout( function () { $('.saveSettingsForumSucces').fadeOut(); }, 3000);
										$('.settingsAvatar').css('background-image', 'url(' + data + ')');
									}
								});
							});

						});
						</script>
                    
                    	<div class="boxContainer rounded staffBox" style="padding-left: 3px; padding-bottom: 9px;">
                        
                        	<div class="boxHeader left rounded gray"><ubuntu><?php echo $language['settings_forum_title']; ?></ubuntu></div>
                            
                            <div class="settingsOptionTitleLine"><?php echo $language['settings_forum_profile']; ?></div>
						
							<b><?php echo $language['settings_forum_profile_avatar_link']; ?></b>
							
							<input type="text" name="forum_avatar" class="forum_avatar" value="<?php echo $core->ExploitRetainer($users->UserInfo($username, 'forum_avatar_url')); ?>"><br><br>
                            
                            <center><ubuntu>Recente avatar</ubuntu></center><br>
                            
                            <div class="settingsAvatar" style="height: 150px; width: 150px; background-image: url(<?php echo $core->ExploitRetainer($users->UserInfo($username, 'forum_avatar_url')); ?>); margin: auto;"></div>
                            
                            <br><br>
                            
                            <?php if($core->ExploitRetainer($users->UserInfo($username, 'vip')) == '1'){ ?>
                            
                            <div class="settingsOptionTitleLine">Handtekening</div>
                            
                            <textarea name="editSignatureForum" id="editSignatureForum" class="editSignatureForum"><?php echo $users->UserInfo($username, 'signature'); ?></textarea>
					
							<script type="text/javascript">

								CKEDITOR.replace( 'editSignatureForum', {
									toolbar : [
										{ name: 'document', items : [ <?php if($core->ExploitRetainer($users->UserPermission('cms_forum_reaction_source', $username))){ ?>'Source',<?php } ?>'NewPage','DocProps','Preview'  ] },
										{ name: 'clipboard', items : [ 'Undo','Redo' ] },
										{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike' ] },
										{ name: 'paragraph', items : [ 'Blockquote','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ] },
										{ name: 'links', items : [ 'Link','Unlink' ] },
										{ name: 'insert', items : [ 'Image','Smiley','SpecialChar' ] },
										{ name: 'styles', items : [ 'Font','FontSize' ] },
										{ name: 'colors', items : [ 'TextColor','BGColor' ] }
									],
									contentsCss : '<?php echo HOST; ?>/web-gallery/ckeditor/ckeditor.css',
									enterMode : CKEDITOR.ENTER_BR,
									language : 'nl',
									width: "580px",
       								height: "200px"
								});

							</script>
                            
                            <br>
                            
                            <?php } ?>
                            
                            <input type="submit" id="submitBlue" class="submitRight saveForumSettings" value="<?php echo $language['submit']; ?>">
                        
                        </div>
                    
                    <?php } 
						
					if(isset($_GET['page']) && $core->ExploitRetainer($_GET['page']) == 'avatar'){
						
					if($core->ExploitRetainer($users->UserInfo($username, 'vip')) == '1'){
						
						 ?>
                    
                    	<div class="saveSettingsAvatarSucces" style="display: none;">
                    
                    		<div class="boxContainer rounded" style="width: 575px;">
					
								<div class="messageSucces" style="margin: 0;">
						
									<div class="iconContainer succes"></div> Het is gelukt om je avatar op te slaan!
                                
                                </div>
							
							</div>
                            
                            <div id="containerSpace"></div>
							
						</div>
                        
                        <div class="saveSettingsAvatarFailed" style="display: none;">
                    
                    		<div class="boxContainer rounded" style="width: 575px;">
					
								<div class="messageFailed" style="margin: 0;">
						
									<div class="iconContainer failed"></div> Het is niet gelukt om je avatar op te slaan!
                                
                                </div>
							
							</div>
                            
                            <div id="containerSpace"></div>
							
						</div>
                    
                    	<style type="text/css">
						.ui-widget-content {
							margin: 5px;
							padding: 10px;
							display: table; 
							float: left;
							width: 75px;
							border-radius: 3px;
							cursor: pointer;
						}
						
						.ui-widget-content.ui-selected {
							background: #D6D6D6;
							color: white;
						}
						
						.ui-widget-content.ui-selecting {
							background: #E8E8E8;
						}
						
						.ui-widget-content.ui-unselecting {
							background: #ffffff;
						}
						
						.slideDownBar {
							padding: 10px;
							cursor: pointer;
							background-color: #E5E5E5;
							border-top: 1px solid #E5E5E5;
							border-radius: 3px;
							display: table;
							width: 100%;
						}
						
						.slideDownBar.space {
							margin-top: 15px;
						}
						
						.selectable_container {
							display: none;
						}
						</style>
                    
                    	<script>
						$(document).ready(function(e) {
							
							$('#selectable_gesture_bar').click(function(){ 
								toggleContainer('#selectable_gesture_container', '#selectable_gesture_bar');
							});
                            $('#selectable_gesture_container').selectable();
							
							$('#selectable_head_rotate_bar').click(function(){ 
								toggleContainer('#selectable_head_rotate_container', '#selectable_head_rotate_bar');
							});
                            $('#selectable_head_rotate_container').selectable();
							
							$('#selectable_body_rotate_bar').click(function(){ 
								toggleContainer('#selectable_body_rotate_container', '#selectable_body_rotate_bar');
							});
                            $('#selectable_body_rotate_container').selectable();
							
							$('#selectable_body_action_bar').click(function(){ 
								toggleContainer('#selectable_body_action_container', '#selectable_body_action_bar');
							});
                            $('#selectable_body_action_container').selectable();
							
							$('#selectable_body_second_action_bar').click(function(){ 
								toggleContainer('#selectable_body_second_action_container', '#selectable_body_second_action_bar');
							});
                            $('#selectable_body_second_action_container').selectable();
							
							$('#selectable_body_second_action_crr_bar').click(function(){ 
								toggleContainer('#selectable_body_second_action_crr_container', '#selectable_body_second_action_crr_bar');
							});
                            $('#selectable_body_second_action_crr_container').selectable();
							
							$('#selectable_body_second_action_drk_bar').click(function(){ 
								toggleContainer('#selectable_body_second_action_drk_container', '#selectable_body_second_action_drk_bar');
							});
                            $('#selectable_body_second_action_drk_container').selectable();
							
							setInterval(function(){
								if($('#selectable_body_second_action_container .ui-selected').attr('id') == ',crr'){
								 	if($('#body_second_action_crr').is(":hidden")){ $('#body_second_action_crr').slideDown(); }
								}else{
									if($('#body_second_action_crr').is(":visible")){ $('#body_second_action_crr').slideUp(); }
								}
								if($('#selectable_body_second_action_container .ui-selected').attr('id') == ',drk'){
								 	if($('#body_second_action_drk').is(":hidden")){ $('#body_second_action_drk').slideDown(); }
								}else{
									if($('#body_second_action_drk').is(":visible")){ $('#body_second_action_drk').slideUp(); }
								}
							}, 1000);
							
							$('.exampleSettingsAvatar').click(function(){
								var gesture = $('#selectable_gesture_container .ui-selected').attr('id');
								var head_direction = $('#selectable_head_rotate_container .ui-selected').attr('id');
								var direction = $('#selectable_body_rotate_container .ui-selected').attr('id');
								var action = $('#selectable_body_action_container .ui-selected').attr('id');
								var second_action = $('#selectable_body_second_action_container .ui-selected').attr('id');
								var crr_action = $('#body_second_action_crr_value').val() + '&drink=1';
								var drk_action = $('#body_second_action_drk_value').val() + '&drink=1';
								
								$('.exampleAvatar').fadeOut(function(){
									$('.exampleAvatar').css("background-image", "url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>" + gesture + head_direction + direction + action + second_action + crr_action + drk_action + ")");
									$('.exampleAvatar').fadeIn();
								});
							});
							
							$('.saveSettingsAvatar').click(function(){
								var gesture = $('#selectable_gesture_container .ui-selected').attr('id');
								var head_direction = $('#selectable_head_rotate_container .ui-selected').attr('id');
								var direction = $('#selectable_body_rotate_container .ui-selected').attr('id');
								var action = $('#selectable_body_action_container .ui-selected').attr('id');
								var second_action = $('#selectable_body_second_action_container .ui-selected').attr('id');
								var crr_action = $('#body_second_action_crr_value').val() + '&drink=1';
								var drk_action = $('#body_second_action_drk_value').val() + '&drink=1';
								
								$.post("<?php echo HOST; ?>/settings/updateAvatar", { gesture: gesture, head_direction: head_direction, direction: direction, action: action, second_action: second_action, crr_action: crr_action, drk_action: drk_action }, function(data){
									if(data == 0){
										$('.saveSettingsAvatarFailed').fadeIn();
										setTimeout( function () { $('.saveSettingsAvatarFailed').fadeOut(); }, 3000);
									}else{
										$('.saveSettingsAvatarSucces').fadeIn();
										setTimeout( function () { $('.saveSettingsAvatarSucces').fadeOut(); }, 3000);
										$('.exampleAvatar').fadeOut(function(){
											$('.exampleAvatar').css("background-image", "url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>" + data + ")");
											$('.exampleAvatar').fadeIn();
										});
									}
								});
							});

							
                        });
						
						function toggleContainer(id, barID){
							if($(id).is(':hidden')){ 
								$(id).slideDown(); 
								$(barID+' #darkFilledArrowDown').hide();
								$(barID+' #darkFilledArrowTop').show();
							}else{ 
								$(id).slideUp(); 
								$(barID+' #darkFilledArrowTop').hide();
								$(barID+' #darkFilledArrowDown').show();
							} 
						}
						</script>
                    
                    	<div class="boxContainer rounded staffBox" style="padding-left: 3px; padding-bottom: 9px;">
                        
                        	<div class="boxHeader left rounded gray"><ubuntu><?php echo $language['settings_title_avatar']; ?></ubuntu></div>
                            
                            <div style="padding: 10px;">Hallo! Hier kun jij jou avatar stand aanpassen. Dit hebben wij gemaakt als een klein en leuk extratje voor het hotel. Als je deze aangepast hebt, zal deze 'avatar stand' overal te zien zijn waar jij tevoorschijn komt. (behalve op de plekken waar de avatar stand door ons bepaald moet worden)</div>
                            
                            <div class="settingsOptionTitleLine">Het resultaat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Instellingen voor je avatar</div>
                            
                            <div class="exampleAvatar" style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?><?php echo $core->ExploitRetainer($core->avatar($users->UserInfo($username, 'avatar_state'))); ?>) no-repeat; width: 64px; height: 110px; margin-top: 20px; margin-left: 20px; padding-right: 20px; border-right: 1px dashed #000000; float: left;"></div>
                            
                            <div style="margin: 20px; float: left; width: 428px;">
                            
                            	<div id="gesture">
                            
                            		<div class="slideDownBar" id="selectable_gesture_bar"><div id="darkFilledArrowDown" style="margin-top: -2px;"></div><div id="darkFilledArrowTop" style="margin-top: -2px; display: none;"></div>  Gezicht</div>
                                
                            		<div id="selectable_gesture_container" class="selectable_container">
                                		<div class="ui-widget-content selectable_gesture ui-selected" id="&gesture=std"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&gesture=std) no-repeat; width: 64px; height: 110px;"></div></center></div>
                                    
                                		<div class="ui-widget-content selectable_gesture" id="&gesture=sml"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&gesture=sml) no-repeat; width: 64px; height: 110px;"></div></center></div>
                                    
                                		<div class="ui-widget-content selectable_gesture" id="&gesture=sad"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&gesture=sad) no-repeat; width: 64px; height: 110px;"></div></center></div>
                                    
                                		<div class="ui-widget-content selectable_gesture" id="&gesture=agr"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&gesture=agr) no-repeat; width: 64px; height: 110px;"></div></center></div>
                                    
                                		<div class="ui-widget-content selectable_gesture" id="&gesture=spr"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&gesture=spr) no-repeat; width: 64px; height: 110px;"></div></center></div>
                                        
                                        <div class="ui-widget-content selectable_gesture" id="&gesture=eyb"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&gesture=eyb) no-repeat; width: 64px; height: 110px;"></div></center></div>
                                        
                                        <div class="ui-widget-content selectable_gesture" id="&gesture=spk"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&gesture=spk) no-repeat; width: 64px; height: 110px;;"></div></center></div>
                                
                                	</div>
                                    
                                </div>
                            
                            	<div id="head_rotation">
                            
                            		<div class="slideDownBar space" id="selectable_head_rotate_bar"><div id="darkFilledArrowDown" style="margin-top: -2px;"></div><div id="darkFilledArrowTop" style="margin-top: -2px; display: none;"></div>  Hoofd rotatie</div>
                                
                            		<div id="selectable_head_rotate_container" class="selectable_container">
                                		<div class="ui-widget-content selectable_head_rotate ui-selected" id="&head_direction=1"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&head_direction=1) no-repeat; width: 64px; height: 110px;"></div></center></div>
                                    
                                		<div class="ui-widget-content selectable_head_rotate" id="&head_direction=2"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&head_direction=2) no-repeat; width: 64px; height: 110px;"></div></center></div>
                                    
                                		<div class="ui-widget-content selectable_head_rotate" id="&head_direction=3"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&head_direction=3) no-repeat; width: 64px; height: 110px;"></div></center></div>
                                    
                                		<div class="ui-widget-content selectable_head_rotate" id="&head_direction=4"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&head_direction=4) no-repeat; width: 64px; height: 110px;"></div></center></div>
                                    
                                		<div class="ui-widget-content selectable_head_rotate" id="&head_direction=5"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&head_direction=5) no-repeat; width: 64px; height: 110px;"></div></center></div>
                                    
                                		<div class="ui-widget-content selectable_head_rotate" id="&head_direction=6"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&head_direction=6) no-repeat; width: 64px; height: 110px;"></div></center></div>
                                    
                                		<div class="ui-widget-content selectable_head_rotate" id="&head_direction=7"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&head_direction=7) no-repeat; width: 64px; height: 110px;"></div></center></div>
                                    
                                		<div class="ui-widget-content selectable_head_rotate" id="&head_direction=8"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&head_direction=8) no-repeat; width: 64px; height: 110px;"></div></center></div>
                                	</div>
                                
                                </div>
                            
                            	<div id="body_rotation">
                            
                            		<div class="slideDownBar space" id="selectable_body_rotate_bar"><div id="darkFilledArrowDown" style="margin-top: -2px;"></div><div id="darkFilledArrowTop" style="margin-top: -2px; display: none;"></div>  Lichaam rotatie</div>
                                
                            		<div id="selectable_body_rotate_container" class="selectable_container">
                                		<div class="ui-widget-content selectable_body_rotate ui-selected" id="&direction=1"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&direction=1) no-repeat; width: 64px; height: 110px;"></div></center></div>
                                    
                                		<div class="ui-widget-content selectable_body_rotate" id="&direction=2"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&direction=2) no-repeat; width: 64px; height: 110px;"></div></center></div>
                                    
                                		<div class="ui-widget-content selectable_body_rotate" id="&direction=3"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&direction=3) no-repeat; width: 64px; height: 110px;"></div></center></div>
                                    
                                		<div class="ui-widget-content selectable_body_rotate" id="&direction=4"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&direction=4) no-repeat; width: 64px; height: 110px;"></div></center></div>
                                    
                                		<div class="ui-widget-content selectable_body_rotate" id="&direction=5"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&direction=5) no-repeat; width: 64px; height: 110px;"></div></center></div>
                                    
                                		<div class="ui-widget-content selectable_body_rotate" id="&direction=6"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&direction=6) no-repeat; width: 64px; height: 110px;"></div></center></div>
                                    
                                		<div class="ui-widget-content selectable_body_rotate" id="&direction=7"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&direction=7) no-repeat; width: 64px; height: 110px;"></div></center></div>
                                    
                                		<div class="ui-widget-content selectable_body_rotate" id="&direction=8"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&direction=8) no-repeat; width: 64px; height: 110px;"></div></center></div>
                                	</div>
                                
                                </div>
                                
                                <div id="body_action">
                            
                            		<div class="slideDownBar space" id="selectable_body_action_bar"><div id="darkFilledArrowDown" style="margin-top: -2px;"></div><div id="darkFilledArrowTop" style="margin-top: -2px; display: none;"></div>  Actie</div>
                                
                            		<div id="selectable_body_action_container" class="selectable_container">
                                		<div class="ui-widget-content selectable_body_action ui-selected" id="&action=std"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&action=std) no-repeat; width: 64px; height: 110px;"></div></center></div>
                                    
                                		<div class="ui-widget-content selectable_body_action" id="&action=wlk"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&action=wlk) no-repeat; width: 64px; height: 110px;"></div></center></div>
                                    
                                		<div class="ui-widget-content selectable_body_action" id="&action=wav"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&action=wav) no-repeat; width: 64px; height: 110px;"></div></center></div>
                                    
                                		<div class="ui-widget-content selectable_body_action" id="&action=sit"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&action=sit) no-repeat; width: 64px; height: 110px;"></div></center></div>
                                	</div>
                                
                                </div>
                                
                                <div id="body_second_action">
                            
                            		<div class="slideDownBar space" id="selectable_body_second_action_bar"><div id="darkFilledArrowDown" style="margin-top: -2px;"></div><div id="darkFilledArrowTop" style="margin-top: -2px; display: none;"></div>  Tweede actie</div>
                                
                            		<div id="selectable_body_second_action_container" class="selectable_container">
                                    	<div class="ui-widget-content ui-selected" id="" style="display: none;"></div>
                                        
                                		<div class="ui-widget-content selectable_body_second_action" id=",std"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&action=std) no-repeat; width: 64px; height: 110px;"></div></center></div>
                                    
                                		<div class="ui-widget-content selectable_body_second_action" id=",wlk"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&action=wlk) no-repeat; width: 64px; height: 110px;"></div></center></div>
                                    
                                		<div class="ui-widget-content selectable_body_second_action" id=",wav"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&action=wav) no-repeat; width: 64px; height: 110px;"></div></center></div>
                                    
                                		<div class="ui-widget-content selectable_body_second_action" id=",sit"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&action=sit) no-repeat; width: 64px; height: 110px;"></div></center></div>
                                        
                                        <div class="ui-widget-content selectable_body_second_action" id=",crr"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&action=crr) no-repeat; width: 64px; height: 110px;"></div></center></div>
                                        
                                        <div class="ui-widget-content selectable_body_second_action" id=",drk"><center><div style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>&action=drk) no-repeat; width: 64px; height: 110px;"></div></center></div>
                                	</div>
                                
                                </div>
                                
                                <div id="body_second_action_crr" style="display: none;">
                            
                            		<div class="slideDownBar space" id="selectable_body_second_action_crr_bar"><div id="darkFilledArrowDown" style="margin-top: -2px;"></div><div id="darkFilledArrowTop" style="margin-top: -2px; display: none;"></div>  Tweede actie - drinken of eten vasthouden</div>
                                
                            		<div id="selectable_body_second_action_crr_container" class="selectable_container">
                                    
                                    	<select id="body_second_action_crr_value" class="select" name="body_second_action_crr_value" style="width: 100%; margin-top: 10px;">
                                    
										<option value="" selected="selected">Niets</option>
										<option value="=43">Febbo fris</option>
										<option value="=7">Water</option>
										<option value="=6">Zwartebessensap</option>
										<option value="=9">Decafe</option>
										<option value="=44">Blauw lichtgevend goedje</option>
										<option value="=8">Koffie</option>
										<option value="=3">Wortel</option>
										<option value="=2">Sap</option>
										<option value="=41">Snert</option>
										<option value="=5">Melk</option>
										<option value="=4">IJs</option>
										<option value="=40">Oranje bubbels</option>
										<option value="=31">YuccaLicious</option>
										<option value="=13">Espresso</option>
										<option value="=14">Slap bakkie</option>
										<option value="=15">IJs-koffie</option>
										<option value="=1">Thee</option>
										<option value="=16">Cappuccino</option>
										<option value="=34">Verse vis</option>
										<option value="=35">Roze bubbels</option>
										<option value="=10">Warme choco</option>
										<option value="=36">Handpeer</option>
										<option value="=11">Dubbele espresso</option>
										<option value="=37">Appeltje</option>
										<option value="=12">Bakkie troost</option>
										<option value="=38">Sinaasappel</option>
										<option value="=39">Stukje ananas</option>
										<option value="=53">Shot espresso</option>
										<option value="=30">Radioactieve vloeistof</option>
										<option value="=59">Zak met munten</option>
										<option value="=58">Schedelsoep</option>
										<option value="=22">Geel Febbo Sappie</option>
										<option value="=23">Rood Febbo Sappie</option>
										<option value="=21">Pizza</option>
										<option value="=26">Calippo</option>
										<option value="=27">Verse thee</option>
										<option value="=24">Bubble Juice uit 1978</option>
										<option value="=60">Geroosterde kastanjes</option>
										<option value="=25">Iets rozes</option>
										<option value="=28">Engelse thee</option>
										<option value="=29">Tomatensap</option>
                                        
										</select>                                    
                                    
                                	</div>
                                
                                </div>
                                
                                <div id="body_second_action_drk" style="display: none;">
                            
                            		<div class="slideDownBar space" id="selectable_body_second_action_drk_bar"><div id="darkFilledArrowDown" style="margin-top: -2px;"></div><div id="darkFilledArrowTop" style="margin-top: -2px; display: none;"></div>  Tweede actie - drinken of eten opdrinken of opeten</div>
                                
                            		<div id="selectable_body_second_action_drk_container" class="selectable_container">
                                    
                                    	<select id="body_second_action_drk_value" class="select" name="body_second_action_drk_value" style="width: 100%; margin-top: 10px;">
                                    
										<option value="" selected="selected">Niets</option>
										<option value="=43">Febbo fris</option>
										<option value="=7">Water</option>
										<option value="=6">Zwartebessensap</option>
										<option value="=9">Decafe</option>
										<option value="=44">Blauw lichtgevend goedje</option>
										<option value="=8">Koffie</option>
										<option value="=3">Wortel</option>
										<option value="=2">Sap</option>
										<option value="=41">Snert</option>
										<option value="=5">Melk</option>
										<option value="=4">IJs</option>
										<option value="=40">Oranje bubbels</option>
										<option value="=31">YuccaLicious</option>
										<option value="=13">Espresso</option>
										<option value="=14">Slap bakkie</option>
										<option value="=15">IJs-koffie</option>
										<option value="=1">Thee</option>
										<option value="=16">Cappuccino</option>
										<option value="=34">Verse vis</option>
										<option value="=35">Roze bubbels</option>
										<option value="=10">Warme choco</option>
										<option value="=36">Handpeer</option>
										<option value="=11">Dubbele espresso</option>
										<option value="=37">Appeltje</option>
										<option value="=12">Bakkie troost</option>
										<option value="=38">Sinaasappel</option>
										<option value="=39">Stukje ananas</option>
										<option value="=53">Shot espresso</option>
										<option value="=30">Radioactieve vloeistof</option>
										<option value="=59">Zak met munten</option>
										<option value="=58">Schedelsoep</option>
										<option value="=22">Geel Febbo Sappie</option>
										<option value="=23">Rood Febbo Sappie</option>
										<option value="=21">Pizza</option>
										<option value="=26">Calippo</option>
										<option value="=27">Verse thee</option>
										<option value="=24">Bubble Juice uit 1978</option>
										<option value="=60">Geroosterde kastanjes</option>
										<option value="=25">Iets rozes</option>
										<option value="=28">Engelse thee</option>
										<option value="=29">Tomatensap</option>
                                        
										</select> 
                                    
                                	</div>
                                
                                </div>
                            
                            </div>
                            
                            <input type="submit" id="submitDarkBlue" class="submitRight saveSettingsAvatar" value="Avatar opslaan">
                            <input type="submit" id="submitBlue" style="margin-right: 10px;" class="submitRight exampleSettingsAvatar" value="Voorbeeld">
                            
                        </div>
						
                        
                    <?php } } if(isset($_GET['page']) && $core->ExploitRetainer($_GET['page']) == 'referral'){ ?>
                    
                    	<script type="text/javascript" src="<?php echo HOST; ?>/web-gallery/styles/js/clipboard.js"></script>
						<script type="text/javascript" src="<?php echo HOST; ?>/web-gallery/styles/js/clipboard.min.js"></script>
                        
                        <script>
						$(document).ready(function(){
							$(".referral").zclip({
								path:'<?php echo HOST; ?>/web-gallery/styles/swf/ZeroClipboard.swf',
								copy:$('.referral').text(),
								beforeCopy:function(){
									//$('#callback-paragraph').css('background','yellow');
									//$(this).css('color','orange');
								},
								afterCopy:function(){
									//$('#callback-paragraph').css('background','green');
									//$(this).css('color','purple');
									//$(this).next('.check').show();
									alert("De tekst '"+$('.referral').text()+"' is gekopieerd!");
								}
							});
						});
						</script>
                    
                    	<div class="boxContainer rounded staffBox" style="padding-left: 3px; padding-bottom: 9px;">
                        
                        	<div class="boxHeader left rounded gray"><ubuntu><?php echo $language['settings_referral_title']; ?></ubuntu></div>
                            
                            <?php echo $language['settings_referral_url_story']; ?><br><br>
                            
                            <b><?php echo $language['settings_referral_url']; ?></b>
							
							<div title="Als je op de link klikt word hij automatisch naar je clipboard gekopieerd!" class="referral"><?php echo HOST; ?>/index/referral/<?php echo $core->ExploitRetainer($users->UserInfo($username, 'id')); ?></div>
                    
                    	</div>
                    
                    <?php } ?>
                    
				<?php }else { ?>
				
					<div class="boxContainer rounded">
					
						<div class="boxHeader left rounded red"><ubuntu><?php echo $language['menu_me_settings']; ?></ubuntu></div>
						
						<?php echo $language['settings_error_message_general']; ?>
					
					</div>
						
				<?php } ?>
				
			</div>

			<div id="containerRight">
				
				<div id="containerSpace"></div>
				
				<div class="boxContainer rounded">
				
					<div class="boxHeader right rounded lightblue"><ubuntu><?php echo $language['menu_me_settings']; ?></ubuntu></div>
					
					<div class="settingsMenu">
					
						<div onClick="location.href='<?php echo HOST; ?>/settings/general'" class="tab<?php if(isset($_GET['page']) && $core->ExploitRetainer($_GET['page']) == 'general'){ ?>Selected<?php } ?>"><div class="settingsArrow"></div><?php echo $language['settings_title_general']; ?></div>
                        
						<div onClick="location.href='<?php echo HOST; ?>/settings/friends'" class="tab<?php if(isset($_GET['page']) && $core->ExploitRetainer($_GET['page']) == 'friends'){ ?>Selected<?php } ?>"><div class="settingsArrow"></div><?php echo $language['settings_title_friends']; ?></div>
                        
                        <div onClick="location.href='<?php echo HOST; ?>/settings/bots'" class="tab<?php if(isset($_GET['page']) && $core->ExploitRetainer($_GET['page']) == 'bots'){ ?>Selected<?php } ?>"><div class="settingsArrow"></div><?php echo $language['settings_title_bots']; ?></div>
                        
                        <div onClick="location.href='<?php echo HOST; ?>/settings/forum'" class="tab<?php if(isset($_GET['page']) && $core->ExploitRetainer($_GET['page']) == 'forum'){ ?>Selected<?php } ?>"><div class="settingsArrow"></div><?php echo $language['settings_forum_title']; ?></div>
                        
                        <?php if($core->ExploitRetainer($users->UserInfo($username, 'vip')) == '1'){ ?><div onClick="location.href='<?php echo HOST; ?>/settings/avatar'" class="tab<?php if(isset($_GET['page']) && $core->ExploitRetainer($_GET['page']) == 'avatar'){ ?>Selected<?php } ?>"><div class="settingsArrow"></div><?php echo $language['settings_title_avatar']; ?></div><?php } ?>
                        
                        <div onClick="location.href='<?php echo HOST; ?>/settings/referral'" class="tab<?php if(isset($_GET['page']) && $core->ExploitRetainer($_GET['page']) == 'referral'){ ?>Selected<?php } ?>"><div class="settingsArrow"></div><?php echo $language['settings_referral_title']; ?></div>
					
					</div>
				
				</div>

			</div>

		</div>
	
	</div>

</div>

</body>
</html>

	