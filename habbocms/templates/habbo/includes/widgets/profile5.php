            <div id="fb-root"></div>
            <script type="text/javascript">
                window.fbAsyncInit = function() {
                    Cookie.erase("fbsr_<?php echo $core->settings->facebook; ?>");
                    FB.init({appId: '<?php echo $core->settings->facebook; ?>', status: true, cookie: true, xfbml: true});
                    $(document).fire("fbevents:scriptLoaded");

                };
                window.assistedLogin = function(FBobject, optresponse) {
                    
                    Cookie.erase("fbsr_<?php echo $core->settings->facebook; ?>");
                    FBobject.init({appId: '<?php echo $core->settings->facebook; ?>', status: true, cookie: true, xfbml: true});

                    permissions = 'user_birthday,email';
                    defaultAction = function(response) {

                        if (response.authResponse) {
                            fbConnectUrl = "/quickregister/facebook?connect=true";
                            Cookie.erase("fbhb_val_<?php echo $core->settings->facebook; ?>");
                            Cookie.set("fbhb_val_<?php echo $core->settings->facebook; ?>", response.authResponse.accessToken);
                            Cookie.erase("fbhb_expr_<?php echo $core->settings->facebook; ?>");
                            Cookie.set("fbhb_expr_<?php echo $core->settings->facebook; ?>", response.authResponse.expiresIn);
                            window.location.replace(fbConnectUrl);
                        }
                    };

                    if (typeof optresponse == 'undefined')
                        FBobject.login(defaultAction, {scope:permissions});
                    else
                        FBobject.login(optresponse, {scope:permissions});

                };

                (function() {
                    var e = document.createElement('script');
                    e.async = true;
                    e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
                    document.getElementById('fb-root').appendChild(e);
                }());
            </script>
<?php
  $core->requireLogin();

  $error = false;
  $facebook = $core->InstallFacebook();
  $user = $facebook->getUser();
  if($user) {
    try {
      $user_profile = $facebook->api('/me');
    } catch (FacebookApiException $e) {
      error_log($e);
      $error = $e;
      echo $e;
    }
  } else {
    $loginUrl = $facebook->getLoginUrl(array(
                'scope' => 'email',
                'redirect_uri' => 'http://localhost/profile?tab=5'
                ));
    header('Location: ' . $loginUrl);
    exit;
  }
  $id = $users->facebook2user($user_profile['id']);
  if($error != false) {
    echo "<div class=\"rounded rounded-red\">An error occured reading your facebook data, please try agian.</div> <!-- Developer information: " . $e . " -->";
  } elseif($id == IDENTITY) {
    if(isset($_GET['delete'])) {
      $result = $sql->query("DELETE FROM habbocms_facebook WHERE facebook_id = '" . $user_profile['id'] . "' LIMIT 1");
      if($result) {
        header("Location: " . WWW . "/profile?tab=5&deleted");
        exit;
      } else echo '<div class="rounded rounded-red">An error occured while deleting your facebook link.</div> <!-- Developer info: ' . mysql_error() . ' -->';
    }
    echo "<div>
    " . ((isset($_GET['connected']))?'<div class="rounded rounded-green">Congratulasions! Your facebook is now connected with this account.</div>':'') . "
   <div style='float: left; margin: 5px'><img src='http://graph.facebook.com/" . $user_profile['id'] . "/picture?type=square' /></div>
   <div style='margin-top: 5px'>This account is connected to your facebook account (<b>" . $user_profile['name'] . "</b>)!<br>
            <a href=\"" . WWW . "/profile?tab=5&delete\" class=\"fb_button fb_button_large\" style=\"margin-top: 3px\">
                <span class=\"fb_button_text\">Delete connection</span>
            </a></div>
  </div>";
  } elseif($sql->count("SELECT * FROM habbocms_facebook WHERE user_id = '" . IDENTITY . "' AND facebook_id != '" . $user_profile['id'] . "' ") > 0) {
    $otherid = $sql->result("SELECT facebook_id FROM habbocms_facebook WHERE user_id = '" . IDENTITY . "' LIMIT 1");
    echo "   
    <div style='float: left; margin: 5px'><img src='http://graph.facebook.com/" . $user_profile['id'] . "/picture?type=square' /></div>
    <div style='margin-top: 5px'>You are logged into a diffrent facebook account (<b>" . $user_profile['name'] . "</b>) than your registred facebook account (<b>" . json_decode(file_get_contents('http://graph.facebook.com/' . $otherid))->name . "</b>), please login to your correct facebook account to manage the connection.</div>
    ";
  } elseif($id) {
    echo '<div>Your facebook allready have a connection to an ' . SITENAME . ' account! Please delete the connection from your user <b>' . $users->data('username', $id) . '</b> to connect this account.</div>';
  } else {
    if(isset($_GET['connect'])) {
      $result = $sql->query("INSERT INTO habbocms_facebook (facebook_id,user_id) VALUES ('" . $user_profile['id'] . "','" . IDENTITY . "')");
      if($result) {
        header("Location: " . WWW . "/profile?tab=5&connected");
        exit;
      } else echo '<div class="rounded rounded-red">An error occured while updateing your facebook link.</div> <!-- Developer info: ' . mysql_error() . ' -->';
    }
    echo "
    " . ((isset($_GET['deleted']))?'<div class="rounded rounded-green">Your facebook link has been deleted.</div>':'') . "
   <div style='float: left; margin: 5px'><img src='http://graph.facebook.com/" . $user_profile['id'] . "/picture?type=square' /></div>
   <div style='margin-top: 5px'>You haven't connected your facebook to " . SITENAME . " yet! You can do so under.<br>
            <a href=\"" . WWW . "/profile?tab=5&connect\" class=\"fb_button fb_button_large\" style=\"margin-top: 3px\">
                <span class=\"fb_button_text\">Connect this account</span>
            </a></div>

    ";
  }
?>