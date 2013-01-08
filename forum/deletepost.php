<?php

if($_SESSION['team'] == "SL" || $_SESSION['team'] == "Community"){
	$redirect = rtrim($http_referer, "true");

	$forumid = $_SESSION['forumid'];
	$threadid = $_SESSION['threadid'];
	$post_id = $_GET['deletepost'];
	
	$query = "UPDATE postsection SET status='hidden' where post_id=$post_id AND thread_id=$threadid AND forum_id=$forumid";
	if(mysql_query($query)){
		echo "Post has been archived and deleted from the forums. You will be re-directed in 5 seconds.";
		$deleted = 'true';
		header("Location:$redirect");
	} else {
		echo "There was an issue please contact the site admin";
	}

} else {
	echo "<h1>Please don't attempt to access pages you have no authorisation for.</h1>";
}

?>