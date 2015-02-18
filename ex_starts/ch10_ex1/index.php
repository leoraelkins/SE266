<?php
if (isset($_POST['action'])) {
    $action =  $_POST['action'];
} else {
    $action =  'start_app';
}

switch ($action) {
    case 'start_app':

        // set default invoice date 1 month prior to current date
        $interval = new DateInterval('P1M');
        $default_date = new DateTime();
        $default_date->sub($interval);
        $invoice_date_s = $default_date->format('n/j/Y');

        // set default due date 2 months after current date
        $interval = new DateInterval('P2M');
        $default_date = new DateTime();
        $default_date->add($interval);
        $due_date_s = $default_date->format('n/j/Y');

        $message = 'Enter two dates and click on the Submit button.';
        break;
    case 'process_data':
        $invoice_date_s = $_POST['invoice_date'];
        $due_date_s = $_POST['due_date'];

        // make sure the user enters both dates
		if (empty($invoice_date_s) || empty($due_date_s)) {
			$message = "You must enter a date in both fields.";
			break;
		}

        // convert date strings to DateTime objects
		//cut and pasted below into try/catch
	
        // and use a try/catch to make sure the dates are valid
		try {
			$invoice_date_dt = new DateTime($invoice_date_s);
			$due_date_dt = new DateTime($due_date_s);
		} catch (Exception $e) {
			$message = "You must enter a valid format for the dates in both fields.";
			break;
		}

        // make sure the due date is after the invoice date
		if ($invoice_date_dt > $due_date_dt) {
			$message = "The due date must be after the invoice date.";
		}

        // format both dates
		$invoice_date_f = $invoice_date_dt -> format('F j, Y');
		$due_date_f = $due_date_dt -> format('F j, Y');

        // get the current date and time and format it
		$current_date = new DateTime();
		$current_date_f = $current_date -> format('F j, Y');	
		$current_time_f = $current_date -> format('g:i:s a');

        // get the amount of time between the current date and the due date
		// and format the due date message
		$time_span = $current_date -> diff($due_date_dt);
		$years = $time_span -> format('%y years');
		$months = $time_span -> format('%m months');
		$days = $time_span -> format('%d days');
	
		if ($current_date < $due_date_dt) {
			$due_date_message = "This invoice is due in $years, $months, and $days.";
		}
		else {
			$due_date_message = "This invoice is $years, $months, and $days overdue.";
		}
		break;
}
include 'date_tester.php';
?>