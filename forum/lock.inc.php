<article>
	<?php
	if($user->loggedin()){
		$redirect = rtrim($http_referer, "true");

		$forum_id = $_SESSION['forumid'];
		$thread_id = $_SESSION['threadid'];
		$date = date('Y-m-d H:i:s');


		$query = "SELECT status from threadsection where thread_id=$thread_id";
		if($query_run = mysql_query($query)){
			$result = mysql_result($query_run, 0);

			if($result == "open" || $result == "closed"){
				$query = "UPDATE threadsection SET status='locked' where thread_id=$thread_id";
				if(mysql_query($query)){
					echo "Thread Locked. Click <a href='$redirect'>here</a> to return to thread.";
					unset($_SESSION['threadid']);
				} else {
					include "notfound.php";
				}
			} elseif($result == "locked"){
				$query = "UPDATE threadsection SET status='open' where thread_id=$thread_id";
				if(mysql_query($query)){
					echo "Thread re-opened. Click <a href='$redirect'>here</a> to return to thread.";
					unset($_SESSION['threadid']);
				} else {
					include "notfound.php";
				}
			}
		} else {
			header("Location:index.php");
		}
	} else {
		include 'notfound.php';
	}

	?>
</article>