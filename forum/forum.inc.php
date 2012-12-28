<article>
	<?php
	if($_SESSION['team'] == "SL"){
		$user = new SL($_SESSION['name']);
	} else {
		$user = new baseUser($_SESSION['name']);
	}

	if(isset($_GET['forumid'])){
		$forumid = $_GET['forumid'];
		$_SESSION['forumid'] = $forumid;
	}
	if(isset($_GET['threadid'])){
		$threadid = $_GET['threadid'];
		$_SESSION['threadid'] = $threadid;
	}

	
	if(loggedin() && $_GET['forumid'] && $_GET['reply']) {
		//	Starting a new thread
		include 'newthread.php';

	} elseif ( loggedin() && !empty($_GET['deletepost'])) {
		// deleting a post
		require_once "deletepost.php";

	} elseif($_GET['forumid'] && $_GET['threadid']) {
		// Displaying a threads posts
		include 'posts.php';

	} elseif($_GET['forumid']){
		// Displaying threads in a forum section
		include 'threads.php';
	} else {
		// Displaying the forum sections
		include 'forums.php';

	}
		?>
</article>