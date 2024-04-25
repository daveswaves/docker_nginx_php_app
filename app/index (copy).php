<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
// set_time_limit(30);
// ini_set("memory_limit", "-1");

$db_host = 'mysql-db'; // MySQL server hostname within the same Docker network
$db_user = 'db_user';
$db_pass = 'password';
$db_name = 'test_database';

// Create a new MySQLi object to establish a database connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check if the connection was successful
if ($conn->connect_error) {
    // Display an error message and terminate the script if the connection fails
    die("Connection failed: " . $conn->connect_error);
}

// If the connection is successful, print a success message
echo "PHP Connected to MySQL successfully";

if ($res = $conn->query('SHOW DATABASES')) {
    while ($row = $res->fetch_assoc()) {
        echo '<pre style="background:#111; color:#b5ce28; font-size:11px;">'; print_r($row); echo '</pre>';
    }
    
}

// Close the database connection
$conn->close();
