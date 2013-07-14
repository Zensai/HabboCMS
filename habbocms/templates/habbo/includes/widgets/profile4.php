<?php
 $lang->addTranslation('profiletab4');

 $error = '';
 $success = '';
 if(isset($_POST['current_pw'], $_POST['new_pw'], $_POST['re_pw'])){
   if(!empty($_POST['current_pw']) && !empty($_POST['new_pw']) && !empty($_POST['re_pw'])) {
     if($core->hash($_POST['current_pw']) == $users->data('password')) {
       if($_POST['new_pw'] == $_POST['re_pw']) {
       	 if(is_within(strlen($_POST['new_pw']), 6, 30)) {
	         $result = $sql->query("UPDATE users SET password = '" . $core->hash($_POST['new_pw']) . "' WHERE id = '" . IDENTITY . "'");
	         if($result) {
	         	$success = '{$lang->profile.success}';
	         } else $error = '{$lang->profile.error_unknown}';
         } else $error = '{$lang->profile.error_wronglength}';
       } else $error = '{$lang->profile.error_notmatching}';
     } else $error = '{$lang->profile.error_wrongpw}';
   } else $error = '{$lang->profile.error_missingfield}';
 }
 
 if($error) echo '<div class="rounded rounded-red">' . $error . '<br /></div>';
 elseif($success) echo '<div class="rounded rounded-green">' . $success . '<br /></div>';
?>
<h3>{$lang->profile.changepass}</h3>
<p>
  {$lang->profile.changepass_desc}
</p>
<form action="" method="POST" id="profileForm">
  <h3>{$lang->profile.currentpw}:</h3>
  <input type="password" name="current_pw" size="32" maxlength="32" id="password" /></label><br/>
  <h3>{$lang->profile.newpw}:</h3>
  <input type="password" name="new_pw" size="32" maxlength="32" id="password" /></label>
  <h3>{$lang->profile.newrepw}:</h3>
  <input type="password" name="re_pw" size="32" maxlength="32" id="password" /></label>
  <div class="settings-buttons">
	<a href="#" class="new-button" style="display: none" id="profileForm-submit"><b>{$lang->profile.save}</b><i></i></a>
	<noscript><input type="submit" value="{$lang->profile.save}" name="save" class="submit" /></noscript>
  </div>
</form>