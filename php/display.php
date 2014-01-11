<?php
	include 'php/load_image.php';
     function display_set_table($query, $headarray){

     		//Rubriker
     		echo "<tr>";
	     		for($x = 0; $x < count($headarray); $x++){
	            	echo "<th>" . $headarray[$x] . "</th>" ;
	            } 
           	echo "</tr>";

           	
           	//resten av tabellen
          	while ( $rest = mysql_fetch_assoc($query) ){
          		$length = count($rest);
          		if (isset($rest['colorID']))
          			$colorID = $rest['colorID'];	
          		else
          		{
          			$colorID = 0;
          		}
          			
          		$i=0;
	        	echo "<tr>";
	                    foreach ($rest as $key => $value){
	                    	if($key == 'SetID' || $key == 'PartID'){
	                    		list($url1, $url2) = load_image($value, $colorID);
		                    }

                    		$i++;
                    		//echo $url2 . '<br>';

	                    	if($i == $length ){
		                    	echo "<td>" . $value . "</td>";
		                    	echo "<td>" . "<p><a href='$url2'>
						                    	  <img src='$url1' alt='gif-image' /></p>" . "</td>";	
	                    	}else{
	                    		if($key == 'Setname'){
	                    			echo "<td>" . "<a href='setinfo.php?SetID=" . $rest["SetID"] . "'>" . $value . "</a>" . "</td>";
	                    		}else if($key == 'Partname'){
	                    			echo "<td>" . "<a href='partinfo.php?PartID=" . $rest["PartID"] . "'>" . $value . "</a>" . "</td>";
	                    		}else{                 
	                      			echo "<td>" . $value . "</td>";
	                      		}
	                      	}
	                    }

	           	echo "</tr>";
	           	
           	}

     }

     function display_part_table($query, $headarray){

     		//Rubriker
     		echo "<tr>";
	     		for($x = 0; $x < count($headarray); $x++){
	            	echo "<th>" . $headarray[$x] . "</th>" ;
	            } 
           	echo "</tr>";

           	
           	//resten av tabellen
          	while ( $rest = mysql_fetch_assoc($query) ){
          		$length = count($rest);
          		if (isset($rest['colorID']))
          			$colorID = $rest['colorID'];	
          		else
          		{
          			$colorID = 1;
          		}
          			
          		$i=0;
	        	echo "<tr>";
	                    foreach ($rest as $key => $value){
	                    	if($key == 'SetID' || $key == 'PartID'){
	                    		list($url1, $url2) = load_image($value, $colorID);
		                    }

                    		$i++;
                    		//echo $url2 . '<br>';

	                    	if($i == $length ){
		                    	echo "<td>" . $value . "</td>";
		                    	echo "<td>" . "<p><a href='$url2'>
						                    	  <img src='$url1' alt='gif-image' /></p>" . "</td>";	
	                    	}else{
	                    		if($key == 'Setname'){
	                    			echo "<td>" . "<a href='setinfo.php?SetID=" . $rest["SetID"] . "'>" . $value . "</a>" . "</td>";
	                    		}else if($key == 'Partname'){
	                    			echo "<td>" . "<a href='partinfo.php?PartID=" . $rest["PartID"] . "'>" . $value . "</a>" . "</td>";
	                    		}else{                 
	                      			echo "<td>" . $value . "</td>";
	                      		}
	                      	}
	                    }

	           	echo "</tr>";
	           	
           	}

     }
?>