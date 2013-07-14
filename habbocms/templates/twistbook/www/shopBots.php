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
include("includes/inc.global.php");

$menu = 'shop';
$page = 'shop_bots';
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

	<title><?php echo $hotelname; ?> - <?php echo $language['menu_shop_bots']; ?></title>
	<?php echo $Style->General(); ?>

	<?php echo $themeswitcher; ?>

</head>

<div class="overlowContainer" id="overlowBot">
                
   	<center><img style="margin-top: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_habbos.gif"></center>

</div>

<body onkeydown="onKeyDown()">

<?php include("apps/float_includes.php"); ?>
<?php include("apps/system/float_includes.php"); ?>

<?php include("apps/system/header_top.php"); ?>

<div class="reloader"></div>

<div id="container">
	
	<div id="middleContainer">
	
		<?php include("apps/system/container_header.php"); ?>

		<div id="containerMiddle">

			<div id="containerLeft">
                
                <div id="containerSpace"></div>
                
                <?php if($core->ExploitRetainer($users->UserInfo($username, 'vip')) == '1'){ ?>
				
				<div class="boxContainer rounded staffBox">

					<div class="boxHeader left rounded orange"><ubuntu><?php echo $language['menu_shop_bots']; ?></ubuntu></div>
                    
                   	<?php 
					if($core->ExploitRetainer($users->UserInfo($username, 'vip_points')) < 150){
					?>
						<div class="errorMessageOverlow" style="width: 544px;"><?php echo $language['no_enough_febbi_for_bot']; ?></div>
					<?php }elseif($core->ExploitRetainer($users->UserInfo($username, 'vip_points')) > 149){ ?>
                    
                    	<script>
						$(document).ready(function() {
                            $('.botWalkMode').change(function(){
								$('.allBotWalkMode').fadeOut();
								var botWalkMode = $(this).val();
								if(botWalkMode == 'specified_range'){
									$('.specified_range_bot').fadeIn();
								}
							});
							
							$('.buyTheBot').click(function(){
								
								$('#overlowBot').fadeIn();
								
								$('#overlowBot').html('<center><img style="margin-top: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_habbos.gif"></center>');
								
								var room_id = $('.botRoomId').val();
								var name = $('.botName').val();
								var motto = $('.botMotto').val();
								var look = $('.botLook').val();
								var x = $('.botWalkStartX').val();
								var y = $('.botWalkStartY').val();
								var z = $('.botWalkStartZ').val();
								var rotation = $('.botWalkStartRotation').val();
								var walk_mode = $('.botWalkMode').val();
								
								if(walk_mode == 'specified_range'){
									
									$.post("<?php echo HOST; ?>/shop/bots/buy/specified", { room_id: room_id, name: name, motto: motto, look: look, x: x, y: y, z: z, rotation: rotation, walk_mode: walk_mode, min_x: min_x, min_y: min_y, max_x: max_x, max_y: max_y }, function (data) {
										$('#overlowBot').html(data);
									});
									
								}else{
									
									$.post("<?php echo HOST; ?>/shop/bots/buy/normal", { room_id: room_id, name: name, motto: motto, look: look, x: x, y: y, z: z, rotation: rotation, walk_mode: walk_mode }, function (data) {
										$('#overlowBot').html(data);
									});
									
								}
								
							});
                        });
						</script>
                    
                    	<div style="font-size: 16px; font-weight: bold;"><ubuntu><?php echo $language['shop_bots_roomid']; ?></ubuntu></div>
                        <select name="botRoomId" class="botRoomId selectbot">
                        	<?php 
							$query_search_rooms = mysql_query("SELECT * FROM rooms WHERE owner = '".$core->ExploitRetainer($users->UserInfo($username, 'username'))."' ORDER BY id");
							while($search_rooms = mysql_fetch_array($query_search_rooms)){
							?>
                        	<option value="<?php echo $search_rooms['id']; ?>"><?php echo $search_rooms['caption']; ?></option>
                        	<?php } ?>
                        </select>
                        <div style="font-size: 11px;"><ubuntu><?php echo $language['shop_bots_roomid_second']; ?></ubuntu></div>
                        
                        <br>
                        
                        <div style="font-size: 16px; font-weight: bold;"><ubuntu><?php echo $language['shop_bots_name']; ?></ubuntu></div>
                        <input type="text" name="botName" class="botName" value="<?php if(isset($_GET['botName']) && $core->ExploitRetainer($_GET['botName'])){ echo $_GET['botName']; } ?>">
                        <div style="font-size: 11px;"><ubuntu><?php echo $language['shop_bots_name_second']; ?></ubuntu></div>
                        
                        <br>
                        
                        <div style="font-size: 16px; font-weight: bold;"><ubuntu><?php echo $language['shop_bots_motto']; ?></ubuntu></div>
                        <input type="text" name="botMotto" class="botMotto">
                        <div style="font-size: 11px;"><ubuntu><?php echo $language['shop_bots_motto_second']; ?></ubuntu></div>
                        
                        <br>
                        
                        <div style="font-size: 16px; font-weight: bold;"><ubuntu><?php echo $language['shop_bots_look']; ?></ubuntu></div>
                        <input type="text" name="botLook" class="botLook">
                        <div style="font-size: 11px;"><ubuntu><?php echo $language['shop_bots_look_second']; ?></ubuntu></div>
                        
                        <br>
                        
                        <div style="font-size: 16px; font-weight: bold;"><ubuntu><?php echo $language['shop_bots_walkmode']; ?></ubuntu></div>
                        <select name="botWalkMode" class="botWalkMode selectbot">
                        	<option value="stand"><?php echo $language['shop_bots_walkmode_stand']; ?></option>
                        	<option value="freeroam"><?php echo $language['shop_bots_walkmode_freeroam']; ?></option>
                        </select>
                        <div style="font-size: 11px;"><ubuntu><?php echo $language['shop_bots_walkmode_second']; ?></ubuntu></div>
                        
                        <br>
                        
                        <div style="font-size: 16px; font-weight: bold;"><ubuntu><?php echo $language['shop_bots_walkstart_x']; ?></ubuntu></div>
                       	<input type="text" name="botWalkStartX" class="botWalkStartX">
                        <div style="font-size: 11px;"><ubuntu><?php echo $language['shop_bots_walkstart_x_second']; ?></ubuntu></div>
                            
                        <br>
                            
                        <div style="font-size: 16px; font-weight: bold;"><ubuntu><?php echo $language['shop_bots_walkstart_y']; ?></ubuntu></div>
                      	<input type="text" name="botWalkStartY" class="botWalkStartY">
                        <div style="font-size: 11px;"><ubuntu><?php echo $language['shop_bots_walkstart_y_second']; ?></ubuntu></div>
                        
                        <br>
                        
                        <div style="font-size: 16px; font-weight: bold;"><ubuntu><?php echo $language['shop_bots_walkstart_z']; ?></ubuntu></div>
                       	 <input type="text" name="botWalkStartZ" class="botWalkStartZ">
                        <div style="font-size: 11px;"><ubuntu><?php echo $language['shop_bots_walkstart_z_second']; ?></ubuntu></div>
                        
                        <br>
                        
                        <div style="font-size: 16px; font-weight: bold;"><ubuntu><?php echo $language['shop_bots_walkstart_rotation']; ?></ubuntu></div>
                       	 <input type="text" name="botWalkStartRotation" class="botWalkStartRotation">
                        <div style="font-size: 11px;"><ubuntu><?php echo $language['shop_bots_walkstart_rotation_second']; ?></ubuntu></div>
                        
                        <input type="submit" id="submitBlack" class="submitRight buyTheBot" value="Maak bot">
                        
                    <?php
					}
					?>
                    
                </div>
                
                <?php }else{ ?>
					
				<div class="boxContainer rounded">
							
					<div class="errorMessageOverlow" style="width: 544px;">Helaas, je bent geen vip! Hierdoor mag/kun jij geen bots kopen!</div>
							
				</div>
                
                <?php } ?>

			</div>

			<div id="containerRight">
            
            	<div id="containerSpace"></div>
				
				<div class="creditsInfoBoxGrey" style="width: 291px;">
			
					<div class="inside">
				
						<div class="countBox" style="width: 243px;">
					
							<center>
								
								<div class="event_point"></div>
						
								<div class="nextCredit"><?php echo $core->ExploitRetainer($users->UserInfo($username, 'event_points')); ?></div>
								
							</center>
					
						</div>
                        
                        <div class="countBox" style="width: 243px; margin-top: 5px;">
					
							<center>
								
								<div class="belcredit"></div>
						
								<div class="nextCredit"><?php echo $core->ExploitRetainer($users->UserInfo($username, 'crystals')); ?></div>
								
							</center>
					
						</div>
				
					</div>
				
				</div>
                
                <div id="containerSpace"></div>
                
                <div class="boxContainer rounded">

					<div class="boxHeader right rounded red"><ubuntu><?php echo $language['shop_bots_how_much_costs']; ?></ubuntu></div>
                    
                    <?php echo $language['shop_bots_how_much_costs_second']; ?>
                    
                </div>
			
				<div id="containerSpace"></div>
				
				<div class="boxContainer rounded">

					<div class="boxHeader right rounded green"><ubuntu><?php echo $language['shop_bots_info']; ?></ubuntu></div>
                    
                    <?php echo $language['shop_bots_info_second']; ?>
                    				
				</div>

			</div>

		</div>
	
	</div>

</div>

</body>
</html>