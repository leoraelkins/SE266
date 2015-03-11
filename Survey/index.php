<html>
	<head>
		<title>Assignment 2 - Binge Watching Survey</title>
	</head>
		<body>
			<h1>Assignment 2: WINTER 2015 PHP SURVEY</h1>
			<h2>Are you a Binge Watching Addict?</h2>
	
		<form action = "display_results.php" method = "post">
			<input type="hidden" name="action" value="submit"/>
	
		<div id="demographics">
			<h3>Demographic Information (all fields are required)</h3>
				<label>First Name: </label>
				<input type = "text" name = "first_name"> <br>
	
				<label>Last Name: </label>
				<input type = "text" name = "last_name"> <br>
				
				<label>City: </label>
				<input type = "text" name = "city"> <br>
				
				<label>State: </label>
				<select name = "state">
					<option value = "state_ri">RI</option>
					<option value = "state_ma">MA</option>
					<option value = "state_ct">CT</option>
				</select> <br>
				
				<label>Gender: </label>
				<input type = "radio" name = "gender" value = "male">Male
				<input type = "radio" name = "gender" value = "female">Female<br>
			</div>
	
			<div id = "survey">	
				<h3>Which of these shows have you binge watched (if you have watched more than 3 episodes in a row, that's a yes)?  Check all that apply.</h3>
				<input type = "checkbox" name = "shows[]" value = "breaking_bad">Breaking Bad
				<input type = "checkbox" name = "shows[]" value = "dexter">Dexter
				<input type = "checkbox" name = "shows[]" value = "sunny">It's Always Sunny in Philadephia
				<input type = "checkbox" name = "shows[]" value = "orange">Orange is the New Black
				<input type = "checkbox" name = "shows[]" value = "house_cards">House of Cards
				<input type = "checkbox" name = "shows[]" value = "walking_dead">The Walking Dead
			</div>
	
			<div id = "comments">
				<h3>Additional comments/notes: </h3>
				<textarea name = "comment" rows = "6" cols = "75"></textarea>
			</div>
	
        	<div id="buttons"><br>
            	<input type="submit" value="Submit"/><br />
				<p>Errors: <?php echo $message; ?></p>
        	</div>
	
		</form>

 		</body>

</html>