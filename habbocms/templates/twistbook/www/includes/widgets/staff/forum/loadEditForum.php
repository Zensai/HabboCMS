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
?>
<script src="<?php echo HOST; ?>/web-gallery/styles/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php echo HOST; ?>/web-gallery/styles/js/ubuntu.font.js" type="text/javascript"></script>			
<script type="text/javascript">Cufon.replace("ubuntu");</script>
<?php
if($users->UserPermission('cms_forum_edit', $username)){ 

	if(isset($_POST['id']) && isset($_POST['parent_id']) && isset($_GET['type'])){
		
		$parent_id = $core->ExploitRetainer($_POST['parent_id']);
		$forum_id = $core->ExploitRetainer($_POST['id']);
		$type = $core->ExploitRetainer($_GET['type']);
		$parent_forum_id = $core->ExploitRetainer($_POST['parent_forum_id']);
?>
<script>
$(document).ready(function(){
	$('.saveForumCatManager').click(function(){
		editForumData('<?php echo $forum_id; ?>', $('#forumManagerNameEdit').val(), ' ', '<?php echo $parent_id; ?>');
	});
	
	$('.saveForumManager').click(function(){
		editForumData('<?php echo $forum_id; ?>', $('#forumManagerNameEdit').val(), $('#forumManagerDescriptionEdit').val(), '<?php echo $parent_id; ?>');
	});
	
	$('.saveSubforumManager').click(function(){
		editSubforumData('<?php echo $forum_id; ?>', $('#forumManagerNameEdit').val(), $('#forumManagerDescriptionEdit').val(), $('#forumManagerParentEdit').val());
	});
});

function editForumData(id, name, description, parent_id){
	
	$.post("<?php echo HOST; ?>/forum/manager/edit/forum", { id: id, name: name, description: description, parent_id: parent_id }, function(){
		loadForumManagerSpecific('<?php echo $parent_id; ?>');
	});
	
}

function editSubforumData(id, name, description, parent_id){
	
	$.post("<?php echo HOST; ?>/forum/manager/edit/forum", { id: id, name: name, description: description, parent_id: parent_id }, function(){
		loadForumManagerSpecific('<?php echo $parent_forum_id; ?>');
	});
	
}
</script>
<?php
		
		if($type == 'forumcat'){
			
			$forumcat = mysql_fetch_array(mysql_query("SELECT * FROM forums WHERE count_id = '1' AND id = '".$forum_id."'"));
?>

			<div class="localOverlowTitleSecond"><ubuntu>Forum catagorie: <b><?php echo $forumcat['name']; ?></b> <?php echo $language['edit']; ?></ubuntu></div>
				
			<br><br>
    
    		<div style="width: 100%; display: table; float: left;">
				
				<label style="font-size: 15px;"><ubuntu>Titel</ubuntu></label>
					
				<br>
				
				<input type="text" id="forumManagerNameEdit" name="forumManagerNameEdit" value="<?php echo $forumcat['name']; ?>">
                
        	</div>
            
            <input type="submit" style="margin-top: 5px;" class="submitRight saveForumCatManager" id="submitBlack" value="<?php echo $language['edit']; ?>">

<?php 
		}
		
		if($type == 'forum'){
			
			$forum = mysql_fetch_array(mysql_query("SELECT * FROM forums WHERE count_id = '2' AND id = '".$forum_id."'"));
?>

			<div class="localOverlowTitleSecond"><ubuntu>Forum: <b><?php echo $forum['name']; ?></b> <?php echo $language['edit']; ?></ubuntu></div>
				
			<br><br>
    
    		<div style="width: 100%; display: table; float: left;">
				
				<label style="font-size: 15px;"><ubuntu>Titel</ubuntu></label>
					
				<br>
				
				<input type="text" id="forumManagerNameEdit" name="forumManagerNameEdit" value="<?php echo $forum['name']; ?>">
                
        	</div>
            
            <div style="width: 100%; display: table; float: left;">
				
				<label style="font-size: 15px;"><ubuntu>Beschrijving</ubuntu></label>
					
				<br>
				
				<input type="text" id="forumManagerDescriptionEdit" name="forumManagerDescriptionEdit" value="<?php echo $forum['description']; ?>">
                
        	</div>
            
            <input type="submit" style="margin-top: 5px;" class="submitRight saveForumManager" id="submitBlack" value="<?php echo $language['edit']; ?>">

<?php

		}
		
		if($type == 'subforum'){
			
			$subforum = mysql_fetch_array(mysql_query("SELECT * FROM forums WHERE count_id = '3' AND id = '".$forum_id."'"));
?>

			<div class="localOverlowTitleSecond"><ubuntu>Subforum: <b><?php echo $subforum['name']; ?></b> <?php echo $language['edit']; ?></ubuntu></div>
				
			<br><br>
            
            <div style="width: 100%; display: table; float: left;">
				
				<label style="font-size: 15px;"><ubuntu>In welk forum</ubuntu></label>
					
				<br>
				
				<select id="forumManagerParentEdit" name="forumManagerParentEdit" class="select" style="width: 100%;">
				
					<?php 
					$query_search_forums = mysql_query("SELECT * FROM forums WHERE count_id = '2' AND parent_id = '".$parent_forum_id."'");
					while($search_forums = mysql_fetch_array($query_search_forums)){
					?>
                
                		<option <?php if($search_forums['id'] == $subforum['parent_id']){ echo 'selected=selected '; } ?> value="<?php echo $search_forums['id']; ?>"><?php echo $search_forums['name']; ?></option>
                
                	<?php } ?>
				
				</select>
                
        	</div>
    
    		<div style="width: 100%; display: table; float: left;">
				
				<label style="font-size: 15px;"><ubuntu>Titel</ubuntu></label>
					
				<br>
				
				<input type="text" id="forumManagerNameEdit" name="forumManagerNameEdit" value="<?php echo $subforum['name']; ?>">
                
        	</div>
            
            <div style="width: 100%; display: table; float: left;">
				
				<label style="font-size: 15px;"><ubuntu>Beschrijving</ubuntu></label>
					
				<br>
				
				<input type="text" id="forumManagerDescriptionEdit" name="forumManagerDescriptionEdit" value="<?php echo $subforum['description']; ?>">
                
        	</div>
            
            <input type="submit" style="margin-top: 5px;" class="submitRight saveSubforumManager" id="submitBlack" value="<?php echo $language['edit']; ?>">

<?php
		}
		
	}
	
} 
?>