
<?php

// Include config file

require_once 'initDB.php';

 

// Define variables and initialize with empty values

$eventName = $eventLoc =  $description = $startDate = $endDate = $playerCap = $specCap = $playerPrice = $specPrice = $managerID = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty

     $eventName = trim($_POST["eventName"]);

    // Check if password is empty

     $eventLoc = trim($_POST["eventLoc"]);

     $description = trim($_POST["description"]);

     $startDate = trim($_POST["startDate"]);

     $endDate = trim($_POST["endDate"]);

     $playerCap = trim($_POST["playerCap"]);

     $specCap = trim($_POST["specCap"]);

     $playerPrice = trim($_POST["playerPrice"]);

     $specPrice = trim($_POST["specPrice"]);

     $managerID = 1;

     //$managerID = $_SESSION['userID'] 

    // Validate credentials
        // Prepare a select statement
     	 /*       $sql = 'INSERT INTO tickets (name,surname,ticketType, eventID) VALUES (\''.$name.'\',
            \''.$surname.'\',
            \''.$role.'\',
            \''.$eventID.'\')'; 		$_SESSION['userID'] 
            */
        $sql = 'INSERT INTO events (name, eventLoc, managerID, description, specNo, playerNo, specPrice, playerPrice, startDate, endDate) 
        	VALUES (\''.$eventName.'\',
            \''.$eventLoc.'\',
            \''.$managerID.'\',
            \''.$description.'\',
            \''.$specCap.'\',
            \''.$playerCap.'\',
            \''.$specPrice.'\',
            \''.$playerPrice.'\',
            \''.$startDate.'\',
            \''.$endDate.'\')'; 

        //$sql = "SELECT USERNAME, PASSWORD FROM users WHERE USERNAME = ?";

        
        $retval = mysqli_query($conn,$sql);

        if(! $retval ) {
          die('Could not get data: ' . mysqli_error($conn));
          echo '<p>Error: Could not get data </p>';
        }

        else{
          echo 'Success!';
          header("location: createEvent.php");
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
	<link type="text/css" rel="stylesheet" href="assets/css/createEvent.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="assets/css/createEvent.css" />

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
					<form method="POST" action="createEvent.php">
						<div class="col-md-7 col-md-push-5">
							<div class="booking-cta">
								<h1>Create your Event</h1>
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
										<span class="form-label">Event Name</span>
										<input class="form-control" type="text" name = "eventName" required placeholder="Please enter your event name">
									</div>
									<div class="form-group">
										<span class="form-label">Event Location</span>
										<input class="form-control" type="text" required name = "eventLoc" placeholder="Please enter your event location">
									</div>
									
									<div class="form-group">
										<span class="form-label">Description</span>
										<input class="form-control" type="text" required name = "description" placeholder="Please enter a brief description">
									</div>
									
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<span class="form-label">Start Date</span>
												<input class="form-control" type="date" required name = "startDate">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<span class="form-label">End Date</span>
												<input class="form-control" type="date" required name = "endDate">
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<span class="form-label">Player Capacity</span>
												<input class="form-control" type="text" required name = "playerCap" placeholder="100">
											</div>
										</div>		
										<div class="col-sm-6">
											<div class="form-group">
												<span class="form-label">Spectator Capacity</span>
												<input class="form-control" type="text" required name = "specCap" placeholder="200">
											</div>
										</div>
									</div>


									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<span class="form-label">Player Prices</span>
												<input class="form-control" type="text" name = "playerPrice" required placeholder="15">
											</div>
										</div>		
										<div class="col-sm-6">
											<div class="form-group">
												<span class="form-label">Spectator Prices</span>
												<input class="form-control" type="text" name = "specPrice" required placeholder="10">
											</div>
										</div>
									</div>		
									
									<div class="form-btn">
										<button class="submit-btn">Submit event!</button>
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