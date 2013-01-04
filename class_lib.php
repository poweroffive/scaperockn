<?php

class base {

	private $mysql_host = 'localhost';
	private $mysql_user = 'root';
	private $mysql_pass = 'mg198das';
	private $mysql_db = 'scaperockn';

	public function __construct() {
		ob_start();
		session_start();
		$current_file = $_SERVER['SCRIPT_NAME'];
		$http_referer = $_SERVER['HTTP_REFERER'];
		if($this->Connect()){
			echo "There has been an error, please contact the site admin.";
		} else {
			echo $this->db_host;
		}
	}

	function loggedin() {
		if(isset($_SESSION['user_id'])&& !empty($_SESSION['user_id'])){
			return true;
		}
	}

	function Connect(){
		mysql_connect($this->mysql_host, $this->mysql_user, $this->mysql_pass) && mysql_select_db($this->mysql_db); 
	}

	function getuserfield($field) {
		$query = "SELECT $field FROM Users WHERE id='".$_SESSION['user_id']."'";
		if($query_run = mysql_query($query)) {
			if($query_result = mysql_result($query_run, 0, $field)){
				return $query_result;
			}
		}
	}

	function logout(){
		session_destroy();
	}
}



class baseUser extends base {

	public $name;
	public $team;

	function __construct($persons_name) {
		$this->name = $persons_name;
	}

	public function getName(){
		return $this->name;
	}

	public function getTeamName(){
		return $this->team;
	}
}

class Media extends baseUser {
	function __construct($persons_name) {
		parent::__construct($persons_name);
		$this->team = "Media";
		$_SESSION['team'] = $this->team;
		$_SESSION['name'] = $this->name;
	}
}

class SL extends baseUser {
	function __construct($persons_name) {
		parent::__construct($persons_name);
		$this->team = "SL";
		$_SESSION['team']=$this->team;
		$_SESSION['name'] = $this->name;
	}

	function deleteThread(){
		echo "<a href='delete.php'>Delete this thread</a>";
	}

	function lockThread(){
		echo " <a href='lock.php'>Lock/Unlock this thread</a>";
	}

	function deletePost($post_id){
		return "<a href='index.php?deletepost=$post_id'>Delete</a>";
	}
}

class Community extends baseUser {
	function __construct($persons_name) {
		parent::__construct($persons_name);
		$this->team = "Community";
		$_SESSION['team'] = $this->team;
		$_SESSION['name'] = $this->name;
	}

	function deleteThread(){
		echo "<a href='delete.php'>Delete this thread</a>";
	}

	function lockThread(){
		echo " <a href='lock.php'>Lock/Unlock this thread</a>";
	}

	function deletePost($post_id){
		$forumid = $_GET['forumid'];
		$threadid = $_GET['threadid'];
		echo "<a href='index.php?forumid=$forumid&threadid=$threadid&deletepost=$post_id'>Delete</a>";
	}
}

class Events extends baseUser {
	function __construct($persons_name) {
		parent::__construct($persons_name);
		$this->team = "Events";
		$_SESSION['team']=$this->team;
		$_SESSION['name'] = $this->name;
	}
}

function Team($team){
	$query = "SELECT Username from Users where team='$team'";
	$query_run = mysql_query($query);
	$array = mysql_fetch_assoc($query_run);

	foreach ($array as $key) {
		echo "<div class=$team>".$key." is a member of $team</div>";
	}
}

function hidden($forumid, $threadid, $team){
	if($team != "SL" || $team != "Community"){
		$query = "SELECT status FROM threadsection WHERE forum_id=$forumid AND thread_id=$threadid";
		$query_run = mysql_query($query);
		if($query_run){
			$return = mysql_result($query_run, 0);
			if($return == 'closed'){
				echo "<div><h3>Thread not found</p><a href='/forum/'>Click here to return to the forum index</a></div>";
				return 'true';
			} else {
				return 'false';
			}
		}
	}
}
?>