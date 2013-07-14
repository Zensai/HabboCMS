<?php if($core->ExploitRetainer($users->UserPermission('cms_manager_login', $username))){ if($core->ExploitRetainer($users->UserPermission('cms_manager_give', $username))){
	$queryAutoCompleteGive = mysql_query("SELECT * FROM users ORDER BY username DESC");
?>

<script>
$(document).ready(function(){
	
	$("input.amountGiveUser").autocomplete({
		source: [<?php while($autoCompleteGive = mysql_fetch_array($queryAutoCompleteGive)){ ?> "<?php echo $autoCompleteGive['username']; ?>",<?php } ?>]
	});
	
	$('.submitSearchUser').click(function(){
		searchUsers();
	});
	
	$('.giveButton').click(function(){
		var id = $(this).attr('id');
		$('.chooseMenuGive').hide("slide", { direction: "left" }, 800, function(){
			$('.giveContainer' + id).show("slide", { direction: "left" }, 800);
		});
	});
	
	$('.giveButtonSubmit').click(function(){
		var id = $(this).attr('id');
		buttonText('class', 'giveButtonSubmit' + id, '<?php echo $language["loading"]; ?>');
		giveSomething(id);
	});
	
	$('.amountGiveSelect').change(function(){
		var id = $(this).attr('id');
		if($(this).val() == 'user'){
			$('.amountGiveUserChange' + id).fadeIn();
		}else{
			$('.amountGiveUserChange' + id).fadeOut();
		}
	});
	
	$('.giveButtonSubmitCancel').click(function(){
		var id = $(this).attr('id');
		$('.giveContainer' + id).hide("slide", { direction: "left" }, 800, function(){
			$('.chooseMenuGive').show("slide", { direction: "left" }, 800);
		});
	});
	
});

function giveSomething(id){
	
	var who = $('.amountGiveSelect' + id).val();
	var who_user = $('.amountGiveUser' + id).val();
	var value = $('.amountGive' + id).val();
	
	$.post("<?php echo HOST; ?>/manager/give/" + id, { who: who, who_user: who_user, value: value }, function(data){
		buttonText('class', 'giveButtonSubmit' + id, 'Opslaan');
		if(data == 1){
			$('.alertContainer').append('<div class="alert alert-success" style="display: none;"><b>Voltooid!</b> Je hebt succesvol ' + id + ' gegeven.</div>');
			$('.containerGive .alertContainer .alert-success').slideDown(function(){
				setTimeout(function(){ $('.containerGive .alertContainer .alert-success').slideUp(function(){ $(this).remove(); }); }, 3000);
			});
			$('.giveContainer' + id).hide("slide", { direction: "left" }, 800, function(){
				$('.chooseMenuGive').show("slide", { direction: "left" }, 800);
			});
		}
			
		if(data == 0){
			$('.alertContainer').append('<div class="alert alert-error" style="display: none;"><b>Onvoltooid!</b> Je hebt niet succesvol ' + id + ' gegeven.</div>');
			$('.containerGive .alertContainer .alert-error').slideDown(function(){
				setTimeout(function(){ $('.containerGive .alertContainer .alert-error').slideUp(function(){ $(this).remove(); }); }, 3000);
			});
		}
	});
	
}
</script>

<div class="container containerGive" style="display: none;">
            
    <div class="navigation">
                
    	Geven <small>Een gebruiker wat geven</small>
                
   	</div>
                
  	<div class="catagorize">
                
      	<div class="inside">
                
          	<div class="icon home"></div> 
                        
          	<div  class="text"><div class="sizer">Startpagina</div> <div class="arrow"></div> <div class="sizer">Geven</div></div>
                        
         	<div class="dateCata">
                    
             	<div class="icon calendar white"></div>
                            
                <div class="text"><?php echo strftime('%A', time()).' '.@date('d, Y - H:i', time()); ?></div>
                        
            </div>
                
      	</div>
                    
   	</div>
    
    <div class="alertContainer"></div>
    
    <div class="boxContainer yellow chooseMenuGive">
    
    	<div class="boxHeader"><div class="text">Credits, pixels, diamanten of febbies geven</div></div>
        
        <div class="buttonContainer">
            
            <input type="submit" class="button yellow giveButton" id="Credits" value="Credits" />
            
            <input type="submit" class="button green giveButton" id="Pixels" value="Pixels" />
            
            <input type="submit" class="button blue giveButton" id="Crystals" value="Diamanten" />
            
            <input type="submit" class="button red giveButton" id="Eventpoints" value="Febbies" />
            
        </div>
        
    </div>
    
    <div class="boxContainer yellow giveContainerCredits" style="display: none;">
    
    	<div class="boxHeader"><div class="text">Credits geven</div></div>
        
        <div class="text">
        
        	<label>Naar wie?</label>
        	<select class="select amountGiveSelect amountGiveSelectCredits" id="Credits">
					
				<option value="everyone"><?php echo $language['manager_give_everyone']; ?></option>
                <option value="vips"><?php echo $language['manager_give_vips']; ?></option>
                <option value="user_online"><?php echo $language['manager_give_user_online']; ?></option>
                <option value="user"><?php echo $language['manager_give_user']; ?></option>
				
			</select>
            
            <div class="amountGiveUserChangeCredits" style="display: none; margin-top: -20px; margin-bottom: -20px;">
            
                <br /><br />
                
                <label>Gebruiker</label>
                <input type="text" class="input amountGiveUserCredits amountGiveUser" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="">
            
            </div>
            
            <br /><br />
        
        	<label>Hoeveel</label>
    		<input type="text" class="input amountGiveCredits" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="">
        
        </div>
        
        <div class="buttonContainer">
            
            <input type="submit" class="button yellow giveButtonSubmit giveButtonSubmitCredits" id="Credits" value="Geven" />
            
            <input type="submit" class="button giveButtonSubmitCancel" id="Credits" value="Afbreken" />
            
        </div>
        
    </div>
    
    <div class="boxContainer yellow giveContainerPixels" style="display: none;">
    
    	<div class="boxHeader"><div class="text">Pixels geven</div></div>
        
        <div class="text">
        
        	<label>Naar wie?</label>
        	<select class="select amountGiveSelect amountGiveSelectPixels" id="Pixels">
					
				<option value="everyone"><?php echo $language['manager_give_everyone']; ?></option>
                <option value="vips"><?php echo $language['manager_give_vips']; ?></option>
                <option value="user_online"><?php echo $language['manager_give_user_online']; ?></option>
                <option value="user"><?php echo $language['manager_give_user']; ?></option>
				
			</select>
            
            <div class="amountGiveUserChangePixels" style="display: none; margin-top: -20px; margin-bottom: -20px;">
            
                <br /><br />
                
                <label>Gebruiker</label>
                <input type="text" class="input amountGiveUserPixels amountGiveUser" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="">
            
            </div>
            
            <br /><br />
        
        	<label>Hoeveel</label>
    		<input type="text" class="input amountGivePixels" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="">
        
        </div>
        
        <div class="buttonContainer">
            
            <input type="submit" class="button yellow giveButtonSubmit giveButtonSubmitPixels" id="Pixels" value="Geven" />
            
            <input type="submit" class="button giveButtonSubmitCancel" id="Pixels" value="Afbreken" />
            
        </div>
        
    </div>
    
    <div class="boxContainer yellow giveContainerCrystals" style="display: none;">
    
    	<div class="boxHeader"><div class="text">Diamanten geven</div></div>
        
        <div class="text">
        
        	<label>Naar wie?</label>
        	<select class="select amountGiveSelect amountGiveSelectCrystals" id="Crystals">
					
				<option value="everyone"><?php echo $language['manager_give_everyone']; ?></option>
                <option value="vips"><?php echo $language['manager_give_vips']; ?></option>
                <option value="user_online"><?php echo $language['manager_give_user_online']; ?></option>
                <option value="user"><?php echo $language['manager_give_user']; ?></option>
				
			</select>
            
            <div class="amountGiveUserChangeCrystals" style="display: none; margin-top: -20px; margin-bottom: -20px;">
            
                <br /><br />
                
                <label>Gebruiker</label>
                <input type="text" class="input amountGiveUserCrystals amountGiveUser" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="">
            
            </div>
            
            <br /><br />
        
        	<label>Hoeveel</label>
    		<input type="text" class="input amountGiveCrystals" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="">
        
        </div>
        
        <div class="buttonContainer">
            
            <input type="submit" class="button yellow giveButtonSubmit giveButtonSubmitCrystals" id="Crystals" value="Geven" />
            
            <input type="submit" class="button giveButtonSubmitCancel" id="Crystals" value="Afbreken" />
            
        </div>
        
    </div>
    
    <div class="boxContainer yellow giveContainerEventpoints" style="display: none;">
    
    	<div class="boxHeader"><div class="text">Febbies geven</div></div>
        
        <div class="text">
        
        	<label>Naar wie?</label>
        	<select class="select amountGiveSelect amountGiveSelectEventpoints" id="Eventpoints">
					
				<option value="everyone"><?php echo $language['manager_give_everyone']; ?></option>
                <option value="vips"><?php echo $language['manager_give_vips']; ?></option>
                <option value="user_online"><?php echo $language['manager_give_user_online']; ?></option>
                <option value="user"><?php echo $language['manager_give_user']; ?></option>
				
			</select>
            
            <div class="amountGiveUserChangeEventpoints" style="display: none; margin-top: -20px; margin-bottom: -20px;">
            
                <br /><br />
                
                <label>Gebruiker</label>
                <input type="text" class="input amountGiveUserEventpoints amountGiveUser" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="">
            
            </div>
            
            <br /><br />
        
        	<label>Hoeveel</label>
    		<input type="text" class="input amountGiveEventpoints" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="">
        
        </div>
        
        <div class="buttonContainer">
            
            <input type="submit" class="button yellow giveButtonSubmit giveButtonSubmitEventpoints" id="Eventpoints" value="Geven" />
            
            <input type="submit" class="button giveButtonSubmitCancel" id="Eventpoints" value="Afbreken" />
            
        </div>
        
    </div>
            
</div>

<?php } }else{ header("Location: ".HOST.""); } ?>
   