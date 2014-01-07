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
			include 'php/display.php';

			//connect till databasen
			connect('lego');

			//indata från form
			if (isset($_GET["SetID"]))
				$search = $_GET["SetID"];
			else
				echo "Error occured. No ID supplied.";
			
			$setquery = query("SELECT * FROM sets WHERE 1 AND SetID = '$search'");
			
			$setassoc = mysql_fetch_assoc($setquery);

				echo "<h2>" . $setassoc["Setname"] . "</h2>";
				list($url1, $url2) = load_image($setassoc["SetID"]);
				echo "<img src='$url2' alt='No image found.' /><br>"; 
				echo "ID: " . $setassoc["SetID"] . "<br>";
				echo "Released: " . $setassoc["Year"] . "<br>";
				echo "Amount of parts: " . "" . "<br>";
				echo "Amount of unique parts: ";


			$x = query("SELECT parts.Partname, parts.PartID, inventory.Quantity
						FROM inventory 
						JOIN colors
						ON inventory.colorID = colors.ColorID 
						JOIN sets
						ON inventory.SetID = sets.SetID
						JOIN parts
						ON inventory.ItemID = parts.PartID
						WHERE 1
						AND sets.SetID='$search'
						ORDER BY `inventory`.`Quantity`  DESC 
						LIMIT 100");

			//Kontroll att resultat hittades
			if(count($x) > 0){
				echo "<table>";
				//vilka rubriker som ska visas
				$headarray = array("Partname", "PartID", "Quantity", "Pics");
				//funktion som visar resultatet från sökningen som en tabell
				display_table($x, $headarray);
				echo "</table>";

				mysql_free_result($x);
						
			}
			else{
				echo "Your search did not yield any results.";
			}

			?>
	</div>
	</main>
<?php
include "templates/footer.php";
?>