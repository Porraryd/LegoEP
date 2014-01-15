<?php include "php/search_functions.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>LegoDB - The Lego Database</title>

		<link type="text/css" rel="stylesheet" href="css/normalize.css"></link>
		<link type="text/css" rel="stylesheet" href="css/style.css"></link>
		<script src="resources/jquery-2.0.3.js"></script>
		<script src="resources/typeahead.js"></script>
		<script src="javascript/script.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		



	</head>
	<body>
		<div class="Absolute-Center">
			<div class="Center-Container">
				<main id="startpage">
				<a href="index.php"><img src="images/logo.png" alt"LEGODB"></a>
				<?php
					include "php/form.php";
				?>

				<br>
				<nav>
					<a href="home.php">Home</a> - 
					<a href="mess.php">Guestbook</a> - 
            		<a href="info.php">Contact/info</a>
				</nav>
				
				</main>
				<main class="wrapper">
					<div class="row cf">
				<h2> Welcome to LegoDB</h2>
				<p>Welcome to the Lego database for Lego enthusiasts around the world. Here you can search Lego sets and parts to make your Lego collection complete. 
				<h3>  The Top 10 Searches</h3>
				<?php
        		displayResults();
    		?>
					</div>
				</main>

			</div>
		</div>
	</body>
</html>

