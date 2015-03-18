<?php
require_once('database.php');

$actor_id = $_GET['actor_id'];
$query = "SELECT * 
		  FROM actors
		  WHERE actorID = '$actor_id'";
$actors = $db->query($query);
$actor = $actors->fetch();
$first_name = $actor['firstName'];
$last_name = $actor['lastName'];
$birthdate = $actor['birthDate'];
$gender = $actor['gender'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Actors</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
	<div id="page">
    <h2>Edit Actor</h2>
	<form action="display.php" method="post">
        <input type="hidden" name="update_actor_id" value="<?php echo $actor_id; ?>" />
		<label>First Name:</label>
        <input type="text" name="update_first_name" value="<?php echo $first_name; ?>"/><br/>
		
		<label>Last Name:</label>
        <input type="text" name="update_last_name" value="<?php echo $last_name; ?>"/><br/>
		
        <label>Birthdate:</label>
        <input type="text" name="update_birthdate" value="<?php echo $birthdate; ?>"/><br/>
		
		<label>Gender:</label>
		<input type="radio" name="update_gender" id="male" value="M" <?php echo ($gender=='M')?'checked':'' ?> /> Male
		<input type="radio" name="update_gender" id="female" value="F" <?php echo ($gender=='F')?'checked':'' ?> /> Female 
		<br/><br/>
	
        <div class="buttons">
            <label>&nbsp;</label>
            <input type="submit" name="action" value="Update Actor"/>
            <input type="submit" name="action" value="Delete Actor"/>
        	<input type="submit" name="action" value="Cancel Changes"/>
        </div><!-- end buttons div -->
	</form>	
	</div><!-- end page div -->
</body>
</html>