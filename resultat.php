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
			//////////////////////////////////////////////////////////////
			//test lagra setnamn som json
			$result = query("SELECT DISTINCT Setname FROM sets");
			$data = array();
			while($row = mysql_fetch_assoc($result)){
				$data [] = array($row['Setname']
					//'Setname' => $row['Setname'],
					//'SetID' => $row['SetID']
					);
			}

			$json_data = json_encode($data);
			file_put_contents('Setnames.json', $json_data);


			///////////////////////////////////////////////////////////////

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
<script>

$('.search').typeahead({
  //name: 'Setnames',
  //prefetch: '/Setnames.json',                                   
  //limit: 10
 	local: ["Town Mini-Figures","Space Mini-Figures","Castle Mini Figures","Living Room","Farm Set Animals","Playhouse","Farm"]
  /*local: [
          "Alabama",
          "Alaska",
          "Arizona",
          "Arkansas",
          "California",
          "Colorado",
          "Connecticut",
          "Delaware",
          "Florida",
          "Georgia",
          "Hawaii",
          "Idaho",
          "Illinois",
          "Indiana",
          "Iowa",
          "Kansas",
          "Kentucky",
          "Louisiana",
          "Maine",
          "Maryland",
          "Massachusetts",
          "Michigan",
          "Minnesota",
          "Mississippi",
          "Missouri",
          "Montana",
          "Nebraska",
          "Nevada",
          "New Hampshire",
          "New Jersey",
          "New Mexico",
          "New York",
          "North Carolina",
          "North Dakota",
          "Ohio",
          "Oklahoma",
          "Oregon",
          "Pennsylvania",
          "Rhode Island",
          "South Carolina",
          "South Dakota",
          "Tennessee",
          "Texas",
          "Utah",
          "Vermont",
          "Virginia",
          "Washington",
          "West Virginia",
          "Wisconsin",
          "Wyoming"
        ]*/
});


</script>

