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

$page = 'chat_messages';
?>

<script src="<?php echo HOST; ?>/web-gallery/styles/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php echo HOST; ?>/web-gallery/styles/js/ubuntu.font.js" type="text/javascript"></script>
			
<script type="text/javascript">Cufon.replace("ubuntu");</script>

<style type="text/css">
p {
	padding: 0;
	margin: 0;
}
</style>

<?php
$queryAlertConfirm = mysql_query("UPDATE cms_messages_chat SET alert = '0' WHERE id = '".$core->ExploitRetainer($_GET['chatId'])."' AND alert = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."'");
$queryCheckUser = mysql_query("SELECT * FROM cms_messages_chat WHERE id = '".$core->ExploitRetainer($_GET['chatId'])."'"); 
$checkUser = mysql_fetch_array($queryCheckUser);

$queryMessageCount = mysql_query("SELECT * FROM cms_chat_messages WHERE chatId = '".$core->ExploitRetainer($_GET['chatId'])."'");
$messageCount = mysql_num_rows($queryMessageCount);

if($messageCount == '150'){ $query = mysql_query("DELETE FROM cms_chat_messages WHERE chatId = '".$core->ExploitRetainer($_GET['chatId'])."'"); }

if($checkUser['userOne'] == $core->ExploitRetainer($users->UserInfo($username, 'id'))){ $userPlacementCheck = $checkUser['userTwo']; }else{ $userPlacementCheck = $checkUser['userOne']; }
	
if($userPlacementCheck == $core->ExploitRetainer($users->UserInfo($username, 'id'))){ $queryAlertConfirm = mysql_query("UPDATE cms_messages_chat SET alert = '0' WHERE id = '".$core->ExploitRetainer($_GET['chatId'])."' AND alert = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."'"); }
	
$queryChatMessages = mysql_query("SELECT * FROM cms_chat_messages WHERE chatId = '".$core->ExploitRetainer($_GET['chatId'])."'ORDER BY posted LIMIT 50");
while($chatMessages = mysql_fetch_array($queryChatMessages)){

$queryUserId = mysql_query("SELECT * FROM users WHERE id = '".$chatMessages['userId']."'");
$userId = mysql_fetch_array($queryUserId);
?>

<?php if($chatMessages['userId'] == $core->ExploitRetainer($users->UserInfo($username, 'id'))){ ?>

<div class="messageContainerLoading">

<div class="messagePlacement">
	
	<b style="float: right; padding-right: 10px; padding-top: 3px; font-size: 11px;"><ubuntu>:<?php echo $language['you']; ?></ubuntu></b>
	
	<br>

	<div class="messageIllumniaTextBoxContainer right">

		<div class="cornorLeft"></div>
    	<div class="cornorRight"></div>
    	<div class="arrowRight"></div>

		<div style="padding-top: 2px;"><ubuntu><?php echo $core->protectRedirect(stripslashes(html_entity_decode(htmlspecialchars_decode($core->ExploitRetainer($chatMessages['message']))))); ?></ubuntu></div>
    
	</div>
		
	<input type="hidden" id="chatId" value="<?php echo $core->ExploitRetainer($_GET['chatId']); ?>">
		
</div>

<div class="description right" style="float: right; margin-right: 6px;"><ubuntu><?php echo $core->timeAgo($chatMessages['posted']); ?></ubuntu></div>

</div>

<?php }else{ ?>

<div class="messageContainerLoading">

<div class="messagePlacement" style="margin-left: 5px;">
				
	<b style="float: left; padding-left: 7px; padding-top: 3px; font-size: 11px;"><ubuntu><?php echo $userId['username']; ?>:</ubuntu></b>
	
	<br>
	
	<div class="messageIllumniaTextBoxContainer left">

		<div class="cornorLeft"></div>
    	<div class="cornorRight"></div>
    	<div class="arrowLeft"></div>

		<div style="padding-top: 2px;"><ubuntu><?php echo $core->protectRedirect(stripslashes(html_entity_decode(htmlspecialchars_decode($core->ExploitRetainer($chatMessages['message']))))); ?></ubuntu></div>
    
	</div>
		
	<input type="hidden" id="chatId" value="<?php echo $core->ExploitRetainer($_GET['chatId']); ?>">
		
</div>

<div class="description left" style="float: left; margin-left: 6px;"><ubuntu><?php echo $core->timeAgo($chatMessages['posted']); ?></ubuntu></div>

</div>
	
<?php } } ?>

<div style="height: 10px;"></div>

<?php
if($messageCount > '145'){ echo '<div class="errorMessageOverlow" style="margin-top: 15px; margin-left: 10px; margin-right: 10px; width: 298px;">'.$language['error_messages_almost_goingto_delete'].'<br><br>'.$messageCount.' '.$language['error_messages_almost_goingto_delete_messages'].'</div>'; }
?>
	
<div style="height: 10px;"></div>