<?php
require("signup-checks.php");

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";


$sql = "INSERT INTO employee (email, first_name, last_name, password)"
    . "VALUES (?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param(
    "ssss",
    $_POST["email"],
    $_POST["firstname"],
    $_POST["lastname"],
    $password_hash
);

if ($stmt->execute()) {
    echo "Account created successfully";
    header("Location: ../register-succes.php");
    exit;
} else {
    if ($mysqli->errno == 1062) {
        die("Email already exists");
    } else {
        die("SQL error: " . $mysqli->errno . " " . $mysqli->error);
    }
}
