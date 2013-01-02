<?php
$forum_id = $forumid;
$thread_id = $threadid;
$teamname = $user->getTeamName();
$query = "SELECT postsection.post_id, postsection.message, postsection.postedDate, Users.Username, postsection.status FROM postsection JOIN Users JOIN threadsection JOIN forumsection ON postsection.poster_id=Users.Id AND postsection.thread_id=threadsection.thread_id AND postsection.forum_id=forumsection.forum_id WHERE postsection.thread_id=$thread_id AND postsection.forum_id=$forum_id ORDER BY postsection.post_id";
$query_run = mysql_query($query);

echo "<a href='index.php?forumid=$forum_id'>Up a level</a>";

?>

<table>
	<tr>
		<th>Posts</th>
	</tr>
	<?php

	if($num_rows = mysql_num_rows($query_run) > 0){
		while($assoc = mysql_fetch_assoc($query_run)){
			
			if($teamname == "SL"){
				echo '<tr><td>'.$assoc['Username'] . ' posted</td><td> ' . $assoc['message'] . '</td><td> on ' . $assoc['postedDate'] .' </td><td>'.$user->deletePost($assoc['post_id']).'</td></tr>';
			} else {
				echo '<tr><td>'.$assoc['Username'] . ' posted</td><td> ' . $assoc['message'] . '</td><td> on ' . $assoc['postedDate'] .' </td></tr>';
			}
		}
		
		?>
	</table>
	<?php
	if(loggedin()){
		$query = "SELECT status FROM threadsection where thread_id=$thread_id";
		$query_run = mysql_query($query);
		$result = mysql_result($query_run, 0);

		if($result == "open" || $teamname == "SL" ){
			?>

			<form method="POST" action="redirect.php">
				<textarea name="message" maxlength="200"></textarea>
				<input type="submit" value="Reply">
			</form>
			<?php
		} 

		if($result == "locked"){
			echo "<h5>Thread has been locked</h5>";
		}
		if ($teamname == "SL") {
			$user->deleteThread();
			$user->lockThread();
		}
	} else {
		echo 'Please <a href="/login.php">log in</a> to reply.';
	}
} else {
	require_once "notfound.php";
}