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
$(document).ready(function() {

	$('.SubmitPoll').click(function() { 
		$('.overlowPostPollVoteLoading').fadeIn('slow');
	});

}); 
</script>

<div id="pollTopUrl"></div>

<div style="width: 260px;">

<?php 
$queryPollIps = mysql_query("SELECT * FROM cms_poll_ips WHERE ip = '".$_SERVER['REMOTE_ADDR']."'");

$pollIps = mysql_num_rows($queryPollIps);

if($core->ExploitRetainer($core->Poll('voteOne')) || $core->ExploitRetainer($core->Poll('voteTwo')) > 1){
	$totalVotes = $core->ExploitRetainer($core->Poll('voteOne')) + $core->ExploitRetainer($core->Poll('voteTwo'));
	$votesOne = $core->ExploitRetainer($core->Poll('voteOne')) * 100 / $totalVotes;
	$votesOne = floor($votesOne);
	$votesTwo = $core->ExploitRetainer($core->Poll('voteTwo')) * 100 / $totalVotes;
	$votesTwo = floor($votesTwo);
}

if($pollIps > 0){ 
?>

	<b><?php echo $core->ExploitRetainer($core->Poll('question')); ?></b>

	<div class="pollOverlow space">
	
		<?php echo $core->ExploitRetainer($core->Poll('answerOne')); ?><br>
		
		<div class="pollPrecentageBG"><div class="precentage" style="width:<?php echo $votesOne; ?>%;"><div style="padding-left: 3px;"><?php echo $votesOne; ?>%</div></div></div>
		
	</div>
	
	<div class="pollOverlow space">
	
		<?php echo $core->ExploitRetainer($core->Poll('answerTwo')); ?><br>
		
		<div class="pollPrecentageBG"><div class="precentage" style="width:<?php echo $votesTwo; ?>%;"><div style="padding-left: 3px;"><?php echo $votesTwo; ?>%</div></div></div>
	
	</div>
    
    <div style="font-size: 10px; font-style: italic; text-align: center;"><?php echo $totalVotes; ?> keren gestemt.</div>

<?php }else{ ?>

	<form method="post" id="activatePollForm" action="<?php echo HOST; ?>/poll/vote">
	
		<b><?php echo $core->ExploitRetainer($core->Poll('question')); ?></b>
	
		<div class="pollOverlow space">
		
			<div class="optionOverlow"><input type="radio" name="pollVote" id="pollVoteChoose" value="One"><div class="radioSpace"><?php echo $core->ExploitRetainer($core->Poll('answerOne')); ?></div></div>
			
		</div>
		
		<div class="pollOverlow space">
		
			<div class="optionOverlow"><input type="radio" name="pollVote" id="pollVoteChoose" value="Two"><div class="radioSpace"><?php echo $core->ExploitRetainer($core->Poll('answerTwo')); ?></div></div>
		
		</div>
	
		<input type="hidden" name="pollIpAdres" id="pollIpAdres" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
		
		<input type="hidden" name="pollAdresLocalLink" value="<?php echo HOST; ?><?php echo SUBLINK; ?>">
		
		<input type="submit" style="margin-top: 5px;" id="submitBlack" class="submitRight SubmitPoll" value="<?php echo $language['vote']; ?>">
		
	</form>

<?php } ?>

</div>