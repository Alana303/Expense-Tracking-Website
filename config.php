<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Database configuration
$host = "localhost";  // Database host
$username = "root";   // Database username (default for XAMPP)
$password = "";       // Database password (empty in XAMPP by default)
$database = "expense"; // Change this if your database has a different name

// Connect to the database
$con = new mysqli($host, $username, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Redirect when accessing the base URL
if ($_SERVER['REQUEST_URI'] == '/Projects/TrackWise/expense/' || 
    $_SERVER['REQUEST_URI'] == '/Projects/TrackWise/expense/index.php') {
    header("Location: redirect.html");
    exit();
}
?>
