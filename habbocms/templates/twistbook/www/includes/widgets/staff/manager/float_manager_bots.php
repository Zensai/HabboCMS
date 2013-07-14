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
    
	$("#onclickOpenManagerBots").click(function () {
		$("#overlowManagerBots").show("slide", { direction: "up" }, 1000);
		$(".overlowManagerIndex").fadeOut();
	});
	$("#onclickCloseManagerBots").click(function () {
		if($('.handleManagerBotsContainer').is(":visible")){
			$('.handleManagerBotsContainer').fadeOut(function(){
				$('.chooseHandleManagerBotsContainer').animate({
					marginLeft: '225px'
				}, function(){
					$("#overlowManagerBots").hide("slide", { direction: "down" }, 1000, function(){
						$(".overlowManagerIndex").fadeIn();
					});
				});
			});
		}else{
			$("#overlowManagerBots").hide("slide", { direction: "down" }, 1000, function(){
				$(".overlowManagerIndex").fadeIn();
			});
		}
	});
	$('#onclickCloseManagerBots2').click(function(){
		$('.handleManagerBotsContainer').fadeOut(function(){
			$('.chooseHandleManagerBotsContainer').animate({
				marginLeft: '225px'
			});
		});
	});
	
	$('.searchBotsUserResults').click(function(){
		$('.chooseHandleManagerBotsContainer').animate({
			marginLeft: '0px'
		}, function(){
			$('.disepearthisBotsSettings2').hide();
			$('.loadingBotsSettings2').show();
			$('.handleManagerBotsContainer').fadeIn(function(){
				var user = $('#searchBotsUsername').val();
				$.post("<?php echo HOST; ?>/manager/bots/search/results/" + user, { user: user }, function(php){
					$('.disepearthisBotsSettings2').html(php);				
					$('.loadingBotsSettings2').hide();
					$('.disepearthisBotsSettings2').show();
				});
			});
		});
	});

});
</script>

<?php 
$queryAutoCompleteUserBots = mysql_query("SELECT * FROM users ORDER BY username DESC LIMIT 100000");
?>

<script>
$(document).ready(function() {

$("input.managerBotsAutoInputUser").autocomplete({
	source: [<?php while($autoCompleteUserBots = mysql_fetch_array($queryAutoCompleteUserBots)){ ?> "<?php echo $autoCompleteUserBots['username']; ?>",<?php } ?>]
});

});
</script>

<div class="overlowContainer nobackground" id="overlowManagerBots">

	<div style="width: 930px; margin: auto; display: table;">

        <div class="container scroll chooseHandleManagerBotsContainer" style="width: 450px; float: left; margin-left: 225px;">
            
            <div class="top"></div>
            
            <div class="localOverlowTitleSettings"><b><ubuntu><?php echo $language['manager_menu_bots']; ?></ubuntu></b></div>
            
            <div id="onclickCloseManagerBots" class="closeButton"></div>
            
            <div class="text" style="width: 390px;">
            
            <div class="loadingBotsSettings" style="display: none;"><center><img style="margin-top:80px; margin-bottom: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></center></div>
            
            <div class="disepearthisBotsSettings">
                
                <div class="insideContainer">
                    
                    <label><ubuntu><?php echo $language['manager_menu_bots_username_search']; ?></ubuntu></label>
				
					<br>
		
					<input type="text" name="searchBotsUsername" id="searchBotsUsername" class="managerBotsAutoInputUser" value="">
					
					<a class="overlowButton searchBotsUserResults" style="text-shadow: none; margin-top: 10px; margin-left: 0px; float: right;">
												
						<b><u class="overlowButtonText" style="">
													
							<i><ubuntu><?php echo $language['search']; ?></ubuntu></i>
													
						</u></b>
														
						<div></div>
													
					</a> 
                
                </div>
                    
            </div>
            
            </div>
            
            <div class="bottom"></div>
            
        </div>
        
        <div class="container scroll handleManagerBotsContainer" style="float: right; width: 450px; margin-left: 20px; display: none;">
            
            <div class="top"></div>
            
            <div class="localOverlowTitleSettings"><b><ubuntu><?php echo $language['manager_menu_bots']; ?></ubuntu></b></div>
            
            <div id="onclickCloseManagerBots2" class="closeButton"></div>
            
            <div class="text" style="width: 390px;">
            
            <div class="loadingBotsSettings2" style="display: none;"><center><img style="margin-top:80px; margin-bottom: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></center></div>
            
            <div class="disepearthisBotsSettings2">
                
                <div class="insideContainer">
                    
                    <label><ubuntu><?php echo $language['manager_menu_bots_username_search']; ?></ubuntu></label>
				
					<br>
		
					<input type="text" name="searchBotsUsername" id="searchBotsUsername" class="managerBotsAutoInputUser" value="">
					
					<a class="overlowButton searchBotsUserResults" style="text-shadow: none; margin-top: 10px; margin-left: 0px; float: right;">
												
						<b><u class="overlowButtonText" style="">
													
							<i><ubuntu><?php echo $language['search']; ?></ubuntu></i>
													
						</u></b>
														
						<div></div>
													
					</a> 
                
                </div>
                    
            </div>
            
            </div>
            
            <div class="bottom"></div>
            
        </div>
    
    </div>

</div>

<?php } ?>