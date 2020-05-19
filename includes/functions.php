<?php

    function confirmQuery($result) {

    global $db;
    if(!$result) { 
    die("QUERY FAILED " . mysqli_error($db));
  }
}

// escape string
function escapeString($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE user_id = $id ";
	$result = mysqli_query($db, $query);

	$id = mysqli_fetch_assoc($result);
	return $id;
}

$username = "";
$email    = "";
$errors   = array(); 

function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email;

	// receive all input values from the form. Call the e() function
    // to escape form values
	$username    =  escapeString($_POST['user_name']);
	$email       =  escapeString($_POST['user_email']);
	$password_1  =  escapeString($_POST['user_password']);
	$password_2  =  escapeString($_POST['user_password_1']);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required");
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 !== $password_2) {
		array_push($errors, "Two passwords do not match");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		
		// $password = password_hash($password1, PASSWORD_DEFAULT);
		$password = md5($password_1);
		
			$query = "INSERT INTO users (user_name, user_password, user_email) 
					  VALUES('{$username}', '{$password}', '{$email}')";
			mysqli_query($db, $query);

        // get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

            $_SESSION['user_id'] = $logged_in_user_id; // put logged in user in session
            $_SESSION['user_name'] = $username;
            $_SESSION['user_email'] = $email;
            $_SESSION['user_type'] = $user_type;
			header('Location: ../index.php');				
		
	}
}

?>
