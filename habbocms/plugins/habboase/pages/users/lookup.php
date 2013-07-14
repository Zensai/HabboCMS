<?php
	$continue = true;
	$id = false;
	if(isset($_GET['id'])) {
		if($users->exists(intval($_GET['id']))) {$id = intval($_GET['id']);$continue=false;}else echo '<div class="message error close"><h2>Error!</h2><p>That user ID does not exists.</p></div>';
	} elseif(isset($_GET['username'])) {
		$id = $users->username2id(usernameFilter($_GET['username']));
		if($id) $continue = false; else echo '<div class="message error close"><h2>Error!</h2><p>That username does not exists.</p></div>';
	}

	if($id) {
		$userinfo = $users->data('*', $id);
?>
<h1>User information about <?php echo $userinfo['username}</h1>
			<div class="pad20">

			<!-- Tabs -->
			<div id="tabs">
				<ul>
					<li><a href="#info">Basic info</a></li>
					<li><a href="#clones">Clones</a></li>
					<li><a href="#logs">Account Logs</a></li>
					<li><a href="#rooms">Rooms</a></li>
					<li><a href="#badges">Badges</a></li>
					<li><a href="#furni">Furnis</a></li>
					<li><a href="#cfh">CFH</a></li>
				</ul>
			
				<!-- First tab -->
				<div id="info">
					<?php
						if(isset($_POST['username'], $_POST['password'], $_POST['email'], $_POST['rank'], $_POST['credits'], $_POST['pixels'], $_POST['vippoints'], $_POST['motto']) && $core->permission('ase_users_edit')) {
							$username = ($core->permission('ase_users_edit_username'))?usernameFilter($_POST['username']):$userinfo['username'];
							$password = ($core->permission('ase_users_edit_password') && $_POST['password'] != '')?$core->hash($_POST['password']):$userinfo['password'];
							$email = ($core->permission('ase_users_edit_email'))?emailFilter($_POST['email']):$userinfo['mail'];
							$rank = ($core->permission('ase_users_edit_rank'))?intval($_POST['rank']):$userinfo['rank'];
							$credits = ($core->permission('ase_users_edit_credits'))?intval($_POST['credits']):$userinfo['credits'];
							$pixels = ($core->permission('ase_users_edit_pixels'))?intval($_POST['pixels']):$userinfo['activity_points'];
							$vippoints = ($core->permission('ase_users_edit_points'))?intval($_POST['vippoints']):$userinfo['vip_points'];
							$motto = ($core->permission('ase_users_edit_motto'))?mottoFilter($_POST['motto']):$userinfo['motto'];
							if($core->permission('ase_users_edit_vip')) {
								$vip = (isset($_POST['vip']))?'1':'0';
							} else $vip = $userinfo['vip'];
							

							$error = false;
							if($users->username2id($username) && $username != $userinfo['username']) {
								$error = 'That username is allready taken.';
							} elseif(!validEmail($email)) {
								$error = 'That is not a valid email address.';
							} elseif($sql->count("SELECT rank FROM permissions_ranks WHERE rank = '" . $rank . "' LIMIT 1") != 1) {
								$error = 'That rank group does not exists.';
							} elseif(!$error) {
								$log = '';
								$log .= ($username != $userinfo['username'])?"Username from " . $userinfo['username'] . " to " . $username . "\n":"";
								$log .= ($password != '')?"Password to " . sqlFilter($_POST['password']) . "\n":"";
								$log .= ($email != $userinfo['mail'])?"Email from " . $userinfo['mail'] . " to " . $email . "\n":"";
								$log .= ($rank != $userinfo['rank'])?"Rank from " . $userinfo['rank'] . " to " . $rank . "\n":"";
								$log .= ($credits != $userinfo['credits'])?"Credits from " . $userinfo['credits'] . " to " . $credits . "\n":"";
								$log .= ($pixels != $userinfo['activity_points'])?"Diamonds from " . $userinfo['activity_points'] . " to " . $pixels . "\n":"";
								$log .= ($vippoints != $userinfo['vip_points'])?"Shells from " . $userinfo['vip_points'] . " to " . $vippoints . "\n":"";
								$log .= ($motto != $userinfo['motto'])?"Motto from " . $userinfo['motto'] . " to " . $motto . "\n":"";
								$log .= ($vip != $userinfo['vip'])?"VIP from " . $userinfo['vip'] . " to " . $vip . "\n":"";
								$core->createLog('Edited ' . $userinfo['username'] . '\'s data information.', $log, 3);

								$sql->query("UPDATE users SET username = '" . $username . "', password = '" . $password . "', mail = '" . $email . "', rank = '" . $rank . "', credits = '" . $credits . "', activity_points = '" . $pixels . "', vip_points = '" . $vippoints . "', motto = '" . $motto . "', vip = '" . $vip . "' WHERE id = '" . $id . "' LIMIT 1");
								$core->mus('updatevip', $id);
								$core->mus('updatecredits', $id);
								$core->mus('updatemotto', $id);
								$core->mus('updatepoints', $id);
								$core->mus('updatepixels', $id);
								$userinfo = $users->data('*', $id);
								echo '<div class="message success close"><h2>Success!</h2><p>Updated user data.</p></div>';
							}

							if($error) echo '<div class="message error close"><h2>Oops!</h2><p>' . $error . '</p></div>';
						}
					?>
					<!-- Form -->
					<form method="post" action="#">
						<!-- Fieldset -->
						<fieldset>
							<legend>Basic user information</legend>
							<p>
								<label>UserID:</label> <?php echo $id; ?>
							</p>
							<p>
								<label for="username">Username: </label>
								<input class="mf" name="username" type="text" value="<?php echo $userinfo['username}" />
							</p>
							<p>
								<label for="password">Password: </label>
								<input class="mf" name="password" type="text" value="" />
								<span class="field_desc">Leave blank if you don't want to change the password.</span>
							</p>
							<p>
								<label for="email">Email: </label>
								<input class="mf" name="email" type="text" value="<?php echo $userinfo['mail}" /> 
							</p>
							<p>
								<label for="rank">Rank: </label>
								<input class="sf" name="rank" type="text" value="<?php echo $userinfo['rank}" /> 
							</p>
							<p>
								<label for="credits">Credits: </label>
								<input class="sf" name="credits" type="text" value="<?php echo $userinfo['credits}" /> 
							</p>
							<p>
								<label for="pixels">Diamonds: </label>
								<input class="sf" name="pixels" type="text" value="<?php echo $userinfo['activity_points}" /> 
							</p>
							<p>
								<label for="vippoints">Shells: </label>
								<input class="sf" name="vippoints" type="text" value="<?php echo $userinfo['vip_points}" /> 
							</p>
							<p>
								<label for="motto">Motto: </label>
								<input class="lf" name="motto" type="text" value="<?php echo $userinfo['motto}" /> 
							</p>
							<p>
								<label for="vip">VIP: </label>
								<input type="checkbox" name="vip"<?php if($userinfo['vip'] == 1) echo ' checked="checked"'; ?> />
							</p>
							<p>
								<label>Join date:</label> <?php echo $core->timeToDate($userinfo['account_created']); ?>
							</p>
							<p>
								<label>Last Online:</label> <?php echo $core->timeToDate($userinfo['last_online']); ?>
							</p>
							<p>
								<label>Online now:</label> <?php echo ($userinfo['online'])?'Yes':'No'; ?>
							</p>
							<p>
								<label>Register IP:</label> <?php echo $userinfo['ip_reg}
							</p>
							<p>
								<label>Last IP:</label> <?php echo $userinfo['ip_last}
							</p>
							<?php 
								if($core->permission('ase_users_edit')) echo '<p><input class="button" type="submit" value="Edit" /></p>';
							?>
						</fieldset>
						

						<p>
							<a href="<?php echo ASE; ?>users/lookup" class="button tooltip" title="Lookup a new user"><span class="ui-icon ui-icon-search"></span>New search</a> <a href="#" class="button tooltip" title="This will permanent ban the user with this reason: 'Account disabled for further investigasion, please check back later!'"><span class="ui-icon ui-icon-trash"></span>Quick ban</a><?php if($core->permission('ase_users_fakelogin')) echo ' <a href="' . ASE . 'users/lookup?id=' . $id . '&fakelogin" class="button tooltip" title="Creates a client session for that user."><span class="ui-icon ui-icon-newwin"></span>Fake login</a>'; ?> <a href="#" class="button tooltip" title="Click to add new badge"><span class="ui-icon ui-icon-newwin"></span>Reset password</a>
						</p>
						<!-- End of fieldset -->
					</form>
					<!-- End of Form -->	
				</div>
				<!-- End of First tab -->

				<div id="clones">
					<table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
					<thead>
						<tr>
						<td>ID</td>
						<td>Username</td>
						<td>Credits</td>
						<td>Shells</td>
						<td>Diamonds</td>
						<td>Online</td>
						<td></td>
						</tr>
					</thead>
					<tbody>
						<?php
						 $result = $sql->query("SELECT id,username,credits,vip_points,activity_points,online FROM users WHERE ip_last = '" . $userinfo['ip_last'] . "' OR ip_reg = '" . $userinfo['ip_reg'] . "'");
						 if($sql->count($result, false) > 0) {
						 $class = 'odd';
						 while ($row = $sql->fetch($result)) {
							echo '
						<tr class="' . $class . '">
							<td>' . $row["id"] . '</td>
							<td>' . $row["username"] . '</td>
							<td>' . $row["credits"] . '</td>
							<td>' . $row["vip_points"] . '</td>
							<td>' . $row["activity_points"] . '</td>
							<td>' . (($row["online"] == '1')?'Yes':'No') . '</td>
							<td><a href="' . ASE . 'users/lookup?id=' . $row['id'] . '" class="button tooltip"><span class="ui-icon ui-icon-wrench"></span>Lookup</a></td>
						</tr>
							';
							if($class == 'odd') $class = ''; else $class = 'odd';
						 }
						} else echo '<tr><td>No rooms found.</td></tr>'
						?>
					</tbody>
					</table>
				</div>
				
				<!-- Second tab -->
				<div id="logs">
					<p>A simple full width table (comming soon)</p>
					<p>Cras adipiscing, nisl ut rutrum vulputate, risus eros tincidunt justo, pellentesque dapibus elit massa vel risus. Nulla ac leo in ipsum sodales malesuada. Cras sit amet est nisl, at tristique augue. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
				</div>
				<!-- End of Second tab -->
				
				<!-- Third tab -->
				<div id="rooms">
					<table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
					<thead>
						<tr>
						<td>ID</td>
						<td>Roomname</td>
						<td>State</td>
						<td>Users in room</td>
						<td>Allow pets</td>
						<td>Owner</td>
						<td>Action</td>
						</tr>
					</thead>
					<tbody>
						<?php
						 $result = $sql->query("SELECT id,caption,description,state,password,users_now,users_max,allow_pets FROM rooms WHERE owner = '" . $userinfo['username'] . "'");
						 if($sql->count($result, false) > 0) {
						 $class = 'odd';
						 while ($row = $sql->fetch($result)) {
							echo '
						<tr class="' . $class . '">
							<td>' . $row["id"] . '</td>
							<td title="' . $row["description"] . '" class="tooltip">' . $row["caption"] . '</td>
							<td title="' . (($row["state"] == 'password')?$row["password"]:'') . '" class="tooltip">' . $row["state"] . '</td>
							<td>' . $row["users_now"] . '/' . $row["users_max"] . '</td>
							<td>' . (($row["allow_pets"])?'Yes':'No') . '</td>
							<td>' . $userinfo['username'] . '</td>
							<td><a href="#" class="button tooltip"><span class="ui-icon ui-icon-wrench"></span>Edit</a></td>
						</tr>
							';
							if($class == 'odd') $class = ''; else $class = 'odd';
						 }
						} else echo '<tr><td>No rooms found.</td></tr>'
						?>
					</tbody>
					</table>
					<!-- End of Framework Icons -->
				</div>
				<!-- End of Third tab -->

				<!-- Third tab -->
				<div id="badges">
					<?php
						if(isset($_POST['slot'], $_POST['badge']) && commonFilter($_POST['badge']) != '' && $core->permission('ase_users_givebadge')) {
							$slot = intval($_POST['slot']);
							$badge = commonFilter($_POST['badge']);
							$hasbadge = ($sql->count("SELECT user_id FROM user_badges WHERE user_id = '" . $userinfo['id'] . "' AND badge_id = '" . $badge . "' LIMIT 1") == 1)?true:false;
							$spotstaken = ($slot != 0 && $sql->count("SELECT user_id FROM user_badges WHERE user_id = '" . $userinfo['id'] . "' AND badge_slot = '" . $slot . "' LIMIT 1") == 1)?true:false;
							if($spotstaken) {
								echo '<div class="message error close"><h2>Oops!</h2><p>That badge spot is allready, please try another or set it to 0.</p></div>';
							} elseif($hasbadge) {
								echo '<div class="message error close"><h2>Oops!</h2><p>It seems like ' . $userinfo['username'] . ' allready have that badge!</p></div>';
							} else {
								$core->createLog('Gave a badge to ' . $userinfo['username'], $badge, 2);
								$sql->query("INSERT INTO user_badges (user_id,badge_id,badge_slot) VALUES ('" . $id . "','" . $badge . "','" . $slot . "')");
								echo '<div class="message success close"><h2>Success!</h2><p>Gave ' . $userinfo['username'] . ' badge ' . $badge . '.</p></div>';
							}
						} elseif(isset($_GET['deletebadge']) && commonFilter($_GET['deletebadge']) != '' && $core->permission('ase_users_givebadge')) {
							$badge = commonFilter($_GET['deletebadge']);
							$core->createLog('Deleted badge from ' . $userinfo['username'], $badge, 2);
							$sql->query("DELETE FROM user_badges WHERE user_id = '" . $id . "' AND badge_id = '" . $badge . "'");
							echo '<div class="message success close"><h2>Success!</h2><p>Badge deleted.</p></div>';
						}
					?>
					<table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
					<thead>
						<tr>
						<td>Slot</td>
						<td>Badge</td>
						<td>Delete</td>

						</tr>
					</thead>
					<tbody>
						<?php
						 $result = $sql->query("SELECT * FROM user_badges WHERE user_id = '" . $id . "' ORDER BY badge_slot DESC");
						 if($sql->count($result, false) > 0) {
						 $class = 'odd';
						 while ($row = $sql->fetch($result)) {
							echo '
						<tr class="' . $class . '">
							<td>' . $row["badge_slot"] . '</td>
							<td><img src="' . $core->settings->gordon . 'c_images/album1584/' . $row["badge_id"] . '.gif" alt="' . $row["badge_id"] . '" title="' . $row["badge_id"] . '"></td>
							<td><a href="' . ASE .'users/lookup?id=' . $id . '&deletebadge=' . $row["badge_id"] . '#badges">Delete</a></td>
						</tr>
							';
							if($class == 'odd') $class = ''; else $class = 'odd';
						 }
						} else echo '<tr><td>No badges found.</td></tr>';

						if($core->permission('ase_users_givebadge')) {
							echo '
							<form action="' . ASE . 'users/lookup?id=' . $id . '#badges" method="POST">
							<tr class="' . $class . '">
								<td><input class="sf" name="slot" type="text" value="' . ((isset($_POST['slot']))?intval($_POST['slot']):'0') . '"></td>
								<td><input class="mf" name="badge" type="text" value="' . ((isset($_POST['badge']))?commonFilter($_POST['badge']):'') . '"></td>
								<td><input class="button" type="submit" value="Submit" /></td>
							</tr></form>';

						} ?>
					</tbody>
					</table>
				</div>
				<!-- End of Third tab -->

				<div id="furni">
					Comming soon.
				</div>

				<div id="cfh">
					Comming soon.
				</div>

				</div>
				<!-- End of Tabs -->

			</div>
<?php
	} 

	if($continue) {
		echo '<h2>Lookup user and information</h2>';
		echo '
			<form action="" method="GET">
				<label for="username">Username: </label>
				<input name="username" type="text" value="" />
				<span><input class="button" type="submit" value="Submit" /></span>
			</form>
		';
	}
?>