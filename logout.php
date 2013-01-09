<?php
require_once "core.inc.php";
$connect->logout();
header("Location: $http_referer");

?>