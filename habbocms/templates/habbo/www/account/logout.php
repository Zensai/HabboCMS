<?php
  $core->requireLogin();
  $lang->addTranslation('logout');

  if(!isset($_GET['token']) || $_GET['token'] != $users->readSession('token')) {
  	header("Location: " . WWW . "/me");
  	exit;
  }

  $users->destroySession();
  $message = '{$lang->logout.success}';
  if(isset($_GET['reason']) && $_GET['reason'] == 'expired') $message = '{$lang->logout.session_expired}';

  $html->setKey('body_extra', ' id="logout" class="process-template"');
  $skin->install('{$lang->logout.pagetitle}', 'logout');
?>

<div id="overlay"></div>
<div id="container">
	<div class="cbb process-template-box clearfix">
		<div id="content" class="wide">
					<div id="header" class="clearfix">
						<h1><a href="{www}"></a></h1>
<ul class="stats">
    <li class="stats-online"><span class="stats-fig">{onlinecnt}</span> {$lang->logout.users_online}</li>
</ul>
					</div>
			<div id="process-content">
	        	<div class="action-confirmation flash-message">
	<div class="rounded">
		<?php echo $message; ?>
	</div>
</div>

<div style="text-align: center">


        <div style="width:100px; margin: 10px auto"><a href="#" id="logout-ok" class="new-button fill"><b>{$lang->logout.ok}</b><i></i></a></div>



<div id="column1" class="column">
			     		
				<div class="habblet-container ">		
	


<!-- google ads -->
</div>

						
					
				</div>
				<script type="text/javascript">if (!$(document.body).hasClassName('process-template')) { Rounder.init(); }</script>


</div>
<div id="column2" class="column">
</div>
</div>

<script type="text/javascript">
document.observe("dom:loaded", function() {

    if (!!$("logout-ok")) {
	    Event.observe('logout-ok', 'click', function(e) {
		    Event.stop(e);
			    document.location.href='{www}/index';
	    });
    }

    Cookie.erase("habboclient");
    Cookie.erase("friendlist");

    HabboView.run();
});
</script>
<?php
  require $skin->widget('footer');
?>
