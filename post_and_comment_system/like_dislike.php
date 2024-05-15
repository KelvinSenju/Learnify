<?php
include("dbconn.php");
include("session.php");

// Check if the request is an AJAX request and the required parameters are set
if(isset($_POST['comment_id']) && isset($_POST['action'])) {
    $comment_id = $_POST['comment_id'];
    $action = $_POST['action'];
    
    // Assuming you have the user ID stored in a session variable

    // Check if the user has already voted for this comment
    $check_query = mysqli_query($conn, "SELECT * FROM user_votes WHERE user_id = '$user_id' AND comment_id = '$comment_id'");
    $previous_vote = mysqli_fetch_assoc($check_query);

    // If the user has already voted for this comment
    if ($previous_vote) {
        $previous_action = $previous_vote['action'];
        
        // If the previous action is the same as the current action, do nothing
        if ($previous_action === $action) {
            echo json_encode(['error' => 'You have already voted for this']);
            exit;
        }
        
        // Update the user's vote in the user_votes table
        $update_action_query = mysqli_query($conn, "UPDATE user_votes SET action = '$action' WHERE user_id = '$user_id' AND comment_id = '$comment_id'");
        
        // Decrement the vote count based on the previous action
        if ($previous_action === 'like') {
            // Ensure the vote count doesn't go below zero
            $update_query = mysqli_query($conn, "UPDATE comment SET likes = GREATEST(likes - 1, 0) WHERE comment_id = '$comment_id'");
        } elseif ($previous_action === 'dislike') {
            // Ensure the vote count doesn't go below zero
            $update_query = mysqli_query($conn, "UPDATE comment SET dislikes = GREATEST(dislikes - 1, 0) WHERE comment_id = '$comment_id'");
        }
        
        // Increment the vote count based on the current action
        if ($action === 'like') {
            // Increment likes
            $update_query = mysqli_query($conn, "UPDATE comment SET likes = likes + 1 WHERE comment_id = '$comment_id'");
        } elseif ($action === 'dislike') {
            // Increment dislikes
            $update_query = mysqli_query($conn, "UPDATE comment SET dislikes = dislikes + 1 WHERE comment_id = '$comment_id'");
        }

        // Check if the queries were successful
        if ($update_action_query && $update_query) {
            echo json_encode(['success' => 'Vote updated successfully']);
        } else {
            echo json_encode(['error' => 'Failed to update vote']);
        }
    } else {
        // If the user hasn't voted before, insert their vote into the user_votes table
        $insert_query = mysqli_query($conn, "INSERT INTO user_votes (user_id, comment_id, action) VALUES ('$user_id', '$comment_id', '$action')");

        // Update the vote count in the database based on the action
        if ($action === 'like') {
            // Increment likes
            $update_query = mysqli_query($conn, "UPDATE comment SET likes = likes + 1 WHERE comment_id = '$comment_id'");
        } elseif ($action === 'dislike') {
            // Increment dislikes
            $update_query = mysqli_query($conn, "UPDATE comment SET dislikes = dislikes + 1 WHERE comment_id = '$comment_id'");
        }

        // Check if the queries were successful
        if ($insert_query && $update_query) {
            echo json_encode(['success' => 'Vote added successfully']);
        } else {
            echo json_encode(['error' => 'Failed to add vote']);
        }
    }
}
?>
