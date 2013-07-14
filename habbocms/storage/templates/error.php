<?php
	echo "<div style='text-align: center;'>";
	echo "<h2 style='color: rgb(190, 50, 50);'>Exception Occured:</h2>";
	echo "<table style='width: 800px; display: inline-block;'>";
	echo "<tr style='background-color:rgb(230,230,230);'><th style='width: 80px;'>Type</th><td>" . get_class($e) . "</td></tr>";
	echo "<tr style='background-color:rgb(240,240,240);'><th>Message</th><td>{$e->getMessage()}</td></tr>";
	echo "<tr style='background-color:rgb(230,230,230);'><th>File</th><td>{$e->getFile()}</td></tr>";
	echo "<tr style='background-color:rgb(240,240,240);'><th>Line</th><td>{$e->getLine()}</td></tr>";
	echo "</table></div>";