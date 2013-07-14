<?php
/*
?>

<script>
$(document).ready(function() {
    
	$("#onclickOpenAddUser").click(function () {
		$("#overlowAddUser").fadeIn("slow");
	});
	
	$("#onclickCloseAddUser").click(function () {
		$("#overlowAddUser").fadeOut("slow");
	});
	
	$('.addUserRegisterSubmit').click(function() { 
		LoadChatSubmit('<?php echo HOST; ?>/add/user/check');
	});

	function LoadChatSubmit(pageName) {
		$('.addUserErrorContainer').html('<div style="width: 46px height: 11px; margin: 190px; margin-top: 22px; margin-bottom: -22px;"><img src="<?php echo HOST; ?>/web-gallery/icons/ajax-loader.gif"></div>');
		$.ajax({
			type: "POST",
			url: "" + pageName,
			data: "user=" + $('.regFieldUser').val() + "&mail=" + $('.regFieldMail').val() + "&pass=" + $('.regFieldPass').val() + "&date=" + $('.regFieldDate').val() + "&code=" + $('.regFieldCode').val() + "&user_bind_id=" + $('.regFieldUser_Bind_Id').val() + "&terms=" + $('.regFieldTerms').val(),
			success: function(php){
				$('.addUserErrorContainer').html(php);
			}
		});
	}
	
	EnableSubmit = function(val)
	{
		var submit = document.getElementById("submitBlue");

		if (val.checked == true)
		{
			submit.disabled = false;
		}
		else
		{
			submit.disabled = true;
		}
	} 

});
</script>

<style type="text/css">
.containerFirst {
	float: left;
	opacity: 1;
	width: 760px;
}

.containerSecond {
	float: left;
	margin-top: -500px;
	opacity: 0;
	width: 760px;
}

.containerPlacesLeft {
	width: 370px;
	float: left;
}

.containerPlacesRight {
	width: 370px;
	float: right;
}

label {
	font-size: 1.8em;
	font-weight: bold;
	margin: 0;
	text-shadow: 1.5px 1.5px 1.5px rgba(225, 225, 225, 0.9);
	color: #454545;
}

.insideContainer  p {
	padding: 0;
	margin: 0;
	font-size: 0.60em;
	margin: 0;
	text-shadow: 1.5px 1.5px 1.5px rgba(225, 225, 225, 0.9);
	color: #636363;
}

.overlowContainer p {
	font-size: 10px;
}
</style>

<div class="overlowContainer" id="overlowAddUser">

	<div class="overlowLoadingContainer"></div>

	<div class="container" style="width: 431px; max-height: 500px; overflow-y: auto; overflow-x: hidden; display: block;">
		
		<div class="top"></div>
		
		<div id="onclickCloseAddUser" class="closeButton"></div>
		
		<div class="text" style="display: table;">
		
				<div class="containerFirst">
                    
                    <a class="overlowButton addUserRegisterSubmit" style="float: left; text-shadow: none; margin-top: -30px; margin-right: 20px;">
                    
                		<b><u class="overlowButtonText" style="">
                        
                    		<i><ubuntu><?php echo $language['index_register_title']; ?></ubuntu></i>
                        
                		</u></b>
                            
                		<div></div>
                        
            		</a>
			
					<div class="containerPlacesLeft">
					
						<div class="addUserErrorContainer" style="display: table;"></div>
		
						<div class="insideContainer space">
			
							<label><?php echo $language['index_register_username']; ?></label>
							<br>
							<input type="text" name="user" class="regField  regFieldUser" value="">
							<p><?php echo $language['index_register_username_second']; ?></p>
							
							<input type="hidden" name="mail" class="regField regFieldMail" value="<?php echo $core->ExploitRetainer($users->UserInfo($username, 'mail')); ?>">
							
							<input type="hidden" name="pass" class="regField regFieldPass" value="<?php echo $core->ExploitRetainer($users->UserInfo($username, 'password')); ?>">
							
							<input type="hidden" name="date" class="regField regFieldDate" value="<?php echo $core->ExploitRetainer($users->UserInfo($username, 'date')); ?>">
							
							<input type="hidden" name="code" class="regField regFieldCode" value="<?php echo $core->ExploitRetainer($users->UserInfo($username, 'code')); ?>">
							
							<input type="hidden" name="user_bind_id" class="regField regFieldUser_Bind_Id" value="<?php echo $core->ExploitRetainer($users->UserInfo($username, 'user_bind_id')); ?>">
							
							<div class="optionOverlow"><input type="checkbox" style="margin-top: 10px; margin-left: -2px; margin-right: 5px;" name="terms" class="regFieldTerms" onClick="EnableSubmit(this)" value="checked"/> <div class="radioSpace" style="margin-top: 5px; padding-top: 0px;"><?php echo $language['index_register_terms']; ?></div></div>

						
						</div>
				
					</div>
			
				</div>
			
			
				
		</div>
		
		<div class="bottom"></div>
		
	</div>

</div>
*/ ?>