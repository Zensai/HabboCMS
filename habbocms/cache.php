<?php
	defined('IN_INDEX') or die();
	class HabboCache {
		public function createCache($filename, $contents, $overwrite = true) {
			$fp = fopen(P . 'storage/cache/' . $filename, (($overwrite)?'w':'a'));
			if($fp) {
				fwrite($fp, $contents);
				fclose($fp);
				return true;
			}

			return false;
		}

		public function deleteCache($filename) {
			$file = P . 'storage/cache/' . $filename;
			if(!file_exists($file)) {
				error('Error deleting cached file ' . $what, 'E_WARNING');
				return false;
			}

			return unlink($file);
		}

		public function openCache($filename) {
			$file = P . 'storage/cache/' . $filename;
			if(!file_exists($file)) {
				return false;
			}

			return file_get_contents($file);
		}

		/* Cache functions */
		public function cacheSettings() {
			global $sql;

			$settings = $sql->fetch("SELECT * FROM habbocms_settings", true);

			$this->createCache('habbocms_settings.json', json_encode($settings));
			return $settings;
		}

		public function cachePlugins() {
			global $sql;
			$plugins = array();

			$result = $sql->query("SELECT * FROM habbocms_plugins WHERE enabled = '1'");
			while($row = $sql->fetch($result)) {
				$plugins[] = $row;
			}

			$this->createCache('habbocms_plugins.json', json_encode($plugins));
			return $plugins;
		}

		public function cacheSkinSettings() {
			global $sql;
			$settings = array();

			$result = $sql->query("SELECT setting,value FROM habbocms_skinsettings WHERE skin = (SELECT skin FROM habbocms_settings)", true);
			while($row = $sql->fetch($result)) {
				$settings[$row['setting']] = $row['value'];
			}

			$this->createCache('habbocms_skinsettings.json', json_encode($settings));
			return $settings;
		}

		public function cacheNavigator() {
			global $sql;
			$rows = array();

			$result = $sql->query("SELECT * FROM habbocms_navi ORDER BY position", true);
			while($row = $sql->fetch($result)) {
				$rows[] = $row;
			}

			$this->createCache('habbocms_navi.json', json_encode($rows));
			return $rows;
		}

		public function cacheCampains() {
			global $sql;
			$articles = array();

			$result = $sql->query("SELECT * FROM habbocms_campains WHERE active = '1' ORDER BY id DESC");
			while($row = $sql->fetch($result)) {
				$articles[] = $row;
			}

			$this->createCache('habbocms_campains.json', json_encode($articles));
			return $articles;
		}

		public function cachePermissions() {
			global $sql;
			$ranks = array();

			$result = $sql->query("SELECT * FROM habbocms_permissions");
			while($row = $sql->fetch($result)) {
				$ranks[$row['rank']] = $row;
			}

			$this->createCache('habbocms_permissions.json', json_encode($ranks));
			return $ranks;
		}
	}

	$cache = new HabboCache;