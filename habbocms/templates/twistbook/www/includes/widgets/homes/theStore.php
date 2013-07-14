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

$user_id = $core->ExploitRetainer($_POST['user_id']);

$query = mysql_query("SELECT * FROM home");
?>

<script src="<?php echo HOST; ?>/web-gallery/styles/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php echo HOST; ?>/web-gallery/styles/js/ubuntu.font.js" type="text/javascript"></script>
			
<script type="text/javascript">
	Cufon.replace("ubuntu");
</script>

<div class="messageOverlowGreenContainer itemBoughtStickyGood" style="margin-top: -60px; margin-left: 190px; opacity: 0.8; position: fixed; display: none;"><ubuntu>Je aankoop is gelukt!</ubuntu></div>

<div class="errorMessageOverlow itemBoughtStickyFalse" style="margin-top: -60px; margin-left: 190px; opacity: 0.8; position: fixed; width: 350px; display: none;"><ubuntu>Je aankoop is mislukt!</ubuntu></div>

<script>
$(document).ready(function() {

	$("#onclickCloseTheStore").click(function () {
		$("#overlowTheStore").fadeOut();
	});

});

function loadMyItems(ItemStickyId, ItemStickyIdSecond){
	
	$('#PreviewBoxMyItems').html('<center><img style="margin-top: 10px; margin-left: 50px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_bubbles.gif"></center>');

	var id = ItemStickyId;
	var second_id = ItemStickyIdSecond;

	$.post("<?php echo HOST; ?>/home/my/items/preview/" + ItemStickyId + "/" + ItemStickyIdSecond, { id: id, second_id: second_id }, function(result){ 
		$('#PreviewBoxMyItems').html(result); 
	});

}

function loadMyItemsWidget(ItemStickyId, ItemStickyIdSecond){
	
	$('#PreviewBoxMyItemsWidget').html('<center><img style="margin-top: 10px; margin-left: 50px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_bubbles.gif"></center>');

	var id = ItemStickyId;
	var second_id = ItemStickyIdSecond;

	$.post("<?php echo HOST; ?>/home/my/items/preview/widget/" + ItemStickyId + "/" + ItemStickyIdSecond, { id: id, second_id: second_id }, function(result){ 
		$('#PreviewBoxMyItemsWidget').html(result); 
	});

}
</script>

<div class="TheStore">
		
<script>
$(document).ready(function() {
	$('.tabsStoreSticky').click( function () {
		$('.tabsStoreAll').hide();
		$('#tabsStoreSticky').fadeIn();
	});
	$('.tabsStoreWallpapers').click( function () {
		$('.tabsStoreAll').hide();
		$('#tabsStoreWallpapers').fadeIn();
	});
	
});
</script>

<style type="text/css">
#tabsStore {
	background-color: #FFFFFF;
	border-radius: 4px;
	border: 1px solid #AAAAAA;
	padding: 5px 15px 10px 17px
}

#tabsStore .ul {
	border-bottom: 1px dashed #AAAAAA;
	margin-bottom: 10px;
	display: table;
	width: 100%;
	margin-left: -10px;
	margin-right: -20px;
}

#tabsStore .ul .li {
	float: left;
	padding-left: 10px;
	cursor: pointer;
}

#tabsStore .ul .li {
	color: #333;
	font-size: 21px;
}
</style>
            
<div id="tabsStore">
            
    <div class="ul">
        <div class="li tabsStoreSticky"><ubuntu><?php echo $language['my_items_stickys']; ?></ubuntu></a></div>
        <div class="li tabsStoreWallpapers" style="margin-left: 10px;"><ubuntu><?php echo $language['my_items_backgrounds']; ?></ubuntu></a></div>
    </div>
    
    <div id="tabsStoreSticky" class="tabsStoreAll">
    
    	<script>
		$(document).ready(function() {
   			$( "#tabsInsideStore" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
   			$( "#tabsInsideStore li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
		});
		</script>
    
		<style type="text/css">
		#tabsInsideStore {
			background: none !important;
			border: none !important;
			padding: 0 !important;
			margin: -5px -5px -5px -15px !important;
		}

		#tabsInsideStore ul {
			width: 200px !important;
			float: left !important;
			background: none !important;
			border: none !important;
			margin-top: -2px !important;
		}
			
		#tabsInsideStore ul li {
			background-color: #999 !important;
			color: #FFFFFF !important;
			padding: 0px !important;
			font-size: 11px !important;
			width: 180px !important;
			margin-top: 2px !important;
		}
			
		#tabsInsideStore ul li.ui-state-active {
			font-weight: bold !important;
			background-color: #424142 !important;
		}
			
		#tabsInsideStore .ui-tabs-panel {
			width: 500px !important;
			float: left !important;
		}
			
		#tabsInsideStore ul li .settingsArrow {
			border: none;
		}
			
		#tabsInsideStore ul li.ui-state-active .settingsArrow {
			width: 0; 
			height: 0; 
			border-top: 13px solid transparent;
			border-bottom: 13px solid transparent;
			border-right: transparent;
			border-left: 13px solid #424142;
			float: right;
			margin-top: -1px;
			margin-right: -13px;
			margin-bottom: -5px;
			border-radius: 3px;
		}
			
		#tabsInsideStore .textContainerTheStore{
			margin-left: -15px !important;
			margin-top: -5px !important;
			float: right !important;
			width: 490px !important;
		}
		</style>
    
    	<div id="tabsInsideStore">
        
        	<script>
			function loadItemsStoreStickys(ItemStickyId){
	
				$('#PreviewBoxShopSticky').html('<center><img style="margin-top: 10px; margin-left: 50px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_bubbles.gif"></center>');

				var id = ItemStickyId;

				$.post("<?php echo HOST; ?>/home/store/preview/" + ItemStickyId, { id: id }, function(result){ 
					$('#PreviewBoxShopSticky').html(result); 
				});

			}
			</script>
        
        	<ul style="">
            	<?php 
				$query_shop_inside = mysql_query("SELECT * FROM homes_shop_catagories_stickys");
				while($shop_inside = mysql_fetch_array($query_shop_inside)){
				?>
                	<li><a href="#shop_inside_<?php echo $shop_inside['id_name']; ?>" style="color: #FFFFFF;"><?php echo $shop_inside['name']; ?></a> <div class="settingsArrow"></div></li>
                <?php } ?>
   			</ul>
            
            	<?php 
				$query_shop_inside_s = mysql_query("SELECT * FROM homes_shop_catagories_stickys");
				while($shop_inside_s = mysql_fetch_array($query_shop_inside_s)){
				?>
    				<div id="shop_inside_<?php echo $shop_inside_s['id_name']; ?>" class="textContainerTheStore">
                    
                    	<div style="width: 320px; float: left;">
                    
                		<?php 
						$query_while_inside_shop_items = mysql_query("SELECT * FROM homes_shop_stickys WHERE catagorie = '".$shop_inside_s['id']."' ORDER BY id");
						$while_inside_shop_items_count = mysql_num_rows($query_while_inside_shop_items);
						if($while_inside_shop_items_count == 0){ echo '<div class="errorMessageOverlow" style="width: 100%;">'.$language['no_items_in_shop'].'</div>'; }else{ }
						while($while_inside_shop_items = mysql_fetch_array($query_while_inside_shop_items)){
						?>
                        	<script>
							$(document).ready(function() {
							
								$('#sticky_shop_item<?php echo $while_inside_shop_items['id']; ?>').click( function () {
									loadItemsStoreStickys('<?php echo $while_inside_shop_items['id']; ?>');
									$('#PreviewBoxShopSticky<?php echo $shop_inside_s['id']; ?>').html('<center><img style="margin-top: 10px; margin-left: 50px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_bubbles.gif"></center>');
									
									var id = '<?php echo $while_inside_shop_items['id']; ?>';

									$.post("<?php echo HOST; ?>/home/shop/preview/<?php echo $while_inside_shop_items['id']; ?>", { id: id }, function(result){ 
										$('#PreviewBoxShopSticky<?php echo $shop_inside_s['id']; ?>').html(result); 
									});
								});
							
                       		});
							</script>
                            
                        	<div title="<?php echo $while_inside_shop_items['name']; ?>" id="sticky_shop_item<?php echo $while_inside_shop_items['id']; ?>" class="myItemBox itemId<?php echo $while_inside_shop_items['id']; ?>" style="background: url(<?php echo HOST; ?>/web-gallery/homes/sticky/<?php echo $while_inside_shop_items['image']; ?>) center center no-repeat #E7E7E7; float: left; display: block;"></div>
                        <?php } ?>
                        
                        </div>
                        
                        <div id="PreviewBoxShopSticky<?php echo $shop_inside_s['id']; ?>" style="margin-right: -25px;">
                    
                   	 		<div class="onclickedInformationContainerMyItems">
     							<div class="PrevieuwBox"></div>
							</div>
                    
                    	</div>
                        
                	</div>
                <?php } ?>
        
        </div>
        
    </div>
    
    <div id="tabsStoreWallpapers" class="tabsStoreAll" style="display: none;">
    
    <div style="display: table;">
    
    	<div style="width: 570px; float: left; margin-right: 10px;">
        
        <?php 
		$query_shop_background = mysql_query("SELECT * FROM homes_shop_backgrounds");
		while($shop_background = mysql_fetch_array($query_shop_background)){
			
			$qery_check_if_background_exists = mysql_query("SELECT * FROM homes_items WHERE user_id = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."' AND item_id = '".$shop_background['id']."' AND type = 'background'");
		?>
        
        	<script>
			$(document).ready(function() {
							
				$('#sticky_shop_item_background<?php echo $shop_background['id']; ?>').click( function () {
					$('#PreviewBoxShopBackground').html('<center><img style="margin-top: 10px; margin-right: 50px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_bubbles.gif"></center>');
									
					var id = '<?php echo $shop_background['id']; ?>';

					$.post("<?php echo HOST; ?>/home/shop/preview/background/<?php echo $shop_background['id']; ?>", { id: id }, function(result){ 
						$('#PreviewBoxShopBackground').html(result); 
					});
				});
							
            });
			</script>
                            
            <div title="<?php echo $shop_background['name']; ?>" id="sticky_shop_item_background<?php echo $shop_background['id']; ?>" class="myItemBox itemId<?php echo $shop_background['id']; ?>" style="background: url(<?php echo HOST; ?>/web-gallery/homes/background/<?php echo $shop_background['image']; ?>.gif) center center repeat #E7E7E7; float: left; <?php if(mysql_num_rows($qery_check_if_background_exists) == 1){ echo 'display: none;'; }else{ echo 'display: block;'; } ?>"></div>
        
        <?php } ?>
        
        </div>
        
        <div id="PreviewBoxShopBackground" style="margin-right: -20px; float: left;">
                    
          	<div class="onclickedInformationContainerMyItems">
     			<div class="PrevieuwBox"></div>
			</div>
                    
        </div>
        
    </div>
        
    </div>
    
</div>
			
</div>           