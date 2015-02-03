<form action = "display.php" method = "get">
	<label>First name: </label>
	<input type = "text" name = "first_name"> <br>
	<label>Last name: </label>
	<input type = "text" name = "last_name"> <br>
	<label>&nbsp;</label>
	<input type = "submit" value = "Submit">
</form>

$first_name = $_GET ['first_name'];
$last_name = $_GET ['last_name'];

<a href = "display.php?first_name=Leora&last_name=Elkins">Display Name</a>