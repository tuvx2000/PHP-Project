<?php 
// Create constant to store non repeating values
    define('LOCALHOST','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','php-project-db');



$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); // DB connection
$db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error()); // Selecting DB

?>