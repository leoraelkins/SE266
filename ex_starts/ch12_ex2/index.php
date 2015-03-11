<?php
$lifetime = 60 * 60 * 24 * 365;  //sets session to run for 1 year in seconds
session_set_cookie_params($lifetime, '/');
session_start();

if (isset($_SESSION['tasklist'])) {
    $task_list = $_SESSION['tasklist'];
} else {
    $task_list = array();
}

$errors = array();

switch( $_POST['action'] ) {
    case 'add':
        $new_task = $_POST['newtask'];
        if (empty($new_task)) {
            $errors[] = 'The new task cannot be empty.';
        } else {
            $task_list[] = $new_task;
        }
        break;
    case 'delete':
        $task_index = $_POST['taskid'];
        unset($task_list[$task_index]);
        $task_list = array_values($task_list);
        break;
}

//stores the tasks array in session
$_SESSION['tasklist'] = $task_list;

include('task_list.php');
?>
	
	
	