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

define('USER', FALSE); 
define('ACCOUNT', FALSE);
define('MAINTENANCE', TRUE);
include("includes/inc.global.php");

$menu = 'community';
$menu_sub = 'staff';
$page = 'staff';
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

	<title><?php echo $hotelname; ?> - <?php echo $language['menu_community_staff']; ?></title>
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
					
				<?php
				$rankq = mysql_query("SELECT * FROM `ranks` WHERE id >= 5 ORDER BY id DESC");

				while($rank = mysql_fetch_array($rankq)){
				?>
					<div id="containerSpace"></div>
				
					<div class="boxContainer rounded staffBox">

						<div class="boxHeader left rounded gray"><ubuntu><?php echo $rank['name']; ?></ubuntu></div>
        
						<?php
						$staffq = mysql_query("SELECT * FROM users WHERE rank = ".$rank['id']." ORDER BY account_created");
			
						$staffq_teller = mysql_num_rows($staffq);
			
						if($staffq_teller == 0){
				
							echo '<div class="errorMessageOverlow" style="width: 544px;">'.$language['no_users_for_rank'].'</div>';
			
						}
			
						$color = 'dark';
			
						while($staff = mysql_fetch_array($staffq)){
						
						if($staff['online'] == 0){ $online = 'offline'; }elseif($staff['online'] == 1){ $online = 'online'; }
						?>
                        
                        	<script>
                        	$(document).ready(function() {
	
	                        	$('.onclickLoadQuickProfile<?php echo $staff['id']; ?>').click(function() { 
									$("#overlowQuickProfile").fadeIn("slow", function(){
										loadQuickProfile<?php echo $staff['id']; ?>();
									});
	                        	});
	
	                        	function loadQuickProfile<?php echo $staff['id']; ?>(){
									
									$('.loadUserDataToQuickProfile').html('<center class="loaderFromTheQuickProfile"><img style="margin-top: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_habbos.gif"></center>');

		                        	var id = '<?php echo $staff['username']; ?>';

		                        	$.post("<?php echo HOST; ?>/quickprofile/second/<?php echo $staff['username']; ?>", { id: id }, function(result){ 
										$('.loaderFromTheQuickProfile').fadeOut();
										$('.loadUserDataToQuickProfile').html(result);
									});

	                        	}

                        	});
                        	</script>
						
							<div class="box <?php echo $color; ?>">
							
								<div style="width: 80px; float: left;">
							
									<img style="margin-left: 10px; margin-top: 10px;" src="<?php echo HOST; ?>/web-gallery/icons/<?php echo $online; ?>.gif">
								
									<div style="background-image: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $staff['look']; ?>);" class="avatar"></div>
								
								</div>
								
								<div style="float: left; margin-top: 10px;">
								
									<div class="title onclickOpenQuickProfile onclickLoadQuickProfile<?php echo $staff['id']; ?>" style="cursor: pointer;"><ubuntu><?php echo $staff['username']; ?></ubuntu></div><br>
									<div class="motto"><ubuntu><?php echo $staff['motto']; ?></ubuntu></div><br>
									
									<?php
									$query_badge1 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$staff['id']."' AND badge_slot = '1' LIMIT 1");
									$badge1 = mysql_fetch_array($query_badge1);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge1['badge_id'].'.gif">';

									$query_badge2 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$staff['id']."' AND badge_slot = '2' LIMIT 1");
									$badge2 = mysql_fetch_array($query_badge2);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge2['badge_id'].'.gif">';
									
									$query_badge3 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$staff['id']."' AND badge_slot = '3' LIMIT 1");
									$badge3 = mysql_fetch_array($query_badge3);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge3['badge_id'].'.gif">';
									
									$query_badge4 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$staff['id']."' AND badge_slot = '4' LIMIT 1");
									$badge4 = mysql_fetch_array($query_badge4);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge4['badge_id'].'.gif">';
									
									$query_badge5 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$staff['id']."' AND badge_slot = '5' LIMIT 1");
									$badge5 = mysql_fetch_array($query_badge5);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge5['badge_id'].'.gif">';
									?>
								
								</div>
							
							</div>

						<?php
							if($color == 'dark') $color='light'; else $color='dark'; }

							echo('</div>');

					}
					?>

			</div>

			<div id="containerRight" style="float: left;">
			
				<?php /*
            
            	<div id="containerSpace"></div>
				
				<div class="boxContainer rounded">

					<div class="boxHeader right rounded lightblue"><ubuntu>Een rang kopen</ubuntu></div>
                    
                    <?php if($core->checkPayRank(3) == 1){ ?>
				
                        <div title="<?php echo $core->getPayRanksLeft(3); ?>" class="overlideside" style="width: 274px; margin-right: -2px;" onClick="Popup=window.open('<?php echo HOST; ?>/pay/choose/option/ranks/3','Popup','toolbar=no, location=no,status=no,menubar=no,scrollbars=yes,resizable=no, width=474,height=482'); return false;">
                        
                            <div class="vipBuyBox">
                        
                                <div class="insideVipBuy">
                                
                                    <div class="textVipBuy">
                                    
                                        <div class="textCount"><ubuntu>&euro; 5,00</ubuntu></div>
                                    
                                        <div class="is" style="margin-right: 10px;"></div>
                                        
                                        <div class="howLongVipBuy" style="padding-top: 3px;<br>
    "><ubuntu>Spam team</ubuntu></div>
                                        
                                    </div>
                            
                                </div>
                        
                            </div>
                        
                        </div>
                    
                    <?php } ?>
                    
                    <?php if($core->checkPayRank(4) == 1){ ?>
                    
                        <div title="<?php echo $core->getPayRanksLeft(4); ?>" class="overlideside" style="width: 274px; margin-right: -2px;" onClick="Popup=window.open('<?php echo HOST; ?>/pay/choose/option/ranks/4','Popup','toolbar=no, location=no,status=no,menubar=no,scrollbars=yes,resizable=no, width=474,height=482'); return false;">
                        
                            <div class="vipBuyBox">
                        
                                <div class="insideVipBuy">
                                
                                    <div class="textVipBuy">
                                    
                                        <div class="textCount"><ubuntu>&euro; 5,00</ubuntu></div>
                                    
                                        <div class="is" style="margin-right: 10px;"></div>
                                        
                                        <div class="howLongVipBuy" style="padding-top: 3px;<br>
    "><ubuntu>Bouw team</ubuntu></div>
                                        
                                    </div>
                            
                                </div>
                        
                            </div>
                        
                        </div>
                    
                    <?php } ?>
                    
                    <?php if($core->checkPayRank(5) == 1){ ?>
                
                        <div title="<?php echo $core->getPayRanksLeft(5); ?>" class="overlideside" style="width: 274px; margin-right: -2px;" onClick="Popup=window.open('<?php echo HOST; ?>/pay/choose/option/ranks/5','Popup','toolbar=no, location=no,status=no,menubar=no,scrollbars=yes,resizable=no, width=474,height=482'); return false;">
                        
                            <div class="vipBuyBox">
                        
                                <div class="insideVipBuy">
                                
                                    <div class="textVipBuy">
                                    
                                        <div class="textCount"><ubuntu>&euro; 10,00</ubuntu></div>
                                    
                                        <div class="is" style="margin-right: 10px;"></div>
                                        
                                        <div class="howLongVipBuy" style="padding-top: 3px;<br>
    "><ubuntu>DJ</ubuntu></div>
                                        
                                    </div>
                            
                                </div>
                        
                            </div>
                        
                        </div>
                    
                    <?php } ?>
                    
                    <?php if($core->checkPayRank(6) == 1){ ?>
                    
                        <div title="<?php echo $core->getPayRanksLeft(6); ?>" class="overlideside" style="width: 274px; margin-right: -2px;" onClick="Popup=window.open('<?php echo HOST; ?>/pay/choose/option/ranks/6','Popup','toolbar=no, location=no,status=no,menubar=no,scrollbars=yes,resizable=no, width=474,height=482'); return false;">
                        
                            <div class="vipBuyBox">
                        
                                <div class="insideVipBuy">
                                
                                    <div class="textVipBuy">
                                    
                                        <div class="textCount"><ubuntu>&euro; 15,00</ubuntu></div>
                                    
                                        <div class="is" style="margin-right: 10px;"></div>
                                        
                                        <div class="howLongVipBuy" style="padding-top: 3px;<br>
    "><ubuntu>Expert</ubuntu></div>
                                        
                                    </div>
                            
                                </div>
                        
                            </div>
                        
                        </div>
                    
                    <?php } ?>
                    
                    <?php if($core->checkPayRank(7) == 1){ ?>
                    
                        <div title="<?php echo $core->getPayRanksLeft(7); ?>" class="overlideside" style="width: 274px; margin-right: -2px;" onClick="Popup=window.open('<?php echo HOST; ?>/pay/choose/option/ranks/7','Popup','toolbar=no, location=no,status=no,menubar=no,scrollbars=yes,resizable=no, width=474,height=482'); return false;">
                        
                            <div class="vipBuyBox">
                        
                                <div class="insideVipBuy">
                                
                                    <div class="textVipBuy">
                                    
                                        <div class="textCount"><ubuntu>&euro; 20,00</ubuntu></div>
                                    
                                        <div class="is" style="margin-right: 10px;"></div>
                                        
                                        <div class="howLongVipBuy" style="padding-top: 3px;<br>
    "><ubuntu>Moderator</ubuntu></div>
                                        
                                    </div>
                            
                                </div>
                        
                            </div>
                        
                        </div>
                    
                    <?php } ?>
                    
                    <?php if($core->checkPayRank(8) == 1){ ?>
                    
                        <div title="<?php echo $core->getPayRanksLeft(8); ?>" class="overlideside" style="width: 274px; margin-right: -2px;" onClick="Popup=window.open('<?php echo HOST; ?>/pay/choose/option/ranks/8','Popup','toolbar=no, location=no,status=no,menubar=no,scrollbars=yes,resizable=no, width=474,height=482'); return false;">
                        
                            <div class="vipBuyBox">
                        
                                <div class="insideVipBuy">
                                
                                    <div class="textVipBuy">
                                    
                                        <div class="textCount"><ubuntu>&euro; 35,00</ubuntu></div>
                                    
                                        <div class="is" style="margin-right: 10px;"></div>
                                        
                                        <div class="howLongVipBuy" style="padding-top: 3px;<br>
    "><ubuntu>Administrator</ubuntu></div>
                                        
                                    </div>
                            
                                </div>
                        
                            </div>
                        
                        </div>
                    
                    <?php } ?>
                    
                </div>
				
				*/ ?>
			
				<div id="containerSpace"></div>
				
				<div class="boxContainer rounded">

					<div class="boxHeader right rounded green"><ubuntu><?php echo $language['how_become_staff']; ?></ubuntu></div>
				
					<?php echo $language['how_become_staff_text']; ?>
				
				</div>

				<?php include("apps/widgets/twitter_widget.php"); ?>
				
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