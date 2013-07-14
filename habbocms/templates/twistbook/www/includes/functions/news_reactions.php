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
include("../../includes/inc.global.php");
?>

<?php echo $Style->General(); ?>

<script>
			$(function(){
    			$(".load").click(function(e){
        			e.preventDefault();
        			$(".newsReactionContainer:hidden").slice(0, 10).fadeIn("slow");
					if($(".newsReactionContainer:hidden").length == 0){
						$(".load").fadeOut("fast");
        			}
    			});
			});
</script>

<?php 
$query_newsReactions = mysql_query("SELECT * FROM cms_news_comments WHERE news_id = '".$core->ExploitRetainer($_GET['id'])."' ORDER BY published DESC LIMIT 20");
$direction = 'Left';
while($newsReaction = mysql_fetch_array($query_newsReactions)){
$query_userInfo = mysql_query("SELECT * FROM users WHERE id = '".$newsReaction['user_id']."'");
$userInfo = mysql_fetch_array($query_userInfo);
?>
                        
	<div class="newsReactionContainer">
                        
		<div class="newsReactionUserInfo" <?php if($direction == 'Left'){ }else{ ?>style="float: right;"<?php } ?>>
                            
			<center><div class="nameNewsReaction">
                                    
				<ubuntu>
                                        
					<b>
					
						<?php if($userInfo['rank'] > 2){
						
							if($direction == 'Left'){ ?>
                            
                            	<img style="padding-right: 5px; margin-bottom: -3px;margin-top: -2px;" src="<?php echo HOST; ?>/web-gallery/icons/small_star.gif" />
								
						<?php } }
						echo '<a style="color: #3A3A3A;" href="'.HOST.'/home/'.$userInfo['id'].'">'.$userInfo['username'].'</a>'; 
						
						if($userInfo['rank'] > 2){ 
						
							if($direction == 'Right'){ ?>
                            
                            	<img style="padding-left: 5px; margin-bottom: -3px;margin-top: -2px" src="<?php echo HOST; ?>/web-gallery/icons/small_star.gif" />
								
						<?php } } ?>
                        
                    </b><br>
                    
					<div style="font-size: 9px;margin-bottom: -17px;"><?php echo $language['posted_on']; ?>: <b><?php echo $core->timeAgo($newsReaction['published']); ?></b></div>
                                            
				</ubuntu>
                                        
			</div></center>
                            	
			<div class="avatarNewsReaction" style="background-image: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $userInfo['look']; ?>&direction=<?php if($direction == 'Left'){ ?>2<?php }else{ ?>4<?php } ?>&head_direction=3&gesture=sml);"></div>
                            
		</div>
                            
		<div class="newsReactionText" <?php if($direction == 'Left'){ }else{ ?>style="float: right; text-align: right; margin-left: 0; margin-right: 5px;"<?php } ?>>
                            
			<ubuntu><?php echo $newsReaction['message']; ?></ubuntu>
                            
		</div>
                                
	</div>
                        
<?php
if($direction == 'Left'){ $direction = 'Right'; }else{ $direction = 'Left'; }
} 
?>

<?php 
$query_newsReactions = mysql_query("SELECT * FROM cms_news_comments WHERE news_id = '".$core->ExploitRetainer($_GET['id'])."' ORDER BY published DESC LIMIT 20,100");
$direction = 'Left';
while($newsReaction = mysql_fetch_array($query_newsReactions)){
$query_userInfo = mysql_query("SELECT * FROM users WHERE id = '".$newsReaction['user_id']."'");
$userInfo = mysql_fetch_array($query_userInfo);
?>
                        
	<div class="newsReactionContainer" style="display: none;">
                        
		<div class="newsReactionUserInfo" <?php if($direction == 'Left'){ }else{ ?>style="float: right;"<?php } ?>>
                            
			<center><div class="nameNewsReaction">
                                    
				<ubuntu>
                                        
					<b>
					
						<?php if($userInfo['rank'] > 6){
						
							if($direction == 'Left'){ ?>
                            
                            	<img style="padding-right: 5px; margin-bottom: -3px;margin-top: -2px" src="<?php echo HOST; ?>/web-gallery/icons/small_star.gif" />
								
						<?php } }
						echo '<a href="'.HOST.'/home/'.$userInfo['id'].'">'.$userInfo['username'].'</a>'; 
						
						if($userInfo['rank'] > 6){ 
						
							if($direction == 'Right'){ ?>
                            
                            	<img style="padding-left: 5px; margin-bottom: -3px;margin-top: -2px" src="<?php echo HOST; ?>/web-gallery/icons/small_star.gif" />
								
						<?php } } ?>
                        
                    </b><br>
                                            
				</ubuntu>
                                        
			</div></center>
                            	
			<div class="avatarNewsReaction" style="background-image: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $userInfo['look']; ?>&direction=<?php if($direction == 'Left'){ ?>2<?php }else{ ?>4<?php } ?>&head_direction=3&gesture=sml);"></div>
                            
		</div>
                            
		<div class="newsReactionText" <?php if($direction == 'Left'){ }else{ ?>style="float: right; text-align: right; margin-left: 0; margin-right: 5px;"<?php } ?>>
                            
			<ubuntu><?php echo $newsReaction['message']; ?></ubuntu>
                            
		</div>
                                
	</div>
                        
<?php
if($direction == 'Left'){ $direction = 'Right'; }else{ $direction = 'Left'; }
} 
?>



<?php 
$query_newsReactionsCount = mysql_query("SELECT * FROM cms_news_comments WHERE news_id = '".$core->ExploitRetainer($_GET['id'])."'");
$newsReactionsCount = mysql_num_rows($query_newsReactionsCount);
if($newsReactionsCount == 0){ ?>

	<div class="errorMessageOverlow" style="width: 544px;"><?php echo $language['no_news_reactions']; ?></div>

<?php }if($newsReactionsCount > 0){ ?>

	<div style="margin-top: -5px;"></div>

	<div class="load" style="font-size: 14px;font-weight: bold;cursor: pointer; padding-top: 5px;"><ubuntu><?php echo $language['load_more_messages']; ?></ubuntu></div>

<?php } ?>