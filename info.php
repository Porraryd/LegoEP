<?php
include "templates/header.php";
include "php/contact_functions.php";
?>
		<main class="wrapper">
					<div class="row cf">
						<p>This webpage is developed by Johan Nordin, Christoffer Engelbrektsson & Pontus Orraryd for Lego enthusiasts around the world.
						You can use this website to search for Lego parts or sets to find out what parts or sets you might be missing.
						<p>If you would like to give us feedback, the best way to contact us is through the form below.
					</div>
				<div class="row cf">
					<div class="onehalf">
					<h2>Contact form</h2>
					
					<?php showForm(); ?>
					
					</div>
					<div class="onehalf">
					<h2>Useful information</h2>
					
					<input class="masterTooltip" title="Sets contains two or more parts. You can search a set by a name or a number-combination" 
					type="image" src="images/info2.png" value="Sets" data-provide="typeahead"> 
					
					<input class="masterTooltip" title="Givas you a one specific part, you search parts by there number and/or letter combination" 
					type="image" src="images/info1.png" value="Parts" data-provide="typeahead">
					<script src="javascript/tooltip.js"></script>
					
					<p/>*hover over the info-icons 
					</div>

				</div>
			</main>
<?php
include "templates/footer.php";
?>
