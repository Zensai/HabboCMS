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
include("../../../../includes/inc.global.php");

if($core->ExploitRetainer($users->UserPermission('cms_manager_login', $username))){ if($core->ExploitRetainer($users->UserPermission('cms_news', $username))){ 

$id = $core->ExploitRetainer($_POST['id']);
$news = mysql_fetch_array(mysql_query("SELECT * FROM cms_news WHERE id = '".$id."'"));
?>

<script>
$(document).ready(function(){
	
	$('.cancelNewsEdit').click(function(){
		loadNews();
	});
	
	$('#redactor2').redactor();
	
	$('.editNewsTopstory').change(function(){
		$('.editImagePreview').attr('style', 'width: 582px; height: 230px; background-image: url(' + $(this).val() + '); margin-left: 190px;');
	});
	
	$('.editNewsTitle').keyup(function() {
        $('.news_preview .first').text($(this).val());
	});
	
	$('.editNewsShortstory').keyup(function() {
        $('.news_preview .second').text($(this).val());
	});
	
	$('.submitNewsEdit').click(function(){
		buttonText('class', 'submitNewsEdit', '<?php echo $language["loading"]; ?>');
		submitEditNews();
	});
	
});

function submitEditNews(){

	var id = '<?php echo $id; ?>';
	var image = $('.editNewsTopstory').val();
	var title = $('.editNewsTitle').val();
	var shortstory = $('.editNewsShortstory').val();
	var longstory = $('.editNewsLongstory').val();

	$.post("<?php echo HOST; ?>/manager/edit/news", { id: id, image: image, title: title, shortstory: shortstory, longstory: longstory }, function(data){
		buttonText('class', 'submitNewsEdit', '<?php echo $language["submit"]; ?>');
		if(data == 1){
			$('.alertContainer').append('<div class="alert alert-success" style="display: none;"><?php echo $language["manager_news_saved"]; ?></div>');
			$('.containerNews .alertContainer .alert-success').slideDown(function(){
				setTimeout(function(){ $('.containerNews .alertContainer .alert-success').slideUp(function(){ $(this).remove(); }); }, 3000);
			});
			loadNews();
		}
			
		if(data == 0){
			$('.alertContainer').append('<div class="alert alert-error" style="display: none;"><?php echo $language["manager_news_saved_failed"]; ?></div>');
			$('.containerNews .alertContainer .alert-error').slideDown(function(){
				setTimeout(function(){ $('.containerNews .alertContainer .alert-error').slideUp(function(){ $(this).remove(); }); }, 3000);
			});
		}
	});

}
</script>

<div class="boxContainer darkBlue">
        
    <div class="boxHeader"><div class="text"><b><?php echo $news['title']; ?></b> | <?php echo $language["manager_news_editing"]; ?></div></div>
            
   	<div class="text">

		<div class="editImagePreview" style="width: 582px; height: 230px; background-image: url(<?php echo HOST; ?>/<?php echo $news['image']; ?>); margin-left: 190px;"></div>
		
		<div class="news_preview">
			<div class="first"><?php echo $news['title']; ?></div>
			<div class="second"><?php echo $news['shortstory']; ?></div>
		</div>
		
		<br><br>
	
		<label><?php echo $language["manager_news_headline"]; ?></label>
    	<select class="select editNewsTopstory">
			
			<option value="<?php echo HOST; ?>/web-gallery/news/web_promo_error_img.png"></option>
			
			<?php
			$newsimages = opendir('../../../../web-gallery/news/web_promo/') or die('Error');  
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
    	<input type="text" class="input editNewsTitle" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="<?php echo $news['title']; ?>">
		
		<br><br>
		
		<label><?php echo $language["manager_news_shortstory"]; ?></label>
    	<input type="text" class="input editNewsShortstory" placeholder="<?php echo $language["manager_enter_value"]; ?>" value="<?php echo $news['shortstory']; ?>">
		
		<br><br>
			
		<label><?php echo $language["manager_story"]; ?></label>
		<div style="width: 48.717948717948715%; min-width: 532px; display: table;"><textarea id="redactor2" class="editNewsLongstory"><?php echo $news['longstory']; ?></textarea></div>
		
   	</div>
    
    <div class="buttonContainer">
            
        <input type="submit" class="button blue submitNewsEdit" value="<?php echo $language["submit"]; ?>" />
        
        <input type="submit" class="button cancelNewsEdit" value="<?php echo $language["stop"]; ?>" />
            
    </div>
            
</div>

<?php } } ?>