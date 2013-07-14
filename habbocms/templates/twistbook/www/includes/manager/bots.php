<?php if($core->ExploitRetainer($users->UserPermission('cms_manager_login', $username))){ if($core->ExploitRetainer($users->UserPermission('cms_manager_bots', $username))){

	$queryAutoCompleteUserBotsSearch = mysql_query("SELECT * FROM users ORDER BY username DESC");
?>

<script>
$(document).ready(function() {

	$("input.searchUserNameBots").autocomplete({
		source: [<?php while($autoCompleteUserBotsSearch = mysql_fetch_array($queryAutoCompleteUserBotsSearch)){ ?> "<?php echo $autoCompleteUserBotsSearch['username']; ?>",<?php } ?>]
	});
	
	$('.submitSearchUserBots').click(function(){
		searchUserBots();
	});
	
});

function searchUserBots(){
	
	$('.containmentUserBotsSearchresults').hide("slide", { direction: 'left' }, 800, function(){
		var user_id = $('.searchUserNameBots').val();
		$.post("<?php echo HOST; ?>/manager/search/user-bots", { user_id: user_id }, function(data){
			$('.containmentUserBotsSearchresults').html(data);
			$('.containmentUserBotsSearchresults').show("slide", { direction: 'left' }, 800);
		});
	});
	
}
</script>

<div class="container containerBots" style="display: none;">
            
    <div class="navigation">
                
    	Bots <small>Alle gemaakte bots beheren</small>
                
   	</div>
                
  	<div class="catagorize">
                
      	<div class="inside">
                
          	<div class="icon home"></div> 
                        
          	<div  class="text"><div class="sizer">Startpagina</div> <div class="arrow"></div> <div class="sizer">Bots</div></div>
                        
         	<div class="dateCata">
                    
             	<div class="icon calendar white"></div>
                            
                <div class="text"><?php echo strftime('%A', time()).' '.@date('d, Y - H:i', time()); ?></div>
                        
            </div>
                
      	</div>
                    
   	</div>
    
    <div class="alertContainer"></div>
    
    <div class="boxContainer purple">
    
    	<div class="boxHeader"><div class="text">Van wie wil je de bots beheren?</div></div>
        
        <div class="text">
        
        	<label>Gebruiker</label>
            <input type="text" class="input searchUserNameBots" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="">
        
        </div>
        
        <div class="buttonContainer">
                
            <input type="submit" class="button purple submitSearchUserBots" value="Zoeken" />
                
        </div>
        
    </div>
        
    <div class="containmentUserBotsSearchresults"></div>
            
</div>

<?php } }else{ header("Location: ".HOST.""); } ?>
   