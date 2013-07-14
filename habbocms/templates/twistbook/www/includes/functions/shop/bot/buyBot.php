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

$page = 'add_furniture';

if(isset($_GET['mode']) && $core->ExploitRetainer($_GET['mode']) == 'specified'){

	if(isset($_POST['room_id']) && isset($_POST['name']) && isset($_POST['motto']) && isset($_POST['look']) && isset($_POST['x']) && isset($_POST['y']) && isset($_POST['z']) && isset($_POST['rotation']) && isset($_POST['walk_mode']) && isset($_POST['min_x']) && isset($_POST['min_y']) && isset($_POST['max_x']) && isset($_POST['max_y'])){
		
		$query = mysql_query("INSERT INTO bots (id, room_id, ai_type, name, motto, look, x, y, z, rotation, walk_mode, min_x, min_y, max_x, max_y, user_id) VALUES (NULL, '".$core->ExploitRetainer($_POST['room_id'])."', 'generic', '".$core->ExploitRetainer($_POST['name'])."', '".$core->ExploitRetainer($_POST['motto'])."', '".$core->ExploitRetainer($_POST['look'])."', '".$core->ExploitRetainer($_POST['x'])."', '".$core->ExploitRetainer($_POST['y'])."', '".$core->ExploitRetainer($_POST['z'])."', '".$core->ExploitRetainer($_POST['rotation'])."', '".$core->ExploitRetainer($_POST['walk_mode'])."', '".$core->ExploitRetainer($_POST['min_x'])."', '".$core->ExploitRetainer($_POST['min_y'])."', '".$core->ExploitRetainer($_POST['max_x'])."', '".$core->ExploitRetainer($_POST['max_y'])."', '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."')");
		
		$newValue = $core->ExploitRetainer($users->UserInfo($username, 'vip_points')) -150;
		
		$query = mysql_query("UPDATE users SET vip_points = '".$newValue."' WHERE id = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."'");
		
		$core->MUS('update_bots');
		
	}
	
}

if(isset($_GET['mode']) && $core->ExploitRetainer($_GET['mode']) == 'normal'){
	
	if(isset($_POST['room_id']) && isset($_POST['name']) && isset($_POST['motto']) && isset($_POST['look']) && isset($_POST['x']) && isset($_POST['y']) && isset($_POST['z']) && isset($_POST['rotation']) && isset($_POST['walk_mode'])){
		
		$query = mysql_query("INSERT INTO bots (id, room_id, ai_type, name, motto, look, x, y, z, rotation, walk_mode, user_id) VALUES (NULL, '".$core->ExploitRetainer($_POST['room_id'])."', 'generic', '".$core->ExploitRetainer($_POST['name'])."', '".$core->ExploitRetainer($_POST['motto'])."', '".$core->ExploitRetainer($_POST['look'])."', '".$core->ExploitRetainer($_POST['x'])."', '".$core->ExploitRetainer($_POST['y'])."', '".$core->ExploitRetainer($_POST['z'])."', '".$core->ExploitRetainer($_POST['rotation'])."', '".$core->ExploitRetainer($_POST['walk_mode'])."', '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."')");
		
		$newValue = $core->ExploitRetainer($users->UserInfo($username, 'vip_points')) -150;
		
		$query = mysql_query("UPDATE users SET vip_points = '".$newValue."' WHERE id = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."'");
		
		$core->MUS('update_bots');
		
	}
	
}
?>

<script>
$(document).ready(function() {
    $('#onclickCloseBotShow').click(function() {
		$('#overlowBot').fadeOut();
	});
});
</script>

<div class="container" style="width: 350px;">
		
	<div class="top"></div>
		
	<div id="onclickCloseBotShow" class="closeButton"></div>
		
	<div class="text">
			
		<img style="margin-top: -100px; margin-left: -20px;" align="left" src="http://habbo.com/habbo-imaging/avatarimage?figure=<?php echo $core->ExploitRetainer($_POST['look']); ?>&direction=2&head_direction=3&gesture=sml">
            
        <div style="margin-top: -60px; margin-left: 40px; font-size: 25px; color: #FFFFFF; font-weight: bold;"><ubuntu><?php echo $language['bot_bought']; ?></ubuntu></div>
            
        <div style="margin-top: 50px; font-size: 15px; font-weight: bold;"><ubuntu><?php echo $core->ExploitRetainer($_POST['name']); ?> <?php echo $language['is_bot_done_to_user']; ?></ubuntu></div>
        
        <meta http-equiv="refresh" content="2;url=<?php echo HOST; ?>/settings/bots" />
				
	</div>
		
	<div class="bottom"></div>
		
</div>