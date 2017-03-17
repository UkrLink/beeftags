<?php
$u = $_GET['u'];
$db = json_decode(file_get_contents("passwords.db"), true);
$authorized = false;
if($u === "0") {
$user = $_COOKIE['ecm_usr'];
$picture = "content/".$db[$user]['av'];
$ups = $db[$user]['ups'];
$role = $db[$user]['role'];
$authorized = "<p>Upload new avatar:</p><form action='login.php?chgav=true' method='POST' enctype='multipart/form-data'><input type='file' name='pic'></input><input type='submit'></input></form><a href='login.php?profmod=true'><p>Modify other profile details</p></a>";
} else {
foreach($db as &$usr) {
if($usr['uid'] == $u) {
$user = $usr['name'];
$ups = $usr['ups'];
$role = $usr['role'];
$picture = "content/".$db[$usr]['av'];
}
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd"><html> <head><meta name="theme-color" content="#6158b7" /><link rel="stylesheet" href="mobile.css" /><script type="text/javascript" src="https://getfirebug.com/firebug-lite-beta.js"></script> <meta charset=shift-jis/> <title>EcchiMoe</title> <link rel="icon" type="image/x-icon" href="favicon.ico"/> <link href="https://fonts.googleapis.com/css?family=Work+Sans:200" rel="stylesheet"> <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css"/> <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script> <script>window.addEventListener("load", function(){window.cookieconsent.initialise({"palette":{"popup":{"background": "#343c66", "text": "#cfcfe8"}, "button":{"background": "#f71559"}}, "theme": "edgeless", "position": "bottom-left", "type": "opt-in"})}); </script> </head> <body style="margin: 0em !important; background-image: url(bi.png); background-size: 100%; background-attachment: fixed;"> <style>.post > a > img{min-width: 60vw; max-width: 65.5vw;}.post > a:link{text-decoration: none;}.post > a:hover{text-decoration: none;}.post > a:visited{text-decoration: none;}.post > a:active{text-decoration: none;}</style> <script type="text/javascript">var _tmr=window._tmr || (window._tmr=[]);_tmr.push({id: "2856784", type: "pageView", start: (new Date()).getTime()});(function (d, w, id){if (d.getElementById(id)) return; var ts=d.createElement("script"); ts.type="text/javascript"; ts.async=true; ts.id=id; ts.src=(d.location.protocol=="https:" ? "https:" : "http:") + "//top-fwz1.mail.ru/js/code.js"; var f=function (){var s=d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);}; if (w.opera=="[object Opera]"){d.addEventListener("DOMContentLoaded", f, false);}else{f();}})(document, window, "topmailru-code"); </script> <noscript> <div style="position:absolute;left:-10000px;"> <img src="//top-fwz1.mail.ru/counter?id=2856784;js=na" style="border:0;" height="1" width="1" alt="?Q?u?z???y?~?s@Mail.ru"/> </div></noscript> <div style="position: static; z-index: -1; top: 0px; left: 0px; right: 0px; bottom: 0px;"></div><div style="position: relative; width: 67vw; margin: 0 auto !important; background-color: #fff; border: 1px double black; border-radius: 0 0 5em 5em; padding-bottom: 3em;"> <div style="background-image: url(head.png); background-size: cover; background-repeat: no-repeat;"> <br><h1 style="position: relative; z-index: 2; font-family: 'Work Sans', sans-serif; font-weight: 200;">&nbsp;&nbsp;EcchiMoe.com</h1> <br><br><br><br><br><br></div><div style="background-color: rgb(97, 92, 150); padding: 1em;" align="center"> <a href="/"><p>Back</p></a></div><div style="padding: 40px;"><img style="position: relative; float: left; border: 2px solid; max-width: 145px;" src="<?php echo $picture;?>"/><h2><?php echo $user;?></h2><?php echo $authorized ?><p>Uploads:<?php echo $ups ?></p><p>Role:<?php echo $role ?></p></div></body></html>