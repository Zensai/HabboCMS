<?php
if (isset($_GET['username'], $_GET['badge_id']) && c_filter($_GET['username']) != '' && h_filter($_GET['badge_id']) != '') {
  $username = c_filter($_GET['username']);
  $user_id = $users->get_info('id', $username);
  $badge_id = h_filter($_GET['badge_id']);
  if (numrows_d("SELECT * FROM user_badges WHERE user_id = '" . $user_id . "' AND badge_id = '" . $badge_id . "' LIMIT 1") != 1) {  
    if ($users->name_taken($username)) {
      $db->query("INSERT INTO user_badges (user_id,badge_id) VALUES ('" . $user_id . "','" . $badge_id . "')");
      echo '<div class="message success close"><h2>Success!</h2><p>Gave <b>' . $username  . '</b> badge <b>' . $badge_id . '</b></p></div>';
    } else echo '<div class="message error close"><h2>Error!</h2><p>That user does not exists.</p></div>';
  } //else echo '<div class="message warning close"><h2>Warning!</h2><p>' . $username . ' allready has the badge ' . $badge_id . '</p></div>';
}
?>
<h2>Give user badge</h2>

<form method="GET" action="<?php echo ASE; ?>give_badge?reefered=lookup?username=Ole&#35;badges">
  <fieldset>
    <p>
      <label for="username">Username:</label>
      <input class="sf" name="username" type="text" value="<?php if(isset($_GET['username'])) echo c_filter($_GET['username']); else if(isset($_GET['username_input'])) echo c_filter($_GET['username_input']); ?>" />
    </p>
    <p>
      <label for="badge_id">Badge: </label>
      <input class="sf" name="badge_id" type="text" value="<?php if(isset($_GET['badge_id'])) echo c_filter($_GET['badge_id']); else if(isset($_GET['badge_input'])) echo c_filter($_GET['badge_input']); ?>" />
    </p>
    <p>
      <input class="button" type="submit" value="Submit" />
      <input class="button" type="reset" value="Reset" />
    </p>
  </fieldset>
</form>