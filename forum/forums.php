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
?>
</table>