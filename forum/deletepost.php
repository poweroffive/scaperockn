<?php

if($_SESSION['team'] == "SL"){
$redirect = rtrim($http_referer, "true");

$post_id = $_GET['deletepost'];

$query = "SELECT * from postsection where post_id=$post_id";
if($query_run = mysql_query($query)){
$result = mysql_fetch_assoc($query_run);

$thread_id = $result['thread_id'];
$poster_id = $result['poster_id'];
$createdDate = $result['createdDate'];
$message = $result['message'];
$forum_id = $result['forum_id'];

$query = "INSERT INTO postarchive VALUES ('$post_id','$thread_id','$poster_id','$message','$createdDate','$forum_id')";

if(mysql_query($query)){
	$query = "UPDATE postsection SET message='Post hidden' where post_id='$post_id' AND thread_id='$thread_id' AND forum_id=$forum_id";
	if(mysql_query($query)){
		echo "Post has been archived and deleted from the forums. You will be re-directed in 5 seconds.";
		sleep(5);
		header("Location:index.php?forumid=$forum_id&threadid=$thread_id");
	}
} else {
	echo "There was an issue please contact the site admin";
}

}

} else {
	echo "<h1>Please don't attempt to access pages you have no authorisation for.</h1>";
}

?>