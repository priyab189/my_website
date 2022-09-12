<?php
	$conn = new PDO('mysql:host=localhost;dbname=test', 'root', '');
 
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
?>