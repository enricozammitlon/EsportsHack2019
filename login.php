

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

        $sql = "SELECT USERNAME, PASSWORD FROM users WHERE USERNAME = ?";

        

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
                            $sql = 'SELECT UID,NAME FROM users WHERE USERNAME = \''.$username.'\'';

                            $retval = mysqli_query($conn,$sql);

                            if(! $retval ) {
                              die('Could not get data: ' . mysqli_error());
                              echo '<p>Error: Could not get data </p>';
                            }    
                            $row=mysqli_fetch_assoc($retval);
                            session_start();
                            $_SESSION['userID'] = $row['UID'];
                            $_SESSION['uName'] = $row['NAME'];
                            header("location: dashboard.php");

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

 

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Login</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

    <style type="text/css">

        .status-section{
            display:none;
        }


        body{ font: 14px sans-serif; justify-content: center;display: flex;background: #151515;padding-top: 100px;}

        .wrapper{ width: 350px; padding: 20px; background: white;}

    </style>

</head>

<body>

    <div class="wrapper">

        <h2>Login</h2>

        <p>Please fill in your credentials to login.</p>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">

                <label>Username</label>

                <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">

                <span class="help-block"><?php echo $username_err; ?></span>

            </div>    

            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">

                <label>Password</label>

                <input type="password" name="password" class="form-control">

                <span class="help-block"><?php echo $password_err; ?></span>

            </div>

            <div class="form-group">

                <input type="submit" class="btn btn-primary" value="Login">

            </div>

            <p>Don't have an account?<br>Please register <a href="registration.php">here</a>.</p>

        </form>

    </div>    

</body>

</html>

