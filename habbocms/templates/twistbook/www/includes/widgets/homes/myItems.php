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

<link rel="stylesheet" href="<?php echo HOST; ?>/web-gallery/styles/css/jquery-ui2.css" type="text/css">
<script type="text/javascript" src="<?php echo HOST; ?>/web-gallery/styles/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="<?php echo HOST; ?>/web-gallery/styles/js/jquery-ui.js"></script>

<script>
$(document).ready(function() {

	$("#onclickCloseMyItems").click(function () {
		$("#overlowMyItems").fadeOut();
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

function loadMyItemsBackground(ItemStickyId, ItemStickyIdSecond){
	
	$('#PreviewBoxMyItemsBackground').html('<center><img style="margin-top: 10px; margin-left: 50px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_bubbles.gif"></center>');

	var id = ItemStickyId;
	var second_id = ItemStickyIdSecond;

	$.post("<?php echo HOST; ?>/home/my/items/preview/background/" + ItemStickyId + "/" + ItemStickyIdSecond, { id: id, second_id: second_id }, function(result){ 
		$('#PreviewBoxMyItemsBackground').html(result); 
	});

}
</script>
		
			<script>
    		$(document).ready(function() {
        		$( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
        		$( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
    		});
    		</script>
            
            <style type="text/css">
			#tabs ul {
				width: 200px;
				float: left;
				background: none !important;
				border: none !important;
				margin-top: -2px !important;
			}
			
			#tabs ul li {
				background-color: #999 !important;
				color: #FFFFFF !important;
				padding: 5px !important;
				font-size: 11px !important;
				width: 180px !important;
				margin-top: 2px !important;
			}
			
			#tabs ul li.ui-state-active {
				font-weight: bold !important;
				background-color: #424142 !important;
			}
			
			.ui-tabs-panel {
				width: 500px;
				float: left;
			}
			
			#tabs ul li .settingsArrow {
				border: none;
			}
			
			#tabs ul li.ui-state-active .settingsArrow {
				width: 0; 
				height: 0; 
				border-top: 20px solid transparent;
				border-bottom: 20px solid transparent;
				border-right: transparent;
				border-left: 20px solid #424142;
				float: right;
				margin-top: -6px;
				margin-right: -25px;
				margin-bottom: -5px;
				border-radius: 3px;
			}
			
			.textContainerMyItems {
				margin-top: -20px;
			}
			</style>
            
            <div id="tabs">
               	<ul>
                	<li><a href="#my-stickys" style="color: #FFFFFF;"><?php echo $language['my_items_stickys']; ?></a> <div class="settingsArrow"></div></li>
                    <li><a href="#my-widgets" style="color: #FFFFFF; margin-bottom: 2px;"><?php echo $language['my_items_widgets']; ?></a> <div class="settingsArrow"></div></li>
                    <li><a href="#my-backgrounds" style="color: #FFFFFF; margin-bottom: 2px;"><?php echo $language['my_items_backgrounds']; ?></a> <div class="settingsArrow"></div></li>
   				</ul>
    			<div id="my-stickys" class="textContainerMyItems">
                
                	<div style="height: 10px;"></div>
                    
                    <div style="width: 320px; float: left;">
        			
                    <?php 
					$query_my_items_sticky = mysql_query("SELECT * FROM homes_items WHERE user_id = '".$user_id."' AND type = 'sticky' ORDER BY item_id");
					$c = 0;
					while($my_items_sticky = mysql_fetch_array($query_my_items_sticky)){
						
						$query_my_items_sticky_s = mysql_query("SELECT * FROM homes_shop_stickys WHERE id = '".$my_items_sticky['item_id']."'");
						$my_items_sticky_s = mysql_fetch_array($query_my_items_sticky_s);
						
						$query_count_sticky = mysql_num_rows(mysql_query("SELECT * FROM homes_items WHERE user_id = '".$user_id."' AND item_id = '".$my_items_sticky['item_id']."'"));
						
					?>
                    	<script>
							
							var how_much_items_inhome = <?php echo $query_count_sticky; ?> - $('.<?php echo $my_items_sticky['item_id']; ?>_inhome_sticky:visible').size();
							if(how_much_items_inhome == 1){ }else{
								$('.CountItems<?php echo $my_items_sticky_s['id']; ?>_container').html('<div class="CountItems<?php echo $my_items_sticky_s['id']; ?>" style="float: right; margin: 2px 2px 0 0; width: 32px; height: 15px; background-image: url(<?php echo HOST; ?>/web-gallery/homes/item_count_label.gif); text-align: center; color: #FFFFFF; font-weight: bold; font-size: 10px; padding-top: 2px;">x' + how_much_items_inhome + '</div>');
							}
							
                            var display_sticky = $('#widget_<?php echo $my_items_sticky['id']; ?>_show').val();
							
							if($('#container_sticky_<?php echo $my_items_sticky['id']; ?>').is(":visible")){
								$('#sticky_<?php echo $my_items_sticky['id']; ?>').remove();
							}
							
							$('.<?php echo $my_items_sticky['item_id']; ?>_myitems').hide();
							$('.<?php echo $my_items_sticky['item_id']; ?>_myitems:first').show();
							$('.<?php echo $my_items_sticky['item_id']; ?>_myitems:hidden').remove();
							
							$('#sticky_<?php echo $my_items_sticky['id']; ?>').click( function () {
								loadMyItems('<?php echo $my_items_sticky_s['id']; ?>', '<?php echo $my_items_sticky['id']; ?>');
							});
						</script>
                    	<div title="<?php echo $my_items_sticky_s['name']; ?>" id="sticky_<?php echo $my_items_sticky['id']; ?>" class="myItemBox itemCount<?php echo $c; ?> itemId<?php echo $my_items_sticky['item_id']; ?> myItemsStickysCountItToError <?php echo $my_items_sticky['item_id']; ?>_myitems" style="background: url(<?php echo HOST; ?>/web-gallery/homes/sticky/<?php echo $my_items_sticky_s['image']; ?>) center center no-repeat #E7E7E7; float: left; display: block;">
                        
                        	<div class="CountItems<?php echo $my_items_sticky_s['id']; ?>_container"></div>
                        
                    	</div>
                    <?php 
					$c++;
					
					}
					?>
                    
                    </div>
                    
                    <div id="PreviewBoxMyItems">
                    
                   	 	<div class="onclickedInformationContainerMyItems">
     						<div class="PrevieuwBox"></div>
						</div>
                    
                    </div>
                    
    			</div>
                
    			<div id="my-widgets" class="textContainerMyItems">
                
                	<div style="height: 10px;"></div>
                    
                    <div style="width: 320px; float: left;">
                    
                    	<?php 
						$query_widget_badges = mysql_query("SELECT * FROM homes_items WHERE user_id = '".$user_id."' AND item_id = '2' AND type = 'widget'");
						$widget_badges = mysql_fetch_array($query_widget_badges);
						?>
                    
                    	<script>
                            var display_widget = $('#widget_<?php echo $widget_badges['id']; ?>_show').val();
							
							if(display_widget == 'yes'){
								$('#widget_<?php echo $widget_badges['id']; ?>').css('opacity', '0.5');
								$('#widget_<?php echo $widget_badges['id']; ?>').css('cursor', 'normal');
							}else{
								$('#widget_<?php echo $widget_badges['id']; ?>').click( function () {
									loadMyItemsWidget('<?php echo $widget_badges['item_id']; ?>', '<?php echo $widget_badges['id']; ?>');
								});
							}
						</script>
                        
                    	<div title="" id="widget_<?php echo $widget_badges['id']; ?>" class="myItemBox itemIdWidget<?php echo $widget_badges['item_id']; ?>" style="background: url(<?php echo HOST; ?>/web-gallery/homes/widget/widget_badges.gif) no-repeat #E7E7E7; float: left; display: block;"></div>
                        
                        <?php 
						$query_widget_rooms = mysql_query("SELECT * FROM homes_items WHERE user_id = '".$user_id."' AND item_id = '4' AND type = 'widget'");
						$widget_rooms = mysql_fetch_array($query_widget_rooms);
						?>
                    
                    	<script>
                            var display_widget = $('#widget_<?php echo $widget_rooms['id']; ?>_show').val();
							
							if(display_widget == 'yes'){
								$('#widget_<?php echo $widget_rooms['id']; ?>').css('opacity', '0.5');
								$('#widget_<?php echo $widget_rooms['id']; ?>').css('cursor', 'normal');
							}else{
								$('#widget_<?php echo $widget_rooms['id']; ?>').click( function () {
									loadMyItemsWidget('<?php echo $widget_rooms['item_id']; ?>', '<?php echo $widget_rooms['id']; ?>');
								});
							}
						</script>
                        
                    	<div title="" id="widget_<?php echo $widget_rooms['id']; ?>" class="myItemBox itemIdWidget<?php echo $widget_rooms['item_id']; ?>" style="background: url(<?php echo HOST; ?>/web-gallery/homes/widget/widget_rooms.gif) no-repeat #E7E7E7; float: left; display: block;"></div>
                        
                        <?php 
						$query_widget_questbook = mysql_query("SELECT * FROM homes_items WHERE user_id = '".$user_id."' AND item_id = '5' AND type = 'widget'");
						$widget_questbook = mysql_fetch_array($query_widget_questbook);
						?>
                    
                    	<script>
                            var display_widget = $('#widget_<?php echo $widget_questbook['id']; ?>_show').val();
							
							if(display_widget == 'yes'){
								$('#widget_<?php echo $widget_questbook['id']; ?>').css('opacity', '0.5');
								$('#widget_<?php echo $widget_questbook['id']; ?>').css('cursor', 'normal');
							}else{
								$('#widget_<?php echo $widget_questbook['id']; ?>').click( function () {
									loadMyItemsWidget('<?php echo $widget_questbook['item_id']; ?>', '<?php echo $widget_questbook['id']; ?>');
								});
							}
						</script>
                        
                    	<div title="" id="widget_<?php echo $widget_questbook['id']; ?>" class="myItemBox itemIdWidget<?php echo $widget_questbook['item_id']; ?>" style="background: url(<?php echo HOST; ?>/web-gallery/homes/widget/widget_guestbook.gif) no-repeat #E7E7E7; float: left; display: block;"></div>
                        
                        <?php 
						$query_widget_friends = mysql_query("SELECT * FROM homes_items WHERE user_id = '".$user_id."' AND item_id = '3' AND type = 'widget'");
						$widget_friends = mysql_fetch_array($query_widget_friends);
						?>
                    
                    	<script>
                            var display_widget = $('#widget_<?php echo $widget_friends['id']; ?>_show').val();
							
							if(display_widget == 'yes'){
								$('#widget_<?php echo $widget_friends['id']; ?>').css('opacity', '0.5');
								$('#widget_<?php echo $widget_friends['id']; ?>').css('cursor', 'normal');
							}else{
								$('#widget_<?php echo $widget_friends['id']; ?>').click( function () {
									loadMyItemsWidget('<?php echo $widget_friends['item_id']; ?>', '<?php echo $widget_friends['id']; ?>');
								});
							}
						</script>
                        
                    	<div title="" id="widget_<?php echo $widget_friends['id']; ?>" class="myItemBox itemIdWidget<?php echo $widget_friends['item_id']; ?>" style="background: url(<?php echo HOST; ?>/web-gallery/homes/widget/widget_friends.gif) no-repeat #E7E7E7; float: left; display: block;"></div>
                    
                    </div>
                    
                    <div id="PreviewBoxMyItemsWidget">
                    
                   	 	<div class="onclickedInformationContainerMyItems">
     						<div class="PrevieuwBox"></div>
						</div>
                    
                    </div>

    			</div>
                
                <div id="my-backgrounds" class="textContainerMyItems">
                
                	<div style="height: 10px;"></div>
                    
                    <div style="width: 320px; float: left;">
        			
                    <?php 
					$query_my_items_background = mysql_query("SELECT * FROM homes_items WHERE user_id = '".$user_id."' AND type = 'background' ORDER BY item_id");
					$c = 0;
					while($my_items_background = mysql_fetch_array($query_my_items_background)){
						
						$query_my_items_background_s = mysql_query("SELECT * FROM homes_shop_backgrounds WHERE id = '".$my_items_background['item_id']."'");
						$my_items_background_s = mysql_fetch_array($query_my_items_background_s);
						
						
					?>
                    	<script>
                            var display_background = $('.body').css('background-image');
							
							if(display_background == 'url(<?php echo HOST; ?>/web-gallery/homes/background/<?php echo $my_items_background_s['image']; ?>.gif)'){
								$('#background_<?php echo $my_items_background['id']; ?>').css('opacity', '0.5');
								$('#background_<?php echo $my_items_background['id']; ?>').css('cursor', 'normal');
							}else{
								$('#background_<?php echo $my_items_background['id']; ?>').click( function () {
									loadMyItemsBackground('<?php echo $my_items_background_s['id']; ?>', '<?php echo $my_items_background['id']; ?>');
								});
							}
						</script>
                        
                    	<div title="<?php echo $my_items_background_s['name']; ?>" id="background_<?php echo $my_items_background['id']; ?>" class="myItemBox itemCount<?php echo $c; ?> itemId<?php echo $my_items_background['item_id']; ?> myItemsbackgroundsCountItToError" style="background: url(<?php echo HOST; ?>/web-gallery/homes/background/<?php echo $my_items_background_s['image']; ?>.gif) center center repeat #E7E7E7; float: left; display: block;">
                       	
                        </div>
                        
                    <?php 
					$c++;
					
					}
					?>
                    
                    </div>
                    
                    <div id="PreviewBoxMyItemsBackground">
                    
                   	 	<div class="onclickedInformationContainerMyItems">
     						<div class="PrevieuwBox"></div>
						</div>
                    
                    </div>
                
                </div>
               