<?php
if (isset($_POST['tasklist'])) {
    $task_list = $_POST['tasklist'];
} else {
    $task_list = array();

    // some hard-coded starting values to make testing easier
    $task_list[] = 'Write chapter';
    $task_list[] = 'Edit chapter';
    $task_list[] = 'Proofread chapter';
}

$errors = array();

switch( $_POST['action'] ) {
    case 'Add Task':
        $new_task = $_POST['newtask'];
        if (empty($new_task)) {
            $errors[] = 'The new task cannot be empty.';
        } else {
            array_push($task_list, $new_task);
        }
        break;
    case 'Delete Task':
        $task_index = $_POST['taskid'];
        unset($task_list[$task_index]);
        $task_list = array_values($task_list);
        break;

    case 'Modify Task':
		$task_index = $_POST['taskid'];
        $task_to_modify = $task_list[$task_index];
        break;	
   
    case 'Save Changes':
  		$mod = $_POST['modifiedtaskid'];
        $modified_task = $_POST['modifiedtask'];
        if (empty($modified_task)) {
            $errors[] = 'The modified task cannot be empty.';
        } else {
            $task_list[$mod] = $modified_task;
            $modified_task = '';
        }
        break;
	
    case 'Cancel Changes':
		empty($modified_task);
		break;
	
    case 'Promote Task':
		$task_index = $_POST['taskid'];
		if ($task_index == 0) {
			$errors[] = 'You cannot promote the first task';
        } else {
            $task_value = $task_list[$task_index];
			$task_value_before = $task_list[$task_index-1];
			$task_list[$task_index-1] = $task_value;
			$task_list[$task_index] = $task_value_before;
			break;
		}
       
    case 'Sort Tasks':
    	sort($task_list);
		break;
}

include('task_list.php');
?>