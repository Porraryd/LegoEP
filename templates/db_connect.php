<?php

	function connect ($db){

		$conn = mysql_connect('localhost','root','');

		if ( !$conn ){
			echo 'Felet ' . mysql_error();
			echo '<br>Felkod  ' . mysql_errno();
			return false;
		}

		mysql_select_db($db);
	}

	function query($sql){
		
		$x = mysql_query($sql);
		if ( !$x ){
			echo 'Felet ' . mysql_error();
			echo '<br>Felkod  ' . mysql_errno();
			return false;
		}

		return $x;
	}

?>