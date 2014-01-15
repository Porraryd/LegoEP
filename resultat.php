<?php
//Includes
include "templates/header.php";
include "php/search_log.php";
include 'php/pagination.php';
include 'php/db_connect.php';
include 'php/display.php';
?>
	<main class="wrapper">
		<div class="row cf">
			<?php
			//connect till databasen
			connect('lego');

			//indata från form
			$search = $_GET['search']; 
			$type   = $_GET['type'];

			//trimma sökningen från whitespaces
			$tsearch = trim($search);

			//lagra trimmade sökningen i array(vid sökning pmed flera ord)
			$trimmed_array = explode(" ",$tsearch);

			//Felkontroller (som borde stoppas av javascript, men skadar inte att kolla här också)
			//Om det saknas sökning
			if ($tsearch == "") {
				$resultmsg =  "<p>Search Error</p><p>Please enter a search...</p>" ;
			}
			// check for a search parameter
			if (!isset($search)){
				$resultmsg =  "<p>Search Error</p><p>We don't seem to have a search parameter! </p>" ;
			}

	//Check page
	$ITEMS_PER_PAGE = 20;
	if (isset($_GET["page"])){
		$page = $_GET["page"];
	}else{
		$page = 1;
	}
	$start_from = ($page-1)*$ITEMS_PER_PAGE;

	//=======
	//QUERIES
	//=======
	if ($type == 'Sets'){
		//Main query
		$x = query("SELECT sets.Setname, sets.SetID, sets.Year, categories.Categoryname FROM sets
			JOIN categories
			ON categories.CatID = sets.CatID 
			WHERE 1 AND (Setname LIKE '%{$search}%' OR SetID LIKE '%{$search}%') LIMIT $start_from, $ITEMS_PER_PAGE ");
		
		//Count query
		$result = mysql_query("SELECT COUNT(*) FROM sets WHERE 1 AND (Setname LIKE '%{$search}%' OR SetID LIKE '%{$search}%')");		
	}else if ($type == 'Parts'){
		//Main query
		$x = query("SELECT DISTINCT parts.Partname, parts.PartID, images.colorID FROM parts
			JOIN images 
			ON parts.partID = images.itemID
			WHERE 1 AND (Partname LIKE '%{$search}%' OR PartID LIKE '%{$search}%')
			/*Detta kanske hjälper mot att vi får dubletter*/
			GROUP BY parts.PartID
			LIMIT $start_from, $ITEMS_PER_PAGE ");
		
		//Count query
		$result = mysql_query("SELECT COUNT(*) FROM parts WHERE 1 AND (Partname LIKE '%{$search}%' OR PartID LIKE '%{$search}%')");	
	}

	//get the total amount of results
	$row = mysql_fetch_array($result);
	$totalcount = $row[0];

	//Om det är en tom sökning eller bara ett whitespace så visas felmeddelande
	if($totalcount == 0){
		echo '<p>Your search <em>' . $search . '</em> did not give any result..<p>';
	}else{
		echo '<p>Your search <em>' . $search . '</em> gave ' . $totalcount . ' results.<p>';
		
		if ($type == 'Sets')
			display_set_table($x);
		else
			display_part_table($x);

		//Show pagination
		$link = "resultat.php?search=" . $search . "&type=" . $type;
		showPagination($totalcount, $page, $ITEMS_PER_PAGE, $link);

		mysql_free_result($x);
	}
	
	?>
	</div>
	</main>
<?php
include "templates/footer.php";
?>

