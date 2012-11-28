<?php

require '/core.inc.php';

?>

<form method="GET">
	<textarea name="message" maxlength="20"></textarea>
	<input type="submit" value="Reply">
</form>
<?php

echo $_SESSION['posted'];

$query = "INSERT INTO postsection VALUES ('','$thread_id','$_SESSION[user_id]','insert message here','Insert todays date', '$forum_id')";

?>

