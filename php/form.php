				
			<div id="form">
				<script src="javascript/validate.js"></script>

					<form id="searchform" action="resultat.php" method="get" onsubmit="return validate();"> 
						
						<input class="search" type="text" name="search" placeholder="search" data-provide="typeahead"> 
						<input type="submit" value="Submit"><br>
						<input type="radio" name="type" value="SetID" autocomplete="off" checked='checked'>SetID
						<input type="radio" name="type" value="Setname" autocomplete="off">Setname
						<input type="radio" name="type" value="PartID" autocomplete="off">PartID
					</form>
			</div>

			