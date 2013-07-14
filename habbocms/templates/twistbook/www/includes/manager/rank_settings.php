<?php if($core->ExploitRetainer($users->UserPermission('cms_manager_login', $username))){ if($core->ExploitRetainer($users->UserPermission('cms_manager_rank', $username))){ ?>

<script>
$(document).ready(function() {
	
    $('.deleteRank').click(function(){
		var id = $(this).attr('id');
		deleteRank(id);
	});
	
	$('.editRank').click(function(){
		var id = $(this).attr('id');
		editRank(id);
	});
	
	$('.addRankButton').click(function(){
		if($('.addRankContainer').is(":hidden")){
			$('.addRankContainer').slideDown();
		}else{
			$('.addRankContainer').slideUp();
		}
	});
	
	$('.submitAddRankCancel').click(function(){
		$('.addRankContainer').slideUp();
	});
	
	$('.submitAddRank').click(function(){
		addRank();
	});
	
});

function deleteRank(id){

	$.post("<?php echo HOST; ?>/manager/rank/delete", { id: id }, function(data){ 
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
		
		$('.containerRank' + id).fadeOut();
	});

}

function addRank(){
	
	var add_rank_name = $('.rankAddName').val();
	var add_rank_id = $('.rankAddId').val();
	var add_rank_badgeid = $('.rankAddBadge').val();
	
	$.post("<?php echo HOST; ?>/manager/rank/add", { add_rank_name: add_rank_name, add_rank_id: add_rank_id, add_rank_badgeid: add_rank_badgeid }, function(data){ 
		$('.addRankContainer').slideUp(function(){
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
	});
	
}

function editRank(id){
	
	$('.containmentOverlookRank').hide("slide", { direction: 'left' }, 800, function(){
		$.post("<?php echo HOST; ?>/manager/edit/rank", { id: id }, function(data){
			$('.containmentOverlookRank').html(data);
			$('.containmentOverlookRank').show("slide", { direction: 'left' }, 800);
		});
	});
	
}

function rankGoToSecond(){
	$('.containmentOverlookRank').hide("slide", { direction: 'left' }, 800, function(){
		$.post("<?php echo HOST; ?>/manager/second/rank", function(data){
			$('.containmentOverlookRank').html(data);
			$('.containmentOverlookRank').show("slide", { direction: 'left' }, 800);
		});
	});
} 
</script>

<div class="container containerRangSettings" style="display: none;">
            
    <div class="navigation">
                
    	<?php echo $language["manager_ranks"]; ?> <small><?php echo $language["manager_ranks_sub"]; ?></small>
                
   	</div>
                
  	<div class="catagorize">
                
      	<div class="inside">
                
          	<div class="icon home"></div> 
                        
          	<div  class="text"><div class="sizer"><?php echo $language["manager_menu_dashboard"]; ?></div> <div class="arrow"></div> <div class="sizer"><?php echo $language["manager_menu_rank"]; ?></div></div>
                        
         	<div class="dateCata">
                    
             	<div class="icon calendar white"></div>
                            
                <div class="text"><?php echo strftime('%A', time()).' '.@date('d, Y - H:i', time()); ?></div>
                        
            </div>
            
            <div class="dateCata addRankButton" style="background-color: #4B8DF8; margin-right:0px; cursor: pointer;">
                            
                <div class="text"><?php echo $language["manager_ranks_new"]; ?></div>
                        
            </div>
                
      	</div>
                    
   	</div>
    
    <div class="boxContainer blue addRankContainer" style="margin-bottom: 20px; display: none;">
    
    	<div class="boxHeader"><div class="text"><?php echo $language["manager_ranks_new_title"]; ?></div></div>
        
        <div class="text">
        
        	<label><?php echo $language["manager_ranks_caption"]; ?></label>
    		<input type="text" class="input rankAddName" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="">
            
            <br /><br />
            
            <label><?php echo $language["manager_ranks_id"]; ?></label>
    		<input type="text" class="input rankAddId" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="">
            
            <br /><br />
            
            <label><?php echo $language["manager_ranks_badge"]; ?></label>
    		<input type="text" class="input rankAddadge" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="">
        
        </div>
        
        <div class="buttonContainer">
            
            <input type="submit" class="button blue submitAddRank" value="<?php echo $language["submit"]; ?>" />
            
            <input type="submit" class="button submitAddRankCancel" value="<?php echo $language["stop"]; ?>" />
            
        </div>
        
    </div>
    
    <div class="alertContainer"></div>
    
    <div class="containmentOverlookRank">
    
        <div class="boxContainer red">
        
            <div class="boxHeader"><div class="text"><?php echo $language["manager_ranks_title"]; ?></div></div>
            
            <div class="text">
            
                <table>
                
                    <tr>
                        <td><b><?php echo $language["manager_ranks_caption"]; ?></b></td>
                        <td><b><?php echo $language["manager_ranks_actions"]; ?></b></td>
                    </tr>
                    
                    <?php 
                    $query_manager_rank = mysql_query("SELECT * FROM ranks ORDER BY id");
                    $rank_color = 'grey';
                    while($manager_rank = mysql_fetch_array($query_manager_rank)){
                    ?>
                    
                    <tr class="<?php echo $rank_color; ?> containerRank<?php echo $manager_rank['id']; ?>">
                        <td><?php echo $manager_rank['name']; ?></td>
                        <td><input type="submit" class="button green editRank" id="<?php echo $manager_rank['id']; ?>" value="<?php echo $language["manager_ranks_edit"]; ?>" /> <input type="submit" class="button red deleteRank" id="<?php echo $manager_rank['id']; ?>" value="<?php echo $language["manager_ranks_delete"]; ?>" /></td>
                    </tr>
                    
                    <?php if($rank_color == 'grey'){ $rank_color = ''; }else{ $rank_color = 'grey'; } ?>
                    
                    <?php } ?>
                
                </table>
                
            </div>
            
        </div>
    
    </div>
            
</div>

<?php } }else{ header("Location: ".HOST.""); } ?>
   