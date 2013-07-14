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
include("../../includes/inc.global.php");

if(isset($_GET['id']) && $core->ExploitRetainer($_GET['id'])){
	$id = $core->ExploitRetainer($_GET['id']);
}

$query_home_basic = mysql_query("SELECT * FROM homes WHERE user_id = '".$core->ExploitRetainer($users->UserInfoById($id, 'id'))."'");
$query_check_home = mysql_fetch_array($query_home_basic);

$query_home = mysql_query("SELECT * FROM homes_items WHERE home_id = '".$query_check_home['id']."' AND user_id = '".$core->ExploitRetainer($users->UserInfoById($id, 'id'))."'");

$query_home_count = mysql_query("SELECT * FROM homes_items WHERE home_id = '".$query_check_home['id']."' AND user_id = '".$core->ExploitRetainer($users->UserInfoById($id, 'id'))."' AND display = 'yes'");
$home_count = mysql_num_rows($query_home_count);

$home_count_all = $home_count + 1;

$menu = 'me';
$page = 'home';

if($core->ExploitRetainer($_GET['id']) == $core->ExploitRetainer($users->UserInfo($username, 'id'))){ }else{ header("Location: ".HOST."/home/".$core->ExploitRetainer($users->UserInfo($username, 'id')).""); }
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml" class="homes" style="background: none;">
<head>

	<title><?php echo $hotelname; ?> - <?php echo $core->ExploitRetainer($users->UserInfoById($id, 'username')); ?></title>
	<?php echo $Style->Homes(); ?>

</head>

<script>
$(document).ready(function() {
	
	var aantalSaves = $('.countSaveAll').size();
	$('.saveCount').val(aantalSaves);
	
	setInterval( function () {
		
    	$('.saveHome').click( function () {
			$('#overlowHomeSaved').fadeIn();
		});
	
		$('.stopEditHome').click( function () {
			$('#overlowHomeSaved').fadeIn();
			document.location.href='<?php echo HOST; ?>/home/<?php echo $core->ExploitRetainer($users->UserInfoById($id, 'id')); ?>/normal';
		});
		
	}, 1000);
});
</script>

<div class="refreshmetatagurl"></div>

<div class="effect_functions_home"></div>

<script>
$(document).ready(function() {

	setInterval( function () { $("body .widget_sticky_content_stack").draggable({ stack: "body .widget_sticky_content_stack", containment: ".body" }); }, 1000);
	
});

function saveBackground(){
	
	var id = '<?php echo $query_check_home['id']; ?>';
	var background = $('.inputInfo #background').val();
	
	$.post("<?php echo HOST; ?>/home/<?php echo $core->ExploitRetainer($users->UserInfoById($id, 'id')); ?>/save/background/" + id + "/" + background, { id: id, background: background }, function (data) {
		var aantalSavesPostBackground = $('.saveCount').val();
		$('.saveCount').val(aantalSavesPostBackground-1);	
		
		if($('.saveCount').val() == 0){
			
			document.location.href='<?php echo HOST; ?>/home/<?php echo $core->ExploitRetainer($users->UserInfoById($id, 'id')); ?>/normal';
			
		}
	});
	
}

function saveWidget(WidgetId){

	var id = WidgetId;
	var left = $('#container_widget_' + WidgetId).css("left");
	var top = $('#container_widget_' + WidgetId).css("top");
	var zindex = $('#container_widget_' + WidgetId).css("z-index");
	var show = $('#container_widget_' + WidgetId + ' #widget_' + WidgetId + '_show').val();
	var style = $('#container_widget_' + WidgetId + ' #widget_' + WidgetId + '_style').val();
	
	$.post("<?php echo HOST; ?>/home/<?php echo $core->ExploitRetainer($users->UserInfoById($id, 'id')); ?>/save", { id: id, left: left, top: top, zindex: zindex, show: show, style: style }, function (data) {
		var aantalSavesPostWidget = $('.saveCount').val();
		$('.saveCount').val(aantalSavesPostWidget-1);	
		
		if($('.saveCount').val() == 0){
			
			document.location.href='<?php echo HOST; ?>/home/<?php echo $core->ExploitRetainer($users->UserInfoById($id, 'id')); ?>/normal';
			
		}
	});
	
}

function saveSticky(WidgetId){

	var id = WidgetId;
	var left = $('#container_sticky_' + WidgetId).css("left");
	var top = $('#container_sticky_' + WidgetId).css("top");
	var zindex = $('#container_sticky_' + WidgetId).css("z-index");
	var show = $('.inputInfo #widget_' + WidgetId + '_show').val();
	var style = '';
	
	$.post("<?php echo HOST; ?>/home/<?php echo $core->ExploitRetainer($users->UserInfoById($id, 'id')); ?>/save", { id: id, left: left, top: top, zindex: zindex, show: show, style: style }, function (data) {
		var aantalSavesPostSticky = $('.saveCount').val();
		$('.saveCount').val(aantalSavesPostSticky-1);	
		
		if($('.saveCount').val() == 0){
			
			document.location.href='<?php echo HOST; ?>/home/<?php echo $core->ExploitRetainer($users->UserInfoById($id, 'id')); ?>/normal';
			
		}
	});
	
}

function draggable_widget(WidgetId) {
	var indexz = 5;
	$('#container_widget_' + WidgetId).draggable({
		containment: ".body",
		handle: ".handle_widget_" + WidgetId,
		cursor: "move",
		stop: function () {
			var zindexz = $(this).css("z-index");
			var count = zindexz + indexz++;
			$(this).css("z-index", count);
		}
	});
}

function remove_widget(WidgetId) {
	$('#container_widget_' + WidgetId).fadeOut( function () { 
		$(this).css("display", "none");
		$(this).css("left", "10px");
		$(this).css("top", "45px");
		$(this).css("z-index", "9999");
		$('#widget_' + WidgetId + '_show').val('no');
		$('.inputInfo #widget_' + WidgetId + '_show').val('no');
		$('#container_widget_' + WidgetId + ' #widget_' + WidgetId + '_show').val('no');
	});
}

function draggable_sticky(WidgetId) {
	var indexz = 3;
	$('#container_sticky_' + WidgetId).draggable({
		containment: ".body",
		cursor: "move",
		stop: function () {
			var zindexz = $(this).css("z-index");
			var count = zindexz + indexz++;
			$(this).css("z-index", count);
			
			var zindex = $(this).css("z-index");
			var left = $(this).css("left");
			var top = $(this).css("top");
			
			$('widget_' + WidgetId).html(
			'<br><br> z-index: ' + zindex + '<br> left: ' + left + '<br> top: ' + top
			);
		}
	});
}

function remove_sticky(WidgetId) {
	$('#container_sticky_' + WidgetId).fadeOut( function () {
		$(this).css("display", "none");
		$(this).css("left", "10px");
		$(this).css("top", "45px");
		$(this).css("z-index", "9999");
		$('.inputInfo #widget_' + WidgetId + '_show').val('no');
		$('#container_sticky_' + WidgetId + ' #widget_' + WidgetId + '_show').val('no');
	});
}

$(document).ready(function() {
    
	$(".onclickOpenMyItems").click(function () {
		$("#overlowMyItems").fadeIn(function () {
			loadMyItems();
		});
		$('.loadUserDataToMyItems').html('<center><img style="margin-top: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_habbos.gif"></center>');
	});
	
	function loadMyItems() {
		$.ajax({
			type: "POST",
			cache: "true",
			url: "<?php echo HOST; ?>/home/<?php echo $core->ExploitRetainer($users->UserInfoById($id, 'id')); ?>/items",
			data: "user_id=" + '<?php echo $core->ExploitRetainer($users->UserInfoById($id, 'id')); ?>',
			success: function(php){
				$('.loadUserDataToMyItems').html(php);
			}
		});
	}
	
	$(".onclickOpenTheStore").click(function () {
		$("#overlowTheStore").fadeIn(function(){
			loadTheStore();
		});
	});
	
	$("#onclickCloseTheStore").click(function () {
		if($('#backgroundTry').val() == 'yes'){
			$('.body').css('background', 'url(<?php echo HOST; ?>/web-gallery/homes/background/<?php echo $query_check_home['background']; ?>.gif) repeat');
			$('#backgroundTry').val('no');
		}
	});
	
	function loadTheStore() {
		$('.loadUserDataToTheStore').html('<center><img style="margin-top: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_habbos.gif"></center>');
		$.ajax({
			type: "POST",
			cache: "true",
			url: "<?php echo HOST; ?>/home/widget/sticky/background/store",
			data: "user_id=" + '<?php echo $core->ExploitRetainer($users->UserInfoById($id, 'id')); ?>',
			success: function(php){
				$('.loadUserDataToTheStore').html(php);
			}
		});
	}

});
</script>

<style type="text/css">
.overlowContainer {
	z-index: 99999999;
}
</style>

<div class="overlowContainer" id="overlowTheStore">

<div class="container scroll" style="margin-top: 45px; max-height: 1000px;">
		
		<div class="top"></div>
		
		<div class="localOverlowTitleSettings"><b><ubuntu><?php echo $language['the_store']; ?></ubuntu></b></div>
		
		<div id="onclickCloseTheStore" class="closeButton"></div>
		
		<div class="text" style="width: 100%;">

			<div class="loadUserDataToTheStore">
                
   				<center><img style="margin-top: 20px; margin-bottom: 20px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_habbos.gif"></center>
                
   			</div>


			</div>
            
        </div>
		
		<div class="bottom"></div>
		
	</div>
    
    
</div>

<div class="overlowContainer" id="overlowMyItems">

<div class="container scroll" style="margin-top: 45px; max-height: 1000px;">
		
		<div class="top"></div>
		
		<div class="localOverlowTitleSettings"><b><ubuntu><?php echo $language['my_items']; ?></ubuntu></b></div>
		
		<div id="onclickCloseMyItems" class="closeButton"></div>
		
		<div class="text" style="width: 100%;">

			<div class="loadUserDataToMyItems">
                
   				<center><img style="margin-top: 20px; margin-bottom: 20px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_habbos.gif"></center>
                
   			</div>

			</div>
            
        </div>
		
		<div class="bottom"></div>
		
	</div>
    
    
</div>

<div class="overlowContainer" id="overlowHomeSaved">
                
   	<center><img style="margin-top: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_habbos.gif"></center><br>

</div>

<div class="buttonContainer">

	<input type="submit" id="submitBlue" class="submitLeft onclickOpenMyItems" value="<?php echo $language['my_items']; ?>">
    
    <input type="submit" style="margin-left: 5px;" id="submitDarkBlue" class="submitLeft onclickOpenTheStore" value="<?php echo $language['the_store']; ?>">

	<input type="submit" style="margin-left: 5px;" id="submitGreen" class="submitRight saveHome" value="<?php echo $language['submit']; ?>">
    
    <input type="submit" id="submitRed" class="submitRight stopEditHome" value="<?php echo $language['stop']; ?>">

</div>

<body onkeydown="onKeyDown()" style="background: none; background">

<div class="body" style="width: 908px; height: 1340px; padding: 10px; background: url(<?php echo HOST; ?>/web-gallery/homes/background/<?php echo $query_check_home['background']; ?>.gif) repeat;">

	<div class="countSaveAll"></div>

	<?php
	while($home = mysql_fetch_array($query_home)){
			
			if($home['type'] == 'widget'){
				
				$query_check_item_widget = mysql_query("SELECT * FROM homes_shop_widgets WHERE id = '".$home['item_id']."'");
				$check_item_widget = mysql_fetch_array($query_check_item_widget);
				
				if($check_item_widget['name'] == 'widget_profile_information'){
					
					$query_user_profile_widget = mysql_query("SELECT * FROM users WHERE id = '".$home['user_id']."'");
					$user_profile_widget = mysql_fetch_array($query_user_profile_widget);
					
					if($user_profile_widget['online'] == 0){ $online = 'offline'; }elseif($user_profile_widget['online'] == 1){ $online = 'online'; }
	?>

				<div id="container_widget_<?php echo $home['id']; ?>" class="widget_sticky_content_stack countSaveAll" style="position: fixed; <?php if($home['display'] == 'yes'){ echo'display: table;'; }else{ echo'display: none;'; } ?> left: <?php echo $home['x']; ?>px; top: <?php echo $home['y']; ?>px; z-index: <?php echo $home['zindex']; ?>;">
                
                	<input type="hidden" name="widget_<?php echo $home['id']; ?>_id" id="widget_<?php echo $home['id']; ?>_id" value="<?php echo $home['id']; ?>">
    				<input type="hidden" name="widget_<?php echo $home['id']; ?>_show" id="widget_<?php echo $home['id']; ?>_show" value="<?php echo $home['display']; ?>">
                    <input type="hidden" name="widget_<?php echo $home['id']; ?>_style" id="widget_<?php echo $home['id']; ?>_style" value="<?php echo $home['style']; ?>">
                
                	<script>
					$(document).ready(function() {
		
						draggable_widget('<?php echo $home['id']; ?>'); 
						$(".saveHome").click( function () {
							saveWidget('<?php echo $home['id']; ?>');
						});
						
						$("#edit_widget_<?php echo $home['id']; ?>").click( function () {
							if ($(".blueBoxSettings<?php echo $home['id']; ?>:first").is(":hidden")) {
								$(".blueBoxSettings<?php echo $home['id']; ?>").fadeIn();
							} else {
								$(".blueBoxSettings<?php echo $home['id']; ?>").fadeOut();
							}
						});
						
						$('.blueBoxSettingsSelect<?php echo $home['id']; ?>').change(function(){
							var colorStyle = $(this).val();
							$('.blueBoxSettings<?php echo $home['id']; ?>').fadeOut();
							$('#container_widget_<?php echo $home['id']; ?>').fadeOut( function () {	
								$('.handle_widget_<?php echo $home['id']; ?>').attr('id', colorStyle);
								$('#container_widget_<?php echo $home['id']; ?>').fadeIn();
							});
							$('#widget_<?php echo $home['id']; ?>_style').val(colorStyle);
							
						});
		
					});
					</script>

					<div class="boxContainer rounded" id="widget_<?php echo $home['id']; ?>">
                    
                    <div class="blueBoxSettings blueBoxSettings<?php echo $home['id']; ?>">
                        
                        	<div class="insideinsideSettinsBox">
                        
                        		<div class="lineDeleter"></div>
                        
                        		<div class="theSettingsTekst">
                                
                                	<select class="blueBoxSettingsSelect<?php echo $home['id']; ?>">
                                    	<option <?php if($home['style'] == 'orange'){ echo 'selected'; } ?> value="orange"><?php echo $language['home_style_orange']; ?></option>
                                        <option <?php if($home['style'] == 'blue'){ echo 'selected'; } ?> value="blue"><?php echo $language['home_style_blue']; ?></option>
                                        <option <?php if($home['style'] == 'green'){ echo 'selected'; } ?> value="green"><?php echo $language['home_style_green']; ?></option>
                                        <option <?php if($home['style'] == 'lightblue'){ echo 'selected'; } ?> value="lightblue"><?php echo $language['home_style_lightblue']; ?></option>
                                        <option <?php if($home['style'] == 'babyblue'){ echo 'selected'; } ?> value="babyblue"><?php echo $language['home_style_babyblue']; ?></option>
                                        <option <?php if($home['style'] == 'red'){ echo 'selected'; } ?> value="red"><?php echo $language['home_style_red']; ?></option>
                                        <option <?php if($home['style'] == 'darkred'){ echo 'selected'; } ?> value="darkred"><?php echo $language['home_style_darkred']; ?></option>
                                        <option <?php if($home['style'] == 'gray'){ echo 'selected'; } ?> value="gray"><?php echo $language['home_style_gray']; ?></option>
                                        <option <?php if($home['style'] == 'bluegreen'){ echo 'selected'; } ?> value="bluegreen"><?php echo $language['home_style_bluegreen']; ?></option>
                                    </select>
                                
                                </div>
                        
                        	</div>
                        
                      	</div>
                        
                        <div id="edit_widget_<?php echo $home['id']; ?>" style="position: relative; float: right; margin-top: -13px; margin-right: -2px; cursor: pointer;"><img src="<?php echo HOST; ?>/web-gallery/homes/icons/icon_settings.gif"></div>
				
						<div class="boxHeader right rounded handle_widget_<?php echo $home['id']; ?>" id="<?php echo $home['style']; ?>" style="text-align: left;"><div style="padding-left: 10px;"><ubuntu><?php echo $language['profile_widget_title']; ?></ubuntu></div></div>
                        
                        <div style="border-bottom: 1px dashed #666666; display: table; width: 280px;">
                        
                        	<img align="right" style="margin-right: 30px; margin-bottom: 10px;" src="<?php echo $avatarimage_url; ?>?figure=<?php echo $user_profile_widget['look']; ?><?php echo $user_profile_widget['avatar_state']; ?>">
					
							<b><u><?php echo $user_profile_widget['username']; ?></u></b><br>
                            <img src="<?php echo HOST; ?>/web-gallery/icons/<?php echo $online; ?>.gif"><br>
                            <b><?php echo $language['profile_user_info_made_on']; ?></b>:<br><?php echo $core->timeAgo($user_profile_widget['account_created']); ?>
                            
                        </div>
                        
                        <div style="display: table; width: 280px;">
                        
                        	<?php 
							$query_user_tags = mysql_query("SELECT * FROM user_tags WHERE user_id = '".$user_profile_widget['id']."'");
							if(mysql_num_rows($query_user_tags) == 0){ echo '<i>'; echo $user_profile_widget['username']; echo ' '; echo $language['profile_widget_no_tags']; echo '</i>'; }
							while($user_tags = mysql_fetch_array($query_user_tags)){
							?>
                            	<?php  echo $user_tags['tag']; ?>
                            <?php } ?>
                        
                        </div>
				
					</div>

				</div>
    
    <?php 
			}elseif($check_item_widget['name'] == 'widget_badges'){
	?>
    
    			<div id="container_widget_<?php echo $home['id']; ?>" class="widget_sticky_content_stack countSaveAll" style="position: fixed; <?php if($home['display'] == 'yes'){ echo'display: table;'; }else{ echo'display: none;'; } ?> left: <?php echo $home['x']; ?>px; top: <?php echo $home['y']; ?>px; z-index: <?php echo $home['zindex']; ?>;">
                
                	<input type="hidden" name="widget_<?php echo $home['id']; ?>_id" id="widget_<?php echo $home['id']; ?>_id" value="<?php echo $home['id']; ?>">
    				<input type="hidden" name="widget_<?php echo $home['id']; ?>_show" id="widget_<?php echo $home['id']; ?>_show" value="<?php echo $home['display']; ?>">
                    <input type="hidden" name="widget_<?php echo $home['id']; ?>_style" id="widget_<?php echo $home['id']; ?>_style" value="<?php echo $home['style']; ?>">
                
                	<script>
					$(document).ready(function() {
		
						draggable_widget('<?php echo $home['id']; ?>'); 
						$('#remove_widget_<?php echo $home['id']; ?>').click( function () {
							remove_widget('<?php echo $home['id']; ?>'); 
						});
						$(".saveHome").click( function () {
							saveWidget('<?php echo $home['id']; ?>');
						});
						
						$("#edit_widget_<?php echo $home['id']; ?>").click( function () {
							if ($(".blueBoxSettings<?php echo $home['id']; ?>:first").is(":hidden")) {
								$(".blueBoxSettings<?php echo $home['id']; ?>").fadeIn();
							} else {
								$(".blueBoxSettings<?php echo $home['id']; ?>").fadeOut();
							}
						});
						
						$('.blueBoxSettingsSelect<?php echo $home['id']; ?>').change(function(){
							var colorStyle = $(this).val();
							$('.blueBoxSettings<?php echo $home['id']; ?>').fadeOut();
							$('#container_widget_<?php echo $home['id']; ?>').fadeOut( function () {	
								$('.handle_widget_<?php echo $home['id']; ?>').attr('id', colorStyle);
								$('#container_widget_<?php echo $home['id']; ?>').fadeIn();
							});
							$('#widget_<?php echo $home['id']; ?>_style').val(colorStyle);
							
						});
		
					});
					</script>

					<div class="boxContainer rounded" id="widget_<?php echo $home['id']; ?>" style="display: table;">
                    
                    	<div class="blueBoxSettings blueBoxSettings<?php echo $home['id']; ?>">
                        
                        	<div class="insideinsideSettinsBox">
                        
                        		<div class="lineDeleter"></div>
                        
                        		<div class="theSettingsTekst">
                                
                                	<select class="blueBoxSettingsSelect<?php echo $home['id']; ?>">
                                    	<option <?php if($home['style'] == 'orange'){ echo 'selected'; } ?> value="orange"><?php echo $language['home_style_orange']; ?></option>
                                        <option <?php if($home['style'] == 'blue'){ echo 'selected'; } ?> value="blue"><?php echo $language['home_style_blue']; ?></option>
                                        <option <?php if($home['style'] == 'green'){ echo 'selected'; } ?> value="green"><?php echo $language['home_style_green']; ?></option>
                                        <option <?php if($home['style'] == 'lightblue'){ echo 'selected'; } ?> value="lightblue"><?php echo $language['home_style_lightblue']; ?></option>
                                        <option <?php if($home['style'] == 'babyblue'){ echo 'selected'; } ?> value="babyblue"><?php echo $language['home_style_babyblue']; ?></option>
                                        <option <?php if($home['style'] == 'red'){ echo 'selected'; } ?> value="red"><?php echo $language['home_style_red']; ?></option>
                                        <option <?php if($home['style'] == 'darkred'){ echo 'selected'; } ?> value="darkred"><?php echo $language['home_style_darkred']; ?></option>
                                        <option <?php if($home['style'] == 'gray'){ echo 'selected'; } ?> value="gray"><?php echo $language['home_style_gray']; ?></option>
                                        <option <?php if($home['style'] == 'bluegreen'){ echo 'selected'; } ?> value="bluegreen"><?php echo $language['home_style_bluegreen']; ?></option>
                                    </select>
                                
                                </div>
                        
                        	</div>
                        
                      	</div>
                        
                        <div id="edit_widget_<?php echo $home['id']; ?>" style="position: relative; float: right; margin-top: -13px; margin-right: -2px; cursor: pointer;"><img src="<?php echo HOST; ?>/web-gallery/homes/icons/icon_settings.gif"></div>
                        
                        <div id="remove_widget_<?php echo $home['id']; ?>" style="float: right; margin-top: -13px; margin-right: 2px; cursor: pointer;"><img src="<?php echo HOST; ?>/web-gallery/homes/icons/icon_delete.gif"></div>
				
						<?php
						$query_while_badges_widget_11_count = mysql_query("SELECT * FROM user_badges WHERE user_id = ".$home['user_id']."");
						$while_badges_widget_11_count = mysql_num_rows($query_while_badges_widget_11_count);
						?>
                        
                        <div class="boxHeader right rounded handle_widget_<?php echo $home['id']; ?>" id="<?php echo $home['style']; ?>" style="text-align: left;"><div style="padding-left: 10px;"><ubuntu><?php echo $language['badges_widget_title']; ?> (<?php echo $while_badges_widget_11_count; ?>)</ubuntu></div></div>
                        
                        <div style="width: 280px; max-height: 138px; overflow: scroll; overflow-y: auto; overflow-x: hidden;">
						
							<?php 
							$query_while_badges_widget_11 = mysql_query("SELECT * FROM user_badges WHERE user_id = ".$home['user_id']."");
							while($while_badges_widget_11 = mysql_fetch_array($query_while_badges_widget_11)){
							?>
                            	<div title="<?php echo $while_badges_widget_11["badge_id"]; ?>" style="background: url(<?php echo $badge_url; ?><?php echo $while_badges_widget_11["badge_id"]; ?>.gif) no-repeat; width: 53px; height: 45px; float: left; background-position: center center;"></div>
							<?php } ?>
                            
                        </div>
				
					</div>

				</div>
    
    <?php	
					
			}elseif($check_item_widget['name'] == 'widget_rooms'){
					
				$username_specialchars = htmlspecialchars($core->ExploitRetainer($users->UserInfo($username, 'username')));
	?>
    
    			<div id="container_widget_<?php echo $home['id']; ?>" class="widget_sticky_content_stack countSaveAll" style="position: fixed; <?php if($home['display'] == 'yes'){ echo'display: table;'; }else{ echo'display: none;'; } ?> left: <?php echo $home['x']; ?>px; top: <?php echo $home['y']; ?>px; z-index: <?php echo $home['zindex']; ?>;">
                
                	<input type="hidden" name="widget_<?php echo $home['id']; ?>_id" id="widget_<?php echo $home['id']; ?>_id" value="<?php echo $home['id']; ?>">
    				<input type="hidden" name="widget_<?php echo $home['id']; ?>_show" id="widget_<?php echo $home['id']; ?>_show" value="<?php echo $home['display']; ?>">
                    <input type="hidden" name="widget_<?php echo $home['id']; ?>_style" id="widget_<?php echo $home['id']; ?>_style" value="<?php echo $home['style']; ?>">
                
                	<script>
					$(document).ready(function() {
		
						draggable_widget('<?php echo $home['id']; ?>'); 
						$('#remove_widget_<?php echo $home['id']; ?>').click( function () {
							remove_widget('<?php echo $home['id']; ?>'); 
						});
						$(".saveHome").click( function () {
							saveWidget('<?php echo $home['id']; ?>');
						});
						
						$("#edit_widget_<?php echo $home['id']; ?>").click( function () {
							if ($(".blueBoxSettings<?php echo $home['id']; ?>:first").is(":hidden")) {
								$(".blueBoxSettings<?php echo $home['id']; ?>").fadeIn();
							} else {
								$(".blueBoxSettings<?php echo $home['id']; ?>").fadeOut();
							}
						});
						
						$('.blueBoxSettingsSelect<?php echo $home['id']; ?>').change(function(){
							var colorStyle = $(this).val();
							$('.blueBoxSettings<?php echo $home['id']; ?>').fadeOut();
							$('#container_widget_<?php echo $home['id']; ?>').fadeOut( function () {	
								$('.handle_widget_<?php echo $home['id']; ?>').attr('id', colorStyle);
								$('#container_widget_<?php echo $home['id']; ?>').fadeIn();
							});
							$('#widget_<?php echo $home['id']; ?>_style').val(colorStyle);
							
						});
		
					});
					</script>

					<div class="boxContainer rounded" id="widget_<?php echo $home['id']; ?>" style="display: table;">
                    
                    	<div class="blueBoxSettings blueBoxSettings<?php echo $home['id']; ?>">
                        
                        	<div class="insideinsideSettinsBox">
                        
                        		<div class="lineDeleter"></div>
                        
                        		<div class="theSettingsTekst">
                                
                                	<select class="blueBoxSettingsSelect<?php echo $home['id']; ?>">
                                    	<option <?php if($home['style'] == 'orange'){ echo 'selected'; } ?> value="orange"><?php echo $language['home_style_orange']; ?></option>
                                        <option <?php if($home['style'] == 'blue'){ echo 'selected'; } ?> value="blue"><?php echo $language['home_style_blue']; ?></option>
                                        <option <?php if($home['style'] == 'green'){ echo 'selected'; } ?> value="green"><?php echo $language['home_style_green']; ?></option>
                                        <option <?php if($home['style'] == 'lightblue'){ echo 'selected'; } ?> value="lightblue"><?php echo $language['home_style_lightblue']; ?></option>
                                        <option <?php if($home['style'] == 'babyblue'){ echo 'selected'; } ?> value="babyblue"><?php echo $language['home_style_babyblue']; ?></option>
                                        <option <?php if($home['style'] == 'red'){ echo 'selected'; } ?> value="red"><?php echo $language['home_style_red']; ?></option>
                                        <option <?php if($home['style'] == 'darkred'){ echo 'selected'; } ?> value="darkred"><?php echo $language['home_style_darkred']; ?></option>
                                        <option <?php if($home['style'] == 'gray'){ echo 'selected'; } ?> value="gray"><?php echo $language['home_style_gray']; ?></option>
                                        <option <?php if($home['style'] == 'bluegreen'){ echo 'selected'; } ?> value="bluegreen"><?php echo $language['home_style_bluegreen']; ?></option>
                                    </select>
                                
                                </div>
                        
                        	</div>
                        
                      	</div>
                        
                        <div id="edit_widget_<?php echo $home['id']; ?>" style="position: relative; float: right; margin-top: -13px; margin-right: -2px; cursor: pointer;"><img src="<?php echo HOST; ?>/web-gallery/homes/icons/icon_settings.gif"></div>
                        
                        <div id="remove_widget_<?php echo $home['id']; ?>" style="float: right; margin-top: -13px; margin-right: 2px; cursor: pointer;"><img src="<?php echo HOST; ?>/web-gallery/homes/icons/icon_delete.gif"></div>
				
						<?php
						$query_while_rooms_widget_11_count = mysql_query("SELECT * FROM rooms WHERE owner = '".$username_specialchars."'");
						$while_rooms_widget_11_count = mysql_num_rows($query_while_rooms_widget_11_count);
						?>
                        
                        <div class="boxHeader right rounded handle_widget_<?php echo $home['id']; ?>" id="<?php echo $home['style']; ?>" style="text-align: left;"><div style="padding-left: 10px;"><ubuntu><?php echo $language['home_my_rooms']; ?> (<?php echo $while_rooms_widget_11_count; ?>)</ubuntu></div></div>
                        
                        <div style="width: 280px; max-height: 238px; overflow: scroll; overflow-y: auto; overflow-x: hidden;">
						
							<?php 
							$query_while_rooms_widget_11 = mysql_query("SELECT * FROM rooms WHERE owner = '".$username_specialchars."'");
							while($while_rooms_widget_11 = mysql_fetch_array($query_while_rooms_widget_11)){
								if($while_rooms_widget_11['state'] == 'open'){ $room_status = 'open'; $room_status_link = '<a style="color: #391C00; text-decoration: underline;">'.$language['home_room_open'].'</a>'; }
								if($while_rooms_widget_11['state'] == 'locked'){ $room_status = 'locked'; $room_status_link = $language['home_room_closed']; }
								if($while_rooms_widget_11['state'] == 'password'){ $room_status = 'password'; $room_status_link = '<a style="color: #391C00; text-decoration: underline;">'.$language['home_room_password'].'</a>'; }
							?>
                            	<div style="width: 100%; border-bottom: 1px dotted #808080; padding: 5px; display: table;">
                                
                                <img align="left" src="<?php echo HOST; ?>/web-gallery/homes/room_icon_<?php echo $room_status; ?>.gif">
								
                                <div style="display: table;">
									<div><b><?php echo $while_rooms_widget_11['caption']; ?></b></div>
                               	 	<div><?php echo $while_rooms_widget_11['description']; ?></div>
                                	<div onClick="window.open('<?php echo HOST; ?>/room/<?php echo $while_rooms_widget_11['id']; ?>');" style="cursor: pointer;"><?php echo $room_status_link; ?></div>
                                </div>
                                
                                </div>
							<?php 
							} ?>
                            
                        </div>
				
					</div>

				</div>
                
        	<?php
    
    		}elseif($check_item_widget['name'] == 'widget_guestbook'){
			?>
    
    			<div id="container_widget_<?php echo $home['id']; ?>" class="widget_sticky_content_stack countSaveAll" style="position: fixed; <?php if($home['display'] == 'yes'){ echo'display: table;'; }else{ echo'display: none;'; } ?> left: <?php echo $home['x']; ?>px; top: <?php echo $home['y']; ?>px; z-index: <?php echo $home['zindex']; ?>;">
                
                	<input type="hidden" name="widget_<?php echo $home['id']; ?>_id" id="widget_<?php echo $home['id']; ?>_id" value="<?php echo $home['id']; ?>">
    				<input type="hidden" name="widget_<?php echo $home['id']; ?>_show" id="widget_<?php echo $home['id']; ?>_show" value="<?php echo $home['display']; ?>">
                    <input type="hidden" name="widget_<?php echo $home['id']; ?>_style" id="widget_<?php echo $home['id']; ?>_style" value="<?php echo $home['style']; ?>">
                
                	<script>
					$(document).ready(function() {
		
						draggable_widget('<?php echo $home['id']; ?>'); 
						$('#remove_widget_<?php echo $home['id']; ?>').click( function () {
							remove_widget('<?php echo $home['id']; ?>'); 
						});
						$(".saveHome").click( function () {
							saveWidget('<?php echo $home['id']; ?>');
						});
						
						$("#edit_widget_<?php echo $home['id']; ?>").click( function () {
							if ($(".blueBoxSettings<?php echo $home['id']; ?>:first").is(":hidden")) {
								$(".blueBoxSettings<?php echo $home['id']; ?>").fadeIn();
							} else {
								$(".blueBoxSettings<?php echo $home['id']; ?>").fadeOut();
							}
						});
						
						$('.blueBoxSettingsSelect<?php echo $home['id']; ?>').change(function(){
							var colorStyle = $(this).val();
							$('.blueBoxSettings<?php echo $home['id']; ?>').fadeOut();
							$('#container_widget_<?php echo $home['id']; ?>').fadeOut( function () {	
								$('.handle_widget_<?php echo $home['id']; ?>').attr('id', colorStyle);
								$('#container_widget_<?php echo $home['id']; ?>').fadeIn();
							});
							$('#widget_<?php echo $home['id']; ?>_style').val(colorStyle);
							
						});
		
					});
					</script>

					<div class="boxContainer rounded" id="widget_<?php echo $home['id']; ?>" style="display: table;">
                    
                    	<div class="blueBoxSettings blueBoxSettings<?php echo $home['id']; ?>" style="margin-left: 350px;">
                        
                        	<div class="insideinsideSettinsBox">
                        
                        		<div class="lineDeleter"></div>
                        
                        		<div class="theSettingsTekst">
                                
                                	<select class="blueBoxSettingsSelect<?php echo $home['id']; ?>">
                                    	<option <?php if($home['style'] == 'orange'){ echo 'selected'; } ?> value="orange"><?php echo $language['home_style_orange']; ?></option>
                                        <option <?php if($home['style'] == 'blue'){ echo 'selected'; } ?> value="blue"><?php echo $language['home_style_blue']; ?></option>
                                        <option <?php if($home['style'] == 'green'){ echo 'selected'; } ?> value="green"><?php echo $language['home_style_green']; ?></option>
                                        <option <?php if($home['style'] == 'lightblue'){ echo 'selected'; } ?> value="lightblue"><?php echo $language['home_style_lightblue']; ?></option>
                                        <option <?php if($home['style'] == 'babyblue'){ echo 'selected'; } ?> value="babyblue"><?php echo $language['home_style_babyblue']; ?></option>
                                        <option <?php if($home['style'] == 'red'){ echo 'selected'; } ?> value="red"><?php echo $language['home_style_red']; ?></option>
                                        <option <?php if($home['style'] == 'darkred'){ echo 'selected'; } ?> value="darkred"><?php echo $language['home_style_darkred']; ?></option>
                                        <option <?php if($home['style'] == 'gray'){ echo 'selected'; } ?> value="gray"><?php echo $language['home_style_gray']; ?></option>
                                        <option <?php if($home['style'] == 'bluegreen'){ echo 'selected'; } ?> value="bluegreen"><?php echo $language['home_style_bluegreen']; ?></option>
                                    </select>
                                
                                </div>
                        
                        	</div>
                        
                      	</div>
                        
                        <div id="edit_widget_<?php echo $home['id']; ?>" style="position: relative; float: right; margin-top: -13px; margin-right: -2px; cursor: pointer;"><img src="<?php echo HOST; ?>/web-gallery/homes/icons/icon_settings.gif"></div>
                        
                        <div id="remove_widget_<?php echo $home['id']; ?>" style="float: right; margin-top: -13px; margin-right: 2px; cursor: pointer;"><img src="<?php echo HOST; ?>/web-gallery/homes/icons/icon_delete.gif"></div>
                        
                        <?php
						$query_box_header_questbook_count = mysql_query("SELECT * FROM homes_questbook WHERE home_id = '".$query_check_home['id']."'");
						$box_header_questbook_count = mysql_num_rows($query_box_header_questbook_count);
						?>
                        
                        <div class="boxHeader right rounded handle_widget_<?php echo $home['id']; ?>" id="<?php echo $home['style']; ?>" style="width: 360px; text-align: left;"><div style="padding-left: 10px;"><ubuntu><?php echo $language['home_questbook']; ?> (<?php echo $box_header_questbook_count; ?>)</ubuntu></div></div>
                        
                        <div style="width: 350px; max-height: 238px; overflow: scroll; overflow-y: auto; overflow-x: hidden;">
						
							<?php 
							$query_questbook = mysql_query("SELECT * FROM homes_questbook WHERE home_id = '".$query_check_home['id']."'");
							$color = '#F3F3F3';
							while($questbook = mysql_fetch_array($query_questbook)){
								$query_questbook_user = mysql_query("SELECT * FROM users WHERE id = '".$questbook['user_id']."'");
								$questbook_user = mysql_fetch_array($query_questbook_user);
							?>
                            	
                                <div style="display: table; background-color: <?php echo $color; ?>; width: 100%; padding: 7px;">
                                
									<div style="float: left;"><img src="<?php echo $avatarimage_url; ?>?figure=<?php echo $questbook_user['look']; ?>&direction=2&head_direction=3&gesture=sml&size=s"></div>
									<div style="float: left; width: 290px;">
									
										<b><?php echo $questbook_user['username']; ?></b>: <i style="float: right;"><?php echo $core->timeAgo($questbook['published']); ?></i><br>
										
										<?php echo $questbook['message']; ?>
                                        
                                    </div>
  
                                
                                </div>
                                
                            <?php 
							if($color == '#F3F3F3'){ $color = '#E1E1E1'; }else{ $color = '#F3F3F3'; }
							} ?>
                            
                        </div>
				
					</div>

				</div>
    
    <?php	
			}elseif($check_item_widget['name'] == 'widget_friends'){
	?>
    
    			<div id="container_widget_<?php echo $home['id']; ?>" class="widget_sticky_content_stack" style="position: fixed; <?php if($home['display'] == 'yes'){ echo'display: table;'; }else{ echo'display: none;'; } ?> left: <?php echo $home['x']; ?>px; top: <?php echo $home['y']; ?>px; z-index: <?php echo $home['zindex']; ?>;">
                
                	<input type="hidden" name="widget_<?php echo $home['id']; ?>_id" id="widget_<?php echo $home['id']; ?>_id" value="<?php echo $home['id']; ?>">
    				<input type="hidden" name="widget_<?php echo $home['id']; ?>_show" id="widget_<?php echo $home['id']; ?>_show" value="<?php echo $home['display']; ?>">
                    <input type="hidden" name="widget_<?php echo $home['id']; ?>_style" id="widget_<?php echo $home['id']; ?>_style" value="<?php echo $home['style']; ?>">
                
                	<script>
					$(document).ready(function() {
		
						draggable_widget('<?php echo $home['id']; ?>'); 
						$('#remove_widget_<?php echo $home['id']; ?>').click( function () {
							remove_widget('<?php echo $home['id']; ?>'); 
						});
						$(".saveHome").click( function () {
							saveWidget('<?php echo $home['id']; ?>');
						});
						
						$("#edit_widget_<?php echo $home['id']; ?>").click( function () {
							if ($(".blueBoxSettings<?php echo $home['id']; ?>:first").is(":hidden")) {
								$(".blueBoxSettings<?php echo $home['id']; ?>").fadeIn();
							} else {
								$(".blueBoxSettings<?php echo $home['id']; ?>").fadeOut();
							}
						});
						
						$('.blueBoxSettingsSelect<?php echo $home['id']; ?>').change(function(){
							var colorStyle = $(this).val();
							$('.blueBoxSettings<?php echo $home['id']; ?>').fadeOut();
							$('#container_widget_<?php echo $home['id']; ?>').fadeOut( function () {	
								$('.handle_widget_<?php echo $home['id']; ?>').attr('id', colorStyle);
								$('#container_widget_<?php echo $home['id']; ?>').fadeIn();
							});
							$('#widget_<?php echo $home['id']; ?>_style').val(colorStyle);
							
						});
		
					});
					</script>

					<div class="boxContainer rounded" id="widget_<?php echo $home['id']; ?>" style="display: table; padding-left: 0;">
                    
                    	<div class="blueBoxSettings blueBoxSettings<?php echo $home['id']; ?>" style="margin-left: 350px;">
                        
                        	<div class="insideinsideSettinsBox">
                        
                        		<div class="lineDeleter"></div>
                        
                        		<div class="theSettingsTekst">
                                
                                	<select class="blueBoxSettingsSelect<?php echo $home['id']; ?>">
                                    	<option <?php if($home['style'] == 'orange'){ echo 'selected'; } ?> value="orange"><?php echo $language['home_style_orange']; ?></option>
                                        <option <?php if($home['style'] == 'blue'){ echo 'selected'; } ?> value="blue"><?php echo $language['home_style_blue']; ?></option>
                                        <option <?php if($home['style'] == 'green'){ echo 'selected'; } ?> value="green"><?php echo $language['home_style_green']; ?></option>
                                        <option <?php if($home['style'] == 'lightblue'){ echo 'selected'; } ?> value="lightblue"><?php echo $language['home_style_lightblue']; ?></option>
                                        <option <?php if($home['style'] == 'babyblue'){ echo 'selected'; } ?> value="babyblue"><?php echo $language['home_style_babyblue']; ?></option>
                                        <option <?php if($home['style'] == 'red'){ echo 'selected'; } ?> value="red"><?php echo $language['home_style_red']; ?></option>
                                        <option <?php if($home['style'] == 'darkred'){ echo 'selected'; } ?> value="darkred"><?php echo $language['home_style_darkred']; ?></option>
                                        <option <?php if($home['style'] == 'gray'){ echo 'selected'; } ?> value="gray"><?php echo $language['home_style_gray']; ?></option>
                                        <option <?php if($home['style'] == 'bluegreen'){ echo 'selected'; } ?> value="bluegreen"><?php echo $language['home_style_bluegreen']; ?></option>
                                    </select>
                                
                                </div>
                        
                        	</div>
                        
                      	</div>
                        
                        <div id="edit_widget_<?php echo $home['id']; ?>" style="position: relative; float: right; margin-top: -13px; margin-right: -2px; cursor: pointer;"><img src="<?php echo HOST; ?>/web-gallery/homes/icons/icon_settings.gif"></div>
                        
                        <div id="remove_widget_<?php echo $home['id']; ?>" style="float: right; margin-top: -13px; margin-right: 2px; cursor: pointer;"><img src="<?php echo HOST; ?>/web-gallery/homes/icons/icon_delete.gif"></div>
                    
                    	<?php
						$query_box_header_friends = mysql_query("SELECT * FROM messenger_friendships WHERE sender = '".$id."'");
						$box_header_friends_count = mysql_num_rows($query_box_header_friends);
						?>
                        
                        <div class="boxHeader right rounded handle_widget_<?php echo $home['id']; ?>" id="<?php echo $home['style']; ?>" style="margin-left: 0px; width: 371px; text-align: left; padding-left: 10px;"><ubuntu><?php echo $language['home_friends']; ?> (<?php echo $box_header_friends_count; ?>)</ubuntu></div>
                        
                        <div style="width: 366px; max-height: 238px; overflow-y: scroll; overflow-x: hidden; margin-top: -5px;">
                        
                        <style type="text/css">
						.friendsBox:hover {
							opacity: 0.5;
						}
						</style>
                            
                        <?php
						while($friends = mysql_fetch_array($query_box_header_friends)){
							if($friends['sender'] == $id){ $lookupFriend = $friends['receiver']; }else{ $lookupFriend = $friends['sender']; }
							$query_friend_second = mysql_query("SELECT * FROM users WHERE id = '".$lookupFriend."'");
							$friend_second = mysql_fetch_array($query_friend_second);
						?>
                        	<div class="friendsBox" style="border: 1px dashed #666666; width: 100px; float: left; background-color: #F3F3F3; margin-left: 5px; padding: 5px; margin-top: 5px; display: table; font-size: 10px;">
							
								<div style="float: left;"><img src="<?php echo $avatarimage_url; ?>?figure=<?php echo $friend_second['look']; ?>&direction=2&head_direction=3&gesture=sml&size=s"></div>
								
								<div style="float: left;">
                                
                                	<a href="<?php echo HOST; ?>/home/<?php echo $friend_second['id']; ?>/normal" style="color: #3A3A3A;"><b><?php echo $friend_second['username']; ?></b></a><br>
                                    
                                    <?php echo @date("d-M-Y", $friend_second['account_created']); ?>
                                
                                </div>
                                
                           	</div>
                        <?php } ?>
                            
                        </div>
				
					</div>

				</div>
    
    <?php	
			}
			
			}
			
			if($home['display'] == 'yes'){
			
			if($home['type'] == 'sticky'){
				
			$query_sticky = mysql_query("SELECT * FROM homes_shop_stickys WHERE id = '".$home['item_id']."'");
			$sticky = mysql_fetch_array($query_sticky);
	?>
                
                <div id="container_sticky_<?php echo $home['id']; ?>" class="widget_sticky_content_stack countSaveAll <?php echo $sticky['id']; ?>_inhome_sticky" style="background: url(<?php echo HOST; ?>/web-gallery/homes/sticky/<?php echo $sticky['image']; ?>) no-repeat; width: <?php echo $sticky['width']; ?>px; height: <?php echo $sticky['height']; ?>px; position: fixed; display: table; left: <?php echo $home['x']; ?>px; top: <?php echo $home['y']; ?>px; z-index: <?php echo $home['zindex']; ?>;">
                
                <input type="hidden" name="widget_<?php echo $home['id']; ?>_id" id="widget_<?php echo $home['id']; ?>_id" value="<?php echo $home['id']; ?>">
    			<input type="hidden" name="widget_<?php echo $home['id']; ?>_show" id="widget_<?php echo $home['id']; ?>_show" value="<?php echo $home['display']; ?>">
                
                	<script>
					$(document).ready(function() {
		
						draggable_sticky('<?php echo $home['id']; ?>'); 
						$('#remove_sticky_<?php echo $home['id']; ?>').click( function () {
							remove_sticky('<?php echo $home['id']; ?>'); 
						});
						$(".saveHome").click( function () {
							saveSticky('<?php echo $home['id']; ?>');
						});
		
					});
					</script>
                    
                	<div id="remove_sticky_<?php echo $home['id']; ?>" style="position: fixed; float: right; margin-top: -17px; margin-left: -8px; cursor: pointer;"><img src="<?php echo HOST; ?>/web-gallery/homes/icons/icon_delete.gif"></div>
                    
                </div>
    
    <?php
			}
			
		}

	} 
	?>
    
    <div class="inputInfo">
    
    <input type="hidden" name="saveCount" class="saveCount" value="<?php echo $home_count_all; ?>">
    <input type="hidden" name="background" id="background" value="<?php echo $query_check_home['background']; ?>">
    <input type="hidden" name="backgroundTry" id="backgroundTry" value="no">
    <?php
	$query_home_qq = mysql_query("SELECT * FROM homes_items WHERE home_id = '".$query_check_home['id']."' AND user_id = '".$core->ExploitRetainer($users->UserInfoById($id, 'id'))."' AND display = 'yes'");
	while($home_q = mysql_fetch_array($query_home_qq)){
		if($home_q['type'] == 'widget'){
	?>
    	<input type="hidden" name="widget_<?php echo $home_q['id']; ?>_style" id="widget_<?php echo $home_q['id']; ?>_style" value="<?php echo $home_q['style']; ?>">
    <?php } ?>
   		<input type="hidden" name="widget_<?php echo $home_q['id']; ?>_show" id="widget_<?php echo $home_q['id']; ?>_show" value="<?php echo $home_q['display']; ?>">
    <?php } ?>
    
    </div>
    
    <div class="saveInfo"></div>
    
</div>

<div id="backgroundSave"></div>

<script>
$(document).ready(function() {
	
	var objToContainerBackground = document.getElementById('backgroundSave')
	var scriptContainerBackground   = document.createElement("script");
	scriptContainerBackground.text  = "$(document).ready(function() { $('.saveHome').click( function () { saveBackground(); }); });";
	objToContainerBackground.appendChild(scriptContainerBackground);
	
});
</script>
		
</body>
</html>