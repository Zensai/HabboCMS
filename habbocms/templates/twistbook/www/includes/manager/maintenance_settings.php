<?php if($core->ExploitRetainer($users->UserPermission('cms_manager_login', $username))){ if($core->ExploitRetainer($users->UserPermission('cms_manager_maintenance', $username))){ ?>

<script>
$(document).ready(function(){
	$('.submitMaintenanceSettings').click(function(){
		buttonText('class', 'submitMaintenanceSettings', '<?php echo $language["loading"]; ?>');
		updateMaintenanceSettings();
	});
});

function updateMaintenanceSettings() {
	
	var cms_maintenance_reason = $('.maintenanceSettingsMessage').val();
	$.post("<?php echo HOST; ?>/manager/maintenance/update", { cms_maintenance_reason: cms_maintenance_reason }, function(data){
		
		buttonText('class', 'submitMaintenanceSettings', '<?php echo $language["submit"]; ?>');
		if(data == 1){
			$('.alertContainer').append('<div class="alert alert-success" style="display: none;"><?php echo $language["manager_settings_saved"]; ?></div>');
			$('.containerMaintenanceSettings .alertContainer .alert-success').slideDown(function(){
				setTimeout(function(){ $('.containerMaintenanceSettings .alertContainer .alert-success').slideUp(function(){ $(this).remove(); }); }, 3000);
			});
		}
			
		if(data == 0){
			$('.alertContainer').append('<div class="alert alert-error" style="display: none;"><?php echo $language["manager_settings_saved_failed"]; ?></div>');
			$('.containerMaintenanceSettings .alertContainer .alert-error').slideDown(function(){
				setTimeout(function(){ $('.containerMaintenanceSettings .alertContainer .alert-error').slideUp(function(){ $(this).remove(); }); }, 3000);
			});
		}
		
	});
	
}

</script>

<div class="container containerMaintenanceSettings" style="display: none;">
            
    <div class="navigation">
                
    	<?php echo $language["manager_maintenance"]; ?> <small><?php echo $language["manager_maintenance_sub"]; ?></small>
                
   	</div>
                
  	<div class="catagorize">
                
      	<div class="inside">
                
          	<div class="icon home"></div> 
                        
          	<div  class="text"><div class="sizer"><?php echo $language["manager_menu_dashboard"]; ?></div> <div class="arrow"></div> <div class="sizer"><?php echo $language["manager_menu_maintenance"]; ?></div></div>
                         
         	<div class="dateCata">
                    
             	<div class="icon calendar white"></div>
                            
                <div class="text"><?php echo strftime('%A', time()).' '.@date('d, Y - H:i', time()); ?></div>
                        
            </div>
                
      	</div>
                    
   	</div>

    <div class="alertContainer"></div>
    
    <div class="boxContainer green">
    
    	<div class="boxHeader"><div class="text"><?php echo $language["manager_maintenance_title"]; ?></div></div>
        
        <div class="text">
        
        	<label><?php echo $language["manager_maintenance_reason"]; ?></label>
    		<textarea class="input maintenanceSettingsMessage" style="height: 200px;" placeholder="<?php echo $language["manager_enter_value"]; ?>"><?php echo $core->CmsSetting('cms_maintenance_reason'); ?></textarea>
            
        </div>
        
        <div class="buttonContainer">
            
            <input type="submit" class="button green submitMaintenanceSettings" value="<?php echo $language["submit"]; ?>" />

        </div>
        
    </div>
            
</div>

<?php } }else{ header("Location: ".HOST.""); } ?>
   