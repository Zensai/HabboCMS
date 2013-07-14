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

$shopquerybuy = mysql_query("SELECT * FROM shop_badges WHERE id = '".$core->ExploitRetainer($_POST['id'])."'");
$shopbuybadge = mysql_fetch_array($shopquerybuy);
?>

<?php
if($core->ExploitRetainer($users->UserInfo($username, 'crystals')) == $shopbuybadge['value'] || $core->ExploitRetainer($users->UserInfo($username, 'crystals')) > $shopbuybadge['value']){
	$check_enoughbuy = 'yes';
}else{
	$check_enoughbuy = 'no';
}

if($check_enoughbuy == 'yes'){
?>

<script>
$(document).ready(function() {

	$("#onclickCloseShopBadge").click(function () {
		$("#overlowShopBadge").fadeOut("slow");
	});
	
	$('.submitBuyThisBadge').click(function() { 
		$("#overlowShopBadge").fadeOut("slow");
		addBadgeToUser<?php echo $shopbuybadge['id']; ?>();
		$('.reloader').html('<meta http-equiv="refresh" content="0">');
	});
	
	function addBadgeToUser<?php echo $shopbuybadge['id']; ?>(){

		var badge_id = '<?php echo $shopbuybadge['badge_id']; ?>';
		var badge_value = '<?php echo $shopbuybadge['value']; ?>';

		$.post("<?php echo HOST; ?>/shop/badge/add/<?php echo $shopbuybadge['badge_id']; ?>/<?php echo $core->ExploitRetainer($users->UserInfo($username, 'id')); ?>/<?php echo $shopbuybadge['value']; ?>", { badge_id: badge_id, badge_value: badge_value }, function(result){ 
		});

	}

});
</script>

	<?php 
	$new_belcredits = $core->ExploitRetainer($users->UserInfo($username, 'crystals')) -$core->ExploitRetainer($shopbuybadge['value']); 
	?>

	<div class="container" style="width: 350px;">
		
		<div class="top"></div>
		
		<div id="onclickCloseShopBadge" class="closeButton"></div>
        
        <div style="margin-top: -20px;"></div>
		
		<div class="text" style="width: 290px;">
        
        	<div style="display: table; width: 100%; margin-top: -20px;">
            
            	<div style="float: left;"><img style="margin-left: 10px; margin-top: 10px; margin-bottom: 10px;" src="<?php echo $badge_url; ?><?php echo $shopbuybadge['badge_id'];?>.gif"></div>
                                    
            	<div style="float: left; font-weight: bold; font-size: 17px; padding-left: 10px; padding-top: 21px;"><ubuntu><?php echo $shopbuybadge['badge_name'];?></ubuntu></div>
                
            </div>
            
            <div style="border-top: 1px solid #CCCCCC; border-bottom: 1px solid #FFFFFF; width: 310px;"></div>
            
            <div style="width: 100%;">
            
            	<div style="float: left;"><img style="margin-left: 10px; margin-top: 10px; margin-bottom: 10px;" src="<?php echo HOST; ?>/web-gallery/icons/belcr_icon.gif"></div>
        
        		<div style="float: left; font-weight: bold; font-size: 17px; padding-left: 10px; padding-top: 21px;"><ubuntu><?php echo $shopbuybadge['value'];?></ubuntu></div>
                
            </div>
            
            <br />
			
			<a class="overlowButton submitBuyThisBadge" style="text-shadow: none; margin-top: 0px; margin-left: 0px; float: right;">
										
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

	$("#onclickCloseShopBadge").click(function () {
		$("#overlowShopBadge").fadeOut("slow");
	});

});
</script>

	<div class="container" style="width: 350px;">
		
		<div class="top"></div>
		
		<div id="onclickCloseShopBadge" class="closeButton"></div>
		
		<div class="text" style="width: 290px; margin-top: -20px;">
			
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