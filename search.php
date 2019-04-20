<?php
require_once 'initDB.php';

if(empty(trim($_POST["term"]))){
	$sql = "SELECT * FROM events";
}
else{
	$sql = "SELECT * FROM events WHERE name LIKE '%".trim($_POST["term"])."%';";
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
			<a href='#' class='image'><img src='images/pic01.jpg' alt='' /></a>
			<h3>{$row['name']}</h3>
			<p>{$row['description']}</p>
			<ul class='actions'>
				<li><a href='#' class='button'>More</a></li>
			</ul>
		</article>"; 
	}
}

echo $resultmin;
?>