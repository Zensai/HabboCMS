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
$page = 'community';
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

	<title><?php echo $hotelname; ?> - <?php echo $language['menu_community']; ?></title>
	<?php echo $Style->General(); ?>

	<?php echo $themeswitcher; ?>

</head>

<body onkeydown="onKeyDown()">

<?php include("apps/float_includes.php"); ?>
<?php include("apps/system/float_includes.php"); ?>

<?php include("apps/system/header_top.php"); ?>

<div id="container">
	
	<div id="middleContainer">
	
		<?php include("apps/system/container_header.php"); ?>

		<div id="containerMiddle">
        
        	<?php include("apps/widgets/headline_widget.php"); ?>

			<div id="containerLeft">
			
				<div id="containerSpace"></div>

				<iframe id="iframeDisableRightClick" onload="disableContextMenu();" scrolling="no" style="width: 591px; height: 235px; border: 0; margin-top: -1px;" src="../apps/widgets/news_widget.php"></iframe>
				
				<div id="containerSpace"></div>
						
				<div class="boxContainer rounded">

					<div class="boxHeader left rounded gray"><ubuntu><?php echo $language['community_users']; ?> (<?php $query_users = mysql_query("SELECT id FROM users"); $users = mysql_num_rows($query_users); echo $users; ?>)</ubuntu></div>

					<div class="spotlight blue positionSpot">
					
						<?php $getrandom = mysql_query("SELECT * FROM users ORDER BY RAND() LIMIT 8;"); while($random = mysql_fetch_array($getrandom)) { ?>
                        
                        	<script>
                        	$(document).ready(function() {
	
	                        	$('.onclickLoadQuickProfile<?php echo $random['id']; ?>').click(function() { 
									$("#overlowQuickProfile").fadeIn("slow", function(){
										loadQuickProfile<?php echo $random['id']; ?>();
									});
	                        	});
	
	                        	function loadQuickProfile<?php echo $random['id']; ?>(){
									
									$('.loadUserDataToQuickProfile').html('<center class="loaderFromTheQuickProfile"><img style="margin-top: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_habbos.gif"></center>');

		                        	var id = '<?php echo $random['username']; ?>';

		                        	$.post("<?php echo HOST; ?>/quickprofile/second/<?php echo $random['username']; ?>", { id: id }, function(result){ 
										$('.loaderFromTheQuickProfile').fadeOut();
										$('.loadUserDataToQuickProfile').html(result);
									});

	                        	}

                        	});
                        	</script>
						
							<a class="onclickOpenQuickProfile onclickLoadQuickProfile<?php echo $random['id']; ?>"><img title="<?php echo $random['username']; ?>" src="<?php echo $avatarimage_url; ?>?figure=<?php echo $random['look']; ?><?php echo $random['avatar_state']; ?>.gif"></a>
							
						<?php } ?>
						
					</div>

				</div>

			</div>

			<div id="containerRight">

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

	