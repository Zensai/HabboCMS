<?php
	$core->requireLogin();

	ob_start();
		var_dump($_POST);
	$post = ob_get_clean();

	if(isset($_POST['vip_type'])) {
		$type = $_POST['vip_type'];
		$prices = array('vip' => array(50, 1), 'super_vip' => array(75, 2));
		if($type == 'vip' || $type == 'super_vip') {
			$diamonds = $users->data('activity_points');
			$cost = $prices[$type][0];
			if($cost <= $diamonds) {
				if($type == 'vip') {
					if($users->data('vip') == '1') {
						header("Location: " . WWW . "/shop/buy?failed=vip&type=vip&reason=allreadyhave");
						exit;
					}
				} elseif($type == 'super_vip') {
					if($users->data('rank') >= $prices['super_vip'][1]) {
						header("Location: " . WWW . "/shop/buy?failed=vip&type=super_vip&reason=allreadyhave");
						exit;
					}
					if($users->data('vip') == '1') $cost = 25;
				}

				$result = $sql->query("UPDATE users SET rank = '" . $prices[$type][1] . "', vip = '1', activity_points = activity_points - '" . $prices[$type][0] . "' WHERE id = '" . IDENTITY . "'");
				$core->mus('updatepixels', IDENTITY);
				$core->mus('updatevip', IDENTITY);

				$core->createReport('purchases/vip/' . time() . '-' . $type . '-' . IDENTITY . '.txt', IDENTITY . ' purchased ' . $type . ' at ' . time() . '. Debug: ' . $post);
				header("Location: " . WWW . "/shop/buy?success=vip&type=" . $type);
				exit;
			} else {
				header("Location: " . WWW . "/shop/buy?failed=vip&type=" . $type . "&reason=nocash&required=" . $cost);
				exit;
			}
		}
	}

	header("Location: " . WWW . "/shop/buy");
	exit;
?>