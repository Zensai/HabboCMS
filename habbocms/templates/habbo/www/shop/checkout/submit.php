<?php
	$return = WWW . '/shop/buy';
	if(isset($_POST['product']) && is_numeric($_POST['product']) && $sql->count("SELECT * FROM habbocms_products WHERE id = '" . $_POST['product'] . "'") > 0) {
		$_SESSION['shop_product'] = $_POST['product'];
		$return = WWW . '/shop/checkout/confirm';
	}

	header("Location: " . $return);
	exit;
?>