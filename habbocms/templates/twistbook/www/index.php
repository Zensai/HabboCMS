<?php
	$lang->addTranslation('index');
	$skin->styleset('general');

	if(LOGGEDIN) { 
		header("Location: " . WWW . "/me"); 
		exit;
	}

	$skin->install($lang->loc['index.pagetitle'], 'general');
?>
		<script>
			$(document).ready(function() { $('script').remove(); });
			$(document).ready(function() {				
				$('.check_username_availability').click(function(){		
					check_if_it_is_correct();
				});
				
				$('.loginPassword').keypress(function(e) {
					if(e.which == 13) {
						check_if_it_is_correct();
					}
				});
			});

			function login_error(message, timeout) {
				timeout = typeof timeout !== 'undefined' ? timeout : 2500;
				$('.loginBoxError').html('<ubuntu>' + message + '</ubuntu>');
				$('.loginBoxError').fadeIn('slow');
				setTimeout(function() { $('.loginBoxError').fadeOut('slow'); }, timeout);
			}

			function check_if_it_is_correct(){
				var username = $('.loginUsername').val();
				var password = $('.loginPassword').val();
				if(username != '' && password != '') {
					$('.overlowLoadingContainer').show();
					$.post("{www}/ajax/loginCheck", { username: username, password: password },
						function(result){
							$('.overlowLoadingContainer').hide();
							if(result == 0){
								login_error('{$lang->index.error_username}');
							}else{
								if(result == 1){
									login_error('{$lang->index.wrong_password}');
								}else{
									if(result == 2) {
										document.location.href='{www}/me';
									} else {
										error('Unexpected response from login server', result);
										login_error('Unexpected response from login server, please try agian.');
									}
								}
							}
					});
				} else {
					login_error('{$lang->index.missing_field}');
				}

			}

			function disableContextMenu(){
				window.frames["iframeDisableRightClick"].document.oncontextmenu = function(){ return false; };	 
			}
			<?php if(isset($_GET['maxclones'])) echo 'login_error(\'{$lang->index.max_accounts}\', 10000);'; ?>

		</script>

		<div id="container" style="padding: 0; margin-top: -40px">
			<div id="middleContainer">
				<div id="containerHeader">
					<div id="inside">
						<img style="float: left;" src="{local_twistbook_webgallery}logo.gif">
						<div id="left"></div>
						<div id="right">
							<div id="containerHeaderBox" style="margin-top: -18px;height: 115px;">
								<input type="text" name="username" id="headerTextInput" class="loginUsername" placeholder="{$lang->index.username}">	
								<input type="password" name="password" id="headerTextInput" class="loginPassword" placeholder="{$lang->index.password}">

								<input id="submitGreen" style="margin-top: 7px;" type="submit" class="submitRight check_username_availability" value="{$lang->index.submit}">
								<?php
									$maxClones = ($server->countClones() > $core->settings->max_accounts);
									echo '<a href="{www}/quickregister/first"' . (($maxClones)?' onclick="login_error(\'{$lang->index.max_accounts}\', 10000); return false;"':'') . '><input id="submitBlack" style="margin-top: 7px; margin-right: 5px;" type="submit" class="submitRight" value="{$lang->index.register}"></a>'; 
								?>						
							</div>				
						</div>				
					</div>
				</div>

				<div id="containerMiddle">				
					<div class="redirectClass"></div>

					<div class="errorMessageOverlow loginBoxError" style="margin-top: 20px; width: 870px; display: none;"><ubuntu>Undefined error.</ubuntu></div>
					<div id="containerLeft">		
						<div id="containerSpace"></div>
						<iframe id="iframeDisableRightClick" onload="disableContextMenu();" scrolling="no" style="width: 591px; height: 235px; border: 0; margin-top: -1px;" src="{www}/widgets/news"></iframe>						
					</div>					
					<div id="containerRight">					
						<div id="containerSpace"></div>					
						<div class="boxContainer rounded" style="padding: 10px; width: 273px;">						
							<div style="padding: 10px; font-size: 18px; border-bottom: 1px solid #666666; font-weight: bold; margin-bottom: 5px;"><ubuntu>{$lang->stream.title2}</ubuntu></div>		
							<div style="max-height: 165px; overflow-y: scroll; overflow-x: hidden; margin-top: 5px; width: 250px; margin: auto;">
							
								<style type="text/css">
									.messageContainer {
										width: 100%;
										height: auto;
										border-bottom: 1px solid #CCCCCC;
										margin-bottom: 5px;
										display: table;
									}

									.messageContainer > .avatar {
										background-position: -10px -10px;
										width: 50px;
										height: 60px;
									}

									.messageContainer .text {
										width: 220px;
										margin-left: 55px;
										margin-bottom: -65px;
										font-size: 12px;
										font-family: Ubuntu;
										font-weight: normal;
									}

									.messageContainer .text b.agoTitle {
										color: #666666;
									}

									.messageContainer .text b.titleName {
										color: #CCCCCC;
									}
								</style>
								<?php 
									$result = $sql->query("SELECT s.* FROM habbocms_stream s INNER JOIN users u ON u.id = s.author ORDER BY published DESC LIMIT 25");
									while($row = $sql->fetch($result)) {
										$username = $users->data('username', $row['author'])[$row['author']];
								?>	<div class="messageContainer">							
										 <ubuntu>								
				 							<div class="text">									
												<b class="titleName"><a style="color: #CCCCCC;" href="{www}/home/<?php echo $username; ?>"><?php echo $username; ?></a> {$lang->stream.says}:</b><br />									
												<div style="height: 5px;"></div>								
													<?php echo $row['text']; ?><br>										
												<div style="height: 5px;"></div>
									
												<b class="agoTitle"><?php echo $core->timeAgo($row['published']); ?></b>									
											</div>									
										</ubuntu>							
										<div class="avatar" style="background-image: url(<?php echo $users->avatarimage(array('direction' => 2, 'head_direction' => 3, 'gesture' => 'sml'), $row['author']); ?>);"></div>							
									</div>
								<?php } ?>
							</div>
						</div>			
					</div>
				</div>		
			</div>
		</div>
	</body>
</html>