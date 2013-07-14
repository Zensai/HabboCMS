<?php

$typePageID = 'errors';

define('USER', FALSE); 
define('ACCOUNT', FALSE);
define('MAINTENANCE', FALSE);
include("../../includes/inc.global.php");
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

	<title><?php echo $hotelname; ?> - Error</title>
	<?php echo $Style->General(); ?>

</head>

<body onkeydown="onKeyDown()" style="background: none;">

<div class="overlowContainer" id="overlowPay" style="display: block;">

	<div class="container" style="width: 350px;">
		
		<div class="top"></div>
		
		<?php if(isset($_GET['state']) && isset($_GET['type'])){ ?>
		
			<?php if($core->ExploitRetainer($_GET['state']) == 'user'){ ?>
			
				<?php if($core->ExploitRetainer($_GET['type']) == 'exsist'){ ?>
			
					<div class="localOverlowTitleSettings" style="width: 100%;"><b><ubuntu><?php echo $language["error_ops"]; ?></ubuntu></b></div>
					
					<div class="text">
						
						<script>
						$(document).ready(function(){
							$('.beforeBegin').fadeIn();
						});
						</script>
						
						<div class="beforeBegin" style="display: none;">
						
							<div id="frankAvatar"></div> 
								
							<div class="frankBubble left">
					
								<div class="frankBubbleArrowWhite"></div>
										
								<div class="frankBubbleText" style="">

									<?php echo $language["error1"]; ?>	
		
								</div>
										
							</div>
								
							<a class="overlowButton voteNow" style="float: left; text-shadow: none; margin-top: 5px; margin-left: 75px;" href="<?php echo HOST; ?>/logout">
										
								<b><u class="overlowButtonText" style="">
									
									<?php echo $language["error1"]; ?>			
									<i><ubuntu><?php echo $language["error_logout"]; ?></ubuntu></i>
											
								</u></b>
												
								<div></div>
										
							</a>
								
						</div>

					</div>
				
				<?php } ?>
				
				<?php if($core->ExploitRetainer($_GET['type']) == 'session-ticket'){ ?>
			
					<div class="localOverlowTitleSettings" style="width: 100%;"><b><ubuntu><?php echo $language["error_ops"]; ?></ubuntu></b></div>
					
					<div class="text">
						
						<script>
						$(document).ready(function(){
							$('.beforeBegin').fadeIn();
						});
						</script>
						
						<div class="beforeBegin" style="display: none;">
						
							<div id="frankAvatar"></div> 
								
							<div class="frankBubble left">
					
								<div class="frankBubbleArrowWhite"></div>
										
								<div class="frankBubbleText" style="">
									
									<?php echo $language["error2"]; ?>		
		
								</div>
										
							</div>
								
							<a class="overlowButton voteNow" style="float: left; text-shadow: none; margin-top: 5px; margin-left: 75px;" href="<?php echo HOST; ?>/logout">
										
								<b><u class="overlowButtonText" style="">
											
									<i><ubuntu><?php echo $language["error_logout"]; ?></ubuntu></i>
											
								</u></b>
												
								<div></div>
										
							</a>
								
						</div>

					</div>
					
				<?php } ?>
				
				<?php if($core->ExploitRetainer($_GET['type']) == 'ip-compare'){ ?>
			
					<div class="localOverlowTitleSettings" style="width: 100%;"><b><ubuntu><?php echo $language["error_ops"]; ?></ubuntu></b></div>
					
					<div class="text">
						
						<script>
						$(document).ready(function(){
							$('.beforeBegin').fadeIn();
						});
						</script>
						
						<div class="beforeBegin" style="display: none;">
						
							<div id="frankAvatar"></div> 
								
							<div class="frankBubble left">
					
								<div class="frankBubbleArrowWhite"></div>
										
								<div class="frankBubbleText" style="">
									
									<?php echo $language["error3"]; ?>
										
								</div>
										
							</div>
								
							<a class="overlowButton voteNow" style="float: left; text-shadow: none; margin-top: 5px; margin-left: 75px;" href="<?php echo HOST; ?>/logout">
										
								<b><u class="overlowButtonText" style="">
											
									<i><ubuntu><?php echo $language["error_logout"]; ?></ubuntu></i>
											
								</u></b>
												
								<div></div>
										
							</a>
								
						</div>

					</div>
				
				<?php } ?>
			
			<?php } ?>
		
		<?php } ?>
		
		<div class="bottom"></div>
		
	</div>

</div>

</body>

</html>