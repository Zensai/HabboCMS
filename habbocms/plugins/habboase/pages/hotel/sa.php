<?php
  if(isset($_POST['message'])) {
  	$message = "\n" . $_POST['message'] . "\n\n[Sent from HK by " . $users->data('username') . "]";
  	$core->createLog('Sent a staff alert via ASE', $message, 3);
  	$core->mus('sa', $message);
  	echo "<div class='message success close'><h2>Success!</h2><p>Your staff alert has successfully sent.</p></div>";
  }
?>
<h2>Staff alert</h2>

<form method="post" action="#">
	<!-- Fieldset -->


		<p>
			<textarea cols="80" rows="10" name="message" maxlength="450"></textarea>
		</p>
		<p>
			<input class="button" type="submit" value="Submit" />
			<input class="button" type="reset" value="Reset" />
		</p>
	<!-- End of fieldset -->
</form>
<!-- End of Form -->
