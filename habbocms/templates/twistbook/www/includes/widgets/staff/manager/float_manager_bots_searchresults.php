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

if($users->UserPermission('cms_manager_bots', $username)){
	
$user = $core->ExploitRetainer($_POST['user']);
?>

<script src="<?php echo HOST; ?>/web-gallery/styles/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php echo HOST; ?>/web-gallery/styles/js/ubuntu.font.js" type="text/javascript"></script>
			
<script type="text/javascript">
	Cufon.replace("ubuntu");
</script>

<script>
$(document).ready(function() {
});

function loadEditBot(id){
	$('.disepearSearchedBot').hide();
	$('.loadingBotsSettingsSearched3').show();
	$.post("<?php echo HOST; ?>/manager/bots/edit/" + id, { id: id }, function(php){
		$('.disepearSearchedBot').html(php);
		$('.loadingBotsSettingsSearched3').hide();
		$('.disepearSearchedBot').show();
	});
}
</script>

<div class="textdisepearSearchedUser">

	<div class="loadingBotsSettingsSearched3" style="display: none;"><center><img style="margin-top:80px; margin-bottom: 100px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></center></div>

	<div class="disepearSearchedBot" style="margin-top: -20px;">
    
    	<?php
		$query_manager_bots = mysql_query("SELECT * FROM bots WHERE user_id = '".$core->ExploitRetainer($users->UserInfo($user, 'id'))."' ORDER BY id DESC");
		if(mysql_num_rows($query_manager_bots) == 0){
			echo '<div style="padding-top: 10px;"><div class="errorMessageOverlow" style="width: 380px;">Wij hebben geen bots gevonden. Deze gebruiker bezit dus geen bots.</div></div>';
		}
		while($bots = mysql_fetch_array($query_manager_bots)){
		?>
        
        	<script>
			$(document).ready(function(){
				$('.botsEditOpen<?php echo $bots['id']; ?>').click(function(){
					loadEditBot('<?php echo $bots['id']; ?>');
				});
			});
			</script>
        	
			<div class="insideContainer space botsEditOpen<?php echo $bots['id']; ?>" style="cursor: pointer;">
			
				<div style="margin-right: 10px; margin-bottom: -10px; margin-top: -18px; background-position: -10px -10px; width: 50px; height: 60px; float: left; background-image: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $bots['look']; ?>);" class="avatar"></div>
				
				<ubuntu><b style="font-size: 18px;"><?php echo $bots['name']; ?></b></ubuntu><br>
                <ubuntu><font style="font-size: 13px;"><?php echo $bots['motto']; ?></font></ubuntu>
                
            </div>
            
        <?php } ?>

	</div>

</div>

<?php } ?>