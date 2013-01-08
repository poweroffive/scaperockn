<?php
$forum_id = $forumid;
$thread_id = $threadid;
$teamname = $user->getTeamName();
$query = "SELECT postsection.post_id, postsection.message, postsection.postedDate, Users.Username, postsection.status FROM postsection JOIN Users JOIN threadsection JOIN forumsection ON postsection.poster_id=Users.Id AND postsection.thread_id=threadsection.thread_id AND postsection.forum_id=forumsection.forum_id WHERE postsection.thread_id=$thread_id AND postsection.forum_id=$forum_id ORDER BY postsection.post_id";
$query_run = mysql_query($query);

$hidden = $user->hidden($forumid, $threadid, $team);

if ($hidden == 'false'){
	echo "<a href='index.php?forumid=$forum_id'>Up a level</a>";

	?>

	<h3>Posts</h3>
	<?php

	if($num_rows = mysql_num_rows($query_run) > 0){
		while($assoc = mysql_fetch_assoc($query_run)){
			//var_dump($assoc);
			
			
			if($assoc['status'] == 'hidden' && ($user->getTeamName() == 'Community' || $user->getTeamName() == 'SL')){
				echo '<div><p>Hidden Post:'.$assoc['Username'] . ' posted ' . $assoc['message'] . ' on ' . $assoc['postedDate'] . $user->showPost($assoc['post_id']).'</p></div>';
			} elseif($assoc['status'] == 'hidden') {
				echo "Post Hidden";
			} elseif($teamname == "SL" || $_SESSION['team'] == "Community"){
				echo '<div><p>'.$assoc['Username'] . ' posted ' . $assoc['message'] . ' on ' . $assoc['postedDate'] . $user->deletePost($assoc['post_id']).'</p></div>'; 
			} else {
			echo '<div><p>'.$assoc['Username'] . ' posted ' . $assoc['message'] . ' on ' . $assoc['postedDate'] .' </p></div>';
			}
		}
		
		?>

		<?php
		if($user->loggedin()){
			$query = "SELECT status FROM threadsection where thread_id=$thread_id";
			$query_run = mysql_query($query);
			$result = mysql_result($query_run, 0);

			if($result == "open" || $teamname == "SL" || $_SESSION['team'] == "Community" ){
				?>
				<form method="POST" action="redirect.php">
					<textarea name="message" maxlength="200"></textarea>
					<input type="submit" value="Reply">
				</form>
				<?php
			} 
			
			if($result == "locked"){
				echo "<h5>Thread has been locked</h5>";
			} elseif($result == "closed"){
				echo "<h5>Thread is currently hidden</h5>";
			}
			if ($teamname == "SL" || $_SESSION['team'] == "Community") {
				$_SESSION['status'] = $result;
				$user->deleteThread();
				$user->lockThread();
			}
		} else {
			echo 'Please <a href="/login.php">log in</a> to reply.';
		}
	} else {
		require_once "notfound.php";
	}
}
?>