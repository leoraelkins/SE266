<?php
require_once('database.php');
//Start app
if (isset($_POST['action'])) {
    $action =  $_POST['action'];
} else {
    $action =  'app';
}
$errors = array();
switch ($action){
	case'submit':
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$gender = $_POST['gender'];
		$shows = $_POST['shows'];
		$comments = $_POST['comments'];
		//validata data
		if(empty($first_name) || empty($last_name)){
			$errors[] = 'First name and last name are required fields.';
		}
		if(empty($city)){
			$errors[] = 'City is a required field.';
		}
		if(!isset($gender)) {
			$errors[] = 'The law of genetics requires that you were born at least a male or a female so go ahead and pick one.';
		}
		if(!isset($shows)){
			$errors[] = 'Please choose at least one show.';
		}

		//if all content valid, insert the data in database on submit button
		if ($errors[0] == ''){
			$shows_imploded = implode(',', $shows);
			$query = "INSERT INTO survey
				(firstName, lastName, city, state, gender, shows, comments)
				VALUES
				('$first_name', '$last_name', '$city', '$state', '$gender', '$shows_imploded', '$comments')";
			$db->exec($query);
			
			$errors[] = 'Your response to this survey has been successfully saved. THANK YOU!';
		}
		break;
	case 'app':
		$error ='Something has gone terribly wrong?';
		break;
	}

include 'index.php';
?>