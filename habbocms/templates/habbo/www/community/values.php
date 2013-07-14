<?php
  define('PARENT', '2');
  define('CHILD', '18');
  $skin->install('Rare Values', 'general', true);
?>

  <div id="container">
  <div id="content" style="position: relative" class="clearfix">

    <div id="column1" class="column">
      <?php
        $type = array(1=>'M&oslash;nter',2=>'Diamanter',3=>'Shells');
        $result = $sql->query("SELECT * FROM habbocms_values_categories WHERE visible = '1' ORDER BY position ASC");
        while ($row = $sql->fetch($result)) {
          echo '
          <div class="habblet-container">
          <div class="cbb clearfix ' . $row["color"] . '"> 
          <h2 class="title"><span style="float: left;">' . $row["name"] . '</span><span style="float: right; font-weight: normal; font-size: 75%;">' . $row["description"] . '</span></h2>
          <div class="box-content">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
          ';
          $result2 = $sql->query("SELECT * FROM habbocms_values WHERE parent = '" . $row['id'] . "' ORDER BY position ASC");
          while ($row2 = $sql->fetch($result2)) {
            echo '
            <tr>
            <td rowspan="2" width="10%" height="36" ><img alt="' . $row2["name"] . '" src="' . $row2["image"] . '"></td><td width="45%" ><b>' . $row2["name"] . '</b></td>
            </tr>
            <tr>
            <td>' . number_format($row2["value"]) . ' ' . $type[$row2["cost_type"]] . '</td>
            <td><font color="gray">Sidst &aelig;ndret: ' . $core->timeToDate($row2["last_edit"], 'd M, Y') . '</font></td>
            </tr>
            <tr>
            <td colspan="2" width="100%">&nbsp;</td>
            </tr>
            ';
          }
          echo '
            </table>
          </div>
          </div> 
          </div>
          ';
        }
      ?> 
    </div>

    <div id="column2" class="column">
      <div class="habblet-container ">
        <div class="cbb clearfix red ">
          <h2 class="title">Hvad er Rares?</h2> 
          <div class="box-content"> 
            Rares er m&oslash;bler som er mere v&aelig;rdifuldt og sj&aelig;llendt end andre. De skifter pris efter udbud og eftersp&oslash;rgelse. Jo flere der s&oslash;ger dem jo h&oslash;jre v&aelig;rdi. Jo flere som ejer dem, jo mindre v&aelig;rdi.<br />Priserne p&aring; siden er kun anviste priser og ikke de fastlagte
          </div>
        </div>
      </div>

      <div class="habblet-container ">
        <div class="ad-container">
          <?php require $skin->widget('ads1'); ?>
        </div>
      </div>
    </div>
    
    <div id="column3" class="column">
      <div class="habblet-container ">
        <div class="ad-container">
          <?php require $skin->widget('ads2'); ?>
        </div>
      </div>
    </div>
<?php require $skin->widget('footer'); ?>