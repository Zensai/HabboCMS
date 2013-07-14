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
include("../../../../includes/inc.global.php");

if($core->ExploitRetainer($users->UserPermission('cms_manager_login', $username))){ if($core->ExploitRetainer($users->UserPermission('cms_news', $username))){ 
?>

<script>
$(document).ready(function(){

	$('.onclickRemoveNews').click(function(){
		var id = $(this).attr('id');
		removeNews(id);
	});
	
	$('.onclickEditNews').click(function(){
		var id = $(this).attr('id');
		editNews(id);
	});
	
});
</script>

<div class="boxContainer darkBlue">
    
    <div class="boxHeader"><div class="text"><?php echo $language["manager_news_overview"]; ?></div></div>
        
    <div class="text">
	
		<div style="display: table; margin-left: -5px; margin-top: -5px;">

			<?php
			$query_news = mysql_query("SELECT * FROM cms_news ORDER BY published DESC");
			while($news = mysql_fetch_array($query_news)){
			?>

				<div class="greyNewsBox fadeOutNewsbox<?php echo $news['id']; ?>" style="background-color: #EDEDED;padding: 10px; display: table; margin-top: 5px; margin-left: 5px; float: left; width: 400px;">
				
					<?php echo @date("d/m/Y", $news['published']); ?> <b>|</b> <?php echo substr($news['title'], 0, 40); ?>... 
					<div class="tooltip" style="float: right; cursor: pointer;"><img class="onclickRemoveNews" id="<?php echo $news['id']; ?>" align="right" src="<?php echo STYLE; ?>/web-gallery/button/overlow/iconDown.gif"><span><b><?php echo substr($news['title'], 0, 40); ?>...</b> | <?php echo $language["manager_news_delete"]; ?></span></div>
					<div class="tooltip" style="float: right; cursor: pointer;"><img class="onclickEditNews" id="<?php echo $news['id']; ?>" align="right" style="margin-left: 5px;" src="<?php echo STYLE; ?>/web-gallery/button/overlow/iconEdit.gif"><span><b><?php echo substr($news['title'], 0, 40); ?>...</b> | <?php echo $language["manager_news_edit"]; ?></span></div>
					
				</div>
				
			<?php } ?>
		
		</div>

	</div>
	
</div>

<?php } } ?>