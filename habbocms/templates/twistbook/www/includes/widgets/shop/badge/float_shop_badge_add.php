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

?>

<?php if($core->ExploitRetainer($users->UserPermission('cms_shop', $username))){ ?>

	<script>
	$(document).ready(function() {
    
		$(".onclickOpenShopBadgeAdd").click(function () {
			$("#overlowShopBadgeAdd").fadeIn("slow");
		});
		
		$("#onclickCloseShopBadgeAdd").click(function () {
			$("#overlowShopBadgeAdd").fadeOut("slow");
		});
		
		$(".addThisBadge").click(function () {
			$("#overlowShopBadgeAdd").fadeOut("slow");
			$('.addBadgeForm').submit();
		});

	});
	</script>

	<div class="overlowContainer" id="overlowShopBadgeAdd">
                
    	<div class="container" style="width: 330px;">
		
			<div class="top"></div>
		
			<div id="onclickCloseShopBadgeAdd" class="closeButton"></div>
            
            <div class="localOverlowTitleSettings"><b><ubuntu><?php echo $language['add_badge']; ?></ubuntu></b></div>
        
        	<div style="margin-top: -20px;"></div>
		
			<div class="text" style="width: 270px;">
            
           		<div class="insideContainer" style="float: left;">
                
                <form method="get" class="addBadgeForm" action="<?php echo HOST; ?>/shop/badge/add/badge/shop">
                
                	<label style="font-size: 16px;"><ubuntu><?php echo $language['shop_edit_image_url']; ?></ubuntu></label>
				
					<br>
		
					<input type="text" name="badge_id" id="shop_add_badge_image_url" value=""><br />
            
            		<label style="font-size: 16px;"><ubuntu><?php echo $language['shop_edit_name']; ?></ubuntu></label>
				
					<br>
		
					<input type="text" name="badge_name" id="shop_add_name" value=""><br />
                
                	<label style="font-size: 16px;"><ubuntu><?php echo $language['shop_edit_value']; ?></ubuntu></label>
				
					<br>
		
					<input type="text" name="value" id="shop_add_value" value=""><br />
                
               	 	<label style="font-size: 16px;"><ubuntu><?php echo $language['shop_edit_min_rank']; ?></ubuntu></label>
				
					<br>
		
					<select class="select" name="rank_id" style="background-color: #FFFFFF; width: 100%;" id="shop_add_rank">
					
						<?php 
						$queryaddbadge = mysql_query("SELECT * FROM ranks ORDER BY id LIMIT 20");
						while($addbadge = mysql_fetch_array($queryaddbadge)){
						?>
					
						<option value="<?php echo $addbadge['id']; ?>"><?php echo $addbadge['name']; ?></option>
					
						<?php } ?>
				
					</select>
               	 
            	</div>
				
				<a class="overlowButton addThisBadge" style="text-shadow: none; margin-top: 10px; margin-right: -20px; float: right;">
										
					<b><u class="overlowButtonText" style="">
											
						<i><ubuntu><?php echo $language['submit']; ?></ubuntu></i>
											
					</u></b>
												
					<div></div>
											
				</a> 
                
            </form>
            
        	</div>
		
			<div class="bottom"></div>
		
		</div>

	</div>

<?php } ?>