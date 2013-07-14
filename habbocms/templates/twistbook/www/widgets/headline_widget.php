
            <div id="containerHeadlines">
            
            	<div onClick="Popup=window.open('<?php echo HOST; ?>/radio','Popup','toolbar=no, location=no,status=no,menubar=no,scrollbars=yes,resizable=no, width=305,height=742'); return false;" class="headlineAdd first" style="background-image: url(<?php echo HOST; ?>/web-gallery/general/headline/music_teaser.png); cursor: pointer;">
                
                	<div class="containerHeadlineInside">
                
                		<div class="titleHeadline"><ubuntu><?php echo $language["headline_radio_title"]; ?></ubuntu></div>
                    
                    	<div class="textHeadline"><ubuntu><?php echo $language["headline_radio_text"]; ?></ubuntu></div>
                        
                    </div>
                
                </div>
                
                <div onClick="location.href='<?php echo HOST; ?>/forum'" class="headlineAdd second" style="background-image: url(<?php echo HOST; ?>/web-gallery/general/headline/habboclub.png); cursor: pointer;">
                
                	<div class="containerHeadlineInside">
                
                		<div class="titleHeadline"><ubuntu><?php echo $language["headline_forum_title"]; ?></ubuntu></div>
                    
                    	<div class="textHeadline"><ubuntu><?php echo $language["headline_forum_text"]; ?></ubuntu></div>
                        
                   </div>
                
                </div>
                
                <script>
				$(document).ready(function(e) {
                    $(".openTopContainerStreamTo").click(function () {
	
						openHeaderTopSwitch();
		
					});
                });
				</script>
                
                <div class="headlineAdd third openTopContainerStreamTo" style="background-image: url(<?php echo HOST; ?>/web-gallery/general/headline/art_friendstream.png); cursor: pointer;">
                
                	<div class="containerHeadlineInside">
                
                		<div class="titleHeadline"><ubuntu><?php echo $language["headline_stream_title"]; ?></ubuntu></div>
                    
                    	<div class="textHeadline"><ubuntu><?php echo $language["headline_stream_text"]; ?></ubuntu></div>
                    
                    </div>
                
                </div>
            
            </div>