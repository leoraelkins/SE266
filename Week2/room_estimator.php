<?php
	//gets the data from what's entered into the form by the user
	$room_length = $_GET ['room_length'];
	$room_width = $_GET ['room_width'];
	$room_height = $_GET ['room_height'];
	
	//validates the length entry
	if (empty($room_length) ) {
		$error_msg = 'Length is a required field.'; }
	else if (!is_numeric ($room_length) ) {
		$error_msg = 'Length must be a valid number.'; }
	else if ($room_length <= 0) {
		$error_msg = 'Length must be greater than 0.'; }

	//validates the width entry
	else if (empty($room_width) ) {
		$error_msg = 'Width is a required field.'; }
	else if (!is_numeric ($room_width) ) {
		$error_msg = 'Width must be a valid number.'; }
	else if ($room_width <= 0) {
		$error_msg = 'Width must be greater than 0.'; }

	//validates the height entry
	else if (empty($room_height) ) {
		$error_msg = 'Height is a required field.'; }
	else if (!is_numeric ($room_height) ) {
		$error_msg = 'Height must be a valid number.'; }
	else if ($room_height <= 0) {
		$error_msg = 'Height must be greater than 0.'; }
	
	//set the error message to an empty string if all entries are valid
	else {
        $error_msg = ''; }

    //if an error message exists, go to the index page
    if ($error_msg != '') {
        include('index.php');
        exit();	}

	//calculates the room's square footage and volume
	$square_footage = ($room_width * $room_height * 2) + ($room_length * $room_height * 2) + ($room_width * $room_height);
	$volume = $room_width * $room_height * $room_length;

	//formats the numbers
	$room_length_formatted = number_format($room_length, 1);
	$room_height_formatted = number_format($room_height, 1);
	$room_width_formatted = number_format($room_width, 1);
	$square_footage_formatted = number_format($square_footage, 1);
	$volume_formatted = number_format($volume, 1);

?>

</html>
<head>
    <title>Assignment 1 - Room Estimator</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
    <div id="content">
		<h1>Room Estimator</h1>
		
		<h2>Room Dimensions:</h2>
      
        <label>LENGTH:</label>
        <span><?php echo $room_length_formatted . ' feet'; ?></span><br />

        <label>WIDTH:</label>
        <span><?php echo $room_width_formatted . ' feet'; ?></span><br />

        <label>HEIGHT:</label>
        <span><?php echo $room_height_formatted . ' feet'; ?></span><br />
		
		<label>SQUARE FOOTAGE:</label>
		<span><?php echo $square_footage_formatted . ' square feet'; ?></span><br />
		
		<label>VOLUME:</label>
		<span><?php echo $volume_formatted . ' cubic feet'; ?></span><br />
		
        <p>&nbsp;</p>	
		
    </div>
</body>
</html>