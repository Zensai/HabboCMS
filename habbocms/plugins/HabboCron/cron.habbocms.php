<?php
class HabboCron {
  function __construct() {
  	/*Get Jobs*/
  	$result = $db->query("SELECT * FROM habbocms_cron WHERE active = '1'");
  	$time = time();
  	while ($row = fetch($result)) {
  		/*Check if we should do the script*/
  		$timeleft = ($row['last'] + $row['every']) - $time;
  		if ($timeleft <= 0) {
  			$this->executeJob($row['script']);
  			$this->updateJobTime($row['script']);
  		}
  	}

  }

  function executeJob($script) {
  	if(file_exists(X . S . J . $script)) {
  		require X . S . J . $script;
  		return true;
  	} else die("<b>HabboCron</b> Job: " . $script . " does not exists. please re-install HabboCMS.");
  }

  function updateJobTime($script) {
  	return $db->query("UPDATE habbocms_cron SET last = '" . time() . "' WHERE script = '" . $script . "'");
  }

}
?>