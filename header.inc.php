<head>
	<link rel="stylesheet" type="text/css" href="/style.css">
</head>
<div class="container">
<header>

<?php

	if(loggedin()){
		$username = getuserfield('Username');
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
</header>