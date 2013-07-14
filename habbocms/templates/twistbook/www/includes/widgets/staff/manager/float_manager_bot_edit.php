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

if($users->UserPermission('cms_manager_bots', $username)){
	
	$id = $core->ExploitRetainer($_POST['id']);
	
	$queryEditBot = mysql_query("SELECT * FROM bots WHERE id = '".$id."'");
	$editBot = mysql_fetch_array($queryEditBot);
?>

<script src="<?php echo HOST; ?>/web-gallery/styles/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php echo HOST; ?>/web-gallery/styles/js/ubuntu.font.js" type="text/javascript"></script>
			
<script type="text/javascript">
	Cufon.replace("ubuntu");
</script>

<script>
$(document).ready(function() {
	
	$('.backToBotsSecond').click(function(){
		$('.disepearSearchedBot').hide();
		$('.loadingBotsSettingsSearched3').show();
		var id = '<?php echo $id; ?>';
		var room_id = $('.managerBotRoomId').val();
		var name = $('.managerBotName').val();
		var motto = $('.managerBotMotto').val();
		var look = $('.managerBotLook').val();
		var x = $('.managerBotWalkStartX').val();
		var y = $('.managerBotWalkStartY').val();
		var z = $('.managerBotWalkStartZ').val();
		var rotation = $('.managerBotWalkStartRotation').val();
		var walk_mode = $('.managerBotWalkMode').val();						
		$.post("<?php echo HOST; ?>/manager/bots/submit", { id: id, room_id: room_id, name: name, motto: motto, look: look, x: x, y: y, z: z, rotation: rotation, walk_mode: walk_mode });
		var user = '<?php echo $core->ExploitRetainer($users->UserInfoByID($editBot['user_id'], 'username')); ?>';
		$.post("<?php echo HOST; ?>/manager/bots/search/results/" + user, { user: user }, function(php){
			$('.disepearSearchedBot').html(php);
			$('.loadingBotsSettingsSearched3').hide();
			$('.disepearSearchedBot').show();
		});
	});
	
	$('.backToBotsNoSave').click(function(){
		$('.disepearSearchedBot').hide();
		$('.loadingBotsSettingsSearched3').show();
		var user = '<?php echo $core->ExploitRetainer($users->UserInfoByID($editBot['user_id'], 'username')); ?>';
		$.post("<?php echo HOST; ?>/manager/bots/search/results/" + user, { user: user }, function(php){
			$('.disepearSearchedBot').html(php);
			$('.loadingBotsSettingsSearched3').hide();
			$('.disepearSearchedBot').show();
		});
	});
	
	$('.deleteBotManager').click(function(){
		$('.disepearSearchedBot').hide();
		$('.loadingBotsSettingsSearched3').show();
		$.post("<?php echo HOST; ?>/manager/bots/delete", { id: '<?php echo $id; ?>' });
		var user = '<?php echo $core->ExploitRetainer($users->UserInfoByID($editBot['user_id'], 'username')); ?>';
		$.post("<?php echo HOST; ?>/manager/bots/search/results/" + user, { user: user }, function(php){
			$('.disepearSearchedBot').html(php);
			$('.loadingBotsSettingsSearched3').hide();
			$('.disepearSearchedBot').show();
		});
	});

});
</script>

<div class="textdisepearSearchedUser">

	<div class="loadingBotsSettingsSearched3" style="display: none;"><center><img style="margin-top:80px; margin-bottom: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></center></div>

	<div class="disepearSearchedBot" style="margin-top: -20px;">
    
    	<a class="overlowButton deleteBotManager" style="float: left;margin-top: -45px; margin-left: 60px;">
				
			<b><u>
				
				<div id="onclickOpenDeleteChat" class="overlowIcon close" onmouseover="tooltip.show('<ubuntu><?php echo $language["delete"]; ?></ubuntu>');" onmouseout="tooltip.hide();"></div> 
					
			</u></b>
						
			<div></div>
					
		</a>
        
		<div class="insideContainer space" style="font-family: Ubuntu, Arial; display: table;">

			<img align="right" style="margin-top: -60px;" src="<?php echo $avatarimage_url; ?>?figure=<?php echo $editBot['look']; ?>&direction=4&head_direction=3&gesture=sml">
			
			<div class="localOverlowTitleSecond"><ubuntu><?php echo $editBot['name']; ?> <?php echo $language['edit']; ?></ubuntu></div>
				
			<br><br>
            
            			<div style="font-size: 16px; font-weight: bold;"><ubuntu><?php echo $language['shop_bots_roomid']; ?></ubuntu></div>
            			<select name="room_id" class="managerBotRoomId selectbot">
            				<?php 
							$query_search_rooms = mysql_query("SELECT * FROM rooms WHERE owner = '".$core->ExploitRetainer($users->UserInfoByID($editBot['user_id'], 'username'))."' ORDER BY id");
							while($search_rooms = mysql_fetch_array($query_search_rooms)){
							?>
                        		<option <?php if($editBot['room_id'] == $search_rooms['id']){ echo 'selected'; } ?> value="<?php echo $search_rooms['id']; ?>"><?php echo $search_rooms['caption'] ?></option>
							<?php } ?>
                        </select>
                        <div style="font-size: 11px;"><ubuntu><?php echo $language['shop_bots_roomid_second']; ?></ubuntu></div>
                        
                        <br>
                        
                        <div style="font-size: 16px; font-weight: bold;"><ubuntu><?php echo $language['shop_bots_name']; ?></ubuntu></div>
                        <input type="text" name="name" class="managerBotName"  value="<?php echo $editBot['name']; ?>">
                        <div style="font-size: 11px;"><ubuntu><?php echo $language['shop_bots_name_second']; ?></ubuntu></div>
                        
                        <br>
                        
                        <div style="font-size: 16px; font-weight: bold;"><ubuntu><?php echo $language['shop_bots_motto']; ?></ubuntu></div>
                        <input type="text" name="motto" class="managerBotMotto" value="<?php echo $editBot['motto']; ?>">
                        <div style="font-size: 11px;"><ubuntu><?php echo $language['shop_bots_motto_second']; ?></ubuntu></div>
                        
                        <br>
                        
                        <div style="font-size: 16px; font-weight: bold;"><ubuntu><?php echo $language['shop_bots_look']; ?></ubuntu></div>
                        <input type="text" name="look" class="managerBotLook" value="<?php echo $editBot['look']; ?>">
                        <div style="font-size: 11px;"><ubuntu><?php echo $language['shop_bots_look_second']; ?></ubuntu></div>
                        
                        <br>
                        
                        <div style="font-size: 16px; font-weight: bold;"><ubuntu><?php echo $language['shop_bots_walkmode']; ?></ubuntu></div>
                        <select name="walk_mode" class="managerBotWalkMode selectbot">
                        	<option <?php if($editBot['walk_mode'] == 'stand'){ echo 'selected'; } ?> value="stand"><?php echo $language['shop_bots_walkmode_stand']; ?></option>
                        	<option <?php if($editBot['walk_mode'] == 'freeroam'){ echo 'selected'; } ?> value="freeroam"><?php echo $language['shop_bots_walkmode_freeroam']; ?></option>
                        </select>
                        <div style="font-size: 11px;"><ubuntu><?php echo $language['shop_bots_walkmode_second']; ?></ubuntu></div>
                        
                        <br />
                        
                        <div style="font-size: 16px; font-weight: bold;"><ubuntu><?php echo $language['shop_bots_walkstart_x']; ?></ubuntu></div>
                       	<input type="text" name="x" class="managerBotWalkStartX" value="<?php echo $editBot['x']; ?>">
                        <div style="font-size: 11px;"><ubuntu><?php echo $language['shop_bots_walkstart_x_second']; ?></ubuntu></div>
                            
                        <br>
                            
                        <div style="font-size: 16px; font-weight: bold;"><ubuntu><?php echo $language['shop_bots_walkstart_y']; ?></ubuntu></div>
                      	<input type="text" name="y" class="managerBotWalkStartY" value="<?php echo $editBot['y']; ?>">
                        <div style="font-size: 11px;"><ubuntu><?php echo $language['shop_bots_walkstart_y_second']; ?></ubuntu></div>
                        
                        <br>
                        
                        <div style="font-size: 16px; font-weight: bold;"><ubuntu><?php echo $language['shop_bots_walkstart_z']; ?></ubuntu></div>
                       	 <input type="text" name="z" class="managerBotWalkStartZ" value="<?php echo $editBot['z']; ?>">
                        <div style="font-size: 11px;"><ubuntu><?php echo $language['shop_bots_walkstart_z_second']; ?></ubuntu></div>
                        
                        <br>
                        
                        <div style="font-size: 16px; font-weight: bold;"><ubuntu><?php echo $language['shop_bots_walkstart_rotation']; ?></ubuntu></div>
                       	 <input type="text" name="rotation" class="managerBotWalkStartRotation" value="<?php echo $editBot['rotation']; ?>">
                        <div style="font-size: 11px;"><ubuntu><?php echo $language['shop_bots_walkstart_rotation_second']; ?></ubuntu></div>

		</div>
		
		<a class="overlowButton backToBotsSecond" style="text-shadow: none; margin-top: 10px; margin-left: 0px; float: right;">
									
			<b><u class="overlowButtonText" style="">
										
				<i><ubuntu><?php echo $language['submit']; ?></ubuntu></i>
										
			</u></b>
											
			<div></div>
										
		</a> 
		
		<a class="overlowButton backToBotsNoSave" style="text-shadow: none; margin-top: 10px; margin-left: 0px; float: left;">
                            
			<b><u class="overlowButtonText" style="">
										
				<i><ubuntu><?php echo $language['stop']; ?></ubuntu></i>
										
			</u></b>
											
			<div></div>
										
		</a>
		
	</div>
	
</div>

<?php } ?>