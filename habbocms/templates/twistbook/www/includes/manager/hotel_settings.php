<?php if($core->ExploitRetainer($users->UserPermission('cms_manager_login', $username))){ if($core->ExploitRetainer($users->UserPermission('cms_manager_hotel', $username))){ ?>

<script>
$(document).ready(function(){
	$('.submitHotelSettings').click(function(){
		buttonText('class', 'submitHotelSettings', '<?php echo $language["loading"]; ?>');
		updateGeneralHotelSettings();
	});
	
	$('.submitClientSettings').click(function(){
		buttonText('class', 'submitClientSettings', '<?php echo $language["loading"]; ?>');
		updateClientHotelSettings();
	});
});

function updateGeneralHotelSettings() {
	
	var cms_name = $('.hotelSettingsName').val();
	var cms_url = $('.hotelSettingsLink').val();
	var cms_maintenance = $('.hotelSettingsMaintenance').val();
	var client_status = $('.hotelSettingsStatus').val();
	var cms_announcement = $('.hotelSettingsAnnouncement').val();
	var cms_sollicitation = $('.hotelSollicitationStatus').val();
	var cms_theme = $('.hotelTheme').val();
	$.post("<?php echo HOST; ?>/manager/hotel/update", { type: 'general', cms_name: cms_name, cms_url: cms_url, cms_maintenance: cms_maintenance, client_status: client_status, cms_announcement: cms_announcement, cms_sollicitation: cms_sollicitation, cms_theme: cms_theme }, function(data){
		
		buttonText('class', 'submitHotelSettings', '<?php echo $language["submit"]; ?>');
		if(data == 1){
			$('.alertContainer').append('<div class="alert alert-success" style="display: none;"><?php echo $language["manager_settings_saved"]; ?></div>');
			$('.containerHotelSettings .alertContainer .alert-success').slideDown(function(){
				setTimeout(function(){ $('.containerHotelSettings .alertContainer .alert-success').slideUp(function(){ $(this).remove(); }); }, 3000);
			});
		}
			
		if(data == 0){
			$('.alertContainer').append('<div class="alert alert-error" style="display: none;"><?php echo $language["manager_settings_saved_failed"]; ?></div>');
			$('.containerHotelSettings .alertContainer .alert-error').slideDown(function(){
				setTimeout(function(){ $('.containerHotelSettings .alertContainer .alert-error').slideUp(function(){ $(this).remove(); }); }, 3000);
			});
		}
		
	});
	
}

function updateClientHotelSettings() {
	
	var client_port = $('.clientSettingsPort').val();
	var client_mus = $('.clientSettingsMUS').val();
	var client_ip = $('.clientSettingsIP').val();
	var client_variables = $('.clientSettingsVariables').val();
	var client_texts = $('.clientSettingsTexts').val();
	var client_swf = $('.clientSettingsSwf').val();
	var client_habbo_swf = $('.clientSettingsHabbo').val();
	$.post("<?php echo HOST; ?>/manager/hotel/update", { type: 'client', client_port: client_port, client_mus: client_mus, client_ip: client_ip, client_variables: client_variables, client_texts: client_texts, client_swf: client_swf, client_habbo_swf: client_habbo_swf }, function(data){
		
		buttonText('class', 'submitClientSettings', '<?php echo $language["submit"]; ?>');
		if(data == 1){
			$('.alertContainer2').append('<div class="alert alert-success" style="display: none;"><?php echo $language["manager_settings_saved"]; ?></div>');
			$('.containerHotelSettings .alertContainer2 .alert-success').slideDown(function(){
				setTimeout(function(){ $('.containerHotelSettings .alertContainer2 .alert-success').slideUp(function(){ $(this).remove(); }); }, 3000);
			});
		}
			
		if(data == 0){
			$('.alertContainer2').append('<div class="alert alert-error" style="display: none;"><?php echo $language["manager_settings_saved_failed"]; ?></div>');
			$('.containerHotelSettings .alertContainer2 .alert-error').slideDown(function(){
				setTimeout(function(){ $('.containerHotelSettings .alertContainer2 .alert-error').slideUp(function(){ $(this).remove(); }); }, 3000);
			});
		}
		
	});
	
}
</script>

<div class="container containerHotelSettings" style="display: none;">
            
    <div class="navigation">
                
    	<?php echo $language["manager_hotel_settings"]; ?> <small><?php echo $language["manager_hotel_settings_sub"]; ?></small>
                
   	</div>
                
  	<div class="catagorize">
                
      	<div class="inside">
                
          	<div class="icon home"></div> 
                        
          	<div  class="text"><div class="sizer"><?php echo $language["manager_menu_dashboard"]; ?></div> <div class="arrow"></div> <div class="sizer"><?php echo $language["manager_menu_hotelsettings"]; ?></div></div>
                        
         	<div class="dateCata">
                    
             	<div class="icon calendar white"></div>
                            
                <div class="text"><?php echo strftime('%A', time()).' '.@date('d, Y - H:i', time()); ?></div>
                        
            </div>
                
      	</div>
                    
   	</div>
    
    <div class="alertContainer"></div>
    
    <div class="boxContainer blue">
    
    	<div class="boxHeader"><div class="text"><?php echo $language["manager_hotel_settings_general"]; ?></div></div>
        
        <div class="text">
    	
        	<label><?php echo $language["manager_hotel_settings_general_hotelname"]; ?></label>
    		<input type="text" class="input hotelSettingsName" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="<?php echo $core->CmsSetting('cms_name'); ?>">
            
            <br /><br />
            
            <label><?php echo $language["manager_hotel_settings_general_hotellink"]; ?></label>
    		<input type="text" class="input hotelSettingsLink" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="<?php echo $core->CmsSetting('cms_url'); ?>">
            
            <br /><br />
            
            <label><?php echo $language["manager_hotel_settings_general_maintenance"]; ?></label>
            <select class="select hotelSettingsMaintenance">
				<option <?php if($core->CmsSetting('cms_maintenance') == '0'){ echo 'selected=selected'; } ?> value="0"><?php echo $language['no']; ?></option>
				<option <?php if($core->CmsSetting('cms_maintenance') == '1'){ echo 'selected=selected'; } ?> value="1"><?php echo $language['yes']; ?></option>
			</select>
            
            <br /><br />
            
            <label><?php echo $language["manager_hotel_settings_client_status"]; ?></label>
            <select class="select hotelSettingsStatus">
				<option <?php if($core->CmsSetting('client_status') == 'open'){ echo 'selected=selected'; } ?> value="open"><?php echo $language['manager_hotel_settings_client_open']; ?></option>
				<option <?php if($core->CmsSetting('client_status') == 'closed'){ echo 'selected=selected'; } ?> value="closed"><?php echo $language['manager_hotel_settings_client_closed']; ?></option>
			</select>
			
			<br><br>
			
			<label><?php echo $language["manager_hotel_settings_staffapps"]; ?></label>
            <select class="select hotelSollicitationStatus">
				<option <?php if($core->CmsSetting('cms_sollicitation') == '1'){ echo 'selected=selected'; } ?> value="1"><?php echo $language["manager_hotel_settings_staffapps_open"]; ?></option>
				<option <?php if($core->CmsSetting('cms_sollicitation') == '0'){ echo 'selected=selected'; } ?> value="0"><?php echo $language["manager_hotel_settings_staffapps_closed"]; ?></option>
			</select>
            
            <br /><br />
            
            <label><?php echo $language["manager_hotel_settings_general_hotel_cms_announcement"]; ?></label>
    		<input type="text" class="input hotelSettingsAnnouncement" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="<?php echo $core->CmsSetting('cms_announcement'); ?>">
			
			<br><br>
			
			<label><?php echo $language["manager_hotel_settings_theme"]; ?></label>
            <select class="select hotelTheme">
				<option <?php if($core->CmsSetting('cms_theme') == 'general'){ echo 'selected=selected'; } ?> value="general"><?php echo $language["manager_hotel_settings_theme_normal"]; ?></option>
				<option <?php if($core->CmsSetting('cms_theme') == 'love'){ echo 'selected=selected'; } ?> value="love"><?php echo $language["manager_hotel_settings_theme_love"]; ?></option>
				<option <?php if($core->CmsSetting('cms_theme') == 'easter'){ echo 'selected=selected'; } ?> value="easter"><?php echo $language["manager_hotel_settings_theme_easter"]; ?></option>
			</select>
            
        </div>
        
        <div class="buttonContainer">
            
            <input type="submit" class="button blue submitHotelSettings" value="<?php echo $language["submit"]; ?>" />
            
        </div>
    
    </div>
    
    <div class="containerSpace"></div>
    
    <div class="alertContainer2"></div>
    
    <div class="boxContainer yellow">
    
    	<div class="boxHeader"><div class="text"><?php echo $language["manager_hotel_settings_client"]; ?></div></div>
        
        <div class="text">
        
        	<label><?php echo $language["manager_hotel_settings_client_port"]; ?></label>
    		<input type="text" class="input clientSettingsPort" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="<?php echo $core->CmsSetting('client_port'); ?>">
            
            <br /><br />
        
        	<label><?php echo $language["manager_hotel_settings_client_mus"]; ?></label>
    		<input type="text" class="input clientSettingsMUS" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="<?php echo $core->CmsSetting('client_mus'); ?>">
            
            <br /><br />
        
        	<label><?php echo $language["manager_hotel_settings_client_ip"]; ?></label>
    		<input type="text" class="input clientSettingsIP" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="<?php echo $core->CmsSetting('client_ip'); ?>">
            
            <br /><br />
        
        	<label><?php echo $language["manager_hotel_settings_client_variables"]; ?></label>
    		<input type="text" class="input clientSettingsVariables" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="<?php echo $core->CmsSetting('client_variables'); ?>">
            
            <br /><br />
        
        	<label><?php echo $language["manager_hotel_settings_client_texts"]; ?></label>
    		<input type="text" class="input clientSettingsTexts" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="<?php echo $core->CmsSetting('client_texts'); ?>">
            
            <br /><br />
        
        	<label><?php echo $language["manager_hotel_settings_client_swf"]; ?></label>
    		<input type="text" class="input clientSettingsSwf" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="<?php echo $core->CmsSetting('client_swf'); ?>">
            
            <br /><br />
        
        	<label><?php echo $language["manager_hotel_settings_client_habbo_swf"]; ?></label>
    		<input type="text" class="input clientSettingsHabbo" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="<?php echo $core->CmsSetting('client_habbo_swf'); ?>">
        
        </div>
        
        <div class="buttonContainer">
            
            <input type="submit" class="button yellow submitClientSettings" value="<?php echo $language["submit"]; ?>" />
            
        </div>
        
    </div>
            
</div>

<?php } }else{ header("Location: ".HOST.""); } ?>
   