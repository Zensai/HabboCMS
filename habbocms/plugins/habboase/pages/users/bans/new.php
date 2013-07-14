					<h1>Ban a user</h1>
					<?php
						if(isset($_POST['type'], $_POST['expire'], $_POST['value'], $_POST['reason'], $_POST['evidence'])) {
							$error = false;
							$type = $_POST['type'];
							$expire = intval($_POST['expire']) + time();
							$value = usernameFilter($_POST['value']);
							$reason = sqlFilter($_POST['reason']);
							$evidence = sqlFilter($_POST['evidence']);
							if($type == 'user' || $type == 'ip') {
								$userid = $users->username2id($value);
								if(!$userid) {
									$error = 'That user does not exists.';
								} elseif($sql->count("SELECT * FROM bans WHERE bantype = '" . $type . "' AND value = '" . $value . "' AND expire > " . time() . " LIMIT 1") == 1) {
									$error = 'That user is allready banned!';
								} else {
									$core->createLog((($type == 'ip')?'IP ':'') . 'banned ' . $value, "Type: $type\nExpire: " . $core->timeToDate($expire) . "\nValue: $value\nReason: $reason\nEvidence: $evidence", 3);
									if($type == 'ip') {
										$sql->query("INSERT INTO bans (bantype,value,reason,expire,added_by,added_date) VALUES ('user','" . $value . "','" . $reason . "','" . $expire . "','" . $users->data('username') . "','" . $core->timeToDate(time(), 'l, F d, Y') . "')");
										$value = $users->data('ip_last', $userid);
									}
									$sql->query("INSERT INTO bans (bantype,value,reason,expire,added_by,added_date) VALUES ('" . $type . "','" . $value . "','" . $reason . "','" . $expire . "','" . $users->data('username') . "','" . $core->timeToDate(time(), 'l, F d, Y') . "')");
									$id = mysql_insert_id();
									$sql->query("INSERT INTO habbocms_bans (ban_id,evidence) VALUES ('" . $id . "','" . $evidence . "')");
									$core->mus('reloadbans');
									$core->mus('signout', $userid);
									echo '<div class="message success close"><h2>Success!</h2><p>User has been banned.</p></div>';
								}
							}

							if($error) echo '<div class="message error close"><h2>Oops!</h2><p>' . $error . '</p></div>';
						}

						/*echo 'if(isset(';
						foreach($_POST as $key => $value) {
							echo '$_POST[\'' . $key . '\'], ';
						}
						echo ')) { }';*/
					?>
					<form method="post" action="#">
						<!-- Fieldset -->
						<fieldset>
							<legend>Ban form</legend>
							<p>
								<label>Bantype: </label> <select name="type"><option value="user">User</option><option value="ip">IP</option></select>
							</p>
							<p>
								<label>Username: </label> <input type="text" name="value" value="<?php echo (isset($_POST['value']))?$_POST['value']:''; ?>">
							</p>
							<p>
								<label>Expire: </label> <select name="expire"><option value="14400">4 Hours</option><option value="43200">12 Hours</option><option value="86400">24 Hours</option><option value="259200">3 Days</option><option value="604800">7 Days</option><option value="2419200">1 Month</option><option value="7257600">3 Months</option><option value="14515200">6 Months</option><option value="29030400">1 Year</option><option value="87091200">3 Years</option><option value="348364800">Permanent</option></select>
							</p>
							<p>
								<label>Reason: </label> <textarea name="reason"><?php echo (isset($_POST['reason']))?$_POST['reason']:''; ?></textarea>
							</p>
							<p>
								<label>Evidence: </label> <textarea name="evidence"><?php echo (isset($_POST['evidence']))?$_POST['evidence']:''; ?></textarea>
							</p>
							<p>
								<input class="button" type="submit" value="Submit" />
							</p>
							</fieldset>
						<!-- End of fieldset -->
					</form>