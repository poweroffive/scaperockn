<article>
        <?php 
        if ( isset($_POST['usrname']) && isset($_POST['passwrd']) ) {
                $passwrd = $_POST['passwrd'];
                $usrname = $_POST['usrname'];
                if(empty($passwrd) || empty($usrname)){
                        echo "Please complete both fields";
                }
                if(!empty($usrname) && !empty($passwrd)){
                        if(strlen($usrname)>20){
                                echo 'Limits are set for a reason, Adhear to them.';
                        } else {
                                $passwrd_hash = md5($passwrd);
                                $query = "SELECT Username, Id, Team from Users where Username='".mysql_escape_string($usrname)."' and Password='".mysql_escape_string($passwrd_hash)."'";
                                $query_run = mysql_query($query);
                                $query_array = mysql_fetch_assoc($query_run);
                                $query_num_rows = mysql_num_rows($query_run);

                                if($query_num_rows == 0 ) {
                                        echo "Please enter a valid Username and Password.";
                                } elseif($query_num_rows == 1) {
                                        $_SESSION['id'] = $query_array['Id'];
                                        $_SESSION['team'] = $query_array['Team'];
                                        $_SESSION['name'] = $query_array['Username'];
                                        if ($team === 'Media') {
                                                $user = new Media($query_array['Username']);
                                                $user->getTeamName();
                                        } elseif ($team === 'SL') {
                                                $user = new SL($query_array['Username']);
                                                $user->getTeamName();
                                        } elseif ($team === 'Events') {
                                                $user = new Events($query_array['Username']);
                                                $user->getTeamName();
                                        } elseif ($team === 'Community') {
                                                $user = new Community($query_array['Username']);
                                                $user->getTeamName();
                                        }
                                } else {
                                        echo "There has been an error. Please Contact the site admin for support.";
                                }
                        }
                }
        }
        ?>
        <p>Please log in</p>
        <form action="login.php" method="POST" >
                <label for="usrname">Username:</label>
                <input type="text" maxlength="20" name="usrname">
                <label for="pass">Password:</label>
                <input type="password" name="passwrd">
                <input type="submit" value="Submit">
        </form>
        <?php

        if(!empty($_SESSION['team'])){
                header("Location: index.php");
        }

        ?>
</article>