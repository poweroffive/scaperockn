<article>
	<?php

	if($user->loggedin()){
		$redirect = rtrim($http_referer, "true");

		$forum_id = $_SESSION['forumid'];
		$thread_id = $_SESSION['threadid'];
		$date = date('Y-m-d H:i:s');
		if($_SESSION['status'] != "closed"){
			$query = "UPDATE threadsection SET status='closed' WHERE thread_id=$thread_id";
		} else {
			$query = "UPDATE threadsection SET status='open' WHERE thread_id=$thread_id";
		}
		if(mysql_query($query)){
			echo "Click <a href='index.php?forumid=$forum_id'>here</a> to return to forums.";
		} else {
			echo "There was an issue please contact the site admin";
			echo "Click <a href='$redirect'>here</a> to return to thread.";
		}
	} else {
		include 'notfound.php';
	}
	?>
</article>