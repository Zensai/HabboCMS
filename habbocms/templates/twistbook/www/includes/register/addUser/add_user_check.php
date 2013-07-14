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
include("../../../includes/inc.global.php");

$query_ips = mysql_num_rows(mysql_query("SELECT * FROM users WHERE ip_reg = '".$_SERVER['REMOTE_ADDR']."'"));
if($query_ips >= $limit_ip_users){
	header("Location: ".HOST."/index/second/error/ip/overated");
}else{
	
$page = 'register_add_check';

echo $Style->General();

$userchecker = mysql_query("SELECT username FROM users WHERE username = '".$core->ExploitRetainer($_POST['user'])."'");

$usercounter = mysql_num_rows($userchecker);
?>

<?php if($core->ExploitRetainer($_POST['terms']) == NULL || $usercounter > 0 || preg_match('/^[a-zA-Z0-9]+$/i', $core->ExploitRetainer($_POST['user'])) == 0 || $core->ExploitRetainer($_POST['user']) == NULL){ ?>
	
	<div class="errorMessageOverlow" style="width: 370px; padding: 10px 10px 10px 10px; margin: auto; margin-top: 12px; margin-bottom:  0px;">
	
		<?php if($core->ExploitRetainer($_POST['terms']) == NULL){ echo $language['index_register_error_no_accepted_terms']."<br>"; } ?>
		<?php if($usercounter > 0){ echo $language['index_register_error_taken_username']."<br>"; } ?>
		<?php if(preg_match('/^[a-zA-Z0-9]+$/i', $core->ExploitRetainer($_POST['user'])) == 0){ echo $language['index_register_error_signs_username']."<br>"; } ?>
		<?php if($core->ExploitRetainer($_POST['user']) == NULL){ echo $language['index_register_error_no_username']; } ?>
	
	</div>

<?php
}else{
?>

<script>
$('.overlowLoadingContainer').html('<div class="overlowLoading addUserLoading" style="background: url(<?php echo HOST; ?>/web-gallery/general/overlow/floatBackground.png) repeat; display: none;"><div class="progressContainer"><center><img src="<?php echo HOST; ?>/web-gallery/icons/progress_habbos.gif"></center><div class="loading"><?php echo $language['loading_add_user']; ?>...<br><?php echo $language['loading_login']; ?>...</div></div></div>');
$("#overlowAddUser").fadeOut("slow");
$(".addUserLoading").fadeIn("slow");
</script>

<meta http-equiv="refresh" content="3;URL=<?php echo HOST; ?>/add/user/add?user=<?php echo $core->ExploitRetainer($_POST['user']); ?>&pass=<?php echo $core->ExploitRetainer($_POST['pass']); ?>&mail=<?php echo $core->ExploitRetainer($_POST['mail']); ?>&date=<?php echo $core->ExploitRetainer($_POST['date']); ?>&user_bind_id=<?php echo $core->ExploitRetainer($_POST['user_bind_id']); ?>" />

<?php 
}

}
?>