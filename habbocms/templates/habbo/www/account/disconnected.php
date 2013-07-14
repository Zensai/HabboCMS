<?php
 $core->requireLogin();

 $html->setKey('body_extra', ' id="popup" class="process-template client_error"');
 $skin->install('Disconnected', 'disconnected');
?>
<div id="container">
    <div id="content">
	    <div id="process-content" class="centered-client-error">
	       	<div id="column1" class="column">
			     		
				<div class="habblet-container ">		
						<div class="cbb clearfix orange ">
	
							<h2 class="title">Oops!!</h2>
						<script type="text/javascript">
    if (typeof HabboClient != "undefined") {
        HabboClient.forceReload = true;
    }
</script>

<div class="box-content">
    <div class="info-client_error-text">
       <p>Oops, weve encountered a technical problem. This error has been recorded by our system and will be investigated by our support team. Please try clearing your cache and reloading the Hotel.</p>
       <p>Please re-open <a onclick="openOrFocusHabbo(this); return false;" target="client" href="{www}/client">hotel</a> to continue. We are sorry for the inconvenience.</p>
    </div>
    <div class="retry-enter-hotel">
    <div class="hotel-open">
        <a id="enter-hotel-open-image" class="open" href="{www}/client" target="211af9a82ee413a14c0ee1186525be9926bf4dca" onclick="HabboClient.openOrFocus(this); return false;">
        <div class="hotel-open-image-splash"></div>
        <div class="hotel-image hotel-open-image"></div>
        </a>
        <div class="hotel-open-button-content">
          <a class="open" href="{www}/client" onclick="HabboClient.openOrFocus(this); return false;">Enter {sitename}</a>
            <span class="open"></span>
        </div>
    </div>
    </div>
</div>


<script type="text/javascript">
  document.observe("dom:loaded", function() {
    ClientMessageHandler.googleEvent("client_error", "flash_error");
  });
</script>
<script type="text/javascript">
document.observe("dom:loaded", function() {
    var titles = $$("h2.title");
    if (titles.length > 0) {
        Element.insert(titles[0], "0 (#72453059)");
    }
});
</script>

						
					</div>
				</div>
				<script type="text/javascript">if (!$(document.body).hasClassName('process-template')) { Rounder.init(); }</script>
			 

</div>
<script type="text/javascript">
HabboView.run();
</script>
<div id="column2" class="column">
</div>
<!--[if lt IE 7]>
<script type="text/javascript">
Pngfix.doPngImageFix();
</script>
<![endif]-->

<script type="text/javascript">
if (typeof HabboView != "undefined") {
	HabboView.run();
}

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34620478-1']);
  _gaq.push(['_setDomainName', 'habmi.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
		</div>
    </div>
</div>

</body>
</html>
