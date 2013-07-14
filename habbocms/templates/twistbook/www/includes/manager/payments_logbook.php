<?php if($core->ExploitRetainer($users->UserPermission('cms_manager_login', $username))){ if($core->ExploitRetainer($users->UserPermission('cms_manager_payments_logbook', $username))){ ?>

<div class="container containerPaymentsLogbook" style="display: none;">
            
    <div class="navigation">
                
    	Betalingen <small>Alle betalingen op een rij</small>
                
   	</div>
                
  	<div class="catagorize">
                
      	<div class="inside">
                
          	<div class="icon home"></div> 
                        
          	<div  class="text"><div class="sizer">Startpagina</div> <div class="arrow"></div> <div class="sizer">Betalingen</div></div>
                        
         	<div class="dateCata">
                    
             	<div class="icon calendar white"></div>
                            
                <div class="text"><?php echo strftime('%A', time()).' '.@date('d, Y - H:i', time()); ?></div>
                        
            </div>
                
      	</div>
                    
   	</div>
    
    <div class="alertContainer"></div>
    
    <div class="boxContainer blue">
    
    	<div class="boxHeader"><div class="text">Betalingen</div></div>
        
        <div class="text">
        
        	<table>
                    
               	<tr>
                 	<td><b>Gebruiker</b></td>
                 	<td><b>Gekochte item</b></td>
                 	<td><b>Gekocht op</b></td>
                    <td><b>Uitgekeerd</b></td>
            	</tr>
                
				<?php
             	$query_manager_payments_logbook = mysql_query("SELECT * FROM manager_payments_logbook ORDER BY published DESC LIMIT 200");
				$rank_color = 'grey';
				
				$paymentValidated = array("0" => "Nog niet uitgekeerd", "1" => "Is uitgekeerd");
				
              	while($manager_payments_logbook = mysql_fetch_array($query_manager_payments_logbook)){
             	?>                        
                        
            	<tr class="<?php echo $rank_color; ?>">
                 	<td><?php echo $core->ExploitRetainer($users->UserInfoByID($manager_payments_logbook['user_id'], 'username')); ?></td>
                 	<td><?php echo $core->paymentArrayName($manager_payments_logbook['payment_id']); ?></td>
                 	<td><?php echo @date('d-m-Y', $manager_payments_logbook['published']); ?> om <?php echo @date('H:i', $manager_payments_logbook['published']); ?></td>  
                    <td><?php echo $paymentValidated[$manager_payments_logbook['validated']]; ?></td>
              	</tr>
                        
             	<?php 
              	if($rank_color == 'grey'){ $rank_color = ''; }else{ $rank_color = 'grey'; } }
           		?>
                    
        	</table>
        
        </div>
        
    </div>
            
</div>

<?php } }else{ header("Location: ".HOST.""); } ?>
   