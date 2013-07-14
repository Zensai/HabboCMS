<?php if($core->ExploitRetainer($users->UserPermission('cms_manager_login', $username))){ if($core->ExploitRetainer($users->UserPermission('cms_manager_users', $username))){

	$queryAutoCompleteUserSearch = mysql_query("SELECT * FROM users ORDER BY username DESC");
?>

<script>
$(document).ready(function() {

	$("input.searchUserName").autocomplete({
		source: [<?php while($autoCompleteUserSearch = mysql_fetch_array($queryAutoCompleteUserSearch)){ ?> "<?php echo $autoCompleteUserSearch['username']; ?>",<?php } ?>]
	});
	
	$('.submitSearchUserFirst').click(function(){
		searchUsers();
	});

});

function searchUsers(){
	
	if($('.containmentUserSearchresults').is(":hidden")){
		var user_id = $('.searchUserName').val();
		$.post("<?php echo HOST; ?>/manager/search/user", { user_id: user_id }, function(data){
			if(data == 0){
				$('.alertContainer').append('<div class="alert alert-error" style="display: none;"><b>Onvoltooid!</b> Deze gebruiker bestaat niet!</div>');
				$('.containerUsers .alertContainer .alert-error').slideDown(function(){
					setTimeout(function(){ $('.containerUsers .alertContainer .alert-error').slideUp(function(){ $(this).remove(); }); }, 3000);
				});
			}else{
				$('.containmentUserSearchresults').html(data);
				$('.containmentUserSearchresults').show("slide", { direction: 'left' }, 800);
			}
		});
	}else{
		$('.containmentUserSearchresults').hide("slide", { direction: 'left' }, 800, function(){
			var user_id = $('.searchUserName').val();
			$.post("<?php echo HOST; ?>/manager/search/user", { user_id: user_id }, function(data){
				if(data == 0){
					$('.alertContainer').append('<div class="alert alert-error" style="display: none;"><b>Onvoltooid!</b> Deze gebruiker bestaat niet!</div>');
					$('.containerUsers .alertContainer .alert-error').slideDown(function(){
						setTimeout(function(){ $('.containerUsers .alertContainer .alert-error').slideUp(function(){ $(this).remove(); }); }, 3000);
					});
				}else{
					$('.containmentUserSearchresults').html(data);
					$('.containmentUserSearchresults').show("slide", { direction: 'left' }, 800);
				}
			});
		});
	}
	
}
</script>

<div class="container containerUsers" style="display: none;">
            
    <div class="navigation">
                
    	<?php echo $language["manager_users"]; ?> <small><?php echo $language["manager_users_sub"]; ?></small>
                
   	</div>
                
  	<div class="catagorize">
                
      	<div class="inside">
                
          	<div class="icon home"></div> 
                        
          	<div  class="text"><div class="sizer"><?php echo $language["manager_menu_dashboard"]; ?></div> <div class="arrow"></div> <div class="sizer"><?php echo $language["manager_menu_users"]; ?></div></div>
                        
         	<div class="dateCata">
                    
             	<div class="icon calendar white"></div>
                            
                <div class="text"><?php echo strftime('%A', time()).' '.@date('d, Y - H:i', time()); ?></div>
                        
            </div>
                
      	</div>
                    
   	</div>
    
    <div class="alertContainer"></div>
    
    <div class="containerIntbodyUsers">
    
        <div class="boxContainer yellow">
        
            <div class="boxHeader"><div class="text"><?php echo $language["manager_users_title"]; ?></div></div>
            
            <div class="text">
            
                <label><?php echo $language["manager_users_username"]; ?></label>
                <input type="text" class="input searchUserName" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="">
            
            </div>
            
            <div class="buttonContainer">
                
                <input type="submit" class="button yellow submitSearchUserFirst" value="<?php echo $language["manager_users_search"]; ?>" />
                
            </div>
            
        </div>
        
        <div class="containmentUserSearchresults"></div>
    
    </div>
            
</div>

<?php } }else{ header("Location: ".HOST.""); } ?>
   