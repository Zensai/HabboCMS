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

?>

<?php if($users->UserPermission('cms_manager_hotel', $username)){ ?>

<script>
$(document).ready(function() {
    
	$("#onclickOpenManagerMaintenance").click(function () {
		$("#overlowManagerMaintenance").show("slide", { direction: "up" }, 1000);
		$(".overlowManagerIndex").fadeOut();
	});
	$("#onclickCloseManagerMaintenance").click(function () {
		$("#overlowManagerMaintenance").hide("slide", { direction: "down" }, 1000, function(){
			$(".overlowManagerIndex").fadeIn();
		});
	});

	$('.postItMaintenance').click(function() { 
		SubmitFormMaintenance();
		$(".loadingMaintenanceSettings").show();
		$(".disepearthisMaintenanceSettings").hide();
	});
	
	function SubmitFormMaintenance() {
			$.ajax({
			type: "POST",
			url: "<?php echo HOST; ?>/manager/maintenance/update",
			data: "cms_maintenance_reason=" + $('#cms_maintenance_reason').val(),
			success: function(){
				$("#overlowManagerMaintenance").hide("slide", { direction: "left" }, 1000, function(){
					$(".overlowManagerIndex").fadeIn();
				});
				$(".loadingMaintenanceSettings").hide();
				$(".disepearthisMaintenanceSettings").show();
			}
		});
	}

});
</script>

<style type="text/css">
.maintenanceEditor {
	height: 100px;
	width: 100%;
	font-size: 12px !important;
	border: 1px solid #636363 !important;
	-webkit-border-radius: 4px !important;
	-moz-border-radius: 4px !important;
	border-radius: 4px !important;
	margin-top: 3px !important;
	padding: 9px !important;
	background-color: #FFFFFF !important;
	box-shadow: inset 0 2px 2px rgba(240, 240, 240, 1), 0px 1px 0px rgba(255, 255, 255, 1) !important;
	opacity: 0.7 !important;
	outline: none !important;
	resize: none !important;
}

.maintenanceEditor:focus {
	opacity: 1 !important;
}
</style>

<div class="overlowContainer nobackground" id="overlowManagerMaintenance">

	<div class="container scroll">
		
		<div class="top"></div>
		
		<div class="localOverlowTitleSettings"><b><ubuntu><?php echo $language['manager_menu_maintenancepage_settings']; ?></ubuntu></b></div>
		
		<div id="onclickCloseManagerMaintenance" class="closeButton"></div>
		
		<div class="text" style="width: 740px;">
		
			<div class="loadingMaintenanceSettings" style="display: none;"><img style="margin-left: 360px; margin-top:80px; margin-bottom: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></div>
		
			<div class="disepearthisMaintenanceSettings">
		
				<div class="insideContainer">
			
					<label><ubuntu><?php echo $language['manager_maintenancepage_settings_reason']; ?></ubuntu></label>
				
					<br>
				
					<textarea id="cms_maintenance_reason" class="maintenanceEditor"><?php echo $core->CmsSetting('cms_maintenance_reason'); ?></textarea>
				
				</div>
				
				<a class="overlowButton postItMaintenance" style="text-shadow: none; margin-top: 20px; margin-left: 0px; float: right;">
											
					<b><u class="overlowButtonText" style="">
												
						<i><ubuntu><?php echo $language['submit']; ?></ubuntu></i>
												
					</u></b>
													
					<div></div>
												
				</a> 
			
			</div>
				
		</div>
		
		<div class="bottom"></div>
		
	</div>

</div>

<?php } ?>