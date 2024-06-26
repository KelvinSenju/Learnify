<?php
include("dbconn.php");
include("session.php");

// Function to convert time difference to readable format
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
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

if (isset($_GET['search-input'])) {
    $search_query = $_GET['search-input'];
    // Escape special characters to prevent SQL injection
    $search_query = mysqli_real_escape_string($conn, $search_query);
    
    // SQL query to select posts that match the search query
    $query = "SELECT *, UNIX_TIMESTAMP() - date_created AS TimeSpent FROM post LEFT JOIN user ON user.user_id = post.user_id WHERE content LIKE CONCAT('%', '$search_query', '%') ORDER BY post_id DESC";
} else {
    // If no search query is provided, fetch all posts
    $query = "SELECT *, UNIX_TIMESTAMP() - date_created AS TimeSpent FROM post LEFT JOIN user ON user.user_id = post.user_id ORDER BY post_id DESC";
}

if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];
    // Perform the search query in the database
    // Assuming $searchResults is an array of search results with relevance score
    // Format the $searchResults array appropriately
    echo json_encode($searchResults);
    exit;
}

if (isset($_POST['comment'])) {
    $comment = $_POST['comment_content'];
    $post_id = isset($_POST['id']) ? $_POST['id'] : null; // Check if $_POST['id'] is set

    if ($post_id !== null) {
        mysqli_query($conn, "INSERT INTO comment (content, user_id, post_id) VALUES ('$comment', '$user_id', '$post_id')") or die(mysqli_error($conn));

        // Redirect to the same page where the comment was posted
        header("Location: comment.php?id=$post_id");
        exit(); // Ensure script execution stops here
    } else {
        // Handle the case where $_POST['id'] is not set
        // For example, you could display an error message or redirect the user to another page
        echo "Error: Post ID not set.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post and Comment System</title>
    <link rel="stylesheet" href="vendors/bootstrap.css">
	<link rel="stylesheet" href="style.css"/>

	<!-- CDN JS URL -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        body{
            background: url(bg-image.jpg);
            background-size: cover;
            display: flex;
            flex-direction: column;
			
        }

		.links-container {
			margin-right: 1.5em;
		}

		.user-info {
			margin-left: 1.5em;
		}

		/* search bar css */
		.header-wrapper{
			text-align: center;
			background-color: #E0FFFF;
			min-height: 20em;
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			text-align: center;
			gap: 50px;
		}
		.header-wrapper h1{
			font-size: 80px;
  			font-weight: 800;	
			font-family: "Noto Sans";
		}
		.header-wrapper p{
			font-size: 1.2em;
		}
		.search-bar{
			text-align: center;
			width: 100%;
			border-radius: 50px;
		}
		.search-bar input{
			font-size: 15px;
			padding: 1em;
			width: 35%;
			margin-bottom: 2em;
			min-height: 4em;
			border-radius: 50px;

		}
		.search-bar i{
			font-size: 1em;
			padding-left: .5em;
		}
		.search-button{
			padding: 1.3rem;
			background-color: #0b0345;
			color: white;
			outline: none;
			border: none;
			transition: transform .3s ease-in-out;
			margin-left: 3em;
			border-radius: 50px;

		}
		.search-button:active{
			transform: scale(.6);
		}

		@media screen and (max-width:752px){
			.header-wrapper h1{
				font-size: 5em;
			}
			
		}

		@media screen and (max-width:556px){
			.header-wrapper h1{
				font-size: 3.5em;
			}

			.search-bar{
				margin-bottom:2em ;
				font-size: 14px;    
			}
		}

		/* QUESTION FORUM CSS */
		.user-logined{
			margin-right: 1em;
		}
		.user-logined span{
			font-weight: bold;
			color: white;
		}
        .main-content{
			max-width: 45em;
			min-height: 8em; /**makes the height to be responsive  */
			margin: 2em auto; /*Center the container*/
			border-radius: 1em;
			padding: 1.2em;
			box-shadow: 0 0 4px #0b0345;
        }
        .post-header {
            display: flex;
            justify-content: space-between;
			align-items: center;
			/* background-color: green; */
			margin: 0 .3em;
        }
		/* this the information that the user posted including name, and date it was posted */
		.post-info{
			display: flex;
			flex-direction: column; 
			margin-left: 1em;
			/* background-color: red; */
		}
		.post-info >*{
			margin-bottom: .5rem;
		}
        .delete-btn {
            /* background-color: red; */
            color: white;
        }
		.post-content{
			margin:1em 0;
			margin: 1em 2em;
			word-wrap: break-word; 

			/* background-color: blue; */
		}
		.post-date{
			font-size: 13px;
			opacity: .9;
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

		/* DELETE BUTTON */
		.delete-btn {
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

		.delete-btn:active {
			background-color: #d6d3d3;
			color: #0b0345;
			box-shadow: 0 0 4px #0b0345; 
			transform: scale(0.95);
		}
		/* button */
		.see-ans-button{
			margin-top: .6em;
			margin-left: 2em;
			padding: .9em 1.7em;
			border-radius: 2em;
			background-color: #0b0345;
			font-variant: small-caps;
			color: white;
			font-size: .9em;
			outline: none;
			font-weight: bold;
			border: none;
			box-shadow: 0 0 4px #0b0345;
			transition: background-color 0.3s, color 0.3s, box-shadow 0.3s;
		}

		.see-ans-button:hover {
			background-color: #fff; 
			color: #0b0345; 
			box-shadow: 0 0 8px #0b0345;
		}


		.see-ans-button:active {
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
          <a href="post.php">Ask Question</a> 
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

	  
	  <!--HEADER SEARCH BAR MENU -->
	  	<header class="header-wrapper">
            <div>
                <h1>From Wondering to Understanding</h1>
                <p class="description">Learnify is a co-assistive where a small community of students come together to put their heads together to crack the toughest academic questions.</p>
            </div>
			<div class="search-bar">
				<form>
            		<input class="search" name="search-input" type="text" placeholder="What is your question?">
				</form>
       	 	</div>
    	</header>

<!-- QUESTIONS CONTAINER START -->
<div id="container">
    <div class="container-1">
        <?php
        $query = mysqli_query($conn, "SELECT *, UNIX_TIMESTAMP() - date_created AS TimeSpent FROM post LEFT JOIN user ON user.user_id = post.user_id ORDER BY post_id DESC") or die(mysqli_error());
        while ($post_row = mysqli_fetch_array($query)) {
            $id = $post_row['post_id'];
            $posted_by = $post_row['firstname']." ".$post_row['lastname'];
            $gradelevel = $post_row['gradelevel'];
            $subjectname = $post_row['subjectname'];
            ?>
            <div class="main-content">
                <div class="post-header">
                    <div class="post-info">
                        <span class="posted-by">Posted by: <?php echo $posted_by; ?> | Grade Level: <?php echo $gradelevel; ?> | Subject: <?php echo $subjectname; ?></span>
                        <span class="post-date">
                            <?php
                            $days = floor($post_row['TimeSpent'] / (60 * 60 * 24));
                            $remainder = $post_row['TimeSpent'] % (60 * 60 * 24);
                            $hours = floor($remainder / (60 * 60));
                            $remainder = $remainder % (60 * 60);
                            $minutes = floor($remainder / 60);
                            $seconds = $remainder % 60;
                            if ($days > 0) {
                                echo date('F d, Y - H:i:sa', strtotime($post_row['date_created']));
                            } elseif ($days == 0 && $hours == 0 && $minutes == 0) {
                                echo "A few seconds ago";
                            } elseif ($days == 0 && $hours == 0) {
                                echo $minutes.' minutes ago';
                            }
                            ?>
                        </span>
                    </div>
                    <?php if ($post_row['user_id'] == $user_id): ?>
                        <div class="delete-button">
                            <a href="deletepost.php?id=<?php echo $id; ?>">
                                <button class="delete-btn">Delete post</button>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="post-content">
                    <h2><?php echo $post_row['content']; ?></h2>
                </div>
                <div class="see-container">
                    <a href="comment.php?id=<?php echo $id; ?>"><button class="see-ans-button">See answer</button></a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Function to filter posts based on search query
    function filterPosts(query) {
        const posts = document.querySelectorAll('.main-content'); // Select the container of each post
        posts.forEach(post => {
            const content = post.querySelector('.post-content').textContent; // Get the content of each post
            // Case insensitive search
            if (content.toLowerCase().includes(query.toLowerCase())) {
                post.style.display = 'block'; // Show post container
            } else {
                post.style.display = 'none'; // Hide post container
            }
        });
    }

    // Event listener for search input
    const searchInput = document.querySelector('.search');
    searchInput.addEventListener('input', function() {
        filterPosts(this.value);
    });
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Function to filter posts based on search query
    function filterPosts(query) {
        const posts = document.querySelectorAll('.main-content'); // Select the container of each post
        posts.forEach(post => {
            const content = post.querySelector('.post-content').textContent.toLowerCase(); // Get the content of each post and convert to lowercase
            const words = query.toLowerCase().split(' '); // Split the query into individual words and convert to lowercase
            let match = true;
            words.forEach(word => {
                if (!content.includes(word)) {
                    match = false;
                }
            });
            if (match) {
                post.style.display = 'block'; // Show post container if all words are found
            } else {
                post.style.display = 'none'; // Hide post container if any word is not found
            }
        });
    }

    // Event listener for search input
    const searchInput = document.querySelector('.search');
    searchInput.addEventListener('input', function() {
        filterPosts(this.value);
    });
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Function to filter posts based on search query
    function filterPosts(query) {
        const posts = document.querySelectorAll('.main-content'); // Select the container of each post
        const sanitizedQuery = query.replace(/\s/g, ''); // Remove all white spaces from the query
        posts.forEach(post => {
            const content = post.querySelector('.post-content').textContent.toLowerCase().replace(/\s/g, ''); // Get the content of each post and remove white spaces
            if (content.includes(sanitizedQuery.toLowerCase())) { // Check if the sanitized content contains the sanitized query
                post.style.display = 'block'; // Show post container if the sanitized query is found in the sanitized content
            } else {
                post.style.display = 'none'; // Hide post container if the sanitized query is not found
            }
        });
    }

    // Event listener for search input
    const searchInput = document.querySelector('.search');
    searchInput.addEventListener('input', function() {
        filterPosts(this.value);
    });
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Function to filter posts based on search query
    function filterPosts(query) {
        const posts = document.querySelectorAll('.main-content'); // Select the container of each post
        posts.forEach(post => {
            const content = post.querySelector('.post-content').textContent.toLowerCase(); // Get the content of each post and convert to lowercase
            if (content.includes(query.toLowerCase())) { // Check if the content contains the search query
                post.style.display = 'block'; // Show post container if the search query is found in the content
            } else {
                post.style.display = 'none'; // Hide post container if the search query is not found
            }
        });
    }

    // Event listener for search input
    const searchInput = document.querySelector('.search');
    searchInput.addEventListener('input', function() {
        filterPosts(this.value);
    });
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Function to filter posts based on search query
    function filterPosts(query) {
        const posts = document.querySelectorAll('.main-content'); // Select the container of each post
        posts.forEach(post => {
            const content = post.querySelector('.post-content').textContent.toLowerCase(); // Get the content of each post and convert to lowercase
            if (content.includes(query.toLowerCase())) { // Check if the content contains the search query
                post.style.display = 'block'; // Show post container if the search query is found in the content
            } else {
                post.style.display = 'none'; // Hide post container if the search query is not found
            }
        });
    }

    // Event listener for search input
    const searchInput = document.querySelector('.search');
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.trim(); // Trim leading and trailing whitespace from the search term
        filterPosts(searchTerm); // Call the filterPosts function with the search term
    });
});
</script>

</body>
</html>
