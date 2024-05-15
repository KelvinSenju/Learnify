<?php
// Include your database connection file
include 'dbconn.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the message from the form
    $message = $_POST['message'];
    // You can add more validation and sanitization here

    // Insert the message into the database
    $query = "INSERT INTO messages (username, message, created_at) VALUES ('Anonymous', '$message', NOW())";
    mysqli_query($conn, $query);

    // Redirect back to the chat page
    header("Location: groupchat.php");
}

// Close database connection
mysqli_close($conn);
?>