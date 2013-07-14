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
include("includes/inc.global.php");

$menu = 'shop';
$page = 'shop_furniture';
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

	<title><?php echo $hotelname; ?> - <?php echo $language['menu_shop_furniture']; ?></title>
	<?php echo $Style->General(); ?>
    <script src="https://www.targetpay.com/send/include.js"> </script>

	<?php echo $themeswitcher; ?>

</head>

<?php if($core->ExploitRetainer($users->UserPermission('cms_shop', $username))){ ?>

	<script>
	$(document).ready(function() {
	
		$('#onclickOpenBuyShop').click(function() { 
			$('.editDeleteButtonShowHide').hide();
			$('.showOnclickedBuyButton').fadeIn('fast');
		});
	
		$('#onclickOpenEditShop').click(function() { 
			$('.editDeleteButtonShowHide').hide();
			$('.showOnclickedEditButton').fadeIn('fast');
		});
	
		$('#onclickOpenDeleteShop').click(function() { 
			$('.editDeleteButtonShowHide').hide();
			$('.showOnclickedDeleteButton').fadeIn('fast');
		});
	
	});
	</script>

<?php } ?>

<body onkeydown="onKeyDown()">

<?php include("apps/float_includes.php"); ?>
<?php include("apps/system/float_includes.php"); ?>

<?php include("apps/float/shop/furniture/float_shop_furniture.php"); ?>

<?php if($core->ExploitRetainer($users->UserPermission('cms_shop', $username))){ 

 	include("apps/float/shop/furniture/float_shop_furniture_edit.php"); 
	
	include("apps/float/shop/furniture/float_shop_furniture_add.php"); 

} ?>

<?php include("apps/system/header_top.php"); ?>

<div class="reloader"></div>

<div id="container">
	
	<div id="middleContainer">
	
		<?php include("apps/system/container_header.php"); ?>

		<div id="containerMiddle">

			<div id="containerLeft">
                
                <div id="containerSpace"></div>
				
				<div class="boxContainer rounded staffBox">
                
                	<?php if($core->ExploitRetainer($users->UserPermission('cms_shop', $username))){ ?>
					
						<div id="greyBox">
							
							<a class="overlowButton" style="float: left;">
				
								<b><u>
                                
                                	<div id="onclickOpenBuyShop" title="<?php echo $language["shop_show_normal"]; ?>" class="overlowIcon user"></div>
                                
                                	<div class="overlowIconLine"></div>
						
									<div id="onclickOpenEditShop" title="<?php echo $language["shop_show_edit"]; ?>" class="overlowIcon edit"></div> 
						
									<div class="overlowIconLine"></div> 
						
									<div id="onclickOpenDeleteShop" title="<?php echo $language["shop_show_delete"]; ?>" class="overlowIcon close"></div>
                                    
                                    <div class="overlowIconLine"></div> 
                                    
                                    <div class="overlowIcon onclickOpenShopFurnitureAdd"><img title="<?php echo $language["add_furniture"]; ?>" style="cursor: pointer;margin-top: 9px;" src="<?php echo HOST; ?>/web-gallery/icons/plus_icon.gif"></div>
							
								</u></b>
					
								<div></div>
					
							</a>
							
						</div>
							
					<?php } ?>

					<div class="boxHeader left rounded orange"><ubuntu><?php echo $language['menu_shop_furniture']; ?></ubuntu></div>
                    
                    <?php
					$shopq = mysql_query("SELECT * FROM shop_furniture ORDER BY id DESC");
					$shopq_teller = mysql_num_rows($shopq);

					if($shopq_teller == 0){
				
						echo '<div class="errorMessageOverlow" style="width: 544px;">'.$language['no_shop_furniture'].'</div>';
			
					}
			
					$color = 'dark';
			
					while($shop = mysql_fetch_array($shopq)){
						
						$shopper = $shop['rank_id'] -1;
						
						if($core->ExploitRetainer($users->UserInfo($username, 'rank')) > $shopper){
					?>
                    
                    			<script>
                        		$(document).ready(function() {
	
	                        		$('.onclickOpenShopFurniture<?php echo $shop['id']; ?>').click(function() { 
										$('.loadDataShopFurniture').html('<center><img style="margin-top: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_habbos.gif"></center>');
		                        		loadShopFurniture<?php echo $shop['id']; ?>();
	                        		});
	
	                       		 	function loadShopFurniture<?php echo $shop['id']; ?>(){

		                       		 	var id = '<?php echo $shop['id']; ?>';

		                       		 	$.post("<?php echo HOST; ?>/shop/furniture/buy/<?php echo $shop['id']; ?>", { id: id }, function(result){ 
											$('.loadDataShopFurniture').html(result);
										});

	                       		 	}

                        		});
                        		</script>
                    
								<div class="box <?php echo $color; ?> furnitureId<?php echo $shop['id']; ?>" style="float: left; display: table; width: auto; margin-left: 5px;">
							
										<div><img style="margin-left: 10px; margin-top: 10px; margin-right: 10px;" src="<?php echo HOST; ?>/web-gallery/general/shop/furniture/<?php echo $shop['furniture_image_url']; ?>.gif" title="<?php echo $shop['furniture_name']; ?><br><br><b><?php echo $shop['value']; ?></b> <?php echo $language['diamonds']; ?>"></div> <br>
                                    
                                    	<?php 
										if($core->ExploitRetainer($users->UserInfo($username, 'crystals')) == $shop['value'] || $core->ExploitRetainer($users->UserInfo($username, 'crystals')) > $shop['value']){
											$check_enough = 'yes';
										}else{
											$check_enough = 'no';
										}
										
										if($check_enough == 'yes'){
										?>
                                    
                                    		<input type="submit" style="margin-top: -5px; margin-left: 10px; margin-bottom: 10px;" class="submitLeft onclickOpenShopFurniture onclickOpenShopFurniture<?php echo $shop['id']; ?> editDeleteButtonShowHide showOnclickedBuyButton" id="submitGreen" value="<?php echo $language['buy']; ?>">
                                        
                                        <?php }elseif($check_enough == 'no'){ ?>
                                        
                                        	<input type="submit" style="margin-top: -5px; margin-left: 10px; margin-bottom: 10px;" class="submitLeft onclickOpenShopFurniture onclickOpenShopFurniture<?php echo $shop['id']; ?> editDeleteButtonShowHide showOnclickedBuyButton" id="submitRed" value="<?php echo $language['buy']; ?>">
                                        
                                        <?php } ?>
                                        
                                        <?php if($core->ExploitRetainer($users->UserPermission('cms_shop', $username))){ ?>
                                        
                                        	<script>
                        						$(document).ready(function() {
	
	                        						$('.onclickOpenShopFurnitureEdit<?php echo $shop['id']; ?>').click(function() { 
														$('.loadDataShopFurnitureEdit').html('<center><img style="margin-top: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_habbos.gif"></center>');
		                        						loadShopFurnitureEdit<?php echo $shop['id']; ?>();
	                        		});
	
	                       		 					function loadShopFurnitureEdit<?php echo $shop['id']; ?>(){

		                       		 					var id = '<?php echo $shop['id']; ?>';

		                       		 					$.post("<?php echo HOST; ?>/shop/furniture/edit/<?php echo $shop['id']; ?>", { id: id }, function(result){ 
															$('.loadDataShopFurnitureEdit').html(result);
														});

	                       		 					}

                        						});
                        						</script>
                                        
                                        		<input type="submit" style="display: none; margin-top: -5px; margin-left: 10px; margin-bottom: 10px;" class="submitLeft onclickOpenShopFurnitureEdit onclickOpenShopFurnitureEdit<?php echo $shop['id']; ?> editDeleteButtonShowHide showOnclickedEditButton" id="submitBlack" value="<?php echo $language['edit']; ?>">
                                            
                                            	<script>
                        						$(document).ready(function() {
	
	                        						$('.onclickDeleteShopFurniture<?php echo $shop['id']; ?>').click(function() { 
														$('.furnitureId<?php echo $shop['id']; ?>').fadeOut('fast');
														loadDeleteFurniture<?php echo $shop['id']; ?>();
	                        						});
												
													function loadDeleteFurniture<?php echo $shop['id']; ?>(){

		                       		 					var id = '<?php echo $shop['id']; ?>';

		                       		 					$.post("<?php echo HOST; ?>/shop/furniture/delete/<?php echo $shop['id']; ?>", { id: id }, function(result){ 
														});

	                       		 					}

                        						});
                        						</script>
                                        
                                        		<input type="submit" style="display: none; margin-top: -5px; margin-left: 10px; margin-bottom: 10px;" class="submitLeft onclickDeleteShopFurniture<?php echo $shop['id']; ?> editDeleteButtonShowHide showOnclickedDeleteButton" id="submitRed" value="<?php echo $language['delete']; ?>">
                                            
                                        <?php } ?>
							
								</div>

					<?php
							if($color == 'dark') $color='light'; else $color='dark'; 
						} 
					}
					?>
                    
                </div>

			</div>

			<div id="containerRight">
            
            	<div id="containerSpace"></div>
				
				<div class="creditsInfoBoxGrey" style="width: 281px;">
			
					<div class="inside">
				
						<div class="countBox" style="width: 243px;">
					
							<center>
								
								<div class="event_point"></div>
						
								<div class="nextCredit"><?php echo $core->ExploitRetainer($users->UserInfo($username, 'event_points')); ?></div>
								
							</center>
					
						</div>
                        
                        <div class="countBox" style="width: 243px; margin-top: 5px;">
					
							<center>
								
								<div class="belcredit"></div>
						
								<div class="nextCredit"><?php echo $core->ExploitRetainer($users->UserInfo($username, 'crystals')); ?></div>
								
							</center>
					
						</div>
				
					</div>
				
				</div>
			
				<div id="containerSpace"></div>
				
				<div class="boxContainer rounded">

					<div class="boxHeader right rounded green"><ubuntu><?php echo $language['buy_belcr']; ?></ubuntu></div>
				
					<div class="overlideside" style="width: 274px; margin-right: -2px;" onClick="Popup=window.open('<?php echo HOST; ?>/pay/choose/option/diamonds/250','Popup','toolbar=no, location=no,status=no,menubar=no,scrollbars=yes,resizable=no, width=474,height=482'); return false;">
                    
                    	<div class="vipBuyBox">
                    
                    		<div class="insideVipBuy">
                            
                            	<div class="textVipBuy">
                                
                                	<div class="textCount"><ubuntu>&euro; 1,30</ubuntu></div>
                            	
                                	<div class="diamond" style="margin-right: 10px;"></div>
                                    
                                    <div class="howLongVipBuy" style="padding-top: 3px;<br>
"><ubuntu>250 <?php echo $language['diamonds']; ?></ubuntu></div>
                                    
                                </div>
                        
                        	</div>
                    
                    	</div>
                    
                    </div>
                    
                    <div class="overlideside" style="width: 274px; margin-right: -2px;" onClick="Popup=window.open('<?php echo HOST; ?>/pay/choose/option/diamonds/800','Popup','toolbar=no, location=no,status=no,menubar=no,scrollbars=yes,resizable=no, width=474,height=482'); return false;">
                    
                    	<div class="vipBuyBox">
                    
                    		<div class="insideVipBuy">
                            
                            	<div class="textVipBuy">
                                
                                	<div class="textCount"><ubuntu>&euro; 3,90</ubuntu></div>
                            	
                                	<div class="diamond" style="margin-right: 10px;"></div>
                                    
                                    <div class="howLongVipBuy" style="padding-top: 3px;<br>
"><ubuntu>800 <?php echo $language['diamonds']; ?></ubuntu></div>
                                    
                                </div>
                        
                        	</div>
                    
                    	</div>
                    
                    </div>
                    
                    <div class="overlideside" style="width: 274px; margin-right: -2px;" onClick="Popup=window.open('<?php echo HOST; ?>/pay/choose/option/diamonds/1500','Popup','toolbar=no, location=no,status=no,menubar=no,scrollbars=yes,resizable=no, width=474,height=482'); return false;">
                    
                    	<div class="vipBuyBox">
                    
                    		<div class="insideVipBuy">
                            
                            	<div class="textVipBuy">
                                
                                	<div class="textCount"><ubuntu>&euro; 6,50</ubuntu></div>
                            	
                                	<div class="diamond" style="margin-right: 10px;"></div>
                                    
                                    <div class="howLongVipBuy" style="padding-top: 3px;<br>
"><ubuntu>1500 <?php echo $language['diamonds']; ?></ubuntu></div>
                                    
                                </div>
                        
                        	</div>
                    
                    	</div>
                    
                    </div>
                    				
				</div>

			</div>

		</div>
	
	</div>

</div>

</body>
</html>