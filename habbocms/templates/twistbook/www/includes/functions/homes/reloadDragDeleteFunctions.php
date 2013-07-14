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

$id = $core->ExploitRetainer($_GET['user_id']);

$query_home_basic = mysql_query("SELECT * FROM homes WHERE user_id = '".$core->ExploitRetainer($users->UserInfoById($id, 'id'))."'");
$query_check_home = mysql_fetch_array($query_home_basic);
?>

    
<?php
$query_home_qq = mysql_query("SELECT * FROM homes_items WHERE home_id = '".$query_check_home['id']."' AND user_id = '".$core->ExploitRetainer($users->UserInfoById($id, 'id'))."'");
while($home_q = mysql_fetch_array($query_home_qq)){
?>
    <input type="hidden" name="widget_<?php echo $home_q['id']; ?>_id" id="widget_<?php echo $home_q['id']; ?>_id" value="<?php echo $home_q['id']; ?>">
   	<input type="hidden" name="widget_<?php echo $home_q['id']; ?>_show" id="widget_<?php echo $home_q['id']; ?>_show" value="<?php echo $home_q['display']; ?>">
<?php } ?>
		