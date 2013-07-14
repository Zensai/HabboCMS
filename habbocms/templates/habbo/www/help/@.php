<?php
  $topic = intval(explode('/', PAGE)[1]);
  if($topic == '') $topic = 1;
  $result = $sql->query("SELECT content FROM habbocms_faq WHERE id = '" . $topic . "'");
  if($sql->count($result, false) == 0) $content = '404'; else $content = $sql->result($result, false);
  $skin->install('', 'faq');
?>

<div id="faq" class="clearfix">
<div id="faq-header" class="clearfix"><img src="{webgallery}v2/images/faq/faq_header.png" />
  <form method="post" action="/help/faqsearch" class="search-box">
    <input type="text" id="faq-search" name="query" class="search-box-query search-box-onfocus" size="50" value="Search..."/>
    <input type="submit" value="" title="Search" class="search" />
  </form>
</div>

<div id="faq-container" class="clearfix">
  <div id="faq-category-list">
    <ul class="faq">
      <?php
        $result = $sql->query("SELECT * FROM habbocms_faq WHERE parent = '-1' AND active = '1' ORDER BY position");
        while($row = $sql->fetch($result)) {
          $selected = ($topic == $row['id'])?' selected':'';
          echo '<li><a href="' . WWW . '/help/' . $row["id"] . '" name=""><span class="faq-link' . $selected . '">' . $row["title"] . '</span></a></li>';
        }
      ?>
    </ul>
  </div>
  <div id="faq-category-content" class="clearfix" style="padding-top: 6px">
    <?php 
      echo $content . "\n<br><br><font size='1'><i>Last updated: " . $core->timeToDate($sql->result("SELECT last_update FROM habbocms_faq WHERE id = '" . $topic . "' LIMIT 1")) . "</i></font><br><br>\n"; 
      $result = $sql->query("SELECT * FROM habbocms_faq WHERE parent = '" . $topic . "' AND active = '1' ORDER BY position");
      $i = 0;
      while($row = $sql->fetch($result)) {
        $hide = ($i > 0)?'$("faq-item-content-' . $row["id"] . '").hide();':'';
        echo '
        <h4 id="faq-item-header-' . $row["id"] . '" class="faq-item-header faq-toggle selected"><span class="faq-toggle selected" id="faq-header-text-' . $row["id"] . '">' . $row["title"] . '</span></h4>
        <div id="faq-item-content-' . $row["id"] . '" class="faq-item-content clearfix">
        <div class="faq-item-content clearfix">
         ' . $row["content"] . '
        </div>
        <div class="faq-close-container">
        <div id="faq-close-button-' . $row["id"] . '" class="faq-close-button clearfix faq-toggle" style="display:none">Close FAQ <img id="faq-close-image-' . $row["id"] . '" class="faq-toggle" src="{webgallery}v2/images/faq/close_btn.png"/></div>
        </div>
        <font size="1"><i>Last updated: ' . $core->timeToDate($row["last_update"]) . '</i></font>
        </div>
        <script type="text/javascript">
          ' . $hide . '
          $("faq-close-button-' . $row["id"] . '").show();
        </script>
        ';
        $i++;
      }
    ?>
    <script type="text/javascript">
      FaqItems.init();
      SearchBoxHelper.init();
    </script>
  </div>

</div>
<div id="faq-footer" class="clearfix">
  <p>© 2004 - 2012 Sulake Corporation Oy. HABBO is a registered trademark of Sulake Corporation Oy in the European Union, the USA, Japan, the People's Republic of China and various other jurisdictions. All rights reserved.</p></div>
</div>

<script type="text/javascript">
if (typeof HabboView != "undefined") {
	HabboView.run();
}
</script>
    
        


</body>
</html>
