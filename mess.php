<?php include "php/functions.php"; ?>
<?php
include "templates/header.php";
?>
	
	<main class="wrapper">
	<?php 
		include "php/form.php";
		?>	
	<div class="row cf">
	<div id="sendbox">
	<?php showForm(); ?>
	</div>
	<p>
	<?php showGuestbook();?>
	</div>
	</main>
<?php
include "templates/footer.php";
?>
