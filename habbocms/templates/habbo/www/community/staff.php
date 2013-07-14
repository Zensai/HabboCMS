<?php
  define('PARENT', '2');
  define('CHILD', '15');
  $lang->addTranslation('staff');
  $skin->install('Staff', 'general', true);
?>

  <div id="container">
  <div id="content" style="position: relative" class="clearfix">

    <div id="column1" class="column">

      <div class="habblet-container ">
        <div class="cbb clearfix blue ">
          <h2 class="title"><span style="float: left;">{$lang->staff.managers}</span> <span style="float: right; font-weight: normal; font-size: 75%;">{$lang->staff.managers_desc}</span></h2>
          <div class="box-content">
            <?php
             $result = $sql->query("SELECT * FROM users WHERE rank = '6'");
             if($sql->count($result, false) > 0) {
               $color = 'fff';
               while($row = $sql->fetch($result)) {
                $badge_result = $sql->query("SELECT badge_id FROM user_badges WHERE user_id = '" . $row['id'] . "' AND badge_slot = '1' LIMIT 1");
                if($sql->count($badge_result, false) == 1) $active_badge = $sql->result($badge_result, false); else $active_badge = false;
                echo '
                <table width="107%" style="padding: 5px; margin-left: -15px; background-color: #' . $color. ';">
                  <tbody>
                    <tr>
                      <td valign="middle" width="25">
                        <img style="margin-top: -10px;" src="' . $users->avatarimage(array(), $row['id']) . '">
                      </td>
                      <td valign="top">
                        <b style="font-size: 110%;"><a href="{www}/home/' . $row["username"] . '">' . $row["username"] . '</a></b><br/>
                        <i>' . htmlentities($row["motto"]) . '</i><br/>
                        <br/><img src="{gordon}/c_images/album1584/ADM.gif" style="float: left; margin-right: 5px"> ' . (($active_badge && $active_badge != 'ADM')?"<img src='{gordon}/c_images/album1584/$active_badge.gif' style='float: left;'>":"<!-- no active badge -->") . '
                      </td>
                      <td valign="top" style="float: right;">
                        <img src="{webgallery}v2/images/' . (($row["online"] == "1")?"online":"offline") . '.gif"/>
                      </td>
                    </tr>
                  </tbody>
                </table>
                ';
                if($color == 'fff') $color = 'E6E6E6'; else $color = 'fff';
               }
             } else echo '<i>{$lang->staff.none}</i>';
             unset($color);
            ?>
          </div>
        </div>
      </div>

      <div class="habblet-container ">
        <div class="cbb clearfix blue ">
          <h2 class="title"><span style="float: left;">{$lang->staff.moderators}</span> <span style="float: right; font-weight: normal; font-size: 75%;">{$lang->staff.moderators_desc}</span></h2>
          <div class="box-content">
            <?php
             $result = $sql->query("SELECT * FROM users WHERE rank = '5'");
             if($sql->count($result, false) > 0) {
               $color = 'fff';
               while($row = $sql->fetch($result)) {
                $badge_result = $sql->query("SELECT badge_id FROM user_badges WHERE user_id = '" . $row['id'] . "' AND badge_slot = '1' LIMIT 1");
                if($sql->count($badge_result, false) == 1) $active_badge = $sql->result($badge_result, false); else $active_badge = false;
                echo '
                <table width="107%" style="padding: 5px; margin-left: -15px; background-color: #' . $color. ';">
                  <tbody>
                    <tr>
                      <td valign="middle" width="25">
                        <img style="margin-top: -10px;" src="' . $users->avatarimage(array(), $row['id']) . '">
                      </td>
                      <td valign="top">
                        <b style="font-size: 110%;"><a href="{www}/home/' . $row["username"] . '">' . $row["username"] . '</a></b><br/>
                        <i>' . htmlentities($row["motto"]) . '</i><br/>
                        <br/><img src="{gordon}/c_images/album1584/EVENT.gif" style="float: left; margin-right: 5px"> ' . (($active_badge && $active_badge != 'MOD')?"<img src='{gordon}/c_images/album1584/$active_badge.gif' style='float: left;'>":"<!-- no active badge -->") . '
                      </td>
                      <td valign="top" style="float: right;">
                        <img src="{webgallery}v2/images/' . (($row["online"] == "1")?"online":"offline") . '.gif"/>
                      </td>
                    </tr>
                  </tbody>
                </table>
                ';
                if($color == 'fff') $color = 'E6E6E6'; else $color = 'fff';
               }
             } else echo '<i>{$lang->staff.none}</i>';
             unset($color);
            ?>
          </div>
        </div>
      </div>

      <div class="habblet-container ">
        <div class="cbb clearfix blue ">
          <h2 class="title"><span style="float: left;">{$lang->staff.events}</span> <span style="float: right; font-weight: normal; font-size: 75%;">{$lang->staff.events_desc}</span></h2>
          <div class="box-content">
            <?php
             $result = $sql->query("SELECT * FROM users WHERE rank = '4'");
             if($sql->count($result, false) > 0) {
               $color = 'fff';
               while($row = $sql->fetch($result)) {
                $badge_result = $sql->query("SELECT badge_id FROM user_badges WHERE user_id = '" . $row['id'] . "' AND badge_slot = '1' LIMIT 1");
                if($sql->count($badge_result, false) == 1) $active_badge = $sql->result($badge_result, false); else $active_badge = false;
                echo '
                <table width="107%" style="padding: 5px; margin-left: -15px; background-color: #' . $color. ';">
                  <tbody>
                    <tr>
                      <td valign="middle" width="25">
                        <img style="margin-top: -10px;" src="' . $users->avatarimage(array(), $row['id']) . '">
                      </td>
                      <td valign="top">
                        <b style="font-size: 110%;"><a href="{www}/home/' . $row["username"] . '">' . $row["username"] . '</a></b><br/>
                        <i>' . htmlentities($row["motto"]) . '</i><br/>
                        <br/><img src="{gordon}/c_images/album1584/MOD.gif" style="float: left; margin-right: 5px"> ' . (($active_badge && $active_badge != 'EVT')?"<img src='{gordon}/c_images/album1584/$active_badge.gif' style='float: left;'>":"<!-- no active badge -->") . '
                      </td>
                      <td valign="top" style="float: right;">
                        <img src="{webgallery}v2/images/' . (($row["online"] == "1")?"online":"offline") . '.gif"/>
                      </td>
                    </tr>
                  </tbody>
                </table>
                ';
                if($color == 'fff') $color = 'E6E6E6'; else $color = 'fff';
               }
             } else echo '<i>{$lang->staff.none}</i>';
             unset($color);
            ?>
          </div>
        </div>
      </div>

    </div>

    <div id="column2" class="column">
      <div class="habblet-container ">
        <div class="cbb clearfix red ">
          <h2 class="title"><span style="float: left;">Ole</span><span style="float: right; font-weight: normal; font-size: 75%;">Creator</span></h2>
          <div class="box-content">
            <img src="<?php echo $users->avatarimage(array(), $server->identifyUser('Ole')); ?>" align="left">
            <p>
              <b><a href="{www}/home/Ole">Ole</a></b><img src="{gordon}/c_images/album1584/OLE.gif" align="right"><br>
              Ole er opretteren af Habmi Hotel. Det er ogs&aring; ham der coder p&aring; siden
              og han er altid klar til en hyggesnak p&aring; hotellet hvis du kan fange ham.
              Ole indg&aring;r ikke som andre staff medlemmer, da hans opgaver mest g&aring;r p&aring; at forbedre hotellet!
            </p>
          </div>
        </div>
      </div>

      <div class="habblet-container ">
        <div class="cbb clearfix red ">
          <h2 class="title"><span style="float: left;">Habmi Staff</span><span style="float: right; font-weight: normal; font-size: 75%;"></span></h2>
          <div class="box-content">
              <img src="{gordon}/c_images/album1584/ADM.gif" align="right" style="padding: 5px">
              Du kan kende vores manager og ejer p&aring; skiltet her! 
              Du er altid velkommen til at anmode os om venskab. 
              Vi er p&aring; hotellet for jeres skyld.
            </p>
          </div>
        </div>
      </div>

      <div class="habblet-container ">
        <div class="cbb clearfix green ">
          <h2 class="title"><span style="float: left;">{$lang->staff.about_title}</span><span style="float: right; font-weight: normal; font-size: 75%;">{$lang->staff.about_title_left}</span></h2>
          <div class="box-content">
            <p>
              {$lang->staff.about_text}
            </p>
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