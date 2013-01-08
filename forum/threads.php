<?php
$_SESSION['forumid'] = $forumid;
$forum_id = $forumid;
$query = "SELECT threadsection.subject, Users.Username, threadsection.thread_id, threadsection.status from threadsection join forumsection JOIN Users on threadsection.forum_id=forumsection.forum_id AND Users.Id=threadsection.author_id where threadsection.forum_id=$forum_id ORDER BY threadsection.thread_id DESC;";
$query_run = mysql_query($query);
$num_rows = mysql_num_rows($query_run);
$query_array = array();
if($num_rows > 0){
while($assoc = mysql_fetch_assoc($query_run)){
	array_push($query_array, $assoc['subject']);
	array_push($query_array, $assoc['Username']);
	array_push($query_array, $assoc['thread_id']);
	array_push($query_array, $assoc['status']);
}
}
echo "<a href='index.php'>Forums</a>";
	//print_r($query_array);
?>


<h3>List of Threads</h3>
<?php
if($num_rows > 0){
$array_length = count($query_array);
for($i=0; $i < $array_length; $i+=4){
	$z = $i+1;
	$y = $i+2;
	$status = $i+3;
	if($query_array[$status] == 'closed'){
		if($team == "SL" || $team == "Community"){
			echo "<div><p>Hidden Thread: <a href='index.php?forumid=$forum_id&threadid=$query_array[$y]'>$query_array[$i]</a> Author: $query_array[$z]</p></div>";
		} else {
		echo "<div><p>Thread Hidden</p></div>";
	}
	} else {
		echo "<div><p><a href='index.php?forumid=$forum_id&threadid=$query_array[$y]'>$query_array[$i]</a> Author: $query_array[$z]</p></div>";
	}
}
} else {
	echo "No threads exist for this forum";
}
?>
<?php 
if($user->loggedin()){
	?>
	<p><a href="index.php?forumid=<?php echo $forum_id; ?>&reply=true">Create new Thread</a></p>
	<?php
} else {
	echo "<P>Please <a href='/login.php'>login</a> to create a thread</P>";
}

?>