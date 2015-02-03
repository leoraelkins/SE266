<html>
<head>
    <title>Assignment 1 - Room Estimator</title>
<!-- 	 <link rel="stylesheet" type="text/css" href="main.css"/>   -->
</head>

<body>
    <div id="content">
    <h1>Room Estimator</h1>

		<?php if (!empty($error_msg)) { ?>
			<p class="error"><?php echo $error_msg; ?></p>
		<?php } ?> 
	
    <form action="room_estimator.php" method="get">

		<h2>Room Dimensions:</h2>
		
        <div id="data">
            <label>Length:</label>
            <input type="text" name="room_length"
                   value="<?php echo $room_length; ?>"/><br />

            <label>Width:</label>
            <input type="text" name="room_width"
                   value="<?php echo $room_width; ?>"/><br />

            <label>Height:</label>
            <input type="text" name="room_height"
                   value="<?php echo $room_height; ?>"/><br />
        </div>

        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Calculate"/><br />
        </div>

    </form>
    </div>
</body>
</html>