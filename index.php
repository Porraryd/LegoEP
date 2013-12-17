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
		if ($type == $key){
			$table = $value;
			echo $table . '<br>';
		}
	}

	$x = query("SELECT * FROM `$table`");
	//$x = query("SELECT * 
	//			FROM  `colors` 
	//			WHERE Colortype =  '$search'");

	echo mysql_num_rows($x);
	var_dump(mysql_fetch_array($x));

	echo '<br>' . $table . '<br>';
	echo '<br>' . $type . '<br>';
	while ( $rest = mysql_fetch_array($x) ) {
		foreach ($rest as $key => $value) {
			echo $value . '<br>';
		}

//echo $rest['$table'] .'<br>';
//		echo $rest['ColorID'] . '<br>'.
//			 $rest['Colortype'] . '<br>' . 
//			 $rest['Colorname'] . '<br>';
	}
	//mysql_free_result();

?>
				</div>
				<div class="row cf">
				</div>
			</main>
<?php
include "templates/footer.php";
?>
