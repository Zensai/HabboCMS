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

if(isset($_COOKIE['username'])){ header("Location: me"); }

$query_ips = mysql_num_rows(mysql_query("SELECT * FROM users WHERE ip_reg = '".$_SERVER['REMOTE_ADDR']."'"));
if($query_ips >= $limit_ip_users){
	header("Location: ".HOST."/index/second/error/ip/overated");
}

$page = 'register_check';

if(isset($_POST['birthday-day']) && isset($_POST['birthday-month']) && isset($_POST['birthday-year']) && isset($_POST['gender'])){

	if($core->ExploitRetainer($_POST['birthday-day']) == NULL || $core->ExploitRetainer($_POST['birthday-month']) == NULL || $core->ExploitRetainer($_POST['birthday-year']) == NULL || $core->ExploitRetainer($_POST['gender']) == NULL){ 

		echo '<div class="error">';

		if($core->ExploitRetainer($_POST['birthday-day']) == NULL){ echo $language['index_register_error_no_birthday_day']; 
		}elseif($core->ExploitRetainer($_POST['birthday-month']) == NULL){ echo $language['index_register_error_no_birthday_month'];
		}elseif($core->ExploitRetainer($_POST['birthday-year']) == NULL){ echo $language['index_register_error_no_birthday_year'];
		}elseif($core->ExploitRetainer($_POST['gender']) == NULL){ echo $language['index_register_error_no_gender']; }

		echo '</div>';
	
	}else{
?>

		<script>
		$(document).ready(function() {

			$('.overlowLoadingContainer').html('<div class="overlowLoading"><div class="progressContainer"><div class="progress"></div><div class="loading"><?php echo $language['loading']; ?></div></div></div>');
			
			setTimeout('document.registerform.mySubmit.click()',1000);
			
		});
		</script>
		
		<form method="post" id="registerform" name="registerform" action="<?php echo HOST; ?>/quickregister/second">
		
			<input type="hidden" name="birthday-day" value="<?php echo $core->ExploitRetainer($_POST['birthday-day']); ?>">
			<input type="hidden" name="birthday-month" value="<?php echo $core->ExploitRetainer($_POST['birthday-month']); ?>">
			<input type="hidden" name="birthday-year" value="<?php echo $core->ExploitRetainer($_POST['birthday-year']); ?>">
			<input type="hidden" name="gender" value="<?php echo $core->ExploitRetainer($_POST['gender']); ?>">
			<?php if(isset($_POST['email']) && $core->ExploitRetainer($_POST['email'])){ ?><input type="hidden" name="email" value="<?php echo $core->ExploitRetainer($_POST['email']); ?>"><?php } ?>
			<?php if(isset($_POST['password']) && $core->ExploitRetainer($_POST['password'])){ ?><input type="hidden" name="password" value="<?php echo $core->ExploitRetainer($_POST['password']); ?>"><?php } ?>
			<?php if(isset($_POST['passwordconf']) && $core->ExploitRetainer($_POST['passwordconf'])){ ?><input type="hidden" name="passwordconf" value="<?php echo $core->ExploitRetainer($_POST['passwordconf']); ?>"><?php } ?>
			<?php if(isset($_POST['look']) && $core->ExploitRetainer($_POST['look'])){ ?><input type="hidden" name="look" value="<?php echo $core->ExploitRetainer($_POST['look']); ?>"><?php } ?>
			<?php if(isset($_POST['username']) && $core->ExploitRetainer($_POST['username'])){ ?><input type="hidden" name="username" value="<?php echo $core->ExploitRetainer($_POST['username']); ?>"><?php } ?>
			
			<input type="submit" hidden="hidden" name="mySubmit" style="margin-top: -9999999999px;">
			
		</form>

<?php
	}

}
?>