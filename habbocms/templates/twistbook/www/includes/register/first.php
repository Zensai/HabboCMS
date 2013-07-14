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

if(isset($_COOKIE['username'])){ header("Location: ".HOST."/me"); }

$query_ips = mysql_num_rows(mysql_query("SELECT * FROM users WHERE ip_reg = '".$_SERVER['REMOTE_ADDR']."'"));
if($query_ips >= $limit_ip_users){
	header("Location: ".HOST."/index/error/ip/overated");
}

$page = 'index';
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

	<title><?php echo $hotelname; ?></title>
	<?php echo $Style->Register(); ?>
	
</head>

<script>
$(document).ready(function() {

    $('#genderChooserBoy').click(function() {
        $('#genderChooser').val("M");
		$(this).addClass('selected');
		$('#genderChooserGirl').removeClass('selected');
    });

    $('#genderChooserGirl').click(function() {
        $('#genderChooser').val("F");
		$(this).addClass('selected');
		$('#genderChooserBoy').removeClass('selected');
    });
	
	$('.submitFirstStep').click(function() { 
		submitFirstStep('<?php echo HOST; ?>/quickregister/check/first');
	});
	
	function submitFirstStep(pageName) {
		$('.errorContainer').html('<div style="width: 43px; height: 11px; margin: auto; margin-top: 25px;"><img src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader-second.gif"></div>');
		$.ajax({
			type: "POST",
			url: "" + pageName,
			data: "birthday-day=" + $('.birthday-day').val() + "&birthday-month=" + $('.birthday-month').val() + "&birthday-year=" + $('.birthday-year').val() + "&gender=" + $('#genderChooser').val() + "&email=" + $('#email').val() + "&password=" + $('#password').val() + "&passwordconf=" + $('#passwordconf').val() + "&look=" + $('#look').val() + "&username=" + $('#username').val(),
			success: function(php){
				$('.errorContainer').html(php);
			}
		});
	}
	
});
</script>

<body onkeydown="onKeyDown()">

<div class="overlowLoadingContainer"></div>

<div class="container">

	<div class="dotsContainer">

		<div class="dots checked"></div>
	
		<div class="dots default"></div>
	
		<div class="dots default"></div>
	
	</div>
	
	<div class="errorContainer"></div>
	
	<div class="inside">
	
		<div class="headerTitle"><?php echo $language['index_register_birthday_and_gender']; ?></div>
		
		<div id="container">
		
			<div class="title"><?php echo $language['index_register_insert_birthday']; ?></div>
			
			<select name="birthday-day" class="birthday-day" style="margin-left: 0;">

				<option value=""><?php echo $language['index_register_day']; ?></option>

				<option <?php if(isset($_POST['birthday-day']) && $core->ExploitRetainer($_POST['birthday-day']) == 1){ echo 'selected'; } ?> value="01">1</option>

				<option <?php if(isset($_POST['birthday-day']) && $core->ExploitRetainer($_POST['birthday-day']) == 2){ echo 'selected'; } ?> value="02">2</option>

				<option <?php if(isset($_POST['birthday-day']) && $core->ExploitRetainer($_POST['birthday-day']) == 3){ echo 'selected'; } ?> value="03">3</option>

				<option <?php if(isset($_POST['birthday-day']) && $core->ExploitRetainer($_POST['birthday-day']) == 4){ echo 'selected'; } ?> value="04">4</option>

				<option <?php if(isset($_POST['birthday-day']) && $core->ExploitRetainer($_POST['birthday-day']) == 5){ echo 'selected'; } ?> value="05">5</option>

				<option <?php if(isset($_POST['birthday-day']) && $core->ExploitRetainer($_POST['birthday-day']) == 6){ echo 'selected'; } ?> value="06">6</option>

				<option <?php if(isset($_POST['birthday-day']) && $core->ExploitRetainer($_POST['birthday-day']) == 7){ echo 'selected'; } ?> value="07">7</option>

				<option <?php if(isset($_POST['birthday-day']) && $core->ExploitRetainer($_POST['birthday-day']) == 8){ echo 'selected'; } ?> value="08">8</option>

				<option <?php if(isset($_POST['birthday-day']) && $core->ExploitRetainer($_POST['birthday-day']) == 9){ echo 'selected'; } ?> value="09">9</option>

				<option <?php if(isset($_POST['birthday-day']) && $core->ExploitRetainer($_POST['birthday-day']) == 10){ echo 'selected'; } ?> value="10">10</option>

				<option <?php if(isset($_POST['birthday-day']) && $core->ExploitRetainer($_POST['birthday-day']) == 11){ echo 'selected'; } ?> value="11">11</option>

				<option <?php if(isset($_POST['birthday-day']) && $core->ExploitRetainer($_POST['birthday-day']) == 12){ echo 'selected'; } ?> value="12">12</option>

				<option <?php if(isset($_POST['birthday-day']) && $core->ExploitRetainer($_POST['birthday-day']) == 13){ echo 'selected'; } ?> value="13">13</option>

				<option <?php if(isset($_POST['birthday-day']) && $core->ExploitRetainer($_POST['birthday-day']) == 14){ echo 'selected'; } ?> value="14">14</option>
	
				<option <?php if(isset($_POST['birthday-day']) && $core->ExploitRetainer($_POST['birthday-day']) == 15){ echo 'selected'; } ?> value="15">15</option>

				<option <?php if(isset($_POST['birthday-day']) && $core->ExploitRetainer($_POST['birthday-day']) == 16){ echo 'selected'; } ?> value="16">16</option>
	
				<option <?php if(isset($_POST['birthday-day']) && $core->ExploitRetainer($_POST['birthday-day']) == 17){ echo 'selected'; } ?> value="17">17</option>

				<option <?php if(isset($_POST['birthday-day']) && $core->ExploitRetainer($_POST['birthday-day']) == 18){ echo 'selected'; } ?> value="18">18</option>

				<option <?php if(isset($_POST['birthday-day']) && $core->ExploitRetainer($_POST['birthday-day']) == 19){ echo 'selected'; } ?> value="19">19</option>

				<option <?php if(isset($_POST['birthday-day']) && $core->ExploitRetainer($_POST['birthday-day']) == 20){ echo 'selected'; } ?> value="20">20</option>

				<option <?php if(isset($_POST['birthday-day']) && $core->ExploitRetainer($_POST['birthday-day']) == 21){ echo 'selected'; } ?> value="21">21</option>

				<option <?php if(isset($_POST['birthday-day']) && $core->ExploitRetainer($_POST['birthday-day']) == 22){ echo 'selected'; } ?> value="22">22</option>

				<option <?php if(isset($_POST['birthday-day']) && $core->ExploitRetainer($_POST['birthday-day']) == 23){ echo 'selected'; } ?> value="23">23</option>

				<option <?php if(isset($_POST['birthday-day']) && $core->ExploitRetainer($_POST['birthday-day']) == 24){ echo 'selected'; } ?> value="24">24</option>

				<option <?php if(isset($_POST['birthday-day']) && $core->ExploitRetainer($_POST['birthday-day']) == 25){ echo 'selected'; } ?> value="25">25</option>

				<option <?php if(isset($_POST['birthday-day']) && $core->ExploitRetainer($_POST['birthday-day']) == 26){ echo 'selected'; } ?> value="26">26</option>

				<option <?php if(isset($_POST['birthday-day']) && $core->ExploitRetainer($_POST['birthday-day']) == 27){ echo 'selected'; } ?> value="27">27</option>

				<option <?php if(isset($_POST['birthday-day']) && $core->ExploitRetainer($_POST['birthday-day']) == 28){ echo 'selected'; } ?> value="28">28</option>

				<option <?php if(isset($_POST['birthday-day']) && $core->ExploitRetainer($_POST['birthday-day']) == 29){ echo 'selected'; } ?> value="29">29</option>

				<option <?php if(isset($_POST['birthday-day']) && $core->ExploitRetainer($_POST['birthday-day']) == 30){ echo 'selected'; } ?> value="30">30</option>

				<option <?php if(isset($_POST['birthday-day']) && $core->ExploitRetainer($_POST['birthday-day']) == 31){ echo 'selected'; } ?> value="31">31</option>

			</select>
			
			<select name="birthday-month" class="birthday-month">

				<option value=""><?php echo $language['index_register_month']; ?></option>

				<option <?php if(isset($_POST['birthday-month']) && $core->ExploitRetainer($_POST['birthday-month']) == 1){ echo 'selected'; } ?> value="01"><?php echo $language['index_register_january']; ?></option>

				<option <?php if(isset($_POST['birthday-month']) && $core->ExploitRetainer($_POST['birthday-month']) == 2){ echo 'selected'; } ?> value="02"><?php echo $language['index_register_february']; ?></option>
				
				<option <?php if(isset($_POST['birthday-month']) && $core->ExploitRetainer($_POST['birthday-month']) == 3){ echo 'selected'; } ?> value="03"><?php echo $language['index_register_march']; ?></option>

				<option <?php if(isset($_POST['birthday-month']) && $core->ExploitRetainer($_POST['birthday-month']) == 4){ echo 'selected'; } ?> value="04"><?php echo $language['index_register_april']; ?></option>

				<option <?php if(isset($_POST['birthday-month']) && $core->ExploitRetainer($_POST['birthday-month']) == 5){ echo 'selected'; } ?> value="05"><?php echo $language['index_register_may']; ?></option>

				<option <?php if(isset($_POST['birthday-month']) && $core->ExploitRetainer($_POST['birthday-month']) == 6){ echo 'selected'; } ?> value="06"><?php echo $language['index_register_june']; ?></option>

				<option <?php if(isset($_POST['birthday-month']) && $core->ExploitRetainer($_POST['birthday-month']) == 7){ echo 'selected'; } ?> value="70"><?php echo $language['index_register_july']; ?></option>

				<option <?php if(isset($_POST['birthday-month']) && $core->ExploitRetainer($_POST['birthday-month']) == 8){ echo 'selected'; } ?> value="08"><?php echo $language['index_register_august']; ?></option>

				<option <?php if(isset($_POST['birthday-month']) && $core->ExploitRetainer($_POST['birthday-month']) == 9){ echo 'selected'; } ?> value="09"><?php echo $language['index_register_september']; ?></option>

				<option <?php if(isset($_POST['birthday-month']) && $core->ExploitRetainer($_POST['birthday-month']) == 10){ echo 'selected'; } ?> value="10"><?php echo $language['index_register_october']; ?></option>

				<option <?php if(isset($_POST['birthday-month']) && $core->ExploitRetainer($_POST['birthday-month']) == 11){ echo 'selected'; } ?> value="11"><?php echo $language['index_register_november']; ?></option>

				<option <?php if(isset($_POST['birthday-month']) && $core->ExploitRetainer($_POST['birthday-month']) == 12){ echo 'selected'; } ?> value="12"><?php echo $language['index_register_december']; ?></option>

			</select>
			
			<select name="birthday-year" class="birthday-year">

				<option value=""><?php echo $language['index_register_year']; ?></option>
                
                <option <?php if(isset($_POST['birthday-year']) && $core->ExploitRetainer($_POST['birthday-year']) == 2013){ echo 'selected'; } ?> value="1999">2013</option>
                <option <?php if(isset($_POST['birthday-year']) && $core->ExploitRetainer($_POST['birthday-year']) == 2012){ echo 'selected'; } ?> value="1999">2012</option>
                <option <?php if(isset($_POST['birthday-year']) && $core->ExploitRetainer($_POST['birthday-year']) == 2011){ echo 'selected'; } ?> value="1999">2011</option>
                <option <?php if(isset($_POST['birthday-year']) && $core->ExploitRetainer($_POST['birthday-year']) == 2010){ echo 'selected'; } ?> value="1999">2010</option>
                <option <?php if(isset($_POST['birthday-year']) && $core->ExploitRetainer($_POST['birthday-year']) == 2009){ echo 'selected'; } ?> value="1999">2009</option>
                <option <?php if(isset($_POST['birthday-year']) && $core->ExploitRetainer($_POST['birthday-year']) == 2008){ echo 'selected'; } ?> value="1999">2008</option>
                <option <?php if(isset($_POST['birthday-year']) && $core->ExploitRetainer($_POST['birthday-year']) == 2007){ echo 'selected'; } ?> value="1999">2007</option>
                <option <?php if(isset($_POST['birthday-year']) && $core->ExploitRetainer($_POST['birthday-year']) == 2006){ echo 'selected'; } ?> value="1999">2006</option>
                <option <?php if(isset($_POST['birthday-year']) && $core->ExploitRetainer($_POST['birthday-year']) == 2005){ echo 'selected'; } ?> value="1999">2005</option>
                <option <?php if(isset($_POST['birthday-year']) && $core->ExploitRetainer($_POST['birthday-year']) == 2004){ echo 'selected'; } ?> value="1999">2004</option>
                <option <?php if(isset($_POST['birthday-year']) && $core->ExploitRetainer($_POST['birthday-year']) == 2003){ echo 'selected'; } ?> value="1999">2003</option>
                <option <?php if(isset($_POST['birthday-year']) && $core->ExploitRetainer($_POST['birthday-year']) == 2002){ echo 'selected'; } ?> value="1999">2002</option>
                <option <?php if(isset($_POST['birthday-year']) && $core->ExploitRetainer($_POST['birthday-year']) == 2001){ echo 'selected'; } ?> value="1999">2001</option>
                <option <?php if(isset($_POST['birthday-year']) && $core->ExploitRetainer($_POST['birthday-year']) == 2000){ echo 'selected'; } ?> value="1999">2000</option>
				<option <?php if(isset($_POST['birthday-year']) && $core->ExploitRetainer($_POST['birthday-year']) == 1999){ echo 'selected'; } ?> value="1999">1999</option>
				<option <?php if(isset($_POST['birthday-year']) && $core->ExploitRetainer($_POST['birthday-year']) == 1998){ echo 'selected'; } ?> value="1998">1998</option>
				<option <?php if(isset($_POST['birthday-year']) && $core->ExploitRetainer($_POST['birthday-year']) == 1997){ echo 'selected'; } ?> value="1997">1997</option>
				<option <?php if(isset($_POST['birthday-year']) && $core->ExploitRetainer($_POST['birthday-year']) == 1996){ echo 'selected'; } ?> value="1996">1996</option>
				<option <?php if(isset($_POST['birthday-year']) && $core->ExploitRetainer($_POST['birthday-year']) == 1995){ echo 'selected'; } ?> value="1995">1995</option>
				<option <?php if(isset($_POST['birthday-year']) && $core->ExploitRetainer($_POST['birthday-year']) == 1994){ echo 'selected'; } ?> value="1994">1994</option>
				<option <?php if(isset($_POST['birthday-year']) && $core->ExploitRetainer($_POST['birthday-year']) == 1993){ echo 'selected'; } ?> value="1993">1993</option>
				<option <?php if(isset($_POST['birthday-year']) && $core->ExploitRetainer($_POST['birthday-year']) == 1992){ echo 'selected'; } ?> value="1992">1992</option>
				<option <?php if(isset($_POST['birthday-year']) && $core->ExploitRetainer($_POST['birthday-year']) == 1991){ echo 'selected'; } ?> value="1991">1991</option>
				<option <?php if(isset($_POST['birthday-year']) && $core->ExploitRetainer($_POST['birthday-year']) == 1990){ echo 'selected'; } ?> value="1990">1990</option>

			</select>
		
		</div>
		
		<div id="line"></div>
		
		<div id="container">
		
			<div class="genderChooserContainer">
		
				<div class="genderChooser <?php if(isset($_POST['gender']) && $core->ExploitRetainer($_POST['gender']) == 'M'){ echo 'selected'; } ?>" id="genderChooserBoy" style="margin-right: 20px;">
			
					<div class="inside">
			
						<div class="bgTop"></div>
						<div class="bgBottom"></div>
					
						<div class="gender-choice">
                            
							<?php echo $language['index_register_boy']; ?> <br> <img src="<?php echo HOST; ?>/web-gallery/general/register/male_sign.png" width="36" height="47">
                   
						</div>
					
					</div>
			
				</div>
			
				<div class="genderChooser <?php if(isset($_POST['gender']) && $core->ExploitRetainer($_POST['gender']) == 'F'){ echo 'selected'; } ?>" id="genderChooserGirl">
						
					<div class="inside">
			
						<div class="bgTop"></div>
						<div class="bgBottom"></div>
					
						<div class="gender-choice">
                            
							<?php echo $language['index_register_girl']; ?> <br> <img src="<?php echo HOST; ?>/web-gallery/general/register/female_sign.png" width="36" height="47">
                   
						</div>
					
					</div>
				
				</div>
				
				<input type="hidden" id="genderChooser" name="gender" value="<?php if(isset($_POST['gender']) && $core->ExploitRetainer($_POST['gender'])){ echo $core->ExploitRetainer($_POST['gender']); } ?>" />

			</div>
		
		</div>
		
		<?php if(isset($_POST['email']) && $core->ExploitRetainer($_POST['email'])){ ?><input type="hidden" id="email" value="<?php echo $core->ExploitRetainer($_POST['email']); ?>"><?php }else{ ?><input type="hidden" id="email" value=""><?php } ?>
		<?php if(isset($_POST['password']) && $core->ExploitRetainer($_POST['password'])){ ?><input type="hidden" id="password" value="<?php echo $core->ExploitRetainer($_POST['password']); ?>"><?php }else{ ?><input type="hidden" id="password" value=""><?php } ?>
		<?php if(isset($_POST['password']) && $core->ExploitRetainer($_POST['passwordconf'])){ ?><input type="hidden" id="passwordconf" value="<?php echo $core->ExploitRetainer($_POST['passwordconf']); ?>"><?php }else{ ?><input type="hidden" id="passwordconf" value=""><?php } ?>
		<?php if(isset($_POST['look']) && $core->ExploitRetainer($_POST['look'])){ ?><input type="hidden" id="look" value="<?php echo $core->ExploitRetainer($_POST['look']); ?>"><?php }else{ ?><input type="hidden" id="look" value=""><?php } ?>
		<?php if(isset($_POST['username']) && $core->ExploitRetainer($_POST['username'])){ ?><input type="hidden" id="username" value="<?php echo $core->ExploitRetainer($_POST['username']); ?>"><?php }else{ ?><input type="hidden" id="username" value=""><?php } ?>
		
		<div id="buttonContainer">
		
			<div onClick="window.location.href='<?php echo HOST; ?>'" id="submitBlack" class="submitLeft"><?php echo $language['stop']; ?></div>
		
			<div id="submitDarkBlue" class="submitRight submitFirstStep"><?php echo $language['next']; ?></div>
		
		</div>
		
	</div>

</div>

</body>

</html>