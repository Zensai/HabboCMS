<h1>Edit rare values</h1>

<?php
  $result = $sql->query("SELECT * FROM habbocms_values_categories WHERE visible = '1' ORDER BY position ASC");
  while ($row = $sql->fetch($result)) {
  echo '<h3>' . $row["name"] . '</h3>';
  echo '
  <table class="normal" cellpadding="0" cellspacing="0" border="0" width="500px">
  <thead>
  <tr>
  <td>Pos</td>
  <td>Image</td>
  <td>Name</td>
  <td>Worth</td>
  <td>Action</td>
  </tr>
  </thead>
  <tbody>';
  $result2 = $sql->query("SELECT * FROM habbocms_values WHERE parent = '" . $row['id'] . "' ORDER BY position ASC");
  $class = '';
  while ($row2 = $sql->fetch($result2)) {
  	$row2["image"] = str_replace('{webgallery}', WEBGALLERY, $row2["image"]);
    echo '
	<tr>
	<td>' . $row2["position"] . '</td>
	<td><img src="' . $row2["image"] . '" alt="' . $row2["name"] . '" /></td>
	<td>' . $row2["name"] . '</td>
	<td>' . number_format($row2["value"]) . 'c</td>
	<td><a href="' . ASE . 'values/edit?id=' . $row2["id"] . '">Edit</a> - Delete</td>
	</tr>
    ';
  } 
  echo '</tbody>
</table><br>';
  }
?> 