<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>LegoDB - the Lego Database</title>

		<link type="text/css" rel="stylesheet" href="css/normalize.css"></link>
		<link type="text/css" rel="stylesheet" href="css/style.css"></link>
		<link type="text/css" rel="stylesheet" href="guestbookstyle.css"></link>
		<script src="resources/jquery-2.0.3.js"></script>
		<script src="resources/typeahead.js"></script>
		<script src="javascript/script.js"></script>



	</head>
	<body>
		<div id="container">
			
			<header class="wrapper">
				<a href="index.php"><img src="images/logo.png" alt"LEGODB"></a>
				<?php
				include "php/form.php";
				?>
				<br>
				<nav>
					<a href="index.php">Home</a> -
					<a href="mess.php">Guestbook</a> -
            		<a href="info.php">Contact</a>
				</nav>
				
			</header>
