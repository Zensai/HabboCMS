<?php
  if(isset($_GET['id']) && $sql->count("SELECT id FROM habbocms_values WHERE id = '" . intval($_GET['id']) . "'") == 1) $id = intval($_GET['id']); else $id = 1;
  if(isset($_POST['name'], $_POST['type'], $_POST['prize'], $_POST['image'], $_POST['parent'], $_POST['position']) && is_within(intval($_POST['type']), 1, 3)) {
  	$name = filter($_POST['name']);
    $prize = intval($_POST['prize']);
    $image = filter($_POST['image']);
    $category = intval($_POST['parent']);
    $position = intval($_POST['position']);
    $type = intval($_POST['type']);

    $core->createLog('Edited a furni in rare values', '', 2);
    $sql->query("UPDATE habbocms_values SET parent = '" . $category . "', name = '" . $name . "', cost_type = '" . $type . "', value = '" . $prize . "', image = '" . $image . "', last_edit = '" . time() . "', position = '" . $position . "' WHERE id = '" . $id . "'");
  	echo '<div class="message success close"><h2>Success!</h2><p>Edited furni.</p></div>';
  }

  $info = $sql->fetch("SELECT * FROM habbocms_values WHERE id = '" . $id . "'", true);
?>
<a href="<?php echo ASE; ?>values/list" class="valueslink">&laquo; Back to furni list</a>
<form action="#" method="POST" style="margin-top: 15px">
  <p>
    <label for="name">Name: </label>
	  <input class="mf" name="name" type="text" value="<?php echo $info['name}" />
  </p>
  <p>
    <label for="images">Image: </label>
    <input class="mf" name="image" type="text" value="<?php echo $info['image}" />
  </p>
  <p>
    <label for="prize">Prize: </label>
	  <input class="mf" name="prize" type="text" value="<?php echo $info['value}" />
  </p>
  <p>
  <label for="type">Cost type: </label>
  <select name="type" class="dropdown">
    <option value="1"<?php if($info['cost_type'] == '1') echo ' selected'; ?>>Credits</option>
    <option value="2"<?php if($info['cost_type'] == '2') echo ' selected'; ?>>Diamonds</option>
    <option value="3"<?php if($info['cost_type'] == '3') echo ' selected'; ?>>Shells</option>
  </select>
  </p>
  <p>
	<label for="parent">Category: </label>
	<select name="parent" class="dropdown">
    <?php
      $result = $sql->query("SELECT * FROM habbocms_values_categories WHERE visible = '1'");
      while ($row = $sql->fetch($result)) {
        echo '<option value="' . $row["id"] . '"' . (($row["id"] == $info['parent'])?' selected':'') . '>' . $row["name"] . '</option>';
      }

    ?>
	</select>
  </p>											
  <p>
    <label for="position">Position: </label>
	  <input class="sf" name="position" type="text" value="<?php echo $info['position}" />
  </p>
  <p>
	<input class="button" type="submit" value="Submit" />
	<input class="button" type="reset" value="Reset" />
  </p>
</form>