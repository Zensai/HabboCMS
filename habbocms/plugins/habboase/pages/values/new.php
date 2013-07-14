<?php
  if(isset($_POST['name'], $_POST['type'], $_POST['prize'], $_POST['image'], $_POST['parent'], $_POST['position']) && is_within(intval($_POST['type']), 1, 3)) {
  	$name = filter($_POST['name']);
    $prize = intval($_POST['prize']);
    $image = filter($_POST['image']);
    $category = intval($_POST['parent']);
    $position = intval($_POST['position']);
    $type = intval($_POST['type']);
    $core->createLog('Added a furni to rare values', '', 2);
    $sql->query("INSERT INTO habbocms_values (parent,name,cost_type,value,image,last_edit,position) VALUES ('" . $category . "','" . $name . "','" . $type . "','" . $prize . "','" . $image . "','" . time() . "','" . $position . "')");

  	echo '<div class="message success close"><h2>Success!</h2><p>Added furni.</p></div>';
  }
?>
<h1>New furni</h1>
<form action="#" method="POST">
  <p>
    <label for="name">Name: </label>
	  <input class="mf" name="name" type="text" value="" />
  </p>
  <p>
    <label for="images">Image: </label>
    <input class="mf" name="image" type="text" value="{webgallery}images/rares/" />
  </p>
  <p>
    <label for="prize">Prize: </label>
	  <input class="mf" name="prize" type="text" value="" />
  </p>
  <p>
  <label for="type">Cost type: </label>
  <select name="type" class="dropdown">
    <option value="1">Credits</option>
    <option value="2">Diamonds</option>
    <option value="3">Shells</option>
  </select>
  </p>
  <p>
	<label for="parent">Category: </label>
	<select name="parent" class="dropdown">
	  <option>Please select an category</option>
    <?php
      $result = $sql->query("SELECT * FROM habbocms_values_categories WHERE visible = '1'");
      while ($row = $sql->fetch($result)) {
        echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
      }

    ?>
	</select>
  </p>											
  <p>
    <label for="position">Position: </label>
	  <input class="sf" name="position" type="text" value="" />
  </p>
  <p>
	<input class="button" type="submit" value="Submit" />
	<input class="button" type="reset" value="Reset" />
  </p>
</form>