<?php if($core->ExploitRetainer($users->UserPermission('cms_news', $username))){ ?>

<script>
$(document).ready(function(){

	$('.onclickRemoveNews').click(function(){
		var id = $(this).attr('id');
		removeNews(id);
	});
	
	$('.onclickEditNews').click(function(){
		var id = $(this).attr('id');
		editNews(id);
	});
	
	$('.addNewsButton').click(function(){
		if($('.addNewsContainer').is(":hidden")){
			$('.addNewsContainer').slideDown();
		}else{
			$('.addNewscontainer').slideUp();
		}
	});
	
	$('.cancelNewsAdd').click(function(){
		if($('.addNewsContainer').is(":hidden")){
			$('.addNewsContainer').slideDown();
		}else{
			$('.addNewsContainer').slideUp();
		}
	});
	
	$('#redactor').redactor();
	
	$('.addNewsTopstory').change(function(){
		$('.addImagePreview').attr('style', 'width: 582px; height: 230px; background-image: url(' + $(this).val() + '); margin-left: 190px;');
	});
	
	$('.addNewsTitle').keyup(function() {
        $('.news_preview .first').text($(this).val());
	});
	
	$('.addNewsShortstory').keyup(function() {
        $('.news_preview .second').text($(this).val());
	});
	
	$('.submitNewsAdd').click(function(){
		buttonText('class', 'submitNewsAdd', '<?php echo $language["loading"]; ?>');
		submitAddNews();
	});
	
});

function removeNews(id){

	$.post("<?php echo HOST; ?>/manager/delete/news", { id: id }, function(data){
		if(data == 1){
			$('.alertContainer').append('<div class="alert alert-success" style="display: none;"><b>Voltooid!</b> Het nieuwsbericht is succesvol verwijderd.</div>');
			$('.containerNews .alertContainer .alert-success').slideDown(function(){
				setTimeout(function(){ $('.containerNews .alertContainer .alert-success').slideUp(function(){ $(this).remove(); }); }, 3000);
			});
			$('.fadeOutNewsbox' + id).fadeOut();
		}
			
		if(data == 0){
			$('.alertContainer').append('<div class="alert alert-error" style="display: none;"><b>Onvoltooid!</b> Het nieuwsbericht is niet succesvol verwijderd.</div>');
			$('.containerNews .alertContainer .alert-error').slideDown(function(){
				setTimeout(function(){ $('.containerNews .alertContainer .alert-error').slideUp(function(){ $(this).remove(); }); }, 3000);
			});
		}
	});

}

function editNews(id){

	$('.containmentNews').hide("slide", { direction: 'left' }, 800, function(){
		$.post("<?php echo HOST; ?>/manager/load/edit/news", { id: id }, function(data){
			$('.containmentNews').html(data);
			$('.containmentNews').show("slide", { direction: 'left' }, 800);
		});
	});

}

function loadNews(){

	$('.containmentNews').hide("slide", { direction: 'left' }, 800, function(){
		$.post("<?php echo HOST; ?>/manager/load/news", function(data){
			$('.containmentNews').html(data);
			$('.containmentNews').show("slide", { direction: 'left' }, 800);
		});
	});

}

function submitAddNews(){

	var image = $('.addNewsTopstory').val();
	var title = $('.addNewsTitle').val();
	var shortstory = $('.addNewsShortstory').val();
	var longstory = $('.addNewsLongstory').val();

	$.post("<?php echo HOST; ?>/manager/add/news", { image: image, title: title, shortstory: shortstory, longstory: longstory }, function(data){
		buttonText('class', 'submitNewsAdd', '<?php echo $language["submit"]; ?>');
		if(data == 1){
			$('.alertContainer2').append('<div class="alert alert-success" style="display: none;"><?php echo $language["manager_news_saved"]; ?>');
			$('.containerNews .alertContainer2 .alert-success').slideDown(function(){
				setTimeout(function(){ $('.containerNews .alertContainer2 .alert-success').slideUp(function(){ $(this).remove(); }); }, 3000);
			});
			if($('.addNewscontainer').is(":hidden")){
				$('.addNewscontainer').slideDown();
			}else{
				$('.addNewscontainer').slideUp();
			}
			loadNews();
			$('.addNewsTopstory').val('');
			$('.addNewsTitle').val('');
			$('.addNewsShortstory').val('');
			$('.addNewsLongstory').text('');
		}
			
		if(data == 0){
			$('.alertContainer2').append('<div class="alert alert-error" style="display: none;"><?php echo $language["manager_news_saved_failed"]; ?></div>');
			$('.containerNews .alertContainer2 .alert-error').slideDown(function(){
				setTimeout(function(){ $('.containerNews .alertContainer2 .alert-error').slideUp(function(){ $(this).remove(); }); }, 3000);
			});
		}
	});

}
</script>

<div class="container containerNews" style="display: none;">
            
    <div class="navigation">
                
    	<?php echo $language["manager_news"]; ?> <small><?php echo $language["manager_news_sub"]; ?></small>
                
   	</div>
                
  	<div class="catagorize">
                
      	<div class="inside">
                
          	<div class="icon home"></div> 
                        
          	<div class="text"><div class="sizer"><?php echo $language["manager_menu_dashboard"]; ?></div> <div class="arrow"></div> <div class="sizer"><?php echo $language["manager_menu_news"]; ?></div></div>
                       
         	<div class="dateCata">
                    
             	<div class="icon calendar white"></div>
                            
                <div class="text"><?php echo strftime('%A', time()).' '.@date('d, Y - H:i', time()); ?></div>
                        
            </div>
			
			<div class="dateCata addNewsButton" style="background-color: #FFB848; margin-right:0px; cursor: pointer;">
                            
                <div class="text"><?php echo $language["manager_news_add"]; ?></div>
                        
            </div>
                
      	</div>
                    
   	</div>
	
	<div class="alertContainer2"></div>
	
	<div class="boxContainer yellow addNewsContainer" style="display: none;">
		
		<div class="boxHeader"><div class="text"><?php echo $language["manager_news_add"]; ?></div></div>
			
		<div class="text">

			<div class="addImagePreview" style="width: 582px; height: 230px; background-image: url(<?php echo HOST; ?>/<?php echo $news['image']; ?>); margin-left: 190px;"></div>
			
			<div class="news_preview">
				<div class="first"><?php echo $news['title']; ?></div>
				<div class="second"><?php echo $news['shortstory']; ?></div>
			</div>
			
			<br><br>
		
			<label><?php echo $language["manager_news_headline"]; ?></label>
			<select class="select addNewsTopstory">
				
				<option value="<?php echo HOST; ?>/web-gallery/news/web_promo_error_img.png" selected="selected"></option>
				
				<?php
				$newsimages = opendir('web-gallery/news/web_promo/') or die('Error');  
				while($images = @readdir($newsimages)){  
					if(!is_dir($images)){
						if(preg_match("/".$images."/", $news['image']))
						$selected = 'selected="selected"'; else $selected = '';
						echo '<option value="../../../web-gallery/news/web_promo/'.$images.'" '.$selected.'>'.$images.'</option>';  
					}
				}
				closedir($newsimages);  
				?>		
				
			</select>
			
			<br><br>
			
			<label><?php echo $language["manager_news_title"]; ?></label>
			<input type="text" class="input addNewsTitle" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="<?php echo $news['title']; ?>">
			
			<br><br>
			
			<label><?php echo $language["manager_news_shortstory"]; ?></label>
			<input type="text" class="input addNewsShortstory" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="<?php echo $news['shortstory']; ?>">
			
			<br><br>
				
			<label><?php echo $language["manager_news_story"]; ?></label>
			<div style="width: 48.717948717948715%; min-width: 532px; display: table;"><textarea id="redactor" class="addNewsLongstory"><?php echo $news['longstory']; ?></textarea></div>
			
		</div>
		
		<div class="buttonContainer">
				
			<input type="submit" class="button blue submitNewsAdd" value="<?php echo $language["submit"]; ?>" />
			
			<input type="submit" class="button cancelNewsAdd" value="<?php echo $language["stop"]; ?>" />
				
		</div>
		
	</div>
	
	<div class="containerSpace"></div>
	
	<div class="alertContainer"></div>
	
	<div class="containmentNews">
    
		<div class="boxContainer darkBlue">
		
			<div class="boxHeader"><div class="text"><?php echo $language["manager_news_overview"]; ?></div></div>
			
			<div class="text">
			
				<div style="display: table; margin-left: -5px; margin-top: -5px;">
			
					<?php
					$query_news = mysql_query("SELECT * FROM cms_news ORDER BY published DESC");
					while($news = mysql_fetch_array($query_news)){
					?>
						
						<div class="greyNewsBox fadeOutNewsbox<?php echo $news['id']; ?>" style="background-color: #EDEDED;padding: 10px; display: table; margin-top: 5px; margin-left: 5px; float: left; width: 400px;">
							
							<?php echo @date("d/m/Y", $news['published']); ?> <b>|</b> <?php echo substr($news['title'], 0, 40); ?>... 
							<div class="tooltip" style="float: right; cursor: pointer;"><img class="onclickRemoveNews" id="<?php echo $news['id']; ?>" align="right" src="<?php echo STYLE; ?>/web-gallery/button/overlow/iconDown.gif"><span><b><?php echo substr($news['title'], 0, 40); ?>...</b> | <?php echo $language["manager_news_delete"]; ?></span></div>
							<div class="tooltip" style="float: right; cursor: pointer;"><img class="onclickEditNews" id="<?php echo $news['id']; ?>" align="right" style="margin-left: 5px;" src="<?php echo STYLE; ?>/web-gallery/button/overlow/iconEdit.gif"><span><b><?php echo substr($news['title'], 0, 40); ?>...</b> | <?php echo $language["manager_news_edit"]; ?></span></div>
								
						</div>
							
					<?php } ?>
				
				</div>
				
			</div>
		
		</div>
	
	</div>
            
</div>
   
<?php } ?>