<script>
$(document).ready(function() {
    
	$("#onclickOpenMessages").click(function () {
		$("#overlowMessages").fadeIn("slow");
	});
	$("#onclickCloseMessages").click(function () {
		$("#overlowMessages").fadeOut("slow");
	});
	
	var alertCount = $(".alertCont").size();
	var counterAlertUpSecond = +(alertCount)+1;
	var alertCountup = 1;
	
	$(".alert-1").fadeIn();
	
	$(".onclickCloseAlert").click(function () {
		if(alertCount == 1){
			$("#overlowAlerts").fadeOut();
		}
		
		if(alertCount > 1){
			var counterAlertUp = +($("#alertCountValueUp").val())+1;
			$(".alertCont").hide();
			$(".alert-"+counterAlertUp).fadeIn();
			$("#alertCountValueUp").val(counterAlertUp);
			if(counterAlertUpSecond == counterAlertUp){
				$("#overlowAlerts").fadeOut();
			}
		}
		
	});

});
</script>

<input type="hidden" name="alertCountValueUp" id="alertCountValueUp" value="1">

<?php
$queryAlertsCheck = mysql_query("SELECT * FROM alerts WHERE user_id = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."'");
$alertCheckNum = mysql_num_rows($queryAlertsCheck);
?>

<div class="overlowContainer" id="overlowAlerts" <?php if($alertCheckNum > 0){?>style="display: block;"<?php } ?>>

	<?php 
	$queryAlerts = mysql_query("SELECT * FROM alerts WHERE user_id = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."' ORDER BY published");
	$alertsCount = 1;
	while($alerts = mysql_fetch_array($queryAlerts)){
	?>

		<div style="margin-left: -200px; position: fixed; display: none; background: url(<?php echo HOST; ?>/web-gallery/general/overlow/floatBackground.png) repeat;" class="alert-<?php echo $alertsCount; ?> alertCont">
        	
			<script>
			$(document).ready(function() {
				
				$("#onclickCloseAlert-<?php echo $alertsCount; ?>").click(function () {
					var id = '<?php echo $alerts['id']; ?>';
					$.post("<?php echo HOST; ?>/alert/<?php echo $alerts['id']; ?>/readed", { id: id });
				});
				
			});
			</script>
        
        	<div class="container" style="width: 400px; margin-left: 50%; position: fixed; margin-top: 130px;">
		
			<div class="top"></div>
		
			<div id="onclickCloseAlert-<?php echo $alertsCount; ?>" class="closeButton onclickCloseAlert"></div>
        
        	<div style="margin-top: -20px;"></div>
		
			<div class="text" style="width: 360px; overflow-x: none;">
            
            	<?php if($alerts['author_id'] == '0001'){ ?>
                
                    <img style="margin-top: -125px; margin-left: -20px;" align="left" src="<?php echo HOST; ?>/web-gallery/avatars/frank/frankAvatar.gif">
                
                    <div style="margin-top: -95px; margin-left: 40px; font-size: 25px; color: #FFFFFF; font-weight: bold;"><ubuntu>Frank</ubuntu></div>
                
                <?php }else{ ?>
            
                    <img style="margin-top: -125px; margin-left: -20px;" align="left" src="<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfoByID($alerts['author_id'], 'look')); ?>&direction=2&head_direction=3&gesture=sml">
                
                    <div style="margin-top: -95px; margin-left: 40px; font-size: 25px; color: #FFFFFF; font-weight: bold;"><ubuntu><?php echo $core->ExploitRetainer($users->UserInfoByID($alerts['author_id'], 'username')); ?></ubuntu></div>
                
                <?php } ?>
                
                <div style="margin-top: 0px; margin-left: 40px; font-size: 15px; color: #FFFFFF; font-weight: normal;"><ubuntu><?php echo $language["alerts_hassent"]; ?></ubuntu></div>
                
                <div style="font-family: Ubuntu; font-weight: bold; font-size: 12px; margin-top: 20px; text-align: center;"><ubuntu><?php echo $language["alerts_fromhotel"]; ?></ubuntu></div>
            
            	<div style="max-height: 530px; margin-top: 10px; overflow-y: auto; overflow-x: hidden; font-size: 12px; padding-right: 10px; font-family: Ubuntu;">
                
                	<img align="right" src="<?php echo HOST; ?>/web-gallery/avatars/frank/frankAvatarAlert.gif" />
                   
                   	<div style="padding-top: 10px;"><?php echo html_entity_decode($alerts['message']); ?></div>
            
            	</div>
                
                <div style="border-top: 1px solid #CCCCCC; border-bottom: 1px solid #FFFFFF; width: 100%; margin-top: 20px;"></div>
            
        	</div>
		
			<div class="bottom"></div>
		
		</div>
    
    </div>
    
    <?php
		$alertsCount++;
	} 
	?>

</div>