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
$page = 'news';
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

	<title><?php echo $hotelname; ?> - <?php echo $language['menu_community_news']; ?></title>
	<?php echo $Style->General(); ?>

	<?php echo $themeswitcher; ?>
	
	<script type="text/javascript" src="<?php echo STYLE; ?>/web-gallery/ckeditor/ckeditor.js"></script>

</head>

<style type="text/css">
hr {
	border: 0;
	border-top: 1px solid #D3D3D3;
}
</style>

<body onkeydown="onKeyDown()">

<?php include("apps/float_includes.php"); ?>
<?php include("apps/system/float_includes.php"); ?>

<?php
include("apps/float/float_add_news_reaction.php");
?>

<?php include("apps/system/header_top.php"); ?>

<div id="container">
	
	<div id="middleContainer">
	
		<?php include("apps/system/container_header.php"); ?>

		<div id="containerMiddle">

			<div id="containerLeft">
			
				<div id="containerSpace"></div>
						
				<div class="boxContainer rounded" style="display: table;">
				
					<?php if($core->ExploitRetainer($users->News($_GET['id']))){ 

						$query_news = mysql_query("SELECT * FROM cms_news WHERE id = ".$core->ExploitRetainer($_GET['id']).""); 
						
						$news = mysql_fetch_array($query_news);
						
						$query_news_author = mysql_query("SELECT * FROM users WHERE id = ".$news['author']."");
						
						$news_author = mysql_fetch_array($query_news_author);
						
					?>
					
						<div class="boxHeader left rounded orange news"><ubuntu><?php echo html_entity_decode($news['title']); ?></ubuntu></div>
						
						<center><i><?php echo html_entity_decode($news['shortstory']); ?></i></center><br>
						
						<br>
                        
                        Hallo <?php echo $core->ExploitRetainer($users->UserInfo($username, 'username')); ?>!
                        
                        <br>
						
						<?php echo html_entity_decode($news['longstory']); ?>
						
						<div id="newsInformation">
						
							<div id="name"><img src="<?php echo HOST; ?>/web-gallery/icons/user_icon.gif"></div> <div id="bold"><?php echo $news_author['username']; ?></div> <div id="name" style="padding-left: 20px;"><?php echo $language['news_published']; ?></div> <div id="bold"><?php echo @date("d-m-Y", $news['published']); ?> <?php echo $language['at']; ?> <?php echo @date("H:i", $news['published']); ?></div>
						
						</div>
					
					<?php }else{ ?>
						
						<?php if($core->ExploitRetainer($_GET['id']) == '0'){ ?>
						
							<div class="boxHeader left rounded darkred"><ubuntu><?php echo $language['news_no_news_title']; ?></ubuntu></div>
						
							<?php echo $language['news_no_news_message']; ?>
							
						<?php } ?>
						
					<?php } ?>

				</div>
                
                <?php if($core->ExploitRetainer($users->News($_GET['id']))){ ?>
                
                	<script>
					$(document).ready(function() {
	
						//$(".insideNewsReactions").load("<?php echo HOST; ?>/news/reactions/<?php echo $core->ExploitRetainer($_GET['id']); ?>");
			
						$(".refreshNewsReactions").click(function() {
							$('.insideNewsReactions').html('<center><img style="margin-top:80px; margin-bottom: 80px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></center>');
    						$(".insideNewsReactions").load("<?php echo HOST; ?>/news/reactions/<?php echo $core->ExploitRetainer($_GET['id']); ?>");
  						});
	
					});
					</script>
                
                	<div id="containerSpace"></div>
                
                	<div class="boxContainer rounded" style="width: 281px;">
                    
                    	<div class="boxHeader left rounded lightblue"><ubuntu>
						
							<?php echo $language['news_reactions']; ?> 
                            
                            <?php if(isset($_COOKIE['username'])){ ?>
                                
                                <img title="<?php echo $language["news_reaction_add"]; ?>" id="onclickOpenAddNewsReaction" align="right" style="cursor: pointer;padding-top: 0px;padding-right:5px;" src="<?php echo HOST; ?>/web-gallery/icons/plus_icon.gif">
                                    
                            <?php } ?>
                            
                            <img class="refreshNewsReactions" title="<?php echo $language["refresh"]; ?>" id="onclickOpenAddNewsReaction" align="right" style="cursor: pointer;padding-top: 0px;padding-right:5px;" src="<?php echo HOST; ?>/web-gallery/icons/refresh.gif">
                            
                        </ubuntu></div>
                        
                        <div class="insideNewsReactions">
                        
                        	<center>
							
								<a class="overlowButton refreshNewsReactions" style="float: none; text-shadow: none; margin-top: 20px; margin-bottom: 20px;">
						
									<b><u class="overlowButtonText" style="">
										
										<i><ubuntu><?php echo $language["news_load_comments"]; ?></ubuntu></i>
										
									</u></b>
											
									<div></div>
										
								</a>
								
							</center>
                        
                        </div>
                    
                    </div>
                
                <?php } ?>

			</div>

			<div id="containerRight">
				
				<div id="containerSpace"></div>
				
				<div class="boxContainer rounded" style="width: 281px;">
				
					<div style="display: table; width: 275px;">
					
						<div id="newsTitleLine">
						
							<?php echo $language['menu_community_news']; ?> 
							
						</div>
					
						<?php
						$query_headlines = mysql_query("SELECT * FROM cms_news ORDER BY published DESC LIMIT 10");
						while($headlines = mysql_fetch_array($query_headlines)){
						?>
				
						<div id="<?php if(isset($_GET['id']) && $core->ExploitRetainer($_GET['id']) == $headlines['id']){ echo 'darkFilledArrowLeft'; }else{ echo 'darkArrowRight'; } ?>" class="headlineArrow"></div> 
						
						<div id="nextArrowHeadlineContainer" style="width: 249px;">
						
							<div id="nextArrowHeadline"><a href="<?php echo HOST; ?>/news/<?php echo $headlines['id']; ?>"><?php if(isset($_GET['id']) && $core->ExploitRetainer($_GET['id']) == $headlines['id']){ ?><b><?php echo $headlines['title']; ?></b><?php }else{ ?><?php echo $headlines['title']; ?><?php } ?></a></div>
							
							<br>
							
							<br>
						
							<div style="margin-top: -8px; font-size: 10px;"><ubuntu><?php echo @date("d-m-Y H:i", $headlines['published']); ?></ubuntu></div>
						
						</div>
						
						<br>
						
						<br>
						
						<?php } ?>
                        
                        <script>
						$(function(){
    						$(".newsLoadMore").click(function(e){
        					e.preventDefault();
        					$(".newsContainerHeadline:hidden").slice(0, 5).fadeIn("slow");
       							if($(".newsContainerHeadline:hidden").length == 0){
									$(".newsLoadMore").fadeOut("fast");
        						}
    						});
						});
						</script>
                        
                        <?php
						$query_headlines_load = mysql_query("SELECT * FROM cms_news ORDER BY published DESC LIMIT 10,25");
						while($headlines_load = mysql_fetch_array($query_headlines_load)){
						?>
                        
                        <div class="newsContainerHeadline" style="display: none;">
                        
						<div id="<?php if(isset($_GET['id']) && $core->ExploitRetainer($_GET['id']) == $headlines_load['id']){ echo 'darkFilledArrowLeft'; }else{ echo 'darkArrowRight'; } ?>" class="headlineArrow"></div> 
						
						<div id="nextArrowHeadlineContainer" style="width: 249px;">
						
							<div id="nextArrowHeadline"><a href="<?php echo HOST; ?>/news/<?php echo $headlines_load['id']; ?>"><?php if(isset($_GET['id']) && $core->ExploitRetainer($_GET['id']) == $headlines_load['id']){ ?><b><?php echo $headlines_load['title']; ?></b><?php }else{ ?><?php echo $headlines_load['title']; ?><?php } ?></a></div>
							
							<br>
							
							<br>
						
							<div style="margin-top: -8px; font-size: 10px;"><?php echo @date("d-m-Y H:i", $headlines_load['published']); ?></div>
						
						</div>
						
						<br>
						
						<br>
                        
                        </div>
						
						<?php } ?>
                        
                        <div class="newsLoadMore"><ubuntu><?php echo $language['load_more_news_messages']; ?></ubuntu></div>
					
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

	