<?php

include 'db_connect.php';

// Get values from form in create.php file
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password_1 = $_POST['password_1'];
$password_2 = $_POST['password_2'];

// To prevent from mysqli injection  
$firstname = stripcslashes($firstname);
$lastname = stripcslashes($lastname);
$username = stripcslashes($username);
$password = stripcslashes($password);

$sql = "INSERT INTO users (firstName, lastName, username, password)
VALUES ('$firstname', '$lastname', '$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: ../login.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>