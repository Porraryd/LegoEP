				
			<div id="form">
				<script src="javascript/validate.js"></script>

					<form id="searchform" action="resultat.php" method="get" onsubmit="return validate();"> 
						<select name="type">
						<option value="SetID">SetID</option>
						<option value="Setname">Setname</option>
						<option value="PartID">PartID</option>
						</select>
						<input class="search" type="text" name="search" placeholder="Search Lego" data-provide="typeahead"> 
						<input type="submit" value="Search">
						
					</form>
			</div>

			