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

if($core->ExploitRetainer($users->UserPermission('cms_manager_login', $username))){ if($core->ExploitRetainer($users->UserPermission('cms_manager_bots', $username))){ 

$user_id = $core->ExploitRetainer($_POST['user_id']);
?>

<script>
$(document).ready(function() {
	
	$('.onclickOpenBot').click(function(){
		var id = $(this).attr('id');
		editBot(id);
	});
	
});

function editBot(id){
	
	$('.containmentUserBotsSearchresults').hide("slide", { direction: 'left' }, 800, function(){
		$.post("<?php echo HOST; ?>/manager/edit/bot", { id: id }, function(data){
			$('.containmentUserBotsSearchresults').html(data);
			$('.containmentUserBotsSearchresults').show("slide", { direction: 'left' }, 800);
		});
	});
		
}
</script>

<div class="containerSpace"></div>

<div class="boxContainer red usersContainmentSearchedFade">
        
    <div class="boxHeader"><div class="text">Zoekresultaat voor <b><?php echo $user_id; ?></b></div></div>
            
   	<div class="text" style="display: table;">
    
    	<?php
		$query_bots = mysql_query("SELECT * FROM bots WHERE user_id = '".$core->ExploitRetainer($users->UserInfo($user_id, 'id'))."'");
		while($bots = mysql_fetch_array($query_bots)){
		?>
            
            <div class="userSearchresultBox tooltip onclickOpenBot" id="<?php echo $bots['id']; ?>" style="display: table; float: left; width: auto; margin-right: 10px; margin-bottom: 10px; cursor: pointer;">
            
            	<span>Klik nu als je deze bot wilt veranderen. In het scherm dat dan komt kun je hem ook verwijderen.</span>
                
                <div class="information">
                
                    <div class="username"><?php echo $bots['name']; ?></div><br>
                
                </div>
                
                <center><img align="left" src="http://www.habbo.com/habbo-imaging/avatarimage?figure=<?php echo $bots['look']; ?>&head_direction=3.gif"></center>
            
            </div>
        
        <?php } ?>
                
   	</div>
            
</div>

<?php } } ?>