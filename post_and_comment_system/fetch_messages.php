<?php
// Include your database connection file
include 'dbconn.php';

// Fetch messages from the database
$query = "SELECT * FROM messages ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);

// Display messages
while ($row = mysqli_fetch_assoc($result)) {
    echo "<div>{$row['username']}: {$row['message']}</div>";
}

// Close database connection
mysqli_close($conn);
?>