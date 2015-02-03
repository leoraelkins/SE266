$number = 1;
while ($number <= 10) {
	if ($number % 3 == 0) {
		$number++;
		continue;	
	}
	echo $number . '<br>'
	$number++;
	}