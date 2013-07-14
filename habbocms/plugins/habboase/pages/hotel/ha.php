<?php
  if(isset($_POST['message'], $_POST['link']) && $_POST['message'] != '') {
  	if(empty($_SESSION['habboase_last_ha']) || $_SESSION['habboase_last_ha'] + 600 < time()) {
  	  $command = 'ha';
  	  $message = $_POST['message'];
  	  if($_POST['link'] != '') {
		$command = 'hal';
		$message = $_POST['link'] . ' ' . $_POST['message'];
  	  } 
  	  $core->createLog('Sent a hotel alert' . (($command == 'hal')?' (with link)':''), $message, 3);
  	  $core->mus($command, $message);
  	  $_SESSION['habboase_last_ha'] = time();
  	  echo "<div class='message success close'><h2>Success!</h2><p>Your hotel alert has successfully sent.</p></div>";
    } else echo "<div class='message warning close'><h2>Warning!</h2><p>You have wait " . round(((($_SESSION['habboase_last_ha'] - time()) + 600) / 60)) . " minutes before you can send another hotel alert.</p></div>";
  }
?>
<h2>Hotel alert</h2>

<form method="post" action="#">
	<!-- Fieldset -->
	<fieldset>
		<legend>Hotel alert</legend>
		<p>
			<label for="link">Link (optinal): </label>
			 <input class="lf" name="link" type="text" value=""/>
			</p>
		<p>
			<textarea cols="80" rows="10" name="message" maxlength="450"></textarea>
		</p>
		<p>
			<input class="button" type="submit" value="Submit" />
			<input class="button" type="reset" value="Reset" />
		</p>
	</fieldset>
	<!-- End of fieldset -->
</form>
<!-- End of Form -->
<p>There is 10 mins cooldown on Hotel alerts.</p>
