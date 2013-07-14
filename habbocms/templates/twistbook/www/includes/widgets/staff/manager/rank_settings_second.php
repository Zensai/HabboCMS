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

if($core->ExploitRetainer($users->UserPermission('cms_manager_login', $username))){ if($core->ExploitRetainer($users->UserPermission('cms_manager_rank', $username))){ 
?>

<script>
$(document).ready(function() {
	
    $('.deleteRank').click(function(){
		var id = $(this).attr('id');
		deleteRank(id);
	});
	
	$('.editRank').click(function(){
		var id = $(this).attr('id');
		editRank(id);
	});
	
});
</script>

<div class="boxContainer red">
        
    <div class="boxHeader"><div class="text"><?php echo $language["manager_ranks_title"]; ?></div></div>
            
   	<div class="text">
            
  		<table>
                
         	<tr>
             	<td><b><?php echo $language["manager_ranks_caption"]; ?></b></td>
              	<td><b><?php echo $language["manager_ranks_actions"]; ?></b></td>
          	</tr>
                    
         	<?php 
          	$query_manager_rank = mysql_query("SELECT * FROM ranks ORDER BY id");
          	$rank_color = 'grey';
          	while($manager_rank = mysql_fetch_array($query_manager_rank)){
           	?>
                    
             	<tr class="<?php echo $rank_color; ?> containerRank<?php echo $manager_rank['id']; ?>">
                  	<td><?php echo $manager_rank['name']; ?></td>
                 	<td><input type="submit" class="button green editRank" id="<?php echo $manager_rank['id']; ?>" value="<?php echo $language["manager_ranks_edit"]; ?>" /> <input type="submit" class="button red deleteRank" id="<?php echo $manager_rank['id']; ?>" value="<?php echo $language["manager_ranks_delete"]; ?>" /></td>
             	</tr>
                    
             	<?php if($rank_color == 'grey'){ $rank_color = ''; }else{ $rank_color = 'grey'; } ?>
                    
         	<?php } ?>
                
     	</table>
                
   	</div>
            
</div>

<?php } } ?>