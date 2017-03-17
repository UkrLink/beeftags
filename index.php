<?php
if($_SERVER['SERVER_PORT']  == 443) {
	if($_GET['layout'] == 'random') { echo http_get("/rand.php"); die();}
$submit = '<form enctype="multipart/form-data" action="submit.php" method="POST"></input><input type="file" name="pic" multiple accept="image/*"></input><p>You will be asked to provide post title on the next step</p><input type="submit" value="Submit!" id="submit_confirm"></input></form><br>';
$login = "<div style=\"background-color: rgb(97, 92, 150); padding: 1em;\" align=\"center\"><form action=\"login.php\" method=\"POST\"><input type=\"text\" name=\"nickname\">&nbsp;</input><input type=\"password\" name=\"pass\"></input>&nbsp;<input type=\"submit\" value=\"Login!\"></input><p>Don't have an account yet? <a href='login.php?reg=true'>Register!</p></a></form></div>";
$page = 1;
if(isset($_GET['p'])) {
define("page", $_GET['p']);
}
$limit 15;
$offset =page*15-15;
if($_COOKIE['ecm_usr'] == "admin") {
$tools = true;
}
$nextp = $page+1;
if(isset($_COOKIE['ecm_a'])) {
$usr = $_COOKIE['ecm_usr'];
if($_GET['isUploading']) {
  $file = $_GET['file'];
  $submit = "<form action=\"submit.php?register=true&file_to_upload=".$file."&salt=".md5("Rikka").'" method="POST"><img id="preview" src="'.$file.'" /><textarea name="title" value="Post title" rows="1">Post title</textarea><br><br><input type="text" value="Artist" name="author"></input><br><input type="text" name="tags" value="tags (separated by commas and not spaces!)"></input><br><input type="radio" name="rating" value="safe"></input>Safe<input type="radio" name="rating" value="questionable"></input>Questionable<input type="radio" name="rating" value="explict"></input>Explict<input type="radio" name="rating" value="21e"></input>Explict 21+<input type="submit" value="Submit!" style="float: right;"></input></form><br>';
 }
} else {
if($_GET['isUploading']) {
  $file = $_GET['file'];
  $submit = "<h6>You need to be authenticated in order to use this feature</h6>";
 }
}
if(isset($usr)) {
  $login = '<div style="background-color: rgb(97, 92, 150); padding: 1em;" align="center"><p>Hello, '.$usr.' !</p><a id="acc_manage" href="/user.php?u=0"><b>Manage your account</b></a><a id="logout" href="/login.php?logout=true"><i>Logout</i></a></div>';
}
$pagestart = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd"><html><head><meta name="description" contnt="EcchiMoe - free anime imageboard" /><meta name="google-site-verification" content="UloC-J2k4yghiBaJn26mIxeTOO22CJQAZBQkDd_6RTU" /> <meta name="referrer" content="no-referrer" /> <meta name="origin" content="no-origin" /><link rel="manifest" href="data:application/json,%7B%0D%0A%20%20%22short_name%22%3A%20%22Ecchi%20Moe%22%2C%0D%0A%20%20%22name%22%3A%20%22EcchiMoe%20--%20web%20anime%20gallery.%22%2C%0D%0A%20%20%22start_url%22%3A%20%22index.php%3Ffrom%3Dhomescreen%22%2C%0D%0A%20%20%22theme_color%22%3A%20%22%236158b7%22%2C%0D%0A%20%20%22background_color%22%3A%20%22%23615c8d%22%2C%0D%0A%20%20%22display%22%3A%20%22standalone%22%2C%0D%0A%20%20%22lang%22%3A%20%22en-US%22%2C%0D%0A%20%20%22icons%22%3A%20%5B%0D%0A%20%20%20%20%7B%0D%0A%20%20%20%20%20%20%22src%22%3A%20%22content%2Ficon.png%22%2C%0D%0A%20%20%20%20%20%20%22type%22%3A%20%22image%2Fpng%22%2C%0D%0A%20%20%20%20%20%20%22sizes%22%3A%20%22192x192%22%0D%0A%20%20%20%20%7D%0D%0A%09%5D%0D%0A%20%20%7D" /><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="theme-color" content="#6158b7" /><link rel="stylesheet" href="mobile.css"/></script><script>if (\'serviceWorker\' in navigator){window.addEventListener(\'load\', function(){navigator.serviceWorker.register(\'/eagent.js\').then(function(registration){}).catch(function(err){});});}</script><meta charset=shift-jis/><title>'.json_decode(file_get_contents("config.jsconf"), true)['title'].'</title><link rel="icon" type="image/x-icon" href="favicon.ico"/><link href="https://fonts.googleapis.com/css?family=Work+Sans:200" rel="stylesheet"><head><body style="margin: 0em !important; background-image: url(bi.png); background-size: 100%; background-attachment: fixed;"><style>.pseudolink:hover {background:#deafff;} .pseudolink {padding-right: 28.500vw;} .pseudolink_2 {padding-left: 28.500vw;} .pseudolink_2:hover {background:#9857c6;} .post > a > img { min-width: 60vw; max-width: 65.5vw; } #del {max-width:16px !important; min-width:16px !important;} .post > a:link {text-decoration: none;} .post > a:hover {text-decoration: none;} .post > a:visited {text-decoration: none;} .post > a:active {text-decoration: none;}</style><script type="text/javascript">var _tmr=window._tmr || (window._tmr=[]);_tmr.push({id: "2856784", type: "pageView", start: (new Date()).getTime()});(function (d, w, id){if (d.getElementById(id)) return; var ts=d.createElement("script"); ts.type="text/javascript"; ts.async=true; ts.id=id; ts.src=(d.location.protocol=="https:" ? "https:" : "http:") + "//top-fwz1.mail.ru/js/code.js"; var f=function (){var s=d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);}; if (w.opera=="[object Opera]"){d.addEventListener("DOMContentLoaded", f, false);}else{f();}})(document, window, "topmailru-code");</script><noscript><div style="position:absolute;left:-10000px;"><img src="https://top-fwz1.mail.ru/counter?id=2856784;js=na" style="border:0;" height="1" width="1" alt="„Q„u„z„„„y„~„s@Mail.ru"/></div></noscript><div style="position: static; z-index: -1; top: 0px; left: 0px; right: 0px; bottom: 0px;"></div><div id="lgsel"><a href="/"><img src="content/us.png"/></a>&nbsp;&nbsp;<a href="//ru.ecchimoe.com/"><img src="content/ru.png"/></a></div><div class="top" ><div style="background-image: url(head.png); background-size: cover; background-repeat: no-repeat;"><br><h1 style="position: relative; z-index: 2; font-family: \'Work Sans\', sans-serif; font-weight: 200;">&nbsp;&nbsp;'.json_decode(file_get_contents("config.jsconf"), true)['heading'].'</h1><br><br><br><br><br><br></div>'.$login.'<div id="submit">'.$submit.'</div><div class="search"><h3 style="float: left;">Search by tags</h3><br><br><br><form method="GET"><input name="query"></input><input type="submit" value="Search!"></input></form></div><div><center><a style="float: left;" href="/" class="pseudolink">Feed</a><a style="float: right;" class="pseudolink_2" href="announces/">Announcements</a></center></div>';
$pagemiddle = null;
$pageend = '<div class="posts" >Here will be posts...</div><hr><hr><div align="center"><a href="/?pervPage">&lt;&lt;Pervious page</a>&nbsp;&nbsp;<a href="/?p='.$nextp.'">Next page>></a><br><br><a href="http://top.mail.ru/jump?from=2856784"><img src="https://top-fwz1.mail.ru/counter?id=2856784;t=590;l=1" style="border:0;" height="40" width="88" alt="„Q„u„z„„„y„~„s@Mail.ru"/></a></div></div></body></html>';
$postfile = file_get_contents("posts.json");
$postlist = json_decode($postfile, true);
$post_uid = 0;
$posts = $postlist['Posts'];
if(!isset($_GET['query'])) {
foreach($posts as &$post) {
	if($offset>0) {
		$offset--;
	} else {
	$limit--;
	if($limit > 0) {
    if($tools) {$atools = "<a href='/submit.php?delete=true&uid=".$post["uid"]."' style='float: right; border: 1px darkred solid; padding: 3px; margin-right: 5vw; border-radius: 25px;'><img id='del' src='content/delete.jpg' /></a>";}
    $title = $post['Title'];
    $image = $post['Image'];
    $author = $post['Author'];
    $payload = "<div data-post='" . $post_uid . "' class='post'><h3 style='font-family: 'Rubik', sans-serif;'>" . $title . "</h3><br>".$atools."<a href='/post.php?post=".$post['uid']."' ><img src='" . $image . "' /></a><br><p><b>Author:</b><i>" . $author . "</i></div><hr>";
    $pagemiddle = $pagemiddle . $payload;
	}
	}
}
} else {
foreach($posts as &$post) 
if(strpos(implode("_",$post['tags']), $_GET['query']) === false) {
    } else {
    $post_uid++;
    $title = $post['Title'];
    $image = $post['Image'];
    $author = $post['Author'];
    $payload = "<div data-post='" . $post_uid . "' class='post'><h3 style='font-family: 'Rubik', sans-serif;'>" . $title . "</h3><br><a href='/post.php?post=".$post['uid']."' ><img src='" . $image . "' /></a><br><p><b>Author:</b><i>" . $author . "</i></div><hr>";
    $pagemiddle = $pagemiddle . $payload;
    }
    }
}
echo("$pagestart . $pagemiddle . $pageend");
} else {
header("500 SSL Use");
}
?>