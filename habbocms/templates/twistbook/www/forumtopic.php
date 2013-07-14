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

$menu = 'forum';
$page = 'index';

$forum_id = $core->ExploitRetainer($_GET['forum_id']);
$topic_id = $core->ExploitRetainer($_GET['topic_id']);

$query_forum_topic = mysql_query("SELECT * FROM forum_topics WHERE id = '".$topic_id."'");
$forum_topic = mysql_fetch_array($query_forum_topic);
$query_forum_third = mysql_query("SELECT * FROM forums WHERE id = '".$forum_topic['parent_id']."' ORDER BY id");
$forum_third = mysql_fetch_array($query_forum_third);
$topic_vieuw_count = $forum_topic['views'] +1;

$rowsPerPage2 = 20;
$query2   = "SELECT COUNT(id) AS numrows FROM forum_reactions WHERE parent_id = '".$forum_topic['id']."'";
$result2  = mysql_query($query2) or die('Error, query failed');
$row2     = mysql_fetch_array($result2, MYSQL_ASSOC);
$numrows2 = $row2['numrows'];
$maxPage2 = ceil($numrows2/$rowsPerPage2);

if(isset($_GET['type']) == 'lastpage'){
	header("Location: ".HOST."/forum/display/".$forum_id."/topic/".$topic_id."/page/".$maxPage2."#reaction_".$core->ExploitRetainer($_GET['reaction'])."");
}
						
if(isset($_COOKIE["topic_view_".$forum_topic['id']]) && $core->ExploitRetainer($_COOKIE["topic_view_".$forum_topic['id']])){ }else{

	$query = mysql_query("UPDATE forum_topics SET views = '".$topic_vieuw_count."' WHERE id = '".$forum_topic['id']."'");
	
	setcookie("topic_view_".$forum_topic['id'], $forum_topic['id'], time()+86400);
	
}
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

	<title><?php echo $hotelname; ?> <?php echo $language['menu_forum']; ?> - <?php echo $forum_topic['prefix']; ?> <?php echo $forum_topic['name']; ?></title>
	<?php echo $Style->General(); ?>

	<?php echo $themeswitcher; ?>

</head>

<body onkeydown="onKeyDown()">

<div class="overlowLoadingContainer loginSwitchOpenLoad" style="display: none;"><div class="overlowLoading"><div class="progressContainer"><div class="progress"></div><div class="loading"><?php echo $language['loading_login']; ?></div></div></div></div>

<script>
$(document).ready(function() {
    
	$("#onclickOpenEditReaction").click(function () {
		$("#overlowEditReaction").fadeIn("slow");
	});
	
	$("#onclickCloseEditReaction").click(function () {
		$("#overlowEditReaction").fadeOut("slow");
	});
	
	$('.postQuickReaction').click(function(){
		var message = CKEDITOR.instances.editorForumQuickReaction.getData();
		addReaction(message, '<?php echo $forum_topic['id']; ?>');
	});
	
	$(".onclickOpenAdvancedReaction").click(function () {
		$("#overlowAdvancedReaction").fadeIn("slow");
		var message = CKEDITOR.instances.editorForumQuickReaction.getData();
		CKEDITOR.instances.advancedReaction.setData(message);
	});
	
	$("#onclickCloseAdvancedReaction").click(function () {
		$("#overlowAdvancedReaction").fadeOut("slow");
	});
	
	$('.addAdvancedReaction').click(function(){
		$('.insideAdvancedReaction').hide();
		$('.insideAdvancedReactionLoading').show();
		var message = CKEDITOR.instances.advancedReaction.getData();
		addReaction(message, '<?php echo $forum_topic['id']; ?>');
	});
	
	<?php if($forum_topic['user_id'] == $core->ExploitRetainer($users->UserInfo($username, 'id'))){ ?>
	
	$("#onclickCloseEditTopic").click(function () {
		$("#overlowEditTopic").fadeOut("slow");
	});
	
	$('.editTopicPost').click(function(){
		$('.insideEditTopic').hide();
		$('.insideEditTopicLoading').show();
		var message = CKEDITOR.instances.EditTopic.getData();
		var prefix = $("#editTopicPrefix").val();
		var name = $("#editTopicName").val();
		var description = $("#editTopicDescription").val();
		$.post("<?php echo HOST; ?>/forum/edit/topic", { id: '<?php echo $topic_id; ?>', message: message, prefix: prefix, name: name, description: description }, function(){
			location.reload();
		});
	});
	
	<?php } ?>

});

function addEditorReplacer(editorID) {

	CKEDITOR.replace(editorID, {
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
		width: "868px",
       	height: "200px"
	});
	
}

function addReaction(message, parent_id){
	
	$.post("<?php echo HOST; ?>/forum/add/reaction", { message: message, parent_id: parent_id }, function(reaction_id){
		document.location.href='<?php echo HOST; ?>/forum/display/<?php echo $forum_id; ?>/topic/<?php echo $topic_id; ?>/lastpage/reaction/' + reaction_id + '';
	});
	
}

function addReactionQuote(message, parent_id, quote){
	
	$.post("<?php echo HOST; ?>/forum/add/reaction", { message: message, parent_id: parent_id, quote: quote }, function(reaction_id){
		document.location.href='<?php echo HOST; ?>/forum/display/<?php echo $forum_id; ?>/topic/<?php echo $topic_id; ?>/lastpage/reaction/' + reaction_id + '';
	});
	
}

function loadReaction(id){
	
	$('.loadHereTheReactionEdit').html('<img style="margin-top:80px; margin-bottom: 80px; margin-left: 315px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif">');
	
	$.post("<?php echo HOST; ?>/forum/load/reaction", { id: id, forum_id: '<?php echo $forum_id; ?>', topic_id: '<?php echo $topic_id; ?>' }, function(reactionEdit){
		$('.loadHereTheReactionEdit').html(reactionEdit);
	});
}

<?php if($core->ExploitRetainer($users->UserPermission('cms_forum_del_reactions', $username))){ ?>

	function deleteReaction(id){
		
		$.post("<?php echo HOST; ?>/forum/delete/reaction", { id: id });
		
	}

<?php } ?>
</script>

<div class="redirectUrlForm"></div>

<div class="overlowContainer" id="overlowEditReaction">

	<div class="container" style="width: 700px;">
		
		<div class="top"></div>
        
        <div class="localOverlowTitleSettings"><ubuntu>Reactie wijzigen</ubuntu></div>
		
		<div id="onclickCloseEditReaction" class="closeButton"></div>
		
		<div class="text">
            
            <div class="loadHereTheReactionEdit">
            
            	<img style="margin-top:80px; margin-bottom: 80px; margin-left: 115px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif">
            
            </div>
				
		</div>
		
		<div class="bottom"></div>
		
	</div>

</div>

<div class="overlowContainer" id="overlowAdvancedReaction">

	<div class="container" style="width: 700px;">
		
		<div class="top"></div>
        
        <div class="localOverlowTitleSettings"><ubuntu>Geavanceerde reactie</ubuntu></div>
		
		<div id="onclickCloseAdvancedReaction" class="closeButton"></div>
		
		<div class="text">
        
        	<div class="insideAdvancedReactionLoading" style="display: none;"><img style="margin-top:80px; margin-bottom: 80px; margin-left: 115px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></div>
        
        	<div class="insideAdvancedReaction">
        
        	<textarea id="advancedReaction" name="advancedReaction" class="advancedReaction"></textarea>
            
            <script>
			CKEDITOR.replace('advancedReaction', {
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
    
    		<input type="submit" style="margin-top: 5px;" class="submitRight addAdvancedReaction" id="submitBlack" value="Plaats">
            
            </div>
				
		</div>
		
		<div class="bottom"></div>
		
	</div>

</div>

<?php if($forum_topic['user_id'] == $core->ExploitRetainer($users->UserInfo($username, 'id'))){ ?>

<div class="overlowContainer" id="overlowEditTopic">

	<div class="container" style="width: 720px;">
		
		<div class="top"></div>
        
        <div class="localOverlowTitleSettings"><ubuntu>Onderwerp wijzigen</ubuntu></div>
		
		<div id="onclickCloseEditTopic" class="closeButton"></div>
		
		<div class="text">
        
        	<div class="insideEditTopicLoading" style="display: none;"><img style="margin-top:80px; margin-bottom: 80px; margin-left: 115px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></div>
        
        	<div class="insideEditTopic">
            
            <div class="insideContainer">
            
            <div style="width: 150px; display: table; float: left;">
            
            	<div>
				
					<label style="font-size: 15px;"><ubuntu>Voorvoegsel</ubuntu></label>
					
					<br>
				
					<select id="editTopicPrefix" name="editTopicPrefix" class="select" style="width: 100%;">
				
						<option <?php if($forum_topic['prefix'] == ''){ echo 'selected=selected'; } ?> value="">[Geen voorvoegsel]</option>
                        <optgroup label="Standaart">
                        	<option <?php if($forum_topic['prefix'] == '[Algemeen]'){ echo 'selected=selected'; } ?> value="[Algemeen]">[Algemeen]</option>
							<option <?php if($forum_topic['prefix'] == '[Vraag]'){ echo 'selected=selected'; } ?> value="[Vraag]">[Vraag]</option>
                        	<option <?php if($forum_topic['prefix'] == '[Belangrijk!]'){ echo 'selected=selected'; } ?> value="[Belangrijk!]">[Belangrijk!]</option>
                        	<option <?php if($forum_topic['prefix'] == '[Aankondiging ]'){ echo 'selected=selected'; } ?> value="[Aankondiging]">[Aankondiging]</option>
                        	<option <?php if($forum_topic['prefix'] == '[Poll]'){ echo 'selected=selected'; } ?> value="[Poll]">[Poll]</option>
                        	<option <?php if($forum_topic['prefix'] == '[Anders]'){ echo 'selected=selected'; } ?> value="[Anders]">[Anders]</option>
                        </optgroup>
                        <optgroup label="Development">
                        	<option <?php if($forum_topic['prefix'] == '[Release]'){ echo 'selected=selected'; } ?> value="[Release]">[Release]</option>
                        	<option <?php if($forum_topic['prefix'] == '[Development]'){ echo 'selected=selected'; } ?> value="[Development]">[Development]</option>
                        	<option <?php if($forum_topic['prefix'] == '[Beta]'){ echo 'selected=selected'; } ?> value="[Beta]">[Beta]</option>
                        	<option <?php if($forum_topic['prefix'] == '[Tutorial]'){ echo 'selected=selected'; } ?> value="[Tutorial]">[Tutorial]</option>
                        	<option <?php if($forum_topic['prefix'] == '[Request]'){ echo 'selected=selected'; } ?> value="[Request]">[Request]</option>
                        </optgroup>
				
					</select>
				
				</div>
                
            </div>
            
            <div style="width: 498px; display: table; float: right;">
            
            	<div>
				
					<label style="font-size: 15px;"><ubuntu>Titel</ubuntu></label>
					
					<br>
				
					<input type="text" name="editTopicName" id="editTopicName" value="<?php echo $forum_topic['name']; ?>" />
				
				</div>
                
            </div>
            
            <div style="width: 100%; display: table; float: left;">
            
            	<div>
				
					<label style="font-size: 15px;"><ubuntu>Beschrijving</ubuntu></label>
					
					<br>
				
					<input type="text" name="editTopicDescription" id="editTopicDescription" value="<?php echo $forum_topic['description']; ?>" />
				
				</div>
                
            </div>
            
            <div style="width: 100%; padding-top: 10px; display: table;">
        
        	<textarea id="EditTopic" name="EditTopic" class="EditTopic"><?php echo html_entity_decode(htmlspecialchars_decode($forum_topic['message'])); ?></textarea>
            
            </div>
            
            </div>
            
            <script>
			CKEDITOR.replace('EditTopic', {
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
    
    		<input type="submit" style="margin-top: 5px;" class="submitRight editTopicPost" id="submitBlack" value="<?php echo $language['edit']; ?>">
            
            </div>
				
		</div>
		
		<div class="bottom"></div>
		
	</div>

</div>

<?php } ?>

<?php if($core->ExploitRetainer($users->UserPermission('cms_forum_topic', $username))){ ?>

<script>
$(document).ready(function() {
    
	$("#onclickOpenManagerTopic").click(function () {
		$("#overlowManagerTopic").fadeIn("slow");
	});
	$("#onclickCloseManagerTopic").click(function () {
		$("#overlowManagerTopic").fadeOut("slow");
	});
	
	$("#onclickOpenManagerTopicEdit").click(function () {
		$(".overlowManagerTopic").fadeOut(function(){
			$("#overlowManagerTopicEdit").fadeIn();
		});
	});
	$("#onclickCloseManagerTopicEdit").click(function () {
		$("#overlowManagerTopicEdit").fadeOut(function(){
			$(".overlowManagerTopic").fadeIn();
		});
	});
	
	$("#onclickOpenManagerTopicClose").click(function () {
		$(".overlowManagerTopic").fadeOut(function(){
			$("#overlowManagerTopicClose").fadeIn();
		});
	});
	$("#onclickCloseManagerTopicClose").click(function () {
		$("#overlowManagerTopicClose").fadeOut(function(){
			$(".overlowManagerTopic").fadeIn();
		});
	});
	
	$("#onclickOpenManagerTopicScreen").click(function () {
		$(".overlowManagerTopic").fadeOut(function(){
			$("#overlowManagerTopicScreen").fadeIn();
		});
	});
	$("#onclickCloseManagerTopicScreen").click(function () {
		$("#overlowManagerTopicScreen").fadeOut(function(){
			$(".overlowManagerTopic").fadeIn();
		});
	});
	
	$("#onclickOpenManagerTopicDelete").click(function () {
		$(".overlowManagerTopic").fadeOut(function(){
			$("#overlowManagerTopicDelete").fadeIn();
		});
	});
	$("#onclickCloseManagerTopicDelete").click(function () {
		$("#overlowManagerTopicDelete").fadeOut(function(){
			$(".overlowManagerTopic").fadeIn();
		});
	});

});
</script>

<div class="overlowContainer" id="overlowManagerTopic">

	<div class="container overlowManagerTopic" style="width: 560px;display: table;">
		
		<div class="top"></div>
		
		<div class="localOverlowTitleSettings"><ubuntu>Beheer dit onderwerp</ubuntu></div>
		
		<div id="onclickCloseManagerTopic" class="closeButton"></div>
		
		<div class="text" style="width: 100%; margin-left: -20px; margin-right: -20px;">
			
			<div class="managerMenu space" style="margin-bottom: 10px;">
					
				<div id="onclickOpenManagerTopicClose" class="tab"><div class="managerArrow"></div><ubuntu>Onderwerp sluiten</ubuntu></div>
					
			</div>
            
            <div class="managerMenu space" style="margin-bottom: 10px;">
					
				<div id="onclickOpenManagerTopicScreen" class="tab"><div class="managerArrow"></div><ubuntu>Onderwerp afschermen</ubuntu></div>
					
			</div>
            
            <div class="managerMenu space" style="margin-bottom: 10px;">
					
				<div id="onclickOpenManagerTopicEdit" class="tab"><div class="managerArrow"></div><ubuntu>Onderwerp wijzigen</ubuntu></div>
					
			</div>
            
            <div class="managerMenu space" style="margin-bottom: 10px;">
					
				<div id="onclickOpenManagerTopicDelete" class="tab"><div class="managerArrow"></div><ubuntu>Onderwerp verwijderen</ubuntu></div>
					
			</div>
            
		</div>
		
		<div class="bottom"></div>
		
	</div>

</div>

<script>
$(document).ready(function(){
	
	$('.editTopicPostManager').click(function(){
		$('.insideEditTopicManager').hide();
		$('.insideEditTopicLoadingManager').show();
		var message = CKEDITOR.instances.EditTopicManager.getData();
		var prefix = $("#editTopicPrefixManager").val();
		var name = $("#editTopicNameManager").val();
		var description = $("#editTopicDescriptionManager").val();
		$.post("<?php echo HOST; ?>/forum/edit/topic", { id: '<?php echo $topic_id; ?>', message: message, prefix: prefix, name: name, description: description }, function(){
			location.reload();
		});
	});
});
</script>

<div class="overlowContainer nobackground" id="overlowManagerTopicEdit">

	<div class="container" style="width: 720px;">
		
		<div class="top"></div>
        
        <div class="localOverlowTitleSettings"><ubuntu>Onderwerp wijzigen</ubuntu></div>
		
		<div id="onclickCloseManagerTopicEdit" class="closeButton"></div>
		
		<div class="text">
        
        	<div class="insideManagerTopicEditLoading" style="display: none;"><img style="margin-top:80px; margin-bottom: 80px; margin-left: 115px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></div>
        
        	<div class="insideManagerTopicEdit">
            
            <div class="insideContainer">
            
            <div style="width: 150px; display: table; float: left;">
            
            	<div>
				
					<label style="font-size: 15px;"><ubuntu>Voorvoegsel</ubuntu></label>
					
					<br>
				
					<select id="editTopicPrefixManager" name="editTopicPrefixManager" class="select" style="width: 100%;">
				
						<option <?php if($forum_topic['prefix'] == ''){ echo 'selected=selected'; } ?> value="">[Geen voorvoegsel]</option>
                        <optgroup label="Standaart">
                        	<option <?php if($forum_topic['prefix'] == '[Algemeen]'){ echo 'selected=selected'; } ?> value="[Algemeen]">[Algemeen]</option>
							<option <?php if($forum_topic['prefix'] == '[Vraag]'){ echo 'selected=selected'; } ?> value="[Vraag]">[Vraag]</option>
                        	<option <?php if($forum_topic['prefix'] == '[Belangrijk!]'){ echo 'selected=selected'; } ?> value="[Belangrijk!]">[Belangrijk!]</option>
                        	<option <?php if($forum_topic['prefix'] == '[Aankondiging ]'){ echo 'selected=selected'; } ?> value="[Aankondiging]">[Aankondiging]</option>
                        	<option <?php if($forum_topic['prefix'] == '[Poll]'){ echo 'selected=selected'; } ?> value="[Poll]">[Poll]</option>
                        	<option <?php if($forum_topic['prefix'] == '[Anders]'){ echo 'selected=selected'; } ?> value="[Anders]">[Anders]</option>
                        </optgroup>
                        <optgroup label="Development">
                        	<option <?php if($forum_topic['prefix'] == '[Release]'){ echo 'selected=selected'; } ?> value="[Release]">[Release]</option>
                        	<option <?php if($forum_topic['prefix'] == '[Development]'){ echo 'selected=selected'; } ?> value="[Development]">[Development]</option>
                        	<option <?php if($forum_topic['prefix'] == '[Beta]'){ echo 'selected=selected'; } ?> value="[Beta]">[Beta]</option>
                        	<option <?php if($forum_topic['prefix'] == '[Tutorial]'){ echo 'selected=selected'; } ?> value="[Tutorial]">[Tutorial]</option>
                        	<option <?php if($forum_topic['prefix'] == '[Request]'){ echo 'selected=selected'; } ?> value="[Request]">[Request]</option>
                        </optgroup>
				
					</select>
				
				</div>
                
            </div>
            
            <div style="width: 498px; display: table; float: right;">
            
            	<div>
				
					<label style="font-size: 15px;"><ubuntu>Titel</ubuntu></label>
					
					<br>
				
					<input type="text" name="editTopicNameManager" id="editTopicNameManager" value="<?php echo $forum_topic['name']; ?>" />
				
				</div>
                
            </div>
            
            <div style="width: 100%; display: table; float: left;">
            
            	<div>
				
					<label style="font-size: 15px;"><ubuntu>Beschrijving</ubuntu></label>
					
					<br>
				
					<input type="text" name="editTopicDescriptionManager" id="editTopicDescriptionManager" value="<?php echo $forum_topic['description']; ?>" />
				
				</div>
                
            </div>
            
            <div style="width: 100%; padding-top: 10px; display: table;">
        
        	<textarea id="EditTopicManager" name="EditTopicManager" class="EditTopicManager"><?php echo html_entity_decode(htmlspecialchars_decode($forum_topic['message'])); ?></textarea>
            
            </div>
            
            </div>
            
            <script>
			CKEDITOR.replace('EditTopicManager', {
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
    
    		<input type="submit" style="margin-top: 5px;" class="submitRight editTopicPostManager" id="submitBlack" value="<?php echo $language['edit']; ?>">
            
            </div>
				
		</div>
		
		<div class="bottom"></div>
		
	</div>

</div>

<script>
$(document).ready(function(){
	$('.closeTopic').click(function(){
		$.post("<?php echo HOST; ?>/forum/close/topic", { id: '<?php echo $topic_id; ?>' }, function(){
			location.reload();
		});
	});
});
</script>

<div class="overlowContainer nobackground" id="overlowManagerTopicClose">

	<div class="container" style="width: 350px;">
		
		<div class="top"></div>
		
		<div id="onclickCloseManagerTopicClose" class="closeButton"></div>
		
		<div class="text">
			
			<div id="frankAvatar"></div> 
				
			<div class="frankBubble left">

				<div class="frankBubbleArrowWhite"></div>
					
				<div class="frankBubbleText" style="">
					
					Weet je zeker dat je dit onderwerp wilt sluiten? Na het sluiten van het onderwerp kan/mag het niet meer opengezet worden.
						
				</div>
					
			</div>
			
			<input type="submit" style="margin-top: 5px;" class="submitRight closeTopic" id="submitBlack" value="Ja, sluit het onderwerp">
				
		</div>
		
		<div class="bottom"></div>
		
	</div>

</div>

<script>
$(document).ready(function(){
	$('.screenTopic').click(function(){
		$.post("<?php echo HOST; ?>/forum/screen/topic", { id: '<?php echo $topic_id; ?>' }, function(){
			location.reload();
		});
	});
});
</script>

<div class="overlowContainer nobackground" id="overlowManagerTopicScreen">

	<div class="container" style="width: 350px;">
		
		<div class="top"></div>
		
		<div id="onclickCloseManagerTopicScreen" class="closeButton"></div>
		
		<div class="text">
			
			<div id="frankAvatar"></div> 
				
			<div class="frankBubble left">

				<div class="frankBubbleArrowWhite"></div>
					
				<div class="frankBubbleText" style="">
					
					Weet je zeker dat je dit onderwerp wilt afschermen? Na het afschermen van het onderwerp kan/mag het niet meer opengezet worden.
						
				</div>
					
			</div>
			
			<input type="submit" style="margin-top: 5px;" class="submitRight screenTopic" id="submitBlack" value="Ja, scherm het onderwerp af">
				
		</div>
		
		<div class="bottom"></div>
		
	</div>

</div>

<script>
$(document).ready(function(){
	$('.deleteTopic').click(function(){
		$.post("<?php echo HOST; ?>/forum/delete/topic", { id: '<?php echo $topic_id; ?>' }, function(){
			document.location.href='<?php echo HOST; ?>/forum/display/<?php echo $forum_id; ?>';
		});
	});
});
</script>

<div class="overlowContainer nobackground" id="overlowManagerTopicDelete">

	<div class="container" style="width: 350px;">
		
		<div class="top"></div>
		
		<div id="onclickCloseManagerTopicDelete" class="closeButton"></div>
		
		<div class="text">
			
			<div id="frankAvatar"></div> 
				
			<div class="frankBubble left">

				<div class="frankBubbleArrowWhite"></div>
					
				<div class="frankBubbleText" style="">
					
					Weet je zeker dat je dit onderwerp wilt verwijderen? Na het verwijderen van het onderwerp kun je het niet meer ophalen.
						
				</div>
					
			</div>
			
			<input type="submit" style="margin-top: 5px;" class="submitRight deleteTopic" id="submitBlack" value="Ja, verwijder het onderwerp">
				
		</div>
		
		<div class="bottom"></div>
		
	</div>

</div>

<?php } ?>

<?php include("apps/float_includes.php"); ?>
<?php include("apps/system/float_includes.php"); ?>

<?php include("apps/system/header_top.php"); ?>

<div id="container">
	
	<div id="middleContainer">
	
		<?php include("apps/system/container_header.php"); ?>

		<div id="containerMiddle">

			<div id="containerLeft">
            
            	<div id="containerSpace"></div>

				<div class="boxContainer rounded">
                
					<div style="background-color: #DDD; padding: 10px; border: 1px solid #DDD; border-radius: 3px; margin-bottom: 5px;"><ubuntu>
                    
                       <font style="cursor: pointer;" onClick="location.href='<?php  echo HOST; ?>/forum'">Forum</font>
                       
                       	<?php if($forum_third['count_id'] == '3'){ ?>
                        
                        	<?php 
								$query_forum_second = mysql_query("SELECT * FROM forums WHERE id = '".$forum_third['parent_id']."' ORDER BY id");
								$forum_second = mysql_fetch_array($query_forum_second);
							?>
                            
                            <font style="cursor: pointer;" onClick="location.href='<?php  echo HOST; ?>/forum/display/<?php echo $forum_second['id']; ?>'"> < <?php echo $forum_second['name']; ?></font>
                            
                            <font style="cursor: pointer;" onClick="location.href='<?php  echo HOST; ?>/forum/display/<?php echo $forum_third['id']; ?>'"> < <?php echo $forum_third['name']; ?></font>
                       
                       	<?php }else{ ?>
                       
                       		<font style="cursor: pointer;" onClick="location.href='<?php  echo HOST; ?>/forum/display/<?php echo $forum_third['id']; ?>'"> < <?php echo $forum_third['name']; ?></font>
                        
                      	<?php } ?>
                       
                       <font style="font-weight: bold;"> < <?php echo $forum_topic['prefix']; ?> <?php echo $forum_topic['name']; ?></font>
                       
                    </ubuntu>
                    
                    <?php if($core->ExploitRetainer($users->UserPermission('cms_forum_topic', $username))){ ?>
                            
                    	<a class="overlowButton" style="float: right; margin-top: -7px; margin-right: -5px;">
				
							<b><u>
                                
                    			<div id="onclickOpenManagerTopic" title="Dit onderwerp beheren" class="overlowIcon edit"></div>
                                    
                    		</u></b>
                                
                   	 		<div></div>
                                
                   	 	</a>
                            
                    <?php } ?>
                    
                    </div>
                    
                    <?php if($forum_topic['screen'] == '0'){ ?>
                    
                     <?php if($forum_topic['closed'] == '1'){ ?><div class="error<?php echo $avatarimage_url; ?>Overlow" style="width: 858px; margin-bottom: 5px;">Dit topic is gesloten door een van de medewerkers.</div><?php } ?>
                    
                    <div class="boxHeader big rounded orange"><ubuntu><?php echo $forum_topic['prefix']; ?> <?php echo $forum_topic['name']; ?></ubuntu></div>
                    
                    <?php
					$query_user_starter_forum = mysql_query("SELECT * FROM forum_reactions WHERE user_id = '".$forum_topic['user_id']."'");
					$count_query_user_starter_forum = mysql_num_rows($query_user_starter_forum);
					$user_starter_forum = mysql_fetch_array($query_user_starter_forum);
					?>
                    
                    <div style="display: table; width: 100%; background-color: #EAEAEA;">
                    
                    	<div style="background-color: #F4F4F4; border-top: 1px solid #F4F4F4; padding: 5px 10px 5px 10px; border-bottom: 1px solid #D4D4D4;">
                        	<ubuntu><b><?php echo $core->timeAgo($forum_topic['published']); ?></b> gepost op <b><?php echo strftime("%A %d %B %Y", $forum_topic['published']); ?></b></ubuntu>
                        </div>
                        
                        <div style="width: 100%; display: table; border-bottomm: 1px solid #D4D4D4;">
                        
                        	<div style="width: 200px; background-color: #EDEDED; padding: 10px; float: left;">
                            
                            	<?php if($core->ExploitRetainer($users->UserInfoByID($forum_topic['user_id'], 'online')) == 1){ $user_status_forum = 'online'; }else{ $user_status_forum = 'offline'; } ?>
                            
                            	<center><img src="<?php echo HOST; ?>/web-gallery/icons/<?php echo $user_status_forum; ?>.gif"></center>
                                
                                <div style="height: 5px;"></div>
                            
                            	<center><font style="font-size: 20px; cursor: pointer;" onClick="location.href='<?php echo HOST; ?>/home/<?php echo $core->ExploitRetainer($users->UserInfoByID($forum_topic['user_id'], 'id')); ?>'"><ubuntu><?php echo $core->ExploitRetainer($users->UserInfoByID($forum_topic['user_id'], 'username')); ?></ubuntu></font></center>
                                
                                <div style="height: 10px;"></div>
                                
                                <div style="height: 150px; width: 150px; margin-bottom: -1px; background-image: url(<?php echo $core->ExploitRetainer($users->UserInfoByID($forum_topic['user_id'], 'forum_avatar_url')); ?>); margin: auto;"></div>
                                
                                <div style="width: 180px; background-color: #F4F4F4; padding: 10px; border: 1px solid #D4D4D4; border-radius: 3px;">
                                
                                	<ubuntu>Aantal reacties: <b><?php echo $count_query_user_starter_forum; ?></b></ubuntu>
                                    
                                    <div style="width: 100%; border-top: 1px solid #CCCCCC; border-bottom: 1px solid #FFFFFF; margin-top: 5px; margin-bottom: 5px;"></div>
                                    
                                    <ubuntu>Gebruiker sinds: <b><?php echo strftime("%d-%m-%Y", $core->ExploitRetainer($users->UserInfoByID($forum_topic['user_id'], 'account_created'))); ?></b></ubuntu>
                                
                                </div>
                            
                            </div>
                            
                            <div style="width: 639px; float: left; border-left: 1px solid #EFEFEF; background-color: #FFFFFF; padding: 15px; min-height: 251px;" id="">
                            
                            	<ubuntu><?php echo $core->protectRedirect(html_entity_decode(htmlspecialchars_decode($forum_topic['message']))); ?></ubuntu>
                                
                            </div>
                            
                            <div style="width: 100%;">
                            	
                                <div style="width: 650px; height: auto; max-height: 100px; overflow-y: scroll; float: right; background-color: #FFFFFF; border-top: 2px solid #EAEAEA; padding: 10px;">
                                
                                	<?php echo $core->protectRedirect(html_entity_decode(htmlspecialchars_decode($users->UserInfoByID($forum_topic['user_id'], 'signature')))); ?>
                                
                                </div>
                                
                            </div>
                            
                        </div>
                        
                       	<div id="reply_container_<?php echo $forum_topic['id']; ?>" style="background-color: #E2E2E2; border-top: 1px solid #EFEFEF; padding: 10px 10px 10px 10px; border-bottom: 1px solid #EFEFEF; display: table; width: 100%;">
                        <?php if($forum_topic['closed'] == '0'){ ?>
                            
                        	<input type="hidden" id="valueTheMessage<?php echo $forum_topic['id']; ?>">
                            
                            <script>
							$(document).ready(function(){
									
								$('#second_message_<?php echo $forum_topic['id']; ?> blockquote').remove();
									
								setInterval(function(){
									$('#valueTheMessage<?php echo $forum_topic['id']; ?>').val($('#second_message_<?php echo $forum_topic['id']; ?>').html());
								}, 1);
									
								$('.value_quote_with_topic_<?php echo $forum_topic['id']; ?>').click(function() {
									$('.reply_quote').slideUp();
									$('#reply_quote_<?php echo $forum_topic['id']; ?>').remove();
									$('#reply_container_<?php echo $forum_topic['id']; ?>').append('<div id="reply_quote_<?php echo $forum_topic['id']; ?>" class="reply_quote" style="display: none; margin-top: 20px;"></div>');
									$('#reply_quote_<?php echo $forum_topic['id']; ?>').html('<textarea id="quoteBlockIdMessageTopic<?php echo $forum_topic['id']; ?>" name="quoteBlockIdMessageTopic<?php echo $forum_topic['id']; ?>" class="quoteBlockIdMessageTopic<?php echo $forum_topic['id']; ?>"></textarea><div id="scriptValues<?php echo $forum_topic['id']; ?>"></div><input type="submit" style="margin-top: 5px;" class="submitLeft stopQuote<?php echo $forum_topic['id']; ?>" id="submitRed" value="Afbreken"><input type="submit" style="margin-top: 5px;" class="submitRight postQuote<?php echo $forum_topic['id']; ?>" id="submitBlack" value="Plaatsen">');
									addEditorReplacer('quoteBlockIdMessageTopic<?php echo $forum_topic['id']; ?>');
									$('#reply_quote_<?php echo $forum_topic['id']; ?>').slideDown();
										
									var objToContainer<?php echo $forum_topic['id']; ?> = document.getElementById('scriptValues<?php echo $forum_topic['id']; ?>')
									var scriptContainer<?php echo $forum_topic['id']; ?>   = document.createElement("script");
									scriptContainer<?php echo $forum_topic['id']; ?>.text  = "$(document).ready(function() { $('.stopQuote<?php echo $forum_topic['id']; ?>').click(function(){ $('.reply_quote').slideUp(function(){ $('#reply_quote_<?php echo $forum_topic['id']; ?>').remove(); }); }); setInterval(function(){ var message = $('#quoteBlockIdMessageTopic<?php echo $forum_topic['id']; ?>').val(); }, 1); $('.postQuote<?php echo $forum_topic['id']; ?>').click(function(){ var message = CKEDITOR.instances.quoteBlockIdMessageTopic<?php echo $forum_topic['id']; ?>.getData(); addReactionQuote(message, '<?php echo $forum_topic['id']; ?>', '<?php echo $forum_topic['id']; ?>'); }); });";
									objToContainer<?php echo $forum_topic['id']; ?>.appendChild(scriptContainer<?php echo $forum_topic['id']; ?>); 
									
									CKEDITOR.instances.quoteBlockIdMessageTopic<?php echo $forum_topic['id']; ?>.setData('<blockquote id="<?php echo $forum_topic['id']; ?>" class="blockquote_<?php echo $forum_topic['id']; ?>"><div class="blockquotetitle"><b><?php echo $core->ExploitRetainer($users->UserInfoByID($forum_topic['user_id'], 'username')); ?></b> heeft dit geplaatst op <?php echo strftime("%A %d %B %Y %H:%M:%S", $forum_topic['published']); ?></div><?php echo html_entity_decode(htmlspecialchars_decode($forum_topic['message'])); ?></blockquote><div id="reactionBlockQuoteBlock<?php echo $forum_topic['id']; ?>"><br></div>');
										
								});
							});
							</script>
                        
                        	<div class="value_quote_with_topic_<?php echo $forum_topic['id']; ?>" style="background: url(<?php echo HOST; ?>/web-gallery/forum/quote_reply_bg.gif) no-repeat 0 0px; float: right; padding-left: 18px; cursor: pointer; display: table;"><ubuntu>Antwoorden met een <b>quote</b></ubuntu></div>
                            
                            <?php if($forum_topic['user_id'] == $core->ExploitRetainer($users->UserInfo($username, 'id'))){ ?>
                                
                               	<script>
								$(document).ready(function(){
									$('.value_reaction_edit_topic_<?php echo $forum_topic['id']; ?>').click(function(){
										$('#overlowEditTopic').fadeIn();
									});
								});
								</script>
                                
                                <div class="value_reaction_edit_topic_<?php echo $forum_topic['id']; ?>" style="background: url(<?php echo HOST; ?>/web-gallery/forum/edit_post_bg.gif) no-repeat 0 0px; float: right; height: 16px; margin-right: 10px; margin-top: -3px; padding-top: 3px; padding-left: 20px; margin-bottom: -3px; cursor: pointer; display: table;"><ubuntu>Wijzig onderwerp</ubuntu></div>
                                
                            <?php } ?>
                            
                            <?php } ?>
                        	
                        </div>
                    
                    </div>
                    
                    <div class="boxHeader big rounded gray" id="reactions" style="margin-top: 5px;"><ubuntu>Reacties</ubuntu></div>
                    
                    <?php
					$rowsPerPage = 20;
					$pageNum = 1;
					if(isset($_GET['page']) && $core->ExploitRetainer($_GET['page'])){
    					$pageNum = $core->ExploitRetainer($_GET['page']);
					}
					$offset = ($pageNum - 1) * $rowsPerPage;
					$result = mysql_query("SELECT * FROM forum_reactions WHERE parent_id = '".$forum_topic['id']."' ORDER BY published LIMIT ".$offset.", ".$rowsPerPage."") or die('Error, query failed');
					$rs_result2 = mysql_num_rows(mysql_query("SELECT * FROM forum_reactions WHERE parent_id = '".$forum_topic['id']."'")); 
					if($rs_result2 == 0){ echo '<div class="errorMessageOverlow" style="width: 858px;">Er zijn nog geen reacties in dit onderwerp geplaatst.</div>'; }
					while($forum_reactions = mysql_fetch_array($result)){

						$query_user_starter_forum_sec = mysql_query("SELECT * FROM forum_reactions WHERE user_id = '".$forum_reactions['user_id']."'");
						$count_query_user_starter_forum_sec = mysql_num_rows($query_user_starter_forum_sec);
						$user_starter_forum_sec = mysql_fetch_array($query_user_starter_forum_sec);
					?>
                    
                    	<div style="display: table; width: 100%; background-color: #EAEAEA;" id="reaction_<?php echo $forum_reactions['id']; ?>">
                    
                    		<div style="background-color: #F4F4F4; border-top: 1px solid #F4F4F4; padding: 5px 10px 5px 10px; border-bottom: 1px solid #D4D4D4;">
                        		<ubuntu><b><?php echo $core->timeAgo($forum_reactions['published']); ?></b> gepost op <b><?php echo strftime("%A %d %B %Y", $forum_reactions['published']); ?></b></ubuntu>
                        	</div>
                        
                        	<div style="width: 100%; display: table; border-bottomm: 1px solid #D4D4D4;">
                        
                        		<div style="width: 200px; background-color: #EDEDED; padding: 10px; float: left;">
                            
                            		<?php if($core->ExploitRetainer($users->UserInfoByID($forum_reactions['user_id'], 'online')) == 1){ $user_status_forum_sec = 'online'; }else{ $user_status_forum_sec = 'offline'; } ?>
                            
                            		<center><img src="<?php echo HOST; ?>/web-gallery/icons/<?php echo $user_status_forum_sec; ?>.gif"></center>
                                
                                	<div style="height: 5px;"></div>
                            
                            		<center><font style="font-size: 20px; cursor: pointer;" onClick="location.href='<?php echo HOST; ?>/home/<?php echo $core->ExploitRetainer($users->UserInfoByID($forum_reactions['user_id'], 'id')); ?>'"><ubuntu><?php echo $core->ExploitRetainer($users->UserInfoByID($forum_reactions['user_id'], 'username')); ?></ubuntu></font></center>
                                
                                	<div style="height: 10px;"></div>
                                
                                	<div style="height: 150px; width: 150px; margin-bottom: -1px; background-image: url(<?php echo $core->ExploitRetainer($users->UserInfoByID($forum_reactions['user_id'], 'forum_avatar_url')); ?>); margin: auto;"></div>
                                
                                	<div style="width: 180px; background-color: #F4F4F4; padding: 10px; border: 1px solid #D4D4D4; border-radius: 3px;">
                                
                                		<ubuntu>Aantal reacties: <b><?php echo $count_query_user_starter_forum_sec; ?></b></ubuntu>
                                    
                                   	 	<div style="width: 100%; border-top: 1px solid #CCCCCC; border-bottom: 1px solid #FFFFFF; margin-top: 5px; margin-bottom: 5px;"></div>
                                    
                                    	<ubuntu>Gebruiker sinds: <b><?php echo strftime("%d-%m-%Y", $core->ExploitRetainer($users->UserInfoByID($forum_reactions['user_id'], 'account_created'))); ?></b></ubuntu>
                                
                                	</div>
                            
                            	</div>
                            
                            	<div style="width: 639px; float: left; border-left: 1px solid #EFEFEF; background-color: #FFFFFF; padding: 15px; min-height: 251px;" id="">
                                
                                	<div style="width: 100%; border-bottom: 1px solid #C8C8C8; font-weight: bold; padding-bottom: 10px; margin-bottom: 10px;">
                                    	<ubuntu>RE: <?php echo $forum_topic['prefix']; ?> <?php echo $forum_topic['name']; ?></ubuntu>
                                
                                		<?php if($core->ExploitRetainer($users->UserPermission('cms_forum_del_reactions', $username))){ ?>
                                        
                                        <?php if($forum_topic['closed'] == '0'){ ?>
                                    
                                    		<script>
											$(document).ready(function(){
												$('#onclickOpenDeleteReaction<?php echo $forum_reactions['id']; ?>').click(function(){
													$('#reaction_<?php echo $forum_reactions['id']; ?>').fadeOut();
													deleteReaction('<?php echo $forum_reactions['id']; ?>');
												});
											});
											</script>
                            
                            				<a class="overlowButton" style="float: right; margin-top: -10px;">
				
												<b><u>
                                
                                					<div id="onclickOpenDeleteReaction<?php echo $forum_reactions['id']; ?>" title="Weet je zeker dat je deze reactie wilt gaan verwijderen? Een keer geklikt is altijd weg." class="overlowIcon close"></div>
                                    
                               	 				</u></b>
                                
                                				<div></div>
                                
                            				</a>
                                            
                                        <?php } ?>
                            
                           		 		<?php } ?>
                                    
                                    </div>
                            
                            		<ubuntu><?php echo $core->protectRedirect(html_entity_decode(htmlspecialchars_decode($forum_reactions['message']))); ?></ubuntu>
                            
                            	</div>
                                
                                <div style="width: 100%;">
                            	
                                	<div style="width: 650px; height: auto; max-height: 100px; overflow-y: scroll; float: right; background-color: #FFFFFF; border-top: 2px solid #EAEAEA; padding: 10px;">
                                
                                		<?php echo $core->protectRedirect(html_entity_decode(htmlspecialchars_decode($users->UserInfoByID($forum_reactions['user_id'], 'signature')))); ?>
                                
                                	</div>
                                
                            	</div>
                                
                                <div id="second_message_<?php echo $forum_reactions['id']; ?>" style="display: none;">
                                
                                	<?php echo $core->protectRedirect(html_entity_decode(htmlspecialchars_decode($forum_reactions['message']))); ?>
                                
                                </div>
                        
                        	</div>
                        
                        	<div id="reply_container_<?php echo $forum_reactions['id']; ?>" style="background-color: #E2E2E2; border-top: 1px solid #EFEFEF; padding: 10px 10px 10px 10px; border-bottom: 1px solid #EFEFEF; display: table; width: 100%;">
                            
                            <?php if($forum_topic['closed'] == '0'){ ?>
                            
                            <input type="hidden" id="valueTheMessage<?php echo $forum_reactions['id']; ?>">
                            
                            	<script>
								$(document).ready(function(){
									
									$('#second_message_<?php echo $forum_reactions['id']; ?> blockquote').remove();
									
									setInterval(function(){
										$('#valueTheMessage<?php echo $forum_reactions['id']; ?>').val($('#second_message_<?php echo $forum_reactions['id']; ?>').html());
									}, 1);
									
									$('.value_quote_with_<?php echo $forum_reactions['id']; ?>').click(function() {
										$('.reply_quote').slideUp();
										$('#reply_quote_<?php echo $forum_reactions['id']; ?>').remove();
										$('#reply_container_<?php echo $forum_reactions['id']; ?>').append('<div id="reply_quote_<?php echo $forum_reactions['id']; ?>" class="reply_quote" style="display: none; margin-top: 20px;"></div>');
										<?php 
										if($forum_reactions['quote'] == 0){ }else{
										$search_message_quote = mysql_fetch_array(mysql_query("SELECT * FROM forum_reactions WHERE id = '".$forum_reactions['id']."'"));
										?>
										var replyTheBox<?php echo $forum_reactions['id']; ?> = $('#valueTheMessage<?php echo $forum_reactions['id']; ?>').val();
										<?php } ?>
										
										$('#reply_quote_<?php echo $forum_reactions['id']; ?>').html('<textarea id="quoteBlockIdMessage<?php echo $forum_reactions['id']; ?>" name="quoteBlockIdMessage<?php echo $forum_reactions['id']; ?>" class="quoteBlockIdMessage<?php echo $forum_reactions['id']; ?>"></textarea><div id="scriptValues<?php echo $forum_reactions['id']; ?>"></div><input type="submit" style="margin-top: 5px;" class="submitLeft stopQuote<?php echo $forum_reactions['id']; ?>" id="submitRed" value="Afbreken"><input type="submit" style="margin-top: 5px;" class="submitRight postQuote<?php echo $forum_reactions['id']; ?>" id="submitBlack" value="Plaatsen">');
										
										addEditorReplacer('quoteBlockIdMessage<?php echo $forum_reactions['id']; ?>');
										
										$('#reply_quote_<?php echo $forum_reactions['id']; ?>').slideDown();

										var objToContainer<?php echo $forum_reactions['id']; ?> = document.getElementById('scriptValues<?php echo $forum_reactions['id']; ?>')
										var scriptContainer<?php echo $forum_reactions['id']; ?>   = document.createElement("script");
										scriptContainer<?php echo $forum_reactions['id']; ?>.text  = "$(document).ready(function() { $('.stopQuote<?php echo $forum_reactions['id']; ?>').click(function(){ $('.reply_quote').slideUp(function(){ $('#reply_quote_<?php echo $forum_reactions['id']; ?>').remove(); }); }); setInterval(function(){ var message = $('#quoteBlockIdMessage<?php echo $forum_reactions['id']; ?>').val(); }, 1); $('.postQuote<?php echo $forum_reactions['id']; ?>').click(function(){ var message = CKEDITOR.instances.quoteBlockIdMessage<?php echo $forum_reactions['id']; ?>.getData(); addReactionQuote(message, '<?php echo $forum_topic['id']; ?>', '<?php echo $forum_reactions['id']; ?>'); }); });";
										objToContainer<?php echo $forum_reactions['id']; ?>.appendChild(scriptContainer<?php echo $forum_reactions['id']; ?>); 
										
										CKEDITOR.instances.quoteBlockIdMessage<?php echo $forum_reactions['id']; ?>.setData('<blockquote id="<?php echo $forum_reactions['id']; ?>" class="blockquote_<?php echo $forum_reactions['id']; ?>"><div class="blockquotetitle"><b><?php echo $core->ExploitRetainer($users->UserInfoByID($forum_reactions['user_id'], 'username')); ?></b> heeft dit geplaatst op <?php echo strftime("%A %d %B %Y %H:%M:%S", $forum_reactions['published']); ?></div>' + $('#valueTheMessage<?php echo $forum_reactions['id']; ?>').val() + '</blockquote><div id="reactionBlockQuoteBlock<?php echo $forum_reactions['id']; ?>"><br></div>');
										
									});
								});
								</script>
                                
                                <?php if($forum_reactions['edited'] == '1'){ ?><div style="float: left;"><ubuntu>Laatst gewijzigd: <b><?php echo strftime("%A %d %B %Y %H:%M:%S", $forum_reactions['edited_date']); ?></b></ubuntu></div><?php } ?>
                        
                        		<div class="value_quote_with_<?php echo $forum_reactions['id']; ?>" style="background: url(<?php echo HOST; ?>/web-gallery/forum/quote_reply_bg.gif) no-repeat 0 0px; float: right; padding-left: 18px; cursor: pointer; display: table;"><ubuntu>Antwoorden met een <b>quote</b></ubuntu></div>
                                
                                <?php if($forum_reactions['user_id'] == $core->ExploitRetainer($users->UserInfo($username, 'id'))){ ?>
                                
                                <script>
								$(document).ready(function(){
									$('.value_reaction_edit_<?php echo $forum_reactions['id']; ?>').click(function(){
										$('#overlowEditReaction').fadeIn();
										loadReaction('<?php echo $forum_reactions['id']; ?>');
									});
								});
								</script>
                                
                                <div class="value_reaction_edit_<?php echo $forum_reactions['id']; ?>" style="background: url(<?php echo HOST; ?>/web-gallery/forum/edit_post_bg.gif) no-repeat 0 0px; float: right; height: 16px; margin-right: 10px; margin-top: -3px; padding-top: 3px; padding-left: 20px; margin-bottom: -3px; cursor: pointer; display: table;"><ubuntu>Wijzig reactie</ubuntu></div>
                                
                                <?php } ?>
                                
                                <?php } ?>
                        	
                        	</div>
                    
                    	</div>
                    
                    <?php 
					} 
					$query   = "SELECT COUNT(id) AS numrows FROM forum_reactions WHERE parent_id = '".$forum_topic['id']."'";
					$result  = mysql_query($query) or die('Error, query failed');
					$row     = mysql_fetch_array($result, MYSQL_ASSOC);
					$numrows = $row['numrows'];
					$maxPage = ceil($numrows/$rowsPerPage);
					?>
                    
                    <div style="text-align: center; margin-top: 5px;">
                        
						<?php
						if ($pageNum > 1){
							$page  = $pageNum - 1;
							$prev  = ' <a href="'.HOST.'/forum/display/'.$forum_id.'/topic/'.$topic_id.'/page/'.$page.'#reactions" style="color: #3A3A3A; font-weight: bold; text-decoration: underline;">Vorige</a> ';
							$first = ' <a href="'.HOST.'/forum/display/'.$forum_id.'/topic/'.$topic_id.'/page/1#reactions" style="color: #3A3A3A; font-weight: bold; text-decoration: underline;">Eerste pagina</a> | ';
						} else{
							$prev  = '';
							$first = '';
						}

						if ($pageNum < $maxPage){
							$page = $pageNum + 1;
							$next = ' <a href="'.HOST.'/forum/display/'.$forum_id.'/topic/'.$topic_id.'/page/'.$page.'#reactions" style="color: #3A3A3A; font-weight: bold; text-decoration: underline;">Volgende</a> ';
							$last = ' | <a href="'.HOST.'/forum/display/'.$forum_id.'/topic/'.$topic_id.'/page/'.$maxPage.'#reactions" style="color: #3A3A3A; font-weight: bold; text-decoration: underline;">Laatste pagina</a> ';
						}else{
						   	$next = '';
						  	$last = '';
						}

						echo "<ubuntu>".$first.$prev." Pagina $pageNum van de $maxPage ".$next.$last."</ubuntu>";
						?>
                        
                    </div>
                    
                    <?php if($forum_topic['closed'] == '0'){ ?>
                    
                    <div class="boxHeader big rounded blue" id="reactions" style="margin-top: 5px;"><ubuntu>Snelle reactie</ubuntu></div>
                 
                    <textarea name="editorForumQuickReaction" id="editorForumQuickReaction" class="editorForumQuickReaction"></textarea>
					
					<script type="text/javascript">

						CKEDITOR.replace( 'editorForumQuickReaction', {
							toolbar : [
								{ name: 'document', items : [ <?php if($core->ExploitRetainer($users->UserPermission('cms_forum_reaction_source', $username))){ ?>'Source',<?php } ?>'NewPage','DocProps','Preview'  ] },
								{ name: 'clipboard', items : [ 'Undo','Redo' ] },
								{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike' ] },
								{ name: 'paragraph', items : [ 'Blockquote','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ] },
								{ name: 'links', items : [ 'Link','Unlink' ] },
								{ name: 'insert', items : [ 'Image','Smiley','SpecialChar' ] },
								{ name: 'styles', items : [ 'Font','FontSize' ] },
								{ name: 'colors', items : [ 'TextColor','BGColor' ] }
							],
							contentsCss : '<?php echo HOST; ?>/web-gallery/ckeditor/ckeditor.css',
							enterMode : CKEDITOR.ENTER_BR,
							language : 'nl',
							width: "888px",
       						height: "200px"
						});

					</script>
                    
                    <input type="submit" style="margin-top: 5px;" class="submitRight postQuickReaction" id="submitBlack" value="Plaatsen">
                    
                    <input type="submit" style="margin-top: 5px; margin-right: 5px;" class="submitRight onclickOpenAdvancedReaction" id="submitDarkBlue" value="Geavanceerde reactie plaatsen">
                    
                </div>
                
                <?php } ?>
                
                <?php }else{ ?>
                
                	<div class="errorMessageOverlow" style="width: 858px;">Het onderwerp is afgeschermd door een van de medewerkers.</div>
                
                <?php } ?>
				
			</div>

		</div>
	
	</div>

</div>

</body>
</html>

	