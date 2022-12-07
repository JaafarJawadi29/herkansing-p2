<?php
//connect to the server and select database
$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "service-it");

// Get values from form in login.php file
$username = $_POST['username'];
$password = $_POST['password'];


//to prevent from mysqli injection  
$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($con, $username);
$password = mysqli_real_escape_string($con, $password);

//Query the database for user
$result = mysqli_query($con, "select * from accounts where username = '$username' and password = '$password'")
    or die("Failed to query database " . mysqli_error($con));
$row = mysqli_fetch_array($result);
if ($row['username'] == $username && $row['password'] == $password) {
    echo "Login success!!!";
    header("Location: dashboard.php");
} else {
    echo "Failed to login!";
    header("Location: ../login.php");
}
