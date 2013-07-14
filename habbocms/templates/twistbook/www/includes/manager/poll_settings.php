<?php if($core->ExploitRetainer($users->UserPermission('cms_manager_login', $username))){ if($core->ExploitRetainer($users->UserPermission('cms_manager_poll', $username))){ ?>

<script>
$(document).ready(function(){
	$('.submitPollSettingsWithReset').click(function(){
		buttonText('class', 'submitPollSettings', '<?php echo $language["loading"]; ?>');
		updatePollSettings('withReset');
	});
	
	$('.submitPollSettingsWithoutReset').click(function(){
		buttonText('class', 'submitPollSettings', '<?php echo $language["loading"]; ?>');
		updatePollSettings('withoutReset');
	});
});

function updatePollSettings(type) {

	var question = $('.pollSettingsQuestion').val();
	var answerOne = $('.pollSettingsAnswer1').val();
	var answerTwo = $('.pollSettingsAnswer2').val();
	$.post("<?php echo HOST; ?>/manager/poll/update/" + type, {  question: question, answerOne: answerOne, answerTwo: answerTwo }, function(data){
		
		buttonText('class', 'submitPollSettings', 'Opslaan');
		if(data == 1){
			$('.alertContainer').append('<div class="alert alert-success" style="display: none;"><?php echo $language["manager_settings_saved"]; ?></div>');
			$('.containerPollSettings .alertContainer .alert-success').slideDown(function(){
				setTimeout(function(){ $('.containerPollSettings .alertContainer .alert-success').slideUp(function(){ $(this).remove(); }); }, 3000);
			});
		}
			
		if(data == 0){
			$('.alertContainer').append('<div class="alert alert-error" style="display: none;"><?php echo $language["manager_settings_saved_failed"]; ?></div>');
			$('.containerPollSettings .alertContainer .alert-error').slideDown(function(){
				setTimeout(function(){ $('.containerPollSettings .alertContainer .alert-error').slideUp(function(){ $(this).remove(); }); }, 3000);
			});
		}
		
	});
	
}
</script>

<div class="container containerPollSettings" style="display: none;">
            
    <div class="navigation">
                
    	<?php echo $language["manager_poll"]; ?> <small><?php echo $language["manager_poll_sub"]; ?></small>
                
   	</div>
                
  	<div class="catagorize">
                
      	<div class="inside">
                
          	<div class="icon home"></div> 
                        
          	<div class="text"><div class="sizer"><?php echo $language["manager_menu_dashboard"]; ?></div> <div class="arrow"></div> <div class="sizer"><?php echo $language["manager_menu_poll"]; ?></div></div>
                        
         	<div class="dateCata">
                    
             	<div class="icon calendar white"></div>
                            
                <div class="text"><?php echo strftime('%A', time()).' '.@date('d, Y - H:i', time()); ?></div>
                        
            </div>
                
      	</div>
                    
   	</div>
    
    <div class="alertContainer"></div>
    
    <div class="boxContainer purple">
    
    	<div class="boxHeader"><div class="text"><?php echo $language["manager_poll_title"]; ?></div></div>
        
        <div class="text">
    	
        	<label><?php echo $language["manager_poll_question"]; ?></label>
    		<input type="text" class="input pollSettingsQuestion" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="<?php echo $core->Poll('question'); ?>">
            
            <br /><br />
            
            <label><?php echo $language["manager_poll_option1"]; ?></label>
    		<input type="text" class="input pollSettingsAnswer1" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="<?php echo $core->Poll('answerOne'); ?>">
            
            <br /><br />
            
            <label><?php echo $language["manager_poll_option2"]; ?></label>
    		<input type="text" class="input pollSettingsAnswer2" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="<?php echo $core->Poll('answerTwo'); ?>">
            
        </div>
        
        <div class="buttonContainer">
            
            <input type="submit" class="button purple submitPollSettingsWithReset" value="<?php echo $language["manager_poll_save_with_reset"]; ?>" />
            <input type="submit" class="button purple submitPollSettingsWithoutReset" value="<?php echo $language["manager_poll_save_without_reset"]; ?>" />
            
        </div>
        
    </div>
            
</div>

<?php } }else{ header("Location: ".HOST.""); } ?>
   