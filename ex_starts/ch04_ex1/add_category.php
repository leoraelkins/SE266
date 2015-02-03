<?php
//gets the data inputted by user
$category_id = $_POST['category_id'];
$category_name = $_POST['category_name'];

//validates the input
if (empty($category_name)) {
	$error = "This is a required field.  Please try again.";
	include('error.php');
} else {
	//when valid, add category to database
	require_once('database.php');
	$query = "INSERT INTO categories
				(categoryName) 
			VALUES 
				('$category_name')";
	$db->exec($query);
	
	//displays product list page
	include_once('category_list.php');
}
?>