<?php

require '../core.inc.php';

$redirect = rtrim($http_referer, "true");

$thread_id = $_SESSION['threadid'];
$user_id = $_SESSION['user_id'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$date = date('Y-m-d H:i:s');


$query = "INSERT INTO threadsection VALUES ('','$user_id','$subject','$date', '$forum_id')";
$query_run = mysql_query($query);

$query = "SELECT thread_id from threadsection where author_id=$user_id and subject=$subject and createdDate=$date and forum_id=$forum_id";
echo $query_run = mysql_query($query);


//header("Location:$redirect")

?>