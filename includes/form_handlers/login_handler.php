<?php  


if(isset($_POST['login_button'])) {

	$email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL); //sanitize email

	$_SESSION['log_email'] = $email; //Store email into session variable 
	$password = md5($_POST['log_password']); //Get password

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$check_database_query = mysqli_query($connection, $query);
	$check_login_query = mysqli_num_rows($check_database_query);

	if($check_login_query == 1) {
		$row = mysqli_fetch_array($check_database_query);
        $username = $row['username'];
        
        $query = "SELECT * FROM users WHERE email='$email' AND user_closed='yes'";
        $user_closed_query = mysqli_query($connection, $query);
        
		if(mysqli_num_rows($user_closed_query) == 1) {
            $query = "UPDATE users SET user_closed='no' WHERE email='$email'";
			$reopen_account = mysqli_query($connection, $query);
		}

		$_SESSION['username'] = $username;
		header("Location: index.php");
		exit();
	}
	else {
		array_push($error_array, "Email or password was incorrect<br>");
	}


}

?>