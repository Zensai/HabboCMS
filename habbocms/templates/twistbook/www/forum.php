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
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

	<title><?php echo $hotelname; ?> - <?php echo $language['menu_forum']; ?></title>
	<?php echo $Style->General(); ?>

	<?php echo $themeswitcher; ?>

</head>

<body onkeydown="onKeyDown()">

<div class="overlowLoadingContainer loginSwitchOpenLoad" style="display: none;"><div class="overlowLoading"><div class="progressContainer"><div class="progress"></div><div class="loading"><?php echo $language['loading_login']; ?></div></div></div></div>

<script>
$(document).ready(function(){
	
	$("#onclickOpenForumManager").click(function () {
		loadForumManager();
		$("#overlowForumManager").fadeIn("slow");
	});
	$("#onclickCloseForumManager").click(function () {
		$("#overlowForumManager").fadeOut("slow");
	});
	
	 $('.overlowTitleForumManager').click(function(){
		 loadForumManager();
	 });
	
});

function loadForumManager(){
	
	$('.disepearthisForumManager').html('<img style="margin-left: 360px; margin-top:80px; margin-bottom: 80px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif">');
	
	$.post("<?php echo HOST; ?>/forum/manager/load", { }, function(php){
		$('.disepearthisForumManager').html(php);
	});
	
}

function loadForumManagerSpecific(id){
	
	$('.disepearthisForumManager').html('<img style="margin-left: 360px; margin-top:80px; margin-bottom: 80px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif">');
	
	$.post("<?php echo HOST; ?>/forum/manager/load/specific", { id: id }, function(php){
		$('.disepearthisForumManager').html(php);
	});
	
}
</script>

<div class="overlowContainer" id="overlowForumManager">

	<div class="container scroll">
		
		<div class="top"></div>
        
        <div class="localOverlowTitleSettings overlowTitleForumManager" style="cursor: pointer;"><ubuntu>Forum instellingen</ubuntu></div>
		
		<div id="onclickCloseForumManager" class="closeButton"></div>
		
		<div class="text" style="display: table; width: 100%;">
        
        	<div class="loadingForumManager" style="display: none;"><img style="margin-left: 360px; margin-top:80px; margin-bottom: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></div>
            
            <div class="disepearthisForumManager">
            
            	<img style="margin-left: 360px; margin-top:80px; margin-bottom: 80px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif">
            
            </div>
        
        </div>
				
		</div>
		
		<div class="bottom"></div>
		
	</div>

</div>

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
                
                	<?php if($core->ExploitRetainer($users->UserPermission('cms_forum_edit', $username))){ ?>
                
                	<div style="background-color: #DDD; padding: 10px; border: 1px solid #DDD; border-radius: 3px; margin-bottom: 5px; display: table; width: 100%; margin-bottom: 5px;">
                       
                       <a class="overlowButton" style="float: right; margin-top: -7px; margin-right: -5px; margin-bottom: -5px;">
				
							<b><u>
                                
                    			<div id="onclickOpenForumManager" title="Forum instellingen" class="overlowIcon edit"></div>
                                    
                    		</u></b>
                                
                   	 		<div></div>
                                
                   	 	</a>
                       
                    </div>
                    
                    <div style="margin-top: -5px;"></div>
                    
                    <?php }else{ ?>
                
                	<div style="margin-top: -10px;"></div>
                    
                    <?php } ?>
            
            		<?php
					$query_forum = mysql_query("SELECT * FROM forums WHERE count_id = '1' ORDER BY id");
					while($forum = mysql_fetch_array($query_forum)){
					?>

						<div class="boxHeader big rounded blue" style="margin-top: 10px;"><ubuntu><?php echo $forum['name']; ?></ubuntu></div>
                        
                        	<?php
							$query_forum_sub = mysql_query("SELECT * FROM forums WHERE count_id = '2' AND parent_id = '".$forum['id']."' ORDER BY id");
							while($forum_sub = mysql_fetch_array($query_forum_sub)){
							?>
                                
                                <div class="forumDarkbox">
                                
                                	<div class="formDarkBoxLeft">
                                
                        				<div style="width: 730px; float: left;"><b style="cursor: pointer;" onClick="location.href='<?php  echo HOST; ?>/forum/display/<?php echo $forum_sub['id']; ?>'"><ubuntu><?php echo $forum_sub['name']; ?></ubuntu></b><br>
                                		<ubuntu><?php echo $forum_sub['description']; ?></ubuntu></div><br>
                                        
                                        <?php
										$query_search_subforums = mysql_query("SELECT * FROM forums WHERE count_id = '3' AND parent_id = '".$forum_sub['id']."' ORDER BY id");
										$count_subforums = mysql_num_rows($query_search_subforums);
										
										if($count_subforums > 0){
										?>
                                        
                                        <div class="forumSubforumscont" style="float: left;">
                                        <ubuntu><b><i><?php echo $language['forum_subforms']; ?></i></b>:</ubuntu><br>
                                        <?php 
										while($search_subforums = mysql_fetch_array($query_search_subforums)){
										?>
                                        
                                        <div class="formSubforumscontDot">
                                        
                                        	<div class="formSubformsDot"></div> <div onClick="location.href='<?php  echo HOST; ?>/forum/display/<?php echo $search_subforums['id']; ?>'" class="formSubformtext"><ubuntu><?php echo $search_subforums['name']; ?></ubuntu></div>
                                        
                                        </div>
                                        
                                        <?php } ?>
                                        </div>
                                        
                                        <?php } ?>
                                    
                                    </div>
                                    
                                    <div class="formDarkBoxRight">
                                    
                                    	<div class="forumRightBoxC"></div>
                                    
                        				<div class="formRightContainer">
                                        
                                        	<?php
											$query_search_reactions = mysql_num_rows(mysql_query("SELECT * FROM forum_topics WHERE parent_id = '".$forum_sub['id']."'"));
											?>
                                            
                                            <script>
											$(document).ready(function(){
												var count<?php echo $forum_sub['id']; ?>topic = <?php $query_search_t = mysql_query("SELECT * FROM forums WHERE count_id = '3' AND parent_id = '".$forum_sub['id']."'"); while($search_t = mysql_fetch_array($query_search_t)){ $query_search_t_count = mysql_num_rows(mysql_query("SELECT * FROM forum_topics WHERE parent_id = '".$search_t['id']."'")); echo $query_search_t_count.'+'; } echo $query_search_reactions; ?>;
												$('.countup<?php echo $forum_sub['id']; ?>topic').html(count<?php echo $forum_sub['id']; ?>topic);
											});
											</script>

                                            <ubuntu><font class="countup<?php echo $forum_sub['id']; ?>topic"><?php echo $query_search_reactions; ?></font> <b>Onderwerpen</b></ubuntu><br>
											
                                            <script>
											$(document).ready(function(){
												var count<?php echo $forum_sub['id']; ?> = <?php $query_search_discus = mysql_query("SELECT * FROM forum_topics WHERE parent_id = '".$forum_sub['id']."'"); while($search_discus = mysql_fetch_array($query_search_discus)){ $query_search_posts_count = mysql_num_rows(mysql_query("SELECT * FROM forum_reactions WHERE parent_id = '".$search_discus['id']."'")); echo $query_search_posts_count.'+'; } $query_search_t_r = mysql_query("SELECT * FROM forums WHERE count_id = '3' AND parent_id = '".$forum_sub['id']."'"); while($search_t_r = mysql_fetch_array($query_search_t_r)){ $query_search_t_r_count = mysql_num_rows(mysql_query("SELECT * FROM forum_topics WHERE parent_id = '".$search_t_r['id']."'")); echo $query_search_t_r_count.'+'; } ?>0;
												$('.countup<?php echo $forum_sub['id']; ?>').html(count<?php echo $forum_sub['id']; ?>);
											});
											</script>
                                            
                                            <ubuntu><font class="countup<?php echo $forum_sub['id']; ?>"></font> <b>Berichten</b></ubuntu>
                                            
                                        </div>
                                        
                                    </div>
                                    
                           	 	</div>
                            
                        	<?php } ?>
                        
                       	<div style="margin-top: -5px;"></div>

               		<?php } ?>
                
                </div>
				
			</div>

		</div>
	
	</div>

</div>

</body>
</html>

	