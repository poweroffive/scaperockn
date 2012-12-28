<?php

if($_SESSION['team'] == "SL"){
	$redirect = rtrim($http_referer, "true");

	$post_id = $_GET['deletepost'];

	if(mysql_query($query)){
		echo "Post has been archived and deleted from the forums. You will be re-directed in 5 seconds.";
		sleep(5);
		header("Location:index.php?forumid=$forum_id&threadid=$thread_id");
	} else {
		echo "There was an issue please contact the site admin";
	}

} else {
	echo "<h1>Please don't attempt to access pages you have no authorisation for.</h1>";
}

?>