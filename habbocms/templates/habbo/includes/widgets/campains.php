<?php
  $lang->addTranslation('campains');
  $campains = readJSON($cache->openCache('habbocms_campains.json'), true);
  if(!$campains) {
    $campains = $cache->cacheCampains();
  }
?>
<div id="promo-box">
  <div id="promo-bullets"></div>
  <?php
  $i = 0;
  $display = "";
  foreach($campains as $row) {
  $button = ($row['button'] == '0')?"        </div>\n      </div>\n    </div>\n":"        </div>\n      </div>\n      <div class=\"promo-link-container\">\n        <div class=\"enter-hotel-btn\">\n          <div class=\"open enter-btn\">\n            <a href=\"" . $row['button_link'] . "\" target=\"" . $row['button_target'] . "\" onclick=\"" . $row['button_onclick'] . "\">" . $row['button'] . "<i></i></a><b></b>\n          </div>\n        </div>\n      </div>\n    </div>\n";
  echo "    <div class=\"promo-container\" style=\"" . (($i != 0)?'display: none; ':'') . "background-image: url(" . $row['image'] . ")\">\n      <div class=\"promo-content-container\">\n        <div class=\"promo-content\">\n";
  echo "          <div class=\"title\">" . $row['title'] . "</div>\n";
  echo "          <div class=\"body\">" . $row['info'] . "</div>\n";
  echo $button;
  $i++;
  }
  ?>
</div>
<script type="text/javascript">
    document.observe("dom:loaded", function() { PromoSlideShow.init(); });
</script>