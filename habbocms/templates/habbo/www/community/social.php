<?php
 $lang->addTranslation('social');
 define('PARENT', '2');
 define('CHILD', '11');
 $html->setKey('bottomset', "  <link rel='stylesheet' href='" . WEBGALLERY . "static/styles/community.css' type='text/css' />");
 $skin->install('Social Network', 'me', true);
?>

<div id="container">
	<div id="content" style="position: relative" class="clearfix">
  <?php require $skin->widget('campains'); ?>

<div id="column1" class="column">
<div class="habblet-container ">
<div class="cbb clearfix orange ">
<h2 class="title">{$lang->social.title}</h2>
<div id="community-content" class="box-content">
  <h2>{$lang->social.top}</h2>
  <h3>{$lang->social.text}</h3>
</div>
</div>
</div>
</div>
<script type="text/javascript">if (!$(document.body).hasClassName('process-template')) { Rounder.init(); }</script>

<div id="column2" class="column">
  <div class="habblet-container ">
    <div id="twitterfeed-habblet-container">
      <div id="twitterfeed-habblet-content"></div>
      <script>new TWTR.Widget({
        version: 2,
        id: 'twitterfeed-habblet-content',
        type: 'profile',
        rpp: 5,
        interval: 30000,
        width: 300,
        height: 189,
        theme: {
          shell: {
          background: '#4a4d4f',
          color: '#ffffff'
          },
          tweets: {
          background: '#ffffff',
          color: '#4a4d4f',
          links: '#fe6301'
          }
        },
        features: {
          scrollbar: true,
          loop: false,
          live: false,
          behavior: 'default'
        }}).render().setUser('<?php echo $core->settings->twitter; ?>').start();
      </script>
    </div>
  </div>
  <script type="text/javascript">if (!$(document.body).hasClassName('process-template')) { Rounder.init(); }</script>

  <div class="habblet-container communityAd">
      <div class="ad-container"><?php require $skin->widget('ads1'); ?></div>
  </div>
  <script type="text/javascript">if (!$(document.body).hasClassName('process-template')) { Rounder.init(); }</script>

</div>

<script type="text/javascript">
HabboView.run();
</script>
<div id="column3" class="column"> 		
				<div class="habblet-container communityAd"></div>	
				<div class="habblet-container ">		
						<div class="ad-container"><div class="ad-container"><?php require $skin->widget('ads2'); ?></div></div>	
				</div>
				<script type="text/javascript">if (!$(document.body).hasClassName('process-template')) { Rounder.init(); }</script>
</div>
    </div>
<?php require $skin->widget('footer'); ?>