<h2>Forums</h2>
<?php

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
	echo "<div><p><a href='index.php?forumid=$query_array[$z]&page=1'>$query_array[$i]</a></div></p>";
}
?>