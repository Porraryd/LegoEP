<?php
include "templates/header.php";
?>
	<main class="wrapper">
		<div class="row cf">
			<?php
			include 'php/db_connect.php';
			include 'php/display.php';

			//connect till databasen
			connect('lego');

			//indata från form
			if (isset($_GET["PartID"]))
				$search = $_GET["PartID"];
			else
				echo "Error occured. No ID supplied.";
			
			//info om parten
			$setquery = query("SELECT parts.Partname, parts.PartID
							   FROM inventory 
							   JOIN parts
							   ON inventory.ItemID = parts.PartID 
							   WHERE 1 
							   AND parts.PartID = '$search'");
			
			$setassoc = mysql_fetch_assoc($setquery);

				echo "<h2>" . $setassoc["Partname"] . "</h2>";
				list($url1, $url2) = load_image($setassoc["PartID"], 1);
				echo "<img src='$url2' alt='No image found.' /><br>"; 
				echo "ID: " . $setassoc["PartID"] . "<br>";
				echo "Amount of parts: " . "" . "<br>";
				echo "Amount of unique parts: ";

			//vilka sets som parten ingår i
			$x = query("SELECT sets.Setname, sets.SetID, sets.Year, categories.Categoryname
						FROM inventory 
						JOIN sets
						ON inventory.SetID = sets.SetID
						JOIN categories
						ON categories.CatID = sets.CatID 
						JOIN parts
						ON inventory.ItemID = parts.PartID
						WHERE 1
						AND parts.PartID='$search'
						ORDER BY `inventory`.`Quantity`  DESC 
						LIMIT 10");

			//Kontroll att resultat hittades
			if(mysql_num_rows($x) > 0){
				//funktion som visar resultatet från sökningen som en tabell
				display_set_table($x);

				mysql_free_result($x);
						
			}
			else{
				echo "<br><br><span class='list_title'>We could not find any sets that includes this part.</span>";
			}

			?>
	</div>
	</main>
<?php
include "templates/footer.php";
?>