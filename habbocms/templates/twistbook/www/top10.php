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
$page = 'top_10';
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

	<title><?php echo $hotelname; ?> - <?php echo $language['menu_community_top_10']; ?></title>
	<?php echo $Style->General(); ?>

	<?php echo $themeswitcher; ?>

</head>

<script>
 $(document).ready(function() {
	 
	 $('img').error(function(){
        $(this).attr('src', '<?php echo HOST; ?>/web-gallery/icons/error.gif');
	});
	
	$('.onclickOpenTop10Credits').click(function() { 
		$('.top10Container').fadeOut();
		$('.top10Credits').fadeIn();
		deteleSelectedClass();
		$(this).addClass('selected');
	});
	
	$('.onclickOpenTop10Pixels').click(function() { 
		$('.top10Container').fadeOut();
		$('.top10Pixels').fadeIn();
		deteleSelectedClass();
		$(this).addClass('selected');
	});
	
	$('.onclickOpenTop10EventPoints').click(function() { 
		$('.top10Container').fadeOut();
		$('.top10EventPoints').fadeIn();
		deteleSelectedClass();
		$(this).addClass('selected');
	});
	
	$('.onclickOpenTop10Respect').click(function() { 
		$('.top10Container').fadeOut();
		$('.top10Respect').fadeIn();
		deteleSelectedClass();
		$(this).addClass('selected');
	});
	
	$('.onclickOpenTop10LongestOnline').click(function() { 
		$('.top10Container').fadeOut();
		$('.top10LongestOnline').fadeIn();
		deteleSelectedClass();
		$(this).addClass('selected');
	});
	
	function deteleSelectedClass(){
		$('.onclickOpenTop10Credits').removeClass('selected');
		$('.onclickOpenTop10Pixels').removeClass('selected');
		$('.onclickOpenTop10EventPoints').removeClass('selected');
		$('.onclickOpenTop10Respect').removeClass('selected');
		$('.onclickOpenTop10LongestOnline').removeClass('selected');
	}
	
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

			<div id="containerLeft">
                
                <div id="containerSpace"></div>
				
				<div class="boxContainer rounded staffBox top10Container top10Credits">
                
                	<?php
					$top10q = mysql_query("SELECT * FROM users ORDER BY credits DESC LIMIT 10");
					$top10q_teller = mysql_num_rows($top10q);
					?>

					<div class="boxHeader left rounded gray"><ubuntu><?php echo $language['top_10_credits']; ?></ubuntu></div>
        
					<?php
					$color = 'dark';
			
					while($top10 = mysql_fetch_array($top10q)){
						
					if($top10['online'] == 0){ $online = 'offline'; }elseif($top10['online'] == 1){ $online = 'online'; }
					?>
                        
                        <script>
                        $(document).ready(function() {
	
	                        $('.onclickLoadQuickProfile1<?php echo $top10['id']; ?>').click(function() { 
								$("#overlowQuickProfile").fadeIn("slow", function(){
									loadQuickProfile1<?php echo $top10['id']; ?>();
								});
	                        });
	
	                        function loadQuickProfile1<?php echo $top10['id']; ?>(){
								
								$('.loadUserDataToQuickProfile').html('<center class="loaderFromTheQuickProfile"><img style="margin-top: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_habbos.gif"></center>');

		                        var id = '<?php echo $top10['username']; ?>';

		                        $.post("<?php echo HOST; ?>/quickprofile/second/<?php echo $top10['username']; ?>", { id: id }, function(result){ 
									$('.loaderFromTheQuickProfile').fadeOut();
									$('.loadUserDataToQuickProfile').html(result);
								});

	                        }

                        });
                        </script>
						
						<div class="box <?php echo $color; ?>">
							
							<div style="width: 80px; float: left;">
							
								<img style="margin-left: 10px; margin-top: 10px;" src="<?php echo HOST; ?>/web-gallery/icons/<?php echo $online; ?>.gif">
								
								<div style="background-image: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $top10['look']; ?>);" class="avatar"></div>
								
							</div>
								
							<div style="float: left; margin-top: 10px;">
								
								<div class="title onclickOpenQuickProfile onclickLoadQuickProfile1<?php echo $top10['id']; ?>" style="cursor: pointer;"><ubuntu><?php echo $top10['username']; ?></ubuntu></div><br>
								<div class="motto"><ubuntu><?php echo $top10['motto']; ?></ubuntu></div><br>
									
								<?php
								$query_badge1 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$top10['id']."' AND badge_slot = '1' LIMIT 1");
								$badge1 = mysql_fetch_array($query_badge1);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge1['badge_id'].'.gif">';

								$query_badge2 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$top10['id']."' AND badge_slot = '2' LIMIT 1");
								$badge2 = mysql_fetch_array($query_badge2);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge2['badge_id'].'.gif">';
									
								$query_badge3 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$top10['id']."' AND badge_slot = '3' LIMIT 1");
								$badge3 = mysql_fetch_array($query_badge3);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge3['badge_id'].'.gif">';
									
								$query_badge4 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$top10['id']."' AND badge_slot = '4' LIMIT 1");
								$badge4 = mysql_fetch_array($query_badge4);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge4['badge_id'].'.gif">';
									
								$query_badge5 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$top10['id']."' AND badge_slot = '5' LIMIT 1");
								$badge5 = mysql_fetch_array($query_badge5);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge5['badge_id'].'.gif">';
								?>
								
							</div>
                            
                            <div style="float: right; font-size: 21px; padding-top: 45px; padding-right: 10px;"><ubuntu><b><?php echo $top10['credits']; ?></b> <?php echo $language['profile_user_info_credits']; ?></ubuntu></div>
							
						</div>

					<?php
					if($color == 'dark') $color='light'; else $color='dark'; }
					?>
                    
                </div>
                
                <div class="boxContainer rounded staffBox top10Container top10Pixels" style="display: none;">
                
                	<?php
					$top10q = mysql_query("SELECT * FROM users ORDER BY activity_points DESC LIMIT 10");
					$top10q_teller = mysql_num_rows($top10q);
					?>

					<div class="boxHeader left rounded gray"><ubuntu><?php echo $language['top_10_pixels']; ?></ubuntu></div>
        
					<?php
					$color = 'dark';
			
					while($top10 = mysql_fetch_array($top10q)){
						
					if($top10['online'] == 0){ $online = 'offline'; }elseif($top10['online'] == 1){ $online = 'online'; }
					?>
                        
                        <script>
                        $(document).ready(function() {
	
	                        $('.onclickLoadQuickProfile2<?php echo $top10['id']; ?>').click(function() { 
								$("#overlowQuickProfile").fadeIn("slow", function(){
									loadQuickProfile2<?php echo $top10['id']; ?>();
								});
	                        });
	
	                        function loadQuickProfile2<?php echo $top10['id']; ?>(){
								
								$('.loadUserDataToQuickProfile').html('<center class="loaderFromTheQuickProfile"><img style="margin-top: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_habbos.gif"></center>');

		                        var id = '<?php echo $top10['username']; ?>';

		                        $.post("<?php echo HOST; ?>/quickprofile/second/<?php echo $top10['username']; ?>", { id: id }, function(result){ 
									$('.loaderFromTheQuickProfile').fadeOut();
									$('.loadUserDataToQuickProfile').html(result);
								});

	                        }

                        });
                        </script>
						
						<div class="box <?php echo $color; ?>">
							
							<div style="width: 80px; float: left;">
							
								<img style="margin-left: 10px; margin-top: 10px;" src="<?php echo HOST; ?>/web-gallery/icons/<?php echo $online; ?>.gif">
								
								<div style="background-image: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $top10['look']; ?>);" class="avatar"></div>
								
							</div>
								
							<div style="float: left; margin-top: 10px;">
								
								<div class="title onclickOpenQuickProfile onclickLoadQuickProfile2<?php echo $top10['id']; ?>" style="cursor: pointer;"><ubuntu><?php echo $top10['username']; ?></ubuntu></div><br>
								<div class="motto"><ubuntu><?php echo $top10['motto']; ?></ubuntu></div><br>
									
								<?php
								$query_badge1 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$top10['id']."' AND badge_slot = '1' LIMIT 1");
								$badge1 = mysql_fetch_array($query_badge1);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge1['badge_id'].'.gif">';

								$query_badge2 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$top10['id']."' AND badge_slot = '2' LIMIT 1");
								$badge2 = mysql_fetch_array($query_badge2);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge2['badge_id'].'.gif">';
									
								$query_badge3 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$top10['id']."' AND badge_slot = '3' LIMIT 1");
								$badge3 = mysql_fetch_array($query_badge3);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge3['badge_id'].'.gif">';
									
								$query_badge4 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$top10['id']."' AND badge_slot = '4' LIMIT 1");
								$badge4 = mysql_fetch_array($query_badge4);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge4['badge_id'].'.gif">';
									
								$query_badge5 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$top10['id']."' AND badge_slot = '5' LIMIT 1");
								$badge5 = mysql_fetch_array($query_badge5);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge5['badge_id'].'.gif">';
								?>
								
							</div>
                            
                            <div style="float: right; font-size: 21px; padding-top: 45px; padding-right: 10px;"><ubuntu><b><?php echo $top10['activity_points']; ?></b> <?php echo $language['profile_user_info_pixels']; ?></ubuntu></div>
							
						</div>

					<?php
					if($color == 'dark') $color='light'; else $color='dark'; }
					?>
                    
                </div>
                
                <div class="boxContainer rounded staffBox top10Container top10EventPoints" style="display: none;">
                
                	<?php
					$top10q = mysql_query("SELECT * FROM users ORDER BY vip_points DESC LIMIT 10");
					$top10q_teller = mysql_num_rows($top10q);
					?>

					<div class="boxHeader left rounded gray"><ubuntu><?php echo $language['top_10_points']; ?></ubuntu></div>
        
					<?php
					$color = 'dark';
			
					while($top10 = mysql_fetch_array($top10q)){
						
					if($top10['online'] == 0){ $online = 'offline'; }elseif($top10['online'] == 1){ $online = 'online'; }
					?>
                        
                        <script>
                        $(document).ready(function() {
	
	                        $('.onclickLoadQuickProfile3<?php echo $top10['id']; ?>').click(function() { 
								$("#overlowQuickProfile").fadeIn("slow", function(){
									loadQuickProfile3<?php echo $top10['id']; ?>();
								});
	                        });
	
	                        function loadQuickProfile3<?php echo $top10['id']; ?>(){
								
								$('.loadUserDataToQuickProfile').html('<center class="loaderFromTheQuickProfile"><img style="margin-top: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_habbos.gif"></center>');

		                        var id = '<?php echo $top10['username']; ?>';

		                        $.post("<?php echo HOST; ?>/quickprofile/second/<?php echo $top10['username']; ?>", { id: id }, function(result){ 
									$('.loaderFromTheQuickProfile').fadeOut();
									$('.loadUserDataToQuickProfile').html(result);
								});

	                        }

                        });
                        </script>
						
						<div class="box <?php echo $color; ?>">
							
							<div style="width: 80px; float: left;">
							
								<img style="margin-left: 10px; margin-top: 10px;" src="<?php echo HOST; ?>/web-gallery/icons/<?php echo $online; ?>.gif">
								
								<div style="background-image: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $top10['look']; ?>);" class="avatar"></div>
								
							</div>
								
							<div style="float: left; margin-top: 10px;">
								
								<div class="title onclickOpenQuickProfile onclickLoadQuickProfile3<?php echo $top10['id']; ?>" style="cursor: pointer;"><ubuntu><?php echo $top10['username']; ?></ubuntu></div><br>
								<div class="motto"><ubuntu><?php echo $top10['motto']; ?></ubuntu></div><br>
									
								<?php
								$query_badge1 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$top10['id']."' AND badge_slot = '1' LIMIT 1");
								$badge1 = mysql_fetch_array($query_badge1);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge1['badge_id'].'.gif">';

								$query_badge2 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$top10['id']."' AND badge_slot = '2' LIMIT 1");
								$badge2 = mysql_fetch_array($query_badge2);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge2['badge_id'].'.gif">';
									
								$query_badge3 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$top10['id']."' AND badge_slot = '3' LIMIT 1");
								$badge3 = mysql_fetch_array($query_badge3);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge3['badge_id'].'.gif">';
									
								$query_badge4 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$top10['id']."' AND badge_slot = '4' LIMIT 1");
								$badge4 = mysql_fetch_array($query_badge4);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge4['badge_id'].'.gif">';
									
								$query_badge5 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$top10['id']."' AND badge_slot = '5' LIMIT 1");
								$badge5 = mysql_fetch_array($query_badge5);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge5['badge_id'].'.gif">';
								?>
								
							</div>
                            
                            <div style="float: right; font-size: 21px; padding-top: 45px; padding-right: 10px;"><ubuntu><b><?php echo $top10['vip_points']; ?></b> <?php echo $language['points']; ?></ubuntu></div>
							
						</div>

					<?php
					if($color == 'dark') $color='light'; else $color='dark'; }
					?>
                    
                </div>
                
                <div class="boxContainer rounded staffBox top10Container top10Respect" style="display: none;">

					<?php
					$top10q = mysql_query("SELECT * FROM users ORDER BY respect DESC LIMIT 10");
					$top10q_teller = mysql_num_rows($top10q);
					?>

					<div class="boxHeader left rounded gray"><ubuntu><?php echo $language['top_10_respect']; ?></ubuntu></div>
        
					<?php
					$color = 'dark';
			
					while($top10 = mysql_fetch_array($top10q)){
						
					if($top10['online'] == 0){ $online = 'offline'; }elseif($top10['online'] == 1){ $online = 'online'; }
					?>
                        
                        <script>
                        $(document).ready(function() {
	
	                        $('.onclickLoadQuickProfile4<?php echo $top10['id']; ?>').click(function() { 
								$("#overlowQuickProfile").fadeIn("slow", function(){
									loadQuickProfile4<?php echo $top10['id']; ?>();
								});
	                        });
	
	                        function loadQuickProfile4<?php echo $top10['id']; ?>(){
								
								$('.loadUserDataToQuickProfile').html('<center class="loaderFromTheQuickProfile"><img style="margin-top: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_habbos.gif"></center>');

		                        var id = '<?php echo $top10['username']; ?>';

		                        $.post("<?php echo HOST; ?>/quickprofile/second/<?php echo $top10['username']; ?>", { id: id }, function(result){ 
									$('.loaderFromTheQuickProfile').fadeOut();
									$('.loadUserDataToQuickProfile').html(result);
								});

	                        }

                        });
                        </script>
						
						<div class="box <?php echo $color; ?>">
							
							<div style="width: 80px; float: left;">
							
								<img style="margin-left: 10px; margin-top: 10px;" src="<?php echo HOST; ?>/web-gallery/icons/<?php echo $online; ?>.gif">
								
								<div style="background-image: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $top10['look']; ?>);" class="avatar"></div>
								
							</div>
								
							<div style="float: left; margin-top: 10px;">
								
								<div class="title onclickOpenQuickProfile onclickLoadQuickProfile4<?php echo $top10['id']; ?>" style="cursor: pointer;"><ubuntu><?php echo $top10['username']; ?></ubuntu></div><br>
								<div class="motto"><ubuntu><?php echo $top10['motto']; ?></ubuntu></div><br>
									
								<?php
								$query_badge1 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$top10['id']."' AND badge_slot = '1' LIMIT 1");
								$badge1 = mysql_fetch_array($query_badge1);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge1['badge_id'].'.gif">';

								$query_badge2 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$top10['id']."' AND badge_slot = '2' LIMIT 1");
								$badge2 = mysql_fetch_array($query_badge2);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge2['badge_id'].'.gif">';
									
								$query_badge3 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$top10['id']."' AND badge_slot = '3' LIMIT 1");
								$badge3 = mysql_fetch_array($query_badge3);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge3['badge_id'].'.gif">';
									
								$query_badge4 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$top10['id']."' AND badge_slot = '4' LIMIT 1");
								$badge4 = mysql_fetch_array($query_badge4);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge4['badge_id'].'.gif">';
									
								$query_badge5 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$top10['id']."' AND badge_slot = '5' LIMIT 1");
								$badge5 = mysql_fetch_array($query_badge5);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge5['badge_id'].'.gif">';
								?>
								
							</div>
                            
                            <div style="float: right; font-size: 21px; padding-top: 45px; padding-right: 10px;"><ubuntu><b><?php echo $top10['respect']; ?></b> <?php echo $language['respects']; ?></ubuntu></div>
							
						</div>

					<?php
					if($color == 'dark') $color='light'; else $color='dark'; }
					?>
                    
                </div>
                
                <div class="boxContainer rounded staffBox top10Container top10LongestOnline" style="display: none;">
                    
                	<?php
					$top10q = mysql_query("SELECT * FROM user_stats ORDER BY OnlineTime DESC LIMIT 10");
					$top10q_teller = mysql_num_rows($top10q);
					?>

					<div class="boxHeader left rounded gray"><ubuntu><?php echo $language['top_10_longest_online']; ?></ubuntu></div>
        
					<?php
					
					$color = 'dark';
					
					while($top10q_info = mysql_fetch_array($top10q)){
						
					$query_top_10 = mysql_query("SELECT * FROM users WHERE id = '".$top10q_info['id']."'");
					$top10 = mysql_fetch_array($query_top_10);
						
					$onlineTimeConfig_first = $top10q_info['OnlineTime'] /60;
					$onlineTimeConfig_second = $onlineTimeConfig_first /60;
					
					$onlineTimeConfig = number_format($onlineTimeConfig_second, 2);
						
					if($top10['online'] == 0){ $online = 'offline'; }elseif($top10['online'] == 1){ $online = 'online'; }
					?>
                        
                        <script>
                        $(document).ready(function() {
	
	                        $('.onclickLoadQuickProfile5<?php echo $top10['id']; ?>').click(function() { 
								$("#overlowQuickProfile").fadeIn("slow", function(){
									loadQuickProfile5<?php echo $top10['id']; ?>();
								});
	                        });
	
	                        function loadQuickProfile5<?php echo $top10['id']; ?>(){
								
								$('.loadUserDataToQuickProfile').html('<center class="loaderFromTheQuickProfile"><img style="margin-top: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_habbos.gif"></center>');

		                        var id = '<?php echo $top10['username']; ?>';

		                        $.post("<?php echo HOST; ?>/quickprofile/second/<?php echo $top10['username']; ?>", { id: id }, function(result){ 
									$('.loaderFromTheQuickProfile').fadeOut();
									$('.loadUserDataToQuickProfile').html(result);
								});

	                        }

                        });
                        </script>
						
						<div class="box <?php echo $color; ?>">
							
							<div style="width: 80px; float: left;">
							
								<img style="margin-left: 10px; margin-top: 10px;" src="<?php echo HOST; ?>/web-gallery/icons/<?php echo $online; ?>.gif">
								
								<div style="background-image: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $top10['look']; ?>);" class="avatar"></div>
								
							</div>
								
							<div style="float: left; margin-top: 10px;">
								
								<div class="title onclickOpenQuickProfile onclickLoadQuickProfile5<?php echo $top10['id']; ?>" style="cursor: pointer;"><ubuntu><?php echo $top10['username']; ?></ubuntu></div><br>
								<div class="motto"><ubuntu><?php echo $top10['motto']; ?></ubuntu></div><br>
									
								<?php
								$query_badge1 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$top10['id']."' AND badge_slot = '1' LIMIT 1");
								$badge1 = mysql_fetch_array($query_badge1);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge1['badge_id'].'.gif">';

								$query_badge2 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$top10['id']."' AND badge_slot = '2' LIMIT 1");
								$badge2 = mysql_fetch_array($query_badge2);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge2['badge_id'].'.gif">';
									
								$query_badge3 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$top10['id']."' AND badge_slot = '3' LIMIT 1");
								$badge3 = mysql_fetch_array($query_badge3);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge3['badge_id'].'.gif">';
									
								$query_badge4 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$top10['id']."' AND badge_slot = '4' LIMIT 1");
								$badge4 = mysql_fetch_array($query_badge4);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge4['badge_id'].'.gif">';
									
								$query_badge5 = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$top10['id']."' AND badge_slot = '5' LIMIT 1");
								$badge5 = mysql_fetch_array($query_badge5);
									echo '<img style="margin-top: -5px; margin-right: 10px; float: left;" src="'.$badge_url.''.$badge5['badge_id'].'.gif">';
								?>
								
							</div>
                            
                            <div style="float: right; font-size: 21px; padding-top: 45px; padding-right: 10px;"><ubuntu><b><?php echo $onlineTimeConfig; ?></b> <?php echo $language['hour']; ?></ubuntu></div>
							
						</div>

					<?php
					if($color == 'dark') $color='light'; else $color='dark'; }
					?>
                    
                </div>

			</div>

			<div id="containerRight">
			
				<div id="containerSpace"></div>
				
				<div class="boxContainer rounded">

					<div class="boxHeader right rounded green"><ubuntu><?php echo $language['top_10']; ?></ubuntu></div>
				
					<div class="overlideside onclickOpenTop10Credits selected" style="width: 274px; margin-right: -2px;">
                    
                    	<div class="vipBuyBox">
                    
                    		<div class="insideVipBuy">
                            
                            	<div class="textVipBuy">
                                    
                                    <div class="howLongVipBuy" style="margin-top: -7px;"><ubuntu><?php echo $language['top_10_credits']; ?></ubuntu></div>
                                    
                                </div>
                        
                        	</div>
                    
                    	</div>
                    
                    </div>
                    
                    <div class="overlideside onclickOpenTop10Pixels" style="width: 274px; margin-right: -2px; margin-top: 3px;">
                    
                    	<div class="vipBuyBox">
                    
                    		<div class="insideVipBuy">
                            
                            	<div class="textVipBuy">
                                    
                                    <div class="howLongVipBuy" style="margin-top: -7px;"><ubuntu><?php echo $language['top_10_pixels']; ?></ubuntu></div>
                                    
                                </div>
                        
                        	</div>
                    
                    	</div>
                    
                    </div>
                    
                    <div class="overlideside onclickOpenTop10EventPoints" style="width: 274px; margin-right: -2px; margin-top: 3px;">
                    
                    	<div class="vipBuyBox">
                    
                    		<div class="insideVipBuy">
                            
                            	<div class="textVipBuy">
                                    
                                    <div class="howLongVipBuy" style="margin-top: -7px;"><ubuntu><?php echo $language['top_10_points']; ?></ubuntu></div>
                                    
                                </div>
                        
                        	</div>
                    
                    	</div>
                    
                    </div>
                    
                    <div class="overlideside onclickOpenTop10Respect" style="width: 274px; margin-right: -2px; margin-top: 3px;">
                    
                    	<div class="vipBuyBox">
                    
                    		<div class="insideVipBuy">
                            
                            	<div class="textVipBuy">
                                    
                                    <div class="howLongVipBuy" style="margin-top: -7px;"><ubuntu><?php echo $language['top_10_respect']; ?></ubuntu></div>
                                    
                                </div>
                        
                        	</div>
                    
                    	</div>
                    
                    </div>
                    
                    <div class="overlideside onclickOpenTop10LongestOnline" style="width: 274px; margin-right: -2px; margin-top: 3px;">
                    
                    	<div class="vipBuyBox">
                    
                    		<div class="insideVipBuy">
                            
                            	<div class="textVipBuy">
                                    
                                    <div class="howLongVipBuy" style="margin-top: -7px;"><ubuntu><?php echo $language['top_10_longest_online']; ?></ubuntu></div>
                                    
                                </div>
                        
                        	</div>
                    
                    	</div>
                    
                    </div>
                    				
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