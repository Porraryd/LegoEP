<?php
include "templates/header.php";
include "php/contact_functions.php";
?>
		<main class="wrapper">
					<div class="row cf">
						<h2>Contact</h2>
						<p>This webpage is developed by Johan Nordin, Christoffer Engelbrektsson & Pontus Orraryd for Lego enthusiasts around the world.
						You can use this website to search for Lego parts or sets to find out what parts or sets you might be missing.
						<p>If you would like to give us feedback, the best way to contact us is through the form below.
					</div>
				<div class="row cf">
					<div class="twothirds">
					<h2>Contact form</h2>
					
					<?php showForm(); ?>
					
					</div>
					<div class="onethird">
					<h2>Useful information</h2>
					
					<img class="masterTooltip" title="Sets contains two or more parts. You can search a set by a name or a number-combination" src="images/info2.png" alt="Parts"> 
					
					<img class="masterTooltip" title="Givas you a one specific part, you search parts by there number and/or letter combination" src="images/info1.png" alt="Parts">
					
					<p>*hover over the info-icons </p>
					</div>

				</div>
			</main>
<?php
include "templates/footer.php";
?>
