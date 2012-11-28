<?php

require "core.inc.php";
require 'header.inc.php';
require "nav.inc.php";
echo "<article>";
if(loggedin()){
	$header("Location: index.php");
} else {
	require "register.inc.php";
}
echo "</article>";

require 'footer.inc.php';

?>
