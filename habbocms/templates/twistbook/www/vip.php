<?php

define('USER', FALSE); 
define('ACCOUNT', FALSE);
define('MAINTENANCE', TRUE);
include("includes/inc.global.php");

$menu = 'shop';
$page = 'vip';
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

	<title><?php echo $hotelname; ?> - <?php echo $language['menu_community_vip']; ?></title>
	<?php echo $Style->General(); ?>

	<?php echo $themeswitcher; ?>

</head>

<script>
 $(document).ready(function() {
	 
	 $('img').error(function(){
        $(this).attr('src', '<?php echo HOST; ?>/web-gallery/icons/error.gif');
	});
	
 });
</script>

<body onkeydown="onKeyDown()">

<?php include("apps/float_includes.php"); ?>
<?php include("apps/system/float_includes.php"); ?>

<?php include("apps/float/float_quick_profile.php"); ?>

<?php include("apps/system/header_top.php"); ?>

<div id="container">
	
	<div id="middleContainer">
	
		<?php include("apps/system/container_header.php"); ?>

		<div id="containerMiddle">

			<div id="containerLeft" style="float: right;">
            
            	<?php if(isset($_COOKIE['username'])){ ?>
            
					<div id="containerSpace"></div>
                
                	<div class="boxContainer rounded">
                    
                    	<div class="boxHeaderVip"></div>
                    
                    	<div class="overlideside" onClick="Popup=window.open('<?php echo HOST; ?>/pay/choose/option/vip/6','Popup','toolbar=no, location=no,status=no,menubar=no,scrollbars=yes,resizable=no, width=474,height=482'); return false;">
                    
                    		<div class="vipBuyBox">
                    
                    			<div class="insideVipBuy">
                            
                            		<div class="textVipBuy">
                                
                                		<div class="textCount"><ubuntu>50</ubuntu></div>
                            	
                                		<div class="diamond"></div>
                                    
                                    	<div class="howLongVipBuy"><ubuntu>VIP - Lifetime</ubuntu></div>
                                        
                                    </div>
                        
                        		</div>
                    
                    		</div>
                    
                    	</div>
                        
                        <div class="overlideside" onClick="Popup=window.open('<?php echo HOST; ?>/pay/choose/option/vip/12','Popup','toolbar=no, location=no,status=no,menubar=no,scrollbars=yes,resizable=no, width=474,height=482'); return false;">
                    
                    		<div class="vipBuyBox">
                    
                    			<div class="insideVipBuy">
                            
                            		<div class="textVipBuy">
                                
                                		<div class="textCount"><ubuntu>75</ubuntu></div>
                            	
                                		<div class="diamond"></div>
                                    
                                    	<div class="howLongVipBuy"><ubuntu>SVIP - 6months</ubuntu></div>
                                        
                                    </div>
                        
                        		</div>
                    
                    		</div>
                    
                    	</div>
                        
                        <div class="overlideside" onClick="Popup=window.open('<?php echo HOST; ?>/pay/choose/option/vip/permanent','Popup','toolbar=no, location=no,status=no,menubar=no,scrollbars=yes,resizable=no, width=474,height=482'); return false;">
                    
                    		<div class="vipBuyBox">
                    
                    			<div class="insideVipBuy">
                            
                            		<div class="textVipBuy">
                                
                                		<div class="textCount"><ubuntu>100</ubuntu></div>
                            	
                                		<div class="diamond"></div>
                                    
                                    	<div class="howLongVipBuy"><ubuntu>SVIP - Lifetime</ubuntu></div>
                                        
                                    </div>
                        
                        		</div>
                    
                    		</div>
                    
                    	</div>
                
                	</div>
                
                <?php } ?>
                
                <div id="containerSpace"></div>
				
				<div class="boxContainer rounded staffBox">
                
                	<?php
					$vipq = mysql_query("SELECT * FROM users WHERE vip = '1' ORDER BY rank DESC");
					$vipq_teller = mysql_num_rows($vipq);
					?>

					<div class="boxHeader left rounded gray"><ubuntu><?php echo $language['menu_community_vip']; echo ' ('; echo $vipq_teller; echo ')'; ?></ubuntu></div>
        
					<?php
					if($vipq_teller == 0){
				
						echo '<div class="errorMessageOverlow" style="width: 544px;">Er zijn nog geen mensen met VIP.</div>';
			
					}
			
					$color = 'dark';
			
					while($vip = mysql_fetch_array($vipq)){
						
					if($vip['online'] == 0){ $online = 'offline'; }elseif($vip['online'] == 1){ $online = 'online'; }
					?>
                        
                        <script>
                        $(document).ready(function() {
	
	                        $('.onclickLoadQuickProfile<?php echo $vip['id']; ?>').click(function() { 
								$("#overlowQuickProfile").fadeIn("slow", function(){
									loadQuickProfile<?php echo $vip['id']; ?>();
								});
	                        });
	
	                        function loadQuickProfile<?php echo $vip['id']; ?>(){
								
								$('.loadUserDataToQuickProfile').html('<center class="loaderFromTheQuickProfile"><img style="margin-top: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_habbos.gif"></center>');

		                        var id = '<?php echo $vip['username']; ?>';

		                        $.post("<?php echo HOST; ?>/quickprofile/second/<?php echo $vip['username']; ?>", { id: id }, function(result){ 
									$('.loaderFromTheQuickProfile').fadeOut();
									$('.loadUserDataToQuickProfile').html(result);
								});

	                        }

                        });
                        </script>
						
						<div class="box <?php echo $color; ?>">
							
							<div style="width: 80px; float: left;">
							
								<img style="margin-left: 10px; margin-top: 10px;" src="<?php echo HOST; ?>/web-gallery/icons/<?php echo $online; ?>.gif">
								
								<div style="background-image: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $vip['look']; ?>);" class="avatar"></div>
								
							</div>
								
							<div style="float: left; margin-top: 10px;">
								
								<div class="title onclickOpenQuickProfile onclickLoadQuickProfile<?php echo $vip['id']; ?>" style="cursor: pointer;"><ubuntu><?php echo $vip['username']; ?></ubuntu></div><br>
								<div class="motto"><ubuntu><?php echo $vip['motto']; ?></ubuntu></div><br>
									
								<?php
								$query_badge1 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$vip['id']."' AND badge_slot = '1' LIMIT 1");
								$badge1 = mysql_fetch_array($query_badge1);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge1['badge_id'].'.gif">';

								$query_badge2 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$vip['id']."' AND badge_slot = '2' LIMIT 1");
								$badge2 = mysql_fetch_array($query_badge2);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge2['badge_id'].'.gif">';
									
								$query_badge3 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$vip['id']."' AND badge_slot = '3' LIMIT 1");
								$badge3 = mysql_fetch_array($query_badge3);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge3['badge_id'].'.gif">';
									
								$query_badge4 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$vip['id']."' AND badge_slot = '4' LIMIT 1");
								$badge4 = mysql_fetch_array($query_badge4);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge4['badge_id'].'.gif">';
									
								$query_badge5 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$vip['id']."' AND badge_slot = '5' LIMIT 1");
								$badge5 = mysql_fetch_array($query_badge5);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge5['badge_id'].'.gif">';
								?>
								
							</div>
							
						</div>

					<?php
					if($color == 'dark') $color='light'; else $color='dark'; }
					?>
                    
                </div>

			</div>

			<div id="containerRight" style="float: left;">
			
				<div id="containerSpace"></div>
				
				<div class="boxContainer rounded">

					<div class="boxHeader right rounded green"><ubuntu><?php echo $language['why_vip']; ?></ubuntu></div>
				
					<?php echo $language['why_vip_second']; ?>
				
				</div>
                
                <div id="containerSpace"></div>
				
				<div class="boxContainer rounded">

					<div class="boxHeader right rounded darkRed"><ubuntu><?php echo $language['poll_title']; ?></ubuntu></div>
				
					<?php include("apps/widgets/poll_widget.php"); ?>
				
				</div>

			</div>

		</div>
	
	</div>

</div>

</body>
</html>