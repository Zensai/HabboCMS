<?php
	defined('IN_INDEX') or die();
	if($core->settings->plugins == 1) {
		$plugins = readJSON($cache->openCache('habbocms_plugins.json'), true);
		if(!$plugins) {
			$plugins = $cache->cachePlugins();
		}

		foreach($plugins as $plugin) {
			require P . 'plugins/' . $plugin['system_name'] . '/call.php';
		}
	}