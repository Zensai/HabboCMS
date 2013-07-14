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
include("../../../../includes/inc.global.php");

echo $Style->General();

$shopquerybuy = mysql_query("SELECT * FROM shop_furniture WHERE id = '".$core->ExploitRetainer($_POST['id'])."'");
$shopeditfurniture = mysql_fetch_array($shopquerybuy);
?>

<?php
if($core->ExploitRetainer($users->UserPermission('cms_shop', $username))){ 
?>

<script>
$(document).ready(function() {

	$("#onclickCloseShopFurnitureEdit").click(function () {
		$("#overlowShopFurnitureEdit").fadeOut("slow");
	});
	
	$('.editThisFurniture').click(function() { 
		$("#overlowShopFurnitureEdit").fadeOut("slow");
		editFurniture<?php echo $shopeditfurniture['id']; ?>();
		$('.reloader').html('<meta http-equiv="refresh" content="0">');
	});
	
	function editFurniture<?php echo $shopeditfurniture['id']; ?>(){

		var id = '<?php echo $shopeditfurniture['id']; ?>';
		var rank_id = $('#shop_edit_rank').val();
		var value = $('#shop_edit_value').val();
		var furniture_name = $('#shop_edit_name').val();
		var furniture_image_url = $('#shop_edit_image_url').val();

	  $.post("<?php echo HOST; ?>/shop/furniture/edit/submit/<?php echo $shopeditfurniture['id']; ?>", { id: id, rank_id: rank_id, value: value, furniture_name: furniture_name, furniture_image_url: furniture_image_url }, function(result){ 
		});

	}

});
</script>

	<div class="container" style="width: 530px;">
		
		<div class="top"></div>
        
        <div class="localOverlowTitleSettings"><b><ubuntu><?php echo $language['edit']; ?> <?php echo $shopeditfurniture['furniture_name'];?></ubuntu></b></div>
		
		<div id="onclickCloseShopFurnitureEdit" class="closeButton"></div>
        
        <div style="margin-top: -20px;"></div>
		
		<div class="text" style="width: 100%;">
            
            <div style="float: left;"><img style="margin-left: 10px; margin-top: 10px; margin-bottom: 10px;" src="<?php echo HOST; ?>/web-gallery/general/shop/furniture/<?php echo $shopeditfurniture['furniture_image_url'];?>.gif"></div>
            
           	<div class="insideContainer" style="float: left; width: 250px; margin-left: 30px; margin-top: 10px;">
            
            	<label><ubuntu><?php echo $language['shop_edit_name']; ?></ubuntu></label>
				
				<br>
		
				<input type="text" name="shop_edit_name" id="shop_edit_name" value="<?php echo $shopeditfurniture['furniture_name'];?>"><br />
                
                <label><ubuntu><?php echo $language['shop_edit_image_url']; ?></ubuntu></label>
				
				<br>
		
				<input type="text" name="shop_edit_image_url" id="shop_edit_image_url" value="<?php echo $shopeditfurniture['furniture_image_url'];?>"><br />
                
                <label><ubuntu><?php echo $language['shop_edit_value']; ?></ubuntu></label>
				
				<br>
		
				<input type="text" name="shop_edit_value" id="shop_edit_value" value="<?php echo $shopeditfurniture['value'];?>"><br />
                
                <label><ubuntu><?php echo $language['shop_edit_min_rank']; ?></ubuntu></label>
				
				<br>
		
				<select class="select" name="shop_edit_rank" style="background-color: #FFFFFF; width: 100%;" id="shop_edit_rank">
					
					<?php 
					$queryeditfurniture = mysql_query("SELECT * FROM ranks ORDER BY id LIMIT 20");
					while($editfurniture = mysql_fetch_array($queryeditfurniture)){
					?>
					
					<option <?php if($shopeditfurniture['rank_id'] == $editfurniture['id']){ echo 'selected'; } ?> value="<?php echo $editfurniture['id']; ?>"><?php echo $editfurniture['name']; ?></option>
					
					<?php } ?>
				
				</select>
                
            </div>
			
			<a class="overlowButton editThisFurniture" style="text-shadow: none; margin-top: -20px; margin-left: 10px; float: left;">
										
				<b><u class="overlowButtonText" style="">
														
					<i><ubuntu><?php echo $language['submit']; ?></ubuntu></i>
														
				</u></b>
															
				<div></div>
														
			</a> 
            
        </div>
		
		<div class="bottom"></div>
		
	</div>
    
<?php } ?>