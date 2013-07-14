<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/nb_NO/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<img src='http://www.jobmedicaldoctor.com/images/facebook.gif'><br />
<div class="fb-like" data-href="http://facebook/HabboVC" data-send="true" data-layout="button_count" data-width="450" data-show-faces="false" data-font="trebuchet ms" style="margin-top: 5px; margin-bottom: 5px"></div>
<?php
  if(false) {
    $i = 0;  
  	$content = '';
  	$continue = true;
  	$result = $sql->query("SELECT * FROM habbocms_poll WHERE active = '1'");
  	$activequestion = ($sql->count($result, false) > 0)?$sql->result("SELECT id FROM habbocms_poll WHERE active = '1'"):false;
  	if($activequestion) {
      function has_answered($question) {
  	    global $sql;
  	    $count = $sql->count("SELECT id FROM habbocms_poll_results WHERE poll_id = '" . $question . "' AND identity = '" . IDENTITY . "'");
  	    if($count > 0) return true;
  	    return false;
      }  
      
      if(isset($_GET['answer']) && is_numeric($_GET['answer']) && !has_answered($activequestion)) {
      	$answer = $_GET['answer'];
      	$answer_result = $sql->query("SELECT * FROM habbocms_poll_answers WHERE id = '" . $answer . "'");
      	if($sql->count($answer_result, false) > 0) {
      	  $info = $sql->fetch($answer_result);
      	  if($info['parent'] == $activequestion) {
      	  	$insert = $sql->query("INSERT INTO habbocms_poll_results (poll_id,identity,answer) VALUES ('" . $activequestion . "','" . IDENTITY . "','" . $answer . "')");
      	  	if($insert) $content .= 'Thanks for voting!<br />'; else $core->error(mysql_error(), 'E_FATAL');
      	  } //else echo "Not right property";
      	} //else echo "Negative";
      }

      if(has_answered($activequestion)) {
      	$content .= '
      	<style>
			#loadingbar {
			  background-color: black;
			  border-radius: 4px;
			  padding: 3px;
			  height: 15px;
			  margin-bottom: 3px;
			}

			#loadingbar div {
			   background-color: orange;
			   height: 15px;
			   width: 100%;
			   border-radius: 4px;
			   font-style: italic;
			   padding-left: 2px;
			}
      	</style>

      	<b>' . $sql->result("SELECT question FROM habbocms_poll WHERE id = '" . $activequestion . "'") . '</b><br />';
      	$current_answer = $sql->result("SELECT answer FROM habbocms_poll_results WHERE identity = '" . IDENTITY . "' AND poll_id = '" . $activequestion . "'");
      	$alternatives = $sql->query("SELECT * FROM habbocms_poll_answers WHERE parent = '" . $activequestion . "'");
		while($row = $sql->fetch($alternatives)) {
		  $i++;
		  $percent = $sql->count("SELECT * FROM habbocms_poll_results WHERE answer = '" . $row['id'] . "'") / $sql->count("SELECT * FROM habbocms_poll_results WHERE poll_id = '" . $activequestion . "'") * 100;
		  $content .= '<b>' . $i . '.</b> ' . (($current_answer == $row['id'])?'<b><i>':'') . $row["alternative"] . (($current_answer == $row['id'])?'</i></b>':'') . '</b><div id="loadingbar"><div style="width: ' . $percent . '%">' . round($percent) . '%</div></div>';
		}

      }	else {
      	$info = $sql->fetch($result);
      	$content .= "<b>" . $info['question']  . "</b><br /><form action='' method='GET'>";
		$alternatives = $sql->query("SELECT * FROM habbocms_poll_answers WHERE parent = '" . $activequestion . "'");
		while($row = $sql->fetch($alternatives)) {
			$checked = ($i == 0)?' checked="checked"':'';
			$content .= '<input type="radio" name="answer" value="' . $row["id"] . '"' . $checked . '> ' . $row["alternative"] . '<br>';
			$i++;
		}
		$content .= '<input type="submit" value="Submit"></form>';
      }

      echo '
      <div class="habblet-container">		
		<div class="cbb clearfix red"> 
			<h2 class="title">Question</h2>
			<div class="box-content">
			' . $content . '
			</div>
		</div>
	  </div>';
  	}
  }
?>