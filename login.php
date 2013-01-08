<?php

require_once "core.inc.php";

if($user->loggedin()){
	header('Location: index.php');
}

require 'header.inc.php';
require 'nav.inc.php';
require 'login.inc.php';

require 'footer.inc.php';

?>