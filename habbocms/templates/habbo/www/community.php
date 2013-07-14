<?php
  define('PARENT', '2');
  define('CHILD', '9');
  $lang->addTranslation('community');

  $skin->install('{$lang->community.page_name}', 'me', true);
?>

<div id="container">
  <div id="content" style="position: relative" class="clearfix">
<?php require $skin->widget('campains'); ?>

<div id="column1" class="column">
<div class="habblet-container ">
<div class="cbb clearfix activehomes ">
<h2 class="title">{$lang->community.random_habbos}</h2>
<div id="homes-habblet-list-container" class="habblet-list-container">
<img class="active-habbo-imagemap" src="{webgallery}images/activehomes/transparent_area.gif" width="435px" height="230px" usemap="#habbomap"/>

<?php
  if(empty($_COOKIE["random_habbos"])) {
    $randoms = $server->randomUsers(100);
    setcookie("random_habbos", json_encode($randoms), time()+600);
  } else {
    $randoms = readJSON($_COOKIE["random_habbos"], true);
  }
  
  $i = 0;
  foreach($randoms as $row) {
    if($row['hide_online'] == 1 || $row['online'] == 0) $status = "offline"; else $status = "online";
    echo '<div id="active-habbo-data-' . $i . '" class="active-habbo-data">
  <div class="active-habbo-data-container">
  <div class="active-name ' . $status . '">' . $row["username"] . '</div>
  ' . str_replace('{joindate}', $core->timeToDate($row["account_created"], "j M, o"), $lang->loc['community.member_since']) . '
  <p class="moto">' . htmlentities($row["motto"]) . '</p>
  </div>
  </div>
  <input type="hidden" id="active-habbo-url-' . $i . '">
  <input type="hidden" id="active-habbo-image-' . $i . '" class="active-habbo-image" value="' . $users->avatarimage(array("direction" => 4, "head_direction" => 4), false, $row["look"]) . '"/>
  ';
    $i++;
  }
?>
<div id="active-habbo-image-placeholder-0" class="active-habbo-image-placeholder"></div>
<div id="active-habbo-image-placeholder-1" class="active-habbo-image-placeholder"></div>
<div id="active-habbo-image-placeholder-2" class="active-habbo-image-placeholder"></div>
<div id="active-habbo-image-placeholder-3" class="active-habbo-image-placeholder"></div>
<div id="active-habbo-image-placeholder-4" class="active-habbo-image-placeholder"></div>
<div id="active-habbo-image-placeholder-5" class="active-habbo-image-placeholder"></div>
<div id="active-habbo-image-placeholder-6" class="active-habbo-image-placeholder"></div>
<div id="active-habbo-image-placeholder-7" class="active-habbo-image-placeholder"></div>
<div id="active-habbo-image-placeholder-8" class="active-habbo-image-placeholder"></div>
<div id="active-habbo-image-placeholder-9" class="active-habbo-image-placeholder"></div>
<div id="active-habbo-image-placeholder-10" class="active-habbo-image-placeholder"></div>
<div id="active-habbo-image-placeholder-11" class="active-habbo-image-placeholder"></div>
<div id="active-habbo-image-placeholder-12" class="active-habbo-image-placeholder"></div>
<div id="active-habbo-image-placeholder-13" class="active-habbo-image-placeholder"></div>
<div id="active-habbo-image-placeholder-14" class="active-habbo-image-placeholder"></div>
<div id="active-habbo-image-placeholder-15" class="active-habbo-image-placeholder"></div>
<div id="active-habbo-image-placeholder-16" class="active-habbo-image-placeholder"></div>
<div id="active-habbo-image-placeholder-17" class="active-habbo-image-placeholder"></div>
</div>
</div>
<map id="habbomap" name="habbomap">
<area id="imagemap-area-0" shape="rect" coords="55,53,95,103" href="#" alt=""/>
<area id="imagemap-area-1" shape="rect" coords="120,53,160,103" href="#" alt=""/>
<area id="imagemap-area-2" shape="rect" coords="185,53,225,103" href="#" alt=""/>
<area id="imagemap-area-3" shape="rect" coords="250,53,290,103" href="#" alt=""/>
<area id="imagemap-area-4" shape="rect" coords="315,53,355,103" href="#" alt=""/>
<area id="imagemap-area-5" shape="rect" coords="380,53,420,103" href="#" alt=""/>
<area id="imagemap-area-6" shape="rect" coords="28,103,68,153" href="#" alt=""/>
<area id="imagemap-area-7" shape="rect" coords="93,103,133,153" href="#" alt=""/>
<area id="imagemap-area-8" shape="rect" coords="158,103,198,153" href="#" alt=""/>
<area id="imagemap-area-9" shape="rect" coords="223,103,263,153" href="#" alt=""/>
<area id="imagemap-area-10" shape="rect" coords="288,103,328,153" href="#" alt=""/>
<area id="imagemap-area-11" shape="rect" coords="353,103,393,153" href="#" alt=""/>
<area id="imagemap-area-12" shape="rect" coords="55,153,95,203" href="#" alt=""/>
<area id="imagemap-area-13" shape="rect" coords="120,153,160,203" href="#" alt=""/>
<area id="imagemap-area-14" shape="rect" coords="185,153,225,203" href="#" alt=""/>
<area id="imagemap-area-15" shape="rect" coords="250,153,290,203" href="#" alt=""/>
<area id="imagemap-area-16" shape="rect" coords="315,153,355,203" href="#" alt=""/>
<area id="imagemap-area-17" shape="rect" coords="380,153,420,203" href="#" alt=""/>
</map>
<script type="text/javascript">
                                    var activeHabbosHabblet = new ActiveHabbosHabblet();
                                    document.observe("dom:loaded", function() { activeHabbosHabblet.generateRandomImages(); });
                                </script>
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
        }}).render().setUser('{hotel_twitter}').start();
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
<!--[if lt IE 7]>
<script type="text/javascript">
Pngfix.doPngImageFix();
</script>
<![endif]-->
    </div>
<?php require $skin->widget('footer'); ?>