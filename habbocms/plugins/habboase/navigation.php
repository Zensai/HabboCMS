<?php 
 echo "<li><a href='" . ASE . "dash'>Dashboard</a></li>\n"; 
 if ($core->permission('ase_tab_users')) {
   echo "<li><a href='#'>Users</a>\n  <ul>";
   if($core->permission('ase_users_lookup')) echo "\n    <li><a href='" . ASE . "users/lookup'>Account manager</a></li>";
   if($core->permission('ase_users_ban')) echo "\n    <li><a href='" . ASE . "users/bans'>Manage bans</a></li>";
   if($core->permission('ase_users_ban')) echo "\n    <li><a href='" . ASE . "users/bans/new'>Ban user</a></li>";
   if($core->permission('ase_users_fakelogin')) echo "\n    <li><a href='" . ASE . "users/login'>Login as</a></li>";
   echo "\n  </ul>\n</li>\n";
 } 

 if ($core->permission('ase_tab_website')) {
   echo "<li><a href='#'>Website</a>\n  <ul>";
   if($core->permission('ase_website_values')) {
     echo "\n    <li><a href='#'>Rare values</a>\n      <ul>";
     echo "\n        <li><a href='" . ASE . "values/new_category'>New category</a></li>";
     echo "\n        <li><a href='" . ASE . "values/new'>Add furni</a></li>";
     echo "\n        <li><a href='" . ASE . "values/list'>Manage furnis</a></li>";
     echo "\n      </ul>\n    </li>\n";
   }

   if($core->permission('ase_website_campains')) {
     echo "\n    <li><a href='#'>Campains</a>\n      <ul>";
     echo "\n        <li><a href='" . ASE . "campains/new'>New campain</a></li>";
     echo "\n        <li><a href='" . ASE . "campains/list'>Edit campain</a></li>";
     echo "\n      </ul>\n    </li>\n";
   }

   if($core->permission('ase_website_stats')) echo "    <li><a href='" . ASE . "website/statics'>Statics</a></li>";
   if($core->permission('ase_website_newsletter')) echo "    <li><a href='" . ASE . "website/newsletter'>Newsletter</a></li>";

   echo "\n  </ul>\n</li>\n";

  /*<li><a href="#">Website</a>
    <ul>
      <li><a href="#">News/Campains</a>
        <ul>
          <li><a href="">New campain</a></li>
          <li><a href="">Edit campains</a></li>
        </ul>
      </li>
      <li><a href="">Plugins</a></li>
      <li><a href="">Analytics</a></li>
      <li><a href="#">Newsletter</a></li>
    </ul>
  </li>*/
 } 

 if($core->permission('ase_tab_hotel')) {
   echo "<li><a href='#'>Hotel</a>\n  <ul>";
   /* SUB ITEMS */
   if($core->permission('ase_hotel_catalogue')) {
     echo "\n    <li><a href='#'>Catalogue</a>\n      <ul>";
     echo "\n        <li><a href='" . ASE . "catalogue/list'>Edit catalogue</a></li>";
     echo "\n        <li><a href='" . ASE . "catalogue/add' title='furni/item/page'>Add new item</a></li>";
     echo "\n      </ul>\n    </li>\n";
   }
   if($core->permission('ase_hotel_motd')) echo "    <li><a href='" . ASE . "hotel/motd'>MOTD</a></li>";
   if($core->permission('ase_hotel_ha')) echo "\n    <li><a href='" . ASE . "hotel/ha'>Hotel alert</a></li>";
   if($core->permission('ase_hotel_sa')) echo "\n    <li><a href='" . ASE . "hotel/sa'>Staff alert</a></li>";    
   /*MENU END */
   echo "\n  </ul>\n</li>\n";
 } 

 echo "<li><a href='#'>Tools</a>\n  <ul>";
 if($core->permission('ase_hotel_vnc')) echo "\n    <li><a href='" . ASE . "tools/vnc'>VNC Server</a></li>";  
 echo "    <li><a href='" . ASE . "tools/status'>Server status</a></li>";
 echo "    <li><a href='" . ASE . "tools/webmail'>Webmail</a></li>";

 echo "\n  </ul>\n</li>\n";
?>