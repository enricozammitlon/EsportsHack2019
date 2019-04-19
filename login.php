
<?php

// Include config file

require_once 'initDB.php';

 

// Define variables and initialize with empty values

$username = $password = "";

$username_err = $password_err = "";

 

// Processing form data when form is submitted

if($_SERVER["REQUEST_METHOD"] == "POST"){

 

    // Check if username is empty

    if(empty(trim($_POST["username"]))){

        $username_err = 'Please enter username.';

    } else{

        $username = trim($_POST["username"]);

    }

    

    // Check if password is empty

    if(empty(trim($_POST['password']))){

        $password_err = 'Please enter your password.';

    } else{

        $password = trim($_POST['password']);

    }

    

    // Validate credentials

    if(empty($username_err) && empty($password_err)){

        // Prepare a select statement

        $sql = "SELECT username, password FROM users WHERE username = ?";

        

        if($stmt = mysqli_prepare($conn, $sql)){

            // Bind variables to the prepared statement as parameters

            mysqli_stmt_bind_param($stmt, "s", $param_username);

            

            // Set parameters

            $param_username = $username;

            

            // Attempt to execute the prepared statement

            if(mysqli_stmt_execute($stmt)){

                // Store result

                mysqli_stmt_store_result($stmt);

                

                // Check if username exists, if yes then verify password

                if(mysqli_stmt_num_rows($stmt) == 1){                    

                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password);

                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){

                            /* Password is correct, so start a new session and

                            save the username to the session */

                            session_start();

                            $_SESSION['username'] = $username;
                            $sql = 'SELECT UID,name FROM users WHERE username = \''.$username.'\'';

                            $retval = mysqli_query($conn,$sql);

                            if(! $retval ) {
                              die('Could not get data: ' . mysqli_error());
                              echo '<p>Error: Could not get data </p>';
                            }    
                            $row=mysqli_fetch_assoc($retval);
                            $_SESSION['userID'] = $row['UID'];
                            $_SESSION['uName'] = $row['name'];
                            header("location: index.php");

                        } else{

                            // Display an error message if password is not valid

                            $password_err = 'The password you entered was not valid.'.$hashed_password;

                        }

                    }

                } else{

                    // Display an error message if username doesn't exist

                    $username_err = 'No account found with that username.';

                }

            } else{

                echo "Oops! Something went wrong. Please try again later.";

            }

        }

        else{
        	echo "Oops! Something went wrong af. Please try again later.";

        }        

        // Close statement

        mysqli_stmt_close($stmt);

    }
}

?>

<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
<div class="login-page">
  <div class="form">
    <form class="login-form" action="welcome.php" method="post">
      <input type="text" placeholder="username"/>
      <input type="password" placeholder="password"/>
      <button>login</button>
      <p class="message">Not registered? <a href="registration.html">Create an account</a></p>
    </form>
  </div>
</div>
</body>
</html>