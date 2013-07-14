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
    
	$("#onclickOpenStreamAddMessage").click(function () {
		$("#overlowStreamAddMessage").fadeIn("slow");
	});
	$("#onclickCloseStreamAddMessage").click(function () {
		$("#overlowStreamAddMessage").fadeOut("slow");
	});
	
	$(".sendTheMessageStream").click(function () {
		$.post("<?php echo HOST; ?>/stream/post/message", { text: $('#textareaStream').val() }, function(){
			$(".insideStream").load("<?php echo HOST; ?>/stream/messages");
			$("#overlowStreamAddMessage").fadeOut("slow", function(){
				$("#textareaStream").val("");
			});
		});
	});


});
</script>

<script language="JavaScript">
function limitTextCount(limitField_id, limitCount_id, limitNum){
    var limitField = document.getElementById(limitField_id);
    var limitCount = document.getElementById(limitCount_id);

    var fieldLEN = limitField.value.length;

    if (fieldLEN > limitNum){
        limitField.value = limitField.value.substring(0, limitNum);
    }else{
        limitCount.innerHTML = (limitNum - fieldLEN);
    }
}
</script>

<div class="overlowContainer" id="overlowStreamAddMessage">
            
    <div class="addStreamMessageContainer">
    
    	<div class="buttonContStream">
    
    		<a class="streamButton" id="onclickCloseStreamAddMessage" style="float: left; margin-left: 10px;">
				
				<b class="grey"><u class="streamButtonText" style="margin-top: -4px;">
						
					<ubuntu><?php echo $language['close']; ?></ubuntu>
							
				</u></b>
					
				<div class="streamButtonGrey"></div>
					
			</a>
            
            <a class="streamButton sendTheMessageStream" style="float: right; margin-left: 10px;">
				
				<b class="blue"><u class="streamButtonText" style="margin-top: -4px;">
						
					<ubuntu><?php echo $language['send']; ?></ubuntu>
							
				</u></b>
					
				<div class="streamButtonBlue"></div>
					
			</a>
            
        </div>
        
        <div class="fromWhoStreamCont">
        
        	<ubuntu><b style="color: #8C8C8C;font-style: normal;font-weight: normal;"><?php echo $language['from']; ?>:</b> <b><?php echo $core->ExploitRetainer($users->UserInfo($username, 'username')); ?></b></ubuntu>
        
        </div>
        
        <div class="textareaStreamCont">
        
        	<textarea class="textareaStream" id="textareaStream" name="textareaStream" onkeyup="limitTextCount('textareaStream', 'divcount', 140);" onkeydown="limitTextCount('textareaStream', 'divcount', 140);" placeholder="Waar denk je aan? Wat houd je bezig?"></textarea>
            
			<div id="divcount">140</div>
        
        </div>
    
    </div>

</div>