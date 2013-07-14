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

if($users->UserPermission('cms_manager_rank', $username)){

	$permissionq = mysql_query("SELECT * FROM permissions_ranks WHERE rank = '".$core->ExploitRetainer($_GET['id'])."' LIMIT 1");
	$columns = mysql_num_fields($permissionq);
	$permission = mysql_fetch_array($permissionq);
	$permissionqq = mysql_query("SELECT * FROM ranks WHERE id = '".$core->ExploitRetainer($_GET['id'])."' LIMIT 1");
	$permission_name = mysql_fetch_array($permissionqq);

?>

<script src="<?php echo HOST; ?>/web-gallery/styles/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php echo HOST; ?>/web-gallery/styles/js/ubuntu.font.js" type="text/javascript"></script>
			
<script type="text/javascript">
	Cufon.replace("ubuntu");
</script>

<script>
$(document).ready(function() {
	
	$('.backToRankNoSave').click(function() { 
		LoadSecondRankIndex();
		$('.disepearDataRank').hide();
	});
	
	$('.backToRankSecond').click(function() { 
		LoadChangedDataBackSecond();
		$('.disepearDataRank').hide();
		LoadSecondRankIndex();
	});

	function LoadSecondRankIndex() {
		$('.textdisepearDataRank').html('<img style="margin-left: 360px; margin-top:80px; margin-bottom: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif">');
		$.ajax({
			type: "GET",
			url: "<?php echo HOST; ?>/manager/rank/second",
			data: "rankIdEdit=" + $('#rankIdEdit').val(),
			success: function(php){
				$('.textdisepearDataRank').html(php);
			}
		});
	}
	
	function LoadChangedDataBackSecond(){
		
		<?php for($i = 0; $i < $columns; $i++) { if(mysql_field_name($permissionq,$i)<>"rank"){ ?>

		var <?php echo mysql_field_name($permissionq,$i); ?> = $('#Rank<?php echo mysql_field_name($permissionq,$i); ?>').val();
		
		<?php } } ?>

		var id = $('#rankId').val();
		var name = $('#edit_rank_name').val();
		var edit_id = $('#edit_rank_id').val();
		var badgeid = $('#edit_rank_badgeid').val();

		$.post("<?php echo HOST; ?>/manager/rank/submit/edit", { <?php for($i = 0; $i < $columns; $i++) { if(mysql_field_name($permissionq,$i)<>"rank"){ ?> <?php echo mysql_field_name($permissionq,$i); ?>: <?php echo mysql_field_name($permissionq,$i); ?>,<?php } } ?> id: id, name: name, edit_id: edit_id, badgeid: badgeid }, function(result){ });

	}

});
</script>

<div class="textdisepearDataRank">

	<div class="disepearDataRank">
	
		<?php 
		$queryEditRank = mysql_query("SELECT * FROM ranks WHERE id = '".$core->ExploitRetainer($_GET['id'])."'");
		$editRank = mysql_fetch_array($queryEditRank);
		?>

		<div class="insideContainer space" style="font-family: Ubuntu, Arial; display: table;">
			
			<div class="localOverlowTitleSecond"><ubuntu><?php echo $editRank['name']; ?> <?php echo $language['edit']; ?></ubuntu></div>
				
			<br><br>
			
			<label><ubuntu><?php echo $language['manager_rank_rankname']; ?></ubuntu></label>
				
			<br>
		
			<input type="text" id="edit_rank_name" value="<?php echo $editRank['name']; ?>">
            
            <label><ubuntu><?php echo $language['manager_rank_rankid']; ?></ubuntu></label>
				
			<br>
		
			<input type="text" id="edit_rank_id" value="<?php echo $editRank['id']; ?>">
            
            <label><ubuntu><?php echo $language['manager_rank_rankbadgeid']; ?></ubuntu></label>
				
			<br>
		
			<input type="text" id="edit_rank_badgeid" value="<?php echo $editRank['badgeid']; ?>">
            
            <br><br>

    		<input type="hidden" name="rank" id="rankId" value="<?php echo $core->ExploitRetainer($_GET['id']); ?>" />
            
    		<input type="hidden" name="type" id="rankType" value="rank" />
    
    		<?php
			for($i = 0; $i < $columns; $i++){ 
    			if(mysql_field_name($permissionq,$i)<>"rank"){
    		?>
    
    				<div style="float: left; width: 224px; padding-top:2px; padding-bottom:2px;padding-left: 5px; padding-right: 5px;border: 1px solid #C7C7C7;background-color:#F0F0F0;border-radius: 5px;margin: 3px 3px 3px 3px;">
    
    					<label style="font-size: 12px;"><ubuntu><?php echo mysql_field_name($permissionq,$i);?></ubuntu></label>:<br>
                        
    					<select type="text" name="<?php echo mysql_field_name($permissionq,$i);?>" id="Rank<?php echo mysql_field_name($permissionq,$i);?>">
                        
    						<option value="0" <?php if($permission[mysql_field_name($permissionq,$i)]=="0") echo 'selected'; ?>><?php echo $language['no']; ?></option>
                            
    						<option value="1" <?php if($permission[mysql_field_name($permissionq,$i)]=="1") echo 'selected'; ?>><?php echo $language['yes']; ?></option>
                            
    					</select>  
    
    				</div>    
    
			<?php }
			
			} ?>  
            
        </div>
		
		<a class="overlowButton backToRankSecond" style="text-shadow: none; margin-top: 10px; margin-left: 0px; float: right;">
										
			<b><u class="overlowButtonText" style="">
													
				<i><ubuntu><?php echo $language['submit']; ?></ubuntu></i>
													
			</u></b>
														
			<div></div>
													
		</a> 
		
		<a class="overlowButton backToRankNoSave" style="text-shadow: none; margin-top: 10px; margin-left: 0px; float: left;">
										
			<b><u class="overlowButtonText" style="">
													
				<i><ubuntu><?php echo $language['stop']; ?></ubuntu></i>
													
			</u></b>
														
			<div></div>
													
		</a> 
		
	</div>
	
</div>

<?php } ?>