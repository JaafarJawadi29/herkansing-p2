<?php

$host = "localhost";
$dbname = "serviceit";
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
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

return $mysqli;
