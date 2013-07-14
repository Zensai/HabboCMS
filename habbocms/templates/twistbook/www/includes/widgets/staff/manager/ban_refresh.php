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

if($core->ExploitRetainer($users->UserPermission('cms_manager_login', $username))){ if($core->ExploitRetainer($users->UserPermission('cms_manager_ban', $username))){ 
?>
<script>
$(document).ready(function(){
	
	$('.removeBan').click(function(){
		var id = $(this).attr('id');
		removeBan(id);
	});
	
});
</script>

			<table>
            
            	<tr>
                	<td><b>Type</b></td>
                    <td><b>Waarde</b></td>
                    <td><b>Reden</b></td>
                    <td><b>Geplaatst op</b></td>
                    <td><b>Verbannen tot</b></td>
                    <td><b>Geplaatst door</b></td>
                </tr>
                
                <?php 
				
				$ban_type = array("user" => "Gebruiker", "ip" => "IP");
				
				$query_bans = mysql_query("SELECT * FROM bans ORDER BY added_date");
				$tr_color = 'grey';
				while($bans = mysql_fetch_array($query_bans)){
				?>
                
                <tr class="<?php echo $tr_color; ?> fadeBan<?php echo $bans['id']; ?>">
                	<td><div class="tooltip removeBan" id="<?php echo $bans['id']; ?>"><?php echo $ban_type[$bans['bantype']]; ?><span>Klik hier om deze ban te verwijderen!</span></div></td>
                    <td><?php echo $bans['value']; ?></td>
                    <td><?php echo $bans['reason']; ?></td>
                    <td><?php echo ucfirst($bans['added_date']); ?></td>
                    <td><?php echo ucfirst(strftime('%A %d, %Y - %H:%S', $bans['expire'])); ?></td>
                    <td><?php echo $bans['added_by']; ?></td>
                </tr>
                
                <?php if($tr_color == 'grey'){ $tr_color = ''; }else{ $tr_color = 'grey'; } } ?>
            
            </table>
            
<?php } } ?>