<?php if($core->ExploitRetainer($users->UserPermission('cms_manager_login', $username))){ if($core->ExploitRetainer($users->UserPermission('cms_manager_badge', $username))){
	$queryAutoCompleteBadgeSearch = mysql_query("SELECT * FROM users ORDER BY username DESC");
?>

<script>
$(document).ready(function() {

	$("input.searchBadgeName").autocomplete({
		source: [<?php while($autoCompleteBadgeSearch = mysql_fetch_array($queryAutoCompleteBadgeSearch)){ ?> "<?php echo $autoCompleteBadgeSearch['username']; ?>",<?php } ?>]
	});
	
	$('.submitSearchBadge').click(function(){
		searchBadges();
	});

});

function searchBadges(){
	
	$('.containmentBadgeSearchresults').hide("slide", { direction: 'left' }, 800, function(){
		var user_id = $('.searchBadgeName').val();
		$.post("<?php echo HOST; ?>/manager/search/badge", { user_id: user_id }, function(data){
			$('.containmentBadgeSearchresults').html(data);
			$('.containmentBadgeSearchresults').show("slide", { direction: 'left' }, 800);
		});
	});
	
}
</script>

<div class="container containerBadges" style="display: none;">
            
    <div class="navigation">
                
    	Badges <small>Iemand een badge geven of iemand een badge afnemen?</small>
                
   	</div>
                
  	<div class="catagorize">
                
      	<div class="inside">
                
          	<div class="icon home"></div> 
                        
          	<div  class="text"><div class="sizer">Startpagina</div> <div class="arrow"></div> <div class="sizer">Badges</div></div>
                        
         	<div class="dateCata">
                    
             	<div class="icon calendar white"></div>
                            
                <div class="text"><?php echo strftime('%A', time()).' '.@date('d, Y - H:i', time()); ?></div>
                        
            </div>
                
      	</div>
                    
   	</div>
    
    <div class="alertContainer"></div>
    
    <div class="boxContainer purple">
    
    	<div class="boxHeader"><div class="text">Badges beheren van een gebruiker</div></div>
        
        <div class="text">
        
        	<label>Gebruiker</label>
            <input type="text" class="input searchBadgeName" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="">
        
        </div>
        
        <div class="buttonContainer">
                
            <input type="submit" class="button purple submitSearchBadge" value="Zoeken" />
                
        </div>
        
    </div>
    
    <div class="containmentBadgeSearchresults"></div>
            
</div>

<?php } }else{ header("Location: ".HOST.""); } ?>
   