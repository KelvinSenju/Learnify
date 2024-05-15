<?php
// Start session
session_start();

// Check if user is not logged in
if (!isset($_SESSION['id'])){
    header('Location: index.php');
    exit; // Stop script execution after redirection
}

// Include database connection
include("dbconn.php");

// Get user ID from session
$user_id = $_SESSION['id'];

// Fetch user information from the database
$member_query = mysqli_query($conn, "SELECT * FROM user WHERE user_id = '$user_id'");
if (!$member_query) {
    die("Database error: " . mysqli_error($conn)); // Graceful error handling
}

// Check if user exists
if (mysqli_num_rows($member_query) == 0) {
    die("User not found"); // Handle case where user does not exist
}

// Fetch user data
$member_row = mysqli_fetch_array($member_query);

// Extract user's full name
$fullname = $member_row['firstname'] . " " . $member_row['lastname'];
?>
