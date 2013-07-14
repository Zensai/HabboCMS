<?php
  define('PARENT', '1');
  define('CHILD', '8');

  $core->requireLogin();
  $profile = $lang->addTranslation("profile");
  if(isset($_GET['tab']) && is_numeric($_GET['tab']) && $_GET['tab'] <= (($core->settings->facebook != '0')?5:4) && $_GET['tab'] >= 1) define('TAB', $_GET['tab']); else define('TAB', 1);
  $html->setKey(array(
    'body_extra' => ' id="profile"',
    'motto' => '',
  ));

 $skin->install($profile->loc['profile.pagetitle'], 'profile', true);
?>

<div id="container">
	<div id="content" style="position: relative" class="clearfix">
    <div>

<div class="content">
<div class="habblet-container" style="float:left; width:210px;">
<div class="cbb settings">

<h2 class="title"><?php echo $profile->loc['profile.header}</h2>
<div class="box-content">
            <div id="settingsNavigation">
            <ul>
              <?php
                  echo '<li'.((TAB==1)?' class="selected">' . $profile->loc['profile.preferences']:"><a href='{www}/profile?tab=1'>" . $profile->loc['profile.preferences'] . "</a>").'</li>';
                  echo '<li'.((TAB==2)?' class="selected">' . $profile->loc['profile.personalfeeds']:"><a href='{www}/profile?tab=2'>" . $profile->loc['profile.personalfeeds'] . "</a>").'</li>';
                  echo '<li'.((TAB==3)?' class="selected">' . $profile->loc['profile.friendmanagement']:"><a href='{www}/profile?tab=3'>" . $profile->loc['profile.friendmanagement'] . "</a>").'</li>';
                  echo '<li'.((TAB==4)?' class="selected">' . $profile->loc['profile.identitysettings']:"><a href='{www}/profile?tab=4'>" . $profile->loc['profile.identitysettings'] . "</a>").'</li>';
                  if($core->settings->facebook != '0') echo '<li'.((TAB==5)?' class="selected">' . $profile->loc['profile.facebooksettings']:"><a href='{www}/profile?tab=5'>" . $profile->loc['profile.facebooksettings'] . "</a>").'</li>';
              ?>
            </ul>
            </div>
</div></div>
</div>
    <div class="habblet-container " style="float:left; width: 560px;">
        <div class="cbb clearfix settings">
            <h2 class="title"><?php echo $profile->loc['profile.tabheader' . TAB]; ?></h2>
            <div class="box-content">
            <?php require $skin->widget('profile' . TAB); ?>
            <script type="text/javascript">
            $("profileForm-submit").observe("click", function(e) { e.stop(); $("profileForm").submit(); });
            $("profileForm-submit").show();
            </script>

            </div>
         </div>
     </div>
  </div></div>
</div>
<?php require $skin->widget('footer'); ?>
