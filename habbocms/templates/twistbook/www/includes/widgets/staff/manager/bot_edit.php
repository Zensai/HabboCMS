<?php

/*

	##############################################################################################################################
	#	     	                                                                                                          	     #
	#		01010101010101                                                                                                       #
	#		10101010101010                                                                                                       #
	#	    	 1010                                                                                                            #
	#	     	 0101 1010   0101   1010 0101  010101010  10101010101010 01010101010    101010101   101010101  010    101        #
	#	     	 1010 0101   1010   0101 1010 01010101010 01010101010101 101010101010  10101010101 10101010101 101   101         #
	#	      	 0101 1010   0101   1010      1010             0101      0101     1010 0101   1010 0101   1010 010  101          #
	#	     	 1010 0101   1010   0101 1010  101010101       1010      101010101010  1010   0101 1010   0101 1010101           #
	#	     	 0101  0101  0101  0101  0101   010101010      0101      01010101010   0101   1010 0101   1010 0101010           #
	#	     	 1010   01010101010101   1010        0101      1010      1010     0101 1010   0101 1010   0101 101  010          #
	#	    	 0101    010101010101    0101  010101010       0101      0101010101010 01010101010 01010101010 010   010         #
	#	     	 1010     0101010101     1010 010101010        1010      101010101010   010101010   010101010  101    010        #
	#	                                           	                                                                    	     #
	#												 © TwistbookCMS Made by Tonny												 #
	#					     					This content is protected by Copyright										     #
	#	                                                                                                  	             	     #
	##############################################################################################################################

*/

define('USER', TRUE); 
define('ACCOUNT', TRUE);
define('MAINTENANCE', TRUE);
include("../../../../includes/inc.global.php");

if($core->ExploitRetainer($users->UserPermission('cms_manager_login', $username))){ if($core->ExploitRetainer($users->UserPermission('cms_manager_bots', $username))){ 

$id = $core->ExploitRetainer($_POST['id']);

$bot = mysql_fetch_array(mysql_query("SELECT * FROM bots WHERE id = '".$id."'"));
?>

<script>
$(document).ready(function() {
	
	$('.cancelBotEdit').click(function(){
		backToSecondBots();
	});
	
	$('.submitBotEdit').click(function(){
		buttonText('class', 'submitBotEdit', 'Laden...');
		submitEditBot();
	});
	
	$('.deleteBot').click(function(){
		buttonText('class', 'deleteBot', 'Laden...');
		deleteBot();
	});
	
});

function backToSecondBots(){
	
	$('.containmentUserBotsSearchresults').hide("slide", { direction: 'left' }, 800, function(){
		$.post("<?php echo HOST; ?>/manager/search/user-bots", { user_id: '<?php echo $core->ExploitRetainer($users->UserInfoByID($bot['user_id'], 'username')); ?>' }, function(data){
			$('.containmentUserBotsSearchresults').html(data);
			$('.containmentUserBotsSearchresults').show("slide", { direction: 'left' }, 800);
		});
	});
	
}

function submitEditBot(){
	
	var id = '<?php echo $id; ?>';
	var room_id = $('.botEditRoom').val();
	var name = $('.botEditName').val();
	var motto = $('.botEditMotto').val();
	var look = $('.botEditLook').val();
	var x = $('.botEditX').val();
	var y = $('.botEditY').val();
	var z = $('.botEditZ').val();
	var rotation = $('.botEditRotation').val();
	var walk_mode = $('.botEditWalkMode').val();						
	$.post("<?php echo HOST; ?>/manager/submit/edit/bot", { id: id, room_id: room_id, name: name, motto: motto, look: look, x: x, y: y, z: z, rotation: rotation, walk_mode: walk_mode }, function(data){
		
		buttonText('class', 'submitBotEdit', 'Opslaan');
		if(data == 1){
			$('.alertContainer').append('<div class="alert alert-success" style="display: none;"><b>Voltooid!</b> De bot is succesvol opgeslagen en gewijzigd.</div>');
			$('.containerBots .alertContainer .alert-success').slideDown(function(){
				setTimeout(function(){ $('.containerBots .alertContainer .alert-success').slideUp(function(){ $(this).remove(); }); }, 1500);
			});
		
			$('.containmentUserBotsSearchresults').hide("slide", { direction: 'left' }, 800, function(){
				$.post("<?php echo HOST; ?>/manager/search/user-bots", { user_id: '<?php echo $core->ExploitRetainer($users->UserInfoByID($bot['user_id'], 'username')); ?>' }, function(dat){
					$('.containmentUserBotsSearchresults').html(dat);
					$('.containmentUserBotsSearchresults').show("slide", { direction: 'left' }, 800);
				});
			});
		}
		if(data == 0){
			$('.alertContainer').append('<div class="alert alert-error" style="display: none;"><b>Onvoltooid!</b> De bot is niet succesvol opgeslagen en gewijzigd.</div>');
			$('.containerBots .alertContainer .alert-error').slideDown(function(){
				setTimeout(function(){ $('.containerBots .alertContainer .alert-error').slideUp(function(){ $(this).remove(); }); }, 1500);
			});
		}
		
	});
	
}

function deleteBot(){
	
	$.post("<?php echo HOST; ?>/manager/submit/delete/bot", { id: '<?php echo $id; ?>' }, function(data){
		buttonText('class', 'deleteBot', 'Verwijderen');
		if(data == 1){
			$('.alertContainer').append('<div class="alert alert-success" style="display: none;"><b>Voltooid!</b> De bot is succesvol verwijderd.</div>');
			$('.containerBots .alertContainer .alert-success').slideDown(function(){
				setTimeout(function(){ $('.containerBots .alertContainer .alert-success').slideUp(function(){ $(this).remove(); }); }, 1500);
			});
		
			$('.containmentUserBotsSearchresults').hide("slide", { direction: 'left' }, 800, function(){
				$.post("<?php echo HOST; ?>/manager/search/user-bots", { user_id: '<?php echo $core->ExploitRetainer($users->UserInfoByID($bot['user_id'], 'username')); ?>' }, function(dat){
					$('.containmentUserBotsSearchresults').html(dat);
					$('.containmentUserBotsSearchresults').show("slide", { direction: 'left' }, 800);
				});
			});
		}
		if(data == 0){
			$('.alertContainer').append('<div class="alert alert-error" style="display: none;"><b>Onvoltooid!</b> De bot is niet succesvol verwijderd.</div>');
			$('.containerBots .alertContainer .alert-error').slideDown(function(){
				setTimeout(function(){ $('.containerBots .alertContainer .alert-error').slideUp(function(){ $(this).remove(); }); }, 1500);
			});
		}
	});
	
}
</script>

<div class="containerSpace"></div>

<div class="boxContainer red usersContainmentSearchedFade">
        
    <div class="boxHeader"><div class="text"><b><?php echo $bot['name']; ?></b> wijzigen</div></div>
            
   	<div class="text">
    
    	<img align="left" style="margin-right: -70px;" src="http://www.habbo.com/habbo-imaging/avatarimage?figure=<?php echo $bot['look']; ?>&head_direction=3.gif">
            
        <label>Naam</label>
    	<input type="text" class="input botEditName" placeholder="Vul hier wat in" value="<?php echo $bot['name']; ?>">
            
      	<br /><br />
         
        <label>Motto</label>
    	<input type="text" class="input botEditMotto" placeholder="Vul hier wat in" value="<?php echo $bot['motto']; ?>">
        
        <br /><br />
         
        <label>Look</label>
    	<input type="text" class="input botEditLook" placeholder="Vul hier wat in" value="<?php echo $bot['look']; ?>">
        
        <br><br>
        
        <label>Kamer</label>
        <select class="select botEditRoom">
           	<?php 
			$query_search_rooms = mysql_query("SELECT * FROM rooms WHERE owner = '".$core->ExploitRetainer($users->UserInfoByID($bot['user_id'], 'username'))."' ORDER BY id");
			while($search_rooms = mysql_fetch_array($query_search_rooms)){
			?>
           		<option <?php if($bot['room_id'] == $search_rooms['id']){ echo 'selected'; } ?> value="<?php echo $search_rooms['id']; ?>"><?php echo $search_rooms['caption'] ?></option>
			<?php } ?>
  		</select>
        
        <br><Br>
        
        <label>Loop status</label>
        <select class="select botEditWalkMode">
           	<option <?php if($bot['walk_mode'] == 'stand'){ echo 'selected'; } ?> value="stand"><?php echo $language['shop_bots_walkmode_stand']; ?></option>
           	<option <?php if($bot['walk_mode'] == 'freeroam'){ echo 'selected'; } ?> value="freeroam"><?php echo $language['shop_bots_walkmode_freeroam']; ?></option>
  	 	</select>
        
        <br /><br />
         
        <label>X Positie</label>
    	<input type="text" class="input botEditX" placeholder="Vul hier wat in" value="<?php echo $bot['x']; ?>">
        
        <br /><br />
         
        <label>Y Positie</label>
    	<input type="text" class="input botEditY" placeholder="Vul hier wat in" value="<?php echo $bot['y']; ?>">
        
        <br /><br />
         
        <label>Z Positie</label>
    	<input type="text" class="input botEditZ" placeholder="Vul hier wat in" value="<?php echo $bot['z']; ?>">
        
        <br /><br />
         
        <label>Rotatie</label>
    	<input type="text" class="input botEditRotation" placeholder="Vul hier wat in" value="<?php echo $bot['rotation']; ?>">
		
   	</div>
    
    <div class="buttonContainer">
            
        <input type="submit" class="button red submitBotEdit" value="Opslaan" />
        
        <input type="submit" class="button blue deleteBot" value="Verwijderen" />
        
        <input type="submit" class="button cancelBotEdit" value="Afbreken" />
            
    </div>
            
</div>

<?php } } ?>