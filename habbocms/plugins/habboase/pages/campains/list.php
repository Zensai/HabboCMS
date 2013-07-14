                  <?php
                    function make_short($str) {
                      return substr($str, 0, 102) . ((strlen($str) > 102)?'..':'');
                    }

                    if(isset($_GET['changestate']) && is_numeric($_GET['changestate']) && $sql->count("SELECT * FROM habbocms_campains WHERE id = '" . $_GET['changestate'] . "' LIMIT 1") == 1) {
                      $newstate = ($sql->query("SELECT active FROM habbocms_campains WHERE id = '" . $_GET['changestate'] . "' LIMIT 1") == 1)?'0':'1';
                      $sql->query("UPDATE habbocms_campains SET active = '" . $newstate . "' WHERE id = '" . $_GET['changestate'] . "'");
                      $sql->query("INSERT INTO habbocms_logs (user_id,action,time,level) VALUES ('" . IDENTITY . "','Changed campain #" . $_GET['changestate'] . " state to " . (($newstate == 1)?'active':'inactive') . "','" . time() . "','2')");
                    }
                  ?>
                  <h1>List campains (news)</h1>
                  <table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
                    <thead>
                      <tr>
                        <td><input type="checkbox" class="checkall" /></td>
                        <td>ID</td>
                        <td>Title</td>
                        <td>Text</td>
                        <td>Image</td>
                        <td>Actions</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $result = $sql->query("SELECT * FROM habbocms_campains");
                        $class = 'odd';
                        while($row = $sql->fetch($result)) {
                          echo '
                      <tr class="' . $class . '">
                        <td><input type="checkbox" /></td>
                        <td>' . $row['id'] . '</td>
                        <td title="' . $row['title'] . '">' . make_short($row['title']) . '</td>
                        <td title="' . $row['info'] . '">' . make_short($row['info']) . '</td>
                        <td><a href="' . str_replace('{webgallery}', WEBGALLERY, $row["image"]) . '" target="_blank">Click to view (new window)</a></td>
                        <td><a href="' . ASE . 'campains/list?changestate=' . $row["id"] . '">' . (($row['active'] == '0')?'Activate</a>':'Deactivate') . '</a> - <a href="' . ASE . 'campains/edit?id=' . $row["id"] . '">Edit</a></td>
                      </tr>';
                          if($class == 'odd') $class = ''; else $class = 'odd';
                        }
                      ?>
                    </tbody>
                  </table>