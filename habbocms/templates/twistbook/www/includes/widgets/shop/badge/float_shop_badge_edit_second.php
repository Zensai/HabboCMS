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

if($core->ExploitRetainer($users->UserPermission('cms_shop', $username))){ 

$shopquerybuy = mysql_query("SELECT * FROM shop_badges WHERE id = '".$core->ExploitRetainer($_POST['id'])."'");
$shopeditbadge = mysql_fetch_array($shopquerybuy);
?>

<script>
$(document).ready(function() {

	$("#onclickCloseShopBadgeEdit").click(function () {
		$("#overlowShopBadgeEdit").fadeOut("slow");
	});
	
	$('.editThisBadge').click(function() { 
		$("#overlowShopBadgeEdit").fadeOut("slow");
		editBadge<?php echo $shopeditbadge['id']; ?>();
	});
	
	function editBadge<?php echo $shopeditbadge['id']; ?>(){

		var id = '<?php echo $shopeditbadge['id']; ?>';
		var rank_id = $('#shop_edit_rank').val();
		var value = $('#shop_edit_value').val();
		var badge_name = $('#shop_edit_name').val();
		var badge_id = $('#shop_edit_image_url').val();

	  	$.post("<?php echo HOST; ?>/shop/badge/edit/submit/<?php echo $shopeditbadge['id']; ?>", { id: id, badge_id: badge_id, badge_name: badge_name, rank_id: rank_id, value: value }, function(result){ 
			document.location.href='<?php echo HOST; ?>/shop/badges';
		});

	}

});
</script>

	<div class="container" style="width: 330px;">
		
		<div class="top"></div>
        
        <div class="localOverlowTitleSettings"><b><ubuntu><?php echo $language['edit']; ?><br /><?php echo $shopeditbadge['badge_name'];?></ubuntu></b></div>
		
		<div id="onclickCloseShopBadgeEdit" class="closeButton"></div>
        
        <div style="margin-top: -20px;"></div>
		
		<div class="text" style="width: 270px;">
            
           	<div class="insideContainer" style="float: left; width: 270px;;">
            
            	<div style="float: right;"><img style="margin-right: 10px; margin-top: 10px; margin-bottom: 10px;" src="<?php echo $badge_url; ?><?php echo $shopeditbadge['badge_id'];?>.gif"></div>
            
            	<label><ubuntu><?php echo $language['shop_edit_name']; ?></ubuntu></label>
				
				<br>
		
				<input type="text" name="shop_edit_name" id="shop_edit_name" style="width:190px;" value="<?php echo $shopeditbadge['badge_name'];?>"><br />
                
                <label><ubuntu><?php echo $language['shop_edit_image_url']; ?></ubuntu></label>
				
				<br>
		
				<input type="text" name="shop_edit_image_url" id="shop_edit_image_url" value="<?php echo $shopeditbadge['badge_id'];?>"><br />
                
                <label><ubuntu><?php echo $language['shop_edit_value']; ?></ubuntu></label>
				
				<br>
		
				<input type="text" name="shop_edit_value" id="shop_edit_value" value="<?php echo $shopeditbadge['value'];?>"><br />
                
                <label><ubuntu><?php echo $language['shop_edit_min_rank']; ?></ubuntu></label>
				
				<br>
		
				<select class="select" name="shop_edit_rank" style="background-color: #FFFFFF; width: 100%;" id="shop_edit_rank">
					
					<?php 
					$queryeditbadge = mysql_query("SELECT * FROM ranks ORDER BY id LIMIT 20");
					while($editbadge = mysql_fetch_array($queryeditbadge)){
					?>
					
					<option <?php if($shopeditbadge['rank_id'] == $editbadge['id']){ echo 'selected'; } ?> value="<?php echo $editbadge['id']; ?>"><?php echo $editbadge['name']; ?></option>
					
					<?php } ?>
				
				</select>
                
            </div>
			
			<a class="overlowButton editThisBadge" style="text-shadow: none; margin-top: 10px; margin- float: right;">
										
				<b><u class="overlowButtonText" style="">
														
					<i><ubuntu><?php echo $language['submit']; ?></ubuntu></i>
														
				</u></b>
															
				<div></div>
														
			</a> 
            
        </div>
		
		<div class="bottom"></div>
		
	</div>
    
<?php } ?>