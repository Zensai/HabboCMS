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
    
	$("#onclickOpenShutdown").click(function () {
		$("#overlowShutdown").fadeIn("slow");
	});
	$("#onclickCloseShutdown").click(function () {
		$("#overlowShutdown").fadeOut("slow");
	});
	
	$(".onclickPostSettingShutdownAndClose").click(function () {
		$("#overlowShutdown").fadeOut("slow");
		$.post("<?php echo HOST; ?>/local/shutdown", { shutdown: "yes" });
	});

});
</script>

<div class="overlowContainer" id="overlowShutdown">

	<div class="container" style="width: 350px;">
		
		<div class="top"></div>
		
		<div id="onclickCloseShutdown" class="closeButton"></div>
		
		<div class="text">
			
			<div id="frankAvatar"></div> 
				
			<div class="frankBubble left">

				<div class="frankBubbleArrowWhite"></div>
					
				<div class="frankBubbleText" style="">
					
					<?php echo $language['frank_shutdown']; ?>
						
				</div>
					
			</div>
            
            <a class="overlowButton onclickPostSettingShutdownAndClose" style="float: left; text-shadow: none; margin-top: 5px; margin-left: 75px;">
                    
                	<b><u class="overlowButtonText" style="">
                        
                    	<i><ubuntu>Ja, ik wil het hotel afsluiten</ubuntu></i>
                        
                	</u></b>
                            
                	<div></div>
                        
            	</a>
				
		</div>
		
		<div class="bottom"></div>
		
	</div>

</div>