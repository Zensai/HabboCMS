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
include("../../../includes/inc.global.php");

echo $Style->Homes();

$id = $core->ExploitRetainer($_POST['id']);
$second_id = $core->ExploitRetainer($_POST['second_id']);

$query = mysql_query("SELECT * FROM homes_shop_backgrounds WHERE id = '".$id."'");
$background = mysql_fetch_array($query);

$query_show_info = mysql_query("SELECT * FROM homes_items WHERE id = '".$second_id."'");
$show_info = mysql_fetch_array($query_show_info);
?>

<script>
$(document).ready(function() {
    $('.onclickPlaceTheItemBackgrounds').click( function () {
		$("#overlowMyItems").fadeOut();
		
		$('.inputInfo #background').val('<?php echo $background['image']; ?>');

		$('.body').css('background', 'url(<?php echo HOST; ?>/web-gallery/homes/background/<?php echo $background['image']; ?>.gif) repeat');
	});
	
});
</script>

<div class="onclickedInformationContainerMyItems">
     <div class="PrevieuwBox">
        <div title="<?php echo $background['name']; ?>" style="background: url(<?php echo HOST; ?>/web-gallery/homes/background/<?php echo $background['image']; ?>.gif) center center; background-repeat: repeat; width: 150px; height: 150px;"></div>
     </div>
     
     <input type="submit" style="margin-top: 20px;" class="submitRight onclickPlaceTheItemBackgrounds" id="submitBlue" value="<?php echo $language['take_in_home']; ?>" />
</div>