<?php
if($_GET['chgconf']) {
$conf = json_decode(file_get_contents("config.jsconf"), true);
$conf['title'] = $_GET['title'];
$conf['heading'] = $_GET['heading'];
file_put_contents("config.jsconf", json_encode($conf));
header("307 Internal Redirect");
header("Location: /");
die();
}
if($_GET['delete']) {
if($_COOKIE["ecm_usr"] == "admin") {
$postid = $_GET['uid'];
$postf = json_decode(file_get_contents("posts.json"), true);
$posts = $postf['Posts'];
foreach($posts as &$post) {
if($post['uid'] == $postid) {
$key=array_search($post, $posts);
unset($postf["Posts"][$key]);
file_put_contents("posts.json", json_encode($postf));
header("HTTP/1.1 307 Internal Redirect");
header("Location: /");
die();
}
}
} else {
header("HTTP/1.1 403 Forbidden");
header("Location: /error.php?e=admin_required");
}
} else {
if($_GET['register']) {
 $file = $_GET['file_to_upload'];
 $current = json_decode(file_get_contents("posts.json"), true);
 $title = $_POST['title'];
 $au = $_POST['author'];
 $last_uid = count($current['Posts']);
 $tags = explode(",", $_POST['tags']);
 if($au === "admin") { header("HTTP/1.0 403 Forbidden"); header("Location: /error.php?details=noAccess&description=unauthorized"); }
 $npic = array(
 "Title" => $title,
 "Image" => $file,
 "Author" => $au,
 "tags" => $tags,
 "uid" =>  $last_uid + 3, );
 array_unshift($current['Posts'], $npic);
 $recurrent = json_encode($current);
 file_put_contents("posts.json", $recurrent);
 header("HTTP/1.1 301 Moved Permamently");
 header("Location: /");
} else {
if(is_uploaded_file($_FILES["pic"]["tmp_name"])) {
$cfil=sha1(crc32(sha1(md5(sha1(crypt($_FILES["pic"]["name"],rand(1024, 5674).rand(1024, 5674).rand(1024, 5674))))))).".jpeg";
move_uploaded_file($_FILES["pic"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/content/".$cfil);
header("HTTP/1.1 301 Moved Permamently");
header("Location: /?isUploading=true&file="."/content/".$cfil."&isMadoka=false");
} else {
header("HTTP/1.1 417 Expectation failed");
 }
}
}
?>