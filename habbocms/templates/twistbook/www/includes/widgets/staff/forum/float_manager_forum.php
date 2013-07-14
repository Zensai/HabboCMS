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

$page = 'forum_manager';

if($users->UserPermission('cms_forum_edit', $username)){ 
?>

<script src="<?php echo HOST; ?>/web-gallery/styles/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php echo HOST; ?>/web-gallery/styles/js/ubuntu.font.js" type="text/javascript"></script>			
<script type="text/javascript">Cufon.replace("ubuntu");</script>

<script>
$(document).ready(function() {
	
  	$('#onclickOpenAddForumCat').click(function(){
		if($(".addForumCat:first").is(":hidden")){
			$('.addForumCat').slideDown();
		}else{
			$('.addForumCat').slideUp();
			$('#forumManagerName').val('');
			$('#forumManagerDescription').val('');
		}
	});
	
	$('.postAddForumCatClose').click(function(){
		$('.addForumCat').slideUp();
		$('#forumManagerName').val('');
	});
	
	$('.postAddForumCat').click(function(){
		postForumData($('#forumManagerName').val(), '0', '0', '1', '0');
	});
	
});

function postForumData(name, description, parent_id, count_id, post_right){
	
	$.post("<?php echo HOST; ?>/forum/manager/add/forum", { name: name, description: description, parent_id: parent_id, count_id: count_id, post_right: post_right }, function(){
		loadForumManager();
	});
	
}
</script>

<div style="width: 100%; display: table;">

	<div class="insideContainer" style="width: 100%;">
    
    	<div class="localOverlowTitleSecond" style="font-size: 16px;"><ubuntu>Klik de forum groep aan die jij wilt aanpassen.</ubuntu></div>
    
   	 	<a class="overlowButton" style="float: right; margin-top: -7px; margin-right: -5px; margin-bottom: -5px;">
				
			<b><u>
                                
                <div id="onclickOpenAddForumCat" title="Forum categorie toevoegen" class="overlowIcon"><img style="cursor: pointer;margin-top: 9px;" src="<?php echo HOST; ?>/web-gallery/icons/plus_icon.gif"></div>
                                    
            </u></b>
                                
            <div></div>
                                
       	</a>
    
    </div>
    
    <div class="insideContainer space addForumCat" style="width: 100%; display: none;">
    
    	<div class="localOverlowTitleSecond"><ubuntu>Forum categorie toevoegen</ubuntu></div>
				
		<br><br>
    
    	<div style="width: 100%; display: table; float: left;">
				
			<label style="font-size: 15px;"><ubuntu>Titel</ubuntu></label>
					
			<br>
				
			<input type="text" id="forumManagerName" name="forumManagerName">
                
        </div>
        
        <input type="submit" style="margin-top: 5px;" class="submitLeft postAddForumCatClose" id="submitRed" value="Afbreken">
        
        <input type="submit" style="margin-top: 5px;" class="submitRight postAddForumCat" id="submitDarkBlue" value="Toevoegen">
    
    </div>

<?php
$query_manager_forum = mysql_query("SELECT * FROM forums WHERE count_id = '1' ORDER BY id");
while($manager_forum = mysql_fetch_array($query_manager_forum)){
?>		

	<script>
	$(document).ready(function(){
		$('.openSpecificForumEdit<?php echo $manager_forum['id']; ?>').click(function(){
			loadForumManagerSpecific('<?php echo $manager_forum['id']; ?>');
		});
	});
	</script>

	<div class="insideContainer space openSpecificForumEdit<?php echo $manager_forum['id']; ?>" style="width: 100%; cursor: pointer;" title="Klik op dit gedeelte om de forum categorie <b><?php echo $manager_forum['name']; ?></b> aan te passen met alle forums en subforums">

	<div style="background-color: #E9E9E9; width: 715px; padding: 10px; border: 1px solid #FFFFFF; border-radius: 4px;"><font style="font-size: 17px;"><ubuntu><?php echo $manager_forum['name']; ?></ubuntu></font></div>
    
	<?php 
	$query_manager_change = mysql_query("SELECT * FROM forums WHERE count_id = '2' AND parent_id = '".$manager_forum['id']."' ORDER BY id");
	while($manager_change = mysql_fetch_array($query_manager_change)){
	?>
        
        <div style="background-color: #E9E9E9; width: 640px; padding: 10px; border: 1px solid #FFFFFF; margin-top: 1px; border-radius: 4px; margin-left: 75px;"><font style="font-size: 17px;"><ubuntu><?php echo $manager_change['name']; ?></ubuntu></font></div>
        
        <?php 
		$query_manager_sub = mysql_query("SELECT * FROM forums WHERE count_id = '3' AND parent_id = '".$manager_change['id']."' ORDER BY id");
		while($manager_sub = mysql_fetch_array($query_manager_sub)){
		?>
        
        	<div style="background-color: #E9E9E9; width: 565px; padding: 10px; border: 1px solid #FFFFFF; margin-top: 1px; border-radius: 4px; margin-left: 150px;"><font style="font-size: 17px;"><ubuntu><?php echo $manager_sub['name']; ?></ubuntu></font></div>
        
        <?php } ?>
        
    <?php } ?>
    
    </div>

<?php } ?>

</div>

<?php } ?>