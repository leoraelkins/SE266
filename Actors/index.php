<?php
    require_once('database.php');

	//saves the current date formatted into variable
	$now = date('F d', time());
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Assignment No. 4 - Actors Table (Leora Sliney)</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
	<div id="page">
		
	<h1>Assignment No. 4 - Actors' Birthdays</h1>
	<h2>Search, Add, Edit Actors</h2>
	<h3>List of Actors / Search for Actor</h3>
	
	<div id="errors">
	<!-- lists any errors that come up throughout the program -->
	<?php if (count($errors) > 0) : ?>
   		<h4>Errors:</h4>
    	<ul>
    	 	<?php foreach($errors as $error) : ?>
   	         	<li><?php echo $error; ?></li>
   	     	<?php endforeach; ?>
    	</ul>
    <?php endif; ?>
	</div>	<!-- end or errors div -->

	<!--  shows just in case the database doesn't contain any data -->
	<?php if ($actors->rowCount() == 0): ?>
    	<p>There are no actors in the database.</p>
	
	<!-- lists actors if search fields are being utilized -->
    <?php elseif (!empty($searching)): ?>
		<?php include'search_actor.php'; ?>
		
	<!-- lists actors when page starts -->		
    <?php else: ?>
		<?php include 'show_actors.php'; ?>
	<?php endif; ?>
    <br/>

    <!-- the add form -->
   	<?php if ($actors->rowCount() >= 0 && empty($actor_to_edit)) : ?>
   	<h3>Add Actor</h3>
	<form action="display.php" method="post">
		<label>First Name: </label>
        <input type="text" name="first_name" /><br />
	
		<label>Last Name: </label>
        <input type="text" name="last_name" class="LastName"/><br />
	
        <label>Birthdate: </label>
        <input type="text" name="birthdate" /><br />
	
		<label>Gender: </label>
		<input type="radio" name="gender" id="male" value="M" />Male
		<input type="radio" name="gender" id="female" value="F" />Female <br />

        <div class="buttons">
            <label>&nbsp;</label>
            <input type="submit" name="action" value="Add Actor"/><br />
        </div><!-- end buttons div -->
	</form>
	<?php endif; ?>
	</div><!-- end page div -->
</body>
</html>