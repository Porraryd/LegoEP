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
				$search = $_POST['search']; 
				$type   = $_POST['type'];

				//koppla val med tabell
				$keys = array('SetID' => 'sets',
							  'Setname' => 'sets',
						  	  'PartID' => 'parts',
						  	  'Colorname' => 'colors');

				//Leta reda på rätt tabell
				foreach ($keys as $key => $value) {
					if ($type == $key){
						$tablename = $value;
					}
				}

				//Skickar frågan till connect_db
				//AND $type = '$search' 
				$x = query("SELECT * FROM $tablename WHERE 1 AND $type LIKE '%{$search}%' LIMIT 50");

				//information om vad som man får tillbaka från frågan
				echo 'Working in table: ' . $tablename . '<br>';
				echo 'Number of Rows: ' .  mysql_num_rows($x) . '<br>';
				var_dump(mysql_fetch_array($x));

				$i = 0;
				//hämtar data som genereras av frågan
				echo "<table>";
					while ( $rest = mysql_fetch_assoc($x) ){
						$array_length = count($rest);
					    echo "<tr>";
							foreach ($rest as $key => $value){
								if ($i < $array_length){
									echo "<th>" . $key . "</th>" ;	
								}else{
							    	echo "<td>" . $value . "</td>" ;
							    }							
						    $i++;
							}
					echo "</tr>"; 
				}
				echo "</table>";

				mysql_free_result($x);

			?>
	</div>
	</main>
<?php
include "templates/footer.php";
?>
