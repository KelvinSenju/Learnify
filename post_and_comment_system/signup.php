<?php 
include('dbconn.php');

$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];

// Check if the username already exists
$checkUser = "SELECT * FROM user WHERE username='$username'";
$result = $conn->query($checkUser);

if ($result->num_rows > 0) {
    echo "Username Already Exists!";
    exit;
} else {
    // Insert the new user into the database
    $insertQuery = "INSERT INTO user (username, password, firstname, lastname) VALUES ('$username', '$password', '$firstname', '$lastname')";
    if ($conn->query($insertQuery) === TRUE) {
        // Redirect to the login page after successful registration
        header("location: login.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<script>
    alert('Successfully Signed Up! You can now Log in your Account');
    window.location = 'index.php';
</script>
