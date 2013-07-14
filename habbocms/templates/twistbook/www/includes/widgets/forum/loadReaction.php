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
include("../../../includes/inc.global.php");

if(isset($_POST['id'])){
	
	$loadReaction = mysql_fetch_array(mysql_query("SELECT * FROM forum_reactions WHERE id = '".$core->ExploitRetainer($_POST['id'])."'"));
	
	if($loadReaction['user_id'] == $core->ExploitRetainer($users->UserInfo($username, 'id'))){
?>
	<script>
	$(document).ready(function(){
		$('.editReaction<?php echo $loadReaction['id']; ?>').click(function(){
			var message = CKEDITOR.instances.loadReactionEdit<?php echo $loadReaction['id']; ?>.getData();
			editReaction('<?php echo $loadReaction['id']; ?>', message);
		});
	});
	
	function editReaction(id, message){
		
		$('.reloadStuffToDatabaseEditedReaction').html('<img style="margin-top:80px; margin-bottom: 80px; margin-left: 315px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif">');
		
		$.post("<?php echo HOST; ?>/forum/edit/reaction", { id: id, message: message }, function(){
			document.location.href='<?php echo HOST; ?>/forum/display/<?php echo $core->ExploitRetainer($_POST['forum_id']); ?>/topic/<?php echo $core->ExploitRetainer($_POST['topic_id']); ?>/lastpage/reaction/<?php echo $loadReaction['id']; ?>';
		});
		
	}
	</script>
    
    <div class="reloadStuffToDatabaseEditedReaction">
    
	<textarea name="loadReactionEdit<?php echo $loadReaction['id']; ?>" id="loadReactionEdit<?php echo $loadReaction['id']; ?>" class="loadReactionEdit<?php echo $loadReaction['id']; ?>"><?php echo html_entity_decode($loadReaction['message']); ?></textarea>
    
    <script>
	CKEDITOR.replace('loadReactionEdit<?php echo $loadReaction['id']; ?>', {
		toolbar : [
			{ name: 'document', items : [ <?php if($core->ExploitRetainer($users->UserPermission('cms_forum_reaction_source', $username))){ ?>'Source',<?php } ?>'NewPage','DocProps','Preview','Print','-','Templates' ] },
			{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
			{ name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
			{ name: 'forms', items : [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
			'/',
			{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
			{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
			'-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
			{ name: 'links', items : [ 'Link','Unlink','Anchor' ] },
			{ name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe' ] },
			'/',
			{ name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
			{ name: 'colors', items : [ 'TextColor','BGColor' ] },
			{ name: 'tools', items : [ 'Maximize', 'ShowBlocks','-','About' ] }
		],
		contentsCss : '<?php echo HOST; ?>/web-gallery/ckeditor/ckeditor.css',
		enterMode : CKEDITOR.ENTER_BR,
		language : 'nl',
		width: "658px",
       	height: "200px"
	});
	</script>
    
    <input type="submit" style="margin-top: 5px;" class="submitRight editReaction<?php echo $loadReaction['id']; ?>" id="submitBlack" value="<?php echo $language['edit']; ?>">
    
    </div>
    
<?php
	}else{
?>
	<div class="errorMessageOverlow" style="width: 658px;">Je kunt geen reactie van iemand anders veranderen!</div>
<?php
	}
}
?>
