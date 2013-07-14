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
include("includes/inc.global.php");

$menu = 'solliciteren';
$page = 'solliciteren';

if(isset($_GET['validate']) && $core->ExploitRetainer($_GET['validate']) == 1){
	
	if(isset($_POST['username']) && isset($_POST['mail']) && isset($_POST['bests']) && isset($_POST['motivation']) && isset($_POST['rest'])){
		$query = mysql_query("INSERT INTO sollicitaties (id, username, mail, bests, motivation, rest) VALUES (NULL, '".$core->ExploitRetainer($_POST['username'])."', '".$core->ExploitRetainer($_POST['mail'])."', '".$core->ExploitRetainer($_POST['bests'])."', '".$core->ExploitRetainer($_POST['motivation'])."', '".$core->ExploitRetainer($_POST['rest'])."')");
	}
	
}

$query_check = mysql_query("SELECT * FROM sollicitaties WHERE username = '".$core->ExploitRetainer($users->UserInfo($username, 'username'))."'");
if(mysql_num_rows($query_check) > 0){
	$return_check = 1;
}else{
	$return_check = 0;
}

$query_date = strtotime($core->ExploitRetainer($users->UserInfo($username, 'date')));
$calculated_date = time() - $query_date;
if($calculated_date < 404352000){
	$age_too_young = 1;
}else{
	$age_too_young = 0;
}
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

	<title><?php echo $hotelname; ?> - Solliciteren</title>
	<?php echo $Style->General(); ?>


</head>

<script type="text/javascript">		
function onKeyDown() {
	var pressedKey = String.fromCharCode(event.keyCode).toLowerCase();
	if (event.ctrlKey && (pressedKey == "u" || pressedKey == "s")) {
		event.returnValue = false;
	}
}
 
$(document).bind("contextmenu",function(e){
	return false;
});

$(document).ready(function(){
	window.statusbar = '';
	window.status = '';
});
</script>

<style type="text/css">
.editor {
	height: auto;
	width: 100%;
	font-size: 12px !important;
	border: 1px solid #636363 !important;
	-webkit-border-radius: 4px !important;
	-moz-border-radius: 4px !important;
	border-radius: 4px !important;
	margin-top: 3px !important;
	padding: 9px !important;
	background-color: #FFFFFF !important;
	box-shadow: inset 0 2px 2px rgba(240, 240, 240, 1), 0px 1px 0px rgba(255, 255, 255, 1) !important;
	opacity: 0.7 !important;
	outline: none !important;
	resize: none !important;
}

.editor:focus {
	opacity: 1 !important;
}
</style>

<body onkeydown="onKeyDown()" style="background: none;">

<div class="overlowContainer" id="overlowPay" style="display: block;">

	<div class="container" style="width: 350px;">
		
		<div class="top"></div>
        
        <div class="localOverlowTitleSettings" style="width: 100%;"><b><ubuntu>Solliciteren</ubuntu></b></div>
		
		<div class="text">
		
			<?php if($core->CmsSetting('cms_sollicitation') == 1){ ?>
		
			<?php if($return_check == 0){ ?>
			
				<?php if($age_too_young == 0){ ?>

					<script>
					$(document).ready(function(){
						$('.beforeSollici').fadeIn();
							
						$('.beginSollici').click(function(){
							$('.beforeSollici').fadeOut(function(){
								$('.sollici').fadeIn();
							});
						});
						
						$('.toNextSolli').click(function(){
							$('.sollici').fadeOut(function(){
								$('.sollici2').fadeIn();
							});
						});
						
						$('.toBackSolli').click(function(){
							$('.sollici2').fadeOut(function(){
								$('.sollici').fadeIn();
							});
						});
						
						$('.toNextSolli2').click(function(){
							var username = $('.solliciUsername').val();
							var mail = $('.solliciMail').val();
							var bests = $('.solliciBests').val();
							var motivation = $('.solliciMotivation').val();
							var rest = $('.solliciRest').val();
							$.post("<?php echo HOST; ?>/solliciteren/validate", { username: username, mail: mail, bests: bests, motivation: motivation, rest: rest }, function(){
								$('.sollici2').fadeOut(function(){
									$('.solliciDone').fadeIn();
								});
							});
						});
						
					});
					</script>
					
					<div class="beforeSollici" style="display: none;">
					
						<div id="frankAvatar"></div> 
							
						<div class="frankBubble left">
				
						<div class="frankBubbleArrowWhite"></div>
									
							<div class="frankBubbleText" style="">
									
								Je kunt je hier solliciteren. Voor welke rang dit zal zijn, dat bepalen de managers. Doe je best en leef je uit in je sollicitatie! <br><b>Tip: Wees jezelf! Weet wat je zegt en schrijf veel en niet weinig!</b>
										
							</div>
									
						</div>
							
						<a class="overlowButton beginSollici" style="float: left; text-shadow: none; margin-top: 5px; margin-left: 75px;">
							
							<b><u class="overlowButtonText" style="">
								
								<i><ubuntu>Beginnen met solliciteren</ubuntu></i>
								
							</u></b>
									
							<div></div>
								
						</a>
							
					</div>
					
					<div class="sollici" style="display: none; width: 310px;">
					
						<div style="font-size: 16px; font-weight: bold;"><ubuntu>Wat is jou gebruikersnaam?</ubuntu></div>
						<input type="text" name="name" class="editor solliciUsername"  value="<?php echo $core->ExploitRetainer($users->UserInfo($username, 'username')); ?>">
						<div style="font-size: 11px;"><ubuntu>Dit is jou gebruikersnaam. Hoe noemen mensen jou in het hotel? (Denk niet aan bijnamen)</ubuntu></div>
						
						<br>
						
						<div style="font-size: 16px; font-weight: bold;"><ubuntu>Wat is jou e-mail adres?</ubuntu></div>
						<input type="text" name="name" class="editor solliciMail"  value="<?php echo $core->ExploitRetainer($users->UserInfo($username, 'mail')); ?>">
						<div style="font-size: 11px;"><ubuntu>Dit is de e-mail die jij altijd gebruikt. Dus waar jij als jou spam berichten op zou krijgen.</ubuntu></div>
						
						<br>
						
						<div style="font-size: 16px; font-weight: bold;"><ubuntu>Wat zijn jou beste vaardigheden?</ubuntu></div>
						<textarea name="name" class="editor solliciBests" style="height: 100px;"></textarea>
						<div style="font-size: 11px;"><ubuntu>Vertel dit zo uitgebreid mogelijk! Wij willen weten wat jij het beste kan. Je kunt alles zeggen! Alles kan van pas komen.</ubuntu></div>
						
						<a class="overlowButton toNextSolli" style="float: right; text-shadow: none; margin-top: 20px; margin-right: 0px;">
							
							<b><u class="overlowButtonText" style="">
								
								<i><ubuntu>Verder</ubuntu></i>
								
							</u></b>
									
							<div></div>
								
						</a>
					
					</div>
					
					<div class="sollici2" style="display: none; width: 310px;">
					
						<div style="font-size: 16px; font-weight: bold;"><ubuntu>Motivatie</ubuntu></div>
						<textarea name="name" class="editor solliciMotivation" style="height: 100px;"></textarea>
						<div style="font-size: 11px;"><ubuntu>Hier kun jij ons overtuigen om jou aan te nemen. Maakt niet uit op welk gebied dat is.</ubuntu></div>
						
						<br>
						
						<div style="font-size: 16px; font-weight: bold;"><ubuntu>Overige informatie</ubuntu></div>
						<textarea name="name" class="editor solliciRest" style="height: 100px;"></textarea>
						<div style="font-size: 11px;"><ubuntu>Hier kun jij jou hart nog even luchten. Wat wil je nog meer vertellen dat niet gevraagd is maar wel van pas kan komen?</ubuntu></div>
					
						<a class="overlowButton toNextSolli2" style="float: right; text-shadow: none; margin-top: 20px; margin-right: 0px;">
							
							<b><u class="overlowButtonText" style="">
								
								<i><ubuntu>Afronden</ubuntu></i>
								
							</u></b>
									
							<div></div>
								
						</a>
						
						<a class="overlowButton toBackSolli" style="float: left; text-shadow: none; margin-top: 20px; margin-right: 0px;">
							
							<b><u class="overlowButtonText" style="">
								
								<i><ubuntu>Terug</ubuntu></i>
								
							</u></b>
									
							<div></div>
								
						</a>
					
					</div>
					
					<div class="solliciDone" style="display: none;">
					
						<div id="frankAvatar"></div> 
							
						<div class="frankBubble left">
				
						<div class="frankBubbleArrowWhite"></div>
									
							<div class="frankBubbleText" style="">
									
								Je bent klaar met de sollicitatie! Ik hoop voor je dat je door gaat! Heel erg veel succes!
										
							</div>
									
						</div>
							
						<a class="overlowButton doneSollici" style="float: left; text-shadow: none; margin-top: 5px; margin-left: 75px;"></a>
							
					</div>
				
				<?php }else{ ?>
				
					<script>
					$(document).ready(function(){
						$('.solliciYoung').fadeIn();
					});
					</script>
					
					<div class="solliciYoung" style="display: none;">
					
						<div id="frankAvatar"></div> 
							
						<div class="frankBubble left">
				
						<div class="frankBubbleArrowWhite"></div>
									
							<div class="frankBubbleText" style="">
									
								Ojeeh,  je bent te jong om te solliciteren! Volgens de opgegeven geboortedatum ben je te jong. Je kunt dus niet solliciteren, want je moet minimaal 13 jaar oud zijn.
										
							</div>
									
						</div>
							
						<a class="overlowButton doneSollici" style="float: left; text-shadow: none; margin-top: 5px; margin-left: 75px;"></a>
							
					</div>
				
				<?php } ?>
			
			<?php }else{ ?>
			
				<script>
				$(document).ready(function(){
					$('.solliciTwice').fadeIn();
				});
				</script>
				
				<div class="solliciTwice" style="display: none;">
				
					<div id="frankAvatar"></div> 
						
					<div class="frankBubble left">
			
					<div class="frankBubbleArrowWhite"></div>
								
						<div class="frankBubbleText" style="">
								
							Ojeeh, je hebt je al gesolliciteerd! Je mag je niet meerdere keren solliciteren! Heb je iets fout gedaan of wil je hem overnieuw doen? Ga dan naar een van de staffleden. Zij kunnen meer voor je doen er jou verder helpen.
									
						</div>
								
					</div>
						
					<a class="overlowButton doneSollici" style="float: left; text-shadow: none; margin-top: 5px; margin-left: 75px;"></a>
						
				</div>
			
			<?php } ?>
			
			<?php }else{ ?>
			
				<script>
				$(document).ready(function(){
					$('.solliciAllow').fadeIn();
				});
				</script>
				
				<div class="solliciAllow" style="display: none;">
				
					<div id="frankAvatar"></div> 
						
					<div class="frankBubble left">
			
					<div class="frankBubbleArrowWhite"></div>
								
						<div class="frankBubbleText" style="">
								
							Oh, je wilt solliciteren terwijl de sollicitaties niet eens open zijn! Dat kan toch niet, haha mallert. Wacht totdat de sollicitaties open gaan en dan kun je hier los gaan :)
									
						</div>
								
					</div>
						
					<a class="overlowButton doneSollici" style="float: left; text-shadow: none; margin-top: 5px; margin-left: 75px;"></a>
						
				</div>
			
			<?php } ?>
        
        </div>
		
		<div class="bottom"></div>
		
	</div>

</div>

</body>

</html>