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

if(isset($_POST['id'])){

	if($users->UserPermission('cms_handle_tickets', $username)){
		
		$id = $core->ExploitRetainer($_POST['id']);
		
		$query = mysql_query("UPDATE helptool_messages SET token = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."' WHERE id = '".$id."'");
		
		$query_get_information_ticket = mysql_fetch_array(mysql_query("SELECT * FROM helptool_messages WHERE id = '".$id."'"));
?>
	
		<script src="<?php echo HOST; ?>/web-gallery/styles/js/cufon-yui.js" type="text/javascript"></script>
		<script src="<?php echo HOST; ?>/web-gallery/styles/js/ubuntu.font.js" type="text/javascript"></script>
				
		<script type="text/javascript">
			Cufon.replace("ubuntu");
		</script>
        
        <script>
		$(document).ready(function(){
			$('.thisTicketRelease').click(function(){
				var id = '<?php echo $id; ?>';
				$.post("<?php echo HOST; ?>/handle/release/ticket/<?php echo $id; ?>", { id: id }, function(){
					backToTickets();
				});
			});
			
			$('.closeTicketAsUseless').click(function(){
				$.post("<?php echo HOST; ?>/close/ticket/and/send/alert", { ticket_id: '<?php echo $id; ?>', user_id: '<?php echo $query_get_information_ticket['user_id']; ?>', message: '<b>Op antwoord van je ticket:</b><br>Ik heb jou ticket gesloten als nutteloos. Dit betekent dat wij niets met deze ticket gaan doen. Deze tool is alleen geschikt voor als het echt noodzakelijk is.' }, function(){
					backToTickets();
				});
			});
			
			$('.sendAnswerWithTicket').click(function(){
				var message = '<b>Op antwoord van je ticket:</b><br>' + $('.inputAnserOfTicket').val();
				$.post("<?php echo HOST; ?>/close/ticket/and/send/alert", { ticket_id: '<?php echo $id; ?>', user_id: '<?php echo $query_get_information_ticket['user_id']; ?>', message: message }, function(){
					backToTickets();
				});
			});
		});
		</script>
        
        <style type="text/css">
        .askedQuestion {
			position: relative;
			font-size: 10px;
			border: 1px solid #808080 !important;
			-webkit-border-radius: 4px;
			-moz-border-radius: 4px;
			border-radius: 4px;
			margin-top: 3px;
			background-color: #FFFFFF !important;
			-webkit-box-shadow: inset 0 3px 3px rgba(239, 239, 239, 1),0 1px 1px rgba(0, 0, 0, .05);
			-moz-box-shadow: inset 0 3px 3px rgba(239,239,239,1),0 1px 1px rgba(0,0,0,.05);
			box-shadow: inset 0 3px 3px rgba(239, 239, 239, 1),0 1px 1px rgba(0, 0, 0, .05);
			padding: 7px 7px 0px 7px !important;
			font-family: Ubuntu !important;
			color: #808080;
			margin-bottom: 10px;
    	}
		
		.askedQuestion:focus{
            background-color: #FFFFFF;
            webkit-box-shadow: inset 0 2px 2px rgba(239, 239, 239, .4),0 1px 1px rgba(0, 0, 0, .05) !important;
            -moz-box-shadow: inset 0 2px 2px rgba(239,239,239,.4),0 1px 1px rgba(0,0,0,.05) !important;
           	box-shadow: inset 0 2px 2px rgba(239, 239, 239, .4),0 1px 1px rgba(0, 0, 0, .05) !important;
        }
		</style>
        
        <div class="askedQuestion">
		
			<div style="width: 394px; display: table;">
            
            	<div style="width: 330px; float: right; padding-bottom: 7px;"><?php echo $query_get_information_ticket['message']; ?></div>
                
            </div>
        
        	<div style="margin-right: 10px; background-position: 0px 0px; width: 64px; height: 70px; float: left; background-image: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $core->ExploitRetainer($users->UserInfoByID($query_get_information_ticket['user_id'], 'look')); ?>); margin-top: -70px; margin-left: -4px;" class="avatar"></div>
            
       	</div>
        
        <div style="float: left; display: table;">
        
            <a class="overlowButton closeTicketAsUseless" style="float: left; text-shadow: none; text-align: center; width: 118px;">
                    
                <b><u class="overlowButtonText" style="margin-top: -0px; width: 102px;">
                        
                    <i><ubuntu>Sluiten als nutteloos</ubuntu></i>
                        
                </u></b>
                            
                <div></div>
                        
            </a>
            
            <br><br>
            
            <a class="overlowButton thisTicketRelease" style="float: left; text-shadow: none;text-align: center; width: 118px;">
                    
                <b><u class="overlowButtonText" style="margin-top: -0px; width: 102px;">
                        
                    <i><ubuntu>Vrijgeven</ubuntu></i>
                        
                </u></b>
                            
                <div></div>
                        
            </a>
            
            <br><br>
            
            <a class="overlowButton sendAnswerWithTicket" style="float: left; text-shadow: none;text-align: center; width: 118px;">
                    
                <b><u class="overlowButtonText" style="margin-top: -0px; width: 102px;">
                        
                    <i><ubuntu>Bericht verzenden</ubuntu></i>
                        
                </u></b>
                            
                <div></div>
                        
            </a>
        
        </div>
        
        <div style="float: left;">
        
        	<textarea class="askedQuestion inputAnserOfTicket" placeholder="Klik hier om een antwoord te schijven" style="margin-top: 0; margin-bottom: 0; width: 282px; height: 94px; margin-left: 30px;"></textarea>
        
        </div>
	
<?php 

	} 
}

?>