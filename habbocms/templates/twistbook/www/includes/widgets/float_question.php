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
    
	$("#onclickOpenQuestion").click(function () {
		$("#overlowQuestion").fadeIn();
	});
	
	$("#onclickCloseQuestion").click(function () {
		$("#overlowQuestion").fadeOut();
	});
	
	$('.optionCheckFAQYes').click(function(){
		$('.firstOptionCheckFAQ').fadeOut(function(){
			$('.FAQcheckedYes').fadeIn(function(){
				setTimeout(function(){ 
					$('.FAQcheckedYes').fadeOut(function(){
						$('.FAQcheckedYesContainer').fadeIn();
					});
				}, 4000);
			});
		});
	});
	
	$('.optionCheckFAQNo').click(function(){
		$('.firstOptionCheckFAQ').fadeOut(function(){
			$('.toAskQuestionHelp').fadeIn(function(){
				setTimeout(function(){ 
					$('.toAskQuestionHelp').fadeOut(function(){
						$('.askQuestionToHelpContainer').fadeIn();
					});
				}, 3000);
			});
		});
	});
	
	$('.goToAskQuestionToHelp').click(function(){
		$('.FAQcheckedYesContainer').fadeOut(function(){
			$('.toAskQuestionHelp').fadeIn(function(){
				setTimeout(function(){ 
					$('.toAskQuestionHelp').fadeOut(function(){
						$('.askQuestionToHelpContainer').fadeIn();
					});
				}, 3000);
			});
		});
	});

});
</script>

<style type="text/css">
#overlowQuestion .overlowButton {
	margin-right: 0px;
}
</style>

<div class="overlowContainer" id="overlowQuestion">

	<div class="container scroll" style="width: 500px; min-height: 150px;">
		
		<div class="top"></div>
		
		<div class="localOverlowTitleSettings"><b><ubuntu>Heb je een vraag?</ubuntu></b></div>
		
		<div id="onclickCloseQuestion" class="closeButton"></div>
		
		<div class="text ubuntuTextHolder" style="width: 460px;">
		
			<div class="loadingHotelSettings" style="display: none;"><img style="margin-left: 360px; margin-top:80px; margin-bottom: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></div>
		
			<div class="firstOptionCheckFAQ" style="width: 400px; margin: auto;">
            
                <div id="frankAvatar"></div> 
                    
                <div class="frankBubble left">
    
                    <div class="frankBubbleArrowWhite"></div>
                        
                    <div class="frankBubbleText" style="width: 300px;">
                        
                        Ah, zo te zien heb jij ergens een probleem mee! Dit gaan we oplossen! Soms kan het zijn dat jou vraag al tussen de FAQ zit. Wil je eerst kijken of hij er tussen zit? Soms kan het zijn dat jij jou antwoord uit een vraag kan halen die er iets op lijkt, maar toch ook in de FAQ staat. Ik zou het even proberen :)
                            
                    </div>
                        
                </div>
                
                <a class="overlowButton optionCheckFAQYes" style="float: left; text-shadow: none;margin-top: 5px; margin-left: 74px;">
                    
                	<b><u class="overlowButtonText" style="">
                        
                    	<i><ubuntu><?php echo $language['yes']; ?></ubuntu></i>
                        
                	</u></b>
                            
                	<div></div>
                        
            	</a>
                
                <a class="overlowButton optionCheckFAQNo" style="float: left; text-shadow: none;margin-top: 5px; margin-left: 4px;">
                    
                	<b><u class="overlowButtonText" style="">
                        
                    	<i><ubuntu><?php echo $language['no']; ?></ubuntu></i>
                        
                	</u></b>
                            
                	<div></div>
                        
            	</a>
            
            </div>
            
            <div class="FAQcheckedYes" style="display: none; width: 400px; margin: auto;">
            
            	<div id="frankAvatar"></div> 
                    
                <div class="frankBubble left">
    
                    <div class="frankBubbleArrowWhite"></div>
                        
                    <div class="frankBubbleText" style="width: 300px;">
                        
                       	Mooi, je hebt er voor gekozen om toch even de FAQ door te kijken. Hier komt ie :)
                            
                    </div>
                        
                </div>
            
            </div>
            
            <div class="FAQcheckedYesContainer" style="display: none;">
            
            	<a class="overlowButton goToAskQuestionToHelp" style="float: right; text-shadow: none; margin-top: -30px; margin-right: -13px;">
				
					<b><u class="overlowButtonText" style="margin-top: -0px;">
					
						<i><ubuntu>Toch een vraag stellen</ubuntu></i>
					
					</u></b>
						
					<div></div>
					
				</a>

            	<b>Hoe word ik ook een medewerker?</b><br>
                Doe mee in het hotel, maak vrienden, help elkaar en val op! Doe mee aan de sollicitaties en stijg boven iedereen uit.<br>
                <br>
                <b>Waarom is de site en/of het hotel soms/vaak sloom of hakkelt het?</b><br>
                Wij gebruiken een refresh script. Dat betekent dat alles word vernieuwd zonder dat jij de pagina hoeft te refreshen. Heel soms blijft de site dan even haken. Dit kan ook in het hotel zelf gebeuren, omdat de site volledig gekoppeld is aan het hotel. Dit kun je zelf oplossen door je cache te legen en het tabblad waar de site op weergeven is te sluiten. Daarnaast moet er ook iedere keer dat je de pagina bezoekt, veel data worden overgebracht. Dit kan soms tot een kleine crash komen. <br>
                <br>
                <b>Hoe krijg ik meer credits?</b><br>
                Simpel, blijf zo lang mogelijk in het hotel! Om de paar minuten krijg jij een aantal credits. Je krijgt ze ook door achievments te behalen en aan events en competities mee toe doen!<br>
                <br>
                <b>Ik kan niet inloggen in de client, wat nu?</b><br>
                Daar is deze help tool voor. Lukt het gewoon echt niet? Dan zal een van de medewerkers jou beter op weg kunnen helpen.<br>
                <br>
                <b>Ik heb een aankoop gedaan, maar ik heb er niets voor terug gekregen?!</b><br>
                Ojee, dat moet je niet hebben! Neem daarom ook zo snel mogelijk contact op met een van de medewerkers. Eventueel via deze helptool of in het hotel. Zij kunnen checken of er daadwerkelijk een betaling is binnen gekomen op het moment wanneer jij het gekocht hebt, blijkt het zo te zijn? Dan krijg jij linea direct wat jij zou krijgen. Is dit niet zo en wij betrappen jou op vervalsing? Dan kun jij hiervoor verbannen worden.<br>
                <br>
                <b>Ik kan geen accounts meer aanmaken?</b><br>
                Je hebt een zogenaamd IP. Dit ip laten wij optellen in de database. In totaal mag jij 15 accounts hebben met het zelfde ip, zijn er 15 accounts met het zelfde ip geconstateerd? Dan worden alle mogelijkheden afgesloten om je nog te registreren.
            
            </div>
            
            <div class="toAskQuestionHelp" style="display: none; width: 400px; margin: auto;">
            
            	<div id="frankAvatar"></div> 
                    
                <div class="frankBubble left">
    
                    <div class="frankBubbleArrowWhite"></div>
                        
                    <div class="frankBubbleText" style="width: 300px;">
                       
                       	Haha, toch een vraag stellen? Geen probleem hoor, de staffleden staan voor je klaar :)!
                            
                    </div>
                        
                </div>
            
            </div>
            
            <div class="askQuestionToHelpContainer" style="display: none;">
            
            	<script>
				$(document).ready(function(){
					$('.sendQuestionForHelp').click(function(){
						if($('.askForQuestionTextarea').val().length < 20){
							$(".errorQuestionToLess").fadeIn("slow");
							setTimeout(function() { $(".errorQuestionToLess").fadeOut("slow"); }, 3500);
						}else{
							var message = $('.askForQuestionTextarea').val();
							$.post("<?php echo HOST; ?>/helptool/send/ask", { message: message }, function(){
								$('.askQuestionToHelpContainer').fadeOut(function(){
									$('.toAskQuestionHelpSucces').fadeIn(function(){
										setTimeout(function(){
											$('#overlowQuestion').fadeOut(function(){
												$('.toAskQuestionHelpSucces').fadeOut(function(){
													$('.firstOptionCheckFAQ').fadeIn();
													$('.askForQuestionTextarea').val(' ');
												});
											});
										}, 4000);
									});
								});
							});
						}
					});
				});
				</script>
				
				<div class="floatError errorQuestionToLess" style="margin-left: -225px; margin-top: 175px; width: 190px;">
		
					<div class="arrow"></div>
				
					<div class="text">
						
						<div class="title"><ubuntu><?php echo $language['error_question_to_less_title']; ?></ubuntu></div>
						<div class="second"><ubuntu><?php echo $language['error_question_to_less_second']; ?></ubuntu></div>
						
					</div>
				
				</div>
            
				<style type="text/css">
                .askForQuestionTextarea {
                    position: relative;
                    font-size: 10px;
                    border: 1px solid #808080 !important;
                    -webkit-border-radius: 4px;
                    -moz-border-radius: 4px;
                    border-radius: 4px;
                    margin-top: 3px;
                    background-color: #FFFFFF !important;
                    -webkit-box-shadow: inset 0 3px 3px rgba(239, 239, 239, 1),0 1px 1px rgba(0, 0, 0, .05);
                    -moz-box-shadow: inset 0 3px 3px rgba(239,239,239,1),0 1px 1px rgba(0,0,0,.05);
                    box-shadow: inset 0 3px 3px rgba(239, 239, 239, 1),0 1px 1px rgba(0, 0, 0, .05);
                    padding: 7px !important;
                    font-family: Ubuntu !important;
                    color: #808080;
                }
                
                .askForQuestionTextarea:focus{
                    background-color: #FFFFFF;
                    -webkit-box-shadow: inset 0 2px 2px rgba(239, 239, 239, .4),0 1px 1px rgba(0, 0, 0, .05) !important;
                    -moz-box-shadow: inset 0 2px 2px rgba(239,239,239,.4),0 1px 1px rgba(0,0,0,.05) !important;
                    box-shadow: inset 0 2px 2px rgba(239, 239, 239, .4),0 1px 1px rgba(0, 0, 0, .05) !important;
                }
                </style>
                
                <center><div style="display: table; margin-bottom: 10px; margin-top: -10px;"><img src="<?php echo HOST; ?>/web-gallery/general/helptool/people.png"></div></center>
                
                <ubuntu>Vertel ons wat er aan de hand is. Hoe meer details je geeft, hoe beter wij jou kunnen helpen.</ubuntu>
                
                <textarea class="askForQuestionTextarea" style="width: 100%; height: 100px; margin-top: 10px;" maxlength="1000" placeholder="Klik hier om jou bericht te schrijven"></textarea>
                <br>
                
                <a class="overlowButton sendQuestionForHelp" style="float: right; text-shadow: none;margin-top: 10px;">
                    
                	<b><u class="overlowButtonText" style="">
                        
                    	<i><ubuntu>Verzenden</ubuntu></i>
                        
                	</u></b>
                            
                	<div></div>
                        
            	</a>
            
            </div>
            
            <div class="toAskQuestionHelpSucces" style="display: none; width: 400px; margin: auto;">
            
            	<div id="frankAvatar"></div> 
                    
                <div class="frankBubble left">
    
                    <div class="frankBubbleArrowWhite"></div>
                        
                    <div class="frankBubbleText" style="width: 300px;">
                       
                       	Mooizo! Je vraag is succesvol opgestuurt naar een van de staffleden. Je ontvang een antwoord d.m.v. een alert van een stafflid.
                            
                    </div>
                        
                </div>
            
            </div>
        
        </div>
		
		<div class="bottom"></div>
		
	</div>

</div>