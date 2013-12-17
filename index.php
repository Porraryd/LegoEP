<?php
include "templates/header.php";
include "templates/form.php";
?>
			<main class="wrapper">


<?php
	include 'php/db_connect.php';

	connect('lego');

	$search = $_POST['search']; 
	$type   = $_POST['type'];

	echo $type;

	$x = query('SELECT CatID from categories');
	//$x = query("SELECT * 
	//			FROM  `colors` 
	//			WHERE Colortype =  '$search'");


	echo mysql_num_rows($x);
	var_dump(mysql_fetch_array($x));

	while ( $rest = mysql_fetch_array($x) ) {
		echo $rest['CatID'] . '<br>';
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
