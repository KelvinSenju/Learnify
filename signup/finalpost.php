<?php

$server="localhost";
$username="root";
$possword="";
$database="signup";
$con = mysqli_connect ($server,$username,$possword,$database);
if($con->connect_error){
    echo "Failed to connect DB".$conn->connect_error;
}
?>