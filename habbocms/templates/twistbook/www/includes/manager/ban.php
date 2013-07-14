<?php if($core->ExploitRetainer($users->UserPermission('cms_manager_login', $username))){ if($core->ExploitRetainer($users->UserPermission('cms_manager_ban', $username))){ ?>

<script>
$(document).ready(function(){
	
	$('.removeBan').click(function(){
		var id = $(this).attr('id');
		removeBan(id);
	});
	
	$('.banType').change(function(){
		var value = $(this).val();
		if(value == 'user'){
			$('.whoBan').html('Gebruiker');
		}
		if(value == 'ip'){
			$('.whoBan').html('IP');
		}
	});
	
	$('.addBanButton').click(function(){
		if($('.addBanContainer').is(":hidden")){
			$('.addBanContainer').slideDown();
		}else{
			$('.addBanContainer').slideUp();
		}
	});
	
	$('.submitAddBanCancel').click(function(){
		$('.addBanContainer').slideUp();
	});
	
	$('.submitAddBan').click(function(){
		addBan();
	});
	
});

function removeBan(id){
	
	$.post('<?php echo HOST; ?>/manager/ban/delete/' + id, { id: id }, function(data) {
		if(data == 1){
			$('.alertContainer').append('<div class="alert alert-success" style="display: none;"><b>Voltooid!</b> De ban is succesvol verwijderd.</div>');
			$('.containerBan .alertContainer .alert-success').slideDown(function(){
				setTimeout(function(){ $('.containerBan .alertContainer .alert-success').slideUp(function(){ $(this).remove(); }); }, 3000);
			});
			$('.fadeBan' + id).fadeOut();
		}
			
		if(data == 0){
			$('.alertContainer').append('<div class="alert alert-error" style="display: none;"><b>Onvoltooid!</b> De ban is niet succesvol verwijderd.</div>');
			$('.containerBan .alertContainer .alert-error').slideDown(function(){
				setTimeout(function(){ $('.containerBan .alertContainer .alert-error').slideUp(function(){ $(this).remove(); }); }, 3000);
			});
		}
	});
	
}

function addBan(){
	
	var value = $('.banWho').val();
	var reason = $('.banReason').val();
	var length = $('.banExpire').val();
	var type = $('.banType').val();
	
	$.post("<?php echo HOST; ?>/manager/ban/add", { value: value, reason: reason, length: length, type: type }, function(data){
		if(data == 1){
			$('.alertContainer').append('<div class="alert alert-success" style="display: none;"><b>Voltooid!</b> De ban is succesvol toegevoegd.</div>');
			$('.containerBan .alertContainer .alert-success').slideDown(function(){
				setTimeout(function(){ $('.containerBan .alertContainer .alert-success').slideUp(function(){ $(this).remove(); }); }, 3000);
			});
			$('.addBanContainer').slideUp();
			
			$('.containerRefreshBans').hide("slide", { direction: "left" }, 800, function(){
				$.post("<?php echo HOST; ?>/manager/refresh/ban", function(php){
					$('.replaceRefreshBans').html(php);
					$('.containerRefreshBans').show("slide", { direction: "left" }, 800);
				});
			});
			
		}
			
		if(data == 0){
			$('.alertContainer').append('<div class="alert alert-error" style="display: none;"><b>Onvoltooid!</b> De ban is niet succesvol toegevoegd.</div>');
			$('.containerBan .alertContainer .alert-error').slideDown(function(){
				setTimeout(function(){ $('.containerBan .alertContainer .alert-error').slideUp(function(){ $(this).remove(); }); }, 3000);
			});
		}
	});
	
}
</script>

<style type="text/css">
.removeBan {
	cursor: pointer;
}
</style>

<div class="container containerBan" style="display: none;">
            
    <div class="navigation">
                
    	Ban <small>Een geheel overzicht van alles</small>
                
   	</div>
                
  	<div class="catagorize">
                
      	<div class="inside">
                
          	<div class="icon home"></div> 
                        
          	<div  class="text"><div class="sizer">Startpagina</div> <div class="arrow"></div> <div class="sizer">Ban</div></div>
                        
         	<div class="dateCata">
                    
             	<div class="icon calendar white"></div>
                            
                <div class="text"><?php echo strftime('%A', time()).' '.@date('d, Y - H:i', time()); ?></div>
                        
            </div>
                
      	</div>
                    
   	</div>
    
    <div class="alertContainer">
    
    	<div class="alert alert-info"><b>Info!</b> Je ziet hier een aantal verbannen mensen. Je moet klikken op het type ban om deze ban te verwijderen! <i>Bijvoorbeeld: Gebruiker of IP</i></b></div>
    
    </div>
    
    <div class="containerSpace"></div>

    <div class="boxContainer yellow addBanContainer" style="display: none;">
        
        <div class="boxHeader"><div class="text">Ban toevoegen</div></div>
            
        <div class="text">
            
            <label>Ban type</label>
            <select class="select banType">
            
            	<option value="user">Gebruiker</option>
                <option value="ip">IP</option>
            
            </select>
            
            <Br /><br />
            
            <label class="whoBan">Gebruiker</label>
            <input type="text" class="input banWho" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="">
            
            <Br /><br />
            
            <label>Reden</label>
            <textarea class="input banReason" style="height: 100px;" placeholder="<?php echo $language["manager_enter_value"]; ?>"></textarea>
            
            <br /><br />
            
            <label>Ban duur</label>
            <select class="select banExpire">
            
            	<option value="1800">30 Minuten</option>
                <option value="3600">1 Uur</option>
               	<option value="10800">3 Uur</option>
                <option value="43200">12 Uur</option>
                <option value="86400">1 Dag</option>
                <option value="259200">3 Dagen</option>
                <option value="604800">1 Week</option>
                <option value="1209600">2 Weken</option>
                <option value="2592000">1 Maand</option>
                <option value="7776000">3 Maanden</option>
                <option value="31104000">1 Jaar</option>
                <option value="62208000">2 Jaar</option>
                <option value="360000000">Permanente ban</option>
                
            </select>
            
        </div>
            
        <div class="buttonContainer">
                
            <input type="submit" class="button yellow submitAddBan" value="Toevoegen" />
                    
            <input type="submit" class="button submitAddBanCancel" value="Afbreken" />
                
        </div>
    
    </div>
    
    <div class="containerSpace"></div>
    
    <div class="boxContainer blue containerRefreshBans">
    
    	<div class="boxHeader"><div class="text">Verbannen gebruikers en/of ip's</div></div>
        
        <div class="dateCata addBanButton" style="background-color: #FFB848; margin-right:0px; cursor: pointer; margin-top: -35px; height: 14px;">
                            
         	<div class="text">Ban toevoegen</div>
                        
    	</div>
        
        <div class="text replaceRefreshBans">
        
        	<table>
            
            	<tr>
                	<td><b>Type</b></td>
                    <td><b>Waarde</b></td>
                    <td><b>Reden</b></td>
                    <td><b>Geplaatst op</b></td>
                    <td><b>Verbannen tot</b></td>
                    <td><b>Geplaatst door</b></td>
                </tr>
                
                <?php 
				
				$ban_type = array("user" => "Gebruiker", "ip" => "IP");
				
				$query_bans = mysql_query("SELECT * FROM bans ORDER BY added_date DESC");
				$tr_color = 'grey';
				while($bans = mysql_fetch_array($query_bans)){
				?>
                
                <tr class="<?php echo $tr_color; ?> fadeBan<?php echo $bans['id']; ?>">
                	<td><div class="tooltip removeBan" id="<?php echo $bans['id']; ?>"><?php echo $ban_type[$bans['bantype']]; ?><span>Klik hier om deze ban te verwijderen!</span></div></td>
                    <td><?php echo $bans['value']; ?></td>
                    <td><?php echo $bans['reason']; ?></td>
                    <td><?php echo ucfirst($bans['added_date']); ?></td>
                    <td><?php echo ucfirst(strftime('%A %d %B, %Y - %H:%S', $bans['expire'])); ?></td>
                    <td><?php echo $bans['added_by']; ?></td>
                </tr>
                
                <?php if($tr_color == 'grey'){ $tr_color = ''; }else{ $tr_color = 'grey'; } } ?>
            
            </table>
        
        </div>
        
    </div>
            
</div>

<?php } }else{ header("Location: ".HOST.""); } ?>
   