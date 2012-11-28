<?php

$redirect = rtrim($http_referer, "true");

$forum_id = $_SESSION['forumid'];
$thread_id = $_SESSION['threadid'];
$date = date('Y-m-d H:i:s');


$query = "SELECT * from threadsection where thread_id=$thread_id";
if($query_run = mysql_query($query)){
$result = mysql_fetch_assoc($query_run);

$thread_id = $result['thread_id'];
$author_id = $result['author_id'];
$subject = $result['subject'];
$createdDate = $result['createdDate'];
$forum_id = $result['forum_id'];
$status = $result['status'];

$query = "INSERT INTO threadarchive VALUES ('$thread_id','$author_id','$subject','$createdDate','$forum_id','$status')";

if(mysql_query($query)){
	$query = "DELETE FROM threadsection where forum_id='$forum_id' AND thread_id='$thread_id'";
	if(mysql_query($query)){
		echo "Thread has been archived and deleted from the forums. You will be re-directed in 5 seconds.";
		sleep(5);
		header("Location:index.php?forumid=$forum_id");
	}
} else {
	echo "There was an issue please contact the site admin";
}

}
?>