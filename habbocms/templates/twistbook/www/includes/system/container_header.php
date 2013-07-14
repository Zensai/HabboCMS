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

?>

<script>
//var refreshId = setInterval(function() { $('#userCountInside').hide().load('<?php echo HOST; ?>/userCounter').show(); }, 3000);
</script>

<div id="containerHeader">

	<div id="inside">
	
		<img style="float: left;" src="<?php echo HOST; ?>/web-gallery/general/logo.gif">
		
		<div id="left"></div>
		
		<div id="right" style="width: 350px;">
		
			<?php if(isset($_COOKIE['username'])){ ?>
            
            	<?php if($core->ExploitRetainer($users->UserPermission('cms_handle_tickets', $username))){ ?>
            
                    <a class="overlowButton" style="float: left; margin-left: 10px;">
                    
                        <b><u>
                        
                            <?php
                            $query_helptool_tickets_first_token = mysql_num_rows(mysql_query("SELECT * FROM helptool_messages WHERE token = '0'"));
							$query_helptool_tickets_second_token = mysql_num_rows(mysql_query("SELECT * FROM helptool_messages WHERE token = '".$core->ExploitRetainer($users->UserInfo($username, 'id'))."'"));
                            $tokens_helptool = $query_helptool_tickets_first_token + $query_helptool_tickets_second_token;
							if($tokens_helptool > 0){
                            ?>
                            
                            <div style="border: 1px solid #000000; border-radius: 7px; border-bottom-width: 2px; display: table; margin-top: -7px; margin-left: -14px; margin-bottom: -10px; z-index: 999;">
                                
                                <div style="border: 1px solid #ED2823; border-radius: 5px; background-color: #AC1D19; padding: 1px 3px 1px 4px; color: #FFFFFF; display: table;">
                                    
                                    <ubuntu><?php echo $tokens_helptool; ?></ubuntu>
                                
                                </div>
                                
                            </div>
                            
                            <embed src='<?php echo HOST; ?>/web-gallery/general/helptool/new_tickets.mp3' hidden='true' autostart='true' loop='false'>
                            
                            <?php } ?>
                                
                            <div id="onclickOpenHandleTickets" title="Tickets" class="overlowIcon manageTickets"></div> 
                                
                        </u></b>
                        
                        <div style="z-index: 5;"></div>
                        
                    </a>
                
                <?php } ?>
		
				<div id="userCount">
	
					<div id="userCountInside">
                    
						<?php
						if($userCounter == 0){ echo '<ubuntu>'.$language['useronline_0'].'</ubuntu>';

						}elseif($userCounter == 1){ echo '<ubuntu>'.$language['useronline_1'].'</ubuntu>';

						}elseif($userCounter > 1){ echo '<ubuntu>'.$language['useronline_+2'].'</ubuntu>';}
						?>
                    
                    </div>
		
				</div>
                
                <div style="">
                
                	<div style="background-image: url(<?php echo HOST; ?>/web-gallery/general/asking_boy.png); width: 59px; height: 124px; float: right; margin-top: -50px; cursor: pointer;" title="Heb je een vraag?" id="onclickOpenQuestion"></div>
                
                </div>
			
				<div id="buttonContainer" style="margin-right: 25px;">
		
					<a class="overlowButton" style="float: right; margin-left: 10px;">
				
						<b><u>
						
							<div id="onclickOpenProfile" title="<?php echo $language['menu_me']; ?>" class="overlowIcon user"></div> 
						
							<?php if($core->ExploitRetainer($users->UserInfo($username, 'vip')) == 1){ ?>
							
								
								
								<div class="overlowIconLine"></div> 
								
								<div id="onclickOpenMessages" title="<?php echo $language['menu_messages']; ?>" class="overlowIcon message"></div>
								
								<div class="overlowIconLine"></div> 
							
								<div id="onclickOpenFriends" title="<?php echo $language['menu_friends']; ?>" class="overlowIcon friends"></div>
								
								
							
							<?php } ?>
							
						</u></b>
					
						<div></div>
					
					</a>
					
					<?php if($core->ExploitRetainer($users->UserPermission('cms_manager_login', $username))){ ?>
					
						<a class="overlowButton" style="float: right; margin-left: 10px;">
				
							<b><u>
								
								<script>
								$(document).ready(function(){
									$('#onclickOpenManager').click(function() {
										window.open('<?php echo HOST; ?>/manager');
									});
								});
								</script>
						
								<div id="onclickOpenManager" title="<?php echo $language['menu_manager']; ?>" class="overlowIcon edit"></div> 
							
							</u></b>
					
							<div></div>
					
						</a>
					
					<?php } ?>
                    
                    <a class="overlowButton" style="float: right;">
				
						<b><u>
						
							<div onClick="Popup=window.open('<?php echo HOST; ?>/radio','Popup','toolbar=no, location=no,status=no,menubar=no,scrollbars=yes,resizable=no, width=305,height=616'); return false;" title="<?php echo $language['menu_radio']; ?>" class="overlowIcon music"></div> 
							
						</u></b>
					
						<div></div>
					
					</a>
			
				</div>
			
			<?php }else{ ?>
			
				<div id="containerHeaderBox" style="margin-top: -18px;height: 115px;">
				
					<form method="post" action="<?php echo HOST; ?>/login">
				
						<input type="text" name="username" id="headerTextInput" placeholder="<?php echo $language['index_mail']; ?>">
					
						<input type="password" name="password" id="headerTextInput" placeholder="<?php echo $language['index_password']; ?>">
						
						<input type="hidden" name="destinationLink" value="<?php echo HOST; ?><?php echo SUBLINK; ?>">
					
						<input id="submitGreen" style="margin-top: 7px;" type="submit" value="<?php echo $language['log_in']; ?>">
					
					</form>
				
				</div>
			
			<?php } ?>
		
		</div>
		
	</div>

</div>