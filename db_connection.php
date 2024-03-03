<?php
// Database connection
$host     = 'localhost';
$username = 'crm';
$password = 'crm';
$database = 'crm';

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
