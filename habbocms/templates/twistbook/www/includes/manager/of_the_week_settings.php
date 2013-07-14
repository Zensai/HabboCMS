<?php if($core->ExploitRetainer($users->UserPermission('cms_manager_login', $username))){ if($core->ExploitRetainer($users->UserPermission('cms_manager_of_the_week', $username))){ ?>

<script>
$(document).ready(function(){
	$('.submitOfTheWeekSettings').click(function(){
		buttonText('class', 'submitOfTheWeekSettings', '<?php echo $language["loading"]; ?>');
		updateOfTheWeekSettings();
	});
	
});

function updateOfTheWeekSettings() {
	
	var music_of_the_week = $('.ofTheWeekSettingsMusic').val();
	var video_of_the_week = $('.ofTheWeekSettingsVideo').val();
	$.post("<?php echo HOST; ?>/manager/ofTheWeek/update", { music_of_the_week: music_of_the_week, video_of_the_week: video_of_the_week }, function(data){
		
		buttonText('class', 'submitOfTheWeekSettings', '<?php echo $language["submit"]; ?>');
		if(data == 1){
			$('.alertContainer').append('<div class="alert alert-success" style="display: none;"><?php echo $language["manager_settings_saved"]; ?></div>');
			$('.containerOfTheWeekSettings .alertContainer .alert-success').slideDown(function(){
				setTimeout(function(){ $('.containerOfTheWeekSettings .alertContainer .alert-success').slideUp(function(){ $(this).remove(); }); }, 3000);
			});
		}
			
		if(data == 0){
			$('.alertContainer').append('<div class="alert alert-error" style="display: none;"><?php echo $language["manager_settings_saved_failed"]; ?></div>');
			$('.containerOfTheWeekSettings .alertContainer .alert-error').slideDown(function(){
				setTimeout(function(){ $('.containerOfTheWeekSettings .alertContainer .alert-error').slideUp(function(){ $(this).remove(); }); }, 3000);
			});
		}
		
	});
	
}
</script>

<div class="container containerOfTheWeekSettings" style="display: none;">
            
    <div class="navigation">
                
    	<?php echo $language["manager_weekly"]; ?> <small><?php echo $language["manager_weekly_sub"]; ?></small>
                
   	</div>
                
  	<div class="catagorize">
                
      	<div class="inside">
                
          	<div class="icon home"></div> 
                        
          	<div  class="text"><div class="sizer"><?php echo $language["manager_menu_dashboard"]; ?></div> <div class="arrow"></div> <div class="sizer"><?php echo $language["manager_menu_weekly"]; ?></div></div>
                        
         	<div class="dateCata">
                    
             	<div class="icon calendar white"></div>
                            
                <div class="text"><?php echo strftime('%A', time()).' '.@date('d, Y - H:i', time()); ?></div>
                        
            </div>
                
      	</div>
                    
   	</div>
    
    <div class="alertContainer"></div>
    
    <div class="boxContainer blue">
    
    	<div class="boxHeader"><div class="text"><?php echo $language["manager_weekly_title"]; ?></div></div>
        
        <div class="text">
    	
        	<label><?php echo $language["manager_weekly_music"]; ?></label>
    		<input type="text" class="input ofTheWeekSettingsMusic" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="<?php echo $core->CmsSetting('music_of_the_week'); ?>">
            
            <br /><br />
            
            <label><?php echo $language["manager_weekly_video"]; ?></label>
    		<input type="text" class="input ofTheWeekSettingsVideo" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="<?php echo $core->CmsSetting('video_of_the_week'); ?>">
            
        </div>
        
        <div class="buttonContainer">
            
            <input type="submit" class="button blue submitOfTheWeekSettings" value="<?php echo $language["submit"]; ?>" />
            
        </div>
        
    </div>
            
</div>

<?php } }else{ header("Location: ".HOST.""); } ?>
   