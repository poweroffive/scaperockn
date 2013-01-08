<article>
	<?php
	if(isset($_SESSION['team'])){
		$team = $_SESSION['team'];
		$user = new $team($_SESSION['name']);
	} else {
		$user = new Member($_SESSION['name']);
	}

	if(isset($_GET['forumid'])){
		$forumid = $_GET['forumid'];
		$_SESSION['forumid'] = $forumid;
	}
	if(isset($_GET['threadid'])){
		$threadid = $_GET['threadid'];
		$_SESSION['threadid'] = $threadid;
	}
	
	if($user->loggedin() && $_GET['forumid'] && $_GET['reply']) {
		//	Starting a new thread
		include 'newthread.php';

	} elseif ( $user->loggedin() && !empty($_GET['deletepost'])) {
		// deleting a post
		require_once "deletepost.php";

	} elseif($_GET['forumid'] && $_GET['threadid']) {
		// Displaying a threads posts
		include 'posts.php';

	} elseif($_GET['forumid']){
		// Displaying threads in a forum section
		include 'threads.php';
	} elseif($_GET['threadid']) {
		//Not Found page for those tampering with
		include 'notfound.php';
	} else {
		// Displaying the forum sections
		include 'forums.php';
	}
		?>
</article>