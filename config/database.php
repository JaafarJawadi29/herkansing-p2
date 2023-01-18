<?php

$host = "localhost";
$dbname = "service-it";
$username = "root";
$password = "";

// Create connection
$mysqli = new mysqli(
    hostname: $host,
    username: $username,
    password: $password,
    database: $dbname
);

// Check connection
if ($mysqli -> connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

return $mysqli;
