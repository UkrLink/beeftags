<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html>
  <head>
    <link rel="manifest" href="https://uncorroborated-morn.000webhostapp.com/manifest.json" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#6158b7" />
    <link rel="stylesheet" href="mobile.css"/>
    </script>
    <meta charset=shift-jis/>
    <title><?php echo json_decode(file_get_contents("config.jsconf"), true)['title']; ?></title>
    <link rel="icon" type="image/x-icon" href="favicon.ico"/>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200" rel="stylesheet">
    <head>
  <body style="margin: 0em !important; background-image: url(bi.png); background-size: 100%; background-attachment: fixed;">
    <style>.pseudolink:hover {background:#deafff;} .pseudolink {padding-right: 28.500vw;} .pseudolink_2 {padding-left: 28.500vw;} .pseudolink_2:hover {background:#9857c6;} .post > a > img { min-width: 60vw; max-width: 65.5vw; } .post > a:link {text-decoration: none;} .post > a:hover {text-decoration: none;} .post > a:visited {text-decoration: none;} .post > a:active {text-decoration: none;}</style>
    <script type="text/javascript">var _tmr=window._tmr || (window._tmr=[]);_tmr.push({id: "2856784", type: "pageView", start: (new Date()).getTime()});(function (d, w, id){if (d.getElementById(id)) return; var ts=d.createElement("script"); ts.type="text/javascript"; ts.async=true; ts.id=id; ts.src=(d.location.protocol=="https:" ? "https:" : "http:") + "//top-fwz1.mail.ru/js/code.js"; var f=function (){var s=d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);}; if (w.opera=="[object Opera]"){d.addEventListener("DOMContentLoaded", f, false);}else{f();}})(document, window, "topmailru-code");</script>
    <noscript>
      <div style="position:absolute;left:-10000px;"><img src="//top-fwz1.mail.ru/counter?id=2856784;js=na" style="border:0;" height="1" width="1" alt="„Q„u„z„„„y„~„s@Mail.ru"/></div>
    </noscript>
    <div style="position: static; z-index: -1; top: 0px; left: 0px; right: 0px; bottom: 0px;"></div>
    <!--<div id="lgsel"><a href="/"><img src="https://www.ci-solution.com/fileadmin/flags/flag-us.png"/></a>&nbsp;&nbsp;<a href="//ru.ecchimoe.com/"><img src="http://www.ntportalas.lt/img/ru.png"/></a></div>-->
    <div class="top" >
    <div style="background-image: url(head.bmp); background-size: cover; background-repeat: no-repeat;">
      <br>
      <h1 style="position: relative; z-index: 2; font-family: \'Work Sans\', sans-serif; font-weight: 200;">&nbsp;&nbsp;<?php echo json_decode(file_get_contents("config.jsconf"), true)['heading']; ?></h1>
      <br><br><br><br><br><br>
    </div>
	<h1>Error <?php  echo $_GET['e']."</h1>";
	if($_GET['e'] === "400") {
	echo "<strong>Your browser sent bad request.</strong>";
	} else if($_GET['e'] === "401") { echo "<strong>You are unauthorized to perform this action.</strong>";} else if($_GET['e'] === "403") {echo "<strong>You are not authorized to visit the following page/directory: ".$_SERVER['SCRIPT_ADRESS']."</strong>";} else if($_GET['e'] === "404") {echo "<storng><i>This page could not be found. Please check the address you entered.</strong></i>";} else if($_GET['e'] === "503") { echo "<strong>The server is currently offline due to overload.</strong><hr><p>If this error message is appearing most of the time or constanantly, please <a href='mailto://teabagzero@gmail.com?subject=error 503'>Contact Us</a></p>";}
	else if(!is_string($_GET['e'])) {
	$error = str_replace("_"," ",$_GET['e']);
	echo $error;
	die();
	} else {
	echo 'This error haven\'t got detailed escription';
	}
	?>
	<hr>
	<br>
	<br>
	<br>
