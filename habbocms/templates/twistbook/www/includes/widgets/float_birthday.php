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
    
	$("#onclickCloseBirthday").click(function () {
		$("#overlowBirthday").fadeOut("slow");
	});

});
</script>

<div class="overlowContainer" id="overlowBirthday" style="display: block;" >

	<div style="margin-top: 50%;">

	<div class="container" style="width: 430px;margin-top: -30%;">
		
		<div class="top"></div>
		
		<div id="onclickCloseBirthday"" class="closeButton"></div>
        
        <div style="margin-top: -20px;"></div>
		
		<div class="text" style="width: 100%; overflow-x: none;">
            
            <img style="margin-top: -165px; margin-left: 2px; margin-bottom: -20px;" align="left" src="<?php echo HOST; ?>/web-gallery/general/birthday/happy_birthday.gif">
            
        	<div style="margin-top: -80px; margin-left: 40px; font-size: 25px; color: #FFFFFF; font-weight: bold;"></div>
            
        	<div class="insideContainer" style="overflow-x: none;">
            
				<div id="frankAvatar"></div> 
					
				<div class="frankBubble left">

					<div class="frankBubbleArrowWhite"></div>
						
					<div class="frankBubbleText" style="">
						
						Je bent jarig, jarige febbo. Je bent jarig, wat heb je in petto. Je bent jarig, maar ook een heeeee.. ug ug ug... eeeld! Je bent jarig, dat is wat telt!<br><br>Van harte gefeliciteert met jou verjaardag!<br><Br>
							
					</div>
						
				</div>
            
            </div>
			
			<div style="background-image: url(<?php echo HOST; ?>/web-gallery/general/birthday/birthday.gif); width: 188px; height: 149px; float: right; margin: -129px -20px -20px 0;"></div>
            
        </div>
		
		<div class="bottom"></div>
		
	</div>
	
	</div>

</div>