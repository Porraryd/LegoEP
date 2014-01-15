<?php
include "templates/header.php";
?>
	<main class="wrapper">
		<div class="row cf">
			<?php
			include 'php/db_connect.php';
			include 'php/display.php';
			include 'php/pagination.php';

			//connect till databasen
			connect('lego');

			//indata från form
			if (isset($_GET["SetID"]))
				$search = $_GET["SetID"];
			else
				echo "Error occured. No ID supplied.";

			//Check page and set to 1 if not found
			$ITEMS_PER_PAGE = 20;
			if (isset($_GET["page"])){
				$page = $_GET["page"];
			}else{
				$page = 1;
			}
			$start_from = ($page-1)*$ITEMS_PER_PAGE;

			$setquery = query("SELECT COUNT(inventory.itemID) AS Unika, SUM(inventory.Quantity) AS Alla , sets.*
								FROM inventory
								JOIN sets
								ON inventory.SetID=sets.SetID
								WHERE 1
								AND inventory.SetID='$search'");
			
			$setassoc = mysql_fetch_assoc($setquery);

				echo "<h2>" . $setassoc["Setname"] . "</h2>";
				list($url1, $url2) = load_image($setassoc["SetID"], 0);
				echo "<img src='$url2' alt='No image found.' /><br>"; 
				echo "ID: " . $setassoc["SetID"] . "<br>";
				echo "Released: " . $setassoc["Year"] . "<br>";
				echo "Amount of parts: " . $setassoc["Unika"] . "<br>";
				echo "Amount of unique parts: " . $setassoc["Alla"];


			$x = query("SELECT inventory.Quantity, inventory.itemTypeID, minifigs.Minifigname as Partname, minifigs.minifigID as PartID, colors.colorID, colors.Colorname
						FROM inventory 
						JOIN colors
						ON inventory.colorID = colors.ColorID 
						JOIN sets
						ON inventory.SetID = sets.SetID
						JOIN minifigs
						ON inventory.ItemID = minifigs.MinifigID
						WHERE 1
						AND inventory.SetID='$search'
						UNION ALL
						SELECT inventory.Quantity, inventory.itemTypeID, parts.Partname, parts.PartID, colors.colorID, colors.Colorname
						FROM inventory 
						JOIN colors
						ON inventory.colorID = colors.ColorID 
						JOIN sets
						ON inventory.SetID = sets.SetID
						JOIN parts
						ON inventory.ItemID = parts.PartID
						WHERE 1
						AND sets.SetID='$search'");

						

			//Kontroll att resultat hittades
			if(mysql_num_rows($x) > 0){
				display_part_table($x);

				$link = "setinfo.php?SetID=" . $search;
				showPagination($setassoc["Unika"], $page, $ITEMS_PER_PAGE, $link);

				mysql_free_result($x);
						
			}
			else{
				echo "<br><br><span class='list_title'>We could not find the parts in this set.</span>";
			}

			?>
	</div>
	</main>
<?php
include "templates/footer.php";
?>