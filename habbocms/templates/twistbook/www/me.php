<?php
	$core->requireLogin();
	if(isset($_GET['updatemotto']) && mottoFilter($_GET['updatemotto'] != '')) {
		echo "Let's update motto.";
	}

	$skin->styleset('general');

	new HabboTranslator('me');

	$menu = 'me';
	$page = 'me';
?>
<html>
<head>
	<title>{sitename} - {username}</title>
	{styleset}
</head>
<body onkeydown="onKeyDown()">
<div class="overlowLoadingContainer loginSwitchOpenLoad" style="display: none;">
	<div class="overlowLoading" style="background: url({webgallery}general/overlow/floatBackground.png) repeat;">
    	<div class="progressContainer">
        	<center>
            	<img src="{webgallery}icons/progress_habbos.gif">
            </center>
            <div class="loading"><div class="loginSwitchLoadText">{$lang->loading_login}...</div></div>
       	</div>
    </div>
    
</div>
<?php
	include $skin->includes('standard.php');
	include $skin->includes('system/standard.php');
	if(!$identity->maxClones()) include $skin->includes('widgets/users/add_avatar.php', false);

	include $skin->includes('template/header_top.php', false);
?>
<script>
$(document).ready(function(e) {
    $('.updateMottoOnMe').click(function(){
		$('.updateMottoOnMe').hide();
		$('.updateMottoOnMeInput').show();
	});
	$('.updateMottoOnMeInput').keypress(function(e){
		if(e.which == 13) {
			$('.updateMottoOnMeInput').hide();
			$('.updateMottoOnMe').html($('.updateMottoOnMeInput').val());
			$('.updateMottoOnMe').show();
			$.post("{www}/me?updatemotto=yes", { motto: $('.updateMottoOnMeInput').val() });
    	}
	});
});
</script>

<div id="container">
	
	<div id="middleContainer">
	
		<?php include("apps/system/container_header.php"); ?>

		<div id="containerMiddle">
		
			<div class="containerMeInfo">
			
				<div class="avatarPlace">
				
					<img src="<?php echo $identity->avatarimage(array('direction' => 2, 'head_direction' => 3)); ?>">
				
				</div>
				
				<div class="infoPlace">
				
					<div class="container"><b>{$lang->profile_username}</b>:<br> {username}</div>
					
					<div class="container middle updateMottoContainer"><b>{$lang->profile_motto}</b>:<br><div class="updateMottoOnMe">{motto}</div><input type="text" class="updateMottoOnMeInput" maxlength="70" style="display: none;" value="{motto}"></div>
					
					<div class="container last"><b>{$lang->profile_user_info_last_login}</b>:<br>{last_online}</div>
				
				</div>
				
				<div class="buttonPlace">
                	<?php 
                		if($core->settings->client_status == 'open' || $core->permission('ignore_closed_client')) {
                			echo '<a onClick="Popup=window.open(\'{www}/client\',\'Popup\',\'toolbar=no, location=no,status=no,menubar=no,scrollbars=yes,resizable=no, width=1000,height=500\'); return false;"><div class="checkin"><div class="text">{$lang->me_we_are}<div class="title">{$lang->me_hotel_\'.$core->CmsSetting(\'client_status\').\'}</div></div></div></a>';
                		}
                	?>

                	<div class="checkin"><div class="text">{$lang->me_we_are}<div class="title">{$lang->me_hotel_'.$core->CmsSetting('client_status').'}</div></div></div>
				</div>
			</div>

			<div id="containerLeft">
			
				<div id="containerSpace"></div>

				<iframe id="iframeDisableRightClick" onload="disableContextMenu();" scrolling="no" style="width: 591px; height: 235px; border: 0; margin-top: -1px;" src="{www}/widgets/news"></iframe>
				
				<div id="containerSpace"></div>

				<div class="boxContainer rounded">

					<div class="boxHeader left rounded lightblue">
                    	<ubuntu>
							{$lang->me_my_users} 
                            <?php 
							$query_count_up_accounts = mysql_num_rows(mysql_query("SELECT * FROM users WHERE ip_reg = '".$_SERVER['REMOTE_ADDR']."'"));
							if($query_count_up_accounts >= $limit_ip_users){ }else{
							?>
                    		<img title="<?php echo $language["me_add_user"]; ?>" id="onclickOpenAddUser" align="right" style="cursor: pointer;padding-top: 0px;padding-right:5px;" src="{webgallery}icons/plus_icon.gif">
                            <?php } ?>
                            
                    	</ubuntu>	
                   	</div>

					<div style="max-height: 280px; overflow-y: auto; overflow-x: hidden;">
					
						<script>
						$(document).ready(function() {

							$('.OnclickOpenLoadLogin').click(function() { 
								$('.loginSwitchOpenLoad').show();
							});

						}); 
						</script>
					
						<?php 
						$query_myusers = mysql_query("SELECT * FROM users WHERE user_bind_id = '".sqlFilter($users->UserInfo($username, 'user_bind_id'))."' ORDER BY last_online DESC");
						$myuserscounter = mysql_num_rows($query_myusers);
						$color = 'dark';
						
						$direction = 'Left';
						
						while($myUsers = mysql_fetch_array($query_myusers)){
						?>
                        
                        <script>
						$(document).ready(function(e) {
                            $('.loginOnclick<?php echo $myUsers['id']; ?>').click(function(){
								$.post("{www}/logout", function(php){
									$.post("{www}/login?switchLogin=yes&username=<?php echo $myUsers['username']; ?>&password=<?php echo $myUsers['password']; ?>", { username: '<?php echo $myUsers['username']; ?>', password: '<?php echo $myUsers['password']; ?>' }, function(){
										document.location.href='{www}/me';
									});
								});
							});
                        });
						</script>
						
							<div class="userContainer<?php echo $direction; ?> <?php echo $color; ?> <?php if($myUsers['id'] == sqlFilter($users->UserInfo($username, 'id'))){ ?>selected<?php } ?>">
							
								<div class="inside">
							
										<div class="avatar" style="background-image: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $myUsers['look']; if($direction == 'Right'){ echo '&direction=4&head_direction=3&gesture=sml'; }elseif($direction == 'Left'){ echo '&direction=2&head_direction=3&gesture=sml'; } ?>.gif);"></div>
							
										<div class="right">
								
											<div class="middle">
									
												<div class="name"><ubuntu><?php echo $myUsers['username']; ?></ubuntu></div>
												<div class="info"><ubuntu><b>{$lang->profile_user_info_last_login}:</b> <?php echo $core->timeAgo($myUsers['last_online']); ?></ubuntu></div>
									
											</div>
										
											<input type="hidden" name="username" value="<?php echo $myUsers['username']; ?>">
										
											<input type="hidden" name="password" value="<?php echo $myUsers['password']; ?>">
									
											<input type="submit" class="submit<?php if($direction == 'Right'){ echo 'Left'; }elseif($direction == 'Left'){ echo 'Right'; } ?> OnclickOpenLoadLogin loginOnclick<?php echo $myUsers['id']; ?>" id="submitBlack" value="{$lang->log_in}">
									
										</div>
								
								</div>
							
							</div>
	
						<?php
						if($color == 'dark'){ $color = 'light'; }else{ $color = 'dark'; }
						if($direction == 'Left'){ $direction = 'Right'; }else{ $direction = 'Left'; }
						}if($myuserscounter < 2){
							echo '
								<div class="errorMessageOverlow" style="width: 544px;">
	
									'.$language['me_users_not_found'].'
		
								</div>
							';
						}
						?>
					
					</div>

				</div>
				
			</div>

			<div id="containerRight">
			
				<div id="containerSpace"></div>
				
				<div class="boxContainer rounded" style="width: 281px; height: 220px;">
				
					<div style="display: table; width: 275px;">
					
						<div id="newsTitleLine">
						
							{$lang->menu_community_news} 
							
						</div>
					
						<?php
						$query_headlines = mysql_query("SELECT * FROM cms_news ORDER BY published DESC LIMIT 5");
						while($headlines = mysql_fetch_array($query_headlines)){
						?>
				
						<div id="<?php if(isset($_GET['id']) && sqlFilter($_GET['id']) == $headlines['id']){ echo 'darkFilledArrowLeft'; }else{ echo 'darkArrowRight'; } ?>" class="headlineArrow"></div> 
						
						<div id="nextArrowHeadlineContainer" style="width: 249px;">
						
							<div id="nextArrowHeadline"><a href="{www}/news/<?php echo $headlines['id']; ?>"><?php if(isset($_GET['id']) && sqlFilter($_GET['id']) == $headlines['id']){ ?><b><?php echo $headlines['title']; ?></b><?php }else{ ?><?php echo $headlines['title']; ?><?php } ?></a></div>
							
							<br>
							
							<br>
						
							<div style="margin-top: -8px; font-size: 10px;"><ubuntu><?php echo $core->timeToDate($headlines[], "d-m-Y H:i"); ?></ubuntu></div>
						
						</div>
						
						<br>
						
						<br>
						
						<?php } ?>
						
						<div class="newsLoadMore" style="padding-top: 5px;" onClick="location.href='{www}/news/<?php echo $core->getNewestNews(); ?>'"><ubuntu>{$lang->load_more_news_messages}</ubuntu></div>
					
					</div>
					
				</div>
				
				<?php include("apps/widgets/donation_widget.php"); ?>

				<?php //include("apps/widgets/twitter_widget.php"); ?>
				
				<div id="containerSpace"></div>

				<div class="boxContainer rounded">

					<div class="boxHeader right rounded darkRed"><ubuntu>{$lang->poll_title}</ubuntu></div>
					
					<?php include("apps/widgets/poll_widget.php"); ?>
					
					<script>
					$(document).ready(function() {

						$('.SubmitPoll').click(function() { 
							$('.overlowPostPollVoteLoading').fadeIn('slow');
						});

					}); 
					</script>
					
				</div>

			</div>

		</div>
	
	</div>

</div>

</body>
</html>
