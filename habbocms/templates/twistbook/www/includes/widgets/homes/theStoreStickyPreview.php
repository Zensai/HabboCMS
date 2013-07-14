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

echo $Style->Homes();

$id = $core->ExploitRetainer($_POST['id']);

$query = mysql_query("SELECT * FROM homes_shop_stickys WHERE id = '".$id."'");
$sticky = mysql_fetch_array($query);

if($core->ExploitRetainer($users->UserInfo($username, 'credits')) == $sticky['value'] || $core->ExploitRetainer($users->UserInfo($username, 'credits')) > $sticky['value']){
	$check_enough = 'yes_'.$sticky['id'].'';
}else{
	$check_enough = 'no_'.$sticky['id'].'';
}
?>

<script src="<?php echo HOST; ?>/web-gallery/styles/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php echo HOST; ?>/web-gallery/styles/js/ubuntu.font.js" type="text/javascript"></script>
			
<script type="text/javascript">
	Cufon.replace("ubuntu");
</script>

<script>
$(document).ready(function() {
	$('.onclickBuyShopSticky').click( function () {
		var id = '<?php echo $sticky['id']; ?>';
		$.post("<?php echo HOST; ?>/home/shop/sticky/buy/<?php echo $sticky['id']; ?>", { id: id }, function (result) {
			if(result == 1){
				$('.itemBoughtStickyGood').fadeIn();
				setTimeout( function () { $('.itemBoughtStickyGood').fadeOut(); }, 2000);
			}else{
				$('.itemBoughtStickyFalse').fadeIn();
				setTimeout( function () { $('.itemBoughtStickyFalse').fadeOut(); }, 2000);
			}
		});
	});
});
</script>

<div class="onclickedInformationContainerMyItems">
     <div class="PrevieuwBox">
        <div title="<?php echo $sticky['name']; ?>" style="background: url(<?php echo HOST; ?>/web-gallery/homes/sticky/<?php echo $sticky['image']; ?>) center center; background-repeat: no-repeat; width: 150px; height: 150px;"></div>
     </div>
     
     <div id="coins" style="width: 140px; margin-top: 10px;">
                        
		<div id="text"><ubuntu><?php echo $sticky['value']; ?></ubuntu></div><img align="right" style="margin-bottom:-4px;margin-left: 4px;" src="<?php echo HOST; ?>/web-gallery/icons/coin.png" />

	</div>
     
     <?php if($check_enough == 'yes_'.$sticky['id'].''){ ?>
     	<input type="submit" style="margin-top: 10px;" class="submitRight onclickBuyShopSticky" id="submitGreen" value="<?php echo $language['buy']; ?>" />
     <?php }else{ ?>
     	<input type="submit" style="margin-top: 10px;" class="submitRight" id="submitRed" value="<?php echo $language['buy']; ?>" />
     <?php } ?>
</div>