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

$query_user_check = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '".$user_id."'"));
if($query_user_check == 0){ return 0; }
?>

<script>
$(document).ready(function() {
	
	$('.userEditFirst').click(function(){
		editUser();
	});
	
});

function editUser(){
	
	$('.containmentUserSearchresults').hide("slide", { direction: 'left' }, 800, function(){
		$.post("<?php echo HOST; ?>/manager/edit/user", { user_id: '<?php echo $user_id; ?>' }, function(data){
			$('.containmentUserSearchresults').html(data);
			$('.containmentUserSearchresults').show("slide", { direction: 'left' }, 800);
		});
	});
		
}
</script>

<div class="containerSpace"></div>

<div class="boxContainer green usersContainmentSearchedFade">
        
    <div class="boxHeader"><div class="text"><?php echo str_replace('{username}', $user_id, $language["manager_users_result"]); ?></b></div></div>
            
   	<div class="text">
            
  		<div class="userSearchresultBox">
        
        	<img align="left" src="http://www.habbo.com/habbo-imaging/avatarimage?figure=<?php echo $core->ExploitRetainer($users->UserInfo($user_id, 'look')); ?>&head_direction=3.gif">
            
            <div class="information" style="display: table;">
            
            	<div class="username"><?php echo $core->ExploitRetainer($users->UserInfo($user_id, 'username')); ?></div><br>
                <b><?php echo $language["manager_users_reg_ip"]; ?>:</b> <?php echo $core->ExploitRetainer($users->UserInfo($user_id, 'ip_reg')); ?><br>
                <b><?php echo $language["manager_users_last_ip"]; ?>:</b> <?php echo $core->ExploitRetainer($users->UserInfo($user_id, 'ip_last')); ?><br>
                <b><?php echo $language["manager_users_last_online"]; ?>:</b> <?php echo @date("d-m-Y, H:i", $core->ExploitRetainer($users->UserInfo($user_id, 'last_online'))); ?><br>
                <b><?php echo $language["manager_users_last_sso"]; ?>:</b> <br><?php echo $core->ExploitRetainer($users->UserInfo($user_id, 'auth_ticket')); ?>
            
            </div>
        
        </div>
                
   	</div>
    
    <div class="buttonContainer">
            
        <input type="submit" class="button green userEditFirst" value="<?php echo $language["manager_users_edit"]; ?>" />
        
        <a href="<?php echo HOST; ?>/home/<?php echo $core->ExploitRetainer($users->UserInfo($user_id, 'id')); ?>" target="new"><input type="submit" class="button blue userHomepage" value="<?php echo $language["manager_users_viewhome"]; ?>" /></a>
            
    </div>
            
</div>

<?php } } ?>