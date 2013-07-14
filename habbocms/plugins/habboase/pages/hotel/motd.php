<?php
  if(isset($_POST['motd'])) {
    $motd = sqlFilter(filter($_POST['motd']));
    $motd = str_replace("<br>", "\n", $motd);
    $core->createLog('Updated the MOTD.', $motd, 3);
    $sql->query("UPDATE server_settings SET motd = '" . $motd . "'");
    $core->mus('updatesettings');
    echo "<div class='message success close'><h2>Success!</h2><p>Message of the day updated, server_settings was updated via MUS.</p></div>";
  }
?>

<h2>Message of the day</h2>

<form method="post" action="#">
  <!-- Fieldset -->


    <p>
      <textarea cols="80" rows="10" name="motd"><?php echo $sql->result("SELECT motd FROM server_settings"); ?></textarea>
    </p>
    <p>
      <input class="button" type="submit" value="Submit" />
      <input class="button" type="reset" value="Reset" />
    </p>
  <!-- End of fieldset -->
</form>
<!-- End of Form -->