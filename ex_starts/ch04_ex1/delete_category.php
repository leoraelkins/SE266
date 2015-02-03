<?php
//gets the category id
$category_id = $_POST['category_id'];

//deletes category from the list
require_once('database.php');
$query = "DELETE FROM categories
     	WHERE categoryID = '$category_id'";
$db->exec($query);

//displays the category page with deleted data
include('category_list.php');
?>