<?php

class base {

	private $mysql_host = 'localhost';
	private $mysql_user = 'root';
	private $mysql_pass = 'mg198das';
	private $mysql_db = 'scaperockn';

	public function __construct() {
		if($this->loggedin()){
			ob_start();
			session_start();
		}
		$current_file = $_SERVER['SCRIPT_NAME'];
		$http_referer = $_SERVER['HTTP_REFERER'];
		if($this->Connect()){
			echo "There has been an error, please contact the site admin.";
		}
	}

	function loggedin() {
		if(isset($_SESSION['id'])&& !empty($_SESSION['id'])){
			return true;
		}
	}
	
	function mysqlescape($item){
		$mysql = mysql_escape_string($item);
		$html = htmlspecialchars($mysql);
		$encode = urldecode($html);
		$slashed = addslashes($encode);
		return $html;
	}

	function Connect(){
		mysql_connect($this->mysql_host, $this->mysql_user, $this->mysql_pass) && mysql_select_db($this->mysql_db); 
	}

	function logout(){
		session_destroy();
	}
}

class Member extends base {

	private $id;
	public $name;
	public $team;

	function __construct() {
		$this->id = $_SESSION['id'];
		$this->name = $_SESSION['name'];
		$this->team = $_SESSION['team'];
	}

	public function getName(){
		return $this->name;
	}

	protected function getId() {
		return $this->id;
	}

	public function getTeamName(){
		return $this->team;
	}

	public function hidden($forumid, $threadid, $team){
		if($this->team == 'SL' || $this->team == 'Community'){
			return 'false';
		} else {
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

	public function getpostcount($id){
		$posts = "SELECT Posts from Users WHERE Id=$id";
		$postquery = mysql_query($posts);
		return mysql_result($postquery, 0);
	}

	public function gettop($pagenum){
		return $top = $pagenum * 10;
	}

		public function getbottom($pagenum){
		$top = $this->gettop($pagenum);
		return $bottom = $top - 9;
	}
}

class Media extends Member {
	function __construct() {
		parent::__construct();
	}
}

class Community extends Member {
	function __construct() {
		parent::__construct();
	}

	function deleteThread(){
		echo "<a href='delete.php'>Hide/Unhide this thread</a>";
	}

	function lockThread(){
		echo " <a href='lock.php'>Lock/Unlock this thread</a>";
	}

	function deletePost($post_id){
		return "<a href='index.php?deletepost=$post_id&show=hidden'>hide</a>";
	}
	function showPost($postid){
		return "<a href='index.php?deletepost=$postid&show=open'>Show</a>";
	}
}

class SL extends Community {
	function __construct() {
		parent::__construct();
	}
}

?>