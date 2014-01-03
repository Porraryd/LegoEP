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
			$search = $_GET['search']; 
			$type   = $_GET['type'];

			//trimma sökningen från whitespaces
			$tsearch = trim($search);

			//lagra trimmade sökningen i array(vid sökning pmed flera ord)
			$trimmed_array = explode(" ",$tsearch);

			//Om det saknas sökning
			if ($tsearch == "") {
				$resultmsg =  "<p>Search Error</p><p>Please enter a search...</p>" ;
			}

			// check for a search parameter
			if (!isset($search)){
				$resultmsg =  "<p>Search Error</p><p>We don't seem to have a search parameter! </p>" ;
			}

			// val med tabell
			//ANvänds inte någonstans
			$keys = array('SetID' => 'sets',
						  'Setname' => 'sets',
					  	  'PartID' => 'parts');

			//Leta reda på rätt tabell
			//används inte någonstans
			foreach ($keys as $key => $value) {
				if ($type == $key){
					$tablename = $value;
				}
			}

	//Check page
	$ITEMS_PER_PAGE = 20;
	if (isset($_GET["page"])){
		$page = $_GET["page"];
	}else{
		$page = 1;
	}
	$start_from = ($page-1)*$ITEMS_PER_PAGE;

 	//Skickar frågan till connect_db 
	/*$x = query("SELECT s.Setname, s.SetID, s.Year
				FROM sets as s
				WHERE 1
				AND s.$type='{$search}' 
				LIMIT $start_from, $ITEMS_PER_PAGE");*/

	$x = query("SELECT Setname, SetID, Year FROM $tablename WHERE 1 AND (Setname LIKE '%{$search}%' OR SetID LIKE '%{$search}%') LIMIT $start_from, $ITEMS_PER_PAGE ");

			//information om vad som man får tillbaka från frågan
	echo 'Working in table: ' . $tablename . '<br>';
	echo 'Number of Rows: ' .  mysql_num_rows($x) . '<br>';
	
	//Om det är en tom sökning eller bara ett whitespace så visas felmeddelande
	if( isset ($resultmsg)){
		echo $resultmsg;
	}else{
		//hämtar data som genereras av frågan
		echo "<table>";
			//vilka rubriker som ska visas
			$headarray = array("Setname","SetID", "Year", "Pics");
			//funktion som visar resultatet från sökningen som en tabell
			display_table($x, $headarray);
		echo "</table>";


		//Query för att räkna hur många objekt som finns. BÖR ÄNDRAS TILL ETT COUNT()-kommando för att optimera. 
		$countquery = query("SELECT * FROM $tablename WHERE 1 AND $type LIKE '%{$search}%'");
		$totalcount = mysql_num_rows($countquery);
		echo 'Number of Rows ' .  $totalcount . '<br><br>';

		//Räknar hur många sidor det ska vara totalt
		$total_pages = ceil($totalcount / 20);
	
		//Loop som skapar länkar till varje sida. 
		//TODO: Sätta någon maxgräns på hur många sidor som visas? Eller bara sätta pilar?
		for ($i=1; $i<=$total_pages; $i++){
			echo "<a href='resultat.php?search=" . $search . "&type=" . $type . "&page=" . $i . "'>" . $i . "</a> "; 
		}
	}
	mysql_free_result($x);
	?>
	</div>
	</main>
<?php
include "templates/footer.php";
?>
