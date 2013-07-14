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

<?php if($users->UserPermission('cms_manager_rank', $username)){ ?>

<script>
$(document).ready(function() {
    
	$("#onclickOpenManagerRank").click(function () {
		$("#overlowManagerRank").show("slide", { direction: "up" }, 1000);
		$(".overlowManagerIndex").fadeOut();
	});
	
	$("#onclickCloseManagerRank").click(function () {
		$("#overlowManagerRank").hide("slide", { direction: "down" }, 1000, function(){
			$(".overlowManagerIndex").fadeIn();
		});
	});
	
	$('.addRankCont').click(function() { 
		$('.addRankBox').slideDown();
	});
	
	$('.addRankConf').click(function() { 
		$('.addRankBox').slideUp();
		addNewRank();
		LoadSecondRankIndexAddRank();
	});
	
	function addNewRank(){

		var add_rank_name = $('#add_rank_name').val();
		var add_rank_id = $('#add_rank_id').val();
		var add_rank_badgeid = $('#add_rank_badgeid').val();

		$.post("<?php echo HOST; ?>/manager/rank/add", { add_rank_name: add_rank_name, add_rank_id: add_rank_id, add_rank_badgeid: add_rank_badgeid }, function(result){ });

	}
	
	function LoadSecondRankIndexAddRank() {
		$('.textdisepearDataRank').html('<img style="margin-left: 360px; margin-top:80px; margin-bottom: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif">');
		$.ajax({
			type: "GET",
			url: "<?php echo HOST; ?>/manager/rank/second",
			data: "rankIdEdit=" + $('#rankIdEdit').val(),
			success: function(php){
				$('.textdisepearDataRank').html(php);
			}
		});
	}

});
</script>

<div class="overlowContainer nobackground" id="overlowManagerRank">

	<div class="container scroll dataRankDisepear">
		
		<div class="top"></div>
		
		<div class="localOverlowTitleSettings"><b><ubuntu><?php echo $language['manager_menu_rank_settings']; ?></ubuntu></b></div>
		
		<div id="onclickCloseManagerRank" class="closeButton"></div>
		
		<div class="text textdisepearDataRank" style="width: 740px;">
		
			<div class="disepearDataRank">
				
				<a class="overlowButton addRankCont" style="text-shadow: none; margin-top: -45px; margin-right: 20px; float: right;">
										
					<b><u class="overlowButtonText" style="">
															
						<i><ubuntu><?php echo $language['manager_rank_add_rank']; ?></ubuntu></i>
															
					</u></b>
																
					<div></div>
															
				</a> 
            	
				<div style="margin-top: -20px;"></div>
        
        		<div class="insideContainer space addRankBox" style="display: none;">
        
        			<label><ubuntu><?php echo $language['manager_rank_rankname']; ?></ubuntu></label>
				
					<br>
		
					<input type="text" id="add_rank_name" value="">
            
            		<label><ubuntu><?php echo $language['manager_rank_rankid']; ?></ubuntu></label>
				
					<br>
		
					<input type="text" id="add_rank_id" value="">
            
            		<label><ubuntu><?php echo $language['manager_rank_rankbadgeid']; ?></ubuntu></label>
				
					<br>
		
					<input type="text" id="add_rank_badgeid" value="">
					
					<a class="overlowButton addRankConf" style="text-shadow: none; margin-top: 10px; margin-left: 0px; float: right;">
										
						<b><u class="overlowButtonText" style="">
																
							<i><ubuntu><?php echo $language['submit']; ?></ubuntu></i>
																
						</u></b>
																	
						<div></div>
																
					</a> 
        
        		</div>
            
            	<?php 
				$query_manager_rank = mysql_query("SELECT * FROM ranks ORDER BY id");
				while($manager_rank = mysql_fetch_array($query_manager_rank)){
				?>
                
                	<script>
					$(document).ready(function() {
	
						$('.dataRankResults<?php echo $manager_rank['id']; ?>').click(function() { 
							LoadDataRank<?php echo $manager_rank['id']; ?>();
							$('.disepearDataRank').hide();
						});

						function LoadDataRank<?php echo $manager_rank['id']; ?>() {
							$('.textdisepearDataRank').html('<img style="margin-left: 360px; margin-top:80px; margin-bottom: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif">');
							$.ajax({
								url: "<?php echo HOST; ?>/manager/rank/edit/<?php echo $manager_rank['id']; ?>",
								success: function(php){
									$('.textdisepearDataRank').html(php);
								}
							});
						}
						
						$('.dataRankDelete<?php echo $manager_rank['id']; ?>').click(function() { 
							DeleteDataRank<?php echo $manager_rank['id']; ?>();
							$('.rank<?php echo $manager_rank['id']; ?>').fadeOut();
						});
						
						function DeleteDataRank<?php echo $manager_rank['id']; ?>(){

							var id = '<?php echo $manager_rank['id']; ?>';

							$.post("<?php echo HOST; ?>/manager/rank/delete", { id: id }, function(result){ });

						}
						
						$('img').error(function(){
        					$(this).attr('src', '<?php echo HOST; ?>/web-gallery/icons/error.gif');
						});

					});
					</script>
		
					<div class="insideContainer space rank<?php echo $manager_rank['id']; ?>">
			
						<ubuntu style="font-size: 16px; margin-top: 10px;">Rank: <b><?php echo $manager_rank['name']; ?></b></ubuntu>
                        
                        <center><img style="margin-bottom: -30px; margin-top: -10px;" src="<?php echo $badge_url; ?><?php echo $manager_rank['badgeid']; ?>.gif"></center>
						
						<a class="overlowButton dataRankResults<?php echo $manager_rank['id']; ?>" style="text-shadow: none; margin-top: 0px; margin-left: 0px; float: right;">
										
							<b><u class="overlowButtonText" style="">
																	
								<i><ubuntu><?php echo $language['edit']; ?></ubuntu></i>
																	
							</u></b>
																		
							<div></div>
																	
						</a> 
						
						<a class="overlowButton dataRankDelete<?php echo $manager_rank['id']; ?>" style="text-shadow: none; margin-top: 0px; margin-right: 10px; float: right;">
										
							<b><u class="overlowButtonText" style="">
																	
								<i><ubuntu><?php echo $language['delete']; ?></ubuntu></i>
																	
							</u></b>
																		
							<div></div>
																	
						</a> 
                
					</div>
                
                <?php } ?>
			
			</div>
				
		</div>
		
		<div class="bottom"></div>
	
	</div>

</div>

<?php } ?>