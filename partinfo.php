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
			if (isset($_GET["PartID"]))
				$search = $_GET["PartID"];
			else
				echo "Error occured. No ID supplied.";
			
			$ITEMS_PER_PAGE = 20;
			if (isset($_GET["page"])){
				$page = $_GET["page"];
			}else{
				$page = 1;
			}
			$start_from = ($page-1)*$ITEMS_PER_PAGE;

			
			//info om parten
			$setquery = query("SELECT DISTINCT inventory.itemTypeID, colors.Colorname, parts.Partname, parts.PartID
							   FROM inventory
							   JOIN parts
							   ON inventory.itemID = parts.partID
							   JOIN colors
							   ON inventory.colorID = colors.colorID 
							   WHERE 1 
							   AND inventory.itemID = '$search'
							   UNION ALL 
							   SELECT DISTINCT inventory.itemTypeID, colors.Colorname, minifigs.Minifigname AS Partname, minifigs.MinifigID AS PartID
							   FROM inventory
							   JOIN minifigs
							   ON inventory.itemID = minifigs.MinifigID
							   JOIN colors
							   ON inventory.colorID = colors.colorID 
							   WHERE 1 
							   AND inventory.itemID = '$search'");
			

			$setassoc = mysql_fetch_assoc($setquery);

				echo "<h2>" . $setassoc["Partname"] . "</h2>";
				list($url1, $url2) = load_image($setassoc["PartID"], 1);
				echo "<img src='$url2' alt='No image found.' /><br>"; 
				echo "ID: " . $setassoc["PartID"] . "<br>";
				if($setassoc["itemTypeID"] = 'P')
				{
					$colors = ""; 
					$nmbrofcolors = mysql_num_rows($setquery);
					while($color = mysql_fetch_assoc($setquery)){
						$colors .= $color['Colorname'] . ', ';
					}
					echo "Part available in: <span title='$colors' class='masterTooltip'>" . $nmbrofcolors . " colors. Hover mouse to see the specific colors.</span>";
				}
					
				echo "<br>";

				echo "<h3>You can find " . $setassoc["Partname"] . " in following sets </h3>";

			//vilka sets som parten ingår i
			$x = query("SELECT sets.Setname, sets.SetID, sets.Year, categories.Categoryname
						FROM inventory 
						JOIN sets
						ON inventory.SetID = sets.SetID
						JOIN categories
						ON categories.CatID = sets.CatID 
						WHERE 1
						AND inventory.itemID='$search'
						ORDER BY `inventory`.`Quantity`  DESC 
						LIMIT $start_from, $ITEMS_PER_PAGE");

			//Count query
			$result = mysql_query("SELECT COUNT(sets.Setname) 
				FROM inventory 
				JOIN sets 
				ON inventory.SetID = sets.SetID
				JOIN parts
				ON inventory.ItemID = parts.PartID 
				WHERE 1 AND parts.PartID='$search'");

			$row = mysql_fetch_array($result);
			$totalcount = $row[0];
			//Kontroll att resultat hittades
			if(mysql_num_rows($x) > 0){
				//funktion som visar resultatet från sökningen som en tabell
				display_set_table($x);
				$link = "partinfo.php?PartID=" . $search;
				showPagination($totalcount, $page, $ITEMS_PER_PAGE, $link);
		
		echo '</div>';
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