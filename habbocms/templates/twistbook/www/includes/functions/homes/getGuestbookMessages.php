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

$home_id = $core->ExploitRetainer($_GET['home_id']);
?>

<?php
$query_questbook = mysql_query("SELECT * FROM homes_questbook WHERE home_id = '".$home_id."' ORDER BY published DESC LIMIT 50");
$color = '#F3F3F3';
while($questbook = mysql_fetch_array($query_questbook)){
	$query_questbook_user = mysql_query("SELECT * FROM users WHERE id = '".$questbook['user_id']."'");
	$questbook_user = mysql_fetch_array($query_questbook_user);
?>
                            	
   	<div style="display: table; background-color: <?php echo $color; ?>; width: 100%; padding: 7px;">
                                
		<div style="float: left;"><img src="<?php echo $avatarimage_url; ?>?figure=<?php echo $questbook_user['look']; ?>&direction=2&head_direction=3&gesture=sml&size=s"></div>
        
		<div style="float: left; width: 290px;">
									
			<b><a style="color: #3A3A3A"; href="<?php echo HOST; ?>/home/<?php echo $questbook_user['id']; ?>/normal"><?php echo $questbook_user['username']; ?></a></b>: <i style="float: right;" class="published<?php echo $questbook['id']; ?>"><?php echo $core->timeAgo($questbook['published']); ?></i><br>
										
			<?php echo $questbook['message']; ?>
                                        
        </div>
  
                                
    </div>
                                
<?php 
	if($color == '#F3F3F3'){ $color = '#E1E1E1'; }else{ $color = '#F3F3F3'; }
} ?>