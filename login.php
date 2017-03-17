<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
if($_GET['regconfirmation']) {
$ni = $_POST['nick'];
$email = $_POST['email'];
$p = $_POST['pass'];
$md5 = md5($p);
$ps = json_decode(file_get_contents("passwords.db"), true);
if(!isset($ps[$ni])) {
$ps[$ni] = array("pass"=>$p,"md5"=>$md5,"name"=>$ni,);
$ps = json_encode($ps);
file_put_contents("passwords.db", $ps);
die('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd"><html><head><meta name="theme-color" content="#6158b7" /><link rel="stylesheet" href="mobile.css"/><meta charset=shift-jis/><title>'.json_decode(file_get_contents("config.jsconf"), true)['title'].'</title><link rel="icon" type="image/x-icon" href="favicon.ico"/><link href="https://fonts.googleapis.com/css?family=Work+Sans:200" rel="stylesheet"></head><body style="margin: 0em !important;"><script type="text/javascript">var _tmr=window._tmr || (window._tmr=[]);_tmr.push({id: "2856784", type: "pageView", start: (new Date()).getTime()});(function (d, w, id){if (d.getElementById(id)) return; var ts=d.createElement("script"); ts.type="text/javascript"; ts.async=true; ts.id=id; ts.src=(d.location.protocol=="https:" ? "https:" : "http:") + "//top-fwz1.mail.ru/js/code.js"; var f=function (){var s=d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);}; if (w.opera=="[object Opera]"){d.addEventListener("DOMContentLoaded", f, false);}else{f();}})(document, window, "topmailru-code");</script><noscript><div style="position:absolute;left:-10000px;"><img src="//top-fwz1.mail.ru/counter?id=2856784;js=na" style="border:0;" height="1" width="1" alt="Рейтинг@Mail.ru"/></div></noscript><div style="position: absolute; z-index: -1; top: 0px; left: 0px; right: 0px; bottom: 0px; background-image: url(bi.png); background-size: 100%;"></div><div style="position: relative; width: 515px; margin: 0 auto !important; background-color: #fff; border: 1px double black; border-radius: 0 0 5em 5em; padding-bottom: 3em;"><div style="background-image: url(head.bmp); background-size: cover; background-repeat: no-repeat;"><br><h1 style="position: relative; z-index: 2; font-family: \'Work Sans\', sans-serif;">&nbsp;&nbsp;'.json_decode(file_get_contents("config.jsconf"), true)['heading'].'</h1><br><br><br><br><br><br></div><div class="reg-wrap" align="center"><h1 style="color: #615C97;">Thank you!</h1><br/><h4 style="color: #9893C3;">You may login now!</h4></div><hr><hr><div align="center"><a href="http://top.mail.ru/jump?from=2856784"><img src="http://top-fwz1.mail.ru/counter?id=2856784;t=590;l=1" style="border:0;" height="40" width="88" alt="Рейтинг@Mail.ru"/></a></div></div></body></html>');
} else {
header("HTTP/1.1 691 Registration failed");
die("Please, choose another nickname!");
}
}
if($_GET['chgav']){
if(is_uploaded_file($_FILES["pic"]["tmp_name"])) {
move_uploaded_file($_FILES["pic"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/content/".$_FILES["pic"]["name"]);
$ps = json_decode(file_get_contents("passwords.db"), true);
$md5 = $_COOKIE['ecm_five'];
$n = $_COOKIE['ecm_usr'];
var_dump($ps);
foreach($ps as &$usr) {
if($usr['name'] == $n) {
if($usr['md5'] == $md5) {
$usr['av'] = $_FILES["pic"]["name"];
$ps = json_encode($ps);
file_put_contents('passwords.db', $ps);
header("HTTP/1.1 301 Moved Permamently");
header("Location: /user.php?u=0");
die();
}
}
}
}
}
if($_GET['reg']) {
echo '<!DOCTYPE html PUBLIC -//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd"><html><head><meta charset=shift-jis/><title>EcchiMoe</title><link rel="icon" type="image/x-icon" href="favicon.ico"/><link href="https://fonts.googleapis.com/css?family=Work+Sans:200" rel="stylesheet"></head><body style="margin: 0em !important;"><script type="text/javascript">var _tmr=window._tmr || (window._tmr=[]);_tmr.push({id: "2856784", type: "pageView", start: (new Date()).getTime()});(function (d, w, id){if (d.getElementById(id)) return; var ts=d.createElement("script"); ts.type="text/javascript"; ts.async=true; ts.id=id; ts.src=(d.location.protocol=="https:" ? "https:" : "http:") + "//top-fwz1.mail.ru/js/code.js"; var f=function (){var s=d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);}; if (w.opera=="[object Opera]"){d.addEventListener("DOMContentLoaded", f, false);}else{f();}})(document, window, "topmailru-code");</script><noscript><div style="position:absolute;left:-10000px;"><img src="//top-fwz1.mail.ru/counter?id=2856784;js=na" style="border:0;" height="1" width="1" alt="Рейтинг@Mail.ru"/></div></noscript><div style="position: absolute; z-index: -1; top: 0px; left: 0px; right: 0px; bottom: 0px; background-image: url(bi.png); background-size: 100%;"></div><div style="position: relative; width: 515px; margin: 0 auto !important; background-color: #fff; border: 1px double black; border-radius: 0 0 5em 5em; padding-bottom: 3em;"><div style="background-image: url(head.bmp); background-size: cover; background-repeat: no-repeat;"><br><h1 style="position: relative; z-index: 2; font-family: \'Work Sans\', sans-serif;">&nbsp;&nbsp;EcchiMoe.com</h1><br><br><br><br><br><br></div><div class="reg-wrap" align="center"><form action="?regconfirmation=true" enctype="multipart/form-data" method="POST"><p>Your Nickname:</p><input type="text" name="nick"/><br/><p>Email:</p><input type="email" name="email"/><br/><p>Password:</p><input type="password" name="pass"/><br/><input type="submit" style="float: right;" value="Register!"/><br/></form></div><hr><hr><div align="center"><a href="http://top.mail.ru/jump?from=2856784"><img src="http://top-fwz1.mail.ru/counter?id=2856784;t=590;l=1" style="border:0;" height="40" width="88" alt="Рейтинг@Mail.ru"/></a></div></div></body></html>';
} else {
$name = $_POST['nickname'];
$password_i = $_POST['pass'];
$db = file_get_contents("passwords.db");
$passwords = json_decode($db, true);
$password = $passwords[$name]['pass'];
if($password_i === $password) {
    setcookie("ecm_a", "yes");
    setcookie("ecm_usr", $name);
    setcookie("ecm_five", md5($password_i));
    header("HTTP/1.1 301 Moved Permamently");
    header("Location: /");
} else {
    header("HTTP/1.1 417 Expectation Failed");
}
}
if($_GET['logout']) {
    unset($_COOKIE['ecm_a']);
    unset($_COOKIE['ecm_five']);
    unset($_COOKIE['ecm_usr']);
    setcookie('ecm_a', null, -1, '/');
    setcookie('ecm_usr', null, -1, '/');
    setcookie('ecm_five', null, -1, '/');
    header("HTTP/1.1 301 Moved Permamently");
    header("Location: /");
}
?>