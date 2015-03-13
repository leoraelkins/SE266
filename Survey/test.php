<?php include('database.php');


$query = "INSERT INTO survey
				(firstName, lastName, city)
				VALUES
				('Lily', 'Smith', 'Coventry')";
			$db->exec($query);
echo $query;

?>