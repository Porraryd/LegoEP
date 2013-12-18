<?php
include "templates/header.php";
include "php/form.php";
?>
			<main class="wrapper">
				<div class="row cf">
	<?php
	include 'php/db_connect.php';

	//connect till databasen
	connect('lego');

	//indata från form
	$search = $_POST['search']; 
	$type   = $_POST['type'];

	//koppla val med tabell
	$keys = array('SetID' => 'inventory',
				  'Setname' => 'sets',
			  	  'PartID' => 'parts',
			  	  'Colorname' => 'colors');

	//Leta reda på rätt tabell
	foreach ($keys as $key => $value) {

		if ($type == $key){
			$tablename = $value;
			echo $tablename . '<br>';
		}
	}

	//Skickar frågan till connect_db
	//AND $type = '$search' 
	$x = query("SELECT * FROM $tablename WHERE 1 ");

	//information om vad som man får tillbaka från frågan
	echo 'Number of Rows ' .  mysql_num_rows($x) . '<br><br>';
	var_dump(mysql_fetch_array($x));

	echo '<br>' . '<br>' . $tablename . '<br>';
	echo '<br>' . $type . '<br><br>';

	//hämtar data som genereras av frågan
	while ( $rest = mysql_fetch_assoc($x) )

		foreach ($rest as $key => $value) {

			echo $key . ' ' . $value . ' ';
		}
			echo '<br>';
	}
/*	
	while ( $rest = mysql_fetch_row($x) ) {

		echo '<br>';
		foreach ($rest as $key => $value) {
			//echo $key . ' ';
			echo $value . ' ';
		}
		echo '<br>';
	}*/
/*	while ( $rest = mysql_fetch_assoc($x) ) {
			
		echo '<br>';
			echo $rest[$type] . ' ';
		
		echo '<br>';
	}*/
	
	mysql_free_result($x);

?>
				</div>
			</main>
<?php
include "templates/footer.php";
?>
