<?php

/*

	##############################################################################################################################
	#	     	                                                                                                          	     #
	#		01010101010101                                                                                                       #
	#		10101010101010                                                                                                       #
	#	    	 1010                                                                                                            #
	#	     	 0101 1010   0101   1010 0101  010101010  10101010101010 01010101010    101010101   101010101  010    101        #
	#	     	 1010 0101   1010   0101 1010 01010101010 01010101010101 101010101010  10101010101 10101010101 101   101         #
	#	      	 0101 1010   0101   1010      1010             0101      0101     1010 0101   1010 0101   1010 010  101          #
	#	     	 1010 0101   1010   0101 1010  101010101       1010      101010101010  1010   0101 1010   0101 1010101           #
	#	     	 0101  0101  0101  0101  0101   010101010      0101      01010101010   0101   1010 0101   1010 0101010           #
	#	     	 1010   01010101010101   1010        0101      1010      1010     0101 1010   0101 1010   0101 101  010          #
	#	    	 0101    010101010101    0101  010101010       0101      0101010101010 01010101010 01010101010 010   010         #
	#	     	 1010     0101010101     1010 010101010        1010      101010101010   010101010   010101010  101    010        #
	#	                                           	                                                                    	     #
	#												 © TwistbookCMS Made by Tonny												 #
	#					     					This content is protected by Copyright										     #
	#	                                                                                                  	             	     #
	##############################################################################################################################

*/

define('USER', TRUE); 
define('ACCOUNT', TRUE);
define('MAINTENANCE', TRUE);
include("../../includes/inc.global.php");

$menu = 'radio';
$page = 'radio';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $hotelname; ?> ~ SlamFM Radio</title>
<?php echo $Style->General(); ?>
</head>

<body style="margin: 0; padding: 0; width: 305px; margin-right: -4px; overflow: hidden; resize: none; background: none;">

<div style="background-image: url(<?php echo HOST; ?>/web-gallery/general/radio/logo_bg.png); height: 117px; width: 305px; display: table;"><center><div style="background-image: url(<?php echo HOST; ?>/web-gallery/general/radio/logo_slamfm.png); width: 258px; height: 51px; margin-top: 60px;"></div></center></div>

<embed type="application/x-shockwave-flash" src="http://www.onlineluisteren.nl/player.swf" style="undefined" id="mpl" name="mpl" quality="high" allowfullscreen="true" allowscriptaccess="always" wmode="opaque" flashvars="file=http://82.201.100.10:8000/SLAMFM_MP3_HQ&amp;type=sound&amp;stretching=fill&amp;autostart=true&amp;controlbar=bottom&amp;duration=9999" height="24" width="305">

<script>
$(document).ready(function(e) {
    $(".stream").load("<?php echo HOST; ?>/radio/stream");
	$(".refreshStream").click(function() {
		$(".stream").html('<center><img style="margin-top: 150px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_bubbles.gif"></center>');
     	$(".stream").load("<?php echo HOST; ?>/radio/stream");
  	});
});
</script>

<div id="refresh" class="refreshStream" title="<?php echo $language['refresh']; ?>" style="float: right;cursor: pointer; margin-right: 15px; margin-top: 5px; margin-bottom: -16px;"><img src="<?php echo HOST; ?>/web-gallery/icons/refresh.gif" /></div>

<div class="stream" style="width: 305px; height: 600px; z-index: 999; max-height: 600px; overflow-x: hidden; overflow-y: scroll;"><center><img style="margin-top: 150px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_bubbles.gif"></center></div>

<div class="overlowToStream" style="background-image: url(<?php echo HOST; ?>/web-gallery/general/radio/js_reception_backdrop_left.png); width: 305px; height: 208px; margin-top: -208px; z-index: 99999; position: fixed;"></div>

</body>
</html>