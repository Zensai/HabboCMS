<div id="overlay"></div>

<?php $this->widget('recoveraccount'); ?>
<div id="header-container">
	<div id="header" class="clearfix">
		<h1><a href="{www}/"></a></h1>
<div id="subnavi">
    <div id="subnavi-user">
        <div class="clearfix">&nbsp;</div>
        <p>
                <a href="{www}/login_popup" id="enter-hotel-open-medium-link">Enter {fullname}</a>
        </p>
    </div>

    <div id="subnavi-login">
        <form action="{www}/account/submit" method="post" id="login-form">
            <input type="hidden" name="page" value="<?php echo PAGE; ?>" />
            <ul>
                <li>
                    <label for="login-username" class="login-text"><b>Email</b></label>
                    <input tabindex="1" type="text" class="login-field" name="credentials.username" id="login-username" />
                    <a href="#" id="login-submit-new-button" class="new-button" style="float: left; display:none"><b>Login</b><i></i></a>
                    <input type="submit" id="login-submit-button" value="Login" class="submit"/>
                </li>
                <li>
                    <label for="login-password" class="login-text"><b>Password</b></label>
                    <input tabindex="2" type="password" class="login-field" name="credentials.password" id="login-password" />
                    <input tabindex="3" type="checkbox" name="_login_remember_me" value="true" id="login-remember-me" />
                    <label for="login-remember-me" class="left">Keep me logged in</label>
                </li>
            </ul>
        </form>
        <div id="subnavi-login-help" class="clearfix">
            <ul>
                <li class="register"><a href="{www}/index?forgot=true" id="forgot-password"><span>Forgot your password?</span></a></li>
                <li><a href="{www}/quickregister/start"><span>Register for free</span></a></li>
            </ul>
        </div>
<div id="remember-me-notification" class="bottom-bubble" style="display:none;">
	<div class="bottom-bubble-t"><div></div></div>
	<div class="bottom-bubble-c">
            By selecting this you will stay logged in to {sitename}, until you &quot;Log out&quot;.
	</div>
	<div class="bottom-bubble-b"><div></div></div>
</div>
    </div>
</div>
<script type="text/javascript">
    LoginFormUI.init();
    RememberMeUI.init("right");
</script>
<ul id="navi">
<?php
  $result = $sql->query("SELECT * FROM habbocms_navi WHERE parent_id = '-1' AND active = '1' OR active = '3' ORDER BY position ASC");
  $class = ' class="';
  $id = '';
  $strong = '';
  $strong2 = '';
  while ($row = $sql->fetch($result)) {
    if (PARENT == $row['id'] && !defined('DONOTDISPLAY_PARRENT')) {
       $class .= ' selected';
       $value = $row['value'] . "\n";
       $strong = "<strong>\n";
       $strong2 = "</strong>\n";
    } else
          $value = "<a href=\"" . $row['link'] . (($row['target'] != '')?'" target="' . $row["target"] . '"':'"') . ">" . $row['value'] . "</a>";
    if($row['class_id'] != '') $id = ' id="' . $row['class_id'] . '"';
    if($row['class'] != '') $class .= ' ' . $row['class'];
    $class .= '"';

    echo "<li" . $id . $class . ">\n";
    echo $strong;
    echo $value;
    echo $strong2;
    echo "<span></span>\n</li>\n";
    $class = ' class="';
    $id = '';
    $strong = '';
    $strong2 = '';
  }
?>
</ul>

        <div id="habbos-online"><div class="rounded"><span>{onlinecnt} {sitename}s online</span></div></div>
	</div>
</div>

<div id="content-container">
<?php if(CHILD != '0') {?>
<div id="navi2-container" class="pngbg">
    <div id="navi2" class="pngbg clearfix">
	<ul>
<?php
  $result = $sql->query("SELECT * FROM habbocms_navi WHERE parent_id = '" . PARENT . "' AND active NOT LIKE '%0%' ORDER BY position ASC");
  $cnt = $sql->count("SELECT * FROM habbocms_navi WHERE parent_id = '" . PARENT . "' AND active = '3' ORDER BY position ASC");
  $cnt = $sql->count($result, false) - $cnt - 2;
  $i = 0;
  $class = '';
  $show = false;
  while ($row = $sql->fetch($result)) {
    if($row['active'] == '1' || $row['active'] == '2') $show = true;
    if (CHILD == $row['id']) {
        $value = $row['value'];
        $class = 'selected';
    } else
        $value = "<a href=\"" . $row['link'] . (($row['target'] != '')?'" target="' . $row["target"] . '"':'"') . ">" . $row['value'] . "</a>";
    if ($i>$cnt) {
      $class .= ' last';
    }
    if($show) {
      echo "<li class=\"" . $class . "\">\n";
      echo $value. "\n";
      echo "</li>\n";
    }
    $class = '';
    $show = false;
    $i++;
  }
?>
	</ul>
    </div>
</div><?php } ?>