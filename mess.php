<?php include "php/guestbook_functions.php"; ?>
<?php
include "templates/header.php";
?>
	
	<main class="wrapper">
	<div class="row cf">
		<h2>Guestbook</h2>
		<p>Please write anything you want in our guestbook! Feedback on the site should be written in the contact form under "Contact". </p>
		<br>
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
