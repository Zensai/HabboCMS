<?php
 define('PARENT', '2');
 define('CHILD', '16');
 $skin->install('Top Stats', 'general', true);
?>
<div id="container">
  <div id="content" style="position: relative" class="clearfix">
    <div id="column" class="column">
      <div class="habblet-container ">
        <div class="cbb clearfix orange ">  
          <h2 class="title"><span style="float: left;">Credits</span> </h2>
          <table width='100%'>
          <?php
            $result = $sql->query("SELECT id,username,credits FROM users WHERE rank < 6 ORDER BY credits DESC LIMIT 6");
            while ($row = $sql->fetch($result)) {
              echo '
            <tr>
              <td width="5px"></td>
              <td width="20px"><img src="' . $users->avatarimage(array("size" => "s", "direction" => 2, "head_direction" => 2, "gesture" => "sml"), $row["id"]) . '"></td>
              <td width="195px"><a href="#"><b>' . $row["username"] . '</b></a><br />' . $row["credits"] . ' Credits</td>
            </tr>                 
              ';
            }
          ?>
          </table>
        </div> 
      </div>
    </div>

    <div id="column" class="column">
      <div class="habblet-container ">
        <div class="cbb clearfix blue ">  
          <h2 class="title"><span style="float: left;">Diamonds</span> </h2>
          <table width='100%'>
          <?php
            $result = $sql->query("SELECT id,username,activity_points FROM users WHERE rank < 6 ORDER BY activity_points DESC LIMIT 6");
            while ($row = $sql->fetch($result)) {
              echo '
            <tr>
              <td width="5px"></td>
              <td width="20px"><img src="' . $users->avatarimage(array("size" => "s", "direction" => 2, "head_direction" => 2, "gesture" => "sml"), $row["id"]) . '"></td>
              <td width="195px"><a href="#"><b>' . $row["username"] . '</b></a><br />' . $row["activity_points"] . ' Diamonds</td>
            </tr>                 
              ';
            }
          ?>
          </table>
        </div> 
      </div>
    </div>

    <div id="column" class="column">
      <div class="habblet-container ">
        <div class="cbb clearfix green ">  
          <h2 class="title"><span style="float: left;">Shells</span> </h2>
          <table width='100%'>
          <?php
            $result = $sql->query("SELECT id,username,vip_points FROM users WHERE rank < 6 ORDER BY vip_points DESC LIMIT 6");
            while ($row = $sql->fetch($result)) {
              echo '
            <tr>
              <td width="5px"></td>
              <td width="20px"><img src="' . $users->avatarimage(array("size" => "s", "direction" => 2, "head_direction" => 2, "gesture" => "sml"), $row["id"]) . '"></td>
              <td width="195px"><a href="#"><b>' . $row["username"] . '</b></a><br />' . $row["vip_points"] . ' Shells</td>
            </tr>                 
              ';
            }
          ?> 
          </table>
        </div> 
      </div>
    </div>

    <div id="column" class="column">
      <div class="habblet-container ">
        <div class="cbb clearfix yellow ">  
          <h2 class="title"><span style="float: left;">Most online</span> </h2>
          <table width='100%'>
          <?php
            $result = $sql->query("SELECT s.id,s.OnlineTime FROM user_stats s INNER JOIN users u ON u.id = s.id WHERE u.rank < 6 ORDER BY s.OnlineTime DESC LIMIT 6");
            while ($row = $sql->fetch($result)) {
              echo '
            <tr>
              <td width="5px"></td>
              <td width="20px"><img src="' . $users->avatarimage(array("size" => "s", "direction" => 2, "head_direction" => 2, "gesture" => "sml"), $row["id"]) . '"></td> 
              <td width="195px"><a href="#"><b>' . $users->data('username', $row['id']) . '</b></a><br />Spent ' . round(($row["OnlineTime"] / 24) / 3600) . ' Day(s) online.</td>
            </tr>                 
              ';
            }
          ?> 
          </table>
        </div> 
      </div>
    </div>

    <div id="column" class="column">
      <div class="habblet-container ">
        <div class="cbb clearfix red ">  
          <h2 class="title"><span style="float: left;">Respect</span> </h2>
          <table width='100%'>
          <?php
            $result = $sql->query("SELECT id,username,respect FROM users WHERE rank < 6 ORDER BY respect DESC LIMIT 6");
            while ($row = $sql->fetch($result)) {
              echo '
            <tr>
              <td width="5px"></td>
              <td width="20px"><img src="' . $users->avatarimage(array("size" => "s", "direction" => 2, "head_direction" => 2, "gesture" => "sml"), $row["id"]) . '"></td>
              <td width="195px"><a href="#"><b>' . $row["username"] . '</b></a><br />' . $row["respect"] . ' Respect Recived</td>
            </tr>                 
              ';
            }
          ?> 
          </table>
        </div> 
      </div>
    </div>

    <div id="column" class="column">
      <div class="habblet-container ">
        <div class="cbb clearfix cyan ">  
          <h2 class="title"><span style="float: left;">Achievement Score</span> </h2>
          <table width='100%'>
          <?php
            $result = $sql->query("SELECT id,username,achievement_points FROM users WHERE rank < 6 ORDER BY achievement_points DESC LIMIT 6");
            while ($row = $sql->fetch($result)) {
              echo '
            <tr>
              <td width="5px"></td>
              <td width="20px"><img src="' . $users->avatarimage(array("size" => "s", "direction" => 2, "head_direction" => 2, "gesture" => "sml"), $row["id"]) . '"></td>
              <td width="195px"><a href="#"><b>' . $row["username"] . '</b></a><br />' . $row["achievement_points"] . ' Achievement Score</td>
            </tr>                 
              ';
            }
          ?> 
          </table>
        </div> 
      </div>
    </div>
    <!-- Add column3 here !!!!! -->

<?php require $skin->widget('footer'); ?>