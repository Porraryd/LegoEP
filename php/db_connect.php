<?php

	function connect ($db){

		////används för att ansluta till databasen lokat
		$conn = mysql_connect('localhost','root','');
		////används för att ansluta till databasen på liu server
		//$conn = mysql_connect("mysql.itn.liu.se","lego");

		if ( !$conn ){
			echo 'Felet ' . mysql_error();
			echo '<br>Felkod  ' . mysql_errno();
			return false;
		}

		mysql_select_db($db);
	}

	function query($sql){

		//Visar vilken fråga som har skickats till databasen
		//echo 'SQL-fråga: ' . $sql . '<br><br>';

		$x = mysql_query($sql);
		if ( !$x ){
			echo 'Felet ' . mysql_error();
			echo '<br>Felkod  ' . mysql_errno();
			return false;
		}

		return $x;
	}

?>