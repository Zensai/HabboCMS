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
    
	$("#onclickOpenAddNewsReaction").click(function () {
		$("#overlowAddNewsReaction").fadeIn("slow");
	});
	$("#onclickCloseAddNewsReaction").click(function () {
		$("#overlowAddNewsReaction").fadeOut("slow");
	});
	
	$(".sendTheMessageNews").click(function () {
		if($('#textareaAddNewsReaction').val().length < 20){
			$(".errorNewsReactionToLess").fadeIn("slow");
			setTimeout(function() { $(".errorNewsReactionToLess").fadeOut("slow"); }, 3500);
		}else{
			post_news_reaction();
		}
	});


});

function post_news_reaction(){

	var text = $('#textareaAddNewsReaction').val();
	var newsID = '<?php echo $core->ExploitRetainer($_GET['id']); ?>';

	$.post("<?php echo HOST; ?>/news/add/reaction", { text: text, newsID: newsID }, function() {
		$("#textareaAddNewsReaction").val("");
		$("#overlowAddNewsReaction").fadeOut("slow");
		$('.insideNewsReactions').html('<center><img style="margin-top:80px; margin-bottom: 80px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></center>');
    	$(".insideNewsReactions").load("<?php echo HOST; ?>/news/reactions/<?php echo $core->ExploitRetainer($_GET['id']); ?>");
	});

}
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

<div class="overlowContainer" id="overlowAddNewsReaction">
            
    <div class="addStreamMessageContainer">
	
		<div class="floatError errorNewsReactionToLess" style="margin-left: -210px; margin-top: 75px; width: 190px;">
		
			<div class="arrow"></div>
		
			<div class="text">
				
				<div class="title"><ubuntu><?php echo $language['error_news_reaction_to_less_title']; ?></ubuntu></div>
				<div class="second"><ubuntu><?php echo $language['error_news_reaction_to_less_second']; ?></ubuntu></div>
				
			</div>
		
		</div>
    
    	<div class="buttonContStream">
    
    		<a class="streamButton" id="onclickCloseAddNewsReaction" style="float: left; margin-left: 10px;">
				
				<b class="grey"><u class="streamButtonText" style="margin-top: -4px;">
						
					<ubuntu><?php echo $language['close']; ?></ubuntu>
							
				</u></b>
					
				<div class="streamButtonGrey"></div>
					
			</a>
            
            <a class="streamButton sendTheMessageNews" style="float: right; margin-left: 10px;">
				
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
        
        	<textarea class="textareaStream" id="textareaAddNewsReaction" name="textareaAddNewsReaction" onkeyup="limitTextCount('textareaAddNewsReaction', 'divcountNewsReaction', 300);" onkeydown="limitTextCount('textarea', 'divcountNewsReaction', 300);"></textarea>
            
			<div id="divcountNewsReaction">300</div>
        
        </div>
    
    </div>

</div>