<?php

require '../core.inc.php';

$redirect = rtrim($http_referer, "true");


$date = date('Y-m-d H:i:s');
$query = "INSERT INTO postsection VALUES ('','$_SESSION[threadid]','$_SESSION[id]','$_POST[message]','$date', '$_SESSION[forumid]','open')";
$query_run = mysql_query($query);


header("Location:$redirect")

?>