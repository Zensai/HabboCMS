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

$forum_id = $core->ExploitRetainer($_POST['id']);
?>

<script src="<?php echo HOST; ?>/web-gallery/styles/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php echo HOST; ?>/web-gallery/styles/js/ubuntu.font.js" type="text/javascript"></script>			
<script type="text/javascript">Cufon.replace("ubuntu");</script>

<script>
$(document).ready(function() {
	
	$('.deleteForumCat').click(function(){
		deleteForumCat('<?php echo $forum_id; ?>');
	});
	
	$('#onclickOpenAddForum').click(function(){
		if($(".addForum:first").is(":hidden")){
			$('.addForum').slideDown();
		}else{
			$('.addForum').slideUp();
			$('#forumManagerName').val('');
			$('#forumManagerDescription').val('');
		}
	});
	
	$('.postAddForumClose').click(function(){
		$('.addForum').slideUp();
		$('#forumManagerName').val('');
		$('#forumManagerDescription').val('');
	});
	
	$('.postAddForum').click(function(){
		postForumData($('#forumManagerName').val(), $('#forumManagerDescription').val(), '<?php echo $forum_id; ?>', '2', '0');
	});
	
	$('#onclickOpenAddSubforum').click(function(){
		if($(".addSubforum:first").is(":hidden")){
			$('.addSubforum').slideDown();
		}else{
			$('.addSubforum').slideUp();
			$('#subforumManagerName').val('');
			$('#subforumManagerDescription').val('');
		}
	});
	
	$('.postAddSubforumClose').click(function(){
		$('.addSubforum').slideUp();
		$('#subforumManagerName').val('');
		$('#subforumManagerDescription').val('');
	});
	
	$('.postAddSubforum').click(function(){
		postForumData($('#subforumManagerName').val(), $('#subforumManagerDescription').val(), $('#subforumManagerParent').val(), '3', '0');
	});
	
});

function deleteForumCat(id){

	$.post("<?php echo HOST; ?>/forum/manager/delete/forumCat", { id: id }, function(){
		loadForumManager();
	});
	
}

function postForumData(name, description, parent_id, count_id, post_right){
	
	$.post("<?php echo HOST; ?>/forum/manager/add/forum", { name: name, description: description, parent_id: parent_id, count_id: count_id, post_right: post_right }, function(){
		loadForumManagerSpecific('<?php echo $forum_id; ?>');
	});
	
}

function deleteForum(id){

	$.post("<?php echo HOST; ?>/forum/manager/delete/forum", { id: id }, function(){
		loadForumManagerSpecific('<?php echo $forum_id; ?>');
	});
	
}

function deleteSubforum(id){

	$.post("<?php echo HOST; ?>/forum/manager/delete/subforum", { id: id }, function(){
		loadForumManagerSpecific('<?php echo $forum_id; ?>');
	});
	
}

function loadEditForumCat(id){
	
	$('.loadEditShit').slideDown();
	$('.loadEditShit').html('<center><img style="margin-top:80px; margin-bottom: 80px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></center>');

	$.post("<?php echo HOST; ?>/forum/manager/load/edit/forumcat", { id: id, parent_id: '<?php echo $forum_id; ?>', parent_forum_id: '<?php echo $forum_id; ?>' }, function(php){
		$('.loadEditShit').html(php);
	});
	
}

function loadEditForum(id, parent_id){
	
	$('.loadEditShit').slideDown();
	$('.loadEditShit').html('<center><img style="margin-top:80px; margin-bottom: 80px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></center>');

	$.post("<?php echo HOST; ?>/forum/manager/load/edit/forum", { id: id, parent_id: parent_id, parent_forum_id: '<?php echo $forum_id; ?>' }, function(php){
		$('.loadEditShit').html(php);
	});
	
}

function loadEditSubforum(id, parent_id){
	
	$('.loadEditShit').slideDown();
	$('.loadEditShit').html('<center><img style="margin-top:80px; margin-bottom: 80px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></center>');

	$.post("<?php echo HOST; ?>/forum/manager/load/edit/subforum", { id: id, parent_id: parent_id, parent_forum_id: '<?php echo $forum_id; ?>' }, function(php){
		$('.loadEditShit').html(php);
	});
	
}
</script>

<div style="width: 100%; display: table;">

	<div class="insideContainer" style="width: 100%;">
    
    	<div class="localOverlowTitleSecond" style="font-size: 16px;"><ubuntu>Je kunt nu dit forum aanpassen. Pas op! Lees goed de toolboxen voordat je klikt!</ubuntu></div>
    
   	 	<a class="overlowButton" style="float: right; margin-top: -7px; margin-right: -5px; margin-bottom: -5px;">
				
			<b><u>
                                
                <div id="onclickOpenAddForum" title="Forum toevoegen" class="overlowIcon"><img style="cursor: pointer;margin-top: 9px;" src="<?php echo HOST; ?>/web-gallery/icons/plus_icon.gif"></div>
                
                <div class="overlowIconLine"></div>
                
                <div id="onclickOpenAddSubforum" title="Subforum toevoegen" class="overlowIcon"><img style="cursor: pointer;margin-top: 9px;" src="<?php echo HOST; ?>/web-gallery/icons/plus_icon.gif"></div>
                                    
            </u></b>
                                
            <div></div>
                                
       	</a>
    
    </div>
    
    <div class="insideContainer space addForum" style="width: 100%; display: none;">
    
    	<div class="localOverlowTitleSecond"><ubuntu>Forum toevoegen</ubuntu></div>
				
		<br><br>
    
    	<div style="width: 100%; display: table; float: left;">
				
			<label style="font-size: 15px;"><ubuntu>Titel</ubuntu></label>
					
			<br>
				
			<input type="text" id="forumManagerName" name="forumManagerName">
                
        </div>
        
        <div style="width: 100%; display: table; float: left;">
				
			<label style="font-size: 15px;"><ubuntu>Beschrijving</ubuntu></label>
					
			<br>
				
			<input type="text" id="forumManagerDescription" name="forumManagerDescription">
                
        </div>
        
        <input type="submit" style="margin-top: 5px;" class="submitLeft postAddForumClose" id="submitRed" value="Afbreken">
        
        <input type="submit" style="margin-top: 5px;" class="submitRight postAddForum" id="submitDarkBlue" value="Toevoegen">
    
    </div>
    
    <div class="insideContainer space addSubforum" style="width: 100%; display: none;">
    
    	<div class="localOverlowTitleSecond"><ubuntu>Subforum toevoegen</ubuntu></div>
				
		<br><br>
        
        <div style="width: 100%; display: table; float: left;">
				
			<label style="font-size: 15px;"><ubuntu>Forums waar subforum in moet</ubuntu></label>
					
			<br>
				
			<select id="subforumManagerParent" name="subforumManagerParent" class="select" style="width: 100%;">
				
				<?php 
				$query_search_forums = mysql_query("SELECT * FROM forums WHERE count_id = '2' AND parent_id = '".$forum_id."'");
				while($search_forums = mysql_fetch_array($query_search_forums)){
				?>
                
                	<option value="<?php echo $search_forums['id']; ?>"><?php echo $search_forums['name']; ?></option>
                
                <?php } ?>
				
			</select>
                
        </div>
    
    	<div style="width: 100%; display: table; float: left;">
				
			<label style="font-size: 15px;"><ubuntu>Titel</ubuntu></label>
					
			<br>
				
			<input type="text" id="subforumManagerName" name="forumManagerName">
                
        </div>
        
        <div style="width: 100%; display: table; float: left;">
				
			<label style="font-size: 15px;"><ubuntu>Beschrijving</ubuntu></label>
					
			<br>
				
			<input type="text" id="subforumManagerDescription" name="forumManagerDescription">
                
        </div>
        
        <input type="submit" style="margin-top: 5px;" class="submitLeft postAddSubforumClose" id="submitRed" value="Afbreken">
        
        <input type="submit" style="margin-top: 5px;" class="submitRight postAddSubforum" id="submitDarkBlue" value="Toevoegen">
    
    </div>
    
    <div class="insideContainer space loadEditShit" style="width: 740px; display: none;">
    
    	<center><img style="margin-top:80px; margin-bottom: 80px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></center>
    
    </div>
    
<?php
$query_manager_forum = mysql_query("SELECT * FROM forums WHERE count_id = '1' AND id = '".$forum_id."'");
$manager_forum = mysql_fetch_array($query_manager_forum);
?>		

	<div class="insideContainer space" style="width: 100%;">
    
    <script>
	$(document).ready(function(){
		$('.openEditFormCat<?php echo $manager_forum['id']; ?>').click(function(){
			loadEditForumCat('<?php echo $manager_forum['id']; ?>', '<?php echo $forum_id; ?>');
		});
	});
	</script>

	<div title="<b><?php echo $manager_forum['name']; ?></b><br>Klik hier op om de hele forum categorie te verwijderen inclusief de forums, subforums, onderwerpen en reacties die bij deze forum categorie horen." style="background-color: #E9E9E9; width: 715px; padding: 10px; border: 1px solid #FFFFFF; border-radius: 4px;"><font style="font-size: 17px; cursor: pointer;" class="deleteForumCat"><ubuntu><?php echo $manager_forum['name']; ?></ubuntu></font><input type="submit" style="margin-top: -6px; margin-right: -6px;" class="submitRight openEditFormCat<?php echo $manager_forum['id']; ?>" id="submitBlack" value="<?php echo $language['edit']; ?>"></div>
    
	<?php 
	$query_manager_change = mysql_query("SELECT * FROM forums WHERE count_id = '2' AND parent_id = '".$manager_forum['id']."'");
	while($manager_change = mysql_fetch_array($query_manager_change)){
	?>
    
    	<script>
		$(document).ready(function(){
			$('.deleteForum<?php echo $manager_change['id']; ?>').click(function(){
				deleteForum('<?php echo $manager_change['id']; ?>');
			});
			$('.openEditForum<?php echo $manager_change['id']; ?>').click(function(){
				loadEditForum('<?php echo $manager_change['id']; ?>', '<?php echo $forum_id; ?>');
			});
		});
		</script>
        
        <div title="<b><?php echo $manager_change['name']; ?></b><br>Klik hier om dit forum te verwijderen inclusief de subforums, onderwerpen en reacties die bij in dit forum voorkomen." style="background-color: #E9E9E9; width: 640px; padding: 10px; border: 1px solid #FFFFFF; margin-top: 1px; border-radius: 4px; margin-left: 75px;"><font style="font-size: 17px; cursor: pointer;" class="deleteForum<?php echo $manager_change['id']; ?>"><ubuntu><?php echo $manager_change['name']; ?></ubuntu></font><input type="submit" style="margin-top: -6px; margin-right: -6px;" class="submitRight openEditForum<?php echo $manager_change['id']; ?>" id="submitDarkBlue" value="<?php echo $language['edit']; ?>"></div>
        
        <?php 
		$query_manager_sub = mysql_query("SELECT * FROM forums WHERE count_id = '3' AND parent_id = '".$manager_change['id']."'");
		while($manager_sub = mysql_fetch_array($query_manager_sub)){
		?>
        
        	<script>
			$(document).ready(function(){
				$('.deleteSubforum<?php echo $manager_sub['id']; ?>').click(function(){
					deleteSubforum('<?php echo $manager_sub['id']; ?>');
				});
				$('.openEditSubforum<?php echo $manager_sub['id']; ?>').click(function(){
					loadEditSubforum('<?php echo $manager_sub['id']; ?>', '<?php echo $manager_change['id']; ?>');
				});
			});
			</script>
        
        	<div title="<b><?php echo $manager_sub['name']; ?></b><br>Klik hier om het subforum te verwijderen inclusief de onderwerpen en reacties die in dit subforum voorkomen." style="background-color: #E9E9E9; width: 565px; padding: 10px; border: 1px solid #FFFFFF; margin-top: 1px; border-radius: 4px; margin-left: 150px;"><font style="font-size: 17px; cursor: pointer;" class="deleteSubforum<?php echo $manager_sub['id']; ?>"><ubuntu><?php echo $manager_sub['name']; ?></ubuntu></font><input type="submit" style="margin-top: -6px; margin-right: -6px;" class="submitRight openEditSubforum<?php echo $manager_sub['id']; ?>" id="submitGreen" value="<?php echo $language['edit']; ?>"></div>
        
        <?php } ?>
        
    <?php } ?>
    
    </div>

</div>

<?php } ?>