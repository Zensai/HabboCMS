<?php
  $header = 'Edit catalogue';
  $class2 = 'title';
  $no_action = '1';
  if (isset($_GET['save'])) {
    /*foreach($_POST as $name => $value) {
      echo "'" . $name . "' => \$_POST['" . $name . "'],<br>";
    }*/
    if (isset($_POST['page_id'], $_POST['parent_id'], $_POST['caption'], $_POST['icon_color'], $_POST['icon_image'], $_POST['visible'], $_POST['min_rank'], $_POST['club_only'], $_POST['order_num'], $_POST['page_layout'], $_POST['page_headline'], $_POST['page_teaser'], $_POST['page_special'], $_POST['page_text1'], $_POST['page_text2'], $_POST['page_text_details'], $_POST['page_text_teaser'], $_POST['vip_only'], $_POST['page_link_description'], $_POST['page_link_pagename'])) {
      $keys = array(
        'id' => $_POST['page_id'],
        'parent_id' => intval($_POST['parent_id']),
        'caption' => r_filter($_POST['caption']),
        'icon_color' => intval($_POST['icon_color']),
        'icon_image' => intval($_POST['icon_image']),
        'visible' => null_one($_POST['visible']),
        'min_rank' => intval($_POST['min_rank']),
        'club_only' => null_one($_POST['club_only']),
        'order_num' => intval($_POST['order_num']),
        'page_layout' => r_filter($_POST['page_layout']),
        'page_headline' => r_filter($_POST['page_headline']),
        'page_teaser' => r_filter($_POST['page_teaser']),
        'page_special' => r_filter($_POST['page_special']),
        'page_text1' => r_filter($_POST['page_text1']),
        'page_text2' => r_filter($_POST['page_text2']),
        'page_text_details' => r_filter($_POST['page_text_details']),
        'page_text_teaser' => r_filter($_POST['page_text_teaser']),
        'vip_only' => null_one($_POST['vip_only']),
        'page_link_description' => r_filter($_POST['page_link_description']),
        'page_link_pagename' => r_filter($_POST['page_link_pagename']),
      );
      $header = 'Page updated.';
      $class2 = 'success';
      $$sql->query('ase_updatecatalogpage', $keys);
    } else if (isset($_POST['furni_id'], $_POST['furni_page_id'], $_POST['item_ids'], $_POST['catalog_name'], $_POST['cost_credits'], $_POST['cost_pixels'], $_POST['cost_snow'], $_POST['amount'], $_POST['vip_only'])) {
      $keys = array(
        'id' => intval($_POST['furni_id']),
        'page_id' => intval(r_filter($_POST['furni_page_id'])),
        'item_ids' => intval(r_filter($_POST['item_ids'])),
        'catalog_name' => r_filter($_POST['catalog_name']),
        'cost_credits' => intval(r_filter($_POST['cost_credits'])),
        'cost_pixels' => intval(r_filter($_POST['cost_pixels'])),
        'cost_snow' => intval(r_filter($_POST['cost_snow'])),
        'amount' => intval(r_filter($_POST['amount'])),
        'vip' => null_one($_POST['vip_only']),
      );
      $$sql->query('ase_updatecatalogitem', $keys);
      $header = 'Furni updated.';
      $class2 = 'success';
    } else if (isset($_POST['add_page_parent'], $_POST['add_page_name']) && filter($_POST['add_page_name']) != '') {
      $parent = c_filter(r_filter($_POST['add_page_parent']));
      $name = filter($_POST['add_page_name']);
      $sql->mysql_insert('catalog_pages', array(
       'parent_id' => $parent,
       'caption' => $name,
      ));
      $header = 'Page added.';
      $class2 = 'success';
    } else if(isset($_POST['add_furni_page'], $_POST['add_furni_page_name'])) {
      $page_id = intval($_POST['add_furni_page']);
      $caption = c_filter($_POST['add_furni_page_name']);
      $keys = array(
        'page_id' => $page_id,
        'catalog_name' => $caption,
      );

      $result = mysql_$db->query("INSERT INTO catalog_items (page_id,catalog_name) VALUES ('105', 'heklo')");
      if(!$result) echo mysql_error();

      //$$sql->query('ase_addcataitem', $keys);
      //header("Location: " . ASE . "catalogue?watch=items&watch_items_id=" . $page_id);
      //exit;
      /*$id = result("SELECT id FROM catalog_items WHERE page_id = '" . $page_id . "' AND catalog_name = '" . $caption . "' LIMIT 1");
      $_GET['edit'] = 'edit';
      $_GET['edit_furni_id'] = $id;
      
      $header = 'Furni added.';
      $class2 = 'success';*/
    } else echo "<!-- missing a variable-->";
  }

  if (isset($_GET['hide'])) {
    $hide = a_filter($_GET['hide']);
    if ($hide == 'page' && isset($_GET['hide_page_id'], $_GET['hide_page_set']) && is_numeric($_GET['hide_page_id']) && is_numeric($_GET['hide_page_set'])) {
      $id = $_GET['hide_page_id'];
      $set = null_one($_GET['hide_page_set']);
      $db->query("UPDATE catalog_pages SET visible = '" . $set . "', enabled = '" . $set . "' WHERE id = '" . $id . "'");
      $header = 'catalogue page updated.';
      $class2 = 'success';
      unset($id);
    } else if ($hide == 'furni' && isset($_GET['hide_furni_id']) && is_numeric($_GET['hide_furni_id'])) {
      $id = $_GET['hide_furni_id'];
      $db->query("DELETE FROM catalog_items WHERE id = '" . $id . "'");
      $header = 'Furni deleted.';
      $class2 = 'success';
      $no_action = '0';
      unset($id);
    } else {echo "<h3>Problems with \$_GET variables.</h3><br><br><a href='" . ASE . "catalogue'>&laquo; Go back to start</a>";$no_action = '0';}

  }
  
  if (isset($_GET['edit'])) {
    $edit = a_filter($_GET['edit']);
    if($edit == 'page' && isset($_GET['edit_page_id']) && is_numeric($_GET['edit_page_id'])) {
      $id = $_GET['edit_page_id'];
      $row = fetch($db->query("SELECT * FROM catalog_pages WHERE id = '" . $id . "'"));
      echo "<table width='100%'>";
      echo "<form action='" . ASE . "catalogue?save&edit=page&edit_page_id=" . $row['id'] . "' method='POST'><input type='hidden' name='page_id' value='" . $id . "'>";
      echo "<tr><td width='90px'>ID:</td><td>" . $id . "</td></tr>";
      echo "<tr><td>Parent ID:</td><td><input type='text' name='parent_id' value='" . $row['parent_id'] . "' size='36'></td></tr>";
      echo "<tr><td>Caption:</td><td><input type='text' name='caption' value='" . $row['caption'] . "' size='36'></td></tr>";
      echo "<tr><td>Icon color:</td><td><input type='text' name='icon_color' value='" . $row['icon_color'] . "' size='36'></td></tr>";
      echo "<tr><td>Icon Image:</td><td><input type='text' name='icon_image' value='" . $row['icon_image'] . "' size='36'></td></tr>";
      echo "<tr><td>Visible:</td><td><select name='visible' style='width: 75px'><option value='1'" . (($row['visible'] == '1')?' selected':'') . ">Visible</option><option value='0'" . (($row['visible'] == '0')?' selected':'') . ">Hidden</option></select></td></tr>";
      echo "<tr><td>Min Rank:</td><td><input type='text' name='min_rank' value='" . $row['min_rank'] . "' size='36'></td></tr>";
      echo "<tr><td>Club Only:</td><td><select name='club_only' style='width: 75px'><option value='1'" . (($row['club_only'] == '1')?' selected':'') . ">Yes</option><option value='0'" . (($row['club_only'] == '0')?' selected':'') . ">No</option></select></td></tr>";
      echo "<tr><td>Order:</td><td><input type='text' name='order_num' value='" . $row['order_num'] . "' size='36'></td></tr>";
      echo "<tr><td>Page Layout:</td><td><input type='text' name='page_layout' value='" . $row['page_layout'] . "' size='36'></td></tr>";
      echo "<tr><td>Catalog Header:</td><td><input type='text' name='page_headline' value='" . $row['page_headline'] . "' size='36'></td></tr>";
      echo "<tr><td>Catalog Teaser:</td><td><input type='text' name='page_teaser' value='" . $row['page_teaser'] . "' size='36'></td></tr>";
      echo "<tr><td>Special:</td><td><input type='text' name='page_special' value='" . $row['page_special'] . "' size='36'></td></tr>";
      echo "<tr><td style='vertical-align:text-top'>Page Text 1:</td><td><textarea name='page_text1' cols='34' rows='5'>" . $row['page_text1'] . "</textarea></td></tr>";
      echo "<tr><td style='vertical-align:text-top'>Page Text 2:</td><td><textarea name='page_text2' cols='34' rows='5'>" . $row['page_text2'] . "</textarea></td></tr>";
      echo "<tr><td style='vertical-align:text-top'>Text Details:</td><td><textarea name='page_text_details' cols='34' rows='5'>" . $row['page_text_details'] . "</textarea></td></tr>";
      echo '<tr><td style=\'vertical-align:text-top\'>Text Teaser:</td><td><textarea name="page_text_teaser" cols="34" rows="5">' . filter($row["page_text_teaser"]) . '</textarea></td></tr>';
      echo "<tr><td>VIP Only:</td><td><select name='vip_only' style='width: 75px'><option value='1'" . (($row['vip_only'] == '1')?' selected':'') . ">Yes</option><option value='0'" . (($row['vip_only'] == '0')?' selected':'') . ">No</option></select></td></tr>";
      echo '<tr><td style=\'vertical-align:text-top\'>Link Desc:</td><td><textarea name="page_link_description" cols="34" rows="5">' . filter($row["page_link_description"]) . '</textarea></td></tr>';
      echo '<tr><td style=\'vertical-align:text-top\'>Link Pagename:</td><td><textarea name="page_link_pagename" cols="34" rows="5">' . filter($row["page_link_pagename"]) . '</textarea> <input type="submit" value="Save."></td></tr>';
      echo "</table></form><br><br>";
      echo '<a href="' . ASE . 'catalogue">&laquo; Go back to start</a>';
      $no_action = '0';
      unset($id);
    } else if ($edit == 'furni' && isset($_GET['edit_furni_id']) && is_numeric($_GET['edit_furni_id'])) {
      $id = $_GET['edit_furni_id'];
      $row = fetch($db->query("SELECT * FROM catalog_items WHERE id = '" . $id . "'"));
      echo "<table width='100%'>";
      echo "<form action='" . ASE . "catalogue?save&edit=furni&edit_furni_id=" . $row['id'] . "' method='POST'><input type='hidden' name='furni_page_id' value='" . $id . "'>";
      echo "<input type='hidden' name='furni_id' value='" . $id . "'>";
      echo "<tr><td width='90px'>ID:</td><td>" . $id . "</td></tr>";
      echo "<tr><td>Page ID:</td><td><input type='text' name='furni_page_id' value='" . $row['page_id'] . "' size='36'></td></tr>";
      echo "<tr><td>Item ID:</td><td><input type='text' name='item_ids' value='" . $row['item_ids'] . "' size='36'></td></tr>";
      echo "<tr><td>Catalog Name:</td><td><input type='text' name='catalog_name' value='" . $row['catalog_name'] . "' size='36'></td></tr>";
      echo "<tr><td>Credits:</td><td><input type='text' name='cost_credits' value='" . $row['cost_credits'] . "' size='36'></td></tr>";
      echo "<tr><td>Pixels:</td><td><input type='text' name='cost_pixels' value='" . $row['cost_pixels'] . "' size='36'></td></tr>";
      echo "<tr><td>Shells:</td><td><input type='text' name='cost_snow' value='" . $row['cost_snow'] . "' size='36'></td></tr>";
      echo "<tr><td>Amount:</td><td><input type='text' name='amount' value='" . $row['amount'] . "' size='36'></td></tr>";
      echo "<tr><td>Vip Only:</td><td><select name='vip_only' style='width: 75px'><option value='1'" . (($row['vip'] == '1')?' selected':'') . ">Yes</option><option value='0'" . (($row['vip'] == '0')?' selected':'') . ">No</option></select><input type='submit' value='Save.'></td></tr>";
      echo "</table></form><br><br>";
      echo '<a href="' . ASE . 'catalogue">&laquo; Go back to start</a>';
      $no_action = '0';
    } else {echo "<h3>Found nothing to edit.</h3><br><br><a href='" . ASE . "catalogue'>&laquo; Go back to start</a>";$no_action = '0';}
  } else if (isset($_GET['watch'])) {
    $watch = a_filter($_GET['watch']);
    if($watch == 'pages' && isset($_GET['watch_parent_id']) && is_numeric($_GET['watch_parent_id'])) {
      $parent_id = $_GET['watch_parent_id'];

    } else if ($watch == 'items' && isset($_GET['watch_items_id']) && is_numeric($_GET['watch_items_id'])) {
      $items_page = $_GET['watch_items_id'];
      $result = $db->query("SELECT * FROM catalog_items WHERE page_id = '" . $items_page . "' ORDER BY id");
      $class = 'odd';         
      $page_title = result("SELECT caption FROM catalog_pages WHERE id = '" . $items_page . "'");
      echo "<h3>Currently watching furnis in catalog page <i>" . $page_title . "</i></h3>";
      echo "<table width='100%'>";
      while($row = fetch($result)) {
        echo "<tr class='" . $class . "'><td width='380px'>" . $row['catalog_name'] . "</td> <td><a href='" . ASE . "catalogue?edit=furni&edit_furni_id=" . $row['id'] . "'>Edit</a> - <a href='" . ASE . "catalogue?watch=items&watch_page_id="  . $row['page_id'] . "&hide=furni&furni_hide_id=" . $row['id'] . "' onclick='confirm(\"Are you sure you want to delete this furni? There is no undo.\");'>Delete</td></tr>";
        if($class == 'even') $class = 'odd'; else $class = 'even';
      }
      echo "</table>";
      echo "<br><form action='?save&watch=items&watch_items_id=" . $items_page . "' method='POST'><input type='hidden' name='add_furni_page' value='" . $items_page . "'><input type='text' name='add_furni_page_name' value='' size='52'> <input type='submit' value='Add furni.'></form>";
      echo '<br><br><a href="' . ASE . 'catalogue">&laquo; Go back to start</a>';
      $no_action = '0';
    }
  }

  if($no_action == '1' || isset($parent_id)) {
    if(!isset($parent_id)) $parent_id = '-1';
    if($parent_id == '-1') echo '<h2>Catalogue</h2>'; else echo '<h2><a href="' . ASE . 'catalogue">Catalogue</a> // ' . result("SELECT caption FROM catalog_pages WHERE id = '" . $parent_id . "'") . '</h2>';
  ?>
  <table id="rounded-corner" summary="Catalogue">
    <thead>
    	<tr>
            <th scope="col" class="rounded-company"></th>
            <th scope="col" class="rounded">Page Name</th>
            <?php if($parent_id == '-1') echo '<th scope="col" class="rounded">ID</th>'; ?>
            <th scope="col" class="rounded">Childs</th>
            <th scope="col" class="rounded">Furni</th>
            <th scope="col" class="rounded">Edit Page</th>
            <th scope="col" class="rounded-q4">Delete</th>
        </tr>
    </thead>
        <tfoot>
    	<tr>


                <td colspan="6" class="rounded-foot-left">
                 Matts favorite tool!
                </td>
        	<td class="rounded-foot-right">&nbsp;</td>

        </tr>
    </tfoot>
    <tbody>
        <?php 
        $result = $db->query("SELECT * FROM catalog_pages WHERE parent_id = '" . $parent_id . "' ORDER BY order_num ASC");
        while($row = fetch($result)) {
        echo '
    	<tr>
            <td><input type="checkbox" name="delete_id_' . $row["id"] . '" /></td>
            <td>' . $row['caption'] . '</td>
            <td>' . $row['id'] . '</td>
            ' . (($parent_id == '-1')?'<td><a href="' . ASE . 'catalogue?watch=pages&watch_parent_id=' . $row["id"] . '"><img src="http://images.habbocms.net/panel/images/icon_28.png" alt="" title="" border="0" /></a></td>':'') . '
            <td><a href="' . ASE . 'catalogue?watch=items&watch_items_id=' . $row["id"] . '"><img src="http://images.habbocms.net/panel/images/furni.png" alt="" title="" border="0" /></td>
            <td><a href="' . ASE .'catalogue?edit=page&edit_page_id=' . $row["id"] . '"><img src="http://images.habbocms.net/panel/images/user_edit.png" alt="" title="" border="0" /></a></td>
            <td><a href="#" class="ask"><img src="http://images.habbocms.net/panel/images/trash.png" alt="" title="" border="0" /></a></td>
        </tr>
        ';
        }

        ?>
    </tbody>
  </table>
  
  <div class="form">
    <form action="" method="post" class="niceform">
      <input type="hidden" name="new_page_parent_id" value="<?php echo $parent_id; ?>">
      <fieldset>
        <dl>
          <dt><label for="email">New page</label></dt>
          <dd><input type="text" name="" id="" size="54" /></dd>
        </dl>
        <dl class="submit">
          <input type="submit" name="submit" id="submit" value="Submit" />
        </dl>

     </fieldset>
    </form>
  </div>  
  <?php } ?>