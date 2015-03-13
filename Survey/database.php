<?php
//connects to the databse
	$dsn = 'mysql:host=localhost;dbname=survey';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
      	$error = $e->getMessage();
		include ('display.php');
		echo "<p> $error </p>";
	    exit();
    }
?>