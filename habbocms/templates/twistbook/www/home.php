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

define('USER', FALSE); 
define('ACCOUNT', FALSE);
define('MAINTENANCE', TRUE);
include("includes/inc.global.php");

if(isset($_GET['id']) && $core->ExploitRetainer($_GET['id'])){
	$id = $core->ExploitRetainer($_GET['id']);
}

if($core->ExploitRetainer($_GET['id']) == $core->ExploitRetainer($users->UserInfo($username, 'id'))){
	$query_home_check = mysql_query("SELECT * FROM homes WHERE user_id = '".$id."'");
	if(mysql_num_rows($query_home_check) == 0){
		$id_home = rand(100000, 999999);
		
		$query = mysql_query("INSERT INTO homes ( id, user_id, background ) VALUES ( ".$id_home.", ".$id.", 'bg_colour_03')");
	
		$query = mysql_query("INSERT INTO homes_items ( id, user_id, item_id, home_id, display, type ) VALUES ( ".rand(100000, 999999).", ".$id.", '1', '".$id_home."', 'yes', 'widget' ) ");
			
		$query = mysql_query("INSERT INTO homes_items ( id, user_id, item_id, home_id, type ) VALUES ( ".rand(100000, 999999).", ".$id.", '2', '".$id_home."', 'widget' ) ");
			
		$query = mysql_query("INSERT INTO homes_items ( id, user_id, item_id, home_id, type ) VALUES ( ".rand(100000, 999999).", ".$id.", '3', '".$id_home."', 'widget' ) ");
			
		$query = mysql_query("INSERT INTO homes_items ( id, user_id, item_id, home_id, type ) VALUES ( ".rand(100000, 999999).", ".$id.",	 '4', '".$id_home."', 'widget' ) ");
		
		$query = mysql_query("INSERT INTO homes_items ( id, user_id, item_id, home_id, type ) VALUES ( ".rand(100000, 999999).", ".$id.",	 '5', '".$id_home."', 'widget' )");
		
		$query = mysql_query("INSERT INTO homes_items (id, user_id, item_id, home_id, type ) VALUES ( ".rand(100000, 999999).", ".$id.", '31', '".$id_home."', 'background')");
		
		header("Location: ".HOST."/home/".$id."");
	}
}

if($core->ExploitRetainer($_GET['id']) == $core->ExploitRetainer($users->UserInfo($username, 'id'))){ $acces = "yes"; }else{ $acces = "no"; }
if(isset($_GET['load-edit']) && $core->ExploitRetainer($_GET['load-edit']) == 'yes'){ if($acces == 'yes'){ $menu_sub_my = "my_edit_page"; } }else{ if($acces == 'yes'){ $menu_sub = "my_page"; } }

$menu = 'me';
if($acces == 'yes'){ $page = 'home'; }
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

	<title><?php echo $hotelname; ?> - <?php echo $core->ExploitRetainer($users->UserInfoById($id, 'username')); ?></title>
	<?php echo $Style->General(); ?>

	<?php echo $themeswitcher; ?>

</head>

<script>
$(document).ready(function() {
	
	$("#onclickOpenEditHomepage").click(function () {
	
		if ($("#onclickOpenedContainerEditHomepage:first").is(":hidden")) {
			$("#onclickOpenedContainerEditHomepage").slideDown("slow");
		} else {
			$("#onclickOpenedContainerEditHomepage").slideUp("slow");
		}
		
	});

});

$(window).load(function(){
  $('.iframeHome').slideDown('slow');
});
</script>

<body onkeydown="onKeyDown()">

<?php include("apps/float_includes.php"); ?>
<?php include("apps/system/float_includes.php"); ?>

<?php include("apps/system/header_top.php"); ?>

<div id="container">
	
	<div id="middleContainer">
	
		<?php include("apps/system/container_header.php"); ?>

		<div id="containerMiddle">
		
			<?php if($users->IdDetection($id)){ ?>
		
				<?php if($core->ExploitRetainer($users->UserInfoById($id, 'id')) == $core->ExploitRetainer($users->UserInfo($username, 'id'))){ ?>
				
					<div id="onclickOpenedContainerEditHomepage" style="display: none;">
		
						<div id="containerSpace"></div>
		
						<div class="homepageSettingsMenu">
			
							<div class="top"></div>
				
							<div class="text">
							
								<div class="in_menu">hoi</div>
								
								<div class="in_menu spaceLeft">hoi</div>
								
								<div class="in_menu spaceLeft">hoi</div>
								
								<div class="in_menu spaceLeft">hoi</div>
								
								<div class="in_menu spaceTop">hoi</div>
								
								<div class="in_menu spaceLeft spaceTop">hoi</div>
				
							</div>
				
							<div class="bottom"></div>
				
						</div>
						
					</div>
				
				<?php } ?>
			
				<div id="containerSpace"></div>
						
				<div class="boxContainer rounded homepage loadFrameToHome" style="margin-left: -19px; margin-top: -45px; box-shadow: none; border-color: #FFFFFF; border-radius: 0px;">
				 
					<?php if(isset($_GET['load-edit']) && $core->ExploitRetainer($_GET['load-edit']) == 'yes'){ if($acces == 'yes'){ ?>
                    	<iframe class="iframeHome" src="<?php echo HOST; ?>/home/<?php echo $core->ExploitRetainer($users->UserInfoById($id, 'id')); ?>/edit" scrolling="no" style="border: 0; width: 928px; height: 1395px; display: none;"></iframe>
                    <?php } }else{ ?>
                    	<iframe class="iframeHome" src="<?php echo HOST; ?>/home/<?php echo $core->ExploitRetainer($users->UserInfoById($id, 'id')); ?>/normal" scrolling="no" style="border: 0; width: 928px; height: 1395px; display: none;"></iframe>
                    <?php } ?>
					
				</div>
			
			<?php }else{ ?>
			
				<div id="containerSpace"></div>
			
				<div class="boxContainer rounded" style="display: table;">

					<div class="boxHeader rounded red"><ubuntu><?php echo $language['homepage_error_no_user']; ?></ubuntu></div>
					
					<div style="font-weight: normal; "><?php echo $language['homepage_error_no_user_message']; ?></div>

				</div>
			
			<?php } ?>

		</div>
	
	</div>

</div>

</body>
</html>