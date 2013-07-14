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
$page = 'shop_badges';
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

	<title><?php echo $hotelname; ?> - <?php echo $language['menu_shop_badges']; ?></title>
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

<?php include("apps/float/shop/badge/float_shop_badge.php"); ?>

<?php if($core->ExploitRetainer($users->UserPermission('cms_shop', $username))){ 

 	include("apps/float/shop/badge/float_shop_badge_edit.php"); 
	
	include("apps/float/shop/badge/float_shop_badge_add.php"); 

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
                                    
                                    <div class="overlowIcon onclickOpenShopBadgeAdd"><img title="<?php echo $language["add_badge"]; ?>" style="cursor: pointer;margin-top: 9px;" src="<?php echo HOST; ?>/web-gallery/icons/plus_icon.gif"></div>
							
								</u></b>
					
								<div></div>
					
							</a>
							
						</div>
							
					<?php } ?>

					<div class="boxHeader left rounded orange"><ubuntu><?php echo $language['menu_shop_badges']; ?></ubuntu></div>
                    
                    <?php
					$shopq = mysql_query("SELECT * FROM shop_badges ORDER BY id DESC");
					$shopq_teller = mysql_num_rows($shopq);

					if($shopq_teller == 0){
				
						echo '<div class="errorMessageOverlow" style="width: 544px;">'.$language['no_shop_badges'].'</div>';
			
					}
			
					$color = 'dark';
					
					if($core->ExploitRetainer($users->UserPermission('cms_shop', $username))){
			
					while($shop = mysql_fetch_array($shopq)){
						
						$shopquser = mysql_query("SELECT * FROM user_badges WHERE badge_id = '".$shop['badge_id']."'");
						$shopquser_teller = mysql_num_rows($shopquser);
					?>
                    
                    			<script>
                        		$(document).ready(function() {
	
	                        		$('.onclickOpenShopBadge<?php echo $shop['id']; ?>').click(function() { 
										$('.loadDataShopBage').html('<center><img style="margin-top: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_habbos.gif"></center>');
		                        		loadShopBadge<?php echo $shop['id']; ?>();
	                        		});
	
	                       		 	function loadShopBadge<?php echo $shop['id']; ?>(){

		                       		 	var id = '<?php echo $shop['id']; ?>';

		                       		 	$.post("<?php echo HOST; ?>/shop/badge/buy/<?php echo $shop['id']; ?>", { id: id }, function(result){ 
											$('.loadDataShopBage').html(result);
										});

	                       		 	}

                        		});
                        		</script>
                    
								<div class="box <?php echo $color; ?> BadgeId<?php echo $shop['id']; ?>">
							
										<div style="float: left;"><img style="margin-left: 10px; margin-top: 10px; margin-bottom: 10px;" src="<?php echo $badge_url; ?><?php echo $shop['badge_id']; ?>.gif"></div>
                                    
                                    	<div style="float: left; font-size: 17px; padding-left: 10px; padding-top: 11px; <?php if($shopquser_teller > 0){ echo 'color: #405B87;'; }else{ } ?>"><ubuntu><b><?php echo $shop['badge_name']; ?></b><br><b><?php echo $shop['value']; ?></b> <?php echo $language['diamonds']; ?></ubuntu></div>
                                    
                                    	<?php 
										if($core->ExploitRetainer($users->UserInfo($username, 'crystals')) == $shop['value'] || $core->ExploitRetainer($users->UserInfo($username, 'crystals')) > $shop['value']){
											$check_enough = 'yes';
										}else{
											$check_enough = 'no';
										}
										
										if($check_enough == 'yes'){
										?>
                                    
                                    		<input type="submit" style="margin-top: 15px; margin-right: 10px; margin-left: 10px; margin-bottom: 10px;" class="submitRight onclickOpenShopBadge onclickOpenShopBadge<?php echo $shop['id']; ?> editDeleteButtonShowHide showOnclickedBuyButton" id="submitGreen" value="<?php echo $language['buy']; ?>">
                                        
                                        <?php }elseif($check_enough == 'no'){ ?>
                                        
                                        	<input type="submit" style="margin-top: 15px; margin-right: 10px; margin-left: 10px; margin-bottom: 10px;" class="submitRight onclickOpenShopBadge onclickOpenShopBadge<?php echo $shop['id']; ?> editDeleteButtonShowHide showOnclickedBuyButton" id="submitRed" value="<?php echo $language['buy']; ?>">
                                        
                                        <?php } ?>
                                        
                                        <?php if($core->ExploitRetainer($users->UserPermission('cms_shop', $username))){ ?>
                                        
                                        	<script>
                        						$(document).ready(function() {
	
	                        						$('.onclickOpenShopBadgeEdit<?php echo $shop['id']; ?>').click(function() { 
														$('.loadDataShopBadgeEdit').html('<center><img style="margin-top: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_habbos.gif"></center>');
		                        						loadShopBadgeEdit<?php echo $shop['id']; ?>();
	                        		});
	
	                       		 					function loadShopBadgeEdit<?php echo $shop['id']; ?>(){

		                       		 					var id = '<?php echo $shop['id']; ?>';

		                       		 					$.post("<?php echo HOST; ?>/shop/badge/edit/<?php echo $shop['id']; ?>", { id: id }, function(result){ 
															$('.loadDataShopBadgeEdit').html(result);
														});

	                       		 					}

                        						});
                        						</script>
                                        
                                        		<input type="submit" style="display: none; margin-top: 15px; margin-right: 10px; margin-left: 10px; margin-bottom: 10px;" class="submitRight onclickOpenShopBadgeEdit onclickOpenShopBadgeEdit<?php echo $shop['id']; ?> editDeleteButtonShowHide showOnclickedEditButton" id="submitBlack" value="<?php echo $language['edit']; ?>">
                                            
                                            	<script>
                        						$(document).ready(function() {
	
	                        						$('.onclickDeleteShopBadge<?php echo $shop['id']; ?>').click(function() { 
														$('.BadgeId<?php echo $shop['id']; ?>').fadeOut('fast');
														loadDeleteBadge<?php echo $shop['id']; ?>();
	                        						});
												
													function loadDeleteBadge<?php echo $shop['id']; ?>(){

		                       		 					var id = '<?php echo $shop['id']; ?>';

		                       		 					$.post("<?php echo HOST; ?>/shop/badge/delete/<?php echo $shop['id']; ?>", { id: id }, function(result){ 
														});

	                       		 					}

                        						});
                        						</script>
                                        
                                        		<input type="submit" style="display: none; margin-top: 15px; margin-right: 10px; margin-left: 10px; margin-bottom: 10px;" class="submitRight onclickDeleteShopBadge<?php echo $shop['id']; ?> editDeleteButtonShowHide showOnclickedDeleteButton" id="submitRed" value="<?php echo $language['delete']; ?>">
                                                
                                            <?php } ?>
							
								</div>

							<?php
								if($color == 'dark') $color='light'; else $color='dark'; 
						}
					
					}else{
						
						while($shop = mysql_fetch_array($shopq)){
						
						$shopper = $shop['rank_id'] -1;
						
						if($core->ExploitRetainer($users->UserInfo($username, 'rank')) > $shopper){
								
							$shopquser = mysql_query("SELECT * FROM user_badges WHERE badge_id = '".$shop['badge_id']."'");
							$shopquser_teller = mysql_num_rows($shopquser);
						
							if($shopquser_teller > 0){ }else{
					?>
                    
                    			<script>
                        		$(document).ready(function() {
	
	                        		$('.onclickOpenShopBadge<?php echo $shop['id']; ?>').click(function() { 
										$('.loadDataShopBage').html('<center><img style="margin-top: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_habbos.gif"></center>');
		                        		loadShopBadge<?php echo $shop['id']; ?>();
	                        		});
	
	                       		 	function loadShopBadge<?php echo $shop['id']; ?>(){

		                       		 	var id = '<?php echo $shop['id']; ?>';

		                       		 	$.post("<?php echo HOST; ?>/shop/badge/buy/<?php echo $shop['id']; ?>", { id: id }, function(result){ 
											$('.loadDataShopBage').html(result);
										});

	                       		 	}

                        		});
                        		</script>
                    
								<div class="box <?php echo $color; ?>">
							
										<div style="float: left;"><img style="margin-left: 10px; margin-top: 10px; margin-bottom: 10px;" src="<?php echo $badge_url; ?><?php echo $shop['badge_id']; ?>.gif"></div>
                                    
                                    	<div style="float: left; font-size: 17px; padding-left: 10px; padding-top: 11px;"><ubuntu><b><?php echo $shop['badge_name']; ?></b><br><b><?php echo $shop['value']; ?></b> <?php echo $language['diamonds']; ?></ubuntu></div>
                                    
                                    	<?php 
										if($core->ExploitRetainer($users->UserInfo($username, 'crystals')) == $shop['value'] || $core->ExploitRetainer($users->UserInfo($username, 'crystals')) > $shop['value']){
											$check_enough = 'yes';
										}else{
											$check_enough = 'no';
										}
										
										if($check_enough == 'yes'){
										?>
                                    
                                    		<input type="submit" style="margin-top: 15px; margin-right: 10px; margin-left: 10px; margin-bottom: 10px;" class="submitRight onclickOpenShopBadge onclickOpenShopBadge<?php echo $shop['id']; ?> editDeleteButtonShowHide showOnclickedBuyButton" id="submitGreen" value="<?php echo $language['buy']; ?>">
                                        
                                        <?php }elseif($check_enough == 'no'){ ?>
                                        
                                        	<input type="submit" style="margin-top: 15px; margin-right: 10px; margin-left: 10px; margin-bottom: 10px;" class="submitRight onclickOpenShopBadge onclickOpenShopBadge<?php echo $shop['id']; ?> editDeleteButtonShowHide showOnclickedBuyButton" id="submitRed" value="<?php echo $language['buy']; ?>">
                                        
                                        <?php } ?>
                                        
                                        <?php if($core->ExploitRetainer($users->UserPermission('cms_shop', $username))){ ?>
                                        
                                        	<script>
                        						$(document).ready(function() {
	
	                        						$('.onclickOpenShopBadgeEdit<?php echo $shop['id']; ?>').click(function() { 
														$('.loadDataShopBadgeEdit').html('<center><img style="margin-top: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_habbos.gif"></center>');
		                        						loadShopBadgeEdit<?php echo $shop['id']; ?>();
	                        		});
	
	                       		 					function loadShopBadgeEdit<?php echo $shop['id']; ?>(){

		                       		 					var id = '<?php echo $shop['id']; ?>';

		                       		 					$.post("<?php echo HOST; ?>/shop/badge/edit/<?php echo $shop['id']; ?>", { id: id }, function(result){ 
															$('.loadDataShopBadgeEdit').html(result);
														});

	                       		 					}

                        						});
                        						</script>
                                        
                                        		<input type="submit" style="display: none; margin-top: 15px; margin-right: 10px; margin-left: 10px; margin-bottom: 10px;" class="submitRight onclickOpenShopBadgeEdit onclickOpenShopBadgeEdit<?php echo $shop['id']; ?> editDeleteButtonShowHide showOnclickedEditButton" id="submitBlack" value="<?php echo $language['edit']; ?>">
                                            
                                            	<script>
                        						$(document).ready(function() {
	
	                        						$('.onclickDeleteShopBadge<?php echo $shop['id']; ?>').click(function() { 
														$('.BadgeId<?php echo $shop['id']; ?>').fadeOut('fast');
														loadDeleteBadge<?php echo $shop['id']; ?>();
	                        						});
												
													function loadDeleteBadge<?php echo $shop['id']; ?>(){

		                       		 					var id = '<?php echo $shop['id']; ?>';

		                       		 					$.post("<?php echo HOST; ?>/shop/badge/delete/<?php echo $shop['id']; ?>", { id: id }, function(result){ 
														});

	                       		 					}

                        						});
                        						</script>
                                        
                                        		<input type="submit" style="display: none; margin-top: 15px; margin-right: 10px; margin-left: 10px; margin-bottom: 10px;" class="submitRight onclickDeleteShopBadge<?php echo $shop['id']; ?> editDeleteButtonShowHide showOnclickedDeleteButton" id="submitRed" value="<?php echo $language['delete']; ?>">
                                                
                                            <?php } ?>
							
								</div>

						<?php
								if($color == 'dark') $color='light'; else $color='dark'; 
								}
							} 
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
								
								<div class="pixel"></div>
						
								<div class="nextCredit"><?php echo $core->ExploitRetainer($users->UserInfo($username, 'vip_points')); ?></div>
								
							</center>
					
						</div>

					</div>
				
				</div>
			
				<?php include("apps/widgets/buy_diamonds.php"); ?>

			</div>

		</div>
	
	</div>

</div>

</body>
</html>