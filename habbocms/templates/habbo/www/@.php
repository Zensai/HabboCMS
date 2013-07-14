<?php
 define('PARENT', '1');
 define('DONOTDISPLAY_PARRENT', true);
 define('CHILD', '0');

 $lang->addTranslation('error');
 $skin->install($lang->loc['error.page_name'], 'general', true);
?>
<div id="container">
  <div id="content" style="position: relative" class="clearfix">
  <div id="column1" class="column">
    <div class="habblet-container ">
      <div class="cbb clearfix red ">
        <h2 class="title">{$lang->error.header}</h2>
        <div id="notfound-content" class="box-content">
          <p class="error-text">{$lang->error.top}</p> <img id="error-image" src="{webgallery}v2/images/error.gif" />
          <p class="error-text">{$lang->error.content}</p>
        </div>
      </div>
    </div>
    <script type="text/javascript">if (!$(document.body).hasClassName('process-template')) { Rounder.init(); }</script>
  </div>
  
  <div id="column2" class="column">
    <div class="habblet-container ">
      <div class="ad-container"><?php require $skin->widget('ads1'); ?></div>
    </div>
    <script type="text/javascript">if (!$(document.body).hasClassName('process-template')) { Rounder.init(); }</script>
  </div>
  
  <div id="column3" class="column">
    <div class="habblet-container ">
      <div class="ad-container"><?php require $skin->widget('ads2'); ?></div>
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