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

if($users->UserPermission('cms_manager_users', $username)){
?>

<script src="<?php echo HOST; ?>/web-gallery/styles/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php echo HOST; ?>/web-gallery/styles/js/ubuntu.font.js" type="text/javascript"></script>
			
<script type="text/javascript">
	Cufon.replace("ubuntu");
</script>

<script>
$(document).ready(function() {
	
	$('.searchUserResults').click(function() { 
		LoadSearchUser('<?php echo HOST; ?>/manager/users/searched/results', $('.inputUserSearch').attr('value'));
		$('.disepearSearchedUser').hide();
	});

	function LoadSearchUser(pageName, value) {
		$('.textdisepearSearchedUser').html('<img style="margin-left: 360px; margin-top:80px; margin-bottom: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif">');
		$.ajax({
			type: "GET",
			url: "" + pageName + "/" + value,
			data: "searchUser=" + $('#searchUser').val(),
			success: function(php){
				$('.textdisepearSearchedUser').html(php);
			}
		});
	}
	
	$('.userEditOpen').click(function() { 
		LoadEditUser('<?php echo HOST; ?>/manager/users/edit', $('.idUserToEdit').attr('value'));
		$('.textdisepearSearchedUser').html('<img style="margin-left: 360px; margin-top:80px; margin-bottom: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif">');
		$('.disepearSearchedUser').hide();
	});

	function LoadEditUser(pageName, value) {
		$.ajax({
			type: "POST",
			url: "" + pageName + "/" + value,
			data: "username=" + $('.idUserToEdit').val(),
			success: function(php){
				$('.textdisepearSearchedUser').html(php);
			}
		});
	}

});
</script>

<div class="textdisepearSearchedUser">

	<div class="disepearSearchedUser">
	
		<?php 
		$queryAutoCompleteUserSearch = mysql_query("SELECT * FROM users ORDER BY username DESC LIMIT 100000");
		?>

		<script>
		$(document).ready(function() {

		$("input.inputUserSearch").autocomplete({
				source: [<?php while($autoCompleteUserSearch = mysql_fetch_array($queryAutoCompleteUserSearch)){ ?> "<?php echo $autoCompleteUserSearch['username']; ?>",<?php } ?>]
			});

		});
		</script>
		
		<div class="insideContainer">
			
			<label><ubuntu><?php echo $language['manager_users_search_username']; ?></ubuntu></label>
				
			<br>
		
			<input type="text" name="searchUser" id="searchUser" class="inputUserSearch" value="">
			
			<a class="overlowButton searchUserResults" style="text-shadow: none; margin-top: 10px; margin-left: 0px; float: right;">
										
				<b><u class="overlowButtonText" style="">
											
					<i><ubuntu><?php echo $language['search']; ?></ubuntu></i>
											
				</u></b>
												
				<div></div>
											
			</a>
				
		</div>

			<?php
			$searchedUserQuery = mysql_query("SELECT * FROM users WHERE username = '".$core->ExploitRetainer($_GET['searchUser'])."'");
			while($searchedUser = mysql_fetch_array($searchedUserQuery)){
			$searchedUserCount = mysql_num_rows($searchedUserQuery);
			if($searchedUserCount > 0){
			?>
            
            	<div class="insideContainer space" style="font-family: Ubuntu, Arial; display: table;">
	
				<div style="float: left; border-right: solid 2px #919191; padding-right: 10px; margin-right: 10px;">
		
					<img src="<?php echo $avatarimage_url; ?>?figure=<?php echo $searchedUser['look']; ?>&direction=2&head_direction=3&gesture=sml">
			
				</div>
		
				<div style="float: left; border-right: solid 2px #919191; padding-right: 10px; margin-right: 10px; font-size: 14px; height: 100%;">
		
					<ubuntu><b><?php echo $language['profile_username']; ?>:</b> <?php echo $searchedUser['username']; ?></ubuntu><br>
					<ubuntu><b><?php echo $language['profile_motto']; ?>:</b> <?php echo $searchedUser['motto']; ?></ubuntu><br>
					<ubuntu><b><?php echo $language['profile_user_info_rank']; ?>:</b> <?php echo $users->Rank($searchedUser['rank']); ?></ubuntu><br>
					<ubuntu><b><?php echo $language['profile_user_info_made_on']; ?>:</b> <?php echo @date("d-m-Y", $searchedUser['account_created']); ?></ubuntu><br>
					<ubuntu><b><?php echo $language['profile_user_info_last_login']; ?>:</b> <?php echo $core->timeAgo($searchedUser['last_online']); ?></ubuntu><br>
					<ubuntu><b><?php echo $language['profile_last_ip']; ?>:</b> <?php echo $searchedUser['ip_last']; ?></ubuntu><br>
					<ubuntu><b><?php echo $language['profile_user_bind_id']; ?>:</b> <?php echo $searchedUser['user_bind_id']; ?></ubuntu>
		
				</div>
		
				<div style="float: left;">
					
					<a class="overlowButton " style="text-shadow: none; margin-top: 0px; margin-left: 0px;" href="<?php echo HOST; ?>/home/<?php echo $searchedUser['id']; ?>">
												
						<b><u class="overlowButtonText" style="">
													
							<i><ubuntu><?php echo $language['go_to_home']; ?></ubuntu></i>
													
						</u></b>
														
						<div></div>
													
					</a>
										
					<a class="overlowButton userEditOpen" style="text-shadow: none; margin-top: 10px; margin-left: 0px;">
												
						<b><u class="overlowButtonText" style="">
													
							<i><ubuntu><?php echo $searchedUser['username']; ?> <?php echo $language['edit']; ?></ubuntu></i>
													
						</u></b>
														
						<div></div>
													
					</a> 
		
				</div>
		
				<input type="hidden" name="id" class="idUserToEdit" value="<?php echo $searchedUser['username']; ?>">
                
                </div>
		
			<?php
			}else{
			?>
            
            <div class="insideContainer space" style="font-family: Ubuntu, Arial; display: table;">
	
			<div class="errorMessageOverlow" style="width: 707px;">
	
				<?php echo $language['no_found']; ?>
		
			</div>
            
            </div>
	
			<?php } } ?>

		</div>

	</div>

</div>

<?php } ?>