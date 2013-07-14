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

<script src="<?php echo HOST; ?>/web-gallery/styles/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php echo HOST; ?>/web-gallery/styles/js/ubuntu.font.js" type="text/javascript"></script>
			
<script type="text/javascript">
	Cufon.replace("ubuntu");
</script>

<?php if($users->UserPermission('cms_manager_users', $username)){ ?>

<script>
$(document).ready(function() {
    
	$("#onclickOpenManagerUsers").click(function () {
		$("#overlowManagerUsers").show("slide", { direction: "up" }, 1000);
		$(".overlowManagerIndex").fadeOut();
	});
	
	$("#onclickCloseManagerUsers").click(function () {
		$("#overlowManagerUsers").hide("slide", { direction: "down" }, 1000, function(){
			$(".overlowManagerIndex").fadeIn();
		});
	});
	
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

});
</script>

<div class="overlowContainer nobackground" id="overlowManagerUsers">

	<div class="container scroll searchedUserDisepear">
	
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
		
		<div class="top"></div>
		
		<div class="localOverlowTitleSettings"><b><ubuntu><?php echo $language['manager_menu_users']; ?></ubuntu></b></div>
		
		<div id="onclickCloseManagerUsers" class="closeButton"></div>
		
		<div class="text textdisepearSearchedUser" style="width: 740px;">
		
			<div class="disepearSearchedUser">
		
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
			
			</div>
				
		</div>
		
		<div class="bottom"></div>
	
	</div>

</div>

<?php } ?>