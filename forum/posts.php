<?php
$forum_id = $forumid;
$thread_id = $threadid;
$teamname = $user->getTeamName();
$page = $_GET['page'];
$bottom = $user->getbottom($page);
$top = $user->gettop($page);
$query = "SELECT postsection.post_id, postsection.message, postsection.postedDate, Users.Username, Users.Id, postsection.status FROM postsection JOIN Users JOIN threadsection JOIN forumsection ON postsection.poster_id=Users.Id AND postsection.thread_id=threadsection.thread_id AND postsection.forum_id=forumsection.forum_id WHERE postsection.thread_id=$thread_id AND postsection.forum_id=$forum_id ORDER BY postsection.post_id LIMIT $bottom, $top";
$query_run = mysql_query($query);

$hidden = $user->hidden($forumid, $threadid, $teamname);

if ($hidden == 'false'){
	echo "<a href='index.php?forumid=$forum_id&page=1'>Up a level</a>";

	?>

	<h3>Posts</h3>
	<?php

	if($num_rows = mysql_num_rows($query_run) > 0){
		while($assoc = mysql_fetch_assoc($query_run)){
			//var_dump($assoc);
			
			
			if($assoc['status'] == 'hidden' && ($teamname == 'Community' || $teamname == 'SL')){
				echo '<div class='.$teamname.'><p>'.$assoc['Username'] . '<br>'.$user->getpostcount($assoc['Id']).'</div><div class=content>Hidden message:' . $assoc['message'] . ' on ' . $assoc['postedDate'] . $user->deletePost($assoc['post_id']).'</p></div>'; 
			} elseif($assoc['status'] == 'hidden') {
				echo "Post Hidden";
			} elseif($teamname == "SL" || $teamname == "Community"){
				echo '<div class='.$teamname.'><p>'.$assoc['Username'] . '<br>'.$user->getpostcount($assoc['Id']).'</div><div class=content>' . $assoc['message'] . ' on ' . $assoc['postedDate'] . $user->deletePost($assoc['post_id']).'</p></div>'; 
			} else {
				echo '<div class='.$teamname.'><p>'.$assoc['Username'] . '<br>'.$user->getpostcount($assoc['Id']).'</div><div class=content>' . $assoc['message'] . ' on ' . $assoc['postedDate'].'</p></div>'; 
			}
		}
		
		?>

		<?php
		$query = "SELECT status FROM threadsection where thread_id=$thread_id";
		$query_run = mysql_query($query);
		$result = mysql_result($query_run, 0);

		if($result == "open" && $user->loggedin() || $teamname == "SL" || $teamname == "Community" ){
			?>
			<form method="POST" action="redirect.php">
				<textarea name="message" class="qreply" maxlength="200"></textarea>
				<input type="submit" class="smbt" value="Reply">
			</form>
			<?php
			if($result == "locked") {
				echo "<h5>Thread has been locked</h5>";
			} elseif($result == "closed"){
				echo "<h5>Thread is currently hidden</h5>";
			}
		} elseif($result == "locked") {
			echo "<h5>Thread has been locked</h5>";
		} elseif($result == "closed"){
			echo "<h5>Thread is currently hidden</h5>";
		} else {
			echo 'Please <a href="/login.php">log in</a> to reply.';
		} 

		if ($teamname == "SL" || $teamname == "Community") {
			$_SESSION['status'] = $result;
			$user->deleteThread();
			$user->lockThread();
		}
	} else {
		require_once "notfound.php";
	}
}
?>