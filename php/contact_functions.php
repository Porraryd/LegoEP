<?php
function showForm() {
echo 	'<form action = "php/contactform.php" method = "post">';
echo 	'Name: <br> <input id="name" name="name" class="input_text" placeholder="Your name"><br>
		Email: <br> <input id="email" name="email" class="input_text" placeholder="Your email"><br>
		Your message: <br><textarea id="message" name="message" class="gb_textarea" placeholder="Message"></textarea>
		<br><input type = "submit" value="Send message">
		</form>';
	if (isset($_GET["messagesent"]))
		if($_GET["messagesent"] == true)
			echo '<p>Your message has been sent. Thank you for your feedback!';
		
}