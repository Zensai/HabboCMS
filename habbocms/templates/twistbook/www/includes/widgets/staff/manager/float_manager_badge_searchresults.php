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

if($users->UserPermission('cms_manager_badge', $username)){
	
	echo $Style->General();
	
$searchedUserQueryTwo = mysql_query("SELECT * FROM users WHERE username LIKE '".$core->ExploitRetainer($_GET['searchBadge'])."'");
$searchedUserTwo = mysql_fetch_array($searchedUserQueryTwo);
?>

<script>
$(document).ready(function() {
	
	$('.searchBadgeResults').click(function() { 
		LoadSearchBadge('<?php echo HOST; ?>/manager/badge/searched/results', $('.inputBadgeSearch').attr('value'));
		$('.disepearSearchedBadge').hide();
	});
	
	$('.addBadgeSubmit').click(function() { 
		addBadge();
		LoadSearchBadge('<?php echo HOST; ?>/manager/badge/searched/results', '<?php echo $core->ExploitRetainer($_GET['searchBadge']); ?>');
	});
					
	function addBadge(){

		var id = $('.addBadgeInput').val();
		var user_id = '<?php echo $searchedUserTwo['id']; ?>';

		$.post("<?php echo HOST; ?>/manager/badge/add", { id: id, user_id: user_id }, function(result){ });

	}

	function LoadSearchBadge(pageName, value) {
		$('.textdisepearSearchedBadge').html('<img style="margin-left: 360px; margin-top:80px; margin-bottom: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif">');
		$.ajax({
			type: "GET",
			url: "" + pageName + "/" + value,
			data: "searchBadge=" + $('#searchBadge').val(),
			success: function(php){
				$('.textdisepearSearchedBadge').html(php);
			}
		});
	}
	
	$('.addBadgeOpen').click(function() { 
		$('.addBadgeCont').slideDown();
	});

});
</script>

<div class="textdisepearSearchedBadge">

	<div class="disepearSearchedBadge">
	
		<?php 
		$queryAutoCompleteUserSearch = mysql_query("SELECT * FROM users ORDER BY username DESC LIMIT 100000");
		?>

		<script>
		$(document).ready(function() {

		$("input.inputBadgeSearch").autocomplete({
				source: [<?php while($autoCompleteUserSearch = mysql_fetch_array($queryAutoCompleteUserSearch)){ ?> "<?php echo $autoCompleteUserSearch['username']; ?>",<?php } ?>]
			});

		});
		</script>
		
		<div class="insideContainer">
			
			<label><ubuntu><?php echo $language['manager_badge_settings_search_user']; ?></ubuntu></label>
				
			<br>
		
			<input type="text" name="searchBadge" id="searchBadge" class="inputBadgeSearch" value="">
			
			<a class="overlowButton searchBadgeResults" style="text-shadow: none; margin-top: 10px; margin-left: 0px; float: right;">
										
				<b><u class="overlowButtonText" style="">
																
					<i><ubuntu><?php echo $language['search']; ?></ubuntu></i>
																
				</u></b>
																	
				<div></div>
																
			</a> 
			
			<a class="overlowButton addBadgeOpen" style="text-shadow: none; margin-top: 10px; margin-left: 0px; float: left;">
										
				<b><u class="overlowButtonText" style="">
														
					<i><ubuntu><?php echo $language['manager_badge_settings_add_badge']; ?></ubuntu></i>
														
				</u></b>
															
				<div></div>
														
			</a> 
				
		</div>
        
        <div class="insideContainer space addBadgeCont" style="display: none;">
        
        	<label><ubuntu><?php echo $language['manager_badge_settings_badge_code']; ?></ubuntu></label>
				
			<br>
		
			<input type="text" name="addBadge" id="addBadge" class="addBadgeInput" value="">
			
			<a class="overlowButton addBadgeSubmit" style="text-shadow: none; margin-top: 10px; margin-left: 0px; float: right;">
										
				<b><u class="overlowButtonText" style="">
														
					<i><ubuntu><?php echo $language['manager_badge_settings_add_badge']; ?></ubuntu></i>
														
				</u></b>
															
				<div></div>
														
			</a> 
        
        </div>

		<div class="insideContainer space" style="font-family: Ubuntu, Arial; display: table;">

			<?php
			$searchedUserQuery = mysql_query("SELECT * FROM users WHERE username LIKE '".$core->ExploitRetainer($_GET['searchBadge'])."'");
			$searchedUserCount = mysql_num_rows($searchedUserQuery);
			$searchedUser = mysql_fetch_array($searchedUserQuery);
			if($searchedUserCount > 0){
			?>
	
				<div style="float: left; border-right: solid 2px #919191; padding-right: 10px; margin-right: 10px;">
		
					<img src="<?php echo $avatarimage_url; ?>?figure=<?php echo $searchedUser['look']; ?>&direction=2&head_direction=3&gesture=sml">
			
				</div>
		
				<div style="float: left; border-right: solid 2px #919191; padding-right: 10px; margin-right: 10px; font-size: 14px; height: 100%; display: table;width: 600px;">
				
                <?php
				$query_badges = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$searchedUser['id']."'");
				while($editBadges = mysql_fetch_array($query_badges)){
				?>
                
                	<script>
					$(document).ready(function() {
                    
						$('#badge<?php echo $editBadges['id']; ?>').click(function() { 
							$('#badge<?php echo $editBadges['id']; ?>').fadeOut('slow');
							DeleteBadge<?php echo $editBadges['id']; ?>();
						});
					
						function DeleteBadge<?php echo $editBadges['id']; ?>(){

							var id = '<?php echo $editBadges['id']; ?>';

							$.post("<?php echo HOST; ?>/manager/badge/delete", { id: id }, function(result){ });

						}
					
					});
					</script>
					
                
                	<div id="badge<?php echo $editBadges['id']; ?>" style="margin: 5px; float: left; cursor: pointer;"><img onMouseOver="tooltip.show('<b><?php echo $editBadges['badge_id']; ?></b><br><br><?php echo $language["manager_badge_settings_sure_delete"]; ?>');" onMouseOut="tooltip.hide();" src="<?php echo $badge_url; ?><?php echo $editBadges['badge_id']; ?>.gif"></div>
                
                <?php } ?>	
		
				</div>
		
				<input type="hidden" name="id" class="idUserToEditBadge" value="<?php echo $searchedUser['id']; ?>">
		
			<?php
			}else{
			?>
	
			<div class="errorMessageOverlow" style="width: 707px;">
	
				<?php echo $language['no_found']; ?>
		
			</div>
	
			<?php } ?>

		</div>

	</div>

</div>

<?php } ?>