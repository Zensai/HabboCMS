<?php if($core->ExploitRetainer($users->UserPermission('cms_manager_login', $username))){ if($core->ExploitRetainer($users->UserPermission('phpmyadmin_acces', $username))){ ?>

<div class="container containerPhpMyAdmin" style="display: none;">
            
    <div class="navigation">
                
    	PHPMyAdmin <small>Controle over alles</small>
                
   	</div>
                
  	<div class="catagorize">
                
      	<div class="inside">
                
          	<div class="icon home"></div> 
                        
          	<div  class="text"><div class="sizer">PHPMyAdmin</div></div>
                        
         	<div class="dateCata">
                    
             	<div class="icon calendar white"></div>
                            
                <div class="text"><?php echo strftime('%A', time()).' '.@date('d, Y - H:i', time()); ?></div>
                        
            </div>
                
      	</div>
                    
   	</div>
    
    <div class="boxContainer yellow">
    
    	<div class="boxHeader"><div class="text"><b><?php echo $core->ExploitRetainer($users->UserInfo($username, 'username')); ?></b>, welkom in de manager van <b>Febbo</b></div></div>
        
        <div class="text">
        
        	<img align="right" src="<?php echo HOST; ?>/web-gallery/avatars/frank/frankAvatarBooks.gif" />
    
    		Zoals gezegd, welkom in de manager van febbo, <b><?php echo $core->ExploitRetainer($users->UserInfo($username, 'username')); ?></b>!<br />
            We hebben afgezien van jou rang een aantal functies bij elkaar gezocht die jou het beste kunnen helpen. Deze manager is niet bedoeld om te gaan misbruiken. Deze manager maakt gebruik van een <i>'rang manager login check'</i>. Deze gebeurt op 2 manieren. &Eacute;&eacute;n daarvan gaan wij jou over informeren, zodat jij de manager beter gaat snappen. <br /><br />
            
            <img align="left" style="margin-right: 20px;" src="<?php echo HOST; ?>/web-gallery/avatars/frank/frankAvatarKey.gif" />
            
            De manager maakt hier nog eens gebruik van jou gebruikersnaam en jou wachtwoord. Hij checkt of deze overeen komen (niet alleen met het wachtwoord, maar ook met je ip bijvoorbeeld). Kloppen deze niet of komen ze niet overeen? Wat denk je zelf? Je word uit de manager gegooit. De manager is zo veilig mogelijk opgesteld. Overal in elk bestand en in elke configuratie zit een check gedeelte dat checkt of het account compatible is de permissie die je nodig hebt voor een bepaalde functie. Dit word zo streng gecheckt dat het gewoon niet hackbaar is.
            
            <br /><br />
            
            Soms heeft de manager ook wat keuren, omdat er soms ook iets mis kan zijn gegaan in de coding van de manager (dit hoeft niet altijd zo te zijn, maar het kan eens voorkomen dat je een bug tegen komt). Meld deze bug dan zo snel mogelijk! De bug kan wel soms alle functies in de manager blokkeren, omdat de manager er heel agressief op reageert.
            
            <br /><br />
            Veel <b>succes</b> met de manager!
            
        </div>
    
    </div>
	
	<div class="containerSpace"></div>
	
	<div class="boxContainer blue">
    
    	<div class="boxHeader"><div class="text">Database informatie</div></div>
        
        <div class="text">
        
        	Zo te zien heb je toegang gekregen tot de database van febbo. Wat een eer! Ga er dan ook zo mee om! De gegevens kun je krijgen bij een van de managers als jij dit mag.
            
        </div>
    
    </div>
            
</div>
   
<?php } } ?>