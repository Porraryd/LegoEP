<?php
	include 'php/load_image.php';
     function display_set_table($query){

          	while ( $rest = mysql_fetch_assoc($query) ){
          		$length = count($rest);
          		if (isset($rest['colorID']))
          			$colorID = $rest['colorID'];	
          		else
          		{
          			$colorID = 0;
          		}
          		
          		list($url1, $url2) = load_image($rest["SetID"], $colorID);

          		
          		echo '<div class="list_item">';
	        	echo "<a href='$url2' class='list_picture'><img src='$url1' alt='Image'></a>";
          		echo "<a href='setinfo.php?SetID=" . $rest["SetID"] . "'><span class='list_title'>" . $rest["Setname"] . '</span></a>
          		     <span class="list_year">' . $rest["Year"] . '</span><br>'
          		 . '<span class="list_text">ID: ' . $rest["SetID"] . '<br>Category: ' . $rest["Categoryname"] . '</span>';

          		 //Hover link
          		echo "<a href='setinfo.php?SetID=" . $rest["SetID"] . "'><span class='list_hoverlink'></span></a>";
          		echo '</div>';
           	}

     }

     function display_part_table($query){
           	
           	//resten av tabellen
          	while ( $rest = mysql_fetch_assoc($query) ){
          		$length = count($rest);
          		if (isset($rest['colorID']))
          			$colorID = $rest['colorID'];	
          		else
          		{
          			$colorID = 1;
          		}
          			
          		list($url1, $url2) = load_image($rest["PartID"], $colorID);
          		
          		echo '<div class="list_item">';
	        	echo "<a href='$url2' class='list_picture'><img src='$url1' alt='Image'></a>";
          		echo "<a href='partinfo.php?PartID=" . $rest["PartID"] . "'><span class='list_title'>" . $rest["Partname"] . '</span></a>';

          		if (isset ($rest["Quantity"]))
          			echo "<span class='list_year'>Quantity:  " . $rest["Quantity"] . "</span>";


          		

          		if (isset($rest["itemTypeID"]) && $rest["itemTypeID"] == 'M')
          		{
          			echo '<br>Minifig';
          		}
          		/*else if (isset($rest["itemTypeID"]) && $rest["itemTypeID"] == 'P')
          		{
          			echo 'Type: Part <br>';
          		}
          		else if (isset($rest["itemTypeID"]) && $rest["itemTypeID"] == 'G')
          		{
          			echo 'Type: Gear <br>';
          		}*/

          		echo '<br><span class="list_text">ID: ' . $rest["PartID"] . '</span><br>';

          		echo '<span class="list_text">';
          		if (isset ($rest["Colorname"]))
          			echo 'Color: ' . $rest["Colorname"];
          		echo '</span>';
          		//Hover link
          		echo "<a href='partinfo.php?PartID=" . $rest["PartID"] . "'><span class='list_hoverlink'> </span></a>";
          		echo '</div>';
	           	
           	}

     }
?>