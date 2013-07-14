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

if($core->ExploitRetainer($users->UserPermission('cms_manager_login', $username))){ if($core->ExploitRetainer($users->UserPermission('cms_manager_users', $username))){ 

$user_id = $core->ExploitRetainer($_POST['user_id']);
?>

<script>
$(document).ready(function() {
	
	$('.cancelUserEdit').click(function(){
		backToSecondUsers();
	});
	
	$('.submitUserEdit').click(function(){
		buttonText('class', 'submitUserEdit', '<?php echo $language["loading"]; ?>');
		submitEditUser();
	});
	
});

function backToSecondUsers(){
	
	$('.containmentUserSearchresults').hide("slide", { direction: 'left' }, 800, function(){
		$.post("<?php echo HOST; ?>/manager/search/user", { user_id: '<?php echo $user_id; ?>' }, function(data){
			$('.containmentUserSearchresults').html(data);
			$('.containmentUserSearchresults').show("slide", { direction: 'left' }, 800);
		});
	});
	
}

function submitEditUser(){
	
	var motto = $('.userEditMotto').val();
	var mail = $('.userEditMail').val(); 
	var vip = $('.userEditVip').val();
	var rank = $('.userEditRank').val();
	var credits = $('.userEditCredits').val();
	var pixels = $('.userEditPixels').val();
	var vip_points = $('.userEditEventpoints').val();
	var crystals = $('.userEditCrystals').val();
	$.post("<?php echo HOST; ?>/manager/user/edit", { id: '<?php echo $core->ExploitRetainer($users->UserInfo($user_id, 'id')); ?>', motto: motto, mail: mail, vip: vip, rank: rank, credits: credits, pixels: pixels, vip_points: vip_points }, function(data){
		
		buttonText('class', 'submitUserEdit', '<?php echo $language["submit"]; ?>');
		$('.containmentUserSearchresults').hide("slide", { direction: 'left' }, 800);
		if(data == 1){
			$('.alertContainer').append('<div class="alert alert-success" style="display: none;"><?php echo $language["manager_settings_saved"]; ?></div>');
			$('.containerUsers .alertContainer .alert-success').slideDown(function(){
				setTimeout(function(){ $('.containerUsers .alertContainer .alert-success').slideUp(function(){ $(this).remove(); }); }, 3000);
			});
		}
		if(data == 0){
			$('.alertContainer').append('<div class="alert alert-error" style="display: none;"><?php echo $language["manager_settings_saved_failed"]; ?></div>');
			$('.containerUsers .alertContainer .alert-error').slideDown(function(){
				setTimeout(function(){ $('.containerUsers .alertContainer .alert-error').slideUp(function(){ $(this).remove(); }); }, 3000);
			});
		}
		
	});
	
}
</script>

<div class="containerSpace"></div>

<div class="boxContainer green usersContainmentSearchedFade">
        
    <div class="boxHeader"><div class="text"><?php echo str_replace('{username}', $user_id, $language["manager_users_widget"]); ?></div></div>
            
   	<div class="text">
    
    	<img align="left" style="margin-right: -70px;" src="http://www.habbo.com/habbo-imaging/avatarimage?figure=<?php echo $core->ExploitRetainer($users->UserInfo($user_id, 'look')); ?>&head_direction=3.gif">
            
        <label><?php echo $language["manager_users_edit_username"]; ?></label>
    	<input type="text" class="input userEditName" disabled placeholder="Vul hier wat in" value="<?php echo $core->ExploitRetainer($users->UserInfo($user_id, 'username')); ?>">
            
      	<br /><br />
         
        <label><?php echo $language["manager_users_edit_motto"]; ?></label>
    	<input type="text" class="input userEditMotto" placeholder="Vul hier wat in" value="<?php echo $core->ExploitRetainer($users->UserInfo($user_id, 'motto')); ?>">
        
        <br /><br />
         
        <label><?php echo $language["manager_users_edit_mail"]; ?></label>
    	<input type="text" class="input userEditMail" placeholder="Vul hier wat in" value="<?php echo $core->ExploitRetainer($users->UserInfo($user_id, 'mail')); ?>">
        
        <br><br>
        
        <label><?php echo $language["manager_users_edit_vip"]; ?></label>
        <select class="select userEditVip">
			<option <?php if($core->ExploitRetainer($users->UserInfo($user_id, 'vip')) == '0'){ echo 'selected=selected'; } ?> value="0"><?php echo $language['no']; ?></option>
			<option <?php if($core->ExploitRetainer($users->UserInfo($user_id, 'vip')) == '1'){ echo 'selected=selected'; } ?> value="1"><?php echo $language['yes']; ?></option>
		</select>
        
        <br><Br>
        
        <label><?php echo $language["manager_users_edit_rank"]; ?></label>
        <select class="select userEditRank" style="background-color: #FFFFFF;">
					
			<?php 
			$queryEditUserRank = mysql_query("SELECT * FROM ranks ORDER BY id LIMIT 20");
			while($editUserRank = mysql_fetch_array($queryEditUserRank)){
			?>
					
				<option <?php if($core->ExploitRetainer($users->UserInfo($user_id, 'rank')) == $editUserRank['id']){ echo 'selected'; } ?> value="<?php echo $editUserRank['id']; ?>"><?php echo $editUserRank['name']; ?></option>
					
			<?php } ?>
				
		</select>
        
        <br /><br />
         
        <label><?php echo $language["manager_users_edit_credits"]; ?></label>
    	<input type="text" class="input userEditCredits" placeholder="Vul hier wat in" value="<?php echo $core->ExploitRetainer($users->UserInfo($user_id, 'credits')); ?>">
        
        <br /><br />
         
        <label><?php echo $language["manager_users_edit_pixels"]; ?></label>
    	<input type="text" class="input userEditPixels" placeholder="Vul hier wat in" value="<?php echo $core->ExploitRetainer($users->UserInfo($user_id, 'activity_points')); ?>">
        
        <br /><br />
         
        <label><?php echo $language["manager_users_edit_points"]; ?></label>
    	<input type="text" class="input userEditEventpoints" placeholder="Vul hier wat in" value="<?php echo $core->ExploitRetainer($users->UserInfo($user_id, 'vip_points')); ?>">
		
   	</div>
    
    <div class="buttonContainer">
            
        <input type="submit" class="button green submitUserEdit" value="<?php echo $language["submit"]; ?>" />
        
        <input type="submit" class="button cancelUserEdit" value="<?php echo $language["stop"]; ?>" />
            
    </div>
            
</div>

<?php } } ?>