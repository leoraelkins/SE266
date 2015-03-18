<?php
require_once('database.php');

$errors = array();

//function to validate birthdate format
function validateDate($date)
{
	$d = DateTime::createFromFormat('Y-m-d', $date);
	return $d && $d->format('Y-m-d') == $date;
}

switch( $_POST['action'] ) {
    case 'Add Actor':
		//gets the actor data
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$birthdate = $_POST['birthdate'];
		$gender = $_POST['gender'];

		//validates all fields for add actor
		if (empty($first_name) || empty($last_name) || empty($birthdate) || !isset($gender)) {
			$errors[] = "In order to add an actor, all of the fields below are required.";
		}
		//calls function to validate date is in requested format
		else if (validateDate($birthdate) == false){
			$errors[] = "Please enter the birtdate in this format: yyyy-mm-dd.";
		}
		else {
		//adds actor to the database
			$query = "INSERT INTO actors
						 (firstName, lastName, birthDate, gender)
					  VALUES
						 ('$first_name', '$last_name', '$birthdate', '$gender')";
			$db->exec($query);
		}
        break;
    
    case 'Update Actor':
		// Get the actor data
		$update_actor_id = $_POST['update_actor_id'];
		$update_first_name = $_POST['update_first_name'];
		$update_last_name = $_POST['update_last_name'];
		$update_birthdate = $_POST['update_birthdate'];
		$update_gender = $_POST['update_gender'];

		//validates all fields required for updating actor
		if (empty($update_first_name) || empty($update_last_name) || empty($update_birthdate) || !isset($update_gender)) {
			$errors[] = "In order to update an actor, you cannot leave any fields empty.";
		}
		else if (validateDate($update_birthdate) == false){
			$errors[] = "Please enter the birthdate in the following format: yyyy-mm-dd.";
		}
		else {
		//if all valid, updates the actor to the database
			$query = "UPDATE actors
					  SET firstName = '$update_first_name',
					      lastName = '$update_last_name',
						  birthDate = '$update_birthdate',
						  gender = '$update_gender'
					  WHERE actorID = '$update_actor_id' ";
			$db->exec($query);
			$actor_to_edit = '';
		}
		break;
	
     case 'Delete Actor':
			$update_actor_id = $_POST['update_actor_id'];
			$query = "DELETE FROM actors
					  WHERE actorID = '$update_actor_id'";
			$db->exec($query);
        break;
    
    case 'Cancel Changes':
		$actor_to_edit = '';
		break;
	
	case 'Search':
		$searching = "Searching";
		$search_first_name = $_POST['search_first_name'];
		$search_last_name = $_POST['search_last_name'];

		//validates search fields
		if (empty($search_first_name) && empty($search_last_name)) {
			$errors[] = "To search for an actor please enter at least the first letter of either their first or last name.";
			$searching = '';
		} 
		else {
			if (!empty($search_first_name) || !empty($search_last_name)) {
				$query = "SELECT *
						  FROM actors
						  WHERE firstName LIKE '$search_first_name%' AND 
						        lastName LIKE '$search_last_name%'
						  ORDER BY lastName, firstName";
				$searches = $db->query($query);
				if ($searches->rowCount() == 0){
					$errors[] = "No matches were found.";
					$searching = '';
				}
			}
		}
		break;
    
    case 'Return':
		$searching = '';
		break;
}
include('index.php');
?>