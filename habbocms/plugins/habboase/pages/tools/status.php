<?php
  function status($site, $port) {
    $fp = @fsockopen($site, $port, $errno, $errstr, 2);
    if(is_resource($fp)) return "<font color='green'>ONLINE!</font>";

    return "<font color='red'>OFFLINE</font> (#" . $errno . " " . $errstr . ")";
  }
?>
<h1>Habmi.com server status</h1>
HTTP server is: <?php echo status('109.169.87.233', 80); ?><br>
MySQL server is: <?php echo status('109.169.87.233', 3306); ?><br> 
Emulator server is: <?php echo status('95.154.195.166', 30000); ?><br>
DDoS server is: <?php echo status('lb.izserv.com', 2309); ?><br>
HTTP DDoS server is: <?php echo status('habmi.com', 80); ?>