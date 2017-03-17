<?php
$usr = null;
if($_GET['getinfo']) {
    $passwords = json_decode(file_get_contents("passwords.db"), true);
    foreach($passwords as &$user) {
      if($user['md5'] == $_GET['md5']) {
        $usr = $user['name'];
    }
  }
}
echo $usr;
?>