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

if($core->ExploitRetainer($users->UserPermission('cms_manager_login', $username))){ if($core->ExploitRetainer($users->UserPermission('cms_manager_users', $username))){ 

$user_id = $core->ExploitRetainer($_POST['user_id']);
?>

<script>
$(document).ready(function() {
	
	$('.removeBadge').click(function(){
		var id = $(this).attr('id');
		deleteBadge(id);
	});
	
	$('.addBadgeButton').click(function(){
		if($('.addBadgeContainer').is(":hidden")){
			$('.addBadgeContainer').slideDown();
		}else{
			$('.addBadgeContainer').slideUp();
		}
	});
	
	$('.submitAddBadgeCancel').click(function(){
		$('.addBadgeContainer').slideUp();
	});
	
	$('.submitAddBadge').click(function(){
		addBadge();
	});
	
});

function deleteBadge(id){

	$.post("<?php echo HOST; ?>/manager/badge/delete", { id: id }, function(data){ 
		if(data == 1){
			$('.alertContainer').append('<div class="alert alert-success" style="display: none;"><b>Voltooid!</b> De badge is succesvol verwijderd.</div>');
			$('.containerBadges .alertContainer .alert-success').slideDown(function(){
				setTimeout(function(){ $('.containerBadges .alertContainer .alert-success').slideUp(function(){ $(this).remove(); }); }, 1500);
			});
			$('.badgeFade' + id).fadeOut();
		}
			
		if(data == 0){
			$('.alertContainer').append('<div class="alert alert-error" style="display: none;"><b>Onvoltooid!</b> De bagde is niet succesvol verwijderd.</div>');
			$('.containerBadges .alertContainer .alert-error').slideDown(function(){
				setTimeout(function(){ $('.containerBadges .alertContainer .alert-error').slideUp(function(){ $(this).remove(); }); }, 1500);
			});
		}
	});
		
}

function addBadge(){

	var id = $('.badgeAddId').val();
	var user_id = '<?php echo $user_id; ?>';

	$.post("<?php echo HOST; ?>/manager/badge/add", { id: id, user_id: user_id }, function(data){ 	
		if(data == 1){
			$('.alertContainer').append('<div class="alert alert-success" style="display: none;"><b>Voltooid!</b> De badge is succesvol toegevoegd.</div>');
			$('.containerBadges .alertContainer .alert-success').slideDown(function(){
				setTimeout(function(){ $('.containerBadges .alertContainer .alert-success').slideUp(function(){ $(this).remove(); }); }, 1500);
			});
			$('.addBadgeContainer').slideUp();
			$('.containerUserBadges').append('<div id="' + id + '" class="tooltip removeBadge badgeFade' + id + '" style="margin: 5px; float: left; cursor: pointer; display: none;"><img src="<?php echo $badge_url; ?>' + id + '.gif"><span><b>' + id + '</b><br><br><?php echo $language["manager_badge_settings_sure_delete"]; ?></span></div>');
			$('.badgeFade' + id).fadeIn();
			
		}
		
		if(data == 0){
			$('.alertContainer').append('<div class="alert alert-error" style="display: none;"><b>Onvoltooid!</b> De badge is niet succesvol toegevoed.</div>');
			$('.containerBadges .alertContainer .alert-error').slideDown(function(){
				setTimeout(function(){ $('.containerBadges .alertContainer .alert-error').slideUp(function(){ $(this).remove(); }); }, 1500);
			});
		}
	});

}
</script>

<div class="containerSpace"></div>

<div class="boxContainer blue addBadgeContainer" style="display: none;">
    
	<div class="boxHeader"><div class="text">Badge toevoegen</div></div>
        
  	<div class="text">
        
      	<label>Badge ID</label>
    	<input type="text" class="input badgeAddId" placeholder="Vul hier wat in" value="">
        
  	</div>
        
  	<div class="buttonContainer">
            
        <input type="submit" class="button blue submitAddBadge" value="Toevoegen" />
                
        <input type="submit" class="button submitAddBadgeCancel" value="Afbreken" />
            
	</div>

</div>

<div class="containerSpace"></div>

<div class="boxContainer red badgesContainmentSearchedFade">
        
    <div class="boxHeader"><div class="text">Zoekresultaat voor <b><?php echo $user_id; ?></b></div></div>
    
    <div class="dateCata addBadgeButton" style="background-color: #4B8DF8; margin-right:0px; cursor: pointer; margin-top: -35px; height: 14px;">
                            
         <div class="text">Badge toevoegen</div>
                        
    </div>
            
   	<div class="text" style="display: table;">
            
  		<div class="userSearchresultBox" style="width: auto; display: table; float: left;">
        
        	<div class="information">
            
            	<div class="username"><?php echo $core->ExploitRetainer($users->UserInfo($user_id, 'username')); ?></div>
            
            </div>
        
        	<center><img align="left" src="http://www.habbo.com/habbo-imaging/avatarimage?figure=<?php echo $core->ExploitRetainer($users->UserInfo($user_id, 'look')); ?>&head_direction=3.gif"></center>
        
        </div>
        
        <div class="userSearchresultBox containerUserBadges" style="width: auto; display: table; float: left; margin-left: 10px;">
        
        	<?php
			$query_badges = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$core->ExploitRetainer($users->UserInfo($user_id, 'id'))."'");
			while($editBadges = mysql_fetch_array($query_badges)){
			?>
					
                <div id="<?php echo $editBadges['id']; ?>" class="tooltip removeBadge badgeFade<?php echo $editBadges['id']; ?>" style="margin: 5px; float: left; cursor: pointer;"><img src="<?php echo $badge_url; ?><?php echo $editBadges['badge_id']; ?>.gif"><span><b><?php echo $editBadges['badge_id']; ?></b><br><br><?php echo $language["manager_badge_settings_sure_delete"]; ?></span></div>
                
            <?php } ?>	
        
        </div>
                
   	</div>
            
</div>

<?php } } ?>