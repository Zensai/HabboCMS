					<h2>Bans</h2>
					<table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
					<thead>
						<tr>
						<td>ID</td>
						<td>Username</td>
						<td>Reason</td>
						<td>Expire</td>
						<td>Banned by</td>
						<td></td>
						</tr>
					</thead>
					<tbody>
						<?php
						 $result = $sql->query("SELECT * FROM bans WHERE bantype = 'user' AND expire > " . time() . " AND appeal_state = '1' ORDER BY id");
						 if($sql->count($result, false) > 0) {
						 $class = 'odd';
						 while ($row = $sql->fetch($result)) {
							echo '
						<tr class="' . $class . '">
							<td>' . $row["id"] . '</td>
							<td>' . $row["value"] . '</td>
							<td>' . $row["reason"] . '</td>
							<td title="' . $core->timeleft($row["expire"]) . '">' . $core->timeToDate($row["expire"]) . '</td>
							<td>' . $row["added_by"] . '</td>
							<td><a href="' . ASE . 'users/bans/lookup?id=' . $row['id'] . '" class="button tooltip"><span class="ui-icon ui-icon-wrench"></span>View</a></td>
						</tr>
							';
							if($class == 'odd') $class = ''; else $class = 'odd';
						 }
						} else echo '<tr><td>No bans found in this category.</td></tr>'
						?>
					</tbody>
					</table>

					<h2>IP Bans</h2>
					<table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
					<thead>
						<tr>
						<td>ID</td>
						<td>IP</td>
						<td>Reason</td>
						<td>Expire</td>
						<td>Banned by</td>
						<td></td>
						</tr>
					</thead>
					<tbody>
						<?php
						 $result = $sql->query("SELECT * FROM bans WHERE bantype = 'ip' AND expire > " . time() . " AND appeal_state = '1' ORDER BY id");
						 if($sql->count($result, false) > 0) {
						 $class = 'odd';
						 while ($row = $sql->fetch($result)) {
							echo '
						<tr class="' . $class . '">
							<td>' . $row["id"] . '</td>
							<td>' . $row["value"] . '</td>
							<td>' . $row["reason"] . '</td>
							<td title="' . $core->timeleft($row["expire"]) . '">' . $core->timeToDate($row["expire"]) . '</td>
							<td>' . $row["added_by"] . '</td>
							<td><a href="' . ASE . 'users/bans/lookup?id=' . $row['id'] . '" class="button tooltip"><span class="ui-icon ui-icon-wrench"></span>View</a></td>
						</tr>
							';
							if($class == 'odd') $class = ''; else $class = 'odd';
						 }
						} else echo '<tr><td>No bans found in this category.</td></tr>'
						?>
					</tbody>
					</table>


					<h2>Expired bans/ Approved appeals</h2>
					<table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
					<thead>
						<tr>
						<td>ID</td>
						<td>Username/IP</td>
						<td>Reason</td>
						<td>Expired</td>
						<td>Banned at</td>
						<td>Banned by</td>
						<td>Appeal</td>
						</tr>
					</thead>
					<tbody>
						<?php
						 $result = $sql->query("SELECT * FROM bans WHERE expire < " . time() . " OR appeal_state = '2' ORDER BY id");
						 if($sql->count($result, false) > 0) {
						 $class = 'odd';
						 while ($row = $sql->fetch($result)) {
						 	$appeal = 'None';
						 	if($row["appeal_state"] == 0) $appeal = 'Denied';
						 	if($row["appeal_state"] == 2) $appeal = 'Approved';
							echo '
						<tr class="' . $class . '">
							<td>' . $row["id"] . '</td>
							<td>' . $row["value"] . '</td>
							<td>' . $row["reason"] . '</td>
							<td title="' . $core->timeleft($row["expire"]) . '">' . $core->timeToDate($row["expire"]) . '</td>
							<td>' . $row["added_date"] . '</td>
							<td>' . $row["added_by"] . '</td>
							<td>' . $appeal . '</td>
						</tr>
							';
							if($class == 'odd') $class = ''; else $class = 'odd';
						 }
						} else echo '<tr><td>No bans found in this category.</td></tr>'
						?>
					</tbody>
					</table>