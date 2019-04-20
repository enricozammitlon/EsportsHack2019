<!-- Header -->
<header id="header">
	<!-- Search -->

<section id="search" class="alt">
	<form method="post" action="#">
		<input type="text" name="query" id="query" placeholder="Search" />
	</form>
</section>

</header>

<!-- Section -->
<section id="eventResults">
	<header class="major">
		<h2>Your tickets</h2>
	</header>
	<div id="search-results" class="posts">
		<?php 
			require_once 'initDB.php';

			if($_SERVER["REQUEST_METHOD"] == "POST"){
				session_start(); 
				$sql = "SELECT events.name, events.description , tickets.ticketType FROM events INNER JOIN tickets WHERE events.eventID = tickets.eventID AND tickets.ticketType = '".$_POST['type']."' AND tickets.userID = ".$_SESSION["userID"]."";
			}
	        $retval = mysqli_query($conn,$sql);

			if(! $retval ) {
			  die('Could not get data: ' . mysqli_error($conn));
			  echo '<p>Error: Could not get data </p>';
			}

			else{
				while($row = mysqli_fetch_assoc($retval)) {
					echo "<article>
						<a href='#' class='image'><img src='images/pic01.jpg' alt='' /></a>
						<h3>{$row['name']}</h3>
						<p>{$row['description']}</p>
						<ul class='actions'>
							<li><a href='#' class='button'>More</a></li>
						</ul>
					</article>"; 
				}
			}
		?>
	</div>
</section>