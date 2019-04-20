<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<?php session_start(); ?>

		<title>Dashboard</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/dashboard.css" />
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">
							<div class="topnav">
								<button id="organiser" onClick = 'updateMenu(this.id)'>Organiser</button>
								<button id="sponsor" onClick = 'updateMenu(this.id)'>Sponsor</button>
								<button id="player" onClick = 'updateMenu(this.id)'>Player</button>					
								<button id="spectator" onClick = 'updateMenu(this.id)'>Spectator</button>
							</div>
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
								<section>
									<header class="major">
										<h2>All events</h2>
									</header>
									<div id="search-results" class="posts">
										<?php 
											require_once 'initDB.php';

									        $sql = 'SELECT * FROM events ';
									        $retval = mysqli_query($conn,$sql);

											if(! $retval ) {
											  die('Could not get data: ' . mysqli_error());
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

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<!-- Menu -->
								<nav id="menu">
									<header class="major">
										<h2>Welcome back <?php echo $_SESSION['uName']?></h2>
									</header>
									<ul id="menu-list">
									</ul>
								</nav>
						</div>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util2.js"></script>
			<script src="assets/js/main2.js"></script>

	</body>
</html>

<script>
function delay(callback, ms) {
  var timer = 0;
  return function() {
    var context = this, args = arguments;
    clearTimeout(timer);
    timer = setTimeout(function () {
      callback.apply(context, args);
    }, ms || 0);
  };
}

$('#query').keyup(delay(function (e) {
  var request = $.ajax({
   		url: 'search.php',
   		type: 'post',
   		data: { 
        "term": this.value,
    	}
 	});
 
	request.done( function ( data ) {
 		$('#search-results').html( data );
 	});
 
	request.fail( function ( jqXHR, textStatus) {
 		console.log( 'Sorry: ' + textStatus );
 	});
}, 500));

function updateMenu(theID){
  	var request = $.ajax({
   		url: theID+'Menu.php',
   		type: 'get',
   		dataType: 'html'
 	});
 
	request.done( function ( data ) {
 		$('#menu-list').html( data );
 	});
 
	request.fail( function ( jqXHR, textStatus) {
 		console.log( 'Sorry: ' + textStatus );
 	});
 
}
 
</script>