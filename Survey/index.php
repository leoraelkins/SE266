<!DOCTYPE html>
<html>
<head>
	<title>PHP Assignment 2 - Survey</title>
	<link rel="stylesheet" type="text/css" href="main.css"/>
</head>
	
<body>
	<div id="page">
		<div id="header">
			<h1>Assignment 2: WINTER 2015 PHP SURVEY</h1>
			<h2>Are you a Binge Watching Addict?</h2>
		</div> <!-- end header div -->
	<div id="main">
		<form action="display.php" method="post">
		<input type="hidden" name="action" value="submit"/>
		<div id="demographics">
			<h3>Demographic Information (all fields are required)</h3>
				<label>First Name: </label>
				<input type = "text" name = "first_name" value = <?php echo $first_name ?> > <br>
	
				<label>Last Name: </label>
				<input type = "text" name = "last_name" value = <?php echo $last_name ?> > <br>
				
				<label>City: </label>
				<input type = "text" name = "city" value = <?php echo $city ?> > <br>
				
				<label>State: </label>
				<select name = "state">
					<option value = "state_ri">RI</option>
					<option value = "state_ma">MA</option>
					<option value = "state_ct">CT</option>
				</select> <br>
				
				<label>Gender: </label>
				<input type = "radio" name = "gender" value = "male">Male
				<input type = "radio" name = "gender" value = "female">Female<br>
			</div> <!-- end demographics div -->
	
			<div id = "survey">	
				<h3>Which of these shows have you binge watched (if you have watched more than 3 episodes in a row, that's a yes)?  Check all that apply.</h3>
				<input type = "checkbox" name = "shows[]" value = "breaking_bad">Breaking Bad
				<input type = "checkbox" name = "shows[]" value = "dexter">Dexter
				<input type = "checkbox" name = "shows[]" value = "sunny">It's Always Sunny in Philadephia
				<input type = "checkbox" name = "shows[]" value = "orange">Orange is the New Black
				<input type = "checkbox" name = "shows[]" value = "house_cards">House of Cards
				<input type = "checkbox" name = "shows[]" value = "walking_dead">The Walking Dead
			</div> <!-- end survey div -->
	
			<div id = "comment">
				<h3>Which show is your favorite? </h3>
				<textarea name = "comments" rows = "6" cols = "75"></textarea>
			</div> <!-- end comment div -->
			
			<label>&nbsp;</label>
			<input type="submit" value="Submit" />

			<br />
			
			<?php if (count($errors) > 0) : ?>
				<h2>Errors:</h2>
				<ul>
					<?php foreach($errors as $error) : ?>
					<li><?php echo $error; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>			
		</form>	
		
	</div> <!-- end page div -->
	</div> <!-- end main div -->
	</body>
	
</html>