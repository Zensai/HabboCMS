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
	
	$('.acceptCookiesButton').click(function(){
		$.post("<?php echo HOST; ?>/index?accept_cookie=yes", function(){
			$('#overlowAcceptCookies').fadeOut();
		});
	});

});
</script>


<div class="overlowContainer" id="overlowAcceptCookies" style="display: block";>

		<div style="margin-left: -200px; position: fixed; display: block; background: url(<?php echo HOST; ?>/web-gallery/general/overlow/floatBackground.png) repeat;">
        
        	<div class="container" style="width: 400px; margin-left: 50%; position: fixed; margin-top: 130px;">
		
			<div class="top"></div>
			
			<div style="width: 10px; height: 15px; margin-bottom: 10px; float: left;"></div>
        
        	<div style="margin-top: -20px;"></div>
		
			<div class="text" style="width: 360px; overflow-x: none;">
            
            	<img style="margin-top: -125px; margin-left: -20px;" align="left" src="<?php echo HOST; ?>/web-gallery/avatars/frank/frankAvatar.gif">
            
        		<div style="margin-top: -95px; margin-left: 50px; font-size: 25px; color: #FFFFFF; font-weight: bold;"><ubuntu>Frank</ubuntu></div>
                
                <div style="margin-top: 0px; margin-left: 50px; font-size: 15px; color: #FFFFFF; font-weight: normal;"><ubuntu><?php echo $language["index_lobby_cookie_title"]; ?></ubuntu></div>
                
                <div style="font-family: Ubuntu; font-weight: bold; font-size: 12px; margin-top: 20px; text-align: center;"><ubuntu><?php echo $language["index_lobby_cookie_second"]; ?></ubuntu></div>
            
            	<div style="max-height: 530px; margin-top: 10px; overflow-y: auto; overflow-x: hidden; font-size: 12px; padding-right: 10px; font-family: Ubuntu;">
                   
                   	<div style="padding-top: 10px;"><?php echo $language['index_lobby_cookie_text_second']; ?></div>
            
            	</div>
                
                <div style="border-top: 1px solid #CCCCCC; border-bottom: 1px solid #FFFFFF; width: 100%; margin-top: 20px;"></div>
                
                <center><a class="overlowButtonFloat acceptCookiesButton" style="margin-top: 15px; font-size: 12px; margin-right: 15px;"><b><u><ubuntu><?php echo $language["index_lobby_cookie_accept"]; ?></ubuntu></u></b><div></div></a></center>
            
        	</div>
		
			<div class="bottom"></div>
		
		</div>
    
    </div>

</div>