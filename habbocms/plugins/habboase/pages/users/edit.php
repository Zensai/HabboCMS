<?php
 $new_search = '1';
 $header = 'Edit user(s)';
 $class = 'title';
 if (isset($_POST['edit_username'], $_POST['edit_mail'], $_POST['edit_motto'], $_POST['edit_muted'], $_POST['edit_bnew'], $_POST['edit_hideonline'], $_POST['edit_hideinroom'])) {
   if ($users->name_taken(c_filter($_POST['edit_username']))) {
     $keys = array(
       'username' => usernameFilter($_POST['edit_username']),
       'mail' => emailFilter($_POST['edit_mail']),
       'motto' => filter($_POST['edit_motto']),
       'muted' => nullOne($_POST['edit_muted']),
       'bnew' => nullOne($_POST['edit_bnew']),
       'hide_online' => nullOne($_POST['edit_hideonline']),
       'hide_inroom' =>nullOne($_POST['edit_hideinroom']),
     );
     $db->server_$db->query('ase_updateuser', $keys);
     $ignore_if = true;
     $new_search = '2';
     $username = c_filter($_POST['edit_username']);
     echo '<div class="valid_box">User updated.</div>';
   } else echo '<div class="error_box">Something went wrong.</div>';
 }

 if(isset($_POST['submit_user']) && isset($_POST['submit_username']) && c_filter($_POST['submit_username']) != '' || isset($ignore_if)) {
  if (!isset($ignore_if)) { 
    $username = c_filter($_POST['submit_username']);
  }
  if ($users->name_taken($username)) {
    if (!isset($ignore_if)) $new_search = '0';
    echo '

    <h2>Edit user</h2>
    <div class="form">
      <form action="?2" method="POST" class="niceform">
        <input type="hidden" name="edit_username" value="' . $username . '">
        <fieldset>
          <dl>
            <dt><label for="email">Username:</label></dt>
            <dd><input type="text" name="false" size="54" readonly="readonly" value="' . $username . '"/></dd>
          </dl>
  
          <dl>
            <dt><label for="email">Mail:</label></dt>
            <dd><input type="text" name="edit_mail" size="54" value="' . $users->get_info('mail', $username) . '" /></dd>
          </dl>
  
          <dl>
            <dt><label for="email">Motto:</label></dt>
            <dd><input type="text" name="edit_motto" size="54" value="' . $users->get_info('motto', $username) . '" /></dd>
          </dl>
          
          <dl>
            <dt><label for="email">Muted:</label></dt>
            <dd>
            <select name="edit_muted" size="1"><option value="1"' . (($users->get_info('muted', $username) == '1')?' selected':'') . '>Muted</option><option value="0"' . (($users->get_info('muted', $username) == '0')?' selected':'') . '>Not muted</option></select>
            </dd>
          </dl>
          
          <dl>
            <dt><label for="email">Block newfriends:</label></dt>
            <dd>
            <select name="edit_bnew" size="1"><option value="1"' . (($users->get_info('block_newfriends', $username) == '1')?' selected':'') . '>Enabled</option><option value="0"' . (($users->get_info('block_newfriends', $username) == '0')?' selected':'') . '>Disabled</option></select>
            </dd>
          </dl>
          
          <dl>
            <dt><label for="email">Online status:</label></dt>
            <dd>
            <select name="edit_hideonline" size="1"><option value="1"' . (($users->get_info('show_online', $username) == '1')?' selected':'') . '>Hide</option><option value="0"' . (($users->get_info('hide_online', $username) == '0')?' selected':'') . '>Show</option></select>
            </dd>
          </dl>
          
          <dl>
            <dt><label for="email">Stalking:</label></dt>
            <dd>
            <select name="edit_hideinroom" size="1"><option value="1"' . (($users->get_info('hide_inroom', $username) == '1')?' selected':'') . '>Enabled</option><option value="0"' . (($users->get_info('hide_inroom', $username) == '0')?' selected':'') . '>Disabled</option></select>
            </dd>
          </dl>
  
  
  
          <dl class="submit">
            <input type="submit" name="edit_user" id="submit" value="Submit" />
          </dl>
        </fieldset>
                      
      </form>
    </div>
    ';
  } else echo '<div class="error_box">Invalid name or user did not exists.</div>';
 }

 if($new_search == '1' || $new_search == '2') echo (($new_search == '2')?'<h2>Edit new user</h2>':'<h2>Edit user</h2>') . '
         <div class="form">
         <form action="" method="post" class="niceform">

                <fieldset>
                    <dl>
                        <dt><label for="email">Username:</label></dt>
                        <dd><input type="text" name="submit_username" id="" size="54" /></dd>
                    </dl>

                     <dl class="submit">
                    <input type="submit" name="submit_user" id="submit" value="Submit" />
                     </dl>
                     
                     
                    
                </fieldset>
                
         </form>
         </div>  ';
?>