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

if($core->ExploitRetainer($users->UserPermission('cms_manager_login', $username))){ if($core->ExploitRetainer($users->UserPermission('cms_manager_rank', $username))){ 

$id = $core->ExploitRetainer($_POST['id']);
$query_manager_rank = mysql_query("SELECT * FROM ranks WHERE id = '".$id."'");
$manager_rank = mysql_fetch_array($query_manager_rank);

$permissionq = mysql_query("SELECT * FROM permissions_ranks WHERE rank = '".$id."' LIMIT 1");
$columns = mysql_num_fields($permissionq);
$permission = mysql_fetch_array($permissionq);
$permissionqq = mysql_query("SELECT * FROM ranks WHERE id = '".$id."' LIMIT 1");
$permission_name = mysql_fetch_array($permissionqq);
?>

<script>
$(document).ready(function() {
	
	$('.cancelEditRank').click(function(){
		rankGoToSecond();
	});
	
	$('.submitEditRank').click(function(){
		buttonText('class', 'submitEditRank', '<?php echo $language["loading"]; ?>');
		editRankSubmit();
	});
	
});

function editRankSubmit(){

	<?php for($i = 0; $i < $columns; $i++) { if(mysql_field_name($permissionq,$i)<>"rank"){ ?>

		var <?php echo mysql_field_name($permissionq,$i); ?> = $('#Rank<?php echo mysql_field_name($permissionq,$i); ?>').val();
		
		<?php } } ?>

		var id = '<?php echo $id; ?>';
		var name = $('.rankEditName').val();
		var edit_id = $('.rankEditId').val();
		var badgeid = $('.rankEditBadge').val();

		$.post("<?php echo HOST; ?>/manager/rank/submit/edit", { <?php for($i = 0; $i < $columns; $i++) { if(mysql_field_name($permissionq,$i)<>"rank"){ ?> <?php echo mysql_field_name($permissionq,$i); ?>: <?php echo mysql_field_name($permissionq,$i); ?>,<?php } } ?> id: id, name: name, edit_id: edit_id, badgeid: badgeid }, function(data){
			
		rankGoToSecond();
	
		buttonText('class', 'submitEditRank', '<?php echo $language["submit"]; ?>');
		if(data == 1){
			$('.alertContainer').append('<div class="alert alert-success" style="display: none;"><?php echo $language["manager_settings_saved"]; ?></div>');
			$('.containerRangSettings .alertContainer .alert-success').slideDown(function(){
				setTimeout(function(){ $('.containerRangSettings .alertContainer .alert-success').slideUp(function(){ $(this).remove(); }); }, 3000);
			});
		}
				
		if(data == 0){
			$('.alertContainer').append('<div class="alert alert-error" style="display: none;"><?php echo $language["manager_settings_saved_failed"]; ?></div>');
			$('.containerRangSettings .alertContainer .alert-error').slideDown(function(){
				setTimeout(function(){ $('.containerRangSettings .alertContainer .alert-error').slideUp(function(){ $(this).remove(); }); }, 3000);
			});
		}
	
	});
	
}
</script>

<div class="alertContainer"></div>

<div class="boxContainer red">
        
    <div class="boxHeader"><div class="text"><b><?php echo $manager_rank['name']; ?> | <?php echo $language["manager_ranks_editing"]; ?></b></div></div>
            
   	<div class="text">
    
    	<label><?php echo $language["manager_ranks_caption"]; ?></label>
    	<input type="text" class="input rankEditName" placeholder="Vul hier wat in" value="<?php echo $manager_rank['name']; ?>">
            
        <br /><br />
            
        <label><?php echo $language["manager_ranks_id"]; ?></label>
    	<input type="text" class="input rankEditId" placeholder="Vul hier wat in" value="<?php echo $manager_rank['id']; ?>">
            
        <br /><br />
            
        <label><?php echo $language["manager_ranks_badge"]; ?></label>
    	<input type="text" class="input rankEditBadge" placeholder="Vul hier wat in" value="<?php echo $manager_rank['badgeid']; ?>">
        
        <div class="containmentRanksPermissions" style="display: table; max-width: 894px; width: 100%; padding-top: 20px; margin: auto;">
        
			<?php
            for($i = 0; $i < $columns; $i++){ 
                if(mysql_field_name($permissionq,$i)<>"rank"){
            ?>
        
                    <div style="float: left; width: 280px; padding-top:2px; padding-bottom:2px;padding-left: 5px; padding-right: 5px;border: 1px solid #C7C7C7;background-color:#F0F0F0;margin: 3px 3px 3px 3px;">
        
                        <label style="margin-left: 0px; text-align: left;"><ubuntu><?php echo mysql_field_name($permissionq,$i);?></ubuntu></label> 
                            
                        <select type="text" class="select" name="<?php echo mysql_field_name($permissionq,$i);?>" id="Rank<?php echo mysql_field_name($permissionq,$i);?>">
                            
                            <option value="0" <?php if($permission[mysql_field_name($permissionq,$i)]=="0") echo 'selected'; ?>><?php echo $language['no']; ?></option>
                                
                            <option value="1" <?php if($permission[mysql_field_name($permissionq,$i)]=="1") echo 'selected'; ?>><?php echo $language['yes']; ?></option>
                                
                        </select>  
        
                    </div>    
        
            <?php }
                
            } ?> 
        
        </div>
                
   	</div>
    
    <div class="buttonContainer">
            
        <input type="submit" class="button red submitEditRank" value="<?php echo $language["submit"]; ?>" />
        
        <input type="submit" class="button cancelEditRank" value="<?php echo $language["stop"]; ?>" />
            
    </div>
            
</div>

<?php } } ?>