<?php
//A function that handles pagination for all the different pages. 
function showPagination($total, $currentPage, $perPage, $link) 
{
	//Check if we need pages
	if ($total > $perPage)
	{
		echo '<div class="pagination">';
		//check if on the last page or not and outputs where we are. 
		if (($currentPage * $perPage) < $total)
			echo 'Showing ' . (($currentPage-1)*$perPage+1) . ' to ' . ($currentPage*$perPage) . ' of ' . $total . ' results<br>';

		else
			echo 'Showing ' . (($currentPage-1)*$perPage+1) . ' to ' . $total . ' of ' . $total . ' results<br>';

		//Counts how many pages 
		$total_pages = ceil($total / $perPage);
	
		//Creates links to the different pages. Show maximum of 9 pages on each side. 
		if (($currentPage-9) > 1)
			//Link to the first page
			echo "<a href='" . $link . "&amp;page=1'>" . "<< " . "</a> "; 
		
		for ($i=($currentPage-9); $i<=$total_pages; $i++){

			if ($i == ($currentPage+10))
			{
				//Link to the last page if it was not reached in the loop
				echo "<a href='" . $link . "&amp;page=" . $total_pages . "'>" . " >>" . "</a> "; 
				break;
			}
			//Do not make a link to the page we're on. 
			if ($i == $currentPage)
				echo $i . " ";
			else if ($i > 0)
				echo "<a href='" . $link . "&amp;page=" . $i . "'>" . $i . "</a> "; 
		}
		echo '</div>';
	}
	

}