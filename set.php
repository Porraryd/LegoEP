<?php
include "templates/header.php";
?>
	<main class="wrapper">
	<?php
	include "php/form.php";
	?>
	<div class="row cf">
	<?php
	include 'php/db_connect.php';

	//connect till databasen
	connect('lego');

	//indata från form
	if (isset($_GET["id"]))
		$id = $_GET["id"];
	else
		$id = "1791-1";

	//Hittar det SET vi ska visa. 
	$x = query("SELECT * FROM sets WHERE 1 AND SetID = '$id'");

	//Kontroll att resultat hittades
	if(count($x) > 0)
	{
		$setassoc = mysql_fetch_assoc($x);

		echo "Setname: " . $setassoc["Setname"] . "<br>"; 
		echo "SetID: " . $setassoc["SetID"]; 

		mysql_free_result($x);

				
	}
	else
	{
		echo "Your search did not yield any results.";
	}
	?>
	</div>
	</main>

<?php
include "templates/footer.php";
?>
