<?php include('database.php');

$query = "INSERT INTO actors
	(firstName, lastName, birthDate, gender)
	VALUES
	('Lily', 'Smith', '1978-06-11', 'female')";
	$db->exec($query);
echo $query;
?>