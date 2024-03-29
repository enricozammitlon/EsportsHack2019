<!-- Header -->
<header id="header">
	<!-- Search -->

<section id="search" class="alt">
	<form method="post" action="#">
		<input type="text" name="query" id="query" placeholder="Search" />
	</form>
	<div class="col-sm-4">
			<div class="form-group">
				<span class="form-label">Sort by...</span>
				<select id="sorter" class="form-control" name = "filterby">
					<option>Sort by No. of spectators (asc)</option>
					<option>Sort by No. of spectators (desc)</option>
					<option>Sort by Location (asc)</option>
					<option>Sort by Location (desc)</option>
				</select>
				<span class="select-arrow"></span>
			</div>
		</div></section>

</header>

<!-- Section 	EventPics/'.$row['eventID'].' -->
<section id="eventResults">
	<header class="major">
		<h2>All events</h2>
	</header>
	<div id="search-results" class="posts">
		<?php 
			require_once 'initDB.php';

			if($_SERVER["REQUEST_METHOD"] == "POST"){
				session_start(); 
				$sql = 'SELECT * FROM events WHERE managerID = '.$_SESSION["userID"].'';
			}
			else{
	        	$sql = 'SELECT * FROM events ';
	        }
	        $retval = mysqli_query($conn,$sql);

			if(! $retval ) {
			  die('Could not get data: ' . mysqli_error($conn));
			  echo '<p>Error: Could not get data </p>';
			}

			else{
				while($row = mysqli_fetch_assoc($retval)) {
					echo "<article>
						<a href='#' class='image'><img src='images/EventPics/".$row['eventID'].".jpg' alt='' /></a> 	
						<h3>{$row['name']}</h3>
						<p>{$row['description']}</p>
						<ul class='actions'>
							<li><a href='#' class='button'>More</a></li>
							<button id={$row['eventID']} onClick = 'buyTicket(this.id)''>Buy Ticket</button>
						</ul>
					</article>"; 
				}
			}
		?>
	</div>
</section>