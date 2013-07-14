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
include("../../includes/inc.global.php");
?>

<script src="<?php echo HOST; ?>/web-gallery/styles/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php echo HOST; ?>/web-gallery/styles/js/ubuntu.font.js" type="text/javascript"></script>
<script type="text/javascript"> Cufon.replace("ubuntu"); </script>

<style type="text/css">
.streamContainer {
	height: 600px;
	max-height: 600px;
	overflow-x: none;
	overflow-y: scroll;
	width: 305px;
	border-right: 1px solid #222222;
	border-top: 1px solid #222222;
	margin-top: 10px;
}

.insideStream {
	padding-right: 10px;
}

.messageContainer {
	width: 100%;
	height: auto;
	border-bottom: 1px dashed #6E6E6E;
	margin-bottom: 5px;
	display: table;
}

.messageContainer > .avatar {
	background-position: -10px -10px;
	width: 50px;
	height: 60px;
}

.messageContainer .text {
	width: 220px;
	margin-left: 55px;
	margin-bottom: -65px;
	font-size: 12px;
	font-family: Ubuntu;
	font-weight: normal;
}

.messageContainer .text b.agoTitle {
	color: #666666;
}

.messageContainer .text b.titleName {
	color: #CCCCCC;
}
</style>

<?php 
$query_stream = mysql_query("SELECT * FROM stream ORDER BY published DESC LIMIT 100");
while($stream = mysql_fetch_array($query_stream)){
	$query_stream_user = mysql_query("SELECT * FROM users WHERE id = '".$stream['author']."'");
	$stream_user = mysql_fetch_array($query_stream_user);
?>
                
     <div class="messageContainer">
                    
         <ubuntu>
                        
         	<div class="text">
                            
            	<b class="titleName" style="color: #333;"><a style="color: #333;" target="new" href="<?php echo HOST; ?>/home/<?php echo $stream_user['id']; ?>"><?php echo $stream_user['username']; ?></a> <?php echo $language['says']; ?>:</b><br />
                            
                <div style="height: 5px;"></div>
                            
                <?php echo $stream['text']; ?><br>
                                
                <div style="height: 5px;"></div>
                            
                <b class="agoTitle"><?php echo $core->timeAgo($stream['published']); ?></b>
                            
            </div>
                            
        </ubuntu>
        
        <div class="avatar" style="background-image: url(<?php echo $avatarimage_url; ?>?figure=<?php echo $stream_user['look']; ?>&direction=2&head_direction=3&gesture=sml); float: left; background-position: -10px 0px; width: 50px; height: 70px; margin-bottom: 0px; margin-top: 10px;"></div>
                    
	</div>
                    
<?php } ?>