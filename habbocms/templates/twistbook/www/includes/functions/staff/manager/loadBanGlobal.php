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
?>

<script>
$(document).ready(function() {
    
});

function loadBan(id){
	$('.lookupBanInformation').fadeIn();
	$('.lookupBanInformation').html('<center><img style="margin-top:50px; margin-bottom: 50px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></center>');
	$.post('<?php echo HOST; ?>/manager/ban/global/load/' + id, { id: id }, function(data){
		$('.lookupBanInformation').html(data);
	});
}
</script>

<div class="insideContainer space lookupBanInformation" style="display: none;">

	<center><img style="margin-top:50px; margin-bottom: 50px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></center>

</div>

<div class="insideContainer space">

	<div style="margin-left: -1px; width: 100%;">

	<?php 
	$query_bans = mysql_query("SELECT * FROM bans ORDER BY added_date");
	$bans_check = mysql_num_rows($query_bans);
	if($bans_check == 0){ echo '<div class="errorMessageOverlow" style="width: 708px;">'.$language['manager_ban_settings_ban_no_bans_found'].'</div>'; }
	while($bans = mysql_fetch_array($query_bans)){
		if($bans['bantype'] == 'ip'){
	?>
        	<div class='banIP<?php echo $bans['id']; ?>' style="background-color: #EEEEEE; border: 1px solid #EEEEEE; border-radius: 3px; padding: 7px 5px 6px 5px; margin-top: 1px; width: 233px; display: table; float: left; margin-left: 1px; cursor: pointer;">
                    
            	<script>
				$(document).ready(function(){
					$('.banIP<?php echo $bans['id']; ?>').click(function(){
						loadBan('<?php echo $bans['id']; ?>');
					});
				});
				</script>
                    
                <img style="float: left; margin-top: 2px;" src="<?php echo HOST; ?>/web-gallery/icons/ip_icon.gif"> 
						
				<div style="float: left; font-weight: bold; padding-left: 5px; <?php if($bans['expire'] < time()){ ?>text-decoration: line-through underline overline;<?php } ?>"><?php echo $bans['value']; ?></div>
                    
            </div>
            		
		<?php
		}elseif($bans['bantype'] == 'user'){
		?>
            <div class='banUser<?php echo $bans['id']; ?>' style="background-color: #EEEEEE; border: 1px solid #EEEEEE; border-radius: 3px; padding: 5px; margin-top: 1px; width: 233px; display: table; float: left; margin-left: 1px; cursor: pointer;">
                    
                <script>
				$(document).ready(function(){
					$('.banUser<?php echo $bans['id']; ?>').click(function(){
						loadBan('<?php echo $bans['id']; ?>');
					});
				});
				</script>
                    
                <img style="float: left;" src="<?php echo HOST; ?>/web-gallery/icons/user_icon.gif"> 
                    
                <div style="float: left; font-weight: bold; padding-left: 5px;"><?php echo $bans['value']; ?></div>
                    
            </div>
    <?php
		}
	}
	?>
    
    </div>
                
</div>
