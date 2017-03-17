<?php
$pagestart = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd"><html><head><meta name="theme-color" content="#6158b7" /><link rel="stylesheet" href="mobile.css"/><style>a:link, a:active, a:visited {text-decoration:none;color:darkgrey;} a:hover {color:darkgray;text-decoration:underline;}</style><meta charset=shift-jis/><title>'.json_decode(file_get_contents("config.jsconf"), true)['title'].'</title><link href="https://fonts.googleapis.com/css?family=Asap|Rubik&amp;subset=cyrillic,latin-ext" rel="stylesheet"><link rel="icon" type="image/x-icon" href="favicon.ico"/><link href="https://fonts.googleapis.com/css?family=Work+Sans:200" rel="stylesheet"></head><body style="margin: 0em !important; background-image: url(bi.png); background-size: 100%; background-attachment: fixed;"><style> .postinfo > img { max-width: 67vw;}</style><script type="text/javascript">var _tmr=window._tmr || (window._tmr=[]);_tmr.push({id: "2856784", type: "pageView", start: (new Date()).getTime()});(function (d, w, id){if (d.getElementById(id)) return; var ts=d.createElement("script"); ts.type="text/javascript"; ts.async=true; ts.id=id; ts.src=(d.location.protocol=="https:" ? "https:" : "http:") + "//top-fwz1.mail.ru/js/code.js"; var f=function (){var s=d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);}; if (w.opera=="[object Opera]"){d.addEventListener("DOMContentLoaded", f, false);}else{f();}})(document, window, "topmailru-code");</script><noscript><div style="position:absolute;left:-10000px;"><img src="https://top-fwz1.mail.ru/counter?id=2856784;js=na" style="border:0;" height="1" width="1" alt="Рейтинг@Mail.ru"/></div></noscript><div class="top"><div style="background-image: url(head.png); background-size: cover; background-repeat: no-repeat;"><br><h1 style="position: relative; z-index: 2; font-family: \'Work Sans\', sans-serif;">&nbsp;&nbsp;'.json_decode(file_get_contents("config.jsconf"), true)['heading'].'</h1><br><br><br><br><br><br></div><div class="postinfo" >';
$pageend = '</div><hr><hr><div align="center"><a href="http://top.mail.ru/jump?from=2856784"><img src="http://top-fwz1.mail.ru/counter?id=2856784;t=590;l=1" style="border:0;" height="40" width="88" alt="Рейтинг@Mail.ru"/></a></div></div></body></html>';
$postf = json_decode(file_get_contents("posts.json"), true);
$commentf = json_decode(file_get_contents("comments.db"), true);
$likedep = '<input type="submit" value=\'Like!\'>';
if(!isset($_COOKIE['ecm_a'])) {
$likedep = "<p>Authorize first!</p>";
} else {
$user = $_COOKIE['ecm_usr'];
}
$commentr = $commentf[$_GET['post']];
$posts = $postf['Posts'];
$title = "This post is deleted";
$picture = null;
$tags = null;
$comments = null;
foreach($posts as &$post) {
if($post['uid'] == $_GET['post']) {
  $title = $post["Title"];
  $picture = $post['Image'];
  $likes = $post["liked"].count();
  foreach($post['liked'] as &$userlike) {
  if($user == $userlike) {
  $likedep = "<p>You have already liked this post!</p>";
  }
  }
  foreach($post['tags'] as &$tag) {
    $tags = $tags."<a href='/?query=".$tag."&from=posttag' >".$tag.",</a> ";
  }
}
}
foreach($commentr as &$comment) {
  $body = $comment['body'];
  $au = $comment['author'];
  $comments = $comments."<div style='margin: 4px; padding: 2px; border: 2px double black;'><p>".$body."</p><br><b>".$au."</b></div>";
}
$_pagemiddle = '<h2 id="title">'.$title.'</h2><img src="'.$picture.'"/><br /><div style="background-color: dimgray; color: darkgrey; padding: 6px; font-family: \'Asap\', sans-serif; font-size: 18.5px;"><p>'.$tags.'</p></div><hr> <script type="text/javascript">(function(){if (window.pluso){return}; var d=document, s=d.createElement(\'script\'), g=\'getElementsByTagName\'; s.type=\'text/javascript\'; s.charset=\'UTF-8\'; s.async=true; s.src=(\'https:\'==window.location.protocol ? \'https\' : \'http\') + \'://x.pluso.ru/pluso-x.js\'; var h=d[g](\'body\')[0]; h.appendChild(s);})(); </script><div class="pluso-engine" pluso-sharer={"buttons":"vkontakte,juick,facebook,twitter,google,email,print,more","style":{"size":"medium","shape":"round","theme":"theme15","css":""},"orientation":"horizontal","multiline":false}></div><hr><form action="comment.php?like_mode=true" method="GET" style="color: white; background: green; padding: 3px;"><p>Did you liked this image?</p><div style="float: right; color: white;"><p style="font-size: 170%;">'.$likes.'</p></div><input type="hidden" name="id" value="'.$_GET['post'].'"></input><input type="hidden" name="like" value="true"></input>'.$likedep.'</input></form><hr><h2 style="position: relative; left: 2px;">Comments</h2>'.$comments.'<hr><form action="comment.php" method="POST"><textarea contenteditable style="border: 2px solid black; margin: 7px; width: 500px;" name="comment">Your comment</textarea><input type="text" hidden value="'.$_GET['post'].'" name="id"></input><input type="submit" value="Send"></form>';
echo $pagestart.$_pagemiddle.$pageend;
?>