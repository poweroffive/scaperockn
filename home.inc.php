<article>
<?php 

if($user->loggedin()){
	echo "Hello ".$_SESSION['name'].'<br>';
} else {
	echo "Please log in <a href='login.php'>here</a><br>";
}
	
	/*$query = "SELECT message, subject from frontpage";
	$query_run = mysql_query($query);
	$mysql_array = mysql_fetch_array($query_run);
	print_r($mysql_array);
	$count = count($mysql_array);
	for($i = 0; $i < $count; $i += 2 ) {
		$z = $i+=1;
		//echo '<h1>'$mysql_array['1'].'</h1><br>'.$mysql_array['2'];
	}*/

?>
</article>