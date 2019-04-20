
<?php

// Include config file

require_once 'initDB.php';

 

// Define variables and initialize with empty values

$ticketno = $role = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty

     $ticketno = trim($_POST["ticketno"]);

     $role = trim($_POST["role"]);

     $eventID = trim($_POST["eventID"]);


    // Validate credentials

        // Prepare a select statement
     for ($i=1; $i <= $ticketno; $i++) { 

     	 /*       $sql = 'INSERT INTO tickets (name,surname,ticketType, eventID) VALUES (\''.$name.'\',
            \''.$surname.'\',
            \''.$role.'\',
            \''.$eventID.'\')'; 
            */
                  $sql = 'INSERT INTO tickets (ticketType) VALUES (\''.$role.'\')'; 

        //$sql = "SELECT USERNAME, PASSWORD FROM users WHERE USERNAME = ?";

        
        $retval = mysqli_query($conn,$sql);

        if(! $retval ) {
          die('Could not get data: ' . mysqli_error($conn));
          echo '<p>Error: Could not get data </p>';
        }

        else{
          echo 'Success!';
          header("location: buytickets.php");
        }
     }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Booking Form HTML Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="assets/css/buytickets.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="assets/css/buytickets.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<form method="POST" action="dashboard.php">
						<div class="col-md-7 col-md-push-5">
							<div class="booking-cta">
								<h1>Book your tickets</h1>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi facere, soluta magnam consectetur molestias itaque
									ad sint fugit architecto incidunt iste culpa perspiciatis possimus voluptates aliquid consequuntur cumque quasi.
									Perspiciatis.
								</p>
							</div>
						</div>
						<div class="col-md-4 col-md-pull-7">
							<div class="booking-form">
								<form>
									<div class="form-group">
										<span class="form-label">Name</span>
										<input class="form-control" type="text" name = "name" placeholder="Please enter your name">
									</div>
									<div class="form-group">
										<span class="form-label">Surname</span>
										<input class="form-control" type="text" name = "surname" placeholder="Please enter your surname">
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<span class="form-label">No. of Tickets</span>
												<select class="form-control" name = "ticketno">
													<option>1</option>
													<option>2</option>
													<option>3</option>
												</select>
												<span class="select-arrow"></span>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<span class="form-label">Role</span>
												<select class="form-control" name = "role">
													<option>Player</option>
													<option>Spectator</option>
												</select>
												<span class="select-arrow"></span>
											</div>
										</div>
									</div>
									<div class="form-btn">
										<button class="submit-btn">Book now!</button>
									</div>
								</form>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>