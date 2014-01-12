<?php include "php/search_functions.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Projekt EP!</title>

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
				<div id="startpage">
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
				</div>
			</div>
		</div>
	</body>
</html>

