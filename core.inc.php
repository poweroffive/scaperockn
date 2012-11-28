<?php
ob_start();
session_start();

require_once "class_lib.php";
$current_file = $_SERVER['SCRIPT_NAME'];
$http_referer = $_SERVER['HTTP_REFERER'];

$connect = new base();

function loggedin() {
	if(isset($_SESSION['user_id'])&& !empty($_SESSION['user_id'])){
		return true;
	}
}

function getuserfield($field) {
	$query = "SELECT $field FROM Users WHERE id='".$_SESSION['user_id']."'";
	if($query_run = mysql_query($query)) {
		if($query_result = mysql_result($query_run, 0, $field)){
			return $query_result;
		}
	}
}

function ipost($ipost){
	return 'isset($_POST['.$ipost.'])';
}

?>