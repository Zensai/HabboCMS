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
$shopbuyfurniture = mysql_fetch_array($shopquerybuy);
?>

<?php
if($core->ExploitRetainer($users->UserInfo($username, 'crystals')) == $shopbuyfurniture['value'] || $core->ExploitRetainer($users->UserInfo($username, 'crystals')) > $shopbuyfurniture['value']){
	$check_enoughbuy = 'yes';
}else{
	$check_enoughbuy = 'no';
}

if($check_enoughbuy == 'yes'){
?>

<script>
$(document).ready(function() {

	$("#onclickCloseShopFurniture").click(function () {
		$("#overlowShopFurniture").fadeOut("slow");
	});
	
	$('.submitBuyThisFurniture').click(function() { 
		$("#overlowShopFurniture").fadeOut("slow");
		addFurnitureToUser<?php echo $shopbuyfurniture['id']; ?>();
		$('.reloader').html('<meta http-equiv="refresh" content="0">');
	});
	
	function addFurnitureToUser<?php echo $shopbuyfurniture['id']; ?>(){

		var item_ids = '<?php echo $shopbuyfurniture['item_ids']; ?>';
		var value = '<?php echo $shopbuyfurniture['value']; ?>';

		$.post("<?php echo HOST; ?>/shop/furniture/add/<?php echo $shopbuyfurniture['item_ids']; ?>/<?php echo $shopbuyfurniture['value']; ?>", { item_ids: item_ids, value: value }, function(result){ 
		});

	}

});
</script>

	<?php 
	$new_belcredits = $core->ExploitRetainer($users->UserInfo($username, 'crystals')) -$core->ExploitRetainer($shopbuyfurniture['value']); 
	?>

	<div class="container" style="width: 300px;">
		
		<div class="top"></div>
		
		<div id="onclickCloseShopFurniture" class="closeButton"></div>
        
        <div class="localOverlowTitleSettings"><b><ubuntu><?php echo $shopbuyfurniture['furniture_name'];?></ubuntu></b></div>
        
        <div style="margin-top: -20px;"></div>
		
		<div class="text" style="width: 240px;">
            
            <div style="width: 100%;">
            	<center>
                	<img style="margin-left: 10px; margin-top: 10px; margin-bottom: 10px;" src="<?php echo HOST; ?>/web-gallery/general/shop/furniture/<?php echo $shopbuyfurniture['furniture_image_url'];?>.gif">
                    
                    <div style="width: auto; margin-left: 40px;">
            
                        <div style="float: left;"><img style="margin-left: 10px; margin-top: 10px; margin-bottom: 10px;" src="<?php echo HOST; ?>/web-gallery/icons/belcr_icon.gif"></div>
                
                        <div style="float: left; font-weight: bold; font-size: 17px; padding-left: 10px; padding-top: 21px;"><ubuntu><?php echo $shopbuyfurniture['value'];?></ubuntu></div>
                        
                    </div>
                </center>
            </div>
            
            <br />
			
			<a class="overlowButton submitBuyThisFurniture" style="text-shadow: none; margin-top: 00px; margin-right: -20px; float: right;">
										
				<b><u class="overlowButtonText" style="">
														
					<i><ubuntu><?php echo $language['buy']; ?></ubuntu></i>
														
				</u></b>
															
				<div></div>
														
			</a> 
            
        </div>
		
		<div class="bottom"></div>
		
	</div>
    
<?php }elseif($check_enoughbuy == 'no'){ ?>

<script>
$(document).ready(function() {

	$("#onclickCloseShopFurniture").click(function () {
		$("#overlowShopFurniture").fadeOut("slow");
	});

});
</script>

	<div class="container" style="width: 330px;">
		
		<div class="top"></div>
		
		<div id="onclickCloseShopFurniture" class="closeButton"></div>
		
		<div class="text" style="width: 270px;">
			
			<div id="frankAvatar"></div> 
				
			<div class="frankBubble left">

				<div class="frankBubbleArrowWhite"></div>
					
				<div class="frankBubbleText" style="">
					
					<?php echo $language['frank_not_enough_to_buy']; ?>
						
				</div>
					
			</div>
            
            <div style="height: 1px; width: 50px; float: left;"></div>
            
				
		</div>
		
		<div class="bottom"></div>
		
	</div>

<?php } ?>