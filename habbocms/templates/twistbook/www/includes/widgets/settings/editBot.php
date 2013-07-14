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
include("../../../includes/inc.global.php");

echo $Style->General();

$id = $core->ExploitRetainer($_GET['id']);

$query_edit_bot = mysql_query("SELECT * FROM bots WHERE id = '".$id."'");
$edit_bot = mysql_fetch_array($query_edit_bot);
?>

<script>
$(document).ready(function() {

	$("#onclickCloseEditBots").click(function () {
		$("#overlowEditBots").fadeOut();
	});
	
	$(".selectbot").change( function () {
		if($(this).val() == 'specified_range'){
			$('.specified_range_bot').fadeIn();
		}else{
			$('.specified_range_bot').fadeOut();
		}
	});
	
	$('.onclickEditThisBot-').click(function(){
		
		$("#overlowEditBots").html('<center><img style="margin-top: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_habbos.gif"></center>');
	
		var id = '<?php echo $edit_bot['id']; ?>';
		var room_id = $('.botRoomId').val();
		var name = $('.botName').val();
		var motto = $('.botMotto').val();
		var look = $('.botLook').val();
		var x = $('.botWalkStartX').val();
		var y = $('.botWalkStartY').val();
		var z = $('.botWalkStartZ').val();
		var rotation = $('.botWalkStartRotation').val();
		var walk_mode = $('.botWalkMode').val();

									
		$.post("<?php echo HOST; ?>settings/bots/edit/<?php echo $edit_bot['id']; ?>", { id: id, room_id: room_id, name: name, motto: motto, look: look, x: x, y: y, z: z, rotation: rotation, walk_mode: walk_mode }, function (data) {
			window.location = '<?php echo HOST; ?>/settings/bots';
		});
	
	});

});
</script>

<style type="text/css">
#onclickCloseEditBots input {
	background-color: #FFFFFF !important;
}
</style>

	<div class="container" style="width: 530px;">
		
		<div class="top"></div>
		
		<div id="onclickCloseEditBots" class="closeButton"></div>
        
        <div style="margin-top: -20px;"></div>
		
		<div class="text" style="width: 100%; overflow-x: none;">
            
            <img style="margin-top: -125px; margin-left: -20px;" align="left" src="http://habbo.com/habbo-imaging/avatarimage?figure=<?php echo $edit_bot['look']; ?>&direction=2&head_direction=3&gesture=sml">
            
        	<div style="margin-top: -80px; margin-left: 40px; font-size: 25px; color: #FFFFFF; font-weight: bold;"><ubuntu><?php echo $language['edit']; ?> <?php echo $edit_bot['name']; ?></ubuntu></div>
            
        	<div class="insideContainer" style="overflow-x: none;">
            
            	<div style="max-height: 530px; overflow-y: auto; overflow-x: hidden; font-size: 15px; padding-right: 10px;">
                
                	<form method="post" action="<?php echo HOST; ?>/settings/bots/edit/<?php echo $edit_bot['id']; ?>">
                    
                    	<input type="hidden" name="id" value="<?php echo $edit_bot['id']; ?>" />
            
                    	<div style="font-size: 16px; font-weight: bold;"><ubuntu><?php echo $language['shop_bots_roomid']; ?></ubuntu></div>
                        <select name="room_id" class="botRoomId selectbot">
                        	<?php 
							$query_search_rooms = mysql_query("SELECT * FROM rooms WHERE owner = '".$core->ExploitRetainer($users->UserInfo($username, 'username'))."' ORDER BY id");
							while($search_rooms = mysql_fetch_array($query_search_rooms)){
							?>
                        		<option <?php if($edit_bot['room_id'] == $search_rooms['id']){ echo 'selected'; } ?> value="<?php echo $search_rooms['id']; ?>"><?php echo $search_rooms['caption'] ?></option>
							<?php } ?>
                        </select>
                        <div style="font-size: 11px;"><ubuntu><?php echo $language['shop_bots_roomid_second']; ?></ubuntu></div>
                        
                        <br>
                        
                        <div style="font-size: 16px; font-weight: bold;"><ubuntu><?php echo $language['shop_bots_name']; ?></ubuntu></div>
                        <input type="text" name="name" class="botName"  value="<?php echo $edit_bot['name']; ?>">
                        <div style="font-size: 11px;"><ubuntu><?php echo $language['shop_bots_name_second']; ?></ubuntu></div>
                        
                        <br>
                        
                        <div style="font-size: 16px; font-weight: bold;"><ubuntu><?php echo $language['shop_bots_motto']; ?></ubuntu></div>
                        <input type="text" name="motto" class="botMotto" value="<?php echo $edit_bot['motto']; ?>">
                        <div style="font-size: 11px;"><ubuntu><?php echo $language['shop_bots_motto_second']; ?></ubuntu></div>
                        
                        <br>
                        
                        <div style="font-size: 16px; font-weight: bold;"><ubuntu><?php echo $language['shop_bots_look']; ?></ubuntu></div>
                        <input type="text" name="look" class="botLook" value="<?php echo $edit_bot['look']; ?>">
                        <div style="font-size: 11px;"><ubuntu><?php echo $language['shop_bots_look_second']; ?></ubuntu></div>
                        
                        <br>
                        
                        <div style="font-size: 16px; font-weight: bold;"><ubuntu><?php echo $language['shop_bots_walkmode']; ?></ubuntu></div>
                        <select name="walk_mode" class="botWalkMode selectbot">
                        	<option <?php if($edit_bot['walk_mode'] == 'stand'){ echo 'selected'; } ?> value="stand"><?php echo $language['shop_bots_walkmode_stand']; ?></option>
                        	<option <?php if($edit_bot['walk_mode'] == 'freeroam'){ echo 'selected'; } ?> value="freeroam"><?php echo $language['shop_bots_walkmode_freeroam']; ?></option>
                        </select>
                        <div style="font-size: 11px;"><ubuntu><?php echo $language['shop_bots_walkmode_second']; ?></ubuntu></div>
                        
                        <br />
                        
                        <div style="font-size: 16px; font-weight: bold;"><ubuntu><?php echo $language['shop_bots_walkstart_x']; ?></ubuntu></div>
                       	<input type="text" name="x" class="botWalkStartX" value="<?php echo $edit_bot['x']; ?>">
                        <div style="font-size: 11px;"><ubuntu><?php echo $language['shop_bots_walkstart_x_second']; ?></ubuntu></div>
                            
                        <br>
                            
                        <div style="font-size: 16px; font-weight: bold;"><ubuntu><?php echo $language['shop_bots_walkstart_y']; ?></ubuntu></div>
                      	<input type="text" name="y" class="botWalkStartY" value="<?php echo $edit_bot['y']; ?>">
                        <div style="font-size: 11px;"><ubuntu><?php echo $language['shop_bots_walkstart_y_second']; ?></ubuntu></div>
                        
                        <br>
                        
                        <div style="font-size: 16px; font-weight: bold;"><ubuntu><?php echo $language['shop_bots_walkstart_z']; ?></ubuntu></div>
                       	 <input type="text" name="z" class="botWalkStartZ" value="<?php echo $edit_bot['z']; ?>">
                        <div style="font-size: 11px;"><ubuntu><?php echo $language['shop_bots_walkstart_z_second']; ?></ubuntu></div>
                        
                        <br>
                        
                        <div style="font-size: 16px; font-weight: bold;"><ubuntu><?php echo $language['shop_bots_walkstart_rotation']; ?></ubuntu></div>
                       	 <input type="text" name="rotation" class="botWalkStartRotation" value="<?php echo $edit_bot['rotation']; ?>">
                        <div style="font-size: 11px;"><ubuntu><?php echo $language['shop_bots_walkstart_rotation_second']; ?></ubuntu></div>
                        
                        <input type="submit" style="margin-top: 10px;" id="submitDarkBlue" class="submitRight onclickEditThisBot" value="<?php echo $language['submit']; ?>" />
            
            		</form>
            
            	</div>
            
            </div>
            
        </div>
		
		<div class="bottom"></div>
		
	</div>