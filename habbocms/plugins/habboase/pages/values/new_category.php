<?php
  if (isset($_POST['name'], $_POST['desc'], $_POST['color'], $_POST['position'])) {
  	$name = filter($_POST['name']);
  	$desc = filter($_POST['desc']);
  	$color = filter($_POST['color']);
  	$visible = (isset($_POST['visible']))?'1':'0';
  	$position = intval($_POST['position']);

    $core->createLog('Added a categroy to rare values', '', 2);
  	$sql->query("INSERT INTO habbocms_values_categories (name, description, color, visible, position) VALUES ('" . $name . "', '" . $desc . "', '" . $color . "', '" . $visible . "', '" . $position . "')");
  	echo '<div class="message success close"><h2>Success!</h2><p>Rare value catagory created!</p></div>';
  }
?>
<h1>New rares value category</h1>
<form action="#" method="POST">
  <p>
    <label for="name">Name: </label>
	<input class="mf" name="name" type="text" value="" />
  </p>
  <p>
    <label for="desc">Description: </label>
	<input class="mf" name="desc" type="text" value="" />
  </p>
  <p>
	<label for="color">Color: </label>
	<select name="color" class="dropdown">
	  <option>Please select an color</option>
	  <option>Blue</option>
	  <option>Orange</option>
	  <option>Red</option>
	</select>
  </p>											
  <p>
  	<label for="visible">Visible: </label>
	<input type="checkbox" name="visible" checked="checked">Visible
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