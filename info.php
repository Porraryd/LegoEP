<?php
include "templates/header.php";
?>
		<main class="wrapper">
				<div class="row cf">
					<div class="onehalf">
					<h2>Contact form</h2>
					
					<?php echo '<form action = "php/temp.php" method = "post">'; ?>
					
					<input id="name" name="name" placeholder="User">
					<textarea id="message" name="message" placeholder="Message"></textarea>
					<br><input type = "submit" value="Send"></br>
					
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
