<?php if($core->ExploitRetainer($users->UserPermission('cms_manager_login', $username))){ if($core->ExploitRetainer($users->UserPermission('cms_manager_alert', $username))){
	$queryAutoCompleteAlert = mysql_query("SELECT * FROM users ORDER BY username DESC");
?>

<script>
$(document).ready(function(){
	
	$("input.alertToWhoUser").autocomplete({
		source: [<?php while($autoCompleteAlert = mysql_fetch_array($queryAutoCompleteAlert)){ ?> "<?php echo $autoCompleteAlert['username']; ?>",<?php } ?>]
	});
	
	$('.alertGoTo').click(function(){
		var id = $(this).attr('id');
		$('.chooseAlertType').hide("slide", { direction: "left" }, 800, function(){
			$('.alertContainer' + id).show("slide", { direction: "left" }, 800);
		});
	});
	
	$('.cancelSendAlert').click(function(){
		var id = $(this).attr('id');
		$('.alertContainer' + id).hide("slide", { direction: "left" }, 800, function(){
			$('.chooseAlertType').show("slide", { direction: "left" }, 800);
		});
	});
	
	$('.alertToWho').change(function(){
		var id = $(this).attr('id');
		if($(this).val() == 'user'){
			$('.alertToWhoUserContainer' + id).fadeIn();
		}else{
			$('.alertToWhoUserContainer' + id).fadeOut();
		}
	});
	
	$('.submitSendAlert').click(function(){
		var id = $(this).attr('id');
		buttonText('class', 'submitSendAlert' + id, '<?php echo $language["loading"]; ?>');
		sendAlert(id);
	});
	
});

function sendAlert(id){
	
	var who = $('.alertToWho' + id).val();
	var who_user = $('.alertToWhoUser' + id).val();
	var message = $('.alertMessage' + id).val();
	
	$.post("<?php echo HOST; ?>/manager/alert/" + id, { who: who, who_user: who_user, message: message }, function(data){
		buttonText('class', 'submitSendAlert' + id, 'Opslaan');
		if(data == 1){
			$('.alertContainer').append('<div class="alert alert-success" style="display: none;"><b>Voltooid!</b> De alert is succesvol verzonden.</div>');
			$('.containerAlert .alertContainer .alert-success').slideDown(function(){
				setTimeout(function(){ $('.containerAlert .alertContainer .alert-success').slideUp(function(){ $(this).remove(); }); }, 3000);
			});
			$('.alertContainer' + id).hide("slide", { direction: "left" }, 800, function(){
				$('.chooseAlertType').show("slide", { direction: "left" }, 800);
			});
		}
			
		if(data == 0){
			$('.alertContainer').append('<div class="alert alert-error" style="display: none;"><b>Onvoltooid!</b> De alert is niet succesvol verzonden.</div>');
			$('.containerAlert .alertContainer .alert-error').slideDown(function(){
				setTimeout(function(){ $('.containerAlert .alertContainer .alert-error').slideUp(function(){ $(this).remove(); }); }, 3000);
			});
		}
	});
	
}
</script>

<div class="container containerAlert" style="display: none;">
            
    <div class="navigation">
                
    	Alert <small>Even iemand iets laten weten.</small>
                
   	</div>
                
  	<div class="catagorize">
                
      	<div class="inside">
                
          	<div class="icon home"></div> 
                        
          	<div  class="text"><div class="sizer">Startpagina</div> <div class="arrow"></div> <div class="sizer">Alert</div></div>
                        
         	<div class="dateCata">
                    
             	<div class="icon calendar white"></div>
                            
                <div class="text"><?php echo strftime('%A', time()).' '.@date('d, Y - H:i', time()); ?></div>
                        
            </div>
                
      	</div>
                    
   	</div>
    
    <div class="alertContainer">
	
		<div class="alert alert-info"><b>Info!</b> Het is niet de bedoeling dat je allerlei alerts gaat sturen met iedere keer de zelfde informatie erin. De mensen die niet online zijn geweest in die tijd krijgen dan een overlading met alerts. Wij werken aan een systeem dat na 3 dagen automatisch de alert verwijderd, maar tot die tijd. Doe het rustig aan en verzend geen alerts met iedere keer het zelfde erin of met informatie die al ooit verteld is.</div>
	
	</div>
    
    <div class="boxContainer green chooseAlertType">
    
    	<div class="boxHeader"><div class="text">Alert sturen</div></div>
        
        <div class="buttonContainer">
        
        	<input type="submit" class="button green alertGoTo" id="Site" value="Alert op de site" />
            
            <input type="submit" class="button blue alertGoTo" id="Hotel" value="Alert in het hotel" />
        
        </div>
        
    </div>
    
    <div class="boxContainer green alertContainerSite" style="display: none;">
    
    	<div class="boxHeader"><div class="text">Alert op de site sturen</div></div>
        
        <div class="text">
        
        	<label>Naar wie?</label>
        	<select class="select alertToWho alertToWhoSite" id="Site">
					
				<option value="everyone"><?php echo $language['manager_give_everyone']; ?></option>
                <option value="vips"><?php echo $language['manager_give_vips']; ?></option>
                <option value="user_online"><?php echo $language['manager_give_user_online']; ?></option>
                <option value="user"><?php echo $language['manager_give_user']; ?></option>
				
			</select>
            
            <div class="alertToWhoUserContainerSite" style="display: none; margin-top: -20px; margin-bottom: -20px;">
            
                <br /><br />
                
                <label>Gebruiker</label>
                <input type="text" class="input alertToWhoUser alertToWhoUserSite" id="Site" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="">
            
            </div>
            
            <br /><br />
        
        	<label>Het bericht</label>
    		<input type="text" class="input alertMessage alertMessageSite" id="Site" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="">
        
        </div>
        
        <div class="buttonContainer">
        
        	<input type="submit" class="button green submitSendAlert submitSendAlertSite" id="Site" value="Geven" />
            
            <input type="submit" class="button cancelSendAlert" id="Site" value="Afbreken" />
        
        </div>
        
    </div>
    
    <div class="boxContainer green alertContainerHotel" style="display: none;">
    
    	<div class="boxHeader"><div class="text">Alert in het sturen</div></div>
        
        <div class="text">
        
        	<label>Naar wie?</label>
        	<select class="select alertToWho alertToWhoHotel" id="Hotel">
					
				<option value="everyone"><?php echo $language['manager_give_everyone']; ?></option>
                <option value="user"><?php echo $language['manager_give_user']; ?></option>
				
			</select>
            
            <div class="alertToWhoUserContainerHotel" style="display: none; margin-top: -20px; margin-bottom: -20px;">
            
                <br /><br />
                
                <label>Gebruiker</label>
                <input type="text" class="input alertToWhoUser alertToWhoUserHotel" id="Hotel" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="">
            
            </div>
            
            <br /><br />
        
        	<label>Het bericht</label>
    		<input type="text" class="input alertMessage alertMessageHotel" id="Hotel" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="">
        
        </div>
        
        <div class="buttonContainer">
        
        	<input type="submit" class="button green submitSendAlert submitSendAlertHotel" id="Hotel" value="Geven" />
            
            <input type="submit" class="button cancelSendAlert" id="Hotel" value="Afbreken" />
        
        </div>
        
    </div>
            
</div>

<?php } }else{ header("Location: ".HOST.""); } ?>
   