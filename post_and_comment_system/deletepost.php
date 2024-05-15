<?php
include ('dbconn.php');
$id = $_GET['id'];

// Sanitize the input to prevent SQL injection
$id = mysqli_real_escape_string($conn, $id);

// Construct the SQL query to delete the specific post
$sql = "DELETE FROM post WHERE post_id = '$id'";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    // Redirect to the home page
    header('Location: home.php');
    exit(); // Stop further execution
} else {
    // If there's an error, handle it gracefully
    echo "Error: " . mysqli_error($conn);
}
?>
