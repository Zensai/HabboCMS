<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
	<head>
		<title>{sitename}</title>
		<link rel="stylesheet" href="{webgallery}styles/css/style.php?type=news" type="text/css" media="screen" />
	</head>

	<body onkeydown="onKeyDown()">
		<div class="slider-wrapper theme-default" style="margin: -7px 0 0 -7px;">
			<div class="nivo-controlNav"></div>
			<div id="slider" class="nivoSlider" style="border: 1px solid rgba(0, 0, 0, 0.25); border-radius: 3px;">
				<?php 
					$result = $sql->query("SELECT * FROM habbocms_articles ORDER BY published DESC LIMIT 5");
					while($row = $sql->fetch($result)){
						echo '<a target="_parent" href="{www}/news/' . $row["id"] . '"><img src="' . $row["image"] . '" data-thumb="' . $row["image"] . '" alt="" title="<b>' . $row["title"] . '</b><br>' . $row["shortstory"] . '" /></a>';
					}
				?>
				
			</div>
			
		</div>

		</div>
			
		<script type="text/javascript" src="{webgallery}styles/js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="{webgallery}styles/js/jquery.nivo.slider.js"></script>
		<script type="text/javascript">
			$(window).load(function() {
				$('#slider').nivoSlider();
			});
		</script>
	</body>
</html>