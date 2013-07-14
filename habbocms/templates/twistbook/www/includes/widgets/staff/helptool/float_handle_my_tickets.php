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

if($users->UserPermission('cms_handle_tickets', $username)){
?>

<script>
$(document).ready(function(){
	$(".onclickCloseHandleMyTickets").click(function () {
		$(".handleTicketTokenTickets").fadeOut(function(){
			$('.handleTicketNotTokenTickets').animate({
				marginLeft: "225px"
			});
		});
	});
	$('.helptoolTicketContainer').click(function(){
		loadTicket($(this).attr('id'));
	});
});
</script>

<?php if(mysql_num_rows(mysql_query("SELECT * FROM helptool_messages WHERE token = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."'")) == 0){ ?>

<div class="errorMessageOverlow" style="width: 380px;">Jij hebt geen ticktes hier.</div>

<?php } ?>

<?php
$query_manager_all_helptooltickets = mysql_query("SELECT * FROM helptool_messages WHERE token = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."' ORDER BY published DESC");
while($manager_all_helptooltickets = mysql_fetch_array($query_manager_all_helptooltickets)){
?>
            
    <div class="helptoolTicketContainer onclickCloseHandleMyTickets" style="display: table; cursor: pointer; width: 410px;" id="<?php echo $manager_all_helptooltickets['id']; ?>">
	
		<div style="margin-right: 10px; background-position: -10px -10px; width: 50px; height: 60px; float: left; background-image: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfoByID($manager_all_helptooltickets['user_id'], 'look')); ?>);" class="avatar"></div>
                    
        <div style="padding-top: 15px; display: table; width: 350px;">
		
			<div style="font-size: 18px; font-weight: bold; float: left;"><ubuntu><?php echo $core->ExploitRetainer($users->UserInfoByID($manager_all_helptooltickets['user_id'], 'username')); ?></ubuntu></div>
                        
     	</div>
                    
        <div style="color: #999; "><ubuntu><?php echo $language['posted_on']; ?>: <b><?php echo $core->timeAgo($manager_all_helptooltickets['published']); ?></b></ubuntu></div>
			
		<input type="hidden" name="ticketId" class="ticketId" value="<?php echo $manager_all_helptooltickets['id']; ?>">
		
	</div>
                
    <div style="border-top: 1px solid #CCCCCC;  border-bottom: 1px solid #FFFFFF; width: 410px"></div>
                
<?php 
}

}
?>