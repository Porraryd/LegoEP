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
				$search = $_GET['search']; 
				$type   = $_GET['type'];

				//koppla val med tabell
				$keys = array('sets' => 'sets',
							  'parts' => 'parts');

				//Leta reda på rätt tabell
				foreach ($keys as $key => $value) {
					if ($type == $key){
						$tablename = $value;
					}
				}

	//Check page
	$ITEMS_PER_PAGE = 20;
	if (isset($_GET["page"]))
	{
		$page = $_GET["page"];
	}else{
		$page = 1;
	}
	$start_from = ($page-1)*$ITEMS_PER_PAGE;

 //Skickar frågan till connect_db
				//AND $type = '$search' 
	$x = query("SELECT * FROM $tablename WHERE 1 AND (Setname LIKE '%{$search}%' OR SetID LIKE '%{$search}%') LIMIT $start_from, $ITEMS_PER_PAGE ");

	//Kontroll att resultat hittades
	if(count($x) > 0)
	{					//information om vad som man får tillbaka från frågan
		echo 'Working in table: ' . $tablename . '<br>';
		echo 'Number of Rows: ' .  mysql_num_rows($x) . '<br>';
		//var_dump(mysql_fetch_array($x));
		$i = 0;
		
		//hämtar data som genereras av frågan
		//Skapar tabell med informationen
		echo "<table>";
		while ( $rest = mysql_fetch_assoc($x) )
		{
		    echo "<tr>";
		    if ($i == 0)
		    {
		    	//OM vi är i första rundan ska även table headers ingå
		    	foreach ($rest as $key => $value)
		    		echo "<th>" . $key . "</th>";
		    	echo "</tr><tr>";
		    }

			foreach ($rest as $key => $value)
			{
		    	echo "<td><a href='set.php?id=" . $rest["SetID"] . "'>" . $value . "</a></td>" ;						
		    	$i++;
			}
			echo "</tr>"; 
		}
		echo "</table>";

		//Query för att räkna hur många objekt som finns. BÖR ÄNDRAS TILL ETT COUNT()-kommando för att optimera. 
		$countquery = query("SELECT * FROM $tablename WHERE 1 AND (Setname LIKE '%{$search}%' OR SetID LIKE '%{$search}%')");
		$totalcount = mysql_num_rows($countquery);
		echo 'Found ' .  $totalcount . ' items.<br><br>';

		//Räknar hur många sidor det ska vara totalt
		$total_pages = ceil($totalcount / 20);
		
		//Loop som skapar länkar till varje sida. 
		//TODO: Sätta någon maxgräns på hur många sidor som visas? Eller bara sätta pilar?
		for ($i=1; $i<=$total_pages; $i++)
		{
			echo "<a href='resultat.php?search=" . $search . "&type=" . $type . "&page=" . $i . "'>" . $i . "</a> "; 
		}
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
