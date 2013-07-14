					<?php
						$linkback = ASE . 'users/bans';
						if(isset($_GET['id'])) {
							$id = intval($_GET['id']);
							$result = $sql->query("SELECT * FROM bans WHERE id = '" . $id . "' LIMIT 1");
							if($sql->count($result, false) != 1) {
								header("Location: " . ASE . "users/bans?error=notexists");
								exit;
							}

							$baninfo = $sql->fetch($result);
							$appeal = 'None';
						 	if($baninfo["appeal_state"] == 0) $appeal = 'Denied';
						 	if($baninfo["appeal_state"] == 2) $appeal = 'Approved';

						 	$evidence = $sql->query("SELECT evidence FROM habbocms_bans WHERE ban_id = '" . $id . "' LIMIT 1");
							if($sql->count($evidence, false) != 1) {
								$sql->query("INSERT INTO habbocms_bans (ban_id,evidence) VALUES ('" . $id . "','N/A')");
								$evidence = 'N/A';
							} else $evidence = $sql->result($evidence, false);
						} else {
							header("Location: " . ASE . "users/bans?error=missingparameter");
							exit;
						}

						if(isset($_GET['unban'])) {
							$core->createLog('Unbanned ' . $baninfo['value'], 'n/a', 3);
							$sql->query("UPDATE bans SET appeal_state = '2', expire = '" . (time() - 36000) . "' WHERE id = '" . $id . "'");
							$core->mus('reloadbans');
							$baninfo = $sql->fetch("SELECT * FROM bans WHERE id = '" . $id . "' LIMIT 1", true);
							echo '<div class="message success close"><h2>Success!</h2><p>User has been unbanned.</p></div>';
						}
					?>
					<h2>Lookup ban</h2>
					<p>
						<a href="<?php echo ASE; ?>users/bans" class="button"><span class="ui-icon ui-icon-arrowreturnthick-1-w"></span>Back to banlist</a> <?php if($baninfo['bantype'] == 'user') echo '<a href="' . ASE . 'users/lookup?username=' . $baninfo["value"] . '" class="button tooltip"><span class="ui-icon ui-icon-search"></span>User Lookup</a>'; ?> <a href="<?php echo ASE; ?>users/bans/lookup?id=<?php echo $id; ?>&unban" class="button"><span class="ui-icon ui-icon-trash"></span>Unban</a>
					</p>
					<form method="post" action="#">
						<!-- Fieldset -->
						<fieldset>
							<legend>Ban information</legend>
							<p>
								<label>ID:</label> <?php echo $id; ?>
							</p>
							<p>
								<label>Bantype: </label> <?php echo $baninfo['bantype}
							</p>
							<p>
								<label><?php echo ($baninfo['bantype'] == 'user')?'Username':'IP'; ?>: </label> <?php echo $baninfo['value}
							</p>
							<p>
								<label>Expire: </label> <?php echo '<span title="' . $core->timeleft($baninfo["expire"]) . '">' . $core->timeToDate($baninfo["expire"]) . '</span>'; ?></textarea>
							</p>
							<p>
								<label>Banned by: </label> <?php echo $baninfo["added_by"]; ?>
							</p>
							<p>
								<label>Banned at: </label> <?php echo $baninfo["added_date"]; ?>
							</p>
							<p>
								<label>Appeal: </label> <?php echo $appeal; ?>
							</p>
							<p>
								<label>Reason: </label> <textarea ><?php echo $baninfo['reason}</textarea>
							</p>
							<p>
								<label>Evidence: </label> <textarea ><?php echo $evidence ?></textarea>
							</p>
							</fieldset>
						<!-- End of fieldset -->
					</form>
