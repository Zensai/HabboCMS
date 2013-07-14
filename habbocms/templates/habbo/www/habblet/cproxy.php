<?php
  if(isset($_POST['url'])) {
    $url = $_POST['url'];
  } else {
    exit;
  }
?>
<div id="externalLink" class="client-habblet-container contains-externalLink" style="">

  <div class="habblet-container ">    
    <div id="external-link-container">
      <h2><img src="http://habboon.com/Public/images/general/warning_sign.png"> Security warning</h2>
      <p>You are now leaving {sitename}. For the safety and privacy of your {sitename} account, remember to never enter your password unless you're on the real {sitename} web site. Also be sure to only download software from sites you trust.</p>
        <p><strong>http://<?php echo $url; ?></strong></p>
      <p class="clearfix" style="padding: 0">
          <a href="#" class="new-button" onclick="ExternalClickHandler.clickCancel('<?php echo $url; ?>', 'no1curr'); return false;"><b>Cancel</b><i></i></a>
          <a href="#" class="new-button red-button" onclick="ExternalClickHandler.clickContinue('../link_to?w=<?php echo $url; ?>', 'clicked'); return false;"><b>Continue to Website</b><i></i></a>
      </p>
    </div>
  </div>

  <!-- dependencies
  -->
</div>