<?php include "php/search_functions.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>LegoDB - The Lego Database</title>

		<link type="text/css" rel="stylesheet" href="css/normalize.css"></link>
		<link type="text/css" rel="stylesheet" href="css/style.css"></link>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,800' rel='stylesheet' type='text/css'>
		<script src="resources/jquery-2.0.3.js"></script>
		<script src="resources/typeahead.js"></script>
		<script src="javascript/script.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		



	</head>
	<body>
		<div id="startpage">
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
			</div>

		<main class="wrapper">
			<div class="row cf">
				<div class="twothirds">
				<h2> Welcome to LegoDB</h2>
				<p>Welcome to the Lego database for Lego enthusiasts around the world. Here you can search Lego sets and parts to make your Lego collection complete. 
				</div>

				<div class="onethird">
				<h3>Top 10 Searches</h3>
				<?php
				displayResults();
		?>		</div>
			</div>
		</main>

			</div>
		</div>
	</body>
</html>

