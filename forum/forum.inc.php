<article>
	<?php
	if($_SESSION['team'] == "SL"){
		$user = new SL($_SESSION['name']);
	}

	if(isset($_GET['forumid'])){
		$_SESSION['forumid'] = $_GET['forumid'];
	}
	if(isset($_GET['threadid'])){
		$_SESSION['threadid'] = $_GET['threadid'];
	}

	//	Starting a new thread
	if(loggedin() && $_GET['forumid'] && $_GET['reply']) {
		?>
		<form method="POST" action="createthread.php">
			<label for="subject">Subject</label><input type="text" id="subject" name="subject" maxlength="20"><br><br>
			<label for="message">Message</label><textarea id="message" name="message" maxlength="200"></textarea>
			<input type="submit" value="Reply">
		</form>
		<?php
	//	Replying to a thread
	} else	if(!loggedin() && $_GET['forumid'] && $_GET['reply']) {
		header("Location: ../login.php");
	} elseif($_GET['forumid'] && $_GET['threadid'] && $_GET['reply']){
		?>
		<form method="POST" action="redirect.php">
			<textarea name="message" maxlength="200"></textarea>
			<input type="submit" value="Reply">
		</form>
		<?php
		//	looking at a thread
	} elseif ( loggedin() && !empty($_GET['deletepost'])) {
		require_once "deletepost.php";
	} elseif($_GET['forumid'] && $_GET['threadid']) {
		$forum_id = $_GET['forumid'];
		$thread_id = $_GET['threadid'];
		$query = "SELECT postsection.post_id, postsection.message, postsection.postedDate, Users.Username FROM postsection JOIN Users JOIN threadsection JOIN forumsection ON postsection.poster_id=Users.Id AND postsection.thread_id=threadsection.thread_id AND postsection.forum_id=forumsection.forum_id WHERE postsection.thread_id=$thread_id AND postsection.forum_id=$forum_id ORDER BY postsection.post_id";
		$query_run = mysql_query($query);
		?>

		<table>
			<tr>
				<th>Posts</th>
			</tr>
			<?php

			if($num_rows = mysql_num_rows($query_run) > 0){
				while($assoc = mysql_fetch_assoc($query_run)){
					echo '<tr><td>'.$assoc['Username'] . ' posted</td><td> ' . $assoc['message'] . '</td><td> on ' . $assoc['postedDate'] .' </td></tr>';
					if($user){
						'<tr><td>'.$user->deletePost($assoc['post_id']).'<tr><td>';
					}
				}

				echo "<a href='index.php?forumid=$forum_id'>Up a level</a>";

				?>
			</table>
			<?php
			if(loggedin()){
				$query = "SELECT status FROM threadsection where thread_id=$thread_id";
				$query_run = mysql_query($query);
				$result = mysql_result($query_run, 0);

				if($result == "open"){
					?>

					<form method="POST" action="redirect.php">
						<textarea name="message" maxlength="200"></textarea>
						<input type="submit" value="Reply">
					</form>
					<?php
				} elseif($result == "locked"){
					echo "<h5>Thread has been locked</h5>";
				}
				if ($user) {
					$user->deleteThread();
					$user->lockThread();
				}
			} else {
				echo 'Please <a href="/login.php">log in</a> to reply.';
			}
		} else {
			require_once "notfound.php";
		}
		//	looking at a forum
	} elseif($_GET['forumid']){

		$_SESSION['forumid'] = $_GET['forumid'];
		$forum_id = $_GET['forumid'];
		$query = "SELECT threadsection.subject, Users.Username, threadsection.thread_id from threadsection join forumsection JOIN Users on threadsection.forum_id=forumsection.forum_id AND Users.Id=threadsection.author_id where threadsection.forum_id=$forum_id ORDER BY threadsection.thread_id DESC;";
		$query_run = mysql_query($query);
		$num_rows = mysql_num_rows($query_run);
		$query_array = array();
		while($assoc = mysql_fetch_assoc($query_run)){
			array_push($query_array, $assoc['subject']);
			array_push($query_array, $assoc['Username']);
			array_push($query_array, $assoc['thread_id']);
		}
		echo "<a href='index.php'>Forums</a>";
	//print_r($query_array);
		?>

		<table>
			<tr>
				<th>List of Threads</th>
			</tr>
			<?php
			$array_length = count($query_array);
			for($i=0; $i < $array_length; $i+=3){
				$z = $i+1;
				$y = $i+2;
				echo "<tr><td><a href='index.php?forumid=$forum_id&threadid=$query_array[$y]'>$query_array[$i]</a> Author: $query_array[$z]</td></tr>";
			}
			?>
		</table>
		<a href="index.php?forumid=<?php echo $forum_id; ?>&reply=true">Create new Thread</a>
		<?php
		// a case where there is an error
	} elseif(isset($_GET['threadid'])) {
		require_once "notfound.php";
	} else {
		?>

		<table>
			<tr>
				<th>Forums</th>
			</tr>
			<?php
			if(isset($_SESSION['team'])){
				$team = $_SESSION['team'];
				$name = $_SESSION['name'];
				$user = new $team($name);
			}

			$query = "SELECT forumName,forum_id FROM forumsection ORDER BY orderNo";
			$query_run = mysql_query($query);
			$num_rows = mysql_num_rows($query_run);
			$query_array = array();


			while($assoc = mysql_fetch_assoc($query_run)){
				array_push($query_array, $assoc['forumName']);
				array_push($query_array, $assoc['forum_id']);
			}
//print_r($query_array);
	//echo "<a href='index.php?forumid=$forum_id'>Up a level</a>";
			$array_length = count($query_array);

			for($i=0; $i < $array_length; $i+=2){
				$z = $i+1;
				echo "<tr><td><a href='index.php?forumid=$query_array[$z]'>$query_array[$i]</a></td></tr>";
			}
		}
		?>
	</table>
</article>