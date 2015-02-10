<?php
if (isset($_POST['action'])) {
    $action =  $_POST['action'];
} else {
    $action =  'start_app';
}

switch ($action) {
    case 'start_app':
        $message = 'Please enter the your information.';
        break;
    case 'process_data':
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

	
        /*************************************************
         * validate and process the name
         ************************************************/

	  //first trim all white space from variables
		$name = trim($name);
		$email = trim($email);
		$phone = trim($phone);
	
	  //validates that name field is filled in
		if (empty($name)) {
			$message = "Name is a required field.";
			break;
		}
	
	  //makes name entered uppercase first letter	
		$name = ucwords($name);	
	  
	  //assigns a variable for space in name field
		$s = strpos($name, ' ');
	  //if there is a space, creates substring of first name only
		if ($s === false) {
			$first_name = $name;
		} else {
			$first_name = substr($name, 0, $s);
		}

			
        /*************************************************
         * validate and process the email address
         ************************************************/
      //validates that email field is filled in
		if (empty($email)) {
			$message = "Email is a required field.";
			break;
		}
      //validates valid email address - that it contains @ and .
		else if (strpos($email, "@") === false || strpos($email, ".") === false) {
			$message = "Please enter a valid email address.";
			break;
		}
		
			
        /*************************************************
         * validate and process the phone number
         ************************************************/
       //validates that phone is at least 7 characters
		if (strlen($phone) < 8) {
			$message = "Phone Number is a required field and must be valid.";
			break;
		}
	
	  //remove common phone number formatting: parentheses, dashes, periods, and spaces
		$phone = str_replace(')', '', $phone);
 		$phone = str_replace('(', '', $phone);
		$phone = str_replace('-', '', $phone);
		$phone = str_replace('.', '', $phone);
		$phone = str_replace(' ', '', $phone);
	
 	  //format the phone number like this 123-4567 or this 123-456-7890
		if (strlen($phone) == 10) {
			$phone_part1 = substr($phone, 0, 3);
			$phone_part2 = substr($phone, 3, 3);
			$phone_part3 = substr($phone, 6);
			$phone_format = $phone_part1 . '-' . $phone_part2 . '-' . $phone_part3;
		} else {
			$phone_part1 = substr($phone, 0, 3);
			$phone_part2 = substr($phone, 3);
			$phone_format = $phone_part1 . '-' . $phone_part2;
		}
	

        /*************************************************
         * Display the validation message
         ************************************************/
        $message = "Hello $first_name,\n
					Thank you for entering this data:\n
					Name: $name\r
					Email: $email\r
					Phone Number: $phone_format";		
		break;
}
include 'string_tester.php';
?>