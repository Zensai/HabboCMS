<?php
 $page = ASEPAGE;
 if(!file_exists(P . 'plugins/habboase/navigation.php')) die("navigation.php was not found.");
 $time = explode(' ', microtime());
 $start = $time[1] + $time[0];
 $ASE['pages'] = array(
   //cant be null
   'dash' => array('Dashboard', 'ase_access'),
   'error' => array('Not found', 'ase_access'),
   'forbidden' => array('Access forbidden', 'ase_access'),
   'users/lookup' => array('Lookup user', 'ase_users_lookup'),
   'users/edit' => array('Edit user', 'ase_users_edit'),
   'users/givebadge' => array('Give badge', 'ase_users_givebadge'),
   'users/bans' => array('Ban', 'ase_users_ban'),
   'users/bans/new' => array('New ban', 'ase_users_ban'),
   'users/bans/lookup' => array('Ban info', 'ase_users_ban'),
   'users/login' => array('Login as', 'ase_users_fakelogin'),
   'values/new' => array('New furni', 'ase_website_values'),
   'values/new_category' => array('New category', 'ase_website_values'),
   'values/list' => array('Furni list', 'ase_website_values'),
   'values/edit' => array('Edit furni', 'ase_website_values'),
   'campains/new' => array('New campain', 'ase_website_campains'),
   'campains/list' => array('Campains', 'ase_website_campains'),
   'campains/edit' => array('Edit campain', 'ase_website_campains'),
   'website/statics' => array('Statistics', 'ase_website_stats'),
   'website/newsletter' => array('Newsletter', 'ase_website_newsletter'),
   'catalogue/list' => array('Catalogue', 'ase_hotel_catalogue'),
   'catalogue/edit' => array('Catalogue', 'ase_hotel_catalogue'),
   'catalogue/add' => array('Catalogue', 'ase_hotel_catalogue'),
   'hotel/motd' => array('MOTD', 'ase_hotel_motd'),
   'hotel/ha' => array('Hotelalert', 'ase_hotel_ha'),
   'hotel/sa' => array('Staffalert', 'ase_hotel_sa'),
   'tools/vnc' => array('VNC', 'ase_hotel_vnc'),
   'tools/status' => array('Status', 'ase_access'),
   'tools/webmail' => array('Webmail', 'ase_access'),
   'values/new' => array('New furni', 'ase_website_values'),
   'values/new_category' => array('New category', 'ase_website_values'),
   'values/list' => array('Furni list', 'ase_website_values'),
   'values/edit' => array('Edit furni', 'ase_website_values'),
 );

 if(isset($ASE['pages'][$page][0], $ASE['pages'][$page][1]) && file_exists(P . 'plugins/habboase/' . 'pages/' . $page . '.php')) {
   if(!$core->permission($ASE['pages'][$page][1])) $page = 'forbidden';
 } else $page = 'error';

 ob_start();
 require P . 'plugins/habboase/navigation.php';
 $navigation = ob_get_clean();
?><!DOCTYPE html>
<html>
<head>
    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <!-- End of Meta -->
    
    <!-- Page title -->
    <title>ASE ~ <?php echo $ASE['pages'][$page][0]; ?></title>
    <!-- End of Page title -->
    
    <!-- Libraries -->
    <link type="text/css" href="<?php echo MEDIA; ?>css/layout.css" rel="stylesheet" /> 
    
    <script type="text/javascript" src="<?php echo MEDIA; ?>js/jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="<?php echo MEDIA; ?>js/easyTooltip.js"></script>
    <script type="text/javascript" src="<?php echo MEDIA; ?>js/jquery-ui-1.7.2.custom.min.js"></script>
    <script type="text/javascript" src="<?php echo MEDIA; ?>js/jquery.wysiwyg.js"></script>
    <script type="text/javascript" src="<?php echo MEDIA; ?>js/hoverIntent.js"></script>
    <script type="text/javascript" src="<?php echo MEDIA; ?>js/superfish.js"></script>
    <script type="text/javascript" src="<?php echo MEDIA; ?>js/custom.js"></script>
    <!-- End of Libraries --> 
  </head>
  <body>
    <!-- Container -->
    <div id="container">
    
      <!-- Header -->
      <div id="header">
        
        <!-- Top -->
        <div id="top">
          <!-- Logo -->
          <div class="logo"> 
            <a href="#" title="Administration Home" class="tooltip"><img src="<?php echo MEDIA; ?>assets/logo.png" alt="Wide Admin" /></a> 
          </div>
          <!-- End of Logo -->
          
          <!-- Meta information -->
          <div class="meta">
            <p>Welcome, <?php echo $users->data('username'); ?>! <a href="#" title="1 new private message from Elaine!" class="tooltip">1 new message!</a></p>
            <ul>
              <li><a href="#" title="End administrator session" class="tooltip"><span class="ui-icon ui-icon-power"></span>Logout</a></li>
              <li><a href="#" title="Change current settings" class="tooltip"><span class="ui-icon ui-icon-wrench"></span>Settings</a></li>
              <li><a href="#" title="Go to your account" class="tooltip"><span class="ui-icon ui-icon-person"></span>My account</a></li>
            </ul> 
          </div>
          <!-- End of Meta information -->
        </div>
        <!-- End of Top-->
      
        <!-- The navigation bar -->
        <div id="navbar">
          <ul class="nav">
            <?php echo $navigation; ?>
          </ul>
        </div>
        <!-- End of navigation bar" -->
        
        <!-- Search bar -->
        <div id="search">
          <form action="" method="POST">
            <p>
              <input type="submit" value="" class="but" />
              <input type="text" name="q" value="Search the admin panel" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />
            </p>
          </form>
        </div>
        <!-- End of Search bar -->
      
      </div>
      <!-- End of Header -->
      
      <!-- Background wrapper -->
      <div id="bgwrap">
    
        <!-- Main Content -->
        <div id="content">
          <div id="main">
            <?php require P . 'plugins/habboase/' . 'pages/' . $page . '.php'; ?>
          </div>
        </div>
        <!-- End of Main Content -->
        
        <!-- Sidebar -->
        <div id="sidebar">
        
          <h2>Staff notes</h2>
          <!-- Accordion -->
          <div id="accordion">
            <div>
              <h3><a href="#" title="First slide" class="tooltip">First</a></h3>
              <div>Praesent augue urna, vehicula sed sollicitudin quis, dignissim nec est. Quisque dignissim lorem at metus vehicula ut feugiat eros vestibulum. Suspendisse ultrices, massa luctus aliquam faucibus, sem quam fermentum nisl, non posuere quam nunc vel tellus.</div>
            </div>
            <div>
              <h3><a href="#" title="Second slide" class="tooltip">Second</a></h3>
              <div>Sed sem elit, porttitor quis vestibulum ut, euismod id purus. Praesent vulputate dolor vel nisi mattis sollicitudin. Curabitur placerat quam at sem tempor ac sodales nunc dapibus. Nullam mi purus, adipiscing in facilisis sed, posuere ut ipsum.</div>
            </div>
            <div>
              <h3><a href="#" title="Third slide" class="tooltip">Third</a></h3>
              <div>Praesent augue urna, vehicula sed sollicitudin quis, dignissim nec est. Quisque dignissim lorem at metus vehicula ut feugiat eros vestibulum. Suspendisse ultrices, massa luctus aliquam faucibus, sem quam fermentum nisl, non posuere quam nunc vel tellus.</div>
            </div>
          </div>
          <!-- End of Accordion-->
        
          <!-- Sortable Dialogs -->
          <h2>Notifications</h2>
          <div class="sort">
            <div class="box ui-widget ui-widget-content ui-corner-all portlet">
            <div class="portlet-header">Sortable 1</div>
              <div class="portlet-content">
                <p>This is a sortable dialog. Praesent augue urna, vehicula sed sollicitudin quis, dignissim nec est.</p>
              </div>
            </div>
            
            <div class="box ui-widget ui-widget-content ui-corner-all portlet">
              <div class="portlet-header">Sortable 2</div>
              <div class="portlet-content">
                <p>This is a sortable dialog. Praesent augue urna, vehicula sed sollicitudin quis, dignissim nec est.</p>
              </div>
            </div>
            
            <div class="box ui-widget ui-widget-content ui-corner-all portlet">
              <div class="portlet-header">Sortable 3</div>
              <div class="portlet-content">
                <p>This is a sortable dialog. Praesent augue urna, vehicula sed sollicitudin quis, dignissim nec est.</p>
              </div>
            </div>
          </div>
          <!-- End of Sortable Dialogs -->
          
          <!-- Lists -->
          <h2>Lists / Navigation</h2>
          <ul>
            <?php echo $navigation; ?>
          </ul>
          <!-- End of Lists -->
          
          <!-- Statistics -->
          <h2>Quick Statistics</h2>
          <p><b>Users online:</b> <?php echo $sql->result("SELECT users_online FROM server_status"); ?></p>
          <p><b>Rooms loaded:</b> <?php echo $sql->result("SELECT rooms_loaded FROM server_status"); ?></p>
          <p><b>Users registred:</b> <?php echo $sql->result("SELECT COUNT(*) FROM users"); ?></p>
          <!-- End of Statistics -->
        
        </div>
        <!-- End of Sidebar -->
        
      </div>
      <!-- End of bgwrap -->
    </div>
    <!-- End of Container -->
    
    <!-- Footer -->
    <div id="footer">
      <p class="mid">
        <a href="#" title="Top" class="tooltip">Top</a>&middot;<a href="#" title="Main Page" class="tooltip">Home</a>&middot;<a href="#" title="Change current settings" class="tooltip">Settings</a>&middot;<a href="#" title="End administrator session" class="tooltip">Logout</a>
      </p>
      <p class="mid">
        <!-- Change this to your own once purchased -->
        &copy; Wide Admin 2010. All rights reserved.
        <!-- -->
      </p>
    </div>
    <!-- End of Footer -->


  </body>
</html>