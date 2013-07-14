<?php if($core->ExploitRetainer($users->UserPermission('cms_manager_login', $username))){ if($core->ExploitRetainer($users->UserPermission('cms_manager_dj_panel', $username))){ ?>

<script>
$(document).ready(function(){
	$('.deleteContactDJ').click(function(){
		var id = $(this).attr('id');
		deleteContactDJ(id);
	});
});

function deleteContactDJ(id){
	
	$.post("<?php echo HOST; ?>/manager/delete/dj/contact", { id: id }, function(data){
		if(data == 1){
			$('.alertContainer').append('<div class="alert alert-success" style="display: none;"><b>Voltooid!</b> Je hebt succesvol het bericht verwijderd.</div>');
			$('.containerDjPanel .alertContainer .alert-success').slideDown(function(){
				setTimeout(function(){ $('.containerDjPanel .alertContainer .alert-success').slideUp(function(){ $(this).remove(); }); }, 3000);
			});
			$('.djContact'+ id).fadeOut();
		}
			
		if(data == 0){
			$('.alertContainer').append('<div class="alert alert-error" style="display: none;"><b>Onvoltooid!</b> Je hebt niet succesvol het bericht verwijderd.</div>');
			$('.containerDjPanel .alertContainer .alert-error').slideDown(function(){
				setTimeout(function(){ $('.containerDjPanel .alertContainer .alert-error').slideUp(function(){ $(this).remove(); }); }, 3000);
			});
		}
	});
	
}
</script>

<div class="container containerDjPanel" style="display: none;">
            
    <div class="navigation">
                
    	DJ Paneel <small>Alle instellingen binnen handbereik</small>
                
   	</div>
                
  	<div class="catagorize">
                
      	<div class="inside">
                
          	<div class="icon home"></div> 
                        
          	<div  class="text"><div class="sizer">Startpagina</div> <div class="arrow"></div> <div class="sizer">DJ Paneel</div></div>
                        
         	<div class="dateCata">
                    
             	<div class="icon calendar white"></div>
                            
                <div class="text"><?php echo strftime('%A', time()).' '.@date('d, Y - H:i', time()); ?></div>
                        
            </div>
                
      	</div>
                    
   	</div>
    
    <div class="alertContainer"></div>
    
    <div class="boxContainer blue">
    
    	<div class="boxHeader"><div class="text">Requests</div></div>
        
        <div class="text" style="max-height: 500px; overflow-y: auto;">
        
        	<table>
                    
               	<tr>
                 	<td><b>Gebruiker</b></td>
                 	<td><b>Type</b></td>
                 	<td><b>Bericht</b></td>
                    <td><b>Verwijderen</b></td>
            	</tr>
                
				<?php
             	$query_dj_contact = mysql_query("SELECT * FROM dj_contact WHERE type = 'request' ORDER BY id DESC LIMIT 200");
				$rank_color = 'grey';
				
              	while($dj_contact = mysql_fetch_array($query_dj_contact)){
             	?>                        
                        
            	<tr class="<?php echo $rank_color; ?> djContact<?php echo $dj_contact['id']; ?>">
                 	<td><?php echo $core->ExploitRetainer($users->UserInfoByID($dj_contact['user_id'], 'username')); ?></td>
                 	<td><?php echo $dj_contact['type']; ?></td>
                 	<td><?php echo $dj_contact['message']; ?></td>  
                    <td><input type="submit" class="button red deleteContactDJ" id="<?php echo $dj_contact['id']; ?>" value="Verwijderen" /></td>
              	</tr>
                        
             	<?php 
              	if($rank_color == 'grey'){ $rank_color = ''; }else{ $rank_color = 'grey'; } }
           		?>
                    
        	</table>
        
        </div>
        
    </div>
    
    <div class="containerSpace"></div>
    
    <div class="boxContainer yellow">
    
    	<div class="boxHeader"><div class="text">Shouts</div></div>
        
        <div class="text" style="max-height: 500px; overflow-y: auto;">
        
        	<table>
                    
               	<tr>
                 	<td><b>Gebruiker</b></td>
                 	<td><b>Type</b></td>
                 	<td><b>Bericht</b></td>
                    <td><b>Verwijderen</b></td>
            	</tr>
                
				<?php
             	$query_dj_contact = mysql_query("SELECT * FROM dj_contact WHERE type = 'shout' ORDER BY id DESC LIMIT 200");
				$rank_color = 'grey';
				
              	while($dj_contact = mysql_fetch_array($query_dj_contact)){
             	?>                        
                        
            	<tr class="<?php echo $rank_color; ?> djContact<?php echo $dj_contact['id']; ?>">
                 	<td><?php echo $core->ExploitRetainer($users->UserInfoByID($dj_contact['user_id'], 'username')); ?></td>
                 	<td><?php echo $dj_contact['type']; ?></td>
                 	<td><?php echo $dj_contact['message']; ?></td>  
                    <td><input type="submit" class="button red deleteContactDJ" id="<?php echo $dj_contact['id']; ?>" value="Verwijderen" /></td>
              	</tr>
                        
             	<?php 
              	if($rank_color == 'grey'){ $rank_color = ''; }else{ $rank_color = 'grey'; } }
           		?>
                    
        	</table>
        
        </div>
        
    </div>
            
</div>

<?php } }else{ header("Location: ".HOST.""); } ?>
   