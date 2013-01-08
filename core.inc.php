<?php
ob_start();
session_start();

require_once "class_lib.php";
$current_file = $_SERVER['SCRIPT_NAME'];
$http_referer = $_SERVER['HTTP_REFERER'];

$connect = new base();

$user = new Member();

?>