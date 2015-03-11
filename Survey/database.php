<?php
    $dsn = 'mysql:host=localhost;dbname=survey';
    $username = 'root';
    $password = '';

$db = new PDO($dsn, $username, $password);

/*     try {
        
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    } */
?>