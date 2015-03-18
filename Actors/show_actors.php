<form action="display.php" method="post">
		<label>First Name: </label>
    	<input type="text" name="search_first_name" /><br />
		<label>Last Name: </label>
    	<input type="text" name="search_last_name" />
		<input type="submit" name="action" value="Search"/>
	<br> <br/>
    	
		<table>
			<tr>
				<th>Name</th>
				<th>Gender</th>
				<th>Birthdate</th>
				<th></th>
			</tr>
			<?php foreach ($actors as $actor) : // seperate loop to be able to turn green when matched to today's date ?>
				<?php $formatted_birthdate = date('F d, Y', strtotime($actor['birthDate'])); ?>
				<?php if (date('F d', strtotime($actor['birthDate'])) == $now): //checks if it is today's date ?>
					<tr id="match">
						<td><?php echo $actor['firstName'] . ' ' . $actor['lastName']; ?></td>
						<td><?php echo $actor['gender']; ?></td>
						<td><?php echo $formatted_birthdate; ?></td>
						<td><form action="edit_actor.php" method="get">
							<a href="edit_actor.php?actor_id=<?php echo $actor['actorID']; ?>">Edit</a></td></form>
					</tr>
	
				<?php else: ?>	
					<tr>
						<td><?php echo $actor['firstName'] . ' ' . $actor['lastName']; ?></td>
						<td><?php echo $actor['gender']; ?></td>
						<td><?php echo $formatted_birthdate; ?></td> 
						<td><form action="edit_actor.php" method="get">
							<a href="edit_actor.php?actor_id=<?php echo $actor['actorID']; ?>">Edit</a></td></form>
					</tr>
				<?php endif; ?>
            <?php endforeach; ?>
        </table>
</form>