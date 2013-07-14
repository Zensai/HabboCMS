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
$query_forum = mysql_query("SELECT * FROM forums WHERE id = '".$forum_id."' ORDER BY id");
$forum = mysql_fetch_array($query_forum);

$query_parent_forum3 = mysql_query("SELECT * FROM forums WHERE id = '".$forum['parent_id']."'");
$parent_forum3 = mysql_fetch_array($query_parent_forum3);

$forum_count = mysql_num_rows($query_forum);
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

	<title><?php echo $hotelname; ?> <?php echo $language['menu_forum']; ?> - <?php echo $forum['name']; ?></title>
	<?php echo $Style->General(); ?>

	<?php echo $themeswitcher; ?>

</head>

<body onkeydown="onKeyDown()">

<div class="overlowLoadingContainer loginSwitchOpenLoad" style="display: none;"><div class="overlowLoading"><div class="progressContainer"><div class="progress"></div><div class="loading"><?php echo $language['loading_login']; ?></div></div></div></div>

<?php if($forum['post_right'] == '0' || $core->ExploitRetainer($users->UserPermission('cms_forum_topic', $username))){ ?>

<script>
$(document).ready(function(){
	
	$("#onclickOpenStartNewTopic").click(function () {
		$("#overlowStartNewTopic").fadeIn("slow");
	});
	$("#onclickCloseStartNewTopic").click(function () {
		$("#overlowStartNewTopic").fadeOut("slow");
	});
	
	$('.startNewTopicPost').click(function(){
		$('.insideStartNewTopic').hide();
		$('.insideStartNewTopicLoading').show();
		var message = CKEDITOR.instances.startNewTopicMessage.getData();
		var prefix = $("#startNewTopicPrefix").val();
		var name = $("#startNewTopicName").val();
		var description = $("#startNewTopicDescription").val();
		$.post("<?php echo HOST; ?>/forum/add/topic", { message: message, prefix: prefix, name: name, parent_id: '<?php echo $forum_id; ?>', description: description }, function(toData){
			document.location.href='<?php echo HOST; ?>/forum/display/<?php echo $forum_id; ?>/topic/' + toData;
		});
	});
});
</script>

<div class="overlowContainer" id="overlowStartNewTopic">

	<div class="container" style="width: 720px;">
		
		<div class="top"></div>
        
        <div class="localOverlowTitleSettings"><ubuntu>Onderwerp starten</ubuntu></div>
		
		<div id="onclickCloseStartNewTopic" class="closeButton"></div>
		
		<div class="text">
        
        	<div class="insideStartNewTopicLoading" style="display: none;"><img style="margin-top:80px; margin-bottom: 80px; margin-left: 115px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></div>
        
        	<div class="insideStartNewTopic">
            
            <div class="insideContainer">
            
            <div style="width: 150px; display: table; float: left;">
            
            	<div>
				
					<label style="font-size: 15px;"><ubuntu>Voorvoegsel</ubuntu></label>
					
					<br>
				
					<select id="startNewTopicPrefix" name="startNewTopicPrefix" class="select" style="width: 100%;">
				
						<option value="">[Geen voorvoegsel]</option>
                        <optgroup label="Standaart">
                        	<option value="[Algemeen]">[Algemeen]</option>
							<option value="[Vraag]">[Vraag]</option>
                        	<option value="[Belangrijk!]">[Belangrijk!]</option>
                        	<option value="[Aankondiging]">[Aankondiging]</option>
                        	<option value="[Poll]">[Poll]</option>
                        	<option value="[Anders]">[Anders]</option>
                        </optgroup>
                        <optgroup label="Development">
                        	<option value="[Release]">[Release]</option>
                        	<option value="[Development]">[Development]</option>
                        	<option value="[Beta]">[Beta]</option>
                        	<option value="[Tutorial]">[Tutorial]</option>
                        	<option value="[Request]">[Request]</option>
                        </optgroup>
				
					</select>
				
				</div>
                
            </div>
            
            <div style="width: 498px; display: table; float: right;">
            
            	<div>
				
					<label style="font-size: 15px;"><ubuntu>Titel</ubuntu></label>
					
					<br>
				
					<input type="text" name="startNewTopicName" id="startNewTopicName" />
				
				</div>
                
            </div>
            
            <div style="width: 100%; display: table; float: left;">
            
            	<div>
				
					<label style="font-size: 15px;"><ubuntu>Beschrijving</ubuntu></label>
					
					<br>
				
					<input type="text" name="startNewTopicDescription" id="startNewTopicDescription" />
				
				</div>
                
            </div>
            
            <div style="width: 100%; padding-top: 10px; display: table;">
        
        	<textarea id="startNewTopicMessage" name="startNewTopicMessage" class="startNewTopicMessage"></textarea>
            
            </div>
            
            </div>
            
            <script>
			CKEDITOR.replace('startNewTopicMessage', {
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
    
    		<input type="submit" style="margin-top: 5px;" class="submitRight startNewTopicPost" id="submitBlack" value="Plaatsen">
            
            </div>
				
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
                
                <?php if($forum_count == 0){ ?>
                
                	<div class="boxContainer rounded">
                    
                    	<div class="errorMessageOverlow" style="width: 858px;">Deze pagina is niet gevonden op het forum. Deze is waarschijnlijk verwijderd of er is iets mis gegaan in het systeem. Je word automatisch één pagina terug verbonden.</div>
                        <meta http-equiv="refresh" content="2;URL=javascript:history.go(-1)">
                    
                    </div>
                
                <?php } ?>

				<div class="boxContainer rounded" style=" <?php if($forum_count == 0){ echo 'display: none;'; } ?>">
                
                	<div style="background-color: #DDD; padding: 10px; border: 1px solid #DDD; border-radius: 3px; margin-bottom: 5px;">
                       <ubuntu><font style="cursor: pointer;" onClick="location.href='<?php  echo HOST; ?>/forum'">Forum</font> <?php if($forum['count_id'] == '3'){ ?><font style="cursor: pointer;" onClick="location.href='<?php  echo HOST; ?>/forum/display/<?php echo $parent_forum3['id']; ?>'"> < <?php echo $parent_forum3['name']; ?></font><?php } ?><font style="font-weight: bold;"> < <?php echo $forum['name']; ?></font></ubuntu>
                       
                       <?php if($forum['post_right'] == '0' || $core->ExploitRetainer($users->UserPermission('cms_forum_topic', $username))){ ?>
                       
                       <a class="overlowButton" style="float: right; margin-top: -7px; margin-right: -5px;">
				
							<b><u>
                                
                    			<div id="onclickOpenStartNewTopic" title="Een onderwerp starten" class="overlowIcon"><img style="cursor: pointer;margin-top: 9px;" src="<?php echo HOST; ?>/web-gallery/icons/plus_icon.gif"></div>
                                    
                    		</u></b>
                                
                   	 		<div></div>
                                
                   	 	</a>
                        
                        <?php } ?>
                       
                    </div>
                
                	<?php if($forum['count_id'] == 2){ ?>
                    
                    	<?php 
						$query_forum = mysql_query("SELECT * FROM forums WHERE id = '".$forum_id."' AND count_id = '2' ORDER BY id");
						$forum = mysql_fetch_array($query_forum);

						$query_count_third_forums = mysql_query("SELECT * FROM forums WHERE parent_id = '".$forum['id']."' AND count_id = '3'");
						$count_third_forums = mysql_num_rows($query_count_third_forums);
						if($count_third_forums > 0){
							echo '<div class="boxHeader big rounded blue"><ubuntu>'.$forum['name'].'</ubuntu></div>';
							
							while($third_forum = mysql_fetch_array($query_count_third_forums)){
						?>
                            
                                <div style="background-color: #CCCCCC; padding: 10px; border: 1px solid #CCCCCC; border-radius: 3px; margin-bottom: 5px; display: table; width: 100%;">
                                
                                	<div style="float: left; display: table;">
                                
                        				<div style="width: 730px; float: left;"><b style="cursor: pointer;" onClick="location.href='<?php  echo HOST; ?>/forum/display/<?php echo $third_forum['id']; ?>'"><ubuntu><?php echo $third_forum['name']; ?></ubuntu></b><br>
                                		<ubuntu><?php echo $third_forum['description']; ?></ubuntu></div>
                                    
                                    </div>
                                    
                                    <div style="float: right; display: table;">
                                    
                                    	<div style="border-left: 1px solid #CCCCCC; border-right: 1px solid #FFFFFF; height: 35px; margin-left: 10px; margin-right: 10px; float: left;"></div>
                                    
                        				<div style="float: left; display: table; text-align: right; padding-top: 5px;">
                                        
                                        	<?php
											$query_search_reactions = mysql_query("SELECT * FROM forum_topics WHERE parent_id = '".$third_forum['id']."'");
											$search_reactions_count = mysql_num_rows($query_search_reactions);
											?>

                                            <ubuntu><?php echo $search_reactions_count; ?> <b>Onderwerpen</b></ubuntu><br>
											
                                            <script>
											$(document).ready(function(){
												var count<?php echo $third_forum['id']; ?> = <?php $query_search_discus = mysql_query("SELECT * FROM forum_topics WHERE parent_id = '".$third_forum['id']."'"); while($search_discus = mysql_fetch_array($query_search_discus)){ $query_search_posts_count = mysql_num_rows(mysql_query("SELECT * FROM forum_reactions WHERE parent_id = '".$search_discus['id']."'")); echo $query_search_posts_count.'+'; } ?>0;
												$('.countup<?php echo $third_forum['id']; ?>').html(count<?php echo $third_forum['id']; ?>);
											});
											</script>
                                            
                                            <ubuntu><font class="countup<?php echo $third_forum['id']; ?>"></font> <b>Berichten</b></ubuntu>
                                            
                                        </div>
                                        
                                    </div>
                                    
                           	 	</div>
                            
                   		<?php 
				   			} 
						}
						?>
                        
                        	<div class="boxHeader big rounded lightblue"><ubuntu>Onderwerpen</ubuntu></div>
                        
                        <?php
							$rowsPerPage = 20;
							$pageNum = 1;
							if(isset($_GET['page']) && $core->ExploitRetainer($_GET['page'])){
    							$pageNum = $core->ExploitRetainer($_GET['page']);
							}
							$offset = ($pageNum - 1) * $rowsPerPage;
							$result = mysql_query("SELECT * FROM forum_topics WHERE parent_id = '".$forum['id']."' ORDER BY last_post DESC LIMIT ".$offset.", ".$rowsPerPage."") or die('Error, query failed');
							$rs_result2 = mysql_num_rows(mysql_query("SELECT * FROM forum_topics WHERE parent_id = '".$forum['id']."'")); 
							if($rs_result2 == 0){ echo '<div class="errorMessageOverlow" style="width: 858px;">Er zijn nog geen onderwerpen in dit forum geplaatst.</div>'; }
							while($forum_topics = mysql_fetch_array($result)){
						?>
                        		<div style="background-color: #DDD; padding: 10px; border: 1px solid #DDD; border-radius: 3px; margin-bottom: 5px; display: table; width: 100%;">
                                
                                	<?php
									$calculated_timediv = time() - $forum_topics['last_post'];
									if($calculated_timediv < 604800){
									?>
                                
                                		<div style="float: left; display: table; margin-right: 10px; margin-left: 3px;">
                                    
                                    		<img src="<?php echo HOST; ?>/web-gallery/forum/topic_on.gif">
                                    
                                    	</div>
                                    
                                    <?php }else{ ?>
                                    
                                    	<div style="float: left; display: table; margin-right: 10px;">
                                    
                                    		<img src="<?php echo HOST; ?>/web-gallery/forum/topic_off.gif">
                                    
                                    	</div>
                                        
                                    <?php } ?>
                                
                                	<div style="float: left; display: table;">
                                    
                        				<div style="width: 720px; float: left;"><b style="cursor: pointer;" onClick="location.href='<?php  echo HOST; ?>/forum/display/<?php echo $forum['id']; ?>/topic/<?php echo $forum_topics['id']; ?>'"><ubuntu><?php echo $forum_topics['prefix']; ?> <?php echo $forum_topics['name']; ?></ubuntu></b><br>
                                		<ubuntu><?php echo $forum_topics['description']; ?></ubuntu>
                                        
                                        <div style="display: table; text-align: left; font-size: 10px; color: #999; ">
                                        
                                        	Gestart door <b><?php echo $core->ExploitRetainer($users->UserInfoByID($forum_topics['user_id'], 'username')); ?></b>&nbsp; 
                                                
                                            <?php 
											$query_count_reactions = mysql_num_rows(mysql_query("SELECT * FROM forum_reactions WHERE parent_id = '".$forum_topics['id']."'"));
											if($query_count_reactions > 0){
											?>
                                        
                                        		<?php 
												$query_select_reaction = mysql_query("SELECT * FROM forum_reactions WHERE parent_id = '".$forum_topics['id']."' ORDER BY published DESC LIMIT 1"); 
												$select_reaction = mysql_fetch_array($query_select_reaction);
												?>
                                            	<ubuntu>Laatste bericht van <b><?php echo $core->ExploitRetainer($users->UserInfoByID($select_reaction['user_id'], 'username')); ?></b> op <b><?php echo strftime("%d-%m-%Y", $select_reaction['published']); ?></b></ubuntu>
                                            
                                            <?php }else{ ?>
                                            
                                            	<i><ubuntu>Er zijn nog geen reacties geplaatst in dit topic.</ubuntu></i>
                                            
                                            <?php } ?>
                                            
                                        </div></div>
                                        
                                    </div>
                                    
                                    <div style="float: right; display: table;">
                                    
                                    	<div style="border-left: 1px solid #CCCCCC; border-right: 1px solid #FFFFFF; height: 35px; margin-left: 10px; margin-right: 10px; float: left;"></div>
                                    
                        				<div style="float: left; display: table; text-align: right; padding-top: 5px;">

                                            <?php $query_count_reactions = mysql_num_rows(mysql_query("SELECT * FROM forum_reactions WHERE parent_id = '".$forum_topics['id']."'")); ?>
                                            <ubuntu><?php echo $query_count_reactions; ?> <b>Reacties</b><br>
                                            
                                            <?php echo $forum_topics['views']; ?> <b>Bezoeken</b></ubuntu>
                                            
                                        </div>
                                        
                                    </div>
                                    
                           	 	</div>
                        <?php
							}
							
							$query   = "SELECT COUNT(id) AS numrows FROM forum_topics WHERE parent_id = '".$forum['id']."'";
							$result  = mysql_query($query) or die('Error, query failed');
							$row     = mysql_fetch_array($result, MYSQL_ASSOC);
							$numrows = $row['numrows'];
							$maxPage = ceil($numrows/$rowsPerPage);
						?>
                        
						<div style="text-align: center;">
                        
							<?php
							if ($pageNum > 1){
							   $page  = $pageNum - 1;
							   $prev  = ' <a href="'.HOST.'/forum/display/'.$forum['id'].'/page/'.$page.'" style="color: #3A3A3A; font-weight: bold; text-decoration: underline;">Vorige</a> ';
							   $first = ' <a href="'.HOST.'/forum/display/'.$forum['id'].'/page/1" style="color: #3A3A3A; font-weight: bold; text-decoration: underline;">Eerste pagina</a> | ';
							} else{
							   $prev  = '';
							   $first = '';
							}

							if ($pageNum < $maxPage){
							   $page = $pageNum + 1;
							   $next = ' <a href="'.HOST.'/forum/display/'.$forum['id'].'/page/'.$page.'" style="color: #3A3A3A; font-weight: bold; text-decoration: underline;">Volgende</a> ';
							   $last = ' | <a href="'.HOST.'/forum/display/'.$forum['id'].'/page/'.$maxPage.'" style="color: #3A3A3A; font-weight: bold; text-decoration: underline;">Laatste pagina</a> ';
							}else{
						   	$next = '';
						  	 $last = '';
							}

							echo "<ubuntu>".$first.$prev." Pagina $pageNum van de $maxPage ".$next.$last."</ubuntu>";
							?>
                        
                        </div>
                    
                    <?php }elseif($forum['count_id'] == 3){ ?>
                    
                    	<?php 
						$query_forum = mysql_query("SELECT * FROM forums WHERE id = '".$forum_id."' AND count_id = '3' ORDER BY id");
						$forum = mysql_fetch_array($query_forum);
						$query_count_third_forums = mysql_query("SELECT * FROM forums WHERE parent_id = '".$forum['id']."' AND count_id = '3'");
						$count_third_forums = mysql_num_rows($query_count_third_forums);
						if($count_third_forums > 0){
							
							echo '<div class="boxHeader big rounded blue"><ubuntu>'.$forum['name'].'</ubuntu></div>';
							
							while($third_forum = mysql_fetch_array($query_count_third_forums)){
						?>
                            
                                <div style="background-color: #CCCCCC; padding: 10px; border: 1px solid #CCCCCC; border-radius: 3px; margin-bottom: 5px; display: table; width: 100%;">
                                
                                	<div style="float: left; display: table;">
                                
                        				<div style="width: 730px; float: left;"><b style="cursor: pointer;" onClick="location.href='<?php  echo HOST; ?>/forum/display/<?php echo $third_forum['id']; ?>'"><ubuntu><?php echo $third_forum['name']; ?></ubuntu></b><br>
                                		<ubuntu><?php echo $third_forum['description']; ?></ubuntu></div>
                                    
                                    </div>
                                    
                                    <div style="float: right; display: table;">
                                    
                                    	<div style="border-left: 1px solid #CCCCCC; border-right: 1px solid #FFFFFF; height: 35px; margin-left: 10px; margin-right: 10px; float: left;"></div>
                                    
                        				<div style="float: left; display: table; text-align: right; padding-top: 5px;">
                                        
                                        	<?php
											$query_search_reactions = mysql_query("SELECT * FROM forum_topics WHERE parent_id = '".$third_forum['id']."'");
											$search_reactions_count = mysql_num_rows($query_search_reactions);
											?>

                                            <ubuntu><?php echo $search_reactions_count; ?> <b>Onderwerpen</b></ubuntu><br>
											
                                            <script>
											$(document).ready(function(){
												var count<?php echo $third_forum['id']; ?> = <?php $query_search_discus = mysql_query("SELECT * FROM forum_topics WHERE parent_id = '".$third_forum['id']."'"); while($search_discus = mysql_fetch_array($query_search_discus)){ $query_search_posts_count = mysql_num_rows(mysql_query("SELECT * FROM forum_reactions WHERE parent_id = '".$search_discus['id']."'")); echo $query_search_posts_count.'+'; } ?>0;
												$('.countup<?php echo $third_forum['id']; ?>').html(count<?php echo $third_forum['id']; ?>);
											});
											</script>
                                            
                                            <ubuntu><font class="countup<?php echo $third_forum['id']; ?>"></font> <b>Berichten</b></ubuntu>
                                            
                                        </div>
                                        
                                    </div>
                                    
                           	 	</div>
                            
                   		<?php 
				   			} 
						}
						?>
                        
                        	<div class="boxHeader big rounded lightblue"><ubuntu>Onderwerpen</ubuntu></div>
                        
                        <?php
							$rowsPerPage = 20;
							$pageNum = 1;
							if(isset($_GET['page']) && $core->ExploitRetainer($_GET['page'])){
    							$pageNum = $core->ExploitRetainer($_GET['page']);
							}
							$offset = ($pageNum - 1) * $rowsPerPage;
							$result = mysql_query("SELECT * FROM forum_topics WHERE parent_id = '".$forum['id']."' ORDER BY last_post DESC LIMIT ".$offset.", ".$rowsPerPage."") or die('Error, query failed');
							$rs_result2 = mysql_num_rows(mysql_query("SELECT * FROM forum_topics WHERE parent_id = '".$forum['id']."'")); 
							if($rs_result2 == 0){ echo '<div class="errorMessageOverlow" style="width: 858px;">Er zijn nog geen onderwerpen in dit forum geplaatst.</div>'; }
							while($forum_topics = mysql_fetch_array($result)){
						?>
                        		<div style="background-color: #DDD; padding: 10px; border: 1px solid #DDD; border-radius: 3px; margin-bottom: 5px; display: table; width: 100%;">
                                
                                	<?php
									$calculated_timediv = time() - $forum_topics['last_post'];
									if($calculated_timediv < 604800){
									?>
                                
                                		<div style="float: left; display: table; margin-right: 10px; margin-left: 3px;">
                                    
                                    		<img src="<?php echo HOST; ?>/web-gallery/forum/topic_on.gif">
                                    
                                    	</div>
                                    
                                    <?php }else{ ?>
                                    
                                    	<div style="float: left; display: table; margin-right: 10px;">
                                    
                                    		<img src="<?php echo HOST; ?>/web-gallery/forum/topic_off.gif">
                                    
                                    	</div>
                                        
                                    <?php } ?>
                                
                                	<div style="float: left; display: table;">
                                    
                        				<div style="width: 720px; float: left;"><b style="cursor: pointer;" onClick="location.href='<?php  echo HOST; ?>/forum/display/<?php echo $forum['id']; ?>/topic/<?php echo $forum_topics['id']; ?>'"><ubuntu>[<?php echo $forum_topics['prefix']; ?>] <?php echo $forum_topics['name']; ?></ubuntu></b><br>
                                		<ubuntu><?php echo $forum_topics['description']; ?></ubuntu>
                                        
                                        <div style="display: table; text-align: left; font-size: 10px; color: #999; ">
                                        
                                        	Gestart door <b><?php echo $core->ExploitRetainer($users->UserInfoByID($forum_topics['user_id'], 'username')); ?></b>&nbsp; 
                                                
                                            <?php 
											$query_count_reactions = mysql_num_rows(mysql_query("SELECT * FROM forum_reactions WHERE parent_id = '".$forum_topics['id']."'"));
											if($query_count_reactions > 0){
											?>
                                        
                                        		<?php 
												$query_select_reaction = mysql_query("SELECT * FROM forum_reactions WHERE parent_id = '".$forum_topics['id']."' ORDER BY published DESC LIMIT 1"); 
												$select_reaction = mysql_fetch_array($query_select_reaction);
												?>
                                            	<ubuntu>Laatste bericht van <b><?php echo $core->ExploitRetainer($users->UserInfoByID($select_reaction['user_id'], 'username')); ?></b> op <b><?php echo strftime("%d-%m-%Y", $select_reaction['published']); ?></b></ubuntu>
                                            
                                            <?php }else{ ?>
                                            
                                            	<i><ubuntu>Er zijn nog geen reacties geplaatst in dit topic.</ubuntu></i>
                                            
                                            <?php } ?>
                                            
                                        </div></div>
                                        
                                    </div>
                                    
                                    <div style="float: right; display: table;">
                                    
                                    	<div style="border-left: 1px solid #CCCCCC; border-right: 1px solid #FFFFFF; height: 35px; margin-left: 10px; margin-right: 10px; float: left;"></div>
                                    
                        				<div style="float: left; display: table; text-align: right; padding-top 5px;">

                                            <?php $query_count_reactions = mysql_num_rows(mysql_query("SELECT * FROM forum_reactions WHERE parent_id = '".$forum_topics['id']."'")); ?>
                                            <ubuntu><?php echo $query_count_reactions; ?> <b>Reacties</b><br>
                                            
                                            <?php echo $forum_topics['views']; ?> <b>Bezoeken</b></ubuntu>
                                            
                                        </div>
                                        
                                    </div>
                                    
                           	 	</div>
                        <?php
							}
							
							$query   = "SELECT COUNT(id) AS numrows FROM forum_topics WHERE parent_id = '".$forum['id']."'";
							$result  = mysql_query($query) or die('Error, query failed');
							$row     = mysql_fetch_array($result, MYSQL_ASSOC);
							$numrows = $row['numrows'];
							$maxPage = ceil($numrows/$rowsPerPage);
						?>
                        
						<div style="text-align: center;">
                        
							<?php
							if ($pageNum > 1){
							   $page  = $pageNum - 1;
							   $prev  = ' <a href="'.HOST.'/forum/display/'.$forum['id'].'/page/'.$page.'" style="color: #3A3A3A; font-weight: bold; text-decoration: underline;">Vorige</a> ';
							   $first = ' <a href="'.HOST.'/forum/display/'.$forum['id'].'/page/1" style="color: #3A3A3A; font-weight: bold; text-decoration: underline;">Eerste pagina</a> | ';
							} else{
							   $prev  = '';
							   $first = '';
							}

							if ($pageNum < $maxPage){
							   $page = $pageNum + 1;
							   $next = ' <a href="'.HOST.'/forum/display/'.$forum['id'].'/page/'.$page.'" style="color: #3A3A3A; font-weight: bold; text-decoration: underline;">Volgende</a> ';
							   $last = ' | <a href="'.HOST.'/forum/display/'.$forum['id'].'/page/'.$maxPage.'" style="color: #3A3A3A; font-weight: bold; text-decoration: underline;">Laatste pagina</a> ';
							}else{
						   	$next = '';
						  	 $last = '';
							}

							echo "<ubuntu>".$first.$prev." Pagina $pageNum van de $maxPage ".$next.$last."</ubuntu>";
							?>
                        
                        </div>
                        
						<?php
						}
				   		?>

                </div>
				
			</div>

		</div>
	
	</div>

</div>

</body>
</html>

	