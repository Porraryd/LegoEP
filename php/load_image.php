<?php

	function load_image($value){

			$pic = query("SELECT images.itemTypeID, images.itemID, images.has_gif, images.has_jpg, images.has_largegif, images.has_largejpg, images.colorID, inventory.SetID
				  FROM  inventory
				  JOIN images
				  ON inventory.SetID=images.itemID
          		  WHERE 1
          		  AND inventory.setID='$value'
          		  ");
			//var_dump(mysql_fetch_row($pic));
			//var_dump(mysql_fetch_assoc($pic));
        	$pics = mysql_fetch_assoc($pic);


    		if ($pics["itemTypeID"] == 'S'){
	        	//check for small set images
	        	if($pics["has_gif"] == 1){
	        		$url = 'http://webstaff.itn.liu.se/~stegu76/img.bricklink.com' . '/' . $pics["itemTypeID"] . '/' . $pics["itemID"] . '.gif';
	        	}else if($pics["has_jpg"] == 1){
					$url = 'http://webstaff.itn.liu.se/~stegu76/img.bricklink.com' . '/' . $pics["itemTypeID"] . '/' . $pics["itemID"] . '.jpg';
				}else{
					$url = "";
				}
			}else if ($pics["itemTypeID"] == 'M'){
	        	//check for small set images
	        	if($pics["has_gif"] == 1){
	        		$url = 'http://webstaff.itn.liu.se/~stegu76/img.bricklink.com' . '/' . $pics["itemTypeID"] . '/' . $pics["itemID"] . '.gif';
	        	}else if($pics["has_jpg"] == 1){
					$url = 'http://webstaff.itn.liu.se/~stegu76/img.bricklink.com' . '/' . $pics["itemTypeID"] . '/' . $pics["itemID"] . '.jpg';
				}else{
					$url = "";
				}
			}else{
				//check for small part images
	        	if($pics["has_gif"] == 1){
	        		$url = 'http://webstaff.itn.liu.se/~stegu76/img.bricklink.com' . '/' . $pics["itemTypeID"] . '/' . $pics["colorID"] . '/' . $pics["itemID"] . '.gif';
	        	}else if($pics["has_jpg"] == 1){
					$url = 'http://webstaff.itn.liu.se/~stegu76/img.bricklink.com' . '/' . $pics["itemTypeID"] . '/' . $pics["colorID"] . '/' . $pics["itemID"] . '.jpg';
				}else{
					$url = "";
				}
			}
				//check for large images
				if($pics["has_largegif"] == 1){
	        		$url_l = 'http://webstaff.itn.liu.se/~stegu76/img.bricklink.com' . '/' . $pics["itemTypeID"] . 'L/' . $pics["itemID"] . '.gif';
	        	}else if($pics["has_largejpg"] == 1){
					$url_l = 'http://webstaff.itn.liu.se/~stegu76/img.bricklink.com' . '/' . $pics["itemTypeID"] . 'L/' . $pics["itemID"] . '.jpg';
				}else{
					$url_l = "";
				}
				echo $url . '<br>';
				echo $url_l . '<br>';

			return array($url, $url_l);
	}



?>