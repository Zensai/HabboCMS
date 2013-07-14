<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
	<head>
		<title>{sitename} - {pagetitle}</title>
		<meta name="copyright" content="HabboCMS - Twistbook template">
		{styleset}

		<script class="noDelete" type="text/javascript">function onKeyDown() { var pressedKey = String.fromCharCode(event.keyCode).toLowerCase(); if (event.ctrlKey && (pressedKey == "u" || pressedKey == "s")) { event.returnValue = false; } } $(document).bind("contextmenu",function(e){ return false; }); </script>

		<script>
			$(document).ready(function() {
				$('#middleContainer').append("<center><div style='margin-top: 15px; font-size: 10px; width: 700px;'><a href='{www}' style='font-weight: bold; text-decoration: underline; color: #000000;'>{$lang->footer.contact}</a> | <a href='{www}/about' style='font-weight: bold; text-decoration: underline; color: #000000;'>{$lang->footer.about}</a> | <a href='{www}/terms/of/use' style='font-weight: bold; text-decoration: underline; color: #000000;'>{$lang->footer.tos}</a> | <a href='{www}/disclaimer' style='font-weight: bold; text-decoration: underline; color: #000000;'>{$lang->footer.disclaimer}</a> | <a href='{www}/rules' style='font-weight: bold; text-decoration: underline; color: #000000;'>{$lang->footer.rules}</a> | <a href='{www}/terms/of/use' style='font-weight: bold; text-decoration: underline; color: #000000;'>{$lang->footer.privacy}</a><br>{$lang->footer.copyright}<br>{$lang->footer.sulake_copyright}</div><div style='height: 44px;'></div></center>");
			});
		</script>{extra}
	</head>
	<body onkeydown="onKeyDown()"{body_extra}>
