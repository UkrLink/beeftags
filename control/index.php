<?php if($_COOKIE['ecm_usr'] == "admin") {
if($_POST['chgconf'] == 1) {
header("307 Internal Redirect");
header("Location: /submit.php?chgconf=true&title=".$_POST['title']."&heading=".$_POST['heading']);
}
} else {
header("307 Internal Redirect");
header("Location: /error.php?e=403"); 
}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html>
  <head>
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
    <div style="position: static; z-index: -1; top: 0px; left: 0px; right: 0px; bottom: 0px;"></div>
    <div class="top" >
    <div style="background-image: url(head.png); background-size: cover; background-repeat: no-repeat;">
      <br>
      <h1 style="position: relative; z-index: 2; font-family: \'Work Sans\', sans-serif; font-weight: 200;">&nbsp;&nbsp;<?php echo json_decode(file_get_contents("config.jsconf"), true)['heading']; ?></h1>
      <br><br><br><br><br><br>
    </div>
<div class="cpmain">
<h2>Control panel</h2>
<h3>Website info:</h3>
<form method="POST"><input type="hidden" name="chgconf" value="1"></input><label>Title:</label><input type="text" name="title" value="<?php echo json_decode(file_get_contents("config.jsconf"), true)['title']; ?>"></input><br><label>Heading:</label><input type="text" name="heading" value="<?php echo json_decode(file_get_contents("config.jsconf"), true)['title']; ?>"></input><br><input type="submit" value="Save"></input></form>
<h2>Here is how your website will look:</h2>
<div class="preview" align="center"><iframe src="/" width="540" height="600"/></div>
</div>