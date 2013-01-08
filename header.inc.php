<head>
	<link rel="stylesheet" type="text/css" href="/style.css">
	<title>ScapeRock'n</title>
</head>
<div class="container">
<header>

<?php

	if($user->loggedin()){
		$username = $user->getName();
		echo '<p>Hello '.$username.'</p>';
?>
		<p><a class='left' href='/logout.php'>Log Out</a></p>
<?php
	} else {
?>
		<p>Hello Please <a href="/login.php">log in</a></p>
		<p class='left' id='left' >Welcome to 'ScapeRock'N</p>
<?php

	}

?>
<img class="header" src="http://placehold.it/850x150">
</header>