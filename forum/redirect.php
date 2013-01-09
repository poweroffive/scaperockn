<?php

require '../core.inc.php';

$id = $_SESSION['id'];
echo $redirect = rtrim($http_referer, "true");
$message = $user->mysqlescape($_POST['message']);

$date = date('Y-m-d H:i:s');
$query = "INSERT INTO postsection VALUES ('','$_SESSION[threadid]','$id','$message','$date', '$_SESSION[forumid]','open')";

$postresult = $user->getpostcount($id);
if($query_run = mysql_query($query)){
	$newpost = $postresult+1;
	$update = "UPDATE Users set Posts=$newpost where Id=$id";
	if(mysql_query($update)){
		echo 'true';
	} else {
		echo "Error!";
	}
}

header("Location:$redirect");

?>