<?php
  $lang->addTranslation('profiletab1');

  if(isset($_POST['motto']) && isset($_POST['showOnlineStatus']) && isset($_POST['followFriendMode'])) {
    $motto = mottoFilter($_POST['motto']);
    $hide_friends = (isset($_POST['friendRequestsAllowed']))?'0':'1';
    $hide_online = nullOne($_POST['showOnlineStatus']);
    $hide_room = nullOne($_POST['followFriendMode']);
    $result = $sql->query("UPDATE users SET motto = '" . $motto . "', hide_online = '" . $hide_online . "', block_newfriends = '" . $hide_friends . "', hide_inroom = '" . $hide_room . "' WHERE id = '" . IDENTITY . "'");
    $core->mus('updatemotto', IDENTITY);
    if($result) {
	    echo '<div class="rounded rounded-green">
			{$lang->profile.update_success}<br />
		</div>';
    } else {
	    echo '<div class="rounded rounded-red">
			{$lang->profile.update_error}<br />
                        <!-- Developer information: ' . mysql_error() . ' -->
		</div>';
    }
  }

?>
<form action="" method="POST" id="profileForm">
<h3>{$lang->profile.yourmotto}</h3>
<p>
  {$lang->profile.motto_desc}
</p>
<p>
  <label>{$lang->profile.motto}: <input type="text" name="motto" size="32" maxlength="32" value="<?php echo htmlspecialchars($users->data('motto'), ENT_QUOTES); ?>" id="avatarmotto" /></label>
</p>

<h3>{$lang->profile.friendrequests}</h3>
<p>
<label><input type="checkbox" name="friendRequestsAllowed"<?php if($users->data('blocking_requests') == '0') echo ' checked="checked"'; ?> value="true"/>{$lang->profile.friendrequests_enabled}</label>
</p>


<h3>{$lang->profile.onlinestatus}</h3>
<p>
  {$lang->profile.onlinestatus_desc}:<br />
  <label><input type="radio" name="showOnlineStatus" value="1"<?php if($users->data('hide_online') == '1') echo ' checked="checked"'; ?>/>{$lang->profile.nobody}</label>
  <label><input type="radio" name="showOnlineStatus" value="0"<?php if($users->data('hide_online') == '0') echo ' checked="checked"'; ?>/>{$lang->profile.everyone}</label>
</p>


<h3>{$lang->profile.followme}</h3>
<p>
  {$lang->profile.followme_desc}:<br />
  <label><input type="radio" name="followFriendMode" value="1"<?php if($users->data('hide_inroom') == '1') echo ' checked="checked"'; ?>/>{$lang->profile.nobody}</label>
  <label><input type="radio" name="followFriendMode" value="0"<?php if($users->data('hide_inroom') == '0') echo ' checked="checked"'; ?>/>{$lang->profile.myfriends}</label>
</p>



<div class="settings-buttons">
  <a href="#" class="new-button" style="display: none" id="profileForm-submit"><b>{$lang->profile.save}</b><i></i></a>
  <noscript><input type="submit" value="{$lang->profile.save}" name="save" class="submit" /></noscript>
</div>

</form>