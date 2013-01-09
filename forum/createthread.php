<?php

require '../core.inc.php';

$redirect = rtrim($http_referer, "true");
if(!empty($_POST['subject']) && !empty($_POST['message'])){

$forum_id = $_SESSION['forumid'];
$user_id = $_SESSION['id'];
$subject = $user->mysqlescape($_POST['subject']);
$message = $user->mysqlescape($_POST['message']);
$date = date('Y-m-d H:i:s');


$query = "INSERT INTO threadsection VALUES ('','$user_id','$subject','$date','$forum_id','open')";
$query_run = mysql_query($query);

$query = "SELECT thread_id from threadsection where author_id=$user_id and subject=\"$subject\" and createdDate=\"$date\" and forum_id=$forum_id";
$query_run = mysql_query($query);
$num_rows = mysql_num_rows($query_run);
$thread_id = mysql_result($query_run, 0);

$query = "INSERT INTO postsection VALUES ('','$thread_id', '$user_id', '$message','$date','$forum_id','open')";
$query_run = mysql_query($query);

header("Location:$redirect");
} else {
	require_once "../core.inc.php";
require '../header.inc.php';
require '../nav.inc.php';

include "notfound.php";

require '../footer.inc.php';
}
?>