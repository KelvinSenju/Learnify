<?php
include("dbconn.php");
include("session.php");

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '') . ' ago';
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) : 'just now';
}

$post_id = isset($_GET['id']) ? $_GET['id'] : null;


// Handling comment submission
if (isset($_POST['comment'])) {
    $comment = $_POST['comment_content'];
    $post_id = isset($_POST['id']) ? $_POST['id'] : null; // Check if $_POST['id'] is set

    if ($post_id !== null) {
        // Prepare the SQL statement with placeholders
        $sql = "INSERT INTO comment (content, user_id, secondpost_id, date_posted) VALUES (?, ?, ?, NOW())";
        
        // Prepare the statement
        $stmt = mysqli_prepare($conn, $sql);
        
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "sii", $comment, $user_id, $post_id);
        
        // Execute the statement
        mysqli_stmt_execute($stmt);
        
        // Check if the query was successful
        if(mysqli_stmt_affected_rows($stmt) > 0) {
            // Redirect to the same page where the comment was posted
            header("Location: comment.php?id=$post_id");
            exit(); // Ensure script execution stops here
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        
        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Handle the case where $_POST['id'] is not set
        // For example, you could display an error message or redirect the user to another page
        echo "Error: Post ID not set.";
        exit();
    }
}

// Handling Reply Submission (outside the loop)
if(isset($_POST['reply'])) {
    $parent_comment_id = $_POST['parent_comment_id'];
    $reply_content = $_POST['reply_content']; // No need to escape, using prepared statements

    // Prepare the SQL statement
    $insert_reply_query = mysqli_prepare($conn, "INSERT INTO reply (parent_comment_id, user_id, content, date_posted) VALUES (?, ?, ?, NOW())");

    if ($insert_reply_query) {
        // Bind parameters
        mysqli_stmt_bind_param($insert_reply_query, "iis", $parent_comment_id, $user_id, $reply_content);
        
        // Execute the statement
        mysqli_stmt_execute($insert_reply_query);

        // Check if the query was successful
        if(mysqli_stmt_affected_rows($insert_reply_query) > 0) {
            // Redirect back to the comment page
            header("Location: comment.php?id=$post_id");
            exit; // Stop further execution of the current script
        } else {
            // Error handling for failed reply insertion
            echo "<script>alert('Failed to submit reply. Please try again.');</script>";
        }

        // Close the statement
        mysqli_stmt_close($insert_reply_query);
    } else {
        // Error handling for failed prepared statement
        echo "<script>alert('Failed to prepare statement. Please try again.');</script>";
    }
}

// Like action
if(isset($_POST['action']) && $_POST['action'] === 'like') {
    $comment_id = $_POST['comment_id'];
    $user_id = $_SESSION['user_id'];
    
    // Check if the user has already liked this comment
    $check_query = mysqli_query($conn, "SELECT * FROM likes WHERE user_id = '$user_id' AND comment_id = '$comment_id'");
    if(mysqli_num_rows($check_query) > 0) {
        echo json_encode(['error' => 'User has already liked this comment']);
        exit();
    }
    
    // Insert like into database
    $insert_query = mysqli_query($conn, "INSERT INTO likes (user_id, comment_id) VALUES ('$user_id', '$comment_id')");
    if($insert_query) {
        echo json_encode(['success' => 'Liked successfully']);
    } else {
        echo json_encode(['error' => 'Failed to like comment']);
    }
    exit();
}

// Dislike action
if(isset($_POST['action']) && $_POST['action'] === 'dislike') {
    $comment_id = $_POST['comment_id'];
    $user_id = $_SESSION['user_id'];
    
    // Check if the user has already disliked this comment
    $check_query = mysqli_query($conn, "SELECT * FROM dislikes WHERE user_id = '$user_id' AND comment_id = '$comment_id'");
    if(mysqli_num_rows($check_query) > 0) {
        echo json_encode(['error' => 'User has already disliked this comment']);
        exit();
    }
    
    // Insert dislike into database
    $insert_query = mysqli_query($conn, "INSERT INTO dislikes (user_id, comment_id) VALUES ('$user_id', '$comment_id')");
    if($insert_query) {
        echo json_encode(['success' => 'Disliked successfully']);
    } else {
        echo json_encode(['error' => 'Failed to dislike comment']);
    }
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Page</title>
    <link rel="stylesheet" href="style.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Proxima-nova";
        }
        @font-face {
            font-family: "Proxima-nova";
            src:url("Mark\ Simonson\ \ Proxima\ Nova\ Regular.otf") ;
        }

          /* navigation additions */
          .user-logined{
			margin-right: 1em;
		}
		.user-logined span{
			font-weight: bold;
			color: white;
		}
        .logout-btn{
			background-color: #0b0345; /* Changed button color */
			color: #fff; /* Changed button text color */
			border: none;
			padding: 0.5em 1em; /* Added padding for better appearance */
			border-radius: 4px; /* Added border radius for rounded corners */
			cursor: pointer;    
			transition: all .1s ease;
			box-shadow: 0 0 4px #0b0345;
			font-variant: small-caps;
		}

		.logout-btn:active{
			background-color: #d6d3d3;
			color: #0b0345;
			box-shadow: 0 0 4px #0b0345; 
			transform: scale(0.95);
		}
        
        .main-question{
        }

        /* THE COMMENT SECTON */
        .answer-header{
            display: flex;
            justify-content: space-between;
            margin: 0 1rem;
            padding: 1rem 0;
        }
        .answer-header >*{
            font-variant: small-caps;
            color: #0b0345;
            font-weight: 600;
        }

        .current-comments{
            margin: 10px 10px;
        }

        .container{
            max-width: 45em;
            min-height: auto; 
            margin: 2em auto; 
        }
        /* containers */
        .container-1{
            min-height: 100%;
            min-width: 100%;
            padding: 1.2em;
            border-radius:2em ;
            box-shadow: 0 0 4px #0b0345;
        }   
        .container-1 >*{
            margin: 10px;
            line-height: 1.3em;
        }
        .question-wrap{
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            font-variant: small-caps;
        }
        .question-wrap p{
            font-size: 17px;
        }

        .comment-parent{
            max-width: 45em;
            margin: 2em auto; 
        }
        /* COMMENT SECTION PART */
        .comment-section{
            min-height: 100%;
            min-width: 100%;
            padding: 1.2em;
            border-radius:2em ;
            box-shadow: 0 0 4px #0b0345;
            /* background-color: green; */
        }
      
        .users-comment >*{
            margin: 10px;
        }
        .comment-form{
            max-width: 50em;
            width: 100%;
        }
        .comment-form textarea{
            width: 100%;
            min-height: 9em;
            outline:none;
            padding: 0 0 0 1em;
            border-radius: 1em;
            padding-top: 1em;
            resize: vertical;
            border: #0b0345 solid 2px;
            font-size: 16px;
        }
        /* input button */
        .comment-form input {
            margin-top: .6em;
			padding: .7em 1.7em;
			border-radius: 2em;
			background-color: #0b0345;
			font-variant: small-caps;
			color: white;
			font-size: .8em;
			outline: none;
			font-weight: bold;
			border: none;
			box-shadow: 0 0 4px #0b0345;
			transition: background-color 0.3s, color 0.3s, box-shadow 0.3s;
        }
        .comment-form input:hover{
            background-color: #fff; 
			color: #0b0345; 
			box-shadow: 0 0 8px #0b0345;
        }
        .comment-form input:active{
            background-color: #d6d3d3;
			color: #0b0345;
			box-shadow: 0 0 4px #0b0345; 
			transform: scale(0.95);
        }

        .replycomment-form{
            width: 100%;
            height: 10%;
        }
        .replycomment-form textarea{
            margin-top: 1em;
            width: 95%;
            height: 5%;
            outline:none;
            padding: 0 0 0 1em;
            border-radius: 1em;
            padding-top: 1em;
            resize: vertical;
            border: #0b0345 solid 2px;
            font-size: 16px;
        }

        /* Like and Dislike button styles */
        .like-dislike-container {
        display: flex;
        align-items: center;
        gap: 10px;
        }

        .like-button, .dislike-button {
            cursor: pointer;
            font-size: 24px;
            color: #888;
        }

        .like-button.selected, .dislike-button.selected {
            color: #00f; /* Change color for selected button */
        }


        /* input button */
        .reply-info {
            display: inline-block; /* or inline-flex */
        }

        .reply-info strong {
            display: inline-block; /* or inline-flex */
            margin-right: 5px; /* adjust as needed */
        }

        .reply_date {
            display: inline-block; /* or inline-flex */
            margin-left: 5px; /* adjust as needed */
        }
        
        .replycomment-form input {
            margin-top: .6em;
			padding: .7em 1.7em;
			border-radius: 2em;
			background-color: #0b0345;
			font-variant: small-caps;
			color: white;
			font-size: .8em;
			outline: none;
			font-weight: bold;
			border: none;
			box-shadow: 0 0 4px #0b0345;
			transition: background-color 0.3s, color 0.3s, box-shadow 0.3s;
        }
        .replycomment-form input:hover{
            background-color: #fff; 
			color: #0b0345; 
			box-shadow: 0 0 8px #0b0345;
        }
        .replycomment-form input:active{
            background-color: #d6d3d3;
			color: #0b0345;
			box-shadow: 0 0 4px #0b0345; 
			transform: scale(0.95);
        }
        
        .answer-section{
            margin: 1em 0;
            text-align: center;
        }
        .answer-section .comment-header{
            font-size: 2em;
        }
        .answer-section p{
            font-size: 1.2em;
        }
        .replysubbtn {
            margin-bottom: 10px;
        }

        /* FORUM COMMENTS */

        .users-comment{
            /* background-color: gray; */
            max-width: 45em;
            margin: 2em auto; 
        }
        .current-comments{
            min-height: 100%;
            min-width: 100%;
            padding: 1.2em;
            border-radius:2em ;
            box-shadow: 0 0 4px #0b0345;
        }
        .comment{
            border: #0b0345 1px solid;
            margin: 1.5em 0;
            border-radius: 1em;
            padding: 10px;
            min-height: 200px; /* Set a maximum height for the comment container */
            word-wrap: break-word;
        }
        .comment > *{
            margin: 0 10px;
            line-height: 1.5em;
        }
        .comment h3{
            margin: 1em 10px;
        }
        .comment h2{
            margin-top: 10px;
        }
        .comment p{
            opacity: .8;
            font-size: 14px;
        }

        .comment button{
            margin-right: 1rem;
            margin-top: .6em;
			padding: .7em 1.7em;
			border-radius: 2em;
			background-color: #0b0345;
			font-variant: small-caps;
			color: white;
			font-size: .8em;
			outline: none;
			font-weight: bold;
			border: none;
			box-shadow: 0 0 4px #0b0345;
			transition: background-color 0.3s, color 0.3s, box-shadow 0.3s;

        }
        .comment button:active{
            background-color: #d6d3d3;
			color: #0b0345;
			box-shadow: 0 0 4px #0b0345; 
			transform: scale(0.95);
        }

       
    </style>
</head>
<body>

              <!-- Navigation-bar -->
                <nav>
                    <label id="logo">
                        <a href="home.php">
                            <img id="logos" src="images/logo.png">
                        </a>
                    </label>
                    <div class="links-container">
                        <a class="home-link" href="home.php">Home</a> <!-- link back to homepage -->
                    </div>
                    <div class="user-logined">
                        <span><?php echo $member_row['firstname']." ".$member_row['lastname']; ?></span>
                    </div>
                    <div class="user-info">
                        <form action="logout.php" method="post">
                            <button class="logout-btn" type="submit">Log Out</button>
                        </form>
                    </div>  
                </nav>



    <!-- Display the question -->
    <div class="main-question">
        <?php
        // Retrieve the post content based on the provided post_id if it's set
        $post_id = isset($_GET['id']) ? $_GET['id'] : null; // Check if $_GET['id'] is set
        if ($post_id !== null) {
            $post_query = mysqli_query($conn, "SELECT post.*, user.firstname, user.lastname FROM post JOIN user ON post.user_id = user.user_id WHERE post.post_id = '$post_id'");
            $post_row = mysqli_fetch_assoc($post_query);
            if ($post_row) {
                ?>
        </div>
    <div class="container">
        <div class="container-1">
            <div class="question-wrap">
            <h2>Question:</h2>
            <div class="brand">
                <p>Learnify</p>
            </div>
            </div>
            <p>Posted by: <?php echo $post_row['firstname'] . " " . $post_row['lastname']; ?></p>
            <h3><?php echo $post_row['content']; ?></h3>
            <?php if (isset($post_row['firstname']) && isset($post_row['lastname'])): ?>
            <?php endif; ?>
        </div>
    </div>
    <?php
            } else {
                // echo "Question not found.";
            }
        } else {
            echo "Post ID not provided.";
        }
    ?>
    
    <!-- <hr> -->
    <div class="comment-parent">

        <div class="comment-section">
            <div class="answer-section">
            <h2 class="comment-header">Answer</h2>
            <p>Collaboration for better understanding</p>
            <hr/>
            <br/>
        </div>
            <form class='comment-form' method='post' action='comment.php'>
                <input type='hidden' name='id' value='<?php echo $post_id; ?>'>
                <textarea name='comment_content' rows='2' cols='44' style='' placeholder='Type your answer here' required></textarea><br>
                <input type='submit' name='comment'>
            </form>
        </div>
    </div>

    <!-- Display comments -->
<div class="users-comment">
    <hr/>
    <div class="answer-header">
        <h3>Answer</h3>
        <p class="reviews">Learnify</p>
    </div>
    <hr/>

    <div class="current-comments">
        <?php
        if ($post_id !== null) {
            $comment_query = mysqli_query($conn, "SELECT comment.*, user.firstname, user.lastname, COALESCE(SUM(likes), 0) AS total_likes, COALESCE(SUM(dislikes), 0) AS total_dislikes FROM comment JOIN user ON comment.user_id = user.user_id WHERE comment.secondpost_id = '$post_id' GROUP BY comment.comment_id");
            while ($comment_row = mysqli_fetch_assoc($comment_query)) {
                // Generate unique ID for the comment container
                $comment_id = $comment_row['comment_id'];
                $comment_container_id = "comment_$comment_id";
                ?>

                <!-- Comment container with unique ID -->
                <div id="<?php echo $comment_container_id; ?>" class="comment">
                    <strong>Commented by: <?php echo $comment_row['firstname'] . " " . $comment_row['lastname']; ?></strong>
                    <p class="comment_date"><?php echo $comment_row['date_posted']; ?></p>
                    <h2>Answer</h2>
                    <h3><?php echo $comment_row['content']; ?></h3>
                    
                    <!-- Like and Dislike buttons -->
                    <div class="like-dislike-container">
                        <div class="like-button material-icons" onclick="handleLike(<?php echo $comment_id; ?>)">thumb_up</div>
                        <div class="like-count"><?php echo $comment_row['total_likes']; ?></div>
                        <div class="dislike-button material-icons" onclick="handleDislike(<?php echo $comment_id; ?>)">thumb_down</div>
                        <div class="dislike-count"><?php echo $comment_row['total_dislikes']; ?></div>
                    </div>

                    <!-- Reply Section -->
                    <hr>
                    <h1 class="replytitle">Replies</h1>

                    <!-- Existing replies -->
                    <?php
                    $reply_query = mysqli_query($conn, "SELECT reply.*, user.firstname, user.lastname FROM reply JOIN user ON reply.user_id = user.user_id WHERE reply.parent_comment_id = '$comment_id'");
                    while ($reply_row = mysqli_fetch_assoc($reply_query)) {
                        ?>
                        <div class="reply">
                            <div class="reply-info">
                                <strong>Replied by: <?php echo $reply_row['firstname'] . ' ' . $reply_row['lastname']; ?> | <span class="reply_date"><?php echo $reply_row['date_posted']; ?></span></strong>
                            </div>
                            <p><?php echo $reply_row['content']; ?></p>
                            <hr class="half">
                        </div>
                    <?php } ?>
                    <!-- Reply form -->
                    <form class="replycomment-form" method="post" action="comment.php?id=<?php echo $post_id; ?>">
                        <input type="hidden" name="id" value="<?php echo $post_id; ?>">
                        <input type="hidden" name="parent_comment_id" value="<?php echo $comment_id; ?>">
                        <textarea name="reply_content" rows="2" cols="44" style="" placeholder="Type your reply here" required></textarea><br>
                        <input class="replysubbtn" type="submit" name="reply">
                    </form>
                </div>
            <?php }
        } ?>
    </div>
</div>
    <script>
// JavaScript function to handle liking or unliking a comment
function handleLike(commentId) {
    var likeButton = $('#comment_' + commentId + ' .like-button');
    var dislikeButton = $('#comment_' + commentId + ' .dislike-button');
    var likeCount = $('#comment_' + commentId + ' .like-count');
    var dislikeCount = $('#comment_' + commentId + ' .dislike-count');
    
    // Check if the like button is already selected
    if (likeButton.hasClass('selected')) {
        removeLike(commentId);
    } else {
        // Send an AJAX request to update the like count
        $.ajax({
            type: 'POST',
            url: 'like_dislike.php',
            data: { comment_id: commentId, action: 'like' },
            success: function(response) {
                // Update the like count on the page
                $('#comment_' + commentId + ' .like-count').html(response.likes);
                // Optionally, update the dislike count as well
                $('#comment_' + commentId + ' .dislike-count').html(response.dislikes);
                // Update the button styles based on the user's action
                likeButton.addClass('selected');
                dislikeButton.removeClass('selected');

                // Toggle the like button selection
                likeButton.addClass('selected');
                dislikeButton.removeClass('selected');
                // Disable the like button and enable the dislike button
                likeButton.prop('disabled', true);
                dislikeButton.prop('disabled', false);

                // Disable the dislike button
                dislikeButton.prop('disabled', true);

                // Decrease the dislike count if it's greater than 0
                likeCount.text(parseInt(likeCount.text()) + 1);
                if (parseInt(dislikeCount.text()) > 0) {
                    dislikeCount.text(parseInt(dislikeCount.text()) - 1);
                }

                // Store user action locally
                localStorage.setItem('liked_' + commentId, true);
                // Remove any stored dislike
                localStorage.removeItem('disliked_' + commentId);
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error(xhr.responseText);
            }
        });
    }
}

// JavaScript function to handle liking or unliking a comment
function handleLike(commentId) {
    var likeButton = $('#comment_' + commentId + ' .like-button');
    var dislikeButton = $('#comment_' + commentId + ' .dislike-button');
    
    // Check if the like button is already selected
    if (likeButton.hasClass('selected')) {
        // If the like button is already selected, remove the like
        removeLike(commentId);
    } else {
        // Send an AJAX request to like the comment
        $.ajax({
            type: 'POST',
            url: 'like_dislike.php',
            data: { comment_id: commentId, action: 'like' },
            success: function(response) {
                // Update the like count on the page
                $('#comment_' + commentId + ' .like-count').html(response.likes);
                // Optionally, update the dislike count as well
                $('#comment_' + commentId + ' .dislike-count').html(response.dislikes);
                // Update the button styles based on the user's action
                likeButton.addClass('selected');
                dislikeButton.removeClass('selected');

                // Store user action locally
                localStorage.setItem('liked_' + commentId, true);
                // Remove any stored dislike
                localStorage.removeItem('disliked_' + commentId);
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error(xhr.responseText);
            }
        });
    }
}

// JavaScript function to handle disliking or removing dislike from a comment
function handleDislike(commentId) {
    var likeButton = $('#comment_' + commentId + ' .like-button');
    var dislikeButton = $('#comment_' + commentId + ' .dislike-button');
    
    // Check if the dislike button is already selected
    if (dislikeButton.hasClass('selected')) {
        // If the dislike button is already selected, remove the dislike
        removeDislike(commentId);
    } else {
        // Send an AJAX request to dislike the comment
        $.ajax({
            type: 'POST',
            url: 'like_dislike.php',
            data: { comment_id: commentId, action: 'dislike' },
            success: function(response) {
                // Update the dislike count on the page
                $('#comment_' + commentId + ' .dislike-count').html(response.dislikes);
                // Optionally, update the like count as well
                $('#comment_' + commentId + ' .like-count').html(response.likes);
                // Update the button styles based on the user's action
                dislikeButton.addClass('selected');
                likeButton.removeClass('selected');

                // Store user action locally
                localStorage.setItem('disliked_' + commentId, true);
                // Remove any stored like
                localStorage.removeItem('liked_' + commentId);
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error(xhr.responseText);
            }
        });
    }
}


</script>
<script>
    // JavaScript function to check if the user has previously liked or disliked the comment
function checkUserAction(commentId) {
    // Check if the user has previously liked the comment
    if (localStorage.getItem('liked_' + commentId)) {
        $('#comment_' + commentId + ' .like-button').addClass('selected');
    } else if (localStorage.getItem('disliked_' + commentId)) {
        // Check if the user has previously disliked the comment
        $('#comment_' + commentId + ' .dislike-button').addClass('selected');
    }
}

// Call the checkUserAction function for each comment when the page loads
$(document).ready(function() {
    // Loop through each comment container and check user actions
    $('.comment').each(function() {
        var commentId = $(this).attr('id').split('_')[1];
        checkUserAction(commentId);
    });
});

</script>
</body>
</html>