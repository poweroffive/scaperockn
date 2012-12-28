<?php

$redirect = rtrim($http_referer, "true");

$forum_id = $_SESSION['forumid'];
$thread_id = $_SESSION['threadid'];
$date = date('Y-m-d H:i:s');

$query = "UPDATE threadsection SET status='closed' WHERE thread_id=$thread_id";

if(mysql_query($query)){
	echo "Thread has been archived and deleted from the forums. You will be re-directed in 5 seconds.";
	sleep(5);
	header("Location:index.php?forumid=$forum_id");
} else {
	echo "There was an issue please contact the site admin";
	echo "Click <a href='$redirect'>here</a> to return to thread.";
}

?>


