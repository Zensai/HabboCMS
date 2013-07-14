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

<?php if($users->UserPermission('cms_manager_payments_logbook', $username)){ ?>

<script>
$(document).ready(function() {
    
	$("#onclickOpenManagerPaymentsLogbook").click(function () {
		$("#overlowManagerPaymentsLogbook").show("slide", { direction: "up" }, 1000);
		$(".overlowManagerIndex").fadeOut();
	});
	$("#onclickCloseManagerPaymentsLogbook").click(function () {
		$("#overlowManagerPaymentsLogbook").hide("slide", { direction: "down" }, 1000, function(){
			$(".overlowManagerIndex").fadeIn();
		});
	});

});
</script>

<div class="overlowContainer nobackground" id="overlowManagerPaymentsLogbook">

	<div class="container scroll" style="width: 560px;">
		
		<div class="top"></div>
		
		<div class="localOverlowTitleSettings"><b><ubuntu><?php echo $language['manager_menu_payments_logbook']; ?></ubuntu></b></div>
		
		<div id="onclickCloseManagerPaymentsLogbook" class="closeButton"></div>
		
		<div class="text" style="width: 500px;">
		
			<div class="loadingPaymentsLogbookSettings" style="display: none;"><img style="margin-left: 360px; margin-top:80px; margin-bottom: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></div>
            
            <div class="disepearthisPaymentsLogbookSettings">
            
            	<div class="insideContainer space">
                
                	<table style="width: 100%;">
                    
                    	<tr>
                        
                        	<td><b><ubuntu>Gebruiker</ubuntu></b></td>
                        	<td><b><ubuntu>Gekochte item</ubuntu></b></td>
                        	<td><b><ubuntu>Gekocht op</ubuntu></b></td>
                            
                        </tr>
                
						<?php
                        $query_manager_payments_logbook = mysql_query("SELECT * FROM manager_payments_logbook ORDER BY published DESC");
                        while($manager_payments_logbook = mysql_fetch_array($query_manager_payments_logbook)){
                        ?>                        
                        
                        	<tr>
                        
                                <td style="background-color: #FFFFFF; border: 1px solid #FFFFFF; border-radius: 3px; display: table; padding-left: 5px;"><?php echo $core->ExploitRetainer($users->UserInfoByID($manager_payments_logbook['user_id'], 'username')); ?></td>
                                <td style="background-color: #FFFFFF; border: 1px solid #FFFFFF; border-radius: 3px; display: table; padding-left: 5px;"><?php echo $core->paymentArrayName($manager_payments_logbook['payment_id']); ?></td>
                                <td style="background-color: #FFFFFF; border: 1px solid #FFFFFF; border-radius: 3px; display: table; padding-left: 5px;"><?php echo @date('d-m-Y', $manager_payments_logbook['published']); ?> om <?php echo @date('H:i', $manager_payments_logbook['published']); ?></td>
                            
                            </tr>
                        
                        <?php 
                        }
                        ?>
                    
                    </table>
                
                </div>
            
            </div>
        
        </div>
		
		<div class="bottom"></div>
		
	</div>

</div>

<?php } ?>