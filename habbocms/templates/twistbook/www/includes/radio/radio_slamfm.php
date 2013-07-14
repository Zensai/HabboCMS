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
include("../../includes/inc.global.php");

$menu = 'radio';
$page = 'radio';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $hotelname; ?> ~ SlamFM Radio</title>
<?php echo $Style->General(); ?>
</head>

<body style="margin: 0; padding: 0; width: 305px; margin-right: -4px; overflow: hidden; resize: none; background: none;">

<script>
$(document).ready(function() {
	$('.openRequest').click(function(){
		$('#overlowRequest').fadeIn();
	});
	
    $('.sendRequest').click(function(){
		var message = $('.valueRequest').val();
		if(message.length > 10){
			$.post("<?php echo HOST; ?>/send/dj/contact/request", { message: message }, function(data){
				$('#overlowRequest').fadeOut(function(){
					$('.valueRequest').val('');
				});
			});
		}else{
			$('.errorRequest').slideDown();
			setTimeout(function(){ $('.errorRequest').slideUp(); }, 1500);
		}
	});
	
	$('#onclickCloseRequest').click(function(){
		$('#overlowRequest').fadeOut();
	});
});
</script>

<div class="overlowContainer" id="overlowRequest" style="display: none; z-index: 90294;">

	<div class="container" style="width: 260px;">
		
		<div class="top"></div>
        
        <div id="onclickCloseRequest" class="closeButton"></div>
        
        <div class="localOverlowTitleSettings" style=""><b><ubuntu>Request versturen</ubuntu></b></div>
		
		<div class="text" style="width: 100%;">
        
        	<div class="errorMessageOverlow errorRequest" style="width: 190px; margin-bottom: 20px; display: none;">Jou bericht is te kort!</div>
        
        	<textarea class="input valueRequest" style="height: 200px; width: 215px;" placeholder="Vul hier wat in"></textarea>
            
            <a class="overlowButton sendRequest" style="float: right; text-shadow: none; margin-top: 5px; margin-right: 40px;">
                    
                <b><u class="overlowButtonText" style="">
                                
                    <i><ubuntu>Request versturen</ubuntu></i>
                                
                </u></b>
                                    
                <div></div>
                                
            </a>
        
        </div>
        
    	<div class="bottom"></div>
        
    </div>
    
</div>

<script>
$(document).ready(function() {
	$('.openShout').click(function(){
		$('#overlowShout').fadeIn();
	});
	
    $('.sendShout').click(function(){
		var message = $('.valueShout').val();
		if(message.length > 10){
			$.post("<?php echo HOST; ?>/send/dj/contact/shout", { message: message }, function(data){
				$('#overlowShout').fadeOut(function(){
					$('.valueShout').val('');
				});
			});
		}else{
			$('.errorShout').slideDown();
			setTimeout(function(){ $('.errorShout').slideUp(); }, 1500);
		}
	});
	
	$('#onclickCloseShout').click(function(){
		$('#overlowShout').fadeOut();
	});
});
</script>

<div class="overlowContainer" id="overlowShout" style="display: none; z-index: 90294;">

	<div class="container" style="width: 260px;">
		
		<div class="top"></div>
        
        <div id="onclickCloseShout" class="closeButton"></div>
        
        <div class="localOverlowTitleSettings" style=""><b><ubuntu>Shout versturen</ubuntu></b></div>
		
		<div class="text" style="width: 100%;">
        
        	<div class="errorMessageOverlow errorShout" style="width: 190px; margin-bottom: 20px; display: none;">Jou bericht is te kort!</div>
        
        	<textarea class="input valueShout" style="height: 200px; width: 215px;" placeholder="Vul hier wat in"></textarea>
            
            <a class="overlowButton sendShout" style="float: right; text-shadow: none; margin-top: 5px; margin-right: 40px;">
                    
                <b><u class="overlowButtonText" style="">
                                
                    <i><ubuntu>Shout versturen</ubuntu></i>
                                
                </u></b>
                                    
                <div></div>
                                
            </a>
        
        </div>
        
    	<div class="bottom"></div>
        
    </div>
    
</div>


<div style="background-image: url(<?php echo HOST; ?>/web-gallery/general/radio/logo_bg.png); width: 305px; display: table;">
	<center>
    	<div style="background-image: url(<?php echo HOST; ?>/web-gallery/general/radio/logo_febbofm.png); width: 263px; height: 49px; margin-top: 20px; margin-bottom: 20px;"></div>
    </center>
</div>

<embed type="application/x-shockwave-flash" src="http://www.onlineluisteren.nl/player.swf" style="undefined" id="mpl" name="mpl" quality="high" allowfullscreen="true" allowscriptaccess="always" wmode="opaque" flashvars="file=http://178.32.3.53:1122/listen.mp3&amp;type=sound&amp;stretching=fill&amp;autostart=true&amp;controlbar=bottom&amp;duration=9999" height="24" width="305">

<div style="width: 305px; background-color: #EEE; padding: 20px; border-bottom: 2px solid #B7B7B7; display: table;">
    
    <div class="avatar" style="background: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>.gif) 0px 0px; width: 64px; height: 80px; margin-bottom: -20px; margin-left: -10px; margin-top: -10px; float: left; border-bottom: 2px solid #EAEAEA;"></div>
    
    <font style="font-size: 15px;"><ubuntu>Wie draait er? <b><?php echo $core->ExploitRetainer($users->UserInfo($username, 'username')); ?></b></ubuntu></font><br /><br />
    <font style="font-size: 12px;"><ubuntu>Wat draait er? <br /><b>
   
		<!--- <iframe id="iframeDisableRightClick" onload="disableContextMenu();" scrolling="no" style="width: 591px; height: 235px; border: 0; margin-top: -1px;" src="<?php echo HOST; ?>/load/playing/now"></iframe> --->
    	Nog niet vast te stellen
    
    </b></ubuntu></font>

</div>

<script>
$(document).ready(function(e) {
    $(".stream").load("<?php echo HOST; ?>/radio/stream");
	$(".refreshStream").click(function() {
		$(".stream").html('<center><img style="margin-top: 150px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_bubbles.gif"></center>');
     	$(".stream").load("<?php echo HOST; ?>/radio/stream");
  	});
});
</script>

<div id="refresh" class="refreshStream" title="<?php echo $language['refresh']; ?>" style="float: right;cursor: pointer; margin-right: 15px; margin-top: 5px; margin-bottom: -16px;"><img src="<?php echo HOST; ?>/web-gallery/icons/refresh.gif" /></div>

<div class="stream" style="width: 305px; height: 400px; z-index: 999; max-height: 600px; overflow-x: hidden; overflow-y: scroll;"><center><img style="margin-top: 150px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_bubbles.gif"></center></div>

<div class="overlowToStream" style="background-image: url(<?php echo HOST; ?>/web-gallery/general/radio/js_reception_backdrop_left.png); width: 305px; height: 208px; margin-top: -208px; z-index: 99999; position: fixed;">

	 <a class="overlowButton openRequest" style="float: right; text-shadow: none; margin-top: 175px; margin-right: 5px;">
                    
     	<b><u class="overlowButtonText" style="">
                        
       		<i><ubuntu>Request</ubuntu></i>
                        
     	</u></b>
                            
      	<div></div>
                        
  	</a>
    
    <a class="overlowButton openShout" style="float: right; text-shadow: none; margin-top: 175px; margin-right: 5px;">
                    
     	<b><u class="overlowButtonText" style="">
                        
       		<i><ubuntu>Shout</ubuntu></i>
                        
     	</u></b>
                            
      	<div></div>
                        
  	</a>

</div>

</body>
</html>