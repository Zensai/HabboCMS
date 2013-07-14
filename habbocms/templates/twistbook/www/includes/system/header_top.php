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
		if($('#textareaStream').val().length < 20){
			$(".errorStreamToLess").fadeIn("slow");
			setTimeout(function() { $(".errorStreamToLess").fadeOut("slow"); }, 3500);
		}else{
			$.post("<?php echo HOST; ?>/stream/post/message", { text: $('#textareaStream').val() }, function(){
				$(".insideStream").load("<?php echo HOST; ?>/stream/messages");
				$("#overlowStreamAddMessage").fadeOut("slow", function(){
					$("#textareaStream").val("");
				});
			});
		}
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
	
		<div class="floatError errorStreamToLess" style="margin-left: -210px; margin-top: 75px; width: 190px;">
		
			<div class="arrow"></div>
		
			<div class="text">
				
				<div class="title"><ubuntu><?php echo $language['error_stream_to_less_title']; ?></ubuntu></div>
				<div class="second"><ubuntu><?php echo $language['error_stream_to_less_second']; ?></ubuntu></div>
				
			</div>
		
		</div>
    
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

<?php include("apps/float/float_logout.php"); ?>

<?php
$queryAlertsCheck1 = mysql_query("SELECT * FROM alerts WHERE user_id = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."'");
$alertCheckNum1 = mysql_num_rows($queryAlertsCheck1);
	
if($alertCheckNum1 > 0){
	include("apps/float/float_alerts.php");
} 
?>

<?php
if($core->ExploitRetainer($users->UserInfo($username, 'welcome_message')) == 1){

	include("apps/float/float_welcome.php");
		
	include("apps/float/float_look_around.php");
				
}
	
if(strftime("%d-%m-%Y", time()) == $core->ExploitRetainer($users->UserInfo($username, 'date'))){
	
	if($_COOKIE['birthday'] == 'yes'){ }else{
		include("apps/float/float_birthday.php");
		setcookie("birthday", "yes", time()+10800);
	}
	
}
?>

<script type="text/javascript">
//** jQuery Scroll to Top Control script- (c) Dynamic Drive DHTML code library: http://www.dynamicdrive.com.
//** Available/ usage terms at http://www.dynamicdrive.com (March 30th, 09')
//** v1.1 (April 7th, 09'):
//** 1) Adds ability to scroll to an absolute position (from top of page) or specific element on the page instead.
//** 2) Fixes scroll animation not working in Opera. 

function lookupImageScroldown (image, height, width){

var scrolltotop={
	//startline: Integer. Number of Diamonds from top of doc scrollbar is scrolled before showing control
	//scrollto: Keyword (Integer, or "Scroll_to_Element_ID"). How far to scroll document up when control is clicked on (0=top).
	setting: {startline:100, scrollto: 0, scrollduration:1000, fadeduration:[500, 100]},
	controlHTML: '<img src="' + image + '" style="width:' + width + 'px; height:' + height + 'px" />', //HTML for control, which is auto wrapped in DIV w/ ID="topcontrol"
	controlattrs: {offsetx:5, offsety:5}, //offset of control relative to right/ bottom of window corner
	anchorkeyword: '#top', //Enter href value of HTML anchors on the page that should also act as "Scroll Up" links

	state: {isvisible:false, shouldvisible:false},

	scrollup:function(){
		if (!this.cssfixedsupport) //if control is positioned using JavaScript
			this.$control.css({opacity:0}) //hide control immediately after clicking it
		var dest=isNaN(this.setting.scrollto)? this.setting.scrollto : parseInt(this.setting.scrollto)
		if (typeof dest=="string" && jQuery('#'+dest).length==1) //check element set by string exists
			dest=jQuery('#'+dest).offset().top
		else
			dest=0
		this.$body.animate({scrollTop: dest}, this.setting.scrollduration);
	},

	keepfixed:function(){
		var $window=jQuery(window)
		var controlx=$window.scrollLeft() + $window.width() - this.$control.width() - this.controlattrs.offsetx
		var controly=$window.scrollTop() + $window.height() - this.$control.height() - this.controlattrs.offsety
		this.$control.css({left:controlx+'px', top:controly+'px'})
	},

	togglecontrol:function(){
		var scrolltop=jQuery(window).scrollTop()
		if (!this.cssfixedsupport)
			this.keepfixed()
		this.state.shouldvisible=(scrolltop>=this.setting.startline)? true : false
		if (this.state.shouldvisible && !this.state.isvisible){
			this.$control.stop().animate({opacity:1}, this.setting.fadeduration[0])
			this.state.isvisible=true
		}
		else if (this.state.shouldvisible==false && this.state.isvisible){
			this.$control.stop().animate({opacity:0}, this.setting.fadeduration[1])
			this.state.isvisible=false
		}
	},
	
	init:function(){
		jQuery(document).ready(function($){
			var mainobj=scrolltotop
			var iebrws=document.all
			mainobj.cssfixedsupport=!iebrws || iebrws && document.compatMode=="CSS1Compat" && window.XMLHttpRequest //not IE or IE7+ browsers in standards mode
			mainobj.$body=(window.opera)? (document.compatMode=="CSS1Compat"? $('html') : $('body')) : $('html,body')
			mainobj.$control=$('<div id="topcontrol" style="margin-bottom: <?php if($core->ExploitRetainer($users->UserInfo($username, 'vip')) == 1){ echo '44px;'; }else{ echo '0px;'; } ?>">'+mainobj.controlHTML+'</div>')
				.css({position:mainobj.cssfixedsupport? 'fixed' : 'absolute', bottom:mainobj.controlattrs.offsety, right:mainobj.controlattrs.offsetx, opacity:0, cursor:'pointer'})
				.click(function(){mainobj.scrollup(); return false})
				.appendTo('body')
			if (document.all && !window.XMLHttpRequest && mainobj.$control.text()!='') //loose check for IE6 and below, plus whether control contains any text
				mainobj.$control.css({width:mainobj.$control.width()}) //IE6- seems to require an explicit width on a DIV containing text
			mainobj.togglecontrol()
			$('a[href="' + mainobj.anchorkeyword +'"]').click(function(){
				mainobj.scrollup()
				return false
			})
			$(window).bind('scroll resize', function(e){
				mainobj.togglecontrol()
			})
		})
	}
}

scrolltotop.init();

}
</script>

<script>
$(document).ready(function(){
	lookupImageScroldown('<?php echo HOST; ?>/web-gallery/general/sticker_arrow_up.gif', '56', '36');
});
</script>

<script>
$(document).ready(function(){ 
	$('script:not(.noDelete)').remove(); 
});
</script>

<!-- <script type="text/javascript">
  var fallingsrc="<?php echo HOST; ?>/web-gallery/themes/love/blad"
  var no = 30;
  var hidefallingtime = 0;
  var fallingdistance = "pageheight";

  var ie4up = (document.all) ? 1 : 0;
  var ns6up = (document.getElementById&&!document.all) ? 1 : 0;

	function iecompattest(){
	return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
	}

  var dx, xp, yp; 
  var am, stx, sty;
  var i, doc_width = 800, doc_height = 600; 
  
  if (ns6up) {
    doc_width = self.innerWidth;
    doc_height = self.innerHeight;
  } else if (ie4up) {
    doc_width = iecompattest().clientWidth;
    doc_height = iecompattest().clientHeight;
  }

  dx = new Array();
  xp = new Array();
  yp = new Array();
  am = new Array();
  stx = new Array();
  sty = new Array();
  for (i = 0; i < no; ++ i) {  
    dx[i] = 0;                  
    xp[i] = Math.random()*(doc_width-50); 
    yp[i] = Math.random()*doc_height;
    am[i] = Math.random()*20;     
    stx[i] = 0.02 + Math.random()/10; 
    sty[i] = 0.7 + Math.random();   
		if (ie4up||ns6up) {
      if (i == 0) {
		var rand = Math.floor(Math.random()*10) + 1;
        document.write("<div id=\"dot"+ i +"\" style=\"POSITION: absolute; Z-INDEX: "+ i +"; VISIBILITY: visible; TOP: 15px; LEFT: 15px;\"><img src='"+fallingsrc+rand+".gif' border=\"0\"><\/div>");
      } else {
		var rand = Math.floor(Math.random()*10) + 1;
        document.write("<div id=\"dot"+ i +"\" style=\"POSITION: absolute; Z-INDEX: "+ i +"; VISIBILITY: visible; TOP: 15px; LEFT: 15px;\"><img src='"+fallingsrc+rand+".gif' border=\"0\"><\/div>");
      }
    }
  }

  function fallingIE_NS6() {  
    doc_width = ns6up?window.innerWidth-10 : iecompattest().clientWidth-10;
		doc_height=(window.innerHeight && fallingdistance=="windowheight")? window.innerHeight : (ie4up && fallingdistance=="windowheight")?  iecompattest().clientHeight : (ie4up && !window.opera && fallingdistance=="pageheight")? iecompattest().scrollHeight : iecompattest().offsetHeight;
    for (i = 0; i < no; ++ i) {  
      yp[i] += sty[i];
      if (yp[i] > doc_height-50) {
        xp[i] = Math.random()*(doc_width-am[i]-30);
        yp[i] = 0;
        stx[i] = 0.02 + Math.random()/10;
        sty[i] = 0.7 + Math.random();
      }
      dx[i] += stx[i];
      document.getElementById("dot"+i).style.top=yp[i]+"px";
      document.getElementById("dot"+i).style.left=xp[i] + am[i]*Math.sin(dx[i])+"px";  
    }
    fallingtimer=setTimeout("fallingIE_NS6()", 10);
  }

	function hidefalling(){
		if (window.fallingtimer) clearTimeout(fallingtimer)
		for (i=0; i<no; i++) document.getElementById("dot"+i).style.visibility="hidden"
	}
		

if (ie4up||ns6up){
    fallingIE_NS6();
		if (hidefallingtime>0)
		setTimeout("hidefalling()", hidefallingtime*1000)
		}
		
</script> -->

<div class="overlowLoadingContainer">

	<div class="overlowLoading overlowLoadingItHolePage" style="background: url(<?php echo HOST; ?>/web-gallery/general/overlow/floatBackground.png) repeat; display: none;">
    	<div class="progressContainer">
        	<center>
            	<img src="<?php echo HOST; ?>/web-gallery/icons/progress_habbos.gif">
            </center>
            <div class="loading"><div class="loadingPageLodaingText"><?php echo $language['page_loading']; ?>...</div></div>
        </div>
    </div>
    
    <div class="overlowLoading overlowPostPollVoteLoading" style="background: url(<?php echo HOST; ?>/web-gallery/general/overlow/floatBackground.png) repeat; display: none;">
    	<div class="progressContainer">
        	<center>
            	<img src="<?php echo HOST; ?>/web-gallery/icons/progress_habbos.gif">
            </center>
            <div class="loading"><div class="postetPollVoteLoading"><?php echo $language['save_vote']; ?>...</div></div>
        </div>
    </div>

</div>

<div class="overlowContainer" id="loadQuickProfileInThis" style="display: none;"></div>

<?php
if(!$_COOKIE['slide']){
	setcookie('slide', 'true', time()+86400);
?>
	<style type="text/css">
	#container {
		padding-left: 100%;
	}
	</style>
<?php
}
?>

<script>
/*$(window).load(function(){
  $('.overlowLoadingItHolePage').fadeOut();
});

*/
<?php if(!$_COOKIE['slide']){ ?>
$(window).load(function(){
	$("#container").animate({
		paddingLeft: "50%",
		marginLeft: "-461px"
	}, 1000);
});

<?php } ?>

$(document).ready(function() {
	 
	$(document).tooltip();
	     
	$(".topButtonClick").click(function () {
	
		openHeaderTopSwitch();
		
	});
	
	$("#container").click(function(){
		if($("#containerTopOpen:first").is(":hidden")){
			$("#containerTopOpen").slideUp("slow");
			$('.floatAwayPayments').fadeIn();
			$('#container').animate({
				opacity: '1'
			}, 800);
		}
	});
	
	$('#middleContainer').append("<center><div style='margin-top: 15px; font-size: 10px; width: 700px;'><a href='<?php echo HOST; ?>' style='font-weight: bold; text-decoration: underline; color: #000000;'><?php echo $language['footer_contact']; ?></a> | <a href='<?php echo HOST; ?>/about' style='font-weight: bold; text-decoration: underline; color: #000000;'><?php echo $language['footer_about']; ?></a> | <a href='<?php echo HOST; ?>/terms/of/use' style='font-weight: bold; text-decoration: underline; color: #000000;'><?php echo $language['footer_terms']; ?></a> | <a href='<?php echo HOST; ?>/disclaimer' style='font-weight: bold; text-decoration: underline; color: #000000;'><?php echo $language['footer_disclaimer']; ?></a> | <a href='<?php echo HOST; ?>/rules' style='font-weight: bold; text-decoration: underline; color: #000000;'><?php echo $language['footer_rules']; ?></a> | <a href='<?php echo HOST; ?>/terms/of/use' style='font-weight: bold; text-decoration: underline; color: #000000;'><?php echo $language['footer_privacy']; ?></a><br>Copyright &copy 2011 - <?php echo @date("Y", time()); ?> Perk.pw. All rights reserved. Powered by TwistBook Ultimate v13.7.9<br>&copy Sulake Corporation Oy. Habbo is a registered trademark of Sulake Corporation Oy in the European Union, the USA, Japan, the People's Republic of China and various other jurisdictions. All rights reserved. We are not endorsed, affiliated, or sponsered by Sulake Corporation Oy.</div><div style='height: 44px;'></div></center>");
	
	$('.onclickOpenHotelCloseTopContainer').click( function () {
		openHeaderTopSwitch();
	});
	
	$('.openHotelAnnouncement').click(function(){
		if($('.hotelAnnouncementContainer').is(":hidden")){
			$('.hotelAnnouncementContainer').fadeIn();
		}else{
			$('.hotelAnnouncementContainer').fadeOut();
		}
	});
	
});

function disableContextMenu()
  {
    window.frames["iframeDisableRightClick"].document.oncontextmenu = function(){ return false; };     
 } 
 
function openHeaderTopSwitch(){
	if ($("#containerTopOpen:first").is(":hidden")) {
		$('.switchBetHeader').text('<?php echo $language["NAVIGATOR_BACK"]; ?>');
		$(".fadeIn").show();
		$(".fadeAway").hide();
		$("#containerTopOpen").slideDown("slow");
		$('.floatAwayPayments').fadeOut();
		$('#container').animate({
			opacity: '0.7'
		}, 800);
	} else {
		$('.switchBetHeader').text('<?php echo $language["NAVIGATOR"]; ?>');
		$(".fadeIn").hide();
		$(".fadeAway").show();
		$("#containerTopOpen").slideUp("slow");
		$('.floatAwayPayments').fadeIn();
		$('#container').animate({
			opacity: '1'
		}, 800);
	}
}
</script>

<style type="text/css">
#containerRegister > #inside {
	width: 100%;
}

.fadeIn {
	display: none;
}
</style>

<div id="containerTop" style="background: #34312B;">

	<div id="topButtonContainer" style="background-image: url(<?php echo HOST; ?>/web-gallery/general/headertop/header_top.png); margin-top: 0px; padding-top: 11px; padding-bottom: 12px;">
	
		<a id="joinnowButton" class="topButtonClick fadeAway"><div id="lightFilledArrowDown"></div></a>
		
		<a id="joinnowButton" class="topButtonClick fadeIn"><div id="lightFilledArrowTop"></div></a>
		
		<div style="float: left; color: #6E6E6E; font-family: Segoe UI;" class="switchBetHeader"><?php echo $language["NAVIGATOR"]; ?></div>
        
        <?php if(isset($_COOKIE['username'])){ ?>
		
            <div class="centerContainer floatAwayPayments">
            
                <div class="centerContainerInside">
                
                    <div style="float: right; padding-left: 20px;">
                    
                        <img align="left" style="padding-top: 1px;" src="<?php echo HOST; ?>/web-gallery/icons/coin.png" title="<?php echo $language["credits"]; ?>" />
                        
                        <div style="padding-top: 5px; float: left;" title="<?php echo $language["credits"]; ?>"><b><ubuntu><?php echo $core->ExploitRetainer($users->UserInfo($username, 'credits')); ?></ubuntu></b></div>
                        
                    </div>

                    <div style="float: right; padding-left: 20px;">
                    
                        <img align="left" style="padding-top: 1px;" src="<?php echo HOST; ?>/web-gallery/icons/vip_points.png" title="<?php echo $language["pixels"]; ?>" />
                        
                        <div style="padding-top: 5px; float: left;" title="<?php echo $language["pixels"]; ?>"><b><ubuntu><?php echo $core->ExploitRetainer($users->UserInfo($username, 'activity_points')); ?></ubuntu></b></div>
                        
                    </div>

                    <div style="float: right; padding-left: 20px;">
                    
                        <img align="left" style="padding-top: 0px;" src="<?php echo HOST; ?>/web-gallery/icons/point.png" title="<?php echo $language["points"]; ?>" />

                        <div style="padding-top: 5px; float: left;" title="<?php echo $language["points"]; ?>"><b><ubuntu><?php echo $core->ExploitRetainer($users->UserInfo($username, 'vip_points')); ?></ubuntu></b></div>
                        
                    </div>
                    
                    <?php 
                    	if($core->ExploitRetainer($users->UserInfo($username, 'vip')) == '1'){ 
                    	$type = ($users->UserInfo($username, 'rank') >= 2)?'_second':''; 
                    	$title = ($type == '_second')?'super_vip':'vip';
                    ?>
                        <div style="float: right; padding-left: 20px;" title="<?php echo $language[$title]; ?>">
                            <img align="left" style="padding-top: 2px; padding-right: 2px;" src="<?php echo HOST; ?>/web-gallery/icons/habboclub_vip_small<?php echo $type; ?>.gif" />
                        </div>
                    
                    <?php } ?>
                    
                </div>
                
            </div>
        
        <?php } ?>

	</div>

	<div id="containerTopOpen" style="margin-left: -20px; margin-top: 0px;">

		<div id="inside" style="border-bottom: solid 1px #4A494A; margin-top: 50px; border-top: solid 1px #4A494A; padding-top: 20px;">
		
			<?php if(isset($_COOKIE['username'])){ ?>

            	<?php if($core->ExploitRetainer($users->UserPermission('client_closed_login', $username))){ ?>
			
					<a href="<?php echo HOST; ?>/client" target="_new" class="onclickOpenHotelCloseTopContainer"><input type="submit" id="submitGreen" style="margin-left: 10px;" class="submitRight" value="<?php echo $language['enter_hotel']; ?>"></a>
               	
                <?php }else{ ?>
                
                	<a <?php if($core->CmsSetting('client_status') == 'open'){ ?>href="<?php echo HOST; ?>/client" target="_new"<?php } ?> class="onclickOpenHotelCloseTopContainer"><input type="submit" <?php if($core->CmsSetting('client_status') == 'open'){ ?>id="submitGreen" style="margin-left: 10px;"<?php }else{ ?>id="submitRed" style="margin-left: 10px; cursor: normal;"<?php } ?> class="submitRight" value="<?php echo $language['enter_hotel']; ?>"></a>
                
                <?php } ?>

				<a id="onclickOpenLogout"><input type="submit" id="submitBlack" style="margin-left: 10px;" class="submitRight" value="<?php echo $language['log_out']; ?>"></a>
                
               <!-- <a id="onclickOpenStreamAddMessage"><input type="submit" id="submitBlue" class="submitRight" value="<?php echo $language['stream_something']; ?>"></a> -->

			<?php } ?>
				
			<?php include("apps/system/header_navigation.php"); ?>

		</div>
		
		<div id="inside" style="margin-top: 10px; border-bottom: solid 1px #4A494A; padding-bottom: 20px; margin-bottom: 20px;">
        
        	<script>
			$(document).ready(function() {
				$(".refreshStream").click(function() {
					$(".insideStream").html('<center><img style="margin-top: 150px;" src="<?php echo HOST; ?>/web-gallery/icons/progress_bubbles.gif"></center>');
     				$(".insideStream").load("<?php echo HOST; ?>/stream/messages");
  				});
			});
			</script>
		
			<div class="streamContainer" style="float: left;">
            
            	<div id="refresh" class="refreshStream" title="<?php echo $language['refresh']; ?>" style="float: right;cursor: pointer; margin-right: 5px; margin-top: 5px; margin-bottom: -16px;"><img src="<?php echo HOST; ?>/web-gallery/icons/refresh.gif" /></div>
            
            	<div class="insideStream">
                
                	<center>
                    
                    	<a class="overlowButton refreshStream" style="text-shadow: none; margin-top: 150px;">
                    
                            <b><u class="overlowButtonText" style="">
                                
                                <i><ubuntu><?php echo $language["load_stream"]; ?></ubuntu></i>
                                
                            </u></b>
                                    
                            <div></div>
                                
                        </a>
                    
                    </center>
                
                </div>
            
            </div>
            
            <div style="float: left; margin-left: 20px; margin-top: 10px;">
        
        		<iframe title="<?php echo $language['music_of_the_week']; ?>" id="player" style="float: left;" type="text/html" width="283" height="301" src="http://www.youtube.com/embed/<?php echo $core->CmsSetting('music_of_the_week'); ?>?enablejsapi=1&origin=" frameborder="0" id="iframeDisableRightClick" onload="disableContextMenu();"></iframe>
                
                <iframe title="<?php echo $language['video_of_the_week']; ?>" id="player" style="float: left; margin-left: 20px;" type="text/html" width="283" height="301" src="http://www.youtube.com/embed/<?php echo $core->CmsSetting('video_of_the_week'); ?>?enablejsapi=1&origin=" frameborder="0" id="iframeDisableRightClick" onload="disableContextMenu();"></iframe>
        
        	</div>
		
		</div>
        
        <div id="inside" style="margin-top: 50px;"></div>
        
	</div>

</div>


<?php if(isset($_COOKIE['username'])){ ?>

	<?php if($core->ExploitRetainer($users->UserInfo($username, 'vip')) == 1){ ?>

		<div id="containerTop" style="background: #34312B; left: 0; bottom: 0; margin-bottom: 30px; padding-top: 0; padding-bottom: 6px;">

			<div id="topButtonContainer" style="background-image: url(<?php echo HOST; ?>/web-gallery/general/headertop/header_top.png); margin-top: -9px; padding-top: 11px; padding-bottom: 12px;">
				
				<div id="avatar" style="position: relative; bottom: 25px; height: 110px; width: 100px; margin-top: -30px; float: left;">
					<img galleryimg="no" style="height: 110px; width: 64px; color:#fff;" src="<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfo($username, 'look')); ?>.gif">	
				</div>
				
				<div style="float: right; margin-right: 50px; margin-top: -10px;">
				
					<style type="text/css">
					.hotelAnnouncementContainer {
						background-color: #FFFFFF;
						-webkit-box-shadow: 0 1px 8px rgba(0, 0, 0, 0.1);
						-moz-box-shadow: 0 1px 8px rgba(0, 0, 0, 0.1);
						box-shadow: 0 1px 8px rgba(0, 0, 0, 0.1);
						font-size: 14px;
						font-family: "Segoe UI",Helvetica, Arial, sans-serif;
						border: 1px solid #ddd;
						position: fixed;
						bottom: 52px;
						right: 120px;
						border-radius: 3px;
						padding: 6px;
						display: none;
					}
					
					.hotelAnnouncementContainer > .arrow {
						background-image: url(../../manager/header_arrow_menu_top.png);
						width: 14px;
						height: 7px;
						float: right; 
						margin-top: -7px;
						margin-right: 12px;
					}
					
					.hotelAnnouncementContainer > a {
						text-decoration: none;'
						cursor: default;
					}
					
					.hotelAnnouncementContainer > a > .menuHeaderTab {
						padding: 6px 0 6px 13px;
						color: #333;
						text-decoration: none;
						display: table;
						clear: both;
						font-weight: normal;
						line-height: 18px;
						white-space: nowrap;
						cursor: default;
					}
					
					.hotelAnnouncementContainer > a > .menuHeaderTab > .icon {
						margin-top: 4px;
						margin-right: 5px;
					}
					</style>
				
					<div class="hotelAnnouncementContainer">
					
						<a><div class="menuHeaderTab"><div class="icon home" style="margin-top: 2px;"></div><?php echo html_entity_decode($core->CmsSetting('cms_announcement')); ?></div></a>
					
					</div>
				
					<a href="<?php echo HOST; ?>/client" target="_new"><div style="width: 32px; height: 34px; margin-top: 4px; background: url(<?php echo HOST; ?>/web-gallery/general/headertop/rooms_icon.png); float: right;"></div></a>
					
					<div style="width: 2px; height: 27px; margin-top: 8px; float: right; margin-left: 10px; margin-right: 10px;">
					
						<div style="height: 25px; width: 1px; background-color: #000000; float: left; margin-top: 1px;"></div>
						<div style="height: 27px; width: 1px; background-color: #3F3932; float: right;"></div>
					
					</div>
					
					<a href="<?php echo HOST; ?>/shop"><div style="width: 33px; height: 35px; margin-top: 3px; background: url(<?php echo HOST; ?>/web-gallery/general/headertop/shop_icon.png); float: right;"></div></a>
					
					<div style="width: 2px; height: 27px; margin-top: 8px; float: right; margin-left: 10px; margin-right: 10px;">
					
						<div style="height: 25px; width: 1px; background-color: #000000; float: left; margin-top: 1px;"></div>
						<div style="height: 27px; width: 1px; background-color: #3F3932; float: right;"></div>
					
					</div>
					
					<a><div class="openHotelAnnouncement" style="width: 28px; height: 31px; margin-top: 5px; background: url(<?php echo HOST; ?>/web-gallery/general/headertop/box_icon.png); float: right;">
					
						<div style="border: 1px solid #000000; border-radius: 7px; border-bottom-width: 2px; display: table; margin-top: -7px; margin-left: -8px; margin-bottom: -10px; z-index: 999;">
										
							<div style="border: 1px solid #ED2823; border-radius: 5px; background-color: #AC1D19; padding: 1px 3px 1px 4px; color: #FFFFFF; display: table;">
											
								<ubuntu>1</ubuntu>
										
							</div>
										
						</div>
					
					</div></a>
					
					<div style="width: 2px; height: 27px; margin-top: 8px; float: right; margin-left: 10px; margin-right: 10px;">
					
						<div style="height: 25px; width: 1px; background-color: #000000; float: left; margin-top: 1px;"></div>
						<div style="height: 27px; width: 1px; background-color: #3F3932; float: right;"></div>
					
					</div>
					
					<a onClick="Popup=window.open('<?php echo HOST; ?>/radio','Popup','toolbar=no, location=no,status=no,menubar=no,scrollbars=yes,resizable=no, width=305,height=616'); return false;"><div style="width: 61px; height: 33px; margin-top: 3px; background: url(<?php echo HOST; ?>/web-gallery/general/radio/radio_icon.png); float: right;"></div></a>
				
				</div>

			</div>
			
		</div>
	
	<?php } ?>

<?php } ?>