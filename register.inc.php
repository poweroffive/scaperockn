<h1>'ScapeRock'N</h1>

<?php
	if (isset($_POST['user']) && isset($_POST['pass'])) {
		$user = $_POST['user'];
		$pass = $_POST['pass'];

		if(!empty($user) && !empty($pass)){
			if(strlen($user)>20){
				echo 'Limits are set for a reason, Please Adhear to them.';
			} else {

				$date = date('Y-m-d');
				$query_check = "SELECT Username FROM Users WHERE Username='".mysql_escape_string($user)."' OR Username='".mysql_escape_string($username)."'";
				$query_run_check = mysql_query($query_check);
				$num_rows_query_check = mysql_num_rows($query_run_check);
				
				if($num_rows_query_check > 0) {
					echo "That Username already exists in the system, Please choose another";
				} else {
					$pass_hash = md5($pass);
					$query = "INSERT INTO Users VALUES ('".mysql_escape_string($user)."', '".mysql_escape_string($pass_hash)."','','','$date','','','','User')";
					$query_run = mysql_query($query);
					header("Location: index.php");
				}
			}
		} else {
			echo "Please fill in both fields";
		}
	}

?>
<p>Please complete the form to sign up for scaperockn</p>
<form action="register.php" method="POST">
	<label for="user">Username:</label>
	<input type="text" maxlength="20" name="user" value="<?php echo $user; ?>">
	<label for="user">Password:</label>
	<input type="password" name="pass">
	<input type="submit" value="Submit">
</form>