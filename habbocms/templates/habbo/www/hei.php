<?php
	$core->requireLogin();
	define('PARENT', '1');
	define('CHILD', '6');	

	$lang->addTranslation('me');

	$html->setKey(array(
		'motto' => $users->data('motto'),
		'lastlogin' => $core->timeToDate($users->data('last_online')),
		'avatarimage' => $users->avatarimage(array('direction' => 3, 'head_direction' => 3)),
	));

	var_dump($core->permission('ignore_maintenance'));
	exit;
	
	$skin->install('{$lang->me.pagetitle}', 'me', true);
?><div id="container">
	<div id="content" style="position: relative" class="clearfix">
		<div id="wide-personal-info">
			<div id="habbo-plate">
				<a href="#">
					<img alt="{username}" src="{avatarimage}"/>
				</a>
			</div>
			<div id="name-box" class="info-box">
				<div class="label">{$lang->me.name}:</div>
				<div class="content">{username}</div>
			</div>
			<div id="motto-box" class="info-box">
				<div class="label">{$lang->me.motto}:</div>
				<div class="content">{motto}</div>
			</div>
			<div id="last-logged-in-box" class="info-box">
				<div class="label">{$lang->me.last_online}:</div>
				<div class="content">{lastlogin}</div>
			</div>
			<div class="enter-hotel-btn">
				<div class="open enter-btn">
					<a href="{www}/client" target="{session_token}" onclick="HabboClient.openOrFocus(this); return false;">{$lang->me.enter}<i></i></a><b></b>
				</div>
			</div>
		</div>
		<?php require $skin->widget('campains'); ?>

		<div id="column1" class="column">
			<div class="habblet-container ">
				<div id="twitterfeed-habblet-container">
					<div id="twitterfeed-habblet-content"></div>
					<script>new TWTR.Widget({
						version: 2,
						id: 'twitterfeed-habblet-content',
						type: 'profile',
						rpp: 5,
						interval: 30000,
						width: 453,
						height: 163,
						theme: {
							shell: {
							background: '#4a4d4f',
							color: '#ffffff'
							},
							tweets: {
							background: '#ffffff',
							color: '#4a4d4f',
							links: '#fe6301'
							}
						},
						features: {
							scrollbar: true,
							loop: false,
							live: false,
							behavior: 'default'
						}}).render().setUser('{hotel_twitter}').start();
					</script>
				</div>
			</div>
			<script type="text/javascript">if (!$(document.body).hasClassName('process-template')) { Rounder.init(); }</script>

		</div>


		<div id="column1" class="column"></div>
		<div id="column2" class="column">
			<div class="habblet-container ">
				<div class="ad-container">
					<?php require $skin->widget('ads1'); ?>
				</div>
			</div>
		</div>
		
		<div id="column3" class="column">
			<div class="habblet-container ">
				<div class="ad-container">
					<?php require $skin->widget('ads2'); ?>
				</div>
			</div>
		</div>
		<!--[if lt IE 7]>
			<script type="text/javascript">
				Pngfix.doPngImageFix();
			</script>
		<![endif]-->

<?php require $skin->widget('footer'); ?>