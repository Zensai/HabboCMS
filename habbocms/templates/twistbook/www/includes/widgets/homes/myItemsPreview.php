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

$query = mysql_query("SELECT * FROM homes_shop_stickys WHERE id = '".$id."'");
$sticky = mysql_fetch_array($query);

$query_show_info = mysql_query("SELECT * FROM homes_items WHERE id = '".$second_id."'");
$show_info = mysql_fetch_array($query_show_info);
?>

<script>
$(document).ready(function() {
	
    $('.onclickPlaceTheItemSticky').click( function () {
		
		$("#overlowMyItems").fadeOut(function(){
		
		if($("#container_sticky_<?php echo $second_id; ?>").size() == 0){
		
			$('.inputInfo #widget_<?php echo $second_id; ?>_show').val('yes');
			var code_Sticky = '<div id="container_sticky_<?php echo $second_id; ?>" class="widget_sticky_content_stack ui-draggable countSaveAll <?php echo $sticky["id"]; ?>_inhome_sticky" style="background-image: url(<?php echo HOST; ?>/web-gallery/homes/sticky/<?php echo $sticky["image"]; ?>); width: <?php echo $sticky["width"]; ?>px; height: <?php echo $sticky["height"]; ?>px; position: fixed; display: none; left: 10px; top: 45px; z-index: 9999;"><input type="hidden" name="widget_<?php echo $second_id; ?>_show" id="widget_<?php echo $second_id; ?>_show" value="yes"><div id="StickyScriptInfo<?php echo $second_id; ?>"></div><div id="remove_sticky_<?php echo $second_id; ?>" style="position: fixed; float: right; margin-top: -17px; margin-left: -8px; cursor: pointer;"><img src="<?php echo HOST; ?>/web-gallery/homes/icons/icon_delete.gif"></div></div>';
			$('.body').append(code_Sticky);
			
			$('#container_sticky_<?php echo $second_id; ?>').fadeIn("slow", function(){
				$(this).css("display", "table");
			});
		
			var objToContainer = document.getElementById('StickyScriptInfo<?php echo $second_id; ?>')
			var scriptContainer   = document.createElement("script");
			scriptContainer.text  = "$(document).ready(function() { draggable_sticky('<?php echo $second_id; ?>'); $('#remove_sticky_<?php echo $second_id; ?>').click( function () { remove_sticky('<?php echo $second_id; ?>'); }); });";
			objToContainer.appendChild(scriptContainer);
			
			var code2 = '<div id="SaveStickyDiv<?php echo $second_id; ?>"></div>';
			$('.saveInfo').append(code2);
			
			var objToSticky = document.getElementById('SaveStickyDiv<?php echo $second_id; ?>')
			var scriptSticky   = document.createElement("script");
			scriptSticky.text  = "$(document).ready(function() { var aantalSaves = $('.countSaveAll').size(); $('.saveCount').val(aantalSaves); $('.saveHome').click( function () { saveSticky('<?php echo $second_id; ?>'); }); });";
			objToSticky.appendChild(scriptSticky);
		
		}else{
			
			$("#overlowMyItems").fadeOut();
			$('.inputInfo #widget_<?php echo $second_id; ?>_show').val('yes');
			$('#container_sticky_<?php echo $second_id; ?> #widget_<?php echo $second_id; ?>_show').val('yes');
			$('#container_sticky_<?php echo $second_id; ?>').css('display', 'table');
			
		}
		
		if($(".inputInfo #widget_<?php echo $second_id; ?>_show").size() == 0){
			var code_Sticky_Input = '<input type="hidden" name="widget_<?php echo $second_id; ?>_show" id="widget_<?php echo $second_id; ?>_show" value="yes">';
			$('.inputInfo').append(code_Sticky_Input);
		}
		
		$('.<?php echo $sticky['id']; ?>').fadeOut();
		$('.onclickPlaceTheItemSticky').fadeOut();
		
		});
		
	});
	
});
</script>

<div class="onclickedInformationContainerMyItems">
     <div class="PrevieuwBox">
        <div title="<?php echo $sticky['name']; ?>" class="<?php echo $sticky['id']; ?>" style="background: url(<?php echo HOST; ?>/web-gallery/homes/sticky/<?php echo $sticky['image']; ?>) center center; background-repeat: no-repeat; width: 150px; height: 150px;"></div>
     </div>
     
     <div class="itsMeTymergkew"></div>
     
     <div id="ItemIdAnswer<?php echo $second_id; ?>Button"><input type="submit" style="margin-top: 20px;" class="submitRight onclickPlaceTheItemSticky" id="submitBlue" value="<?php echo $language['take_in_home']; ?>" /></div>
     
</div>

<?php unset($_POST['id']); ?>