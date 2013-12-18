<?php
include "templates/header.php";
include "templates/form.php";
?>
			<main class="wrapper">
<?php
	include 'templates/db_connect.php';

	//connect till databasen
	connect('lego');

	//indata från form
	$search = $_POST['search']; 
	$type   = $_POST['type'];

	echo $type . ' ';
	//koppla val med tabell
	$keys = array('SetID' => 'inventory',
				  'Setname' => 'sets',
			  	  'PartID' => 'parts',
			  	  'Colorname' => 'colors');

	//Leta reda på rätt tabell
	foreach ($keys as $key => $value) {
		if  ($type == $key){
			$table = $value;
			echo $table . '<br>';
		}
	}
	//Skickar frågan till connect_db
	$x = query("SELECT * FROM `$table`");


	echo mysql_num_rows($x);
	var_dump(mysql_fetch_array($x));

	echo '<br>';

	echo '<br>' . $table . '<br>';
	echo '<br>' . $type . '<br><br>';
/*	while ( $rest = mysql_fetch_assoc($x) ) {

		foreach ($rest as $key => $value) {
			
		echo $key . ' ';
		}
	}*/
	echo '<br>' . $table . '<br>';
	while ( $rest = mysql_fetch_row($x) ) {

		echo '<br>';
		foreach ($rest as $key => $value) {
			//echo $key . ' ';
			echo $value . ' ';
		}
		echo '<br>';
	}

//echo $rest['$table'] .'<br>';
//		echo $rest['ColorID'] . '<br>'.
//			 $rest['Colortype'] . '<br>' . 
//			 $rest['Colorname'] . '<br>';
	
	//mysql_free_result();

?>
				</div>
					<div class="row cf">
				</div>
			</main>
<?php
include "templates/footer.php";
?>
