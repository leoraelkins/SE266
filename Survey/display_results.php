<?php
//connection to database
require_once('database.php');

//set action
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else {
    $action = $_POST['error'];
}

switch ($action)
	case 'submit':
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$city = $_POST['city'];
		$state = $_POST['state']
		$gender = $_POST['gender'];
		$shows = $_POST['shows'];
		$comment = $_POST['comment'];
		
		//validate that all filled in
		if(empty ($first_name) || empty($last_name) || empty($city)) {
			$message = 'First name, last name, and city are all required fields.';
		}
		if(empty($comment)) {
			$message = 'You must leave a comment.';
		}
		if(!isset($gender)) {
			$message = 'The laws of genetics state that you MUST be either a male or a female.';
		}
		if($message == '') {
			$shows_imploded = implode(',', $shows);
			//inserts datat into 'survey' database
			$query = "INSERT INTO survey
				(firstName, lastName, city, state, gender, shows, comments)
				VALUES
				('$first_name', '$last_name', '$city', '$state', '$gender', '$shows_imploded', '$comments')";
			$db->exec($query);
		}
		break;
	case 'error':
		$message = 'Something has gone terribly wrong!';
		break;
?>