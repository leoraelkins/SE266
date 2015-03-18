<form action="display.php" method="post">
		<label>First Name: </label>
    	<input type="text" name="search_first_name" value="<?php echo $search_first_name ?>"/><br />
		<label>Last Name: </label>
    	<input type="text" name="search_last_name" value="<?php echo $search_last_name ?>"/>
		<input type="submit" name="action" value="Search"/>
		<input type="submit" name="action" value="Return"/>
	<br/> <br/>
    	<table>
			<tr>
				<th>Name</th>
				<th>Gender</th>
				<th>Birthdate</th>
				<th></th>
			</tr>
			
			<?php foreach ($searches as $search) : ?>
				<?php $formatted_birthdate = date('F d, Y', strtotime($search['birthDate'])); ?>
			
				<?php if (date('F d', strtotime($search['birthDate'])) == $now): //checks if it is today's date ?>
					<tr id="birthdate_match">
						<td><?php echo $search['firstName'] . ' ' . $search['lastName']; ?></td>
						<td><?php echo $search['gender']; ?></td>
						<td><?php echo $formatted_birthdate; ?></td> 
						<td><form action="edit_actor.php" method="get">
							<a href="edit_actor.php?actor_id=<?php echo $actor['actorID']; ?>">Edit</a>
						</form></td>
					</tr>

				<?php else: ?>
					<tr>
						<td><?php echo $search['firstName'] . ' ' . $search['lastName']; ?></td>
						<td><?php echo $search['gender']; ?></td>
						<td><?php echo $formatted_birthdate; ?></td> 
						<td><form action="edit_actor.php" method="get">
							<a href="edit_actor.php?actor_id=<?php echo $actor['actorID']; ?>">Edit</a>
						</form></td>
					</tr>
				<?php endif; ?>
            <?php endforeach; ?>
        </table>
</form>