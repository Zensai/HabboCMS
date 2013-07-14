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

<script>
$(document).ready(function() {
    
	$("#onclickOpenLogout").click(function () {
		$("#overlowLogout").fadeIn("slow");
	});
	$("#onclickCloseLogout").click(function () {
		$("#overlowLogout").fadeOut("slow");
	});

});
</script>

<div class="overlowContainer" id="overlowLogout">

	<div class="container" style="width: 350px;">
		
		<div class="top"></div>
		
		<div id="onclickCloseLogout" class="closeButton"></div>
		
		<div class="text">
			
			<div id="frankAvatar"></div> 
				
			<div class="frankBubble left">

				<div class="frankBubbleArrowWhite"></div>
					
				<div class="frankBubbleText" style="">
					
					<?php echo $language['frank_logout']; ?>
						
				</div>
					
			</div>
            
            <a class="overlowButton" style="float: left; text-shadow: none; margin-top: 5px; margin-left: 5px;" href="<?php echo HOST; ?>/logout">
                    
                <b><u class="overlowButtonText" style="">
                        
                    <i><ubuntu><?php echo $language['log_out']; ?></ubuntu></i>
                        
                </u></b>
                            
                <div></div>
                        
            </a>
				
		</div>
		
		<div class="bottom"></div>
		
	</div>

</div>