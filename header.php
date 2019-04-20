<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<?php 
		session_start(); 
		// If session variable is not set it will redirect to login page

		if(!isset($_SESSION['userID']) || empty($_SESSION['userID'])){

		  header("location: login.php");

		  exit;

		}

		?>

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