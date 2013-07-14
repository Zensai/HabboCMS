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
?>

<script src="<?php echo HOST; ?>/web-gallery/styles/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php echo HOST; ?>/web-gallery/styles/js/ubuntu.font.js" type="text/javascript"></script>
			
<script type="text/javascript">$(document).ready(function(){ Cufon.replace("ubuntu"); });</script>

<?php 
$query_ban = mysql_query("SELECT * FROM bans WHERE id = '".$core->ExploitRetainer($_GET['id'])."'");
$ban = mysql_fetch_array($query_ban);

if($ban['bantype'] == 'ip'){
?>

	<script>
	$(document).ready(function(){
		$('.deleteBanIP').click(function() {
			$('.lookupBanInformation').fadeOut();
			$.post('<?php echo HOST; ?>/manager/ban/delete/<?php echo $ban['id']; ?>', { id: '<?php echo $ban['id']; ?>' }, function() {
				$('.banGlobals').html('<div class="insideContainer space"><center><img style="margin-top:50px; margin-bottom: 50px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></center></div>');
				$('.banGlobals').load('<?php echo HOST; ?>/manager/ban/global');
			});
		});
	});
	</script>

	<div class='' style="background-color: #EEEEEE; border: 1px solid #EEEEEE; border-radius: 3px; padding: 7px 5px 6px 5px; margin-top: 1px; width: 690px; display: table; float: left; margin-left: 1px;">
                    
		<img style="float: left; margin-top: 2px;" src="<?php echo HOST; ?>/web-gallery/icons/ip_icon.gif"> 
						
		<div style="float: left; font-weight: bold; padding-left: 5px;"><?php echo $ban['value']; ?></div>
        
        <br><br>
        
        <table style="width: 100%;">
        
        	<tr>
        
        		<td valign="top" style="width: 200px;"><b><ubuntu><?php echo $language['manager_ban_settings_ban_reason']; ?>:</ubuntu></b><br> <ubuntu><?php echo $ban['reason']; ?></ubuntu></td>
        		<td valign="top" style="width: 200px;"><b><ubuntu><?php echo $language['news_author']; ?>:</ubuntu></b><br> <ubuntu><?php echo $ban['added_by']; ?></ubuntu></td>
            	<td valign="top" style="width: 200px;"><b><ubuntu><?php echo $language['news_published']; ?>:</ubuntu></b><br> <ubuntu><?php echo $ban['added_date']; ?></ubuntu></td>
           		<td valign="top" style="width: 200px;"><b><ubuntu><?php echo $language['manager_ban_settings_ban_expire']; ?>:</ubuntu></b><br> <ubuntu><?php echo date('d/m/Y H:i', $ban['expire']); ?></ubuntu></td>
            
            </tr>
        
        </table>
		
		<a class="overlowButton deleteBanIP" style="text-shadow: none; margin-top: 10px; margin-left: 0px; float: right;">
										
			<b><u class="overlowButtonText" style="">
													
				<i><ubuntu><?php echo $language['delete']; ?></ubuntu></i>
													
			</u></b>
														
			<div></div>
													
		</a> 
                    
	</div>

<?php }elseif($ban['bantype'] == 'user'){ ?>

    <script>
	$(document).ready(function(){
		$('.deleteBanUser').click(function() {
			$('.lookupBanInformation').fadeOut();
			$.post('<?php echo HOST; ?>/manager/ban/delete/<?php echo $ban['id']; ?>', { id: '<?php echo $ban['id']; ?>' }, function() {
				$('.banGlobals').html('<div class="insideContainer space"><center><img style="margin-top:50px; margin-bottom: 50px;" src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></center></div>');
				$('.banGlobals').load('<?php echo HOST; ?>/manager/ban/global');
			});
		});
	});
	</script>

	<div class='' style="background-color: #EEEEEE; border: 1px solid #EEEEEE; border-radius: 3px; padding: 7px 5px 6px 5px; margin-top: 1px; width: 100%; display: table; float: left; margin-left: 1px;">
                    
		<img style="float: left; margin-top: 2px;" src="<?php echo HOST; ?>/web-gallery/icons/user_icon.gif"> 
						
		<div style="float: left; font-weight: bold; padding-left: 5px;"><?php echo $ban['value']; ?></div>
        
        <br><br>
        
        <table style="width: 100%;">
        
        	<tr>
        
        		<td valign="top" style="width: 200px;"><b><ubuntu><?php echo $language['manager_ban_settings_ban_reason']; ?>:</ubuntu></b><br> <ubuntu><?php echo $ban['reason']; ?></ubuntu></td>
        		<td valign="top" style="width: 200px;"><b><ubuntu><?php echo $language['news_author']; ?>:</ubuntu></b><br> <ubuntu><?php echo $ban['added_by']; ?></ubuntu></td>
            	<td valign="top" style="width: 200px;"><b><ubuntu><?php echo $language['news_published']; ?>:</ubuntu></b><br> <ubuntu><?php echo $ban['added_date']; ?></ubuntu></td>
           		<td valign="top" style="width: 200px;"><b><ubuntu><?php echo $language['manager_ban_settings_ban_expire']; ?>:</ubuntu></b><br> <ubuntu><?php echo date('d/m/Y H:i', $ban['expire']); ?></ubuntu></td>
            
            </tr>
        
        </table>
		
		<a class="overlowButton deleteBanUser" style="text-shadow: none; margin-top: 10px; margin-left: 0px; float: right;">
										
			<b><u class="overlowButtonText" style="">
													
				<i><ubuntu><?php echo $language['delete']; ?></ubuntu></i>
													
			</u></b>
														
			<div></div>
													
		</a> 
                    
	</div>

<?php } ?>