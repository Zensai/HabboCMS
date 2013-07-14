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
    
	$(".lookAround1Button").click(function () {
		$(".lookAround1Container").fadeOut(function(){;
			$(".lookAround2Container").fadeIn("slow");
		});
	});
	
	$(".lookAround2Button").click(function () {
		$(".lookAround2Container").fadeOut(function(){
			$(".lookAround3Container").fadeIn("slow");
		});
	});
	
	$(".lookAround3Button").click(function () {
		$(".lookAround3Container").fadeOut(function(){
			$(".lookAround4Container").fadeIn("slow");
		});
	});
	
	$(".lookAround4Button").click(function () {
		$(".lookAround4Container").fadeOut(function(){
			$(".lookAround5Container").fadeIn("slow");
		});
	});
	
	$(".lookAround5Button").click(function () {
		$(".lookAround5Container").fadeOut(function(){
			$(".lookAround6Container").fadeIn("slow");
		});
	});
	
	$(".lookAround6Button").click(function () {
		$(".lookAround6Container").fadeOut(function(){
			$("#overlowLookAround").fadeOut(function(){
				$("#overlowProfile").fadeIn("slow");
			});
		});
	});

});
</script>

<style type="text/css">
#overlowLookAround .overlowButton {
	margin-right: 0px;
}
</style>

<div class="overlowContainer" id="overlowLookAround">

	<div class="lookAround1Container" style="width:300px; display: block; margin: 25px 25px 25px 35px;">
    
    	<div style="float: left; margin: 10px 0 0 -32px;"><img src="<?php echo HOST; ?>/web-gallery/homes/sticky/aanwijzers/sticker_arrow_up.gif"></div>
		
        <div style="display: table; float: left;">	
		
            <div id="frankAvatar" style="float: none;"></div>
            
            <a class="overlowButton lookAround1Button" style="text-shadow: none; margin-top: 5px; margin-left: 5px;">
                        
                <b><u class="overlowButtonText" style="">
                            
                    <i><ubuntu><?php echo $language["look_around_ok"]; ?></ubuntu></i>
                            
                </u></b>
                                
                <div></div>
                            
            </a> 
        
        </div>
				
		<div class="frankBubble left">

			<div class="frankBubbleArrowWhite"></div>
				
			<div class="frankBubbleText" style="">
					
				<?php echo $language["look_around1"]; ?>

			</div>
					
		</div>
            
	</div>
    
    <div class="lookAround2Container" style="width:900px; display: none; margin: auto;">
    
    	<div style="width:300px; margin: 170px 125px 0 0; display: table; float: right;">
    
            <div style="float: right; margin: 10px -32px 0 0;"><img src="<?php echo HOST; ?>/web-gallery/homes/sticky/aanwijzers/sticker_arrow_up.gif"></div>
            
            <div style="display: table; float: right;">	
            
                <div id="frankAvatarOther" style="float: none;"></div>
                
                <a class="overlowButton lookAround2Button" style="text-shadow: none; margin-top: 5px; margin-left: 5px;">
                            
                    <b><u class="overlowButtonText" style="">
                                
                        <i><ubuntu><?php echo $language["look_around_ok"]; ?></ubuntu></i>
                                
                    </u></b>
                                    
                    <div></div>
                                
                </a> 
            
            </div>
                    
            <div class="frankBubble right">
    
                <div class="frankBubbleArrowWhiteOther"></div>
                    
                <div class="frankBubbleText" style="">
                        
                    <?php echo $language["look_around2"]; ?>

                </div>
                        
            </div>
        
        </div>
            
	</div>
    
    <div class="lookAround3Container" style="width:900px; display: none; margin: auto;">
    
    	<div style="width:300px; margin: 170px 155px 0 0; display: table; float: right;">
    
            <div style="float: right; margin: 10px -32px 0 0;"><img src="<?php echo HOST; ?>/web-gallery/homes/sticky/aanwijzers/sticker_arrow_up.gif"></div>
            
            <div style="display: table; float: right;">	
            
                <div id="frankAvatarOther" style="float: none;"></div>
                
                <a class="overlowButton lookAround3Button" style="text-shadow: none; margin-top: 5px; margin-left: 5px;">
                            
                    <b><u class="overlowButtonText" style="">
                                
                        <i><ubuntu><?php echo $language["look_around_ok"]; ?></ubuntu></i>
                                
                    </u></b>
                                    
                    <div></div>
                                
                </a> 
            
            </div>
                    
            <div class="frankBubble right">
    
                <div class="frankBubbleArrowWhiteOther"></div>
                    
                <div class="frankBubbleText" style="">
                        
                    <?php echo $language["look_around3"]; ?>

                </div>
                        
            </div>
        
        </div>
            
	</div>
    
    <div class="lookAround4Container" style="width:900px; display: none; margin: auto;">
    
    	<div style="width:300px; margin: 170px 185px 0 0; display: table; float: right;">
    
            <div style="float: right; margin: 10px -32px 0 0;"><img src="<?php echo HOST; ?>/web-gallery/homes/sticky/aanwijzers/sticker_arrow_up.gif"></div>
            
            <div style="display: table; float: right;">	
            
                <div id="frankAvatarOther" style="float: none;"></div>
                
                <a class="overlowButton lookAround4Button" style="text-shadow: none; margin-top: 5px; margin-left: 5px;">
                            
                    <b><u class="overlowButtonText" style="">
                                
                        <i><ubuntu><?php echo $language["look_around_ok"]; ?></ubuntu></i>
                                
                    </u></b>
                                    
                    <div></div>
                                
                </a> 
            
            </div>
                    
            <div class="frankBubble right">
    
                <div class="frankBubbleArrowWhiteOther"></div>
                    
                <div class="frankBubbleText" style="">
                        
                    <?php echo $language["look_around4"]; ?>

                </div>
                        
            </div>
        
        </div>
            
	</div>
    
    <div class="lookAround5Container" style="width:900px; display:none; margin: auto;">
    
    	<div style="width:300px; margin: 190px 55px 0 0; display: table; float: right;">
    
            <div style="float: right; margin: 10px -32px 0 0;"><img src="<?php echo HOST; ?>/web-gallery/homes/sticky/aanwijzers/sticker_arrow_up.gif"></div>
            
            <div style="display: table; float: right;">	
            
                <div id="frankAvatarOther" style="float: none;"></div>
                
                <a class="overlowButton lookAround5Button" style="text-shadow: none; margin-top: 5px; margin-left: 5px;">
                            
                    <b><u class="overlowButtonText" style="">
                                
                        <i><ubuntu><?php echo $language["look_around_ok"]; ?></ubuntu></i>
                                
                    </u></b>
                                    
                    <div></div>
                                
                </a> 
            
            </div>
                    
            <div class="frankBubble right">
    
                <div class="frankBubbleArrowWhiteOther"></div>
                    
                <div class="frankBubbleText" style="">
                        
                    <?php echo $language["look_around5"]; ?>

                </div>
                        
            </div>
        
        </div>
            
	</div>
	
	<div class="lookAround6Container" style="width:900px; display:none; margin: auto;">
    
    	<div style="width:300px; margin: 344px 167px 0 0; display: table; float: right;">
    
            <div style="float: right; margin: 10px -32px 0 0;"><img src="<?php echo HOST; ?>/web-gallery/homes/sticky/aanwijzers/sticker_arrow_up.gif"></div>
            
            <div style="display: table; float: right;">	
            
                <div id="frankAvatarOther" style="float: none;"></div>
                
                <a class="overlowButton lookAround6Button" style="text-shadow: none; margin-top: 5px; margin-left: 5px;">
                            
                    <b><u class="overlowButtonText" style="">
                                
                        <i><ubuntu><?php echo $language["look_around_ok"]; ?></ubuntu></i>
                                
                    </u></b>
                                    
                    <div></div>
                                
                </a> 
            
            </div>
                    
            <div class="frankBubble right">
    
                <div class="frankBubbleArrowWhiteOther"></div>
                    
                <div class="frankBubbleText" style="">
                        
                    <?php echo $language["look_around6"]; ?>

                </div>
                        
            </div>
        
        </div>
            
	</div>

</div>