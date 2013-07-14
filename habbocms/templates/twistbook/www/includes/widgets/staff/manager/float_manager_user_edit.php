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
	
	$('.backToUsersSecond').click(function() { 
		SubmitFormEditUser();
		LoadSearchUser('<?php echo HOST; ?>/manager/users/searched/results', $('.editSecondUsername').attr('value'));
		$('.disepearSearchedUser').hide();
	});

	function LoadSearchUser(pageName, value) {
		$('.loaderForEdit').html('<img style="margin-left: 360px; margin-top:80px; margin-bottom: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif">');
		$.ajax({
			type: "POST",
			url: "" + pageName + "/" + value,
			data: "searchUser=" + $('#searchUser').val('<?php echo $core->ExploitRetainer($_POST['username']); ?>'),
			success: function(php){
				$('.textdisepearSearchedUser').html(php);
				$('.loaderForEdit').hide();
			}
		});
	}
	
	function SubmitFormEditUser() {
		$.ajax({
			type: "POST",
			url: "<?php echo HOST; ?>/manager/user/edit",
			data: "id=" + $('#edit_user_id').val() + "&motto=" + $('#edit_user_motto').val() + "&mail=" + $('#edit_user_mail').val() + "&vip=" + $('#edit_user_vip').val() + "&rank=" + $('#edit_user_rank').val() + "&credits=" + $('#edit_user_credits').val() + "&pixels=" + $('#edit_user_pixels').val() + "&vip_points=" + $('#edit_user_vip_points').val() + "&belcr=" + $('#edit_user_belcr').val(),
		});
	}
	
	$('.backToUsersNoSave').click(function() { 
		LoadSearchUserNoSave('<?php echo HOST; ?>/manager/users/searched/results', $('.editSecondUsername').attr('value'));
		$('.disepearSearchedUser').hide();
	});

	function LoadSearchUserNoSave(pageName, value) {
		$('.textdisepearSearchedUser').html('<img style="margin-left: 360px; margin-top:80px; margin-bottom: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif">');
		$.ajax({
			type: "POST",
			url: "" + pageName + "/" + value,
			data: "searchUser=" + $('#searchUser').val('<?php echo $core->ExploitRetainer($_POST['username']); ?>'),
			success: function(php){
				$('.textdisepearSearchedUser').html(php);
			}
		});
	}

});
</script>

<div class="textdisepearSearchedUser">

	<div class="loaderForEdit"></div>

	<div class="disepearSearchedUser">
	
		<?php 
		$queryEditUser = mysql_query("SELECT * FROM users WHERE username = '".$core->ExploitRetainer($_POST['username'])."'");
		$editUser = mysql_fetch_array($queryEditUser);
		?>

		<div class="insideContainer space" style="font-family: Ubuntu, Arial; display: table;">

			<img align="right" src="<?php echo $avatarimage_url; ?>?figure=<?php echo $editUser['look']; ?>&direction=4&head_direction=3&gesture=sml">
			
			<div class="localOverlowTitleSecond"><ubuntu><?php echo $editUser['username']; ?> <?php echo $language['edit']; ?></ubuntu></div>
				
			<br><br>
			
			<label><ubuntu><?php echo $language['profile_username']; ?></ubuntu></label>
				
			<br>
		
			<input type="text" id="edit_user_username" disabled style="width: 660px;" value="<?php echo $editUser['username']; ?>">
			
			<br>
				
			<label><ubuntu><?php echo $language['profile_motto']; ?></ubuntu></label>
				
			<br>
		
			<input type="text" name="edit_user_motto" id="edit_user_motto" value="<?php echo $editUser['motto']; ?>">
			
			<br>
            
            <div style="width: 363px; float: left;">
			
				<label style="font-size: 1.15em"><ubuntu><?php echo $language['profile_mail']; ?></ubuntu></label>
				
				<br>
		
				<input type="text" name="edit_user_mail" id="edit_user_mail" value="<?php echo $editUser['mail']; ?>">
            
            </div>
            
            <div style="width: 364px; margin-left: 10px; margin-right: -10px; float: left;">
			
				<label style="font-size: 1.15em"><ubuntu><?php echo $language['manager_users_vip']; ?></ubuntu></label>
				
				<br>
		
				<select class="select" name="edit_user_vip" style="background-color: #FFFFFF; width: 100%;" id="edit_user_vip">
					
					<option <?php if($editUser['vip'] == 0){ echo 'selected'; } ?> value="0"><?php echo $language['no']; ?></option>
                    <option <?php if($editUser['vip'] == 1){ echo 'selected'; } ?> value="1"><?php echo $language['yes']; ?></option>
				
				</select>
			
			</div>
			
			<div style="width: 239px; float: left;">
			
				<label style="font-size: 1.15em"><ubuntu><?php echo $language['profile_user_info_rank']; ?></ubuntu></label>
				
				<br>
		
				<select class="select" name="edit_user_rank" style="background-color: #FFFFFF; width: 100%;" id="edit_user_rank">
					
					<?php 
					$queryEditUserRank = mysql_query("SELECT * FROM ranks ORDER BY id LIMIT 20");
					while($editUserRank = mysql_fetch_array($queryEditUserRank)){
					?>
					
					<option <?php if($editUser['rank'] == $editUserRank['id']){ echo 'selected'; } ?> value="<?php echo $editUserRank['id']; ?>"><?php echo $editUserRank['name']; ?></option>
					
					<?php } ?>
				
				</select>
			
			</div>
			
			<div style="width: 239px; margin-left: 10px; float: left;">
			
				<label style="font-size: 1.15em"><ubuntu><?php echo $language['profile_user_info_credits']; ?></ubuntu></label>
				
				<br>
		
				<input type="text" name="edit_user_credits" style="background-color: #FFFFFF;" id="edit_user_credits" value="<?php echo $editUser['credits']; ?>">
			
			</div>
			
			<div style="width: 239px; float: left; margin-left: 10px; margin-right: -10px;">
			
				<label style="font-size: 1.15em"><ubuntu><?php echo $language['profile_user_info_pixels']; ?></ubuntu></label>
				
				<br>
		
				<input type="text" name="edit_user_pixels" style="background-color: #FFFFFF;" id="edit_user_pixels" value="<?php echo $editUser['activity_points']; ?>">
			
			</div>
            
            <div style="width: 363px; float: left;">
			
				<label style="font-size: 1.15em"><ubuntu><?php echo $language['vip_points']; ?></ubuntu></label>
				
				<br>
		
				<input type="text" <?php if($users->UserPermission('cms_manager_give_eventpoints', $username)){ }else{ echo 'disabled'; } ?> name="edit_user_vip_points" style="background-color: #FFFFFF;" id="edit_user_vip_points" value="<?php echo $editUser['vip_points']; ?>">
			
			</div>
            
            <div style="width: 363px; float: left; margin-left: 10px; margin-right: -10px;">
			
				<label style="font-size: 1.15em"><ubuntu><?php echo $language['belcr']; ?></ubuntu></label>
				
				<br>
		
				<input type="text" name="edit_user_belcr" style="background-color: #FFFFFF;" id="edit_user_belcr" value="<?php echo $editUser['belcredits']; ?>">
			
			</div>
			
			<input type="hidden" id="edit_user_id" value="<?php echo $editUser['id']; ?>">
			
			<input type="hidden" class="editSecondUsername" value="<?php echo $editUser['username']; ?>">

		</div>
		
		<a class="overlowButton backToUsersSecond" style="text-shadow: none; margin-top: 10px; margin-left: 0px; float: right;">
									
			<b><u class="overlowButtonText" style="">
										
				<i><ubuntu><?php echo $language['submit']; ?></ubuntu></i>
										
			</u></b>
											
			<div></div>
										
		</a> 
		
		<a class="overlowButton backToUsersNoSave" style="text-shadow: none; margin-top: 10px; margin-left: 0px; float: left;">
                            
			<b><u class="overlowButtonText" style="">
										
				<i><ubuntu><?php echo $language['stop']; ?></ubuntu></i>
										
			</u></b>
											
			<div></div>
										
		</a>
		
	</div>
	
</div>

<script type="text/javascript">

</script>

<?php } ?>