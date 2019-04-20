<?php 
	require_once 'initDB.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$sql="";
     $choice = trim($_POST["filterby"]);
		if ($choice == "Sort by No. of spectators (asc)"){
			$sql = 'SELECT * FROM events ORDER BY specNo ASC';
		}
		else if ($choice == "Sort by No. of spectators (desc)"){
			$sql = 'SELECT * FROM events ORDER BY specNo DESC';
		}
		else if ($choice == "Sort by Location (asc)"){
			$sql = 'SELECT * FROM events ORDER BY eventLoc ASC';
		}
		else if ($choice == "Sort by Location (desc)"){
			$sql = 'SELECT * FROM events ORDER BY eventLoc DESC';
		}

	$retval = mysqli_query($conn,$sql);

	if(! $retval ) {
	  die('Could not get data: ' . mysqli_error($conn));
	  echo '<p>Error: Could not get data </p>';
	}

	else{
		$resultmin='';
		while($row = mysqli_fetch_assoc($retval)) {
			$resultmin .= "<article>
				<a href='#' class='image'><img src='images/EventPics/".$row['eventID'].".jpg' alt='' /></a> 	
				<h3>{$row['name']}</h3>
				<p>{$row['description']}</p>
				<ul class='actions'>
					<li><a href='#' class='button'>More</a></li>
				</ul>
			</article>"; 
		}
	}
	echo $resultmin;
}
?>

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
		</div>
