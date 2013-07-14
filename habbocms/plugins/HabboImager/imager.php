<?php
 if(isset($_GET['user'])) {
 	$user_id = $users->username2id(username_filter($_GET['user']));
 	if($user_id) {
 		$_GET['figure'] = $users->data('look', $user_id);
 	}
 }
 
 unset($_GET['user']);

 header('Location: http://www.habbo.nl/habbo-imaging/avatarimage?'.http_build_query($_GET));
 exit;

 foreach($_GET as $name => $value) {
 	$_GET[$name] = username_filter($value);
 }

 $type = 'png';
 $path = $plugins->filter($plugins->settings['habboimager']['path']) . 'avatars/';
 $user_id = (isset($_GET['user']))?$GLOBALS['identity']->username2id(username_filter($_GET['user'])):false;
 $motto = false;
 if($user_id) {
   $_GET['figure'] = $GLOBALS['identity']->data('look', $user_id);
   $motto = $GLOBALS['identity']->data('motto', $user_id);
 }
 unset($_GET['user']);
 
 $file = $path . http_build_query($_GET) . '.png';
 if(!file_exists($file)) {
 	$data = $core->url('http://www.habbo.nl/habbo-imaging/avatarimage?'.http_build_query($_GET));
 	file_put_contents($file, $data);
 }

 if($motto == "I'm new at Habmi!") {$data = file_get_contents($path . 'newbie.gif');$type='gif';}
 if($motto == "I love Micheal Jackson!") $data = file_get_contents($path . 'jackson.png');
 if($motto == "I'm a HabQueen.") {$data = file_get_contents($path . 'diva.gif');$type='gif';}

 header('Content-Type: image/' . $type);
 die((isset($data))?$data:file_get_contents($file));
?>