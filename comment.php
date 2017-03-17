<?php
if(!$_GET['like']) {
if(isset($_COOKIE['ecm_a'])) {
$author = $_COOKIE['ecm_usr'];
$post = $_POST['id'];
$comment = $_POST['comment'];
$comments = json_decode(file_get_contents("comments.db"), true);
$comblock = array(
"body" => $comment,
"author" => $author,
);
if(!is_array($comments[$post])) { $comments[$post] = array();}
array_unshift($comments[$post], $comblock);
file_put_contents("comments.db", json_encode($comments));
header("307 Internal Redirect");
header("Location: /post.php?post=".$post);
} else {
header("307 Internal Redirect");
header("Location: /error?error=auth_required_to_access");
}
} else {
$postf = json_decode(file_get_contents("posts.json"), true);
foreach($postf['Posts'] as &$post) {
if($post['uid'] == $_GET['id']) {
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(!is_array($post['liked'])) { $post['liked'] = array();} //ok
array_push($post['liked'], $_COOKIE['ecm_usr']); //ok
file_put_contents("posts.json", json_encode($postf, 1024));
header("307 Internal Redirect");
header("Location: /post.php?post=".$_GET['id']);
}
}
}
?>